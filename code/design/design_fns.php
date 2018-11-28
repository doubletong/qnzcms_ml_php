<?php
function insert_category($title,$description,$importance) {
// inserts a new category into the database

   $conn = db_connect();

   // check category does not already exist
   $query = "select *
             from bb_design_categories
             where title='".$title."'";
             
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }

   // insert new category
   $query = "insert into bb_design_categories values
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

   $query = "update bb_design_categories
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

   $query = "delete from bb_design_categories
             where categoryid='".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function insert_design($title,$description,$demourl,$categoryid) {
// inserts a new category into the database

   $conn = db_connect();
  

   // insert new category
   $query = "insert into bb_design(title,description,demourl,viewcount,categoryid,addedby,addeddate) values
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



function update_design($designid, $title, $description, $demourl,$categoryid) {
// change details of book stored under $oldisbn in
// the database to new details in arguments

   $conn = db_connect();

   $query = "update bb_design
             set title= '".$title."',
             description = '".$description."',
             demourl = '".$demourl."',
             categoryid = '".$categoryid."'          
             where designid = '".$designid."'";

    $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

 
function upload_thumb($designid,$thumb){
    //上传缩略图。
    
     $conn = db_connect();

   $query = "update bb_design
             set thumb= '".$thumb."'                 
             where designid = '".$designid."'";

    $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function delete_design($designid) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect(); 

   $query = "select *
             from bb_design
             where designid = '".$designid."'";
   
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
   	$result = @$result->fetch_assoc();
   	if(!empty($result['thumb'])) {
   	$file = "../../static/uploads/design/thumb/".$result['thumb'];
   	
	if(file_exists($file)){
			unlink($file) or die("不能删除缩略图 $file：$php_errormsg ");
		}
   	}
   }
   
   $query = "delete from bb_design
             where designid='".$designid."'";
   $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}


function upload_photo($designid,$imgurl){
	//上传缩略图。

	$conn = db_connect();

	 $query = "insert into bb_design_photos(imgurl,designid,addedby,addeddate) values
            ('".$imgurl."','".$designid."','".$_SESSION['valid_user']."','".date('Y-m-d H:i:s')."')";

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
	
	$file = "../../static/uploads/design/".$url;
	if(file_exists($file)){
		unlink($file) or die("不能删除大图 $file：$php_errormsg ");
	}
	
	
	// delete the bookmark
	if (!$conn->query("delete from bb_design_photos where
     imgurl='".$url."'")) {
     throw new Exception('大图不能被删除.');
	}
	return true;
}

?>