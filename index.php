<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/carousel.php");
require_once("data/article.php");

$carouselClass = new Carousel();
$carousels = $carouselClass->fetch_all();

$articleClass = new Article();
$knowledges = $articleClass->lasterKnowledge();

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo SITENAME; ?></title> 
    <link href="plugins/bxslider/jquery.bxslider.min.css" rel="stylesheet">
    <?php require_once('includes/meta.php') ?>
    <meta name=keywords content="">
    <meta name=description content="">

</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="page-home">       
        <!-- slider start -->
        <div class="slider">           
             <?php   foreach($carousels as $carousel){ ?>
                <div><a href="<?php echo $carousel['link'];?>" title="<?php echo $carousel['title'];?>" target="_blank">
                <img src="<?php echo $carousel['image_url'];?>" alt="<?php echo $carousel['title'];?>">
                </a></div>
             <?php } ?>          
        </div>
        <!-- slider end -->

        <div class="container s1">
            <div class="section-title">
                <h2>CLINICAL SOLUTION</h2>
                <h3>临床解决方案</h3>
            </div>
            <div class="content">
                <p>我们决心成为引领行业质量标准的CRO公司，并时刻谨记以关爱人类健康为宗旨</p>
                <p>中、美同步临床开发能力，国内最高水准的服务团队，这就是选择南京希麦迪医药科技有限公司（希麦迪）的原因。</p>
            </div>
            <div class="cases row">
                <div class="col-sm-4">
                    <div class="pic">
                        <img src="img/temp/p1.jpg" alt="生物等效性试验">
                    </div>
                    <div class="des">
                        <div class="icon"><i class="iconfont icon-icon-shengwudengxiaoxingshiyan"></i></div>
                        <h3>生物等效性试验</h3>
                        <p>拥有3家共建的 I期临床试验中心，高标准满足ICH-GCP临床试验要求</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pic">
                        <img src="img/temp/p2.jpg" alt="新药早期临床开发">
                    </div>
                    <div class="des">
                        <div class="icon"><i class="iconfont icon-icon-xinyaozaoqilinchuangkaifa"></i></div>
                        <h3>新药早期临床开发</h3>
                        <p>拥有3家共建的 I期临床试验中心，高标准满足ICH-GCP临床试验要求</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="pic">
                        <img src="img/temp/p3.jpg" alt="药物临床开发策略">
                    </div>
                    <div class="des">
                        <div class="icon"><i class="iconfont icon-icon-yaowulinchuangkaifacelve"></i></div>
                        <h3>药物临床开发策略</h3>
                        <p>拥有3家共建的 I期临床试验中心，高标准满足ICH-GCP临床试验要求</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="s2">
            <div class="container">
                <div class="section-title">
                    <h2>SERVICES AVAILABLE</h2>
                    <h3>服务项目</h3>
                </div>
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-icon-tongjifenxiheshujuguanli"></i></div>
                            <p>统计分析和数据管理</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-icon-faguizhuce"></i></div>
                            <p>法规注册</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-icon-shengwuyangbenfenxi"></i></div>
                            <p>生物样本分析</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-icon-linchuangjianchahexiangmuguanli"></i></div>
                            <p>临床监查和项目管理</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-icon-yixueshiwu"></i></div>
                            <p>医学事务</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-icon-yaowujingjie"></i></div>
                            <p>药物警戒</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container s3">
            <div class="section-title">
                <h2>NEWS CENTER</h2>
                <h3>最新动态</h3>
            </div>
            <nav class="newnav">
                <ul>
                    <li><a href="#" class="active">新闻报道</a></li>
                    <li><a href="meeting.html">会议信息发布</a></li>
                    <li><a href="media.html">媒体关注</a></li>
                </ul>
            </nav>
            <div class="row">
            <?php   foreach($knowledges as $klg){ ?>
                <div class="col-sm-6 col-lg-4">
                    <a href="article/detail-<?php echo $klg['id'];?>.html" class="item">
                        <h3><?php echo $klg['title'];?></h3>
                        <p class="note">TIME/<?php echo date('Y-m-d',$klg['pubdate']) ;?></p>
                        <div class="box">
                            <div class="pic">
                                <img src="<?php echo $klg['thumbnail'];?>" alt="">
                            </div>
                            <div class="des">
                                <p><?php echo $klg['summary'];?></p>
                                <div class="more">
                                    MORE
                                </div>
                            </div>
                        </div>
                </a></div>

      
<?php } ?>

            </div>
        </div>
    </div>



<?php require_once('includes/footer.php') ?>


<?php require_once('includes/scripts.php') ?>
<script src="plugins/bxslider/jquery.bxslider.min.js"></script>
<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(1) a").addClass("active");
           $(".mainav li:nth-of-type(1) a").addClass("active");
            $('.slider').bxSlider({
                auto: true,
                controls: false
            });
        });
    </script>
</body>
</html>
