<?php

require_once(__DIR__ . "/includes/common.php");
require_once("data/carousel.php");

require_once("data/article.php");
require_once("data/page.php");

$carouselClass = new TZGCMS\Carousel();
$carousels = $carouselClass->get_carousels('A001');


$articleClass = new TZGCMS\Article();
$recommendArticles = $articleClass->get_recommend_articles_bycategory(45, 5);
$did = 6;
$categories = $articleClass->get_categories($did);
$articles = $articleClass->get_all_articles($did);

$pageClass = new TZGCMS\Page();
$page = $pageClass->fetch_data("home");






?>
<!doctype html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
    <title><?php echo $site_info['sitename']; ?></title>

    <?php require_once('includes/meta.php') ?>
    <meta name=keywords content="">
    <meta name=description content="">
    <link rel="stylesheet" href="/assets/js/vendor/swiper/package/css/swiper.min.css">
</head>

<body>

    <?php require_once('includes/header.php') ?>


    <div class="page-home">
        <!-- slider start -->
        <!-- <div class="godown" id="godown">
            <a href="javascript:void(0);" class="animated infinite fadeInDown delay-0s"><i class="iconfont icon-down"></i></a>
        </div> -->
        <div class="swiper-container slider">
            <div class="swiper-wrapper ">
                <?php foreach ($carousels as $carousel) { ?>

                    <div class="swiper-slide">
                        <?php if (empty($carousel['link'])) { ?>
                            <a class="forpc" href="javascript:void(0);" style="background-image:url(<?php echo $carousel['image_url']; ?>)">
                                <div class="txt">
                                    <h1><?php echo $carousel['title']; ?></h1>
                                    <p><?php echo $carousel['description']; ?></p>
                                </div>
                            </a>
                            <a class="formobile" href="javascript:void(0);" style="background-image:url(<?php echo $carousel['image_url_mobile']; ?>)">
                            <div class="txt">
                                    <h1><?php echo $carousel['title']; ?></h1>
                                    <p><?php echo $carousel['description']; ?></p>
                                </div>
                            </a>
                        <?php } else { ?>
                            <a class="forpc" href="<?php echo $carousel['link']; ?>" title="<?php echo $carousel['title']; ?>" style="background-image:url(<?php echo $carousel['image_url']; ?>)">
                            <div class="txt">
                                    <h1><?php echo $carousel['title']; ?></h1>
                                    <p><?php echo $carousel['description']; ?></p>
                                </div>
                            </a>
                            <a class="formobile" href="<?php echo $carousel['link']; ?>" title="<?php echo $carousel['title']; ?>" style="background-image:url(<?php echo $carousel['image_url_mobile']; ?>)">
                            <div class="txt">
                                    <h1><?php echo $carousel['title']; ?></h1>
                                    <p><?php echo $carousel['description']; ?></p>
                                </div>
                            </a>
                        <?php } ?>

                    </div>

                <?php } ?>


            </div>
            <!-- Add Pagination -->
            <div class="footer-pagination">
                <div class="container-fluid">
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto"><div class="swiper-button-prev"></div></div>
                        <div class="col-auto"><div class="swiper-pagination"></div></div>                    
                        <div class="col-auto"><div class="swiper-button-next"></div></div>
                    </div>      
                </div>          
            </div>
            <!-- Add Arrows -->
            
            
        </div>
        <?php // echo $page['content']; 
        ?>

        <section class="s1 container">
            <header class="title title-section">
                <h2 class="wow slideInUp">膜法水处理解决方案领导者</h2>
            </header>
            <p class="p1 wow slideInUp">三达膜环境技术股份有限公司是国内知名的以膜技术应用为核心的工业分离纯化和膜法水处理综合解决方案提供商和水务投资运营商。三达及子公司自有、共有的专利共计112项。其中，发明专利共计67项，实用新型专利共计44项，外观设计专利共计1项。</p>
            <div class="tj">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="item wow slideInUp">
                            <div class="pic">
                                <img src="/assets/img/home03.png" alt="专利">
                            </div>
                            <div class="txt">
                                <div class="num">
                                    <strong>112</strong><span>个</span>
                                </div>
                                <p>专利</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="item wow slideInUp">
                            <div class="pic">
                                <img src="/assets/img/home01.png" alt="PTA行业水处理市场占有率">
                            </div>
                            <div class="txt">
                                <div class="num">
                                    <strong>80</strong><span>%</span>
                                </div>
                                <p>PTA行业水处理市场占有率</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="item wow slideInUp">
                            <div class="pic">
                                <img src="/assets/img/home02.png" alt="销售膜面积（平方米）">
                            </div>
                            <div class="txt">
                                <div class="num">
                                    <strong>100</strong><span>亿</span>
                                </div>
                                <p>销售膜面积（平方米）</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <section class="s2 ">
            <div class="container">
                <header class="title title-section">
                    <h2 class="wow slideInUp">覆盖多个应用领域</h2>
                </header>
                <p class="p1 wow slideInUp">工业分离业务方面，主要帮助食品饮料、医药、生物发酵、化工、石化等行业客户，提高产品质量，降低生产成本，减少废物排放。在膜法水处理业务方面，公司应用膜技术为市政、工业、家庭用户提供供水净化、废水处理、中水回用等综合解决方案。</p>
            </div>

            <div class=" why wow slideInUp">
                <div class="bg-container">
                    <img src="/assets/img/home08.jpg" id="appbg" alt="">
                </div>
                <div class="hometabs">
                    <div class="tab-container ">
                        <ul class="tabs-header wow slideInUp">
                            <?php foreach ($categories as $category) { ?>
                                <li><a href="#slide<?php echo $category['id']; ?>" data-bg="<?php echo $category['thumbnail2']; ?>"><?php echo $category['title']; ?></a></li>
                            <?php   } ?>

                        </ul>

                        <div class="swiper-container homeapps wow slideInUp">
                            <div class="swiper-wrapper">

                                <?php foreach ($categories as $category) { ?>
                                    <div class="swiper-slide" data-hash="slide<?php echo $category['id']; ?>" style="background-image:url('<?php echo $category['thumbnail2']; ?>');">
                                        <div class="txt">
                                            <h3><?php echo $category['title']; ?></h3>
                                            <ul>
                                                <?php foreach ($articles as $article) {
                                                        if ($category['id'] === $article['categoryId']) {
                                                            ?>

                                                        <li>
                                                            <a href="/application/detail/<?php echo $article['id']; ?>">— <?php echo $article['title']; ?></a>
                                                        </li>
                                                <?php }
                                                    }
                                                    ?>
                                            </ul>

                                            <a href="/application/list/<?php echo $category['id']; ?>" class="more">了解详情 <i class="iconfont icon-right"></i></a>
                                        </div>
                                    </div>

                                <?php   } ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="s3 ">
            <div class="container">
                <header class="title title-section">
                    <h2 class="wow slideInUp">始终坚持最优质的产品</h2>

                </header>
                <p class="p1 wow slideInUp">三达膜始终坚持生产最优质的产品，成为应用先进膜技术发展环保水务、清洁生产与循环经济的全球领先企业。</p>
            </div>
            <div class="links wow slideInUp">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <div class="item">
                            <div class="pic">
                                <a href="/products"><img src="/assets/img/home04.jpg" alt="膜材料"></a>
                            </div>
                            <h4 class="title">
                                <a href="/products">膜材料</a>
                            </h4>
                            <a href="/products" class="more">了解详情 <i class="iconfont icon-right"></i></a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="item">
                            <div class="pic">
                                <a href="/products"><img src="/assets/img/home05.jpg" alt="膜应用"></a>
                            </div>
                            <h4 class="title">
                                <a href="/products">膜应用</a>
                            </h4>
                            <a href="/products" class="more">了解详情 <i class="iconfont icon-right"></i></a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="item">
                            <div class="pic">
                                <a href="/environmental"><img src="/assets/img/home06.jpg" alt="环境服务"></a>
                            </div>
                            <h4 class="title">
                                <a href="/environmental">环境服务</a>
                            </h4>
                            <a href="/environmental" class="more">了解详情 <i class="iconfont icon-right"></i></a>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="item">
                            <div class="pic">
                                <a href="/application/list/41"><img src="/assets/img/home07.jpg" alt="净水机"></a>
                            </div>
                            <h4 class="title">
                                <a href="/application/list/41">净水机</a>
                            </h4>
                            <a href="/application/list/41" class="more">了解详情 <i class="iconfont icon-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="s4">
            <div class="container">
                <header class="title title-section">
                    <h2 class="wow slideInUp">领先的膜应用技术工艺</h2>
                </header>
                <p class="p1 wow slideInUp">三达膜环境技术股份有限公司是国内知名的以膜技术应用为核心的工业分离纯化和膜法水处理综合解决方案提供商和水务投资运营商。三达膜科技经过多年的研究与实践，成功开发出一系列膜应用技术与工艺，帮助客户进行生产工艺的上下游技术整合与创新。</p>
            </div>

            <div class="swiper-container re-articles wow slideInUp">
                <div class="swiper-wrapper">
                    <?php foreach ($recommendArticles as $item) { ?>
                        <div class="swiper-slide" style="background-image:url('<?php echo $item['background_image']; ?>');">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a class="item" href="/technology/detail/<?php echo $item['id']; ?>">
                                            <h3 class="title"><?php echo $item['title'] ?></h3>
                                            <p><?php echo $item['summary']; ?></p>
                                            <span class="more">了解详情 <i class="iconfont icon-right"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="swiper-slide" style="background-image:url('/uploads/images/tech/te05.jpg');">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <a class="item" href="/technology/list/46">
                                        <h3 class="title">其它技术</h3>
                                        <p>Flow-Cel超滤膜技术、超滤膜技术、反渗透膜技术、连续离交、膜生物反应器技术、色谱分离、微管膜技术、厌氧技术。</p>
                                        <span class="more">了解详情 <i class="iconfont icon-right"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container arrows">
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>


            </div>



        </section>



    </div>

    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>
    <script src="/assets/js/vendor/swiper/package/js/swiper.min.js"></script>



    <script>
        $("#godown").click(function(e) {
            e.preventDefault();
            var srcollto = $(window).height() - $(".site-header").height();

            $("html, body").animate({
                scrollTop: srcollto
            }, 600);
        })

       // $('.slider').height($(window).height());

        var swiper = new Swiper('.slider', {
            slidesPerView: 1,
            spaceBetween: 0,
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });



        var swiper2 = new Swiper('.re-articles', {
            slidesPerView: 1,
            spaceBetween: 0,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        var swiper1 = new Swiper('.homeapps', {
            slidesPerView: 1,
            spaceBetween: 0,
            hashNavigation: {
                watchState: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            }

        });
        var bg = $(".tabs-header li").eq(swiper1.activeIndex).find("a").attr('data-bg');
        $(".tabs-header li").eq(swiper1.activeIndex).find("a").addClass("active");
        $("#appbg").attr("src", bg);

        swiper1.on('slideChange', function() {
            $(".tabs-header a.active").removeClass("active");
            $(".tabs-header a").eq(this.activeIndex).addClass("active");
            var bg = $(".tabs-header a").eq(this.activeIndex).attr('data-bg');
            $("#appbg").attr("src", bg);
        });

        $(document).ready(function() {

        });
    </script>
</body>

</html>