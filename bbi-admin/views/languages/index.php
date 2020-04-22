<?php
require_once('../../includes/common.php');

use Models\Language;
use JasonGrimes\Paginator;



//文章表实例化
$languageClass = new Language;
//搜索条件判断
$query = $languageClass->select('code','name','issys','default','importance','active','created_at');

$urlPattern = "index.php?page=(:num)";

$keyword = null;
if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);

    $query = $query->where('code','like','%'.$keyword.'%')
            ->orWhere('name','like','%'.$keyword.'%');
    $urlPattern = $urlPattern . "&keyword=$keyword";
}


$totalItems = $query->count();  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$languages = $query->orderBy('importance', 'DESC')
            ->skip(($currentPage-1)*$itemsPerPage)
            ->take($itemsPerPage)
            ->get();


?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "语言_后台管理_" . $site_info['sitename']; ?>
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
                        <a href="edit.php" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i> 添加
                        </a>
                    </div>
                </div>


                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th>图标</th>
                            <th>语言代码</th>
                            <th>语言名称</th>
                            <th>默认？</th>
                            <th>排序</th>
                            <th>显示?</th>
                            <th style="min-width:120px;">创建日期</th>
                            <th style="min-width:120px;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($languages as $row) {

                            ?>
                            <tr>   
                                <td><img src="../../content/img/langs/<?php echo $row['code']; ?>.svg" alt="<?php echo $row['code']; ?>" style="height:30px;"></td>                           
                                <td><?php echo $row['code']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo ($row['default']==1)?"默认":"" ;?></td> 
                                <td><?php echo $row['importance']; ?></td>
                                <td><?php echo ($row['active']==1)?"显示":"隐藏" ;?></td>                              
                                <td>
                                    <?php echo date_format(date_create($row['added_date']),"Y-m-d"); ?>
                                </td>
                                <td>
                                    <a href='edit.php?id=<?php echo $row['code']; ?>' class='btn btn-primary btn-sm' title="编辑">
                                        <i class="iconfont icon-edit"></i>
                                    </a>
                                    <button type="button" data-id="<?php echo $row['code']; ?>" class='btn btn-info btn-sm btn-copy' title="复制">
                                        <i class="iconfont icon-file-copy"></i>
                                    </button>

                                    <?php if ($row['default'] == 1) { ?>
                                        <button type="button" data-id="<?php echo $row['code']; ?>" class='btn btn-warning btn-sm btn-default' title="取消默认">
                                            <i class="iconfont icon-check-circle"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button type="button" data-id="<?php echo $row['code']; ?>" class='btn btn-info btn-sm btn-default' title="默认">
                                            <i class="iconfont icon-minus-circle"></i>
                                        </button>
                                    <?php } ?>

                                    <?php if ($row['active'] == 1) { ?>
                                        <button type="button" data-id="<?php echo $row['code']; ?>" class='btn btn-warning btn-sm btn-active' title="隐藏">
                                            <i class="iconfont icon-eye-close"></i>
                                        </button>
                                    <?php } else { ?>
                                        <button type="button" data-id="<?php echo $row['code']; ?>" class='btn btn-info btn-sm btn-active' title="显示">
                                            <i class="iconfont icon-eye"></i>
                                        </button>
                                    <?php } ?>
                                    <button type="button" data-id="<?php echo $row['code']; ?>" class='btn btn-danger btn-sm btn-delete' title="删除">
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
            $(".mainmenu>li.system").addClass("nav-open").find("ul>li.language a").addClass(
                "active");

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
                            url : 'post.php',
                            type : 'POST',
                            data : {code:id,action:"delete"},
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

            $(".btn-default").click(function() {
                var $that = $(this);
                var languageId = $that.attr("data-id");

                $.ajax({
                    url: 'post.php',
                    type: 'POST',
                    data: {
                        code: languageId,
                        action: "default"
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

            $(".btn-active").click(function() {
                var $that = $(this);
                var languageId = $that.attr("data-id");

                $.ajax({
                    url: 'post.php',
                    type: 'POST',
                    data: {
                        code: languageId,
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

           
            

        });
    </script>
</body>

</html>