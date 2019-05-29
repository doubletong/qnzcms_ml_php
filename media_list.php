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
<div class="inside_banner news_detail_banner" style="background-image:url(/images/news_media_list_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <div class="clear">
                    <span class="date wow fadeInLeft">2018-01-03</span>
                </div>
                <h2 class="wow fadeInLeft">SuperPath<sup>®</sup>技术助103岁高龄患者完成髋关节置换术 术后当天下午就能自行站立</h2>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="news_list news_media_list">
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/media/detail-1" class="clear">
                        <div class="img fl">
                            <img src="/images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4><i>中国经济网</i>SuperPath<sup>®</sup>技术助103岁高龄患者完成髋关节置换术</h4>
                            <span>2018-01-04</span>
                            <p>12月26日，镇江市第一人民医院骨科SuperPath<sup>®</sup>微创关节中心为一位103岁患者成功实施微创髋关节置换术，患者当天下午就可自行站立，术后恢复良好。这也是目前国内使用SuperPath<sup>®</sup>微创伤后入路全髋关节置换技...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/media/detail-1" class="clear">
                        <div class="img fl">
                            <img src="/images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4><i>经济日报</i>103岁患者完成髋关节置换术 SuperPath<sup>®</sup>引领技术飞跃</h4>
                            <span>2018-02-18</span>
                            <p>日前，一位103岁患者在江苏省镇江市第一人民医院骨科SuperPath<sup>®</sup>微创关节中心，成功接受了微创髋关节置换术，当天即可自行站立，恢复良好。这刷新了国内使用SuperPath<sup>®</sup>微创伤技术治愈患者的最高年龄纪录。</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/media/detail-1" class="clear">
                        <div class="img fl">
                            <img src="/images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4><i>科学网</i>新技术圆百岁骨折老人行走梦</h4>
                            <span>2018-01-04</span>
                            <p>12月26日，镇江市第一人民医院骨科SuperPath<sup>®</sup>微创关节中心为一位103岁患者成功实施微创髋关节置换术，患者当天下午就可自行站立，术后恢复良好。这也是目前国内使用SuperPath<sup>®</sup>微创伤后入路全髋关节置换技...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/media/detail-1" class="clear">
                        <div class="img fl">
                            <img src="/images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4><i>浦东时报</i>微创<sup>®</sup>医疗创新技术 助103岁高龄患者髋关节置换</h4>
                            <span>2018-01-24</span>
                            <p>12月26日，镇江市第一人民医院骨科SuperPath<sup>®</sup>微创关节中心为一位103岁患者成功实施微创髋关节置换术，患者当天下午就可自行站立，术后恢复良好。这也是目前国内使用SuperPath<sup>®</sup>微创伤后入路全髋关节置换技...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/media/detail-1" class="clear">
                        <div class="img fl">
                            <img src="/images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4><i>中国经济网</i>SuperPath<sup>®</sup>技术助103岁高龄患者完成髋关节置换术</h4>
                            <span>2018-01-04</span>
                            <p>12月26日，镇江市第一人民医院骨科SuperPath<sup>®</sup>微创关节中心为一位103岁患者成功实施微创髋关节置换术，患者当天下午就可自行站立，术后恢复良好。这也是目前国内使用SuperPath<sup>®</sup>微创伤后入路全髋关节置换技...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/media/detail-1" class="clear">
                        <div class="img fl">
                            <img src="/images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4><i>经济日报</i>103岁患者完成髋关节置换术 SuperPath<sup>®</sup>引领技术飞跃</h4>
                            <span>2018-02-18</span>
                            <p>日前，一位103岁患者在江苏省镇江市第一人民医院骨科SuperPath<sup>®</sup>微创关节中心，成功接受了微创髋关节置换术，当天即可自行站立，恢复良好。这刷新了国内使用SuperPath<sup>®</sup>微创伤技术治愈患者的最高年龄纪录。</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/media/detail-1" class="clear">
                        <div class="img fl">
                            <img src="/images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4><i>科学网</i>新技术圆百岁骨折老人行走梦</h4>
                            <span>2018-01-04</span>
                            <p>12月26日，镇江市第一人民医院骨科SuperPath<sup>®</sup>微创关节中心为一位103岁患者成功实施微创髋关节置换术，患者当天下午就可自行站立，术后恢复良好。这也是目前国内使用SuperPath<sup>®</sup>微创伤后入路全髋关节置换技...</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news_item wow fadeInUp">
                <div class="wrap">
                    <a href="/media/detail-1" class="clear">
                        <div class="img fl">
                            <img src="/images/news_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h4><i>浦东时报</i>微创<sup>®</sup>医疗创新技术 助103岁高龄患者髋关节置换</h4>
                            <span>2018-01-24</span>
                            <p>12月26日，镇江市第一人民医院骨科SuperPath<sup>®</sup>微创关节中心为一位103岁患者成功实施微创髋关节置换术，患者当天下午就可自行站立，术后恢复良好。这也是目前国内使用SuperPath<sup>®</sup>微创伤后入路全髋关节置换技...</p>
                        </div>
                    </a>
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