<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-primary"><a class="navbar-brand" id="openav" href="javascript:void(0);"><i class="iconfont icon-menu"></i></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link" href="index.html">首页 <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="links.html">链接</a></li>
        <li class="nav-item"><a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">待建</a></li>
    </ul>
    <ul class="navbar-nav navbar-right">
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">你好，<?php echo $_SESSION['valid_user'] ?></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown"><a class="dropdown-item" href="#">修改密码</a><a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Something else here</a>
        </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="/bbi-admin/logout.php"><i class="iconfont icon-logout"></i> 退出系统</a></li>
    </ul>
    </div>
</nav>