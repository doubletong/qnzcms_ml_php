<?php
require_once('../../includes/common.php');

use Models\Chronicle;
use JasonGrimes\Paginator;
use Models\Language;


$urlPattern = "index.php?page=(:num)";

$chronicleClass = new Chronicle;
$query = $chronicleClass->select('id','year','content','lang','importance','active','created_by','created_at');

$keyword = null;
$orderby = null;
$sort= null;


if (isset($_GET['orderby'])) {
    $orderby = $_GET['orderby'];
    $urlPattern = $urlPattern . "&orderby=$orderby";
}

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    $urlPattern = $urlPattern . "&sort=$sort";
}


if (isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "") {
    $keyword = htmlspecialchars($_REQUEST["keyword"], ENT_QUOTES);

    $query = $query->where('year', 'like', '%'.$keyword.'%')
            ->orWhere('content', 'like', '%'.$keyword.'%');

    $urlPattern = $urlPattern . "&keyword=$keyword";
}


if (isset($_REQUEST["lang"]) && $_REQUEST["lang"] != "") {
    $lang = htmlspecialchars($_REQUEST["lang"], ENT_QUOTES);
    $query = $query->where('lang', $lang);
      
    $urlPattern = $urlPattern . "&lang=$lang";
}


if(!empty($orderby) && !empty($sort)){
    $query = $query->orderBy($orderby, $sort);
}else{
    $query = $query->orderBy('year', 'DESC');
}


$totalItems = $query->count();  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$chronicles = $query->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();

$langs = Language::where('active',1)->orderby('importance','DESC')->get();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "发展历程_后台管理_".$site_info['sitename']; ?>
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
                                <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                                <li class="breadcrumb-item"><a href="/bbi-admin/views/chronicles/index.php">发展历程</a></li>
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
                                <div class="card-title-v1"> <i class="iconfont icon-file-copy"></i>发展历程</div>
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
                                <div class="form-row align-items-center mb-2">
                                    <div class="col-auto">
                                        <label class="sr-only" for="inlineFormInput">搜索</label>
                                        <input type="text" name="keyword" class="form-control" id="inlineFormInput"
                                            value="<?php echo $keyword ?>" placeholder="关键字">
                                    </div>
                                    <div class="col-auto">
                                        <label class="sr-only" for="lang">语言</label>
                                        <select class="form-control" id="lang" name="lang">
                                            <option value="">--请选择语言--</option>
                                            <?php foreach($langs as $item ) {
                                            
                                                ?>                                  
                                                <option value="<?php echo $item->code;?>" <?php echo (isset($lang) && $lang==$item->code)?"selected":""; ?>><?php echo $item->name; ?></option>

                                            <?php }  ?>
                                        </select>
                                    </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary">搜索</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-auto">
                                <a href="chronicle_edit.php" class="btn btn-primary">
                                    <i class="iconfont icon-plus"></i> 添加事件
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">                 
                        <table class="table table-hover table-bordered table-striped box-table">
                    <thead>
                        <tr>                        
                         
                            <th>年份</th>
                                           
                            <th>发布者</th>
                            <th>语言</th>
                            <th style="min-width:120px;">创建日期</th>
                            <th style="min-width:120px;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        foreach ($chronicles as $row) {
            echo "<tr>"; ?>            
                            
                        <td><?php echo $row['year']; ?></td>                 
                        <td>
                            <?php echo $row['created_by']; ?>
                        </td>
                        <td><img src="../../assets/img/langs/<?php echo $row['lang']; ?>.svg" alt="<?php echo $row['lang']; ?>" style="height:16px;"></td>
                        <td>
                            <?php echo $row['created_at'] ; ?>
                        </td>
                        <td><a href='chronicle_edit.php?id=<?php echo $row['id']; ?>' class='btn btn-primary btn-sm'>
                                <i class="iconfont icon-edit"></i>
                            </a>
                            <?php if ($row['active']==1) {?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-warning btn-sm btn-active' title="隐藏">
                                <i class="iconfont icon-eye-close"></i>
                            </button>
                            <?php } else { ?>
                                <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-active' title="显示">
                                    <i class="iconfont icon-eye"></i>
                                </button>
                            <?php } ?>   
                            <button type="button" data-id="<?php echo $row['id']; ?>" class='btn btn-danger btn-sm btn-delete'>
                                <i class="iconfont icon-delete"></i>
                            </button>
                        </td>
                        <?php } ?>
                        </tr>
                    </tbody>
                </table>
                </div>
                </section>              
                    <div class="card-footer">
                        <nav aria-label="Page navigation">                
                            <?php include("../../../vendor/jasongrimes/paginator/examples/pagerBootstrap.phtml") ?>                            
                        </nav>
                    </div>
                </div>
            </div>
            <?php require_once('../../includes/footer.php'); ?>
        </section>
    </div>

    <?php require_once('../../includes/scripts.php'); ?>


    <script>
        $(document).ready(function () {
            //当前菜单
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');
            $(".mainmenu>li.chronicles a").addClass("active");

            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-active").click(function(){
            var $that = $(this);           
            var productId = $that.attr("data-id");

            $.ajax({
                url : 'chronicle_post.php',
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

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后数据将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var pageId = $that.attr("data-id");

                    $.ajax({
                        url : 'chronicle_post.php',
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