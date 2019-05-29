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
<div class="banner banner-support">
    <div class="container page-title">
        <h1>患者支持</h1>
        <p>我们始终为您提供最完善的服务与支持</p>
    </div>
</div>
<div class="page page-support">
    <div class="container">
        <section class="s1">
        <h2>关于微创良知<sup>®</sup></h2>
        <p>微创良知<sup>®</sup>患者关爱中心专注于微创伤介入患者教育和患者支持，提供有关微创伤介入产品的常规教育信息并解答患者对介入产品与治疗方法的疑问，24小时为患者以及患者的照顾者提供帮助。如果您对我们提供的产品信息以及疾病疗法有疑问，请联系微创良知<sup>®</sup>患者关爱中心。如若涉及具体疾病的诊断、治疗、康复、急救等，请务必前往医院就诊，并以医务人员的专业意见为准。若遇到紧急医疗情况，请立即拨打 120。</p>
        </section>
        <section class="s2">
        <h2>专注微创伤介入  关注了解更多</h2>
        <div class="qrcode">
            <figure>
            <img src="/img/qrcode.jpg" alt="微创良知<sup>®</sup> 患者关爱公众号">
            <figcaption>微创良知<sup>®</sup> 患者关爱公众号</figcaption>
            </figure>
          
           
            <p>微创良知<sup>®</sup>患者关爱热线：4008-400-501 <br/>
微创良知<sup>®</sup>患者关爱网址：www.microportcare.com</p>
        </div>
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