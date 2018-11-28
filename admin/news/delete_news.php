<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/news/news_output_fns.php');
 require_once('../../code/news/news_fns.php');

 do_html_doctype("删除新闻_新闻_网站管理_".SITENAME);
  do_html_header("删除新闻_新闻_网站管理");
  ?>
  
  <div id="content">
  <div class="submenu">
    <ul>
        <li class="current"><a href="newslist.php">新闻列表</a></li>
        <li><a href="categories.php">新闻分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="back" href="newslist.php">返回新闻列表</a></div>
  

  
  <?php
  
  
  if (check_admin_user()) {
  if (isset($_POST['articleid'])) {
   if(delete_news($_POST['articleid'])) {
      echo "<p class=\"yes\">新闻被删除。</p>";
    }else {
      echo "<p class=\"error\">新闻删除失败。</p>";
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




