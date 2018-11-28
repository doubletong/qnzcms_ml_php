<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/design/design_output_fns.php');
  require_once('../../code/data_valid_fns.php');
  require_once('../../code/design/design_fns.php');

  do_html_doctype("更新案例_平面_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  
  
      <div class="container-fluid">
          <div class="row-fluid">
        
              <div class="span12">
                  <ul class="breadcrumb">
                      <li><i class="icon-home"></i> <a href="<?php echo SITEPATH ?>admin/index.php">后台管理</a> <span class="divider">/</span></li>
                     <li> <a href="<?php echo SITEPATH ?>admin/design/designlist.php">平面</a> <span class="divider">/</span></li>
                      <li class="active">更新案例</li>
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
  
    if (check_admin_user()) {
  if (filled_out($_POST))   {
    $designid = $_POST['designid'];
     $title = $_POST['inputtitle'];
    $description = $_POST['description'];
    $demourl = $_POST['demourl'];
    $categoryid = $_POST['categoryid'];
    if(update_design($designid, $title,$description,$demourl,$categoryid)) {
    
	  echo '<div class="alert alert-success">';
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
					echo '<i class="icon-ok-sign"></i> 案例已被修改成功。</div>';
    } else {
     
	  echo '<div class="alert alert-error">';
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
   					echo '<i class="icon-remove-sign"></i> 案例没有修改成功。</div>';
    }
  } else {
    echo '<div class="alert alert-info">';
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
  					echo '<i class="icon-info-sign"></i> 您还没有填写表单。请再试一次。</div>';
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



