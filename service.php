<?php
require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/video.php");

$videoClass = new Video();
$videos = $videoClass->fetch_all();

do_html_doctype("waterpik洁碧水牙线使用指引_洁碧冲牙器使用方法视频_使用技巧-".SITENAME)
?>
    <meta name=keywords content="waterpik洁碧水牙线使用指引,洁碧冲牙器使用方法视频,洁碧洗牙器使用技巧">
    <meta name=description content="waterpik洁碧官网服务与支持频道，为您提供waterpik洁碧水牙线使用指引、洁碧冲牙器使用方法视频、洁碧洗牙器使用技巧等服务。想了解更多，就上洁碧官方网站！">
<?php
do_html_header();
?>

    <div class="container hidden-xs">
        <div class="breadcrumb">
            <a href="/">首页</a> &gt; <h1>服务与支持</h1>
        </div>
    </div>

    <div class="container service-page">
        <div class="row">
<?php   foreach($videos as $video){ ?>
    <div class="col-sm-6 col-md-4">
        <div class="service">
            <figure>
                <a href="<?php echo SITEPATH; ?>/service/<?php echo $video['id'];?>.html">
                    <img src="<?php echo $video['thumbnail'];?>" alt="<?php echo $video['title'];?>" />
                </a>
            </figure>
            <div class="txt">
                <h3><a href="<?php echo SITEPATH; ?>/service/<?php echo $video['id'];?>.html"><?php echo $video['title'];?></a></h3>
                <p>
                    <?php echo $video['sub_title'];?>
                </p>

            </div>
        </div>
    </div>
<?php } ?>

           

        </div>
    </div>
<?php
do_html_footer();
do_html_analytics();