<?php
require_once '../includes/common.php';
session_start();

if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if ($_POST['captcha'] != $_SESSION['phrase']) {
        $error = "验证码不正确";
    } else {
        if (empty($username) or empty($password)) {
            $error = '请输入用户名与密码！';
        } else {

            $query = db::getInstance()->prepare("SELECT * FROM wp_users WHERE username=:username AND password =:password");
            $array = array(
                'username' => $username,
                'password' => $password,
            );
            //   $query->bindValue(':username',$username);
            //   $query->bindValue(':password',$password);

            $query->execute($array);
            $num = $query->rowCount();
            // echo  $num;
            if ($num == 1) {
                $_SESSION['logged_in'] = true;
                $_SESSION['valid_user'] = $username;
                header('Location: index.php');
                exit();
            } else {
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        后台管理-<?php echo $site_info['sitename']; ?>
    </title>

    <link href="assets/fonts/iconfont.css" rel="stylesheet">
    <link href="assets/css/styles.min.css" rel="stylesheet">
    <style>
        .input-group-text{
            background-color:#fff; overflow: hidden;
        }
    </style>
</head>
<body>
<div class="page-login">
    <header class="site-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-auto">
              <div class="logo"><img src="assets/img/logo.svg" alt=""></div>
            </div>
            <div class="col">
              <h1 class="title">用户登录</h1>
            </div>
          </div>
        </div>
      </header>
  
      <div class="loginbox">       
        <form class="loginForm" method="post">
            <div class="mb-3">
                <label for="username">帐号/用户名</label>
                <input class="form-control"  type="text" name="username" placeholder="用户名" required>
            </div>
            <div class="mb-3">
                <label for="password">密码</label>
                <input class="form-control" type="password" name="password" placeholder="密码" required>
            </div>

            <div class="mb-3">
                <label for="password">验证码</label>
                <div class="input-group">  
                    <input class="form-control"  type="text" name="captcha" placeholder="验证码" required>
                    <div class="input-group-append">
                        <span class="input-group-text" style="padding:0; overflow: hidden;">
                            <img src="/includes/captcha.php" style="width:120px; height:43px;"  id="imgCaptcha"  alt="CAPTCHA">
                        </span>
                    </div>
                </div>
            </div>

            <div class="custom-control custom-checkbox mb-3">
                <input class="custom-control-input" id="rememberme" type="checkbox">
                <label class="custom-control-label" for="rememberme">记住我</label>
            </div>
          
    
     
        <?php if (isset($error)) {?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php }?>

  
        <div class="text-center">
        <button type="submit" class="btn btn-primary"><i class="iconfont icon-login"></i> 登录</button>
        <a href="/" class="btn btn-outline-secondary" ><i class="iconfont icon-left"></i> 离开</a>
        </div>
</form>
    </div>
      <?php require_once('includes/footer.php'); ?>
</div>
<script src="../assets/js/vendor/jquery/dist/jquery.min.js"></script>
<script src="../assets/js/vendor/bootstrap/dist/js/bootstrap.min.js"></script>


<script>
    var loginbox = {
        initialize: function () {
            var winheight = $(window).height(), lbheight = $('.loginbox').height();
            var paddingTop = (winheight - lbheight) / 2 - 50;
            $('.loginPage').css('padding-top', paddingTop + 'px');
        }
    }

    var imgCaptcha = document.getElementById("imgCaptcha");
    imgCaptcha.addEventListener("click",function(){
        this.src = "../includes/captcha.php?code=" + Math.random();
    })

    $(function () {

        loginbox.initialize();
        $(window).resize(function () {
            loginbox.initialize();
        });


    })
</script>

</body>
</html>
