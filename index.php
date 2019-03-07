<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/carousel.php");
require_once("data/article.php");
require_once("data/meeting.php");
require_once("data/topics.php");

$topicsClass = new Topics();
$topicses = $topicsClass->laster_topics();

$meetingClass = new Meeting();
$meetings = $meetingClass->laster_meetings();

$carouselClass = new Carousel();
$carousels = $carouselClass->fetch_all();

$articleClass = new Article();
$knowledges = $articleClass->laster_articles();

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
                <h3>服务平台</h3>
            </div>
            <div class="content">
                <p>我们决心成为引领行业质量标准的CRO公司，并时刻谨记以关爱人类健康为宗旨<br/>
               中、美同步临床开发能力，国内最高水准的服务团队，这就是选择南京希麦迪医药科技有限公司（希麦迪）的原因。</p>
            </div>
            <div class="cases row">
                <div class="col-md-6 col-lg-3">
                  
                    <a class="des" href="/laws">
                        <div class="icon"><i class="iconfont icon-faguizhuce"></i></div>
                        <h3>法规注册</h3>
                        <p>希麦迪法规注册团队由超过18年经验的业内专家领衔...<i>了解更多</i></p>
             </a>
                </div>
                <div class="col-md-6 col-lg-3">
                  
                    <a class="des">
                        <div class="icon"><i class="iconfont icon-yixueshiwu"></i></div>
                        <h3>医学事务</h3>
                      
                        <p>希麦迪医学事务部依托医学专家和撰写人员极为丰富...<i>了解更多</i></p>
             </a>
                </div>
                <div class="col-md-6 col-lg-3">
                  
                    <a class="des">
                        <div class="icon"><i class="iconfont icon-projects"></i></div>
                        <h3>临床监查和项目管理</h3>
                        <p>拥希麦迪的临床操作部门，人员规模近50，并持续高速...<i>了解更多</i></p>
             </a>
                </div>
                <div class="col-md-6 col-lg-3">
                  
                  <a class="des">
                      <div class="icon"><i class="iconfont icon-test"></i></div>
                      <h3>医疗器械临床试验</h3>
                        <p>希麦迪的数据管理和统计部门，从质量标准、中美...<i>了解更多</i></p>
             </a>
              </div>
              <div class="col-md-6 col-lg-3">
                  
                  <a class="des">
                      <div class="icon"><i class="iconfont icon-chart"></i></div>
                      <h3>数据管理和统计分析</h3>
                      <p>希麦迪的数据管理和统计部门，从质量标准、中美...<i>了解更多</i></p>
             </a>
              </div>
              <div class="col-md-6 col-lg-3">
                
                  <a class="des">
                      <div class="icon"><i class="iconfont icon-yangben"></i></div>
                      <h3>生物样本分析</h3>                    
                      <p>希麦迪投入大量资金，在南京建立了设备先进、管理标准...<i>了解更多</i></p>
             </a>
              </div>
              <div class="col-md-6 col-lg-3">
                
                  <a class="des">
                      <div class="icon"><i class="iconfont icon-jingjie"></i></div>
                      <h3>药物警戒</h3>
                      <p>希希麦迪团队提供基于先进技术的药物警戒解决方案...<i>了解更多</i></p>
             </a>
              </div>
              <div class="col-md-6 col-lg-3">
                
                <a class="des">
                    <div class="icon"><i class="iconfont icon-peixun"></i></div>
                    <h3>专业培训</h3>
                      <p>希麦希麦迪专家团队均为业内顶级的专家，从临床前研...<i>了解更多</i></p>
             </a>
            </div>
            </div>
        </div>
        <div class="s2">
            <div class="container">
                <div class="section-title">               
                    <h3>解决方案</h3>
                </div>
                <div class="row">
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-icon-yaowulinchuangkaifacelve"></i></div>
                            <p>新药临床开发策略</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-icon-zhongmeishuangbao"></i></div>
                            <p>中美双报</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-icon-xinyaozaoqilinchuangkaifa"></i></div>
                            <p>新药早期临床研究</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-anchuang"></i></div>
                            <p>概念验证及关键性临床研究
</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-icon-yiliaoqixie"></i></div>
                            <p>医疗器械</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-2">
                        <div class="item">
                            <div class="icon"><i class="iconfont icon-icon-shengwudengxiaoxingshiyan"></i></div>
                            <p>生物等效性试验</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container s3">
            <div class="section-title">           
                <h3>最新动态</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h3 class="setitle">新闻报道</h3>
                    <div class="pic">
                        <img src="img/n_001.jpg" alt="新闻报道" />
                    </div>
                    <div class="nlist">
                    <?php foreach($knowledges as $klg){ ?>
            
                    <a href="news/detail-<?php echo $klg['id'];?>" class="item">
                        <h4><?php echo $klg['title'];?></h4>
                        <p><?php echo mb_substr($klg['summary'],0,38,'utf-8')."……";?></p>           
                    </a>      
                    <?php } ?>
                    <a href="/news" class="more">MORE &gt;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="setitle">会议信息发布</h3>
                    <div class="pic">
                        <img src="img/n_002.jpg" alt="会议信息发布" />
                    </div>
                    <div class="nlist">
                    <?php   foreach($meetings as $klg){ ?>            
                        <a href="news/detail-<?php echo $klg['id'];?>" class="item">
                            <h4><?php echo $klg['title'];?></h4>
                            <p><?php echo mb_substr($klg['summary'],0,38,'utf-8')."……";?></p>           
                        </a>      
                    <?php } ?>
                    <a href="/meeting" class="more">MORE &gt;</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="setitle">媒体关注</h3>
                    <div class="pic">
                        <img src="img/n_003.jpg" alt="媒体关注" />
                    </div>
                    <div class="nlist">
                    <?php   foreach($topicses as $klg){ ?>
            
                    <a href="news/detail-<?php echo $klg['id'];?>" class="item">
                        <h4><?php echo $klg['title'];?></h4>
                    
                    </a>      
                    <?php } ?>
                    <a href="/media" class="more">MORE &gt;</a>
                    </div>
                </div>
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
