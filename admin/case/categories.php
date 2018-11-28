<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/case/case_output_fns.php');
    require_once('../../code/case/case_v_fns.php');
    
    do_html_doctype("案例分类_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div id="content">
  <div class="submenu">
    <ul>
        <li><a href="caselist.php">案例列表</a></li>
        <li class="current"><a href="categories.php">案例分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="add" href="insert_category_form.php">添加分类</a></div>
  
  

  
  <?php
  
      // get categories out of database
  $cat_array = get_categories();

  // display as links to cat pages
  display_categories($cat_array);
  
  ?>
    </div>
    <?php 
  do_html_footer();
?>