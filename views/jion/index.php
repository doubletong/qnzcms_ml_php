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
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>

    <div class="page page-jion container">

        <form class="contact-form wow fadeInUp" action="contact_send.php" method="post" id="editform">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="label-title">您的姓名</label>
                        <input name="name" class="form-control" type="text" placeholder="请输入您的姓名" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title" class="label-title">咨询主题</label>
                        <input name="title" class="form-control" type="text" placeholder="请输入您的咨询主题" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone" class="label-title">联系号码</label>
                        <input name="phone" class="form-control" type="text" placeholder="请输入您的联系号码" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="label-title">联系邮箱</label>
                        <input name="email" class="form-control" type="email" placeholder="请输入您的联系邮箱" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="message" class="label-title">留言内容</label>
                        <textarea name="message" class="form-control" placeholder="请输入您的留言内容" rows="6"></textarea>
                    </div>
                </div>
            </div>





            <div class="error"></div>
            <div class="actions">

                <button type="submit" class="btn btn-primary">确认提交</button>


            </div>






        </form>
    </div>

    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

    <script src="/assets/js/vendor/toastr/toastr.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/assets/js/vendor/blockUI/jquery.blockUI.min.js"></script>


    <script>
        $(document).ready(function() {

  

            $("#editform").validate({

                rules: {
                    name: {
                        required: true
                    },
                    title: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    phone: {
                        required: true
                    },
                    message: {
                        required: true
                    }

                },
                messages: {
                    name: {
                        required: "请输入姓名"
                    },
                    title: {
                        required: "请输入主题"
                    },
                    email: {
                        required: "请输入电子邮箱"
                    },
                    phone: {
                        required: "请输入联系电话"
                    },
                    message: {
                        required: "请输入内容"
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
                    $.blockUI({
                        css: {
                            backgroundColor: 'transparent',
                            color: '#fff',
                            fontSize: '14px',
                            padding: '1rem',
                            border: 'none'
                        }
                    });

                    $.ajax({
                        url: '/jion/send',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(res) {
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
                        complete: function(xhr) {
                            $.unblockUI();
                            $("#captcha").attr("src", "captcha.php");
                        }
                    });


                }
            });

        });
    </script>
</body>

</html>