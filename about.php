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
    <title><?php echo "关于我们-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

<div class="page-about">
    <?php require_once('includes/header_about.php') ?>
        <div class="container s1">
            <h2 class="s-title">
                服务与规模
            </h2>
            <p>南京希麦迪医药科技有限公司（希麦迪）为客户提供包括药品注册、医学事务、临床运营、数据管理 和统计分析、生物样品分析在内的全方位临床开发服务, 是众多国内外知名申办方在中国最为得力的临 床 CRO 伙伴。希麦迪凝聚业内精英, 高速健康成长。目前公司全职人员近 200，核心成员人均有 15 年 以上行业经验，全员平均行业经验超过 5 年。 </p>

            <div class="tongji">
                <div class="row">
                    <div class="col">
                        <div class="item">
                            <div class="sum">
                                200<small>人</small>
                            </div>
                            <p>公司规模</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item">
                            <div class="sum">
                                <span>></span>15<small>年</small>
                            </div>
                            <p>核心成员经验</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item last">
                            <div class="sum">
                                <span>></span>5<small>年</small>
                            </div>
                            <p>平均行业经验</p>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="s-title1">
                注册部门
            </h3>
            <p>希麦迪注册部门。精通药政法规，项目经验丰富，配套资源充足，熟练把握全球不同监管体系下的政 策和法规，为以药品为主的大健康产业，提供便捷高效，加速医药产品上市的申报服务，其中包括 NMPA（国家药品监督管理局）、独立的 FDA（美国食品药品监督管理局）申报，以及中美双报等。</p>

            <h3 class="s-title1">
                医学事务部门
            </h3>
            <p>希麦迪医学事务部门。深耕医学领域，提供全方位的医学研究策略。成员均具有博士或硕士学位和多 年的医学事务经验，保证优质的医学设计和撰写，善于配合客户，提升研发速度，降低各项成本。医 学事务部门下辖医学监察团队，严格遵循 ICH-GCP 标准进行临床研究监察，保证监察的最高质量；药 物警戒团队善于全面整合数据资源，针对客户的需求制定专业化的药物警戒和药物安全解决方案。
            </p>

            <h3 class="s-title1">
                临床监查和项目管理部门
            </h3>
            <p>希麦迪临床监查和项目管理部门。部门人员近 50，发展极为迅速，成员具备丰富的一线经验，从新药 I-III 期临床到 BE 试验，为很多创新产品和行业前沿项目，提供着高质量的服务。 </p>

            <h3 class="s-title1">
                数据统计部门
            </h3>
            <p>希麦迪数据统计部门。全球成员近 90, 在 CDISC 执行、FDA 申报、Medidata Rave/Balance 系统建库和 使用上，经验极其丰富，具有国际一流的人才储备和执行标准。获得 Medidata Rave 和 Balance 系统的 官方认证，并与 Medidata 在中国和美国，均签订了战略合作协议。
            </p>

            <h3 class="s-title1">
                生物样本分析部门
            </h3>
            <p>希麦迪生物样本分析部门。位于南京市江宁区，面积超过 1000 平方米，设施完善、设备先进，有全新 液相质谱联用（ LC-MS/MS）系统 8 套。其中质谱仪 AB Sciex 5500 六台、6500 两台；高效液相系统 （HPLC）用 Watson LIMS 系统管理，其中 Waters UPLC I Class 四台，Shimadzu LC-30A 四台。
            </p>




            <h2 class="s-title">
                一站式优质模式
            </h2>
            <p>在药物临床开发的每个环节，希麦迪都在为客户提供着业内最为优质的服务，让一站式的服务平台， 为客户的产品开发提升质量、节约时间、降低成本。希麦迪已成为众多优秀企业临床研发与合作的最 佳伙伴和理性选择。 </p>


        </div>
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
           $(".leftnav li:nth-of-type(2) a").addClass("active");
           $(".mainav li:nth-of-type(2) a").addClass("active");
           $(".subnav li:nth-of-type(1) a").addClass("active");
        });
    </script>
</body>
</html>