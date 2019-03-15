<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');


?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "添加_页面_后台管理_".SITENAME;?></title>
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

        <form novalidate="novalidate" id="editform">
            <div class="card">
                <div class="card-header">
                添加页面
            </div>
      
        <div class="card-body">
                <input id="pageId" type="hidden" name="pageId" value="0" />
               
                        <div class="form-group">                          
                            <label for="title">主题</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="必填">                         
                        </div>

                        <div class="form-group">                          
                            <label for="title">别名</label>
                            <input type="text" class="form-control" id="alias" name="alias" placeholder="必填">                         
                        </div>

                 

                        <div class="form-group">
                            <label for="content">页面内容</label>                            
                                <textarea class="form-control" id="content" name="content" placeholder=""></textarea>
                                <script>
                                var elFinder = '<?php echo SITEPATH; ?>/js/vendor/elfinder/elfinder-cke.html'; 
                                    CKEDITOR.replace( 'content', {
                                      
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,     
                                        allowedContent: true                                                   
                                    });
                                </script>                        
                        </div>
                        <div class="form-group">
                            <label for="description">SEO描述</label>
                            <textarea class="form-control" id="description" name="description" placeholder=""></textarea>                          
                        </div>
                        <div class="form-group">
                            <label for="keywords">关键字</label>                           
                            <input type="text" class="form-control" id="keywords" name="keywords" placeholder="">                         
                        </div>
                     
                        <div class="form-group">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" checked id="chkActive" name="active">                          
                            <label class="form-check-label" for="chkActive">发布</label>
                            </div>
                        </div>
                  

        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="pages.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>
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
    function SetThumbnail(fileUrl) {
        $('#thumbnail').val(fileUrl);
        $('#iLogo').attr('src', fileUrl);
    }

    function SetBackground(fileUrl) {
        $('#imageUrl').val(fileUrl);
    }

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
        $(".mainmenu>li:nth-of-type(6)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");

        $("#btnBrowser").on("click", function () {         
            singleEelFinder.selectActionFunction = SetThumbnail;
            singleEelFinder.open();        
          
        });

       

        $("#setImageUrl").on("click", function () {  
            singleEelFinder.selectActionFunction = SetBackground;
            singleEelFinder.open();            
        });


        $("#editform").validate({

            rules: {
                title: {
                    required: true
                },
                alias: {
                    required: true,
                    regex:"^[a-z0-9_-]+$",
                    remote: {
                        url: "page_check_alias.php",
                        type: "post",
                        dataType:"JSON",
                        data: {
                            id: function() {
                                return $( "#pageId" ).val();
                            },
                            alias: function(){
                                return $( "#alias" ).val();
                            }
                        },
                        dataFilter: function(data) {                       
                            if(!data) {
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
            messages:{
                title: {
                    required:"请输入主标题"
                },
                alias: {
                   required:"请输入别名"
                 
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
            submitHandler: function(form) {
                //form.submit();
                var values = {};
                var fields = {};
                for(var instanceName in CKEDITOR.instances){
                    CKEDITOR.instances[instanceName].updateElement();
                }

                $.each($(form).serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
               
                $.ajax({
                    url : 'page_post.php',
                    type : 'POST',
                    data : values,
                    success : function(res) {
                        //  $('#resultreturn').prepend(res);
                        if (res) {
                            toastr.success('页面已添加成功！', '添加页面')
                        } else {

                            toastr.error('页面添加失败！', '添加页面')
                        }
                    }
                });


            }
        });
    });


</script>

</body>
</html>