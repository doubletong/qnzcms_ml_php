<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/distributor.php");

$branchClass = new Distributor();
$branchs = $branchClass->fetch_all();

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo "分子公司信息-关于我们-".SITENAME; ?></title>    
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
        <?php foreach($branchs as $branch){ ?>
        <li class="wow fadeInUp">
            <div class="img">
                <img src="<?php echo $branch['image_url']; ?>" alt="<?php echo $branch['name']; ?>"/>
            </div>
            <div class="txt">
                <span><img src="<?php echo $branch['thumbnail']; ?>" alt=""/></span>
                <p><?php echo $branch['name']; ?></p>
                <a href="/branch-detail-<?php echo $branch['id']; ?>">了解更多</a>
            </div>
        </li>
        <?php } ?>
        
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