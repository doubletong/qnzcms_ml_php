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


do_html_doctype("编辑产品_后台管理".SITENAME);
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
        <li><a href="products.php">产品管理</a></li>
        <li class="active">编辑产品</li>

    </ol>
</div>
<div class="main-content">

    <div class="panel panel-default">
        <div class="panel-heading">
            编辑产品
        </div>
        <div class="panel-body">
            <form class="form-horizontal" style="position: relative;"  novalidate="novalidate">
                <input id="productId" type="hidden" name="productId" value="<?php echo $data['id'];?>" />
                <div style="width:180px; position:absolute;right:0;top:0;z-index:100; text-align:center;">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <img ID="iLogo" src="<?php echo empty($data['thumbnail'])?"holder.js/150x169/text:295X333像素":$data['thumbnail'];?>" class="img-responsive img-rounded" />
                        </div>
                        <div class="panel-footer">
                            <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="fa fa-picture-o"></i> 缩略图...</button>
                            <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo $data['thumbnail'];?>" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="product_no" class="col-sm-2 control-label">型号</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="product_no" name="product_no" placeholder="" value="<?php echo $data['product_no'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">产品名称</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo $data['title'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sub_title" class="col-sm-2 control-label">英文名称</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="sub_title" name="sub_title" placeholder="" value="<?php echo $data['sub_title'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="slogan" class="col-sm-2 control-label">标语</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="slogan" name="slogan" placeholder="" value="<?php echo $data['slogan'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">价格</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="price" name="price" placeholder="" value="<?php echo $data['price'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="link" class="col-sm-2 control-label">购买地址</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="link" name="link" placeholder="" value="<?php echo $data['link'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        背景图</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input id="background" name="background"  class="form-control" placeholder="背景图" value="<?php echo $data['background'];?>"></asp:TextBox>
                                  <span class="input-group-btn">
                                    <button class="btn btn-default" id="setImageUrl" type="button">浏览…</button>
                                  </span>
                        </div><!-- /input-group -->
                        <span class="help-block">图片尺寸：651*333像素</span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="importance" class="col-sm-2 control-label">排序</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="importance" name="importance" value="<?php echo empty($data['number'])?"0":$data['number'];?>" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="txtBody" class="col-sm-2 control-label">产品描述</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="content" name="content" placeholder=""><?php echo stripslashes($data['content']);?></textarea>
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
                    <label for="description" class="col-sm-2 control-label">摘要</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="summary" name="summary" placeholder=""><?php echo $data['summary'];?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="link" class="col-sm-2 control-label">品牌</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="brand" name="brand" placeholder="" value="<?php echo $data['brand'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="link" class="col-sm-2 control-label">生产厂商</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="company" name="company" placeholder="" value="<?php echo $data['company'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="link" class="col-sm-2 control-label">分类</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="category" name="category" placeholder="" value="<?php echo $data['category'];?>">
                    </div>
                </div>


                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">SEO描述</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="description" name="description" placeholder=""><?php echo $data['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keywords" class="col-sm-2 control-label">关键字</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keywords" name="keywords" placeholder="" value="<?php echo $data['keywords'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" <?php echo $data['recommend']?"checked":"";?> name="recommend"> 推荐首页
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" <?php echo $data['active']?"checked":"";?> name="active" > 发布
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">保存</button>
                        <a href="products.php" class="btn btn-default">返回</a>
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

    function SetBackground(fileUrl) {
        $('#background').val(fileUrl);
    }
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu li.liitem:nth-of-type(2)").addClass("nav-open").find("ul li:nth-of-type(1) a").addClass("active");

        $("#btnBrowser").on("click", function () {
            var finder = new CKFinder();
            //   finder.basePath = '/Content/Admin/Plugins/ckfinder/';
            finder.selectActionFunction = SetThumbnail;
            finder.popup();
        });

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