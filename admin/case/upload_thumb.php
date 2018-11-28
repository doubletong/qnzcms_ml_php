<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/case/case_output_fns.php');
  require_once('../../code/case/case_fns.php');
  require_once('../../code/case/case_v_fns.php');
  
do_html_doctype("上传案例缩略图_案例_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div id="content">
  <div class="submenu">
    <ul>
        <li class="current"><a href="caselist.php">案例列表</a></li>
        <li><a href="categories.php">案例分类</a></li>
    </ul>    
  </div>
  
  <div class="toolbar"><a class="back" href="caselist.php">返回案例列表</a></div>
  
  
  <?php
  

  
  
if ($_FILES['userfile']['error'] > 0)
{
echo '问题：';
switch ($_FILES['userfile']['error'])
{
case 1: echo '文件超出的最大上传尺寸（upload_max_filesize）。';
break;
case 2: echo '文件超出最大尺寸（ max_file_size）。';
break;
case 3: echo '文件只有部分被上传。';
break;
case 4: echo '没有文件被上传。';
break;
case 6: echo '不能上传文件：未指定临时目录。';
break;
case 7: echo '上传失败：无法写入到磁盘。';
break;
}
exit;
}
// Does the file have the right MIME type?
if ($_FILES['userfile']['type'] != 'image/jpeg' AND $_FILES['userfile']['type'] != 'image/gif' AND $_FILES['userfile']['type'] != 'image/pjpeg' AND $_FILES['userfile']['type'] != 'image/png')
{
echo '问题: 文件格式不正确。';
exit;
}
// put the file where we'd like it
$date = date('Ymdhis');
$fileName = $_FILES['userfile']['name'];
$name=explode('.',$fileName);
$upfile = '../../static/uploads/case/thumb/'.$date.'.'.$name[1];
if (is_uploaded_file($_FILES['userfile']['tmp_name']))
{
if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
{
echo '问题：无法移动文件到目标目录。';
exit;

}
}
else
{
echo '<p class="error">问题：可能文件上传攻击。文件名：';
echo $_FILES['userfile']['name'].'</p>';
exit;
}
echo '<p class="yes">文件上传成功。</p>';

$case = get_case_details($_GET['caseid']);
if(isset($case)){
if(!empty($case["thumb"])){
	$file = "../../static/uploads/case/thumb/".$case["thumb"];
	if(file_exists($file)){
		unlink($file) or die("不能删除文件 $file：$php_errormsg ");
	}
}
}

upload_thumb($_GET['caseid'],$date.'.'.$name[1]);
  
?>
  </div>
  <?php 
  do_html_footer();
?>