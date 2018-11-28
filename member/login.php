<?php
  require_once('../code/db_fns.php');
  require_once('../code/common_fns.php');
  require_once('../code/user_auth_fns.php');
  require_once('../code/output_fns.php');
  require_once('../code/url_fns.php');
  
 do_html_doctype("用户登录_".SITENAME );
 do_html_header();
?>
 
<!-- start: Page Title -->
	<div id="page-title">
		<div id="page-title-inner">
			<!-- start: Container -->
			<div class="container">

				<h2><i class="icon-user"></i> 登录</h2>

			</div>
			<!-- end: Container  -->
		</div>
	</div>
	<!-- end: Page Title -->
    
<!--start: Wrapper-->
	<div id="wrapper">
		
		<!-- start: Container -->	
		<div class="container">
        	<div class="row">
            	<div class="span12">
 <?php 
 display_login_form();
 ?>
 </div>
 </div>
 </div>
 </div>
<?php 

 do_html_footer();
?>