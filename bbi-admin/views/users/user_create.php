<?php

require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Utils/Enum.php');


use Models\User;
use Models\Metadata;

$pageTitle = "创建新帐号";
$action = "create";

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $pageTitle."_帐号_后台管理_".$site_info['sitename'];?>
    </title>
    <?php require_once('../../includes/meta.php') ?>
    <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>
</head>

<body>
<div class="wrapper" id="wrapper">
        <!-- nav start -->
        <?php require_once('../../includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('../../includes/header.php'); ?>
            <div class="main-content">         
                <div class="breadcrumb-container">
                    <div class="row">
                    <div class="col-md">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                            <li class="breadcrumb-item"><a href="#">系统</a></li>    
                            <li class="breadcrumb-item"><a href="/bbi-admin/views/users/index.php">帐号</a></li>                            
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?></li>
                        </ol>
                        </nav>
                    </div>
                    <div class="col-md-auto">
                        <time id="sitetime"></time>
                    </div>
                    </div>
                </div>

                <form novalidate="novalidate" id="editform">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <div class="card-title-v1"> <i class="iconfont icon-edit"></i> <?php echo $pageTitle; ?></div>
                                </div>
                                <div class="col-auto">
                                    <div class="control"><a class="expand" href="#"><i class="iconfont icon-fullscreen"></i></a><a class="compress" href="#"><i class="iconfont icon-shrink"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <div class="row">
                                <div class="col">
                            <input id="id" type="hidden" id='id' name="id" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                            <input type="hidden" id="action" name="action" value="<?php echo $action; ?>" />
                            <div class="form-group">
                                <label for="username">用户名</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="password">密码</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="email">邮箱</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="" >
                            </div>
                        
                      
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" checked id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">激活</label>
                                </div>
                            </div>

                         

                            </div>
                                <div class="col-auto">
                                    <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">                                       
                                                <img ID="iLogo" data-default-src="holder.js/150x150?text=240X240像素" src="holder.js/150x150?text=240X240像素" class="img-fluid" />
                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info"><i class="fa fa-picture-o"></i> 头像...</button>                                               
                                                <button type="button" id="btnImgDelete" style="display:none;" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                                <input id="photo" type="hidden" name="photo" />
                                            </div>
                                        </div>
                                    </div>
                                   
                                    
                                   
                                </div>
                            </div>


                        </div>
                        <div class="card-footer text-center">

                            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
                            <a href="JavaScript:window.history.back()" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>

                        </div>
                    </div>
                </form>

            </div>
            <?php require_once('../../includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once('../../includes/scripts.php'); ?>

    <script src="/assets/js/vendor/holderjs/holder.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>

    
    <script type="text/javascript">
        function SetThumbnail(fileUrl) {
            $('#photo').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
            $("#btnImgDelete").show();
        }

      

        $(document).ready(function () {
            //当前菜单
            $(".mainmenu>li.system").addClass("nav-open").find("ul>li.users a").addClass("active");

            $("#btnBrowser").on("click", function () {
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();
            });

            $("#btnImgDelete").on("click", function() {
                $('#photo').val("");
                $('#iLogo').attr('src', $('#iLogo').attr('data-default-src'));
                var myImage = document.getElementById('iLogo');
                Holder.run({
                    images: myImage
                });
            });



            $("#editform").validate({

                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    email: {
                        email: true                       
                    }
                },
                messages: {
                    username: {
                        required: "请输入用户名"
                    },
                    password: {
                        required: "请输入密码"
                    },
                    email: {
                        email: "邮箱格式不正确"        
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
                submitHandler: function (form) {
                    //form.submit();                   

                    $.ajax({
                        url: 'user_post.php',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (res) {
                            //  $('#resultreturn').prepend(res);
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