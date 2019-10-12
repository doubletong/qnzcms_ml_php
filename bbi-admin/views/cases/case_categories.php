<?php
require_once('../../includes/common.php');
require_once('../../data/case_category.php');


require '../../../vendor/autoload.php';
use JasonGrimes\Paginator;

$categoryClass = new TZGCMS\Admin\CaseCategory();

$urlPattern = "case_categories.php?page=(:num)";


$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

$totalItems = $categoryClass->get_categories_count($keyword);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$categories = $categoryClass->get_paged_categories($keyword, $currentPage, $itemsPerPage);


?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "案例分类_后台管理_".$site_info['sitename'];?></title>
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
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                        <div class="form-row align-items-center">
                            <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">搜索</label>
                            <input type="text" name="search" class="form-control mb-2" id="inlineFormInput" value="<?php echo $keyword; ?>" placeholder="关键字">
                            </div>

                            <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">搜索</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-auto">
                    <a href="case_category_edit.php" class="btn btn-primary">
                        <i class="iconfont icon-plus"></i>  添加案例分类
                    </a>
                </div>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <!-- <th>缩略图</th> -->
                    <th>标题</th>
                    <th>排序</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($categories as $row)
                {
                    echo "<tr>";
                ?>
                    <!-- <td><img src="<?php echo $row['imageurl'];?>" class="img-rounded" style="height:35px;"/></td> -->
                    <td><?php echo $row['title'] ;?> </td> 
                    <td><?php echo $row['importance'] ;?></td>         
                    <td><?php echo date("Y-m-d H:i",$row['added_date']);?></td>
                   
                    <td><a href='case_category_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
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

<script>
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li.cases").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后案例分类将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var articleId = $that.attr("data-id");

                    $.ajax({
                        url : 'case_category_delete.php',
                        type : 'POST',
                        data : {id:articleId},
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