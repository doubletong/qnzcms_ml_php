<?php
require_once('../../includes/common.php');

use Models\SocialSoftware;


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = SocialSoftware::find($id);    
}

$action = isset($_GET['id'])?"update":"create";
$pageTitle = isset($_GET['id']) ? "编辑类型" : "创建类型";

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle . "_下载_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('../../includes/nav_system.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('../../includes/header.php'); ?>

            <div class="main-content"> 
                <div class="breadcrumb-container">
                    <div class="row">
                        <div class="col-md">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                                <li class="breadcrumb-item"><a href="/bbi-admin/views/socials/index.php">社交</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?></li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-md-auto">
                            <time id="sitetime"></time>
                        </div>
                    </div>
                </div> 

                <form novalidate="novalidate" id="editform">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $pageTitle; ?>
                        </div>
                        <div class="card-body">
                            <input id="id" type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : 0; ?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />

                            <div class="row">
                                <div class="col-md">

                                    <div class="form-group">
                                        <label for="name">名称</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="iconfont">字体图标</label>
                                        <input type="text" class="form-control" id="iconfont" name="iconfont" value="<?php echo isset($data['iconfont']) ? $data['iconfont'] : ''; ?>" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="importance">排序</label>
                                        <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance']) ? $data['importance'] : '0'; ?>" placeholder="">
                                    </div>
                                
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active'] ? "checked" : "") : "checked"; ?> id="chkActive" name="active">
                                            <label class="form-check-label" for="chkActive">发布</label>
                                        </div>
                                    </div>
                                    </div>
                                <div class="col-md-auto">
                                    <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-header">图标</div>
                                                <div class="card-body">                                       
                                                    <img ID="imgIcon" data-default-src="holder.js/120x120?text=128X128像素" src="<?php echo empty($data['icon']) ? "holder.js/120x120?text=128X128像素" : $data['icon']; ?>" class="img-fluid" />
                                            
                                                </div>
                                                <div class="card-footer">
                                                    <button type="button" id="btnIcon" class="btn btn-info"><i class="fa fa-picture-o"></i> 浏览...</button>
                                                    <?php if(!empty($data['icon'])){ ?>
                                                    <button type="button" id="btnIconDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                                <?php } ?>
                                                    <input id="icon" type="hidden" name="icon" value="<?php echo isset($data['icon'])?$data['icon']:''; ?>" />
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
    <script src="/assets/js/vendor/holderjs/holder.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
 
    <script type="text/javascript">
        function SetIcon(fileUrl) {
            $('#icon').val(fileUrl);
            $('#imgIcon').attr('src', fileUrl);
        }
        
        $(document).ready(function() {
            //当前菜单
            $(".mainmenu>li.socials").addClass("nav-open").find("ul>li.config a").addClass("active");

            $("#btnIcon").on("click", function () {
                singleEelFinder.selectActionFunction = SetIcon;
                singleEelFinder.open();
            });

            $("#btnIconDelete").on("click", function() {
                $('#icon').val("");
                $('#imgIcon').attr('src', $('#imgIcon').attr('data-default-src'));
                var myImage = document.getElementById('imgIcon');
                Holder.run({
                    images: myImage
                });
            });

            $("form").validate({

                rules: {
                    name: {
                        required: true
                    },                 
                    importance: {
                        required: true,
                        digits: true
                    }

                },
                messages: {
                    name: {
                        required: "请输入名称"
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
                  

                    $.ajax({
                        url: 'software_post.php',
                        type: 'POST',
                        data: $("#editform").serialize(),
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