<?php
use Models\DownloadCategory;
use Models\Download;
use Models\Language;

require_once('../../includes/common.php');

$pagetitle = isset($_GET['id'])?"编辑文档":"创建文档";
$action = isset($_GET['id'])?"update":"create";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Download::find($id);
    //$data = $cateModel->fetch_data($id);

    $imageUrl = explode('|', $data['image_url']);
}


$categories = DownloadCategory::orderby('importance','desc')->get();
$langs = Language::where('active',1)->orderby('importance','DESC')->get();

$level = 0;
function recursive($items, $level, $parent){
    $level++;
    foreach ($items as $row) {
        $select = (isset($parent) && $row["id"]==$parent)?"selected":"";
        echo '<option value="'.$row["id"].'"  '.$select.' >';
        for($i=1;$i<$level;$i++){
            echo "—";
        }
        echo $row["title"].'</option>';                   
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
    <title><?php echo $pagetitle."_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <link rel="stylesheet" type="text/css" href="../../../assets/js/vendor/jquery-ui/themes/smoothness/jquery-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../../assets/js/vendor/elFinder/css/elfinder.min.css"/>
    <style>
        .img_max{
            object-fit: contain;
            width:100px;
            height:100px;
        }
    </style>
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
                            <input type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />
                            <div class="row">
                                <div class="col-md">

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
                                <label for="title">主题</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($data['title'])?$data['title']:''; ?>">
                            </div>   

                            <div class="form-group">
                                <label for="parent_id">分类</label> 
                                <select class="form-control" id="category_id" name="category_id" placeholder="" >
                                    <option value="">--请选择父类--</option>
                                    <?php recursive($categories, $level, $data['category_id']); ?>                                                    
                                </select>                              
                            </div>    
                            
                            <div class="form-group">
                                <label for="file_url">
                                    文档</label>
                                <div class="input-group">
                                    <input id="file_url" name="file_url" class="form-control" placeholder="" value="<?php echo isset($data['file_url'])?$data['file_url']:''; ?>" aria-describedby="setFileUrl">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="setFileUrl" type="button">浏览…</button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="intro">内容</label>
                                <textarea class="form-control" id="content" name="content" placeholder=""><?php echo isset($data['content'])?stripslashes($data['content']):''; ?></textarea>
                               
                            </div>                

                            <div class="form-group">
                                <label for="intro">描述</label>
                                <textarea class="form-control" id="description" name="description" placeholder=""><?php echo isset($data['description'])?stripslashes($data['description']):''; ?></textarea>
                              
                            </div>

                        

                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:0; ?>" placeholder="值越大越排前">
                            </div>                           

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" value="1" class="form-check-input"  <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">发布</label>
                                </div>
                            </div>
                                </div>
                                <div class="col-md-auto">
                                <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                        <div class="card-header">缩略图</div>
                                            <div class="card-body">                                       
                                                <img ID="iLogo" data-default-src="holder.js/180x240?text=280X380像素" src="<?php echo empty($data['thumbnail']) ? "holder.js/180x240?text=280X380像素" : $data['thumbnail']; ?>" class="img-fluid" />
                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnThumbnail" class="btn btn-info"><i class="fa fa-picture-o"></i> 浏览...</button>
                                                <?php if(!empty($data['thumbnail'])){ ?>
                                                <button type="button" id="btnImgDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                            <?php } ?>
                                                <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo isset($data['thumbnail'])?$data['thumbnail']:''; ?>" />
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
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

    <script src="/assets/js/vendor/holderjs/holder.min.js"></script>
    <script src="/assets/js/vendor/toastr/toastr.min.js"></script>
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
            $(".mainmenu>li.agent").addClass("nav-open").find("ul>li.list a").addClass("active");     


            $("#btnThumbnail").on("click", function () {
      

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
                                $('#thumbnail').val(fileUrl);
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

            $("#setFileUrl").on("click", function() {
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
                                $('#file_url').val(fileUrl);
                                jQuery('.ui-dialog-titlebar-close[type="button"]').click();
                            }
                        }).elfinder('instance')
                    }
                });
            });
          
            
   

            $("form").validate({

                rules: {
                    lang: {
                        required: true
                    },
                    title: {
                        required: true
                    },
                    category_id: {
                        required: true
                    },
                    file_url: {
                        required: true
                    },
                    importance: {
                        required: true,
                        digits:true
                    }

                },
                messages:{
                    lang: {
                        required:"请选择语言"
                    },
                    title: {
                        required:"请输入主题"
                    },
                    category_id: {
                        required: "请选择分类"
                    },
                    file_url: {
                        required: "请选择文档"
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
                  

                    $.ajax({
                        url: 'download_post.php',
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