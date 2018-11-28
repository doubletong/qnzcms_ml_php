<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/case/case_output_fns.php');
  require_once('../../code/case/case_v_fns.php');
  
 

do_html_doctype("添加案例_案例_网站管理_".SITENAME);
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
  display_case_form();
  
  ?>
  </div>
  <?php   
  
  
  do_html_footer();
  
?>