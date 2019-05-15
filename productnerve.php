<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("declare");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "心血管介入产品-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

    <?php //echo $data["content"];?>   
    
    <div class="striving">

<!--banner-->
<div class="inside_banner product_banner" style="background-image:url(images/product_nerve_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">神经介入产品</h1>
                <p class="wow fadeInLeft">微创守护您的每一个明天</p>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main product">
        <div class="product_item">
            <div class="product_item_bg" style="background-image:url(images/product_01.png)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2>颅内动脉支架系统</h2>
                    <ul class="clear">
                        <li>
                            <a href="/productnervedetail">APOLLO®颅内动脉支架系统</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product_item">
            <div class="product_item_bg" style="background-image:url(images/product_06.png)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2>颅内覆膜支架系统</h2>
                    <ul class="clear">
                        <li>
                            <a href="/productnervedetail">WILLIS®颅内覆膜支架系统</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product_item">
            <div class="product_item_bg" style="background-image:url(images/product_07.png)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2>血管重建装置</h2>
                    <ul class="clear">
                        <li><a href="/productnervedetail">Tubridge® 血管重建装置</a></li>
                    </ul>
                </div>
            </div>
        </div>
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