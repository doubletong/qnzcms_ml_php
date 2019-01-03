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
    <title><?php echo "统计分析和数据管理-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-service">
<?php require_once('includes/header_service.php') ?>

<div class="container s5">

            <div class="des">
                <h3 class="title">
                    统计分析和数据管理
                </h3>
                <p>希麦迪的数据管理和统计部门，从质量标准、中美行业经验、到多种 EDC 系统的使用, 都是 CRO 行业的领先者。团队严格执行 CDISC 规则，遵循 GCP 标准，内部与客户的 SOP 流程，善于根据申办方需求，设计个性化解决方案，从方案设计的起点，到全程项目管理的介入，灵活方便，保证药物监管部门和研究者之间的沟通顺畅。部门核心成员均来自国内国际知名药企和全球性的 CRO，具有丰富的 I到 III 期国际多中心和临床注册试验经验，诚意为客户提供最准确、最及时、最可靠的临床试验数据管理和统计分析服务。</p>
            </div>

            <div class="content1">
                <h3 class="se-title">
                    <i class="iconfont icon-icon-fuwuneirong"></i> 服务内容
                </h3>
                <div class="box">
                    <ul class="list">
                        <li>统计分析
                            <ul>
                                <li>临床试验设计
                                </li>
                                <li>样本量计算
                                </li>
                                <li>临床实验方案相关章节撰写
                                </li>
                                <li>统计分析计划撰写
                                </li>
                                <li>随机计划撰写
                                </li>
                                <li>建立符合CDISC SDTM/ADaM标准和分析的数据集
                                </li>
                                <li>SAS编程
                                </li>
                                <li>敏感度和探索性分析
                                </li>
                                <li>中期分析
                                </li>
                                <li>数据监查委员会（DMC）相关统计活动
                                </li>
                                <li>ISS/ISE分析
                                </li>
                                <li>统计分析报告撰写</li>
                            </ul>
                        </li>
                        <li>数据管理
                            <ul>
                                <li>病例报告表（CRF、eCRF）设计
                                </li>
                                <li>随机和药物供应系统设计
                                </li>
                                <li>数据库设计、建立、测试和维护
                                </li>
                                <li>纸质研究的双份数据录入和比对
                                </li>
                                <li>数据核查和质疑管理
                                </li>
                                <li>医学编码、SAE一致性核查、外部数据管理
                                </li>
                                <li>数据管理的质量保证和稽查</li>

                            </ul>
                        </li>

                    </ul>
                </div>
            </div>




            <div class="content1">
                <h3 class="se-title">
                    <i class="iconfont icon-icon-youshi"></i> 优势
                </h3>

                <div class="box">
                    <ul class="list">
                        <li>中美团队规模近90人, 多数成员拥有超过5年行业经验，核心成员具有10-20年行业经验

                        </li>
                        <li>丰富的I-III期、BE、真实世界研究的数据管理和统计经验，丰富的中、美项目经验和申报经验

                        </li>
                        <li>熟悉多种EDC系统，包括Rave、百奥知、太美等

                        </li>
                        <li>国际最大的EDC系统提供商Medidata的认证合作伙伴

                        </li>
                        <li>依照标准词典MedDRA、WHO Drug进行数据编码, 使数据管理更加规范化和科学化


                        </li>
                        <li>丰富的CDISC标准实施经验</li>
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
           $(".subnav li:nth-of-type(5) a").addClass("active");
        });
    </script>
</body>
</html>