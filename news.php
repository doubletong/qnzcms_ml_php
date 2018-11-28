<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();
$articles = $articleClass->fetch_category(1);

do_html_doctype("waterpik洁碧新闻中心_新闻资讯-".SITENAME)
?>
    <meta name=keywords content="waterpik洁碧新闻中心,waterpik洁碧新闻资讯">
    <meta name=description content="waterpik洁碧官网新闻中心频道，为您提供最及时，最全面的洁碧新闻资讯信息。想了解更多洁碧新闻内容，就上洁碧官方网站！">
<?php
do_html_header();
?>

<div class="container">
    <div class="breadcrumb">
        <a href="/">首页</a> &gt; <h1>新闻中心</h1>
    </div>
</div>
    <div class="container news-page">

        <div class="row">
<?php   foreach($articles as $article){ ?>
            <div class="col-sm-6 col-md-4">
                <div class="newsbox">
                    <figure>
                        <a href="<?php echo SITEPATH; ?>/news/<?php echo $article['id'];?>.html">
                            <img src="<?php echo $article['thumbnail'];?>" alt="<?php echo $article['title'];?>" />
                        </a>
                    </figure>
                    <div class="txt">
                        <h3><a href="<?php echo SITEPATH; ?>/news/<?php echo $article['id'];?>.html"><?php echo $article['title'];?></a></h3>
                        <p>
                            <?php echo $article['description'];?>
                        </p>
                        <div class="arrow">
                            <a href="<?php echo SITEPATH; ?>/news/<?php echo $article['id'];?>.html">
                                <img src="/assets/img/arrow-right.jpg" alt="查看详情" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>



        </div>
    </div>
<?php
do_html_footer();
do_html_analytics();