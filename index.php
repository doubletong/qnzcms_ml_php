<?php
require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/carousel.php");
require_once("data/product.php");
require_once("data/article.php");

$carouselClass = new Carousel();
$carousels = $carouselClass->fetch_all();

$productClass = new Product();
$products = $productClass->recommendProducts();

$articleClass = new Article();
$knowledges = $articleClass->lasterKnowledge();

do_html_doctype("waterpik洁碧官方网站_全球冲牙器领导品牌美国洁碧_洁碧牙具-".SITENAME)
?>
    <meta name=keywords content="waterpik洁碧官方网站,洁碧冲牙器,美国洁碧,洁碧牙具">
    <meta name=description content="waterpik洁碧官网，为您提供洁碧冲牙器、洁碧水牙线、洁碧电动牙刷等口腔护理产品，购买正品牙具，就上洁碧官方网站，全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！">
<?php
do_html_header();
?>
<div class="container">
    <div class="row">
        <!-- slider start -->
        <section id="slider">
            <ul class="slider-list">
             <?php   foreach($carousels as $carousel){ ?>
                <li data-pc-img="<?php echo $carousel['image_url'];?>" data-title="<?php echo $carousel['title'];?>"><a href="<?php echo $carousel['link'];?>" title="<?php echo $carousel['title'];?>" target="_blank"></a></li>
             <?php } ?>
            </ul>
        </section>
        <!-- slider end -->
    </div>
</div>

    <section class="container lasterProducts" id="lasterProducts">
        <div class="row">
<?php   foreach($products as $product){ ?>
            <div class="col-md-6">
                <div class="box_left">
                    <a class="box" href="products/<?php echo $product['id'];?>.html" title="<?php echo $product['title'];?>" style="background-image:url(<?php echo $product['background'];?>)">
                        <div class="thumb opacity0" data-in="fadeInLeft" data-out="fadeOutLeft">
                            <img src="<?php echo $product['thumbnail'];?>" alt="<?php echo $product['title'];?>" />
                        </div>
                        <div class="txt opacity0" data-in="fadeInRight" data-out="fadeOutRight">
                            <h3><?php echo $product['title'];?></h3>
                            <h1><?php echo $product['slogan'];?></h1>
                        </div>
                    </a>
                    <div class="prodes">
                        <h2><a href="products/<?php echo $product['id'];?>.html"><?php echo $product['title'];?>（<?php echo $product['product_no'];?>）</a></h2>
                        <h4><?php echo $product['sub_title'];?></h4>
                        <p><?php echo $product['summary'];?></p>
                    </div>
                </div>
            </div>
<?php } ?>

        </div>
    </section>
<section class="container lasterNews">
   <header class="title">
       <h3>口腔护理知识 <span>Oral Care Knowledge</span></h3>
   </header>
    <ul class="row">
<?php   foreach($knowledges as $klg){ ?>
        <li class="col-sm-6">
            <time class="pull-right"><?php echo date('Y-m-d',$klg['added_date']) ;?></time>
            <a href="knowledge/<?php echo $klg['id'];?>.html"><?php echo $klg['title'];?></a>
        </li>
<?php } ?>
    </ul>
</section>
<?php
do_html_footer();
do_html_analytics();