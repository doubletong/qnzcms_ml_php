<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/design/design_output_fns.php');
  require_once('../../code/design/design_fns.php');
  require_once('../../code/design/design_v_fns.php');
  
do_html_doctype("上传案例缩略图_案例_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  <div class="container-fluid">
          <div class="row-fluid">
        
              <div class="span12">
                  <ul class="breadcrumb">
                      <li><i class="icon-home"></i> <a href="<?php echo SITEPATH ?>admin/index.php">后台管理</a> <span class="divider">/</span></li>
                     <li> <a href="<?php echo SITEPATH ?>admin/design/designlist.php">平面</a> <span class="divider">/</span></li>
                      <li class="active">上传缩略图</li>
                    </ul>
                    
                    <a class="btn btn-primary pull-right" href="designlist.php"><i class="icon-reply"></i> 返回案例列表</a>
                    <ul id="myTab" class="nav nav-tabs">
                      <li class="active"><a href="designlist.php">平面</a></li>
                      <li><a href="categories.php">分类</a></li> 
                    </ul>
              
              </div>
              
           </div>
  		</div>
        
        
   	<div class="container-fluid">
          <div class="row-fluid">
  

  
  
  <?php
   	
					
  
if ($_FILES['userfile']['error'] > 0)
{
	echo '<div class="alert alert-error">';
	echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	echo '<i class="icon-remove-circle"></i>';
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
	echo '</div>';
	exit;
}
// Does the file have the right MIME type?
if ($_FILES['userfile']['type'] != 'image/jpeg' AND $_FILES['userfile']['type'] != 'image/gif' AND $_FILES['userfile']['type'] != 'image/pjpeg' AND $_FILES['userfile']['type'] != 'image/png')
{
	echo '<div class="alert alert-error">';
	echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	echo '<i class="icon-remove-circle"></i>';
	echo '问题: 文件格式不正确。';
	echo '</div>';
	exit;
}
// put the file where we'd like it
$date = date('Ymdhis');
$fileName = $_FILES['userfile']['name'];
$name=explode('.',$fileName);
$upfile = '../../static/uploads/design/thumb/'.$date.'.'.$name[1];
if (is_uploaded_file($_FILES['userfile']['tmp_name']))
{
	if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
	{
		echo '<div class="alert alert-error">';
		echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		echo '<i class="icon-remove-circle"></i>';
		echo '问题：无法移动文件到目标目录。';
		echo '</div>';
		exit;
	}
}
else
{
		echo '<div class="alert alert-error">';
		echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
		echo '<i class="icon-remove-circle"></i>';
		echo '问题：可能文件上传攻击。文件名：';
		echo $_FILES['userfile']['name'];
		echo '</div>';

exit;
}
	echo '<div class="alert alert-success">';
	echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	echo '<i class="icon-ok-sign"></i> 文件上传成功。</div>';


$design = get_design_details($_GET['designid']);
if(isset($design)){
if(!empty($design["thumb"])){
	$file = "../../static/uploads/design/thumb/".$design["thumb"];
	if(file_exists($file)){
		
		unlink($file) or die("不能删除文件 $file：$php_errormsg ");
		
		
	}
}
}

upload_thumb($_GET['designid'],$date.'.'.$name[1]);
  
?>
  </div>
  </div>
  </div>
  <?php 
  do_html_footer();
?>