<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
use Models\Advertisement;


CacheManager::setDefaultConfig(new ConfigurationOption([
    'path' => $_SERVER['DOCUMENT_ROOT'].'/assets/caches/tmp',    // 缓存路径 or in windows "C:/tmp/"
]));

$InstanceCache = CacheManager::getInstance('files');

if(isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['title'], $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'名称不能为空！');
                echo json_encode($result);  
                return;
            }
                  
            
       
            $title = $_POST['title'];
            $space_id = $_POST['space_id'];
            $importance = $_POST['importance'];
            $image_url = $_POST['image_url'];
            $image_url_mobile  = $_POST['image_url_mobile'];
            $link = $_POST['link'];
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
            $description = $_POST['description'];
 

            $reseller = new Advertisement();          
            $reseller->title = $title;
            $reseller->space_id =  $space_id;     
            $reseller->image_url =  $image_url;
            $reseller->image_url_mobile =  $image_url_mobile;
            $reseller->link =  $link;
            $reseller->active =  $active;
            $reseller->description =  $description;          
            $reseller->content =  stripslashes($_POST['content']);;
            $reseller->importance = $importance;
            $reseller->added_by = $username;
            $result = $reseller->save();
           // print_r($reseller);
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            if (!isset($_POST['title'], $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'名称不能为空！');
                echo json_encode($result);  
                return;
            }

          
            $title = $_POST['title'];
            $space_id = $_POST['space_id'];
            $importance = $_POST['importance'];
            $image_url = $_POST['image_url'];
            $image_url_mobile  = $_POST['image_url_mobile'];
            $link = $_POST['link'];
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
            $description = $_POST['description'];
         

            $reseller = Advertisement::find($id);  
            $reseller->title = $title;
            $reseller->space_id = $space_id;     
            $reseller->image_url =  $image_url;
            $reseller->image_url_mobile =  $image_url_mobile;
            $reseller->link =  $link;
            $reseller->active =  $active;
            $reseller->description =  $description;          
            $reseller->content = stripslashes($_POST['content']);;
            $reseller->importance = $importance;
          //  $reseller->added_by = $username;

            $result = $reseller->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
            // $result = array ('status'=>1,'message'=>'更新成功');
            // echo json_encode($result);  
            break;   
        case "delete": 
            $reseller = Advertisement::find($id);           
            $result = $reseller->delete();
            if($result==true){
               

                
                $InstanceCache->clear();
          
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
               
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $reseller = Advertisement::find($id);
            $reseller->active =  !($reseller->active);
            $result = $reseller->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        // case "recommend":
        //     echo $distributorClass->recommend_distributor($id);  
        //     break;
        case "copy":
            $item = Advertisement::find($id);
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

    // if (isset( $_POST['title'], $_POST['importance'])) {
    //     $carouselId = $_POST['carouselId'];
    //     $title = $_POST['title'];
    //     $position_id = $_POST['position_id'];
    //     $importance = $_POST['importance'];
    //     $imageUrl = $_POST['imageUrl'];
    //     $image_url_mobile  = $_POST['image_url_mobile'];
    //     $link = $_POST['link'];
    //     $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    //     $description = $_POST['description'];

    //     //   echo $content.$carouselId;
    //     if($_POST['carouselId']>0){
    //         echo $carouselClass->update_carousel($carouselId,
    //             $title, $position_id,  $importance, $imageUrl,$image_url_mobile, $active, $description, $link);
    //     }else{
    //         echo $carouselClass->insert_carousel($title, $position_id,  $importance, $imageUrl,$image_url_mobile, $active, $description, $link);
    //     }

    // }else{
    //     $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
    //     echo json_encode($result);  
    // }

    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}

