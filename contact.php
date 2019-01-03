<?php
require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "加入我们-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-contact">
        <div class="banner">
            <div class="page-title">
                <h1>联系我们</h1>
                <h3>CONTACT US</h3>
            </div>
        </div>

        <div class="container s1">
            <div class="address">
                <div class="row">
                    <div class="col-sm-6">
                        <div id="map1" class="baidumap">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="contact">
                            <h3>南京(总部）</h3>
                            <ul>
                                <li>地址：南京市江宁区菲尼克斯路99号
                                </li>
                                <li>电话：+86-25-58707829
                                </li>
                                <li>邮箱：info@crmedicon.com</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div id="map2" class="baidumap">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="contact">
                            <h3>北京</h3>
                            <ul>
                                <li>地址：北京市朝阳区广渠路11号院1号楼金泰国际大厦A座1507-1508室
                                </li>
                                <li>电话：+86-10-52345921-811

                                </li>
                                <li> 邮箱：info@crmedicon.com</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div id="map3" class="baidumap">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="contact">
                            <h3>上海</h3>
                            <ul>
                                <li>地址：上海市长宁区仙霞路137号盛高国际大厦2301室
                                </li>
                                <li>电话：+86-21-62556153
                                </li>
                                <li>邮箱：info@crmedicon.com</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div id="map4" class="baidumap">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="contact">
                            <h3>广州</h3>
                            <ul>
                                <li>地址：广州市越秀区中山三路33号中华国际中心B塔1407室

                                </li>
                                <li>电话：+86-20-83526606
                                </li>
                                <li>邮箱：info@crmedicon.com</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div id="map5" class="baidumap">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="contact">
                            <h3>武汉</h3>
                            <ul>
                                <li>地址：武汉市武昌区中南路7号中商广场写字楼B3108室
                                </li>
                                <li>电话：+86-27-59352192
                                </li>
                                <li>邮箱：info@crmedicon.com</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div id="map6" class="baidumap">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="contact">
                            <h3>美国新泽西</h3>
                            <ul>
                                <li>地址：美国新泽西州皮斯卡塔韦市威尔路35号
                                </li>
                                <li>电话：+1 (732) 624-9050
                                </li>
                                <li>邮箱：info@crmedicon.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=3.0&ak=omKoELLZ6xvnS3LjGlg2jnvcGRfcb4dV"></script>
<script>
    function loadmap(mapdiv, title, address, x, y) {
            // 百度地图API功能
            var map = new BMap.Map(mapdiv);
            var point = new BMap.Point(x, y);
            var marker = new BMap.Marker(point); // 创建标注    
            map.addOverlay(marker); // 将标注添加到地图中 
            map.centerAndZoom(point, 12);
            var opts = {
                width: 200, // 信息窗口宽度
                height: 100, // 信息窗口高度
                title: title // 信息窗口标题                
            }
            var infoWindow = new BMap.InfoWindow(address, opts); // 创建信息窗口对象 
            marker.addEventListener("click", function() {
                map.openInfoWindow(infoWindow, point); //开启信息窗口
            });
        }

        $(document).ready(function() {
            $(".leftnav li:nth-of-type(6) a").addClass("active");
           $(".mainav li:nth-of-type(7) a").addClass("active");
          
           loadmap("map1", "南京(总部）", "南京市江宁区菲尼克斯路99号", 118.839437, 31.939679);
            loadmap("map2", "北京", "北京市朝阳区广渠路11号院1号楼金泰国际大厦A座1507-1508", 116.506823, 39.899829);
            loadmap("map3", "上海", "上海市长宁区仙霞路137号盛高国际大厦2301室", 121.410713, 31.212312);
            loadmap("map4", "广州", "广州市越秀区中山三路33号中华国际中心B塔1407室", 113.289128, 23.131697);
            loadmap("map5", "武汉", "武汉市武昌区中南路7号中商广场写字楼B3108室", 114.338005, 30.542371);
            loadmap("map6", "美国新泽西", "美国新泽西州皮斯卡塔韦市威尔路35号", 116.506823, 39.899829);
        });
    </script>
</body>
</html>