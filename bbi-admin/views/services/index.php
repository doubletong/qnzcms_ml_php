<?php
require_once('../../includes/common.php');

use JasonGrimes\Paginator;
use Models\ServiceItem;


$urlPattern = "index.php?page=(:num)";
 //文章表实例化
$pageClass = new ServiceItem;
 //搜索条件判断
$query = $pageClass->select('id','title','thumbnail','view_count','importance','recommend','active','created_at');

$keyword = null;
$orderby = null;
$sort= null;

if(isset($_GET['orderby'])){
    $orderby = $_GET['orderby'];
    $urlPattern = $urlPattern . "&orderby=$orderby";
}

if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
    $urlPattern = $urlPattern . "&sort=$sort";
}

if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);

    $query = $query->where('title','like','%'.$keyword.'%')
            ->orWhere('content','like','%'.$keyword.'%');

    $urlPattern = $urlPattern . "&keyword=$keyword";
}

if(!empty($orderby) && !empty($sort)){
    $query = $query->orderBy($orderby, $sort);
}



$totalItems = $query->count();  //总记录数
$itemsPerServiceItem = 10;  // 每页显示数
$currentServiceItem = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerServiceItem, $currentServiceItem, $urlPattern);
$paginator->setMaxPagesToShow(6);

$pages = $query->orderBy('id', 'DESC')->skip(($currentServiceItem-1)*$itemsPerServiceItem)
            ->take($itemsPerServiceItem)
            ->get();



?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "服务项目_后台管理_".$site_info['sitename'];?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>
<body>
<div class="wrapper" id="wrapper">
    <!-- nav start -->
    <?php require_once('../../includes/nav.php'); ?>
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
                            <li class="breadcrumb-item"><a href="/bbi-admin/views/services/index.php">服务项目</a></li>
                            <li class="breadcrumb-item active" aria-current="page">列表</li>
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
                            <div class="card-title-v1"> <i class="iconfont icon-windows"></i>服务项目</div>
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
                                <a href="service_edit.php" class="btn btn-primary">
                                    <i class="iconfont icon-plus"></i>  添加
                                </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">                 
            <table class="table table-hover table-bordered table-striped box-table">
                <thead>
                <tr>     
                    <th>缩略图</th>             
                    <th>
                    <?php if($orderby=='title'){ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=title&sort=<?php echo $sort=='asc'?'desc':'asc';?>">标题<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                        <?php }else{ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=title&sort=asc">标题<i class="iconfont icon-orderby"></i></a>
                        <?php } ?>                    
                    </th>
                   
                
                   
                    <th>
                        <?php if($orderby=='importance'){ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=importance&sort=<?php echo $sort=='asc'?'desc':'asc';?>">排序<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                        <?php }else{ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=importance&sort=asc">排序<i class="iconfont icon-orderby"></i></a>
                        <?php } ?>
                    </th>
                    <th>
                        <?php if($orderby=='view_count'){ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=view_count&sort=<?php echo $sort=='asc'?'desc':'asc';?>">显示<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                        <?php }else{ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=view_count&sort=asc">显示<i class="iconfont icon-orderby"></i></a>
                        <?php } ?>
                    
                    </th>
                    <th>
                        <?php if($orderby=='created_at'){ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=created_at&sort=<?php echo $sort=='asc'?'desc':'asc';?>">创建日期<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                        <?php }else{ ?>
                            <a href="index.php?keyword=<?php echo $keyword; ?>&orderby=created_at&sort=asc">创建日期<i class="iconfont icon-orderby"></i></a>
                        <?php } ?>
                    </th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($pages as $row)
                {
                    echo "<tr>";
                ?>
                  <td><img src="/img.php?src=<?php echo $row['thumbnail'];?>&h=50" class="img-rounded" /></td>
                    <?php
                    echo "<td>".$row['title']."</td>";
                    echo "<td>".$row['importance']."</td>";
                    echo "<td>".$row['view_count']."</td>";
                    ?>
                    <td><?php echo date_format($row['created_at'],"Y-m-d");?></td>
                    <td><a href='service_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
                            <i class="iconfont icon-edit"></i>
                        </a>
                        <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-copy' title="拷贝">
                            <i class="iconfont icon-file-copy"></i>
                        </button>
                        <?php if($row['active']==1){?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-warning btn-sm btn-active' title="隐藏">
                                <i class="iconfont icon-eye-close"></i>
                            </button>
                        <?php }else{ ?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-active' title="显示">
                                <i class="iconfont icon-eye"></i>
                            </button>
                        <?php } ?>   

                        <?php if($row['recommend']==1){?>
                                <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-grey btn-sm btn-recommend' title="撤消精选">
                                    <i class="iconfont icon-sketch"></i>
                                </button>
                            <?php }else{ ?>
                                <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-recommend' title="精选">
                                    <i class="iconfont icon-sketch"></i>
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
                            <nav aria-label="ServiceItem navigation">                
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
        $(".mainmenu>li.services a").addClass("active");
        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-active").click(function(){
            var $that = $(this);           
            var productId = $that.attr("data-id");

            $.ajax({
                url : 'service_post.php',
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
                url : 'service_post.php',
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
                url : 'service_post.php',
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
                        url : 'service_post.php',
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