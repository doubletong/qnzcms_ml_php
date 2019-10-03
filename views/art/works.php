<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("about");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo  "作品集培训-美术专业-"  . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link rel="stylesheet" href="/assets/js/vendor/swiper/package/css/swiper.min.css">
</head>

<body>
    <?php require_once('../../includes/leftcol.php') ?>

    <?php require_once('includes/header-art.php') ?>

       <!-- <?php //  echo $data["content"]; ?> -->
    <div class="page page-art page-art-works">       
        <section class="s1 container"> 
           <div class="row">
               <div class="col">
                   <a href="/art/course">
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
               <a href="/art/works" class="active">
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
                <a href="/art/course">基础课程</a>
                <a href="/art/works" class="active">作品集核心课程</a>
                <a href="/art/course#vip">VIP直录课程</a>
                <a href="/art/course#follow">跟踪辅导</a>
                <a href="/art/course#service">增值服务</a>
                <a href="/art/course#active">创意活动课程</a>          
            </div>
            <div class="content">
                <div class="title-small">
                    Programme A <span>（适合非应届学生）</span>
                </div>

                <div class="tab001">
                    <div class="tab-header">
                        <a href="javascript:void(0);" data-id="tab-01" class="active">基础能力</a>
                        <a href="javascript:void(0);" data-id="tab-02">综合能力</a>
                        <a href="javascript:void(0);" data-id="tab-03">专业进阶</a>
                        <a href="javascript:void(0);" data-id="tab-04">专项课题</a>
                    </div>
                    <div class="tab-body">
                        <div class="tab-content">
                            <div class="row align-items-center">
                            <div class="col-md">
                                <div id="tab-01" class="subcontent active">
                                    <div class="list01">
                                        <div class="row  align-items-center">
                                            <div class="col-md-auto">
                                                <label class="title01">Upercent国际艺术基础课程</label>                                        
                                            </div>
                                            <div class="col-md">
                                                全方位提升绘画基础能力，通过训练眼、脑、手进行观察、思维、表达的练习
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list01">
                                        <div class="row align-items-center">
                                            <div class="col-md-auto">
                                                <label class="title01">美学分析课程</label>                                        
                                            </div>
                                            <div class="col-md">
                                            通过梳理艺术设计风格流派，提升艺术鉴赏与分析能力、拓宽设计视野与思路，为设计注入文化内涵
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list01">
                                        <div class="row  align-items-center">
                                            <div class="col-md-auto">
                                                <label class="title01">创意思维课程</label>                                        
                                            </div>
                                            <div class="col-md">
                                            拓展思维的广度与深度，激发艺术创造力
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list01">
                                        <div class="row align-items-center">
                                            <div class="col-md-auto">
                                                <label class="title01">调研分析能力课程</label>                                        
                                            </div>
                                            <div class="col-md">
                                            训练一手调研能力，强化分析归类逻辑，多方位推导分析
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list01">
                                        <div class="row align-items-center">
                                            <div class="col-md-auto">
                                                <label class="title01">软件技法基础课程</label>                                        
                                            </div>
                                            <div class="col-md">
                                            了解软件基本表现技法，为后期深入表现作品集做充分准备
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tab-02" class="subcontent">
                                    <div class="list01">
                                        <div class="row  align-items-center">
                                            <div class="col-md-auto">
                                                <label class="title01">Upercent国际艺术设计课题训练Ⅰ</label>                                        
                                            </div>
                                            <div class="col-md">
                                            国际艺术设计学院的最新优秀课题集训，提升思维、调研、手绘、想法呈现等综合能力,对作品进行准确、风格化表达
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list01">
                                        <div class="row align-items-center">
                                            <div class="col-md-auto">
                                                <label class="title01">Upercent国际艺术设计课题训练Ⅱ</label>                                        
                                            </div>
                                            <div class="col-md">
                                            国际艺术设计学院的最新优秀课题集训，提升思维、调研、手绘、想法呈现等综合能力,对作品进行准确、风格化表达
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list01">
                                        <div class="row  align-items-center">
                                            <div class="col-md-auto">
                                                <label class="title01">平面设计基础课程</label>                                        
                                            </div>
                                            <div class="col-md">
                                            强势课程,极速提升基础的设计能力,助力作品集的推进
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list01">
                                        <div class="row align-items-center">
                                            <div class="col-md-auto">
                                                <label class="title01">2 D + 3 D 综合材料课程</label>                                        
                                            </div>
                                            <div class="col-md">
                                            通过综合材料完成思维呈现,提升动手能力与空间思维能力
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div id="tab-03" class="subcontent">
                                    <p class="p1">根据学员的全方位的入学能力测试结果，按不同阶段,定制科学的专业能力培养计划增加美术设计院校特殊课题指导</p>
                                </div>
                                <div id="tab-04" class="subcontent">
                                <p class="p1">根据学员的全方位的入学能力测试结果及Upercent的课程学习情况，定制具备国际视野的个性化专业课题</p>
                                <p class="p1">增加作品集进行升级优化+面试技巧的辅导</p>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="pic">
                                    <img src="/assets/img/art_07.jpg" alt="">
                                </div>
                                <div class="pic">
                                    <img src="/assets/img/art_08.jpg" alt="">
                                </div>
                            </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div> 

            <div class="content">
                <div class="title-small">
                    Programme B <span>（适合应届学生）</span>
                </div>
                <div class="tab002">
                    <div class="row no-gutters">
                        <div class="col-md-auto">
                            <img src="/assets/img/art_09.jpg" alt="">
                        </div>
                        <div class="col-md">
                            <div class="tab-header2">
                                <a href="javascript:void(0);" data-id="tab2-1" class="active">
                                全方位能力强化
                                </a>
                                <a href="javascript:void(0);" data-id="tab2-2">
                                专项课题强化
                                </a>
                                <a href="javascript:void(0);" data-id="tab2-3">
                                专项课题强化
                                </a>
                            </div>
                            <div id="tab2-1" class="tab-content2 active">
                                <p>根据学员的全方位的入学能力测试结果， 定制个性化的专业课程。强化思维逻辑、调研分析、动手实践、风格表达、逆向思考等各方面的艺术设计能力，打造个人强项</p>
                            </div>
                            <div id="tab2-2" class="tab-content2">
                                <p>根据学员的个人条件与特点，由教研团队研究定制具备国际视野的个性化专业课题，提高申请院校的成功率，并全力争取奖学金</p>
                            </div>
                            <div id="tab2-3" class="tab-content2">
                                <p>由教研导师团队多对一辅导，将作品集进行全而细致的査缺补漏、作品细节润色升级、梳理思路逻辑结构、优化作品集排版，以及面试技巧的辑导，助力院校直达</p>
                                <p>增加Upercent艺术设计学院线上辅导</p>
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

      
          

        $(document).ready(function() {

            $(".tab-header a").click(function(e){
                e.preventDefault();
                var id = $(this).attr("data-id");

                $(".subcontent.active").removeClass("active");
                $("#"+id).addClass("active");

                $(this).addClass("active").siblings().removeClass("active");

            })
            
            $(".tab-header2 a").click(function(e){
                e.preventDefault();
                var id = $(this).attr("data-id");

                $(".tab-content2.active").removeClass("active");
                $("#"+id).addClass("active");

                $(this).addClass("active").siblings().removeClass("active");

            })
        });
    </script>
</body>

</html>