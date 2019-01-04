<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/distributor.php');

$distributorClass = new Distributor();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $distributorClass->fetch_data($id);
}else{
    header('Location: distributors.php');
    exit;
}



?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "编辑_公司分部_后台管理_".SITENAME;?></title>
    <?php require_once('includes/meta.php') ?>
    <link href="../js/vendor/toastr/toastr.min.css" rel="stylesheet"/>
</head>

<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once('includes/nav.php'); ?>
    <!-- /nav end -->
    <section class="rightcol">            
        <?php require_once('includes/header.php'); ?>

        <div class="container-fluid maincontent">
        <form class="form-horizontal" style="position: relative;" novalidate="novalidate">
    <div class="card">
        <div class="card-header">
            编辑公司分部
        </div>
        <div class="card-body">
           
                <input id="distributorId" type="hidden" name="distributorId" value="<?php echo $data["id"]; ?>" />


                <div class="form-group">
                    <label for="city">城市</label>                 
                        <input type="text" class="form-control" id="city" name="city" value="<?php echo $data["city"]; ?>" placeholder="">                  
                </div>

                <div class="form-group">
                    <label for="address">地址</label>
                    <textarea class="form-control" id="address" name="address" ><?php echo $data["address"]; ?></textarea>                          
                </div>
                <div class="form-group">
                    <label for="phone">联系电话</label>                 
                        <input type="type" class="form-control" id="phone" name="phone" value="<?php echo $data["phone"]; ?>" placeholder="">                  
                </div>
                <div class="form-group">
                    <label for="email">邮箱</label>                 
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $data["email"]; ?>" placeholder="">                  
                </div>
                <div class="form-group">
                            <label for="coordinate">
                                坐标</label>
                                <div class="input-group">
                                    <input id="coordinate" name="coordinate"  class="form-control" placeholder="" value="<?php echo $data["coordinate"]; ?>" />
                                    <div class="input-group-append">
                                        <a href="http://api.map.baidu.com/lbsapi/getpoint/" target="_blank" class="btn btn-outline-secondary"  >浏览…</a>                                 
                                    </div>
                                </div>
                                
                        </div>
                <div class="form-group">
                    <label for="importance">排序</label>                 
                    <input type="number" class="form-control" id="importance" name="importance" value="<?php echo $data["importance"]; ?>">            
                </div>

                <div class="form-group">
                            <div class="form-check">
                            <input type="checkbox" class="form-check-input" checked id="chkActive" name="active">                          
                            <label class="form-check-label" for="chkActive">发布</label>
                            </div>
                        </div>
         
        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="distributors.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>
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
<script src="../js/vendor/jquery-validation/dist/additional-methods.min.js"></script>
<script type="text/javascript">

$.validator.addMethod("checkCoordinate",function(value,element,params){
				var checkCoordinate = /^[-\+]?\d+(\.\d+)\,[-\+]?\d+(\.\d+)$/;
				return this.optional(element)||(checkCoordinate.test(value));
			},"请输入正确的坐标！");


    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li:nth-of-type(8)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");

        $("form").validate({

            rules: {
                city: {
                    required: true
                },
                address: {
                    required: true
                },
                phone: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                coordinate: {
                    required: true,
                    checkCoordinate: true
                },
                importance: {
                    required: true,
                    digits:true
                }

            },
            messages:{
              
                city: {
                    required: "请输入城市"
                },
                address: {
                    required: "请输入地址"
                },
                phone: {
                    required: "请输入电话"
                },
                email: {
                    required: "请输入邮箱",
                    email:"邮箱格式不正确"
                },
                coordinate: {
                    required: "请输入坐标"
                   
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
                errorPlacement : function(error, element) {
                element.parent('div').append(error);
            },

            submitHandler: function(form) {
                //form.submit();
                $.ajax({
                    url : 'distributor_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {

                     //   alert(res);
                        if (res) {
                            toastr.success('公司分部已编辑成功！', '编辑公司分部')
                        } else {
                            toastr.error('公司分部编辑失败！', '编辑公司分部')
                        }
                    }
                });


            }
        });
    });
</script>

</body>
</html>