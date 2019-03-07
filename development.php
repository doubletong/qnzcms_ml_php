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
    <title><?php echo "新药早期临床研究-".SITENAME; ?></title>    
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
                        <h3 class="title">新药早期临床研究</h3>
                       <p>整合注册、医学、I期中心、PK检测实验室等资源，希麦迪能够完成高质量的新药早期研究。</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="img/case_p4.jpg" alt="" class="p1">
                </div>
            </div>
        </div>
        <div class="container s2">
        <div class="content1">
            <h3 class="se-title"><i class="iconfont icon-xuehua"></i> 整合服务及优势</h3>

            <div class="box">
            <ul class="list">
                <li>从Pre-IND Meeting 、方案撰写，到前置伦理审批和IND申报，直至首例受试者入组的各环节协同快速推进方案；

</li>
                <li>在国内有多家合作良好的I期中心，可承接不同难度、不同适应症的早期临床研究，可实现中心快速启动和受试者快速入组；

</li>
                <li>美国巴尔的摩的I期中心可支持美国申报的新药项目的早期研究；

</li>
                <li>自建的满足FDA GLP要求的生物样本分析检测实验室，能够实现快速方法学建立，并拥有高灵敏度的分析仪器，完全满足新药及代谢物检测要求，且能够实现每个分析批的快速分析；

</li>
                <li>一体化的服务体系，能够实现不同业务团队的快速对接，以加快项目进度</li>
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
           $(".subnav li:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>
</html>