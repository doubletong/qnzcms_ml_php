<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("clinical");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "疾病管理-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-disease-list" style="background-image:url(../img/temp/b1.jpg)">
        <div class="container page-title">
            <h1>心脏疾病解决方案</h1>
        </div>
    </div>
    <div class="page page-disease-list">
        <div class="container">
            <section class="s1">
                <a href="/disease/detail-1" class="item">
                    <div class="pic" style="background-image:url(../img/temp/d3.jpg);"></div>
                    <h3>【微创良知-名医讲堂】冠心病的治疗 — 迟路湘</h3>
                    <img src="/img/play.png" class="play" alt="">
                </a>
                <a href="/disease/detail-1" class="item">
                    <img src="/img/temp/d1.jpg" alt="">
                    <h3>人工心脏瓣膜(基础篇)</h3>
                </a>
                <a href="/disease/detail-1" class="item">
                    <img src="/img/temp/d2.jpg" alt="">
                    <h3>成人二尖瓣狭窄(基础篇)</h3>
                </a>
            </section>
            <section class="s2">

                <h2 class="se-title">更多内容</h2>

                <div class="categories">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="#">冠心病</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">冠心病</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">冠心病</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">冠心病</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">冠心病</a>
                        </div>
                        <div class="col-md-2">
                            <a href="#">冠心病</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="list list-disease">
            <a href="/disease/detail-1" class="item">
                <div class="container">
                    <div class="disease">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="pic"><img src="/img/temp/d1.jpg" alt=""></div>
                            </div>
                            <div class="col-md-8">
                                <div class="des">
                                    <h3>成人二尖瓣狭窄(基础篇)</h3>
                                    <p>什么是主动脉瓣狭窄？主动脉瓣狭窄是指心脏的主动脉瓣无法完全开放(图 1)。心瓣膜可维持血液只沿单一方向流动，当其正常工作时，可完全开放以使血液流过。血液从一个叫“左心室”的心腔流出，经过主动脉瓣...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/disease/detail-1" class="item">
                <div class="container">
                    <div class="disease">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="pic"><img src="/img/temp/d1.jpg" alt=""></div>
                            </div>
                            <div class="col-md-8">
                                <div class="des">
                                    <h3>成人二尖瓣狭窄(基础篇)</h3>
                                    <p>什么是主动脉瓣狭窄？主动脉瓣狭窄是指心脏的主动脉瓣无法完全开放(图 1)。心瓣膜可维持血液只沿单一方向流动，当其正常工作时，可完全开放以使血液流过。血液从一个叫“左心室”的心腔流出，经过主动脉瓣...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="/disease/detail-1" class="item">
                <div class="container">
                    <div class="disease">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="pic"><img src="/img/temp/d1.jpg" alt=""></div>
                            </div>
                            <div class="col-md-8">
                                <div class="des">
                                    <h3>成人二尖瓣狭窄(基础篇)</h3>
                                    <p>什么是主动脉瓣狭窄？主动脉瓣狭窄是指心脏的主动脉瓣无法完全开放(图 1)。心瓣膜可维持血液只沿单一方向流动，当其正常工作时，可完全开放以使血液流过。血液从一个叫“左心室”的心腔流出，经过主动脉瓣...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="container">


            <section class=" s3">
                <h2 class="se-title">解决方案</h2>

                <div class="raproducts">
                    <div class="row">
                        <div class="col-md-4">
                            <a class="item" href="/products/detail-1">
                            <div class="logo">
                                <img src="/img/temp/logo1.png" alt="">
                            </div>
                                <h3>Firehawk®冠脉雷帕霉素靶向洗脱支架系统</h3>
                                <div class="more">查看产品</div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="item" href="/products/detail-1">
                            <div class="logo">
                                <img src="/img/temp/logo1.png" alt="">
                            </div>
                                <h3>Firehawk®冠脉雷帕霉素靶向洗脱支架系统</h3>
                                <div class="more">查看产品</div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a class="item" href="/products/detail-1">
                            <div class="logo">
                                <img src="/img/temp/logo1.png" alt="">
                            </div>
                                <h3>Firehawk®冠脉雷帕霉素靶向洗脱支架系统</h3>
                                <div class="more">查看产品</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="go">
                    <a href="/products">了解更多产品</a>
                </div>
            </section>
        </div>
    </div>
<div class="quickcontact">
    <div class="container">
        <div class="row align-items-center">
        <div class="col-md">
        <p>需要更多关于心脏疾病解决方案的信息吗？<br/>我们将尽快与您联系。</p>
        </div>
       <div class="col-sm-auto">
           <a href="mailto:13212847@qq.com" class="mailto wow shake">联系我们</a>
       </div>
       </div>
    </div>
    <a href="javascript:void();" class="btnclose"><i class="iconfont icon-close"></i></a>
</div>
    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");
            $(".subnav li:nth-of-type(3) a").addClass("active");

            $(".btnclose").click(function(e){
                $(".quickcontact").slideToggle();
            })
        });
    </script>
</body>

</html>