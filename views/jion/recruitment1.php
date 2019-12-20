<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");
require_once("../../data/job.php");
require_once("../../data/dictionary.php");


require '../../vendor/autoload.php';
use JasonGrimes\Paginator;

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("recruitment");

// $dicClass = new TZGCMS\Dictionary();
// $dictionaries = $dicClass->get_dictionaries_byid(9);


$urlPattern = "/career/jobs?page=(:num)";

$dep = "社会招聘";
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

if (!empty($city)) {
    $urlPattern = $urlPattern . "&dep=$dep";
}
if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
  
}

$jobClass = new TZGCMS\Job();

$totalItems = $jobClass->get_jobs_count_v1($dep, $keyword);  //总记录数
$itemsPerPage = TZGCMS\Job::$pageSize ;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$jobs = $jobClass->get_paged_jobs_v1($dep, $keyword, $currentPage);



?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo "社会招聘-加入三达" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>

   
    <div class="page page-jion container">  
            <div class="list list-jobs wow slideInUp">
           
                    <?php foreach ($jobs as $job) { ?>
                        <a  href="javascript:void(0);" class="opentr">
                            <div class="row">
                                <div class="col"><?php echo $job["title"]; ?></div>                      
                                <div class="col-auto"><i class="iconfont icon-jia"></i></div>
                            </div>
                    </a>
                    <div class="job-body" >                     
                        <div class="post-body" style="display:none;">                        
                            <?php echo $job['content']; ?> 
                        </div>                 
                       
                    </div>
                <?php  } ?>
       
            
         
  
         <!--pagination-->
         <div class="wow fadeInUp">
            <?php include("../../vendor/jasongrimes/paginator/examples/pager.phtml") ?>
        </div>
        <!--pagination end-->

        <?php  echo $data["content"];  ?>

    </div>
</div>

    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
        
          //  $(".mainav li:nth-of-type(5)").addClass("active");
          //  $(".subnav nav div:nth-of-type(3) a").addClass("active");

            $(".opentr").click(function(e){
                e.preventDefault();
                $(this).find("i").toggleClass("icon-jian");
                $(this).next("div").find('.post-body').slideToggle();
            })
        });
    </script>
</body>

</html>