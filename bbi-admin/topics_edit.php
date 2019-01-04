<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/topics.php');

$topicsClass = new Topics();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $topicsClass->fetch_data($id);
}else{
    header('Location: topics.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "编辑_媒体关注_后台管理_".SITENAME;?></title>
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
            编辑主题
        </div>
        <div class="card-body">
        <input id="topicsId" type="hidden" name="topicsId" value="<?php echo $data['id'];?>" />


                <div class="form-group">
                    <label for="title">主题</label>                 
                        <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo $data['title'];?>" />                  
                </div>
  
        </div>
        <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="topics.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>       
                     
                </div>
    </div>
    </form>
</div>
<?php require_once('includes/footer.php'); ?> 
</section>

</div>

<?php require_once('includes/scripts.php'); ?> 

<script src="../js/vendor/toastr/toastr.min.js"></script>
<script src="../js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript">


  
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li:nth-of-type(4)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");


        $("form").validate({

            rules: {
                title: {
                    required: true
                }
              

            },
            messages:{
                title: {
                    required:"请输入主题"
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
                    url : 'topics_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {
                        //   alert(res);
                        if (res) {
                            toastr.success('主题已编辑成功！', '编辑主题')
                        } else {
                            toastr.error('主题编辑失败！', '编辑主题')
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>