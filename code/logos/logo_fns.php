<?php
function insert_logo($logoid,$title,$importance) {
// 插入新幻灯到数据库
   
   $conn = db_connect();

   // check logo does not already exist
   $query = "select *
             from bb_logos
             where logoid = '".$logoid."'";
             
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }

   // insert new category
   $query = "insert into bb_logos values
            ('', '".$title."','".$importance."','','".$_SESSION['valid_user']."','".date('Y-m-d H:i:s')."')";
            
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function update_logo($logoid, $title,$importance) {
// change logo with logoid in the database

   $conn = db_connect();

   $query = "update bb_logos
             set title='".$title."',importance='".$importance."'
             		 where logoid='".$logoid."'";
   $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}


function upload_image($logoid,$imgurl){
	//上传大图。

	$conn = db_connect();

	$query = "update bb_logos
             set thumbnails= '".$imgurl."'
             where productid = '".$logoid."'";

	$conn->set_charset("utf8");
	$result = @$conn->query($query);
	if (!$result) {
		return false;
	} else {
		return true;
	}
}



function delete_logo($logoid) {
// Remove the category identified by catid from the db
// If there are books in the category, it will not
// be removed and the function will return false.

   $conn = db_connect();

   // check if there are any books in category
   // to avoid deletion anomalies
   
   $query = "select *
             from bb_logos
             where logoid = '".$logoid."'";
    
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
   	 $result = @$result->fetch_assoc();
   	 
	 if(strlen($result['imgurl'])>4){
   	 $file = "../../static/uploads/logo/".$result['imgurl'];
	 
	 if (file_exists($file)) {
		unlink($file) or die("不能删除文件 $file：$php_errormsg ");		   
		}	 
	 }
   }
   

   $query = "delete from bb_logos
             where logoid='".$logoid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}


function upload_logo($logoid,$imgurl){
	//上传缩略图。

	$conn = db_connect();

	$query = "update bb_logos
             set imgurl = '".$imgurl."'
             where logoid = '".$logoid."'";

	$conn->set_charset("utf8");
	$result = @$conn->query($query);
	if (!$result) {
		return false;
	} else {
		return true;
	}
}




?>