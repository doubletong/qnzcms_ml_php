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
    $pagination->rowCount("SELECT id FROM documents WHERE   title LIKE '%$search%' OR description LIKE '%$search%' OR content LIKE '%$search%' ORDER BY  id DESC ");
    $pagination->config(6, 10);
    $sql = "SELECT a.id, a.title, a.thumbnail,a.importance, d.title as category,a.file_url,  a.file_size, a.description,
    a.active,  a.added_date FROM documents as a  Left JOIN dictionaries as d
    ON d.id = a.dictionary_id
        WHERE   a.title LIKE '%$search%' OR a.description LIKE '%$search%' OR a.content LIKE '%$search%'
        ORDER BY  a.importance DESC,a.id  LIMIT $pagination->start_row, $pagination->max_rows";
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
    $pagination->rowCount("SELECT id FROM `documents` ");
    $pagination->config(6,10);
    $sql = "SELECT a.id, a.title,  a.thumbnail,a.importance, d.title as category,a.file_url,  a.file_size, a.description,
    a.active,  a.added_date FROM documents as a Left JOIN dictionaries as d
    ON d.id = a.dictionary_id ORDER BY a.importance DESC, a.id  LIMIT $pagination->start_row, $pagination->max_rows";
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
    <title><?php echo "期刊管理_后台管理_".SITENAME;?></title>
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
                        <a href="document_add.php" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i>  添加期刊
                        </a>
                </div>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th>缩略图</th>
                    <th>标题</th>                               
                    <th>类别</th>  
                    <th>描述</th>  
                    <th>文件大小</th>             
                    <th>排序</th>
                    <th>发布日期</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($model as $row)
                {
                    echo "<tr>";
                ?>
                    <td>
                        <a href="<?php echo $row['file_url'];?>">
                        <img src="<?php echo $row['thumbnail'];?>" class="img-rounded" style="height:60px;"/>
                        </a>
                    </td>
                    <?php
                    echo "<td>".$row['title']."</td>";
                    echo "<td>".$row['category']."</td>";
                    echo "<td>".$row['description']."</td>";
                    echo "<td>".$row['file_size']."</td>";
                    echo "<td>".$row['importance']."</td>";
                    ?>
                    <td><?php echo date('Y-m-d',$row['added_date']) ;?></td>
                    <td><a href='document_edit.php?id=<?php echo $row['id'];?>' class='btn btn-primary btn-sm'>
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
        <?php require_once('includes/footer.php'); ?> 
            </section>
</div>
<?php require_once('includes/scripts.php'); ?> 

<script src="../js/vendor/toastr/toastr.min.js"></script>
<script src="../js/vendor/bootbox.js/bootbox.js"></script>
<script>
    $(document).ready(function () {
        //当前菜单
     
        $(".mainmenu>li:nth-of-type(17)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        

        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后文档将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var documentId = $that.attr("data-id");

                    $.ajax({
                        url : 'document_delete.php',
                        type : 'POST',
                        data : {id:documentId},
                        success : function(res) {

                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('文档已删除成功！', '删除文档')
                                $that.closest("tr").remove();
                            } else {
                                toastr.error('文档删除失败！', '删除文档')
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