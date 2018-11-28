<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/data_valid_fns.php');
  require_once('../../code/design/design_output_fns.php');
 require_once('../../code/design/design_fns.php');

 do_html_doctype("删除大图_平面_网站管理_".SITENAME);
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
                    <div class="pull-right">      
                    	<a class="btn" href="designimg.php?designid=<?php echo $_GET['designid']; ?>"><i class="icon-reply"></i> 返回案例大图</a>
                        <a class="btn btn-primary" href="upload_image_form.php?designid=<?php echo $_GET['designid'];?>"><i class="icon-upload"></i> 上传大图</a>
                        <a class="btn" href="designlist.php"><i class="icon-reply"></i> 返回案例列表</a>
                    </div>
                    
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
  
  $del_me = $_POST['del_me'];
 
  if (check_admin_user()) {
  	
	if (!filled_out($_POST)) {
		echo '<div class="alert alert-info">';
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
  					echo '<i class="icon-info-sign"></i> 你没有选择任何图片。请再试一次。</div>';
		
		echo '</div></div></div>';	  
		  do_html_footer();	
		exit;
	} else {
		if (count($del_me) > 0) {
			foreach($del_me as $imgurl) {
				if (delete_photo($imgurl)) {
						echo '<div class="alert alert-success">';
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
					echo '<i class="icon-ok-sign"></i> 已删除“'.htmlspecialchars($imgurl).'”已被添加数据库。</div>';
				
					
					
				} else {
					echo '<div class="alert alert-error">';
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
   					echo '<i class="icon-remove-sign"></i> 不能删除"'.htmlspecialchars($imgurl).'"没有添加成功。</div>';
					
				}
			}
		} else {
			echo '<div class="alert alert-info">';
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
  					echo '<i class="icon-info-sign"></i> 没有选择要删除的大图。</div>';
			
		}
	}

  } else {

  	echo '<div class="alert alert-info">';
	echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
	echo '<i class="icon-info-sign"></i> 您没有权限查看此页。</div>';
}





?>
</div>
</div>
</div>
<?php 
  
  do_html_footer();
?>




