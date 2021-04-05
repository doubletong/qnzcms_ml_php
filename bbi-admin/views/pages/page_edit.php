<?php

require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Language;
use Models\Page;
use Models\Metadata;

$pagetitle = isset($_GET['id'])?"编辑页面":"创建页面";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = Page::find($id);

    $module = ModuleType::URL();
    $url = $data['alias'];
    $metadata = Metadata::where('module_type',$module)->where('key_value',$url)->first();
}
$pageTitle = isset($_GET['id'])?"编辑页面":"创建页面";
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
                            <li class="breadcrumb-item"><a href="/bbi-admin/views/pages/index.php">页面</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $pagetitle; ?></li>
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
                                <label for="title">标题</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo isset($data['title'])?$data['title']:''; ?>">
                            </div>

                            <div class="form-group">
                                <label for="title">别名</label>
                                <input type="text" class="form-control" id="alias" name="alias" value="<?php echo isset($data['alias'])?$data['alias']:''; ?>"
                                    placeholder="必填">
                            </div>
                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:'0'; ?>" placeholder="值越大越排前">
                            </div>

                            <div class="form-group">
                                <label for="content">内容</label>

                                <textarea class="form-control" id="content" name="content" placeholder=""><?php echo isset($data['content'])?stripslashes($data['content']):''; ?></textarea>
                               
                            </div>
                       
                        
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">发布</label>
                                </div>
                            </div>

                            </div>
                                <div class="col-auto">
                                    <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">                                       
                                                <img ID="iLogo" data-default-src="holder.js/240x180?text=1920X550像素" src="<?php echo empty($data['background_image']) ? "holder.js/240x180?text=1920X550像素" : $data['background_image']; ?>" class="img-fluid" />
                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info"><i class="fa fa-picture-o"></i> 背景图...</button>
                                                <?php if(!empty($data['background_image'])){ ?>
                                                <button type="button" id="btnImgDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                            <?php } ?>
                                                <input id="background_image" type="hidden" name="background_image" value="<?php echo isset($data['background_image'])?$data['background_image']:''; ?>" />
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
    <script src="/assets/js/vendor/tinymce/tinymce.min.js"></script>
    <script src="/assets/js/tinymceElfinder.js"></script>
        
    <script type="text/javascript">
        const mceElf = new tinymceElfinder({
            // connector URL (Set your connector)
            url: '/assets/js/vendor/elFinder/php/connector.minimal.php',
            lang: 'zh_CN',
            // upload target folder hash for this tinyMCE
            uploadTargetHash: 'l1_lw', // Hash value on elFinder of writable folder
            // elFinder dialog node id
            nodeId: 'elfinder' // Any ID you decide
        });

        var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
        tinymce.init({
            selector: '#content',
            language:'zh_CN',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [
                { title: 'My page 1', value: 'https://www.tiny.cloud' },
                { title: 'My page 2', value: 'http://www.moxiecode.com' }
            ],
            image_list: [
                { title: 'My page 1', value: 'https://www.tiny.cloud' },
                { title: 'My page 2', value: 'http://www.moxiecode.com' }
            ],
            image_class_list: [
                { title: 'None', value: '' },
                { title: 'Some class', value: 'class-name' }
            ],
            importcss_append: true,
            file_picker_callback : mceElf.browser,
            images_upload_handler: mceElf.uploadHandler,

            templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
                { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
                { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 400,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image imagetools table',
            skin: useDarkMode ? 'oxide-dark' : 'oxide',
            content_css: useDarkMode ? 'dark' : 'default',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            relative_urls: false, 
            convert_urls: false, 
            remove_script_host: false
        });

      

        $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "输入的格式不正确，只支持小写英文与下划线输入！"
    );

        $(document).ready(function () {
            //当前菜单
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');        
            $(".mainmenu>li.pages a").addClass("active");
 

            $("#btnBrowser").on("click", function () {
               
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
                                $('#background_image').val(fileUrl);
                                $('#iLogo').attr('src', fileUrl);              
                                jQuery('.ui-dialog-titlebar-close[type="button"]').click();
                            }
                        }).elfinder('instance')
                    }
                });
            });

            $("#btnImgDelete").on("click", function() {
                $('#background_image').val("");
                $('#iLogo').attr('src', $('#iLogo').attr('data-default-src'));
                var myImage = document.getElementById('iLogo');
                Holder.run({
                    images: myImage
                });
            });


            $("#editform").validate({

                rules: {
                    lang: {
                        required: true                     
                    },
                    title: {
                        required: true,
                        maxlength: 150
                    },
                    alias: {
                        required: true,
                        maxlength: 100,
                        regex:"^[a-z0-9_-]+$",
                        remote: {
                            url: "page_post.php",
                            type: "post",
                            dataType: "JSON",
                            data: {
                                id: function () {
                                    return $("#id").val();
                                },
                                lang: function () {
                                    return $("#lang").val();
                                },
                                alias: function () {
                                    return $("#alias").val();
                                },
                                action:function(){
                                    return 'checkcode';
                                }
                            },
                            dataFilter: function (data) {
                                if (data==="0") {
                                    // jquery validate remote method
                                    // accepts only "true" value
                                    // to successfully validate field 
                                    return '"true"';
                                } else {
                                    // error message, everything that isn't "true"
                                    // is understood as failure message
                                    return '"别名已存在！"';
                                }
                            }
                        }
                    }
                },
                messages: {
                    lang: {
                        required:"请选择语言",          
                    },
                    title: {
                        required: "请输入主标题",
                        maxlength: "不能超过150个字符"
                    },
                    alias: {
                        required: "请输入别名",
                        maxlength: "不能超过100个字符"
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
                        url: 'page_post.php',
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