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
    <?php require_once('../../includes/header.php') ?>
    <div class="banner banner-about" style="background-image:url('/assets/img/banners/about.jpg')">

    </div>
    <!-- <?php // echo $data["content"]; ?> -->
    <div class="page page-about">
        <section class="container">
            <div class="row t1">
                <div class="col-md">
                    <div class="title title-section">
                        <h3>公司简介 <span>Company Profile</span></h3>
                        <p>专业的设备租赁服务平台，提供卓越的设备选择方案！</p>
                    </div>
                </div>
                <div class="col-md-auto align-self-end">
                    您的当前位置：<a href="/">主页</a> > <span class="current">公司简介</span>
                </div>
            </div>

            <main class="maincontent">
                <div class="row">
                    <div class="col-md-auto">
                        <aside class="navlist">
                            <a href="#">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <img src="/assets/img/icon_1.png" alt="" class="icon">
                                    </div>
                                    <div class="col">
                                        灯光音箱
                                    </div>
                                    <div class="col-auto">
                                        <span class="more">more</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <img src="/assets/img/icon_1.png" alt="" class="icon">
                                    </div>
                                    <div class="col">
                                        灯光音箱
                                    </div>
                                    <div class="col-auto">
                                        <span class="more">more</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <img src="/assets/img/icon_1.png" alt="" class="icon">
                                    </div>
                                    <div class="col">
                                        灯光音箱
                                    </div>
                                    <div class="col-auto">
                                        <span class="more">more</span>
                                    </div>
                                </div>
                            </a>
                        </aside>
                        <aside class="navlist">
                            <a href="#">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <img src="/assets/img/icon_1.png" alt="" class="icon">
                                    </div>
                                    <div class="col">
                                        灯光音箱
                                    </div>
                                    <div class="col-auto">
                                        <span class="more">more</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <img src="/assets/img/icon_1.png" alt="" class="icon">
                                    </div>
                                    <div class="col">
                                        灯光音箱
                                    </div>
                                    <div class="col-auto">
                                        <span class="more">more</span>
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">
                                        <img src="/assets/img/icon_1.png" alt="" class="icon">
                                    </div>
                                    <div class="col">
                                        灯光音箱
                                    </div>
                                    <div class="col-auto">
                                        <span class="more">more</span>
                                    </div>
                                </div>
                            </a>
                        </aside>
                    </div>
                    <div class="col-md">
                        <div class="content">
                            <div class="box">
                                <div class="title title-section-v1">
                                    <h3>关于红橡树</h3>
                                </div>
                                <figure>
                                    <img src="/assets/img/about_01.jpg" alt="">
                                </figure>
                                <p>上海轩悦视听设备有限公司总部位于上海，专注于为演出和高端会议提供一站式的AV设备租赁与技术支持。轩悦视听在北京、广州和深圳设有分公司，当地拥有大型仓库和技术团队，提供灯光音响租赁、LED屏租赁、投影机租赁、同传设备租赁在内的视听和会议设备的租赁，以及从进场彩排、现场执行到结束撤场的完善技术服务，是您举办演出、年会、发布会、国际论坛和峰会的理想合作伙伴。</p>
                                <p>公司用于租赁的设备均为进口和国际高端品牌，每年数百场次的执行经验是您活动顺利完成的重要保证。轩悦视听致力于为客户的活动打造完美的视听盛宴，在选用国际一线品牌设备的前提下，我们严把技术和执行环节，从场地测量、方案设计、现场协调和技术执行均采用严格流程，根据项目活动安排对口的技术骨干全程负责，以服务和现场效果赢得客户对我们的长期信赖。</p>
                            </div>
                            <div class="box">
                                <div class="title title-section-v1">
                                    <h3>红橡树的优势</h3>
                                </div>
                                <figure>
                                    <img src="/assets/img/about_01.jpg" alt="">
                                </figure>
                                <p>上海轩悦视听设备有限公司总部位于上海，专注于为演出和高端会议提供一站式的AV设备租赁与技术支持。轩悦视听在北京、广州和深圳设有分公司，当地拥有大型仓库和技术团队，提供灯光音响租赁、LED屏租赁、投影机租赁、同传设备租赁在内的视听和会议设备的租赁，以及从进场彩排、现场执行到结束撤场的完善技术服务，是您举办演出、年会、发布会、国际论坛和峰会的理想合作伙伴。</p>
                            </div>
                        </div>
                    </div>

                </div>
            </main>

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

        map.centerAndZoom(new BMap.Point(113.933831, 22.579872), 12);
        var point = new BMap.Point(113.933831, 22.579872);

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