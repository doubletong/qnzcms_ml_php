<?php

require_once(__DIR__."/includes/common.php");
require_once("data/carousel.php");
require_once("data/link.php");
require_once("data/offer.php");
require_once("data/article.php");
require_once("data/page.php");

$carouselClass = new TZGCMS\Carousel();
$carousels = $carouselClass->get_carousels('A001');

$linkClass = new TZGCMS\Link();
$links = $linkClass->get_links_bydid(41);

$articleClass = new TZGCMS\Article();
$recommendArticles = $articleClass->get_laster_recommend_articles(3);

$pageClass = new TZGCMS\Page();
$page = $pageClass->fetch_data("home");

$offerClass = new TZGCMS\OfferRepository();
$offers= $offerClass->recommend_offers(12);


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo $site_info['sitename']; ?></title>

    <?php require_once('includes/meta.php') ?>
    <meta name=keywords content="">
    <meta name=description content="">
    <link rel="stylesheet" href="/assets/js/vendor/swiper/package/css/swiper.min.css">
</head>

<body>

    <?php require_once('includes/header.php') ?>

    <div class="banner-home">
       <div class="about wow fadeInDown">
           <h2 class="title-v4">
               Upercent <br/> Percent Of You
           </h2>
           <p class="subtitle">天艺·优普森，你成长的一部分，只为更好的你</p>
           <p>T-WORLD UPERCENT（天艺·优普森）国际艺术教育有着多年美术、音乐的专业教研教学经验，依托于强大的国内外高端师资力量及优质的国际院校教育资源，专注于国际艺术创新教育、作品集培训、艺术留学规划等。</p>
      
            <div class="more">
                <a href="/about">了解更多U%</a>
            </div>
        </div>
        <img src="/assets/img/home_02.png" class="bg01 wow slideInRight" alt="">
        <img src="/assets/img/home_03.png" class="bg02 wow slideInLeft" alt="">
       <div class="go">
           <i class="iconfont icon-down"></i>
       </div>
    </div>

  
    <div class="page-home">
  
        <?php // echo $page['content']; ?>

        <section class="s1 container">
            <header class="title title-section">
                <h2 class="wow slideInUp">Official Background</h2>
                <h3 class="wow slideInUp p1">官方背景</h3>
            </header>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="/assets/img/h_01.png" class="wow slideInLeft" alt="官方背景">
                </div>
                <div class="col-md-6">
                    <div class="intro wow slideInRight">
                        <h3 class="title">T-WORLD UPERCENT</h3>
                        <p>天艺•优普森国际艺术教育（T-world Upercent），是深圳广电集团与TCL集团联合成立的，深圳地区唯一一家具有官方背景的艺术学院。</p>
                        <div class="row  align-items-center">
                            <div class="col">
                                <img src="/assets/img/logo_bot.png" alt="">
                            </div>
                            <div class="col-auto">
                                <a href="/background"><i class="iconfont icon-arrow-right-circle-s-o"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="s2 ">
            <div class="container">
                <header class="title title-section">
                    <h2 class="wow slideInUp">Why Choose T-World Uperent?</h2>
                    <h3 class="wow slideInUp p1">为什么选择天艺・优普森</h3>
                </header>
            </div>
          
            <div class="container why wow slideInUp">
                <div class="row">
                    <div class="col-sm-6 col-md-3">
                        <div class="item">
                            <div class="icon">
                                <img src="/assets/img/icon_01.png" alt="官方权威背景双集团保驾护航">
                            </div>
                            <h3 class="title">
                                官方权威背景双集团保驾护航
                            </h3>
                            <p>
                                深圳广电集团与TCL集团联合打造资源丰富、可靠可信的官方艺术学院
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="item">
                            <div class="icon">
                                <img src="/assets/img/icon_02.png" alt="官方权威背景双集团保驾护航">
                            </div>
                            <h3 class="title">
                                国际背景精英导师专家纯正广电集团师资团队
                            </h3>
                            <p>
                                核心教研团队由具有海外留学背景的国内顶级专业学府的资深教授纯正的广电传媒艺术师资团队、以及各领域艺术教育专家组成
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="item">
                            <div class="icon">
                                <img src="/assets/img/icon_03.png" alt="官方权威背景双集团保驾护航">
                            </div>
                            <h3 class="title">
                            量身推荐专业、定向背景提升专攻申请国际名校
                            </h3>
                            <p>
                            针对不同学员的个人条件及特色学院将会根据全方位的入学能力测试结果进行专业选择与院校推荐的专项评估
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="item">
                            <div class="icon">
                                <img src="/assets/img/icon_04.png" alt="官方权威背景双集团保驾护航">
                            </div>
                            <h3 class="title">
                            全方位激发艺术潜能
                            </h3>
                            <p>
                            全方位激发学员的艺术潜能深度开发学员在艺术思维上的主观能动性与艺术创造力 
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="s3 container">
            <header class="title title-section">
                <h2 class="wow slideInUp">School Advantage</h2>
                <h3 class="wow slideInUp p1">学院优势</h3>
            </header>
            <div class="adv">
                <div class="row no-gutters">
                    <div class="col-6 col-md-3 wow slideInUp" >
                        <img src="/assets/img/ho_03.jpg" alt="">
                    </div>
                    <div class="col-6 col-md-3  wow slideInUp" data-wow-delay=".2s">
                        <img src="/assets/img/ho_04.jpg" alt="">
                    </div>
                    <div class="col-6 col-md-3 wow slideInUp" data-wow-delay=".4s">
                        <img src="/assets/img/ho_05.jpg" alt="">
                    </div>
                    <div class="col-6 col-md-3 wow slideInUp" data-wow-delay=".6s">
                        <img src="/assets/img/ho_06.jpg" alt="">
                    </div>

                    <div class="col-6 col-md-3 wow slideInUp">
                        <img src="/assets/img/ho_08.jpg" alt="">
                    </div>
                    <div class="col-6 col-md-3 wow slideInUp" data-wow-delay=".2s">
                        <img src="/assets/img/ho_10.jpg" alt="">
                    </div>
                    <div class="col-6 col-md-3 wow slideInUp" data-wow-delay=".4s">
                        <img src="/assets/img/ho_11.jpg" alt="">
                    </div>
                    <div class="col-6 col-md-3 wow slideInUp" data-wow-delay=".6s">
                        <img src="/assets/img/ho_12.jpg" alt="">
                    </div>

                    <div class="col-6 col-md-3 wow slideInUp">
                        <img src="/assets/img/ho_13.jpg" alt="">
                    </div>
                    <div class="col-6 col-md-3 wow slideInUp" data-wow-delay=".2s">
                        <img src="/assets/img/ho_14.jpg" alt="">
                    </div>
                    <div class="col-6 col-md-3 wow slideInUp" data-wow-delay=".4s">
                        <img src="/assets/img/ho_15.jpg" alt="">
                    </div>
                    <div class="col-6 col-md-3 wow slideInUp" data-wow-delay=".6s">
                        <img src="/assets/img/ho_16.jpg" alt="">
                    </div>

                </div>
            </div>
        </section>
        <section class="container s4">
            <header class="title title-section">
                <h2 class="wow slideInLeft">Dynamic Information</h2>
                <h3 class="wow slideInRight p1">动态资讯</h3>
            </header>
            <div class="recommed  wow fadeInUp">
                <div class="row">
                    <?php foreach($recommendArticles as $item ){ ?>
                        <div class="col-md">
                            <a class="item" href="/news/detail/<?php echo $item['id']; ?>">
                                <img src="<?php echo empty($item['thumbnail']) ? "/img/news_detail.jpg" : $item['thumbnail']; ?>" alt="<?php echo $item['title'] ?>" />
                                <h3><?php echo $item['title'] ?></h3>
                            </a>
                         
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="more  wow fadeInUp"><a href="/news">more</a> </div>
        </section>

        <section class="s5 container">
            <header class="title title-section">
                <h2 class="wow slideInLeft">Successful Cases</h2>
                <h3 class="wow slideInRight p1">学员Offer</h3>
            </header>
        
          <!-- Swiper -->
            <div class="swiper-container offerlist">
              
                <div class="swiper-wrapper ">
                    <?php foreach($offers as $offer){?>
                        <div class="swiper-slide">
                            <div class="thumb wow fadeInUp">
                                <img src="<?php echo $offer['image_url'] ?>" alt="<?php echo $offer['name'] ?>">
                            </div>
                            <dl class="wow fadeInUp">
                                <dd><?php echo $offer['name'] ?></dd>
                                <dd>专业方向：<?php echo $offer['dic_title'] ?></dd>
                                <dd>录取院校：<?php echo $offer['schools'] ?></dd>
                                <?php if(isset($offer['scholarship'])){?>
                                    <dd>奖学金总额：<?php echo $offer['scholarship'];?></dd>
                                <?php } ?>
                            </dl>
                        </div>
                    <?php } ?>             
                   
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>

        </section>

        <section class="s6-links" style="background-image:url('/img/bg-link-002.png')">
            <div class="container">
                <div class="title-section-v1 wow slideInUp">
                    <h2>College Libary</h2>
                    <h3>合作院校</h3>
                </div>
               
            </div>
            <div class="links wow fadeInUp">
            <div class="container ">
                <div class="row ">
                    <?php foreach ($links as $link) { ?>
                        <div class="col-4 col-md">
                            <a href="<?php echo $link['url']; ?>">
                                <img src="<?php echo $link['image_url']; ?>" alt="<?php echo $link['title']; ?>">
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
            </div>
        </section>
    </div>

    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>
    <script src="/assets/js/vendor/swiper/package/js/swiper.min.js"></script>



    <script>
         var swiper = new Swiper('.offerlist', {
            slidesPerView: 4,
      spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        $(document).ready(function() {
         
      

        });
    </script>
</body>

</html>