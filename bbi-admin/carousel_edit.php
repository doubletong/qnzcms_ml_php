<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/carousel.php');


$carouselClass = new Carousel();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $carouselClass->fetch_data($id);
}else{
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "编辑_轮播图_组件_后台管理_".SITENAME;?></title>
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

        <form  novalidate="novalidate">
    <div class="card">
        <div class="card-header">
            编辑轮播图
        </div>
        <div class="card-body">
         
                <input id="carouselId" type="hidden" name="carouselId" value="<?php echo $data['id'];?>" />


                <div class="form-group">
                    <label for="title">主题</label>
                  
                        <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo $data['title'];?>">
                  
                </div>

                <div class="form-group">
                    <label for="link">链接</label>
                   
                        <input type="text" class="form-control" id="link" name="link" placeholder="" value="<?php echo $data['link'];?>">
                   
                </div>
                <div class="form-group">
                    <label for="imageUrl">轮播图</label>                  
                    <div class="input-group">
                        <input id="imageUrl" name="imageUrl"  class="form-control" placeholder="轮播图" value="<?php echo $data['image_url'];?>" aria-describedby="setImageUrl">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" id="setImageUrl" type="button" >浏览…</button>                                 
                        </div>
                    </div>                      
                    <small id="emailHelp" class="form-text text-muted">图片尺寸：1920*500像素</small>   
                </div>

                <div class="form-group">
                    <label for="importance">排序</label>
                    <input type="number" class="form-control" id="importance" name="importance" value="<?php echo empty($data['importance'])?"0":$data['importance'];?>" placeholder="">
                  
                </div>

                <div class="form-group">
                    <label for="description">描述</label>                   
                    <textarea class="form-control" id="description" name="description" placeholder=""><?php echo $data['description'];?></textarea>                 
                </div>

                <div class="form-group">
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" <?php echo $data['active']?"checked":"";?> id="chkActive" name="active">                          
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
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li:nth-of-type(10)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");

        $("#setImageUrl").on("click", function () {
              singleEelFinder.selectActionFunction = SetBackground;
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

                        //  $('#resultreturn').prepend(res);
                        if (res) {
                            toastr.success('轮播图已保存成功！', '编辑轮播图')
                        } else {
                            toastr.error('轮播图保存失败！', '编辑轮播图')
                        }
                    }
                });

            }
        });
    });
</script>

</body>
</html>