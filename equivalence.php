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
    <title><?php echo "生物等效性试验-".SITENAME; ?></title>    
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
                            <i class="iconfont icon-icon-shengwudengxiaoxingshiyan"></i>
                        </div>
                        <h3 class="title">生物等效性试验</h3>
                       <p>希麦迪构建了一体化的生物等效性试验平台，帮助客户实现项目快速推进。</p>
                    </div>
                </div>
                <div class="col-auto">
                    <img src="img/case_p5.jpg" alt="" class="p1">
                </div>
            </div>
        </div>
        <div class="container s2">
        <div class="content1">
            <h3 class="se-title"><i class="iconfont icon-xuehua"></i> 整合服务及优势</h3>

            <div class="box">
            <ul class="list">
                <li>丰富的BE经验，可高质量地快速建立试验所需文档，如临床试验方案等

</li>
                <li>多家合作良好的I期中心，可承接不同规模和难度的BE试验，且能够实现中心快速启动和受试者快速招募；

</li>
                <li>自建的满足NMPA和FDA GLP要求的生物样本分析检测实验室，能够实现快速方法学建立，并拥有高灵敏度的分析仪器，完全BE试验检测要求；

</li>
                <li>一体化的服务体系，能够实现不同业务团队的快速对接，以加快项目进度

</li>
                <li>针对BE试验特别优化的统计分析流程，能够在短时间内出具统计分析报告</li>
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
           $(".subnav li:nth-of-type(6) a").addClass("active");
        });
    </script>
</body>
</html>