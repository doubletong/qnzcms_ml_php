<?php
require_once('../../includes/common.php');
require_once('../../data/menu.php');

$did = 32;
$did2 = 40;
$menuModel = new TZGCMS\Admin\Menu();
$menus = $menuModel->fetch_all($did);
$menus2 = $menuModel->fetch_all($did2);


function has_children($rows, $id)
{
    foreach ($rows as $row) {
        if ($row['parent_id'] == $id)
            return true;
    }
    return false;
}

function build_menu($rows, $parent = 0)
{
    $result = "<ul>";
    foreach ($rows as $row) {
        if ($row['parent_id'] == $parent) {
            $result .= "<li><div class='row align-items-center'><div class='col'>{$row['title']}</div>
      <div class='col-auto'><a href='menu_edit.php?id={$row['id']}&did={$row['dictionary_id']}' class='btn btn-primary btn-sm'><i class='iconfont icon-edit'></i></a><button type='button' data-id='{$row['id']}' class='btn btn-danger btn-sm btn-delete'>
      <i class='iconfont icon-delete'></i></button></div></div>";

            if (has_children($rows, $row['id']))
                $result .= build_menu($rows, $row['id']);
            $result .= "</li>";
        }
    }
    $result .= "</ul>";

    return $result;
}


?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "栏目_组件_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>

    <style>
        ul li button {
            margin-left: .6rem;
        }

        ul li .row {
            border-bottom: 1px #ddd solid;
            padding-top: .8rem;
            padding-bottom: .8rem;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>

            <div class="container-fluid maincontent">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 style="margin:0;">主导航</h4>
                                    </div>
                                    <div class="col-auto">
                                        <a href="menu_edit.php?did=<?php echo $did; ?>" class="btn btn-primary">
                                            <i class="iconfont icon-plus"></i> 添加栏目
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php echo build_menu($menus); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 style="margin:0;">页底导航</h4>
                                    </div>
                                    <div class="col-auto">
                                        <a href="menu_add.php?did=<?php echo $did2; ?>" class="btn btn-primary">
                                            <i class="iconfont icon-plus"></i> 添加栏目
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php echo build_menu($menus2); ?>
                            </div>
                        </div>                  
                        
                    </div>
                </div>

            </div>
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>


    <script>
        $(document).ready(function() {
            //当前菜单
            $(".mainmenu>li.plugins").addClass("nav-open").find("ul>li.menus a").addClass("active");

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

                                var myobj = JSON.parse(res);                   
                         
                                if (myobj.status === 1) {
                                    toastr.success(myobj.message);  
                                    $that.closest("li").remove();                                   
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

                });

            });

        });
    </script>
</body>

</html>