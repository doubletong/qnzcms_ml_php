<?php

require_once('../code/db_fns.php');
require_once('../code/common_fns.php');
require_once('../code/user_auth_fns.php');
require_once('../code/output_fns.php');
require_once('../code/case/case_v_fns.php');
require_once('../code/case/case_v_output_fns.php');

$case = get_case_details($_GET['caseid']);
update_viewcount($_GET['caseid']); //更新显示数据

$category = get_category_details($case['categoryid']);

do_html_doctype($case['title']."_".$category['title']."_案例_".SITENAME);
?>


	
				
		
		<!-- Slider Kit compatibility -->
		<link rel="stylesheet" type="text/css" href="<?php echo SITEPATH ?>plugin/jquery.bxslider/jquery.bxslider.css" />
		

<?php 
do_html_header();

?>

<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="ico-lightbulb ico-white"></i><?php echo $case['title'] ?></h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->
    


<div id="wrapper">	
	<div  class="container">
    <div class="row">
		<div id="casecontent" class="clearfix span6">		
		
		<div id="case" >
			
			
			
		<?php 
		   $photos = get_images($case['caseid']);
		  		   
		   ?>
		   
		   <?php  display_images($photos);?>
		   	<?php display_images_thumbs($photos); ?>
		   
		   <!-- // end of photosgallery-std -->
		
		</div>
		</div>
		<div id="casedes" class="span6">
        
	
        <h3 class="title"><?php echo $case['title'] ?></h3>
		<p>
			项目描述：<?php echo $case['description'] ?>
		</p>
		<p>
			网址：<a href="<?php echo $case['demourl'] ?>"><?php echo $case['demourl'] ?></a>
		</p>
		<aside><!-- Baidu Button BEGIN -->
<div id="bdshare" class="bdshare_b" style="line-height: 12px;">
<img src="http://bdimg.share.baidu.com/static/images/type-button-1.jpg?cdnversion=20120831" />
<a class="shareCount"></a>
</div>
<script type="text/javascript" id="bdshare_js" data="type=button&amp;uid=211528" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
<!-- Baidu Button END -->
</aside>
</div>	
	</div>
    </div>
</div>

<?php
do_html_footer();
?>

		<!-- jQuery Plugin scripts -->
		<script type="text/javascript" src="<?php echo SITEPATH ?>plugin/jquery.bxslider/jquery.bxslider.min.js"></script>
	

		<script type="text/javascript">

        $(document).ready(function () {
	        $(".nav").find('li').eq(2).addClass("active");	     


		    $('.bxslider').bxSlider({
			  pagerCustom: '#bx-pager'
			});
        });
	</script>
    



<?php
do_html_analytics();
?>