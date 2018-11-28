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
        echo  $num;
        if($num == 1){
            $_SESSION['logged_in'] = true;
            $_SESSION['valid_user'] = $username;
            header('Location: index.php');
            exit;
        }else{
            $error = '无效的帐号！';
        }
    }
}

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width">
    <title>
        后台管理
    </title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/Style.min.css" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->

</head>
<body class="loginPage">
<div class="loginbox">
    <header>
        <h2>后台管理</h2>
    </header>
    <form method="post" class="loginForm">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
                <input class="form-control"  type="text" name="username" placeholder="用户名">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-desktop fa-fw"></i></div>
                <input class="form-control" type="password" name="password" placeholder="密码">
            </div>
        </div>
        <div class="checkbox">
            <label>
                <input type="checkbox"> 记住我
            </label>
        </div>
        <button type="submit" class="btn btn-primary">登录系统</button>
        <?php if(isset($error)){?>
            <div class="alert alert-danger"><?php echo $error;?></div>
        <?php  } ?>
    </form>
</div>



<script src="assets/js/jquery-2.0.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>


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
