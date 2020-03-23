<?php
require_once('../../includes/common.php');

use Models\DownloadCategory;
use JasonGrimes\Paginator;


//文章表实例化
$categoryClass = new DownloadCategory;
//搜索条件判断
$query = $categoryClass->select('id','title','description','importance','active','created_at');

$urlPattern = "categories.php?page=(:num)";

$keyword = null;
if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);

    $query = $query->where('title','like','%'.$keyword.'%')
            ->orWhere('responsibilities','like','%'.$keyword.'%')
            ->orWhere('requirement','like','%'.$keyword.'%');
    $urlPattern = $urlPattern . "&keyword=$keyword";
}


$totalItems = $query->count();  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$categorys = $query->orderBy('importance', 'DESC')
            ->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();


?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "岗位招聘_后台管理_" . $site_info['sitename']; ?>
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
                        <a href="category_edit.php" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i> 添加
                        </a>
                    </div>
                </div>


                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                          
                            <th>分类</th>
                            <th>描述</th>                        
                            <th>排序</th>
                            <th>显示?</th>
                            <th style="min-width:120px;">创建日期</th>
                            <th style="min-width:120px;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($categorys as $row) {

                            ?>
                            <tr>
                               
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>                              
                                <td><?php echo $row['importance']; ?></td>
                                <td><?php echo ($row['active']==1)?"显示":"隐藏" ;?></td>                              
                                <td>
                                    <?php echo date_format(date_create($row['added_date']),"Y-m-d"); ?>
                                </td>
                                <td>
                                    <a href='category_edit.php?id=<?php echo $row['id']; ?>' class='btn btn-primary btn-sm' title="编辑">
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


                <nav aria-label="Page navigation">
                    <?php include("../../../vendor/jasongrimes/paginator/examples/pagerBootstrap.phtml") ?>
                </nav>
            </div>
            <?php require_once('../../includes/footer.php'); ?>
        </section>
    </div>

    <?php require_once('../../includes/scripts.php'); ?>


    <script>
        $(document).ready(function() {
            //当前菜单
            $(".mainmenu>li.downloads").addClass("nav-open").find("ul>li.categories a").addClass("active");

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
                            url : 'category_post.php',
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
                var categoryId = $that.attr("data-id");

                $.ajax({
                    url: 'category_post.php',
                    type: 'POST',
                    data: {
                        id: categoryId,
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
                url : 'category_post.php',
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