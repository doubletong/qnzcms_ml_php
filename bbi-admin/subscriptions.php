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
    $pagination->rowCount("SELECT * FROM subscriptions WHERE email LIKE '%$search%'");
    $pagination->config(6, 10);
    $sql = "SELECT * FROM subscriptions WHERE email LIKE '%$search%'  ORDER BY email ASC  LIMIT $pagination->start_row, $pagination->max_rows";
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
    $pagination->rowCount("SELECT * FROM subscriptions");
    $pagination->config(6,10);
    $sql = "SELECT * FROM subscriptions ORDER BY email ASC  LIMIT $pagination->start_row, $pagination->max_rows";
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
        <?php echo "邮件订阅_后台管理_".SITENAME;?>
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
                        <a href="subscription_export.php" class="btn btn-primary">
                            <i class="iconfont icon-export"></i>  导出数据
                        </a>
                    </div>
                </div>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>邮箱</th>
                          
                            <th style="min-width:120px;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        foreach($model as $row)
        {
          
            ?>
            <tr>
                        <td><?php echo $row['email']; ?></td>
                    
                        <td>
                            <button type="button" data-id="<?php echo $row['email'];?>" class='btn btn-danger btn-sm btn-delete'>
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
            $(".mainmenu>li:nth-of-type(8)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass(
                "active");

            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function () {
                var $that = $(this);
                bootbox.confirm("删除后邮箱将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var email = $that.attr("data-id");

                        $.ajax({
                            url: 'subscription_delete.php',
                            type: 'POST',
                            data: {
                                email: email
                            },
                            success: function (res) {

                                //  $('#resultreturn').prepend(res);
                                if (res) {
                                    toastr.success('邮箱已删除成功！', '删除邮箱')
                                    $that.closest("tr").remove();
                                } else {
                                    toastr.error('邮箱删除失败！', '删除邮箱')
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