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
<div class="inside_banner news_detail_banner" style="background-image:url(/images/news_detail_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <div class="clear">
                    <span class="source wow fadeInLeft">经济日报</span>
                    <span class="date wow fadeInLeft">2018-12-29</span>
                </div>
                <h2 class="wow fadeInLeft">103岁患者完成髋关节置换术 SuperPath<sup>®</sup>引领技术飞跃</h2>
                <a class="source_link wow fadeInLeft" href="" target="_blank">原文链接 ></a>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="wrap">
            <!--news_detail-->
           <div class="news_detail">
               <div class="news_detail_main wow fadeInUp">
                   <p>日前，一位103岁患者在江苏省镇江市第一人民医院骨科SuperPath<sup>®</sup>微创关节中心，成功接受了微创髋关节置换术，当天即可自行站立，恢复良好。这刷新了国内使用SuperPath<sup>®</sup>微创伤技术治愈患者的最高年龄纪录。</p>

                   <p>镇江市第一人民医院骨科主任医师谢军介绍，患者身体一直非常好，一周前不小心跌倒，导致右侧股骨颈骨折，疼痛难忍。多家医院都因其年龄太大，不敢实施手术。“为此，我们排除顾虑选择了SuperPath<sup>®</sup>技术。”谢军说，为百岁老人做手术就像闯关一样，即便顺利闯过手术关，通常术后也是道坎，要进入ICU加护。</p>

                   <p>值得一提的是，患者手术过程堪称完美，术后被直接送回骨科病房。当天下午，他就可以自行站立，并能用助行器在病房内行走。患者家人惊叹，“这简直就是奇迹”。</p>

                   <p>作为全球首创的快速康复髋关节置换微创伤手术技术，SuperPath<sup>®</sup>技术是近年来人工髋关节置换技术的一大飞跃，目前已在西方国家广泛推广。2014年，该技术由上海微创医疗器械（集团）有限公司引入我国。</p>

                   <p>据悉，该技术利用6厘米至8厘米的小切口进行人工髋关节置换，避免了传统手术切除髋关节周围4个至5个肌腱的创伤，可以最大程度保留完整的软组织，显著减少了术中出血和组织损伤。患者最快术后4小时即可实现下地活动，并且没有活动度限制，极大提高了术后早期疗效和满意率。</p>

                   <p>“快速康复”理念作为当前人工关节置换领域发展的主要趋势，不但能够改善患者术后康复水平，从卫生经济学角度看，还可以降低医院在床位、用药等方面的管理成本，高效利用医疗资源，为更多患者服务。因此，SuperPath<sup>®</sup>技术得到医院、临床专家及医疗企业的高度关注和认可，发展前景引人期待。</p>
               </div>
               <!--#####-->
               <div class="news_detail_link wow fadeInUp">
                   <a href="news_media_detail.html">上一篇：SuperPath<sup>®</sup>技术助103岁高龄患者完成髋关节置换术</a>
                   <a href="news_media_detail.html">下一篇：新技术圆百岁骨折老人行走梦</a>
               </div>
           </div>
            <!--news_detail end-->
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