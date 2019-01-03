<?php
require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "生物等效性试验-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-case">
    <?php require_once('includes/header_case.php') ?>
    
    <div class="container s1">
            <div class="row">
                <div class="col">
                    <div class="des">
                        <div class="icon">
                            <i class="iconfont icon-icon-xinyaozaoqilinchuangkaifa"></i>
                        </div>
                        <h3 class="title">生物等效性试验</h3>
                        <ul>
                            <li>设计与优化BE试验

                            </li>
                            <li>满足ICH-GCP的临床试验操作标准

                            </li>
                            <li>质量、时间和费用可控的I期临床试验（国内3家I期临床试验中心）
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <img src="img/case_p5.jpg" alt="" class="p1">
                </div>
            </div>
        </div>
        <div class="container s2">
            <header class="se-title">
                <h2>案例展示</h2>
                <h4>THE CASE SHOWS</h4>
            </header>
            <div class="row">
                <div class="col-sm-4">
                    <div class="item">
                        <img src="img/temp/c1.jpg" alt="">
                        <p>生物样本分析</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="item">
                        <img src="img/temp/c2.jpg" alt="">
                        <p>生物样本分析</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="item">
                        <img src="img/temp/c3.jpg" alt="">
                        <p>生物样本分析</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
           $(".subnav li:nth-of-type(5) a").addClass("active");
        });
    </script>
</body>
</html>