<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/document.php');
require_once('data/dictionary.php');
$dictionaryClass = new Dictionary();
$dictionaries = $dictionaryClass->get_dictionaries_byid(5);


$documentClass = new Document();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $documentClass->fetch_data($id);
} else {
    header('Location: index.php');
    exit;
}


?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "编辑文档_后台管理_" . SITENAME; ?></title>
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
                            编辑文档
                        </div>
                        <div class="card-body">
                            <input id="documentId" type="hidden" name="documentId" value="<?php echo $data['id']; ?>" />

                            <div class="row">
                                <div class="col">


                                    <div class="form-group">
                                        <label for="title">标题</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo $data['title']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="dictionary_id">类别</label>
                                        <select class="form-control" id="dictionary_id" name="dictionary_id" placeholder="">
                                            <option value="">--请选择类别--</option>
                                            <?php foreach ($dictionaries as $model) {
                                                if ($data['dictionary_id'] == $model["id"]) {
                                                    ?>
                                                    <option value="<?php echo $model["id"]; ?>" selected><?php echo $model["title"]; ?></option>

                                                <?php } else { ?>
                                                    <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?></option>
                                                <?php
                                            }
                                        } ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="file_url">
                                            文档</label>
                                        <div class="input-group">
                                            <input id="file_url" name="file_url" class="form-control" placeholder="" value="<?php echo $data['file_url']; ?>" aria-describedby="setFileUrl">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="setFileUrl" type="button">浏览…</button>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="importance">排序</label>
                                        <input class="form-control" id="importance" name="importance" value="<?php echo $data['importance']; ?>" placeholder="" type="number" />
                                    </div>


                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" <?php echo $data['active'] ? "checked" : ""; ?> id="chkActive" name="active">
                                            <label class="form-check-label" for="chkActive">发布</label>
                                        </div>
                                    </div>



                                </div>
                                <div class="col-auto">
                                    <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <img ID="iLogo" src="<?php echo empty($data['thumbnail']) ? "holder.js/180x240?text=380X516像素" : $data['thumbnail']; ?>" class="img-fluid" />
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="fa fa-picture-o"></i> 缩略图...</button>
                                                <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo $data['thumbnail']; ?>" />
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

        function SetFileUrl(fileUrl) {
            $('#file_url').val(fileUrl);
        }




        $(document).ready(function() {
            //当前菜单

            $(".mainmenu>li:nth-of-type(17)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");




            $("#btnBrowser").on("click", function() {
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();

            });

            $("#setFileUrl").on("click", function() {
                singleEelFinder.selectActionFunction = SetFileUrl;
                singleEelFinder.open();
            });


            $("form").validate({

                rules: {
                    title: {
                        required: true
                    },

                    file_url: {
                        required: true
                    }

                },
                messages: {
                    title: {
                        required: "请输入主标题"
                    },

                    file_url: {
                        required: "请选择文档"
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
                        url: 'document_post.php',
                        type: 'POST',
                        data: values,
                        success: function(res) {

                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('新闻已保存成功！', '编辑新闻')
                            } else {
                                toastr.error('新闻保存失败！', '编辑新闻')
                            }
                        }
                    });

                }
            });
        });
    </script>

</body>

</html>