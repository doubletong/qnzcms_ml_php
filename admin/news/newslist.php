<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/news/news_output_fns.php');
  require_once('../../code/news/news_v_fns.php');
  
 do_html_doctype("新闻列表_网站管理_".SITENAME);
 do_html_header();
  ?>

<ul class="breadcrumb">
  <li><a href="<?php echo SITEPATH ?>admin/index.php">后台管理</a> <span class="divider">/</span></li>
  <li class="active">文章管理</li>
</ul>
<ul id="myTab" class="nav nav-tabs">
  <li class="active"><a href="newslist.php">新闻</a></li>
  <li><a href="categories.php">分类</a></li>
  <li><a href="comments.php">评论</a></li>
</ul>
<div class="toolbar"><a class="btn btn-primary pull-right" href="insert_news_form.php"><i class="icon-edit"></i> 发布新闻</a></div>
<?php
  $pagination = get_newpaging();	//分页参数
        // get categories out of database
 
$news_array = get_Articles($pagination['start'],$pagination['limit']);
		display_news($news_array);
		?>
        </div>
<footer>
  <?php
			article_pagination($pagination)
		?>
</footer>
<?php 
  
  do_html_footer();
?>
