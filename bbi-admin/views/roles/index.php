<?php
require_once('../../includes/common.php');

use Models\Role;
use JasonGrimes\Paginator;


//文章表实例化
$roleClass = new Role;
//搜索条件判断
$query = $roleClass->select('id','name','description','importance','created_at');

$urlPattern = "index.php?page=(:num)";

$keyword = null;
$orderby = isset($_GET['orderby'])?$_GET['orderby']:null;
$sort= isset($_GET['sort'])?$_GET['sort']:null;
if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);

    $query = $query->where('name','like','%'.$keyword.'%')
            ->orWhere('description','like','%'.$keyword.'%');
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

if(!empty($orderby) && !empty($sort)){
    $query = $query->orderBy($orderby, $sort);
}else{
    $query = $query->orderBy('importance', 'DESC');
}


$totalItems = $query->count();  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$roles = $query->orderBy('importance', 'DESC')
            ->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();


?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "角色_后台管理_" . $site_info['sitename']; ?>
    </title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('../../includes/nav_system.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('../../includes/header.php'); ?>

            <div class="main-content"> 
                <div class="breadcrumb-container">
                    <div class="row">
                        <div class="col-md">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                                <li class="breadcrumb-item"><a href="/bbi-admin/views/roles/index.php">角色</a></li>
                                <li class="breadcrumb-item active" aria-current="page">角色集合</li>
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
                                <div class="card-title-v1"> <i class="iconfont icon-lock"></i>角色</div>
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
                                                <label class="sr-only" for="inlineFormInput">搜索</label>
                                                <input type="text" name="keyword" class="form-control" id="inlineFormInput" value="<?php echo $keyword ?>" placeholder="关键字">
                                            </div>
                                            <div class="col-auto">
                                                <button type="submit" class="btn btn-primary">搜索</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto">
                                    <a href="role_edit.php" class="btn btn-primary">
                                        <i class="iconfont icon-plus"></i> 添加
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">                 
                            <table class="table table-hover table-bordered table-striped box-table">
                                <thead>
                                    <tr>
                                    
                                        <th>
                                        <?php if($orderby=='name'){ ?>
                                        <a href="categories.php?keyword=<?php echo $keyword; ?>&orderby=name&sort=<?php echo $sort=='asc'?'desc':'asc';?>">角色名称<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                    <?php }else{ ?>
                                        <a href="categories.php?keyword=<?php echo $keyword; ?>&orderby=name&sort=asc">角色名称<i class="iconfont icon-orderby"></i></a>
                                    <?php } ?>        
                                        </th>
                                        <th>描述</th>                        
                                        <th>
                                        <?php if($orderby=='importance'){ ?>
                                        <a href="categories.php?keyword=<?php echo $keyword; ?>&orderby=importance&sort=<?php echo $sort=='asc'?'desc':'asc';?>">排序<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                    <?php }else{ ?>
                                        <a href="categories.php?keyword=<?php echo $keyword; ?>&orderby=importance&sort=asc">排序<i class="iconfont icon-orderby"></i></a>
                                    <?php } ?>
                                        </th>
                                     
                                        <th style="min-width:120px;">
                                        <?php if($orderby=='created_at'){ ?>
                                        <a href="categories.php?keyword=<?php echo $keyword; ?>&orderby=created_at&sort=<?php echo $sort=='asc'?'desc':'asc';?>">创建日期<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                    <?php }else{ ?>
                                        <a href="categories.php?keyword=<?php echo $keyword; ?>&orderby=created_at&sort=asc">创建日期<i class="iconfont icon-orderby"></i></a>
                                    <?php } ?>
                                    </th>
                                        <th style="min-width:120px;">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($roles as $row) {

                                        ?>
                                        <tr>
                                        
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['description']; ?></td>                              
                                            <td><?php echo $row['importance']; ?></td>
                                                               
                                            <td>
                                                <?php echo date_format(date_create($row['added_date']),"Y-m-d"); ?>
                                            </td>
                                            <td>
                                                <a href='role_edit.php?id=<?php echo $row['id']; ?>' class='btn btn-primary btn-sm' title="编辑">
                                                    <i class="iconfont icon-edit"></i>
                                                </a>
                                                <a href="set_permissions.php?id=<?php echo $row['id']; ?>" class='btn btn-info btn-sm btn-permission' title="权限设置">
                                                    <i class="iconfont icon-apartment"></i>
                                                </a>
                                          
                                                <button type="button" data-id="<?php echo $row['id']; ?>" class='btn btn-danger btn-sm btn-delete' title="删除">
                                                    <i class="iconfont icon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                    <footer class="card-footer">
                        <div class="row table-pager">
                            <div class="col-sm">
                                <nav aria-label="Page navigation">                
                                    <?php include("../../../vendor/jasongrimes/paginator/examples/pagerBootstrap.phtml") ?>                            
                                </nav>
                            </div>
                            <div class="col-sm-auto">
                            <p class="pagecount"> 总记<strong><?php echo $totalItems; ?></strong>条记录</p>
                            </div>
                        </div>
                    </footer>
               
            </div>
            <?php require_once('../../includes/footer.php'); ?>
        </section>
    </div>

    <?php require_once('../../includes/scripts.php'); ?>


    <script>
        $(document).ready(function() {
            //当前菜单
            $("#module_nav>li:nth-of-type(2)").addClass("active").siblings().removeClass('active');        
            $(".mainmenu>li.security").addClass("nav-open").find("ul>li.roles a").addClass("active");

            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function(){
                var $that = $(this);
                bootbox.confirm("删除后将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var id = $that.attr("data-id");

                        $.ajax({
                            url : 'role_post.php',
                            type : 'POST',
                            data : {id:id,action:"delete"},
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

         

            $(".btn-active").click(function() {
                var $that = $(this);
                var roleId = $that.attr("data-id");

                $.ajax({
                    url: 'role_post.php',
                    type: 'POST',
                    data: {
                        id: roleId,
                        action: "active"
                    },
                    success: function(res) {
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

            $(".btn-copy").click(function(){
            var $that = $(this);           
            var id = $that.attr("data-id");

            $.ajax({
                url : 'role_post.php',
                type : 'POST',
                data : {id:id,action:"copy"},
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
            

        });
    </script>
</body>

</html>