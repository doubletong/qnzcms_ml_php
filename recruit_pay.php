<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("pay");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo $data["title"]."-人才招聘-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>

</head>
<body>
<?php require_once('includes/header.php') ?>
<?php //echo $data["content"];?>    
   

<div class="striving">
<!--banner-->
<div class="inside_banner about_banner"  style="background-image:url(<?php echo $data["background_image"];?>)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft"><?php echo $data["title"];?></h1>
            <p class="wow fadeInLeft">我们提供完善的全面薪酬计划，致力于为员工提供全方位的保障</p>
        </div>
    </div>
</div>
<!--banner end-->

<?php echo $data["content"];?>

</div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>

       
    </script>
</body>
</html>