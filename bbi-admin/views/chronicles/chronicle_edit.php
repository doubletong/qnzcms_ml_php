<?php
require_once('../../includes/common.php');

$did = isset($_GET['did'])?$_GET['did']:"";
use Models\Language;
use Models\Chronicle;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Chronicle::find($id);

}

$action = isset($_GET['id'])?"update":"create";
$pageTitle = isset($_GET['id']) ? "编辑" : "创建";

$langs = Language::where('active',1)->orderby('importance','DESC')->get();
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle."_发展历程_后台管理_" .$site_info['sitename']; ?></title>
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
                            <li class="breadcrumb-item"><a href="/bbi-admin/views/chronicles/index.php">发展历程</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?></li>
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
                        <header class="card-header">
                            <div class="row">
                                <div class="col">
                                    <div class="card-title-v1"> <i class="iconfont icon-edit"></i><?php echo $pageTitle; ?></div>
                                </div>
                                <div class="col-auto">
                                    <div class="control"><a class="expand" href="#"><i class="iconfont icon-fullscreen"></i></a><a class="compress" href="#"><i class="iconfont icon-shrink"></i></a></div>
                                </div>
                            </div>
                        </header>
                        <div class="card-body">

                            <input id="chronicleId" type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                            <input id="importance" type="hidden" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:0; ?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />
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
                                <label for="title">年份</label>
                                <input type="number" class="form-control" id="year" name="year" placeholder="" value="<?php echo isset($data['year'])?$data['year']:''; ?>">
                            </div>
                           
                            <div class="form-group">
                                <label for="description">内容</label>
                                <textarea class="form-control" id="content" name="content" placeholder=""><?php echo isset($data['content'])?$data['content']:''; ?></textarea>
                            
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                <input type="checkbox" value="1" class="form-check-input" <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">                          
                                <label class="form-check-label" for="chkActive">发布</label>
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

        function SetImageUrl(fileUrl) {
            $('#image_url').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }


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


        $(document).ready(function() {
            //当前菜单      
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');
            $(".mainmenu>li.chronicles a").addClass("active");
           
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
                    content: {
                        required: true
                    }
                },
                messages: {
                    year: {
                        required: "请输入年份",
                        digits: "请输入有效的年份"
                    },
                    content: {
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
                    
                    $.ajax({
                        url: 'chronicle_post.php',
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