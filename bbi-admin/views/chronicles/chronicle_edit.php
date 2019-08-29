<?php
require_once('../../includes/common.php');
require_once('../../data/chronicle.php');

$did = isset($_GET['did'])?$_GET['did']:"";

$chronicleClass = new TZGCMS\Admin\Chronicle();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $chronicleClass->fetch_data($id);
}

$pageTitle = isset($_GET['id'])?"编辑事件":"创建事件";

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle."_事件_后台管理_" .$site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link href="/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
    <script src="/js/vendor/ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('../../includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('../../includes/header.php'); ?>
            <div class="container-fluid maincontent">

                <form novalidate="novalidate">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $pageTitle; ?>
                        </div>
                        <div class="card-body">

                            <input id="chronicleId" type="hidden" name="chronicleId" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                            <input id="dictionary_id" type="hidden" name="dictionary_id" value="<?php echo isset($data['dictionary_id'])?$data['dictionary_id']:0; ?>" />
                            <div class="row">
                            <div class="col-md">
                            <div class="form-group">
                                <label for="title">年份</label>
                                <input type="number" class="form-control" id="year" name="year" placeholder="" value="<?php echo isset($data['year'])?$data['year']:''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="title">月份</label>
                                <input type="number" class="form-control" id="month" name="month" placeholder="" value="<?php echo isset($data['month'])?$data['month']:''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">事件描述</label>
                                <textarea class="form-control" id="description" name="description" placeholder=""><?php echo isset($data['description'])?$data['description']:''; ?></textarea>
                                <!-- 
                                    <script>
                                    var elFinder = '/js/vendor/elfinder/elfinder-cke.php'; 
                                        CKEDITOR.replace( 'description', {
                                        
                                            filebrowserBrowseUrl: elFinder,
                                            filebrowserImageBrowseUrl: elFinder,
                                            allowedContent: true 
                                        });
                                    </script>                
                                -->
                            </div>
                            </div>
                        
                            <div class="col-md-auto">
                                <div style="width:300px; text-align:center;" class="mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <img ID="iLogo" data-default-src="holder.js/240x240?text=500X500像素" src="<?php echo empty($data['image_url']) ? "holder.js/240x240?text=500X500像素" : $data['image_url']; ?>" class="img-fluid" />                              
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" id="btnBrowser" class="btn btn-info"><i class="iconfont icon-image"></i> 缩略图...</button>
                                            <?php if(!empty($data['image_url'])){ ?>
                                                <button type="button" id="btnImgDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                            <?php } ?>
                                            <input id="image_url" type="hidden" name="image_url" value="<?php echo isset($data['image_url'])?$data['image_url']:''; ?>"/>
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

    <script src="/js/vendor/holderjs/holder.min.js"></script>
    <script src="/js/vendor/toastr/toastr.min.js"></script>
    <script src="/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        function SetImageUrl(fileUrl) {
            $('#image_url').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }

        $(document).ready(function() {
            //当前菜单      
            $(".mainmenu>li.chronicles").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
           
            $("#btnImgDelete").on("click", function() {
                $('#image_url').val("");
                $('#iLogo').attr('src', $('#iLogo').attr('data-default-src'));
                var myImage = document.getElementById('iLogo');
                Holder.run({
                    images: myImage
                });
            });

            $("#btnBrowser").on("click", function() {
                singleEelFinder.selectActionFunction = SetImageUrl;
                singleEelFinder.open();
            });


            $("form").validate({

                rules: {
                    year: {
                        required: true,
                        digits: true
                    },
                    description: {
                        required: true
                    }
                },
                messages: {
                    year: {
                        required: "请输入主标题",
                        digits: "请输入有效的年份"
                    },
                    description: {
                        required: "请输入事件描述",
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
                        url: 'chronicle_post.php',
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