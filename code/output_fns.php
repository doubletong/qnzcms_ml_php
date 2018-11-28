<?php
function do_html_doctype($title){
	?>
    
<!DOCTYPE html>
<html lang="zh-CN">
<head>

	<!-- start: Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $title;?></title>
	<meta name="author" content="乌鸦"/>
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- end: Mobile Specific -->


    <!-- start: CSS -->
    <link href="<?php echo SITEPATH ?>static/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo SITEPATH ?>static/css/main.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Serif">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Boogaloo">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Economica:700,400italic">
	<!-- end: CSS -->

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <!--[if (gte IE 6)&(lte IE 8)]>
      <script type="text/javascript" src="<?php echo SITEPATH ?>static/js/nwmatcher-1.2.5-min.js"></script>
      <script type="text/javascript" src="<?php echo SITEPATH ?>static/js/selectivizr-min.js"></script>
    <![endif]--> 



    <link type="text/css" rel="stylesheet" href="<?php echo SITEPATH ?>static/css/font-awesome.min.css" />
    <!--[if IE 7]>
    <link type="text/css" rel="stylesheet" href="<?php echo SITEPATH ?>static/css/font-awesome-ie7.min.css" />
    <![endif]-->

	<link href="<?php echo SITEPATH ?>static/css/bootstrap-responsive.min.css" rel="stylesheet">


<?php 
}




function do_html_header() {
  // print an HTML header
?>
</head>
<body>
<!--start: Header -->
	<header class="pageheader">
		
		<!--start: Container -->
		<div class="container">
			
			<!--start: Navbar -->
			<div class="navbar navbar-inverse">
	    		<div class="navbar-inner" id="topcol">
	          		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	            		<span class="icon-bar"></span>
	            		<span class="icon-bar"></span>
	            		<span class="icon-bar"></span>
	          		</a>
                    <div id="logo">
						<a href="<?php echo SITEPATH ?>"><img src="<?php echo SITEPATH ?>static/img/logo.png" alt="<?php echo SITENAME ?>" /></a>
                    </div>
	          		<div class="nav-collapse collapse pull-right">
	            		<ul class="nav">
							<li>
	                			<a href="<?php echo SITEPATH ?>">首页</a>
	              			</li>
	              			<li><a href="<?php echo SITEPATH ?>about/">关于</a></li>
							<li class="dropdown">
	                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">作品<b class="caret"></b></a>
	                			<ul class="dropdown-menu">
	                  				<li><a href="<?php echo SITEPATH ?>web/">网站制作</a></li>
									<li><a href="<?php echo SITEPATH ?>graphic/">平面/三维</a></li>															
									<li><a href="<?php echo SITEPATH ?>logos/">标志&amp;LOGO</a></li>
                                   
	                			</ul>
	              			</li>
                            
							<li class="dropdown">
	                			<a href="#" class="dropdown-toggle" data-toggle="dropdown">服务<b class="caret"></b></a>
	                			<ul class="dropdown-menu">
	                  				<li><a href="<?php echo SITEPATH ?>business-scope/">服务范围</a></li>
									<li><a href="<?php echo SITEPATH ?>process/">建站流程</a></li>
	                			</ul>
	              			</li>									
							<li><a href="<?php echo SITEPATH ?>blog/">日志</a></li>					
	              			<li><a href="<?php echo SITEPATH ?>contact/">联系</a></li>
	            		</ul>
	          		</div>
	        	</div>
	      	</div>
			<!--end: Navbar -->
			
		</div>
		<!--end: Container-->			
			
	</header>
	<!--end: Header-->

<?php
 
}

