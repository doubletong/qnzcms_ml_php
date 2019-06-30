<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("recruit");

?>

<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo  $data["title"]."-人才招聘-".SITENAME; ?></title>    
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
            <p class="wow fadeInLeft">一点二道三划，助力人才发展成长</p>
        </div>
    </div>
</div>
<!--banner end-->
<?php echo $data["content"];?>

</div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
   $('.about_duty_item_list').each(function(){
        $(this).find('li:odd').addClass('odd')
    })
       
    </script>
</body>
</html>