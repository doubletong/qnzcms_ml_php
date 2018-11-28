<?php 
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
<title><?php echo $title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width">
<link href="<?php echo SITEPATH ?>static/admin/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="<?php echo SITEPATH ?>static/admin/css/font-awesome.min.css" />
<!--[if IE 7]>
		<link type="text/css" rel="stylesheet" href="<?php echo SITEPATH ?>static/admin/css/font-awesome-ie7.min.css" />
        <![endif]-->
<link href="<?php echo SITEPATH ?>static/admin/css/admin.css" rel="stylesheet" type="text/css" />
 <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


<script src="<?php echo SITEPATH ?>static/admin/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo SITEPATH ?>static/admin/js/bootstrap.min.js"></script>

<?php 
}
function do_html_header() {
  // print an HTML header
?>
</head>
<body>
<header>
  <div class="logo fl"><img id="ctl00_iLogo" src="<?php echo SITEPATH ?>static/images/admin/logo.png" alt="控制台_<?php echo SITENAME;?>" /></div>
  <div id="user_status" class="ar mt30">
    <?php

   if (isset($_SESSION['valid_user']))  {
      echo "您好， ".$_SESSION['valid_user']."！ ";
      echo  do_html_URL('member/logout.php','<i class="icon-signout"></i>注销'); 
  } 
    ?>
  </div>
</header>
<div class="container-fluid">
<div class="row-fluid">
  <div class="span2">
    <nav id="menu">
      <ul>
        <li>
          <?php do_html_URL('admin/index.php','<i class="icon-cog icon-fixed-width"></i>概况') ?>
        </li>
        <li>
          <?php do_html_URL('admin/news/newslist.php','<i class="icon-file icon-fixed-width"></i>新闻') ?>
        </li>
        <!--   <li><?php do_html_URL('admin/product/productlist.php','产品') ?></li> -->
        <li>
          <?php do_html_URL('admin/case/caselist.php','<i class="icon-globe  icon-fixed-width"></i>网站') ?>
        </li>
         <li>
          <?php do_html_URL('admin/design/designlist.php','<i class="icon-picture icon-fixed-width"></i>平面') ?>
        </li>
        <li>
          <?php do_html_URL('admin/logos/logolist.php','<i class="icon-leaf icon-fixed-width"></i>标志') ?>
        </li>
        <li>
          <?php do_html_URL('admin/slider/sliderlist.php','<i class="icon-film icon-fixed-width"></i>幻灯') ?>
        </li>
      </ul>
    </nav>
  </div>
  <div class="span10">
    <?php
 
}

function do_html_footer() {
  // print an HTML footer
?>
  </div>
</div>
<footer id="pagefooter">
  <p>&copy;2012 版权所有<a href="http://wuya.me">黑鸟志</a></p>
</footer>
</body>
</html>
<?php
}



?>
