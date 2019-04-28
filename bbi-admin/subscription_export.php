<?php
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/subscription.php');

$subscriptionClass = new Subscription();
$emails = $subscriptionClass->fetch_all();


        // $text = array();
    
        // foreach($emails as $row){
        //   $text[] = $row['email'];
        // }    
        // $output = implode( "\n" , $text );  
     
        // header("Pragma: public");
        // header("Expires: 0");
        // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        // header("Cache-Control: private",false);
        // header("Content-Transfer-Encoding: binary;\n");
        // header("Content-Disposition: attachment; filename=\"maillist.txt\";\n");
        // header("Content-Type: application/force-download");
        // header("Content-Type: application/octet-stream");
        // header("Content-Type: application/download");
        // header("Content-Description: File Transfer");
        // header("Content-Length: ".strlen($output).";\n");
        // echo $output;
  
     //   die; 
  
        function array2csv(array &$array)
        {
           if (count($array) == 0) {
             return null;
           }
           ob_start();
           $df = fopen("php://output", 'w');

           fputcsv($df, array('Email', 'Created'));          
           foreach ($array as $row) {
              $lineData = array($row['email'], date('Y-m-d',$row['added_date']));
              fputcsv($df,$lineData );
           }
           fclose($df);
           return ob_get_clean();


        }

        function download_send_headers($filename) {
            // disable caching
            $now = gmdate("D, d M Y H:i:s");
            header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
            header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
            header("Last-Modified: {$now} GMT");
        
            // force download  
            header("Content-Type: application/force-download");
            header("Content-Type: application/octet-stream");
            header("Content-Type: application/download");
        
            // disposition / encoding on response body
            header("Content-Disposition: attachment;filename={$filename}");
            header("Content-Transfer-Encoding: binary");
        }


download_send_headers("data_export_" . date("Y-m-d") . ".csv");
echo array2csv($emails);
die;