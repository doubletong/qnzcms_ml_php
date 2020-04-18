<?php
require_once("../../includes/common.php");
require_once("../../data/product.php");



$productClass = new TZGCMS\Product();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $productClass->get_product_bgId($id);
    $prev = $productClass->fetch_prev_data($id);
    $next = $productClass->fetch_next_data($id);
    $categories = $productClass->get_all_categories();
 
} else {
    header('Location: /service');
    exit;
}





?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo  $data['title']."-产品中心-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>


    <!--main-->
    <div class="page page-case-detail page-service">

        <div class="container">
            <div class="row wow fadeInUp sitepath">
                <div class="col-md">
                    <div class="title title-section">
                        <h3>设备展示  <span>Equipment Exhibition</span></h3>
                        <p>专业的设备租赁服务平台，提供各类灯光音响租赁服务……</p>
                    </div>

                </div>
                <div class="col-md-auto align-self-end">
                    您的当前位置：<a href="/">主页</a> > <a href="/service">服务项目</a> > <a href="/service/project-detail/<?php echo $data['category_id'] ?>"><?php echo $data['category_title'] ?></a> > <span class="current"><?php echo $data['title']; ?></span>
                </div>
            </div>

            
            <main class="maincontent">
             
                        <div class="case">
                            <header class="title-case-v1 wow fadeInUp">
                                <div class="row align-items-center">
                                    <div class="col-md">
                                    <h1 class="title-v1">
                                        <?php echo $data['title'];?>
                                    </h1>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="share">
                                        分享到
                                        </div>
                                    </div>
                                </div>                              
                            </header>
                         
                            <hr>
                            <article class="wow fadeInUp">
                                <div class="art-top">
                                <div class="row align-items-center">
                                    <div class="col-lg-auto">
                                        <div class="pic"><img src="<?php echo $data['image_url'];?>" alt=""></div>
                                    </div>
                                    <div class="col-lg">
                                        <?php echo $data['specifications'];?>
                                    </div>
                                </div>
                                </div>
                                <?php echo $data['content'];?>

                                <div class="back">
                                    <a href="javascript :history.back(-1);">返回上一页</a>
                                </div>
                            </article>
                        <hr>

                <div class="wow fadeInUp">
                    <div class="row">
                        <div class="col-md-6">
                        <?php if(!empty($prev)){?>
                                <div class="box-arrow">
                                    上一篇：
                                    <a href="/service/project-detail/<?php echo $prev["id"];?>"><?php echo $prev["title"];?> </a>                            
                                </div>                        
                            <?php } ?>
                        </div>
                        <div class="col-md-6">
                            <?php if(!empty($next)){?>   
                                <div class="box-arrow text-right">
                                   下一篇：
                                    <a href="/service/project-detail/<?php echo $next["id"];?>"><?php echo $next["title"];?> </a>
                                  
                                </div>    
                            <?php } ?>         
                        </div>
                    </div>
               </div> 
                        </div>
              
            </main>         

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