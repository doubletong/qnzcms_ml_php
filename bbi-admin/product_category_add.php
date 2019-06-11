<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/product_category.php');
require_once('data/product.php');

$did = isset($_GET['did'])?$_GET['did']:"";

$articleClass = new Product();
$pageConfig = $articleClass->get_section_title($did);

$cateModel = new ProductCategory();
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
    <title><?php echo "创建".$pageConfig['category']."_".$pageConfig['section']."_后台管理_" . SITENAME; ?></title>
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
                            创建<?php echo $pageConfig['category']; ?>
                        </div>

                        <div class="card-body">
                            <input id="categoryId" type="hidden" name="categoryId" value="0" />
                            <input id="dictionary_id" type="hidden" name="dictionary_id" value="<?php echo $did; ?>" />
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">主题</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="">
                                    </div>
                              
                                        <div class="form-group">
                                        <label for="parent_id">分类</label>                                    
                                        <select class="form-control" id="parent_id" name="parent_id" placeholder="" >
                                            <option value="0">--请选择父类--</option>
                                            <?php foreach( $tree as $model)
                                            {
                                                ?>
                                                        <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?></option>

                                            <?php if($model['children']){ 
                                                 foreach( $model['children'] as $subModel){
                                                ?>
                                                    <!-- <option value="<?php echo $subModel["id"]; ?>"> - <?php echo $subModel["title"]; ?></option> -->

                                                <?php }
                                        }
                                        } ?>
                                                            
                                        </select>                          
                                    </div>                                   
                         
                                    

                                    <div class="form-group">
                                        <label for="importance">排序</label>
                                        <input type="number" class="form-control" id="importance" name="importance" value="0" placeholder="值越大越排前">
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" checked id="chkActive" name="active">
                                            <label class="form-check-label" for="chkActive">发布</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-auto">
                                    <div style="width:300px; text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                            <?php if($did=="6"){ ?>
                                                <img ID="iLogo" src="holder.js/240x180?text=580X400像素" class="img-responsive img-rounded" />     
                                                <?php }elseif($did=="16"){ ?>   
                                                    <img ID="iLogo" src="holder.js/240x280?text=580X632像素" class="img-responsive img-rounded" />    
                                                <?php }else{ ?>
                                                    <img ID="iLogo" src="holder.js/100x100?text=45X45像素" class="img-responsive img-rounded" />
                                                <?php } ?>
                                              
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 缩略图...</button>
                                                <input id="thumbnail" type="hidden" name="thumbnail" />
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



        $(document).ready(function() {
            //当前菜单
            if("1"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(3)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
        }
        if("2"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(4)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
        }
        if("3"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(5)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
        }

        if("6"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(7)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
        }

        
            $("#btnBrowser").on("click", function() {
                singleEelFinder.selectActionFunction = SetThumbnail;
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
                        url: 'article_category_post.php',
                        type: 'POST',
                        data: values,
                        success: function(res) {
                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('<?php echo $pageConfig['category'];?>已添加成功！', '添加<?php echo $pageConfig['category'];?>')
                            } else {

                                toastr.error('<?php echo $pageConfig['category'];?>添加失败！', '添加<?php echo $pageConfig['category'];?>')
                            }
                        }
                    });

                }
            });
        });
    </script>

</body>

</html>