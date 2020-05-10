<?php

require_once('../../includes/common.php');


use Models\ApplicationArea;
use JasonGrimes\Paginator;

$urlPattern = "index.php?page=(:num)";
 //文章表实例化
 $applicationArea = new ApplicationArea;
 //搜索条件判断
 $query = $applicationArea->select('id','title','sub_title','importance','active','created_at');

$keyword = null;
if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);

    $query = $query->where('title','like','%'.$keyword.'%')
            ->orWhere('sub_title','like','%'.$keyword.'%')
            ->orWhere('intro','like','%'.$keyword.'%');
    $urlPattern = $urlPattern . "&keyword=$keyword";
}


$totalItems = $query->count();  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$countries = $query->orderBy('importance', 'DESC')
            ->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();


?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "应用领域_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <link href="/assets/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>
            <div class="container-fluid maincontent">

            <div class="row">
                <div class="col">
                    <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">搜索</label>
                            <input type="text" name="keyword" class="form-control mb-2" id="inlineFormInput" value="<?php echo $keyword ?>" placeholder="关键字">
                            </div>
                            <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">搜索</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-auto">
                    <a href="applicationArea_edit.php" class="btn btn-primary">               
                        <i class="iconfont icon-plus"></i>  添加
                    </a>
                </div>
            </div>

            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>          
                    <th>主题</th>
                    <th>副主题</th>
                    <th>排序</th>
                    <th>创建时间</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($countries as $row)
                {
                    echo "<tr>";
                ?>
                  
                    <td><?php echo $row['title'] ;?></td> 
                    <td><?php echo $row['sub_title'] ;?></td> 
                    <td><?php echo $row['importance'] ;?></td>         
                    <td><?php echo date_format($row['created_at'],"Y-m-d");?></td>
                    <td><?php echo ($row['active']==1)?"显示":"隐藏" ;?></td>
                    <td><a href='applicationArea_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
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
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

    <script src="/assets/js/vendor/toastr/toastr.min.js"></script>
    <script src="/assets/js/vendor/bootbox.js/bootbox.js"></script>

    <script type="text/javascript">
    

        $(document).ready(function() {
            //当前菜单        
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');
            $(".mainmenu>li.applications a").addClass("active");     
            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-active").click(function(){
                var $that = $(this);           
                var articleId = $that.attr("data-id");

                $.ajax({
                    url : 'applicationArea_post.php',
                    type : 'POST',
                    data : {id:articleId,action:"active"},
                    success : function(res) {                                                   
                        var myobj = JSON.parse(res);                    
                        //console.log(myobj.status);
                        if (myobj.status === 1) {
                            //toastr.success(myobj.message);                                
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
                url : 'applicationArea_post.php',
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
                bootbox.confirm("删除后将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var id = $that.attr("data-id");

                        $.ajax({
                            url : 'applicationArea_post.php',
                            type : 'POST',
                            data : {id:id,action:"delete"},
                            success : function(res) {
                                var myobj = JSON.parse(res);                    
                                //console.log(myobj.status);
                                if (myobj.status === 1) {
                                    toastr.success(myobj.message); 
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

                    }


                });


            });
            
        });
    </script>

</body>

</html>