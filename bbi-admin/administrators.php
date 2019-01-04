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
    $pagination->rowCount("SELECT * FROM wp_users WHERE username LIKE '%$search%' ORDER BY id DESC ");
    $pagination->config(6, 10);
    $sql = "SELECT * FROM wp_users WHERE username LIKE '%$search%' ORDER BY id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
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
    $pagination->rowCount("SELECT * FROM wp_users");
    $pagination->config(6,10);
    $sql = "SELECT * FROM wp_users ORDER BY id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
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
    <title>
        <?php echo "管理员_系统_后台管理_".SITENAME;?>
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

                <div class="row">
                    <div class="col">
                        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                            <div class="form-row align-items-center">
                                <div class="col-auto">
                                    <label class="sr-only" for="inlineFormInput">搜索</label>
                                    <input type="text" name="search" class="form-control mb-2" id="inlineFormInput"
                                        value="<?php echo $search ?>" placeholder="关键字">
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-2">搜索</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-auto">
                        <a href="admin_add.php" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i> 添加链接
                        </a>
                    </div>
                </div>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>帐号</th>
                            <th>创建日期</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        foreach($model as $row)
        {
            echo "<tr>";
            echo "<td>".$row['username']."</td>";
            ?>
                        <td>
                            <?php echo $row['created_date'];?>
                        </td>
                        <td>
                            <!--<a href='admin_edit.php?id=<?php /*echo $row['id'];*/?>' class='btn btn-primary btn-xs'>
                    <span class="glyphicon glyphicon-edit"></span>
                </a>-->
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
            $(".mainmenu>li:nth-of-type(10)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");

            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function () {
                var $that = $(this);
                bootbox.confirm("删除后管理员将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var productId = $that.attr("data-id");

                        $.ajax({
                            url: 'admin_delete.php',
                            type: 'POST',
                            data: {
                                id: productId
                            },
                            success: function (res) {

                                //  $('#resultreturn').prepend(res);
                                if (res) {
                                    toastr.success('管理员已删除成功！', '删除管理员')
                                    $that.closest("tr").remove();
                                } else {
                                    toastr.error('管理员删除失败！', '删除管理员')
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