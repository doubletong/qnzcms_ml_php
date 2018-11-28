<?php

function get_categories() {
   // query database for a list of categories
   $conn = db_connect();
   $query = "select * from bb_design_categories order by importance desc";
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
   $query = "select * from bb_design_categories
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
   $query = "select title from bb_design_categories
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



function get_alldesigns($count) {
   // 获取所有新闻
  
   $conn = db_connect();
   $query = ($count>0) ? "select * from bb_design order by addeddate desc  limit ".$count :"select * from bb_design order by addeddate desc";
  
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

function get_designsforhome() {
	// 获取案例到首页

	$conn = db_connect();
	$query ="select * from bb_design order by addeddate desc  limit 3";

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



function get_designs($catid) {
   // query database for the books in a category
   if ((!$catid) || ($catid == '')) {
     return false;
   }

   $conn = db_connect();
   $query = "select * from bb_design where categoryid = '".$catid."' order by addeddate desc";
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

function get_design_details($designid) {
  // query database for all details for a particular book
  if ((!$designid) || ($designid=='')) {
     return false;
  }
  $conn = db_connect();
  $query = "select * from bb_design where designid='".$designid."'";
   $conn->set_charset("utf8");
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}


function get_images($designid) {
	// query database for the books in a category
	if ((!$designid) || ($designid == '')) {
		return false;
	}

	$conn = db_connect();
	$query = "select * from bb_design_photos where designid = '".$designid."'";
	$conn->set_charset("utf8");
	$result = @$conn->query($query);
	if (!$result) {
		return false;
	}
	$num_photos = @$result->num_rows;
	if ($num_photos == 0) {
		return false;
	}
	$result = db_result_to_array($result);
	return $result;
}


function update_viewcount($designid) {
	// change details of book stored under $oldisbn in
	// the database to new details in arguments

	$conn = db_connect();

	$query = "update bb_design
             set viewcount = viewcount + 1  where designid = '".$designid."'";

	$conn->set_charset("utf8");
	$result = @$conn->query($query);
	if (!$result) {
		return false;
	} else {
		return true;
	}
}


?>