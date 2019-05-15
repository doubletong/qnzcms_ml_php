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
<div class="inside_banner product_banner" style="background-image:url(images/product_orthopaedics_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">骨科医疗器械产品</h1>
                <p class="wow fadeInLeft">微创守护您的每一个明天</p>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main product">
        <div class="product_item">
            <div class="product_item_bg" style="background-image:url(images/product_08.png)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2>进口髋关节产品</h2>
                    <ul class="clear">
                        <li>
                            <a href="/productorthopaedicsdetail">PROFEMUR® Z Femoral Stem System</a>
                        </li>
                        <li>
                            <a href="/productorthopaedicsdetail">PROFEMUR® TL Femoral Stem System</a>
                        </li>
                        <li>
                            <a href="/productorthopaedicsdetail">LINEAGE® Acetabular Hip System</a>
                        </li>
                        <li>
                            <a href="/productorthopaedicsdetail">GLADIATOR® Bipolar Femoral Head System</a>
                        </li>
                        <li>
                            <a href="/productorthopaedicsdetail">BIOLOX® Delta Hip Ceramic Products</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product_item">
            <div class="product_item_bg" style="background-image:url(images/product_09.png)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2>进口膝关节产品</h2>
                    <ul class="clear">
                        <li>
                            <a href="/productorthopaedicsdetail">Evolution® 内轴型全膝关节置换系统</a>
                        </li>
                        <li>
                            <a href="/productorthopaedicsdetail">Advance® 内轴型全膝关节置换系统</a>
                        </li>
                        <li>
                            <a href="/productorthopaedicsdetail">Advance® 内轴型膝关节翻修系统</a>
                        </li>
                        <li>
                            <a href="/productorthopaedicsdetail">Prophecy® 3D打印截骨导板</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product_item">
            <div class="product_item_bg" style="background-image:url(images/product_10.png)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2>国产膝关节产品</h2>
                    <ul class="clear">
                        <li>
                            <a href="/productorthopaedicsdetail">Aspiration® 内稳定型全膝关节置换系统</a>
                        </li>
                        <li>
                            <a href="/productorthopaedicsdetail">SoSuperior® 内稳定型全膝关节置换系统</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product_item">
            <div class="product_item_bg" style="background-image:url(images/product_11.png)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2>国产脊柱产品</h2>
                    <ul class="clear">
                        <li><a href="/productorthopaedicsdetail">Takin™ 脊柱内固定系统</a></li>
                        <li><a href="/productorthopaedicsdetail">PISCIS™ 胸腰椎椎间融合</a></li>
                        <li><a href="/productorthopaedicsdetail">Firestone™ 颈椎椎间融合器</a></li>
                        <li><a href="/productorthopaedicsdetail">Antelope™ 颈前路钢板</a></li>
                        <li><a href="/productorthopaedicsdetail">Trailwalker™ 髓内钉</a></li>
                        <li><a href="/productorthopaedicsdetail">ARBORES™ 椎体成型术系统</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product_item">
            <div class="product_item_bg" style="background-image:url(images/product_12.png)"></div>
            <div class="wrap">
                <div class="product_item_txt wow fadeInUp">
                    <h2>国产创伤产品</h2>
                    <ul class="clear">
                        <li><a href="/productorthopaedicsdetail">Reindeer® 锁定接骨板系统</a></li>
                        <li><a href="/productorthopaedicsdetail">Cayman™ 金属线缆系统</a></li>
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