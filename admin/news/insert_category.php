<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/news/news_output_fns.php');
    require_once('../../code/data_valid_fns.php');
 require_once('../../code/news/news_fns.php');

 do_html_doctype("正添加分类_新闻_网站管理_".SITENAME);
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
  if (filled_out($_POST))   {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $importance = $_POST['importance'];
    if(insert_category($title,$description,$importance)) {
      echo "<p class=\"yes\">分类\"".$title."\"已被添加数据库。</p>";
    } else {
      echo "<p class=\"error\">分类\"".$title."\"没有添加成功。</p>";
    }
  } else {
    echo "<p class=\"info\">您还没有填写完表单。请再试一次。<a href=\"insert_category_form.php\">点击返回</a></p>";
  }

} else {
  echo "<p class=\"warning\">您没有权限查看此页。</p>";
}
?>
</div>
<?php 
  
  do_html_footer();
?>





