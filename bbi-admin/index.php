<?php
require_once('includes/common.php');
require_once('includes/environment.php');
require_once('data/link.php');
require_once('data/product.php');
require_once('data/article.php');
require_once('data/topics.php');
require_once('data/team.php');
require_once('data/chronicle.php');

//实例化操作系统与浏览器信息
$obj = new OS_BROWSER();

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
    <style>
        .box {
            background-color: #029DFF;
            margin-bottom: 1rem;
            color: #fff;
            border-radius: 6px;
        }
        .box a{
         
            color: #fff;
            text-decoration: none;
        }
        .box .iconfont {
            font-size: 2rem;
        }

        .box .icon {
            border-radius: 6px 0 0 6px;
            background-color: #0082F6;
            height:70px;
            padding:10px 12px;
        }

        .box small {
            display: block;
            padding-top: 10px;
        }

        .box .num {
            font-size: 1.5rem;
        }

        .box .num span {
            font-size: .875rem;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('includes/nav.php'); ?>
        <!-- /nav end -->

        <section class="rightcol">
            <?php require_once('includes/header.php'); ?>

            <div class="main-content">
                <div style="padding:2rem;">
                    <div class="row">
                        <!-- <div class="col">
                            <div class="box">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="icon text-center"><i class="iconfont icon-appstore"></i></div>
                                    </div>
                                    <div class="col-8">
                                        <small>产品</small>
                                        <div class="num"><?php echo $productClass->product_count();?> <span>pcs</span></div>
                                    </div>
                                </div>
                            </div>

                        </div> -->
                        <div class="col">
                            <div class="box">
                            <a href="/bbi-admin/views/articles/index.php?did=1">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="icon text-center"><i class="iconfont icon-file-copy"></i></div>
                                    </div>
                                    <div class="col">
                                        <small>新闻资讯</small>
                                        <div class="num"><?php echo $articleClass->get_articles_count_v1(1,null,null);?> <span>pcs</span></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box">
                                <a href="/bbi-admin/views/articles/index.php?did=2">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="icon text-center"><i class="iconfont icon-file-copy"></i></div>
                                    </div>
                                    <div class="col">
                                        <small>薪酬福利</small>
                                        <div class="num"><?php echo $articleClass->get_articles_count_v1(2,null,null);?> <span>pcs</span></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="col">
                            <div class="box">
                                <a href="/bbi-admin/views/chronicles/index.php">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="icon text-center"><i class="iconfont icon-file-copy"></i></div>
                                    </div>
                                    <div class="col">
                                        <small>发展历程</small>
                                        <div class="num"><?php echo $chronicleClass->get_chronicles_count(null,null);?> <span>pcs</span></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>

                        <div class="col">
                            <div class="box">
                                <a href="/bbi-admin/views/jobs/index.php">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="icon text-center"><i class="iconfont icon-file-copy"></i></div>
                                    </div>
                                    <div class="col">
                                        <small>招聘岗位</small>
                                        <div class="num"><?php echo $jobCount;?> <span>pcs</span></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                       <div class="col">
                            <div class="box">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="icon text-center"><i class="iconfont icon-deploymentunit"></i></div>
                                    </div>
                                    <div class="col">
                                        <small>展会信息</small>
                                        <div class="num"><?php echo $exhCount ;?> <span>pcs</span></div>
                                    </div>
                                </div>
                            </div>
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
                        <div class="col">
                            <div class="box">
                                <a href="/bbi-admin/views/pages/index.php">
                                <div class="row">

                                    <div class="col-auto">
                                        <div class="icon text-center"><i class="iconfont icon-file"></i></div>
                                    </div>
                                    <div class="col">
                                        <small>页面</small>
                                        <div class="num"><?php echo $pageCount;?> <span>pcs</span></div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                      
                        <div class="col">
                            <div class="box">
                            <a href="/bbi-admin/views/links/index.php">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="icon text-center"><i class="iconfont icon-link"></i></div>
                                    </div>
                                    <div class="col-8">
                                        <small>链接</small>
                                        <div class="num"><?php echo $linkClass->link_count();?> <span>pcs</span></div>
                                    </div>
                                </div>
                                </a>
                            </div>

                        </div>
                        <div class="col">
                            <div class="box">
                            <a href="/bbi-admin/views/carousels/index.php">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="icon text-center"><i class="iconfont icon-image"></i></div>
                                    </div>
                                    <div class="col">
                                        <small>轮播图</small>
                                        <div class="num"><?php echo $adsCount;?> <span>pcs</span></div>
                                    </div>
                                </div>
                                </a>
                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <h5 class="card-header">
                                    基本信息
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
                                    系统环境
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
                                    系统信息
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