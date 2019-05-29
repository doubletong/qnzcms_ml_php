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
    <title><?php echo "中美双报-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

    <?php // echo $data["content"];?>   
    
    <div class="striving">


<!--banner-->
<div class="inside_banner product_detail_banner">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <div class="inside_banner_logo wow fadeInLeft">
                    <img src="images/product_detail_logo_02.png"/>
                </div>
                <h2 class="wow fadeInLeft">SoSuperior   内稳定型全膝关节置换系统</h2>
            </div>
        </div>
        <div class="inside_banner_img wow fadeInRight" style="background-image:url(images/product_detail_banner_02.png)"></div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main product_detail">
        <div class="wrap">
            <!--产品简介-->
            <div class="product_detail_item product_detail_desc">
                <div class="product_detail_title wow fadeInUp">
                    <h3>产品简介</h3>
                </div>
                <p class="wow fadeInUp">SoSuperiorTM建立在临床证实成功的设计经验基础上，重现膝关节正常的运动力学，维持膝关节运动中的稳定性，不需髁间截骨就能完成高屈曲活动，保留更多骨量，并有可靠的耐磨性能，带给患者更自然、更自如的活动感受，提升生活品质及满意度。</p><br/>
                <dl class="wow fadeInUp">
                    <dd>微创<sup>®</sup>关节独特创新的内稳定型球窝关节面设计：内侧稳定和外侧运动的平衡设计</dd>
                    <dd>无需髁间截骨便可达到高屈曲活动度，重现患者的自然运动力学</dd>
                    <dd>该系统是微创<sup>®</sup>关节首款获批的CS型国产全膝关节置换系统产品</dd>
                </dl>
            </div>
            <!--规格参数-->
            <div class="product_detail_item product_detail_spec">
                <div class="product_detail_title wow fadeInUp">
                    <h3>规格参数</h3>
                </div>
                <p class="wow fadeInUp">股骨髁尺寸2，3，4号另有缩窄型可供选择。</p>
                <br/>
                <div class="product_detail_table wow fadeInUp">
                    <img  src="images/product_detail_01.png" alt=""/>
                </div>
                <br/>
                <p class="wow fadeInUp">注册信息：<br/>
                    1）医疗器械名称：全膝关节假体（商品名：SoSuperior）<br/>
                    2）医疗器械生产企业名称：苏州微创关节医疗科技有限公司<br/>
                    3）医疗器械注册证号：国械注准20193130200号</p>
                <br/>
            </div>
            <!--相关文献-->
            <div class="product_detail_item product_detail_literature">
                <div class="product_detail_title wow fadeInUp">
                    <h3>相关文献</h3>
                </div>
                <ul class="clear wow fadeInUp">
                    <li>
                        <p title="SoSuperior（TM上标）内稳定型全膝关节置换系统彩页">SoSuperior（TM上标）内稳定型全膝关节置换系统彩页</p>
                    </li>
                    <li>
                        <p title="SoSuperior（TM上标）内稳定型全膝关节置换系统操作技术">SoSuperior（TM上标）内稳定型全膝关节置换系统操作技术</p>
                    </li>
                    <li>
                        <p title="SoSuperior（TM上标）内稳定型全膝关节置换系统文献汇编">SoSuperior（TM上标）内稳定型全膝关节置换系统文献汇编</p>
                    </li>
                </ul>
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