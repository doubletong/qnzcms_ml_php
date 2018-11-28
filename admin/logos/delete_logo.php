<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/logos/logo_output_fns.php');
 require_once('../../code/logos/logo_fns.php');

 do_html_doctype("删除标志_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  
  
  <div id="content">
  <div class="toolbar"><a class="back" href="logolist.php">返回标志列表</a></div>
  

  
  <?php
  
  if (check_admin_user()) {
  if (isset($_POST['logoid'])) {
	
   if(delete_logo($_POST['logoid'])) {
      echo "<p class=\"yes\">标志被删除。</p>";
    }else {
      echo "<p class=\"error\">标志不能被删除，有可能是空的。</p>";
    }
  } else {
    echo "<p class=\"info\">您还没有指定ID。请再试一次。</p>";
  }

} else {
  echo "<p class=\"warning\">您没有权限查看此页。</p>";
}
?>
</div>
<?php 
  
  do_html_footer();
?>




