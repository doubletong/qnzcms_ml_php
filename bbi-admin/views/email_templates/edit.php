<?php

use Models\EmailTemplate;

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/common.php');
require_once('../../includes/common.php');
require_once('../../../config/database.php');

$pagetitle = isset($_GET['id'])?"编辑邮件模板":"创建邮件模板";
$action = isset($_GET['id'])?"update":"create";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = EmailTemplate::find($id);
    //$data = $cateModel->fetch_data($id);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pagetitle."_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <link href="/assets/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
    <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>
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
                            <input type="hidden" id="id" name="id" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />
                            
                            <div class="form-group">
                                <label for="title">主题</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($data['title'])?$data['title']:''; ?>">
                            </div>
                         
                            <div class="form-group">
                                <label for="title">代码</label>
                                <input type="text" class="form-control" id="code" name="code" value="<?php echo isset($data['code'])?$data['code']:''; ?>"
                                    placeholder="必填">
                            </div>
                        
                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:0; ?>" placeholder="值越大越排前">
                            </div>

                            <div class="form-group">
                                <label for="htmlbody">邮件模板</label>

                                <textarea class="form-control" id="htmlbody" name="htmlbody" placeholder=""><?php echo isset($data['htmlbody'])?stripslashes($data['htmlbody']):''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php';
                                    CKEDITOR.replace('htmlbody', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,                                  
                                        allowedContent: true                  
                                    });
                                </script>
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

    <script src="/assets/js/vendor/toastr/toastr.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script type="text/javascript">


        $(document).ready(function() {
            //当前菜单        
            $(".mainmenu>li.emails").addClass("nav-open").find("ul>li.template a").addClass("active");     

            $.validator.addMethod("regex",
                function(value, element, regexp) {
                    var re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                },
                "输入的格式不正确，只支持小写英文与下划线输入！"
            );
           
            $("form").validate({

                rules: {
                    title: {
                        required: true
                    },
                    code: {
                        required: true,
                        regex:"^[a-zA-Z0-9_-]+$",
                        remote: {
                            url: "post.php",
                            type: "post",
                            dataType: "JSON",
                            data: {
                                id: function () {
                                    return $("#id").val();
                                },
                                code: function () {
                                    return $("#code").val();
                                },
                                action: function(){
                                    return "checkcode";
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
                                    return '"编号已存在！"';
                                }
                            }
                        }
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
                    code: {
                        required: "请输入别名"
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
                        url: 'post.php',
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