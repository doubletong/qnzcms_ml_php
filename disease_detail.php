<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("clinical");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "疾病管理-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-disease-list" style="background-image:url(../img/temp/b3.jpg)">
        <div class="container page-title">
            <h1>二尖瓣关闭不全(基础篇)</h1>
        </div>
    </div>
    <div class="page page-disease-detail">
        <div class="container detail">
            <h2>什么是二尖瓣关闭不全？</h2>
            <p>二尖瓣关闭不全是指心脏二尖瓣处发生回漏(如下图)。
心瓣膜正常工作时可维持血液单向流动。瓣膜像摆动门一样单向开放，让血液能够流出而不能反流。正常情况下，回漏血液很少或无。但如果瓣膜工作异常，则可回流的血液会增多，这可引发问题。
二尖瓣正常情况下可维持血液从左心房流向左心室(如下图)。当它回漏时，血液会反流入左心房。大多数健康人可发生少量或微量的二尖瓣反流，但这通常不引发问题。部分人有较大量的二尖瓣反流，这可随时间推移而加重。</p>
        
<h2>二尖瓣关闭不全有哪些症状？</h2>
<p>大多数二尖瓣关闭不全患者没有症状，但是部分重度的二尖瓣关闭不全患者有一种或多种下列症状：</p>
</div>
        
        
    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");
            $(".subnav li:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>

</html>