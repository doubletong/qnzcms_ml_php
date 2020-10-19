<?php
require_once('../../includes/common.php');
require '../../../vendor/autoload.php';

use JasonGrimes\Paginator;
use Models\Research;
use Models\Language;

$urlPattern = "index.php?page=(:num)";
 //文章表实例化
$exhClass = new Research;
 //搜索条件判断
$query = $exhClass->select('id','title','lang','icon','view_count','active');

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

if(isset($_REQUEST["lang"]) && $_REQUEST["lang"] != "")
{    
    $lang = htmlspecialchars($_REQUEST["lang"],ENT_QUOTES);
    $query = $query->where('lang', $lang);         
      
    $urlPattern = $urlPattern . "&lang=$lang";
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

$exhibitions = $query->orderBy('id', 'DESC')
            ->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();


$langs = Language::where('active',1)->orderby('importance','DESC')->get();

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "实验室_后台管理_".$site_info['sitename'];?></title>
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
                            <li class="breadcrumb-item"><a href="/bbi-admin/views/pages/index.php">研究中心</a></li>
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
                            <div class="card-title-v1"> <i class="iconfont icon-school"></i>研究中心</div>
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
                                <a href="edit.php" class="btn btn-primary">
                                    <i class="iconfont icon-plus"></i>  添加
                                </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">     
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>     
                    <th>图标</th>             
                    <th>标题</th> 
                    <th>显示</th>
                    <th>语言</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($exhibitions as $row)
                {
                    echo "<tr>";
                ?>
                    <td style="background-color: #999;"><img src="<?php echo $row['icon'];?>" class="img-rounded" style="height:50px;"/></td>
                    <?php
                   
                    echo "<td>".$row['title']."</td>"; 
               
                    echo "<td>".$row['view_count']."</td>";
                    ?>
                    <td><img src="../../assets/img/langs/<?php echo $row['lang']; ?>.svg" alt="<?php echo $row['lang']; ?>" style="height:16px;"></td>
                    <td><a href='edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
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
                <div class="row">
                    <div class="col-md">
                        <nav aria-label="Page navigation">                
                            <?php include("../../../vendor/jasongrimes/paginator/examples/pagerBootstrap.phtml") ?>                            
                        </nav>
                    </div>
                    <div class="col-md-auto">
                        总记<strong><?php echo $totalItems; ?></strong>条记录
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
        $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');
        $(".mainmenu>li.researches a").addClass("active");
        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-active").click(function(){
            var $that = $(this);           
            var productId = $that.attr("data-id");

            $.ajax({
                url : 'post.php',
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
                url : 'post.php',
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
                url : 'post.php',
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
                        url : 'post.php',
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