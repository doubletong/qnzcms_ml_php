<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("about");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo  "专业介绍-美术专业-"  . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link rel="stylesheet" href="/assets/js/vendor/swiper/package/css/swiper.min.css">
</head>

<body>
    <?php require_once('../../includes/leftcol.php') ?>

    <?php require_once('includes/header-art.php') ?>

       <!-- <?php //  echo $data["content"]; ?> -->
    <div class="page page-art page-art-course">       
        <section class="s1 container"> 
           <div class="row">
               <div class="col">
                   <a href="/art/course" class="active">
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
               <a href="/art/offers">
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
                <h3>课程介绍</h3>
            </div>
            
            <div class="navs navs-noicon">               
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                    <div class="swiper-slide">基础课程</div>
                    <div class="swiper-slide">作品集核心课程</div>
                    <div class="swiper-slide">VIP直录课程</div>
                    <div class="swiper-slide">跟踪辅导</div>
                    <div class="swiper-slide">增值服务</div>
                    <div class="swiper-slide">创意活动课程</div>
         
                    </div>
                </div>
            </div>
                

            <div class="swiper-container gallery-top">
                <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="course">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-auto">
                            <div class="pic">
                                <img src="/assets/img/art_01_b.jpg" alt="基础课程">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="txt">
                                <h3>零基础艺术课程</h3>
                                <p><label>适用人群：</label>零基础的艺术设计爱好者</p>
                                <p><label>课程介绍：</label>我们将为学员制定一套基础课程计划，夯实基础，重塑艺术与设计的思维方式，培养学员对艺术设计的兴趣</p>                           
                            </div>                    
                        </div>
                    </div>
                    </div>
                </div>
                <div class="swiper-slide" >
                    <div class="course">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-auto">
                            <div class="pic">
                                <img src="/assets/img/art_02_b.jpg" alt="作品集核心课程">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="txt">
                                <h3>作品集核心课程</h3>
                                <p><label>适用人群：</label>申请艺术设计专业本科或研究生的学员</p>
                                <p><label>课程介绍：</label>作品集核心课程包括2个不同的课程计划，为学员量身定制打造高质量的艺术作品集</p>                           
                            </div>                    
                        </div>
                    </div>
                    </div>

                </div>
                <div class="swiper-slide">
                <div class="course">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-auto">
                            <div class="pic">
                                <img src="/assets/img/art_03_b.jpg" alt="VIP直录课程">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="txt">
                                <h3>VIP直录课程</h3>
                                <p><label>适用人群：</label>具有升学需求并有一定基础的学员</p>
                                <p><label>课程介绍：</label>天艺·优普森将会有针对性的培养学员的思维能力，引导学员形成自己的个人风格，并完成一本不少于四个专业项目的作品集。本课程不限课时，直达你的梦想学院</p>                           
                            </div>                    
                        </div>
                    </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="course">
                        <div class="row no-gutters align-items-center">
                            <div class="col-md-auto">
                                <div class="pic">
                                    <img src="/assets/img/art_04_b.jpg" alt="跟踪辅导">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="txt">
                                    <h3>跟踪辅导</h3>
                                    <p><label>适用人群：</label>申请艺术设计专业本科或研究生的学员</p>
                                    <p><label>课程介绍：</label>我们将为学员制定一套基础课程计划，夯实基础，重塑艺术与设计的思维方式，培养学员对艺术设计的兴趣</p>                           
                                </div>                    
                            </div>
                        </div>
                        </div>

                </div>
                <div class="swiper-slide">
                <div class="course">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-auto">
                            <div class="pic">
                                <img src="/assets/img/art_05_b.jpg" alt="增值服务">
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="txt">
                                <h3>增值服务</h3>
                                <p><label>适用人群：</label>不限</p>
                                <p><label>课程介绍：</label>针对有不同增值服务需求的学员，天艺·优普森将提供文书申请、独立个展策划、国际赛事辅导、奖学金申请、社会实践等方面的增值服务项目</p>                           
                            </div>                    
                        </div>
                    </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="course">
                        <div class="row no-gutters align-items-center">
                            <div class="col-md-auto">
                                <div class="pic">
                                    <img src="/assets/img/art_06_b.jpg" alt="创意活动课程">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="txt">
                                    <h3>创意活动课程</h3>
                                    <p><label>适用人群：</label>不限</p>
                                    <p><label>课程介绍：</label>不定期举办海内外资深大师课、不同学科的创意workshop、名师工作坊、短期游学体验团、艺术夏/冬令营、学员艺术作品国内外群展/巡展、艺术活动等</p>                           
                                </div>                    
                            </div>
                        </div>
                        </div>
                </div>
          
  
                </div>
            
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