<?php
require_once('../../includes/common.php');
require_once('../../data/chronicle.php');

require '../../../vendor/autoload.php';
use JasonGrimes\Paginator;

// $dictionaryClass = new TZGCMS\Admin\Dictionary();
// $dictionaries = $dictionaryClass->get_dictionaries_byid(11);

$chronicleClass = new TZGCMS\Admin\Chronicle();

$urlPattern = "index.php?page=(:num)";

$did = isset($_GET['did']) ? $_GET['did'] : null;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

if (!empty($did)) {
    $urlPattern = $urlPattern . "&did=$did";
}
if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

$totalItems = $chronicleClass->get_chronicles_count($did, $keyword);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$chronicles = $chronicleClass->get_paged_chronicles($did, $keyword, $currentPage, $itemsPerPage);

// $months = new Array{1,2,3,4}

?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "事件_后台管理_".$site_info['sitename']; ?>
    </title>
    <?php require_once('../../includes/meta.php') ?>
    <link href="/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
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
                        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">搜索</label>
                                    <input type="text" name="keyword" class="form-control mb-2" id="inlineFormInput"
                                        value="<?php echo $keyword ?>" placeholder="关键字">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">搜索</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-auto">
                        <a href="chronicle_edit.php?did=<?php echo $did; ?>" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i> 添加事件
                        </a>
                    </div>
                </div>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>                        
                            <th>图片</th>                   
                            <th>年份</th>
                            <th>月份</th>
                            <th>事件描述</th>                      
                            <th>发布者</th>
                            <th style="min-width:120px;">创建日期</th>
                            <th style="min-width:120px;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        foreach($chronicles as $row)
        {
            echo "<tr>";
            ?>
            
                <td><img src="<?php echo $row['image_url'];?>" alt="" style="height:50px;"> </td>
               
              
                        <td><?php echo $row['year'];?></td>
                        <td><?php echo $row['month'];?></td>
                        <td><?php echo $row['description'];?></td>
                        <td>
                            <?php echo $row['added_by'];?>
                        </td>
                        <td>
                            <?php echo date('Y-m-d',$row['added_date']) ;?>
                        </td>
                        <td><a href='chronicle_edit.php?id=<?php echo $row['id'];?>&did=<?php echo $row['dictionary_id'];?>' class='btn btn-primary btn-sm'>
                                <i class="iconfont icon-edit"></i>
                            </a>
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


                <nav aria-label="Page navigation">                
                    <?php include("../../../vendor/jasongrimes/paginator/examples/pagerBootstrap.phtml") ?>                            
                </nav>
            </div>
            <?php require_once('../../includes/footer.php'); ?>
        </section>
    </div>

    <?php require_once('../../includes/scripts.php'); ?>

    <script src="/js/vendor/toastr/toastr.min.js"></script>
    <script src="/js/vendor/bootbox.js/bootbox.js"></script>

    <script>
        $(document).ready(function () {
            //当前菜单
            $(".mainmenu>li.chronicles").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");

            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function () {
                var $that = $(this);
                bootbox.confirm("删除后事件记录将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var productId = $that.attr("data-id");

                        $.ajax({
                            url: 'chronicle_delete.php',
                            type: 'POST',
                            data: {
                                id: productId
                            },
                            success: function (res) {

                                var myobj = JSON.parse(res);                    
                                console.log(myobj.status);
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