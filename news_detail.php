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
                    <span class="date wow fadeInLeft">2018-12-29</span>
                </div>
                <h2 class="wow fadeInLeft">微创®与亚洲医疗集团举行产业合作签约仪式</h2>
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
                   <p>中国，武汉——2018年12月20日，上海微创医疗器械（集团）有限公司（以下简称“微创®”）与香港亚洲医疗集团（以下简称“亚洲医疗集团”）产业合作签约仪式在武汉亚洲大酒店举行。微创®董事长兼首席执行官常兆华博士、微创®大中华执行委员会主席彭博、生产与工程高级副总裁兼上海微创®龙脉医疗器材有限公司（以下简称“微创®龙脉”）董事长阙亦云等微创®高管与亚洲医疗集团创始人兼董事长谢俊明、武汉亚洲心脏病医院董事总经理叶红等亚洲医疗集团高管进行了会面交流，并共同出席协议签署仪式。常兆华博士与谢俊明董事长代表双方签署了产业合作协议。</p>

                   <p>签署产业合作协议后，微创®旗下的微创®龙脉将与亚洲医疗集团旗下的武汉港亚科技公司合作，将港亚公司下属武汉港基医学技术有限公司及扬州莱斯特科技有限公司并入微创®龙脉体系内，以期充分发挥各自的优势互补作用，在PCI介入配件等医疗器械产品的研发、制造、营销和临床应用等多个方面实现强强联合与优势互补。</p>

                   <p>亚洲医疗集团董事长谢俊明表示：“在过去的19年里，亚心始终专注于心血管手术和心血管疾病医疗服务，重视临床教学、科学研究及人才的培养，与法国波尔多大学及其附属医院和日本坂冢医院保持密切合作，不断提升心血管疾病诊疗水平；自建医院以来坚持举办亚心学术年会，努力创造一个创新、引进、交流的平台，保持与时俱进，提升亚心系医院学术地位。亚心的优势是临床应用，而微创®的优势是研发及产业化能力，很荣幸能与微创®合作，取双方长处以达成双赢。”</p>

                   <p>亚洲医疗集团是行业领先的民营医疗服务供应商及心血管疾病专科医院运营商，旗下医院均以“亚心”品牌运营，目前已有武汉亚心总医院、武汉亚洲心脏病医院、武汉亚洲心脏病医院新疆医院、武汉亚洲心脏病医院阜阳民生医院、邓州亚心医院等“亚心系”医院。同时，通过托管共建的模式，亚洲医疗集团还与汕头大学第一附属医院心外科共建心脏中心，将集团优秀的医疗管理理念和高端的医疗服务人才进行输出。其中，武汉亚洲心脏病医院是国内首家大型民营的非营利性心脏病专科医院，年手术量连续14年位居全国前三位。</p>

                   <p>通过本次战略合作，微创®将与“亚心系”医院的临床专家展开深度合作，充分发挥双方在产品研发和临床方面的优势和资源，探讨医疗器械行业发展现状和趋势，发现临床未被满足的需求，寻找科学技术和临床医学的创新点，进一步开展新技术和新产品研发合作，以强强联合之势共同推动医疗器械产业发展。</p>

                   <p>微创®董事长兼首席执行官常兆华博士表示：“亚心医疗集团近二十年来在解决看病难、看病贵方面做出了极有意义的尝试和贡献。亚心具有多年的医疗服务经验和深刻的行业认知，在医院建设方面坚持立足未来的超前设计理念，非常值得借鉴。通过本次合作，将实现亚心的临床科研和微创®的高端医疗器械产品研发能力的对接，释放临床科研的活力，并实现价值最大化，达到双赢局面，从而为中国临床医生救治患者提供更多安全、有效的最佳普惠医疗解决方案。”</p>
               </div>
               <!--#####-->
               <div class="news_detail_link wow fadeInUp">
                   <a href="news_detail.html">上一篇：微创®与东方医院共同发起成立中国介入呼吸病学创新产业联盟</a>
                   <a href="news_detail.html">下一篇：微创®骨科国产髋关节假体组件股骨柄注册获批</a>
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