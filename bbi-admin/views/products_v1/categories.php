<?php
require_once('../../includes/common.php');

use Models\ProductCategory;
$categories = ProductCategory::with("children")->where(["parent" => null])->orderby('importance','desc')->get();

//$tree = buildTree($categories);
//print_r( $tree );
$level = 0;
function recursive($items, $level){
    $level++;
    foreach ($items as $row) {
        echo "<tr><td>";
        for($i=1;$i<$level;$i++){
            echo "—";
        }
        echo $row['title'].'</td>';
        echo '<td>'.$row['importance'].'</td>';
        $active = $row['active']==1?"是":"否";
        echo "<td>$active</td>";   
        $created_date = date_format($row['created_at'],"Y-m-d");
        echo "<td>$created_date</td>";
        echo '<td><a href="category_edit.php?id='.$row['id'].'" class="btn btn-primary btn-sm"><i class="iconfont icon-edit"></i></a> ';
        if($row['active']==1){
            echo ' <button type="button" data-id="'.$row['id'].'" class="btn btn-warning btn-sm btn-active" title="隐藏"><i class="iconfont icon-eye-close"></i></button>';
        }else{ 
            echo ' <button type="button" data-id="'.$row['id'].'" class="btn btn-info btn-sm btn-active" title="显示"><i class="iconfont icon-eye"></i></button>';
        }
        echo ' <button type="button" data-id="'.$row['id'].'" class="btn btn-danger btn-sm btn-delete"><i class="iconfont icon-delete"></i></button></td>';
        echo '</tr>';                    
        $children = $row['children'];          
        if(!empty($children)){
            //Call the function again. Increment number by one.
            recursive($children,$level);
        }
   
    }
}
 

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
                    <a href="category_edit.php" class="btn btn-primary">
                        <i class="iconfont icon-plus"></i> 添加分类
                    </a>
                </div>
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>                         
                            <th>标题</th>
                            <th>排序</th>
                            <th>激活？</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php               
                            recursive($categories, $level)
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

            $(".mainmenu>li.products_v1").addClass("nav-open").find("ul>li.category a").addClass("active");


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