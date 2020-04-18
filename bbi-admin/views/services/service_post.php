<?php
require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Utils/Enum.php');

use Models\ServiceItem;


if(isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "delete": 
            $region = ServiceItem::find($id);
            $result = $region->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
    
        case "create": 
            if (!isset($_POST['title'], $_POST['content'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
                     
            $title = $_POST['title'];
            $content = stripslashes($_POST['content']);              
            $importance = $_POST['importance'];                    

            $seotitle = $_POST['seotitle'];
            $seokeywords = $_POST['seokeywords'];
            $seodescription = $_POST['seodescription'];
          
           

            $item = new ServiceItem();
            $item->title = $title;        
            $item->content = $content;  
            $item->summary = $_POST['summary'];      
            $item->importance = $importance;            
            $item->thumbnail = $_POST['thumbnail'];
            $item->image_url = $_POST['image_url'];
            $item->banner = $_POST['banner'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
            $item->recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
            $item->added_by = $username;

            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
                $module = ModuleType::SERVICE();
                $url = $item->id;
                metadataSave($seotitle,$seokeywords,$seodescription,$module,$url);
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
                        
            $title = $_POST['title'];
            $content = stripslashes($_POST['content']);      
            $importance = $_POST['importance'];
     

            $seotitle = $_POST['seotitle'];
            $seokeywords = $_POST['seokeywords'];
            $seodescription = $_POST['seodescription'];
            


            $item = ServiceItem::find($id);
            $item->title = $title;        
            $item->content = $content;  
            $item->summary = $_POST['summary'];      
            $item->importance = $importance;            
            $item->thumbnail = $_POST['thumbnail'];
            $item->image_url = $_POST['image_url'];
            $item->banner = $_POST['banner'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
            $item->recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
            $item->added_by = $username;

            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
                $module = ModuleType::SERVICE();
                $url = $id;
                metadataSave($seotitle,$seokeywords,$seodescription,$module,$url);
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   

            break;
        case "active":
            $region = ServiceItem::find($id);
            $region->active = ($region->active)==1?"0":1;
            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;

        case "recommend":
            $region = ServiceItem::find($id);
            $region->recommend = ($region->recommend)==1?"0":1;
            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;

        case "copy":
            $item = ServiceItem::find($id);
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
