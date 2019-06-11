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
        <?php echo "修改密码_管理员_后台管理_".$config["site"]["name"];;?>
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
                            修改密码
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="userId" value="<?php echo $_GET['id']; ?>">
                            <div class="form-group">
                                <label for="oldpassword">旧密码</label>
                                <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="password">新密码</label>
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

  
    <script src="../js/vendor/toastr/toastr.min.js"></script>
    <script src="../js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //当前菜单
            $(".mainmenu>li:nth-of-type(17)").addClass("nav-open").find("ul li:nth-of-type(2) a").addClass(
                "active");


            $("form").validate({

                rules: {
                    oldpassword: {
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
                    oldpassword: {
                        required: "请输入旧密码"
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
                        url: 'admin_updatepwd_post.php',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (res) {
                            //  $('#resultreturn').prepend(res);
                            console.log(res);
                            if (res==1) {
                                toastr.error('旧密码不正确！', '修改密码')
                            } else if(res==2){                              
                                toastr.success('密码修改成功！', '修改密码')
                            }else{
                                toastr.error('密码修改失败！', '修改密码')
                            }
                        }
                    });


                }
            });
        });
    </script>

</body>

</html>