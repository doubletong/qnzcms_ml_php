<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");
$articleClass = new Article();

if(isset($_GET['page'])){
    $pageId = $_GET['page'];
    $articles = $articleClass->fetch_paged($pageId,10);
}
?>

<?php  foreach($articles as $article){ ?>
<div class="box">
    <div class="row">
        <div class="col-md-3 col-lg-3 d1">
            <div class="pubdate">
                <div class="date"><?php echo date('m.d',$article['pubdate']) ;?></div>
                <div class="year"><?php echo date('Y',$article['pubdate']) ;?></div>
            </div>
        </div>
        <div class="col-md-8 col-lg-6 d2">
            <div class="des">
                <h3 class="title">
                    <a href="<?php echo SITEPATH; ?>/news/detail-<?php echo $article['id'];?>">
                    <?php echo $article['title'];?>
                    </a>
                </h3>
                <div class="note">发布日期：<?php echo date('Y-m-d',$article['pubdate']) ;?></div>
                <p><?php echo mb_substr($article['summary'],0,56,'utf-8')."……";?></p>
            </div>
        </div>
        <div class="col-md-4 col-lg-3  d3">
            <div class="pic">
                <img src="<?php echo $article['thumbnail'];?>" alt="">
            </div>

        </div>
    </div>
</div>

<?php } ?>