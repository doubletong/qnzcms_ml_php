<?php
require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/product.php");

$productClass = new Product();
$products = $productClass->fetch_all();

do_html_doctype("waterpik洁碧冲牙器_洁碧水牙线_洁碧洗牙器_洁碧电动牙刷-".SITENAME)
?>
    <meta name=keywords content="waterpik洁碧冲牙器,洁碧水牙线,洁碧洗牙器,洁碧电动牙刷">
    <meta name=description content="waterpik洁碧官网口腔护理产品频道，为您提供洁碧冲牙器、洁碧【超效型、标准型、便携式、精致型】水牙线、洁碧纳米超声波自动电动牙刷等产品，购买正品牙具，就上洁碧官方网站！">
<?php
do_html_header();
?>
    <div class="container hidden-xs">
        <div class="breadcrumb">
            <a href="/">首页</a> &gt; <h1>口腔护理产品</h1>
        </div>
    </div>

    <div class="container product-page">
        <div class="row">

<?php   foreach($products as $product){ ?>
            <div class="col-sm-6 col-md-4">
                <div class="productbox">
                    <figure>
                        <a href="<?php echo SITEPATH; ?>/products/<?php echo $product['id'];?>.html">
                            <img src="<?php echo $product['thumbnail'];?>" alt="<?php echo $product['title'];?>" />
                        </a>
                    </figure>
                    <div class="txt">
                        <h2><a href="<?php echo SITEPATH; ?>/products/<?php echo $product['id'];?>.html"><?php echo $product['title'];?>（<?php echo $product['product_no'];?>）</a></h2>
                        <h3><?php echo $product['sub_title'];?></h3>
                        <p>
                            <?php echo $product['summary'];?>
                        </p>
                        <div class="arrow">
                            <a href="<?php echo SITEPATH; ?>/products/<?php echo $product['id'];?>.html">
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