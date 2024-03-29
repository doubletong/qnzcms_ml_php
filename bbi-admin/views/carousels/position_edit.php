<?php

require_once('../../includes/common.php');

use Models\AdvertisingSpace;
use Models\Language;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = AdvertisingSpace::find($id);

    $titles = json_decode($data->title, true);
    $descriptions = json_decode($data->description, true);
}

$pageTitle = isset($_GET['id'])?"编辑文告位":"创建文告位";
$action = isset($_GET['id'])?"update":"create";

$langs = Language::where('active',1)->orderby('importance','DESC')->get();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $pageTitle."_页面_后台管理_".$site_info['sitename'];?>
    </title>
    <?php require_once('../../includes/meta.php') ?>
    <link href="/assets/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
    <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('../../includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('../../includes/header.php'); ?>
            <div class="container-fluid maincontent">
                <form novalidate="novalidate" id="editform">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $pageTitle; ?>
                        </div>
                        <div class="card-body">
                        <div class="row">
                                <div class="col">
                            <input id="id" type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />

                            <div class="card mb-3">
                                <div class="card-header">标题</div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach($langs as $item ) {  
                                            $lang = $item->code;
                                                ?>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="title"><?php echo $item->name;?></label>
                                                <input type="text" class="form-control" name="title_<?php echo $lang;?>"
                                                    value="<?php echo isset($titles[$lang])?$titles[$lang]:''; ?>"
                                                    required>
                                            </div>
                                        </div>
                                        <?php }  ?>
                                    </div>
                                </div>
                            </div>                         

                            <div class="form-group">
                                <label for="title">代码 <i class="iconfont icon-info-circle-fill text-info" title="作为前端引用嵌入标记"></i></label>
                                <input type="text" class="form-control" id="code" name="code" value="<?php echo isset($data['code'])?$data['code']:''; ?>"
                                    placeholder="必填">
                            </div>                          
                           
                            <div class="card mb-3">
                                <div class="card-header">描述</div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php foreach($langs as $item ) {  
                                            $lang = $item->code;
                                                ?>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="description"><?php echo $item->name;?></label>
                                                <textarea class="form-control" name="description_<?php echo $lang;?>"><?php echo isset($descriptions[$lang])?$descriptions[$lang]:''; ?></textarea>
                                            </div>
                                        </div>
                                        <?php }  ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:'0'; ?>" placeholder="值越大越排前">
                            </div>

                       
                        
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?>  id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">发布</label>
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
    <script src="/assets/js/vendor/toastr/toastr.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    
    <script type="text/javascript">
        function SetThumbnail(fileUrl) {
            $('#background_image').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }     

        $.validator.addMethod("regex",
            function(value, element, regexp) {
                var re = new RegExp(regexp);
                return this.optional(element) || re.test(value);
            },
            "输入的格式不正确，只支持小写英文与下划线输入！"
        );

        $(document).ready(function () {
            //当前菜单
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');        
            $(".mainmenu>li.carousels").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass(
                "active");

            $("#btnBrowser").on("click", function () {
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();
            });

            $.validator.messages.required = "必填项目不可为空！";


            $("#editform").validate({

                rules: {
                    importance: {
                        required: true,
                        digits: true
                    },
                    code: {
                        required: true,
                        regex:"^[a-zA-Z0-9_-]+$",
                        remote: {
                            url: "position_check_code.php",
                            type: "post",
                            dataType: "JSON",
                            data: {
                                id: function () {
                                    return $("#id").val();
                                },
                                code: function () {
                                    return $("#code").val();
                                }
                            },
                            dataFilter: function (data) {
                                if (data==0) {
                                    // jquery validate remote method
                                    // accepts only "true" value
                                    // to successfully validate field 
                                    return '"true"';
                                } else {
                                    // error message, everything that isn't "true"
                                    // is understood as failure message
                                    return '"代码已存在！"';
                                }
                            }
                        }
                    }
                },
                messages: {
                    importance: {
                        required: "请输入序号",
                        digits: "请输入有效的整数"
                    },
                    code: {
                        required: "请输入别名"

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
                   
                    $.ajax({
                        url: 'position_post.php',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function (res) {
                            //  $('#resultreturn').prepend(res);
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