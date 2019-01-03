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
    <title><?php echo "专业培训-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-service">
<?php require_once('includes/header_service.php') ?>

<div class="container s7">

            <div class="des">
                <h3 class="title">
                    专业培训
                </h3>
                <p>希麦迪专家团队均为业内顶级的专家，从临床前研究至药品上市，均有丰富的实战经验，已协助众多中美客户，加速着创新药的中美开发、临床研究及注册申报。希麦迪希望通过组织医药行业专业培训及会议，与医药同仁交流心得、碰撞思想、互动成长，共同为中国医药事业的健康发展，贡献力量。</p>
            </div>

            <div class="content1">
                <h3 class="se-title">
                    <i class="iconfont icon-icon-fuwuneirong"></i> 培训内容
                </h3>
                <div class="box">
                    <ul class="list">
                        <li>创新药I-III期的临床研究开发策略

                        </li>
                        <li>创新药I-III期临床试验运营及项目管理

                        </li>
                        <li>临床I-IV期研究数据管理及统计分析

                        </li>
                        <li>CDISC标准实施经验
                        </li>
                        <li>药物警戒体系及如何实施
                        </li>
                        <li>ICH CTD及eCTD法规讲解及eCTD申报系统实操
                        </li>
                        <li>创新药中美双报注册路径及策略</li>

                    </ul>
                </div>
            </div>


            <div class="content1">
                <h3 class="se-title">
                    <i class="iconfont icon-icon-youshi"></i> 优势
                </h3>

                <div class="box">
                    <ul class="list">
                        <li>与康龙化成、三泰联手，选聘高级中外讲员，从新药审评、企业合规等多点切入，解读核心内容和关键趋势，提供建设性意见和深度思考

                        </li>
                        <li>服务客户众多，实战经验丰富，讲师平均行业经验超15年

                        </li>
                        <li>精到实用，把握企业的难点、痛点和疑点

                        </li>
                        <li>丰富全面，覆盖临床前、临床、注册、上市后
                        </li>

                    </ul>
                </div>

            </div>

        </div>
    </div>


<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
           $(".mainav li:nth-of-type(3) a").addClass("active");
           $(".subnav li:nth-of-type(7) a").addClass("active");
        });
    </script>
</body>
</html>