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
<div class="inside_banner news_banner" style="background-image:url(images/news_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">新闻动态</h1>
                <p class="wow fadeInLeft">时刻与您分享我们的一点一滴</p>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="news_title">
            <div class="wrap">
                <!--years-->
                <div class="years clear wow fadeInUp">
                    <p class="current_year">2019</p>
                    <ul class="years_list">
                        <li><a href="/news"><p>2019</p></a></li>
                        <li><a href="/news"><p>2018</p></a></li>
                        <li><a href="/news"><p>2017</p></a></li>
                        <li><a href="/news"><p>2016</p></a></li>
                        <li><a href="/news"><p>2015</p></a></li>
                    </ul>
                </div>
                <!--years end-->
            </div>
        </div>
        <div class="news_list">
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/news/detail-1" class="clear">
                        <div class="img fl">
                            <img src="images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4>微创<sup>®</sup>与亚洲医疗集团举行产业合作签约仪式</h4>
                            <span>2018-12-29</span>
                            <p>中国，武汉——2018年12月20日，上海微创医疗器械（集团）有限公司（以下简称“微创<sup>®</sup>”）与香港亚洲医疗集团（以下简称“亚洲医疗集团”）产业合作签约仪式在武汉亚洲大酒店举行。总经理叶红等亚洲医疗...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/news/detail-1" class="clear">
                        <div class="img fl">
                            <img src="images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4>微创<sup>®</sup>与亚洲医疗集团举行产业合作签约仪式</h4>
                            <span>2018-12-29</span>
                            <p>中国，武汉——2018年12月20日，上海微创医疗器械（集团）有限公司（以下简称“微创<sup>®</sup>”）与香港亚洲医疗集团（以下简称“亚洲医疗集团”）产业合作签约仪式在武汉亚洲大酒店举行。总经理叶红等亚洲医疗...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/news/detail-1" class="clear">
                        <div class="img fl">
                            <img src="images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4>微创<sup>®</sup>与亚洲医疗集团举行产业合作签约仪式</h4>
                            <span>2018-12-29</span>
                            <p>中国，武汉——2018年12月20日，上海微创医疗器械（集团）有限公司（以下简称“微创<sup>®</sup>”）与香港亚洲医疗集团（以下简称“亚洲医疗集团”）产业合作签约仪式在武汉亚洲大酒店举行。总经理叶红等亚洲医疗...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/news/detail-1" class="clear">
                        <div class="img fl">
                            <img src="images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4>微创<sup>®</sup>与亚洲医疗集团举行产业合作签约仪式</h4>
                            <span>2018-12-29</span>
                            <p>中国，武汉——2018年12月20日，上海微创医疗器械（集团）有限公司（以下简称“微创<sup>®</sup>”）与香港亚洲医疗集团（以下简称“亚洲医疗集团”）产业合作签约仪式在武汉亚洲大酒店举行。总经理叶红等亚洲医疗...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/news/detail-1" class="clear">
                        <div class="img fl">
                            <img src="images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4>微创<sup>®</sup>与亚洲医疗集团举行产业合作签约仪式</h4>
                            <span>2018-12-29</span>
                            <p>中国，武汉——2018年12月20日，上海微创医疗器械（集团）有限公司（以下简称“微创<sup>®</sup>”）与香港亚洲医疗集团（以下简称“亚洲医疗集团”）产业合作签约仪式在武汉亚洲大酒店举行。总经理叶红等亚洲医疗...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/news/detail-1" class="clear">
                        <div class="img fl">
                            <img src="images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4>微创<sup>®</sup>与亚洲医疗集团举行产业合作签约仪式</h4>
                            <span>2018-12-29</span>
                            <p>中国，武汉——2018年12月20日，上海微创医疗器械（集团）有限公司（以下简称“微创<sup>®</sup>”）与香港亚洲医疗集团（以下简称“亚洲医疗集团”）产业合作签约仪式在武汉亚洲大酒店举行。总经理叶红等亚洲医疗...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/news/detail-1" class="clear">
                        <div class="img fl">
                            <img src="images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4>微创<sup>®</sup>与亚洲医疗集团举行产业合作签约仪式</h4>
                            <span>2018-12-29</span>
                            <p>中国，武汉——2018年12月20日，上海微创医疗器械（集团）有限公司（以下简称“微创<sup>®</sup>”）与香港亚洲医疗集团（以下简称“亚洲医疗集团”）产业合作签约仪式在武汉亚洲大酒店举行。总经理叶红等亚洲医疗...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/news/detail-1" class="clear">
                        <div class="img fl">
                            <img src="images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4>微创<sup>®</sup>与亚洲医疗集团举行产业合作签约仪式</h4>
                            <span>2018-12-29</span>
                            <p>中国，武汉——2018年12月20日，上海微创医疗器械（集团）有限公司（以下简称“微创<sup>®</sup>”）与香港亚洲医疗集团（以下简称“亚洲医疗集团”）产业合作签约仪式在武汉亚洲大酒店举行。总经理叶红等亚洲医疗...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/news/detail-1" class="clear">
                        <div class="img fl">
                            <img src="images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4>微创<sup>®</sup>与亚洲医疗集团举行产业合作签约仪式</h4>
                            <span>2018-12-29</span>
                            <p>中国，武汉——2018年12月20日，上海微创医疗器械（集团）有限公司（以下简称“微创<sup>®</sup>”）与香港亚洲医疗集团（以下简称“亚洲医疗集团”）产业合作签约仪式在武汉亚洲大酒店举行。总经理叶红等亚洲医疗...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/news/detail-1" class="clear">
                        <div class="img fl">
                            <img src="images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4>微创<sup>®</sup>与亚洲医疗集团举行产业合作签约仪式</h4>
                            <span>2018-12-29</span>
                            <p>中国，武汉——2018年12月20日，上海微创医疗器械（集团）有限公司（以下简称“微创<sup>®</sup>”）与香港亚洲医疗集团（以下简称“亚洲医疗集团”）产业合作签约仪式在武汉亚洲大酒店举行。总经理叶红等亚洲医疗...</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!--pagination-->
        <div class="pagination wow fadeInUp">
            <ul class="pager">
                <li><a class="prev" href="#">上一页</a></li>
                <li class="active"><a class="page-link" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#" class="more">…</a></li>
                <li><a class="next" href="#">上一页</a></li>
            </ul>
            <span>共5页，到第</span> <input type="number" id="pagenum" class="pagenum"> <span>页</span> <a href="javascript:void(0);" class="go">确定</a>
        </div>
        <!--pagination end-->
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