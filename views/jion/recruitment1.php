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
    <title><?php echo "社会招聘-加入三达" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>

    <?php // echo $data["content"];
    ?>
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

        <div class="welfare">
                <h3 class="title">
                    联系方式
                </h3>
                <hr>
                <dl>
                    <dt>简历投递
                    </dt>
                    <dd>请有意者将个人简历以电子邮件方式发送至hr@suntar.com，主题请注明应聘岗位，简历以附件上传。
                    </dd>
                    <dt>招聘热线
                    </dt>
                    <dd>18030078191 0592-6778170 陈小姐</dd>
                </dl>

                <h3 class="title">
                    员工福利
                </h3>
                <hr>
                <p>公司将为每一位三达人提供丰厚的福利，心动的话就投简历来吧~</p>
                <dl>
                    <dt>刚性福利

                    </dt>
                    <dd>五险+商业险、住房公积金、带薪年假、通讯补贴、双休、免费通勤车

                    </dd>
                    <dt>柔性福利

                    </dt>
                    <dd>补贴式工作餐、婚育等礼金、婚育丧假期、考试假、提升培训、全勤奖
                    </dd>
                    <dt>特别福利
                    </dt>
                    <dd>年度体检、年度旅游、中秋博饼、“三八”妇女节活动、绩效奖金、年终表彰会、每周1小时运动时间、健身房/篮球场/网球场/图书室</dd>
                </dl>
            </div>
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