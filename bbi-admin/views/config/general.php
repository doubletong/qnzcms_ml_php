<?php
require_once '../../includes/common.php';


use Models\Option;

$lang = isset($_GET['elang'])?$_GET['elang']:'';

$configkey = empty($lang)? 'site_info' : 'site_info_'.$lang;
$option = Option::find($configkey);

$data  = isset($option) ? json_decode($option->config_values,true) : null;

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
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav_system.php';?>
    <!-- /nav end -->
    <section class="rightcol" id="rightcol">
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php';?>
        <div class="main-content">
            <div class="breadcrumb-container">
                <div class="row">
                    <div class="col-md">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/bbi-admin/index.php">控制面板</a></li>
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

                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $lang == ''?'active':'';?>" href="general.php">中文</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $lang == 'en'?'active':'';?>" href="general.php?elang=en">English</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $lang == 'zh-TW'?'active':'';?>" href="general.php?elang=zh-TW">繁体中文</a>
                                </li>        
                            </ul>
                            <hr>

                            <input type="hidden" name='config_type' value="site_info" />
                            <input type="hidden" name='config_name' value="<?php echo $configkey;?>" />
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sitename">网站名称</label>
                                        <input type="text" class="form-control" id="sitename" name="sitename" placeholder="" value="<?php echo !empty($data['sitename']) ? $data['sitename'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="company">公司名称</label>
                                        <input type="text" class="form-control" id="company" name="company" placeholder="" value="<?php echo !empty($data['company']) ? $data['company'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">备案号</label>
                                        <input type="text" class="form-control" id="webnumber" name="webnumber" placeholder="" value="<?php echo !empty($data['webnumber']) ? $data['webnumber'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email_contact">控制台主题</label>
                                        <select class="form-control" id="theme" name="theme">
                                            <option value="black" <?php echo (!empty($data['theme']) && $data['theme'] == "black") ? "selected" : ""; ?>>黑色主题</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="hotPhone">400热线</label>
                                        <input type="text" class="form-control" id="hotPhone" name="hotPhone" placeholder="" value="<?php echo !empty($data['hotPhone']) ? $data['hotPhone'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone">联系电话</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="" value="<?php echo !empty($data['phone']) ? $data['phone'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">企业邮箱</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo !empty($data['email']) ? $data['email'] : ""; ?>">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="address">联系地址</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php echo !empty($data['address']) ? $data['address'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="postcode">邮编</label>
                                        <input type="text" class="form-control" id="postcode" name="postcode" placeholder="" value="<?php echo !empty($data['postcode']) ? $data['postcode'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"  <?php echo isset($data['enableCaching']) ? ($data['enableCaching'] ? "checked" : "") : "checked"; ?> id="enableCaching" name="enableCaching">
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
                                                    <input id="logo" name="logo" class="form-control" value="<?php echo !empty($data['logo']) ? $data['logo'] : ""; ?>" aria-describedby="setLogo">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" id="setLogo" type="button">浏览…</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (!empty($data['logo'])) {?>
                                            <div class="col-auto">
                                                <div style="background-color:#ccc;padding:5px;">
                                                    <img src="<?php echo $data['logo']; ?>" id="img_logo" style="max-height:80px;" />
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                         
                            </div>


                            
                            <div>
                            <h3 class="title">
                                招聘设置
                            </h3>
                            <hr/>
                            <div class="row mb-4">
                                <div class="col-md">
                                <div class="form-group">
                                <label for="username">招聘邮箱</label>
                                <input type="text" class="form-control" id="hremail" name="hremail" placeholder="" value="<?php echo !empty($data['hremail']) ? $data['hremail'] : ""; ?>">
                            </div>
                                </div>
                                <div class="col-md">
                                <div class="form-group">
                                <label for="username">联系人</label>
                                <input type="text" class="form-control" id="hrcontact" name="hrcontact" placeholder="" value="<?php echo !empty($data['hrcontact']) ? $data['hrcontact'] : ""; ?>">
                            </div>
                                </div>
                                <div class="col-md">
                                <div class="form-group">
                                <label for="username">联系电话</label>
                                <input type="text" class="form-control" id="hrphone" name="hrphone" placeholder="" value="<?php echo !empty($data['hrphone']) ? $data['hrphone'] : ""; ?>">
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



        function SetQrcodeUrl(fileUrl) {
            $('#qrcode').val(fileUrl);
            $("#img_qrcode").attr("src", fileUrl);
        }

      

        $(document).ready(function() {
            //当前菜单
            $("#module_nav>li:nth-of-type(2)").addClass("active").siblings().removeClass('active');  
            $(".mainmenu>li.general a").addClass("active");

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