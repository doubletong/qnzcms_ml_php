<?php
  require_once('../../code/common_fns.php');
  require_once('../../code/admin/common.php');
  require_once('../../code/db_fns.php');
  require_once('../../code/user_auth_fns.php');
  require_once('../../code/design/design_output_fns.php');
 require_once('../../code/design/design_fns.php');
 require_once('../../code/design/design_v_fns.php');

 do_html_doctype("删除分类_平面_网站管理_".SITENAME);
  do_html_header();
  ?>
  
   <div class="container-fluid">
          <div class="row-fluid">
        
              <div class="span12">
                  <ul class="breadcrumb">
                      <li><i class="icon-home"></i> <a href="<?php echo SITEPATH ?>admin/index.php">后台管理</a> <span class="divider">/</span></li>
                     <li> <a href="<?php echo SITEPATH ?>admin/design/designlist.php">平面</a> <span class="divider">/</span></li>
                      <li class="active">删除分类</li>
                    </ul>
                    
                    <a class="btn btn-primary pull-right" href="categories.php"><i class="icon-reply"></i> 返回分类列表</a>
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
              
              
              if (check_admin_user()) {
              if (isset($_POST['catid'])) {
            
               if(is_array($designs=get_designs($_POST['catid']))){
                foreach ($designs as $design) {
                    if(is_array($photos = get_images($design['designid']))){
                        foreach ($photos as $row) {
                            delete_photo($row['imgurl']);
                        }
                    }
            
                    delete_design($design['designid']);
                }
            
            }
            
               if(delete_category($_POST['catid'])) {
                 
                   echo '<div class="alert alert-success">';
                                                echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                                                echo '<i class="icon-ok-sign"></i> 分类已成功删除。</div>';
                }else {
                 
                  echo '<div class="alert alert-error">';
                                    echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                                    echo '<i class="icon-remove-sign"></i> 分类删除失败。</div>';
                }
              } else {
              
                echo '<div class="alert alert-info">';
                                                echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
                                                echo '<i class="icon-info-sign"></i> 您还没有指定ID。请再试一次。</div>';
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




