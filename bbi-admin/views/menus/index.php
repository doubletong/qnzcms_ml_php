<?php
require_once('../../includes/common.php');


$group_id = 1;
$group_id2 = 2;


use Models\Menu;
$menus = Menu::with('children')->where('group_id',$group_id)->orderBy('importance', 'DESC')->get();
$menus2 = Menu::with('children')->where('group_id',$group_id2)->orderBy('importance', 'DESC')->get();




function build_menu($rows, $parent = 0)
{
    $result = "<ul>";
    foreach ($rows as $row) {
        if ($row['parent'] == $parent) {
            $result .= "<li><div class='row align-items-center'><div class='col'>";
            if($row['active']==1){
                $result .= $row['title'];
            }else{
                $result .= "<del>{$row['title']}</del>";
            }
            
            
            $result .= "</div>";
           
           if($row['active']==1){
            $result .= "<button type='button' data-id='{$row['id']}' class='btn btn-warning btn-sm btn-active' title='隐藏'>
                    <i class='iconfont icon-eye-close'></i>
                </button>";
           }else{ 
            $result .= "<button type='button' data-id='{$row['id']}' class='btn btn-info btn-sm btn-active' title='显示'>
                    <i class='iconfont icon-eye'></i>
                </button>";
           } 

            $result .= "<div class='col-auto'>
      <a href='menu_edit.php?id={$row['id']}&gid={$row['group_id']}' class='btn btn-primary btn-sm'><i class='iconfont icon-edit'></i></a>
      <button type='button' data-id='{$row['id']}' class='btn btn-danger btn-sm btn-delete'>
      <i class='iconfont icon-delete'></i></button></div></div>";

            if (isset($row['children'])){
                $result .= build_menu($rows, $row['id']);
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
                          
                            <li class="breadcrumb-item active" aria-current="page">栏目</li>
                        </ol>
                    </nav>
                    </div>
                    <div class="col-md-auto">
                        <time id="sitetime"></time>
                    </div>
                </div>
            </div> 

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 style="margin:0;">主导航</h4>
                                    </div>
                                    <div class="col-auto">
                                        <a href="menu_edit.php?gid=<?php echo $group_id; ?>" class="btn btn-primary">
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
                                        <a href="menu_edit.php?gid=<?php echo $group_id2; ?>" class="btn btn-primary">
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
            $("#module_nav>li:nth-of-type(2)").addClass("active").siblings().removeClass('active'); 
            $(".mainmenu>li.menus a").addClass("active");

            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-active").click(function(){
            var $that = $(this);           
            var id = $that.attr("data-id");

            $.ajax({
                url : 'menu_post.php',
                type : 'POST',
                data : {id:id,action:"active"},
                success : function(res) {                                                   
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
                            url: 'menu_post.php',
                            type: 'POST',
                            data: {
                                id: articleId,
                                action:"delete"
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