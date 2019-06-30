<?php
require_once("includes/common.php");
require_once("config/db.php");

require_once('includes/PDO_Pagination.php');
require_once("data/document.php");

$did= 24;
$docClass = new Document();
$years = $docClass->get_all_years($did);

$lastYear = $years[0]['year'];

$paran_year = isset($_GET['year'])?$_GET['year']:$lastYear;

$pagination = new PDO_Pagination(db::getInstance());

$documents = array();
$pagination->config(6, 12);
$pagination->param = "&year=$paran_year";
$pagination->rowCount("SELECT * FROM documents WHERE DATE_FORMAT(FROM_UNIXTIME(`added_date`), '%Y') = $paran_year AND dictionary_id = $did ");

$sql = "SELECT * FROM documents WHERE DATE_FORMAT(FROM_UNIXTIME(`added_date`), '%Y') = $paran_year AND dictionary_id = $did ORDER BY added_date DESC  LIMIT $pagination->start_row, $pagination->max_rows";
$query = db::getInstance()->prepare($sql);
$query->execute();
while ($rows = $query->fetch()) {
    $documents[] = $rows;
}


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "内刊-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

    <?php //echo $data["content"];?>       
    <div class="striving">
<!--banner-->
<div class="inside_banner news_media_banner" style="background-image:url(images/news_magazine_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">内刊</h1>
                <p class="wow fadeInLeft">关注我们  关注我们的内刊</p>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="wrap">
            <div class="tab_nav wow fadeInUp">
                <ul class="clear">
                    <li><a href="/newspaper">《微创时代》报纸</a></li>
                    <li  class="active"><a href="/magazine">《微创时代》杂志</a></li>
                </ul>
            </div>
            <div class="news_media news_magazine">
                <div class="news_magazine_item active">
                    <!--years-->
                    <div class="years clear wow fadeInUp">
                        <p class="current_year"><?php echo $paran_year; ?></p>
                        <ul class="years_list">
                            <?php  foreach($years as $year) {?>
                                <li><a href="/magazine?year=<?php  echo $year['year'] ?>"><p><?php  echo $year['year'] ?></p></a></li>
                            <?php }?>             
                        </ul>
                        <!--search-->
                        <!-- <div class="news_magazine_search fr">
                            <input type="text" placeholder="搜索报纸"/>
                            <button></button>
                        </div> -->
                        <!--search end-->
                    </div>
                    <!--years end-->
                    <div class="news_magazine_item_wrap">
                        <ul class="clear">
                            <?php foreach($documents as $doc){?>
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="<?php echo $doc['thumbnail'] ?>" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4><?php echo $doc['title'] ?></h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p><?php echo $doc['description'] ?></p>
                                    <div class="news_magazine_btn">
                                        <a href="<?php echo $doc['file_url'] ?>" target="_blank">下载PDF</a>
                                        <span>PDF <?php echo $doc['file_size'] ?></span>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>

                        </ul>

                        
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
                
            </div>
        </div>
    </div>
<!--main end-->
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
//  domTab('.news_magazine_item')
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>