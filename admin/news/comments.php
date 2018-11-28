<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/news/news_output_fns.php');
  require_once('../../code/news/news_v_fns.php');
  
 do_html_doctype("文章评论管理_网站管理_".SITENAME);
 do_html_header();
  ?>
  <ul class="breadcrumb">
  <li><a href="<?php echo SITEPATH ?>admin/index.php">后台管理</a> <span class="divider">/</span></li>
  <li><a href="newslist.php">文章</a> <span class="divider">/</span></li>
  <li class="active">评论管理</li>
</ul>

      <ul id="myTab" class="nav nav-tabs">
        <li><a href="newslist.php">新闻</a></li>
        <li><a href="categories.php">分类</a></li>
        <li class="active"><a href="comments.php">评论</a></li>
    </ul>    
    <?php
  $pagination = get_article_comment_paging();	//分页参数(评论总数,页数) 
   
$comment_array = get_article_comments($pagination['start'],$pagination['limit']);//获取评论
		display_article_comments($comment_array); //显示评论
		?>
<footer>
  <?php
			pagination($pagination) //页导航
		?>
</footer>
    <?php 
  
  do_html_footer();
?>