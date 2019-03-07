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
    <title><?php echo "医疗器械-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-case">
    <?php require_once('includes/header_case.php') ?>
    <div class="container s1">
            <div class="row">
                <div class="col-lg-6">
                    <div class="des">
                        <div class="icon">
                            <i class="iconfont icon-icon-yiliaoqixie"></i>
                        </div>
                        <h3 class="title">医疗器械</h3>
                       <p>希麦迪构建了单独的医疗器械团队，以更好地服务于医疗器械及体外诊断试剂的客户。</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="img/case_p6.jpg" alt="" class="p1">
                </div>
            </div>
        </div>
        <div class="container s2">
            <div class="content1">
            <h3 class="se-title"><i class="iconfont icon-icon-fuwuneirong"></i> 整合服务及优势</h3>

            <div class="box">
            <ul class="list">
                <li>独立起草的、完全满足监管要求的适用于医疗器械和体外诊断试剂的临床运营SOP体系；

</li>
                <li>和国内外多个领域的医疗器械各个领域KOL有着深入合作；


</li>
                <li>熟悉医疗器械相关法规要求，能够提供建设性的法规注册意见；

</li>
                <li>可同时提供优质的数据管理和统计分析服务</li>
            </ul>
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