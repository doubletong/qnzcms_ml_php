<?php
require_once("includes/common.php");
require_once("config/db.php");

require_once('includes/PDO_Pagination.php');
require_once("data/article.php");

$did= 3;
$ArticleClass = new Article();
$years = $ArticleClass->get_all_years($did);

$lastYear = $years[0]['year'];

$paran_year = isset($_GET['year'])?$_GET['year']:$lastYear;

$pagination = new PDO_Pagination(db::getInstance());

$articles = array();
$pagination->config(6, 15);
$pagination->param = "&year=$paran_year";
$pagination->rowCount("SELECT * FROM wp_articles WHERE DATE_FORMAT(FROM_UNIXTIME(`pubdate`), '%Y') = $paran_year AND dictionary_id = $did ");

$sql = "SELECT id,title,thumbnail,summary,pubdate,content FROM wp_articles WHERE DATE_FORMAT(FROM_UNIXTIME(`pubdate`), '%Y') = $paran_year AND dictionary_id = $did ORDER BY pubdate DESC  LIMIT $pagination->start_row, $pagination->max_rows";
$query = db::getInstance()->prepare($sql);
$query->execute();
while ($rows = $query->fetch()) {
    $articles[] = $rows;
}


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "新闻动态-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

    <?php //echo $data["content"];?>   
    
    <div class="striving">
<!--banner-->
<div class="inside_banner news_banner" style="background-image:url(images/news_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">新闻动态</h1>
                <p class="wow fadeInLeft">时刻与您分享我们的一点一滴</p>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="news_title">
            <div class="wrap">
                <!--years-->
                <div class="years clear wow fadeInUp">
                    <p class="current_year"><?php  echo $paran_year ?></p>
                    <ul class="years_list">
                        <?php  foreach($years as $year) {?>
                            <li><a href="/news?year=<?php  echo $year['year'] ?>"><p><?php  echo $year['year'] ?></p></a></li>
                        <?php }?>                      
                    </ul>
                </div>
                <!--years end-->
            </div>
        </div>
        <div class="news_list">
            <?php foreach($articles as $article){?>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/news-detail-<?php echo $article['id']; ?>" class="clear">
                        <div class="img fl">
                            <img src="<?php  echo empty($article['thumbnail'])?"/images/news_01.jpg":$article['thumbnail']; ?>" alt="<?php  echo $article['title'] ?>"/>
                        </div>
                        <div class="txt">
                            <h4><?php  echo $article['title'] ?></h4>
                            <span><?php echo date('Y-m-d', $article['pubdate']); ?></span>
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
                    </a>
                </div>
            </div>
            <?php }?>
            
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