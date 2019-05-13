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

<div class="godown " id="godown">
    <a href="javascript:void(0);" class="animated infinite fadeInDown delay-0s"><i class="iconfont icon-downarrow"></i></a>
</div>
    <div class="page-home">
        <!-- slider start -->
        <div class="slider">
            <?php foreach ($carousels as $carousel) { ?>
                <div class="item" style="background-image:url(<?php echo $carousel['image_url']; ?>)">
                    <a href="<?php echo $carousel['link']; ?>" title="<?php echo $carousel['title']; ?>">
                        
                    </a>
                </div>
            <?php } ?>
        </div>


        <!-- slider end -->

        <div class="container s1">
            <h2 class="title se-title  wow slideInUp">以人为本   持续创新</h2>
            <p class="wow slideInUp" data-wow-delay=".3s">微创®起源于1998年成立的上海微创医疗器械（集团）有限公司，公司现有员工来自于30多个国家，约6,000名；已上市产品约300个；已进入全球逾10,000家医院，覆盖亚太、欧洲和美洲等主要地区，平均每8秒就有一个微创®产品被用于救治患者生命；或改善其生活品质；或用于帮助其催生新的生命。现已拥有专利（申请）3,500余项（国外2,000项）；5次获得中国国家科学技术进步奖；15个产品进入国家创新医疗器械注册绿色通道。</p>

            <section class="row s1-001  ">
                <div class="col-md-4 wow slideInUp">
                    <div class="item">
                        <div class="icon">
                            <img src="/img/icon-his.png" alt="医院">
                        </div>
                        <div class="title">
                            <span class="num001">10,000</span><small>家</small>
                        </div>
                       <p>全球医院已覆盖</p>
                       
                    </div>
                </div>
                <div class="col-md-4 wow slideInUp" data-wow-delay=".3s">
                    <div class="item">
                        <div class="icon">
                            <img src="/img/icon-ss.png" alt="医院">
                        </div>
                        <div class="title">
                            <span class="num001">300</span><small>个</small>
                        </div>
                       <p>微创已上市产品</p>
                       
                    </div>
                </div>
                <div class="col-md-4 wow slideInUp" data-wow-delay=".6s">
                    <div class="item">
                        <div class="icon">
                            <img src="/img/icon-zl.png" alt="医院">
                        </div>
                        <div class="title">
                            <span class="num001">3,500</span><small>余项</small>
                        </div>
                       <p>微创已上市产品</p>
                       
                    </div>
                </div>
            </section>

            <h2 class="title se-title  wow slideInUp">一个属于患者与医生的品牌</h2>
            <p class="wow slideInUp" data-wow-delay=".3s">集团始终坚持以人为本在以微创伤为代表的高科技医学领域建设一个属于患者的全球化领先医疗集团。</p>

        </div>

        <section class="s2">
            <div class="item t1 wow fadeInRight">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                        <h2>临床解决方案</h2>
                        <p>治愈疾病  更治愈人</p>
                        <a href="/operation" class="more">了解更多 <i class="iconfont icon-right"></i></a>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="item t2 wow fadeInLeft">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                        <h2>患者关爱</h2>
                        <p>关爱于心  携手同行</p>
                        <a href="/support" class="more">了解更多 <i class="iconfont icon-right"></i></a>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="item t3 wow fadeInRight">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col">
                        <h2>创新之窗</h2>
                        <p>更多行业创新  我们从不止步</p>
                        <a href="/creative" class="more">了解更多 <i class="iconfont icon-right"></i></a>
                        </div>
                    
                    </div>
                </div>
            </div>
        </section>
    
        <section class="container s1 s3">
            <h2 class="title se-title  wow slideInUp">中国领先的高端医疗解决方案</h2>
            <p class="wow slideInUp" data-wow-delay=".3s">微创®业务已覆盖心血管介入及结构性心脏病医疗、心脏节律管理及电生理医疗、骨科植入与修复、大动脉及外周血管介入、神经介入及脑科学、糖尿病及内分泌管理、泌尿及妇女健康、外科手术、医疗机器人与人工智能等十大业务集群。</p>
        </section>
        <section class="s4">

            <div class="item row no-gutters">
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_01.jpg" alt="心血管介入产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>心血管介入产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_02.jpg" alt="心律管理产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>心律管理产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_03.jpg" alt="骨科医疗器械产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>骨科医疗器械产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_04.jpg" alt="大动脉及外周血管介入产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>大动脉及外周血管介入产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>                       
                    </div>
                </div>
            </div>
            <div class="item row no-gutters">
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_01.jpg" alt="心血管介入产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>心血管介入产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_02.jpg" alt="心律管理产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>心律管理产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_03.jpg" alt="骨科医疗器械产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>骨科医疗器械产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_04.jpg" alt="大动脉及外周血管介入产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>大动脉及外周血管介入产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>                       
                    </div>
                </div>
            </div>
            <div class="item row no-gutters">
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_01.jpg" alt="心血管介入产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>心血管介入产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_02.jpg" alt="心律管理产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>心律管理产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_03.jpg" alt="骨科医疗器械产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>骨科医疗器械产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item">
                        <div class="pic">
                            <img src="/img/temp/pc_04.jpg" alt="大动脉及外周血管介入产品">
                        </div>
                        <a href="/products-list" class="">
                        <div class="row align-items-center">
                            <div class="col wow fadeInUp">
                                <h3>大动脉及外周血管介入产品</h3>
                                <div class="more">
                                    <span>了解更多</span> <i class="iconfont icon-right"></i>
                                </div>
                            </div></div>
                        </a>                       
                    </div>
                </div>
            </div>
        </section>
