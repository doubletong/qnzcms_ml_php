<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");
require_once('includes/PDO_Pagination.php');

$did = 16;

$articleClass = new Article();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $category = $articleClass->get_category_byid($id);
}else{
    header('Location: /media');
    exit;
}


$pagination = new PDO_Pagination(db::getInstance());
$articles = array();
$pagination->config(6, 10);


$cid = isset($_GET['id'])? $_GET['id']:0;

if (isset($_GET['id'])) {   

    $pagination->rowCount("SELECT * FROM wp_articles WHERE dictionary_id = $did AND categoryId = $cid");

    $sql = "SELECT id,title,thumbnail,summary,source,pubdate FROM wp_articles WHERE dictionary_id = $did AND categoryId = $cid ORDER BY pubdate DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query = db::getInstance()->prepare($sql);
    $query->execute();
    while ($rows = $query->fetch()) {
        $articles[] = $rows;
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
    <title><?php echo $category['title']."-媒体报道-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

    <?php //echo $data["content"];?>   
    
    <div class="striving">
<!--banner-->
<div class="inside_banner news_detail_banner" style=" background-color:#4866b4; background-image:url(<?php echo $category['thumbnail']; ?>)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <div class="clear">
                    <span class="date wow fadeInLeft"><?php echo date('Y-m-d', $category['added_date']); ?></span>
                </div>
                <h2 class="wow fadeInLeft"><?php echo $category['title']; ?></h2>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="news_list news_media_list">
            <?php foreach ($articles as $article) { ?>
                <div class="news_item wow fadeInUp">
                    <div class="wrap">
                        <a href="/media-detail-<?php echo $article['id']; ?>" class="clear">
                            <div class="img fl">
                            <img src="<?php echo empty($article['thumbnail'])?"/images/news_01.jpg":$article['thumbnail'] ; ?>" alt="<?php echo $article['title']; ?>">
                            </div>
                            <div class="txt">
                                <h4><i><?php echo $article['source']; ?></i><?php echo $article['title']; ?></h4>
                                <span><?php echo date('Y-m-d', $article['pubdate']); ?></span>
                                <p><?php echo mb_substr($article['summary'], 0, 100, 'utf-8') . "……"; ?></p>
                            </div>
                        </a>
                    </div>
                </div>


            <?php } ?>

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
    </div>
<!--main end-->
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>