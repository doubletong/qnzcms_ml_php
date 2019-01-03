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
    <title><?php echo "法规注册-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-service">
<?php require_once('includes/header_service.php') ?>

<div class="container s2">

<div class="des">
    <h3 class="title">
        法规注册
    </h3>
    <p>希麦迪法规注册团队由超过18年经验的业内专家领衔，拥有非常丰富的化学药品和生物制剂的IND、NDA注册经验，为国内外制药企业成功地完成了大量药品和器械注册项目，凭借着丰富的经验和广泛的意见领袖（KOL）资源，能最大程度地规避法规风险，缩短注册时限，加快药品的审批速度。</p>
</div>

<div class="content1">
    <h3 class="se-title">
        <i class="iconfont icon-icon-fuwuneirong"></i> 服务内容
    </h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="item first">
                    法规咨询
                </div>
                <div class="down"><img src="img/down.png" alt=""></div>
                <div class="item">个性化战略设计和指导实施</div>
                <div class="item">产品开发及注册过程中遇到个案问题分析</div>
                <div class="item">项目阶段性难点问题处理</div>
                <div class="item">探索开发法规空白领域注册路径</div>

            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="item first">
                    注册业务
                </div>
                <div class="down"><img src="img/down.png" alt=""></div>
                <div class="item">全球新创新药，改良型新药，进口药，仿制药，器械</div>
                <div class="item">全程管理过程跟进</div>

                <div class="item">临床试验申请（MRCT/IND/CTA),上市申请（NDA/ ANDA/BLA)以及补充申请
                </div>


            </div>
        </div>

    </div>
</div>

<div class="content1">
    <h3 class="se-title">
        <i class="iconfont icon-icon-youshi"></i> 优势
    </h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="box">

                <ul class="list">
                    <li>备在创新治疗领域建立注册路径的能力

                    </li>
                    <li>超过10年行业经验的核心团队，同时精通药品和器械的注册

                    </li>
                    <li>对法规动态的精准把握和预判

                    </li>
                    <li> 与监管部门的沟通渠道持久通畅
                    </li>

                </ul>
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
            $(".leftnav li:nth-of-type(3) a").addClass("active");
           $(".mainav li:nth-of-type(3) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>