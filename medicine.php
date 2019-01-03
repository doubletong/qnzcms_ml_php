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
    <title><?php echo "医学事物-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-service">
<?php require_once('includes/header_service.php') ?>

<div class="container s3">

            <div class="des">
                <h3 class="title">
                    医学事务
                </h3>
                <p>希麦迪医学事务部依托医学专家和撰写人员极为丰富的医学背景和经验，能够为客户制定最优化的临床开发计划，并为客户提供最优质的临床试验方案设计和撰写、及注册资料的撰写服务。医学监察团队专注于临床研究的医学监察服务，建立最专业高效的医学监察服务体系。药物警戒团队深度洞察临床试验安全风险，提供高品质的药物警戒解决方案。 </p>
            </div>

            <div class="content1">
                <h3 class="se-title">
                    <i class="iconfont icon-icon-fuwuneirong"></i> 服务内容
                </h3>
                <div class="box">
                    <ul class="list">
                        <li>结合内部专业的统计和PK专家资源，制定I – III期临床研究开发策略 </li>
                        <li>提供医学撰写服务，包括I-III 期，BE临床研究方案，研究者手册，以及总结报告 </li>
                        <li>编写临床前试验资料 </li>
                        <li>医学监察服务 </li>
                        <li>药物警戒服务</li>
                    </ul>
                </div>
            </div>


            <div class="content1">
                <h3 class="se-title">
                    <i class="iconfont icon-icon-youshi"></i> 优势
                </h3>

                <div class="box">
                    <ul class="list">
                        <li>团队由医学博士和硕士组成，核心成员在美国和中国都有10-20年的创新药开发经验

                        </li>
                        <li>团队拥有数百份I-III期临床试验方案撰写经验并覆盖多种治疗领域

                        </li>
                        <li>团队在国内外知名期刊上多次发表学术论文
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
           $(".subnav li:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>
</html>