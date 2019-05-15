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
<div class="inside_banner product_banner" style="background-image:url(images/product_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">心血管介入产品</h1>
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
                    <h2>冠脉雷帕霉素靶向洗脱支架系统</h2>
                    <ul class="clear">
                        <li>
                            <a href="/product/detail-1">Firehawk®冠脉雷帕霉素靶向洗脱支架系统</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product_item">
            <div class="product_item_bg" style="background-image:url(images/product_02.png)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2>冠脉雷帕霉素药物支架系统</h2>
                    <ul class="clear">
                        <li>
                            <a href="/product/detail-1">Firebird2®冠脉雷帕霉素洗脱钴基合金支架系统</a>
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
                        <li><a href="/product/detail-1">Evolution® 内轴型全膝关节置换系统</a></li>
                        <li><a href="/product/detail-1">Advance® 内轴型全膝关节置换系统</a></li>
                        <li><a href="/product/detail-1">Advance® 内轴型膝关节翻修系统</a></li>
                        <li><a href="/product/detail-1">Prophecy® 3D打印截骨导板</a></li>
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