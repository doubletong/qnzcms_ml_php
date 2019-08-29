<?php
require_once('../../includes/common.php');
require_once('../../data/job.php');
require_once('../../data/dictionary.php');
$JobClass = new TZGCMS\Admin\Job();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $JobClass->fetch_data($id);
}

$dictionaryClass = new TZGCMS\Admin\Dictionary();
$cities = $dictionaryClass->get_dictionaries_byid(9);
$worktypes = $dictionaryClass->get_dictionaries_byid(10);

$pageTitle = isset($_GET['id'])?"编辑":"创建";

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle."_岗位招聘_后台管理_".$site_info['sitename'];?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link href="/js/vendor/toastr/toastr.min.css" rel="stylesheet"/>
    <script src="/js/vendor/ckeditor/ckeditor.js"></script>
</head>

<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once('../../includes/nav.php'); ?>
    <!-- /nav end -->
    <section class="rightcol">            
        <?php require_once('../../includes/header.php'); ?>

        <div class="container-fluid maincontent">

        <form novalidate="novalidate">
    <div class="card">
        <div class="card-header">
            <?php echo $pageTitle."岗位";?>
        </div>
        <div class="card-body">
        <input id="jobId" type="hidden" name="jobId" value="<?php echo isset($data['id'])?$data['id']:0;?>" />

                <div class="form-group">
                    <label for="title">招聘岗位</label>                 
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($data['title'])?$data['title']:''; ?>" placeholder="">                  
                </div>
            
                <div class="form-group">
                    <label for="address">工作城市</label>
                    <select class="form-control" id="address" name="address">
                        <option value="">--请选择工作城市--</option>
                        <?php foreach ($cities as $city) {
                            ?>
                            <option value="<?php echo $city["title"]; ?>" <?php echo (isset($data['address']) && $city["title"]==$data["address"])?"selected":""; ?> ><?php echo $city["title"]; ?></option>

                        <?php } ?>
                    </select>                  
                </div>

                <div class="form-group">
                    <label for="population">招聘人数</label>                  
                        <input type="number" class="form-control" id="population" name="population" value="<?php echo isset($data['population'])?$data['population']:'1'; ?>" placeholder="">              
                </div>
                <div class="form-group">
                    <label for="importance">排序</label>                 
                    <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:'0'; ?>" placeholder="">            
                </div>
                <div class="form-group">
                            <label for="content">岗位描述</label>                            
                                <textarea class="form-control" id="content" name="content" placeholder=""><?php echo isset($data['content'])?$data['content']:''; ?></textarea>
                                <script>
                                    var elFinder = '<?php echo SITEPATH; ?>js/vendor/elfinder/elfinder-cke.html'; 
                                    CKEDITOR.replace( 'content', {                                      
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,
                                        allowedContent: true
                                        // filebrowserBrowseUrl: '/js/vendor/ckfinder/ckfinder.html',
                                        // filebrowserImageBrowseUrl: '/js/vendor/ckfinder/ckfinder.html?type=Images',
                                        // filebrowserUploadUrl: '/js/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                        // filebrowserImageUploadUrl: '/js/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'  
                                                                                      
                                    });
                                </script>                        
                        </div>



        </div>
        <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="JavaScript:window.history.back()" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>       
                     
                </div>
    </div>
    </form>
</div>
<?php require_once('../../includes/footer.php'); ?> 
</section>

</div>

<?php require_once('../../includes/scripts.php'); ?> 

<script src="/js/vendor/toastr/toastr.min.js"></script>
<script src="/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/js/vendor/ckfinder/ckfinder.js"></script>
<script type="text/javascript">


  
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li.jobs").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");


        $("form").validate({

            rules: {
                title: {
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
                var values = {};
                var fields = {};
                for (var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }

                $.each($(form).serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });

                $.ajax({
                    url : 'job_post.php',
                    type : 'POST',
                    data : values,
                    success : function(res) {
                        var myobj = JSON.parse(res);                    
                        //console.log(myobj.status);
                        if (myobj.status === 1) {
                            toastr.success(myobj.message);                                        
                        } 
                        if (myobj.status === 2) {
                            toastr.error(myobj.message)
                        }
                        if (myobj.status === 3) {
                            toastr.info(myobj.message)
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>