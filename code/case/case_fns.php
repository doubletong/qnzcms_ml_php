<?php
function insert_category($title,$description,$importance) {
// inserts a new category into the database

   $conn = db_connect();

   // check category does not already exist
   $query = "select *
             from bb_case_categories
             where title='".$title."'";
             
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }

   // insert new category
   $query = "insert into bb_case_categories values
            ('', '".$title."','".$description."','".$importance."','".$_SESSION['valid_user']."','".date('Y-m-d H:i:s')."')";
            
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function update_category($catid, $catname,$description,$importance) {
// change the name of category with catid in the database

   $conn = db_connect();

   $query = "update bb_case_categories
             set title='".$catname."',description='".$description."',importance='".$importance."'
             where categoryid='".$catid."'";
   $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function delete_category($catid) {
// Remove the category identified by catid from the db
// If there are books in the category, it will not
// be removed and the function will return false.

   $conn = db_connect();

   // check if there are any books in category
   // to avoid deletion anomalies

   $query = "delete from bb_case_categories
             where categoryid='".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function insert_case($title,$description,$demourl,$categoryid) {
// inserts a new category into the database

   $conn = db_connect();
  

   // insert new category
   $query = "insert into bb_case(title,description,demourl,viewcount,categoryid,addedby,addeddate) values
            ('".$title."','".$description."','".$demourl."',0,'".$categoryid."',
            '".$_SESSION['valid_user']."','".date('Y-m-d H:i:s')."')";
            
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function update_case($caseid, $title, $description, $demourl,$categoryid) {
// change details of book stored under $oldisbn in
// the database to new details in arguments

   $conn = db_connect();

   $query = "update bb_case
             set title= '".$title."',
             description = '".$description."',
             demourl = '".$demourl."',
             categoryid = '".$categoryid."'          
             where caseid = '".$caseid."'";

    $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

 
function upload_thumb($caseid,$thumb){
    //上传缩略图。
    
     $conn = db_connect();

   $query = "update bb_case
             set thumb= '".$thumb."'                 
             where caseid = '".$caseid."'";

    $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function delete_case($caseid) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect(); 

   $query = "select *
             from bb_case
             where caseid = '".$caseid."'";
   
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
   	$result = @$result->fetch_assoc();
   	if(!empty($result['thumb'])) {
   	$file = "../../static/uploads/case/thumb/".$result['thumb'];
   	unlink($file) or die("不能删除文件 $file：$php_errormsg ");
   	}
   }
   
   $query = "delete from bb_case
             where caseid='".$caseid."'";
   $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}


function upload_photo($caseid,$imgurl){
	//上传缩略图。

	$conn = db_connect();

	 $query = "insert into bb_case_photos(imgurl,caseid,addedby,addeddate) values
            ('".$imgurl."','".$caseid."','".$_SESSION['valid_user']."','".date('Y-m-d H:i:s')."')";

	$conn->set_charset("utf8");
	$result = @$conn->query($query);
	if (!$result) {
		return false;
	} else {
		return true;
	}
}


function delete_photo($url) {
	// delete one URL from the database
	$conn = db_connect();
	
	$file = "../../static/uploads/case/".$url;
	if(file_exists($file)){
		unlink($file) or die("不能删除大图 $file：$php_errormsg ");
	}
	
	
	// delete the bookmark
	if (!$conn->query("delete from bb_case_photos where
     imgurl='".$url."'")) {
     throw new Exception('大图不能被删除.');
	}
	return true;
}

?>