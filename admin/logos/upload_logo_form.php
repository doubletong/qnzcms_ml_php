<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/logos/logo_output_fns.php');
    require_once('../../code/logos/logo_fns.php');
  
    do_html_doctype("上传标志_网站管理_".SITENAME);
  do_html_header();
  ?>
  <div id="content">
  
  <div class="toolbar"><a class="back" href="logolist.php">返回标志列表</a></div>
  
  <?php
  
  display_upload_logo_form();
  ?>
  </div>
  
  
  <?php 
  do_html_footer();
?>