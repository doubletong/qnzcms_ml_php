<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/case/case_output_fns.php');
  require_once('../../code/data_valid_fns.php');
  require_once('../../code/case/case_fns.php');

  do_html_doctype("更新案例_案例_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div id="content">
  <div class="submenu">
    <ul>
        <li class="current"><a href="caselist.php">案例列表</a></li>
        <li><a href="categories.php">案例分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="back" href="caselist.php">返回案例列表</a></div>
  
  
  
  <?php
  
    if (check_admin_user()) {
  if (filled_out($_POST))   {
    $caseid = $_POST['caseid'];
     $title = $_POST['title'];
    $description = $_POST['description'];
    $demourl = $_POST['demourl'];
    $categoryid = $_POST['categoryid'];
    if(update_case($caseid, $title,$description,$demourl,$categoryid)) {
      echo '<p class="yes">案例已被修改成功。</p>';
    } else {
      echo '<p class="info">案例没有修改成功。</p>';
    }
  } else {
    echo '<p class="info">您还没有填写表单。请再试一次。</p>';
  }

} else {
  echo '<p class="warning">您没有权限查看此页。</p>';
}

?>
  </div>
 <?php 
  
  do_html_footer();
?>



