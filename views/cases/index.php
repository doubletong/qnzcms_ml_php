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
    <div class="page page-cases">

        <div class="container">
            <div class="row wow fadeInUp">
                <div class="col-md">
                    <div class="title title-section">
                        <h3>成功案例   <span>Success Case</span></h3>
                        <p>专业的设备租赁服务平台，提供各类灯光音响租赁服务……</p>
                    </div>
                    <div class="categories">
                        <a href="/cases" class="<?php echo empty($cid)?"active":""; ?>">全部案例</a>
                        <?php foreach($categories as $category){?>
                            <a href="/cases?cid=<?php echo $category['id']; ?>" class="<?php echo $cid==$category['id']?"active":""; ?>">                           
                                <?php echo $category['title']; ?>
                            </a> 
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-auto align-self-end">
                    您的当前位置：<a href="/">主页</a> > <span class="current">成功案例</span>
                </div>
            </div>

       
            <div class="caselist">
                <div class="row">
                
            
                <?php foreach($cases as $case){?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                    <a href="/cases/detail/<?php echo $case['id']; ?>" class="item wow fadeInUp">
                            <div class="pic"><img src="<?php echo $case['thumbnail']; ?>" alt="<?php echo $case['title']; ?>"></div>
                            <div class="des">
                                <h3 class="title"><?php echo $case['title']; ?></h3>
                                <div class="row">
                                    <div class="col">
                                        <?php echo $case['category_title']; ?>
                                    </div>
                                    <div class="col-auto">
                                        <span class="more">more</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                <?php } ?>
            </div>
            </div>
        
            <!--pagination-->
            <div class="wow fadeInUp">
                <?php include("../../vendor/jasongrimes/paginator/examples/pager.phtml") ?>
            </div>
            <!--pagination end-->
        
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