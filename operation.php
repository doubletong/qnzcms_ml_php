<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");
require_once('includes/PDO_Pagination.php');

$did = 1;

$articleClass = new Article();
$categories = $articleClass->get_categories($did);


$pagination = new PDO_Pagination(db::getInstance());
$model = array();
$pagination->config(6, 10);


$cid = isset($_GET['cid'])? $_GET['cid']:0;
if (isset($_GET['cid'])) {   

    $pagination->rowCount("SELECT * FROM wp_articles WHERE dictionary_id = $did AND categoryId = $cid");

    $sql = "SELECT id,title,thumbnail,summary,pubdate FROM wp_articles WHERE dictionary_id = $did AND categoryId = $cid ORDER BY pubdate DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query = db::getInstance()->prepare($sql);
    $query->execute();
    while ($rows = $query->fetch()) {
        $model[] = $rows;
    }
} else {
    $pagination->rowCount("SELECT * FROM wp_articles WHERE dictionary_id = $did");

    $sql = "SELECT id,title,thumbnail,summary,pubdate FROM wp_articles WHERE dictionary_id = $did ORDER BY pubdate DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query = db::getInstance()->prepare($sql);
    $query->execute();
    while ($rows = $query->fetch()) {
        $model[] = $rows;
    }
}


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "疾病与术式-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-operation">
        <div class="container page-title">
            <h1>疾病与术式</h1>
            <p>帮助您了解更多疾病知识</p>
        </div>
    </div>
    <div class="page page-disease-list page-operation">
        <div class="container">
            <section class="s2">

                <div class="list-categories">
                    <h3 class="title">疾病分类</h3>
                    <ul>
                        <li><a style="background-image:url(/img/icon/001.png);" href="/operation" class="<?php echo $cid==0?"active":""; ?>">全部</a></li>
                        <?php foreach ($categories as $data) { ?>
                            <li><a style="background-image:url(<?php echo $data['thumbnail']; ?>);" 
                            href="/operation?cid=<?php echo $data['id']; ?>" 
                            class="<?php echo $cid==$data['id']?"active":""; ?>"><?php echo $data['title']; ?></a></li>
                        <?php } ?>
                    </ul>
                </div>


                <main class="maincontent">
                    <div class="list list-disease">
                        <?php foreach ($model as $article) { ?>
                            <a href="/operation/detail-<?php echo $article['id']; ?>" class="item">
                                <div class="disease">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="pic"><img src="<?php echo $article['thumbnail']; ?>" alt="<?php echo $article['title']; ?>"></div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="des">
                                                <h3><?php echo $article['title']; ?></h3>
                                                <p><?php echo mb_substr($article['summary'], 0, 100, 'utf-8') . "……"; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        <?php } ?>

                      
                    </div>

                    <!-- <div class="pagination">
            <ul class="pager">
                <li><a class="prev" href="#">上一页</a></li>
                <li class="active"><a class="page-link" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#" class="more">…</a></li>        
                <li><a class="next" href="#">下一页</a></li>    
            </ul>
            <span>共5页，到第</span> <input type="number" id="pagenum" class="pagenum"> <span>页</span> <a href="javascript:void();" class="go">确定</a>
        </div> -->

                    <!--pagination-->
                    <div class="pagination wow fadeInUp">
                        <ul class="pager">
                            <?php
                            $pagination->pages("btn");
                            ?>
                        </ul>

                    </div>
                    <!--pagination end-->
                </main>

            </section>
        </div>

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





            $(window).on("scroll", function() {
                h = $(".site-footer").outerHeight(true);
                var toTop = $(window).scrollTop();

                 var documentH = $(document).height();
                 //  var winH=$(window).height();
                 var selfH=$(".list-categories").outerHeight(true);

                var scrollButtom = documentH-(toTop + selfH);
                //var scrollButtom = $(document).height() - (toTop + $(window).height());
                var bannerHeight = $(".banner").outerHeight(true);
                var headH = $('.site-header').outerHeight(true) + 30;

                if (toTop > bannerHeight) {
                    $(".list-categories").addClass("fixed_for_top").css({
                        'top': headH + 'px'
                    });
                    if (scrollButtom < (h+100)) {
                        $(".list-categories").removeClass("fixed_for_top").css({
                            'bottom': '0px',
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
                        'top': '0' + 'px','bottom': 'auto'
                    });
                }
            });
        });
    </script>
</body>

</html>