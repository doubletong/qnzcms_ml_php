<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/product_category.php');

require_once('../includes/PDO_Pagination.php');
// get paging products
$did = isset($_GET['did'])?$_GET['did']:"";

$pagination = new PDO_Pagination(db::getInstance());
$search = (isset($_REQUEST["search"]) && $_REQUEST["search"] != "") ? htmlspecialchars($_REQUEST["search"]):null;
$cid = (isset($_REQUEST["cid"]) && $_REQUEST["cid"] != "") ? htmlspecialchars($_REQUEST["cid"]):null;

$sql = "SELECT a.id,a.title, a.thumbnail,a.importance,a.active,a.added_date, a.view_count,a.dictionary_id, c.title as category_title FROM products as a Left JOIN product_categories as c 
ON c.id = a.category_id WHERE a.dictionary_id = $did ";

$pagination->param .= "&did=$did";

if(isset($_REQUEST["search"]) && $_REQUEST["search"] != ""){    
    $pagination->param .= "&search=$search";
    $sql .= " AND a.title LIKE '%$search%' OR a.description LIKE '%$search%' OR a.content LIKE '%$search%' ";
}
if(isset($_REQUEST["cid"]) && $_REQUEST["cid"] != ""){    
    $pagination->param .= "&cid=$cid";
    $sql .= " AND a.category_id = $cid ";
}

$pagination->rowCount($sql);
$pagination->config(6, 15);

$sql .= " ORDER BY a.importance DESC, a.id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
$query =db::getInstance()->prepare($sql);
$query->execute();
$model = array();
while($rows = $query->fetch())
{
    $model[] = $rows;
}

//get all categories

$categoryClass = new ProductCategory();
$categories = $categoryClass->get_all_bydid($did);


function buildTree(array $elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }
    return $branch;
}

$tree = buildTree($categories);
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "产品_后台管理_".SITENAME;?>
    </title>
    <?php require_once('includes/meta.php') ?>
    <link href="../js/vendor/toastr/toastr.min.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('includes/header.php'); ?>

            <div class="container-fluid maincontent">

                <div class="row  mb-2">
                    <div class="col">
                        <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">关键字</label>
                                    <input type="text" name="search" class="form-control" id="inlineFormInput"
                                        value="<?php echo $search ?>" placeholder="关键字">

                                        <input type="hidden" name = "did" value="<?php echo $did;?>" />
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
                        <a href="product_add.php?did=<?php echo $did; ?>" class="btn btn-primary">
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
                    foreach($model as $row)
                    {
                        echo "<tr>";
                        ?>
                        <td><img src="<?php echo $row['thumbnail'];?>" class="img-rounded" style="height:35px;" /></td>
                        <?php
                      
                        echo "<td>".$row['title']."</td>";                      
                        ?>
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
                            <a href='product_edit.php?id=<?php echo $row['id'];?>&did=<?php echo $row['dictionary_id'];?>' class='btn btn-primary btn-sm'>
                                <i class="iconfont icon-edit"></i>
                            </a>
                            <?php if( $did=="5"){ ?>
                                <a href='product_documents.php?pid=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
                                    <i class="iconfont icon-image"></i>
                                </a>
                            <?php } ?>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-info btn-sm btn-copy'>
                                <i class="iconfont icon-file-copy"></i>
                            </button>
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
                    <ul class="pagination">
                        <?php
                    $pagination->pages("btn");
                    ?>
                    </ul>
                </nav>
            </div>
            <?php require_once('includes/footer.php'); ?> 
            </section>
</div>
<?php require_once('includes/scripts.php'); ?> 

<script src="../js/vendor/toastr/toastr.min.js"></script>
<script src="../js/vendor/bootbox.js/bootbox.js"></script>
    <script>
        $(document).ready(function () {
            //当前菜单
            if(<?php echo $did;?>=="4"){
                $(".mainmenu>li.products").addClass("nav-open").find("ul>li.list a").addClass("active");
            }else{
                $(".mainmenu>li.accessories").addClass("nav-open").find("ul>li.list a").addClass("active");
            }
          
            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function () {
                var $that = $(this);
                bootbox.confirm("删除后产品将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var productId = $that.attr("data-id");

                        $.ajax({
                            url: 'product_delete.php',
                            type: 'POST',
                            data: {
                                id: productId
                            },
                            success: function (res) {

                                //  $('#resultreturn').prepend(res);
                                if (res) {
                                    toastr.success('产品已删除成功！', '删除产品')
                                    $that.closest("tr").remove();
                                } else {
                                    toastr.error('产品删除失败！', '删除产品')
                                }
                            }
                        });
                    }
                });
            });
            //拷贝记录
            $(".btn-copy").click(function () {
                var $that = $(this);
                bootbox.confirm("拷贝后会复制出一条一样的新记录，您确定要拷贝吗？", function (result) {
                    if (result) {
                        var productId = $that.attr("data-id");

                        $.ajax({
                            url: 'product_copy.php',
                            type: 'POST',
                            data: {
                                id: productId
                            },
                            success: function (res) {

                                //  $('#resultreturn').prepend(res);
                                if (res) {
                                    toastr.success('产品已拷贝成功！', '拷贝产品')
                                    location.reload()
                                } else {
                                    toastr.error('产品拷贝失败！', '拷贝产品')
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