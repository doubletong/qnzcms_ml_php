<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');


?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "发布_会议信息_后台管理_".SITENAME;?></title>
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
                添加会议信息
            </div>
      
        <div class="card-body">
                <input id="meetingId" type="hidden" name="meetingId" value="0" />
                <div class="row">
                    <div class="col">
                        <div class="form-group">                          
                            <label for="title">主题</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="">                         
                        </div>

                  
                        <div class="form-group">
                            <label for="sponsor">主办单位</label>
                            <input class="form-control" id="sponsor" name="sponsor" placeholder="" type="text" />                        
                        </div>

                        <div class="form-group">
                            <label for="co_organizer">协办单位</label>
                            <input class="form-control" id="co_organizer" name="co_organizer" placeholder="" type="text" />                        
                        </div>
                    
                        <div class="form-group">
                            <label for="meeting_time">会议时间</label>
                            <input class="form-control" id="meeting_time" name="meeting_time" value="<?php echo date("Y/m/d H:i");?>" placeholder="" type="text" />                        
                        </div>

                        <div class="form-group">
                            <label for="address">会议地点</label>
                            <input class="form-control" id="address" name="address" placeholder="" type="text" />                        
                        </div>
                        
                        <div class="form-group">
                            <label for="content">会议内容</label>                            
                                <textarea class="form-control" id="content" name="content" placeholder=""></textarea>
                                <script>
                                var elFinder = '/js/vendor/elfinder/elfinder-cke.html'; 
                                    CKEDITOR.replace( 'content', {
                                      
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder                                                   
                                    });
                                </script>                        
                        </div>

                        <div class="form-group">
                            <label for="summary">摘要</label>
                            <textarea class="form-control" id="summary" name="summary" placeholder=""></textarea>                          
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
                                    <img ID="iLogo" src="holder.js/240x180?text=540X350像素" class="img-responsive img-rounded" />
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 缩略图...</button>
                                    <input id="thumbnail" type="hidden" name="thumbnail" />
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">SEO</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="description">SEO描述</label>
                                    <textarea class="form-control" id="description" rows="6" name="description" placeholder=""></textarea>                          
                                </div>
                                <div class="form-group">
                                    <label for="keywords">关键字</label>                           
                                    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="">                         
                                </div>
                            </div>
                        
                        </div>
                     
                    </div>
                </div>


        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="meetings.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>
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
        $('#thumbnail').val(fileUrl);
        $('#iLogo').attr('src', fileUrl);
    }



    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li:nth-of-type(3)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
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
        $('#meeting_time').datetimepicker({
            locale: 'zh-CN'
        });

        $("#btnBrowser").on("click", function () {         
            singleEelFinder.selectActionFunction = SetThumbnail;
            singleEelFinder.open();        
          
        });

       

        $("#editform").validate({

            rules: {
                title: {
                    required: true
                },
                sponsor: {
                    required: true
                },
                co_organizer: {
                    required: true
                },
                address: {
                    required: true
                },
                meeting_time: {
                    required: true,
                    date: true
                }

            },
            messages:{
                title: {
                    required:"请输入主标题"
                },
                sponsor: {
                    required: "请输入主办单位"
                },
                co_organizer: {
                    required: "请输入协办单位"
                },
                address: {
                    required: "请输入会议地点"
                },
                meeting_time: {
                    required: "请选择发布日期",
                    date: "日期格式不正确"
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
                    url : 'meeting_post.php',
                    type : 'POST',
                    data : values,
                    success : function(res) {
                        //  $('#resultreturn').prepend(res);
                        if (res) {
                            toastr.success('新闻已添加成功！', '添加会议信息')
                        } else {

                            toastr.error('新闻添加失败！', '添加会议信息')
                        }
                    }
                });


            }
        });
    });


</script>

</body>
</html>