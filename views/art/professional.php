<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");
require_once("../../data/major.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("about");
$majorClass = new TZGCMS\Major();
$majors = $majorClass->get_all_majors(44);

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo  "专业介绍-美术专业-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link rel="stylesheet" href="/assets/js/vendor/swiper/package/css/swiper.min.css">
</head>

<body>
    <?php require_once('../../includes/leftcol.php') ?>

    <?php require_once('includes/header-art.php') ?>

       <!-- <?php //  echo $data["content"]; ?> -->
    <div class="page page-art page-art-profess">       
        <section class="s1 container"> 
           <div class="row">
               <div class="col">
                   <a href="/art/course">
                       <div class="icon">
                           <i class="iconfont icon-icon-2"></i>
                       </div>
                       <p>课程介绍</p>
                    </a>
               </div>
               <div class="col">
                    <a href="/art/professional"  class="active">
                       <div class="icon">
                           <i class="iconfont icon-icon-3"></i>
                       </div>
                       <p>专业介绍</p>
                    </a>
               </div>
               <div class="col">
               <a href="/art/schools" >
                       <div class="icon">
                           <i class="iconfont icon-icon-1"></i>
                       </div>
                       <p>推荐院校</p>
                    </a>
               </div>
               <div class="col">
               <a href="/art/works">
                       <div class="icon">
                           <i class="iconfont icon-icon-4"></i>
                       </div>
                       <p>作品集培训</p>
                    </a>
               </div>
               <div class="col">
               <a href="/art/offer">
                       <div class="icon">
                           <i class="iconfont icon-icon-"></i>
                       </div>
                       <p>学员offer</p>
                    </a>
               </div>
           </div>
        </section>
        <section class="s2 container">
            <div class="title-section-v2 wow slideInUp">             
                <h3>专业介绍</h3>
            </div>
            
            <div class="prolist">
                <div class="row">
                    <?php foreach($majors as $major){?>
                        <div class="col-md-3">
                            <figure>
                                <img src="<?php echo $major['image_url'];?>" alt="<?php echo $major['title'];?>">
                            </figure>
                        </div>
                    <?php } ?>
                  
                
                </div>
            </div>
           
  

        </section>
       
    </div>


    <?php require_once('../../includes/footer.php') ?>

    <?php require_once('../../includes/scripts.php') ?>
    <script src="/assets/js/vendor/swiper/package/js/swiper.min.js"></script>
    <script>

        var galleryThumbs = new Swiper('.gallery-thumbs', {
            spaceBetween: 10,
            slidesPerView: 6,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            });
            var galleryTop = new Swiper('.gallery-top', {
            spaceBetween: 10,
           
            thumbs: {
                swiper: galleryThumbs
            }
            });

        $(document).ready(function() {
        
      
        });
    </script>
</body>

</html>