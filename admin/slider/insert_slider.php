<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/slider/slider_output_fns.php');
 require_once('../../code/data_valid_fns.php');
 require_once('../../code/slider/slider_fns.php');

 do_html_doctype("正添加幻灯_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  
  <div id="content">
  <div class="toolbar"><a class="back" href="sliderlist.php">返回分类列表</a></div>
  

  
  <?php
  
  
  if (check_admin_user()) {
  if (filled_out($_POST))   {
    $title = $_POST['title'];
	$description = $_POST['description'];	
    $link = $_POST['link'];
    $importance = $_POST['importance'];
    if(insert_slider('',$title,$description,$link,$importance)) {
      echo "<p class=\"yes\">幻灯\"".$title."\"已被添加数据库。</p>";
    } else {
      echo "<p class=\"error\">幻灯\"".$title."\"没有添加成功。</p>";
    }
  } else {
    echo "<p>您还没有填写表单。请再试一次。</p>";
  }

} else {
  echo "<p>您没有权限查看此页。</p>";
}
?>

</div>
<?php 
  
  do_html_footer();
?>





