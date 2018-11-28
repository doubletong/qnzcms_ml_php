<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/news/news_output_fns.php');
  require_once('../../code/news/news_v_fns.php');
  
  do_html_doctype("编辑分类_新闻_网站管理_".SITENAME);
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
  if ($cat = get_category_details($_GET['catid'])) {   
    display_category_form($cat);
  } else {
    echo "<p class=\"error\">不能读取分类的详细信息。</p>";
  }

} else {
  echo "<p class=\"warning\">你没有权限。</p>";
}

?>
</div>
<?php 
  
  do_html_footer();
?>