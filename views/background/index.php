<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("background");


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo $data["title"]."-".$site_info['sitename']; ?></title>    
    <?php require_once('../../includes/meta.php') ?>
    <link href="/assets/js/vendor/swiper/package/css/swiper.min.css" rel="stylesheet" />
</head>
<body>
<?php require_once('../../includes/leftcol.php') ?>
<div class="banner banner-background"  style="background-image:url('/assets/img/banners/background.jpg')">
    <div class="container title-page ">
        <h1>Official authority background Double Group escort</h1>
        <p>官方权威背景 双集团保驾护航</p>
    </div>
</div>
<!-- <?php echo $data["content"];?> -->
<div class="page page-background">
    <section class="s1 container">
        <div class="title-section wow slideInUp">
            <h2>GROUP INTRODUCTION</h2>
            <h3>集团介绍</h3>
        </div>
        <div class="intro">
           
              
                    <div class="txt wow slideInLeft">
                        <h3 class="title title-node">
                            TCL集团
                        </h3>
                        <p>
                            <strong>TCL集团</strong>，是立足广东，面向全球的智能产品制造及互联网应用服务企业集团。集团现有近10万名员工，在80多个国家和地区设有销售机构，业务遍及全球160多个国家和地区。集团年营收逾千亿，旗下拥有3000万台智能电视，通过影视文娱投资、内容制作、集成与分发，面向全球数以亿计的家庭用户，深耕电视多媒体内容运营。
                        </p>
                    </div>
                    <div class="pic wow slideInRight">
                        <img src="/assets/img/background_001.jpg" alt="TCL集团">
                    </div>
         
        </div>
        <div class="intro">
           
              
                    <div class="txt wow slideInLeft">
                        <h3 class="title title-node">
                        深圳广电集团
                        </h3>
                        <p>
                        <strong>深圳广电集团</strong>，由深圳电视台、深圳广播电台、深圳电影制片厂、深圳市广播电视传输中心等单位整合而成，旗下拥有10个电视频道、4套广播频率、20余家产业经营企业，业务范围涵盖广告、网络、影视内容、新媒体、文化投资和服务等多个领域。作为植根深圳的主流媒体，深圳广电集团秉持“特区声音、中华情怀、国际视野、创新卓越”的发展理念，牢牢占据粤港澳地区的文化媒体主流市场。深圳卫视目前已稳居全国省级卫视前八，实现全国覆盖人口已超过9亿。
                        </p>
                    </div>
                    <div class="pic wow slideInRight">
                        <img src="/assets/img/background_002.jpg" alt="深圳广电集团">
                    </div>
         
        </div>
    </section>
    <section class="s2 ">
        <div class="container">
        <div class="title-section wow slideInUp">
            <h2>SCHOOL INTRODUCTION</h2>
            <h3>学院介绍</h3>
        </div>
        <div class="intro">
           <div class="row">
               <div class="col-md-auto">
                   <div class="txt wow slideInLeft">                 
                       <p><strong>天艺•优普森国际艺术教育</strong>（T-world Upercent），是深圳广电集团与TCL集团联合成立的，深圳地区唯一一家具有官方背景的艺术学院。学院是依托深圳广电集团10大电视频道、4大电台频率、TCL集团3000万智能电视所组成的融媒体播出平台，通过覆盖全国9亿以上家庭人群，充分发挥双方集团强大的内容制作、宣传播出、演艺经营、影视文娱教育投资产业链综合实力，所全力打造的国际青少年艺术教育高端平台。</p>
                        <p><strong>天艺•优普森国际艺术教育</strong>拥有5800平独栋总部基地，顶级高端的硬件配套与浓厚的艺术学习氛围，教学团队拥有多年丰富的美术、音乐专业教研教学经验，以两方集团雄厚实力、专业性和权威性为背书，依托于强大的国内外高端师资力量及优质的国际院校教育资源，与国内国际知名艺术院校建立了广泛的深度合作，为学员们在艺术学习生涯中提供更多可能性，激发无限潜能。</p>
                    </div>
               </div>
               <div class="col-md">
                    <div class="pic wow slideInRight">
                        <img src="/assets/img/background_003.png" alt="学院介绍">
                    </div>
         
               </div>
           </div>             
            
        </div>
   
    </section>
    <section class="s3 container">
        <h3 class="title title-node wow slideInUp">
            教学环境
        </h3>
        <!-- Swiper -->
        <div class="swiper-container school-swiper wow slideInUp">
            <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="/assets/img/background_004.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/assets/img/background_004.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/assets/img/background_004.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/assets/img/background_004.jpg" alt=""></div>
            <div class="swiper-slide"><img src="/assets/img/background_004.jpg" alt=""></div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        
        </div>
    </section>
    <section class="s4">
        <div class="container">
            <div class="title-section wow slideInUp">
                <h2>TUTORS TEAM</h2>
                <h3>师资团队</h3>
            </div>
            <div class="intro wow slideInUp">
                <div class="row">
                    <div class="col-md">
                        <div class="txt">
                            <p>天艺• 优普森国际艺术教育的核心教研团队是由具有海外留学背景的国内顶级专业学府的资深教授，纯正的广电传媒艺术师资团队、以及各领域艺术教育专家组成。丰富的教研及教学经验为学员们提供更优质的学习体验，提升学习效率和质量。</p>
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <div class="pic">
                            <img src="/assets/img/background_005.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="txt1">
                            <p>在层层筛选及考核下组建了一支资深的海归艺术专业师资团队，熟悉各大院校对作品集的审核要求。从专业深度及广度把控作品整体制作水准，提高申请成功率，给学员们最大的师资保障。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="s5 container">
            <div class="title-section wow slideInUp">
                <h2>CAMPUS INTRODUCTION</h2>
                <h3>校区介绍</h3>
            </div>
             <!-- Swiper -->
             <div class="swiper-container gallery-thumbs wow slideInUp">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
          <div class="item">
              <div class="title">
            总部 南山校区
            </div>
          </div>
        </div>
      <div class="swiper-slide">
      <div class="item">
              <div class="title">福田校区 </div>
          </div></div>
      <div class="swiper-slide"> <div class="item">
              <div class="title">罗湖校区 </div>
          </div></div>
      <div class="swiper-slide"> <div class="item">
              <div class="title">龙岗校区 </div>
          </div></div>
      <div class="swiper-slide"> <div class="item">
              <div class="title">龙华校区 </div>
          </div></div>
    </div>
  </div>

  <div class="swiper-container gallery-top wow slideInUp">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="school">
            <div class="txt">
            <p>在广电大厦举行开学仪式，所有学员授予广电学员证，安排福田区学员进驻广电大厦上课。广电大厦配备有1800平演播大厅及800平多功能演播厅、VR虚拟演播大厅，在最纯正权威的编导、主持工作环境中进行体验式教学。除安排广电知名主持人和编导老师上课外，还将安排机房参观、节目录制、项目实习等一系列教学演练一体化的实践活动，彻底告别“纸上谈兵”式的填鸭式教学，将课堂知识真正转化为自身所得，从容应对各大名校的严苛面试。</p>
      
            </div>
        
          <div class="pic">
              <img src="/assets/img/background_006.png" alt="">
          </div>
        </div>
    </div>
      <div class="swiper-slide">
      <div class="school">
            <div class="txt">
            <p>在广电大厦举行开学仪式，所有学员授予广电学员证，安排福田区学员进驻广电大厦上课。广电大厦配备有1800平演播大厅及800平多功能演播厅、VR虚拟演播大厅，在最纯正权威的编导、主持工作环境中进行体验式教学。除安排广电知名主持人和编导老师上课外，还将安排机房参观、节目录制、项目实习等一系列教学演练一体化的实践活动，彻底告别“纸上谈兵”式的填鸭式教学，将课堂知识真正转化为自身所得，从容应对各大名校的严苛面试。</p>
      
            </div>
        
          <div class="pic">
              <img src="/assets/img/background_006.png" alt="">
          </div>
        </div>
      </div>
      <div class="swiper-slide">
      <div class="school">
            <div class="txt">
            <p>在广电大厦举行开学仪式，所有学员授予广电学员证，安排福田区学员进驻广电大厦上课。广电大厦配备有1800平演播大厅及800平多功能演播厅、VR虚拟演播大厅，在最纯正权威的编导、主持工作环境中进行体验式教学。除安排广电知名主持人和编导老师上课外，还将安排机房参观、节目录制、项目实习等一系列教学演练一体化的实践活动，彻底告别“纸上谈兵”式的填鸭式教学，将课堂知识真正转化为自身所得，从容应对各大名校的严苛面试。</p>
      
            </div>
        
          <div class="pic">
              <img src="/assets/img/background_006.png" alt="">
          </div>
        </div>
      </div>
      <div class="swiper-slide">
      <div class="school">
            <div class="txt">
            <p>在广电大厦举行开学仪式，所有学员授予广电学员证，安排福田区学员进驻广电大厦上课。广电大厦配备有1800平演播大厅及800平多功能演播厅、VR虚拟演播大厅，在最纯正权威的编导、主持工作环境中进行体验式教学。除安排广电知名主持人和编导老师上课外，还将安排机房参观、节目录制、项目实习等一系列教学演练一体化的实践活动，彻底告别“纸上谈兵”式的填鸭式教学，将课堂知识真正转化为自身所得，从容应对各大名校的严苛面试。</p>
      
            </div>
        
          <div class="pic">
              <img src="/assets/img/background_006.png" alt="">
          </div>
        </div>
      </div>
      <div class="swiper-slide">
      <div class="school">
            <div class="txt">
            <p>在广电大厦举行开学仪式，所有学员授予广电学员证，安排福田区学员进驻广电大厦上课。广电大厦配备有1800平演播大厅及800平多功能演播厅、VR虚拟演播大厅，在最纯正权威的编导、主持工作环境中进行体验式教学。除安排广电知名主持人和编导老师上课外，还将安排机房参观、节目录制、项目实习等一系列教学演练一体化的实践活动，彻底告别“纸上谈兵”式的填鸭式教学，将课堂知识真正转化为自身所得，从容应对各大名校的严苛面试。</p>
      
            </div>
        
          <div class="pic">
              <img src="/assets/img/background_006.png" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-white"></div>
    <div class="swiper-button-prev swiper-button-white"></div>
  </div>


    </section>
</div>


<?php require_once('../../includes/footer.php') ?>
<?php require_once('../../includes/scripts.php') ?>
<script src="/assets/js/vendor/swiper/package/js/swiper.min.js"></script>
<script>
     var swiper = new Swiper('.school-swiper', {
        autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination'
      }
   
    });


    var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 5,
      freeMode: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.gallery-top', {
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });
        $(document).ready(function() {
        
        });
    </script>
</body>
</html>