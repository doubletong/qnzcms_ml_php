<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');
use Models\Lab;


if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['title'], $_POST['content'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
        
          
            $item = new Lab();
            $item->title = $_POST['title'];
            $item->lang = $_POST['lang'];
            $item->structure = isset($_POST['structure']) ? implode("|",$_POST['structure']):null;
            $item->committee = isset($_POST['committee']) ? implode("|",$_POST['committee']):null;
            $item->content = stripslashes($_POST['content']);
            $item->summary = $_POST['summary'];
            $item->thumbnail = $_POST['thumbnail'];
            $item->importance = $_POST['importance'];
            $item->template = $_POST['template'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
            $item->added_by = $username;

            $seotitle = $_POST['seotitle'];
            $seokeywords = $_POST['seokeywords'];
            $seodescription = $_POST['seodescription'];          

            

            $result = $item->save();
            if($result==true){

                $module = ModuleType::LAB();          
                metadataSave($seotitle,$seokeywords,$seodescription,$module, $item->id);

                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            if (!isset($_POST['title'], $_POST['content'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
          
        
            $item = Lab::find($id);
            $item->title = $_POST['title'];
            $item->lang = $_POST['lang'];
            $item->structure = isset($_POST['structure']) ? implode("|",$_POST['structure']):null;
            $item->committee = isset($_POST['committee']) ? implode("|",$_POST['committee']):null;
            $item->content = stripslashes($_POST['content']);
            $item->summary = $_POST['summary'];
            $item->thumbnail = $_POST['thumbnail'];        
            $item->importance = $_POST['importance'];  
            $item->template = $_POST['template'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
           

            $seotitle = $_POST['seotitle'];
            $seokeywords = $_POST['seokeywords'];
            $seodescription = $_POST['seodescription'];        

            $module = ModuleType::LAB();          
            metadataSave($seotitle,$seokeywords,$seodescription,$module, $id);
            
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
         
            break;   
        case "delete": 
            $item = Lab::find($id);
            $result = $item->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $item = Lab::find($id);
            $item->active = ($item->active)==1?0:1;
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "recommend":
            $item = Lab::find($id);
            $item->recommend = ($item->recommend)==1?0:1;
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "copy":
            $item = Lab::find($id);
            $new_item = $item->replicate(); //copy attributes
            $new_item->title = $new_item->title."【拷贝】";
            $result = $new_item->push(); //save model before you recreate relations (so it has an id)
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'拷贝成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'拷贝失败'));  
            }   
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}



