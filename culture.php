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
    <title><?php echo "我们的文化-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

<div class="page-about" style="padding-bottom:0;">
    <?php require_once('includes/header_about.php') ?>
    <div class="s5">
            <div class="top">

            </div>
            <div class="container">
                <div class="des">
                    <h2>保证质量，提高标准</h2>
                    <p>服务的质量和人员的素质，是我们的核心竞争力；员工与企业的共同进步与协调发展，是我们的内在凝聚力；客户利益为先，合作共赢，是我们的强大推动力；高质，高效，高速，高性价比是客户选择我们的最大原因。
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(2) a").addClass("active");
           $(".mainav li:nth-of-type(2) a").addClass("active");
           $(".subnav li:nth-of-type(6) a").addClass("active");
        });
    </script>
</body>
</html>