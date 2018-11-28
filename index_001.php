<?php
require_once('code/db_fns.php');
require_once('code/common_fns.php');
require_once('code/user_auth_fns.php');
require_once('code/output_fns.php');
require_once('code/slider/slider_v_fns.php');
require_once('code/slider/slider_v_output_fns.php');
require_once('code/case/case_v_fns.php');
require_once('code/case/case_v_output_fns.php');

do_html_doctype(SITENAME."-网页设计-平面设计")
?>
    <link rel="alternate" type="application/rss+xml" title="黑鸟志 RSS Feed" href="http://heiniaozhi.cn/blog/feed.html" />
    <meta name=keywords content="黑鸟志,乌鸦,深圳网站建设,网页设计,深圳SEO服务,乌鸦大神,黑鸟"> 
    <meta name=description content="本人原名童柱港，是一名设计师，有多年的从业经验。我能为您制作精美的网站、画册、包装设计、名片、标志(logo)、VIS等设计服务，并提供专业的搜索引擎优化和在线营销解决方案。">
  	<link href="<?php echo SITEPATH ?>static/css/parallax-slider.css" rel="stylesheet">
	
<?php 
do_html_header();
?>
	<!-- start: Slider -->	
    <?php 
	$slider_array = get_sliders();
	display_sliders($slider_array);
	?>
	<!-- end: Slider -->

<!--start: Wrapper-->
	<div id="wrapper">				
		<!--start: Container -->
    	<div class="container">			
			<hr>
            <!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
      		<div class="myinfo clearfix">
            
                <img  class="myphoto pull-left" src="static/img/myphoto.png" alt="我的照片" />               
				<h3>
					本人原名童柱港，是一名设计师，有多年的从业经验。我能为您制作精美的<a href="<?php echo SITEPATH;?>web/">网站</a>、画册、<a href="<?php echo SITEPATH;?>graphic/">平面、三维</a>、<a href="<?php echo SITEPATH;?>logos/">标志(logo)</a>、VIS等设计服务，并提供专业的搜索引擎优化和在线营销解决方案。
				</h3>
        		<p class="text-right"><a class="btn btn-primary btn-large" href="about/">了解更多 &raquo;</a></p>
      		
            </div>
			<!-- end: Hero Unit -->
      		
			<hr>
            <!-- start: Row -->
			<div class="row">
				
				<!-- start: Icon Boxes -->
				<div class="icons-box-vert-container">

					<!-- start: Icon Box Start -->
					<div class="span4">
						<div class="icons-box-vert">
                        	<div class="icon-box">
								<i class="icon-magic"></i>
                            </div>
							<div class="icons-box-vert-info">
								<h3>网站建设</h3>
								<p>我们以实用性为本，从简单的个人网站，博客，企业网站，商店等，黑鸟志团队能为提供优质的服务与解决方案。</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box-->

					<!-- start: Icon Box Start -->
					<div class="span4">
						<div class="icons-box-vert">
							<div class="icon-box">
								<i class="icon-picture"></i>
                            </div>
							<div class="icons-box-vert-info">
								<h3>平面设计</h3>
								<p>我能为您提供LOGO设计、电子画册、包装设计、名片设计、企业VIS，无形当中都在为企业形象加分。 </p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->

					<!-- start: Icon Box Start -->
					<div class="span4">
						<div class="icons-box-vert">
							<div class="icon-box">
								<i class="icon-search"></i>
                            </div>
							<div class="icons-box-vert-info">
								<h3>SEO优化</h3>
								<p>多年SEO经验，针对特定关键字为用户提供有价值的优化，在搜索引擎上得到更多曝光率和知名度。 </p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!-- end: Icon Box -->

				</div>
				<!-- end: Icon Boxes -->
				<div class="clear"></div>
			</div>
			<!-- end: Row -->
			
			<hr>
            <!-- start: Row -->
      		<div class="row">
	
				<div class="span9">
					
					<div class="title"><h3><i class="icon-desktop"></i> 近期项目</h3></div>
					
					<!-- start: Row -->
		      		<div class="row">
			
						<?php 
						$lastercases = get_casesforhome();
						display_casesforhome($lastercases);
						?>
					
        			</div>
					<!-- end: Row -->

				</div>

        		<div class="span3">
					
					<!-- start: Testimonials-->

					<div class="testimonial-container">
<!-- 
						<div class="title"><h3><i class="icon-comments-alt"></i> 客户在说什么？</h3></div>

							<div class="testimonials-carousel" data-autorotate="3000">

								<ul class="carousel">

									<li class="testimonial">
										<div class="testimonials">一位很细心的设计师，细节很考究，也很耐心，专业素养很好，给出很多的建议，界面设计不落俗套，创新意识强，这次的合作很愉快！</div>
										<div class="testimonials-bg"></div>
										<div class="testimonials-author">老苗, <span>梧桐会项目负责人</span></div>
									</li>

									<li class="testimonial">
										<div class="testimonials">设计很漂亮，价格很实在。</div>
										<div class="testimonials-bg"></div>
										<div class="testimonials-author">赖追, <span>总经理</span></div>
									</li>

									<li class="testimonial">
										<div class="testimonials">合作多次，设计很不错，很色彩到用户体验都是一流水平。</div>
										<div class="testimonials-bg"></div>
										<div class="testimonials-author">诸建波, <span>总经理</span></div>
									</li>

								

								</ul>

							</div>
 -->
						</div>

					<!-- end: Testimonials-->
					
        		</div>

      		</div>
			<!-- end: Row -->
			
			
		
			<hr>
            
        </div>
		<!--end: Container-->	
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

<script defer src="<?php echo SITEPATH ?>static/js/custom.js"></script>
	<script type="text/javascript">
	 $(document).ready(function () {
	         $(".nav").find('li').eq(0).addClass("active");
	      

        });
</script>

<?php
do_html_analytics();
?>