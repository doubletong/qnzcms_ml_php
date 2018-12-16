<?php
session_start();
// 购物车管理
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
    $_SESSION['total_items'] = 0;
    $_SESSION['total_price'] = '0.00';
}
function do_html_doctype($title){
	?>
    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="applicable-device" content="pc,mobile">
	<title><?php echo $title;?></title>
    <meta name="baidu-site-verification" content="OnrTOZtiBw" />
	<meta name="author" content="黑鸟志"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE 9 and below. ICO should be 32x32 pixels in size -->
    <!--[if IE]><link rel="shortcut icon" href="<?php echo SITEPATH ?>/assets/img/icon/water_favicon.ico"><![endif]-->
    <!-- IE 10+ "Metro" Tiles - 144x144 pixels in size icon should be transparent -->
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="<?php echo SITEPATH ?>/assets/img/icon/144.png">

    <!-- Touch Icons - iOS and Android 2.1+ 152x152 pixels in size. -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo SITEPATH ?>/assets/img/icon/152.png">
    <!-- Firefox, Chrome, Safari, IE 11+ and Opera. 96x96 pixels in size. -->
    <link rel="icon" href="<?php echo SITEPATH ?>/assets/img/icon/96.png">
    <link rel="stylesheet" href="<?php echo SITEPATH ?>/assets/css/all.css">
    <script src="<?php echo SITEPATH ?>/js/modernizr-2.8.3.js"></script>
    <!--[if lt IE 9]>
    <script src="<?php echo SITEPATH ?>/js/lib/respond.min.js"></script>
    <![endif]-->

    <?php
}

function do_html_header() {
  // print an HTML header
?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-2252503-43', 'auto');
        ga('send', 'pageview');

    </script>

</head>
<body>
<!--start: Header -->
<div class="mainav">
<header class="container">
    <div class="row page-header">
        <div class="logo">
            <a href="<?php echo SITEPATH; ?>/"><img src="<?php echo SITEPATH; ?>/assets/img/logo.png" alt="洁碧" /></a>
        </div>
        <div class="shippingCart">
          <a href="<?php echo SITEPATH; ?>/shoppingCart.php"><i class="icon-shopping-cart"></i><span class="hidden-xs"> 购物车</span>(<span id="totalItems"><?php  print_r($_SESSION['total_items']);?></span>)</a>
        </div>
        <a class="showmenu" id="openav" href="#">
            <i class="icon-bars"></i>
        </a>
        <nav>
            <ul class="mainmenu">
                <li>
                    <a href="<?php echo SITEPATH; ?>/about">
                        了解尚橙
                    </a>
                    <span>About</span>
                </li>
                <li>
                    <a href="<?php echo SITEPATH; ?>/products">
                        产品展示
                    </a>
                    <span>Products</span>
                </li>
                <li>
                    <a href="<?php echo SITEPATH; ?>/news">
                        新闻中心
                    </a>
                    <span>News</span>
                </li>
                <li>
                    <a href="<?php echo SITEPATH; ?>/service">
                        服务与支持
                    </a>
                    <span>Service and Support</span>
                </li>
                <li>
                    <a href="<?php echo SITEPATH; ?>/marketing">
                        销售网络
                    </a>
                    <span>Sales Network</span>
                </li>
                <li>
                    <a href="<?php echo SITEPATH; ?>/knowledge">
                        护理知识
                    </a>
                    <span>Mouth Care</span>
                </li>
            </ul>
        </nav>
    </div>
</header>
	<!--end: Header-->
</div>

<?php
 
}

