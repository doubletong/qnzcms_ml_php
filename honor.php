<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("instrument");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "医疗器械-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
    <?php // echo $data["content"];?>  

    
    <div class="striving">
<!--banner-->
<div class="inside_banner about_banner" style="background-image:url(images/about_honor_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">奖项荣誉</h1>
            <p class="wow fadeInLeft">我们的荣誉，只因为你创造更好的生活</p>
        </div>
    </div>
</div>
<!--banner end-->

<!--main-->
    <div class="main about">
        <div class="wrap">
            <div class="about_honor">
                <div class="about_course_nav wow fadeInUp">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2019</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2018</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2017</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2016</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2015</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2014</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2013</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2012</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2011</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2010</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2009</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2008</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2007</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2004</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot"></div>
                                <p>2001</p>
                            </div>
                        </div>
                    </div>
                    <div class="about_course_nav_controls">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
                <div class="about_course_list wow fadeInUp">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <p>本集团获评全国模范劳动关系和谐企业。</p>
                                <p>本集团荣获中国公益节“2018年度责任品牌奖”。</p>
                                <p>本集团的Firehawk®（火鹰）支架和Rega®心系列起搏器入选“健康中国（2018）·十大医疗器械”。</p>
                                <p>本集团的Panoramic Endoscope设计作品荣获德国iF设计奖。</p>
                                <p>本集团获评上海市质量金奖。</p>
                                <p>本集团获评2018年度上海市“质量标杆”企业。</p>
                                <p>本集团连续6年荣获“上海市文明单位”称号。</p>
                                <p>本集团荣获2018年度浦东新区“科技创新突出贡献20强”。</p>
                                <p>本集团荣获浦东总部经济十大经典样本奖。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团入选“工信部制造业单项冠军培育企业”。</p>
                                <p>本集团荣获首批上海品牌认证。</p>
                                <p>本集团的“微创”与“MicroPort”入选首批上海市重点商标保护名录。</p>
                                <p>本集团旗下子公司创领心律医疗研发中心通过市商务委认定。</p>
                                <p>本集团董事长常兆华博士当选全国政协常委、全国工商联副主席。</p>
                                <p>本集团董事长常兆华博士入选《改革开放40年百名杰出民营企业家名单》。</p>
                                <p>本集团董事长常兆华博士当选上海市欧美同学会常务副会长。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团的“大血管覆膜支架系列产品关键技术开发及大规模产业化”项目荣获国家科技进步二等奖。</p>
                                <p>本集团荣获“2017年度中国进出口质量诚信企业”称号。</p>
                                <p>本集团获评“2017中国创新力医疗器械企业”。</p>
                                <p>本集团的Firehawk®、Firebird2®、Mustang®三款产品入围第三批优秀国产医疗设备产品名单。</p>
                                <p>本集团的“髋膝兼容、安全、高效微创关节置换手术机器人系统研发”项目获得2017年度国家重大专项支持。</p>
                                <p>本集团连续十二年荣获“上海名牌”称号。</p>
                                <p>本集团获评2017年度上海市卓越创新试点企业。</p>
                                <p>本集团蝉联“上海市五星诚信创建企业”荣誉称号。</p>
                                <p>本集团荣获2016年度浦东新区“先进制造业突出贡献20强”。</p>
                                <p>本集团获评“上海市浦东新区企业社会责任达标企业”称号。</p>
                                <p>本集团荣获“浦东新区国际贸易品牌示范企业”。</p>
                                <p>本集团旗下子公司电生理荣膺2016年度上海市“专精特新”中小企业称号。</p>
                                <p>本集团旗下子公司神通获首届CIAP创新大赛“产品研发和成果转化”组第一名。</p>
                                <p>本集团员工连续5年获得“张江卓越人才”称号。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团的“心脏病微创外科治疗新技术及临床应用”项目荣获国家科学技术二等奖。</p>
                                <p>本集团获评“2016年国家技术创新示范企业”。</p>
                                <p>本集团荣获“五星级诚信创建企业”称号。</p>
                                <p>本集团荣获由PMI（Project Management Institute，项目管理协会）颁发的年度PMO（Project Management Office）大奖及项目入围奖两项大奖。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团的“微创介入与植入医疗器械关键技术及产业化平台”项目荣获国家科学技术进步奖二等奖。</p>
                                <p>本集团获上海市2015年战略性新兴产业区域集聚发展试点项目。</p>
                                <p>本集团旗下子公司电生理荣获上海市高新技术企业认定。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团的WILLIS®临床应用研究项目荣获2014年度国家科学技术进步二等奖。</p>
                                <p>“微创”及“MicroPort”商标获“中国驰名商标”殊荣。</p>
                                <p>本集团入选国家科技部2013年创新人才推进计划重点领域创新团队。</p>
                                <p>本集团的WILLIS®颅内覆膜支架系统荣获2013年上海市专利新产品证书。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团的4个项目入选“上海市科委科技支撑计划”。</p>
                                <p>本集团的“雷帕霉素靶向洗脱支架的产业化”项目获得“2013年上海市战略性新兴产业重大专项”。</p>
                                <p>本集团的“用于房颤治疗的三维标测系统及导管重大科技攻关”科研项目获得“2013年上海市战略性新兴产业重点专项”。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团的WILLIS®颅内覆膜支架临床应用获得教育部科学技术进步奖一等奖。</p>
                                <p>本集团的“2012年国家认定企业技术中心创新能力建设”项目正式立项。</p>
                                <p>本集团的发明专利“药物洗脱支架”荣获第十四届中国专利奖“中国专利优秀奖”。</p>
                                <p>本集团的“国产植入式双腔心脏起搏器系统研究与开发”项目获得上海市科委“2012年科技支撑项目计划”。</p>
                                <p>本集团荣获上海生物医药行业协会“十强企业奖”。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团的“脑血管介入医疗器械的研制及临床研究”获得“十二五”国家科技支撑计划项目。</p>
                                <p>本集团的APOLLO获国家重点新产品计划项目。</p>
                                <p>本集团获得国家火炬计划重点高新技术企业认定。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团获得国家级认定企业技术中心。</p>
                                <p>本集团的“慢性病治疗器械的研发及产业化”项目获得上海市生物医药产业化项目。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团的药物洗脱支架系统获国家科技部授予自主创新产品证书。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团获两家上海市政府机构认定为上海市科技小巨人企业。</p>
                                <p>本集团的Firebird2™获上海市科学技术委员会授予上海市重点新产品证书。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团的药物洗脱支架荣获国家科学技术进步二等奖。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团的冠状动脉支架系统获国家重点新产品计划项目。</p>
                            </div>
                            <div class="swiper-slide">
                                <p>本集团获四家上海市政府机构认定为高新技术企业。</p>
                            </div>
                        </div>
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
     var aboutCourseList = new Swiper('.about_course_list .swiper-container', {
        spaceBetween: 10
    });
    var aboutCourseNav = new Swiper('.about_course_nav .swiper-container', {
        spaceBetween: 0,
        centeredSlides: true,
        slidesPerView: 7,
        touchRatio: 0.2,
        slideToClickedSlide: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev'
    });
    aboutCourseList.params.control = aboutCourseNav;
    aboutCourseNav.params.control = aboutCourseList;
    
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
           $(".subnav li:nth-of-type(5) a").addClass("active");
        });
    </script>
</body>
</html>