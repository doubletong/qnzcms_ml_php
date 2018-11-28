<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/video.php");

$videoClass = new Video();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $videoClass->fetch_data($id);
}else{
    header('Location: /service/');
    exit;
}

do_html_doctype("waterpik".$data['productName']."_使用指引_使用方法视频_-".SITENAME)
?>
    <link rel="stylesheet" href="/js/lib/mediaelement/mediaelementplayer.min.css" />
    <meta name=keywords content="<?php echo $data['keywords'];?>">
    <meta name=description content="<?php echo $data['description'];?>">
<?php
do_html_header();
?>

    <div class="container hidden-xs">
        <div class="breadcrumb">
            <a href="<?php echo SITEPATH; ?>">首页</a> &gt; <a href="<?php echo SITEPATH; ?>/service/">服务与支持</a>  &gt; <h1><?php echo $data['title'];?></h1>
        </div>
    </div>

    <div class="container service-page">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <header class="title">
                    <h2 class="tc">
                        <?php echo $data['title'];?>
                    </h2>
                    <h3 class="tc"><?php echo $data['sub_title'];?></h3>
                </header>
                <section class="video-container">
                    <video  width="100%" height="100%" poster="<?php echo $data['thumbnail'];?>" controls="controls" preload="none" title="<?php echo $data['title'];?>">
                        <!-- MP4 for Safari, IE9, iPhone, iPad, Android, and Windows Phone 7 -->
                        <source type="video/mp4" src="<?php echo $data['video_url'];?>" />
                        <!-- WebM/VP8 for Firefox4, Opera, and Chrome -->
                        <source type="video/webm" src="<?php echo $data['webm'];?>" />
                        <!-- Ogg/Vorbis for older Firefox and Opera versions -->
                        <source type="video/ogg" src="<?php echo $data['ogv'];?>" />
                        <!-- Optional: Add subtitles for each language -->
<!--                        <track kind="subtitles" src="subtitles.srt" srclang="en" />-->
                        <!-- Optional: Add chapters -->
<!--                        <track kind="chapters" src="chapters.srt" srclang="en" />-->
                        <!-- Flash fallback for non-HTML5 browsers without JavaScript -->
                        <object width="100%" height="100%" type="application/x-shockwave-flash" data="/js/lib/mediaelement/flashmediaelement.swf">
                            <param name="movie" value="/js/lib/mediaelement/flashmediaelement.swf" />
                            <param name="flashvars" value="controls=true&file=<?php echo $data['video_url'];?>" />
                            <!-- Image as a last resort -->
                            <img src="<?php echo $data['thumbnail'];?>" width="100%" height="100%" title="No video playback capabilities" />
                        </object>

                    </video>
                </section>

                <div class="share" id="share">
                    <a href="#">
                        <i class="icon-share-square-o"></i> 分享视频
                    </a>
                </div>
                <div class="kindly">
                    <header class="text-center">
                        <picture title="温馨提示">
                            <source media="(min-width: 768)" src="<?php echo SITEPATH; ?>/assets/img/server_title.jpg">
                            <source src="<?php echo SITEPATH; ?>/assets/img/server_title_m.jpg">
                            <img src="<?php echo SITEPATH; ?>/assets/img/server_title_m.jpg">
                        </picture>
                    </header>
                    <section class="kindly-body">
                        <?php echo $data['content'];?>
                    </section>
                    <footer class="text-center kindly-footer">
                        <img src="<?php echo SITEPATH; ?>/assets/img/ci.jpg" alt="牙齿" />
                    </footer>
                </div>
            </div>
        </div>
    </div>

<?php
do_html_footer();
?>
<div class="overing" id="overing">
    <div class="sharebtn">
        <div class="bdsharebuttonbox clearfix" id="bdsharebuttonbox" data-tag="share_1">
            <a class="bds_qzone" data-cmd="qzone" href="#"></a>
            <a class="bds_tsina" data-cmd="tsina"></a>
            <a class="bds_baidu" data-cmd="baidu"></a>
            <a class="bds_renren" data-cmd="renren"></a>
            <a class="bds_tqq" data-cmd="tqq"></a>
            <a class="bds_weixin" data-cmd="weixin"></a>
            <a class="bds_twi" data-cmd="twi"></a>
            <a class="bds_fbook" data-cmd="fbook"></a>
            <a class="bds_linkedin" data-cmd="linkedin"></a>
        </div>
        <div class="close">
            <button id="btnClose" type="button">关闭</button>
        </div>
    </div>
</div>

    <script>
        window._bd_share_config = {
            common: {
                bdText: '自定义分享内容',
                bdDesc: '自定义分享摘要',
                bdUrl: '自定义分享url地址',
                bdPic: '自定义分享图片'
            },
            share: [{
                "bdSize": 32
            }]
        }
        with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion=' + ~(-new Date() / 36e5)];
    </script>
<?php
do_html_analytics();