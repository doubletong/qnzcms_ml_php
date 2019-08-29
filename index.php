<?php

require_once("includes/common.php");
require_once("data/carousel.php");
require_once("data/link.php");
require_once("data/article.php");

$carouselClass = new TZGCMS\Carousel();
$carousels = $carouselClass->get_carousels('A001');

$linkClass = new TZGCMS\Link();
$links = $linkClass->get_links_bydid(41);

$articleClass = new TZGCMS\Article();
$articles = $articleClass->laster_articles(13);


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo $site_info['sitename']; ?></title>
    <link href="plugins/bxslider/jquery.bxslider.min.css" rel="stylesheet">
    <?php require_once('includes/meta.php') ?>
    <meta name=keywords content="">
    <meta name=description content="">

</head>

<body>
    <?php require_once('includes/header.php') ?>

    <div class="slider-container">
        <!-- slider start -->
        <div class="slider-wrap">        
            <div class="slider">
                <?php foreach ($carousels as $carousel) { ?>
                    
                    <div class="item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="title wow slideInUp">
                                    <?php echo $carousel['title']; ?>
                                </div>
                                <a href="<?php echo $carousel['link']; ?>" class="btn btn-white wow slideInUp toplink">查 看 详 情 <i class="iconfont icon-right"></i></a>
                            </div>
                            <div class="col-lg-8">
                                <a href="<?php echo $carousel['link']; ?>" title="<?php echo $carousel['title']; ?>" class="linkimg wow slideInUp" >                                     
                                    <img src="<?php echo $carousel['image_url_mobile']; ?>" srcset="<?php echo $carousel['image_url']; ?> 768w, <?php echo $carousel['image_url_mobile']; ?> 1x" />
                                </a>
                                <a href="<?php echo $carousel['link']; ?>" class="btn btn-white wow slideInUp botlink">查 看 详 情 <i class="iconfont icon-right"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>

                <?php } ?>
            </div>         
           
        </div>
        <!-- slider end -->
        <div class="bg-01"></div>
   
    </div>

  
    <div class="page-home">


        <section class="container s2">
            <div class="row align-items-center no-gutters">
                <div class="col-auto">
                        <div class="txt wow slideInUp">
                            <h3>研发与产品</h3>
                            <p>关爱生命 我们从未止步</p>
                        </div>
                        <ul class="categories wow slideInUp">
                            <li><a href="/products" >心血管领域</a></li>
                            <li><a href="/products" >神经退行性病变</a></li>
                            <li><a href="/products" >肿瘤领域</a></li>                            
                        </ul>
                        <div class="more wow fadeInUp"><a href="/products">研发与产品管线 <i class="iconfont icon-right"></i></a> </div>
                </div>
                <div class="col">
                    <div class="pic wow slideInUp">
                        <img src="/img/img-026.jpg" alt="心血管领域">
                    </div>
                </div>
                <div class="col-md-auto last">
                    <img src="/img/img-027.jpg" class="wow slideInUp" alt="">
                </div>
            </div>
        </section>

        <section class="s3">
            <div class="container">
                <div class="video-container wow slideInUp">
                    <div class="txt ">
                        <p class="wow slideInUp p1" data-wow-delay=".3s">视频</p>
                        <h2 class="wow slideInUp">那些你不曾了解的先通医药核医学</h2>                  
                    </div>
                    <video id='my-video' class='video-js ' controls preload='auto' style="background-image:url('/uploads/videos/people.jpg')"
                         data-setup='{}'>
                        <source src='/uploads/videos/people.mp4' type='video/mp4'>         
                        <p class='vjs-no-js'>
                            To view this video please enable JavaScript, and consider upgrading to a web browser that
                            <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
                        </p>
                    </video>                
            </div>
           <div class="bg-01 wow slideInUp">
               <img src="/img/bg_003.png" alt="bg">
           </div>
        </section>
    
        <section class="container s4">
            <div class="row">
                <div class="col-lg-auto">
                    <div class="importance wow slideInLeft">
                        我们致力于成为从放射性药物研发、优质生产、临床学术推广为一体的整体解决方案提供者
                    </div>
                    <p><img src="/img/logo_v1.png" alt="logo"></p>
                </div>
                <div class="col-lg">
                    <div class="txt wow slideInRight">
                        北京先通国际医药科技股份有限公司始<strong>创于2004年</strong>，是一家以有效整合放射性药物研发技术平台和单克隆抗体研发药物技术平台为主，以仿制药研发、生产、销售为辅；研究、开发、商业化分子影像引导的靶向药物、精准诊断及精准治疗药物的创新型医药企业。
                    </div>
                    <a href="/about" class="more wow slideInRight">关于我们 <i class="iconfont icon-right"></i></a>
                </div>
            </div>
        </section>

        <section class="container s5">
            <header class="title title-section">
                <h2 class="wow slideInLeft">企业动态</h2>
                <p class="wow slideInRight p1">我们愿意时刻与您分享</p>
            </header>
            <?php require_once('views/news/includes/articlelist.php') ?>
            <div class="more  wow fadeInUp"><a href="/news">查看更多 <i class="iconfont icon-right"></i></a> </div>
        </section>
        <section class="s6-links" style="background-image:url('/img/bg-link-002.png')">
            <div class="container">
                <div class="row">
                    <div class="col-md-auto">
                        <div class="txt wow slideInUp">
                            <h3>合作品牌</h3>
                            <p>将先进的产品和技术引进中国</p>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="row links wow slideInRight" data-wow-delay=".3s">
                            <?php foreach ($links as $link) { ?>
                                <div class="col-6 col-md-4 ">
                                    <a href="<?php echo $link['link']; ?>">
                                        <img src="<?php echo $link['image_url']; ?>" alt="<?php echo $link['title']; ?>">
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>
    <script src="/plugins/bxslider/jquery.bxslider.min.js"></script>

    <script src="/js/libs/waypoints.min.js"></script>

    <script>
        $(document).ready(function() {
         
      
            $('.slider').bxSlider({
                auto: true,
                controls: true,
                autoHover: false,
                mode:'fade',
                onSliderLoad: function(currentIndex) {
                    $(".bx-wrapper .bx-pager").addClass("container");

                    var total = $(".bx-pager-item").length;
                    var heji = (currentIndex + 1) ;
                    $(".bx-wrapper .bx-pager").prepend("<div class='num'>" + heji + "</div>");
                    $(".bx-wrapper .bx-pager").append("<div class='total'>" + total + "</div>")
                },
                onSlideAfter: function($slideElement, oldIndex, newIndex) {
             
                    var heji = (newIndex + 1);
                    $(".num").text(heji);
                }
            });

            if(navigator.maxTouchPoints === 0) {
            $('.bx-viewport a').on("mousedown", function(e){
                var linkUrl = $(this).prop('href');
                window.location.href = linkUrl;
            });
        }

            // $(".navs a").click(function(e) {
            //     e.preventDefault();
            //     var index = $(this).text();
            //     index = parseInt(index) - 1;
            //     mySlider.goToSlide(index);
            // })
            // $(".prev001").click(function(e) {
            //     e.preventDefault();
            //     mySlider.goToPrevSlide();
            // })
            // $(".next001").click(function(e) {
            //     e.preventDefault();
            //     mySlider.goToNextSlide();
            // })

        });
    </script>
</body>

</html>