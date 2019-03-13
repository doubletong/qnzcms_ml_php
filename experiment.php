<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("experiment");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "概念验证及关键性临床研究-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-case">
    <?php require_once('includes/header_case.php') ?>
    <?php echo $data["content"];?>  
    <!-- <div class="container s1">
            <div class="row">
                <div class="col-lg-6">
                    <div class="des">
                        <div class="icon">
                            <i class="iconfont icon-anchuang"></i>
                        </div>
                        <h3 class="title">概念验证及关键性临床研究</h3>
                       <p>概念验证研究和关键性临床研究的设计和执行有赖于高水平的统计和医学专家及高效且稳定的临床运营团队。希麦迪整合了关键资源，以实现对此类试验的有力支持。
</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="img/case_p3.jpg" alt="" class="p1">
                </div>
            </div>
        </div>
        <div class="container s2">
            <div class="content1">
            <h3 class="se-title"><i class="iconfont icon-xuehua"></i> 整合服务及优势</h3>

            <div class="box">
            <ul class="list">
                <li>行业顶级的统计师团队。概念验证试验和关键性试验的设计往往是多样化的，采用何种设计很大程度依赖于统计学。希麦迪的统计师团队完成过超过50个向FDA递交的NDA申报，能够在试验设计、执行以及报告阶段提供权威咨询；


</li>
                <li>药物安全与警戒。对于监管机构特别关注的药物安全性事件，希麦迪拥有独立的PV团队和资深的医学监查人员对事件进行处理；


</li>
                <li>临床运营团队分布于全国各个主要城市，能够覆盖绝大多数主要的临床试验机构；采用Medidata CTMS系统，能够提供满足ICH国家法规要求的临床监查和项目管理服务；

</li>
                <li>自建的生物样本分析实验室能够承担群体PK的检测与计算
</li>
<li>希麦迪团队有丰富的独立数据监查委员会（DMC）的设立与维护经验
</li>
<li>可针对双盲试验提供满足法规要求的非盲服务</li>
            </ul>
            </div>
            </div>
        </div> -->
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
           $(".subnav li:nth-of-type(4) a").addClass("active");
        });
    </script>
</body>
</html>