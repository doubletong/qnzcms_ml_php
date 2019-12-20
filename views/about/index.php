<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");
require_once("../../data/chronicle.php");
require_once("../../data/link.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("about");
$data1 = $pageClass->fetch_data("strength");


$chronicleClass = new TZGCMS\Chronicle();
$chronicles = $chronicleClass->get_all_chronicles_v1();
$years = $chronicleClass->get_years();

$linkClass = new TZGCMS\Link();
$links = $linkClass->get_links_bydid(41);

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo $data["title"] . "-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link rel="stylesheet" href="/assets/js/vendor/swiper/package/css/swiper.min.css">
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header_about.php') ?>

    <?php  echo $data["content"]; ?>



    <!--main-->
    <div class="page page-chronicle">


        <div class="container">
            <h1 class="title title-v2">发展历程</h1>

            <!-- Swiper -->
            <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                    <?php foreach ($years as $year) { ?>
                        <div class="swiper-slide"><?php echo $year['year']; ?></div>
                    <?php } ?>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
            </div>
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                    <?php foreach ($years as $year) { ?>
                        <div class="swiper-slide">
                            <ul>
                            <?php foreach ($chronicles as $course) {
                                    if ($year['year'] === $course['year']) {
                                        ?>
                                    <li>

                                        <span class="month">
                                            <?php echo $course['month']; ?>月
                                        </span>


                                        <?php echo $course['description'] ?>


                                    </li>
                                <?php } ?>
                                
                            <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>

                </div>
            </div>



        </div>
    </div>
    <!--main end-->
    
    <?php  echo $data1["content"]; ?>
 

    <div class="page page-links">
        <div class="container">
            <h1 class="title title-v2">合作伙伴</h1>
            <div class="linklist">
                <div class="row">
                    <?php foreach($links as $link){ ?>
                        <div class="col-md-4 col-lg-3">
                            <div class="item">
                                <img src="<?php echo $link['image_url'] ?>" alt="<?php echo $link['title'] ?>">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>
    <script src="/assets/js/vendor/swiper/package/js/swiper.min.js"></script>
    <script>
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 7,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
         
            thumbs: {
                swiper: galleryThumbs
            }
        });
    </script>

</body>

</html>