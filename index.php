<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/carousel.php");
require_once("data/case.php");

$caseClass = new CaseShow();
$caseCategories = $caseClass->get_case_categories();
$cases = $caseClass->get_recommend_cases();


$carouselClass = new Carousel();
$carousels = $carouselClass->fetch_all();



?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo SITENAME; ?></title>
    <link href="plugins/bxslider/jquery.bxslider.min.css" rel="stylesheet">
    <?php require_once('includes/meta.php') ?>
    <meta name=keywords content="">
    <meta name=description content="">

</head>

<body>
    <?php require_once('includes/header.php') ?>


    <div class="page-home">
        <!-- slider start -->
        <div class="slider">
            <?php foreach ($carousels as $carousel) { ?>
                <div>
                    <a href="<?php echo $carousel['link']; ?>" title="<?php echo $carousel['title']; ?>">
                        <img src="<?php echo $carousel['image_url']; ?>" alt="<?php echo $carousel['title']; ?>">
                    </a>
                </div>
            <?php } ?>
        </div>
        <!-- slider end -->

        <div class="s1 wow slideInUp">
            觅乐墨品专注从事企业、品牌形象识别推广的设计公司，主要战略是为解决企业品牌在推广过程中所面临的问题
        </div>

        <div class="goodcase s2 wow slideInUp">
            <div class="container-fluid">
                <div class="row categories">
                    <?php foreach ($caseCategories as $cate) {
                        ?>
                        <div class="col-6 col-sm-4  col-lg-2">
                            <div class="item">
                                <div class="icon">
                                    <a href="/cases?cid=<?php echo $cate["id"]; ?>" title="<?php echo $cate["title"]; ?>">
                                        <img src="<?php echo $cate["imageurl"]   ?>" alt="<?php echo $cate["title"]   ?>" />
                                    </a>
                                </div>
                                <h3>
                                    <a href="/cases?cid=<?php echo $cate["id"]; ?>" title="<?php echo $cate["title"]; ?>">
                                        <?php echo $cate["title"]   ?>
                                    </a>
                                </h3>
                                <small><?php echo $cate["title_en"]   ?></small>
                            </div>
                        </div>
                    <?php
                }
                ?>

                </div>
            </div>
        </div>

        <div class="goodcase s3 wow slideInUp">
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($cases as $data) { ?>
                        <div class="col-md-4 col-lg-3">
                            <div class="item">
                                <a href="cases/detail-<?php echo $data['id']; ?>" title="<?php echo $data["title"]; ?>">
                                    <img src="<?php echo $data["thumbnail"]; ?>" alt="<?php echo $data["title"]; ?>">
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>



        </div>
    </div>



    <?php require_once('includes/footer.php') ?>


    <?php require_once('includes/scripts.php') ?>
    <script src="plugins/bxslider/jquery.bxslider.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(1) a").addClass("active");
            $(".mainav li:nth-of-type(1) a").addClass("active");
            $('.slider').bxSlider({
                auto: true,
                controls: false,
                autoHover: true
            });
        });
    </script>
</body>

</html>