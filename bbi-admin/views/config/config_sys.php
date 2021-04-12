<?php
require_once '../../includes/common.php';


use Models\Option;

$configkey = 'sys';
$option = Option::find($configkey);

$data  = isset($option) ? json_decode($option->config_values,true) : null;

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "基本信息_系统_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php'?>
    <link rel="stylesheet" type="text/css" href="../../../assets/js/vendor/jquery-ui/themes/smoothness/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../assets/js/vendor/elFinder/css/elfinder.min.css"/>

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
                        <div class="col">系统设置</div>
                        <div class="col-auto">
                            <div class="control"><a class="expand" href="#"><i class="iconfont icon-fullscreen"></i></a><a class="compress" href="#" style="display: none;"><i class="iconfont icon-shrink"></i></a></div>
                        </div>
                        </div>
                    </header>
                        
                        <section class="card-body">
                            <input type="hidden" name='config_type' value="<?php echo $configkey;?>" />                         
                            <div class="row mb-3">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="username">备案号</label>
                                        <input type="text" class="form-control" id="webnumber" name="webnumber" placeholder="" value="<?php echo !empty($data['webnumber']) ? $data['webnumber'] : ""; ?>">
                                    </div>
                                </div>
                              
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="homepage">网址</label>
                                        <input type="text" class="form-control" id="homepage" name="homepage" placeholder="" value="<?php echo !empty($data['homepage']) ? $data['homepage'] : ""; ?>">
                                    </div>
                                </div>
                               
                                <div class="col-md-12" style="display:none">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input"  <?php echo isset($data['enableCaching']) ? ($data['enableCaching'] ? "checked" : "") : "checked"; ?> id="enableCaching" name="enableCaching">
                                            <label class="form-check-label" for="enableCaching">开启缓存</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row mb-3">
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
                                                    <img src="<?php echo $data['logo']; ?>" id="img_logo" style="height:60px;" />
                                                </div>
                                            </div>
                                        <?php }?>
                                    </div>
                                </div>
                         
                            </div>

                            <h3>公众号对接</h3>
                            <div class="row mb-3">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="appid">AppID</label>
                                        <input type="text" class="form-control" id="app_id" name="app_id" placeholder="" value="<?php echo !empty($data['app_id']) ? $data['app_id'] : ""; ?>">
                                    </div>
                                </div>
                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="homepage">App Secret</label>
                                        <input type="text" class="form-control" id="app_secret" name="app_secret" placeholder="" value="<?php echo !empty($data['app_secret']) ? $data['app_secret'] : ""; ?>">
                                    </div>
                                </div>
                            </div>

                            <h3>阿里云OSS对接</h3>
                            <div class="row">                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="accessKeyId">AccessKeyId</label>
                                        <input type="text" class="form-control" id="accessKeyId" name="accessKeyId" placeholder="" value="<?php echo !empty($data['accessKeyId']) ? $data['accessKeyId'] : ""; ?>">
                                    </div>
                                </div>
                              
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="accessKeySecret">accessKeySecret</label>
                                        <input type="text" class="form-control" id="accessKeySecret" name="accessKeySecret" placeholder="" value="<?php echo !empty($data['accessKeySecret']) ? $data['accessKeySecret'] : ""; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endpoint">Endpoint</label>
                                        <input type="text" class="form-control" id="endpoint" name="endpoint" placeholder="" value="<?php echo !empty($data['endpoint']) ? $data['endpoint'] : ""; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bucket">Bucket</label>
                                        <input type="text" class="form-control" id="bucket" name="bucket" placeholder="" value="<?php echo !empty($data['bucket']) ? $data['bucket'] : ""; ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="oss_url">引用域名</label>
                                        <input type="text" class="form-control" id="oss_url" name="oss_url" placeholder="" value="<?php echo !empty($data['oss_url']) ? $data['oss_url'] : ""; ?>">
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

    <script type="text/javascript" src="/assets/js/vendor/jquery-ui/jquery-ui.min.js"></script>    

<script src="/assets/js/vendor/elFinder/js/elfinder.min.js"></script>
<script src="/assets/js/vendor/elFinder/js/i18n/elfinder.zh_CN.js"></script>
<script src="/assets/js/vendor/tinymce/tinymce.min.js"></script>
<script src="/assets/js/tinymceElfinder.js"></script>

    <script type="text/javascript">
       
      

        $(document).ready(function() {
            //当前菜单
            $("#module_nav>li:nth-of-type(2)").addClass("active").siblings().removeClass('active');  
            $(".mainmenu>li.general a").addClass("active");

            $("#setLogo").on("click", function() {
                
                $('<div \>').dialog({modal: true, width: "80%", title: "选择文件", zIndex: 99999,
                    create: function(event, ui) {
                        $(this).elfinder({
                            resizable: false,
                            url: '/assets/js/vendor/elFinder/php/connector.minimal.php',
                            lang: 'zh_CN',
                            commandsOptions: {
                            getfile: {
                                oncomplete: 'destroy' 
                            }
                            },                            
                            getFileCallback: function(file) {
                                //document.getElementById('fileurl').value = file; 
                                var fileUrl = '/'+file.path.replace(/\\/g,"/");
                                $('#logo').val(fileUrl);
                                $("#img_logo").attr("src", fileUrl);                   
                                jQuery('.ui-dialog-titlebar-close[type="button"]').click();
                            }
                        }).elfinder('instance')
                    }
                });
            });


            $("form").validate({

                rules: {
                    homepage: {
                        required: true
                    },
                   

                },
                messages: {
                    homepage: {
                        required: "请输入网站地址"
                    },
                  

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