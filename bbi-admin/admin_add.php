<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('includes/output.php');
require_once('data/user.php');


do_html_doctype("添加管理员_后台管理".SITENAME);
?>
<link href="assets/css/toastr.min.css" rel="stylesheet"/>
<?php
do_html_header();

?>
<div class="toolbar">
    <a href="#" class="showmenu"><i class="fa fa-bars"></i></a>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home fa-fw"></i> 控制面板</a></li>
        <li><a href="administrators.php">管理员管理</a></li>
        <li class="active">添加管理员</li>

    </ol>
</div>
<div class="main-content">

    <div class="panel panel-default">
        <div class="panel-heading">
            添加管理员
        </div>
        <div class="panel-body">
            <form class="form-horizontal" style="position: relative;" novalidate="novalidate">


                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">帐号</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="username" name="username" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="password" name="password" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="repwd" class="col-sm-2 control-label">确认密码</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control" id="repwd" name="repwd" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">保存</button>
                        <a href="administrators.php" class="btn btn-default">返回</a>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>
</div>

<?php
do_html_footer();
?>
<script src="assets/js/holder.min.js"></script>
<script src="assets/js/toastr.min.js"></script>
<script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript">



    $(document).ready(function () {
        //当前菜单
        $(".mainmenu li.liitem:nth-of-type(7)").addClass("nav-open").find("ul li:nth-of-type(1) a").addClass("active");


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
            messages:{
                username: {
                    required:"请输入帐号"
                },
                password: {
                    required: "请输入密码"
                },
                repwd: {
                    required: "请输入确认密码",
                    equalTo:"两次输入的密码不匹配"
                }

            },

            errorClass: "help-block",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass('has-success');
                $(element).parents('.form-group').addClass(' has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass(' has-error');
                $(element).parents('.form-group').addClass('has-success');
            },
            submitHandler: function(form) {
                //form.submit();

                $.ajax({
                    url : 'admin_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {
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