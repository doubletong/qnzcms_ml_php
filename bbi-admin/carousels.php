<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('includes/output.php');
require_once('data/product.php');
require_once('../includes/PDO_Pagination.php');

$pagination = new PDO_Pagination(db::getInstance());

$search = null;
if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
{
    $search = htmlspecialchars($_REQUEST["search"]);
    $pagination->param = "&search=$search";
    $pagination->rowCount("SELECT * FROM wp_carousels WHERE title LIKE '%$search%' OR description LIKE '%$search%'  ORDER BY importance, id DESC ");
    $pagination->config(3, 5);
    $sql = "SELECT * FROM wp_carousels WHERE title LIKE '%$search%' OR description LIKE '%$search%'  ORDER BY importance, id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
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
    $pagination->rowCount("SELECT * FROM wp_carousels");
    $pagination->config(6,15);
    $sql = "SELECT * FROM wp_carousels ORDER BY importance, id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query =db::getInstance()->prepare($sql);
    $query->execute();
    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }
}

do_html_doctype("轮播图_组件_后台管理".SITENAME);
?>
<link href="assets/css/toastr.min.css" rel="stylesheet" />

<?php
do_html_header();

?>
<div class="toolbar">
    <a href="#" class="showmenu"><i class="fa fa-bars"></i></a>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home fa-fw"></i> 控制面板</a></li>
        <li class="active">轮播图管理</li>

    </ol>
</div>
<div class="main-content">
    <div class="well well-sm">
        <a href="carousel_add.php" class="btn btn-primary pull-right">
            <span class="glyphicon glyphicon-plus"></span>  添加轮播图
        </a>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>" class="form-inline">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Search for..." value="<?php echo $search ?>">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit">搜索</button>
                      </span>
            </div><!-- /input-group -->
        </form>

    </div>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>缩略图</th>
            <th>主题</th>
            <th>链接</th>
            <th>发布者</th>
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
            <td><img src="<?php echo $row['image_url'];?>" class="img-rounded" style="height:35px;"/></td>
            <?php

            echo "<td>".$row['title']."</td>";
            echo "<td>".$row['link']."</td>";
            ?>
            <td><?php echo $row['added_by'];?></td>
            <td><?php echo $row['added_date'];?></td>
            <td><a href='carousel_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-xs'>
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <button type="button" data-id="<?php echo $row['id'];?>" class='btn btn-danger btn-xs btn-delete'>
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </td>
            <?php

            echo "</tr>";
        }
        ?>
        </tbody>
    </table>


    <nav>
        <ul class="pagination">
            <?php
            $pagination->pages("btn");
            ?>
        </ul>
    </nav>
</div>



</div>

<?php
do_html_footer();
?>
<script src="assets/js/toastr.min.js"></script>
<script src="assets/js/bootbox.js"></script>
<script>
    $(document).ready(function () {
        //当前菜单
        $(".mainmenu li.liitem:nth-of-type(6)").addClass("nav-open").find("ul li:nth-of-type(1) a").addClass("active");
        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后轮播图将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var productId = $that.attr("data-id");

                    $.ajax({
                        url : 'carousel_delete.php',
                        type : 'POST',
                        data : {id:productId},
                        success : function(res) {

                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('轮播图已删除成功！', '删除轮播图')
                                $that.closest("tr").remove();
                            } else {
                                toastr.error('轮播图删除失败！', '删除轮播图')
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