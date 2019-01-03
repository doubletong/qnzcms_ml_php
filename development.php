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
    <title><?php echo "新药早期临床开发-".SITENAME; ?></title>    
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
                            <i class="iconfont icon-icon-shengwudengxiaoxingshiyan"></i>
                        </div>
                        <h3 class="title">新药早期临床开发</h3>
                        <ul>
                            <li>制定和优化临床开发策略
                            </li>
                            <li>撰写临床试验方案
                            </li>
                            <li>监查和项目管理
                            </li>
                            <li>运营临床试验，从中心筛选、伦理递交等直至中心关闭
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <img src="img/case_p4.jpg" alt="" class="p1">
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
           $(".subnav li:nth-of-type(4) a").addClass("active");
        });
    </script>
</body>
</html>