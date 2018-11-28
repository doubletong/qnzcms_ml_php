<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/article.php");
require_once('includes/PDO_Pagination.php');
require_once("data/product.php");

$productClass = new Product();
$products = $productClass->hot_products();

$articleClass = new Article();
$articles = $articleClass->hotKnowledge();


$pagination = new PDO_Pagination(db::getInstance());

$pagination->rowCount("SELECT * FROM wp_articles WHERE categoryId = 2");
$pagination->config(6,15);
$sql = "SELECT * FROM wp_articles WHERE categoryId = 2 ORDER BY id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
$query =db::getInstance()->prepare($sql);
$query->execute();
$model = array();
while($rows = $query->fetch())
{
    $model[] = $rows;
}



do_html_doctype("waterpik洁碧口腔护理知识_口腔护理知识-".SITENAME)
?>
    <meta name=keywords content="waterpik洁碧口腔护理知识中心,waterpik洁碧口腔护理知识">
    <meta name=description content="waterpik洁碧官网口腔护理知识频道，为您提供最及时，最全面的洁碧口腔护理知识信息。想了解更多口腔护理知识内容，就上洁碧官方网站！">
<?php
do_html_header();
?>
    <div class="container">
        <div class="breadcrumb">
            <a href="/">首页</a> &gt; <h1>口腔护理知识</h1>
        </div>
    </div>
    <div class="container news-page">
        <div class="row">
            <div class="col-sm-8 col-md-9">
                <?php   foreach($model as $article){ ?>

                        <div class="row box-kenowledge">
                            <figure class="col-sm-3">
                                <a href="<?php echo SITEPATH; ?>/knowledge/<?php echo $article['id'];?>.html">
                                    <img src="<?php echo $article['thumbnail'];?>" class="img-responsive" alt="<?php echo $article['title'];?>" />
                                </a>
                            </figure>
                            <div class="col-sm-9 txt">
                                <h3><a href="<?php echo SITEPATH; ?>/knowledge/<?php echo $article['id'];?>.html"><?php echo $article['title'];?></a></h3>
                                <p>
                                    <?php echo $article['description'];?>
                                </p>
                            </div>
                        </div>

                <?php } ?>

                <nav>
                    <ul class="pagination">
                        <?php
                        $pagination->pages("btn");
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="col-sm-4 col-md-3 hidden-xs">
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

                <aside class="hotproducts hotknowledge">
                    <h2>热门口腔护理知识</h2>
                    <ul>
                        <?php   foreach($articles as $article){ ?>
                            <li>
                                <a href="<?php echo SITEPATH; ?>/knowledge/<?php echo $article['id'];?>.html">
                                    <?php echo $article['title'];?>
                                </a>
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