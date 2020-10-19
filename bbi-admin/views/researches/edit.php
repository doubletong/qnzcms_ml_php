<?php

require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Research;
use Models\Metadata;
use Models\Team;
use Models\Language;

$groups = [];
$teachers = [];
$pagetitle = isset($_GET['id'])?"编辑实验室":"创建实验室";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = Research::find($id);

    $groups = explode('|', $data->research_group);
    $teachers = explode('|', $data->teachers);

    $module = ModuleType::RESEARCH();   
    $metadata = Metadata::where('module_type',$module)->where('key_value',$id)->first();
}
$pageTitle = isset($_GET['id'])?"编辑":"创建";
$action = isset($_GET['id'])?"update":"create";

$teams = Team::all();

$langs = Language::where('active',1)->orderby('importance','DESC')->get();

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $pageTitle."_实验室_后台管理_".$site_info['sitename'];?>
    </title>
    <?php require_once('../../includes/meta.php') ?>
    <link rel="stylesheet" href="/assets/js/vendor/select2/dist/css/select2.min.css">
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
                                <label for="title_short">短标题</label>
                                <input type="text" class="form-control" id="title_short" name="title_short" placeholder="" value="<?php echo isset($data['title_short'])?$data['title_short']:''; ?>">
                            </div>

                            <div class="form-group">
                                <label for="lab">机构</label>
                                <input type="text" class="form-control" id="title_short" name="lab" placeholder="" value="<?php echo isset($data['lab'])?$data['lab']:''; ?>">
                            </div>

                            <div class="form-group">
                                <label for="group">课题组</label>
                                <select multiple id="group" name="group[]" class="form-control">
                                    <?php foreach ($teams as $item) { ?>
                                        <option value="<?php echo $item->id; ?>" <?php echo in_array($item->id, $groups)?"selected":"";?>  ><?php echo $item->name . '【'.$item->lang.'】'; ?></option>

                                    <?php } ?>
                                </select>                         
                            </div>

                            <div class="form-group">
                                <label for="teacher">导师</label>
                                <select multiple id="teacher" name="teacher[]" class="form-control">
                                    <?php foreach ($teams as $item) { ?>
                                        <option value="<?php echo $item->id; ?>" <?php echo in_array($item->id, $teachers)?"selected":"";?> ><?php echo $item->name . '【'.$item->lang.'】'; ?></option>
                                    <?php } ?>
                                </select>
                           
                            </div>


                           
                            <div class="form-group">
                                <label for="content">内容</label>

                                <textarea class="form-control" id="content" name="content" placeholder=""><?php echo isset($data['content'])?stripslashes($data['content']):''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php'; 
                                    CKEDITOR.replace( 'content', {                                      
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,     
                                        allowedContent: true                                              
                                    });

                                </script>
                            </div>
                       
                            <div class="form-group">
                                <label for="summary">摘要</label>
                                <textarea class="form-control" id="summary" name="summary" placeholder=""><?php echo isset($data['summary'])?$data['summary']:''; ?></textarea>
                            </div>

                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:'0'; ?>" placeholder="值越大越排前">
                            </div>


                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">发布</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" <?php echo isset($data['recommend']) ? ($data['recommend']?"checked":"") : "checked"; ?> id="chkRecommend" name="recommend">
                                    <label class="form-check-label" for="chkRecommend">推荐</label>
                                </div>
                            </div>
                            </div>
                                <div class="col-auto">
                                    <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body" style="background-color: #ccc;">                                       
                                                <img ID="imgIcon" data-default-src="holder.js/180x180?text=160X160像素" src="<?php echo empty($data['icon']) ? "holder.js/180x180?text=160X160像素" : $data['icon']; ?>" class="img-fluid" />                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnIcon" class="btn btn-info"><i class="fa fa-picture-o"></i> 图标...</button>
                                                <?php if(!empty($data['icon'])){ ?>
                                                <button type="button" id="btnIconDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                            <?php } ?>
                                                <input id="icon" type="hidden" name="icon" value="<?php echo isset($data['icon'])?$data['icon']:''; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">                                       
                                                <img ID="iLogo" data-default-src="holder.js/240x360?text=384X800像素" src="<?php echo empty($data['thumbnail']) ? "holder.js/240x360?text=384X800像素" : $data['thumbnail']; ?>" class="img-fluid" />
                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info"><i class="fa fa-picture-o"></i> 背景一...</button>
                                                <?php if(!empty($data['thumbnail'])){ ?>
                                                <button type="button" id="btnImgDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                            <?php } ?>
                                                <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo isset($data['thumbnail'])?$data['thumbnail']:''; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-body">                                       
                                                <img ID="imgImageUrl" data-default-src="holder.js/240x80?text=1180X280像素" src="<?php echo empty($data['image_url']) ? "holder.js/240x80?text=1180X280像素" : $data['image_url']; ?>" class="img-fluid" />
                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnImageUrl" class="btn btn-info"><i class="fa fa-picture-o"></i> 背景二...</button>
                                                <?php if(!empty($data['image_url'])){ ?>
                                                    <button type="button" id="btnImageUrlDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                                <?php } ?>
                                                <input id="image_url" type="hidden" name="image_url" value="<?php echo isset($data['image_url'])?$data['image_url']:''; ?>" />
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
    <script src="/assets/js/vendor/select2/dist/js/select2.full.min.js"></script>
    <script type="text/javascript">
        

        function SetIcon(fileUrl) {
            $('#icon').val(fileUrl);
            $('#imgIcon').attr('src', fileUrl);
        }

        function SetThumbnail(fileUrl) {
            $('#thumbnail').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }


        function SetImageUrl(fileUrl) {
            $('#image_url').val(fileUrl);
            $('#imgImageUrl').attr('src', fileUrl);
        }

        $(document).ready(function () {
            //当前菜单
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');
            $(".mainmenu>li.researches a").addClass("active");

            $("#btnIcon").on("click", function () {
                singleEelFinder.selectActionFunction = SetIcon;
                singleEelFinder.open();
            });

            $("#btnIconDelete").on("click", function() {
                $('#icon').val("");
                $('#imgIcon').attr('src', $('#imgIcon').attr('data-default-src'));
                var myImage = document.getElementById('imgIcon');
                Holder.run({
                    images: myImage
                });
            });

            $("#btnBrowser").on("click", function () {
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();
            });

            $("#btnImgDelete").on("click", function() {
                $('#thumbnail').val("");
                $('#iLogo').attr('src', $('#iLogo').attr('data-default-src'));
                var myImage = document.getElementById('iLogo');
                Holder.run({
                    images: myImage
                });
            });


            $("#btnImageUrl").on("click", function () {
                singleEelFinder.selectActionFunction = SetImageUrl;
                singleEelFinder.open();
            });

            $("#btnImageUrlDelete").on("click", function() {
                $('#image_url').val("");
                $('#imgImageUrl').attr('src', $('#imgImageUrl').attr('data-default-src'));
                var myImage = document.getElementById('imgImageUrl');
                Holder.run({
                    images: myImage
                });
            });



            $("#group,#teacher").select2();

            $("#editform").validate({

                rules: {
                    title: {
                        required: true,
                        maxlength: 150
                    },
                    title_short: {
                        required: true,
                        maxlength: 50
                    },
                    lab: {
             
                        maxlength: 100
                    },
                    summary: {
                        required: true,
                        maxlength: 500
                    },
                    research_group: {
                        maxlength: 500
                    },
                    teachers: {
                        maxlength: 500
                    },
                    importance: {
                        required: true,
                        digits:true
                    }
                },
                messages: {
                    title: {
                        required: "请输入主标题"
                    },
                    title_short: {
                        required: "请输入短标题",
                        maxlength: "不能超过50个字符"
                    },
                    lab: {                     
                        maxlength: "不能超过100个字符"
                    },
                    summary: {
                        required: true,
                        maxlength: "不能超过500个字符"
                    },
                    research_group: {
                        maxlength: "不能超过500个字符"
                    },
                    teachers: {
                        maxlength: "不能超过500个字符"
                    },
                    importance: {
                        required: "请输入排序",
                        digits:"请输入有效的整数"
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
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    // $.each($(form).serializeArray(), function (i, field) {
                    //     values[field.name] = field.value;
                    // });

                    $.ajax({
                        url: 'post.php',
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