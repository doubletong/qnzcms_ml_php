<?php
require_once('../../includes/common.php');
require_once('../../data/article_category.php');
$categoryClass = new TZGCMS\Admin\ArticleCategory();

$did = isset($_GET['did'])?$_GET['did']:"";
$categories = $categoryClass->fetch_all($did);

function buildTree(array $elements, $parentId = 0)
{
    $branch = array();

    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}

$tree = buildTree($categories);


?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "发布_文章_后台管理_".SITENAME;?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <link href="/js/vendor/toastr/toastr.min.css" rel="stylesheet"/>
    <script src="/js/vendor/ckeditor/ckeditor.js"></script>
</head>

<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>

        <div class="container-fluid maincontent">

        <form novalidate="novalidate" id="editform">
            <div class="card">
                <div class="card-header">
                添加文章
            </div>
      
        <div class="card-body">
                <input id="articleId" type="hidden" name="articleId" value="0" />
                <input id="dictionary_id" type="hidden" name="dictionary_id" value="<?php echo $did; ?>" />
                <div class="row">
                    <div class="col">
                        <div class="form-group">                          
                            <label for="title">主题</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="">                         
                        </div>
                        <?php if($did=="1" ){ ?>
                            <div class="form-group">
                                <label for="categoryId">分类</label>                           
                            
                                <select class="form-control" id="categoryId" name="categoryId" placeholder="" >
                                    <option value="0">--请选择分类--</option>
                                <?php foreach( $categories as $model)
                                    {
                                        ?>
                                                <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?></option>

                                    <?php } ?>
                                                    
                                </select>                          
                            </div>
                        <?php } ?>

                        <!-- <?php if($did=="6"){ ?>
                            <div class="form-group">
                                <label for="categoryId">分类</label>                           
                            
                                <select class="form-control" id="categoryId" name="categoryId" placeholder="" >
                                    <option value="0">--请选择分类--</option>
                                    <?php foreach( $tree as $data)
                                            {
                                                ?>
                                                <optgroup label="<?php echo $data["title"]; ?>">
                                                    

                                            <?php if($data['children']){ 
                                                 foreach( $data['children'] as $subModel){
                                                ?>
                                                     <option value="<?php echo $subModel["id"]; ?>"><?php echo $subModel["title"]; ?></option>

                                                <?php } 
                                            } ?>
                                             </optgroup>
                                       <?php } ?>
                                </select>                          
                            </div>
                        <?php } ?> -->


                        <?php if($did=="1"||$did=="2"||$did=="3"){ ?>
                   
                        <div class="form-group">
                            <label for="imageUrl">
                                图片</label>
                                <div class="input-group">
                                    <input id="imageUrl" name="imageUrl"  class="form-control" placeholder="图片" aria-describedby="setImageUrl">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="setImageUrl" type="button" >浏览…</button>                                 
                                    </div>
                                </div>
                                <small id="emailHelp" class="form-text text-muted">图片尺寸：1920*480像素</small>                              
                            </div>                          
                            <?php } ?>
                 

                        <!-- <div class="form-group">
                            <label for="background_image">
                                背景图</label>
                                <div class="input-group">
                                    <input id="background_image" name="background_image"  class="form-control" placeholder="背景图" aria-describedby="setBackgroundImage">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="setBackgroundImage" type="button" >浏览…</button>                                 
                                    </div>
                                </div>
                                <small id="emailHelp" class="form-text text-muted">图片尺寸：1920*550像素</small>                              
                        </div> -->
                       
                        
                        <div class="form-group">
                            <label for="content">内容</label>                            
                                <textarea class="form-control" id="content" name="content" placeholder=""></textarea>
                                <script>
                                //var elFinder = '/js/vendor/elfinder/elfinder-cke.php'; 
                                    CKEDITOR.replace( 'content', {
                                      
                                        // filebrowserBrowseUrl: elFinder,
                                        // filebrowserImageBrowseUrl: elFinder,
                                        filebrowserBrowseUrl: '/js/vendor/ckfinder/ckfinder.html',
                                        filebrowserImageBrowseUrl: '/js/vendor/ckfinder/ckfinder.html?type=Images',
                                        filebrowserUploadUrl: '/js/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                        filebrowserImageUploadUrl: '/js/vendor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                                        allowedContent: true 
                                    });
                                </script>                        
                        </div>

                        <div class="form-group">
                            <label for="summary">摘要</label>
                            <textarea class="form-control" id="summary" name="summary" placeholder=""></textarea>                          
                        </div>
                        <?php if($did!="4"){ ?>
                            <div class="form-group">                          
                                <label for="author">作者</label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="">                         
                            </div>
                            <div class="form-group">                          
                                <label for="source">来源</label>
                                <input type="text" class="form-control" id="source" name="source" placeholder="">                         
                            </div>
                            <div class="form-group">                          
                                <label for="source">来源网址</label>
                                <input type="text" class="form-control" id="source_url" name="source_url" placeholder="">                         
                            </div>
                        <?php } ?>
                        <div class="form-group">
                            <label for="pubdate">发布日期</label>
                            <input class="form-control" id="pubdate" name="pubdate" value="<?php echo date("Y-m-d");?>" placeholder="" type="date" />                        
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" checked id="chkActive" name="active">                          
                            <label class="form-check-label" for="chkActive">发布</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="chkRecommend" name="recommend">                          
                            <label class="form-check-label" for="chkRecommend">精选</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div style="width:300px; text-align:center;" class="mb-3">
                            <div class="card">
                                <div class="card-body">
                                <?php if($did=="1"){ ?>
                                    <img ID="iLogo" src="holder.js/240x360?text=340X422像素" class="img-fluid" />                             
                                <?php }elseif($did=="2"){ ?>
                                    <img ID="iLogo" src="holder.js/240x180?text=370x224像素" class="img-fluid" />
                                <?php }else{?>
                                    <img ID="iLogo" src="holder.js/240x180?text=375X278像素" class="img-fluid" />
                                <?php } ?>
                                </div>
                                <div class="card-footer">
                                    <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="iconfont icon-image"></i> 缩略图...</button>
                                    <input id="thumbnail" type="hidden" name="thumbnail" />
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">SEO</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="description">SEO描述</label>
                                    <textarea class="form-control" id="description" rows="6" name="description" placeholder=""></textarea>                          
                                </div>
                                <div class="form-group">
                                    <label for="keywords">关键字</label>                           
                                    <input type="text" class="form-control" id="keywords" name="keywords" placeholder="">                         
                                </div>
                            </div>
                        
                        </div>
                     
                    </div>
                </div>


        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="JavaScript:window.history.back()" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>
        </div>
    </div>
    </form>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

