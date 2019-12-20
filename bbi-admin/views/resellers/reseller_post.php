<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/config/database.php');
use Models\Reseller;


if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['name'], $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'名称不能为空！');
                echo json_encode($result);  
                return;
            }
                     
            $name = $_POST['name'];
            $region_id = $_POST['region_id'];
            $country_id = $_POST['country_id'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $homepage = $_POST['homepage'];
            $phone = $_POST['phone'];
            $fax = $_POST['fax'];
            $opentime = $_POST['opentime'];
            $facebook = $_POST['facebook'];
            $instagram = $_POST['instagram'];
            $youtube = $_POST['youtube'];
            $twitter = $_POST['twitter'];
            $link = $_POST['link'];
            $zipcode = $_POST['zipcode'];         
            $importance = $_POST['importance'];

            $reseller = new Reseller();
            $reseller->name = $name;
            $reseller->region_id =  $region_id;
            $reseller->country_id =  $country_id;
            $reseller->address =  $address;
            $reseller->email =  $email;
            $reseller->homepage =  $homepage;
            $reseller->phone =  $phone;
            $reseller->fax =  $fax;
            $reseller->opentime =  $opentime;
            $reseller->facebook =  $facebook;
            $reseller->instagram =  $instagram;
            $reseller->youtube =  $youtube;
            $reseller->twitter =  $twitter;
            $reseller->link =  $link;
            $reseller->zipcode =  $zipcode;
            $reseller->importance = $importance;
            $result = $reseller->save();
           // print_r($reseller);
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            if (!isset($_POST['name'], $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'名称不能为空！');
                echo json_encode($result);  
                return;
            }

          
            $name = $_POST['name'];
            $region_id = $_POST['region_id'];
            $country_id = $_POST['country_id'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $homepage = $_POST['homepage'];
            $phone = $_POST['phone'];
            $fax = $_POST['fax'];
            $opentime = $_POST['opentime'];
            $facebook = $_POST['facebook'];
            $instagram = $_POST['instagram'];
            $youtube = $_POST['youtube'];
            $twitter = $_POST['twitter'];
            $link = $_POST['link'];
            $zipcode = $_POST['zipcode'];         
            $importance = $_POST['importance'];

            $reseller = Reseller::find($id);
            $reseller->name = $name;
            $reseller->region_id =  $region_id;
            $reseller->country_id =  $country_id;
            $reseller->address =  $address;
            $reseller->email =  $email;
            $reseller->homepage =  $homepage;
            $reseller->phone =  $phone;
            $reseller->fax =  $fax;
            $reseller->opentime =  $opentime;
            $reseller->facebook =  $facebook;
            $reseller->instagram =  $instagram;
            $reseller->youtube =  $youtube;
            $reseller->twitter =  $twitter;
            $reseller->link =  $link;
            $reseller->zipcode =  $zipcode;
            $reseller->importance = $importance;
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
            $reseller = Reseller::find($id);
            $result = $reseller->delete();
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
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}



