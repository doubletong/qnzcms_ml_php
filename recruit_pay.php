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
    <title><?php echo "整体薪酬-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>

</head>
<body>
<?php require_once('includes/header.php') ?>
<?php //echo $data["content"];?>    
   

<div class="striving">
<!--banner-->
<div class="inside_banner about_banner" style="background-image:url(images/recruit_pay_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">整体薪酬</h1>
            <p class="wow fadeInLeft">我们提供完善的全面薪酬计划，着力于为员工提供全方位的保障</p>
        </div>
    </div>
</div>
<!--banner end-->


<!--main-->
<div class="main about_career">
    <div class="recruit_post_t recruit_pay_t">
        <div class="wrap">
            <h3 class="wow fadeInUp">营造良好的人才发展环境</h3>
            <p class="wow fadeInUp">我们提供完善的全面薪酬计划，着力于为员工提供全方位的保障，营造良好的人才发展环境，从而实现人才的吸引、保留与发展。</p>
            <ul class="clear wow fadeInUp">
                <li>
                    <div class="icon">
                        <img src="images/recruit_pay_icon_01.png"/>
                    </div>
                    <h4>薪酬</h4>
                    <div class="desc">
                        <p>您的薪酬=固定薪酬+浮动奖金
                            我们提供有市场竞争力的薪资水平，以表现我们对人才价值的尊重和认可。</p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/recruit_pay_icon_02.png"/>
                    </div>
                    <h4>福利</h4>
                    <div class="desc">
                        <p>在微创<sup>®</sup>，除了法定福利，您还将享受到一系列企业补充福利，包括：补充带薪年假、商业保险、结婚礼金、生日/节日礼品、高温慰问、营养工作餐、以及各种现金或非现金形式的奖励计划。</p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/recruit_pay_icon_03.png"/>
                    </div>
                    <h4>培训与发展</h4>
                    <div class="desc">
                        <p>微创<sup>®</sup>为员工提供与公司共同成长的舞台，在这个舞台上，每一个想干事、能干事、会干事的人一定会大有作为。我们为您提供新员工入职培训、通用技能培训、专业技能培训、E-Learning学习系统、双通道职业发展计划，为您的发展保驾护航。</p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/recruit_pay_icon_04.png"/>
                    </div>
                    <h4>工作生活平衡</h4>
                    <div class="desc">
                        <p>微创<sup>®</sup>不仅关注员工的工作成果，同样关注员工的生活质量，我们尽力为您解决后顾之忧；关于您的健康：员工体检、免费健身、员工关怀计划、横向组织活动；关于您的家庭：弹性工作时间、家庭开放日。</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="recruit_pay_b">
        <div class="wrap">
            <h3 class="wow fadeInUp">各项福利列表</h3>
            <ul class="clear">
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_01.jpg" alt=""/>
                    <p>五险一金</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_02.jpg" alt=""/>
                    <p>补充公积金</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_03.jpg" alt=""/>
                    <p>商业保险</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_04.jpg" alt=""/>
                    <p>结婚礼金</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_05.jpg" alt=""/>
                    <p>生日礼品</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_06.jpg" alt=""/>
                    <p>节日礼金</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_07.jpg" alt=""/>
                    <p>高温慰问</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_08.jpg" alt=""/>
                    <p>营养工作餐</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_09.jpg" alt=""/>
                    <p>各种现金或非现金形式的奖励计划</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_10.jpg" alt=""/>
                    <p>补充带薪年假</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_11.jpg" alt=""/>
                    <p>员工体检</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_12.jpg" alt=""/>
                    <p>免费健身</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_13.jpg" alt=""/>
                    <p>员工关怀计划</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_14.jpg" alt=""/>
                    <p>人才公寓-微创家园</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_15.jpg" alt=""/>
                    <p>横向组织活动</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_16.jpg" alt=""/>
                    <p>弹性工作时间</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_17.jpg" alt=""/>
                    <p>家庭开放日</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_18.jpg" alt=""/>
                    <p>新员工入职培训</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_19.jpg" alt=""/>
                    <p>通用技能培训</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_20.jpg" alt=""/>
                    <p>专业技能培训</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_21.jpg" alt=""/>
                    <p>E-Learning学习系统</p>
                </li>
                <li class="wow fadeInUp">
                    <img src="images/recruit_pay_22.jpg" alt=""/>
                    <p>双通道职业发展计划</p>
                </li>
            </ul>
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