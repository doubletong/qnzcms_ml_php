<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('includes/output.php');
require_once('data/product.php');
require_once('data/product_category.php');

$productClass = new Product();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $productClass->fetch_data($id);
} else {
    header('Location: products.php');
    exit;
}


$categoryClass = new ProductCategory();
$categories = $categoryClass->get_all();

function buildTree(array $elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }
    return $branch;
}

$tree = buildTree($categories);

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "编辑产品_新闻资讯_后台管理_" . SITENAME; ?>
    </title>
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

                <form novalidate="novalidate">
                    <div class="card">
                        <h5 class="card-header">
                            编辑产品
                        </h5>
                        <div class="card-body">
                            <input id="productId" type="hidden" name="productId" value="<?php echo $data['id']; ?>" />
                            <div class="row">
                                <div class="col">
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="title">产品名称</label>
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title']; ?>" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="categoryId">分类</label>

                                                <select class="form-control" id="category_id" name="category_id" placeholder="">
                                                    <option value="0">--请选择分类--</option>
                                                    <?php foreach ($tree as $model) {
                                                        ?>
                                                        <optgroup label="<?php echo $model["title"]; ?>">

                                                            <?php if ($model['children']) {
                                                                foreach ($model['children'] as $subModel) {
                                                                    ?>
                                                                    <option value="<?php echo $subModel["id"]; ?>" <?php echo  $subModel["id"] == $data["category_id"] ? "selected" : ""; ?>><?php echo $subModel["title"]; ?></option>

                                                                <?php }
                                                        } ?>
                                                        </optgroup>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                 
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="video_id">视频ID</label>
                                                <input type="text" class="form-control" id="video_id" name="video_id" value="<?php echo $data["video_id"]; ?>" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="importance">排序</label>
                                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo empty($data['number']) ? "0" : $data['number']; ?>" placeholder="">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="content">产品描述</label>
                                        <textarea class="form-control" id="content" name="content" placeholder=""><?php echo stripslashes($data['content']); ?></textarea>
                                        <script>
                                            var elFinder = '/js/vendor/elFinder/elfinder-cke.php';
                                            CKEDITOR.replace('content', {
                                                height:350,
                                                filebrowserBrowseUrl: elFinder,
                                                filebrowserImageBrowseUrl: elFinder,
                                                allowedContent: true       
                                            });
                                        </script>
                                    </div>

                                    <div class="form-group">
                                        <label for="specifications">规格参数</label>
                                        <textarea class="form-control" id="specifications" name="specifications" placeholder=""><?php echo stripslashes($data['specifications']); ?></textarea>
                                        <script>
                                            var elFinder = '/js/vendor/elFinder/elfinder-cke.php';
                                            CKEDITOR.replace('specifications', {
                                                height: 350,
                                                filebrowserBrowseUrl: elFinder,
                                                filebrowserImageBrowseUrl: elFinder,
                                                allowedContent: true       
                                            });
                                        </script>
                                    </div>


                                    <div class="form-group">
                                        <label for="registration">注册信息</label>
                                        <textarea class="form-control" id="registration" name="registration" placeholder=""><?php echo stripslashes($data['registration']); ?></textarea>
                                        <script>
                                            var elFinder = '/js/vendor/elFinder/elfinder-cke.php';
                                            CKEDITOR.replace('registration', {
                                                height: 350,
                                                filebrowserBrowseUrl: elFinder,
                                                filebrowserImageBrowseUrl: elFinder,
                                                allowedContent: true       
                                            });
                                        </script>
                                    </div>


                                    <div class="form-group">
                                        <label for="summary">摘要</label>

                                        <textarea class="form-control" id="summary" name="summary" placeholder=""><?php echo $data['summary']; ?></textarea>

                                    </div>
                                

                                    <div class="form-group">
                                        <label for="description">SEO描述</label>

                                        <textarea class="form-control" id="description" name="description" placeholder=""><?php echo $data['description']; ?></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="keywords">关键字</label>

                                        <input type="text" class="form-control" id="keywords" name="keywords" value="<?php echo $data['keywords']; ?>" placeholder="">

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" <?php echo $data['active'] ? "checked" : ""; ?> id="chkActive" name="active">
                                                    <label class="form-check-label" for="chkActive">发布</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" <?php echo $data['recommend'] ? "checked" : ""; ?> id="chkRecommend" name="recommend">
                                                    <label class="form-check-label" for="chkRecommend">推荐</label>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="col-auto">
                                    <div style="width:300px;text-align:center;">
                                        <div class="card">
                                            <div class="card-body">
                                                <img id="iLogo"  src="<?php echo empty($data['thumbnail']) ? "holder.js/250x80?text=210X69像素" : $data['thumbnail']; ?>" class="img-fluid" />
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 图标...</button>
                                                <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo $data['thumbnail']; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width:300px;text-align:center;">
                                        <div class="card">
                                            <div class="card-body">
                                                <img ID="image_url_show"  src="<?php echo empty($data['image_url']) ? "holder.js/250x125?text=962X440像素" : $data['image_url']; ?>"  class="img-fluid"  />
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnImageUrl" class="btn btn-info btn-block"><i
                                                        class="iconfont icon-image"></i> 大图...</button>
                                                <input id="image_url" type="hidden" name="image_url" value="<?php echo $data['image_url']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
                            <a href="products.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>
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

        function SetImageUrl(fileUrl) {
            $('#image_url').val(fileUrl);
            $('#image_url_show').attr('src', fileUrl);
        }


        $(document).ready(function() {
            //当前菜单
            $(".mainmenu>li.products").addClass("nav-open").find("ul>li.list a").addClass("active");

            $("#btnBrowser").on("click", function () {
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();
            });

            $("#btnImageUrl").on("click", function () {
                singleEelFinder.selectActionFunction = SetImageUrl;
                singleEelFinder.open();
            });


            $("form").validate({

                rules: {
                    title: {
                        required: true
                    },
                    category_Id: {
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
                    category_Id: {
                        required: "请选择分类"
                    },
               
                    importance: {
                        required: "请输入序号",
                        digits: "请输入有效的整数"
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
                        url: 'product_post.php',
                        type: 'POST',
                        data: values,
                        success: function(res) {

                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('产品已保存成功！', '编辑产品')
                            } else {
                                toastr.error('产品保存失败！', '编辑产品')
                            }
                        }
                    });

                }
            });
        });
    </script>

</body>

</html>