<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/news/news_output_fns.php');
    require_once('../../code/news/news_v_fns.php');
  do_html_doctype("新闻分类_新闻_网站管理_".SITENAME);
  do_html_header("新闻分类_网站管理");
  ?>
  
<ul id="myTab" class="nav nav-tabs">
        <li><a href="newslist.php" >新闻</a></li>
        <li class="active"><a href="categories.php">分类</a></li>
        <li><a href="comments.php" >评论</a></li>
    </ul>  
  <div id="content">

  
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