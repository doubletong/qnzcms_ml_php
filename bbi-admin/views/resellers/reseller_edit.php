<?php

use Models\Reseller;
use Models\Region;
use Models\Country;

require_once($_SERVER['DOCUMENT_ROOT'] . '/includes/common.php');
require_once('../../includes/common.php');
require_once('../../../config/database.php');

$pagetitle = (isset($_GET['id'])?"编辑":"创建")."分销商" ;
$action = isset($_GET['id'])?"update":"create";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Reseller::find($id);
    //$data = $cateModel->fetch_data($id);
}
$regions = Region::all();
$countries = Country::all();

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pagetitle."_后台管理_" . SITENAME; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <link href="/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>
            <div class="container-fluid maincontent">

                <form novalidate="novalidate">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $pagetitle;?>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />
                            
                            <div class="form-group">
                                <label for="name">名称</label>
                                <input type="text" class="form-control" name="name" value="<?php echo isset($data['name'])?$data['name']:''; ?>">
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="region_id">区域</label>                                   
                                        <select class="form-control" name="region_id" placeholder="" >
                                            <option value="">--请选择区域--</option>
                                            <?php foreach( $regions as $model)
                                            {
                                                if($model["id"]=== $data["region_id"]){
                                                ?>
                                                        <option value="<?php echo $model["id"]; ?>" selected><?php echo $model["title"]; ?></option>

                                            <?php }else{?>

                                                <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?> </option>
                                                <?php } } ?>
                                                            
                                        </select>  
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="country_id">国家</label>                                   
                                        <select class="form-control" name="country_id" placeholder="" >
                                            <option value="">--请选择国家--</option>
                                            <?php foreach( $countries as $model)
                                            {
                                                if($model["id"]=== $data["country_id"]){
                                                ?>
                                                        <option value="<?php echo $model["id"]; ?>" selected><?php echo $model["title"]; ?></option>

                                            <?php }else{?>

                                                <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?> </option>
                                                <?php } } ?>
                                                            
                                        </select>  
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">地址</label>
                                <input type="text" class="form-control" name="address" value="<?php echo isset($data['address'])?$data['address']:''; ?>">
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="email">邮箱</label>
                                        <input type="text" class="form-control" name="email" value="<?php echo isset($data['email'])?$data['email']:''; ?>">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="homepage">主页</label>
                                        <input type="text" class="form-control" name="homepage" value="<?php echo isset($data['homepage'])?$data['homepage']:''; ?>">
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="phone">电话</label>
                                        <input type="text" class="form-control" name="phone" value="<?php echo isset($data['phone'])?$data['phone']:''; ?>">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="fax">传真</label>
                                        <input type="text" class="form-control" name="fax" value="<?php echo isset($data['fax'])?$data['fax']:''; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="opentime">营业时间</label>
                                        <input type="text" class="form-control" name="opentime" value="<?php echo isset($data['opentime'])?$data['opentime']:''; ?>">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="zipcode">邮编</label>
                                        <input type="text" class="form-control" name="zipcode" value="<?php echo isset($data['zipcode'])?$data['zipcode']:''; ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control" name="facebook" value="<?php echo isset($data['facebook'])?$data['facebook']:''; ?>">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control" name="instagram" value="<?php echo isset($data['instagram'])?$data['instagram']:''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="youtube">Youtube</label>
                                        <input type="text" class="form-control" name="youtube" value="<?php echo isset($data['youtube'])?$data['youtube']:''; ?>">
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-group">
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control" name="twitter" value="<?php echo isset($data['twitter'])?$data['twitter']:''; ?>">
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            
                            <div class="form-group">
                                <label for="link">链接</label>
                                <input type="text" class="form-control" name="link" value="<?php echo isset($data['link'])?$data['link']:''; ?>">
                            </div>
                           
                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:0; ?>" placeholder="值越大越排前">
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
    <script type="text/javascript">


        $(document).ready(function() {
            //当前菜单        
            $(".mainmenu>li.agent").addClass("nav-open").find("ul>li.regions a").addClass("active");     

            $("form").validate({

                rules: {
                    name: {
                        required: true
                    },
                    region_id: {
                        required: true
                    },
                    country_id: {
                        required: true
                    },
                    email: {
                        email: true
                    },
                    homepage: {
                        url: true
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
                    name: {
                        required:"请输入名称"
                    },
                    region_id: {
                        required: "请选择区域"
                    },
                    country_id: {
                        required: "请选择国家"
                    },
                    email: {
                        email: "邮箱格式不正确"
                    }, 
                    homepage: {
                        url: "网址格式不正确"
                    }, 
                    link: {
                        url: true
                    },
                    importance: {
                        required: "请输入排序",
                        digits:"请输入有效的整数"
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
                    //form.submit();
                    $.ajax({
                        url: 'reseller_post.php',
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