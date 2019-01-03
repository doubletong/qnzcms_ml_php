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
    <title><?php echo "临床监查和项目管理-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-service">
<?php require_once('includes/header_service.php') ?>

<div class="container s4">

<div class="des">
    <h3 class="title">
        临床监查和项目管理
    </h3>
    <p>希麦迪的临床操作部门，人员规模近50，并持续高速发展，成员具有丰富的I-III期临床、BE和医疗器械领域临床研究经验，与国内知名临床试验机构和领域专家有着深入而广泛的合作。团队立足完善的项目管理流程，在全国多个城市设立驻地监查员，依照临床试验方案，严格遵循SOP操作规程，有力把控项目进度，为客户节约成本，确保项目顺利的实施和完成。 </p>
</div>

<div class="content1">
    <h3 class="se-title">
        <i class="iconfont icon-icon-fuwuneirong"></i> 服务内容
    </h3>
    <div class="box">
        <ul class="list">
            <li>为客户提供时间费用可控的高质量早期临床试验服务 </li>
            <li>I-III期临床试验、BE和医疗器械项目临床研究服务 </li>

        </ul>
    </div>
</div>

<div class="content1">
    <h3 class="se-title">
        <i class="iconfont icon-icon-linchuangtuanduifenbu"></i> 临床操作团队分布
    </h3>
    <div class="row">
        <div class="col-md-auto">
            <div class="box">

                <ul class="list">
                    <li>长春
                    </li>
                    <li>北京
                    </li>
                    <li>石家庄
                    </li>
                    <li>南京
                    </li>
                    <li>上海
                    </li>
                    <li>武汉
                    </li>
                    <li>成都
                    </li>
                    <li>广州</li>

                </ul>
            </div>
        </div>
        <div class="col-md">
            <img src="img/china.png" alt="">
        </div>
    </div>

</div>



<div class="content1">
    <h3 class="se-title">
        <i class="iconfont icon-icon-youshi"></i> 优势
    </h3>

    <div class="box">
        <ul class="list">
            <li>质量控制体系严格遵循ICH-GCP标准

            </li>
            <li>全部成员均为医药专业背景，一半以上有硕士学位

            </li>
            <li>项目经理具备5年-15年临床试验行经验

            </li>
            <li>所有CRA均来自知名CRO，具备医药产品临床试验经验

            </li>
            <li>人员稳定性优良（2018年离职率低于10%）
            </li>
            <li>整体团队在新药I-III期试验、BE和医疗器械项目管理上经验突出
            </li>
            <li>运行前沿领域的项目，包括肿瘤免疫、细胞个体治疗，生物类似物等
            </li>
            <li>共建菏泽中医院、郑州弘大心血管医院和新郑市人民医院共三家I期临床试验中心，总床位数超过200张</li>
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
           $(".subnav li:nth-of-type(4) a").addClass("active");
        });
    </script>
</body>
</html>