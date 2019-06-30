<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("about");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">
<head>
    <title><?php echo $data["title"]."-".SITENAME; ?></title>    
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
                    <p class="wow fadeInLeft">SINCE 1998，中国高端创新医疗解决方案的引领者</p>
                </div>
            </div>
        </div>
        <!--banner end-->
        <?php echo $data["content"];?>

</div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
           $(".leftnav li:nth-of-type(1) a").addClass("active");
           $(".mainav li:nth-of-type(1) a").addClass("active");
           $(".subnav li:nth-of-type(1) a").addClass("active");
        });
    </script>
</body>
</html>