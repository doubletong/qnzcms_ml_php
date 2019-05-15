<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/team.php");

$teamClass = new Team();
$teams = $teamClass->fetch_category("常兆华博士");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "常兆华博士-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="striving">
<!--banner-->
<div class="inside_banner about_team_detail_banner">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">常兆华博士</h1>
                <p class="wow fadeInLeft">董事局主席、执行董事、首席执行官、GMC主席</p>
            </div>
            <div class="inside_banner_img wow fadeInRight" style="background-image:url(/images/about_team_detail_banner.png)"></div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main about">
        <div class="wrap">
            <div class="about_team_detail">
                <div class="about_team_detail_desc wow fadeInUp">
                    <p>常兆华博士，微创医疗科学有限公司董事局主席、执行董事兼首席执行官及GMC主席。常博士在医疗器械行业拥有逾29年的经验，现时担任上海理工大学医疗器械学院教授。于1998年创办上海微创医疗器械（集团）有限公司之前，常博士自1996年至1997年，担任总部位于美国加利福尼亚州的纳斯达克上市医疗器械公司Endocare Inc.的研发副总裁。自1990年至1995年，常博士于美国马里兰州的一家医疗器械公司Cryomedical Sciences Inc.先后担任高级工程师、首席科学家、研发部主任兼工程部副总裁等职务。常博士分别于1983年及1985年在上海理工大学获得制冷工程学士学位及低温工程硕士学位，并于1992年在纽约州立大学宾汉姆顿分校获得生物科学博士学位。常博士在生物医学科学领域上发表了大量文章，在中国及美国拥有多项专利。</p>
                </div>
            </div>
        </div>
        <div class="about_team_detail_other">
            <h3 class="wow fadeInUp">其它管理层档案</h3>
            <div class="about_team_detail_list wow fadeInUp">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="/images/about_team_01.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <h4>常兆华博士</h4>
                                <p>董事局主席、执行
                                    董事、首席执行官、
                                    GMC主席</p>
                                <a href="/team/detail-1">了解更多</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="/images/about_team_02.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <h4>芦田典裕先生 </h4>
                                <p>非执行董事</p>
                                <a href="/team/detail-1">了解更多</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="/images/about_team_03.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <h4>白藤泰司先生 </h4>
                                <p>非执行董事</p>
                                <a href="/team/detail-1">了解更多</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="/images/about_team_04.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <h4>余洪亮先生</h4>
                                <p>非执行董事</p>
                                <a href="/team/detail-1">了解更多</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="/images/about_team_05.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <h4>周嘉鸿先生 </h4>
                                <p>独立非执行董事</p>
                                <a href="/team/detail-1">了解更多</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="/images/about_team_06.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <h4>刘国恩博士 </h4>
                                <p>独立非执行董事</p>
                                <a href="/team/detail-1">了解更多</a>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="img">
                                <img src="/images/about_team_07.jpg" alt=""/>
                            </div>
                            <div class="txt">
                                <h4>邵春阳先生</h4>
                                <p>独立非执行董事</p>
                                <a href="/team/detail-1">了解更多</a>
                            </div>
                        </div>
                    </div>
                    <div class="about_team_detail_controls">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
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
     var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        slidesPerView: 5,
        centeredSlides: true,
        loop:true,
        paginationClickable: true,
        spaceBetween: '1%',
        prevButton:'.swiper-button-prev',
        nextButton:'.swiper-button-next'
    });
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(2) a").addClass("active");
           $(".mainav li:nth-of-type(2) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>