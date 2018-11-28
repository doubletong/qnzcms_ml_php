<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/case/case_output_fns.php');
 require_once('../../code/case/case_fns.php');
 require_once('../../code/case/case_v_fns.php');

 do_html_doctype("删除案例_案例_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div id="content">
  <div class="submenu">
    <ul>
        <li><a href="caselist.php">案例列表</a></li>
        <li class="current"><a href="categories.php">案例分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="back" href="caselist.php">返回案例列表</a></div>
  
  

  
  <?php
  
  
  if (check_admin_user()) {
  if (isset($_POST['caseid'])) {	

  if(is_array($photos = get_images($_POST['caseid']))){
	foreach ($photos as $row) {
		delete_photo($row['imgurl']);		
	}
	}
   
   if(delete_case($_POST['caseid'])) {
      echo "<p class=\"yes\">案例已成功删除。</p>";
    }else {
      echo "<p class=\"error\">案例不能被删除。</p>";
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

