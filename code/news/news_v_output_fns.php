<?php
function display_categories($cat_array) {
	if (!is_array($cat_array)) {
		echo "<p class=\"info\">还没有日志分类。</p>";
		return;
	}
	echo "<ul>";
	foreach ($cat_array as $row)  {		
		$url = "blog/list_".$row['categoryid']."/";
		$title = $row['title'];

		echo "<li>";
		do_html_url($url, $title);
		echo "</li>";	
	}
	echo "</ul>";

}




function display_news($news_array) {
	//显示所有新闻
	if (!is_array($news_array)) {
		echo '<p class="info">还没有发布的文章。</p>';
	} else {
		//create table
		echo '<ul id="artlist" class="nolist">';

		//create a table row for each book
		foreach ($news_array as $row) {
			$url = 'blog/article_'.$row['articleid'].'/';
			$editurl = "edit_news_form.php?artid=".$row['articleid'];
			echo '<li>';
			echo '<h3><i class="icon-location-arrow"></i> ';
			do_html_url($url, $row['title']);
			echo "</h3>";
			echo "<p class=\"des\">".$row['description']."</p>";
			echo '<p class="note"><i class="icon-user"></i> '.$row['added_by'].'　<i class="icon-calendar-empty"></i> <time datetime="'.$row['added_date'].'">'.$row['added_date'].'</time>　<i class="icon-eye-open"></i> '.$row['viewcount'].'</p>';
			echo '</li>';
		}

		echo "</ul>";
	}

}

function display_comments($comment_array) {
	
	if (is_array($comment_array)) {	
	echo '<div  class="title"><h3><i class="icon-comments"></i> 评论</h3></div>';
	echo '<ul id="commentlist"  class="media-list">';
	foreach ($comment_array as $row)  {		
		$comment = $row['comment'];
		$email = $row['email'];
		$site = $row['site'];
		$name = $row['added_by'];
		$addedDate = $row['added_date'];

		echo '<li class="media"><span class="pull-left">';
		show_gravatar($email, 64, '', X);
		echo '</span><div class="media-body"><div class="media-note"> <i class="icon-user"></i> '.$name.' posted at  <i class="icon-time"></i> '.$addedDate.'</div>';
		echo "<p>$comment</p>";		
		echo "</div></li>";	
	}
	echo "</ul>";
	}
}




?>