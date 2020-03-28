<?php
require_once('includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Utils/environment.php');
require_once('data/link.php');
require_once('data/product.php');
require_once('data/article.php');
require_once('data/topics.php');
require_once('data/team.php');
require_once('data/chronicle.php');

//实例化操作系统与浏览器信息
$obj = new QNZ\Utils\OS_BROWSER();

use Models\Advertisement;
use Models\Exhibition;
use Models\Page;
use Models\Job;

$adsCount = Advertisement::count();
$pageCount = Page::count();
$exhCount = Exhibition::count();
$jobCount = Job::count();

 $linkClass = new TZGCMS\Admin\LinkRepository();
$articleClass = new TZGCMS\Admin\Article();
$chronicleClass = new TZGCMS\Admin\Chronicle();
 $topicsClass = new Topics();
 $productClass = new TZGCMS\Admin\Product();
$teamClass = new TZGCMS\Admin\Team();

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
                                <li class="breadcrumb-item"><a href="#">Library</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data</li>
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
                            <h3 class="title"><?php echo $articleClass->get_articles_count_v1(1,null,null);?> <small>篇</small></h3>
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
                            <h3 class="title"><?php echo $productClass->product_count();?> <small>个</small></h3>
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
                                <?php echo $articleClass->get_articles_count_v1(2,null,null);?> <small>pcs</small>
                                </h3>
                                <p>薪酬福利</p><i class="iconfont icon-file-copy"></i>                                   
                            </a>
                        </div>
                        <div class="col">
                          
                            <a href="/bbi-admin/views/chronicles/index.php"  class="box">
                                <h3 class="title">                                       
                                    <?php echo $chronicleClass->get_chronicles_count(null,null);?> <small>pcs</small>
                                </h3>
                                <p>发展历程</p><i class="iconfont icon-file-copy"></i>                            
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
                            <a href="/bbi-admin/views/exhitions/index.php" class="box b3">
                                <h3 class="title">                                       
                                    <?php echo $exhCount; ?> <small>pcs</small>
                                </h3>
                                <p>展会信息</p><i class="iconfont icon-deploymentunit"></i>                                
                            </a>                            
                        </div> 

                        <!-- <div class="col">
                            <div class="box">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="icon text-center"><i class="iconfont icon-camera"></i></div>
                                    </div>
                                    <div class="col">
                                        <small>媒体关注</small>
                                        <div class="num"><?php echo $topicsClass->topics_count();?> <span>pcs</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>  -->

                        <!-- <div class="col">
                            <div class="box">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="icon text-center"><i class="iconfont icon-team"></i></div>
                                    </div>
                                    <div class="col">
                                        <small>团队人员</small>
                                        <div class="num"><?php echo $teamClass->team_count();?> <span>pcs</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>  -->

                        <div class="w-100"></div>
                      
                      
                        <div class="col-3">
                            <a href="/bbi-admin/views/links/index.php" class="box b3">
                                <h3 class="title">                                       
                                    <?php echo $linkClass->link_count(); ?> <small>pcs</small>
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
            $(".mainmenu>li:nth-of-type(1)").addClass("nav-open");
            
        });
    </script>
</body>

</html>