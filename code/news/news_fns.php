<?php
function insert_category($title,$description,$importance) {
// inserts a new category into the database

   $conn = db_connect();

   // check category does not already exist
   $query = "select *
             from bb_news_categories
             where title='".$title."'";
             
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if ((!$result) || ($result->num_rows!=0)) {
     return false;
   }

   // insert new category
   $query = "insert into bb_news_categories values
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

   $query = "update bb_news_categories
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
   $query = "select *
             from bb_news
             where categoryid='".$catid."'";

   $result = @$conn->query($query);
   if ((!$result) || (@$result->num_rows > 0)) {
     return false;
   }

   $query = "delete from bb_news_categories
             where categoryid='".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function insert_news($title,$description,$content,$categoryid) {
// inserts a new category into the database

   $conn = db_connect();
  

   // insert new category
   $query = "insert into bb_news values
            ('', '".$title."','".$description."','".$content."',0,'".$categoryid."',
            '".$_SESSION['valid_user']."','".date('Y-m-d H:i:s')."')";
            
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}



function update_news($articleid, $title, $description, $content,$categoryid) {
// change details of book stored under $oldisbn in
// the database to new details in arguments

   $conn = db_connect();

   $query = "update bb_news
             set title= '".$title."',
             description = '".$description."',
             content = '".$content."',
             categoryid = '".$categoryid."'          
             where articleid = '".$articleid."'";

    $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}





function delete_news($articleid) {
// Deletes the book identified by $isbn from the database.

   $conn = db_connect();

   $query = "delete from bb_news
             where articleid='".$articleid."'";
   $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function insert_comment($artid,$comment,$addedBy,$email,$site) {
// 插入评论

   $conn = db_connect();

   // insert new category
   $query = "insert into bb_news_comments values
            ('', '".$artid."','".$comment."','".$email."','".$site."','".$_SERVER['REMOTE_ADDR']."','".$addedBy."','".date('Y-m-d H:i:s')."')";
            
   $conn->set_charset("utf8");
   $result = $conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}

function delete_comment($commentid) {
// 删除文章评论.

   $conn = db_connect();

   $query = "delete from bb_news_comments
             where commentid='".$commentid."'";
   $conn->set_charset("utf8");
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   } else {
     return true;
   }
}


?>