<?php
require_once("../../includes/common.php");

session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "联系我们-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link href="/js/vendor/toastr/toastr.min.css" rel="stylesheet"/>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <!--banner-->
    <div class="banner banner-contact">
       
    </div>
    <!--banner end-->
    <div class="page page-contact">
        <div class="container">
            <div class="row t1">
                <div class="col-md">
                    <div class="title title-section wow fadeInUp">
                        <h3>联系我们 <span>Contact us</span></h3>
                        <p>专业的设备租赁服务平台，提供卓越的设备选择方案！</p>
                    </div>
                </div>
                <div class="col-md-auto align-self-end wow fadeInUp">
                    您的当前位置：<a href="/">主页</a> > <span class="current">联系我们</span>
                </div>
            </div>
            <main class="maincontent">
            <div class="row">
                <div class="col-md-auto">
                        <aside class="navlist">
                            <a href="#" class="wow fadeInUp">
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
                            <a href="#" class="wow fadeInUp">
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
                      
                            <div class="title title-section-v1 wow fadeInUp">
                                    <h3>免费获取策划方案</h3>
                                </div>
                    <div class="contact-form wow slideInUp">
          
                        <form class="wow fadeInUp" action="send.php" method="post" id="editform">
                            <input type="hidden" name="token" value="<?php echo $token; ?>">
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="您的称呼" />
                            </div>                     
                            <div class="form-group">
                                <input name="phone" class="form-control" type="text" placeholder="您的电话" />
                            </div>      
                            <div class="form-group">
                                <input name="company" class="form-control" type="text" placeholder="公司或单位名称" />
                            </div>                      
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="感谢您在百忙之中光临，如果时间允许，可简要地填写您的需求或直接  拨打我司电话（选填）。" rows="6"></textarea>
                            </div>
                            <div class="error"></div>
                            <div class="actions">
                            
                                    <button type="submit" class="btn btn-primary">确认提交</button>
                           
                            
                            </div>
                        
                        </form>
                    </div>
               
                </div>
                <div class="content">
                <div class="box">
                    <div class="title title-section-v1 class="wow fadeInUp">
                        <h3>免费获取策划方案</h3>
                    </div>
                    <div id="map_canvas" class="map_canvas wow slideInUp"></div>
                    <div class="row wow fadeInUp">
                        <div class="col-md">
                            <dl class="contactlist">
                                <dd>值班经理手机（24h）：13816723908（邓经理）</dd>
                                <dd>
                                电话：0755-8888 8888 / 0755-6666 6666
                                </dd>
                                <dd>咨询QQ：2657218519</dd>
                                <dd>
                                    总公司地址：深圳市龙岗区布吉街道龙岗大道布吉街道龙岗大道1188-88号
                                </dd>
                                <dd>分公司地址：深圳市龙岗区布吉街道龙岗大道布吉街道龙岗大道1188-88号</dd>
                            </dl>
                            
                        </div>
                        <div class="col-md-auto">
                            <img src="<?php echo $site_info['qrcode']; ?>" class="qrcode" alt="公众号">
                        </div>
                    </div>
                </div>
                </div>
       
                </div>
            </div>
            </main>
        </div>
    </div>

    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

    <script src="/js/vendor/toastr/toastr.min.js"></script>
    <script src="/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/js/vendor/blockUI/jquery.blockUI.min.js"></script>

    <script src="http://api.map.baidu.com/api?v=2.0&ak=G7h0sKsr60IFU3OrHRmKTRzD"></script>

    <script>
        
        


        // 百度地图API功能
        var map = new BMap.Map("map_canvas");


        map.addControl(new BMap.NavigationControl());
        map.enableScrollWheelZoom(); //启用滚轮放大缩小，默认禁用
        map.enableContinuousZoom(); //启用地图惯性拖拽，默认禁用

        map.centerAndZoom(new BMap.Point(116.277409,40.105892), 16);
        var point = new BMap.Point(116.277409,40.105892);

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

        // marker1.openInfoWindow(infoWindow1);



        $(document).ready(function() {

            //$(".mainav li:nth-of-type(6)").addClass("active");

            $("#editform").validate({

                rules: {
                    name: {
                        required: true
                    },                  
                    phone: {
                        required: true
                    },                
                    message: {
                        required: true
                    }

                },
                messages:{
                    name: {
                        required:"请输入姓名"
                    },   
                    phone: {
                        required: "请输入联系电话"
                    },   
                    message: {
                        required:  "请输入内容"
                    }

                },
                errorClass: "invalid-feedback",
                errorElement: "div",
                highlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-valid');
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                },
                submitHandler: function(form) {
                    $.blockUI({ css: { backgroundColor: 'transparent', color: '#fff',fontSize:'14px',padding:'1rem',border:'none' } });

                    $.ajax({
                        url : '/contact/send',
                        type : 'POST',
                        data : $(form).serialize(),
                        success : function(res) {
                            console.log(res);
                            var myobj = JSON.parse(res);
                            //  $('#resultreturn').prepend(res);
                            //console.log(myobj.status);
                            if (myobj.status == 1) {
                                toastr.success(myobj.message, '发送邮件');
                                $("input[type='text'],textarea").val("");
                            } else {
                                toastr.error(myobj.message, '发送邮件')
                            }
                        },
                        complete:function(xhr){
                            $.unblockUI();
                            $("#captcha").attr("src","captcha.php");
                        }
                    });


                }
            });

        });
    </script>
</body>

</html>