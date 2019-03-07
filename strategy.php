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
    <title><?php echo "药物临床开发策略-".SITENAME; ?></title>    
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
                            <i class="iconfont icon-icon-yaowulinchuangkaifacelve"></i>
                        </div>
                        <h3 class="title">药物临床开发策略</h3>
                       <p>对于新药的临床开发，在首次人体试验（First-in-Human）之前，结合未满足的临床需求（un-met medical need）和可知的治疗手段来制定整体的药物临床开发策略尤为关键。
</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="img/case_p1.jpg" alt="" class="p1">
                </div>
            </div>
        </div>
        <div class="container s2">
            <div class="content1">
            <h3 class="se-title"><i class="iconfont icon-icon-fuwuneirong"></i> 整合服务及优势</h3>

            <div class="box">
            <ul class="list">
                <li>具备快速提供各领域新药I-III期整体临床开发策略的能力，包括首创药（first-in-class）、Me-too类药物、改良型新药等
</li>
                <li>高效支持和CDE的各类沟通会议，如撰写/审阅会议资料和会议纪要，现场演讲与交流，以促进会议取得更为理想的效果
</li>
                <li>在整体开发策略框架下，快速交付I-III期临床试验方案
</li>
                <li>希麦迪具有一支特别设立的新药临床开发策略团队，结合公司内部资深注册专家、统计专家和医学专家的支持，希麦迪能够为客户的新药开发提供关键的策略意见。</li>
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
           $(".subnav li:nth-of-type(1) a").addClass("active");
        });
    </script>
</body>
</html>