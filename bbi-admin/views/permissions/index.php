<?php
require_once('../../includes/common.php');

$gid1 = 1;  
$gid2 = 2;
$gid3 = 3;

use Models\Permission;
use Models\Language;

//$langs = Language::where('active', 1)->orderby('importance', 'DESC')->get();
//$defaultLang = $langs->where('default', 1)->first();
//$lang = isset($_GET['lang']) ? $_GET['lang'] : $defaultLang->code;

$perlist1 = Permission::with('children')->where('group_id', $gid1)->orderBy('importance', 'DESC')->get();
$perlist2 = Permission::with('children')->where('group_id', $gid2)->orderBy('importance', 'DESC')->get();
$perlist3 = Permission::with('children')->where('group_id', $gid3)->orderBy('importance', 'DESC')->get();



function build_permission($rows, $parent = 0)
{
    $result = "<ul class='perlist'>";
    foreach ($rows as $row) {
        if ($row['parent'] == $parent) {
            $result .= "<li><div class='row align-items-center'><div class='col'>";
            $result .= isset($row['icon'])?"<i class='iconfont ".$row['icon']."'></i>":"";
            if ($row['active'] == 1) {
                $result .= $row['title'];
            } else {
                $result .= "<del>{$row['title']}</del>";
            }

            $result .= "</div><div class='btn-group btn-group-sm' role='group' aria-label='操作'>";

            if ($row['active'] == 1) {
                $result .= "<button type='button' data-id='{$row['id']}' class='btn btn-warning btn-sm btn-active' title='隐藏'>
                    <i class='iconfont icon-eye-close'></i>
                </button>";
            } else {
                $result .= "<button type='button' data-id='{$row['id']}' class='btn btn-info btn-sm btn-active' title='显示'>
                    <i class='iconfont icon-eye'></i>
                </button>";
            }

            $result .= "
      <a href='permission_edit.php?id={$row['id']}&gid={$row['group_id']}' class='btn btn-primary btn-sm'><i class='iconfont icon-edit'></i></a>
      <button type='button' data-id='{$row['id']}' class='btn btn-danger btn-sm btn-delete'>
      <i class='iconfont icon-delete'></i></button></div></div>";

            if (isset($row['children'])) {
                $result .= build_permission($rows, $row['id']);
            }

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
    <title><?php echo "模块设置_系统_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>

    <style>
        ul.perlist{
            list-style:none;
            margin:0;
            padding:0;
        }
        ul.perlist li>ul.perlist{           
           
        }
        ul.perlist li>ul.perlist li{           
            position: relative;
            padding-left:2.5rem;           
            
        }
        ul.perlist li ul.perlist li::before{
                left:1.5rem;
                top:0;
                width:16px;
                height:24px;
                border-left:1px #ddd solid;
                border-bottom:1px #ddd solid;
                display:block;
                z-index:100;
                content:" ";
                position: absolute;
            }
        ul.perlist li .col>i{
            margin-right:.4rem;
            color:#ccc;
        }
     
        ul.perlist li .btn-group{
            margin-right:15px;
        }

        .btn-group-sm>.btn{
            padding:0 .3rem !important;
        }
        
        ul li .row {
        
            padding-top: .3rem;
            padding-bottom: .3rem;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav_system.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>

            <div class="main-content">
                <div class="breadcrumb-container">
                    <div class="row">
                        <div class="col-md">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                                    <li class="breadcrumb-item"><a href="#">系统安全</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">模块设置</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-md-auto">
                            <time id="sitetime"></time>
                        </div>
                    </div>
                </div>
                <!--
                <div class="mb-3 text-center">
                    <form method="GET" action="<?php echo $_SERVER["PHP_SELF"] ?>">
                        <div class="form-row align-items-center">

                            <div class="col-auto">
                                <label class="sr-only" for="lang">语言</label>
                                <select class="form-control" id="lang" name="lang">
                                    <option value="">--请选择语言--</option>
                                    <?php foreach ($langs as $item) {

                                    ?>
                                        <option value="<?php echo $item->code; ?>" <?php echo (isset($lang) && $lang == $item->code) ? "selected" : ""; ?>><?php echo $item->name; ?></option>

                                    <?php }  ?>
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">搜索</button>
                            </div>
                        </div>
                    </form>
                </div>
                -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 style="margin:0;">内容</h4>
                                    </div>
                                    <div class="col-auto">
                                        <a href="permission_edit.php?gid=<?php echo $gid1; ?>" class="btn btn-primary btn-sm">
                                            <i class="iconfont icon-plus"></i> 添加
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php echo build_permission($perlist1); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 style="margin:0;">系统</h4>
                                    </div>
                                    <div class="col-auto">
                                        <a href="permission_edit.php?gid=<?php echo $gid2; ?>" class="btn btn-primary  btn-sm">
                                            <i class="iconfont icon-plus"></i> 添加
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php echo build_permission($perlist2); ?>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 style="margin:0;">模板</h4>
                                    </div>
                                    <div class="col-auto">
                                        <a href="permission_edit.php?gid=<?php echo $gid3; ?>" class="btn btn-primary  btn-sm">
                                            <i class="iconfont icon-plus"></i> 添加
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php echo build_permission($perlist3); ?>
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
            $("#module_nav>li:nth-of-type(2)").addClass("active").siblings().removeClass('active');
            $(".mainmenu>li.security").addClass("nav-open").find("ul>li.permissions a").addClass("active");

            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-active").click(function() {
                var $that = $(this);
                var id = $that.attr("data-id");

                $.ajax({
                    url: 'permission_post.php',
                    type: 'POST',
                    data: {
                        id: id,
                        action: "active"
                    },
                    success: function(res) {
                        var myobj = JSON.parse(res);
                        //console.log(myobj.status);
                        if (myobj.status === 1) {
                            // toastr.success(myobj.message);                                
                            location.reload();
                        }
                        if (myobj.status === 2) {
                            toastr.error(myobj.message)
                        }
                        if (myobj.status === 3) {
                            toastr.info(myobj.message)
                        }
                    }
                });

            });

            $(".btn-delete").click(function() {
                var $that = $(this);
                bootbox.confirm("删除后将无法恢复，您确定要删除吗？", function(result) {
                    if (result) {
                        var articleId = $that.attr("data-id");

                        $.ajax({
                            url: 'permission_post.php',
                            type: 'POST',
                            data: {
                                id: articleId,
                                action: "delete"
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