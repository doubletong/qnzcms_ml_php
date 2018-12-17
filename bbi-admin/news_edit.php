<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/article.php');

$articleClass = new Article();
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $articleClass->fetch_data($id);
}else{
    header('Location: index.php');
    exit;
}


?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "编辑新闻_新闻资讯_后台管理_".SITENAME;?></title>
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
                        编辑新闻
                    </div>
                    <div class="card-body">                 
                        <input id="articleId" type="hidden" name="articleId" value="<?php echo $data['id'];?>" />
                      <div class="row">
                          <div class="col">


                          <div class="form-group">
                            <label for="title" >标题</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo $data['title'];?>">                       
                        </div>

                        <div class="form-group">
                            <label for="categoryId">分类</label>                          
                                <select class="form-control"  id="categoryId" name="categoryId" >
                                    <option value="0">--选择分类--</option>
                                    <option value="1" <?php if($data[categoryId]==1) echo("selected");?>>新闻资讯</option>
                                    <option value="2" <?php if($data[categoryId]==2) echo("selected");?>>口腔护理知识</option>
                                </select>                          
                        </div>

                        <div class="form-group">
                            <label for="imageUrl">
                                大图</label>
                        
                                <div class="input-group">
                                    <input id="imageUrl" name="imageUrl"  class="form-control" placeholder="大图" value="<?php echo $data['image_url'];?>" aria-describedby="setImageUrl">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="setImageUrl" type="button" >浏览…</button>                                 
                                    </div>
                                </div>
                                <small id="emailHelp" class="form-text text-muted">图片尺寸：500*500像素</small>                             
                          
                        </div>


                        <div class="form-group">
                            <label for="content">内容</label>
                           
                                <textarea class="form-control" id="content" name="content" placeholder=""><?php echo stripslashes($data['content']);?></textarea>
                                <script>
                                    var elFinder = '<?php echo SITEPATH; ?>/js/vendor/elFinder/elfinder-cke.html'; 
                                    CKEDITOR.replace( 'content', {                                      
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder                                                   
                                    });

                                </script>
                        </div>
                        <div class="form-group">
                            <label for="description">SEO描述</label>
                        
                                <textarea class="form-control" id="description" name="description" placeholder=""><?php echo $data['description'];?></textarea>
                           
                        </div>
                        <div class="form-group">
                            <label for="keywords">关键字</label>
                           
                                <input type="text" class="form-control" id="keywords" name="keywords" placeholder="" value="<?php echo $data['keywords'];?>">
                         
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" <?php echo $data['active']?"checked":"";?> id="chkActive" name="active">                          
                            <label class="form-check-label" for="chkActive">发布</label>
                            </div>
                        </div>

                      

                          </div>
                        <div class="col-auto">
                        <div style="width:300px;  text-align:center;">
                            <div class="card">
                                <div class="card-body">
                                    <img ID="iLogo" src="<?php echo empty($data['thumbnail'])?"holder.js/240x180/text:433X289像素":$data['thumbnail'];?>" class="img-fluid" />
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="fa fa-picture-o"></i> 缩略图...</button>
                                    <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo $data['thumbnail'];?>" />
                                </div>
                            </div>
                        </div>
                        </div>
                        </div>
                       

                      
                   
                </div>
                <div class="card-footer text-center">
                           
                <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="news.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>
                          
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

    function SetBackground(fileUrl) {
        $('#imageUrl').val(fileUrl);
    }
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li:nth-of-type(4)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");

        $("#btnBrowser").on("click", function () {
            singleEelFinder.selectActionFunction = SetThumbnail;
            singleEelFinder.open();        
        });

        $("#setImageUrl").on("click", function () {
            singleEelFinder.selectActionFunction = SetBackground;
            singleEelFinder.open();    
        });


        $("form").validate({

            rules: {
                title: {
                    required: true
                }

            },
            messages:{
                title: {
                    required:"请输入主标题"
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
                    url : 'news_post.php',
                    type : 'POST',
                    data : values,
                    success : function(res) {

                        //  $('#resultreturn').prepend(res);
                        if (res) {
                            toastr.success('新闻已保存成功！', '编辑新闻')
                        } else {
                            toastr.error('新闻保存失败！', '编辑新闻')
                        }
                    }
                });

            }
        });
    });
</script>

</body>
</html>