<script src="/js/vendor/holderjs/holder.min.js"></script>
<script src="/js/vendor/toastr/toastr.min.js"></script>
<script src="/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/js/vendor/ckfinder/ckfinder.js"></script>


<script type="text/javascript">
    function SetThumbnail(fileUrl) {
        $('#thumbnail').val(fileUrl);
        $('#iLogo').attr('src', fileUrl);
    }
    function SetImageUrl(fileUrl) {
        $('#imageUrl').val(fileUrl);
    }
    function SetBackground(fileUrl) {
        $('#background_image').val(fileUrl);
    }

    $(document).ready(function () {
        //当前菜单
        if("1"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(4)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("2"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(5)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("3"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(6)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("6"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(7)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("16"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(8)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        $("#btnBrowser").on("click", function () {         
            // singleEelFinder.selectActionFunction = SetThumbnail;
            // singleEelFinder.open();    
            CKFinder.popup( {
                 chooseFiles: true,
                 onInit: function( finder ) {
                     finder.on( 'files:choose', function( evt ) {
                         var file = evt.data.files.first();                       
                         SetThumbnail(file.getUrl());
                     } );
                     finder.on( 'file:choose:resizedImage', function( evt ) {                      
                        SetThumbnail(evt.data.resizedUrl);
                     } );
                 }
             });    
          
        });       

        $("#setImageUrl").on("click", function () {  
            // singleEelFinder.selectActionFunction = SetImageUrl;
            // singleEelFinder.open();    
            CKFinder.popup( {
                 chooseFiles: true,
                 onInit: function( finder ) {
                     finder.on( 'files:choose', function( evt ) {
                         var file = evt.data.files.first();                       
                         SetImageUrl(file.getUrl());
                     } );
                     finder.on( 'file:choose:resizedImage', function( evt ) {                      
                        SetImageUrl(evt.data.resizedUrl);
                     } );
                 }
             } );            
        });

        $("#setBackgroundImage").on("click", function () {  
            // singleEelFinder.selectActionFunction = SetBackground;
            // singleEelFinder.open(); 
            CKFinder.popup( {
                 chooseFiles: true,
                 onInit: function( finder ) {
                     finder.on( 'files:choose', function( evt ) {
                         var file = evt.data.files.first();                       
                         SetBackground(file.getUrl());
                     } );
                     finder.on( 'file:choose:resizedImage', function( evt ) {                      
                        SetBackground(evt.data.resizedUrl);
                     } );
                 }
             } );               
        });


        $("#editform").validate({

            rules: {
                title: {
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
                    url : 'news_post.php',
                    type : 'POST',
                    data : values,
                    success : function(res) {
                        //  $('#resultreturn').prepend(res);
                        if (res) {
                            toastr.success('新闻已添加成功！', '添加新闻')
                        } else {

                            toastr.error('新闻添加失败！', '添加新闻')
                        }
                    }
                });


            }
        });
    });


</script>

</body>
</html>