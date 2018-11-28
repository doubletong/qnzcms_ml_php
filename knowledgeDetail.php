<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/article.php");
require_once("data/product.php");

$productClass = new Product();
$products = $productClass->hot_products();

$articleClass = new Article();
$knowledges = $articleClass->lasterKnowledge();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $articleClass->fetch_data($id);
}else{
    header('Location: knowledge/');
    exit;
}

do_html_doctype($data['title']."-".SITENAME)
?>
    <meta name=keywords content="<?php echo $data['keywords'];?>">
    <meta name=description content="<?php echo $data['description'];?>">
<?php
do_html_header();
?>
    <div class="container">
        <div class="breadcrumb">
            <a href="/">首页</a> &gt; <a href="<?php echo SITEPATH; ?>/knowledge/">口腔护理知识</a> &gt; <h1><?php echo $data['title'];?></h1>
        </div>
    </div>
    <div class="container news-page">
        <div class="row">
            <div class="col-sm-8 col-md-9">


                <header class="title tc">
                    <h2><?php echo $data['title'];?></h2>
                </header>
                <div class="note tc">
                    日期:<time datetime="<?php echo date('Y-m-d H:i:s',$data['added_date']) ;?>"><?php echo date('Y-m-d',$data['added_date']) ;?></time>，阅读 <?php echo $data['view_count'];?> 次
                </div>

                <article class="body">
                    <figure>
                        <img src="<?php echo $data['image_url'];?>" class="img-responsive" alt="<?php echo $data['title'];?>" />
                    </figure>
                    <?php echo $data['content'];?>
                </article>
                <div class="arrowLeft">
                    <a href="/knowledge/">
                        <img src="/assets/img/arrow-left.jpg" alt="返回" />
                    </a>
                </div>


                <section class="container-fluid lasterNews">
                    <header class="title">
                        <h3>相关口腔护理知识</h3>
                    </header>
                    <ul class="row">
                        <?php   foreach($knowledges as $klg){ ?>
                            <li class="col-sm-6">
                                <a href="knowledgeDetail-<?php echo $klg['id'];?>.html"><?php echo $klg['title'];?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </section>
            </div>
            <div class="col-sm-4 col-md-3">
                <aside class="hotproducts">
                    <h2>口腔护理产品</h2>
                    <ul>
                        <?php   foreach($products as $product){ ?>
                            <li>
                                <figure>
                                    <a href="<?php echo SITEPATH; ?>/products/<?php echo $product['id'];?>.html">
                                        <img src="<?php echo $product['thumbnail'];?>" alt="<?php echo $product['title'];?>" />
                                    </a>
                                </figure>

                                <h3><a href="<?php echo SITEPATH; ?>/products/<?php echo $product['id'];?>.html"><?php echo $product['title'];?>（<?php echo $product['product_no'];?>）</a></h3>

                            </li>

                        <?php } ?>

                    </ul>
                </aside>
            </div>
        </div>
    </div>

<?php
do_html_footer();
do_html_analytics();