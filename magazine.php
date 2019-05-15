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
<div class="inside_banner news_media_banner" style="background-image:url(images/news_magazine_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">内刊</h1>
                <p class="wow fadeInLeft">关注我们  关注我们的内刊</p>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="wrap">
            <div class="tab_nav wow fadeInUp">
                <ul class="clear">
                    <li class="active">《微创时代》报纸</li>
                    <li>《微创时代》杂志</li>
                </ul>
            </div>
            <div class="news_media news_magazine">
                <div class="news_magazine_item active">
                    <!--years-->
                    <div class="years clear wow fadeInUp">
                        <p class="current_year">2019</p>
                        <ul class="years_list">
                            <li><a href="news_magazine.html"><p>2019</p></a></li>
                            <li><a href="news_magazine.html"><p>2018</p></a></li>
                            <li><a href="news_magazine.html"><p>2017</p></a></li>
                            <li><a href="news_magazine.html"><p>2016</p></a></li>
                            <li><a href="news_magazine.html"><p>2015</p></a></li>
                        </ul>
                        <!--search-->
                        <div class="news_magazine_search fr">
                            <input type="text" placeholder="搜索报纸"/>
                            <button></button>
                        </div>
                        <!--search end-->
                    </div>
                    <!--years end-->
                    <div class="news_magazine_item_wrap">
                        <ul class="clear">
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="news_magazine_item">
                    <!--years-->
                    <div class="years clear wow fadeInUp">
                        <p class="current_year">2019</p>
                        <ul class="years_list">
                            <li><a href="news_magazine.html"><p>2019</p></a></li>
                            <li><a href="news_magazine.html"><p>2018</p></a></li>
                            <li><a href="news_magazine.html"><p>2017</p></a></li>
                            <li><a href="news_magazine.html"><p>2016</p></a></li>
                            <li><a href="news_magazine.html"><p>2015</p></a></li>
                        </ul>
                        <!--search-->
                        <div class="news_magazine_search fr">
                            <input type="text" placeholder="搜索杂志"/>
                            <button></button>
                        </div>
                        <!--search end-->
                    </div>
                    <!--years end-->
                    <div class="news_magazine_item_wrap">
                        <ul class="clear">
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                            <li class="wow fadeInUp">
                                <div class="img">
                                    <img src="images/news_magazine.jpg" alt=""/>
                                </div>
                                <div class="txt">
                                    <div class="news_magazine_title">
                                        <h4>2019年第2期  总第122期</h4>
                                        <span>2019-03-28</span>
                                    </div>
                                    <p>微创荣获2018年度上海市质量金奖</p>
                                    <div class="news_magazine_btn">
                                        <a href="" target="_blank">下载PDF</a>
                                        <span>PDF 8932.03K</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
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
 domTab('.news_magazine_item')
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>