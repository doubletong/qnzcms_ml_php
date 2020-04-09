<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');

use Models\NewsCategory;


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
            $importance = $_POST['importance'];
            $parent = isset($_POST['parent']) && $_POST['parent']?$_POST['parent']:null;
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $region = new NewsCategory();
            $region->title = $title;
            $region->parent = $parent;
            $region->importance = $importance;
            $region->active = $active;
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
            $importance = $_POST['importance'];
            $parent = isset($_POST['parent']) && $_POST['parent']?$_POST['parent']:null;
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";


            $region = NewsCategory::find($id);
            $region->title = $title;
            $region->parent = $parent;
            $region->importance = $importance;
            $region->active = $active;
            $region->added_by = $username;

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
            $region = NewsCategory::find($id);
            $result = $region->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $region = NewsCategory::find($id);
            $region->active = ($region->active)==1?"0":1;
            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        // // case "recommend":
        // //     echo $distributorClass->recommend_distributor($id);  
        // //     break;
        // case "copy":
        //     echo $distributorClass->copy_distributor($id);  
        //     break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}



