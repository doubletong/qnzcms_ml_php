<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/common.php');

use Models\Option;

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
            $option -> config_name = $config_name;
            $option->config_values = $config_values;
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
        $config_name = 'site_info';
        $logo = $_POST['logo'];
        $logo2 = $_POST['logo2'];
     
        $company = $_POST['company'];
        $webnumber = $_POST['webnumber'];
        $hotPhone = $_POST['hotPhone'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
       
        $address = $_POST['address'];
        $theme = $_POST['theme'];  

        $hremail = $_POST['hremail'];          
        $hrcontact = $_POST['hrcontact'];
        $hrphone = $_POST['hrphone'];

     

      
        $enableCaching = isset($_POST['enableCaching']) && $_POST['enableCaching']  ? "1" : "0";
        $config_values = array(
            "sitename" => $_POST['sitename'], "logo" => $logo, "logo2" => $logo2,
            "webnumber" =>  $webnumber, "company"=>$company,
            "email" =>  $email, "hotPhone"=>$hotPhone, "phone" =>  $phone, "address" => $address, "theme" => $theme,
            "hremail" =>  $hremail,
            "hrcontact" =>  $hrcontact,"hrphone" =>  $hrphone, "enableCaching" => $enableCaching
        );

        $data = Option::find($config_name);
        //$optionClass->get_config($config_name);

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
            $option -> config_name = $config_name;
            $option->config_values = $config_values;
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
