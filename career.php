<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/team.php");

$teamClass = new Team();
$teams = $teamClass->fetch_category("核心团队");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "职业发展-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="striving">

<!--banner-->
<div class="inside_banner about_banner" style="background-image:url(images/about_career_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">职业发展</h1>
            <p class="wow fadeInLeft">你的加入  让微创®更出彩！</p>
        </div>
    </div>
</div>
<!--banner end-->

<!--main-->
    <div class="main about_career">
        <div class="about_career_t" style="background-image:url(images/about_career_01.jpg)">
            <h3 class="wow fadeInUp">人力资源服务</h3>
            <ul class="clear wow fadeInUp">
                <li>
                    <div class="icon">
                        <img src="images/about_career_icon_01.png"/>
                    </div>
                    <h4>健康关怀</h4>
                    <div class="desc">
                        <p>入职体检</p>
                        <p>年度体检</p>
                        <p>职业健康</p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/about_career_icon_02.png"/>
                    </div>
                    <h4>带薪假期</h4>
                    <div class="desc">
                        <p>法定年假</p>
                        <p>企业年资假</p>
                        <p>带薪病假</p>
                        <p>小孩病假</p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/about_career_icon_03.png"/>
                    </div>
                    <h4>弹性工作制</h4>
                    <div class="desc">
                        <p>针对有子女的女性<br/>员工的弹性工作制</p>
                        <p>特殊岗位</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="about_career_b">
            <ul class="clear">
                <li class="wow fadeInUp">
                    <div class="img">
                        <img src="images/about_career_02.jpg" alt=""/>
                    </div>
                    <div class="txt">
                        <h3>创新学院</h3>
                        <a href="/college">了解更多</a>
                    </div>
                </li>
                <li class="wow fadeInUp">
                    <div class="img">
                        <img src="images/about_career_03.jpg" alt=""/>
                    </div>
                    <div class="txt">
                        <h3>管培生计划</h3>
                        <a href="/plan">了解更多</a>
                    </div>
                </li>
            </ul>
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
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>