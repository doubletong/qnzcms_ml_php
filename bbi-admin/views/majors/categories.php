<?php

require_once('../../includes/common.php');
require_once('../../../includes/PDO_Pagination.php');
require_once('../../data/major_category.php');

require '../../../vendor/autoload.php';
use JasonGrimes\Paginator;

$categoryClass = new TZGCMS\Admin\MajorCategory();

$urlPattern = "categories.php?page=(:num)";

$did = isset($_GET['did']) ? $_GET['did'] : null;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

if (!empty($did)) {
    $urlPattern = $urlPattern . "&did=$did";
}
if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

$totalItems = $categoryClass->get_categories_count($did, $keyword);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);

$categories = $categoryClass->get_paged_categories($did, $keyword, $currentPage, $itemsPerPage);



?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "分类 _ 专业项目 _后台管理_".$site_info['sitename'];?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
   
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
                    <a href="category_edit.php?did=<?php echo $did;?>" class="btn btn-primary">               
                        <i class="iconfont icon-plus"></i>  添加分类                         
                    </a>
                </div>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
          
                    <!-- <th>图标</th> -->
             
                    <th>标题</th>
                    <th>所属栏目</th>
                    <th>排序</th>
                    <th>状态</th>
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
                    <!-- <td>
                        <?php if(!empty($row['thumbnail'])){ ?> 
                            <img src="<?php echo $row['thumbnail'] ;?>" alt="<?php echo $row['title'] ;?>" style="max-height:50px;display:block;">
                        <?php } ?>
                    </td>  -->
                    <td><?php echo $row['title'] ;?></td> 
                    <td><?php echo $row['dictionary_title'] ;?></td> 
                    <td><?php echo $row['importance'] ;?></td>         
                    <td><?php echo ($row['active']==1)?"显示":"隐藏" ;?></td>
                    <td><?php echo date("Y-m-d H:i",$row['added_date']);?></td>
                   
                    <td><a href='category_edit.php?id=<?php echo $row['id'];?>&did=<?php echo $did;?>' class='btn btn-primary btn-sm'>
                            <i class="iconfont icon-edit"></i>
                        </a>

                        <?php if($row['active']==1){?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-warning btn-sm btn-active' title="隐藏">
                                <i class="iconfont icon-eye-close"></i>
                            </button>
                        <?php }else{ ?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-active' title="显示">
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


            <nav aria-label="Page navigation">                
                    <?php include("../../../vendor/jasongrimes/paginator/examples/pager.phtml") ?>                            
                </nav>
        </div>
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>


<script>
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li.majors").addClass("nav-open").find("ul>li.category a").addClass("active");


        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });


        $(".btn-active").click(function(){
            var $that = $(this);           
            var articleId = $that.attr("data-id");

            $.ajax({
                url : 'category_actions.php',
                type : 'POST',
                data : {id:articleId,action:"active"},
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

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后案例分类将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var majorId = $that.attr("data-id");

                    $.ajax({
                        url : 'category_actions.php',
                        type : 'POST',
                        data : {id:majorId},
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