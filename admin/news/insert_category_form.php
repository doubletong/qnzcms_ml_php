<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/news/news_output_fns.php');
  
  do_html_doctype("添加分类_新闻_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  
  <div id="content">
  <div class="submenu">
    <ul>
        <li><a href="newslist.php">新闻列表</a></li>
        <li class="current"><a href="categories.php">新闻分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="back" href="categories.php">返回分类列表</a></div>
  

  
  <?php
  display_category_form();
  
  ?>
  </div>
  <?php 
  do_html_footer();
?>