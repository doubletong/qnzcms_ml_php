<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $did = 2;
    $data = $articleClass->fetch_data($id);
    $prev = $articleClass->fetch_prev_data($id,$did);
    $next = $articleClass->fetch_next_data($id,$did);
}else{
    header('Location: /news');
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
    <title><?php echo $data["title"] . "-学术活动-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-disease-list" style="background-image:url(<?php echo $data["background_image"]; ?>)">
        <div class="container page-title">
            <div class="down">
                <p class="date"><?php echo date('Y-m-d',$data['pubdate']) ;?></p>
                <h1><?php echo $data["title"]; ?></h1>
            </div>
        </div>
    </div>
    <div class="page page-disease-detail page-events-detail">
        <div class="container">
            <div class="detail">
                <?php echo $data["content"]; ?>
            </div>
            <section class="prevnext">
            <?php if(!empty($prev)){?>                   
                    <a href="/events/detail-<?php echo $prev["id"];?>">上一篇：<?php echo $prev["title"];?></a>
                    <?php } ?>
                    <?php if(!empty($next)){?>                   
                    <a href="/events/detail-<?php echo $next["id"];?>">下一篇：<?php echo $next["title"];?></a>
            <?php } ?>


         
            </section>
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