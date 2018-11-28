<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/product.php");
require_once("data/cart.php");

$productClass = new Product();

if(!isset($_GET['id'])){
    header('Location: /products/');
}
$id = $_GET['id'];

/*if(isset($_GET['view']) && $_GET['view'] == "add_to_cart"){
        $add_item = add_to_cart($id);
        $_SESSION['total_items'] = total_items($_SESSION['cart']);
        $_SESSION['total_price'] = total_price($_SESSION['cart']);
        $url = "productDetail.php?id=".$id;
        header('Location:'.$url);
}*/

$data = $productClass->fetch_data($id);

do_html_doctype("waterpik".$data['title']."（".$data['product_no']."）_价格_怎么样-".SITENAME)
?>
    <meta name=keywords content="<?php echo $data['keywords'];?>">
    <meta name=description content="<?php echo $data['description'];?>">
    <link type="text/css" href="/js/lib/toastr/toastr.css"/>

<?php
do_html_header();

/*print_r($_SESSION['cart']);
print_r($_SESSION['total_price']);*/
?>
    <div class="container hidden-xs">
        <div class="breadcrumb">
            <a href="<?php echo SITEPATH; ?>">首页</a> &gt; <a href="<?php echo SITEPATH; ?>/products/">口腔护理产品</a>  &gt; <h1><?php echo $data['title'];?>（<?php echo $data['product_no'];?>）</h1>
        </div>
    </div>
    <div class="container product-page">
        <div class="row visible-xs">
            <div class="col-xs-12">
            <header class="title">
                <h2><?php echo $data['title'];?>（<?php echo $data['product_no'];?>）</h2>
                <h4><?php echo $data['sub_title'];?></h4>
            </header>
            </div>
        </div>
        <div class="row">
            <div class="displayPic" style="background-image: url(<?php echo $data['background'];?>)">
                <div class="col-sm-5 col-md-5 col-md-offset-1">
                    <figure>
                        <img src="<?php echo $data['thumbnail'];?>" class="showpic" alt="<?php echo $data['title'];?>" />
                    </figure>
                </div>
               <div class="col-sm-7 col-md-6">
                   <div class="displayText">
                       <img src="/assets/img/logo_product.png" alt="logo" class="hidden-xs"/>
                       <h2 class="hidden-xs"><?php echo $data['title'];?>（<?php echo $data['product_no'];?>）</h2>
                       <h4 class="hidden-xs"><?php echo $data['sub_title'];?></h4>
                       <p>建议零售价：<?php echo number_format($data['price'],2) ;?>RMB</p>
                       <a href="<?php echo SITEPATH; ?>/shoppingCart.php?id=<?php echo $data['id'];?>" target="_blank" rel="external nofollow">
                           <i class="icon-yen"></i> 马上购买
                       </a>
                       <a href="#" data-id="<?php echo $data['id'];?>" id="addToCart">
                           <i class="icon-cart-plus"></i> 加入购物车
                       </a>
                   </div>

               </div>

            </div>

            <div class="col-md-8 col-md-offset-2">
                <header class="title">
                    <h2 class="text-center"><?php echo $data['title'];?>（<?php echo $data['product_no'];?>）</h2>
                    <h4 class="text-center"><?php echo $data['sub_title'];?></h4>
                </header>

                <!--<div class="note">
                    日期：<time datetime="<?php /*echo date('Y-m-d H:i:s',$data['added_date']) ;*/?>"><?php /*echo date('Y-m-d',$data['added_date']) ;*/?></time>，阅读 <?php /*echo $data['view_count'];*/?> 次
                </div>-->
                <div class="container-fluid">
                <div class="row product-attr">
                    <div class="col-sm-2 col-xs-4">
                        <div class="title">
                            商品名称
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-8">
                        <div class="content">
                            <?php echo $data['title'];?><span class="hidden-sm">（<?php echo $data['product_no'];?>）</span>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-4">
                        <div class="title">
                            品牌
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-8">
                        <div class="content">
                            <?php echo $data['brand'];?>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-4">
                        <div class="title">
                            生产厂家
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-8">
                        <div class="content">
                            <?php echo $data['company'];?>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-4">
                        <div class="title">
                            类别
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-8">
                        <div class="content">
                            <?php echo $data['category'];?>
                        </div>
                    </div>
                    <div class="col-sm-2 col-xs-4">
                        <div class="title">
                            产品描述
                        </div>
                    </div>
                    <div class="col-sm-10 col-xs-8">
                        <div class="content">
                             <?php echo $data['summary'];?>
                        </div>
                    </div>
                </div>
                </div>
                <article class="body">
                    <?php echo $data['content'];?>
                </article>
                <div class="arrowLeft">
                    <a href="<?php echo SITEPATH; ?>/products/">
                        <img src="/assets/img/arrow-left.jpg" alt="返回" />
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
do_html_footer();
do_html_analytics();