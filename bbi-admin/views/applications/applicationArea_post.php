<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');
use Models\ApplicationArea;


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
            $sub_title = $_POST['sub_title'];
            $intro = stripslashes($_POST['intro']);
            $cases = stripslashes($_POST['cases']);
            $importance = $_POST['importance'];
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $region = new ApplicationArea();
            $region->title = $title;
            $region->sub_title = $sub_title;
            $region->importance = $importance;
            $region->intro = $intro;          
            $region->cases = $cases;
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
            $sub_title = $_POST['sub_title'];
            $intro = stripslashes($_POST['intro']);
            $cases = stripslashes($_POST['cases']);
            $importance = $_POST['importance'];
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";   

            $region = ApplicationArea::find($id);
            $region->title = $title;
            $region->sub_title = $sub_title;
            $region->importance = $importance;
            $region->intro = $intro;          
            $region->cases = $cases;
            $region->active = $active;
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
            $region = ApplicationArea::find($id);
            $result = $region->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $region = ApplicationArea::find($id);
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
        case "copy":
            $item = ApplicationArea::find($id);
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



