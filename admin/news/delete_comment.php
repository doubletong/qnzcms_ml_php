<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/news/news_output_fns.php');
 require_once('../../code/news/news_fns.php');

 do_html_doctype("删除评论_新闻_网站管理_".SITENAME);
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
<div class="toolbar"><a class="btn" href="comments.php"><i class="icon-back"></i> 返回评论列表</a></div>
<?php
  
  
if (check_admin_user()) {
  if (isset($_GET['commentid'])) {
   if(delete_comment($_GET['commentid'])) {
      echo '<p class="text-success"><i class="icon-ok"></i> 评论成功删除。</p>';
    }else {
      echo '<p class=\"text-error\"><i class="icon-remove"></i> 评论删除失败。</p>';
    }
  } else {
    echo "<p class=\"text-info\">您还没有指定ID。请再试一次。</p>";
  }

} else {
  echo "<p class=\"text-warning\">您没有权限查看此页。</p>";
}

?>
<?php
  
  do_html_footer();
?>
