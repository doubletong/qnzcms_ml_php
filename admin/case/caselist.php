<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/case/case_output_fns.php');
  require_once('../../code/case/case_v_fns.php');
  
    do_html_doctype("案例列表_网站管理_".SITENAME);
  do_html_header();
  ?>
  <div id="content">
  <div class="submenu">
    <ul>
        <li class="current"><a href="caselist.php">案例列表</a></li>
        <li><a href="categories.php">案例分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="add" href="insert_case_form.php">添加案例</a></div>
  
  <?php
  
        // get categories out of database
  $cat_array = get_allcases(0);

  // display as links to cat pages
  display_cases($cat_array);
  
  ?>
  </div>
  <?php 
  do_html_footer();
?>