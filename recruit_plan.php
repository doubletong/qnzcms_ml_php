<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("biologic");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo "领军计划-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>

</head>
<body>
<?php require_once('includes/header.php') ?>
<?php //echo $data["content"];?>    
   

<div class="striving">
<!--banner-->
<div class="inside_banner" style="background-image:url(/images/recruit_lj_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">领军计划</h1>
            <p class="wow fadeInLeft">营造良好的人才发展微环境</p>
        </div>
    </div>
</div>
<!--banner end-->


<!--main-->
<div class="main about">
    <div class="wrap">
        <div class="about_college_detail wow fadeInUp">
            <p>微创®汇集了大批有丰富跨国公司经验的精英，为了体现集团对企业内部领军性人才的特别重视，营造良好的人才发展微环境，最大程度为该类人才及其家庭解决生活上的后顾之忧，同时也为了积极地吸引更多的医疗器械行业内顶尖人才加盟微创®并在自己擅长的领域内充分发挥才华，微创®自2013年1月1日起正式实施“双十企业领军人才计划”。</p>
            <p>“双十企业领军人才计划”旨在：围绕微创®重点发展战略目标的人才需求，通过内部甄别和外部招聘的方法，针对集团高管岗位，引进具备博士学位及5年以上跨国公司或研究机构同业工作经验，或拥有硕士学位及10年以上跨国公司或研究机构同业工作经验的高层次人才，并授予有效期为七年的“双十企业领军人才”称号。目前界定的专业方向包括但不局限于以下几个大类：三类植入器械、高值医用耗材、可穿戴设备、人工智能、微创伤外科、辅助生殖、康复医疗、再生医疗等。</p>
            <p>该计划除向内部领军人才提供微创®基本高管薪酬与福利待遇以外，更额外给予每人每相关个人津贴。</p>
            <p>“要么第一  要么唯一”是微创®人的创新思维方式。</p>
            <p>有意者请将简历投递至：<span style="color:#4763a8">yxdong@microport.com或HRRecruitment@microport.com</span></p>
            <p>我们诚挚地期待您的加入！</p>
        </div>
    </div>
</div>
<!--main end-->
</div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>

       
    </script>
</body>
</html>