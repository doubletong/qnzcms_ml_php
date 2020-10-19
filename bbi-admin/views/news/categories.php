<?php
require_once('../../includes/common.php');

use Models\NewsCategory;
$categories = NewsCategory::with("children")->where(["parent" => null])->orderby('importance','desc')->get();

//$tree = buildTree($categories);
//print_r( $tree );
$level = 0;
function recursive($items, $level){
    $level++;
    foreach ($items as $row) {
        $titles = json_decode($row['title'],true);

        echo "<tr><td>";
        for($i=1;$i<$level;$i++){
            echo "—";
        }
        echo $titles['zh-CN'].'</td>';
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
    <title><?php echo "分类_新闻资讯_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('../../includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('../../includes/header.php'); ?>

            <div class="main-content"> 
                <div class="breadcrumb-container">
                    <div class="row">
                        <div class="col-md">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                                <li class="breadcrumb-item"><a href="/bbi-admin/views/news/index.php">新闻资讯</a></li>
                                <li class="breadcrumb-item active" aria-current="page">分类</li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-md-auto">
                            <time id="sitetime"></time>
                        </div>
                    </div>
                </div> 

                <div class="card">
                    <header class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="card-title-v1"> <i class="iconfont icon-link"></i>新闻分类</div>
                            </div>
                            <div class="col-auto">
                                <div class="control"><a class="expand" href="#"><i class="iconfont icon-fullscreen"></i></a><a class="compress" href="#"><i class="iconfont icon-shrink"></i></a></div>
                            </div>
                        </div>
                    </header>

                    <section class="card-body">
                        <div class="card-toolbar mb-3">
                            <div class="text-right">
                                <a href="category_edit.php" class="btn btn-primary">
                                    <i class="iconfont icon-plus"></i> 添加分类
                                </a>
                            </div>
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
                    </section>
                    <footer class="card-footer">
                       
                           
                            <div class="text-right">
                                总记<strong><?php echo NewsCategory::count(); ?></strong>条记录
                            </div>
                      
                    </footer>
                </div>
            </div>
            <?php require_once('../../includes/footer.php'); ?>
        </section>
    </div>
    <?php require_once('../../includes/scripts.php'); ?>

    <script>
        $(document).ready(function () {
            //当前菜单
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');  
            $(".mainmenu>li.news").addClass("nav-open").find("ul>li.category a").addClass("active");


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
                        var cId = $that.attr("data-id");

                        $.ajax({
                            url: 'category_post.php',
                            type: 'POST',
                            data: {
                                id: cId,
                                action:"exist"
                            },
                            success: function (res) {

                                var myobj = JSON.parse(res);
                                //console.log(myobj.status);
                                if (myobj.status === 1) {
                                    delete_category(cId,$that);
                                }
                                if (myobj.status === 2) {
                                    bootbox.confirm(myobj.message, function (result1) {
                                        if (result1) {
                                            delete_category(cId,$that);
                                        }

                                    });
                                  
                                }
                              
                            }
                        });
                        
                    }

                });

            });

            function delete_category(category_id,$that){
                $.ajax({
                    url: 'category_post.php',
                    type: 'POST',
                    data: {
                        id: category_id,
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

            // $(".btn-delete").click(function () {
            //     var $that = $(this);
            //     bootbox.confirm("删除后分类将无法恢复，您确定要删除吗？", function (result) {
            //         if (result) {
            //             var productId = $that.attr("data-id");

            //             $.ajax({
            //                 url: 'category_post.php',
            //                 type: 'POST',
            //                 data: {
            //                     id: productId,
            //                     action:"delete"
            //                 },
            //                 success: function (res) {

            //                     var myobj = JSON.parse(res);
            //                     //console.log(myobj.status);
            //                     if (myobj.status === 1) {
            //                         toastr.success(myobj.message);
            //                         $that.closest("tr").remove();
            //                     }
            //                     if (myobj.status === 2) {
            //                         toastr.error(myobj.message)
            //                     }
            //                     if (myobj.status === 3) {
            //                         toastr.info(myobj.message)
            //                     }
            //                 }
            //             });
            //         }

            //     });

            // });

        });
    </script>
</body>

</html>