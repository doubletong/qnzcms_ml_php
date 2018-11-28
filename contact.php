<?php

require_once('code/db_fns.php');
require_once('code/common_fns.php');
require_once('code/user_auth_fns.php');
require_once('code/output_fns.php');
require_once('code/url_fns.php');


do_html_doctype("联系_".SITENAME);
?>

<?php 
do_html_header();
?>

<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">

			<!-- start: Container -->
			<div class="container">

				<h2><i class="icon-envelope-alt"></i> 联系我</h2>

			</div>
			<!-- end: Container  -->

		</div>	

	</div>
	<!-- end: Page Title -->

<!-- start: Wrapper -->	
	<div id="wrapper">		

		<!-- start: Container -->	
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">
			
				<!-- start: Contact Info -->
				<div class="span4">
					<div class="title"><h3><i class="icon-info-sign"></i> 联系信息</h3></div>
					<p>
						<b>黑鸟志</b>
					</p>
					<p>
						深圳市龙岗区坂田街道雪象社区园东工业园A栋5楼
					</p>
					<p>联系人：童柱港</p>
					<p>	
						手机：15361828193
					</p>
					<p>	
						QQ：13212847
					</p>
					<p>
						Email：twotong@gmail.com
					</p>
					<p>
						主页：<a href="//heiniaozhi.cn">heiniaozhi.cn</a>
					</p>
				</div>
				<!-- end: Contact Info -->		

				<!-- start: Contact Form -->
				<div class="span4">
					<div class="title"><h3><i class="icon-envelope"></i> 欢迎您联系我</h3></div>

					<!-- start: Contact Form -->
					<div id="contact-form">

						<form action="sendmail.php" method="post">

							<fieldset>
								<p>
										<input type="text" name="yourname" id="yourname" placeholder="姓名" size="60" />
									</p>
								<p>
										<input type="text" name="title" size="60" placeholder="主题"  />
									</P>
								<P>
										<input type="email" name="email" size="60" placeholder="你的邮箱" />
									</P>

								<P>
										<textarea rows="8" cols="65" placeholder="内容" name="mailcontent"></textarea>
									</P>

								<div class="actions">
									<button tabindex="3" type="submit" class="btn btn-primary btn-large">发送消息</button>
                                    
								</div>
							</fieldset>

						</form>

					</div>
					<!-- end: Contact Form -->

				</div>
				<!-- end: Contact Form -->

				<!-- start: Social Sites -->
				<div class="span4">
					<div class="title"><h3><i class="icon-map-marker"></i> 我的坐标</h3></div>
					<div id="map_canvas"></div>
				</div>
				<!-- end: Social Sites -->
			
			</div>
			<!-- end: Row -->

		</div>
		<!-- end: Container -->
				
  	</div>
	<!-- end: Wrapper  -->		



<?php
do_html_footer();
?>

<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

$(document).ready(function () {
	$(".nav>li").eq(5).addClass("active");	    

	initialize(); //载入地图
});

    function initialize() {
        var myLatlng = new google.maps.LatLng(22.651578, 114.078946);
        var myOptions = {
            zoom: 16,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        var contentString = '<div id="siteNotice">' +
        '<h4>黑鸟设计</h4>' +
        '<div id="bodyContent">' +
        '<p>地址：<span>深圳市龙岗区坂田街道雪象社区园东工业园A栋5楼</span><br />' +
		'手机：<span>15361828193 </span></p>' +

        '</div>' +
        '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: '黑鸟设计'
        });
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.open(map, marker);
        });
    }

</script>

<?php
do_html_analytics();
?>