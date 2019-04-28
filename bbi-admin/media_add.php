<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');

require_once('data/topics.php');

$topicsClass = new Topics();
$topicses = $topicsClass->fetch_all();

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "添加_媒体关注_后台管理_".SITENAME;?></title>
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
            添加链接
        </div>
        <div class="card-body">
       
            <div class="form-group">
                    <label for="topicsId">相关主题</label>
                    <select  class="form-control" id="topicsId" name="topicsId" >
                    <option value="">--选择相关主题--</option>
                    <?php foreach($topicses as $data) {?>
                    <option value="<?php echo $data["id"];?>"><?php echo $data["title"];?></option>
                    <?php }?>
                    </select>              
                </div>

                <div class="form-group">
                    <label for="title">域名</label>
                  
                        <input type="text" class="form-control" id="title" name="title" >
                  
                </div>
                <div class="form-group">
                    <label for="link">报道链接</label>
                    <input type="text" class="form-control" id="link" name="link" >                  
                </div>

                <div class="form-group">
                            <label for="pubdate">发布日期</label>
                            <input class="form-control" id="pubdate" name="pubdate" value="<?php echo date("Y-m-d");?>" placeholder="" type="date" />                        
                        </div>

                <div class="form-group">
                    <label for="category">分类</label>
                    <input type="text" class="form-control" id="category" name="category" >                  
                </div>
                <div class="form-group">
                    <label for="summary">描述</label>
                    <textarea class="form-control" id="summary" name="summary" placeholder=""></textarea>               
              
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
                   
                },
                pubdate: {
                    required: true,
                    date: true
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
                  
                },
                pubdate: {
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

                $.ajax({
                    url : 'media_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {
                        //   alert(res);
                        if (res) {
                            toastr.success('链接已添加成功！', '添加链接')
                        } else {
                            toastr.error('链接添加失败！', '添加链接')
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>