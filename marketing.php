<?php


require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/link.php");
require_once("data/distributor.php");
require_once("data/shop.php");

$linkClass = new FrontLink();
$links = $linkClass->fetch_all();

$distributorClass = new FrontDistributor();
$distributors1 = $distributorClass->fetch_by_category(1);
$distributors2 = $distributorClass->fetch_by_category(2);
$distributors3 = $distributorClass->fetch_by_category(3);

$shopClass = new FrontShop();
$shoppes = $shopClass->fetch_all();

do_html_doctype("waterpik洁碧中国地区经销商_3S旗舰店_经销网点-".SITENAME)
?>
    <meta name=keywords content="waterpik洁碧中国地区经销商,洁碧3S旗舰店,洁碧经销网点">
    <meta name=description content="waterpik洁碧官网销售网络频道，为您提洁碧中国地区经销商、洁碧E渠道授权专卖店、洁碧3S旗舰店、洁碧经销网点等信息。想了解更多，就上洁碧官方网站！">
<?php
do_html_header();
?>

    <div class="container hidden-xs">
        <div class="breadcrumb">
            <a href="/">首页</a> &gt; <h1>经销网点</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <section class="map">
                <img src="/assets/img/china_map.png" alt="中国地图" />
            </section>
        </div>
    </div>
    <section class="container shoplist">
        <div class="">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 mb30">
                    <header class="title">
                        <i class="icon-shopping-cart"></i> 可以在下列商城在线购买：
                    </header>
                    <ul class="logos row">
                        <?php   foreach($links as $link){ ?>
                            <li class="col-sm-4 col-md-3"><a href="<?php echo $link["link"];?>"><img src="<?php echo $link["image_url"];?>" alt="<?php echo $link["title"];?>" /></a></li>
                        <?php } ?>

                    </ul>
                </div>
                <div class="col-md-10 col-md-offset-1 mb30">
                    <header class="title">
                        <i class="icon-user"></i> 洁碧中国地区经销商
                    </header>
                    <table class="table tbljxs">
                        <thead>
                        <tr>
                            <th>区域总经销</th>
                            <th>联系电话</th>
                            <th>所在城市</th>
                            <th>地址</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php   foreach($distributors1 as $dist){ ?>
                            <tr>
                                <td><?php echo $dist["title"];?></td>
                                <td><?php echo $dist["phone"];?></td>
                                <td><?php echo $dist["city"];?></td>
                                <td><?php echo $dist["address"];?></td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-10 col-md-offset-1 mb30">
                    <header class="title">
                        <i class="icon-home"></i> E渠道授权专卖店
                    </header>
                    <table class="table tblzmd">
                        <thead>
                        <tr>
                            <th>E渠道授权专卖店</th>
                            <th>所在地</th>
                            <th>授权证号</th>
                            <th>网址</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php   foreach($shoppes as $shop){ ?>
                            <tr>
                                <td><?php echo $shop["title"];?></td>
                                <td><?php echo $shop["address"];?></td>
                                <td><?php echo $shop["authorization_no"];?></td>
                                <td><a href="<?php echo $shop["link"];?>"><?php echo $shop["link"];?></a></td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>


                <div class="col-md-10 col-md-offset-1 mb30">
                    <header class="title">
                        <i class="icon-user"></i> 洁碧3S旗舰店
                    </header>
                    <table class="table tbljxs">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>联系电话</th>
                            <th>所在城市</th>
                            <th>地址</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php   foreach($distributors2 as $dist){ ?>
                            <tr>
                                <td><?php echo $dist["title"];?></td>
                                <td><?php echo $dist["phone"];?></td>
                                <td><?php echo $dist["city"];?></td>
                                <td><?php echo $dist["address"];?></td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>

                <div class="col-md-10 col-md-offset-1 mb30">
                    <header class="title">
                        <i class="icon-user"></i> 经销网点
                    </header>
                    <table class="table tbljxs">
                        <thead>
                        <tr>
                            <th>名称</th>
                            <th>联系电话</th>
                            <th>所在城市</th>
                            <th>地址</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php   foreach($distributors3 as $dist){ ?>
                            <tr>
                                <td><?php echo $dist["title"];?></td>
                                <td><?php echo $dist["phone"];?></td>
                                <td><?php echo $dist["city"];?></td>
                                <td><?php echo $dist["address"];?></td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </section>
<?php
do_html_footer();
do_html_analytics();