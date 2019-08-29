<?php
require_once("../../includes/common.php");


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
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-auto">
                        <header class="title title-section wow slideInLeft">
                            <h2>公司简介</h2>
                        </header>
                        <dl class="contact wow slideInUp" data-wow-delay=".3s">
                            <dt>地址</dt>
                            <dd><?php echo $site_info['address'] ?></dd>
                            <dt>电话</dt>
                            <dd><?php echo $site_info['phone'] ?></dd>
                            <dt>邮箱</dt>
                            <dd><?php echo $site_info['email'] ?></dd>
                        </dl>
                    </div>
                    <div class="col-lg">
                        <div id="map_canvas" class="map_canvas wow slideInUp">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="/img/banners/contact.jpg" class="bg-contact" alt="联系我们">
    </div>
    <!--banner end-->
    <div class="page page-contact">


        <div class="container">
            <div class="row">

                <div class="col-md-7">
                    <div class="contact-form wow slideInUp">
                        <h3 class="title">
                            在线留言
                        </h3>
                        
                        <form class="clear" action="contact_send.php" method="post" id="editform">
                            <div class="form-group">
                                <input name="name" class="form-control" type="text" placeholder="请输入您的姓名*" />
                            </div>                     
                            <div class="form-group">
                                <input name="phone" class="form-control" type="text" placeholder="请输入您的联系方式*" />
                            </div>                      
                            <div class="form-group">
                                <textarea name="message" class="form-control" placeholder="输入内容*" rows="6"></textarea>
                            </div>
                            <div class="error"></div>
                            <div class="row actions">
                                <div class="col-md-auto">
                                    <button type="submit" class="btn-send">提 交</button>
                                </div>
                                <div class="col-md">
                                    <p class="note">我们会收到您的留言后，1-2工作日回复到您</p>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="qrcode wow slideInUp">
                        <h3 class="title">
                            关注我们
                        </h3>
                        <div class="qrcontainer">
                            <img src="<?php echo $site_info['qrcode']; ?>" alt="公众号">
                            <p>扫一扫关注微信公众号</p>
                        </div>
                    </div>
                </div>
            </div>
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