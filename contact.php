<?php
require_once("includes/common.php");


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "联系我们-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="banner-contact">
            <img src="/img/1x/banner-contact-80.jpg" alt="">
        </div>
<div class="container">
    <div class="page-contact">
      <div class="qrcode wow slideInUp">
          <img src="/img/1x/qrcode_big-80.jpg" alt="公众号">
          <p>关注觅乐墨品官方公众号</p>
      </div>
        
      <div class="contact wow slideInUp">
          <div class="logo">
              <img src="/img/1x/bot_logo.png" alt="觅乐墨品">
          </div>
          <h3>深圳市觅乐墨品创意设计有限公司</h3>
          <ul class="u1">
              <li><i class="iconfont icon-dibiao"></i>  深圳市龙华新区环观南路72-1创客大厦1412室</li>
              <li><i class="iconfont icon-dianhua"></i>  0755-23774104</li>
              <li><i class="iconfont icon-qq"></i> 123456789 / 123456567</li>
              <li><i class="iconfont icon-youxiang"></i> 07552377@qq.com</li>           
          </ul>
          <ul>
              <li><i class="iconfont icon-user"></i> 黎总监 13724231080 <small>(同微信号)</small></li>
              <li><i class="iconfont icon-user"></i> 邱总监 13528458259 <small>(同微信号)</small></li>            
          </ul>
      </div>
    </div>
    </div>
    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(7) a").addClass("active");
           $(".mainav li:nth-of-type(7) a").addClass("active");

        });
    </script>
</body>
</html>