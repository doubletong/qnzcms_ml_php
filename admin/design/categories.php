<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/design/design_output_fns.php');
    require_once('../../code/design/design_v_fns.php');
    
    do_html_doctype("分类_网站管理_".SITENAME);
	  ?>
  <link type="text/css" rel="stylesheet" href="<?php echo SITEPATH ?>static/admin/plugins/DataTables-1.9.4/media/css/dataTable_bootstrap.css" />
  <script src="<?php echo SITEPATH ?>static/admin/plugins/DataTables-1.9.4/media/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo SITEPATH ?>static/admin/js/mydTable.js"></script>
  
  <?php
  do_html_header();
  ?>
  

      <div class="container-fluid">
          <div class="row-fluid">
        
              <div class="span12">
                  <ul class="breadcrumb">
                      <li><i class="icon-home"></i> <a href="<?php echo SITEPATH ?>admin/index.php">后台管理</a> <span class="divider">/</span></li>
                      <li> <a href="<?php echo SITEPATH ?>admin/design/designlist.php">平面</a> <span class="divider">/</span></li>
                      <li class="active">分类</li>
                    </ul>
                    
                    <a class="btn btn-primary pull-right" href="insert_category_form.php"><i class="icon-edit"></i> 添加分类</a>
                    <ul id="myTab" class="nav nav-tabs">
                      <li><a href="designlist.php">平面</a></li>
                      <li class="active"><a href="categories.php">分类</a></li> 
                    </ul>
              
              </div>
              
           </div>
  		</div>
        
        
       <div class="container-fluid">
          <div class="row-fluid">  

  
			  <?php
              
                  // get categories out of database
              $cat_array = get_categories();
            
              // display as links to cat pages
              display_categories($cat_array);
              
              ?>
          </div>
      </div>
  </div>
    <?php 
  do_html_footer();
?>