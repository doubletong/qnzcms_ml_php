<?php
require_once('../../includes/common.php');
require_once('../../data/job.php');

require '../../../vendor/autoload.php';
use JasonGrimes\Paginator;

$jobClass = new TZGCMS\Admin\Job();

$urlPattern = "index.php?page=(:num)";


$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;


if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

$totalItems = $jobClass->get_jobs_count($keyword);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$jobs = $jobClass->get_paged_jobs($keyword, $currentPage, $itemsPerPage);



?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "岗位招聘_后台管理_".$site_info['sitename'];?>
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
                        <a href="job_edit.php" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i> 添加招聘岗位
                        </a>
                    </div>
                </div>
               

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th>序号</th>
                            <th>职位</th>                        
                            <th>工作地点</th>
                            <th>人数</th>
                      
                            <th style="min-width:120px;">创建日期</th>
                            <th style="min-width:120px;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        foreach($jobs as $row)
        {
          
            ?>
            <tr>
            <td><?php echo $row['importance']; ?></td>
                <td><?php echo $row['title']; ?></td>             
                <td><?php echo $row['address']; ?></td>
                <td><?php echo $row['population']; ?></td>
                
                <td>
                    <?php echo date('Y-m-d',$row['added_date']) ;?>
                </td>
                <td><a href='job_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
                        <i class="iconfont icon-edit"></i>
                    </a>
                    <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-danger btn-sm btn-delete'>
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
        $(document).ready(function () {
            //当前菜单
            $(".mainmenu>li.jobs").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass(
                "active");

            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function () {
                var $that = $(this);
                bootbox.confirm("删除后招聘岗位将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var productId = $that.attr("data-id");

                        $.ajax({
                            url: 'job_delete.php',
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