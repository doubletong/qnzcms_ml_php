<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/news/news_output_fns.php');
  require_once('../../code/news/news_v_fns.php');
  
  // Make sure you are using a correct path here.
include_once '../../plugin/ckeditor/ckeditor.php';
 

do_html_doctype("添加新闻_新闻_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div id="content">
  <div class="submenu">
    <ul>
        <li class="current"><a href="newslist.php">新闻列表</a></li>
        <li><a href="categories.php">新闻分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="back" href="newslist.php">返回新闻列表</a></div>
  

  
  <?php
  display_news_form();
  
  
  ?>
  </div>
  <?php 
  do_html_footer();
  
?>