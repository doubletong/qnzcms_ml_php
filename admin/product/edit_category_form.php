<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/admin/product_output_fns.php');
  require_once('../../code/product_fns.php');
  
  do_html_header("编辑分类_产品_网站管理");
  ?>
  
  <nav class="submenu">
    <ul>
        <li><a href="productlist.php">产品列表</a></li>
        <li><a href="categories.php">产品分类</a></li>
    </ul>    
  </nav>
  
  <div class="textr"><a href="categories.php">返回分类列表</a></div>
 
  
  <?php
  if (check_admin_user()) {
  if ($cat = get_category_details($_GET['catid'])) {   
    display_category_form($cat);
  } else {
    echo "<p>Could not retrieve category details.</p>";
  }
  do_html_url("categories.php", "返回分类列表");
} else {
  echo "<p>你没有权限。</p>";
}


  
  do_html_footer();
?>