<?php

function get_categories() {
   // query database for a list of categories
   $conn = db_connect();
   $query = "select * from product_categories order by importance desc";
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

function get_category_details($catid) {
   // query database for the name for a category id
   $conn = db_connect();
   $query = "select * from product_categories
             where categoryid = '".$catid."'";
             
   $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $result = @$result->fetch_assoc();
   return $result;
}

function get_category_name($catid) {
   // query database for the name for a category id
   $conn = db_connect();
   $query = "select title from product_categories
             where categoryid = '".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $row = $result->fetch_object();
   return $row->title;
}



function get_allproducts() {
   // 获取所有新闻
  
   $conn = db_connect();
   $query = "select * from products order by added_date desc";
    $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}



function get_prducts($catid) {
   // query database for the books in a category
   if ((!$catid) || ($catid == '')) {
     return false;
   }

   $conn = db_connect();
   $query = "select * from products where categoryid = '".$catid."'";
    $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_product_details($productid) {
  // query database for all details for a particular book
  if ((!$productid) || ($productid=='')) {
     return false;
  }
  $conn = db_connect();
  $query = "select * from products where productid='".$productid."'";
   $conn->set_charset("utf8");
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}


?>