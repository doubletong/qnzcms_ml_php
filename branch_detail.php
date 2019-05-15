<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("culture");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "上海微创心脉医疗科技股份有限公司-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


    <?php // echo $data["content"];?>  

    <div class="striving">
<!--banner-->
<div class="inside_banner about_branch_banner" style="background-image:url(/images/about_branch_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <div class="inside_banner_logo wow fadeInLeft">
                <img src="/images/about_branch_logo_04.png"/>
            </div>
            <h2 class="wow fadeInLeft">上海微创心脉医疗科技股份有限公司</h2>
        </div>
    </div>
</div>
<!--banner end-->

<!--main-->
<div class="main about">
    <div class="wrap">
        <div class="about_branch_detail_desc wow fadeInUp">
            <p>上海微创心脉医疗科技股份有限公司（Shanghai MicroPort Endovascular MedTech Co., Ltd.）是微创医疗科学有限公司（HK:853）旗下的子公司之一（以下简称：心脉医疗™），公司成立于2012年，注册在中国上海国际医学园区时代医创园内，是上海市高新技术企业、上海市科技小巨人企业。</p>

            <p>心脉医疗™致力于介入医疗器械的研发、制造、销售和技术支持，主营产品为大动脉覆膜支架系统、术中支架系统、大球囊及外周血管支架等产品。公司产品广泛用于国内三甲医院，且出口至南美及东南亚等国家和地区。公司拥有专业化的研发团队，拥有及申请专利138项，已获得授权发明专利64项，实用新型专利17项，外观设计2项。</p>

            <p>公司现有员工300多人，拥有多名包括博士、硕士在内的微创伤介入医疗器材产品开发与生产方面的专业人才，拥有一批服务年限在5年以上的骨干员工。</p>

            <p>公司配备了精密、自动化程度高的加工设备及检测设备、现代化实验室等，拥有符合国家生产Ⅲ类植入产品标准的净化车间。</p>

            <p>心脉医疗™秉承微创集团“一个属于患者和医生的品牌”理念，关注于每一位用户的切身感受，以向主动脉及外周血管疾病患者提供个性化的治疗方案和服务为愿景，通过持续创新为医生提供能挽救并重塑患者生命或改善其生活质量的最佳普惠医疗解决方案，从而为社会做出贡献。</p>
            <a href="" class="about_branch_detail_link" target="_blank">查看公司官网</a>
        </div>
        <div class="about_branch_detail_contact wow fadeInUp">
            <h3>联系方式</h3>
            <dl>
                <dd class="add">地址：上海市浦东新区康新公路3399弄1号楼（上海国际医学园区医创园）</dd>
                <dd class="email">邮编：201318</dd>
                <dd class="tel">电话：+ (86) (21) 38139300</dd>
                <dd class="fax">传真：+ (86) (21) 33750026</dd>
                <dd class="site">网址：www.endovastec.com</dd>
            </dl>
        </div>
    </div>
</div>
<!--main end-->
    </div>


<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(2) a").addClass("active");
           $(".mainav li:nth-of-type(2) a").addClass("active");
           $(".subnav li:nth-of-type(6) a").addClass("active");
        });
    </script>
</body>
</html>