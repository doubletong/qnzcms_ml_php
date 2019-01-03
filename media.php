<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();
$articles = $articleClass->fetch_category(1);

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "媒体关注-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="page-news">
<?php require_once('includes/header_news.php') ?>

<div class="container s1">
            <section class="newlist">
                <div class="box">
                    <div class="row">
                        <div class="col-lg-auto">
                            <div class="pubdate">
                                <div class="date">09.20-24</div>
                                <div class="year">2018</div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="des">
                                <h3 class="title media-title">
                                    <a href="media_detail.html">
                                            30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展
                                    </a>
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="row">
                        <div class="col-lg-auto">
                            <div class="pubdate">
                                <div class="date">09.20-24</div>
                                <div class="year">2018</div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="des">
                                <h3 class="title media-title">
                                    <a href="media_detail.html">
                                                30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展
                                        </a>
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="row">
                        <div class="col-lg-auto">
                            <div class="pubdate">
                                <div class="date">09.20-24</div>
                                <div class="year">2018</div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="des">
                                <h3 class="title media-title">
                                    <a href="media_detail.html">
                                                    30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展
                                            </a>
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="row">
                        <div class="col-lg-auto">
                            <div class="pubdate">
                                <div class="date">09.20-24</div>
                                <div class="year">2018</div>
                            </div>
                        </div>
                        <div class="col-lg">
                            <div class="des">
                                <h3 class="title media-title">
                                    <a href="media_detail.html">
                                                        30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展
                                                </a>
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <footer class="text-center">
                <a href="javascript:void(0);" class="more">查看更多</a>
            </footer>
        </div>


    </div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(5) a").addClass("active");
           $(".mainav li:nth-of-type(5) a").addClass("active");
           $(".subnav li:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>
</html>