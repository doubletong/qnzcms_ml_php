<?php
require_once('../../includes/common.php');

use Models\Language;


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Language::find($id);    
}

$langs = array(
    'ar'=>'阿拉伯语',
    'de'=>'德语',
    'en'=>'英语',
    'es'=>'西班牙语',
    'fr'=>'法语',
    'it'=>'意大利语',
    'ja'=>'日语',
    'ru'=>'俄语',
    'zh'=>'中文',
    'zh-CN'=>'中文(简体)',
    'zh-TW'=>'中文(繁体)'
);

$action = isset($_GET['id'])?"update":"create";
$pageTitle = isset($_GET['id']) ? "编辑" : "创建";

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle . "_语言_后台管理_" . $site_info['sitename']; ?></title>
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

            <div class="container-fluid maincontent">

                <form novalidate="novalidate">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $pageTitle . "岗位"; ?>
                        </div>
                        <div class="card-body">
                          
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />
                            <div class="form-group">
                                <label for="title">语言代码</label>                              
                                <select name="code" id="code" class="form-control">
                                    <option value="">--选择语言--</option>
                                    <?php foreach($langs as $x=>$x_value) { ?>
                                        <?php if(isset($data['code']) && $data['code'] == $x){?>
                                            <option value="<?php echo $x;?>" selected><?php echo $x_value;?></option>  
                                        <?php }else{ ?>   
                                            <option value="<?php echo $x;?>"><?php echo $x_value;?></option>   
                                        <?php } ?>                    
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">语言名称</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>" placeholder="">
                            </div>

                         
                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance']) ? $data['importance'] : '0'; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" <?php echo isset($data['default']) ? ($data['default'] ? "checked" : "") : ""; ?> id="chkDefault" name="default">
                                    <label class="form-check-label" for="chkDefault">默认</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active'] ? "checked" : "") : "checked"; ?> id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">显示</label>
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

    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
 
    <script type="text/javascript">
        $(document).ready(function() {
            //当前菜单
            $(".mainmenu>li.system").addClass("nav-open").find("ul>li.language a").addClass("active");


            $("form").validate({

                rules: {
                    code: {
                        required: true
                    },

                    name: {
                        required: true
                       
                    },
                    importance: {
                        required: true,
                        digits: true
                    }

                },
                messages: {
                    title: {
                        required: "请输入语言代码"
                    },

                 
                    name: {
                        required: "请输入语言名称"                      
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