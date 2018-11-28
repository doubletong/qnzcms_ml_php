<?php 
  require_once('../code/common_fns.php');
  require_once('../code/admin/common.php');
  require_once('../code/db_fns.php');
  require_once('../code/user_auth_fns.php');
  require_once('../code/admin/output_fns.php');
  do_html_doctype("后台管理".SITENAME);
  do_html_header();
  
  ?>
  <div id="content">
  <?php 
  
  echo date('Y-m-d H:i:s');
  
  ?>
  </div>
  
  <?php 
  
  
  
  
  do_html_footer();
?>