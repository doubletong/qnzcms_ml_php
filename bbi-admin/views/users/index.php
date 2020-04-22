<?php
require_once('../../includes/common.php');

use JasonGrimes\Paginator;
use Models\User;


$urlPattern = "index.php?page=(:num)";
 //文章表实例化
$pageClass = new User;
 //搜索条件判断
$query = $pageClass->select('id','username','photo','email','last_login','active','created_at');

$keyword = null;

$orderby = isset($_GET['orderby'])?$_GET['orderby']:null;
$sort= isset($_GET['sort'])?$_GET['sort']:null;

if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);

    $query = $query->where('username','like','%'.$keyword.'%')
            ->orWhere('email','like','%'.$keyword.'%');

    $urlPattern = $urlPattern . "&keyword=$keyword";
}

if(!empty($orderby) && !empty($sort)){
    $query = $query->orderBy($orderby, $sort);
}else{
    $query = $query->orderBy('created_at', 'DESC');
}




$totalItems = $query->count();  //总记录数
$itemsPerUser = 10;  // 每页显示数
$currentUser = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerUser, $currentUser, $urlPattern);
$paginator->setMaxPagesToShow(6);

$pages = $query->skip(($currentUser-1)*$itemsPerUser)
            ->take($itemsPerUser)
            ->get();



