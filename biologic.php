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
    <title><?php echo "生物样本分析-".SITENAME; ?></title>    
    <link rel="stylesheet" href="plugins/owl/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owl/assets/owl.theme.default.min.css">
    <?php require_once('includes/meta.php') ?>

</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-service">
<?php require_once('includes/header_service.php') ?>

<div class="container s6">

            <div class="des">
                <h3 class="title">
                    生物样本分析
                </h3>
                <p>希麦迪投入大量资金，在南京建立了设备先进、管理标准的生物样本分析实验室，团队拥有行业顶级的药物代谢科学家和资深运营人员。聚合全球化战略合作伙伴，凭借优秀的生物分析能力和国内及欧美资源的整合能力，严格依照《药物临床试验生物样本分析实验室管理指南》的质量体系，生物样本分析团队为客户及时递交研究结果并预测监管趋势，对客户的问题进行及时反馈，提供专业化的解决方案。</p>
            </div>

            <div class="content1">
                <h3 class="se-title">
                    <i class="iconfont icon-icon-fuwuneirong"></i> 服务内容
                </h3>
                <div class="box">
                    <ul class="list">
                        <li>方法论开发

                        </li>
                        <li>方法论验证

                        </li>
                        <li>生物样本分析
                        </li>
                        <li>生物样本保存</li>

                    </ul>
                </div>
            </div>


            <div class="content1">
                <h3 class="se-title">
                    <i class="iconfont icon-icon-youshi"></i> 优势
                </h3>

                <div class="box">
                    <ul class="list">
                        <li>符合FDA和NMPA的GLP标准的生物样本分析实验室（1000平米）

                        </li>
                        <li>Watson LIMS 实验室管理系统

                        </li>
                        <li>LC-MS/MS系统8套，含AB Sciex 5500质谱6台，6500质谱2台; HPLC 8台, 含Waters UPLC I Class 4台, Shimadzu LC-30A4台

                        </li>
                        <li>优秀的科研团队和实验室管理团队，快速方法学开发和验证

                        </li>
                        <li>完善的SOP管理体系
                        </li>
                        <li>短时高效的时间节点</li>
                    </ul>
                </div>

            </div>

        </div>
        <div class="owl-carousel">
            <div><img src="img/temp/owl1.jpg" alt=""></div>
            <div><img src="img/temp/owl2.jpg" alt=""></div>
            <div><img src="img/temp/owl3.jpg" alt=""></div>
            <div><img src="img/temp/owl4.jpg" alt=""></div>
            <div><img src="img/temp/owl5.jpg" alt=""></div>
            <div><img src="img/temp/owl6.jpg" alt=""></div>
            <div><img src="img/temp/owl1.jpg" alt=""></div>
            <div><img src="img/temp/owl4.jpg" alt=""></div>
            <div><img src="img/temp/owl5.jpg" alt=""></div>
            <div><img src="img/temp/owl6.jpg" alt=""></div>
        </div>
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>
<script src="plugins/owl/owl.carousel.min.js"></script>
<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
           $(".mainav li:nth-of-type(3) a").addClass("active");
           $(".subnav li:nth-of-type(6) a").addClass("active");

           $('.owl-carousel').owlCarousel({
                center: true,
                nav: true,
                items: 2,
                loop: true,
                margin: 10,
                responsive: {
                    768: {
                        items: 4
                    },
                    992: {
                        items: 5
                    },
                    1400: {
                        items: 6
                    }
                }
            });
        });

       
    </script>
</body>
</html>