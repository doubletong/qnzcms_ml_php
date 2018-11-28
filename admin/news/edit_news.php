<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/news/news_output_fns.php');
  require_once('../../code/data_valid_fns.php');
  require_once('../../code/news/news_fns.php');

  do_html_doctype("更新新闻_新闻_网站管理_".SITENAME);
  do_html_header();
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
  if (filled_out($_POST))   {
    $articleid = $_POST['articleid'];  
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['newscontent'];
      $categoryid = $_POST['categoryid'];
    if(update_news($articleid,$title,$description,$content,$categoryid)) {
      echo "<p class=\"yes\">新闻已被修改成功。</p>";
    } else {
      echo "<p class=\"error\">新闻没有修改成功。</p>";
    }
  } else {
    echo "<p class=\"info\">您还没有填写表单。请再试一次。</p>";
  }

} else {
  echo "<p class=\"warninig\">您没有权限查看此页。</p>";
}
?>

</div>

<?php 

  
  do_html_footer();
?>





