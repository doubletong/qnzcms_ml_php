<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');

require_once('../includes/PDO_Pagination.php');

$pagination = new PDO_Pagination(db::getInstance());

$search = null;
if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
{
    $search = htmlspecialchars($_REQUEST["search"]);
    $pagination->param = "&search=$search";
    $pagination->rowCount("SELECT * FROM wp_links WHERE title LIKE '%$search%'");
    $pagination->config(3, 5);
    $sql = "SELECT * FROM wp_links WHERE title LIKE '%$search%'  ORDER BY importance, id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query =db::getInstance()->prepare($sql);
    $query->execute();
    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }
}
else
{
    $pagination->rowCount("SELECT * FROM wp_links");
    $pagination->config(6,15);
    $sql = "SELECT * FROM wp_links ORDER BY importance, id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query =db::getInstance()->prepare($sql);
    $query->execute();
    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo "链接_组件_后台管理_".SITENAME;?></title>
    <?php require_once('includes/meta.php') ?>
    <link href="../js/vendor/toastr/toastr.min.css" rel="stylesheet"/>
</head>
<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once('includes/nav.php'); ?>
    <!-- /nav end -->
    <section class="rightcol">            
        <?php require_once('includes/header.php'); ?>

        <div class="container-fluid maincontent">

    <div class="row">
        <div class="col">
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <div class="form-row align-items-center">
            <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">搜索</label>
                            <input type="text" name="search" class="form-control mb-2" id="inlineFormInput" value="<?php echo $search ?>" placeholder="关键字">
                            </div>
                            <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">搜索</button>
                            </div>
            </div>
        </form>
        </div>
        <div class="col-auto">
        <a href="link_add.php" class="btn btn-primary">
            <i class="iconfont icon-plus"></i>  添加链接
        </a>
        </div>
    </div>

    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>缩略图</th>
            <th>主题</th>
            <th>链接</th>
            <th>发布者</th>
            <th style="min-width:120px;">创建日期</th>
            <th style="min-width:120px;">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($model as $row)
        {
            echo "<tr>";
            ?>
            <td><img src="<?php echo $row['image_url'];?>" class="img-rounded" style="height:35px;"/></td>
            <?php

            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['link']."</td>";
            ?>
            <td><?php echo $row['added_by'];?></td>
            <td><?php echo date('Y-m-d',$row['added_date']) ;?></td>
            <td><a href='link_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
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
        <ul class="pagination">
            <?php
            $pagination->pages("btn");
            ?>
        </ul>
    </nav>
</div>

</div>

<?php require_once('includes/scripts.php'); ?> 

<script src="../js/vendor/toastr/toastr.min.js"></script>
<script src="../js/vendor/bootbox.js/bootbox.js"></script>

<script>
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu>li:nth-of-type(6)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");

        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后链接将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var productId = $that.attr("data-id");

                    $.ajax({
                        url : 'link_delete.php',
                        type : 'POST',
                        data : {id:productId},
                        success : function(res) {

                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('链接已删除成功！', '删除链接')
                                $that.closest("tr").remove();
                            } else {
                                toastr.error('链接删除失败！', '删除链接')
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