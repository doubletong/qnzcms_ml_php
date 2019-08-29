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
$itemsPerPage = 12;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$articles = $articleClass->get_paged_articles_v1($did, $cid, $keyword, $currentPage, $itemsPerPage);




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

<body class="bg_white">
    <?php require_once('../../includes/header.php') ?>

    <?php //echo $data["content"];
    ?>


    <!--main-->
    <div class="page page-news">
        <?php require_once('includes/subnav.php') ?>
        <div class="container">
            <?php require_once('includes/articlelist.php') ?>
        </div>
        <!--pagination-->
        <div class="wow fadeInUp">
            <?php include("../../vendor/jasongrimes/paginator/examples/pager.phtml") ?>
        </div>
        <!--pagination end-->
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