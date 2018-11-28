<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/admin/product_output_fns.php');
    require_once('../../code/product_fns.php');
  
  do_html_header("上传产品缩略图_产品列表_网站管理");
  ?>
  
  <nav class="submenu">
    <ul>
        <li><a href="productlist.php">产品列表</a></li>
        <li><a href="categories.php">产品分类</a></li>
    </ul>    
  </nav>
  
  <div class="textr"><a href="insert_product_form.php">添加产品</a></div>
  
  <?php
  
  display_uploadthumb_form();
  
  
  do_html_footer();
?>