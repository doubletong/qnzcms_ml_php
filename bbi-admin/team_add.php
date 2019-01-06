<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');


?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "发布_团队_后台管理_".SITENAME;?></title>
    <?php require_once('includes/meta.php') ?>
    <link href="../js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
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
                添加团队
            </div>
      
        <div class="card-body">
                <input id="teamId" type="hidden" name="teamId" value="0" />
                <div class="row">
                    <div class="col">
                        <div class="form-group">                          
                            <label for="name">姓名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="">                         
                        </div>

                        <div class="form-group">
                            <label for="category">类别</label>
                            <select class="form-control" id="category" name="category" placeholder="" >
                                <option value="">--请选择类别--</option>
                                <option value="核心团队">核心团队</option>
                                <option value="专家顾问">专家顾问</option>                                             
                            </select>                       
                        </div>

                    
                        <div class="form-group">
                            <label for="post">职位</label>
                            <input class="form-control" id="post" name="post" placeholder="" type="text" />                        
                        </div>

                        <div class="form-group">
                                                <label for="importance">排序</label>

                                                <input type="number" class="form-control" id="importance" name="importance"
                                                    value="0" placeholder="">

                                            </div>
                        
                        <div class="form-group">
                            <label for="content">职位描述</label>                            
                                <textarea class="form-control" id="content" name="content" placeholder=""></textarea>
                                <script>
                                var elFinder = '<?php echo SITEPATH; ?>/js/vendor/elFinder/elfinder-cke.html'; 
                                    CKEDITOR.replace( 'content', {
                                      
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,     
                                        allowedContent: true                                          
                                    });
                                </script>                        
                        </div>

                        
                    </div>
                    <div class="col-auto">
                        <div style="width:300px; text-align:center;" class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <img ID="iLogo" src="holder.js/250x250?text=250X250像素" class="img-responsive img-rounded" />
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 缩略图...</button>
                                    <input id="photo" type="hidden" name="photo" />
                                </div>
                            </div>
                        </div>
                        
                     
                    </div>
                </div>


        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="teams.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>
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
<script src="../js/vendor/moment/min/moment-with-locales.min.js"></script>
<script type="text/javascript" src="../js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">
    function SetThumbnail(fileUrl) {
        $('#photo').val(fileUrl);
        $('#iLogo').attr('src', fileUrl);
    }



    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li:nth-of-type(7)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
        //自定义图标
        $.extend(true, $.fn.datetimepicker.defaults, {
            icons: {
            time: 'iconfont icon-time-circle',
            date: 'iconfont icon-calendar',
            up: 'iconfont icon-arrowup',
            down: 'iconfont icon-arrowdown',
            previous: 'iconfont icon-arrowleft',
            next: 'iconfont icon-arrowright',
            today: 'iconfont icon-calendar-check',
            clear: 'iconfont icon-delete',
            close: 'iconfont icon-close-circle'
            }
        });
        $('#team_time').datetimepicker({
            locale: 'zh-CN'
        });

        $("#btnBrowser").on("click", function () {         
            singleEelFinder.selectActionFunction = SetThumbnail;
            singleEelFinder.open();        
          
        });

       

        $("#editform").validate({

            rules: {
                name: {
                    required: true
                },
                post: {
                    required: true
                },
                category: {
                    required: true
                },
                importance: {
                        required: true,
                        digits: true
                    },
                content: {
                    required: true
                }

            },
            messages:{
                name: {
                    required:"请输入姓名"
                },
                post: {
                    required: "请输入职位"
                },
                category: {
                    required: "请选择类别"
                },
                importance: {
                    required: "请输入序号",
                        digits: "请输入有效的整数"
                    },
                content: {
                    required: "请输入职位描述"
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
                    url : 'team_post.php',
                    type : 'POST',
                    data : values,
                    success : function(res) {
                        //  $('#resultreturn').prepend(res);
                        if (res) {
                            toastr.success('团队已添加成功！', '添加团队')
                        } else {

                            toastr.error('团队添加失败！', '添加团队')
                        }
                    }
                });


            }
        });
    });


</script>

</body>
</html>