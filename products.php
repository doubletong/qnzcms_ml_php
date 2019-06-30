<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/product.php");

$productClass = new Product();

if(isset($_GET['cid'])){
    $cid = $_GET['cid'];  
    $data = $productClass->get_category_bgId($cid);
    $subCates = $productClass->get_sub_categories($cid);
    $products = $productClass->get_products_byBigCateId($cid);
}else{
    header('Location: /creative');
    exit;
}

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo $data['title']."-产品-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

    <?php //echo $data["content"];?>   
    
    <div class="striving">
<!--banner-->
<div class="inside_banner product_banner" style="background-image:url(<?php echo $data['thumbnail']; ?>)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft"><?php echo $data['title'] ?></h1>
                <p class="wow fadeInLeft">微创守护您的每一个明天</p>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main product">
        <?php foreach($subCates as $cate){ ?>
        <div class="product_item">
            <div class="product_item_bg" style="background-image:url(<?php echo $cate['thumbnail']; ?>)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2><?php echo $cate['title']; ?></h2>
                    <ul class="clear">
                        <?php foreach($products as $product){
                            if($cate['id'] == $product['category_id']){
                            ?>
                        <li>
                            <a href="/product-detail-<?php echo $product['id']; ?>"><?php echo $product['title']; ?></a>
                        </li>
                        <?php }
                    } ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- <div class="product_item">
            <div class="product_item_bg" style="background-image:url(images/product_02.png)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2>冠脉雷帕霉素药物支架系统</h2>
                    <ul class="clear">
                        <li>
                            <a href="/product/detail-1">Firebird2<sup>®</sup>冠脉雷帕霉素洗脱钴基合金支架系统</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product_item">
            <div class="product_item_bg" style="background-image:url(images/product_03.png)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2>PTCA球囊扩张导管</h2>
                    <ul class="clear">
                        <li><a href="/product/detail-1">Evolution<sup>®</sup> 内轴型全膝关节置换系统</a></li>
                        <li><a href="/product/detail-1">Advance<sup>®</sup> 内轴型全膝关节置换系统</a></li>
                        <li><a href="/product/detail-1">Advance<sup>®</sup> 内轴型膝关节翻修系统</a></li>
                        <li><a href="/product/detail-1">Prophecy<sup>®</sup> 3D打印截骨导板</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
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