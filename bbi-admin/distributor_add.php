<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "添加_子公司信息_后台管理_".SITENAME;?></title>
    <?php require_once('includes/meta.php') ?>
    <link href="../js/vendor/toastr/toastr.min.css" rel="stylesheet"/>
    <script src="../js/vendor/ckeditor/ckeditor.js"></script>
</head>

<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once('includes/nav.php'); ?>
    <!-- /nav end -->
    <section class="rightcol">            
        <?php require_once('includes/header.php'); ?>

        <div class="container-fluid maincontent">
        <form class="form-horizontal" style="position: relative;" novalidate="novalidate">
    <div class="card">
        <div class="card-header">
            添加子公司信息
        </div>
        <div class="card-body">
           
                <input id="distributorId" type="hidden" name="distributorId" value="0" />
                <div class="row">
                    <div class="col">

                <div class="form-group">
                    <label for="city">名称</label>                 
                        <input type="text" class="form-control" id="name" name="name" placeholder="">                  
                </div>

                <div class="form-group">
                    <label for="address">地址</label>
                    <textarea class="form-control" id="address" name="address" placeholder=""></textarea>                          
                </div>
                <div class="form-group">
                    <label for="postcode">邮编</label>                 
                        <input type="text" class="form-control" id="postcode" name="postcode" placeholder="">                  
                </div>
                <div class="form-group">
                    <label for="phone">联系电话</label>                 
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="">                  
                </div>
                <div class="form-group">
                    <label for="fax">传真</label>                 
                        <input type="text" class="form-control" id="fax" name="fax" placeholder="">                  
                </div>
                <div class="form-group">
                    <label for="homepage">主页</label>                 
                        <input type="text" class="form-control" id="homepage" name="homepage" placeholder="">                  
                </div>
         
                <div class="form-group">
                    <label for="importance">排序</label>                 
                    <input type="number" class="form-control" id="importance" name="importance" value="0" placeholder="">            
                </div>
                <div class="form-group">
                            <label for="intro">内容</label>                            
                                <textarea class="form-control" id="intro" name="intro" placeholder=""></textarea>
                                <script>
                                var elFinder = '/js/vendor/elfinder/elfinder-cke.html'; 
                                    CKEDITOR.replace( 'intro', {
                                      
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,
                                        allowedContent: true 
                                    });
                                </script>                        
                        </div>

                <div class="form-group">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" checked id="chkActive" name="active">                          
                            <label class="form-check-label" for="chkActive">发布</label>
                            </div>
                        </div>

                        </div>
                    <div class="col-auto">
                        <div style="width:300px; text-align:center;" class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <img ID="iLogo" src="holder.js/240x180/text:433X289像素" class="img-responsive img-rounded" />
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 缩略图...</button>
                                    <input id="thumbnail" type="hidden" name="thumbnail" />
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

<?php require_once('includes/footer.php'); ?> 
</section>

</div>

<?php require_once('includes/scripts.php'); ?> 

<script src="../js/vendor/holderjs/holder.min.js"></script>
<script src="../js/vendor/toastr/toastr.min.js"></script>
<script src="../js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="../js/vendor/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript">

// $.validator.addMethod("checkCoordinate",function(value,element,params){
// 				var checkCoordinate = /^[-\+]?\d+(\.\d+)\,[-\+]?\d+(\.\d+)$/;
// 				return this.optional(element)||(checkCoordinate.test(value));
// 			},"请输入正确的坐标！");

function SetThumbnail(fileUrl) {
        $('#thumbnail').val(fileUrl);
        $('#iLogo').attr('src', fileUrl);
    }

    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li:nth-of-type(15)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");

        $("#btnBrowser").on("click", function () {         
            singleEelFinder.selectActionFunction = SetThumbnail;
            singleEelFinder.open();        
          
        });       

        $("form").validate({

            rules: {
                name: {
                    required: true
                },
                address: {
                    required: true
                },
                phone: {
                    required: true
                },
              
                importance: {
                    required: true,
                    digits:true
                }

            },
            messages:{
              
                name: {
                    required: "请输入名称"
                },
                address: {
                    required: "请输入地址"
                },
                phone: {
                    required: "请输入电话"
                },
              
                importance: {
                    required: "请输入序号",
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
                errorPlacement : function(error, element) {
                element.parent('div').append(error);
            },

            submitHandler: function(form) {
                //form.submit();
                $.ajax({
                    url : 'distributor_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {

                     //   alert(res);
                        if (res) {
                            toastr.success('子公司信息已添加成功！', '添加子公司信息')
                        } else {
                            toastr.error('子公司信息添加失败！', '添加子公司信息')
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>