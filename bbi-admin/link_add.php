<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('includes/output.php');



do_html_doctype("添加链接_后台管理_".SITENAME);
?>
<link href="assets/css/toastr.min.css" rel="stylesheet"/>
<script src="<?php echo SITEPATH; ?>/bbi-admin/assets/plugins/ckfinder/ckfinder.js"></script>

<?php
do_html_header();

?>
<div class="toolbar">
    <a href="#" class="showmenu"><i class="fa fa-bars"></i></a>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home fa-fw"></i> 控制面板</a></li>
        <li><a href="links.php">链接管理</a></li>
        <li class="active">添加链接</li>

    </ol>
</div>
<div class="main-content">

    <div class="panel panel-default">
        <div class="panel-heading">
            添加链接
        </div>
        <div class="panel-body">
            <form class="form-horizontal" style="position: relative;" novalidate="novalidate">


                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">主题</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="title" name="title" placeholder="主题">
                    </div>
                </div>
                <div class="form-group">
                    <label for="link" class="col-sm-2 control-label">链接</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="link" name="link" placeholder="链接">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        链接</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input id="imageUrl" name="imageUrl"  class="form-control" placeholder="链接"></asp:TextBox>
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" id="setImageUrl" type="button">浏览…</button>
                                  </span>
                        </div><!-- /input-group -->
<!--                        <span class="help-block">图片尺寸：1300*528像素</span>-->
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
                        <a href="links.php" class="btn btn-default">返回</a>
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


    function SetBackground(fileUrl) {
        $('#imageUrl').val(fileUrl);
    }
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu li.liitem:nth-of-type(6)").addClass("nav-open").find("ul li:nth-of-type(1) a").addClass("active");



        $("#setImageUrl").on("click", function () {
            var finder = new CKFinder();
            //   finder.basePath = '/Content/Admin/Plugins/ckfinder/';
            finder.selectActionFunction = SetBackground;
            finder.popup();
        });


        $("form").validate({

            rules: {
                title: {
                    required: true
                },
                link: {
                    url: true
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
                link: {
                    url: "链接格式不正确"
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
                    url : 'link_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {
                        //   alert(res);
                        if (res) {
                            toastr.success('链接已添加成功！', '添加链接')
                        } else {
                            toastr.error('链接添加失败！', '添加链接')
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>