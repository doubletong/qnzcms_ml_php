<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/logos/logo_output_fns.php');
  require_once('../../code/logos/logo_v_fns.php');

  
 do_html_doctype("标志列表_网站管理_".SITENAME);
  do_html_header();
  ?>
  

  <div id="content">
  
  <div class="toolbar"><a class="add" href="insert_logo_form.php">添加标志</a></div>
  
  <?php
  
        // get categories out of database
  $logo_array = get_logos();

  // display as links to cat pages
  display_logos($logo_array);
  ?>
    </div>
    <?php 
  
  do_html_footer();
?>