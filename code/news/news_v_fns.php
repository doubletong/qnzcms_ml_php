<?php

function get_categories() {
   // query database for a list of categories
   $conn = db_connect();
   $query = "select * from bb_news_categories order by importance desc";
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
   $query = "select * from bb_news_categories
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
   $query = "select title from bb_news_categories
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



function get_allnews() {
   // 获取所有新闻
  
   $conn = db_connect();
   $query = "select * from bb_news order by added_date desc";
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

function get_newpaging() {
   // 获取所有新闻数量
  
   $conn = db_connect();
   $stages = 8;
   $limit = 10; 
   $catid = mysql_escape_string($_GET['catid']);
   if($catid>0){
  	   $query = "select COUNT(*) as num FROM bb_news where categoryid = '".$catid."'";
	   $targetpage = "list_".$catid."_page_";
   }else{
	   $query = "select COUNT(*) as num FROM bb_news";
	   $targetpage = "list_page_";
   }
   
   
   $conn->set_charset("utf8");
   $result = @$conn->query($query);  

   $row = $result->fetch_array(MYSQL_ASSOC);
   $total_pages = $row['num'];
	
	
	$page = mysql_escape_string($_GET['page']);
	if($page){
		$start = ($page - 1) * $limit; 
	}else{
		$start = 0;	
		}

	// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;	
	
	$paging=array('total_pages'=> $total_pages,
			'page'=> $page,
			'limit'=> $limit,
			'start'=>$start,
			'prev'=>$prev,'next'=>$next,
			'lastpage'=>$lastpage,
			'lastPagem1'=>$LastPagem1,
			'targetpage'=>$targetpage,
			'stages'=>$stages
	);
   return $paging;
}


function get_Articles($start,$limit) {
   // 获取所有新闻
  
   $conn = db_connect();
   $query = "select * from bb_news order by added_date desc LIMIT $start, $limit";
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


function get_news_for_rss($count) {
   // 获取所有新闻
  
   $conn = db_connect();
   $query = "select * from bb_news order by added_date desc limit ".$count;
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



function get_ArticlesByCategory($catid,$start,$limit) {
   // query database for the books in a category
   if ((!$catid) || ($catid == '')) {
     return false;
   }

   $conn = db_connect();
   $query = "select * from bb_news where categoryid = '".$catid."' order by added_date desc LIMIT $start, $limit";
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

function get_news_details($articleid) {
  // query database for all details for a particular book
  if ((!$articleid) || ($articleid=='')) {
     return false;
  }
  $conn = db_connect();
  $query = "select * from bb_news where articleid='".$articleid."'";
   $conn->set_charset("utf8");
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}


function update_viewcount($articleid) {
	// change details of book stored under $oldisbn in
	// the database to new details in arguments

	$conn = db_connect();

	$query = "update bb_news
             set viewcount = viewcount + 1  where articleid = '".$articleid."'";

	$conn->set_charset("utf8");
	$result = @$conn->query($query);
	if (!$result) {
		return false;
	} else {
		return true;
	}
}



function get_article_comment_paging() {
   // 获取评论数量
    
   $conn = db_connect();
   $stages = 8; //导航链接个数
   $limit = 10; //一页多少条记录

	   $query = "select COUNT(*) as num FROM `bb_news_comments`";	  
	   $targetpage = "comments.php?page="; //所在的页面

   $conn->set_charset("utf8");
   $result = @$conn->query($query);  

   $row = $result->fetch_array(MYSQL_ASSOC);
   $total_pages = $row['num'];
	
	
	$page = mysql_escape_string($_GET['page']);
	if($page){
		$start = ($page - 1) * $limit; 
	}else{
		$start = 0;	
		}

	// Initial page num setup
	if ($page == 0){$page = 1;}
	$prev = $page - 1;	
	$next = $page + 1;							
	$lastpage = ceil($total_pages/$limit);		
	$LastPagem1 = $lastpage - 1;	
	
	$paging=array('total_pages'=> $total_pages,
			'page'=> $page,
			'limit'=> $limit,
			'start'=>$start,
			'prev'=>$prev,'next'=>$next,
			'lastpage'=>$lastpage,
			'lastPagem1'=>$LastPagem1,
			'targetpage'=>$targetpage,
			'stages'=>$stages
	);
   return $paging;
}


function get_article_comments($start,$limit) {
   // 获取新闻评论

   $conn = db_connect();
   $query = "select * from `bb_news_comments` order by added_date desc LIMIT $start, $limit";
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

function getCommentsByArtice($artid) {
   // 获取新闻评论
   $conn = db_connect();
   $query = "SELECT * FROM  `bb_news_comments` where articleid = '".$artid."'";
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

?>