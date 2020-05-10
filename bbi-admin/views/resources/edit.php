<?php
require_once('../../includes/common.php');

use Models\Resource;
use Models\Language;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Resource::find($id);    
}

$langs = Language::all();

$action = isset($_GET['id'])?"update":"create";
$pageTitle = isset($_GET['id']) ? "编辑" : "创建";

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle . "_语言资源_后台管理_" . $site_info['sitename']; ?></title>
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
                            <?php echo $pageTitle . "语言资源"; ?>
                        </div>
                        <div class="card-body">
                            <input id="id" type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : 0; ?>" />
                            <input type="hidden" id="action" name="action" value="<?php echo $action; ?>" />

                            <div class="form-group">
                                <label for="title">语言</label>                              
                                <select name="lang_code" id="lang_code" class="form-control">
                                    <option value="">--选择语言--</option>
                                    <?php foreach($langs as $lang) { ?>
                                        <?php if(isset($data['lang_code']) && $data['lang_code'] == $lang->code){?>
                                            <option value="<?php echo $lang->code;?>" selected><?php echo $lang->name;?></option>  
                                        <?php }else{ ?>   
                                            <option value="<?php echo $lang->code;?>"><?php echo $lang->name;?></option>   
                                        <?php } ?>                    
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="key">键</label>
                                <input type="text" class="form-control" id="key" name="key" value="<?php echo isset($data['key']) ? $data['key'] : ''; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="value">值</label>
                                <input type="text" class="form-control" id="value" name="value" value="<?php echo isset($data['value']) ? $data['value'] : ''; ?>" placeholder="">
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
            $("#module_nav>li:nth-of-type(2)").addClass("active").siblings().removeClass('active');  
            $(".mainmenu>li.language").addClass("nav-open").find("ul>li.resource a").addClass("active");


            $("form").validate({

                rules: {
                    key: {
                        required: true,
                        remote: {
                            url: "post.php",
                            type: "post",
                            dataType: "JSON",
                            data: {
                                id: function () {
                                    return $("#id").val();
                                },
                                key: function () {
                                    return $("#key").val();
                                },
                                lang_code: function () {
                                    return $("#lang_code").val();
                                },         
                                action:function(){
                                    return 'check_key';
                                }
                            },
                            dataFilter: function (data) {
                                if (data==='0') {
                                   
                                    return '"true"';
                                } else {
                                   
                                    return '"别名已存在！"';
                                }
                            }
                        }
                    },

                    value: {
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