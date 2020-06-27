<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once('../../../app/utils/PYInitials.php');


use Models\Team;

$py = new QNZ\Utils\PYInitials();


if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['name'], $_POST['photo'])) {   

                $result = array ('status'=>2,'message'=>'姓名与照片不能为空！');
                echo json_encode($result);  
                return;
            }
            

            $frist = mb_substr($_POST['name'], 0, 1 );
          
            $item = new Team();
            $item->name = $_POST['name'];           
            $item->first_letter = $py->getInitials($frist);
            $item->post = $_POST['post'];
            $item->fullphoto = $_POST['fullphoto'];
            $item->content = stripslashes($_POST['content']);
            $item->category_id = stripslashes($_POST['category_id']);
            $item->photo = $_POST['photo'];
            $item->importance = $_POST['importance'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";       
            $item->added_by = $username;


     
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            if (!isset($_POST['name'], $_POST['photo'])) {   

                $result = array ('status'=>2,'message'=>'姓名与照片不能为空！');
                echo json_encode($result);  
                return;
            }
          
            $frist = mb_substr($_POST['name'], 0, 1);
        
            $item = Team::find($id);
            $item->name = $_POST['name'];
            $item->first_letter = $py->getInitials($frist);
            $item->post = $_POST['post'];
            $item->fullphoto = $_POST['fullphoto'];
            $item->content = stripslashes($_POST['content']);
            $item->category_id = stripslashes($_POST['category_id']);
            $item->photo = $_POST['photo'];
            $item->importance = $_POST['importance'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";       
            $item->added_by = $username;

            
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
         
            break;   
        case "delete": 
            $item = Team::find($id);
            $result = $item->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $item = Team::find($id);
            $item->active = ($item->active)==1?0:1;
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "recommend":
            $item = Team::find($id);
            $item->recommend = ($item->recommend)==1?0:1;
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "copy":
            $item = Team::find($id);
            $new_item = $item->replicate(); //copy attributes
            $new_item->name = $new_item->name."【拷贝】";
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





