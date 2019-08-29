<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");
require_once("../../data/job.php");
require_once("../../data/dictionary.php");

require '../../vendor/autoload.php';
use JasonGrimes\Paginator;

$dicClass = new TZGCMS\Dictionary();
$dictionaries = $dicClass->get_dictionaries_byid(9);


$urlPattern = "/career/jobs?page=(:num)";

$city = isset($_GET['city']) ? $_GET['city'] : null;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

if (!empty($city)) {
    $urlPattern = $urlPattern . "&city=$city";
}
if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
  
}

$jobClass = new TZGCMS\Job();

$totalItems = $jobClass->get_jobs_count_v1($city, $keyword);  //总记录数
$itemsPerPage = TZGCMS\Job::$pageSize ;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$jobs = $jobClass->get_paged_jobs_v1($city, $keyword, $currentPage);



?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo "招聘岗位-职业发展" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header_career.php') ?>

    <?php // echo $data["content"];
    ?>
    <div class="page page-career">
        <?php require_once('includes/subnav.php') ?>
        <div class="container">
            <header class="title title-section">
                <h2 class="wow slideInUp">招聘岗位</h2>
            </header>

            <div class="filters">
                    <div class="row no-gutters wow slideInUp">
                        <div class="col-auto">
                            <label class="title">工作地点</label>                           
                        </div>
                        <div class="col">
                            <div class="cities">
                                <a href="/career/jobs" class="<?php echo $city===null?"active":""; ?>">全部</a>
                                <?php foreach($dictionaries as $dic){ ?>
                                    <a href="/career/jobs?city=<?php echo $dic['title']; ?>" class="<?php echo $city===$dic['title']?"active":""; ?>"><?php echo $dic['title']; ?></a>
                                 <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row no-gutters align-items-center wow slideInUp">
                        <div class="col-auto">
                            <label class="title">关键词</label>
                        </div>
                        <div class="col">
                           
                            <form action="/career/jobs" method="get" class="formsearch">
                            <div class="row no-gutters">
                                <div class="col">
                            <input type="text" name="keyword" value="<?php echo $keyword; ?>" />
                            </div>
                            <div class="col-auto"><button type="submit"><i class="iconfont icon-search"></i></button></div>
                            
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            <div class="list list-jobs wow slideInUp">
                <table class="table">
                    <thead>
                        <tr>
                            <th>
                            职位名称
                            </th>
                            <th class="address">
                            工作地点
                            </th>
                            <th class="date">
                            时间
                            </th>
                            <th style="width:50px;">                            
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($jobs as $job) { ?>
                    <tr class="opentr">
                        <td><?php echo $job["title"]; ?></td>
                        <td class="address"><?php echo $job["address"]; ?></td>
                        <td class="date"><?php echo date('Y-m-d', $job['added_date']); ?></td>
                        <td><a href="javascript:void(0);" class="open"><i class="iconfont icon-down"></i></a></td>
                    </tr>
                    <tr class="job-body" >
                        <td colspan="4">
                            <div class="post-body" style="display:none;">
                            <address>工作地点：<?php echo $job["address"]; ?></address>                           
                            <?php echo $job['content']; ?>
                            <h3 class="title-job">
                                投递邮箱
                            </h3>
                            <p>HR@xiantong.com</p>
                            <p class="reply"><a href="mailto:HR@xiantong.com">申请职位 <i class="iconfont icon-right"></i></a></p>

                            </div>
                        </td>
                       
                    </tr>
                <?php  } ?>
                    </tbody>
                </table>
            
         
        </div>
         <!--pagination-->
         <div class="wow fadeInUp">
            <?php include("../../vendor/jasongrimes/paginator/examples/pager.phtml") ?>
        </div>
        <!--pagination end-->
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
                $(this).toggleClass("view")
                $(this).next("tr").find('.post-body').slideToggle();
            })
        });
    </script>
</body>

</html>