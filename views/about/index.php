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
</head>

<body>
    <?php require_once('../../includes/leftcol.php') ?>
    <div class="banner banner-about"  style="background-image:url('/assets/img/banners/about.jpg')">
        <div class="container title-page ">
            <h1>ABOUT UPERCENT</h1>
            <p>关于我们</p>
        </div>
    </div>
       <!-- <?php  echo $data["content"]; ?> -->
    <div class="page page-about">       
        <section class="s1 container"> 
            <div class="logo wow fadeInUp">
                <img src="/assets/img/logo_min.png" alt="天艺•优普森">
            </div>
           <div class="intro wow fadeInUp">
               <p >
                    <strong>天艺•优普森国际艺术学院</strong>（T-world Upercent），是深圳广电集团与TCL集团联合成立的，深圳地区唯一一家<strong>具有官方背景的艺术学院</strong>。学院是依托深圳广电集团10大电视频道、4大电台频率、TCL集团3000万智能电视所组成的融媒体播出平台，通过覆盖全国9亿以上家庭人群，充分发挥双方集团强大的内容制作、宣传播出、演艺经营、影视文娱教育投资产业链综合实力，所全力打造的国际青少年艺术教育高端平台。
               </p>
           </div>     
        </section>
        <section class="s2">
            <div class="container">
                <div class="title-section-v1 wow slideInUp">
                    <h2>CONTACT US</h2>
                    <h3>联系我们</h3>
                </div>
                <div class="contacts">
                    <div class="row">
                        <div class="col-md">
                            <div class="item wow fadeInUp">
                                <div class="icon">
                                    <i class="iconfont icon-marker"></i>                                 
                                </div>
                                <div class="t1">地址</div>
                                <p><?php echo $site_info['address']; ?></p>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="item wow fadeInUp"  data-wow-delay=".2s">
                                <div class="icon">
                                    <i class="iconfont icon-dianhua1"></i>
                                    
                                </div>
                                <div class="t1">联系电话</div>
                                    <p><?php echo $site_info['phone']; ?></p>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="item wow fadeInUp" data-wow-delay=".4s">
                                <div class="icon">
                                    <i class="iconfont icon-wechat"></i>
                                    
                                </div>
                                <div class="t1">微信</div>
                                    <p><?php echo $site_info['wechat']; ?></p>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="item wow fadeInUp" data-wow-delay=".6s">
                                <div class="icon">
                                    <i class="iconfont icon-email"></i>
                                   
                                </div>
                                <div class="t1">邮箱</div>
                                    <p><?php echo $site_info['email']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="s3 container">
            <div class="title-section-v1 wow slideInUp">
                <h2>JOIN US</h2>
                <h3>加入我们</h3>
            </div>
            <div class="join">
                <div class="row">
                    <div class="col-md">
                        <div class="txt-bg  wow slideInUp">
                            <div class="txt">
                                <p>浓厚的艺术氛围、轻松舒适的工作环境，年轻富有激情的团队…… 给你带来不一样的工作体验。</p>
                                <p>如对以下职位感兴趣，欢迎邮件联系 hr@upercent.net，请在求职邮件中注明应聘职位并附上个人简历。温暖的 U%大家庭等着你喔！</p>
                            </div>
                        </div>
                      
                    </div>
                    <div class="col-md">
                        <div class="job  wow slideInUp"   data-wow-delay=".2s">
                            <h3>艺术导师：</h3>
                            <dl>
                                <dt>岗位职责： </dt>
                                <dd>1.根据U%艺术教育课程体系教授艺术相关课程；</dd>
                                <dd>2.指导、帮助学生完成其专业方向的作品集；</dd>
                                <dd>3.帮助学生整理完成相关申请资料等。</dd>
                            </dl>
                            
                            <dl>
                                <dt>任职要求： </dt>
                                <dd>1.教育背景：海外留学艺术专业背景，MA为主，BA能力强者； </dd>
                                <dd>2.形象气质良好，有较强的亲和力和表达能力； </dd>
                                <dd>3.有相关教学经验优先。</dd>
                            </dl>
 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="s4  wow slideInUp" id="map_canvas">

        </section>
    </div>


    <?php require_once('../../includes/footer.php') ?>

    <?php require_once('../../includes/scripts.php') ?>
    <script src="http://api.map.baidu.com/api?v=2.0&ak=G7h0sKsr60IFU3OrHRmKTRzD"></script>
    <script>

         // 百度地图API功能
         var map = new BMap.Map("map_canvas");


        map.addControl(new BMap.NavigationControl());
        map.enableScrollWheelZoom(); //启用滚轮放大缩小，默认禁用
        map.enableContinuousZoom(); //启用地图惯性拖拽，默认禁用

        map.centerAndZoom(new BMap.Point(113.933831,22.579872), 12);
        var point = new BMap.Point(113.933831,22.579872);

        //var myIcon = new BMap.Icon("/Content/img/marker.png", new BMap.Size(132, 132));
        //var marker1 = new BMap.Marker(point, { icon: myIcon });  // 创建标注
        var marker1 = new BMap.Marker(point);

        map.addOverlay(marker1); // 将标注添加到地图中
        // marker1.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
        var sContent =
            "<h4 style='margin:0 0 5px 0;padding:0.2em 0'><?php echo $site_info['sitename']; ?></h4>" +
            "<p>地址：<?php echo $site_info['address']; ?><br/>" +
            "电话：<?php echo $site_info['phone']; ?></p>" +
            "</div>";


        //创建信息窗口
        //var infoWindow1 = new BMap.InfoWindow(sContent);
        //marker1.addEventListener("click", function () { this.openInfoWindow(infoWindow1); });
        //marker1.openInfoWindow(infoWindow1);

        $(document).ready(function() {
        
      
        });
    </script>
</body>

</html>