<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/option.php');

$optionClass = new SiteOption();

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
        
            if (!empty($data) > 0) {
                echo $optionClass->update_config($config_name, $config_values);
            } else {
                echo $optionClass->insert_config($config_name, $config_values);
            }
         
  
        break;
    case 'siteinfo':
        $config_values = array("name" => "joan", "num" => "9018", "email" => "abc@abc.com");
        echo 2;
        break;
    default:
        $config_values = array("name" => "joan", "num" => "9018", "email" => "abc@abc.com");
        echo 3;
}

