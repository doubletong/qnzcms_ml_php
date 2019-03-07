<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/subscription.php');

$subscriptionClass = new Subscription();
$emails = $subscriptionClass->fetch_all();


        $text = array();
    
        foreach($emails as $row){
          $text[] = $row['email'];
        }    
        $output = implode( "\n" , $text );
  
        // Output Handling from @narcisradu's answer
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        header("Content-Transfer-Encoding: binary;\n");
        header("Content-Disposition: attachment; filename=\"maillist.txt\";\n");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Description: File Transfer");
        header("Content-Length: ".strlen($output).";\n");
        echo $output;
  
        die; // Prevent any further output
      
  
 