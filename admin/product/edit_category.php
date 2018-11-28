<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/admin/product_output_fns.php');
  require_once('../../code/data_valid_fns.php');
  require_once('../../code/admin/product_fns.php');

  
  do_html_header("更新分类_产品_网站管理");
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
    $categoryid = $_POST['categoryid'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $importance = $_POST['importance'];
    if(update_category($categoryid, $title,$description,$importance)) {
      echo "<p>分类已被修改成功。</p>";
    } else {
      echo "<p>分类没有修改成功。</p>";
    }
  } else {
    echo "<p>您还没有填写表单。请再试一次。</p>";
  }
  do_html_url('categories.php', '返回分类');
} else {
  echo "<p>您没有权限查看此页。</p>";
}


  
  do_html_footer();
?>





