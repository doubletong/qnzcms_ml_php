<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("about");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo $data["title"] . "-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link rel="stylesheet" href="/assets/js/vendor/swiper/package/css/swiper.min.css">
</head>

<body>
    <?php require_once('../../includes/leftcol.php') ?>

    <?php require_once('includes/header-art.php') ?>

       <!-- <?php //  echo $data["content"]; ?> -->
    <div class="page page-art">       
        <section class="s1 container"> 
           <div class="row">
               <div class="col">
                   <a href="/art/course" >
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
               <a href="/art/schools">
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
            <div class="title-section wow slideInUp">
                <h2>Course Service</h2>
                <h3>课程服务</h3>
            </div>
            
            <div class="navs  wow slideInUp">
                
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="link">
                            <div class="icon">
                                <i class="iconfont icon-copy"></i>
                            </div>
                            <p>基础课程</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link">
                            <div class="icon">
                                <i class="iconfont icon-rule"></i>
                            </div>
                            <p>作品集核心课程</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link">
                            <div class="icon">
                                <i class="iconfont icon-zhuan"></i>
                            </div>
                            <p>VIP直录课程</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                    <div class="link">
                            <div class="icon">
                                <i class="iconfont icon-course"></i>
                            </div>
                            <p>跟踪辅导</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link">
                            <div class="icon">
                                <i class="iconfont icon-light"></i>
                            </div>
                            <p>增值服务</p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="link">
                            <div class="icon">
                                <i class="iconfont icon-new"></i>
                            </div>
                            <p>创意活动课程</p>
                        </div>
                    </div>
                        
                    </div>
                </div>

            </div>
            <div class="swiper-container gallery-top wow fadeInUp">
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-md-auto">
                            <img src="/assets/img/art_01.jpg" alt="基础课程">
                        </div>
                        <div class="col-md">
                            <div class="txt">
                                <h3>零基础艺术课程</h3>
                                <p>我们将为学员制定一套基础课程计划，夯实基础，重塑艺术与设计的思维方式，培养学员对艺术设计的兴趣</p>
                                <p><label>适用人群</label> 零基础的艺术设计爱好者</p>
                                <a href="/art/course" class="more">课程详情</a>
                            </div>                    
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                <div class="row">
                        <div class="col-md-auto">
                            <img src="/assets/img/art_02.png" alt="作品集核心课程">
                        </div>
                        <div class="col-md">
                            <div class="txt">
                                <h3>作品集核心课程</h3>
                                <p>作品集核心课程包括2个不同的课程计划，为学员量身定制打造高质量的艺术作品集</p>
                                <p><label>适用人群</label> 申请艺术设计专业本科或研究生的学员</p>
                                <a href="/art/course-works" class="more">课程详情</a>
                            </div>                    
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                <div class="row">
                        <div class="col-md-auto">
                            <img src="/assets/img/art_03.png" alt="VIP直录课程">
                        </div>
                        <div class="col-md">
                            <div class="txt">
                                <h3>VIP直录课程</h3>
                                <p>天艺·优普森将会有针对性的培养学员的思维能力，引导学员形成自己的个人风格，并完成一本不少于四个专业项目的作品集。本课程不限课时，直达你的梦想学院</p>
                                <p><label>适用人群</label> 具有升学需求并有一定基础的学员</p>
                                <a href="/art/course-vip" class="more">课程详情</a>
                            </div>                    
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-md-auto">
                            <img src="/assets/img/art_04.png" alt="跟踪辅导">
                        </div>
                        <div class="col-md">
                            <div class="txt">
                                <h3>跟踪辅导</h3>
                                <p>升学前系统规划升学方案，升学后帮助学生快速适应新的学习环境，全面跟踪辅导作业，实时追踪学习效果，精准提升学习能力</p>
                                <p><label>适用人群</label> 申请中或申请成功的艺术设计专业本科或研究生学员</p>
                                <a href="/art/course-follow-up" class="more">课程详情</a>
                            </div>                    
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-md-auto">
                            <img src="/assets/img/art_05.png" alt="增值服务">
                        </div>
                        <div class="col-md">
                            <div class="txt">
                                <h3>增值服务</h3>
                                <p>针对有不同增值服务需求的学员，天艺·优普森将提供文书申请、独立个展策划、国际赛事辅导、奖学金申请、社会实践等方面的增值服务项目</p>
                                <p><label>适用人群</label> 不限</p>
                                <a href="/art/course-vas" class="more">课程详情</a>
                            </div>                    
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="row">
                        <div class="col-md-auto">
                            <img src="/assets/img/art_06.png" alt="创意活动课程">
                        </div>
                        <div class="col-md">
                            <div class="txt">
                                <h3>创意活动课程</h3>
                                <p>不定期举办海内外资深大师课、不同学科的创意workshop、名师工作坊、短期游学体验团、艺术夏/冬令营、学员艺术作品国内外群展/巡展、艺术活动等</p>
                                <p><label>适用人群</label> 不限</p>
                                <a href="/art/course-creative-activity" class="more">课程详情</a>

                            </div>                    
                        </div>
                    </div>
                </div>
          
  
                </div>
               
            </div>
  

        </section>
        <section class="s3 container">
            <div class="title-section wow slideInUp">
                <h2>Hot Majors</h2>
                <h3>热门专业</h3>
            </div>  

        </section>
         <section class="s4 container">
            <div class="title-section-v1 wow slideInUp">
                <h2>Institutions</h2>
                <h3>推荐院校</h3>
            </div>
            
        </section>
        <section class="s5 container">
            <div class="title-section-v1 wow slideInUp">
                <h2>Cuccessful Cases</h2>
                <h3>学员Offer</h3>
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