<?php
require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/video.php");

$videoClass = new Video();
$videos = $videoClass->fetch_all();

do_html_doctype("waterpik洁碧介绍_全球冲牙器领导品牌-".SITENAME)
?>
    <meta name=keywords content="waterpik洁碧介绍,全球冲牙器领导品牌">
    <meta name=description content="waterpik洁碧冲牙器发明者，自世界上第一台冲牙器发明以来，50多年一直引领全球亿万人口腔护理风潮，waterpik洁碧不断在创新研究，为的是改善人们的口腔健康！">
<?php
do_html_header();
?>

    <div class="container hidden-xs">
        <div class="breadcrumb">
            <a href="/">首页</a> &gt; <h1>关于我们</h1>
        </div>
    </div>
    <div class="container about-page">
        <div class="row">
            <div class="banner1">
                <img src="/assets/img/woman.png" class="woman animated fadeInLeft" alt="洁碧形象广告"/>
                <img src="/assets/img/products.png" class="products animated fadeInRight" alt="洁碧产品"/>
            </div>
            <div class="banner2">

            </div>

            <div class="col-md-4">
                <aside class="ya">

                </aside>
            </div>
            <div class="col-md-8">
            <div class="aboutslider" id="aboutslider">
                <ul class="slider-list">
                    <li data-pc-img="/assets/img/about/slider1.jpg"></li>
                    <li data-pc-img="/assets/img/about/slider2.jpg"></li>
                    <li data-pc-img="/assets/img/about/slider3.jpg"></li>
                    <li data-pc-img="/assets/img/about/slider4.jpg"></li>
                    <li data-pc-img="/assets/img/about/slider5.jpg"></li>
                    <li data-pc-img="/assets/img/about/slider6.jpg"></li>
                    <li data-pc-img="/assets/img/about/slider7.jpg"></li>
                    <li data-pc-img="/assets/img/about/slider8.jpg"></li>
                </ul>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="banner3">

            </div>
            <div class="banner4" aria-hidden="true">

            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <aside class="sidelogo">
                    <h2>洁碧中国总经销商：</h2>
                    <div class="logo">
                        <img src="/assets/img/wp_about_14.jpg" alt="caroplus健标" />
                    </div>
                </aside>
            </div>
            <div class="col-md-8">
                <div class="intro">
                    <h2>健标企业简介</h2>
                    <p>1992年，健标企业在上海创立了第一家口腔诊所，目的是让更多患有口腔疾病的人士获得优质的口腔专业呵护。随后的20年时间里，健标一直根植于国人的口腔健康事业，更多与世界齿科领域同步的优质服务和产品被引进到中国。深圳健标医疗器械有限公司、香港医疗齿科(国际)有限公司及上海健标实业有限公司的相继成立，从医疗服务到项目投资、进出口贸易，使健标企业颇具市场竞争力的优势品牌在行业内被广泛认知。立足于“传播口腔健康标准”的企业信念，让更多人的口腔--健康、自信。</p>
                    <h2>企业大记事</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li>1992年成立第一间齿科诊所-胡昕远口腔诊所    </li>
                                <li>2008年成立深圳健标医疗器械有限公司</li>
                                <li>2008年开始经销美国洁碧(WaterPik)水牙线产品</li>
                                <li>2009年成立香港医疗齿科(国际)有限公司</li>
                                <li>2009年成立洁碧健康体验中心   </li>
                                <li>2010年成立上海健标实业有限公司</li>
                                <li>2010年代理加拿大"三鹰"(TriHawk)车针</li>
                            </ul>

                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li>2011年代理美国"南方植牙"(Southern Implants)种植体</li>
                                <li>2011年成功主办了上海民营口腔沙龙，邀请到美国美国种植协会主席、世界级种植大师Mr. Peter Moy来华讲课</li>
                                <li>2011年创立齿科专业网站--优齿网(www.unioral.com)</li>
                                <li>2011年并购第二间齿科诊所-朱铭口腔诊所</li>
                                <li>2012年成为美国凯斯博士(TheraBreath)品牌产品中国区总经销商</li>
                                <li>2013年成立美国加利福尼亚口气治疗中心上海连锁口气优护中心</li>

                            </ul>

                        </div>
                    </div>
                    <p>健标企业过去的20年，为中国齿科领域不断呈现靓丽缤纷的恒久辉煌，凝聚了团队的智慧和勤奋，未来我们将继续在健康事业的道路上策马扬鞭，再铸功成。</p>
                </div>
            </div>
        </div>
    </div>
<?php
do_html_footer();
do_html_analytics();