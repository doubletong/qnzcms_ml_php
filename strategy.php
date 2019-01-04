<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/case.php");

$caseClass = new CaseShow();
$cases = $caseClass->fetch_category("药物临床开发策略");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "药物临床开发策略-".SITENAME; ?></title>    
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
                            <i class="iconfont icon-icon-yaowulinchuangkaifacelve"></i>
                        </div>
                        <h3 class="title">药物临床开发策略</h3>
                        <ul>
                            <li>制定和优化临床开发策略
                            </li>
                            <li>撰写临床试验方案
                            </li>
                            <li>健康人和患者的剂量探索及PK试验
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <img src="img/case_p1.jpg" alt="" class="p1">
                </div>
            </div>
        </div>
        <div class="container s2">
            <header class="se-title">
                <h2>案例展示</h2>
                <h4>THE CASE SHOWS</h4>
            </header>
            <div class="row">
            <?php foreach($cases as $data){ ?>
                <div class="col-sm-4">
                    <div class="item">
                        <img src="<?php echo $data["thumbnail"]; ?>" alt="">
                        <p><?php echo $data["title"]; ?></p>
                    </div>
                </div>
            <?php } ?>
                
               
            </div>
        </div>
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
           $(".subnav li:nth-of-type(1) a").addClass("active");
        });
    </script>
</body>
</html>