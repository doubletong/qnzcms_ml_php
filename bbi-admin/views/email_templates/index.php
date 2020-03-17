<?php
require_once('../../includes/common.php');
require_once('../../../config/database.php');
require '../../../vendor/autoload.php';

use Models\EmailTemplate;
use JasonGrimes\Paginator;

$urlPattern = "index.php?page=(:num)";
 //文章表实例化
 $template = new EmailTemplate;
 //搜索条件判断
 $query = $template;

 $keyword = null;
if(isset($_REQUEST["keyword"]) && $_REQUEST["keyword"] != "")
{
    $keyword = htmlspecialchars($_REQUEST["keyword"],ENT_QUOTES);

    $query = $query->where('title','like','%'.$keyword.'%');
    $urlPattern = $urlPattern . "&keyword=$keyword";
}


$totalItems = $query->count();  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$pages =  $query->orderBy('importance', 'DESC')
        ->skip(($currentPage-1)*$itemsPerPage)
        ->take($itemsPerPage)
        ->get();



?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "邮件模板_邮件_".$site_info['sitename'];?></title>
    <?php require_once('../../includes/meta.php') ?>
    <link href="/assets/js/vendor/toastr/toastr.min.css" rel="stylesheet" />
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
                            <input type="text" name="search" class="form-control mb-2" id="inlineFormInput" value="<?php echo $keyword ?>" placeholder="关键字">
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
                    <th>标题</th>
                    <th>编号</th>                  
                    <th>创建日期</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($pages as $row)
                {
                    echo "<tr>";
                ?>
                  
                    <?php
                    echo "<td>".$row['title']."</td>";                   
                    echo "<td>".$row['code']."</td>";
                  
                    ?>
                
                    <td><?php  echo date('Y-m-d',strtotime($row['created_at'])) ;?></td>
                    <td><a href='edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
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

<script src="/assets/js/vendor/toastr/toastr.min.js"></script>
    <script src="/assets/js/vendor/bootbox.js/bootbox.js"></script>

<script>
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li.emails").addClass("nav-open").find("ul>li.template a").addClass("active");
        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var pageId = $that.attr("data-id");

                    $.ajax({
                        url : 'template_delete.php',
                        type : 'POST',
                        data : {id:pageId},
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