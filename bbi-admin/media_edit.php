<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/topics.php');
require_once('data/media.php');

$topicsClass = new Topics();
$topicses = $topicsClass->fetch_all();



$mediaClass = new Media();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $mediaClass->fetch_data($id);
}else{
    header('Location: media.php');
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
            编辑链接
        </div>
        <div class="card-body">
        <input id="linkId" type="hidden" name="linkId" value="<?php echo $data['id'];?>" />

            <div class="form-group">
                    <label for="topicsId">相关主题</label>
                    <select  class="form-control" id="topicsId" name="topicsId" >
                    <option value="">--选择相关主题--</option>
                        <?php foreach($topicses as $topic) {
                            if($topic["id"]==$data["topicsId"]){
                                ?>
                                    <option value="<?php echo $topic["id"];?>" selected><?php echo $topic["title"];?></option>
                                 <?php
                            }else{
                                ?>
                                    <option value="<?php echo $topic["id"];?>"><?php echo $topic["title"];?></option>
                                <?php
                            }
                            ?>
                          
                          
                        <?php }?>
                    </select>              
                </div>

                <div class="form-group">
                    <label for="title">域名</label>
                  
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $data["title"];?>"/>
                  
                </div>
                <div class="form-group">
                    <label for="link">报道链接</label>
                    <input type="text" class="form-control" id="link" name="link" value="<?php echo $data["link"];?>" />                  
                </div>

          
                <div class="form-group">
                    <label for="category">分类</label>
                    <input type="text" class="form-control" id="category" name="category" value="<?php echo $data["category"];?>" />                  
                </div>
                <div class="form-group">
                    <label for="summary">描述</label>
                    <textarea class="form-control" id="summary" name="summary" placeholder=""><?php echo $data["summary"];?></textarea>               
              
                </div>

               

        </div>
        <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="media.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>       
                     
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
        $(".mainmenu>li:nth-of-type(4)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");


        $("form").validate({

            rules: {
                topicsId: {
                    required: true
                },
                title: {
                    required: true
                },
                link: {
                    required: true,
                    url: true
                },
                summary: {
                    required: true,
                   
                }

            },
            messages:{
                topicsId: {
                    required: "请选择相关主题"
                },
                title: {
                    required:"请输入域名"
                },
                link: {
                    required:"请输入报道链接",
                    url: "链接格式不正确"
                },
                summary: {
                    required: "请输入描述"
                  
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
                    url : 'media_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {
                        //   alert(res);
                        if (res) {
                            toastr.success('链接已编辑成功！', '编辑链接')
                        } else {
                            toastr.error('链接编辑失败！', '编辑链接')
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>