<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/common.php');

use Models\Option;

$username = $_SESSION['valid_user'];

$config_type = $_POST['config_type'];


switch ($config_type) {
    case 'smtp':
        $config_name = 'smtp';
        $host = $_POST['host'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $port = $_POST['port'];
        $SMTPSecure = isset($_POST['SMTPSecure']) && $_POST['SMTPSecure']  ? "1" : "0";

        $email_contact = $_POST['email_contact'];

        $config_values = array("host" => $host, "username" =>  $username, "password" =>  $password, "port" =>  $port, "SMTPSecure" =>  $SMTPSecure, "email_contact" => $email_contact);

        $data = Option::find($config_name);
        
        if (isset($data)) {
            $data->config_values = $config_values;         
            $result = $data->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
            
        } else {
            $option = new Option();
            $option->config_name = $config_name;
            $option->config_values = $config_values;
            $option->added_by = $username;
            $result = $option->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            //echo $optionClass->insert_config($config_name, $config_values);
        }

        break;
    case 'site_info':
        $config_name = $_POST['config_name'];      
     
        $company = $_POST['company'];        
        $phone = $_POST['phone'];
        $email = $_POST['email'];       
        $address = $_POST['address'];        
        $postcode = $_POST['postcode'];      
      
        $config_values = array(
            "sitename" => $_POST['sitename'], 
            "company"=>$company, "postcode" => $postcode,
            "email" =>  $email,  "phone" =>  $phone, "address" => $address
            
        );

        $data = Option::find($config_name);
        //$optionClass->get_config($config_name);
        // print_r($config_values);

        if (isset($data)) {
            $data->config_values = $config_values;         
            $result = $data->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
            
        } else {

            $option = new Option();
            $option->config_name = $config_name;
            $option->config_values = json_encode($config_values);
            $option->added_by = $username;
            
            $result = $option->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            //echo $optionClass->insert_config($config_name, $config_values);
        }
        break;

    case 'sys':
        $config_name = 'sys';
        $logo = $_POST['logo'];      
        $webnumber = $_POST['webnumber'];
        $homepage = $_POST['homepage'];
        $app_id = $_POST['app_id'];   
        $app_secret = $_POST['app_secret'];  
        $accessKeyId = $_POST['accessKeyId'];
        $accessKeySecret = $_POST['accessKeySecret'];  
        $endpoint = $_POST['endpoint'];  
        $bucket = $_POST['bucket'];  
        $oss_url = $_POST['oss_url'];  
       
        $enableCaching = isset($_POST['enableCaching']) && $_POST['enableCaching']  ? "1" : "0";

        $config_values = array(
            "logo" => $logo,
            "webnumber" =>  $webnumber, 
            "homepage"=>$homepage,
            "app_id"=>$app_id,
            "app_secret"=>$app_secret,
            "accessKeyId"=>$accessKeyId,
            "accessKeySecret"=>$accessKeySecret,
            "endpoint"=>$endpoint,
            "bucket"=>$bucket,
            "oss_url"=>$oss_url,
            "enableCaching" => $enableCaching
        );

        $data = Option::find($config_name);
        //$optionClass->get_config($config_name);
        // print_r($config_values);

        if (isset($data)) {
            $data->config_values = $config_values;         
            $result = $data->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
            
        } else {

            $option = new Option();
            $option->config_name = $config_name;
            $option->config_values = json_encode($config_values);
            $option->added_by = $username;
            
            $result = $option->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            //echo $optionClass->insert_config($config_name, $config_values);
        }
        break;
    default:
        $config_values = array("name" => "joan", "num" => "9018", "email" => "abc@abc.com");
        echo 3;
}
