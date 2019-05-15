<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("declare");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "心血管介入产品-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

    <?php //echo $data["content"];?>   
    
    <div class="striving">
<!--banner-->
<div class="inside_banner news_media_banner" style="background-image:url(images/news_video_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">视频中心</h1>
                <p class="wow fadeInLeft">聚焦每一次突破与精彩</p>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="wrap">
            <div class="tab_nav wow fadeInUp">
                <ul class="clear">
                    <li class="active">品牌视频</li>
                    <li>产品视频</li>
                </ul>
            </div>
            <div class="news_media news_video">
                <div class="news_video_item active">
                    <div class="news_media_box clear">
                        <div class="news_media_item news_media_item_big">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_01.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_01.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="111">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>秒针中的生命 - 微创20周年品牌宣传片</p>
                                </div>
                            </a>
                        </div>
                        <div class="news_media_item news_media_item_small">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_02.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_02.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>企业宣传片</p>
                                </div>
                            </a>
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_03.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_03.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>创新的基因 - 常兆华博士专访</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="news_media_box clear">
                        <div class="news_media_item news_media_item_big">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_04.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_04.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>美国职业橄榄球运动员Terry Bradshaw专访</p>
                                </div>
                            </a>
                        </div>
                        <div class="news_media_item news_media_item_small">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_05.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_05.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>微创®2017年半年净利润同比大增272.4%</p>
                                </div>
                            </a>
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_06.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_06.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>走出大山看世界 - 微创希望小学活动侧记</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="news_media_box clear">
                        <div class="news_media_item news_media_item_big">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_07.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_07.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>上海生物医药创新突破</p>
                                </div>
                            </a>
                        </div>
                        <div class="news_media_item news_media_item_small">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_08.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_08.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>“中国心”或将年底临床运用</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="news_video_item">
                    <div class="news_media_box clear">
                        <div class="news_media_item news_media_item_big">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_01.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_01.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>秒针中的生命 - 微创20周年品牌宣传片</p>
                                </div>
                            </a>
                        </div>
                        <div class="news_media_item news_media_item_small">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_02.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_02.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>企业宣传片</p>
                                </div>
                            </a>
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_03.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_03.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>创新的基因 - 常兆华博士专访</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="news_media_box clear">
                        <div class="news_media_item news_media_item_big">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_04.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_04.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>美国职业橄榄球运动员Terry Bradshaw专访</p>
                                </div>
                            </a>
                        </div>
                        <div class="news_media_item news_media_item_small">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_05.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_05.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>微创®2017年半年净利润同比大增272.4%</p>
                                </div>
                            </a>
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_06.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_06.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>走出大山看世界 - 微创希望小学活动侧记</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="news_media_box clear">
                        <div class="news_media_item news_media_item_big">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_07.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_07.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>上海生物医药创新突破</p>
                                </div>
                            </a>
                        </div>
                        <div class="news_media_item news_media_item_small">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="images/news_video_08.jpg" alt=""/>
                                </div>
                                <div class="img img_mb">
                                    <img src="images/news_video_08.jpg" alt=""/>
                                </div>
                                <div class="play_btn" data-video-src="">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p>“中国心”或将年底临床运用</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--main end-->
<!--video-->
<div class="zz"></div>
    <div class="video_box">
        <div class="video_box_title clear">
            <h4>秒针中的生命 - 微创20周年品牌宣传片</h4>
            <a href="javascript:void(0);" class="video_close">×</a>
        </div>
        <div class="video_wrap">
            <video src="" controls></video>
        </div>
    </div>
<!--video end-->
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>

$('.news_video_item').each(function(){
        $(this).find('.news_media_box:odd').addClass('odd');
    });
    $('.play_btn').click(function(){
       var videoSrc=$(this).attr('data-video-src');
       $('.zz,.video_box').fadeIn(200);
       $('.video_wrap video').attr('src',videoSrc);
       $('.video_wrap video')[0].play()
    });
    $('.video_close').click(function(){
        $('.zz,.video_box').fadeOut(100);
        $('.video_wrap video')[0].pause()
    });
    domTab('.news_video_item')
    
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>