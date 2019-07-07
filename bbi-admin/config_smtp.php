<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/option.php');


$optionClass = new SiteOption();
$model = $optionClass->get_config("smtp");

$data  = json_decode($model['config_values'],true);

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "邮件服务配置_组件_后台管理_".SITENAME;?></title>
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

        <form  novalidate="novalidate">
    <div class="card">
        <div class="card-header">
            编辑邮件服务配置
        </div>
        <div class="card-body">
            <input type="hidden" name='config_type' value="smtp" />
                <div class="form-group">
                    <label for="title">smtp主机</label>                  
                    <input type="text" class="form-control" id="host" name="host" placeholder="" value="<?php echo $data['host'];?>">                  
                </div>

                <div class="form-group">
                    <label for="username">帐号</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?php echo $data['username'];?>">                   
                </div>
                <div class="form-group">
                    <label for="password">密码</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="" value="<?php echo $data['password'];?>">                   
                </div>

                <div class="form-group">
                    <label for="port">端口</label>
                    <input type="number" class="form-control" id="port" name="port" value="<?php echo $data['port']; ?>" placeholder="">                 
                </div>

                <div class="form-group">
                    <div class="form-check">
                    <input type="checkbox" class="form-check-input" <?php echo $data['SMTPSecure']?"checked":"";?> id="chkActive" name="SMTPSecure">                          
                    <label class="form-check-label" for="chkActive">发布</label>
                    </div>
                </div>

             

        </div>
        <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
            <a href="carousels.php" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>                      
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


   
    $(document).ready(function () {
        //当前菜单        
        $(".mainmenu>li.system").addClass("nav-open").find("ul>li.config_smtp a").addClass("active");

        $("form").validate({

            rules: {
                host: {
                    required: true
                },
                username: {
                    required: true
                },
                port: {
                    required: true,
                    digits:true
                }

            },
            messages:{
                host: {
                    required:"请输入SMTP主机"
                },
                username: {
                    required: "请输入帐号"
                },
                port: {
                    required: "请输入端口",
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
                    url : 'option_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {

                        //  $('#resultreturn').prepend(res);
                        if (res) {
                            toastr.success('邮件服务配置已保存成功！', '编辑邮件服务配置')
                        } else {
                            toastr.error('邮件服务配置保存失败！', '编辑邮件服务配置')
                        }
                    }
                });

            }
        });
    });
</script>

</body>
</html>