function do_html_footer() {
  // print an HTML footer
?>
    <section class="container botNav">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-xs-7">
                        <a href="<?php echo SITEPATH; ?>/marketing/" class="box bg_navy">
                            <h3>销售网络</h3><h4>Sales Network</h4>
                            <p>畅销全球90多个国家和地区</p>
                            <i class="icon-play-circle"></i>
                        </a>
                    </div>
                    <div class="col-xs-5">
                        <div class="map" aria-hidden="true">
                            <a href="<?php echo SITEPATH; ?>/marketing/"><i class="icon-earth"></i></a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-xs-7">
                        <a href="<?php echo SITEPATH; ?>/service/" class="box bg_gray box_right">
                            <h3>服务与支持</h3><h4>Service & Support</h4>
                            <p>自世界上第一台冲牙器发明以来<br />50多年来一直引领全球亿万人口腔护理风潮</p>
                            <i class="icon-play-circle"></i>
                        </a>
                    </div>
                    <div class="col-xs-5">
                        <div class="woman" aria-hidden="true">
                            <a href="<?php echo SITEPATH; ?>/service/"><i class="icon-wrench"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-push-6">
                <div class="row">
                    <div class="col-xs-7">
                        <a href="http://waterpik.tmall.com/" class="box bg_navy box_right">
                            <h3>在线商城</h3><h4>Online Shop</h4>
                            <p>自世界上第一台冲牙器发明以来<br />50多年来一直引领全球亿万人口腔护理风潮</p>
                            <i class="icon-play-circle"></i>
                        </a>
                    </div>
                    <div class="col-xs-5">
                        <div class="shop" aria-hidden="true">
                            <a href="http://waterpik.tmall.com/"><i class="icon-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-md-pull-6">
                <div class="row">
                    <div class="col-xs-7">
                        <a href="<?php echo SITEPATH; ?>/about/" class="box bg_gray">
                            <h3>关于洁碧</h3><h4>About us</h4>
                            <p>自世界上第一台冲牙器发明以来<br />50多年来一直引领全球亿万人口腔护理风潮</p>
                            <i class="icon-play-circle"></i>

                        </a>
                    </div>
                    <div class="col-xs-5">
                        <div class="man" aria-hidden="true">
                            <a href="<?php echo SITEPATH; ?>/about/"><i class="icon-droplet"></i></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
	<!-- start: .pagefooter -->
    <footer class="container">

        <div class="row page-footer">
            <div class="col-sm-6 col-md-3">
                <div class="logo">
                    <img src="/assets/img/footer_logo.png" alt="Caroplus健标" />
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <aside class="agent">
                    <h4>洁碧中国总经销商：</h4>
                    <p>深圳健标医疗器械有限公司</p>
                </aside>

            </div>
            <div class="col-md-6">
                <aside class="contact">
                    <ul>
                        <li>售后服务热线：4008891299</li>
                        <li>Tel：<a href="tel:075526400686">+86 0755 26400686</a></li>
                        <li>E-mail：<a href="mailto:info@chinawaterpik.com">info@chinawaterpik.com</a></li>
                        <li><address>地址：深圳市南山区南山大道深意工业大厦3层北303</address></li>
                        <li>&copy; Copyright 2015 waterpik</li>
                    </ul>

                </aside>

            </div>
        </div>

        <!-- /.page-footer -->
    </footer>


    <div id="pusher" class="pusher" aria-hidden="true">
        <div id="rightnav" class="rightnav" aria-hidden="true">
            <ul class="sideNav" role="navigation">
                <li>
                    <a href="<?php echo SITEPATH; ?>/" class="active">
                        首页
                    </a>

                </li>
                <li>
                    <a href="<?php echo SITEPATH; ?>/about/">
                        了解洁碧
                    </a>

                </li>
                <li>
                    <a href="<?php echo SITEPATH; ?>/products/">
                        口腔护理产品
                    </a>

                </li>
                <li>
                    <a href="<?php echo SITEPATH; ?>/news/">
                        新闻中心
                    </a>

                </li>
                <li>
                    <a href="<?php echo SITEPATH; ?>/service/">
                        服务与支持
                    </a>

                </li>
                <li>
                    <a href="/marketing/">
                        销售网络
                    </a>
                </li>
                <li>
                    <a href="<?php echo SITEPATH; ?>/knowledge/">
                        口腔护理知识
                    </a>
                </li>
                <li>
                    <a href="http://waterpik.tmall.com/" target="_blank">
                        在线商城
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <script data-main="<?php echo SITEPATH ?>/js/app" src="/js/lib/require.js"></script>
<?php
}

function do_html_analytics(){
	?>
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
