<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/design/design_output_fns.php');
    require_once('../../code/design/design_v_fns.php');
    
  do_html_doctype("案例图片_平面_网站管理_".SITENAME);
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
              
                  // get categories out of database
              $img_array = get_images($_GET["designid"]);
            
              // display as links to cat pages
              display_images($img_array);
              
              ?>
            </div>
        </div>
    </div>
    <?php 
  do_html_footer();
?>