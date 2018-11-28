<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/admin/product_output_fns.php');
  require_once('../../code/product_fns.php');
  
  // Make sure you are using a correct path here.
include_once '../../ckeditor/ckeditor.php';
 


  do_html_header("修改产品_产品_网站管理");
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
          if ($product = get_product_details($_GET['proid'])) {   
            display_product_form($product);
          } else {
            echo "<p>Could not retrieve product details.</p>";
          }
          do_html_url("productlist.php", "返回产品列表");
        } else {
          echo "<p>你没有权限。</p>";
        }

  
  do_html_footer();
  
?>