<?php
require_once('../../includes/common.php');
require_once('../../data/product_category.php');
require_once('../../data/product.php');


require '../../../vendor/autoload.php';
use JasonGrimes\Paginator;


$cid = isset($_GET['cid']) ? $_GET['cid'] : null;

$categoryClass = new TZGCMS\Admin\ProductCategory();
$categories = $categoryClass->get_all();

$productClass = new TZGCMS\Admin\Product();

$urlPattern = "index.php?page=(:num)";

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;


if (!empty($cid)) {
    $urlPattern = $urlPattern . "&cid=$cid";
}
if (!empty($keyword)) {
    $urlPattern = $urlPattern . "&keyword=$keyword";
}

$totalItems = $productClass->get_products_count($cid, $keyword);  //总记录数
$itemsPerPage = 10;  // 每页显示数
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // 当前所在页数

$paginator = new Paginator($totalItems, $itemsPerPage, $currentPage, $urlPattern);
$paginator->setMaxPagesToShow(6);
$products = $productClass->get_paged_products($cid, $keyword, $currentPage, $itemsPerPage);



//get all categories

// $categoryClass = new TZGCMS\Admin\ProductCategory();
// $categories = $categoryClass->get_all_bydid($did);


// function buildTree(array $elements, $parentId = 0)
// {
//     $branch = array();
//     foreach ($elements as $element) {
//         if ($element['parent_id'] == $parentId) {
//             $children = buildTree($elements, $element['id']);
//             if ($children) {
//                 $element['children'] = $children;
//             }
//             $branch[] = $element;
//         }
//     }
//     return $branch;
// }

// $tree = buildTree($categories);
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "产品_后台管理_".$site_info['sitename'];?>
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

                <div class="row  mb-2">
                    <div class="col">
                        <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">关键字</label>
                                    <input type="text" name="keyword" class="form-control" id="inlineFormInput"
                                        value="<?php echo $keyword ?>" placeholder="关键字">
                                     
                                </div>
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">分类</label>
                                     <select class="form-control" id="cid" name="cid" placeholder="">
                                                    <option value="">--请选择分类--</option>

                                                    <?php foreach ($categories as $category) {
                                                        ?>                                                       
                                                            <option value="<?php echo $category["id"]; ?>" <?php echo  $category["id"] == $cid  ? "selected" : ""; ?>><?php echo $category["title"]; ?></option>

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
                        <a href="product_add.php" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i> 添加产品
                        </a>
                    </div>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>图片</th>                       
                            <th>产品名称</th>
                            <th>所属分类</th>                          
                            <th>显示</th>
                            <th>重要性</th>
                            <th>发布</th>
                            <th>创建日期</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    foreach($products as $row)
                    {
                        echo "<tr>";
                        ?>
                        <td><img src="<?php echo $row['thumbnail'];?>" class="img-rounded" style="height:35px;" /></td>
                        
                      
                       <td>
                           <?php   
                           echo $row['title'];                           
                           if($row['recommend']){
                        ?>
                       <span class="badge badge-primary">
                        <i class='iconfont  icon-like-fill'></i></span>   
                      
                        <?php } ?>
                    </td>;                      
                       


                      <td>
                            <?php echo $row['category_title'];?>
                        </td>
                        <td>
                            <?php echo $row['view_count'];?>
                        </td>
                        <td>
                            <?php echo $row['importance'];?>                        
                            </td>
                        
                        <td>
                            <?php echo $row['active']==1?"是":"否";?>
                        </td>
                        <td>
                            <?php echo date('Y-m-d',$row['added_date']) ;?>
                        </td>
                        <td>
                            <a href='product_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
                                <i class="iconfont icon-edit"></i>
                            </a>
                            <!--
                                <a href='product_documents.php?pid=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
                                    <i class="iconfont icon-image"></i>
                                </a>
                           -->
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-copy'>
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
        
                $(".mainmenu>li.products").addClass("nav-open").find("ul>li.list a").addClass("active");
         
          
            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后新闻将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var productId = $that.attr("data-id");

                    $.ajax({
                        url : 'product_actions.php',
                        type : 'POST',
                        data : {id:productId,action:"delete"},
                        success : function(res) {

                       
                            var myobj = JSON.parse(res);                    
                          
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

        $(".btn-active").click(function(){
            var $that = $(this);           
            var productId = $that.attr("data-id");

            $.ajax({
                url : 'product_actions.php',
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
            var productId = $that.attr("data-id");

            $.ajax({
                url : 'product_actions.php',
                type : 'POST',
                data : {id:productId,action:"recommend"},
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
            var productId = $that.attr("data-id");

            $.ajax({
                url : 'product_actions.php',
                type : 'POST',
                data : {id:productId,action:"copy"},
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