<?php

require_once('../../includes/common.php');

use Models\Advertisement;
use Models\AdvertisingSpace;
use Models\Language;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Advertisement::find($id);
}
$pageTitle = isset($_GET['id'])?"编辑":"创建";
$action = isset($_GET['id'])?"update":"create";
$positions = AdvertisingSpace::orderBy('importance', 'DESC')->get();

$langs = Language::where('active', 1)->orderby('importance', 'DESC')->get();

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle."_广告横幅_后台管理_".$site_info['sitename'];?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link rel="stylesheet" type="text/css" href="../../../assets/js/vendor/jquery-ui/themes/smoothness/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../assets/js/vendor/elFinder/css/elfinder.min.css"/>
</head>

<body>
    <div class="wrapper">
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
                                    <li class="breadcrumb-item"><a href="index.php">广告横幅</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-auto">
                            <time id="sitetime"></time>
                        </div>
                    </div>
                </div>

                <form novalidate="novalidate">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $pageTitle;?>
                        </div>
                        <div class="card-body">

                            <input id="id" type="hidden" name="id"
                                value="<?php echo isset($data['id'])?$data['id']:0;?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />
                            <div class="form-group">
                                <label for="parent_id">语言</label>
                                <select class="form-control" id="lang" name="lang">
                                    <option value="">--请选择语言--</option>
                                    <?php foreach($langs as $item ) {                                    
                                        ?>
                                    <option value="<?php echo $item->code;?>"
                                        <?php echo (isset($data['lang']) && $data["lang"]==$item->code)?"selected":""; ?>>
                                        <?php echo $item->name; ?></option>

                                    <?php }  ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">主题</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder=""
                                    value="<?php echo isset($data['title'])?$data['title']:''; ?>">

                            </div>
                            <div class="form-group">
                                <label for="space_id">广告位</label>
                                <select class="form-control" id="space_id" name="space_id">
                                    <option value="">--请选择广告位--</option>
                                    <?php foreach ($positions as $model) {
                                        $titles = json_decode($model['title'],true);     
                                    if (isset($data['space_id']) && $model["id"]=== $data["space_id"]) {
                                        ?>
                                    <option value="<?php echo $model["id"]; ?>" selected><?php echo $titles['zh-CN']??""; ?>
                                    </option>

                                    <?php
                                    } else {?>

                                    <option value="<?php echo $model["id"]; ?>"><?php echo $titles['zh-CN']??""; ?> </option>
                                    <?php }
                                    } ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="link">链接</label>
                                <input type="text" class="form-control" id="link" name="link" placeholder=""
                                    value="<?php echo isset($data['link'])?$data['link']:''; ?>">

                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="imageUrl">图片</label>

                                        <div class="input-group">
                                            <input id="image_url" name="image_url" class="form-control"
                                                value="<?php echo isset($data['image_url'])?$data['image_url']:''; ?>"
                                                aria-describedby="setImageUrl">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="setImageUrl"
                                                    type="button">浏览…</button>
                                            </div>
                                        </div>
                                        <?php if (isset($data['image_url']) && !empty($data['image_url'])) { ?>
                                        <div style="padding:1rem 0;">
                                            <img id="img_image_url" src="<?php echo $data['image_url']; ?>" alt=""
                                                style="height:120px;" />
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image_url_mobile">图片(移动)</label>
                                        
                                        <div class="input-group">
                                            <input id="image_url_mobile" name="image_url_mobile" class="form-control"
                                                value="<?php echo isset($data['image_url_mobile'])?$data['image_url_mobile']:''; ?>"
                                                aria-describedby="setImageUrlMobile">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="setImageUrlMobile"
                                                    type="button">浏览…</button>
                                            </div>
                                        </div>
                                        <?php if (isset($data['image_url_mobile']) && !empty($data['image_url_mobile'])) { ?>
                                        <div style="padding:1rem 0;">
                                            <img id="img_image_url_mobile"
                                                src="<?php echo $data['image_url_mobile']; ?>" alt=""
                                                style="height:120px;" />
                                        </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance"
                                    value="<?php echo empty($data['importance'])?"0":$data['importance'];?>"
                                    placeholder="">

                            </div>
                            <div class="form-group">
                                <label for="content">内容</label>

                                <textarea class="form-control" id="content" name="content"
                                    placeholder=""><?php echo isset($data['content'])?stripslashes($data['content']):''; ?></textarea>
                                
                            </div>
                            <div class="form-group">
                                <label for="description">描述</label>
                                <textarea class="form-control" id="description" name="description"
                                    placeholder=""><?php echo isset($data['description'])?$data['description']:''; ?></textarea>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"
                                        <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?>
                                        id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">发布</label>
                                </div>
                            </div>



                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
                            <a href="index.php" class="btn btn-outline-secondary"><i
                                    class="iconfont icon-left"></i> 返回</a>
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
            images_upload_handler: mceElf.uploadHandlerExt,

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




    $(document).ready(function() {
        //当前菜单
        $(".mainmenu>li.carousels").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");

        $("#setImageUrl").on("click", function() {
           
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
                            $('#image_url').val(fileUrl);
                            $("#img_image_url").attr("src", fileUrl)      
                            jQuery('.ui-dialog-titlebar-close[type="button"]').click();
                        }
                    }).elfinder('instance')
                }
            });
        });
        $("#setImageUrlMobile").on("click", function() {
     
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
                            $('#image_url_mobile').val(fileUrl);
                            $("#img_image_url_mobile").attr("src", fileUrl)
                            jQuery('.ui-dialog-titlebar-close[type="button"]').click();
                        }
                    }).elfinder('instance')
                }
            });
        });

        $("form").validate({

            rules: {
                title: {
                    required: true
                },

                importance: {
                    required: true,
                    digits: true
                }

            },
            messages: {
                title: {
                    required: "请输入主标题"
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
                


                $.ajax({
                    url: 'carousel_post.php',
                    type: 'POST',
                    data: $(form).serialize(),
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