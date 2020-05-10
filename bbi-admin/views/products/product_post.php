<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Product;


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
            $image_url = "";
            if(!empty($_POST['image_url01'])){
                $image_url = $_POST['image_url01'];
            }
            if(!empty($_POST['image_url02'])){
                $image_url += '|'. $_POST['image_url02'];
            }
            if(!empty($_POST['image_url03'])){
                $image_url += '|'. $_POST['image_url03'];
            }
            if(!empty($_POST['image_url04'])){
                $image_url += '|'. $_POST['image_url04'];
            }
                     

            $region = new Product();
            $region->title = $_POST['title'];
            $region->category_id = $_POST['category_id'];
            $region->content = stripslashes($_POST['content']);
            $region->feature = stripslashes($_POST['feature']);
            $region->reference = stripslashes($_POST['reference']);
            $region->application = stripslashes($_POST['application']);
            $region->code = stripslashes($_POST['code']);
            $region->downloads = stripslashes($_POST['downloads']);

            $region->importance = $_POST['importance'];
            $region->thumbnail = $_POST['thumbnail'];
            $region->image_url = $image_url;
            $region->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $region->added_by = $username;

            $seotitle = $_POST['seotitle'];
            $seokeywords = $_POST['seokeywords'];
            $seodescription = $_POST['seodescription'];

            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
                $module = ModuleType::PRODUCT();
                $url = $region->id;
                metadataSave($seotitle,$seokeywords,$seodescription,$module,$url);
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

          
            $image_url = "";
            if(!empty($_POST['image_url01'])){
                $image_url = $_POST['image_url01'];
            }
            if(!empty($_POST['image_url02'])){
                $image_url = $image_url.'|'. $_POST['image_url02'];
            }
            if(!empty($_POST['image_url03'])){
                $image_url = $image_url.'|'. $_POST['image_url03'];
            }
            if(!empty($_POST['image_url04'])){
                $image_url = $image_url.'|'. $_POST['image_url04'];
            }
                     

            $region = Product::find($id);
            $region->title = $_POST['title'];
            $region->category_id = $_POST['category_id'];
            $region->content = stripslashes($_POST['content']);
            $region->feature = stripslashes($_POST['feature']);
            $region->reference = stripslashes($_POST['reference']);
            $region->application = stripslashes($_POST['application']);
            $region->code = stripslashes($_POST['code']);
            $region->downloads = stripslashes($_POST['downloads']);

            $region->importance = $_POST['importance'];
            $region->thumbnail = $_POST['thumbnail'];
            $region->image_url = $image_url;
            $region->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $seotitle = $_POST['seotitle'];
            $seokeywords = $_POST['seokeywords'];
            $seodescription = $_POST['seodescription'];
            

            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
                $module = ModuleType::PRODUCT();
                $url = $id;
                metadataSave($seotitle,$seokeywords,$seodescription,$module,$url);
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
            // $result = array ('status'=>1,'message'=>'更新成功');
            // echo json_encode($result);  
            break;   
        case "delete": 
            $region = Product::find($id);
            $result = $region->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $region = Product::find($id);
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
            $item = Product::find($id);
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



