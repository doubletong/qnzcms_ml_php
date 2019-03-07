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
    <title><?php echo "中美双报-".SITENAME; ?></title>    
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
                            <i class="iconfont icon-icon-zhongmeishuangbao"></i>
                        </div>
                        <h3 class="title">中美双报</h3>
                       <p>希麦迪的团队成员具有丰富的国际化经验，对中国和美国的新药申报政策都十分地熟悉，并已经服务多个开展中/美同步临床开发的客户。</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="img/case_p2.jpg" alt="" class="p1">
                </div>
            </div>
        </div>
        <div class="container s2">
            <div class="content1">
            <h3 class="se-title"><i class="iconfont icon-xuehua"></i> 整合服务及优势</h3>

            <div class="box">
            <ul class="list">
                <li>同一开发策略下的中、美协同申报和临床开发


</li>
                <li>IND (I, II, III, IV期）申报、NDA (505(b)(1), (505(b)(2))和ANDA/BLA申报，DMF/CEP注册

</li>
                <li>中美申报与开发策略的咨询，以及申报资料的审阅和缺陷分析

</li>
                <li>支持NMPA和FDA各类沟通会议
</li>
                <li>在美国巴尔的摩有可开展高质量、高难度非重大疾病早期临床的临床药理中心</li>
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
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>