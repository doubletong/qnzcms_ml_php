<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');

use Models\AdvertisingSpace;
use Models\Language;

if(isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;
    switch ($_POST['action']) {
        case "create": 
            $langs = Language::where('active',1)->orderby('importance','DESC')->get();

            $items = array();
            foreach($langs as $item){
                $lang = $item->code;            
                $items[$lang]  =  $_POST['title_'.$lang];    
            }

            if (!isset($items, $_POST['importance'])) {   
                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }

            $description = array();
            foreach($langs as $item){
                $lang = $item->code;            
                $description[$lang]  =  $_POST['description_'.$lang];    
            }
        
          
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $region = new AdvertisingSpace();
            $region->title = json_encode($items);
            $region->description = json_encode($description);
            $region->importance = $_POST['importance'];
            $region->code = $_POST['code'];
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
            $langs = Language::where('active',1)->orderby('importance','DESC')->get();

            $items = array();
            foreach($langs as $item){
                $lang = $item->code;            
                $items[$lang]  =  $_POST['title_'.$lang];    
            }

            if (!isset($items, $_POST['importance'])) {   
                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }

            $description = array();
            foreach($langs as $item){
                $lang = $item->code;            
                $description[$lang]  =  $_POST['description_'.$lang];    
            }

          
          
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $region = AdvertisingSpace::find($id);
            $region->title = json_encode($items);
            $region->description = json_encode($description);
            $region->importance = $_POST['importance'];
            $region->code = $_POST['code'];
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
            $region = AdvertisingSpace::find($id);
            $result = $region->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        // case "active":
        //     echo $distributorClass->active_distributor($id);  
        //     break;
        // // case "recommend":
        // //     echo $distributorClass->recommend_distributor($id);  
        // //     break;
        // case "copy":
        //     echo $distributorClass->copy_distributor($id);  
        //     break;
    }

    // if (isset( $_POST['title'], $_POST['importance'])) {
    //     $positionId = $_POST['positionId'];
    //     $title = $_POST['title'];
    //     $code = $_POST['code'];
    //     $importance = $_POST['importance'];
    //     $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
    //     //   echo $content.$positionId;
    //     if($_POST['positionId']>0){
    //         echo $positionClass->update_position($positionId, $title,$code, $importance,  $active);
    //     }else{
    //         echo $positionClass->insert_position($title,$code, $importance, $active);
    //     }

    // }else{
    //     echo false;
    // }

    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}


