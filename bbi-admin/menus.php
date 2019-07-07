<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/menu.php');

$did = 32;
$menuModel = new Menu();
$menus = $menuModel->fetch_all($did);

function has_children($rows,$id) {
    foreach ($rows as $row) {
      if ($row['parent_id'] == $id)
        return true;
    }
    return false;
}
function build_menu($rows,$parent=0)
{  
  $result = "<ul>";
  foreach ($rows as $row)
  {
    if ($row['parent_id'] == $parent){
      $result.= "<li><div class='row align-items-center'><div class='col'>{$row['title']}</div>
      <div class='col-auto'><a href='menu_edit.php?id={$row['id']}&did={$row['dictionary_id']}' class='btn btn-primary btn-sm'><i class='iconfont icon-edit'></i></a><button type='button' data-id='{$row['id']}' class='btn btn-danger btn-sm btn-delete'>
      <i class='iconfont icon-delete'></i></button></div></div>";

      if (has_children($rows,$row['id']))
        $result.= build_menu($rows,$row['id']);
      $result.= "</li>";
    }
  }
  $result.= "</ul>";

  return $result;
}


?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "栏目_组件_后台管理_" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>
    <link href="../js/vendor/toastr/toastr.min.css" rel="stylesheet" />
    <style>
        ul li button{
          margin-left: .6rem;
        }
        ul li .row{
            border-bottom: 1px #ddd solid;  padding-top: .8rem;
            padding-bottom: .8rem;
        }
</style>
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
    <div class="col-md-6">
        <div class="mb-2 text-right">
            <a href="menu_add.php?did=<?php echo $did; ?>" class="btn btn-primary">
                <i class="iconfont icon-plus"></i> 添加栏目
            </a>
        </div>
        <?php echo build_menu($menus); ?>
    </div>
</div>
            
                



            </div>
            <?php require_once('includes/footer.php'); ?>
        </section>
    </div>
    <?php require_once('includes/scripts.php'); ?>

    <script src="../js/vendor/toastr/toastr.min.js"></script>
    <script src="../js/vendor/bootbox.js/bootbox.js"></script>
    <script>
        $(document).ready(function() {
            //当前菜单
            if ("1" == <?php echo $did; ?>) {
                $(".mainmenu>li:nth-of-type(3)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
            }
            if ("2" == <?php echo $did; ?>) {
                $(".mainmenu>li:nth-of-type(4)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
            }
            if ("3" == <?php echo $did; ?>) {
                $(".mainmenu>li:nth-of-type(5)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
            }
            if ("6" == <?php echo $did; ?>) {
                $(".mainmenu>li:nth-of-type(7)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");
            }
            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function() {
                var $that = $(this);
                bootbox.confirm("删除后案例分类将无法恢复，您确定要删除吗？", function(result) {
                    if (result) {
                        var articleId = $that.attr("data-id");

                        $.ajax({
                            url: 'menu_delete.php',
                            type: 'POST',
                            data: {
                                id: articleId
                            },
                            success: function(res) {

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