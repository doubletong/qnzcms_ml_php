<?php
require_once('../../code/common_fns.php');
require_once('../../code/admin/common.php');
require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/admin/product_output_fns.php');
    require_once('../../code/admin/product_fns.php');
  
  do_html_header("上传产品缩略图_产品列表_网站管理");
  ?>
  
  <nav class="submenu">
    <ul>
        <li><a href="productlist.php">产品列表</a></li>
        <li><a href="categories.php">产品分类</a></li>
    </ul>    
  </nav>
  
  <div class="textr"><a href="insert_product_form.php">添加产品</a></div>
  
  <?php
  
if ($_FILES['userfile']['error'] > 0)
{
echo 'Problem:';
switch ($_FILES['userfile']['error'])
{
case 1: echo 'File exceeded upload_max_filesize';
break;
case 2: echo 'File exceeded max_file_size';
break;
case 3: echo 'File only partially uploaded';
break;
case 4: echo 'No file uploaded';
break;
case 6: echo 'Cannot upload file: No temp directory specified';
break;
case 7: echo 'Upload failed: Cannot write to disk';
break;
}
exit;
}
// Does the file have the right MIME type?
if ($_FILES['userfile']['type'] != 'image/jpeg' AND $_FILES['userfile']['type'] != 'image/gif' AND $_FILES['userfile']['type'] != 'image/pjpeg' AND $_FILES['userfile']['type'] != 'image/x-png')
{
echo 'Problem: 文件格式不正确。';
exit;
}
// put the file where we'd like it
$date = date('Ymdhis');
$fileName = $_FILES['userfile']['name'];
$name=explode('.',$fileName);
$upfile = '../../uploads/products/thumb/'.$date.'.'.$name[1];
if (is_uploaded_file($_FILES['userfile']['tmp_name']))
{
if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
{
echo 'Problem: Could not move file to destination directory';
exit;

}
}
else
{
echo 'Problem: Possible file upload attack. Filename: ';
echo $_FILES['userfile']['name'];
exit;
}
echo '<p>文件上传成功。</p>';
upload_thumb($_GET['proid'],$date.'.'.$name[1]);
  
  
  do_html_footer();
?>