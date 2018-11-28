<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/data_valid_fns.php');
  require_once('../../code/case/case_output_fns.php');
 require_once('../../code/case/case_fns.php');

 do_html_doctype("删除大图_案例_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div id="content">
  <div class="submenu">
    <ul>
        <li class="current"><a href="caselist.php">案例列表</a></li>
        <li><a href="categories.php">案例分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="back" href="caselist.php">返回案例列表</a>　<a class="back" href="caseimg.php?caseid=<?php echo $_GET['caseid']; ?>">返回案例大图</a></div>
  
  

  
  <?php
  
  $del_me = $_POST['del_me'];
 
  if (check_admin_user()) {
  	
if (!filled_out($_POST)) {
	echo '<p class="info">你没有选择任何图片。请再试一次。</p>';	
	echo '</div>';	  
	  do_html_footer();	
	exit;
} else {
	if (count($del_me) > 0) {
		foreach($del_me as $imgurl) {
			if (delete_photo($imgurl)) {
				echo '<p class="yes">已删除 '.htmlspecialchars($imgurl).'.</p>';
				
				
			} else {
				echo '<p class="error">不能删除'.htmlspecialchars($imgurl).'.</p>';
			}
		}
	} else {
		echo '<p class="info">没有选择要删除的大图。</p>';
	}
}

  
  
  
} else {
  echo '<p class="Warning">您没有权限查看此页。</p>';
}





?>
</div>
<?php 
  
  do_html_footer();
?>




