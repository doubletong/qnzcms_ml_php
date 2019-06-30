<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/product_category.php');

$cateModel = new ProductCategory();


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $cateModel->fetch_data($id);
} else {
    header('Location: product_categories.php');
    exit;
}

$categories = $cateModel->get_all();
function buildTree(array $elements, $parentId = 0) {
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
    <title><?php echo "编辑_分类_后台管理_" . SITENAME; ?></title>
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
                            编辑分类
                        </div>

                        <div class="card-body">
                            <input id="categoryId" type="hidden" name="categoryId" value="<?php echo $data["id"]; ?>" />
                            <input id="dictionary_id" type="hidden" name="dictionary_id" value="<?php echo $data["dictionary_id"]; ?>" />
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">主题</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $data["title"]; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="parent_id">分类</label>                           
                                    
                                        <select class="form-control" id="parent_id" name="parent_id" placeholder="" >
                                            <option value="0">--请选择父类--</option>
                                            <?php foreach( $tree as $model)
                                            {
                                                ?>
                                                        <option value="<?php echo $model["id"]; ?>"   <?php echo $model["id"]==$data["parent_id"]?"selected":""; ?> ><?php echo $model["title"]; ?></option>

                                            <?php if($model['children']){ 
                                                 foreach( $model['children'] as $subModel){
                                                ?>
                                                    <!-- <option value="<?php echo $subModel["id"]; ?>" <?php echo $subModel["id"]==$data["parent_id"]?"selected":""; ?> > - <?php echo $subModel["title"]; ?></option> -->

                                                <?php }}
                                        
                                        } ?>
                                                            
                                        </select>                          
                                    </div>

                                    <div class="form-group">
                                        <label for="importance">排序</label>
                                        <input type="number" class="form-control" id="importance" name="importance" value="<?php echo $data["importance"]; ?>" placeholder="值越大越排前">
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" <?php echo $data['active'] ? "checked" : ""; ?> id="chkActive" name="active">
                                            <label class="form-check-label" for="chkActive">发布</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-auto">
                                    <div style="width:300px; text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                            
                                                  <img ID="iLogo" src="<?php echo empty($data['thumbnail'])?"holder.js/240x180?text=图片":$data['thumbnail'];?>" class="img-fluid" />
                                             
                                           
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 缩略图...</button>
                                                <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo $data['thumbnail'];?>" />
                                                <small id="emailHelp" class="form-text text-muted">大类顶部背景尺寸：1920x550像素；小类背景尺寸：960X374像素</small>                                              
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width:300px; text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">      
                                                <img ID="iLogo2" src="<?php echo empty($data['thumbnail2'])?"holder.js/240x120?text=960X420像素":$data['thumbnail2'];?>" class="img-fluid" />
                                                                                                                                                                       
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser2" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 大类首页背景...</button>
                                                <input id="thumbnail2" type="hidden" name="thumbnail2" value="<?php echo $data['thumbnail2'];?>"/>
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
        function SetThumbnail2(fileUrl) {
            $('#thumbnail2').val(fileUrl);
            $('#iLogo2').attr('src', fileUrl);
        }

        $(document).ready(function() {
            //当前菜单
          
            $(".mainmenu>li.products").addClass("nav-open").find("ul>li.category a").addClass("active");
          
         

            $("#btnBrowser").on("click", function() {
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();

            });
            $("#btnBrowser2").on("click", function() {
                singleEelFinder.selectActionFunction = SetThumbnail2;
                singleEelFinder.open();

            });


            $("#editform").validate({

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
                        url: 'product_category_post.php',
                        type: 'POST',
                        data: values,
                        success: function(res) {
                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('分类已编辑成功！', '编辑分类')
                            } else {

                                toastr.error('分类编辑失败！', '编辑分类')
                            }
                        }
                    });


                }
            });
        });
    </script>

</body>

</html>