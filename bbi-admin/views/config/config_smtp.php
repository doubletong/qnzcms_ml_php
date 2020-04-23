<?php
require_once('../../includes/common.php');

use Models\Option;

$option = Option::find("smtp");
$data  = json_decode($option->config_values,true);

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "邮件服务配置_组件_后台管理_".$site_info['sitename'];?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/meta.php') ?>
    <link href="/assets/js/vendor/toastr/toastr.min.css" rel="stylesheet"/>
</head>

<body>
<div class="wrapper" id="wrapper">
    <!-- nav start -->
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/nav_system.php'); ?>
    <!-- /nav end -->
    <section class="rightcol">            
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/header.php'); ?>
    <div class="main-content"> 
            <div class="breadcrumb-container">
                <div class="row">
                    <div class="col-md">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                            <li class="breadcrumb-item"><a href="#">邮件服务</a></li>
                            <li class="breadcrumb-item active" aria-current="page">邮件服务配置</li>
                        </ol>
                    </nav>
                    </div>
                    <div class="col-md-auto">
                        <time id="sitetime"></time>
                    </div>
                </div>
            </div> 

        <form  novalidate="novalidate">
    <div class="card">
        <header class="card-header">
            <div class="row">
                <div class="col">
                    <div class="card-title-v1"> <i class="iconfont icon-mail"></i>编辑邮件服务配置</div>
                </div>
                <div class="col-auto">
                    <div class="control"><a class="expand" href="#"><i class="iconfont icon-fullscreen"></i></a><a class="compress" href="#"><i class="iconfont icon-shrink"></i></a></div>
                </div>
            </div>
        </header>
     
        <div class="card-body">
            <input type="hidden" name='config_type' value="smtp" />
            <div class="row">
                <div class="col-md-6">
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
                        <label class="form-check-label" for="chkActive">SSL</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
             
                    <div class="form-group">
                        <label for="email_contact">联系表单接收邮箱</label>
                        <input type="email" class="form-control" id="email_contact" name="email_contact" placeholder="" value="<?php echo !empty($data['email_contact']) ? $data['email_contact'] : ""; ?>">
                    </div>
                             
                </div>
            </div>
                

             

        </div>
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
        </div>
    </div>
    </form>
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/footer.php'); ?> 
</section>

</div>

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/scripts.php'); ?> 

<script src="/assets/js/vendor/holderjs/holder.min.js"></script>
<script src="/assets/js/vendor/toastr/toastr.min.js"></script>
<script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript">


   
    $(document).ready(function () {
        //当前菜单   
        $("#module_nav>li:nth-of-type(2)").addClass("active").siblings().removeClass('active');      
        $(".mainmenu>li.emails").addClass("nav-open").find("ul>li.config_smtp a").addClass("active");

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