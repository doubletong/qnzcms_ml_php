<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/slider/slider_output_fns.php');
 require_once('../../code/slider/slider_fns.php');

 do_html_doctype("删除幻灯_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  
  <div id="content">
  
  <div class="toolbar"><a class="back" href="sliderlist.php">返回幻灯列表</a></div>
  

  
  <?php
  
  if (check_admin_user()) {
  if (isset($_POST['sliderid'])) {
	
   if(delete_slider($_POST['sliderid'])) {
      echo "<p class=\"yes\">幻灯被删除。</p>";
    }else {
      echo '<p class="error">幻灯不能被删除，有可能是空的。</p>';
    }
  } else {
    echo '<p class="info">您还没有指定ID。请再试一次。</p>';
  }

} else {
  echo '<p class="warning">您没有权限查看此页。</p>';
}

  ?>
  </div>
  <?php 
  do_html_footer();
?>




