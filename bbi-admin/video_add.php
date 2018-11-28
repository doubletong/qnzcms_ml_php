<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('includes/output.php');
require_once('data/video.php');


do_html_doctype("添加视频_后台管理".SITENAME);
?>
<link href="assets/css/toastr.min.css" rel="stylesheet"/>
<script src="<?php echo SITEPATH; ?>/bbi-admin/assets/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo SITEPATH; ?>/bbi-admin/assets/plugins/ckfinder/ckfinder.js"></script>

<?php
do_html_header();

?>
<div class="toolbar">
    <a href="#" class="showmenu"><i class="fa fa-bars"></i></a>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home fa-fw"></i> 控制面板</a></li>
        <li><a href="products.php">视频管理</a></li>
        <li class="active">添加视频</li>

    </ol>
</div>
<div class="main-content">

    <div class="panel panel-default">
        <div class="panel-heading">
          <span class="glyphicon glyphicon-edit"></span>  添加视频
        </div>
        <div class="panel-body">
            <form class="form-horizontal" style="position: relative;" novalidate="novalidate">
                <div style="width:180px; position:absolute;right:0;top:0;z-index:100; text-align:center;">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img ID="iLogo" src="holder.js/150x100/text:800X534像素" class="img-responsive img-rounded" />
                        </div>
                        <div class="panel-footer">
                            <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="fa fa-picture-o"></i> 缩略图...</button>
                            <input id="thumbnail" type="hidden" name="thumbnail" />
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">视频标题</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="title" name="title" placeholder="视频标题">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sub_title" class="col-sm-2 control-label">英文标题</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="英文标题">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sub_title" class="col-sm-2 control-label">对应产品</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="productName" name="productName" placeholder="对应产品">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                       视频（MP4）</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input id="videoUrl" name="videoUrl"  class="form-control" placeholder="视频（MP4）"></asp:TextBox>
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" id="setVideoUrl" type="button">浏览…</button>
                                  </span>
                        </div><!-- /input-group -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        视频（ogv）</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input id="ogvUrl" name="ogvUrl"  class="form-control" placeholder="视频（ogv）"></asp:TextBox>
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" id="setOgvUrl" type="button">浏览…</button>
                                  </span>
                        </div><!-- /input-group -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        视频（webm）</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input id="webmUrl" name="webmUrl"  class="form-control" placeholder="视频（webm）"></asp:TextBox>
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" id="setWebmUrl" type="button">浏览…</button>
                                  </span>
                        </div><!-- /input-group -->
                    </div>
                </div>



                <div class="form-group">
                    <label for="importance" class="col-sm-2 control-label">排序</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="importance" name="importance" value="0" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtBody" class="col-sm-2 control-label">温馨提示</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="content" name="content" placeholder=""></textarea>
                        <script>
                            CKEDITOR.replace( 'content', {
                                filebrowserBrowseUrl: '<?php echo SITEPATH; ?>/bbi-admin/assets/plugins/ckfinder/ckfinder.html',
                                filebrowserImageBrowseUrl: '<?php echo SITEPATH; ?>/bbi-admin/assets/plugins/ckfinder/ckfinder.html?Type=Images',
                                filebrowserFlashBrowseUrl: '<?php echo SITEPATH; ?>/bbi-admin/assets/plugins/ckfinder/ckfinder.html?Type=Flash',
                                filebrowserUploadUrl: '<?php echo SITEPATH; ?>/bbi-admin/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                filebrowserImageUploadUrl: '<?php echo SITEPATH; ?>/bbi-admin/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                filebrowserFlashUploadUrl: '<?php echo SITEPATH; ?>/bbi-admin/assets/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                            });

                        </script>

                    </div>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">SEO描述</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" placeholder=""></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keywords" class="col-sm-2 control-label">关键字</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keywords" name="keywords" placeholder="">
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
                        <a href="videos.php" class="btn btn-default">返回</a>
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
    function SetThumbnail(fileUrl) {
        $('#thumbnail').val(fileUrl);
        $('#iLogo').attr('src', fileUrl);
    }

    function SetVideoUrl(fileUrl) {
        $('#videoUrl').val(fileUrl);
    }
    function SetOgvUrl(fileUrl) {
        $('#ogvUrl').val(fileUrl);
    }
    function SetWebmUrl(fileUrl) {
        $('#webmUrl').val(fileUrl);
    }

    $(document).ready(function () {
        //当前菜单
        $(".mainmenu li.liitem:nth-of-type(5)").addClass("nav-open").find("ul li:nth-of-type(2) a").addClass("active");

        $("#btnBrowser").on("click", function () {
            var finder = new CKFinder();
            //   finder.basePath = '/Content/Admin/Plugins/ckfinder/';
            finder.selectActionFunction = SetThumbnail;
            finder.popup();
        });

        $("#setVideoUrl").on("click", function () {
            var finder = new CKFinder();
            //   finder.basePath = '/Content/Admin/Plugins/ckfinder/';
            finder.selectActionFunction = SetVideoUrl;
            finder.popup();
        });

        $("#setOgvUrl").on("click", function () {
            var finder = new CKFinder();
            //   finder.basePath = '/Content/Admin/Plugins/ckfinder/';
            finder.selectActionFunction = SetOgvUrl;
            finder.popup();
        });

        $("#setWebmUrl").on("click", function () {
            var finder = new CKFinder();
            //   finder.basePath = '/Content/Admin/Plugins/ckfinder/';
            finder.selectActionFunction = SetWebmUrl;
            finder.popup();
        });


        $("form").validate({

            rules: {
                title: {
                    required: true
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
                var values = {};
                var fields = {};
                for(var instanceName in CKEDITOR.instances){
                    CKEDITOR.instances[instanceName].updateElement();
                }

                $.each($(form).serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });

                $.ajax({
                    url : 'video_post.php',
                    type : 'POST',
                    data : values,
                    success : function(res) {
                        //  $('#resultreturn').prepend(res);
                        if (res) {
                            toastr.success('视频已添加成功！', '添加视频')
                        } else {
                            toastr.error('视频添加失败！', '添加视频')
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>