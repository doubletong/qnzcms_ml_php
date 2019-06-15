<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/chronicle.php");

$did = 13;
$chronicleClass = new Chronicle();
$data = $chronicleClass->get_all_chronicles($did);

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "里程碑-关于我们-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

    <?php // echo $data["content"];?>  
    
    <div class="striving">
    <!--banner-->
<div class="inside_banner about_banner" style="background-image:url(images/about_course_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">里程碑</h1>
            <p class="wow fadeInLeft">21年的历程，我们从未止步</p>
        </div>
    </div>
</div>
<!--banner end-->

<!--main-->
    <div class="main about">
        <div class="wrap">
            <div class="about_course_title wow fadeInUp">
                <h2>自1998年起持续创新</h2>
                <p>公司自成立以来始终坚持以人为本、不断创新的理念，致力于将健康和长寿带给世界上的每一个角落</p>
            </div>
            <div class="about_course">
                <div class="about_course_nav wow fadeInUp">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php foreach($data as $course){ ?>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="<?php echo $course['image_url'] ?>" alt=""/>
                                    </div>
                                </div>
                                <p><?php echo $course['year']; ?></p>
                            </div>
                            <?php } ?>
                            <!-- <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2018</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2017</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2016</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2015</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2014</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2013</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2012</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2011</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2010</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2009</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2008</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2007</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2006</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2005</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2004</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2003</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2002</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2001</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>2000</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>1999</p>
                            </div>
                            <div class="swiper-slide">
                                <div class="dot">
                                    <div class="img">
                                        <img src="images/about_course_01.jpg" alt=""/>
                                    </div>
                                </div>
                                <p>1998</p>
                            </div> -->
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
                        <?php foreach($data as $course){ ?>
                            <div class="swiper-slide">
                                <h3><?php echo $course['year']; ?></h3>
                                <div class="desc">
                                    <?php echo $course['description']; ?>
                                </div>
                            </div>
                           
                            <?php } ?>
                            <!-- <div class="swiper-slide">
                                <h3>2019</h3>
                                <div class="desc">
                                    <p>平均每8秒左右，一个微创<sup>®</sup>产品在全球内得到使用</p>
                                    <p>Aspiration™及SoSuperior™全膝关节置换系统获批上市</p>
                                    <p>新一代冠脉雷帕霉素靶向洗脱支架系统Firehawk Liberty™获欧盟CE认证</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2018</h3>
                                <div class="desc">
                                    <p>平均每12秒左右，一个微创<sup>®</sup>产品在全球内得到使用
                                    <p>Tubridge<sup>®</sup>血管重建装置、Columbus<sup>®</sup>三维心脏电生理标测系统（2.0）、CompassAnalyzer™起搏系统分析仪等产品上市</p>
                                    <p>冠脉支架系统全球累计植入量达450万套，人工关节假体全球累计植入量达110万套，起搏器全球累计植入量达100万台</p>
                                    <p>Firehawk<sup>®</sup>、Firebird2<sup>®</sup> 等产品首次进入台湾市场</p>
                                    <p>累计15款产品进入创新医疗器械绿色通道</p>
                                    <p>国产起搏器投入市场</p>
                                    <p>Firehawk<sup>®</sup> TARGET AC临床研究12个月结果在EuroPCR 2018大会上首次公布，进一步证明了Firehawk<sup>®</sup> 仅需同类产品1/3的全球最低载药量就可以达到同等安全性和有效性，研究成果发表在《柳叶刀》杂志，为近200年来该杂志首次出现中国医疗器械的身影, 该科技成果入选“2018中国十大科技事件”</p>
                                    <p>于法国巴黎设立微创<sup>®</sup>心律管理全球总部，开拓心脏节律管理业务</p>
                                    <p>苏州微创骨科学（集团）有限公司成立</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2017</h3>
                                <div class="desc">
                                    <p>“大血管覆膜支架系列产品关键技术开发及大规模产业化”项目荣获国家科技进步二等奖</p>
                                    <p>Rega™心系列植入式心脏起搏器、Firefighter™PTCA球囊扩张导管等产品获得CFDA注册证</p>
                                    <p>累计共有11项产品进入CFDA创新医疗器械特别审批程序</p>
                                    <p>Firehawk<sup>®</sup>（火鹰）欧洲临床TARGET AC首次研究结果显示3个月支架覆盖率达99.9%，TARGET I RCT 5年长期临床随访数据显示5年支架血栓率为0</p>
                                    <p>内轴型全膝关节置换系统17年随访结果显示出极高的假体存留率（98.8%）和患者满意度（95%）</p>
                                    <p>Firesorb<sup>®</sup>（火鹮）关键性临床研究项目FUTURE II试验完成首例病例入组</p>
                                    <p>拟以1.9亿美元现金收购LivaNova心律管理业务</p>
                                    <p>微创<sup>®</sup>科威、微创<sup>®</sup>生命科技改制</p>
                                    <p>微创<sup>®</sup>心通获得对外融资</p>
                                    <p>设立微创<sup>®</sup>优通公司，正式进入泌尿及妇女健康领域</p>
                                    <p>微创<sup>®</sup>电生理于全国中小企业股份转让系统挂牌</p>
                                    <p>微创<sup>®</sup>嘉兴园启用</p>
                                    <p>捐资为云南省建水县第一中学建立“建水一中致公科技馆”</p>
                                    <p>微创<sup>®</sup>医疗投资投资Zenomics、Promaxo</p>
                                    <p>收购巴西代理商业务，开展微创<sup>®</sup>巴西属地化管理</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2016</h3>
                                <div class="desc">
                                    <p>平均每15秒左右，一个微创<sup>®</sup>产品在全球内得到使用</p>
                                    <p>“心脏病微创外科治疗新技术及临床应用”项目荣获国家科学技术二等奖</p>
                                    <p>微创<sup>®</sup>电生理Columbus<sup>®</sup>三维心脏电生理标测系统获得CFDA 注册证</p>
                                    <p>微创<sup>®</sup>在线“医线生机”平台正式发布</p>
                                    <p>微创<sup>®</sup>集团荣获“五星级诚信创建企业”称号</p>
                                    <p>设立MicroPort Scientific India Private Ltd.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2015</h3>
                                <div class="desc">
                                    <p>平均每18秒左右，一个微创<sup>®</sup>产品在全球内得到使用</p>
                                    <p>“微创介入与植入医疗器械关键技术及产业化平台”项目荣获国家科学技术进步奖二等奖</p>
                                    <p>Firehawk<sup>®</sup>（火鹰）药物靶向洗脱支架（TES）获得欧盟CE认证</p>
                                    <p>EVOLUTION™ 内轴型全膝关节置换系统于中国获准上市</p>
                                    <p>创领心律管理医疗器械（上海）有限公司建成中国首条国产心脏起搏器生产线</p>
                                    <p>微创<sup>®</sup> 骨科入驻苏州新总部</p>
                                    <p>苏州微创关节医疗科技有限公司、苏州微创骨科医疗工具有限公司在苏州工业园区成立</p>
                                    <p>微创（上海）医疗机器人有限公司成立</p>
                                    <p>微创在线医疗科技（上海）有限公司成立</p>
                                    <p>良知创意中心正式投入使用</p>
                                    <p>知行医学培训学院正式投入使用</p>
                                    <p>微创<sup>®</sup> 电生理、微创<sup>®</sup> 神通两个子业务完成改制</p>
                                    <p>上海微创电生理医疗科技有限公司荣获上海市“高新技术企业”认定</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2014</h3>
                                <div class="desc">
                                    <p>WILLIS<sup>®</sup>临床应用研究项目荣获2014年度国家科学技术进步二等奖</p>
                                    <p>Firehawk<sup>®</sup>靶向洗脱支架（TES）于中国获准上市</p>
                                    <p>完成收购 Wright Medical OrthoRecon关节重建业务及其相关资产</p>
                                    <p>收购强生Cordis旗下Conor Medsystems公司及其他药物洗脱支架相关资产</p>
                                    <p>与索林集团签署合资协议，在华共建心律管理业务平台</p>
                                    <p>平均每20秒左右，一个微创<sup>®</sup>产品在全球内得到使用</p>
                                    <p>入驻新总部</p>
                                    <p>微创<sup>®</sup>工程研究院成立</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2013</h3>
                                <div class="desc">
                                    <p>WILLIS<sup>®</sup>颅内覆膜支架系统获国内首个此类产品的CFDA注册证</p>
                                    <p>微创骨科医疗科技（苏州）有限公司在苏州新加坡工业园区正式开工</p>
                                    <p>宣布2.9亿美元收购美国Wright Medical 公司OrthoRecon 关节重建业务</p>
                                    <p>电生理FireMagic™、EasyFinder™、EasyLoop™、FireMagic™ 3D、Columbus™三维标测系统产品获得CE认证</p>
                                    <p>累计申请专利584项</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2012</h3>
                                <div class="desc">
                                    <p>着手实施"微创<sup>®</sup>联合舰队"集团化运作模式</p>
                                    <p>公司正式更名为上海微创医疗器械（集团）有限公司</p>
                                    <p>平均每30秒左右，一个微创<sup>®</sup>产品在全球内得到使用</p>
                                    <p>收购东莞科威医疗器械有限公司、龙脉医疗器械（北京）有限公司</p>
                                    <p>微创神通医疗科技（上海）有限公司、微创手术器材（上海）有限公司在上海国际医学园区成立</p>
                                    <p>微创骨科医疗科技（苏州）有限公司在苏州工业园区成立</p>
                                    <p>MicroPort International Corp. Limited在香港注册成立</p>
                                    <p>累计申请专利452项</p>
                                    <p>向国家贡献税收历年累计超过10亿元人民币</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2011</h3>
                                <div class="desc">
                                    <p>上海微创骨科公司收购苏州海欧斯医疗器械有限公司</p>
                                    <p>平均每90秒左右，一个微创产品在全球内得到使用</p>
                                    <p>冠脉药物支架系统植入量突破七十万条</p>
                                    <p>承担国家各种研发项目累计超过一亿元人民币</p>
                                    <p>累计申请专利305项</p>
                                    <p>嘉兴微创医疗科技有限公司在浙江嘉兴科技城成立</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2010</h3>
                                <div class="desc">
                                    <p>上海微创电生理医疗科技有限公司在上海国际医学园区成立</p>
                                    <p>MicroPort Scientific Corp. 于9月24日在香港联交所主板上市（00853.HK）</p>
                                    <p>年销售额突破1亿美元</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2009</h3>
                                <div class="desc">
                                    <p>上海微创骨科医疗科技有限公司在上海国际医学园区成立</p>
                                    <p>张江集电港微创产业化基地项目正式开工</p>
                                    <p>上海市无偿资助5430万人民币扶持与提升微创的多元产业化能力</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2008</h3>
                                <div class="desc">
                                    <p>上海微创生命科技有限公司在上海国际医学园区成立</p>
                                    <p>收购北京潘格瑞医疗器械科技有限公司，公司进入糖尿病医疗领域</p>
                                    <p>Firebird2™冠脉药物支架系统通过SFDA注册认证</p>
                                    <p>开始尝试以纵向组织为主，各种横向组织为辅的“合纵连横”两维授权制管理模式</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2007</h3>
                                <div class="desc">
                                    <p>Firebird™冠脉药物支架系统获得国家科学技术进步二等奖</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2006</h3>
                                <div class="desc">
                                    <p>冠脉药物支架系统植入量突破十万条</p>
                                    <p>MicroPort Scientific Corp. 成立</p>
                                    <p>通过阿根廷ANMAT体系认证审核，产品进入南美洲</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2005</h3>
                                <div class="desc">
                                    <p>Firebird™冠脉药物支架系统被评为上海市重点新产品</p>
                                    <p>年销售额突破1亿元人民币</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2004</h3>
                                <div class="desc">
                                    <p>Firebird™冠脉药物支架系统获得SFDA注册认证</p>　
                                    <p>Mustang™裸支架系统通过CE认证，产品进入欧盟</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2003</h3>
                                <div class="desc">
                                    <p>PTCA球囊扩张导管获得日本厚生省注册进口准入证，产品进入日本</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2002</h3>
                                <div class="desc">
                                    <p>获得国家发改委重大专项资助</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2001</h3>
                                <div class="desc">
                                    <p>公司总部迁入张江高科技园区牛顿路501号</p>
                                    <p>获得上海市高新技术企业认定，公司营运开始盈利</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>2000</h3>
                                <div class="desc">
                                    <p>Mustang™裸支架系统通过SFDA注册认证</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>1999</h3>
                                <div class="desc">
                                    <p>PTCA 球囊扩张导管通过SFDA注册认证，公司实现首次销售</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <h3>1998</h3>
                                <div class="desc">
                                    <p>5月15日公司创建，注册地在张江高科技园区郭守敬路351号1号楼618室</p>
                                </div>
                            </div> -->
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
        spaceBetween: 10,
        // loop:true,
        // loopAdditionalSlides : 3
    });
    var aboutCourseNav = new Swiper('.about_course_nav .swiper-container', {
        spaceBetween: 0,
        // loop:true,
        // loopAdditionalSlides : 1,
        centeredSlides: true,
        slidesPerView: 3,
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
           $(".subnav li:nth-of-type(6) a").addClass("active");
        });
    </script>
</body>
</html>