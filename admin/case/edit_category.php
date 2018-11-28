<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/case/case_output_fns.php');
  require_once('../../code/data_valid_fns.php');
  require_once('../../code/case/case_fns.php');

  do_html_doctype("更新分类_案例_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div id="content">
  <div class="submenu">
    <ul>
        <li><a href="caselist.php">案例列表</a></li>
        <li class="current"><a href="categories.php">案例分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="back" href="categories.php">返回分类列表</a></div>
  

  
  <?php
  
    if (check_admin_user()) {
  if (filled_out($_POST))   {
    $categoryid = $_POST['categoryid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $importance = $_POST['importance'];
    if(update_category($categoryid, $title,$description,$importance)) {
      echo "<p class=\"yes\">分类已被修改成功。</p>";
    } else {
      echo "<p class=\"error\">分类没有修改成功。</p>";
    }
  } else {
    echo "<p class=\"info\">您还没有填写表单。请再试一次。</p>";
  }

} else {
  echo "<p class=\"warning\">您没有权限查看此页。</p>";
}

?>
</div>
<?php 
  
  do_html_footer();
?>





