<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('includes/output.php');
require_once('data/product.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "添加产品_新闻资讯_后台管理_".SITENAME;?>
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
                            添加产品
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="title">产品名称</label>
                                                <input type="text" class="form-control" id="title" name="title"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="product_no">型号</label>
                                                <input type="text" class="form-control" id="product_no" name="product_no"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="sub_title">英文名称</label>

                                                <input type="text" class="form-control" id="sub_title" name="sub_title"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="slogan">标语</label>

                                                <input type="text" class="form-control" id="slogan" name="slogan"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="price">价格</label>

                                                <input type="text" class="form-control" id="price" name="price"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="link">购买地址</label>

                                                <input type="text" class="form-control" id="link" name="link"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="imageUrl">
                                                    背景图</label>
                                                <div class="input-group">
                                                    <input id="background" name="background" class="form-control"
                                                        placeholder="大图" aria-describedby="setImageUrl">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-secondary" id="setImageUrl" type="button">浏览…</button>
                                                    </div>
                                                </div>
                                                <small id="emailHelp" class="form-text text-muted">图片尺寸：500*500像素</small>

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="importance">排序</label>

                                                <input type="number" class="form-control" id="importance" name="importance"
                                                    value="0" placeholder="">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="content">产品描述</label>

                                        <textarea class="form-control" id="content" name="content" placeholder=""></textarea>
                                        <script>
                                            var elFinder = '<?php echo SITEPATH; ?>/js/vendor/elFinder/elfinder-cke.html'; 
                                    CKEDITOR.replace( 'content', {
                                      
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder                                                   
                                    });
                                </script>


                                    </div>
                                    <div class="form-group">
                                        <label for="summary">摘要</label>

                                        <textarea class="form-control" id="summary" name="summary" placeholder=""></textarea>

                                    </div>
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="category">分类</label>

                                                <input type="text" class="form-control" id="category" name="category"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="brand">品牌</label>

                                                <input type="text" class="form-control" id="brand" name="brand"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="form-group">
                                                <label for="company">生产厂商</label>

                                                <input type="text" class="form-control" id="company" name="company"
                                                    placeholder="">

                                            </div>



                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">SEO描述</label>

                                        <textarea class="form-control" id="description" name="description" placeholder=""></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="keywords">关键字</label>

                                        <input type="text" class="form-control" id="keywords" name="keywords"
                                            placeholder="">

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" checked id="chkActive"
                                                        name="active">
                                                    <label class="form-check-label" for="chkActive">发布</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" checked id="chkRecommend"
                                                        name="recommend">
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
                                                <img ID="iLogo" src="holder.js/250x250/text:250X250像素" class="img-responsive img-rounded" />
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i
                                                        class="iconfont icon-image"></i> 缩略图...</button>
                                                <input id="thumbnail" type="hidden" name="thumbnail" />
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

        function SetBackground(fileUrl) {
            $('#background').val(fileUrl);
        }
        $(document).ready(function () {
            //当前菜单
            $(".mainmenu>li:nth-of-type(2)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");

            $("#btnBrowser").on("click", function () {
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();
            });

            $("#setImageUrl").on("click", function () {
                singleEelFinder.selectActionFunction = SetBackground;
                singleEelFinder.open();
            });


            $("form").validate({

                rules: {
                    title: {
                        required: true
                    },
                    product_no: {
                        required: true
                    },
                    price: {
                        number: true
                    },
                    link: {
                        url: true
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
                    product_no: {
                        required: "请输入型号"
                    },
                    price: {
                        number: "请输入数字格式"
                    },
                    link: {
                        url: "请输入正确的网址格式"
                    },
                    importance: {
                        required: "请输入序号",
                        digits: "请输入有效的整数"
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
                    var values = {};
                    var fields = {};
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    $.each($(form).serializeArray(), function (i, field) {
                        values[field.name] = field.value;
                    });

                    $.ajax({
                        url: 'product_post.php',
                        type: 'POST',
                        data: values,
                        success: function (res) {
                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('产品已添加成功！', '添加产品')
                            } else {
                                toastr.error('产品添加失败！', '添加产品')
                            }
                        }
                    });


                }
            });
        });
    </script>

</body>

</html>