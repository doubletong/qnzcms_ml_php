<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Paper;


if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['content'])) {   

                $result = array ('status'=>2,'message'=>'内容不能为空！');
                echo json_encode($result);  
                return;
            }
            
            $Paper = new Paper();
            $Paper->lang = $_POST['lang'];        
            $Paper->content = stripslashes($_POST['content']);          
            $Paper->pubdate = $_POST['pubdate'];
            $Paper->importance = $_POST['importance'];
            $Paper->thumbnail = $_POST['thumbnail'];
         
            $Paper->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $Paper->added_by = $username;    
          

            $result = $Paper->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));                

            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            if (!isset($_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'内容不能为空！');
                echo json_encode($result);  
                return;
            }

          
            $Paper = Paper::find($id);
        
            $Paper->lang = $_POST['lang'];
         
            $Paper->content = stripslashes($_POST['content']);
       
            $Paper->pubdate = $_POST['pubdate'];
            $Paper->importance = $_POST['importance'];
            $Paper->thumbnail = $_POST['thumbnail'];
      
            $Paper->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";


            $result = $Paper->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
              
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
            // $result = array ('status'=>1,'message'=>'更新成功');
            // echo json_encode($result);  
            break;   
        case "delete": 
            $Paper = Paper::find($id);
            $result = $Paper->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $Paper = Paper::find($id);
            $Paper->active = ($Paper->active)==1?"0":1;
            $result = $Paper->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "recommend":
            $Paper = Paper::find($id);
            $Paper->recommend = ($Paper->recommend)==1?"0":1;
            $result = $Paper->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "copy":
            $item = Paper::find($id);
            $new_item = $item->replicate(); //copy attributes
            $new_item->content = $new_item->content."【拷贝】";
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



