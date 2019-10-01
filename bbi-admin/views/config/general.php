<?php

require_once('../../includes/common.php');
require_once('../../data/option.php');


$optionClass = new \TZGCMS\Admin\SiteOption();
$model = $optionClass->get_config("site_info");

$data  = json_decode($model['config_values'], true);

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "基本信息_系统_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>
            <div class="container-fluid maincontent">

                <form novalidate="novalidate">
                    <div class="card">
                        <div class="card-header">
                            基本设置
                        </div>
                        <div class="card-body">
                            <input type="hidden" name='config_type' value="site_info" />
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sitename">网站名称</label>
                                        <input type="text" class="form-control" id="sitename" name="sitename" placeholder="" value="<?php echo !empty($data['sitename']) ? $data['sitename'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">备案号</label>
                                        <input type="text" class="form-control" id="webnumber" name="webnumber" placeholder="" value="<?php echo !empty($data['webnumber']) ? $data['webnumber'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">联系电话</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?php echo !empty($data['phone']) ? $data['phone'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">企业邮箱</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo !empty($data['email']) ? $data['email'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_contact">联系表单接收邮箱</label>
                                        <input type="email" class="form-control" id="email_contact" name="email_contact" placeholder="" value="<?php echo !empty($data['email_contact']) ? $data['email_contact'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email_contact">控制台主题</label>
                                        <select class="form-control" id="theme" name="theme">
                                            <option value="black" <?php echo (!empty($data['theme'])&& $data['theme'] == "black") ? "selected" : ""; ?>>黑色主题</option>
                                        </select>    
                                                                    
                                    </div>
  
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="address">联系地址</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php echo !empty($data['address']) ? $data['address'] : ""; ?>">
                                    </div>
                                </div>
                            </div>



                            <div class="row align-items-center">

                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">Logo</label>
                                        <div class="input-group">
                                            <input id="logo" name="logo" class="form-control" value="<?php echo !empty($data['logo']) ? $data['logo'] : ""; ?>" aria-describedby="setLogo">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="setLogo" type="button">浏览…</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($data['logo'])) { ?>
                                    <div class="col-auto">
                                        <div style="background-color:#ccc;padding:5px;">
                                            <img src="<?php echo $data['logo']; ?>" id="img_logo" style="max-height:80px;" />
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">Logo2</label>
                                        <div class="input-group">
                                            <input id="logo2" name="logo2" class="form-control" value="<?php echo !empty($data['logo2']) ? $data['logo2'] : ""; ?>" aria-describedby="setLogo2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="setLogo2" type="button">浏览…</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($data['logo2'])) { ?>
                                    <div class="col-auto">
                                        <div style="background-color:#ccc;padding:5px;">
                                            <img src="<?php echo $data['logo2']; ?>" id="img_logo2" style="max-height:80px;" />
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                          
                            <div class="row align-items-center">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="wechat">微信号</label>
                                        <input type="text" class="form-control" id="wechat" name="wechat" placeholder="" value="<?php echo !empty($data['wechat']) ? $data['wechat'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="title">微信二维码</label>
                                        <div class="input-group">
                                            <input id="qrcode" name="qrcode" class="form-control" value="<?php echo !empty($data['qrcode']) ? $data['qrcode'] : ""; ?>" aria-describedby="setQrcode">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="setQrcode" type="button">浏览…</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($data['qrcode'])) { ?>
                                    <div class="col--md-1">
                                        <img src="<?php echo $data['qrcode']; ?>" id="img_qrcode" style="max-height:100px;" />
                                    </div>
                                <?php } ?>
                            </div>
<!-- 
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">微信二维码二</label>
                                        <div class="input-group">
                                            <input id="qrcode2" name="qrcode2" class="form-control" value="<?php echo !empty($data['qrcode2']) ? $data['qrcode2'] : ""; ?>" aria-describedby="setQrcode2">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="setQrcode2" type="button">浏览…</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if (!empty($data['qrcode2'])) { ?>
                                    <div class="col-auto">
                                        <img src="<?php echo $data['qrcode2']; ?>" id="img_qrcode2" style="max-height:100px;" />
                                    </div>
                                <?php } ?>
                            </div> -->

                            <!-- <h3 class="text-center">社交帐号</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="qq">QQ</label>
                                        <input type="text" class="form-control" id="qq" name="qq" placeholder="" value="<?php echo !empty($data['qq']) ? $data['qq'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="bilibili">哔哩哔哩</label>
                                        <input type="text" class="form-control" id="bilibili" name="bilibili" placeholder="" value="<?php echo !empty($data['bilibili']) ? $data['bilibili'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="weibo">微博</label>
                                        <input type="text" class="form-control" id="weibo" name="weibo" placeholder="" value="<?php echo !empty($data['weibo']) ? $data['weibo'] : ""; ?>">
                                    </div>
                                </div>
                        
                     
                            </div> -->


                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

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
                messages:{
                    sitename: {
                        required:"请输入网站名称"
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

                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('基本信息已保存成功！', '编辑基本信息')
                            } else {
                                toastr.error('基本信息保存失败！', '编辑基本信息')
                            }
                        }
                    });

                }
            });
        });
    </script>

</body>

</html>