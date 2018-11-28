<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/slider/slider_output_fns.php');
  require_once('../../code/slider/slider_v_fns.php');
  

 

  do_html_doctype("添加幻灯_网站管理_".SITENAME);
  do_html_header();
  ?>
 
  <div id="content">
  <div class="toolbar"><a class="btn" href="sliderlist.php"><i class="icon-hand-left"></i> 返回分类列表</a></div>
  

  
  <?php
  display_slider_form();
  ?>
  </div>
  <?php 
  do_html_footer();
  
?>