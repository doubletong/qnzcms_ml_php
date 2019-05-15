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
<div class="inside_banner news_media_banner" style="background-image:url(images/news_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">媒体报道</h1>
                <p class="wow fadeInLeft">关注相同 观点不同</p>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="wrap">
            <div class="news_media">
                <div class="news_media_box clear">
                    <div class="news_media_item news_media_item_big">
                        <a href="/media/list-1" class="wow fadeInUp">
                            <div class="img img_pc">
                                <img src="images/news_media_01.jpg" alt=""/>
                            </div>
                            <div class="img img_mb">
                                <img src="images/news_media_01.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <span>2018-09-04</span>
                                <p>Firehawk®（火鹰）最新临床试验结果刊登《柳叶刀》杂志</p>
                            </div>
                        </a>
                    </div>
                    <div class="news_media_item news_media_item_small">
                        <a href="/media/list-1" class="wow fadeInUp">
                            <div class="img img_pc">
                                <img src="images/news_media_02.jpg" alt=""/>
                            </div>
                            <div class="img img_mb">
                                <img src="images/news_media_02.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <span>2018-08-01</span>
                                <p>微创®Firehawk®（火鹰）支架完成非洲首例植入</p>
                            </div>
                        </a>
                        <a href="/media/list-1" class="wow fadeInUp">
                            <div class="img img_pc">
                                <img src="images/news_media_03.jpg" alt=""/>
                            </div>
                            <div class="img img_mb">
                                <img src="images/news_media_03.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <span>2018-06-20</span>
                                <p>微创®心律管理新总部启用</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="news_media_box clear">
                    <div class="news_media_item news_media_item_big">
                        <a href="/media/list-1" class="wow fadeInUp">
                            <div class="img img_pc">
                                <img src="images/news_media_04.jpg" alt=""/>
                            </div>
                            <div class="img img_mb">
                                <img src="images/news_media_04.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <span>2018-01-03</span>
                                <p>“微创®系”产品单道心电记录仪成为全国首个按医疗器械注册人制度获批上市产品</p>
                            </div>
                        </a>
                    </div>
                    <div class="news_media_item news_media_item_small">
                        <a href="/media/list-1" class="wow fadeInUp">
                            <div class="img img_pc">
                                <img src="images/news_media_05.jpg" alt=""/>
                            </div>
                            <div class="img img_mb">
                                <img src="images/news_media_05.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <span>2018-08-01</span>
                                <p>微创®Firehawk®（火鹰）支架完成非洲首例植入</p>
                            </div>
                        </a>
                        <a href="/media/list-1" class="wow fadeInUp">
                            <div class="img img_pc">
                                <img src="images/news_media_06.jpg" alt=""/>
                            </div>
                            <div class="img img_mb">
                                <img src="images/news_media_06.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <span>2018-03-01</span>
                                <p>微创®公布Firehawk®（火鹰）支架TARGET AC临床研究最新结果</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="news_media_box clear">
                    <div class="news_media_item news_media_item_big">
                        <a href="/media/list-1" class="wow fadeInUp">
                            <div class="img img_pc">
                                <img src="images/news_media_07.jpg" alt=""/>
                            </div>
                            <div class="img img_mb">
                                <img src="images/news_media_07.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <span>2018-03-26</span>
                                <p>微创®造“中国心”在多地使用，加速心脏起搏器进口替代</p>
                            </div>
                        </a>
                    </div>
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