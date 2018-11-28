<?php
require_once('../code/common_fns.php');
require_once('../code/db_fns.php');
require_once('../code/news/news_fns.php');

	$artid = $_POST['artid'];
	$comment = $_POST['comment'];
    $userName = $_POST['userName'];
    $email = $_POST['email'];
    $site = $_POST['site'];
	
    if(insert_comment($artid,$comment,$userName,$email,$site)) {
      	echo '<li class="media"><span class="pull-left">';
		show_gravatar($email, 64, '', X);
		echo '</span><div class="media-body"><div class="media-note"> <i class="icon-user"></i> '.$name.' posted at  <i class="icon-time"></i> '.date('Y-m-d H:i:s').'</div>';
		echo "<p>$comment</p>";		
		echo "</div></li>";	
    }

 ?>