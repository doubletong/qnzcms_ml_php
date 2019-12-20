<?php
require_once("../../includes/common.php");
require_once("../../data/case.php");

require '../../vendor/autoload.php';

use JasonGrimes\Paginator;


$caseClass = new TZGCMS\CaseShow();
$categories = $caseClass->get_all_categories();

$urlPattern = "/cases?page=(:num)";

$cid = isset($_GET['cid']) ? $_GET['cid'] : null;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

if (!empty($cid)) {
    $urlPattern = $urlPattern . "&cid=$cid";
}
if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

$totalItems = $caseClass->get_cases_count($cid, $keyword);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$cases = $caseClass->get_paged_cases($cid, $keyword, $currentPage, $itemsPerPage);



?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "应用案例-应用领域-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>


    <!--main-->
    <div class="page page-application container">
        <div class="title title-list">
            <h3>应用案例</h3>
        </div>

        <div class="case-categories wow fadeInUp">
        <div class="row no-gutters ">
            <div class="col-md">
                <a href="/application/cases" class="<?php echo empty($cid) ? "active" : ""; ?>">全部案例</a>
            </div>
            <?php foreach ($categories as $category) { ?>
                <div class="col-6 col-md">
                    <a href="/application/cases/<?php echo $category['id']; ?>" class="<?php echo $cid == $category['id'] ? "active" : ""; ?>">
                        <?php echo $category['title']; ?>
                    </a>
                </div>
            <?php } ?>
        </div>
        </div>

        <div class="categories">
            <?php foreach ($cases as $case) { ?>
                <div class="item">
                <div class="row no-gutters align-items-center">
                    <div class="col-lg">
                        <div class="thumb">
                            <img src="<?php echo $case['thumbnail']; ?>" alt="<?php echo $case['title']; ?>">
                        </div>
                    </div>
                    <div class="col-lg">
                        <div class="txt">
                            <h3 class="title title-art"><?php echo $case['title']; ?></h3>
                            <p class="summary"><?php echo $case['summary']; ?></p>
                            <a href="/application/case_detail/<?php echo $case['id']; ?>" class="more-art">了解更多</a>
                        </div>
                    </div>
                </div>
                </div>
            <?php   
        
        } ?>
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