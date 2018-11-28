<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/logos/logo_output_fns.php');
  require_once('../../code/logos/logo_v_fns.php');
  
  do_html_doctype("编辑标志_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div id="content">
  
  <div class="toolbar"><a class="back" href="logolist.php">返回标志列表</a></div>
   
  
  <?php
  if (check_admin_user()) {
  if ($logo = get_logo_details($_GET['logoid'])) {   
    display_logo_form($logo);
  } else {
    echo "<p>没有获得标志详细内容</p>";
  }
 
} else {
  echo "<p>你没有权限。</p>";
}
?>
</div>

<?php 

  
  do_html_footer();
?>