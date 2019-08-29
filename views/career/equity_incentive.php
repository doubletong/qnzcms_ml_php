<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("about");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo "股权激励-薪资福利-职业发展" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header_career.php') ?>

    <?php // echo $data["content"];
    ?>
    <div class="page page-career">
        <?php require_once('includes/subnav.php') ?>
        <div class="container">
            <header class="title title-section">
                <h2 class="wow slideInLeft">股权激励</h2>
            </header>

            <p><img src="/img/temp/01.png" alt=""></p>
            <p>股权激励是一种通过经营者获得公司股权形式给予企业经营者一定的经济权利，使他们能够以股东的身份参与企业决策﹑分享利润﹑承担风险，从而勤勉尽责地为公司的长期发展服务的一种激励方法。股权激励是一种通过经营者获得公司股权形式给予企业经营者一定的经济权利，使他们能够以股东的身份参与企业决策﹑分享利润﹑承担风险，从而勤勉尽责地为公司的长期发展服务的一种激励方法。股权激励是一种通过经营者获得公司股权形式给予企业经营者一定的经济权利，使他们能够以股东的身份参与企业决策﹑分享利润﹑承担风险，从而勤勉尽责地为公司的长期发展服务的一种激励方法。股权激励是一种通过经营者获得公司股权形式给予企业经营者一定的经济权利，使他们能够以股东的身份参与企业决策、分享利润﹑承担风险，从而勤勉尽责地为公司的长期发展服务的一种激励方法。</p>
               
         
        </div>
    </div>


    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
        
           // $(".mainav li:nth-of-type(5)").addClass("active");
           // $(".subnav nav div:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>

</html>