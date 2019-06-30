<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "添加_轮播图_组件_后台管理_".SITENAME;?></title>
    <?php require_once('includes/meta.php') ?>
    <link href="../js/vendor/toastr/toastr.min.css" rel="stylesheet"/>
</head>

<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once('includes/nav.php'); ?>
    <!-- /nav end -->
    <section class="rightcol">            
        <?php require_once('includes/header.php'); ?>

        <div class="container-fluid maincontent">

        <form novalidate="novalidate">

    <div class="card">
        <div class="card-header">
            添加轮播图
        </div>
        <div class="card-body">
       

                <div class="form-group">
                    <label for="title">主题</label>                 
                    <input type="text" class="form-control" id="title" name="title" placeholder="主题">                  
                </div>
                <div class="form-group">
                    <label for="link" >链接</label>                 
                    <input type="text" class="form-control" id="link" name="link" placeholder="链接">                  
                </div>

                <div class="form-group">
                    <label for="imageUrl">轮播图(PC)</label>                  
                        <div class="input-group">
                            <input id="imageUrl" name="imageUrl"  class="form-control" aria-describedby="setImageUrl">                                
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" id="setImageUrl" type="button" >浏览…</button>                                 
                            </div>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">图片尺寸：1920*500像素</small>                   
                </div>
                <div class="form-group">
                    <label for="image_url_mobile">轮播图(移动)</label>                  
                        <div class="input-group">
                            <input id="image_url_mobile" name="image_url_mobile"  class="form-control"  aria-describedby="setImageUrlMobile">                                
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" id="setImageUrlMobile" type="button" >浏览…</button>                                 
                            </div>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">图片尺寸：750*1334像素</small>                   
                </div>

                <div class="form-group">
                    <label for="importance">排序</label>                 
                    <input type="number" class="form-control" id="importance" name="importance" value="0" placeholder="值越大越排前">                  
                </div>

                <div class="form-group">
                    <label for="description">描述</label>
                    <textarea class="form-control" id="description" name="description" placeholder="描述"></textarea>                  
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
            <a href="carousels.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>                       
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
<script type="text/javascript">


    function SetBackground(fileUrl) {
        $('#imageUrl').val(fileUrl);
    }

    function SetImageUrlMobile(fileUrl) {
        $('#image_url_mobile').val(fileUrl);
    }

    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li:nth-of-type(10)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");



        $("#setImageUrl").on("click", function () {
            singleEelFinder.selectActionFunction = SetBackground;
            singleEelFinder.open();         
        });
        $("#setImageUrlMobile").on("click", function () {
            singleEelFinder.selectActionFunction = SetImageUrlMobile;
            singleEelFinder.open();         
        });


        $("form").validate({
            rules: {
                title: {
                    required: true
                },
                link: {
                    url: true
                },
                importance: {
                    required: true,
                    digits:true
                }

            },
            messages:{
                title: {
                    required:"请输入主标题"
                },
                link: {
                    url: "链接格式不正确"
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
            submitHandler: function(form) {
                //form.submit();

                $.ajax({
                    url : 'carousel_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {
                     //   alert(res);
                        if (res) {
                            toastr.success('轮播图已添加成功！', '添加轮播图')
                        } else {
                            toastr.error('轮播图添加失败！', '添加轮播图')
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>