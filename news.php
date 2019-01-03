<?php

require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();
$articles = $articleClass->fetch_category(1);

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "新闻资讯-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="page-news">
<?php require_once('includes/header_news.php') ?>

        <div class="container s1">
            <section class="newlist">


            <?php   foreach($articles as $article){ ?>

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

                
               
            </section>
            <footer class="text-center">
                <a href="javascript:void(0);" class="more">查看更多</a>
            </footer>
        </div>

    </div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(5) a").addClass("active");
           $(".mainav li:nth-of-type(5) a").addClass("active");
           $(".subnav li:nth-of-type(1) a").addClass("active");
        });
    </script>
</body>
</html>