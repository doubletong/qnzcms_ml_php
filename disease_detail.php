<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $did = 2;
    $data = $articleClass->fetch_data($id);
    // $prev = $articleClass->fetch_prev_data($id,$did);
    // $next = $articleClass->fetch_next_data($id,$did);
} else {
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
    <title><?php echo $data['title'] . "-疾病管理-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-disease-list" style="background-image:url(../img/temp/b3.jpg)">
        <div class="container page-title">
            <h1><?php echo $data['title']; ?></h1>
        </div>
    </div>
    <div class="page page-disease-detail">
        <div class="container detail">
            <?php echo $data['content']; ?>

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