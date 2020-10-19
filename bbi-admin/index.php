<?php
require_once('includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/environment.php');


//实例化操作系统与浏览器信息
$obj = new QNZ\Utils\OS_BROWSER();

use Models\Advertisement;
use Models\Exhibition;
use Models\Page;
use Models\Job;
use Models\Product;
use Models\Team;
use Models\News;
use Models\ServiceItem;
use Models\Link;
use Models\Event;
use Models\Paper;
use Models\Research;
use Models\Lab;

$adsCount = Advertisement::count();
$pageCount = Page::count();
$exhCount = Exhibition::count();
$jobCount = Job::count();
$productCount = Product::count();
$teamCount = Team::count();
$newsCount = News::count();
$serviceCount = ServiceItem::count();
$linkCount = Link::count();
$eventCount = Event::count();
$paperCount = Paper::count();
$labCount = Lab::count();
$researchCount = Research::count();


?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "后台管理_".$site_info["sitename"];?>
    </title>
    <?php require_once('includes/meta.php') ?>
   
</head>

<body>
    <div class="wrapper" id="wrapper">
        <!-- nav start -->
        <?php require_once('includes/nav.php'); ?>
        <!-- /nav end -->

        <section class="rightcol" id="rightcol">
            <?php require_once('includes/header.php'); ?>

            <div class="main-content">     
                <div class="breadcrumb-container">
                    <div class="row">
                        <div class="col-md">
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">控制面板</a></li>
                              
                            </ol>
                            </nav>
                        </div>
                        <div class="col-md-auto">
                            <time id="sitetime"></time>
                        </div>
                    </div>
                </div>    
                <div class="page page-home"> 
                    <div class="row mb-4">
                 
                        <div class="col">
                            <a href="/bbi-admin/views/articles/index.php?did=1" class="box">
                            <h3 class="title"><?php echo $newsCount;?> <small>篇</small></h3>
                            <p>新闻资讯</p><i class="iconfont icon-newspaper"></i>
                            </a>
                        </div>

                        <div class="col">
                            <a href="/bbi-admin/views/pages/index.php" class="box b2">
                            <h3 class="title"><?php echo $pageCount;?> <small>个</small></h3>
                            <p>页面</p><i class="iconfont icon-file-text"></i>
                            </a>
                        </div>
                        <div class="col">
                        <a href="/bbi-admin/views/products/index.php" class="box b3">
                            <h3 class="title"><?php echo $productCount;?> <small>个</small></h3>
                            <p>产品展示</p><i class="iconfont icon-windows"></i>
                            </a>
                        </div>
                        <div class="col">
                            <a href="/bbi-admin/views/carousels/index.php" class="box b4">
                            <h3 class="title"><?php echo $adsCount;?> <small>个</small></h3>
                            <p>广告位</p><i class="iconfont icon-image"></i>
                            </a>
                        </div>
                        <div class="w-100"></div>
                        <div class="col">                           
                            <a href="/bbi-admin/views/articles/index.php?did=2"  class="box b2">                             
                                <h3 class="title">
                                <?php echo $serviceCount;?> <small>pcs</small>
                                </h3>
                                <p>服务项目</p><i class="iconfont icon-file-copy"></i>                                   
                            </a>
                        </div>
                  

                        <div class="col">
                          
                            <a href="/bbi-admin/views/jobs/index.php" class="box b4">
                                <h3 class="title">                                       
                                    <?php echo $jobCount;?> <small>pcs</small>
                                </h3>
                                <p>招聘岗位</p><i class="iconfont icon-file-copy"></i>                                
                            </a>
                        
                        </div>

                        <div class="col">
                            <a href="/bbi-admin/views/events/index.php" class="box b3">
                            <h3 class="title"><?php echo $eventCount;?> <small>pcs</small></h3>
                            <p>会议预告</p><i class="iconfont icon-windows"></i>
                            </a>
                        </div>

<!--
                       <div class="col">
                            <a href="/bbi-admin/views/exhitions/index.php" class="box b3">
                                <h3 class="title">                                       
                                    <?php echo $exhCount; ?> <small>pcs</small>
                                </h3>
                                <p>展会信息</p><i class="iconfont icon-deploymentunit"></i>                                
                            </a>                            
                        </div> 
