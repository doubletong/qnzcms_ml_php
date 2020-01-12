<?php
require_once('../../includes/common.php');
require_once('../../data/product_category.php');



$cateModel = new  TZGCMS\Admin\ProductCategory();
$categories = $cateModel->get_all();

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

//print_r( $tree );

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "产品分类_后台管理_" . $site_info['sitename']; ?></title>
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
                <div class="mb-2 text-right">
                    <a href="product_category_edit.php" class="btn btn-primary">
                        <i class="iconfont icon-plus"></i> 添加分类
                    </a>
                </div>
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>图片/图标</th>
                            <th>标题</th>
                            <th>排序</th>
                            <th>激活？</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tree as $row) {

                            ?>
                        <tr>
                            <td>
                                <?php if (!empty($row['thumbnail'])) { ?>
                                <img src="<?php echo $row['thumbnail']; ?>" alt="<?php echo $row['title']; ?>"
                                    style="display:block; height:30px;">
                                <?php } ?>
                            </td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['importance']; ?></td>
                            <td>
                                <?php echo $row['active']==1?"是":"否";?>
                            </td>
                            <td><?php echo date("Y-m-d", $row['added_date']); ?></td>

                            <td><a href='product_category_edit.php?id=<?php echo $row['id']; ?>'
                                    class='btn btn-primary btn-sm'>
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
                                <button type="button" data-id="<?php echo $row['id']; ?>"
                                    class='btn btn-danger btn-sm btn-delete'>
                                    <i class="iconfont icon-delete"></i>
                                </button>
                            </td>
                        </tr>

                        <?php if(!empty($row['children'])){ 
                                                 foreach( $row['children'] as $subModel){
                                                ?>

                        <tr>
                            <td>
                                <?php if (!empty($subModel['thumbnail'])) { ?>
                                <img src="<?php echo $subModel['thumbnail']; ?>" alt="<?php echo $subModel['title']; ?>"
                                    style="display:block; height:30px;">
                                <?php } ?>
                            </td>
                            <td>—— <?php echo $subModel['title']; ?></td>
                            <td><?php echo $subModel['importance']; ?></td>
                            <td>
                                <?php echo $subModel['active']==1?"是":"否";?>
                            </td>
                            <td><?php echo date("Y-m-d H:i", $subModel['added_date']); ?></td>

                            <td><a href='product_category_edit.php?id=<?php echo $subModel['id']; ?>'
                                    class='btn btn-primary btn-sm'>
                                    <i class="iconfont icon-edit"></i>
                                </a>
                                <?php if($subModel['active']==1){?>
                                    <button type="button" data-id="<?php echo $rosubModelw['id'];?>" class='btn btn-warning btn-sm btn-active' title="隐藏">
                                        <i class="iconfont icon-eye-close"></i>
                                    </button>
                                <?php }else{ ?>
                                    <button type="button" data-id="<?php echo $subModel['id'];?>" class='btn btn-info btn-sm btn-active' title="显示">
                                        <i class="iconfont icon-eye"></i>
                                    </button>
                                <?php } ?>  
                                <button type="button" data-id="<?php echo $subModel['id']; ?>"
                                    class='btn btn-danger btn-sm btn-delete'>
                                    <i class="iconfont icon-delete"></i>
                                </button>
                            </td>
                        </tr>



                        <?php }  }                     
                    }
                    ?>
                    </tbody>
                </table>



            </div>
            <?php require_once('../../includes/footer.php'); ?>
        </section>
    </div>
    <?php require_once('../../includes/scripts.php'); ?>

    <script>
        $(document).ready(function () {
            //当前菜单

            $(".mainmenu>li.products").addClass("nav-open").find("ul>li.category a").addClass("active");


            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            
        $(".btn-active").click(function(){
            var $that = $(this);           
            var productId = $that.attr("data-id");

            $.ajax({
                url : 'category_post.php',
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

            $(".btn-delete").click(function () {
                var $that = $(this);
                bootbox.confirm("删除后分类将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var productId = $that.attr("data-id");

                        $.ajax({
                            url: 'category_post.php',
                            type: 'POST',
                            data: {
                                id: productId,
                                action:"delete"
                            },
                            success: function (res) {

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