?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "帐号_后台管理_".$site_info['sitename'];?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>
<body>
<div class="wrapper" id="wrapper">
    <!-- nav start -->
    <?php require_once('../../includes/nav_system.php'); ?>
    <!-- /nav end -->
    <section class="rightcol" id="rightcol">      
        <?php require_once('../../includes/header.php'); ?>

        <div class="main-content"> 
            <div class="breadcrumb-container">
                <div class="row">
                    <div class="col-md">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                            <li class="breadcrumb-item"><a href="#">系统</a></li>
                            <li class="breadcrumb-item"><a href="/bbi-admin/views/users/index.php">帐号</a></li>
                            <li class="breadcrumb-item active" aria-current="page">创建新帐号</li>
                        </ol>
                    </nav>
                    </div>
                    <div class="col-md-auto">
                        <time id="sitetime"></time>
                    </div>
                </div>
            </div> 
            <div class="card">
                <header class="card-header">
                    <div class="row">
                        <div class="col">
                            <div class="card-title-v1"> <i class="iconfont icon-team"></i>帐号</div>
                        </div>
                        <div class="col-auto">
                            <div class="control"><a class="expand" href="#"><i class="iconfont icon-fullscreen"></i></a><a class="compress" href="#"><i class="iconfont icon-shrink"></i></a></div>
                        </div>
                    </div>
                </header>
                <section class="card-body">
                <div class="card-toolbar mb-3">
                    <div class="row">
                        <div class="col">
                            <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                                <div class="form-row align-items-center">
                                    <div class="col-auto">
                                    <label class="sr-only" for="keyword">搜索</label>
                                    <input type="text" name="keyword" class="form-control" id="keyword" value="<?php echo $keyword ?>" placeholder="关键字">
                                    </div>

                                    <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">搜索</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-auto">
                                <a href="user_create.php" class="btn btn-primary">
                                    <i class="iconfont icon-plus"></i>  添加
                                </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">                 
            <table class="table table-hover table-bordered table-striped box-table">
                <thead>
                <tr>     
                    <th>头像</th>
                    <th>
                    <?php if($orderby=='username'){ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=username&sort=<?php echo $sort=='asc'?'desc':'asc';?>">用户名<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                        <?php }else{ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=username&sort=asc">用户名<i class="iconfont icon-orderby"></i></a>
                        <?php } ?>                    
                    </th>
                   
                
                   
                    <th>
                        <?php if($orderby=='email'){ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=email&sort=<?php echo $sort=='asc'?'desc':'asc';?>">邮箱<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                        <?php }else{ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=email&sort=asc">邮箱<i class="iconfont icon-orderby"></i></a>
                        <?php } ?>
                    </th>
                    <th>
                        <?php if($orderby=='last_login'){ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=last_login&sort=<?php echo $sort=='asc'?'desc':'asc';?>">最新登录<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                        <?php }else{ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=last_login&sort=asc">最新登录<i class="iconfont icon-orderby"></i></a>
                        <?php } ?>
                    
                    </th>
                  
                    <th>
                        <?php if($orderby=='created_at'){ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=created_at&sort=<?php echo $sort=='asc'?'desc':'asc';?>">创建日期<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                        <?php }else{ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=created_at&sort=asc">创建日期<i class="iconfont icon-orderby"></i></a>
                        <?php } ?>
                    </th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($pages as $row)
                {
                    echo "<tr>";
                ?>
                  <td><img src="/img.php?src=<?php echo $row['photo'];?>&h=50" class="img-rounded" /></td>
                    <?php
                    echo "<td>".$row['username']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['last_login']."</td>";
                    ?>
                    <td><?php echo date_format($row['created_at'],"Y-m-d");?></td>
                    <td><?php echo ($row['active']==1)?"激活":"禁用" ;?></td>
                    <td><a href='user_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
                            <i class="iconfont icon-edit"></i>
                        </a>
                        <a href='user_updatepwd.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm' title="修改密码">
                                <span class="iconfont icon-lock"></span>
                            </a>
                        <?php if($row['active']==1){?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-warning btn-sm btn-active' title="禁用">
                                <i class="iconfont icon-eye-close"></i>
                            </button>
                        <?php }else{ ?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-active' title="激活">
                                <i class="iconfont icon-eye"></i>
                            </button>
                        <?php } ?>   

                

                        <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-danger btn-sm btn-delete'>
                            <i class="iconfont icon-delete"></i>
                        </button>
                    </td>
                    <?php

                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
            </div>
       
                </section>
                <footer class="card-footer">
                    <div class="row table-pager">
                        <div class="col-sm">
                            <nav aria-label="User navigation">                
                                <?php include("../../../vendor/jasongrimes/paginator/examples/pagerBootstrap.phtml") ?>                            
                            </nav>
                        </div>
                        <div class="col-sm-auto">
                        <p class="pagecount"> 总记<strong><?php echo $totalItems; ?></strong>条记录</p>
                        </div>
                    </div>
                </footer>
                </div>
        </div>
        <?php require_once('../../includes/footer.php'); ?> 
            </section>
</div>
<?php require_once('../../includes/scripts.php'); ?> 

<script>
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li.system").addClass("nav-open").find("ul>li.users a").addClass("active");
        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-active").click(function(){
            var $that = $(this);           
            var productId = $that.attr("data-id");

            $.ajax({
                url : 'user_post.php',
                type : 'POST',
                data : {id:productId,action:"active"},
                success : function(res) {                                                   
                    var myobj = JSON.parse(res);                    
                    //console.log(myobj.status);
                    if (myobj.status === 1) {
                        // toastr.success(myobj.message);                                
                        location.reload();                                  
                    } 
                    if (myobj.status === 2) {
                        toastr.error(myobj.message)
                    }
                    if (myobj.status === 3) {
                        toastr.info(myobj.message)
                    }
                }
            });          

        });

        $(".btn-recommend").click(function(){
            var $that = $(this);           
            var articleId = $that.attr("data-id");

            $.ajax({
                url : 'user_post.php',
                type : 'POST',
                data : {id:articleId,action:"recommend"},
                success : function(res) {                                                   
                    var myobj = JSON.parse(res);                    
                  
                    if (myobj.status === 1) {                                            
                        location.reload();                                  
                    } 
                    if (myobj.status === 2) {
                        toastr.error(myobj.message)
                    }
                    if (myobj.status === 3) {
                        toastr.info(myobj.message)
                    }
                }
            });          

        });

        $(".btn-copy").click(function(){
            var $that = $(this);           
            var articleId = $that.attr("data-id");

            $.ajax({
                url : 'user_post.php',
                type : 'POST',
                data : {id:articleId,action:"copy"},
                success : function(res) {                                                   
                    var myobj = JSON.parse(res);                    
                  
                    if (myobj.status === 1) {                                            
                        location.reload();                                  
                    } 
                    if (myobj.status === 2) {
                        toastr.error(myobj.message)
                    }
                    if (myobj.status === 3) {
                        toastr.info(myobj.message)
                    }
                }
            });          

        });


        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后页面将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var pageId = $that.attr("data-id");

                    $.ajax({
                        url : 'user_post.php',
                        type : 'POST',
                        data : {id:pageId,action:"delete"},
                        success : function(res) {

                            var myobj = JSON.parse(res);                    
                            //console.log(myobj.status);
                            if (myobj.status === 1) {
                                toastr.success(myobj.message);  
                                $that.closest("tr").remove();                                   
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

    });
</script>
</body>
</html>