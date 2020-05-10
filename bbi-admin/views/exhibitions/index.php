<?php
require_once('../../includes/common.php');
require '../../../vendor/autoload.php';

use JasonGrimes\Paginator;
use Models\Exhibition;


$urlPattern = "index.php?page=(:num)";
 //文章表实例化
$exhClass = new Exhibition;
 //搜索条件判断
$query = $exhClass->select('id','title','thumbnail','view_count','active','recommend','start_date','end_date');

$keyword = null;
if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);

    $query = $query->where('title','like','%'.$keyword.'%')
            ->orWhere('content','like','%'.$keyword.'%');
    $urlPattern = $urlPattern . "&keyword=$keyword";
}


$totalItems = $query->count();  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$exhibitions = $query->orderBy('start_date', 'DESC')
            ->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();



?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "展会信息_后台管理_".$site_info['sitename'];?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>
<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once('../../includes/nav.php'); ?>
    <!-- /nav end -->
    <section class="rightcol">            
        <?php require_once('../../includes/header.php'); ?>

        <div class="container-fluid maincontent">
            <div class="row">
                <div class="col">
                    <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                            <label class="sr-only" for="keyword">搜索</label>
                            <input type="text" name="keyword" class="form-control mb-2" id="keyword" value="<?php echo $keyword ?>" placeholder="关键字">
                            </div>

                            <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">搜索</button>
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
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>     
                    <th>缩略图</th>             
                    <th>标题</th> 
                    <th>显示</th>
                    <th>展会时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($exhibitions as $row)
                {
                    echo "<tr>";
                ?>
                    <td><img src="<?php echo $row['thumbnail'];?>" class="img-rounded" style="height:35px;"/></td>
                    <?php
                   
                    echo "<td>".$row['title']."</td>"; 
               
                    echo "<td>".$row['view_count']."</td>";
                    ?>
                    <td>
                    
                    <?php echo date_format(date_create($row['start_date']),"Y-m-d").'~'.date_format(date_create($row['end_date']),"Y-m-d");?></td>
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

        </div>
        <?php require_once('../../includes/footer.php'); ?> 
            </section>
</div>
<?php require_once('../../includes/scripts.php'); ?> 

<script>
    $(document).ready(function () {
        //当前菜单
        $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');
        $(".mainmenu>li.exhibitions").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
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