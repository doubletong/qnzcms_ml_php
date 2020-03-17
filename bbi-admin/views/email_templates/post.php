<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
use Models\EmailTemplate;


if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['title'], $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
                     
            $title = $_POST['title'];
            $code = $_POST['code'];
            $htmlbody = stripslashes($_POST['htmlbody']);        
            $importance = $_POST['importance'];
          

            $region = new EmailTemplate();
            $region->title = $title;
            $region->code = $code;
            $region->importance = $importance;
            $region->htmlbody = $htmlbody;      
            $region->added_by = $username;

            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            if (!isset($_POST['title'], $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }

          
            $title = $_POST['title'];
            $code = $_POST['code'];
            $htmlbody = stripslashes($_POST['htmlbody']);        
            $importance = $_POST['importance'];
          
            $region = EmailTemplate::find($id);
            $region->title = $title;
            $region->code = $code;
            $region->importance = $importance;
            $region->htmlbody = $htmlbody;      
      
            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
            // $result = array ('status'=>1,'message'=>'更新成功');
            // echo json_encode($result);  
            break;   
        case "delete": 
            $region = EmailTemplate::find($id);
            $result = $region->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $region = EmailTemplate::find($id);
            $region->active = ($region->active)==1?"0":1;
            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "checkcode":
            if(isset($_POST['id'],$_POST['code'])){
                $id=$_POST['id'];
                $code=$_POST['code'];
                echo EmailTemplate::where('code', $code)
                ->where('id','<>', $id)
                ->count();
                
            }else{
                echo 0;
            }
            break;
        // // case "recommend":
        // //     echo $distributorClass->recommend_distributor($id);  
        // //     break;
        case "copy":
            $item = EmailTemplate::find($id);
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



