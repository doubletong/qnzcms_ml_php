<?php
require_once('../../includes/common.php');
require_once('../../data/case_category.php');

$caseClass = new TZGCMS\Admin\CaseCategory();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $caseClass->fetch_data($id);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "编辑_案例分类_后台管理_".SITENAME;?></title>
    <?php require_once('../../includes/meta.php') ?>
    <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>

</head>

<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once('../../includes/nav.php'); ?>
    <!-- /nav end -->
    <section class="rightcol">            
        <?php require_once('../../includes/header.php'); ?>

        <div class="container-fluid maincontent">
        <form novalidate="novalidate" id="editform">
            <div class="card">
                <div class="card-header">
                编辑案例分类
            </div>      
        <div class="card-body">
                <input id="categoryId" type="hidden" name="categoryId" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                <div class="row">
                    <div class="col">
                        <div class="form-group">                          
                            <label for="title">主题</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($data['title'])?$data['title']:''; ?>">                         
                        </div>

                        <!-- <div class="form-group">                          
                            <label for="title_en">英文主题</label>
                            <input type="text" class="form-control" id="title_en" name="title_en" value="<?php echo isset($data['title_en'])?$data['title_en']:''; ?>" placeholder="">                         
                        </div> -->
                       
                        <div class="form-group">
                    <label for="importance">排序</label>                 
                    <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:0; ?>" placeholder="值越大越排前">                  
                </div>

                <div class="form-group">
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">                          
                    <label class="form-check-label" for="chkActive">发布</label>
                    </div>
                </div>
                       
                    </div>
                    <div class="col-auto">
                        <div style="width:300px; text-align:center;" class="mb-3">
                            <div class="card">
                                <div class="card-body">

                                        <img ID="iLogo" src="<?php echo empty($data['imageurl'])?"holder.js/240x240?text=72X72像素":$data['imageurl'];?>" class="img-fluid" />
                            
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 缩略图...</button>
                                    <input id="imageurl" type="hidden" name="imageurl" value="<?php echo isset($data['imageurl'])?$data['imageurl']:''; ?>" />
                                </div>
                            </div>
                        </div>

                  
                     
                    </div>
                </div>


        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="case_categories.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>
        </div>
    </div>
    </form>
</div>
<?php require_once('../../includes/footer.php'); ?> 
</section>

</div>

<?php require_once('../../includes/scripts.php'); ?> 

<script src="/assets/js/vendor/holderjs/holder.min.js"></script>
<script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>

<script type="text/javascript">
    function SetThumbnail(fileUrl) {
        $('#imageurl').val(fileUrl);
        $('#iLogo').attr('src', fileUrl);
    }


    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li.cases").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
        

        $("#btnBrowser").on("click", function () {         
            singleEelFinder.selectActionFunction = SetThumbnail;
            singleEelFinder.open();        
          
        });

       

        $("#editform").validate({

            rules: {
                title: {
                    required: true
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
                for(var instanceName in CKEDITOR.instances){
                    CKEDITOR.instances[instanceName].updateElement();
                }

                $.each($(form).serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
               
                $.ajax({
                    url : 'case_category_post.php',
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