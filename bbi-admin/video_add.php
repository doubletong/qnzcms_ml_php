<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/dictionary.php');
$dictionaryClass = new Dictionary();
$dictionaries = $dictionaryClass->get_dictionaries_byid(3);

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "添加_视频_后台管理_" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>
    <link href="../js/vendor/toastr/toastr.min.css" rel="stylesheet" />
    <script src="../js/vendor/ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('includes/header.php'); ?>

            <div class="container-fluid maincontent">


                <form novalidate="novalidate" id="editform">
                    <div class="card">
                        <div class="card-header">
                            添加视频
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md">
                                 
                                    <div class="form-group">
                                        <label for="title">主题</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="视频标题">
                                    </div>
                                    <div class="form-group">
                                        <label for="dictionary_id">类别</label>

                                        <select class="form-control" id="dictionary_id" name="dictionary_id" placeholder="">
                                            <option value="">--请选择类别--</option>
                                            <?php foreach ($dictionaries as $model) {
                                                ?>
                                                <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?></option>

                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">优酷视频ID</label>                                        
                                        <input id="videoUrl" name="videoUrl" class="form-control" placeholder="" >    
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="title">视频（ogv）</label>
                                        <div class="input-group">
                                            <input id="ogvUrl" name="ogvUrl" class="form-control" placeholder="" aria-describedby="setOgvUrl">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="setOgvUrl" type="button">浏览…</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="title">视频（webm）</label>
                                        <div class="input-group">
                                            <input id="webmUrl" name="webmUrl" class="form-control" placeholder="" aria-describedby="setWebmUrl">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="setWebmUrl" type="button">浏览…</button>
                                            </div>
                                        </div>

                                    </div> -->
                                    <div class="form-group">
                                        <label for="importance">排序</label>

                                        <input type="number" class="form-control" id="importance" name="importance" value="0" placeholder="">

                                    </div>


                                    <div class="form-group">
                                        <label for="content">内容</label>
                                        <textarea class="form-control" id="content" name="content" placeholder=""></textarea>
                                        <script>
                                            var elFinder = '/js/vendor/elfinder/elfinder-cke.html';
                                            CKEDITOR.replace('content', {

                                                filebrowserBrowseUrl: elFinder,
                                                filebrowserImageBrowseUrl: elFinder,
                                                allowedContent: true
                                            });
                                        </script>
                                    </div>


                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" checked id="chkActive" name="active">
                                            <label class="form-check-label" for="chkActive">发布</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="chkRecommend" name="recommend">
                                            <label class="form-check-label" for="chkRecommend">首页推荐</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-auto">
                                    <div style="width:300px; text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <img ID="iLogo" src="holder.js/240x280?text=580X632像素" class="img-responsive img-rounded" />
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 大图...</button>
                                                <input id="thumbnail" type="hidden" name="thumbnail" />
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width:300px; text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <img ID="iLogo2" src="holder.js/240x160?text=580X304像素" class="img-responsive img-rounded" />
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser2" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 小图...</button>
                                                <input id="thumbnail2" type="hidden" name="thumbnail2" />
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="card">
                                        <div class="card-header">SEO</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="description">SEO描述</label>
                                                <textarea class="form-control" id="description" rows="6" name="description" placeholder=""></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="keywords">关键字</label>
                                                <input type="text" class="form-control" id="keywords" name="keywords" placeholder="">
                                            </div>
                                        </div>

                                    </div> -->
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
            <?php require_once('includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once('includes/scripts.php'); ?>

    <script src="../js/vendor/holderjs/holder.min.js"></script>
    <script src="../js/vendor/toastr/toastr.min.js"></script>
    <script src="../js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>

    <script type="text/javascript">
        function SetThumbnail(fileUrl) {
            $('#thumbnail').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }
        function SetThumbnail2(fileUrl) {
            $('#thumbnail2').val(fileUrl);
            $('#iLogo2').attr('src', fileUrl);
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

        $(document).ready(function() {
            //当前菜单

            $(".mainmenu>li:nth-of-type(16)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");

            $("#btnBrowser").on("click", function() {
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();
            });
            $("#btnBrowser2").on("click", function() {
                singleEelFinder.selectActionFunction = SetThumbnail2;
                singleEelFinder.open();
            });

            $("#setVideoUrl").on("click", function() {
                singleEelFinder.selectActionFunction = SetVideoUrl;
                singleEelFinder.open()

            });

            $("#setOgvUrl").on("click", function() {
                singleEelFinder.selectActionFunction = SetOgvUrl;
                singleEelFinder.open();

            });

            $("#setWebmUrl").on("click", function() {
                singleEelFinder.selectActionFunction = SetWebmUrl;
                singleEelFinder.open()

            });


            $("form").validate({

                rules: {
                    title: {
                        required: true
                    },

                    importance: {
                        required: true,
                        digits: true
                    }

                },
                messages: {
                    title: {
                        required: "请输入主标题"
                    },

                    importance: {
                        required: "请输入序号",
                        digits: "请输入有效的整数"
                    }

                },

                errorClass: "help-block",
                errorElement: "span",
                highlight: function(element, errorClass, validClass) {
                    $(element).parents('.form-group').removeClass('has-success');
                    $(element).parents('.form-group').addClass(' has-error');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents('.form-group').removeClass(' has-error');
                    $(element).parents('.form-group').addClass('has-success');
                },
                submitHandler: function(form) {
                    //form.submit();
                    var values = {};
                    var fields = {};
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    $.each($(form).serializeArray(), function(i, field) {
                        values[field.name] = field.value;
                    });

                    $.ajax({
                        url: 'video_post.php',
                        type: 'POST',
                        data: values,
                        success: function(res) {
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