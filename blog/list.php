<?php

require_once('../code/db_fns.php');
require_once('../code/common_fns.php');
require_once('../code/user_auth_fns.php');
require_once('../code/output_fns.php');
require_once('../code/news/news_v_fns.php');
require_once('../code/news/news_v_output_fns.php');

$category = get_category_details($_GET['catid']);

do_html_doctype($category['title']."_日志_".SITENAME);
?>
<link rel="alternate" type="application/rss+xml" title="黑鸟志 RSS Feed" href="http://wuya.me/blog/feed.html" />
<script type="text/javascript" src="../static/scripts/jquery-1.6.2.min.js"></script>
<script type="text/javascript">

        $(document).ready(function () {
	        var $thirdLink = $(".menu").find('li').eq(3);
	        $thirdLink.find('a').addClass("current"); 
        });
	</script>

<?php 
do_html_header();

?>

<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">
			<!-- start: Container -->
			<div class="container">
				<h2><i class="icon-coffee"></i> <?php echo $category['title'] ?></h2>
			</div>
			<!-- end: Container  -->
		</div>	
	</div>
	<!-- end: Page Title -->


 <!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Row -->
      		<div class="row">
	<section class="span8">
		
		<?php 
		$pagination = get_newpaging();	//分页参数
	
		$news_array = get_ArticlesByCategory($_GET['catid'],$pagination['start'],$pagination['limit']);
		display_news($news_array);
		?>
        <footer>
		<?php
			front_pagination($pagination)
		?>
        </footer>
	
	</section>
	
    <section class="span4">	
    	<nav id="categories">
        <div class="title"><h3><i class="icon-th"></i> 日志分类</h3></div>
			<?php 
			$cat_array = get_categories();
			display_categories($cat_array);
			?>
		</nav>
	</section>
    
</div>
			<!-- end: Row -->
      	
		</div>
		<!--end: Container-->
				
	</div>
	<!-- end: Wrapper  -->		
<?php
do_html_footer();
?>

<script type="text/javascript">
	 $(document).ready(function () {
	         $(".nav>li").eq(4).addClass("active");	      

        });
</script>
<?php
do_html_analytics();
?>