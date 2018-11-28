<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/news/news_output_fns.php');
 require_once('../../code/news/news_fns.php');

 do_html_doctype("删除分类_新闻_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div id="content">
  <div class="submenu">
    <ul>
        <li><a href="newslist.php">新闻列表</a></li>
        <li class="current"><a href="categories.php">新闻分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="back" href="categories.php">返回分类列表</a></div>
  
  
  <?php
  
  
  if (check_admin_user()) {
  if (isset($_POST['catid'])) {
   if(delete_category($_POST['catid'])) {
      echo "<p class=\"yes\">分类成功删除。</p>";
    }else {
      echo "<p class=\"error\">分类删除失败。此分类下面可能还有新闻数据！</p>";
    }
  } else {
    echo "<p class=\"info\">您还没有指定ID。请再试一次。</p>";
  }

} else {
  echo "<p class=\"warning\">您没有权限查看此页。</p>";
}

?>
</div>

<?php
  
  do_html_footer();
?>




