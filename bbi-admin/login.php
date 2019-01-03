<?php
require_once('../includes/common.php');
require_once('../config/db.php');
session_start();

if(isset($_POST['username'],$_POST['password'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if(empty($username) or empty($password)){
        $error = '请输入用户名与密码！';
    }else{


//echo $username;
//echo $password     ;
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
     </style>
</head>
<body class="loginPage">
<form method="post" class="loginForm">
<div class="loginbox card">
    <h5 class="card-header text-center">
       后台管理
</h5>
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
