<?php

require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Utils/Enum.php');

use Models\Exhibition;
use Models\Metadata;

$pagetitle = isset($_GET['id'])?"编辑页面":"创建页面";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = Exhibition::find($id);

    $module = ModuleType::EXHIBITION();   
    $metadata = Metadata::where('module_type',$module)->where('key_value',$id)->first();
}
$pageTitle = isset($_GET['id'])?"编辑":"创建";
$action = isset($_GET['id'])?"update":"create";

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo $pageTitle."_展会信息_后台管理_".$site_info['sitename'];?>
    </title>
    <?php require_once('../../includes/meta.php') ?>
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
                                <label for="title">标题</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo isset($data['title'])?$data['title']:''; ?>">
                            </div>

                            <div class="form-group">
                                <label for="title">开始日期</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($data['start_date'])?date_format(date_create($data['start_date']),"Y-m-d"):date("Y-m-d"); ?>"
                                    placeholder="必填">
                            </div>
                            <div class="form-group">
                                <label for="title">结束日期</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($data['end_date'])?date_format(date_create($data['end_date']),"Y-m-d"):date("Y-m-d"); ?>"
                                    placeholder="必填">
                            </div>

                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:'0'; ?>" placeholder="值越大越排前">
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
                                            <div class="card-body">                                       
                                                <img ID="iLogo" data-default-src="holder.js/240x180?text=1920X550像素" src="<?php echo empty($data['thumbnail']) ? "holder.js/240x180?text=1920X550像素" : $data['thumbnail']; ?>" class="img-fluid" />
                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info"><i class="fa fa-picture-o"></i> 背景图...</button>
                                                <?php if(!empty($data['thumbnail'])){ ?>
                                                <button type="button" id="btnImgDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                            <?php } ?>
                                                <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo isset($data['thumbnail'])?$data['thumbnail']:''; ?>" />
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
    
    <script type="text/javascript">
        function SetThumbnail(fileUrl) {
            $('#thumbnail').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }

     


        $(document).ready(function () {
            //当前菜单
            $(".mainmenu>li.exhibitions").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass(
                "active");

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


            $("#editform").validate({

                rules: {
                    title: {
                        required: true
                    },
                    start_date: {
                        required: true
                    },
                    end_date: {
                        required: true
                    }
                },
                messages: {
                    title: {
                        required: "请输入主标题"
                    },
                    start_date: {
                        required: "请输入开始日期"
                    },
                    end_date: {
                        required: "请输入结束日期"
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
                    var values = {};
                    var fields = {};
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    $.each($(form).serializeArray(), function (i, field) {
                        values[field.name] = field.value;
                    });

                    $.ajax({
                        url: 'post.php',
                        type: 'POST',
                        data: values,
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