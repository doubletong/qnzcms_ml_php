<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");
require_once('includes/PDO_Pagination.php');

$did = 4;

$articleClass = new Article();
$categories = $articleClass->get_categories($did);


$pagination = new PDO_Pagination(db::getInstance());
$model = array();
$pagination->config(6, 12);


$cid = isset($_GET['cid']) ? $_GET['cid'] : 0;
if (isset($_GET['cid'])) {

    $pagination->rowCount("SELECT * FROM wp_articles WHERE dictionary_id = $did AND categoryId = $cid");

    $sql = "SELECT id,title,thumbnail,author,image_url,source FROM wp_articles WHERE dictionary_id = $did AND categoryId = $cid ORDER BY pubdate DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query = db::getInstance()->prepare($sql);
    $query->execute();
    while ($rows = $query->fetch()) {
        $model[] = $rows;
    }
} else {
    $pagination->rowCount("SELECT * FROM wp_articles WHERE dictionary_id = $did");

    $sql = "SELECT id,title,thumbnail,author,image_url,source FROM wp_articles WHERE dictionary_id = $did ORDER BY pubdate DESC  LIMIT $pagination->start_row, $pagination->max_rows";
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
    <title><?php echo "患者故事-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-story">
        <div class="container page-title">
            <h1>患者故事</h1>
            <p>不同的故事 同一种温暖</p>
        </div>
    </div>
    <div class="page page-story">
        <div class="container">
            <div class="list list-story">
                <div class="row">
                    <?php foreach ($model as $article) { ?>

                        <div class="col-md-4">
                            <div class="item">
                                <img src="<?php echo $article['image_url']; ?>" class="bg" alt="<?php echo $article['title']; ?>">
                                <div class="txt">
                                    <div class="logo">
                                        <img src="<?php echo $article['thumbnail']; ?>" alt="<?php echo $article['title']; ?>">
                                    </div>
                                    <div class="person"><span><?php echo $article['author']; ?></span> | <span><?php echo $article['source']; ?></span></div>
                                    <h3><?php echo $article['title']; ?></h3>
                                    <a href="/story/detail-<?php echo $article['id']; ?>" class="view">查看故事</a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                    
                </div>
            </div>
            <!--pagination-->
            <div class="pagination wow fadeInUp">
                <ul class="pager">
                    <?php
                    $pagination->pages("btn");
                    ?>
                </ul>
            </div>
            <!--pagination end-->

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
        </div>



    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");

        });
    </script>
</body>

</html>