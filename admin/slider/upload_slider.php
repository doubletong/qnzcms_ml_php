<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/slider/slider_output_fns.php');
    require_once('../../code/slider/slider_fns.php');
    
    
    do_html_doctype("上传幻灯图_网站管理_".SITENAME);
    
  do_html_header();
  ?>
  

  <div id="content">
  
  <div class="toolbar"><a class="back" href="sliderlist.php">返回幻灯列表</a></div>
  
  <?php
  
if ($_FILES['userfile']['error'] > 0)
{
echo '<p clasee="error">问题:';
switch ($_FILES['userfile']['error'])
{
case 1: echo '文件超出的最大上传尺寸（upload_max_filesize）。</p>';
break;
case 2: echo '文件超出最大尺寸（ max_file_size）。</p>';
break;
case 3: echo '文件只有部分被上传。</p>';
break;
case 4: echo '没有文件被上传。</p>';
break;
case 6: echo '不能上传文件：未指定临时目录。</p>';
break;
case 7: echo '上传失败：无法写入到磁盘。</p>';
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
$upfile = '../../static/uploads/slider/'.$date.'.'.$name[1];
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
echo '问题：可能文件上传攻击。文件名：';
echo $_FILES['userfile']['name'];
exit;
}
echo '<p class="yes">文件上传成功。</p>';
upload_slider($_GET['sliderid'],$date.'.'.$name[1]);
  
  ?>
  
  </div>
  
  <?php 
  do_html_footer();
?>