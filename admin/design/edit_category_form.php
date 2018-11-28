<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/design/design_output_fns.php');
  require_once('../../code/design/design_v_fns.php');
  
  do_html_doctype("编辑分类_案例_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  	<div class="container-fluid">
          <div class="row-fluid">
        
              <div class="span12">
                  <ul class="breadcrumb">
                      <li><i class="icon-home"></i> <a href="<?php echo SITEPATH ?>admin/index.php">后台管理</a> <span class="divider">/</span></li>
                      <li><a href="<?php echo SITEPATH ?>admin/design/designlist.php">平面</a> <span class="divider">/</span></li>
                      <li class="active">编辑分类</li>
                    </ul>
                    
                    <a class="btn pull-right" href="categories.php"><i class="icon-hand-left"></i> 返回分类列表</a>
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
              if ($cat = get_category_details($_GET['catid'])) {   
                display_category_form($cat);
              } else {
                echo "<p>Could not retrieve category details.</p>";
              }
            
            } else {
              echo "<p>你没有权限。</p>";
            }
            
            ?>
		</div>
	</div>
</div>
<?php 
  
  do_html_footer();
?>