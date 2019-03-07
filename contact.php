<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/distributor.php");

$disClass = new Distributor();
$dis = $disClass->fetch_all();

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "联系我们-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-contact">
        <div class="banner">
            <div class="page-title">
                <h1>联系我们</h1>
        
            </div>
        </div>

        <div class="container s1">
            <div class="address">
            <?php   foreach($dis as $data){ ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div id="map<?php echo $data["id"];?>" data-id="map<?php echo $data["id"];?>" data-coordinate="<?php echo $data["coordinate"];?>"
                        data-add="<?php echo $data["address"];?>" data-city="<?php echo $data["city"];?>" class="baidumap" >

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="contact">
                            <h3><?php echo $data["city"];?></h3>
                            <ul>
                                <li>地址：<?php echo $data["address"];?>
                                </li>
                                <li>电话：<?php echo $data["phone"];?>
                                </li>
                                <li>邮箱：<?php echo $data["email"];?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
                
               
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

           $(".baidumap").each(function(){
               var divId = $(this).attr("data-id");
               var city = $(this).attr("data-city");
               var add = $(this).attr("data-add");
               var coordinate = $(this).attr("data-coordinate");
               var xandy = coordinate.split(',');
               loadmap(divId, city, add, xandy[0], xandy[1]);
            });

        
        });
    </script>
</body>
</html>