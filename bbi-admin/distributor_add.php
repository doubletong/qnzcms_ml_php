<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('includes/output.php');
require_once('data/distributor.php');


do_html_doctype("添加经销商_后台管理".SITENAME);
?>
<link href="assets/css/toastr.min.css" rel="stylesheet"/>

<?php
do_html_header();

?>
<div class="toolbar">
    <a href="#" class="showmenu"><i class="fa fa-bars"></i></a>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home fa-fw"></i> 控制面板</a></li>
        <li><a href="distributors.php">经销商</a></li>
        <li class="active">添加经销商</li>

    </ol>
</div>
<div class="main-content">

    <div class="panel panel-default">
        <div class="panel-heading">
            添加经销商
        </div>
        <div class="panel-body">
            <form class="form-horizontal" style="position: relative;" novalidate="novalidate">
                <input id="distributorId" type="hidden" name="distributorId" value="0" />


                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">名称</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="title" name="title" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_id" class="col-sm-2 control-label">分类</label>
                    <div class="col-sm-7">
                        <select class="form-control" id="category_id" name="category_id">
                            <option value="0">--选择分类--</option>
                            <option value="1">洁碧中国地区经销商</option>
                            <option value="2">洁碧3S旗舰店</option>
                            <option value="3">经销网店</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">联系电话</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="city" class="col-sm-2 control-label">城市</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="city" name="city" placeholder="">
                    </div>
                </div>


                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">地址</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="address" name="address" placeholder=""></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="importance" class="col-sm-2 control-label">排序</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="importance" name="importance" value="0" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" checked name="active"> 发布
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">保存</button>
                        <a href="distributors.php" class="btn btn-default">返回</a>
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
        $(".mainmenu li.liitem:nth-of-type(6)").addClass("nav-open").find("ul li:nth-of-type(1) a").addClass("active");

        $("form").validate({

            rules: {
                title: {
                    required: true
                },
                category_id: {
                    min: 1
                },
                importance: {
                    required: true,
                    digits:true
                }

            },
            messages:{
                title: {
                    required:"请输入主标题"
                },
                category_id: {
                    min:"请选择分类"
                },
                importance: {
                    required: "请输入序号",
                    digits:"请输入有效的整数"
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
                    url : 'distributor_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {

                     //   alert(res);
                        if (res) {
                            toastr.success('经销商已添加成功！', '添加经销商')
                        } else {
                            toastr.error('经销商添加失败！', '添加经销商')
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>