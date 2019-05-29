<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("laws");


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "患者支持-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="banner banner-cards">
    <div class="container page-title">
        <h1>微创植入卡</h1>
        <p>随时获取信息  保障患者安全</p>
    </div>
</div>
<div class="page page-support page-school">
    <div class="container">
        <section class="s1">
        <h2>健康爱心植入卡</h2>
        <p>微创<sup>®</sup>公司建立并完善医疗器械唯一标识（UDI）、患者植入卡医疗器械信息综合数据库。实现医疗器械从设计开发、生产制造到上市后全过程监管。通过患者植入卡解决患者与医疗机构、生产企业和监管部门就产品追溯的“最后一公里”难题。促使医生在术后对患者信息告知（包括植入器械信息和安全事项的告知），方便在突发情况下使医生能尽快准确地获取植入物信息从而以最简洁明了的方式保障患者权益和生命安全。</p>
        <a href="http://mhealth.microport.com.cn/cn_pc/page/34.htm" class="more">查看详情 <i class="iconfont icon-right"></i></a>
        </section>
   
    </div>   
</div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
           $(".mainav li:nth-of-type(3) a").addClass("active");
        
        });
    </script>
</body>
</html>