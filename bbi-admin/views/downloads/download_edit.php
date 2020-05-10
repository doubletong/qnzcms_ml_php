<?php
use Models\DownloadCategory;
use Models\Download;
require_once('../../includes/common.php');

$pagetitle = isset($_GET['id'])?"编辑文档":"创建文档";
$action = isset($_GET['id'])?"update":"create";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Download::find($id);
    //$data = $cateModel->fetch_data($id);

    $imageUrl = explode('|', $data['image_url']);
}


$categories = DownloadCategory::orderby('importance','desc')->get();


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
                                <label for="file_url">
                                    文档</label>
                                <div class="input-group">
                                    <input id="file_url" name="file_url" class="form-control" placeholder="" value="<?php echo isset($data['file_url'])?$data['file_url']:''; ?>" aria-describedby="setFileUrl">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="setFileUrl" type="button">浏览…</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="intro">内容</label>
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
                                <label for="intro">描述</label>
                                <textarea class="form-control" id="description" name="description" placeholder=""><?php echo isset($data['description'])?stripslashes($data['description']):''; ?></textarea>
                              
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
                                                <img ID="iLogo" data-default-src="holder.js/180x240?text=280X380像素" src="<?php echo empty($data['thumbnail']) ? "holder.js/180x240?text=280X380像素" : $data['thumbnail']; ?>" class="img-fluid" />
                                          
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
        function SetFileUrl(fileUrl) {
            $('#file_url').val(fileUrl);
        }

        $(document).ready(function() {

            //当前菜单        
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');        
            $(".mainmenu>li.agent").addClass("nav-open").find("ul>li.list a").addClass("active");     


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

            $("#setFileUrl").on("click", function() {
                singleEelFinder.selectActionFunction = SetFileUrl;
                singleEelFinder.open();
            });
          
            
   

            $("form").validate({

                rules: {
                    title: {
                        required: true
                    },
                    category_id: {
                        required: true
                    },
                    file_url: {
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
                    file_url: {
                        required: "请选择文档"
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
                        url: 'download_post.php',
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