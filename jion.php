<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/job.php");

$JobClass = new Job();
$jobs = $JobClass->fetch_all();

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "加入我们-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-jion">
    </div>
    <div class="page-jion">
        <div class="s1">
            <div class="page-title">
                <h1>加入我们</h1>
                <p>一个年轻又有朝气的团队，在这里，没有明显的上下级职位关系，我们可以玩的很嗨，也可以全设计全心努力不限制你的发挥，只要是好的想法，好的设计，你都可尽情发挥！</p>
            </div>
        </div>

        <div class="container s2">

            <header class="se-title">
                <h2>
                    职位开放
                </h2>
            </header>
            <section class="postlist">
                <?php foreach ($jobs as $job) { ?>
                    <div class="post">
                        <div class="post-header">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="post-title"><?php echo $job["title"]; ?></div>
                                        </div>
                                        <div class="col-sm-auto hidde-xs align-self-center">
                                            <div class="note note1">
                                                <span><i class="iconfont icon-dibiao"></i> 坐标：</span><?php echo $job["address"]; ?>    <span><i class="iconfont icon-user"></i> 人数：</span><?php echo $job["population"]; ?>人</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-auto align-self-center text-right">
                                    <a href="javascript:void(0);" class="open"><i class="iconfont icon-down"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="post-body">
                        <div class="note note2">
                                                <span><i class="iconfont icon-dibiao"></i> 坐标：</span><?php echo $job["address"]; ?>    <span><i class="iconfont icon-user"></i> 人数：</span><?php echo $job["population"]; ?>人</div>
                            <?php echo $job['content']; ?>
                            <p class="reply">请将简历发送至邮箱：<a href="mailto:07552377@qq.com" class="yellow">07552377@qq.com</a>，我们会尽快与你联系。</p>
                        </div>
                    </div>
                <?php  } ?>

            </section>
        </div>
        <div class="container s2 s3">
            <header class="se-title">
                <h2>
                    追求快乐 用心生活
                </h2>
            </header>
            <div class="row">
                <div class="col-sm-6 col-md-4">
                <div class="photo">
                    <img src="/img/1x/live-80.jpg" alt="">
                </div>
                </div>
                <div class="col-sm-6 col-md-4">
                <div class="photo">
                    <img src="/img/1x/live-80.jpg" alt="">
                </div>
                </div>
                <div class="col-sm-6 col-md-4">
                <div class="photo">
                    <img src="/img/1x/live-80.jpg" alt="">
                </div>
                </div>
                <div class="col-sm-6 col-md-4">
                <div class="photo">
                    <img src="/img/1x/live-80.jpg" alt="">
                </div>
                </div>
                <div class="col-sm-6 col-md-4">
                <div class="photo">
                    <img src="/img/1x/live-80.jpg" alt="">
                </div>
                </div>
                <div class="col-sm-6 col-md-4">
                <div class="photo">
                    <img src="/img/1x/live-80.jpg" alt="">
                </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(5) a").addClass("active");
            $(".mainav li:nth-of-type(5) a").addClass("active");

            $('.post a.open').click(function(e) {

                $(this).closest(".post-header").toggleClass("openshow");
                $(this).closest(".post").find(".post-body").slideToggle();
            });

        });
    </script>
</body>

</html>