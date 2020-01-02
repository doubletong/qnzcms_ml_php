<?php
require_once("../../includes/common.php");
require_once("../../data/annal.php");

$annalClass = new TZGCMS\Annal();

$did=isset($_GET['did'])?$_GET['did']:13;
$annals = $annalClass->get_all_annals($did);

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo "荣誉资质-关于我们" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link rel="stylesheet" href="/assets/js/vendor/swiper/package/css/swiper.min.css">
</head>

<body>
    <?php require_once('../../includes/header.php') ?>

    <?php require_once('includes/header_about.php') ?>

    <div class="page page-honor">
        <div class="container">
            <div class="row no-gutters honor-nav">
                <div class="col">
                    <a href="/about/honors" class="<?php echo $did==13?"active":"";?>">获奖情况</a>
                </div>
                <div class="col"><a href="/about/honors?did=14" class="<?php echo $did==14?"active":"" ?>">专利情况</a></div>
                <div class="col"><a href="/about/honors?did=33" class="<?php echo $did==33?"active":""?>">资质情况</a></div>
            </div>
            <div class="years">
            <div class="swiper-container  gallery-thumbs">
                <div class="swiper-wrapper">
                    <?php foreach($annals as $annal){ ?>
                        <div class="swiper-slide"><?php echo $annal['year'];?></div>
                    <?php } ?>                   
                </div>
               
            </div>
            <div class="swiper-button-next "></div>
                <div class="swiper-button-prev "></div>
            </div>
        </div>
            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                <?php foreach($annals as $annal){ ?>
                    <div class="swiper-slide">
                        <div class="container">                  
                        <?php echo $annal['description'];?>
                        </div>
                    </div>
                    <?php } ?>         
                   

                </div>
                <!-- Add Arrows -->
                <!-- <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div> -->
            </div>


     
        <?php //  echo $data["content"]; 
        ?>
    </div>

    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>
    <script src="/assets/js/vendor/swiper/package/js/swiper.min.js"></script>
    <script>
        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 20,
            slidesPerView: 6,
            loop: true,
      freeMode: true,
      loopedSlides: 5, //looped slides should be the same
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
        var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,     
            loop:true,
      loopedSlides: 5, //looped slides should be the same      
            thumbs: {
                swiper: galleryThumbs
            }
        });
    </script>
</body>

</html>