<?php
require_once('../../includes/common.php');

use Models\Organization;
use JasonGrimes\Paginator;


//文章表实例化
$organizationClass = new Organization;
//搜索条件判断
$query = $organizationClass->select('id','title','title_en','importance','active','created_at');

$urlPattern = "organizations.php?page=(:num)";

$keyword = null;
$orderby = isset($_GET['orderby'])?$_GET['orderby']:null;
$sort= isset($_GET['sort'])?$_GET['sort']:null;

if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);

    $query = $query->where('title','like','%'.$keyword.'%')
            ->orWhere('title_en','like','%'.$keyword.'%');
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

$organizations = $query->orderBy('importance', 'DESC')
            ->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();


?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "组织团体_后台管理_" . $site_info['sitename']; ?>
    </title>
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
                                <li class="breadcrumb-item"><a href="#">控制面板</a></li>
                                <li class="breadcrumb-item"><a href="#">团队</a></li>
                                <li class="breadcrumb-item active" aria-current="page">组织团体</li>
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
                                <div class="card-title-v1"> <i class="iconfont icon-link"></i>成员分类</div>
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
                                    <a href="organization_edit.php" class="btn btn-primary">
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
                                            <?php if($orderby=='title'){ ?>
                                                <a href="organizations.php?keyword=<?php echo $keyword; ?>&orderby=title&sort=<?php echo $sort=='asc'?'desc':'asc';?>">中文名称<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                            <?php }else{ ?>
                                                <a href="organizations.php?keyword=<?php echo $keyword; ?>&orderby=title&sort=asc">中文名称<i class="iconfont icon-orderby"></i></a>
                                            <?php } ?> 
                                        </th>
                                        <th>英文名称</th>                        
                                        <th>
                                            <?php if($orderby=='importance'){ ?>
                                                <a href="organizations.php?keyword=<?php echo $keyword; ?>&orderby=importance&sort=<?php echo $sort=='asc'?'desc':'asc';?>">排序<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                            <?php }else{ ?>
                                                <a href="organizations.php?keyword=<?php echo $keyword; ?>&orderby=importance&sort=asc">排序<i class="iconfont icon-orderby"></i></a>
                                            <?php } ?>
                                        </th>
                                        <th>显示?</th>
                                        <th style="min-width:120px;">
                                            <?php if($orderby=='created_at'){ ?>
                                                <a href="organizations.php?keyword=<?php echo $keyword; ?>&orderby=created_at&sort=<?php echo $sort=='asc'?'desc':'asc';?>">创建日期<i class="iconfont icon-order-<?php echo $sort=='asc'?'up':'down';?>"></i></a>
                                            <?php }else{ ?>
                                                <a href="organizations.php?keyword=<?php echo $keyword; ?>&orderby=created_at&sort=asc">创建日期<i class="iconfont icon-orderby"></i></a>
                                            <?php } ?>
                                        </th>
                                        <th style="min-width:120px;">操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($organizations as $row) {

                                        ?>
                                        <tr>
                                        
                                            <td><?php echo $row['title']; ?></td>
                                            <td><?php echo $row['title_en']; ?></td>                              
                                            <td><?php echo $row['importance']; ?></td>
                                            <td><?php echo ($row['active']==1)?"显示":"隐藏" ;?></td>                              
                                            <td>
                                                <?php echo date_format(date_create($row['added_date']),"Y-m-d"); ?>
                                            </td>
                                            <td>
                                                <a href='organization_edit.php?id=<?php echo $row['id']; ?>' class='btn btn-primary btn-sm' title="编辑">
                                                    <i class="iconfont icon-edit"></i>
                                                </a>
                                                <button type="button" data-id="<?php echo $row['id']; ?>" class='btn btn-info btn-sm btn-copy' title="复制">
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
            </div>
            <?php require_once('../../includes/footer.php'); ?>
        </section>
    </div>

    <?php require_once('../../includes/scripts.php'); ?>


    <script>
        $(document).ready(function() {
            //当前菜单
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');        
            $(".mainmenu>li.teams").addClass("nav-open").find("ul>li.organizations a").addClass("active");

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
                            url : 'organization_post.php',
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
                var organizationId = $that.attr("data-id");

                $.ajax({
                    url: 'organization_post.php',
                    type: 'POST',
                    data: {
                        id: organizationId,
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
                url : 'organization_post.php',
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