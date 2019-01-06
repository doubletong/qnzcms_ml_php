<?php
require_once('../includes/common.php');
require_once('../config/db.php');
session_start();

if(isset($_POST['username'],$_POST['password'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if($_POST['captcha'] != $_SESSION['digit']) {
        $error = "验证码不正确";       
    } else{
        if(empty($username) or empty($password)){
            $error = '请输入用户名与密码！';
        }else{
    
            $query = db::getInstance()->prepare("SELECT * FROM wp_users WHERE username=:username AND password =:password");
            $array = array(
                'username' => $username,
                'password' => $password
            );
         //   $query->bindValue(':username',$username);
         //   $query->bindValue(':password',$password);
    
            $query->execute($array);
            $num= $query->rowCount();
           // echo  $num;
            if($num == 1){
                $_SESSION['logged_in'] = true;
                $_SESSION['valid_user'] = $username;
                header('Location: index.php');
                exit();
            }else{
                $error = '无效的帐号！';
            }
        }
    }     

    
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width">
    <title>
        后台管理
    </title>
    <link href="/js/vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="content/iconfonts/iconfont.css" rel="stylesheet" />
 <style>
     body{
         background:#333 url(content/img/mosaic_noise.gif);
     }
.loginbox{
    max-width:360px; 
    margin:0 auto;
}
.card-img-top{
    text-align:center;padding:2rem;
}
.card-footer{
    background-color:#fff;
}
.input-group-text{
    background-color:#fff;
}
     </style>
</head>
<body class="loginPage">
<form method="post" class="loginForm">
<div class="loginbox card">
    <div class="card-img-top"><img src="../img/logo.png"  alt="..."></div>

<div class="card-body">

   
        <div class="form-group">
            <div class="input-group">
            <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><i class="iconfont icon-user"></i></span>
  </div>
                <input class="form-control"  type="text" name="username" placeholder="用户名" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon2"><i class="iconfont icon-lock"></i></span>
  </div>
                <input class="form-control" type="password" name="password" placeholder="密码" aria-describedby="basic-addon2">
            </div>
        </div>
        <div class="form-group">
            
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="iconfont icon-CodeSandbox"></i></span>
                </div>
                <input class="form-control"  type="text" name="captcha" placeholder="验证码">
                <div class="input-group-append">
                    <span class="input-group-text" style="padding:0 3px; overflow: hidden;">
                        <img src="../lib/captcha.php" width="120" height="30"  alt="CAPTCHA">
                    </span>
                </div>
            </div>
        </div>
        
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">记住我</label>
        </div>      
       
        <?php if(isset($error)){?>
            <div class="alert alert-danger"><?php echo $error;?></div>
        <?php  } ?>
    
        </div>
        <div class="card-footer text-center">
        <button type="submit" class="btn btn-primary"><i class="iconfont icon-login"></i> 登录</button>
        <a href="/" class="btn btn-outline-secondary" ><i class="iconfont icon-left"></i> 取消</a>
        </div>
       
</div>
</form>

<script src="../js/vendor/jquery/dist/jquery.min.js"></script>
<script src="../js/vendor/bootstrap/dist/js/bootstrap.min.js"></script>


<script>
    var loginbox = {
        initialize: function () {
            var winheight = $(window).height(), lbheight = $('.loginbox').height();
            var paddingTop = (winheight - lbheight) / 2 - 50;
            $('.loginPage').css('padding-top', paddingTop + 'px');
        }
    }
    $(function () {

        loginbox.initialize();
        $(window).resize(function () {
            loginbox.initialize();
        });


    })
</script>

</body>
</html>
