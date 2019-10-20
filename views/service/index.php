<?php
require_once("../../includes/common.php");
require_once("../../data/product.php");

$productClass = new TZGCMS\Product();
$categories = $productClass->get_all_categories();


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "新闻动态-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <div class="banner banner-news" style="background-image:url('/assets/img/banners/news.jpg')">
        <div class="container title-page ">
            <h1>Dynamic Information</h1>
            <p>动态资讯</p>
        </div>
    </div>


    <!--main-->
    <div class="page page-service">

        <div class="container">
            <div class="row wow fadeInUp">
                <div class="col-md">
                    <div class="title title-section">
                        <h3>服务项目   <span>Service Content</span></h3>
                        <p>专业的设备租赁服务平台，提供卓越的设备选择方案！</p>
                    </div>
                   
                </div>
                <div class="col-md-auto align-self-end">
                    您的当前位置：<a href="/">主页</a> > <span class="current">服务项目</span>
                </div>
            </div>

       
            <div class="projectlist wow fadeInUp">              
                <?php foreach($categories as $category){?>
                    <div class="item">
                        <div class="row no-gutters">
                            <div class="col-md-auto">
                                <a href="/service/projects/<?php echo $category['id']; ?>">                           
                                    <img src="<?php echo $category['thumbnail2']; ?>" alt="<?php echo $category['title']; ?>">  
                                </a> 
                            </div>
                            <div class="col-md">
                                
                                <a href="/service/projects/<?php echo $category['id']; ?>" class="txt">      
                                    <h3 class="title"><?php echo $category['title']; ?><span><?php echo $category['title_en']; ?></span></h3>                     
                                   <p><?php echo  mb_substr(strip_tags($category['intro']),0,90, 'utf-8')."……"; ?></p>
                                   <div class="more">更多详情</div>
                                </a> 
                            </div>
                        </div>
                    
                    </div>
                   
                <?php } ?>              
            
        
            </div>
        
      
        
        </div>

    </div>
    <!--main end-->

    <?php require_once('../../includes/footer.php') ?>

    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            // $(".mainav li:nth-of-type(4)").addClass("active");
            // $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>

</html>