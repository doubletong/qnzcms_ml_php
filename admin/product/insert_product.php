<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/admin/product_output_fns.php');
    require_once('../../code/data_valid_fns.php');
 require_once('../../code/admin/product_fns.php');

  
  do_html_header("正添加产品_产品_网站管理");
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
  if (filled_out($_POST))   {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $categoryid = $_POST['categoryid'];
    if(insert_product($title,$description,$content,$categoryid)) {
      echo "<p>新闻\"".$title."\"已被添加数据库。</p>";
    } else {
      echo "<p>新闻\"".$title."\"没有添加成功。</p>";
    }
  } else {
    echo "<p>您还没有填写表单。请再试一次。</p>";
  }
  do_html_url('productlist.php', '返回到产品列表');
} else {
  echo "<p>您没有权限查看此页。</p>";
}

  
  do_html_footer();
?>





