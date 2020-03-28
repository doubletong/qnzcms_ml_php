<?php

require_once '../../includes/common.php';
//require_once('../../data/option.php');

//$optionClass = new \TZGCMS\Admin\SiteOption();
//$model = $optionClass->get_config("site_info");

//$site_info  = json_decode($model['config_values'], true);

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "基本信息_系统_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php'?>
</head>

<body>
    <div class="wrapper" id="wrapper">
    <!-- nav start -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php';?>
    <!-- /nav end -->
    <section class="rightcol" id="rightcol">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php';?>
        <div class="main-content">
            <div class="breadcrumb-container">
                <div class="row">
                    <div class="col-md">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">控制面板</a></li>
                            <li class="breadcrumb-item"><a href="#">系统</a></li>
                            <li class="breadcrumb-item active" aria-current="page">基本信息</li>
                        </ol>
                    </nav>
                    </div>
                    <div class="col-md-auto">
                        <time id="sitetime"></time>
                    </div>
                </div>
            </div>
                <form novalidate="novalidate">
                    <div class="card">
                    <header class="card-header">
                        <div class="row">
                        <div class="col">基本设置</div>
                        <div class="col-auto">
                            <div class="control"><a class="expand" href="#"><i class="iconfont icon-fullscreen"></i></a><a class="compress" href="#" style="display: none;"><i class="iconfont icon-shrink"></i></a></div>
                        </div>
                        </div>
                    </header>

                        <section class="card-body">
                            <input type="hidden" name='config_type' value="site_info" />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sitename">网站名称</label>
                                        <input type="text" class="form-control" id="sitename" name="sitename" placeholder="" value="<?php echo !empty($site_info['sitename']) ? $site_info['sitename'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company">公司名称</label>
                                        <input type="text" class="form-control" id="company" name="company" placeholder="" value="<?php echo !empty($site_info['company']) ? $site_info['company'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">备案号</label>
                                        <input type="text" class="form-control" id="webnumber" name="webnumber" placeholder="" value="<?php echo !empty($site_info['webnumber']) ? $site_info['webnumber'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email_contact">控制台主题</label>
                                        <select class="form-control" id="theme" name="theme">
                                            <option value="black" <?php echo (!empty($site_info['theme']) && $site_info['theme'] == "black") ? "selected" : ""; ?>>黑色主题</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hotPhone">400热线</label>
                                        <input type="text" class="form-control" id="hotPhone" name="hotPhone" placeholder="" value="<?php echo !empty($site_info['hotPhone']) ? $site_info['hotPhone'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">联系电话</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?php echo !empty($site_info['phone']) ? $site_info['phone'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">企业邮箱</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo !empty($site_info['email']) ? $site_info['email'] : ""; ?>">
                                    </div>
                                </div>


                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="address">联系地址</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php echo !empty($site_info['address']) ? $site_info['address'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"  <?php echo isset($site_info['enableCaching']) ? ($site_info['enableCaching'] ? "checked" : "") : "checked"; ?> id="enableCaching" name="enableCaching">
                                            <label class="form-check-label" for="enableCaching">开启缓存</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row align-items-center">

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Logo</label>
                                                <div class="input-group">
                                                    <input id="logo" name="logo" class="form-control" value="<?php echo !empty($site_info['logo']) ? $site_info['logo'] : ""; ?>" aria-describedby="setLogo">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" id="setLogo" type="button">浏览…</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (!empty($site_info['logo'])) {?>
                                            <div class="col-auto">
                                                <div style="background-color:#ccc;padding:5px;">
                                                    <img src="<?php echo $site_info['logo']; ?>" id="img_logo" style="max-height:80px;" />
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Logo2</label>
                                                <div class="input-group">
                                                    <input id="logo2" name="logo2" class="form-control" value="<?php echo !empty($site_info['logo2']) ? $site_info['logo2'] : ""; ?>" aria-describedby="setLogo2">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" id="setLogo2" type="button">浏览…</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (!empty($site_info['logo2'])) {?>
                                            <div class="col-auto">
                                                <div style="background-color:#ccc;padding:5px;">
                                                    <img src="<?php echo $site_info['logo2']; ?>" id="img_logo2" style="max-height:80px;" />
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>



                            <div class="row align-items-center mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wechat">微信号</label>
                                        <input type="text" class="form-control" id="wechat" name="wechat" placeholder="" value="<?php echo !empty($site_info['wechat']) ? $site_info['wechat'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="title">微信二维码</label>
                                        <div class="input-group">
                                            <input id="qrcode" name="qrcode" class="form-control" value="<?php echo !empty($site_info['qrcode']) ? $site_info['qrcode'] : ""; ?>" aria-describedby="setQrcode">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="setQrcode" type="button">浏览…</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($site_info['qrcode'])) {?>
                                    <div class="col--md-1">
                                        <img src="<?php echo $site_info['qrcode']; ?>" id="img_qrcode" style="max-height:100px;" />
                                    </div>
                                <?php }?>
                            </div>
                            <!--
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">微信二维码二</label>
                                        <div class="input-group">
                                            <input id="qrcode2" name="qrcode2" class="form-control" value="<?php echo !empty($site_info['qrcode2']) ? $site_info['qrcode2'] : ""; ?>" aria-describedby="setQrcode2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="setQrcode2" type="button">浏览…</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($site_info['qrcode2'])) {?>
                                    <div class="col-auto">
                                        <img src="<?php echo $site_info['qrcode2']; ?>" id="img_qrcode2" style="max-height:100px;" />
                                    </div>
                                <?php }?>
                            </div> -->

                            <h3 class="text-center">社交帐号</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="qq">QQ</label>
                                        <input type="text" class="form-control" id="qq" name="qq" placeholder="" value="<?php echo !empty($site_info['qq']) ? $site_info['qq'] : ""; ?>">
                                    </div>
                                </div>
                                <!-- <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="bilibili">哔哩哔哩</label>
                                        <input type="text" class="form-control" id="bilibili" name="bilibili" placeholder="" value="<?php echo !empty($site_info['bilibili']) ? $site_info['bilibili'] : ""; ?>">
                                    </div>
                                </div> -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="weibo">微博</label>
                                        <input type="text" class="form-control" id="weibo" name="weibo" placeholder="" value="<?php echo !empty($site_info['weibo']) ? $site_info['weibo'] : ""; ?>">
                                    </div>
                                </div>


                            </div>
                            <div class="hidden">
                            <h3 class="title">
                                招聘设置
                            </h3>
                            <hr/>
                            <div class="row mb-4">
                                <div class="col-md">
                                <div class="form-group">
                                <label for="username">招聘邮箱</label>
                                <input type="text" class="form-control" id="hremail" name="hremail" placeholder="" value="<?php echo !empty($site_info['hremail']) ? $site_info['hremail'] : ""; ?>">
                            </div>
                                </div>
                                <div class="col-md">
                                <div class="form-group">
                                <label for="username">联系人</label>
                                <input type="text" class="form-control" id="hrcontact" name="hrcontact" placeholder="" value="<?php echo !empty($site_info['hrcontact']) ? $site_info['hrcontact'] : ""; ?>">
                            </div>
                                </div>
                                <div class="col-md">
                                <div class="form-group">
                                <label for="username">联系电话</label>
                                <input type="text" class="form-control" id="hrphone" name="hrphone" placeholder="" value="<?php echo !empty($site_info['hrphone']) ? $site_info['hrphone'] : ""; ?>">
                            </div>
                                </div>
                            </div>
                            </div>

                     
                        </section>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php';?>
        </section>

    </div>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php';?>

    <script src="/assets/js/vendor/holderjs/holder.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        function SetLogoUrl(fileUrl) {
            $('#logo').val(fileUrl);
            $("#img_logo").attr("src", fileUrl);
        }

        function SetLogoUrl2(fileUrl) {
            $('#logo2').val(fileUrl);
            $("#img_logo2").attr("src", fileUrl);
        }


        function SetQrcodeUrl(fileUrl) {
            $('#qrcode').val(fileUrl);
            $("#img_qrcode").attr("src", fileUrl);
        }

        function SetQrcodeUrl2(fileUrl) {
            $('#qrcode2').val(fileUrl);
            $("#img_qrcode2").attr("src", fileUrl);
        }

        $(document).ready(function() {
            //当前菜单
            $(".mainmenu>li.system").addClass("nav-open").find("ul>li.general a").addClass("active");

            $("#setLogo").on("click", function() {
                singleEelFinder.selectActionFunction = SetLogoUrl;
                singleEelFinder.open();
            });

            $("#setLogo2").on("click", function() {
                singleEelFinder.selectActionFunction = SetLogoUrl2;
                singleEelFinder.open();
            });

            $("#setQrcode").on("click", function() {
                singleEelFinder.selectActionFunction = SetQrcodeUrl;
                singleEelFinder.open();
            });

            $("#setQrcode2").on("click", function() {
                singleEelFinder.selectActionFunction = SetQrcodeUrl2;
                singleEelFinder.open();
            });

            $("form").validate({

                rules: {
                    sitename: {
                        required: true
                    },
                    email: {
                        email: true
                    },
                    email_contact: {
                        email: true
                    }

                },
                messages: {
                    sitename: {
                        required: "请输入网站名称"
                    },
                    email: {
                        email: "请输入有效的邮件地址"
                    },
                    email_contact: {
                        email: "请输入有效的邮件地址"
                    }

                },

                errorClass: "invalid-feedback",
                errorElement: "div",
                highlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-valid');
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                },
                submitHandler: function(form) {
                    //form.submit();
                    $.ajax({
                        url: 'option_post.php',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(res) {

                            var myobj = JSON.parse(res);
                            //console.log(myobj.status);
                            if (myobj.status === 1) {
                                toastr.success(myobj.message);
                            }
                            if (myobj.status === 2) {
                                toastr.error(myobj.message)
                            }
                            if (myobj.status === 3) {
                                toastr.info(myobj.message)
                            }
                        }
                    });

                }
            });
        });
    </script>

</body>

</html>