function do_html_footer() {
  // print an HTML footer
?>



	<!-- start: .pagefooter -->
	<footer class="pagefooter">
		
		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: About -->
				<div class="span6">
					<ul id="footer-nav">

							<li><a href="/">首页</a></li>
							<li><a href="/about/">关于</a></li>
							<li><a href="/web/">网站</a></li>
                            <li><a href="/graphic/">平面</a></li>
                            <li><a href="/blog/">博客</a></li>							
							<li><a href="/contact/">联系</a></li>
                            <li><a href="//template.heiniaozhi.cn/">模板</a></li>
                            <li><a href="//lib.heiniaozhi.cn/">资料</a></li>

						</ul>
                        <p>
							&copy; 2012-2013 <a href="<?php echo SITEPATH ?>"><?php echo SITENAME ?></a> 版本所有
						</p>
						<p>工信部备案号：<a href="http://www.miibeian.gov.cn/">粤ICP备13057252号-1</a></p>
				</div>
				<!-- end: About -->

				

				<div class="span5">
				
					<!-- start: Follow Us -->
				
					<ul class="social-grid">
					<!-- 
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-sina">
											<a href="http://www.weibo.com/jugang"></a>
										</div>
										<div class="social-info-back social-sina-hover">
											<a href="http://www.weibo.com/jugang"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-qq">
											<a href="http://t.qq.com/tongjugang"></a>
										</div>
										<div class="social-info-back social-qq-hover">
											<a href="http://t.qq.com/tongjugang"></a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-youku">
											<a href="http://u.youku.com/tongjugang"></a>
										</div>
										<div class="social-info-back social-youku-hover">
											<a href="http://u.youku.com/tongjugang"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
						 -->
						<li>
							<div class="social-item">				
								<div class="social-info-wrap">
									<div class="social-info">
										<div class="social-info-front social-rss">
											<a href="http://heiniaozhi.cn/blog/feed.html"></a>
										</div>
										<div class="social-info-back social-rss-hover">
											<a href="http://heiniaozhi.cn/blog/feed.html"></a>
										</div>	
									</div>
								</div>
							</div>
						</li>
					</ul>
					<!-- end: Follow Us -->
				
					
				
				</div>
                <!-- start: Footer Menu Back To Top -->
				<div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
				
			</div>
			<!-- end: Row -->	
			
		</div>
		<!-- end: Container  -->

	</footer>
	<!-- end: .pagefooter -->

	<script src="<?php echo SITEPATH ?>static/js/jquery-1.8.2.min.js"></script>
    <script src="<?php echo SITEPATH ?>static/js/bootstrap.min.js"></script>

<?php
}

function do_html_analytics(){
	?>
    
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-7810886-5', 'heiniaozhi.cn');
  ga('send', 'pageview');

</script>
<!-- end: Java Script -->

</body>
</html>
    
    <?php
}



function do_html_heading($heading) {
  // print heading
?>
<h2><?php echo $heading;?></h2>
<?php
}



function display_login_form() {
?>
<div id="loginbox">
  <!--  <p><a href="register_form.php">Not a member?</a></p> -->
  <form method="post" action="member.php">
    <fieldset>
      <legend>用户登录</legend>
      <p>
        <label>用户:</label>
        <input type="text" class="txt" name="username"/>
      </p>
      <p>
        <label>密码:</label>
        <input type="password" class="txt" name="passwd"/>
      </p>
      <p class="button">
        <input type="submit" class="btn" value="登录"/>
      </p>
      <!-- <a href="forgot_form.php">Forgot your password?</a> -->
    </fieldset>
  </form>
</div>
<?php
}

function display_registration_form() {
?>
<form method="post" action="register_new.php">
  <table bgcolor="#cccccc">
    <tr>
      <td>Email address:</td>
      <td><input type="text" name="email" size="30" maxlength="100"/></td>
    </tr>
    <tr>
      <td>Preferred username<br />
        (max 16 chars):</td>
      <td valign="top"><input type="text" name="username"
         size="16" maxlength="16"/></td>
    </tr>
    <tr>
      <td>Password<br />
        (between 6 and 16 chars):</td>
      <td valign="top"><input type="password" name="passwd"
         size="16" maxlength="16"/></td>
    </tr>
    <tr>
      <td>Confirm password:</td>
      <td><input type="password" name="passwd2" size="16" maxlength="16"/></td>
    </tr>
    <tr>
      <td colspan=2 align="center"><input type="submit" value="Register"></td>
    </tr>
  </table>
</form>
<?php

}

