<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");
require_once('includes/PDO_Pagination.php');
require_once("data/product.php");

$did = 6;
$cid = isset($_GET['cid']) ? $_GET['cid'] : 0;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $articleClass = new Article();
    $categories = $articleClass->get_children_categories($did, $id);
} else {
    header('Location: /disease');
    exit;
}


$pagination = new PDO_Pagination(db::getInstance());
$articles = array();
$pagination->config(6, 10);


$cid = isset($_GET['cid']) ? $_GET['cid'] : 0;

$productClass = new Product();

if (isset($_GET['cid'])) {
  
    $pagination->rowCount("SELECT * FROM wp_articles WHERE dictionary_id = $did AND categoryId = $cid");

    $sql = "SELECT id,title,thumbnail,summary,pubdate,content FROM wp_articles WHERE dictionary_id = $did AND categoryId = $cid ORDER BY pubdate DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query = db::getInstance()->prepare($sql);
    $query->execute();
    while ($rows = $query->fetch()) {
        $articles[] = $rows;
    }

    $category = $articleClass->get_category_byid($cid);
} else {

   
    $pagination->rowCount("SELECT * FROM wp_articles WHERE dictionary_id = $did AND categoryId in (SELECT article_categories.id FROM article_categories WHERE article_categories.parent_id = $id)");

    $sql = "SELECT id,title,thumbnail,summary,pubdate,content FROM wp_articles WHERE dictionary_id = $did AND categoryId in (SELECT article_categories.id FROM article_categories WHERE article_categories.parent_id = $id) ORDER BY pubdate DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query = db::getInstance()->prepare($sql);
    $query->execute();
    while ($rows = $query->fetch()) {
        $articles[] = $rows;
    }

    $category = $articleClass->get_category_byid($id);
    
}
//print_r($category);
if(!empty($category['product_ids'])){
    $products = $productClass->get_products_bycategory($category['product_ids']);
}

//print_r($products);

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
                <div class="s2main">
                    <div class="list-categories">
                        <h3 class="title">疾病分类</h3>
                        <ul>
                            <li><a style="background-image:url(/img/icon/001.png);" href="/disease-list-<?php echo $id; ?>" class="<?php echo $cid == 0 ? "active" : ""; ?>">全部</a></li>
                            <?php foreach ($categories as $data) { ?>
                                <li><a style="background-image:url(<?php echo $data['thumbnail']; ?>);" href="/disease-list-<?php echo $id; ?>-c-<?php echo $data['id']; ?>" class="<?php echo $cid == $data['id'] ? "active" : ""; ?>"><?php echo $data['title']; ?></a></li>
                            <?php } ?>
                        </ul>

                    </div>

                    <div class="list list-disease">

                        <?php foreach ($articles as $article) { ?>

                            <a href="/disease-detail-<?php echo $article['id']; ?>" class="item">
                               
                                    <div class="disease">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="pic" style="background-image:url('<?php echo $article['thumbnail']; ?>')"></div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="des">
                                                    <h3><?php echo $article['title']; ?></h3>
                                                    <?php 
                             if(empty($article['summary'])){                                 
                                $newstr = filter_var($article['content'], FILTER_SANITIZE_STRING);
                                ?>
                                <p><?php echo mb_substr( $newstr, 0, 140, 'utf-8') . "……"; ?></p>
                            <?php
                             }else{
                                 ?>
                                <p><?php echo mb_substr($article['summary'], 0, 140, 'utf-8') . "……"; ?></p>
                            <?php }                          
                             ?>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                              
                            </a>
                        <?php } ?>

                    </div>
                </div>

            </section>
        </div>

        <?php if(isset($products)){?>
        <div class="container">
            <section class=" s3">
                <h2 class="se-title">解决方案</h2>

                <div class="raproducts">
                    <div class="row">
                        <?php foreach($products as $product){?>
                        <div class="col-md-4">
                            <a class="item" href="/products/detail-<?php echo $product['id'];?>">
                                <div class="logo">
                                    <img src="<?php echo $product['thumbnail'];?>" alt="<?php echo $product['title'];?>">
                                </div>
                                <h3><?php echo $product['title'];?></h3>
                                <div class="more">查看产品</div>
                            </a>
                        </div>
                        <?php } ?>
                        
                    </div>
                </div>
                <div class="go">
                    <a href="/products">了解更多产品</a>
                </div>
            </section>
        </div>
        <?php } ?>

    </div>
    <div class="quickcontact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md">
                    <p>需要更多关于心脏疾病解决方案的信息吗？<br />我们将尽快与您联系。</p>
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

            $(".btnclose").click(function(e) {
                $(".quickcontact").slideToggle();
            });


            h = $(".site-footer").outerHeight(true) + $(".s3").outerHeight(true) + $(".quickcontact").outerHeight(true) + 120;

            $(window).on("scroll", function() {
                var winW = $(window).width();
                if(winW>=992){
                var toTop = $(window).scrollTop();

                var scrollButtom = $(document).height() - (toTop + $(window).height());
                var bannerHeight = $(".banner").outerHeight(true) + $(".s1").outerHeight(true) + $(".s2 .se-title").outerHeight(true);
                var headH = $('.site-header').outerHeight(true) + 30;

                if (toTop > bannerHeight) {
                    $(".list-categories").addClass("fixed_for_top").css({
                        'top': headH + 'px'
                    });
                    if (scrollButtom < h) {
                        $(".list-categories").css({
                            'bottom': (h - scrollButtom) + 'px',
                            'top': 'auto'
                        });
                    } else {
                        $(".list-categories").css({
                            'bottom': 'auto',
                            'top': headH + 'px'
                        });
                    }
                } else {
                    $(".list-categories").removeClass("fixed_for_top").css({
                        'top': 'auto','bottom':'auto'
                    });
                }
            }
            });
        });
    </script>
</body>

</html>