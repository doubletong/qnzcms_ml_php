<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/admin/product_output_fns.php');
    require_once('../../code/product_fns.php');
  
  do_html_header("新闻分类_网站管理");
  ?>
  
  <nav class="submenu">
    <ul>
        <li><a href="productlist.php">产品列表</a></li>
        <li><a href="categories.php">产品分类</a></li>
    </ul>    
  </nav>
  
  <div class="textr"><a href="insert_category_form.php">添加分类</a></div>
  
  

  
  <?php
  
      // get categories out of database
  $cat_array = get_categories();

  // display as links to cat pages
  display_categories($cat_array);
  
  
  do_html_footer();
?>