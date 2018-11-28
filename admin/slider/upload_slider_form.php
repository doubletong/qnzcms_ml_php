<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/slider/slider_output_fns.php');
    require_once('../../code/slider/slider_fns.php');
  
    do_html_doctype("上传幻灯图_网站管理_".SITENAME);
  do_html_header();
  ?>
  <div id="content">
  
  <div class="toolbar"><a class="back" href="sliderlist.php">返回幻灯列表</a></div>
  
  <?php
  
  display_upload_slider_form();
  ?>
  </div>
  
  
  <?php 
  do_html_footer();
?>