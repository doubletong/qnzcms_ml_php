<?php
use Models\ProductCategory;
use Models\Product;
require_once('../../includes/common.php');

$pagetitle = isset($_GET['id'])?"编辑产品":"创建产品";
$action = isset($_GET['id'])?"update":"create";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Product::find($id);
    //$data = $cateModel->fetch_data($id);

    $imageUrl = explode('|', $data['image_url']);
}


$categories = ProductCategory::with("children")->where(["parent" => null])->orderby('importance','desc')->get();


$level = 0;
function recursive($items, $level, $parent){
    $level++;
    foreach ($items as $row) {
        $select = (isset($parent) && $row["id"]==$parent)?"selected":"";
        echo '<option value="'.$row["id"].'"  '.$select.' >';
        for($i=1;$i<$level;$i++){
            echo "—";
        }
        echo $row["title"].'</option>';                   
        $children = $row['children'];          
        if(!empty($children)){
            //Call the function again. Increment number by one.
            recursive($children,$level,$parent);
        }
   
    }
}
 


?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pagetitle."_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <link href="/assets/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
    <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>
    <style>
        .img_max{
            object-fit: contain;
            width:100px;
            height:100px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>
            <div class="container-fluid maincontent">

                <form novalidate="novalidate">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $pagetitle;?>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />
                            <div class="row">
                                <div class="col-md">
                                <div class="form-group">
                                <label for="title">主题</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($data['title'])?$data['title']:''; ?>">
                            </div>   

                            <div class="form-group">
                                <label for="parent_id">分类</label> 
                                <select class="form-control" id="category_id" name="category_id" placeholder="" >
                                    <option value="">--请选择父类--</option>
                                    <?php recursive($categories, $level, $data['category_id']); ?>                                                    
                                </select>                              
                            </div>    
                            <div class="form-group">
                                <label for="pdf">组图</label> 
                                <div class="row">
                                    <div class="col-md-auto">
                                        <div class="card">                                        
                                            <div class="card-body">                                       
                                                <img ID="iLogo1" data-default-src="holder.js/100x100?text=600X600像素" src="<?php echo empty($imageUrl[0]) ? "holder.js/100x100?text=600X600像素" : $imageUrl[0]; ?>" class="img_max" />
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnImage01" class="btn btn-info btn-sm btnImage"><i class="fa fa-picture-o"></i> 浏览...</button>
                                                <?php if(!empty($imageUrl[0])){ ?>
                                                <button type="button" id="btnImgDelete01" class="btn btn-danger btn-sm btnImgDelete"><i class="iconfont icon-delete"></i></button>
                                            <?php } ?>
                                                <input id="image_url01" type="hidden" name="image_url01" value="<?php echo isset($imageUrl[0])?$imageUrl[0]:''; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="card">                                        
                                            <div class="card-body">                                       
                                                <img ID="iLogo2" data-default-src="holder.js/100x100?text=600X600像素" src="<?php echo empty($imageUrl[1]) ? "holder.js/100x100?text=600X600像素" : $imageUrl[1]; ?>" class="img_max" />
                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnImage02" class="btn btn-info btn-sm btnImage"><i class="fa fa-picture-o"></i> 浏览...</button>
                                                <?php if(!empty($imageUrl[1])){ ?>
                                                <button type="button" id="btnImgDelete02" class="btn btn-danger btn-sm btnImgDelete"><i class="iconfont icon-delete"></i></button>
                                            <?php } ?>
                                                <input id="image_url02" type="hidden" name="image_url02" value="<?php echo isset($imageUrl[1])?$imageUrl[1]:''; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="card">                                        
                                            <div class="card-body">                                       
                                                <img ID="iLogo3" data-default-src="holder.js/100x100?text=600X600像素" src="<?php echo empty($imageUrl[2]) ? "holder.js/100x100?text=600X600像素" : $imageUrl[2]; ?>" class="img_max" />
                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnImage03" class="btn btn-info btn-sm btnImage"><i class="fa fa-picture-o"></i> 浏览...</button>
                                                <?php if(!empty($imageUrl[2])){ ?>
                                                <button type="button" id="btnImgDelete03" class="btn btn-danger  btn-sm btnImgDelete"><i class="iconfont icon-delete"></i></button>
                                            <?php } ?>
                                                <input id="image_url03" type="hidden" name="image_url03" value="<?php echo isset($imageUrl[2])?$imageUrl[2]:''; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <div class="card">                                        
                                            <div class="card-body">                                       
                                                <img ID="iLogo4" data-default-src="holder.js/100x100?text=600X600像素" src="<?php echo empty($imageUrl[3]) ? "holder.js/100x100?text=600X600像素" : $imageUrl[3]; ?>" class="img_max" />
                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnImage04" class="btn btn-info btn-sm btnImage"><i class="fa fa-picture-o"></i> 浏览...</button>
                                                <?php if(!empty($imageUrl[3])){ ?>
                                                <button type="button" id="btnImgDelete04" class="btn btn-danger btn-sm btnImgDelete"><i class="iconfont icon-delete"></i></button>
                                            <?php } ?>
                                                <input id="image_url04" type="hidden" name="image_url04" value="<?php echo isset($imageUrl[3])?$imageUrl[3]:''; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>  

                            <div class="form-group">
                                <label for="intro">产品描述：</label>
                                <textarea class="form-control" id="content" name="content" placeholder=""><?php echo isset($data['content'])?stripslashes($data['content']):''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php';
                                    CKEDITOR.replace('content', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,                                  
                                        allowedContent: true                  
                                    });
                                </script>
                            </div>                

                            <div class="form-group">
                                <label for="intro">产品特征：</label>
                                <textarea class="form-control" id="feature" name="feature" placeholder=""><?php echo isset($data['feature'])?stripslashes($data['feature']):''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php';
                                    CKEDITOR.replace('feature', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,                                  
                                        allowedContent: true                  
                                    });
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="intro">技术参考：</label>
                                <textarea class="form-control" id="reference" name="reference" placeholder=""><?php echo isset($data['reference'])?stripslashes($data['reference']):''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php';
                                    CKEDITOR.replace('reference', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,                                  
                                        allowedContent: true                  
                                    });
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="intro">行业应用：</label>
                                <textarea class="form-control" id="application" name="application" placeholder=""><?php echo isset($data['application'])?stripslashes($data['application']):''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php';
                                    CKEDITOR.replace('application', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,                                  
                                        allowedContent: true                  
                                    });
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="intro">产品代码：</label>
                                <textarea class="form-control" id="code" name="code" placeholder=""><?php echo isset($data['code'])?stripslashes($data['code']):''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php';
                                    CKEDITOR.replace('code', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,                                  
                                        allowedContent: true                  
                                    });
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="intro">产品下载：</label>
                                <textarea class="form-control" id="downloads" name="downloads" placeholder=""><?php echo isset($data['downloads'])?stripslashes($data['downloads']):''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php';
                                    CKEDITOR.replace('downloads', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,                                  
                                        allowedContent: true                  
                                    });
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:0; ?>" placeholder="值越大越排前">
                            </div>                           

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"  <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">发布</label>
                                </div>
                            </div>
                                </div>
                                <div class="col-md-auto">
                                <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                        <div class="card-header">缩略图</div>
                                            <div class="card-body">                                       
                                                <img ID="iLogo" data-default-src="holder.js/100x100?text=600X600像素" src="<?php echo empty($data['thumbnail']) ? "holder.js/100x100?text=600X600像素" : $data['thumbnail']; ?>" class="img-fluid" />
                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnThumbnail" class="btn btn-info"><i class="fa fa-picture-o"></i> 浏览...</button>
                                                <?php if(!empty($data['thumbnail'])){ ?>
                                                <button type="button" id="btnImgDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                            <?php } ?>
                                                <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo isset($data['thumbnail'])?$data['thumbnail']:''; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">SEO</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title">SEO标题</label>
                                                <input type="text" class="form-control" id="seotitle" name="seotitle" placeholder="" value="<?php echo isset($metadata['title'])?$metadata['title']:''; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="description">SEO描述</label>
                                                <textarea class="form-control" id="seodescription" name="seodescription" rows="6" placeholder=""><?php echo isset($metadata['description'])?$metadata['description']:''; ?></textarea>

                                            </div>
                                            <div class="form-group">
                                                <label for="keywords">关键字</label>

                                                <input type="text" class="form-control" id="seokeywords" name="seokeywords" placeholder="" value="<?php echo isset($metadata['keywords'])?$metadata['keywords']:'';  ?>">

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
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

    <script src="/assets/js/vendor/holderjs/holder.min.js"></script>
    <script src="/assets/js/vendor/toastr/toastr.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        function SetThumbnail(fileUrl) {
            $('#thumbnail').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }
        function SetImage01(fileUrl) {
            $('#image_url01').val(fileUrl);
            $('#iLogo1').attr('src', fileUrl);
        }
        function SetImage02(fileUrl) {
            $('#image_url02').val(fileUrl);
            $('#iLogo2').attr('src', fileUrl);
        }
        function SetImage03(fileUrl) {
            $('#image_url03').val(fileUrl);
            $('#iLogo3').attr('src', fileUrl);
        }
        function SetImage04(fileUrl) {
            $('#image_url04').val(fileUrl);
            $('#iLogo4').attr('src', fileUrl);
        }
        $(document).ready(function() {

            //当前菜单        
            $(".mainmenu>li.agent").addClass("nav-open").find("ul>li.regions a").addClass("active");     


            $("#btnThumbnail").on("click", function () {
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();
            });

            $("#btnImgDelete").on("click", function() {
                $('#background_image').val("");
                $('#iLogo').attr('src', $('#iLogo').attr('data-default-src'));
                var myImage = document.getElementById('iLogo');
                Holder.run({
                    images: myImage
                });
            });

          
            $("#btnImage01").on("click", function () {
                singleEelFinder.selectActionFunction = SetImage01;
                singleEelFinder.open();
            });

            $("#btnImgDelete01").on("click", function() {
                $('#image_url01').val("");
                $('#iLogo01').attr('src', $('#iLogo01').attr('data-default-src'));
                var myImage = document.getElementById('iLogo01');
                Holder.run({
                    images: myImage
                });
            });

            $("#btnImage02").on("click", function () {
                singleEelFinder.selectActionFunction = SetImage02;
                singleEelFinder.open();
            });

            $("#btnImgDelete02").on("click", function() {
                $('#image_url02').val("");
                $('#iLogo02').attr('src', $('#iLogo02').attr('data-default-src'));
                var myImage = document.getElementById('iLogo02');
                Holder.run({
                    images: myImage
                });
            });


            $("#btnImage03").on("click", function () {
                singleEelFinder.selectActionFunction = SetImage03;
                singleEelFinder.open();
            });

            $("#btnImgDelete03").on("click", function() {
                $('#image_url03').val("");
                $('#iLogo03').attr('src', $('#iLogo03').attr('data-default-src'));
                var myImage = document.getElementById('iLogo03');
                Holder.run({
                    images: myImage
                });
            });


            $("#btnImage04").on("click", function () {
                singleEelFinder.selectActionFunction = SetImage04;
                singleEelFinder.open();
            });

            $("#btnImgDelete04").on("click", function() {
                $('#image_url04').val("");
                $('#iLogo04').attr('src', $('#iLogo04').attr('data-default-src'));
                var myImage = document.getElementById('iLogo04');
                Holder.run({
                    images: myImage
                });
            });


   

            $("form").validate({

                rules: {
                    title: {
                        required: true
                    },
                    category_id: {
                        required: true
                    },
                    importance: {
                        required: true,
                        digits:true
                    }

                },
                messages:{
                    title: {
                        required:"请输入主题"
                    },
                    category_id: {
                        required: "请选择分类"
                    },
                    importance: {
                        required: "请输入排序",
                        digits:"请输入有效的整数"
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