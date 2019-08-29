<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/data/option.php');

$optionClass = new \TZGCMS\Admin\SiteOption();

$config_type = $_POST['config_type'];


switch ($config_type) {
   
    case 'smtp':  
            $config_name = 'smtp';
            $host = $_POST['host'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $port = $_POST['port'];           
            $SMTPSecure = isset($_POST['SMTPSecure']) && $_POST['SMTPSecure']  ? "1" : "0";
        
            $config_values = array("host" => $host, "username" =>  $username , "password" =>  $password, "port" =>  $port , "SMTPSecure" =>  $SMTPSecure  );

            $data = $optionClass->get_config($config_name);
        
            if (!empty($data) ) {
                echo $optionClass->update_config($config_name, $config_values);
            } else {
                echo $optionClass->insert_config($config_name, $config_values);
            }        
  
        break;
    case 'site_info':
            $config_name = 'site_info';
            $logo = $_POST['logo'];
            $logo2 = $_POST['logo2'];
            $qrcode = $_POST['qrcode'];
         
            $webnumber = $_POST['webnumber'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $email_contact = $_POST['email_contact'];
            $address = $_POST['address'];
         
           
            $config_values = array("sitename" => $_POST['sitename'], "logo" => $logo,"logo2" => $logo2, "qrcode" =>  $qrcode , "webnumber" =>  $webnumber,
            "email" =>  $email ,"email_contact"=>$email_contact, "phone" =>  $phone, "address" => $address);

            $data = $optionClass->get_config($config_name);

            if (!empty($data)) {
                echo $optionClass->update_config($config_name, $config_values);
            } else {
                echo $optionClass->insert_config($config_name, $config_values);
            }      
        break;
    default:
        $config_values = array("name" => "joan", "num" => "9018", "email" => "abc@abc.com");
        echo 3;
}