-->
                       
                        <div class="col">
                            <a href="/bbi-admin/views/teams/index.php" class="box b1">
                                <h3 class="title">                                       
                                    <?php echo $teamCount; ?> <small>pcs</small>
                                </h3>
                                <p>团队人员</p><i class="iconfont icon-team"></i>                                
                            </a>                            
                        </div> 

                     

                        <div class="w-100"></div>
                      
                        <div class="col">
                            <a href="/bbi-admin/views/pages/index.php" class="box b2">
                            <h3 class="title"><?php echo $paperCount;?> <small>个</small></h3>
                            <p>论文</p><i class="iconfont icon-file-text"></i>
                            </a>
                        </div>
                        <div class="col">
                        <a href="/bbi-admin/views/products/index.php" class="box b3">
                            <h3 class="title"><?php echo $labCount;?> <small>个</small></h3>
                            <p>实验室</p><i class="iconfont icon-experiment"></i>
                            </a>
                        </div>
                        <div class="col">
                            <a href="/bbi-admin/views/carousels/index.php" class="box b4">
                            <h3 class="title"><?php echo $researchCount;?> <small>个</small></h3>
                            <p>研究中心</p><i class="iconfont icon-bank"></i>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="/bbi-admin/views/links/index.php" class="box b3">
                                <h3 class="title">                                       
                                    <?php echo $linkCount; ?> <small>pcs</small>
                                </h3>
                                <p>链接</p><i class="iconfont icon-link"></i>                                
                            </a>   
                        </div>
                    
                    </div>


                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <h5 class="card-header">
                                    <?php echo lang('General Information'); ?>
                                </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">网站名称：
                                        <?php echo $site_info["sitename"] ?>
                                    </li>
                                    <li class="list-group-item">地址：
                                        <?php echo $site_info["address"] ?>
                                    </li>
                                    <li class="list-group-item">电话：
                                        <?php echo $site_info["phone"] ?>
                                    </li>
                                    <li class="list-group-item">邮箱：
                                        <?php echo $site_info["email"] ?>
                                    </li>
                                    <li class="list-group-item">备案号：
                                        <?php echo $site_info["webnumber"] ?>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-4">
                            <div class="card">
                                <h5 class="card-header">
                                    <?php echo lang('System Environments'); ?>
                                </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">操作系统：
                                        <?php echo $obj->showInfo('os'); ?>
                                    </li>

                                    <li class="list-group-item">浏览器：
                                        <?php echo $obj->showInfo('browser').' '.$obj->showInfo('version'); ?>
                                    </li>
                                    <li class="list-group-item">IP：
                                        <?php echo $_SERVER["REMOTE_ADDR"]; ?>
                                    </li>
                                    <li class="list-group-item">运行环境：
                                        <?php echo $_SERVER["SERVER_SOFTWARE"]; ?>
                                    </li>
                                    <li class="list-group-item">PHP版本号：
                                        <?php echo phpversion(); ?>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-4">
                            <div class="card">
                                <h5 class="card-header">
                                    <?php echo lang('System Information'); ?>
                                </h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">系统名称：
                                        <?php echo $config["application"]["name"] ?>
                                    </li>
                                    <li class="list-group-item">开发者：
                                        <?php echo $config["application"]["developer"] ?>
                                    </li>
                                    <li class="list-group-item">邮箱：
                                        <?php echo $config["application"]["email"] ?>
                                    </li>
                                    <li class="list-group-item">官网：
                                        <?php echo $config["application"]["homepage"] ?>
                                    </li>
                                    <li class="list-group-item">版本号：
                                        <?php echo $config["application"]["version"] ?>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <?php require_once('includes/footer.php'); ?>

        </section>
    </div>
    <?php require_once('includes/scripts.php'); ?>

    <script type="text/javascript">
        
        $(document).ready(function () {
            //当前菜单
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');
            $(".mainmenu>li:nth-of-type(1) a").addClass("active");
            
        });
    </script>
</body>

</html>