<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/design/design_output_fns.php');
  require_once('../../code/design/design_v_fns.php');
  
 

do_html_doctype("添加案例_平面_网站管理_".SITENAME);
  do_html_header();
  ?>
  
  

      <div class="container-fluid">
          <div class="row-fluid">
        
              <div class="span12">
                  <ul class="breadcrumb">
                      <li><i class="icon-home"></i> <a href="<?php echo SITEPATH ?>admin/index.php">后台管理</a> <span class="divider">/</span></li>
                      <li class="active">平面</li>
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
              display_design_form();
              
              ?>
          </div>
      </div>
  </div>
  <?php   
  
  
  do_html_footer();
  
?>