<section class="container s7">
    <a href="javascript:void(0);" class="prev001"><i class="iconfont icon-left"></i></a>
    <div class="navs">

    </div>
 
    <a href="javascript:void(0);" class="next001"><i class="iconfont icon-right"></i></a>
    <a href="/products" class="all">全部产品</a>
</section>
        <section class="container s1 s5">
            <h2 class="title se-title  wow slideInUp">微创®在全球</h2>
            <p class="wow slideInUp" data-wow-delay=".3s">微创®总部位于中国上海张江科学城，在中国上海、苏州、嘉兴、东莞，美国孟菲斯，法国巴黎近郊，意大利米兰近郊和多米尼加共和国等地均建有主要生产（研发）基地，形成了全球化的研发、生产、营销和服务网络。</p>
        </section>
        <section class="s6">
        </section>
    </div>



    <?php require_once('includes/footer.php') ?>


    <?php require_once('includes/scripts.php') ?>
    <script src="/plugins/bxslider/jquery.bxslider.min.js"></script>
    
    <script src="/js/libs/waypoints.min.js"></script>
    <script src="/plugins/counterup/jquery.counterup.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(1) a").addClass("active");
            $(".mainav li:nth-of-type(1) a").addClass("active");

            $("#godown").click(function(e){
                e.preventDefault();
                var srcollto = $(window).height() - $(".site-header").height();

                $("html, body").animate({ scrollTop: srcollto }, 600);
            })

            $('.slider').height($(window).height());

            $('.slider').bxSlider({
                auto: true,
                controls: false,
                autoHover: false,
                onSliderLoad:function(currentIndex){
                    $(".bx-wrapper .bx-pager").addClass("container");

                    var total = $(".bx-pager-item").length;
                    var heji = (currentIndex + 1) + "/" + total;
                    $(".bx-wrapper .bx-pager").prepend("<div class='num'>"+ heji +"</div>");
                },
                onSlideAfter:function($slideElement, oldIndex, newIndex){
                    var total = $(".bx-pager-item").length;
                    var heji = (newIndex + 1) + "/" + total;
                    $(".num").text(heji);
                }
            });
            var mySlider = $('.s4').bxSlider({
               
                controls: false,
                pager:false,
                autoHover: false,
                onSlideAfter:function($slideElement, oldIndex, newIndex){
                    $(".navs a").eq(newIndex).addClass("active").siblings().removeClass("active");
                }
              
            });

            var slideQty = mySlider.getSlideCount();
            for(var i = 0; i<slideQty;i++){
                var page = i+1;
                if(i==0){
                    $(".s7 .navs").append("<a href='javascript:void(0);' class='active'>"+ page +"</a>")
                }else{
                    $(".s7 .navs").append("<a href='javascript:void(0);'>"+ page +"</a>")
                }               
            }
            $(".navs a").click(function(e){
                e.preventDefault();
                var index = $(this).text();
                index = parseInt(index)-1;
                mySlider.goToSlide(index);
            })
            $(".prev001").click(function(e){
                e.preventDefault();
                mySlider.goToPrevSlide();
            })
            $(".next001").click(function(e){
                e.preventDefault();
                mySlider.goToNextSlide();
            })

            $('span.num001').counterUp({
                delay: 10, // the delay time in ms
                time: 2000 // the speed time in ms
            });

        });
    </script>
</body>

</html>