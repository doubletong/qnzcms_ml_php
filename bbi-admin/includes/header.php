<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');

$my_pers = $_SESSION['my_permissions'];
//$my_pers::where('group_id',3)->count();
$g1_per_is_empty = $my_pers->where('group_id',1)->count();
$g2_per_is_empty = $my_pers->where('group_id',2)->count();
$g3_per_is_empty = $my_pers->where('group_id',3)->count();

//print_r($g3_per_is_empty);

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-primary"><a class="navbar-brand" id="openav" href="javascript:void(0);"><i class="iconfont icon-menu"></i></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul id="module_nav" class="navbar-nav mr-auto">
        <li class="nav-item"><a class="nav-link" href="/bbi-admin">内容 <span class="sr-only">(current)</span></a></li>  
        <?php if($g2_per_is_empty){ ?>    
            <li class="nav-item"><a class="nav-link" href="/bbi-admin/views/config/general.php">系统</a></li> 
        <?php } ?>  
        <?php if($g3_per_is_empty){ ?>
            <li class="nav-item"><a class="nav-link" href="/bbi-admin/views/tpl/index.php">模版</a></li>     
        <?php } ?>  
    </ul>
    <ul class="navbar-nav navbar-right">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" 
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">你好，<?php echo $_SESSION['valid_user'] ?>
            </a>
        <!--
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">修改密码</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        -->
        </li>
        <li class="nav-item"><a class="nav-link" href="/bbi-admin/logout.php"><i class="iconfont icon-logout"></i> 退出系统</a></li>
    </ul>
    </div>
</nav>