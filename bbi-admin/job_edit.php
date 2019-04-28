<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/job.php');

$JobClass = new Job();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $JobClass->fetch_data($id);
}else{
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "编辑_加入我们_后台管理_".SITENAME;?></title>
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

        <form novalidate="novalidate">
    <div class="card">
        <div class="card-header">
            编辑招聘岗位
        </div>
        <div class="card-body">
        <input id="jobId" type="hidden" name="jobId" value="<?php echo $data['id'];?>" />

                <div class="form-group">
                    <label for="title">招聘岗位</label>                 
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo $data["title"]; ?>" placeholder="">                  
                </div>
                <div class="form-group">
                    <label for="department">所在部门</label>
                    <input type="text" class="form-control" id="department" name="department" value="<?php echo $data["department"]; ?>" placeholder="">                  
                </div>
                <div class="form-group">
                    <label for="address">工作地点</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $data["address"]; ?>" placeholder="">                  
                </div>

                <div class="form-group">
                    <label for="population">招聘人数</label>                  
                        <input type="number" class="form-control" id="population" name="population" value="<?php echo $data["population"]; ?>" placeholder="">              
                </div>
                <div class="form-group">
                    <label for="importance">排序</label>                 
                    <input type="number" class="form-control" id="importance" name="importance" value="<?php echo $data["importance"]; ?>" placeholder="">            
                </div>
                <div class="form-group">
                            <label for="content">岗位描述</label>                            
                                <textarea class="form-control" id="content" name="content" placeholder=""><?php echo $data["content"]; ?></textarea>
                                <script>
                                var elFinder = '<?php echo SITEPATH; ?>/js/vendor/elfinder/elfinder-cke.html'; 
                                    CKEDITOR.replace( 'content', {
                                      
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder                                                   
                                    });
                                </script>                        
                        </div>



        </div>
        <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="jobs.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>       
                     
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
        $(".mainmenu>li:nth-of-type(8)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");


        $("form").validate({

            rules: {
                title: {
                    required: true
                },
                department: {
                    required: true
                },
                address: {
                    required: true
                },
                population: {
                    required: true,
                    digits:true
                },
                importance: {
                    required: true,
                    digits:true
                }

            },
            messages:{
                title: {
                    required:"请输入招聘岗位"
                },
                department: {
                    required: "请输入招聘所在部位"
                },
                address: {
                    required:"请输入工作地点"
                },
                population: {
                    required: "请输入招聘人数",
                    digits:"请输入有效的整数"
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
                    url : 'job_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {
                        //   alert(res);
                        if (res) {
                            toastr.success('招聘岗位已编辑成功！', '编辑招聘岗位')
                        } else {
                            toastr.error('招聘岗位编辑失败！', '编辑招聘岗位')
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>