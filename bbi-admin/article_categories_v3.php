<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('../includes/PDO_Pagination.php');
require_once('data/article.php');

$pagination = new PDO_Pagination(db::getInstance());

$did = isset($_GET['did'])?$_GET['did']:"";

$articleClass = new Article();
$pageConfig = $articleClass->get_section_title($did);

$search = null;
if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
{
    $search = htmlspecialchars($_REQUEST["search"]);
    $pagination->param = "&search=$search";
    $pagination->rowCount("SELECT id FROM `article_categories` WHERE dictionary_id = $did and title LIKE '%$search%' ");
    $pagination->config(6, 10);
    $sql = "SELECT * FROM `article_categories` WHERE dictionary_id = $did title LIKE '%$search%'  ORDER BY  added_date DESC  LIMIT $pagination->start_row, $pagination->max_rows";
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
    $pagination->rowCount("SELECT id FROM `article_categories`  WHERE dictionary_id = $did");
    $pagination->config(6,10);
    $sql = "SELECT * FROM `article_categories`  WHERE dictionary_id = $did ORDER BY added_date DESC  LIMIT $pagination->start_row, $pagination->max_rows";
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
    <title><?php echo $pageConfig['category']."_".$pageConfig['section']."_后台管理_".SITENAME;?></title>
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
                    <a href="article_category_add.php?did=<?php echo $did;?>" class="btn btn-primary">
               
                        <i class="iconfont icon-plus"></i>  添加<?php echo $pageConfig['category']; ?>                          
               
                       
                    </a>
                </div>
            </div>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                <tr>
                <?php if($did=="16"){ ?>
                    <th>图片</th>                                           
                <?php }else{ ?>
                    <th>图标</th>
                <?php } ?>
                    <th>标题</th>
                    <th>排序</th>
                    <th>创建时间</th>
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
                        <?php if(!empty($row['thumbnail'])){ ?> 
                            <img src="<?php echo $row['thumbnail'] ;?>" alt="<?php echo $row['title'] ;?>" style="max-height:50px;display:block;">
                        <?php } ?>
                </td> 
                    <td><?php echo $row['title'] ;?></td> 
                    <td><?php echo $row['importance'] ;?></td>         
                    <td><?php echo date("Y-m-d H:i",$row['added_date']);?></td>
                   
                    <td><a href='article_category_edit.php?id=<?php echo $row['id'];?>&did=<?php echo $did;?>' class='btn btn-primary btn-sm'>
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
     
        
            $(".mainmenu>li.medialist").addClass("nav-open").find("ul>li.category a").addClass("active");
     
        //确认框默认语言
        bootbox.setDefaults({
            locale: "zh_CN"
        });

        $(".btn-delete").click(function(){
            var $that = $(this);
            bootbox.confirm("删除后案例分类将无法恢复，您确定要删除吗？", function (result) {
                if (result) {
                    var articleId = $that.attr("data-id");

                    $.ajax({
                        url : 'article_category_delete.php',
                        type : 'POST',
                        data : {id:articleId},
                        success : function(res) {

                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                toastr.success('分类已删除成功！', '删除分类')
                                $that.closest("tr").remove();
                            } else {
                                toastr.error('分类删除失败！', '删除分类')
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