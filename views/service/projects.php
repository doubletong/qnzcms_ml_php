<?php
require_once("../../includes/common.php");
require_once("../../data/product.php");



$productClass = new TZGCMS\Product();

if (isset($_GET['cid'])) {
    $id = $_GET['cid'];
    $cate = $productClass->get_category_bgId($id);
    $categories = $productClass->get_all_categories();
    $projects = $productClass->get_products_bycid($id);
} else {
    header('Location: /service');
    exit;
}





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
    <div class="page page-service">

        <div class="container">
            <div class="row wow fadeInUp sitepath">
                <div class="col-md">
                    <div class="title title-section">
                        <h3><?php echo $cate['title'] ?> <span><?php echo $cate['title_en'] ?></span></h3>
                        <p>专业的设备租赁服务平台，提供各类灯光音响租赁服务……</p>
                    </div>

                </div>
                <div class="col-md-auto align-self-end">
                    您的当前位置：<a href="/">主页</a> > <a href="/service">服务项目</a> > <span class="current"><?php echo $cate['title'] ?></span>
                </div>
            </div>

            <main class="maincontent">
                <div class="row">
                    <div class="col-md-auto">
                        <?php require_once('includes/categories.php') ?>
                    </div>
                    <div class="col-md">
                        <div class="pro-content">
                            <div class="title">
                                <h3>
                                    <?php echo $cate['title'] ?>租赁服务
                                </h3>

                            </div>
                            <div class="des">
                                <?php echo $cate['intro'] ?>
                            </div>

                        </div>
                    </div>
                </div>
            </main>
            <div class="productlist wow fadeInUp">
                <div class="title">
                    <div class="row">
                        <div class="col-md">
                            <h3>
                            设备展示
                            </h3>
                        </div>
                        <div class="col-md-auto">
                        如有其他设备需求，欢迎您来电咨询，我司将竭诚为您服务！
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($projects as $project) { ?>
                        <div class="col-md-6 col-lg-3">
                            <a href="/service/project-detail/<?php echo $project['id']; ?>" class="item">
                                <div class="pic">
                                    <img src="<?php echo $project['thumbnail']; ?>" alt="<?php echo $project['title']; ?>">
                                </div>
                                <div class="txt">
                                    <?php echo $project['title']; ?>
                                </div>
                            </a>
                        </div>


                    <?php } ?>
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