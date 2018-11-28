<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/slider/slider_output_fns.php');
  require_once('../../code/slider/slider_v_fns.php');
  
  do_html_doctype("编辑幻灯_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div id="content">
  
  <div class="toolbar"><a class="back" href="sliderlist.php">返回幻灯列表</a></div>
   
  
  <?php
  if (check_admin_user()) {
  if ($slider = get_slider_details($_GET['sliderid'])) {   
    display_slider_form($slider);
  } else {
    echo "<p>没有获得幻灯详细内容</p>";
  }
 
} else {
  echo "<p>你没有权限。</p>";
}
?>
</div>

<?php 

  
  do_html_footer();
?>