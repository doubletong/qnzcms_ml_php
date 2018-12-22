<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('includes/output.php');
require_once('data/product.php');

$productClass = new Product();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $productClass->fetch_data($id);
}else{
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "编辑产品_新闻资讯_后台管理_".SITENAME;?>
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
                        <input id="productId" type="hidden" name="productId" value="<?php echo $data['id'];?>" />
                            <div class="row">
                                <div class="col">
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="title">产品名称</label>
                                                <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title'];?>"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="product_no">型号</label>
                                                <input type="text" class="form-control" id="product_no" name="product_no" value="<?php echo $data['product_no'];?>"
                                                    placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="sub_title">英文名称</label>

                                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="<?php echo $data['sub_title'];?>"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="slogan">标语</label>

                                                <input type="text" class="form-control" id="slogan" name="slogan" value="<?php echo $data['slogan'];?>"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="price">价格</label>

                                                <input type="number" class="form-control" id="price" name="price" value="<?php echo $data['price'];?>"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="link">购买地址</label>

                                                <input type="text" class="form-control" id="link" name="link" value="<?php echo $data['link'];?>"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="imageUrl">
                                                    背景图</label>
                                                <div class="input-group">
                                                    <input id="background" name="background" class="form-control" value="<?php echo $data['background'];?>"
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

                                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo empty($data['number'])?"0":$data['number'];?>"
                                                placeholder="">

                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="content">产品描述</label>

                                        <textarea class="form-control" id="content" name="content" placeholder=""><?php echo stripslashes($data['content']);?></textarea>
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

                                        <textarea class="form-control" id="summary" name="summary"  placeholder=""><?php echo $data['summary'];?></textarea>

                                    </div>
                                    <div class="row">

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="category">分类</label>

                                                <input type="text" class="form-control" id="category" name="category" value="<?php echo $data['category'];?>"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="brand">品牌</label>

                                                <input type="text" class="form-control" id="brand" name="brand" value="<?php echo $data['brand'];?>"
                                                    placeholder="">

                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="form-group">
                                                <label for="company">生产厂商</label>

                                                <input type="text" class="form-control" id="company" name="company" value="<?php echo $data['company'];?>"
                                                    placeholder="">

                                            </div>



                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">SEO描述</label>

                                        <textarea class="form-control" id="description" name="description" placeholder=""><?php echo $data['description'];?></textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="keywords">关键字</label>

                                        <input type="text" class="form-control" id="keywords" name="keywords" value="<?php echo $data['keywords'];?>"
                                            placeholder="">

                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" <?php echo $data['active']?"checked":"";?> id="chkActive"
                                                        name="active">
                                                    <label class="form-check-label"  for="chkActive">发布</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" <?php echo $data['recommend']?"checked":"";?> id="chkRecommend"
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
                                                <img id="iLogo" src="<?php echo empty($data['thumbnail'])?"holder.js/150x169/text:295X333像素":$data['thumbnail'];?>" class="img-responsive img-rounded" />
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i
                                                        class="iconfont icon-image"></i> 缩略图...</button>
                                                        <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo $data['thumbnail'];?>" />
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
        $(".mainmenu>li:nth-of-type(2)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");

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
                price:{
                    number:true
                },
                link:{
                    url:true
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
                product_no: {
                    required: "请输入型号"
                },
                price:{
                    number:"请输入数字格式"
                },
                link:{
                    url:"请输入正确的网址格式"
                },
                importance: {
                    required: "请输入序号",
                    digits:"请输入有效的整数"
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
                    url : 'product_post.php',
                    type : 'POST',
                    data : values,
                    success : function(res) {

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