<?php
require_once('../../includes/common.php');
require_once('../../data/article_category.php');
require_once('../../data/product.php');


$cateModel = new TZGCMS\Admin\ArticleCategory();

$did = isset($_GET['did']) ? $_GET['did'] : "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $cateModel->fetch_data($id);
} else {
    header('Location: article_categories.php?did=' . $did);
    exit;
}

$categories = $cateModel->fetch_all($did);
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

if($did==="6"){
    $productModel = new Product();
    $products = $productModel->fetch_all();

    $selected = explode(",", $data['product_ids']); 
   
}

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "编辑_分类_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>


<link href="/assets/js/vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
    <!-- /nav end -->
    <section class="rightcol">
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>

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
                                    <?php if($did=="6"){ ?>
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
                                            <label for="product_ids">相关产品</label>                                    
                                            <select class="form-control" id="product_ids" name="product_ids[]" multiple="multiple" >                                               
                                                <?php foreach( $products as $product)
                                                {
                                                    if (in_array($product["id"], $selected)){  
                                                    ?>
                                                    <option value="<?php echo $product["id"]; ?>" selected><?php echo $product["title"]; ?></option>         
                                                    <?php }else { ?>
                                                        <option value="<?php echo $product["id"]; ?>"><?php echo $product["title"]; ?></option>         
                                                <?php }  } ?>                                                            
                                            </select>                          
                                        </div>  

                                    <?php } ?>
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
                                    <!-- <div style="width:300px; text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <?php if($did=="6"){ ?>
                                                  <img ID="iLogo" src="<?php echo empty($data['thumbnail'])?"holder.js/240x180?text=580X400像素":$data['thumbnail'];?>" class="img-fluid" />
                                                <?php }else{ ?>
                                                    <img ID="iLogo" src="<?php echo empty($data['thumbnail'])?"holder.js/100x100?text=45X45像素":$data['thumbnail'];?>" class="img-fluid" />
                                                <?php } ?>
                                           
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 缩略图...</button>
                                                <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo $data['thumbnail'];?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php if($did=="16"){ ?>
                                    <div style="width:300px; text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">      
                                                <img ID="iLogo2" src="<?php echo empty($data['thumbnail2'])?"holder.js/240x160?text=580X304像素":$data['thumbnail2'];?>" class="img-fluid" />                                                                                     
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser2" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 缩略图...</button>
                                                <input id="thumbnail2" type="hidden" name="thumbnail2" />
                                            </div>
                                        </div>
                                    </div>  
                                    <?php } ?> -->

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
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

    <script src="/assets/js/vendor/holderjs/holder.min.js"></script>
    <script src="/assets/js/vendor/select2/dist/js/select2.min.js"></script>
    <script src="/assets/js/vendor/select2/dist/js/i18n/zh-CN.js"></script>

    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>

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
            if ("1" == <?php echo $did; ?>) {
                $(".mainmenu>li.articles").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
            }
            if ("2" == <?php echo $did; ?>) {
                $(".mainmenu>li:nth-of-type(4)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
            }
            if ("3" == <?php echo $did; ?>) {
                $(".mainmenu>li:nth-of-type(5)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
            }
            if("6"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(7)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
        }
        if("16"==<?php echo $did; ?>){
            $(".mainmenu>li.medialist").addClass("nav-open").find("ul>li.category a").addClass("active");
        }


        $('#product_ids').select2();


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
                

                    $.ajax({
                        url: 'article_category_post.php',
                        type: 'POST',
                        data:  $(form).serialize(),
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