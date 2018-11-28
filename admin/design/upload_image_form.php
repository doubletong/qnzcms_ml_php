<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/design/design_output_fns.php');
    require_once('../../code/design/design_v_fns.php');
  
    do_html_doctype("上传案例大图_案例_网站管理_".SITENAME);
		?>
    <link type="text/css" rel="stylesheet" href="<?php echo SITEPATH ?>static/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css" />
    <script type="text/javascript" src="<?php echo SITEPATH ?>static/admin/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

    <?php
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
                    	　<a class="btn btn-primary" href="designimg.php?designid=<?php echo $_GET['designid']; ?>"><i class="icon-reply"></i> 返回案例大图</a>
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
          
          display_uploadphoto_form();
          
          ?>
          </div>
      </div>
  </div>
  <?php 
  do_html_footer();
?>