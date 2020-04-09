<?php
require_once('../../includes/common.php');
//require_once('../../data/carousel.php');



use Models\Advertisement;
use Models\AdvertisingSpace;
use JasonGrimes\Paginator;

//$carouselClass = new TZGCMS\Admin\Carousel();
//$pid = isset($_GET['pid']) ? $_GET['pid'] : null;
//$positionClass = new TZGCMS\Admin\Position();

$positions = AdvertisingSpace::all();

$urlPattern = "index.php?page=(:num)";
 //文章表实例化
 $ads = new Advertisement;
 //搜索条件判断
 $query = $ads->with('advertising_space');


 $keyword = null;
 $space = null;

 $orderby = isset($_GET['orderby'])?$_GET['orderby']:null;
$sort= isset($_GET['sort'])?$_GET['sort']:null;

 if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
 {
     $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);
 
     $query = $query->where('title','like','%'.$keyword.'%');
     $urlPattern = $urlPattern . "&keyword=$keyword";
 }
 if(isset($_REQUEST["space"]) && $_REQUEST["space"] != "")
 {
     $space = htmlspecialchars($_REQUEST["space"],ENT_QUOTES);
 
     $query = $query->where('space_id','=',$space);
     $urlPattern = $urlPattern . "&space=$space";
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

$carousels =  $query->orderBy('importance', 'DESC')
            ->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();

//print_r($carousels);
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "轮播图_组件_后台管理_".$site_info["sitename"];?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>
<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once('../../includes/nav.php'); ?>
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
                            <li class="breadcrumb-item"><a href="/bbi-admin/views/carousels/index.php">广告</a></li>
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
                            <div class="card-title-v1"> <i class="iconfont icon-link"></i>广告位</div>
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
                                    <label class="sr-only" for="inlineFormInput">关键字</label>
                                    <input type="text" name="keyword" class="form-control " id="inlineFormInput" value="<?php echo $keyword ?>" placeholder="关键字">
                                    </div>
                                
                            
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">广告位</label>
                                        <select class="form-control" id="space" name="space">
                                        <option value="">--广告位过滤--</option>
                                        <?php foreach ($positions as $position) {
                                            ?>                                                       
                                                <option value="<?php echo $position["id"]; ?>" <?php echo  $position["id"] == $space  ? "selected" : ""; ?>><?php echo $position["title"]; ?></option>

                                        <?php } ?>     
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary">搜索</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <div class="col-auto">
                            <a href="carousel_edit.php" class="btn btn-primary">
                                <i class="iconfont icon-plus"></i>  添加轮播图
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
                                        <a href="index.php?keyword=<?php echo $keyword; ?>&space=<?php echo $space; ?>&orderby=title&sort=<?php echo $sort=='asc'?'desc':'asc';?>">标题<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                    <?php }else{ ?>
                                        <a href="index.php?keyword=<?php echo $keyword; ?>&space=<?php echo $space; ?>&orderby=title&sort=asc">标题<i class="iconfont icon-orderby"></i></a>
                                    <?php } ?>      
                                </th>
                                <th>广告位</th>
                                <th>链接</th>
                                <th>
                                    <?php if($orderby=='importance'){ ?>
                                        <a href="index.php?keyword=<?php echo $keyword; ?>&space=<?php echo $space; ?>&orderby=importance&sort=<?php echo $sort=='asc'?'desc':'asc';?>">排序<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                    <?php }else{ ?>
                                        <a href="index.php?keyword=<?php echo $keyword; ?>&space=<?php echo $space; ?>&orderby=importance&sort=asc">排序<i class="iconfont icon-orderby"></i></a>
                                    <?php } ?>
                                </th>
                            
                                <th>
                                    <?php if($orderby=='created_at'){ ?>
                                        <a href="index.php?keyword=<?php echo $keyword; ?>&space=<?php echo $space; ?>&orderby=created_at&sort=<?php echo $sort=='asc'?'desc':'asc';?>">创建日期<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                    <?php }else{ ?>
                                        <a href="index.php?keyword=<?php echo $keyword; ?>&space=<?php echo $space; ?>&orderby=created_at&sort=asc">创建日期<i class="iconfont icon-orderby"></i></a>
                                    <?php } ?>
                                </th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($carousels as $row)
                            {
                                echo "<tr>";
                                ?>
                                <td><img src="<?php echo $row['image_url'];?>" class="img-rounded" style="height:35px;"/></td>
                                <?php

                                echo "<td>".$row['title']."</td>";
                                echo "<td>".$row['advertising_space']['title']."</td>";            
                                echo "<td>".$row['link']."</td>";
                                ?>
                                <td><?php echo $row['importance'];?></td>
                            
                                <td><?php  echo date('Y-m-d',strtotime($row['created_at'])) ;?></td>
                                <td><a href='carousel_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
                                        <i class="iconfont icon-edit"></i>
                                    </a>
                                    <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-copy' title="拷贝">
                                        <i class="iconfont icon-file-copy"></i>
                                    </button>
                                    <?php if ($row['active'] == 1) { ?>
                                        <button type="button" data-id="<?php echo $row['id']; ?>" class='btn btn-warning btn-sm btn-active' title="隐藏">
                                            <i class="iconfont icon-eye-close"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button type="button" data-id="<?php echo $row['id']; ?>" class='btn btn-info btn-sm btn-active' title="显示">
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
</div>

 <?php require_once('../../includes/footer.php'); ?> 
            </section>

</div>

<?php require_once('../../includes/scripts.php'); ?> 


<script>
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li.carousels").addClass("nav-open").find("ul>li.ads a").addClass("active");

        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-active").click(function(){
            var $that = $(this);           
            var articleId = $that.attr("data-id");

            $.ajax({
                url : 'carousel_post.php',
                type : 'POST',
                data : {id:articleId,action:"active"},
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

        $(".btn-copy").click(function(){
            var $that = $(this);           
            var articleId = $that.attr("data-id");

            $.ajax({
                url : 'carousel_post.php',
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
            bootbox.confirm("删除后轮播图将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var productId = $that.attr("data-id");

                    $.ajax({
                        url : 'carousel_delete.php',
                        type : 'POST',
                        data : {id:productId},
                        success : function(res) {

                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('轮播图已删除成功！', '删除轮播图')
                                $that.closest("tr").remove();
                            } else {
                                toastr.error('轮播图删除失败！', '删除轮播图')
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