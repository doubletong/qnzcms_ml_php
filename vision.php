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
    <title><?php echo "企业愿景-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

<div class="page-about">
    <?php require_once('includes/header_about.php') ?>
    <div class="container s2">
            <div class="content">
                <div class="row">
                    <div class="col-lg-7">
                        <img src="img/v_logo.jpg" alt="">
                    </div>
                    <div class="col-lg-5">
                        <div class="des">
                            <h2 class="title">
                                企业愿景
                            </h2>
                            <p>希麦迪时刻谨记人类健康，立志成为引领行业质量标准的全球 CRO 公司。我们的宗旨和目标，体现在 希麦迪的公司 LOGO中：融船舵，指南针，瞄准定位系统于一身，指引正确的方向，精准、专业、高 质、决心。圆形意味着守护和无限的潜能。蓝色代表理智、成熟和稳重；红色代表热情，活力和希望。
                            </p>
                        </div>
                    </div>
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
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>