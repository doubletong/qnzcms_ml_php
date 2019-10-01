<?php
require_once("../../includes/common.php");
require_once("../../data/school.php");

require '../../vendor/autoload.php';

use JasonGrimes\Paginator;


$schoolClass = new TZGCMS\School();
$did = 44;
$countries = $schoolClass->get_countries();

$urlPattern = "schools?page=(:num)";

$cid = isset($_GET['cid']) ? $_GET['cid'] : null;


if (!empty($cid)) {
    $urlPattern = $urlPattern . "&cid=$cid";
}


$totalItems = $schoolClass->get_schools_count($did, $cid);  //总记录数
$itemsPerPage = 24;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$schools = $schoolClass->get_paged_schools($did, $cid,  $currentPage, $itemsPerPage);



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


    <div class="page page-art page-art-schools">       
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
                    <a href="/art/professional">
                       <div class="icon">
                           <i class="iconfont icon-icon-3"></i>
                       </div>
                       <p>专业介绍</p>
                    </a>
               </div>
               <div class="col">
                    <a href="/art/schools"   class="active">
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
                <h3>推荐院校</h3>
            </div>
            <nav class="nav-schools wow slideInUp">
                <a href="/art/schools" class="<?php echo isset($cid)?"":"active";?>">全部</a>
                <?php foreach($countries as $country){?>
                    <a href="/art/schools?cid=<?php echo $country['id'];?>" class="<?php echo (isset($cid) && $cid==$country['id'])?"active":"";?>"><?php echo $country['name'];?></a>
                <?php } ?>             
            </nav>
            <div class="prolist">
                <div class="row align-items-center">
                    <?php foreach($schools as $school){?>
                        <div class="col-md-3 wow slideInUp">
                            <figure class="item">
                                <img src="<?php echo $school['image_url'];?>" alt="<?php echo $school['title'];?>">
                            </figure>
                        </div>
                    <?php } ?>             
                   
                  
                </div>
            </div>
            <!--pagination-->
            <div class="wow fadeInUp">
                <?php include("../../vendor/jasongrimes/paginator/examples/pager.phtml") ?>
            </div>
            <!--pagination end-->
  

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