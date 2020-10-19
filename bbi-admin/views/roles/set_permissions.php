<?php
require_once('../../includes/common.php');

use Models\Role;
use Models\Permission;
use Models\PermissionRole;

if (!isset($_GET['id'])) {
    header('Location: /bbi-admin/roles/index.php');
    exit;  
}

$gid1 = 1;  
$gid2 = 2;
$gid3 = 3;

$permlist1 = Permission::with('children')->where('group_id', $gid1)->orderBy('importance', 'DESC')->get();
$permlist2 = Permission::with('children')->where('group_id', $gid2)->orderBy('importance', 'DESC')->get();
$permlist3 = Permission::with('children')->where('group_id', $gid3)->orderBy('importance', 'DESC')->get();


function build_permission($per_ids,$rows, $parent = 0)
{
    $result = "<ul class='perlist'>";
    foreach ($rows as $row) {
        
        //$precount = $per_ids->where('permission_id',$row['id'])->count();
        $isCheck = in_array(['permission_id'=>$row['id']] , $per_ids) ? 'checked' :'';

        if ($row['parent'] == $parent) {
            $result .= "<li><input type='checkbox' name='per_id[]' value='".$row['id']."' ".$isCheck." /> ";
            $result .= isset($row['icon'])?"<i class='iconfont ".$row['icon']."'></i>":"";
            if ($row['active'] == 1) {
                $result .= $row['title'];
            } else {
                $result .= "<del>{$row['title']}</del>";
            }

            if (isset($row['children'])) {
                $result .= build_permission($per_ids, $rows, $row['id']);
            }

            $result .= "</li>";
        }
    }
    $result .= "</ul>";

    return $result;
}


$id = $_GET['id'];
$data = Role::find($id);    

$per_ids = PermissionRole::where('role_id',$id)->pluck('permission_id');
// print_r($per_ids); ->exists()

$action = "setPermissions";
$pageTitle = "设置权限";




?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle . "_角色_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>
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
                height:14px;
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
     
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('../../includes/nav_system.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('../../includes/header.php'); ?>

            <div class="main-content"> 
                <div class="breadcrumb-container">
                    <div class="row">
                        <div class="col-md">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                                <li class="breadcrumb-item"><a href="/bbi-admin/views/roles/index.php">角色</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?></li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-md-auto">
                            <time id="sitetime"></time>
                        </div>
                    </div>
                </div> 

                <form novalidate="novalidate">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $pageTitle; ?>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                角色：<?php echo $data['name']; ?>
                            </div>
                            <input id="id" type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />
                            
                            <div class="row">
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-header">                                                                                            
                                            <h5 style="margin:0;" class="float-right">内容</h5>
                                            <input type="checkbox" class="selectAll" id="selectAll01"> <label for="selectAll01" style="margin:0;">全选</label>                                              
                                        </div>
                                        <div class="card-body">
                                            <?php echo build_permission($per_ids,$permlist1); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-header">       
                                            <h5 style="margin:0;" class="float-right">系统</h5>
                                            <input type="checkbox" class="selectAll" id="selectAll02"> <label for="selectAll02" style="margin:0;">全选</label>                                     
                                                                            
                                        </div>
                                        <div class="card-body">
                                            <?php echo build_permission($per_ids,$permlist2); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 style="margin:0;" class="float-right">模板</h5>
                                            <input type="checkbox" class="selectAll" id="selectAll03"> <label for="selectAll03" style="margin:0;">全选</label>                                     
                                                                                           
                                        </div>
                                        <div class="card-body">
                                            <?php echo build_permission($per_ids,$permlist3); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           

                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary"><i class="iconfont icon-save"></i> 保存</button>
                            <a href="JavaScript:window.history.back()" class="btn btn-outline-secondary"><i class="iconfont icon-left"></i> 返回</a>

                        </div>
                    </div>
                </form>
            </div>
            <?php require_once('../../includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once('../../includes/scripts.php'); ?>

    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
 
    <script type="text/javascript">

    
        $(document).ready(function() {
            //当前菜单
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');
            $(".mainmenu>li.security").addClass("nav-open").find("ul>li.roles a").addClass("active");

            $(".selectAll").click(function(e){
                var el = $(this).closest('.card');
                if(this.checked) {
                    // Iterate each checkbox
                    el.find(':checkbox').each(function() {
                        this.checked = true;
                    });
                }
                else {
                    el.find(':checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });

            $("li input:checkbox").click(function(e){
                var el = $(this).closest('li');
                if(this.checked) {
                    // Iterate each checkbox
                    el.find(':checkbox').each(function() {
                        this.checked = true;
                    });
                }
                else {
                    el.find(':checkbox').each(function() {
                        this.checked = false;
                    });
                }
            });


            $("form").validate({

                // rules: {
                //     title: {
                //         required: true
                //     },                 
                //     importance: {
                //         required: true,
                //         digits: true
                //     }

                // },
                // messages: {
                //     title: {
                //         required: "请输入招聘岗位"
                //     },                 
             
                //     importance: {
                //         required: "请输入序号",
                //         digits: "请输入有效的整数"
                //     }

                // },

                errorClass: "invalid-feedback",
                errorElement: "div",
                highlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-valid');
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                    $(element).addClass('is-valid');
                },
                submitHandler: function(form) {
                    //form.submit();
                    // var values = {};
                    // var fields = {};
                    // for (var instanceName in CKEDITOR.instances) {
                    //     CKEDITOR.instances[instanceName].updateElement();
                    // }

                    // $.each($(form).serializeArray(), function(i, field) {
                    //     values[field.name] = field.value;
                    // });

                    $.ajax({
                        url: 'role_post.php',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(res) {
                            var myobj = JSON.parse(res);
                            //console.log(myobj.status);
                            if (myobj.status === 1) {
                                toastr.success(myobj.message);
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
    </script>

</body>

</html>