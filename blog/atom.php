<?php

require_once('../code/db_fns.php');
require_once('../code/news/news_v_fns.php');
require_once('../code/feed.php');

$news_array = get_news_for_rss(10);

//显示所有新闻
$atom = new atom1('黑鸟日志','http://wuay.me/blog/','黑鸟日志','http://wuay.me/atom/feed/ids/1');
	if (is_array($news_array)) {
			//遍历项
		foreach ($news_array as $row) {
			$url = "http://wuya.me/blog/article_".$row['articleid'].".html";
			$atom->addEntry($row['title'],$url,$row['description'],"http://wuay.me/atom/feed/ids/".$row['articleid']);		
		}		
	}
print $atom->saveXML();
?>