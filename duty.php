<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("duty");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "企业社会责任-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

<div class="striving">

<!--banner-->
<div class="inside_banner about_banner" style="background-image:url(<?php echo $data["background_image"];?>)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft"><?php echo $data["title"];?></h1>
            <p class="wow fadeInLeft">能力越大  责任越大</p>
        </div>
    </div>
</div>
<!--banner end-->
<?php echo $data["content"];?>

</div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
     $('.about_duty_nav li').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        $('.about_duty_item').eq($(this).index()).addClass('active').siblings().removeClass('active');
    });
    $('.about_duty_item_list').each(function(){
       $(this).find('li:odd').addClass('odd')
    })

        $(document).ready(function() {
            $(".leftnav li:nth-of-type(2) a").addClass("active");
           $(".mainav li:nth-of-type(2) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>