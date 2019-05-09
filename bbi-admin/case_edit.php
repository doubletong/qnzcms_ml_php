<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/case.php');
require_once('data/case_category.php');


$caseClass = new CaseShow();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $caseClass->fetch_data($id);
}else{
    header('Location: cases.php');
    exit;
}

$categoryClass = new CaseCategory();
$categories = $categoryClass->fetch_all();
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "编辑_案例_后台管理_".SITENAME;?></title>
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

        <form novalidate="novalidate" id="editform">
            <div class="card">
                <div class="card-header">
                编辑案例
            </div>
      
        <div class="card-body">
                <input id="caseId" type="hidden" name="caseId" value="<?php echo $data["id"]; ?>" />
                <div class="row">
                    <div class="col">
                        <div class="form-group">                          
                            <label for="title">主题</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $data["title"]; ?>">                         
                        </div>

                        <div class="form-group">
                            <label for="category">类别</label>
                            <select class="form-control" id="categoryid" name="categoryid" placeholder="" >
                                <option value="">--请选择类别--</option>
                               <?php foreach( $categories as $model)
                                {
                                    if($model["id"]=== $data["categoryid"]){
                                    ?>
                                            <option value="<?php echo $model["id"]; ?>" selected><?php echo $model["title"]; ?></option>

                                <?php }else{?>

                                    <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?> </option>
                                    <?php } } ?>
                                                 
                            </select>                       
                        </div>
                  
                        <div class="form-group">
                            <label for="importance">排序</label>                 
                            <input type="number" class="form-control" id="importance" name="importance" value="<?php echo $data["importance"]; ?>" placeholder="值越大越排前">                  
                        </div>

                        <div class="form-group">
                            <label for="content">案例内容</label>                            
                                <textarea class="form-control" id="body" name="body" placeholder=""><?php echo $data["body"]; ?></textarea>
                                <script>
                                var elFinder = '/js/vendor/elfinder/elfinder-cke.html'; 
                                    CKEDITOR.replace( 'body', {
                                      
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder                                                   
                                    });
                                </script>                        
                        </div>

                        <div class="form-group">
                            <label for="summary">摘要</label>
                            <textarea class="form-control" id="summary" name="summary" placeholder=""><?php echo $data["summary"]; ?></textarea>                          
                        </div>

                        <div class="form-group">
                            <label for="pubdate">发布日期</label>
                            <input class="form-control" id="pubdate" name="pubdate" value="<?php echo date('Y-m-d',$data['pubdate']);?>" placeholder="" type="date" />                        
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" <?php echo $data['recommend']?"checked":"";?> id="chkRecommend" name="recommend">                          
                            <label class="form-check-label" for="chkRecommend">首页推荐</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-auto">
                        <div style="width:300px; text-align:center;" class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                 
                                    <img ID="iLogo" src="<?php echo empty($data['thumbnail'])?"holder.js/240x180?text=380X275像素":$data['thumbnail'];?>" class="img-fluid" />
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 缩略图...</button>
                                    <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo $data["thumbnail"]; ?>" />
                                </div>
                            </div>
                        </div>
                     
                    </div>
                </div>


        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="cases.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>
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
    function SetThumbnail(fileUrl) {
        $('#thumbnail').val(fileUrl);
        $('#iLogo').attr('src', fileUrl);
    }


    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li:nth-of-type(2)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        

        $("#btnBrowser").on("click", function () {         
            singleEelFinder.selectActionFunction = SetThumbnail;
            singleEelFinder.open();        
          
        });

       

        $("#editform").validate({

            rules: {
                title: {
                    required: true
                },
                categoryid: {
                    required: true
                },
                pubdate: {
                    required: true,
                    date: true
                }
            

            },
            messages:{
                title: {
                    required:"请输入主标题"
                },
                categoryid: {
                    required: "请选择类别"
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
                var values = {};
                var fields = {};
                for(var instanceName in CKEDITOR.instances){
                    CKEDITOR.instances[instanceName].updateElement();
                }

                $.each($(form).serializeArray(), function(i, field) {
                    values[field.name] = field.value;
                });
               
                $.ajax({
                    url : 'case_post.php',
                    type : 'POST',
                    data : values,
                    success : function(res) {
                        //  $('#resultreturn').prepend(res);
                        if (res) {
                            toastr.success('案例已编辑成功！', '编辑案例')
                        } else {

                            toastr.error('案例编辑失败！', '编辑案例')
                        }
                    }
                });


            }
        });
    });


</script>

</body>
</html>