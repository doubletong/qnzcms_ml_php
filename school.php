<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("laws");


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "患者故事-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-school">
        <div class="container page-title">
            <h1>知行学院</h1>
            <p>专业的临床医学及专业教育培训中心</p>
        </div>
    </div>
    <div class="page page-support page-story page-school">
        <div class="container">
            <section class="s1">
                <h2>健康爱心植入卡</h2>
                <p>微创®公司建立并完善医疗器械唯一标识（UDI）、患者植入卡医疗器械信息综合数据库。实现医疗器械从设计开发、生产制造到上市后全过程监管。通过患者植入卡解决患者与医疗机构、生产企业和监管部门就产品追溯的“最后一公里”难题。促使医生在术后对患者信息告知（包括植入器械信息和安全事项的告知），方便在突发情况下使医生能尽快准确地获取植入物信息从而以最简洁明了的方式保障患者权益和生命安全。</p>
                <a href="#" class="more">知行学院官网 <i class="iconfont icon-right"></i></a>
            </section>
        </div>
        <section class="s1 s2">
            <h2>SEED种子学习法</h2>
            <div class="container">
                <div class="four">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="item">
                                <h3>Sciential</h3>
                                <h4>知识储备</h4>
                                <ul>
                                    <li>在线讲座</li>
                                    <li>在线资料库</li>
                                    <li>理论课程</li>
                                    <li>研讨会</li>
                                    <li>第三方大会</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="item">
                                <h3>Elementary</h3>
                                <h4>初级进修</h4>
                                <ul>
                                    <li>VR虚拟



                                    </li>
                                    <li>初级模型操作
                                    </li>
                                    <li>初级模拟器操作
                                    </li>
                                    <li>病例讨论</li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="item">
                                <h3>Enhanced</h3>
                                <h4>高级精修</h4>
                                <ul>
                                    <li>高级模拟器操作


                                    </li>
                                    <li>高级模型操作
                                    </li>
                                    <li>病例讨论
                                    </li>
                                    <li>专家问答
                                    </li>
                                    <li>远程医疗</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="item">
                                <h3>Developed</h3>
                                <h4>发展飞跃</h4>
                                <ul>
                                    <li>讲师会议</li>
                                    <li>临床试验培训</li>
                                    <li>研发与转化医学</li>
                                    <li>非临床类课程</li>
                                    <li>第三方大会</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="s3">
            <div class="row align-items-center no-gutters">
                <div class="col-md-6 wow slideInLeft">
                    <div class="pic">
                        <img src="/img/s_1.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 wow slideInRight">
                    <div class="txt">
                       <h3 class="title">知了报告厅</h3>
                       <p>该大厅的功能主要用于进行行业大会、年会、远程手术的转播，公司内部培训的举行，高管讲堂的举办，它最大可容纳60人参会。每张桌子配备了先进的音频和录播设备，能按照不同的使用功能进行智能切换。</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center no-gutters">
                <div class="col-md-6 order-md-2 wow slideInRight">
                    <div class="pic">
                        <img src="/img/s_2.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 order-md-1 wow slideInLeft">
                    <div class="txt">
                       <h3 class="title">全球指导中心
</h3>
                       <p>全球指导中心位于知行学院前厅重要位置，主屏由3*9块拼接屏组成个，并配有5块和3块侧屏，可用来播放公司宣传片、远程医疗视频，还能进行多地手术的转播，对接不同的学术会议，同时具备视频会议功能，可实现双向沟通。</p>
                    </div>
                </div>
                </div>
                <div class="row align-items-center no-gutters">
                <div class="col-md-6 wow slideInLeft">
                    <div class="pic">
                        <img src="/img/s_3.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 wow slideInRight">
                    <div class="txt">
                       <h3 class="title">介入模拟培训教室
</h3>
                       <p>配备8张培训桌，每桌均可独立连接音视频设备，最多可同时容纳32人，并可进行分组培训。该房间还可以分隔为两间单独的教室，各4张培训桌，以满足不同规模的培训。</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center no-gutters">
                <div class="col-md-6 order-md-2 wow slideInRight">
                    <div class="pic">
                        <img src="/img/s_4.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 order-md-1 wow slideInLeft">
                    <div class="txt">
                       <h3 class="title">骨科培训教室</h3>
                       <p>配备音视频设备、高清投影系统，不锈钢假骨操作台7张，可开展30人以内的培训。每个操作台顶端配备吸顶式摄像头，可以将每个试验台上的画面实时传递至投影幕，供学员交流学习。</p>
                    </div>
                </div>
                </div>
                <div class="row align-items-center no-gutters">
                <div class="col-md-6 wow slideInLeft">
                    <div class="pic">
                        <img src="/img/s_5.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 wow slideInRight">
                    <div class="txt">
                       <h3 class="title">3D 体验中心</h3>
                       <p>3D体验中心配备有3D打印机、zSpace 3D教学设备。投影仪可直接投影3D效果，参与者佩戴主动式3D眼镜，可直观观察立体人体解剖模型。</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center no-gutters">
                <div class="col-md-6 order-md-2 wow slideInRight">
                    <div class="pic">
                        <img src="/img/s_6.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 order-md-1 wow slideInLeft">
                    <div class="txt">
                       <h3 class="title">模拟DSA手术室</h3>
                       <p>该手术室用于模拟冠脉、神内介入手术，配备了液压式手术床、C臂机，配合介入手术模拟器的使用，可更加逼真地模拟介入手术室情境。外侧电脑可用于直播手术室的真实情况，达到手术过程中同步在线反馈。球管经过特殊设计，不产生射线辐射，更加逼真地模拟介入手术室情境。</p>
                    </div>
                </div>
                </div>
                <div class="row align-items-center no-gutters">
                <div class="col-md-6 wow slideInLeft">
                    <div class="pic">
                        <img src="/img/s_7.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6 wow slideInRight">
                    <div class="txt">
                       <h3 class="title">VR导管室</h3>
                       <p>它采用了空间定位装置和VR虚拟现实成像技术的配合，不仅逼真还原了真实导管室的环境和设施，而且模拟了介入手术的每一个步骤，并通过互动环节让体验者参与其中。</p>
                    </div>
                </div>
            </div>
      
      
        </section>



    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");

        });
    </script>
</body>

</html>