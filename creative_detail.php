<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();

if(isset($_GET['id'])){
    $id = $_GET['id'];  
    $data = $articleClass->fetch_data($id);
  
}else{
    header('Location: /creative');
    exit;
}

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo $data['title'] . "-良知创意中心-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-disease-list" style="background-image:url(../img/temp/b6.jpg)">
        <div class="container page-title">
            <div class="down">             
                <h1><?php echo $data['title']; ?></h1>
            </div>
        </div>
    </div>
    <div class="page page-disease-detail page-events-detail">
        <div class="container">
            <div class="detail">
            <?php echo $data['content']; ?>
            </div>
            <!-- <section class="prevnext">
                <a href="#">上一篇：“聚‘微’之程”手术系列直播——吉林大学第二医院站，重磅来袭！</a>
                <a href="#">下一篇：“聚‘微’之程”手术系列直播——吉林大学第二医院站，重磅来袭！</a>
            </section> -->
        </div>


    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");
            $(".subnav li:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>

</html>