<?php

function get_sliders() {
   // query database for a list of categories
   $conn = db_connect();
   $query = "select * from bb_slider order by importance desc";
     $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_slider_details($sliderid) {
   // query database for the name for a category id
   $conn = db_connect();
   $query = "select * from bb_slider
             where sliderid = '".$sliderid."'";
             
   $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $result = @$result->fetch_assoc();
   return $result;
}



?>