<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/user.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "添加_链接_组件_后台管理_".SITENAME;?>
    </title>
    <?php require_once('includes/meta.php') ?>
    <link href="../js/vendor/toastr/toastr.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('includes/header.php'); ?>

            <div class="container-fluid maincontent">

                <form novalidate="novalidate">
                    <div class="card">
                        <div class="card-header">
                            添加管理员
                        </div>
                        <div class="card-body">



                            <div class="form-group">
                                <label for="username">帐号</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="password">密码</label>

                                <input type="password" class="form-control" id="password" name="password" placeholder="">

                            </div>
                            <div class="form-group">
                                <label for="repwd">确认密码</label>

                                <input type="password" class="form-control" id="repwd" name="repwd" placeholder="">

                            </div>

                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
                            <a href="administrators.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i>
                                返回</a>
                        </div>
                    </div>
                </form>
            </div>
            <?php require_once('includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once('includes/scripts.php'); ?>

    <script src="../js/vendor/holderjs/holder.min.js"></script>
    <script src="../js/vendor/toastr/toastr.min.js"></script>
    <script src="../js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //当前菜单
            $(".mainmenu>li:nth-of-type(7)").addClass("nav-open").find("ul li:nth-of-type(1) a").addClass(
                "active");


            $("form").validate({

                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true
                    },
                    repwd: {
                        required: true,
                        equalTo: "#password"
                    }

                },
                messages: {
                    username: {
                        required: "请输入帐号"
                    },
                    password: {
                        required: "请输入密码"
                    },
                    repwd: {
                        required: "请输入确认密码",
                        equalTo: "两次输入的密码不匹配"
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
                        url: 'admin_post.php',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (res) {
                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('管理员已添加成功！', '添加管理员')
                            } else {
                                toastr.error('管理员添加失败！', '添加管理员')
                            }
                        }
                    });


                }
            });
        });
    </script>

</body>

</html>