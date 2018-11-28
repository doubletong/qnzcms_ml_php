<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/logos/logo_output_fns.php');
  require_once('../../code/data_valid_fns.php');
  require_once('../../code/logos/logo_fns.php');

  do_html_doctype("更新标志_网站管理_".SITENAME);
  do_html_header();
  ?>
  

  
  <div id="content">
  <div class="toolbar"><a class="back" href="logolist.php">返回标志列表</a></div>
  

  
  <?php
  
    if (check_admin_user()) {
  if (filled_out($_POST))   {
    $logoid = $_POST['logoid'];
    $title = $_POST['title'];
    $importance = $_POST['importance'];
    if(update_logo($logoid, $title,$importance)) {
      echo "<p class=\"yes\">标志已被修改成功。</p>";
    } else {
      echo "<p class=\"error\">标志没有修改成功。</p>";
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





