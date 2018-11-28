<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/slider/slider_output_fns.php');
  require_once('../../code/slider/slider_v_fns.php');

  
 do_html_doctype("幻灯列表_网站管理_".SITENAME);
  do_html_header();
  ?>
  

  <div id="content">
  
  <div class="toolbar"><a class="btn btn-primary" href="insert_slider_form.php"><i class="icon-edit"></i> 添加幻灯</a></div>
  
  <?php
  
        // get categories out of database
  $slider_array = get_sliders();

  // display as links to cat pages
  display_sliders($slider_array);
  ?>
    </div>
    <?php 
  
  do_html_footer();
?>