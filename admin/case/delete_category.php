<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/case/case_output_fns.php');
 require_once('../../code/case/case_fns.php');
 require_once('../../code/case/case_v_fns.php');

 do_html_doctype("删除分类_案例_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div id="content">
  <div class="submenu">
    <ul>
        <li><a href="caselist.php">案例列表</a></li>
        <li class="current"><a href="categories.php">案例分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="back" href="categories.php">返回分类列表</a></div>
  
  

  
  <?php
  
  
  if (check_admin_user()) {
  if (isset($_POST['catid'])) {

   if(is_array($cases=get_cases($_POST['catid']))){
	foreach ($cases as $case) {
		if(is_array($photos = get_images($case['caseid']))){
			foreach ($photos as $row) {
				delete_photo($row['imgurl']);
			}
		}

		delete_case($case['caseid']);
	}

}

   if(delete_category($_POST['catid'])) {
      echo "<p class=\"yes\">分类已成功删除。</p>";
    }else {
      echo "<p class=\"error\">分类删除失败。</p>";
    }
  } else {
    echo "<p class\"info\">您还没有指定ID。请再试一次。</p>";
  }

} else {
  echo "<p class=\"warning\">您没有权限查看此页。</p>";
}
?>
</div>
<?php 
  
  do_html_footer();
?>




