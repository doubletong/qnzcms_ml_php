<?php
require_once("../../includes/common.php");
require_once("../../data/offer.php");

require '../../vendor/autoload.php';

use JasonGrimes\Paginator;


$offerClass = new TZGCMS\OfferRepository();
$did = 44;

$urlPattern = "offers?page=(:num)";


$totalItems = $offerClass->get_offers_count($did);  //总记录数
$itemsPerPage = 24;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$offers = $offerClass->get_paged_offers($did,  $currentPage, $itemsPerPage);


?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo  "学员Offer-美术专业-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link rel="stylesheet" href="/assets/js/vendor/swiper/package/css/swiper.min.css">
</head>

<body>
    <?php require_once('../../includes/leftcol.php') ?>

    <?php require_once('includes/header-art.php') ?>

       <!-- <?php //  echo $data["content"]; ?> -->
    <div class="page page-art page-art-offer">       
        <section class="s1 container"> 
           <div class="row">
               <div class="col">
                   <a href="/art/course">
                       <div class="icon">
                           <i class="iconfont icon-icon-2"></i>
                       </div>
                       <p>课程介绍</p>
                    </a>
               </div>
               <div class="col">
                    <a href="/art/professional">
                       <div class="icon">
                           <i class="iconfont icon-icon-3"></i>
                       </div>
                       <p>专业介绍</p>
                    </a>
               </div>
               <div class="col">
                    <a href="/art/schools" >
                       <div class="icon">
                           <i class="iconfont icon-icon-1"></i>
                       </div>
                       <p>推荐院校</p>
                    </a>
               </div>
               <div class="col">
               <a href="/art/works">
                       <div class="icon">
                           <i class="iconfont icon-icon-4"></i>
                       </div>
                       <p>作品集培训</p>
                    </a>
               </div>
               <div class="col">
               <a href="/art/offers"   class="active">
                       <div class="icon">
                           <i class="iconfont icon-icon-"></i>
                       </div>
                       <p>学员offer</p>
                    </a>
               </div>
           </div>
        </section>
        <section class="s2 container">
            <div class="title-section-v2 wow slideInUp">             
                <h3>学员offer</h3>
            </div>
     
            <div class="offerlist">
                <div class="row">
                <?php foreach($offers as $offer){ ?>
                    <div class="col-md-3 wow slideInUp">
                        <div class="item">
                            <img src="<?php echo $offer['thumbnail'];?>" alt="offer">
                            <dl>
                                <dd><?php echo $offer['name'];?></dd>
                                <dd>录取院校：<?php echo $offer['schools'];?></dd>
                                <?php if(isset($offer['scholarship'])){?>
                                    <dd>奖学金总额：<?php echo $offer['scholarship'];?></dd>
                                <?php } ?>
                            </dl>
                        </div>
                    </div>
                <?php } ?>
                
                </div>
            </div>
                    
            <!--pagination-->
            <div class="wow fadeInUp">
                <?php include("../../vendor/jasongrimes/paginator/examples/pager.phtml") ?>
            </div>
            <!--pagination end-->

        </section>
       
    </div>


    <?php require_once('../../includes/footer.php') ?>

    <?php require_once('../../includes/scripts.php') ?>
    <script src="/assets/js/vendor/swiper/package/js/swiper.min.js"></script>
    <script>

        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 6,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            });
            var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
           
            thumbs: {
                swiper: galleryThumbs
            }
            });

        $(document).ready(function() {
        
      
        });
    </script>
</body>

</html>