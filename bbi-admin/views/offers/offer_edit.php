<?php
require_once('../../includes/common.php');
require_once('../../data/offer.php');
require_once('../../data/dictionary.php');

$did = isset($_GET['did']) ? $_GET['did'] : "";


$offerClass = new TZGCMS\Admin\OfferRepository();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $offerClass->fetch_data($id);
}
$pageTitle = isset($_GET['id'])?"编辑专业项目":"创建专业项目";

$dicModel = new TZGCMS\Admin\Dictionary();
$dictionaries =  $dicModel->get_dictionaries_byid(12);


?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle."_学员Offer_后台管理_" .$site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>

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
                            <?php echo $pageTitle; ?>
                        </div>
                        <div class="card-body">
                            <input id="offerId" type="hidden" name="offerId" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                  
                            <div class="row">
                                <div class="col">
                                <div class="form-group">
                                    <label for="dictionary_id">栏目</label>                                    
                                    <select class="form-control" id="dictionary_id" name="dictionary_id" placeholder="" >
                                        <option value="0">--请选择栏目--</option>
                                        <?php foreach( $dictionaries as $dic)
                                        {
                                            ?>
                                            <option value="<?php echo $dic["id"]; ?>"  <?php echo (isset($data["dictionary_id"]) && $data["dictionary_id"]==$dic["id"])?"selected":"" ; ?> ><?php echo $dic["title"]; ?></option>                                             
                                        <?php  } ?>
                                                        
                                    </select>                          
                                </div>

                                <div class="form-group">
                                    <label for="name">学员姓名</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="<?php echo isset($data['name'])?$data['name']:''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="schools">录取院校</label>
                                    <input type="text" class="form-control" id="schools" name="schools" placeholder="" value="<?php echo isset($data['schools'])?$data['schools']:''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="scholarship">奖学金</label>
                                    <input type="text" class="form-control" id="scholarship" name="scholarship" placeholder="" value="<?php echo isset($data['scholarship'])?$data['scholarship']:''; ?>">
                                </div>

                               
            
                                <div class="form-group">
                                    <label for="importance">排序</label>
                                    <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:'0'; ?>" placeholder="值越大越排前">
                                </div>


                        

                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                                        <label class="form-check-label" for="chkActive">发布</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?php echo (isset($data['recommend']) && $data['recommend']) ? "checked" : ""; ?> id="chkRecommend" name="recommend">
                                        <label class="form-check-label" for="chkRecommend">推荐</label>
                                    </div>
                                </div>


                                </div>
                                <div class="col-auto">
                                    <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                缩略图
                                            </div>
                                            <div class="card-body">                                           
                                                <img ID="iLogo" src="<?php echo empty($data['thumbnail']) ? "holder.js/240x240?text=240X240像素" : $data['thumbnail']; ?>" class="img-fluid" />
                                              
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnTumbnail" class="btn btn-info btn-block"><i class="fa fa-picture-o"></i> 图片...</button>
                                                <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo isset($data['thumbnail'])?$data['thumbnail']:''; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                   
                                 
                                </div>
                                <div class="col-md-auto">
                                    <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                大图
                                            </div>
                                            <div class="card-body">                                           
                                                <img ID="ifullimage" src="<?php echo empty($data['image_url']) ? "holder.js/240x240?text=240X240像素" : $data['image_url']; ?>" class="img-fluid" />
                                              
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="fa fa-picture-o"></i> 选择图片...</button>
                                                <input id="image_url" type="hidden" name="image_url" value="<?php echo isset($data['image_url'])?$data['image_url']:''; ?>" />
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

    <script src="/assets/js/vendor/holderjs/holder.min.js"></script>
    <script src="/assets/js/vendor/toastr/toastr.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <!-- <script src="/js/vendor/ckfinder/ckfinder.js"></script> -->

    <script type="text/javascript">
        function SetThumbnail(fileUrl) {
            $('#thumbnail').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }
   
        function SetImageUrl(fileUrl) {
            $('#image_url').val(fileUrl);
            $('#ifullimage').attr('src', fileUrl);
        }
   
        $(document).ready(function() {
            //当前菜单
        //    alert("dddd");
            $(".mainmenu>li.offers").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");

            $("#btnTumbnail").on("click", function () {         
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();                
            });   
            $("#btnBrowser").on("click", function () {         
                singleEelFinder.selectActionFunction = SetImageUrl;
                singleEelFinder.open();                
            });       



            $("form").validate({

                rules: {
                    name: {
                        required: true
                    },                   
                    importance: {
                        required: true,
                        digits: true
                    }

                },
                messages: {
                    name: {
                        required: "请输入主标题"
                    },
                    
                    importance: {
                        required: "请输入序号",
                        digits: "请输入有效的整数"
                    }

                },

                errorClass: "invalid-feedback",
                errorElement: "div",
                highlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-valid');
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                },
                submitHandler: function(form) {
                    

                    $.ajax({
                        url: 'offer_post.php',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(res) {

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