function display_user_urls($url_array) {
  // display the table of URLs

  // set global variable, so we can test later if this is on the page
  global $bm_table;
  $bm_table = true;
?>
<br />
<form name="bm_table" action="delete_bms.php" method="post">
  <table width="300" cellpadding="2" cellspacing="0">
    <?php
  $color = "#cccccc";
  echo "<tr bgcolor=\"".$color."\"><td><strong>Bookmark</strong></td>";
  echo "<td><strong>Delete?</strong></td></tr>";
  if ((is_array($url_array)) && (count($url_array) > 0)) {
    foreach ($url_array as $url)  {
      if ($color == "#cccccc") {
        $color = "#ffffff";
      } else {
        $color = "#cccccc";
      }
      //remember to call htmlspecialchars() when we are displaying user data
      echo "<tr bgcolor=\"".$color."\"><td><a href=\"".$url."\">".htmlspecialchars($url)."</a></td>
            <td><input type=\"checkbox\" name=\"del_me[]\"
                value=\"".$url."\"/></td>
            </tr>";
    }
  } else {
    echo "<tr><td>No bookmarks on record</td></tr>";
  }
?>
  </table>
</form>
<?php
}

function display_user_menu() {
  // display the menu options on this page
?>
<hr />
<a href="member.php">Home</a>&nbsp;|&nbsp;<a href="add_bm_form.php">Add BM</a>&nbsp;|&nbsp;
<?php
  // only offer the delete option if bookmark table is on this page
  global $bm_table;
  if ($bm_table == true) {
    echo "<a href=\"#\" onClick=\"bm_table.submit();\">Delete BM</a> &nbsp;|&nbsp;";
  } else {
    echo "<span style=\"color: #cccccc\">Delete BM</span> &nbsp;|&nbsp;";
  }
?>
<a href="change_passwd_form.php">Change password</a><br />
<a href="recommend.php">Recommend URLs to me</a>&nbsp;|&nbsp;<a href="logout.php">Logout</a>
<hr />
<?php
}

function display_add_bm_form() {
  // display the form for people to ener a new bookmark in
?>
<form name="bm_table" action="add_bms.php" method="post">
  <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
    <tr>
      <td>New BM:</td>
      <td><input type="text" name="new_url" value="http://"
     size="30" maxlength="255"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" value="Add bookmark"/></td>
    </tr>
  </table>
</form>
<?php
}

function display_password_form() {
  // display html change password form
?>
<br />
<form action="change_passwd.php" method="post">
<table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
  <tr>
    <td>Old password:</td>
    <td><input type="password" name="old_passwd"
            size="16" maxlength="16"/></td>
  </tr>
  <tr>
    <td>New password:</td>
    <td><input type="password" name="new_passwd"
            size="16" maxlength="16"/></td>
  </tr>
  <tr>
    <td>Repeat new password:</td>
    <td><input type="password" name="new_passwd2"
            size="16" maxlength="16"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input type="submit" value="Change password"/></td>
  </tr>
</table>
<br />
<?php
}

function display_forgot_form() {
  // display HTML form to reset and email password
?>
<br />
<form action="forgot_passwd.php" method="post">
<table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
  <tr>
    <td>Enter your username</td>
    <td><input type="text" name="username" size="16" maxlength="16"/></td>
  </tr>
  <tr>
    <td colspan=2 align="center"><input type="submit" value="Change password"/></td>
  </tr>
</table>
<br />
<?php
}

function display_recommended_urls($url_array) {
  // similar output to display_user_urls
  // instead of displaying the users bookmarks, display recomendation
?>
<br />
<table width="300" cellpadding="2" cellspacing="0">
  <?php
  $color = "#cccccc";
  echo "<tr bgcolor=\"".$color."\">
        <td><strong>Recommendations</strong></td></tr>";
  if ((is_array($url_array)) && (count($url_array)>0)) {
    foreach ($url_array as $url) {
      if ($color == "#cccccc") {
        $color = "#ffffff";
      } else {
        $color = "#cccccc";
      }
      echo "<tr bgcolor=\"".$color."\">
            <td><a href=\"".$url."\">".htmlspecialchars($url)."</a></td></tr>";
    }
  } else {
    echo "<tr><td>No recommendations for you today.</td></tr>";
  }
?>
</table>
<?php
}

?>
