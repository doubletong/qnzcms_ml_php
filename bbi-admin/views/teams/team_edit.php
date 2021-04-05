<?php
use Models\TeamCategory;
use Models\Team;
use Models\Language;

require_once('../../includes/common.php');

$pagetitle = isset($_GET['id'])?"编辑成员":"创建成员";
$action = isset($_GET['id'])?"update":"create";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Team::find($id);
    //$data = $cateModel->fetch_data($id);

    $imageUrl = explode('|', $data['image_url']);
}


$categories = TeamCategory::orderby('importance','desc')->get();
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
            <div class="main-content">         
                <div class="breadcrumb-container">
                    <div class="row">
                    <div class="col-md">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                            <li class="breadcrumb-item"><a href="/bbi-admin/views/teams/index.php">团队</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $pagetitle; ?></li>
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
                                <label for="name">姓名</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($data['name'])?$data['name']:''; ?>">
                            </div>   

                            <div class="form-group">
                                <label for="parent_id">分类</label> 
                                <select class="form-control" id="category_id" name="category_id" >
                                    <option value="">--请选择分类--</option>
                                    <?php recursive($categories, $level, $data['category_id']); ?>                                                    
                                </select>                              
                            </div>    

                            <div class="form-group">
                                <label for="post">职位</label>
                                <input class="form-control" id="post" name="post" value="<?php echo isset($data['post'])?$data['post']:''; ?>" type="text" />
                            </div>
                            <div class="form-group">
                                <label for="name">学历</label>
                                <input type="text" class="form-control" id="education" name="education" value="<?php echo isset($data['education'])?$data['education']:''; ?>">
                            </div>   

                            <div class="form-group">
                                <label for="name">学校</label>
                                <input type="text" class="form-control" id="school" name="school" value="<?php echo isset($data['school'])?$data['school']:''; ?>">
                            </div>   
                            <div class="form-group">
                                <label for="name">办公室电话</label>
                                <input type="text" class="form-control" id="office_phone" name="office_phone" value="<?php echo isset($data['office_phone'])?$data['office_phone']:''; ?>">
                            </div>   
                            <div class="form-group">
                                <label for="name">邮箱</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($data['email'])?$data['email']:''; ?>">
                            </div>   
                            <div class="form-group">
                                <label for="name">个人主页</label>
                                <input type="text" class="form-control" id="homepage" name="homepage" value="<?php echo isset($data['homepage'])?$data['homepage']:''; ?>">
                            </div>   

                            <div class="form-group">
                                <label for="name">主要研究方向</label>                            
                                <textarea class="form-control" id="interests" name="interests" placeholder="" rows="3"><?php echo isset($data['interests'])?stripslashes($data['interests']):''; ?></textarea>
                            </div> 
                            
                            <div class="form-group">
                                <label for="name">简介</label>                            
                                <textarea class="form-control" id="introduction" name="introduction" placeholder="" rows="5"><?php echo isset($data['introduction'])?stripslashes($data['introduction']):''; ?></textarea>
                            </div> 

                            <div class="form-group">
                                <label for="intro">内容</label>
                                <textarea class="form-control" id="content" name="content" placeholder=""><?php echo isset($data['content'])?stripslashes($data['content']):''; ?></textarea>
                              
                            </div>                


                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:0; ?>" placeholder="值越大越排前">
                            </div>                           

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"  <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">发布</label>
                                </div>
                            </div>
                                </div>
                                <div class="col-md-auto">
                                        

                                        <div style="width:300px; text-align:center;" class="mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img ID="imgPhoto" data-default-src="holder.js/250x250?text=图片一" src="<?php echo empty($data['photo']) ? "holder.js/250x250?text=图片一" : $data['photo']; ?>" class="img-fluid" />

                                                </div>
                                                <div class="card-footer">
                                                    <button type="button" id="btnPhoto" class="btn btn-info"><i class="iconfont icon-image"></i> 浏览...</button>
                                                    <?php if(!empty($data['photo'])){ ?>
                                                        <button type="button" id="btnPhotoDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                                    <?php } ?>
                                                    <input id="photo" type="hidden" name="photo" value="<?php echo isset($data['photo'])?$data['photo']:''; ?>" />
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:300px; text-align:center;" class="mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img ID="imgFullPhoto" data-default-src="holder.js/250x250?text=图片二" src="<?php echo empty($data['fullphoto']) ? "holder.js/250x200?text=图片二" : $data['fullphoto']; ?>" class="img-fluid" />

                                                </div>
                                                <div class="card-footer">
                                                    <button type="button" id="btnFullPhoto" class="btn btn-info"><i class="iconfont icon-image"></i> 浏览...</button>
                                                    <?php if(!empty($data['fullphoto'])){ ?>
                                                        <button type="button" id="btnFullPhotoDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                                    <?php } ?>
                                                    <input id="fullphoto" type="hidden" name="fullphoto" value="<?php echo isset($data['fullphoto'])?$data['fullphoto']:''; ?>" />
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
           $(".mainmenu>li.li32").addClass("nav-open").find("ul>li.li33 a").addClass("active");    


            $("#btnPhoto").on("click", function () {
              
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
                                $('#photo').val(fileUrl);
                                $('#imgPhoto').attr('src', fileUrl);           
                                jQuery('.ui-dialog-titlebar-close[type="button"]').click();
                            }
                        }).elfinder('instance')
                    }
                });
            });

            $("#btnFullPhoto").on("click", function () {
               
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
                                $('#fullphoto').val(fileUrl);
                                $('#imgFullPhoto').attr('src', fileUrl); 
                                jQuery('.ui-dialog-titlebar-close[type="button"]').click();
                            }
                        }).elfinder('instance')
                    }
                });
            });
          

            $("#btnImgDelete").on("click", function() {
               // $('#background_image').val("");
                $('#imgPhoto').attr('src', $('#imgPhoto').attr('data-default-src'));
                var myImage = document.getElementById('imgPhoto');
                Holder.run({
                    images: myImage
                });
            });

            $("#btnFullPhotoDelete").on("click", function() {
               // $('#background_image').val("");
                $('#imgFullPhoto').attr('src', $('#imgFullPhoto').attr('data-default-src'));
                var myImage = document.getElementById('imgFullPhoto');
                Holder.run({
                    images: myImage
                });
            });


            $("#setFileUrl").on("click", function() {
                singleEelFinder.selectActionFunction = SetFileUrl;
                singleEelFinder.open();
            });
          
            
   

            $("form").validate({

                rules: {
                    name: {
                        required: true,
                        maxlength: 150
                    },
                    category_id: {
                        required: true
                    },
                    post: {
                        maxlength: 100
                    },
                    interests: {
                        maxlength: 250
                    },
                    education: {
                        maxlength: 100
                    },
                    email: {
                        maxlength: 150
                    },
                    office_phone: {
                        maxlength: 50
                    },
                    school: {
                        maxlength: 100
                    },
                    homepage: {
                        maxlength: 150
                    },
                    importance: {
                        required: true,
                        digits:true
                    }

                },
                messages:{
                    name: {
                        required:"请输入主题",
                        maxlength: "不能超过100个字符"
                    },
                    category_id: {
                        required: "请选择分类"
                    },
                    post: {
                        maxlength: "不能超过100个字符"
                    },
                    interests: {
                        maxlength:  "不能超过250个字符"
                    },
                    education: {
                        maxlength:  "不能超过100个字符"
                    },
                    email: {
                        maxlength: "不能超过150个字符"
                    },
                    office_phone: {
                        maxlength: "不能超过50个字符"
                    },
                    school: {
                        maxlength:  "不能超过100个字符"
                    },
                    homepage: {
                        maxlength:  "不能超过150个字符"
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
                        url: 'team_post.php',
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