<?php
require_once("../../includes/common.php");
require_once("../../data/product.php");



$productClass = new TZGCMS\Product();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $productClass->get_product_bgId($id);
    $prev = $productClass->fetch_prev_data($id);
    $next = $productClass->fetch_next_data($id);
    $categories = $productClass->get_all_categories();
 
} else {
    header('Location: /service');
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
    <title><?php echo  $data['title']."-产品中心-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>


    <!--main-->
    <div class="page page-news-detail page-product-detail ">
<div class="container">
        <header class="title title-app wow fadeInUp">
            <h1 class="t1"><?php echo $data['title']; ?></h1>
            <h4><?php echo $data['subtitle']; ?></h4>     
        </header>

       

        <div class="article">
            <?php echo $data['content'];?>

            
        </div>

    </div></div>
    <!--main end-->

    <?php require_once('../../includes/footer.php') ?>

    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            // $(".mainav li:nth-of-type(4)").addClass("active");
            // $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>

</html>