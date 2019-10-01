<?php

require_once('../../includes/common.php');
require_once('../../data/carousel.php');
require_once('../../data/position.php');

$carouselClass = new TZGCMS\Admin\Carousel();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $carouselClass->fetch_data($id);
}
$pageTitle = isset($_GET['id'])?"编辑广告":"创建广告";

$positionClass = new TZGCMS\Admin\Position();
$positions = $positionClass->get_all();

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle."_广告_后台管理_".$site_info['sitename'];?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once('../../includes/nav.php'); ?>
    <!-- /nav end -->
    <section class="rightcol">            
        <?php require_once('../../includes/header.php'); ?>
        <div class="container-fluid maincontent">

        <form  novalidate="novalidate">
    <div class="card">
        <div class="card-header">
            <?php echo $pageTitle;?>
        </div>
        <div class="card-body">
         
                <input id="carouselId" type="hidden" name="carouselId" value="<?php echo isset($data['id'])?$data['id']:0;?>" />

                <div class="form-group">
                    <label for="title">主题</label>                  
                    <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo isset($data['title'])?$data['title']:''; ?>">
                  
                </div>
                <div class="form-group">
                    <label for="categoryId">广告位</label>                                   
                    <select class="form-control" id="position_id" name="position_id">
                        <option value="">--请选择广告位--</option>
                        <?php foreach( $positions as $model)
                        {
                            if(isset($data['position_id']) && $model["id"]=== $data["position_id"]){
                            ?>
                                    <option value="<?php echo $model["id"]; ?>" selected><?php echo $model["title"]; ?></option>

                        <?php }else{?>

                            <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?> </option>
                            <?php } } ?>
                                        
                    </select>  
                </div>
                <div class="form-group">
                    <label for="link">链接</label>                   
                    <input type="text" class="form-control" id="link" name="link" placeholder="" value="<?php echo isset($data['link'])?$data['link']:''; ?>">
                   
                </div>
                <div class="form-group">
                    <label for="imageUrl">图片</label>     
                    <?php if(isset($data['image_url']) && !empty($data['image_url'])){ ?>
                        <div style="padding:1rem 0;">
                        <img id="img_image_url" src="<?php echo $data['image_url']; ?>" alt="" style="height:120px;" />
                        </div>
                    <?php } ?>                     
                    <div class="input-group">
                        <input id="imageUrl" name="imageUrl"  class="form-control" value="<?php echo isset($data['image_url'])?$data['image_url']:''; ?>" aria-describedby="setImageUrl">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" id="setImageUrl" type="button" >浏览…</button>                                 
                        </div>
                    </div>                      
                    <small id="emailHelp" class="form-text text-muted">图片尺寸：1920*500像素</small>   
                </div>
                <div class="form-group">
                    <label for="image_url_mobile">图片(移动)</label>   
                    <?php if(isset($data['image_url_mobile']) && !empty($data['image_url_mobile'])){ ?>
                        <div style="padding:1rem 0;">
                        <img id="img_image_url_mobile" src="<?php echo $data['image_url_mobile']; ?>" alt="" style="height:120px;" />
                        </div>
                    <?php } ?>               
                        <div class="input-group">
                            <input id="image_url_mobile" name="image_url_mobile"  class="form-control" value="<?php echo isset($data['image_url_mobile'])?$data['image_url_mobile']:''; ?>"  aria-describedby="setImageUrlMobile">                                
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" id="setImageUrlMobile" type="button" >浏览…</button>                                 
                            </div>
                        </div>
                        <small id="emailHelp" class="form-text text-muted">图片尺寸：750*1334像素</small>                   
                </div>
                <div class="form-group">
                    <label for="importance">排序</label>
                    <input type="number" class="form-control" id="importance" name="importance" value="<?php echo empty($data['importance'])?"0":$data['importance'];?>" placeholder="">
                  
                </div>

                <div class="form-group">
                    <label for="description">描述</label>                   
                    <textarea class="form-control" id="description" name="description" placeholder=""><?php echo isset($data['description'])?$data['description']:''; ?></textarea>                 
                </div>

                <div class="form-group">
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" <?php echo (isset($data['active']) && $data['active']) ?"checked":"";?> id="chkActive" name="active">                          
                    <label class="form-check-label" for="chkActive">发布</label>
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
<?php require_once('../../includes/footer.php'); ?> 
</section>

</div>

<?php require_once('../../includes/scripts.php'); ?> 

<script src="/assets/js/vendor/holderjs/holder.min.js"></script>
<script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript">


    function SetBackground(fileUrl) {
        $('#imageUrl').val(fileUrl);
    }

    function SetImageUrlMobile(fileUrl) {
        $('#image_url_mobile').val(fileUrl);
    }


    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li.carousels").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");

        $("#setImageUrl").on("click", function () {
            singleEelFinder.selectActionFunction = SetBackground;
            singleEelFinder.open();         
            // CKFinder.popup( {
            //      chooseFiles: true,
            //      onInit: function( finder ) {
            //          finder.on( 'files:choose', function( evt ) {
            //              var file = evt.data.files.first();                       
            //              SetBackground(file.getUrl());
            //          } );
            //          finder.on( 'file:choose:resizedImage', function( evt ) {                      
            //             SetBackground(evt.data.resizedUrl);
            //          } );
            //      }
            //  });    
        });
        $("#setImageUrlMobile").on("click", function () {
            singleEelFinder.selectActionFunction = SetImageUrlMobile;
            singleEelFinder.open();   
            // CKFinder.popup( {
            //      chooseFiles: true,
            //      onInit: function( finder ) {
            //          finder.on( 'files:choose', function( evt ) {
            //              var file = evt.data.files.first();                       
            //              SetImageUrlMobile(file.getUrl());
            //          } );
            //          finder.on( 'file:choose:resizedImage', function( evt ) {                      
            //              SetImageUrlMobile(evt.data.resizedUrl);
            //          } );
            //      }
            //  });          
        });

        $("form").validate({

            rules: {
                title: {
                    required: true
                },
                link: {
                    url: true
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
                link: {
                    url: "链接格式不正确"
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
                    url : 'carousel_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
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