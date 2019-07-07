<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/dictionary.php');
$dictionaryClass = new Dictionary();
$cities = $dictionaryClass->get_dictionaries_byid(9);
$worktypes = $dictionaryClass->get_dictionaries_byid(10);

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "添加_加入我们_后台管理_".SITENAME;?></title>
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
            添加招聘岗位
        </div>
        <div class="card-body">
          
                <div class="form-group">
                    <label for="title">职位名称</label>                 
                        <input type="text" class="form-control" id="title" name="title" placeholder="">                  
                </div>
                <div class="form-group">
                    <label for="department">职位类型</label>                  
                    <select class="form-control" id="department" name="department">
                        <option value="">--请选择类别--</option>
                        <?php foreach ($worktypes as $type) {
                            ?>
                            <option value="<?php echo $type["title"]; ?>"><?php echo $type["title"]; ?></option>

                        <?php } ?>
                    </select>               
                </div>
                <div class="form-group">
                    <label for="address">工作城市</label>
               
                    <select class="form-control" id="address" name="address">
                        <option value="">--请选择工作城市--</option>
                        <?php foreach ($cities as $city) {
                            ?>
                            <option value="<?php echo $city["title"]; ?>"><?php echo $city["title"]; ?></option>

                        <?php } ?>
                    </select>                        
                </div>

                <div class="form-group">
                    <label for="population">招聘人数</label>                  
                        <input type="number" class="form-control" id="population" name="population" value="0" placeholder="">
              
                </div>
                <div class="form-group">
                    <label for="importance">排序</label>                 
                    <input type="number" class="form-control" id="importance" name="importance" value="0" placeholder="">            
                </div>
                <div class="form-group">
                            <label for="content">岗位描述</label>                            
                                <textarea class="form-control" id="content" name="content" placeholder=""></textarea>
                                <script>
                               // var elFinder = '<?php echo SITEPATH; ?>/js/vendor/elfinder/elfinder-cke.html'; 
                                    CKEDITOR.replace( 'content', {                                      
                                        // filebrowserBrowseUrl: elFinder,
                                        // filebrowserImageBrowseUrl: elFinder      
                                        filebrowserBrowseUrl: '/js/vendor/ckfinder/ckfinder.html',
                                        filebrowserImageBrowseUrl: '/js/vendor/ckfinder/ckfinder.html?type=Images',
                                        filebrowserUploadUrl: '/js/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                        filebrowserImageUploadUrl: '/js/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'                                             
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
<script src="../js/vendor/ckfinder/ckfinder.js"></script>
<script type="text/javascript">


  
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li.jobs").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");


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
                            toastr.success('招聘岗位已添加成功！', '添加招聘岗位')
                        } else {
                            toastr.error('招聘岗位添加失败！', '添加招聘岗位')
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>