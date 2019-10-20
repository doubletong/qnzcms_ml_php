<?php
require_once('../../includes/common.php');
require_once('../../data/case.php');
require_once('../../data/case_category.php');


$caseClass = new TZGCMS\Admin\CaseShow();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $caseClass->fetch_data($id);
}
$categoryClass = new TZGCMS\Admin\CaseCategory();
$categories = $categoryClass->fetch_all();

$pageTitle = isset($_GET['id']) ? "编辑案例" : "创建案例";

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle . "_案例_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>


    <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>

</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('../../includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('../../includes/header.php'); ?>

            <div class="container-fluid maincontent">

                <form novalidate="novalidate" id="editform">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $pageTitle; ?>
                        </div>

                        <div class="card-body">
                            <input id="caseId" type="hidden" name="caseId" value="<?php echo isset($data['id']) ? $data['id'] : 0; ?>" />
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">主题</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($data['title']) ? $data['title'] : ''; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="category">类别</label>
                                        <select class="form-control" id="categoryid" name="categoryid" placeholder="">
                                            <option value="">--请选择分类--</option>
                                            <?php foreach ($categories as $model) {
                                                if (isset($data['categoryi']) && $model["id"] === $data["categoryid"]) {
                                                    ?>
                                                    <option value="<?php echo $model["id"]; ?>" selected><?php echo $model["title"]; ?></option>

                                                <?php } else { ?>

                                                    <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?> </option>
                                            <?php }
                                            } ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="importance">排序</label>
                                        <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance']) ? $data['importance'] : 0; ?>" placeholder="值越大越排前">
                                    </div>

                                    <div class="form-group">
                                        <label for="content">案例内容</label>
                                        <textarea class="form-control" id="body" name="body" placeholder=""><?php echo isset($data['body']) ? stripslashes($data['body']) : ''; ?></textarea>
                                        <script>
                                            var elFinder = '/js/vendor/elfinder/elfinder-cke.html';
                                            CKEDITOR.replace('body', {

                                                filebrowserBrowseUrl: elFinder,
                                                filebrowserImageBrowseUrl: elFinder
                                            });
                                        </script>
                                    </div>

                                    <div class="form-group">
                                        <label for="summary">摘要</label>
                                        <textarea class="form-control" id="summary" name="summary" placeholder=""><?php echo isset($data['summary']) ? $data['summary'] : ''; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="pubdate">发布日期</label>
                                        <input class="form-control" id="pubdate" name="pubdate" value="<?php echo isset($data['pubdate']) ? date('Y-m-d', $data['pubdate']) : date("Y-m-d"); ?>" placeholder="" type="date" />
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active'] ? "checked" : "") : "checked"; ?> id="chkActive" name="active">
                                            <label class="form-check-label" for="chkActive">发布</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" <?php echo (isset($data['recommend']) && $data['recommend']) ? "checked" : ""; ?> id="chkRecommend" name="recommend">
                                            <label class="form-check-label" for="chkRecommend">推荐</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-auto">
                                    <div style="width:300px; text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">

                                                <img ID="iLogo" src="<?php echo empty($data['thumbnail']) ? "holder.js/240x180?text=380X275像素" : $data['thumbnail']; ?>" class="img-fluid" />
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 缩略图...</button>
                                                <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo isset($data['thumbnail']) ? $data['thumbnail'] : ''; ?>" />
                                            </div>
                                        </div>


                                    </div>
                                    <div class="card">
                                        <div class="card-header">SEO</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="description">SEO描述</label>

                                                <textarea class="form-control" id="description" name="description" rows="6" placeholder=""><?php echo isset($data['description']) ? $data['description'] : ''; ?></textarea>

                                            </div>
                                            <div class="form-group">
                                                <label for="keywords">关键字</label>

                                                <input type="text" class="form-control" id="keywords" name="keywords" placeholder="" value="<?php echo isset($data['keywords']) ? $data['keywords'] : '';  ?>">

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
            $('#thumbnail').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }


        $(document).ready(function() {
            //当前菜单
            $(".mainmenu>li.cases").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");


            $("#btnBrowser").on("click", function() {
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();

            });



            $("#editform").validate({

                rules: {
                    title: {
                        required: true
                    },
                    categoryid: {
                        required: true
                    },
                    pubdate: {
                        required: true,
                        date: true
                    }


                },
                messages: {
                    title: {
                        required: "请输入主标题"
                    },
                    categoryid: {
                        required: "请选择类别"
                    },
                    pubdate: {
                        required: "请选择发布日期",
                        date: "日期格式不正确"
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
                        url: 'case_post.php',
                        type: 'POST',
                        data: values,
                        success: function(res) {
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