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
                    <img src="images/product_detail_logo_03.png"/>
                </div>
                <h2 class="wow fadeInLeft">Tubridge<sup>®</sup> 血管重建装置</h2>
            </div>
        </div>
        <div class="inside_banner_img wow fadeInRight" style="background-image:url(images/product_detail_banner_03.png)"></div>
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
                <p class="wow fadeInUp">Tubridge<sup>®</sup>血管重建装置专门针对最难治疗的大型、巨大型动脉瘤研发设计，通过利用“血流动力学”原理，显著改变动脉瘤内血流流态，降低血流对动脉瘤的冲击，使内皮细胞沿支架骨架生长，逐渐修复动脉瘤瘤颈，治愈动脉瘤，从而排除“颅内不定时炸弹”。</p><br/>
                <dl class="wow fadeInUp">
                    <dd><b>48/64根NiTi合金丝编织结构设计</b><br/>
                        柔顺性：独特的编织设计结构，即使在迂曲血管中也能提供顺滑的推送体验<br/>
                        超弹性：适应于变径特性的颅内动脉血管，提供更好的贴壁效应及支撑效应<br/>
                        变形性：“推拉技术”可实现局部网孔密度变化，提供更好的“血流导向”效应</dd>
                    <dd><b>轻松释放</b><br/>
                        回撤导管即刻释放</dd>
                    <dd><b>可回收</b><br/>
                        重复回收再释放≤3次</dd>
                    <dd><b>可视性</b><br/>
                        两根缠绕支架整段的铂铱金属绞丝实现良好可视性，提供支架准确可控的定位</dd>
                </dl>
            </div>
            <!--规格参数-->
            <div class="product_detail_item product_detail_spec">
                <div class="product_detail_title wow fadeInUp">
                    <h3>规格参数</h3>
                </div>
                <div class="product_detail_table wow fadeInUp">
                    <img  src="images/product_detail_02.jpg" alt=""/>
                </div>
                <br/>
                <p class="wow fadeInUp">注册信息： <br/>
                    1）医疗器械名称：血管重建装置 <br/>
                    2）医疗器械生产企业名称：微创神通医疗科技（上海）有限公司 <br/>
                    3）医疗器械注册证号：国械注准20183770102 <br/>
                </p>
                <br/>
            </div>
            <!--视频展示-->
            <div class="product_detail_item product_detail_video">
                <div class="product_detail_title wow fadeInUp">
                    <h3>视频展示</h3>
                </div>
                <div class="product_detail_video_wrap wow fadeInUp">
                    <video poster="images/product_detail_video.jpg" src="" preload=""></video>
                    <a class="play_btn" href="javascript:void(0);"><img src="images/play.png"/></a>
                </div>
            </div>
            <!--相关案例-->
            <div class="product_detail_item product_detail_case">
                <div class="product_detail_title wow fadeInUp">
                    <h3>相关案例</h3>
                    <div class="product_detail_case_pagination fr"></div>
                </div>
                <div class="product_detail_case_wrap wow fadeInUp">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <p>Tubridge血管重建装置治疗合并载瘤动脉狭窄的ICA巨大动脉瘤
                                    <span>上海长海医院</span></p>
                                <a href="" target="_blank">查看文档</a>
                            </div>
                            <div class="swiper-slide">
                                <p>Tubridge血管重建装置治疗颈内动脉夹层动脉瘤
                                    <span>山东大学齐鲁医院</span></p>
                                <a href="" target="_blank">查看文档</a>
                            </div>
                            <div class="swiper-slide">
                                <p>Tubridge血管重建装置治疗颈内动脉眼动脉段大动脉瘤
                                    <span>常州市第一人民医院</span></p>
                                <a href="" target="_blank">查看文档</a>
                            </div>
                            <div class="swiper-slide">
                                <p>Tubridge血管重建装置治疗合并载瘤动脉狭窄的ICA巨大动脉瘤
                                    <span>上海长海医院</span></p>
                                <a href="" target="_blank">查看文档</a>
                            </div>
                            <div class="swiper-slide">
                                <p>Tubridge血管重建装置治疗颈内动脉夹层动脉瘤
                                    <span>山东大学齐鲁医院</span></p>
                                <a href="" target="_blank">查看文档</a>
                            </div>
                            <div class="swiper-slide">
                                <p>Tubridge血管重建装置治疗颈内动脉眼动脉段大动脉瘤
                                    <span>常州市第一人民医院</span></p>
                                <a href="" target="_blank">查看文档</a>
                            </div>
                            <div class="swiper-slide">
                                <p>Tubridge血管重建装置治疗合并载瘤动脉狭窄的ICA巨大动脉瘤
                                    <span>上海长海医院</span></p>
                                <a href="" target="_blank">查看文档</a>
                            </div>
                            <div class="swiper-slide">
                                <p>Tubridge血管重建装置治疗颈内动脉夹层动脉瘤
                                    <span>山东大学齐鲁医院</span></p>
                                <a href="" target="_blank">查看文档</a>
                            </div>
                            <div class="swiper-slide">
                                <p>Tubridge血管重建装置治疗颈内动脉眼动脉段大动脉瘤
                                    <span>常州市第一人民医院</span></p>
                                <a href="" target="_blank">查看文档</a>
                            </div>
                        </div>
                    </div>
                </div>
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