<?php
use Models\SocialSoftware;
use Models\SocialAccount;
require_once('../../includes/common.php');

$pagetitle = isset($_GET['id'])?"编辑帐号":"创建帐号";
$action = isset($_GET['id'])?"update":"create";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = SocialAccount::find($id);
    //$data = $cateModel->fetch_data($id);

    $imageUrl = explode('|', $data['image_url']);
}


$categories = SocialSoftware::orderby('importance','desc')->get();

 


?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pagetitle."_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <link href="/assets/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
    <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>
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
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav_system.php'); ?>
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
                                        <label for="username">帐号</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($data['username'])?$data['username']:''; ?>">
                                    </div>   

                                    <div class="form-group">
                                        <label for="parent_id">类型</label> 
                                        <select class="form-control" id="social_id" name="social_id">
                                            <option value="">--请选择类型--</option>
                                            <?php 
                                                foreach ($categories as $row) {
                                                    $select = ($row["id"]==$data['social_id'])?"selected":"";
                                                    echo '<option value="'.$row["id"].'"  '.$select.' >';                                      
                                                    echo $row["name"].'</option>';                                    
                                                }                                    
                                            ?>                                                    
                                        </select>                              
                                    </div>  

                                    <div class="form-group">
                                        <label for="url">链接</label>
                                        <input type="text" class="form-control" id="url" name="url" value="<?php echo isset($data['url'])?$data['url']:''; ?>">
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
                                <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                        <div class="card-header">缩略图</div>
                                            <div class="card-body">                                       
                                                <img ID="iLogo" data-default-src="holder.js/180x180?text=280X280像素" src="<?php echo empty($data['qrcode']) ? "holder.js/180x180?text=280X280像素" : $data['qrcode']; ?>" class="img-fluid" />
                                          
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnQrcode" class="btn btn-info"><i class="fa fa-picture-o"></i> 浏览...</button>
                                                <?php if(!empty($data['qrcode'])){ ?>
                                                <button type="button" id="btnImgDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                            <?php } ?>
                                                <input id="qrcode" type="hidden" name="qrcode" value="<?php echo isset($data['qrcode'])?$data['qrcode']:''; ?>" />
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
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

    <script src="/assets/js/vendor/holderjs/holder.min.js"></script>
    <script src="/assets/js/vendor/toastr/toastr.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        function SetQrcode(fileUrl) {
            $('#qrcode').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }
        function SetFileUrl(fileUrl) {
            $('#file_url').val(fileUrl);
        }

        $(document).ready(function() {

            //当前菜单        
            $(".mainmenu>li.socials").addClass("nav-open").find("ul>li.accounts a").addClass("active");     


            $("#btnQrcode").on("click", function () {
                singleEelFinder.selectActionFunction = SetQrcode;
                singleEelFinder.open();
            });

          

            $("#btnImgDelete").on("click", function() {
                $('#qrcode').val("");
                $('#iLogo').attr('src', $('#iLogo').attr('data-default-src'));
                var myImage = document.getElementById('iLogo');
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
                    username: {
                        required: true
                    },
                    social_id: {
                        required: true
                    },
                    url: {
                        url: true
                    },
                    importance: {
                        required: true,
                        digits:true
                    }

                },
                messages:{
                    username: {
                        required:"请输入帐号"
                    },
                    social_id: {
                        required: "请选择分类"
                    },
                    url: {
                        url: "链接格式不正确"
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
                    var values = {};
                    var fields = {};
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    $.each($(form).serializeArray(), function(i, field) {
                        values[field.name] = field.value;
                    });

                    $.ajax({
                        url: 'account_post.php',
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