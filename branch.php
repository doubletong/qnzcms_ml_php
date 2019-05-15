<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("biologic");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo "分子公司信息-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>

</head>
<body>
<?php require_once('includes/header.php') ?>
<?php //echo $data["content"];?>    
   

<div class="striving">
<!--banner-->
<div class="inside_banner about_banner" style="background-image:url(images/about_branch_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">分子公司信息</h1>
            <p class="wow fadeInLeft">不同地区 同一信念</p>
        </div>
    </div>
</div>
<!--banner end-->

<!--main-->
<div class="main about_branch">
    <ul class="clear">
        <li class="wow fadeInUp">
            <div class="img">
                <img src="images/about_branch_01.jpg" alt=""/>
            </div>
            <div class="txt">
                <span><img src="images/about_branch_logo_01.png" alt=""/></span>
                <p>MicroPort Orthopedics Inc.</p>
                <a href="/branch/detail-1">了解更多</a>
            </div>
        </li>
        <li class="wow fadeInUp">
            <div class="img">
                <img src="images/about_branch_02.jpg" alt=""/>
            </div>
            <div class="txt">
                <span><img src="images/about_branch_logo_02.png" alt=""/></span>
                <p>苏州微创骨科学（集团）有限公司</p>
                <a href="/branch/detail-1">了解更多</a>
            </div>
        </li>
        <li class="wow fadeInUp">
            <div class="img">
                <img src="images/about_branch_03.jpg" alt=""/>
            </div>
            <div class="txt">
                <span><img src="images/about_branch_logo_03.png" alt=""/></span>
                <p>MicroPort CRM</p>
                <a href="/branch/detail-1">了解更多</a>
            </div>
        </li>
        <li class="wow fadeInUp">
            <div class="img">
                <img src="images/about_branch_04.jpg" alt=""/>
            </div>
            <div class="txt">
                <span><img src="images/about_branch_logo_04.png" alt=""/></span>
                <p>上海微创心脉医疗科技股份有限公司</p>
                <a href="/branch/detail-1">了解更多</a>
            </div>
        </li>
        <li class="wow fadeInUp">
            <div class="img">
                <img src="images/about_branch_05.jpg" alt=""/>
            </div>
            <div class="txt">
                <span><img src="images/about_branch_logo_05.png" alt=""/></span>
                <p>上海微创电生理医疗科技股份有限公司</p>
                <a href="/branch/detail-1">了解更多</a>
            </div>
        </li>
        <li class="wow fadeInUp">
            <div class="img">
                <img src="images/about_branch_06.jpg" alt=""/>
            </div>
            <div class="txt">
                <span><img src="images/about_branch_logo_06.png" alt=""/></span>
                <p>微创神通医疗科技（上海）有限公司</p>
                <a href="/branch/detail-1">了解更多</a>
            </div>
        </li>
        <li class="wow fadeInUp">
            <div class="img">
                <img src="images/about_branch_07.jpg" alt=""/>
            </div>
            <div class="txt">
                <span><img src="images/about_branch_logo_07.png" alt=""/></span>
                <p>上海微创心通医疗科技有限公司</p>
                <a href="/branch/detail-1">了解更多</a>
            </div>
        </li>
        <li class="wow fadeInUp">
            <div class="img">
                <img src="images/about_branch_08.jpg" alt=""/>
            </div>
            <div class="txt">
                <span><img src="images/about_branch_logo_08.png" alt=""/></span>
                <p>上海微创生命科技有限公司</p>
                <a href="/branch/detail-1">了解更多</a>
            </div>
        </li>
        <li class="wow fadeInUp">
            <div class="img">
                <img src="images/about_branch_09.jpg" alt=""/>
            </div>
            <div class="txt">
                <span><img src="images/about_branch_logo_09.png" alt=""/></span>
                <p>东莞科威医疗器械有限公司</p>
                <a href="/branch/detail-1">了解更多</a>
            </div>
        </li>
        <li class="wow fadeInUp">
            <div class="img">
                <img src="images/about_branch_10.jpg" alt=""/>
            </div>
            <div class="txt">
                <span><img src="images/about_branch_logo_10.png" alt=""/></span>
                <p>上海微创龙脉医疗器材有限公司</p>
                <a href="/branch/detail-1">了解更多</a>
            </div>
        </li>
        <li class="wow fadeInUp">
            <div class="img">
                <img src="images/about_branch_11.jpg" alt=""/>
            </div>
            <div class="txt">
                <span><img src="images/about_branch_logo_11.png" alt=""/></span>
                <p>创领心律管理医疗器械（上海）有限公司</p>
                <a href="/branch/detail-1">了解更多</a>
            </div>
        </li>
        <li class="last wow fadeInUp">
            <p>更多子公司<br/>敬请期待</p>
        </li>
    </ul>
</div>
<!--main end-->
</div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
    $(window).resize(function(){
        lilastHeight()
    });
    $(window).load(function(){
        lilastHeight();
    });
    function lilastHeight(){
        $('.about_branch li.last').height($('.about_branch li').first().height())
    }
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
           $(".mainav li:nth-of-type(3) a").addClass("active");
           $(".subnav li:nth-of-type(6) a").addClass("active");

       
        });

       
    </script>
</body>
</html>