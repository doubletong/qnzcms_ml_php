<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('../includes/PDO_Pagination.php');

$pagination = new PDO_Pagination(db::getInstance());

$did = isset($_GET['did'])?$_GET['did']:"";

$search = null;
if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
{
    $search = htmlspecialchars($_REQUEST["search"]);
    $pagination->param = "&search=$search&did=$did";
    $pagination->rowCount("SELECT id FROM wp_articles WHERE  dictionary_id = $did AND (title LIKE '%$search%' OR description LIKE '%$search%' OR content LIKE '%$search%') ORDER BY  id DESC ");
    $pagination->config(6, 10);
    $sql = "SELECT a.id, a.title, c.title as category_title,a.dictionary_id, a.thumbnail,a.view_count, 
    a.active, a.pubdate, a.added_by FROM wp_articles as a Left JOIN article_categories as c 
    ON c.id = a.categoryId
        WHERE  a.dictionary_id = $did AND (a.title LIKE '%$search%' OR a.description LIKE '%$search%' OR a.content LIKE '%$search%')
        ORDER BY  a.id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
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
    $pagination->param = "&did=$did";
    $pagination->rowCount("SELECT id FROM `wp_articles` WHERE dictionary_id = $did");
    $pagination->config(6,10);
    
    $sql = "SELECT a.id, a.title, c.title as category_title,a.dictionary_id, a.thumbnail,a.view_count, 
    a.active, a.pubdate, a.added_by FROM wp_articles as a Left JOIN article_categories as c 
    ON c.id = a.categoryId  WHERE  a.dictionary_id = $did ORDER BY a.id DESC  LIMIT $pagination->start_row, $pagination->max_rows";
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
    <title><?php echo "文章_后台管理_".SITENAME;?></title>
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
                        <a href="news_add.php?did=<?php echo $did;?>" class="btn btn-primary">
                            <i class="iconfont icon-plus"></i>  添加文章
                        </a>
                </div>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                    <th>缩略图</th>
                    <th>标题</th>
                    <?php if($did=="1"||$did=="2"){ ?>
                    <th>分类</th>
                    <?php } ?>
                    <th>显示</th>
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
                    <td><img src="<?php echo $row['thumbnail'];?>" class="img-rounded" style="height:35px;"/></td>
                    <?php
                    echo "<td>".$row['title']."</td>";
                   if($did=="1"||$did=="2"){
                    echo "<td>".$row['category_title']."</td>";
                   }
                    echo "<td>".$row['view_count']."</td>";
                    ?>
                    <td><?php echo date('Y-m-d',$row['pubdate']) ;?></td>
                    <td><a href='news_edit.php?id=<?php echo $row['id'];?>&did=<?php echo $row['dictionary_id'];?>' class='btn btn-primary btn-sm'>
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
     
        if("1"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(3)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("2"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(4)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("3"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(5)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("4"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(6)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }
        if("5"==<?php echo $did; ?>){
            $(".mainmenu>li:nth-of-type(7)").addClass("nav-open").find("ul>li:nth-of-type(1) a").addClass("active");
        }


        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后新闻将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var articleId = $that.attr("data-id");

                    $.ajax({
                        url : 'news_delete.php',
                        type : 'POST',
                        data : {id:articleId},
                        success : function(res) {

                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('新闻已删除成功！', '删除新闻')
                                $that.closest("tr").remove();
                            } else {
                                toastr.error('新闻删除失败！', '删除新闻')
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