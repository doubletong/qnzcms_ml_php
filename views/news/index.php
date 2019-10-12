<?php
require_once("../../includes/common.php");
require_once("../../data/article.php");

require '../../vendor/autoload.php';

use JasonGrimes\Paginator;


$articleClass = new TZGCMS\Article();
$did = 1;
$categories = $articleClass->get_categories($did);

$urlPattern = "/news?page=(:num)";

$cid = isset($_GET['cid']) ? $_GET['cid'] : null;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

if (!empty($cid)) {
    $urlPattern = $urlPattern . "&cid=$cid";
}
if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

$totalItems = $articleClass->get_articles_count_v1($did, $cid, $keyword);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$articles = $articleClass->get_paged_articles_v1($did, $cid, $keyword, $currentPage, $itemsPerPage);

$recommendArticles = $articleClass->get_laster_recommend_articles(3);


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "新闻动态-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <div class="banner banner-news" style="background-image:url('/assets/img/banners/news.jpg')">
        <div class="container title-page ">
            <h1>Dynamic Information</h1>
            <p>动态资讯</p>
        </div>
    </div>


    <!--main-->
    <div class="page page-news">

        <div class="container">
            <div class="row t1">
                <div class="col-md">
                    <div class="title title-section">
                        <h3>公司简介 <span>Company Profile</span></h3>
                        <p>专业的设备租赁服务平台，提供卓越的设备选择方案！</p>
                    </div>
                </div>
                <div class="col-md-auto align-self-end">
                    您的当前位置：<a href="/">主页</a> > <span class="current">公司简介</span>
                </div>
            </div>

            <main class="maincontent">
                <div class="row">
                    <div class="col-md-auto">
                        <?php require_once('includes/subnav.php') ?>
                        <aside class="navlist">
                            <a href="#">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <img src="/assets/img/icon_1.png" alt="" class="icon">
                                    </div>
                                    <div class="col">
                                        灯光音箱
                                    </div>
                                    <div class="col-auto">
                                        <span class="more">more</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <img src="/assets/img/icon_1.png" alt="" class="icon">
                                    </div>
                                    <div class="col">
                                        灯光音箱
                                    </div>
                                    <div class="col-auto">
                                        <span class="more">more</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <img src="/assets/img/icon_1.png" alt="" class="icon">
                                    </div>
                                    <div class="col">
                                        灯光音箱
                                    </div>
                                    <div class="col-auto">
                                        <span class="more">more</span>
                                    </div>
                                </div>
                            </a>
                        </aside>
                    </div>
                    <div class="col-md">
                      
                            <?php require_once('includes/articlelist.php') ?>
                     
                            <!--pagination-->
                            <div class="wow fadeInUp">
                                <?php include("../../vendor/jasongrimes/paginator/examples/pager.phtml") ?>
                            </div>
                            <!--pagination end-->
                      
                    </div>
                </div>
        </div>



    </div>

    </div>
    <!--main end-->

    <?php require_once('../../includes/footer.php') ?>

    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            // $(".mainav li:nth-of-type(4)").addClass("active");
            // $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>

</html>