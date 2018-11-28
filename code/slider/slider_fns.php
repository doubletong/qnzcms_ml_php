<?php
function insert_slider($sliderid,$title,$description,$link,$importance) {
// 插入新幻灯到数据库
   
   $conn = db_connect();

   // check slider does not already exist
   $query = "select *
             from bb_slider
             where sliderid = '".$sliderid."'";
             
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }

   // insert new category
   $query = "insert into bb_slider values
            ('', '".$title."', '".$description."','".$link."','".$importance."','','".$_SESSION['valid_user']."','".date('Y-m-d H:i:s')."')";
            
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function update_slider($sliderid, $title, $description,$link,$importance) {
// change slider with sliderid in the database

   $conn = db_connect();

   $query = "update bb_slider
             set title='".$title."',description = '".$description."', link='".$link."',importance='".$importance."'
             		 where sliderid='".$sliderid."'";
   $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}


function upload_image($sliderid,$imgurl){
	//上传大图。

	$conn = db_connect();

	$query = "update bb_slider
             set thumbnails= '".$imgurl."'
             where productid = '".$sliderid."'";

	$conn->set_charset("utf8");
	$result = @$conn->query($query);
	if (!$result) {
		return false;
	} else {
		return true;
	}
}



function delete_slider($sliderid) {
// Remove the category identified by catid from the db
// If there are books in the category, it will not
// be removed and the function will return false.

   $conn = db_connect();

   // check if there are any books in category
   // to avoid deletion anomalies
   
   $query = "select *
             from bb_slider
             where sliderid = '".$sliderid."'";
    
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
   	 $result = @$result->fetch_assoc();
   	 if(strlen($result['imgurl'])>4){
		
   	 $file = "../../static/uploads/slider/".$result['imgurl'];
	  if(file_exists($file)){
   		 unlink($file) or die("不能删除文件 $file：$php_errormsg ");
	  }
	 }
   }
   

   $query = "delete from bb_slider
             where sliderid='".$sliderid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}


function upload_slider($sliderid,$imgurl){
	//上传缩略图。

	$conn = db_connect();

	$query = "update bb_slider
             set imgurl = '".$imgurl."'
             where sliderid = '".$sliderid."'";

	$conn->set_charset("utf8");
	$result = @$conn->query($query);
	if (!$result) {
		return false;
	} else {
		return true;
	}
}




?>