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
    <title><?php echo "会议信息-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="page-news">
<?php require_once('includes/header_news.php') ?>

<div class="container s2">
            <section class="meetinglist">
                <div class="box">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="pic" style="background-image:url(img/temp/m1.jpg);">

                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="des">
                                <h3 class="title">
                                    2018 Medidata NEXT 中国区会议
                                </h3>
                                <p>2018.07.12</p>
                                <ul>
                                    <li>会议时间：2018.07.12</li>
                                    <li>会议地点：上海</li>
                                </ul>
                                <a href="meeting_detail.html" class="more">查看详情</a>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="box">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="pic" style="background-image:url(img/temp/m1.jpg);">

                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="des">
                                <h3 class="title">
                                    2018 Medidata NEXT 中国区会议
                                </h3>
                                <p>2018.07.12</p>
                                <ul>
                                    <li>会议时间：2018.07.12</li>
                                    <li>会议地点：上海</li>
                                </ul>
                                <a href="meeting_detail.html" class="more">查看详情</a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="box">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="pic" style="background-image:url(img/temp/m1.jpg);">

                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="des">
                                <h3 class="title">
                                    2018 Medidata NEXT 中国区会议
                                </h3>
                                <p>2018.07.12</p>
                                <ul>
                                    <li>会议时间：2018.07.12</li>
                                    <li>会议地点：上海</li>
                                </ul>
                                <a href="meeting_detail.html" class="more">查看详情</a>
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
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>