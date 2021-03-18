<?php

require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Language;
use Models\Subsidiary;
use Models\SubsidiaryCategory;
use Models\Metadata;


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = Subsidiary::find($id);

    // $module = ModuleType::URL();
    // $url = $data['alias'];
    // $metadata = Metadata::where('module_type',$module)->where('key_value',$url)->first();
}
$pageTitle = isset($_GET['id'])?"编辑":"创建";
$action = isset($_GET['id'])?"update":"create";
$categories = SubsidiaryCategory::orderby('importance','desc')->get();
$langs = Language::where('active',1)->orderby('importance','DESC')->get();


$level = 0;
function recursive($items, $level, $parent){
    $level++;
    foreach ($items as $row) {
        $titles = json_decode($row['title'],true);
        $select = (isset($parent) && $row["id"]==$parent)?"selected":"";
        echo '<option value="'.$row["id"].'"  '.$select.' >';
        for($i=1;$i<$level;$i++){
            echo "—";
        }
        echo $titles["zh-CN"].'</option>';                   
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
    <title>
        <?php echo $pageTitle."_成员企业_后台管理_".$site_info['sitename'];?>
    </title>
    <?php require_once('../../includes/meta.php') ?>
    <link rel="stylesheet" type="text/css" href="../../../assets/js/vendor/jquery-ui/themes/smoothness/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../assets/js/vendor/elFinder/css/elfinder.min.css"/>

</head>

<body>
<div class="wrapper" id="wrapper">
        <!-- nav start -->
        <?php require_once('../../includes/nav.php'); ?>
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
                            <li class="breadcrumb-item"><a href="index.php">成员企业</a></li>
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
                        <div class="row">
                                <div class="col">
                            <input id="id" type="hidden" id='id' name="id" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                            <input type="hidden" id="action" name="action" value="<?php echo $action; ?>" />
                           
                            <div class="form-group">
                                <label for="parent_id">语言</label> 
                                <select class="form-control" id="lang" name="lang">
                                    <option value="">--请选择语言--</option>
                                    <?php foreach($langs as $item ) {                                    
                                        ?>                                  
                                        <option value="<?php echo $item->code;?>" <?php echo (isset($data['lang']) && $data["lang"]==$item->code)?"selected":""; ?>><?php echo $item->name; ?></option>

                                    <?php }  ?>
                                </select>
                            </div>    
                           
                            <div class="form-group">
                                <label for="title">企业名称</label>
                                <input type="text" class="form-control" id="name" name="name" required placeholder="必填" value="<?php echo isset($data['name'])?$data['name']:''; ?>">
                            </div>

                            <div class="form-group">
                                <label for="parent_id">分类</label> 
                                <select class="form-control" id="category_id" name="category_id" >
                                    <option value="">--请选择分类--</option>
                                    <?php recursive($categories, $level, $data['category_id']); ?>                                                    
                                </select>                              
                            </div>    

                            <div class="form-group">
                                <label for="title">股票代码</label>
                                <input type="text" class="form-control" maxlength="8" id="stock_code" name="stock_code" value="<?php echo isset($data['stock_code'])?$data['stock_code']:''; ?>"
                                    placeholder="股票代码">
                            </div>
                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:'0'; ?>" placeholder="值越大越排前">
                            </div>

                        
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" value="1" class="form-check-input" <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">发布</label>
                                </div>
                            </div>

                            </div>
                                <div class="col-auto">
                                    <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">                                       
                                                <img ID="iLogo" data-default-src="holder.js/240x180?text=logo图标" src="<?php echo empty($data['logo_url']) ? "holder.js/240x180?text=logo图标" : $data['logo_url']; ?>" class="img-fluid" />                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info"><i class="fa fa-picture-o"></i> 浏览...</button>
                                                <?php if(!empty($data['logo_url'])){ ?>
                                                    <button type="button" id="btnImgDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                                <?php } ?>
                                                <input id="logo_url" type="hidden" name="logo_url" value="<?php echo isset($data['logo_url'])?$data['logo_url']:''; ?>" />
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">

                            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
                            <a href="index.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>

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
    <script src="/assets/js/vendor/jquery-validation/dist/additional-methods.min.js"></script>

    <script type="text/javascript" src="/assets/js/vendor/jquery-ui/jquery-ui.min.js"></script>    

    <script src="/assets/js/vendor/elFinder/js/elfinder.min.js"></script>
    <script src="/assets/js/vendor/elFinder/js/i18n/elfinder.zh_CN.js"></script>
    
    <script type="text/javascript">
        function SetThumbnail(fileUrl) {
            $('#logo_url').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }

     

        $(document).ready(function () {
            //当前菜单
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');
            $(".mainmenu>li.li57").addClass("nav-open");
            $(".mainmenu li.li59 a").addClass("active");
 

            $("#btnBrowser").on("click", function () {
                // singleEelFinder.selectActionFunction = SetThumbnail;
                // singleEelFinder.open();
                $('<div \>').dialog({modal: true, width: "80%", title: "选择文件", zIndex: 99999,
                    create: function(event, ui) {
                        $(this).elfinder({
                            resizable: false,
                            url: '/assets/js/vendor/elFinder/php/connector.minimal.php',
                            lang: 'zh_CN',
                            commandsOptions: {
                            getfile: {
                                oncomplete: 'destroy' 
                            }
                            },                            
                            getFileCallback: function(file) {
                                //document.getElementById('fileurl').value = file; 
                                var fileUrl = '/'+file.path.replace(/\\/g,"/");
                                $('#logo_url').val(fileUrl);
                                $('#iLogo').attr('src', fileUrl);
                                
                                jQuery('.ui-dialog-titlebar-close[type="button"]').click();
                            }
                        }).elfinder('instance')
                    }
                });
            });

            $("#btnImgDelete").on("click", function() {
                $('#logo_url').val("");
                $('#iLogo').attr('src', $('#iLogo').attr('data-default-src'));
                var myImage = document.getElementById('iLogo');
                Holder.run({
                    images: myImage
                });
            });

            $.validator.messages.required = "必填项目不可为空！";

            $("#editform").validate({

                rules: {
                    lang: {
                        required: true                     
                    },
                    category_id: {
                        required: true                     
                    },
                    name: {
                        required: true,
                        maxlength: 100
                    },
                    stock_code: {                      
                        maxlength: 8,                     
                    },
                    importance: {
                        required: true,
                        digits: true
                    }
                },
                messages: {
                    lang: {
                        required:"请选择语言",          
                    },
                    category_id: {
                        required:"请选择分类",                  
                    },
                    name: {
                        required: "请输入主标题",
                        maxlength: "不能超过100个字符"
                    },
                    stock_code: {                  
                        maxlength: "不能超过8个字符",                      
                    },
                    importance: {
                        required: "请输入序号",
                        digits: "请输入有效的整数"
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
                    //form.submit();
                    // var values = {};
                    // var fields = {};
                    // for (var instanceName in CKEDITOR.instances) {
                    //     CKEDITOR.instances[instanceName].updateElement();
                    // }

                    // $.each($(form).serializeArray(), function (i, field) {
                    //     values[field.name] = field.value;
                    // });

                    $.ajax({
                        url: 'subsidiary_post.php',
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