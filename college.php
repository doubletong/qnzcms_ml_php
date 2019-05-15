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
    <title><?php echo "创新学院-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

<div class="striving">
<!--banner-->
<div class="inside_banner about_branch_banner" style="background-image:url(/images/about_career_college_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">创新学院</h1>
            <p class="wow fadeInLeft">让每位员工都掌握自己上级和上上级的能力<br/>每位基层管理者都具备高管的基本素质</p>
        </div>
    </div>
</div>
<!--banner end-->

<!--main-->
<div class="main about">
    <div class="wrap">
        <div class="about_college_detail wow fadeInUp">
            <p>创新学院以“让每位员工都掌握自己上级和上上级的能力，每位基层管理者都具备高管的基本素质”为院训，开设了包括领导力、通用技能、专业技能、定制化项目等在内的多种类型的学习内容，并以移动学习平台为载体，旨在为员工打造全方位的学习体验，提升员工的职业能力和素养，从而更有效的契合岗位胜任力的要求。</p>
            <p>近期，学院根据不同的职业发展通道，重新规划设置了学院的“院系制“，通过不同的专业院系设定特有的专业培养课程，从应知应会、融会贯通、行家里手、知行合一四个层级层层递进，从而使得培训做的更扎实，更有针对性。</p>
            <p>除了授课育人外，学院还培养了一批内部讲师和导师，让员工之间可以传帮带，言传身教，把更切合微创发展需要的好经验，好做法传承下去。</p>
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
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>