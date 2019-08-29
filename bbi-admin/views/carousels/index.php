<?php
require_once('../../includes/common.php');
require_once('../../data/carousel.php');
require_once('../../data/position.php');
require '../../../vendor/autoload.php';
use JasonGrimes\Paginator;

$carouselClass = new TZGCMS\Admin\Carousel();

$pid = isset($_GET['pid']) ? $_GET['pid'] : null;

$positionClass = new TZGCMS\Admin\Position();
$positions = $positionClass->get_all();

$urlPattern = "index.php?page=(:num)";


$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;


if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

$totalItems = $carouselClass->get_carousels_count_v1($keyword,$pid);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$carousels = $carouselClass->get_paged_carousels_v1($keyword,$pid, $currentPage, $itemsPerPage);




?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "轮播图_组件_后台管理_".$site_info["sitename"];?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link href="/js/vendor/toastr/toastr.min.css" rel="stylesheet"/>
</head>
<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once('../../includes/nav.php'); ?>
    <!-- /nav end -->
    <section class="rightcol">            
        <?php require_once('../../includes/header.php'); ?>

        <div class="container-fluid maincontent">

    <div class="row mb-2">
        <div class="col">
        <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <div class="form-row align-items-center">
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">关键字</label>
                <input type="text" name="keyword" class="form-control " id="inlineFormInput" value="<?php echo $keyword ?>" placeholder="关键字">
                </div>
              
           
            <div class="col-auto">
                <label class="sr-only" for="inlineFormInput">广告位</label>
                    <select class="form-control" id="pid" name="pid">
                    <option value="">--广告位过滤--</option>
                    <?php foreach ($positions as $position) {
                        ?>                                                       
                            <option value="<?php echo $position["id"]; ?>" <?php echo  $position["id"] == $pid  ? "selected" : ""; ?>><?php echo $position["title"]; ?></option>

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

    <table class="table table-hover table-bordered table-striped">
        <thead>
        <tr>
            <th>缩略图</th>
            <th>主题</th>
            <th>广告位</th>
            <th>链接</th>
            <th>权重</th>
        
            <th>创建日期</th>
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
            echo "<td>".$row['position_title']."</td>";            
            echo "<td>".$row['link']."</td>";
            ?>
             <td><?php echo $row['importance'];?></td>
          
            <td><?php echo $row['added_date'];?></td>
            <td><a href='carousel_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
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
        $(".mainmenu>li.carousels").addClass("nav-open").find("ul>li.ads a").addClass("active");

        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
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