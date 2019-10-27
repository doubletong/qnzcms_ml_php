<?php
require_once("../../includes/common.php");
require_once("../../data/product.php");

$productClass = new TZGCMS\Product();
$categories = $productClass->get_all_categories();
$products = $productClass->get_all_products();

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "产品中心-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>


    <!--main-->
    <div class="page page-product container">

        <div class="product-list">
            
                <?php foreach($categories as $category){?>
                    <div class="item  wow fadeInUp" style="background-image:url('<?php echo $category['thumbnail']; ?>')">                       
                        <a href="javascript:void(0);">                           
                            <?php echo $category['title']; ?> <i class="iconfont icon-down"></i>
                        </a> 
                    </div>
                    <div class="prolist  wow fadeInUp">
                        <div class="box">
                        <div class="row">
                        <?php foreach($products as $product){  
                            if($product['category_id'] == $category['id']){                           
                            ?>
                            <div class="col-md-4">
                                <a href="/products/detail/<?php echo $product['id']; ?>" class="product">
                                    <img src="<?php echo $product['thumbnail']; ?>" alt="<?php echo $product['title']; ?>">
                                    <div class="title">
                                        <p><?php echo $product['title']; ?> &gt;</p>
                                       
                                    </div>
                                </a>
                            </div>
                            <?php  }

                        } ?>   
                        </div>
                        </div>
                    </div> 
                <?php } ?>   
        </div>

    </div>
    <!--main end-->

    <?php require_once('../../includes/footer.php') ?>

    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".item").click(function(e){
                e.preventDefault();
                $(this).next(".prolist").find(".box").slideToggle();
                $(this).toggleClass("open");
            })
        });
    </script>
</body>

</html>