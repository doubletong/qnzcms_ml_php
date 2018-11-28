<?php

require_once('../code/db_fns.php');
require_once('../code/common_fns.php');
require_once('../code/user_auth_fns.php');
require_once('../code/output_fns.php');
require_once('../code/design/design_v_fns.php');
require_once('../code/design/design_v_output_fns.php');

$category = get_category_details($_GET['catid']);

do_html_doctype("平面/3D_案例展示_".SITENAME);
?>



<?php 
do_html_header();
?>

	<!-- start: Page Title -->
	<div id="page-title">
		<div id="page-title-inner">
			<!-- start: Container -->
			<div class="container">
				<h2><i class="icon-desktop"></i> 平面/三维</h2>
			</div>
			<!-- end: Container  -->
		</div>	

	</div>
	<!-- end: Page Title -->
    
<!--start: Wrapper-->
	<div id="wrapper">
		
		<!-- start: Container -->	
		<div class="container">
			<div id="filters">
				<?php 
				$cat_array = get_categories();
				display_categories($cat_array);
				?>
			</div>

		</div>
	<!-- end: Container  -->
    
    <!--start: Container -->
    	<div class="container">
        <?php 
		$design_array = get_alldesigns(1000);;
		display_designs($design_array);
		?>
        
        </div>
	<!-- end: Container  -->
	</div>
	<!-- end: Wrapper  -->		    
    

<?php
do_html_footer();
?>

<script src="<?php echo SITEPATH ?>static/js/jquery.isotope.min.js"></script>
<script src="<?php echo SITEPATH ?>js/jquery.imagesloaded.js"></script>
<script src="<?php echo SITEPATH ?>js/flexslider.js"></script>
<script src="<?php echo SITEPATH ?>js/carousel.js"></script>
<script src="<?php echo SITEPATH ?>js/jquery.cslider.js"></script>
<script src="<?php echo SITEPATH ?>js/slider.js"></script>
<script src="<?php echo SITEPATH ?>js/fancybox.js"></script>
<script defer src="<?php echo SITEPATH ?>js/custom.js"></script>



<script type="text/javascript">
	 $(document).ready(function () {
	         $(".nav").find('li').eq(2).addClass("active");	      

		//Full Caption Sliding (Hidden to Visible)
			$('.boxgrid.captionfull').hover(function(){
				$(".cover", this).stop().animate({top:'170px'},{queue:false,duration:170});
			}, function() {
				$(".cover", this).stop().animate({top:'260px'},{queue:false,duration:170});
			});

        });
</script>

<?php
do_html_analytics();
?>