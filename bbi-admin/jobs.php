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
    $pagination->rowCount("SELECT * FROM jobs WHERE title LIKE '%$search%'");
    $pagination->config(6, 10);
    $sql = "SELECT * FROM jobs WHERE title LIKE '%$search%'  ORDER BY importance ASC, id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
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
    $pagination->rowCount("SELECT * FROM jobs");
    $pagination->config(6,10);
    $sql = "SELECT * FROM jobs ORDER BY importance ASC, id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
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
        <?php echo "加入我们_后台管理_".SITENAME;?>
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
                        <a href="job_add.php" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i> 添加招聘岗位
                        </a>
                    </div>
                </div>

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                        <th>序号</th>
                            <th>职位</th>
                            <th>部门</th>
                            <th>工作地点</th>
                            <th>人数</th>
                            <th>发布者</th>
                            <th style="min-width:120px;">创建日期</th>
                            <th style="min-width:120px;">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
        foreach($model as $row)
        {
          
            ?>
            <tr>
            <td><?php echo $row['importance']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                       <td><?php echo $row['department']; ?></td>
                       <td><?php echo $row['address']; ?></td>
                       <td><?php echo $row['population']; ?></td>
                        <td>
                            <?php echo $row['added_by'];?>
                        </td>
                        <td>
                            <?php echo date('Y-m-d',$row['added_date']) ;?>
                        </td>
                        <td><a href='job_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
                                <i class="iconfont icon-edit"></i>
                            </a>
                            <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-danger btn-sm btn-delete'>
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
            $(".mainmenu>li.jobs").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass(
                "active");

            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function () {
                var $that = $(this);
                bootbox.confirm("删除后招聘岗位将无法恢复，您确定要删除吗？", function (result) {
                    if (result) {
                        var productId = $that.attr("data-id");

                        $.ajax({
                            url: 'job_delete.php',
                            type: 'POST',
                            data: {
                                id: productId
                            },
                            success: function (res) {

                                //  $('#resultreturn').prepend(res);
                                if (res) {
                                    toastr.success('招聘岗位已删除成功！', '删除招聘岗位')
                                    $that.closest("tr").remove();
                                } else {
                                    toastr.error('招聘岗位删除失败！', '删除招聘岗位')
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