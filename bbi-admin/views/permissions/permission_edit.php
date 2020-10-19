<?php
require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Permission;
use Models\Metadata;

if(!isset($_GET['gid'])){
    header('Location: /bbi-admin/permissions');
    exit;
}

$did = $_GET['gid'];
// $lang = $_GET['lang'];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Permission::find($id);

    $module = ModuleType::URL();
    $url = $data['url'];
    $metadata = Metadata::where('module_type',$module)->where('key_value',$url)->first();
}

$pageTitle = isset($_GET['id'])?"编辑":"创建";
$action = isset($_GET['id'])?"update":"create";

$perlist = Permission::with('children')->where('group_id',$did)->where('parent',0)->orderBy('importance', 'DESC')->get();

// function buildTree(array $elements, $parentId = 0) {
//     $branch = array();

//     foreach ($elements as $element) {
//         if ($element['parent'] == $parentId) {
//             $children = buildTree($elements, $element['id']);
//             if ($children) {
//                 $element['children'] = $children;
//             }         
//             $branch[] = $element;
//         }
//     }

//     return $branch;
// }

// $tree = $categories->count()>0 ? buildTree($categories) : null;



?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle."_组件_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
   

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
                                <li class="breadcrumb-item"><a href="/bbi-admin/views/roles/index.php">模块设置</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?></li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-md-auto">
                            <time id="sitetime"></time>
                        </div>
                    </div>
                </div> 

                <form novalidate="novalidate" id="editform">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $pageTitle;?>
                        </div>

                        <div class="card-body">
                            <input id="id" type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:0;?>" />
                            <input id="group_id" type="hidden" name="group_id" value="<?php echo $did; ?>" />
                            <input type="hidden" id="lang" name="lang" value="<?php echo $lang; ?>" />
                            <input type="hidden" id="action" name="action" value="<?php echo $action; ?>" />
                            <div class="row">
                                <div class="col">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="per_type" id="per_type1" value="1" <?php echo (isset($data["per_type"]) && 1==$data["per_type"])?"checked":"checked"; ?>>
                                            <label class="form-check-label" for="per_type1">链接</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="per_type" id="per_type2" value="2" <?php echo (isset($data["per_type"]) && 2==$data["per_type"])?"checked":""; ?>>
                                            <label class="form-check-label" for="per_type2">节点</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="per_type" id="per_type3" value="3" <?php echo (isset($data["per_type"]) && 3==$data["per_type"])?"checked":""; ?>>
                                            <label class="form-check-label" for="per_type3">操作</label>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="title">主题</label>
                                        <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($data['title'])?$data['title']:''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripiton">描述</label>
                                        <textarea name="description" id="description" class="form-control"  rows="3"><?php echo isset($data['description'])?$data['description']:''; ?></textarea>                                   
                                    </div>
                                    <div class="form-group">
                                        <label for="title">链接</label>
                                        <input type="text" class="form-control" id="url" name="url" value="<?php echo isset($data['url'])?$data['url']:''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">图标</label>
                                        <input type="text" class="form-control" id="icon" name="icon" value="<?php echo isset($data['icon'])?$data['icon']:''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="parent">父链接</label>                                     
                                        <select class="form-control" id="parent" name="parent" placeholder="" >
                                            <option value="0">--请选择父链接--</option>
                                            <?php foreach( $perlist as $model)
                                            {
                                               
                                                  if(isset($data['parent']) && $model["id"]=== $data["parent"]){
                                                ?>
                                                    <option value="<?php echo $model["id"]; ?>"  <?php echo $model["id"]==$data["parent"]?"selected":""; ?> ><?php echo $model["title"]; ?></option>

                                                  <?php } else{  ?>
                                                    <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?></option>

                                                <?php  }

                                                    if($model['children']){ 
                                                        foreach( $model['children'] as $subModel){
                                                            if(isset($data['parent']) && $subModel["id"]=== $data["parent"]){
                                                                ?>
                                                    <option value="<?php echo $subModel["id"]; ?>" <?php echo $subModel["id"]==$data["parent"]?"selected":""; ?> > - <?php echo $subModel["title"]; ?></option>

                                                <?php  } else{?>
                                                    <option value="<?php echo $subModel["id"]; ?>" > - <?php echo $subModel["title"]; ?></option>

                                                    <?php  }
                                                
                                            }
                                        
                                            } 
                                        }?>
                                                            
                                        </select>                          
                                    </div>

                              
                                    <div class="form-group">
                                        <label for="importance">排序</label>
                                        <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:0;?>" placeholder="值越大越排前">
                                    </div>


                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                                            <label class="form-check-label" for="chkActive">发布</label>
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
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>
    </div>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

    <script src="/assets/js/vendor/holderjs/holder.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>

    <script type="text/javascript">
    

        $(document).ready(function() {
            //当前菜单
            $("#module_nav>li:nth-of-type(2)").addClass("active").siblings().removeClass('active'); 
            $(".mainmenu>li.plugins").addClass("nav-open").find("ul>li.permissions a").addClass("active");
     

            $("#editform").validate({

                rules: {
                    title: {
                        required: true
                    },
                    importance: {
                        required: true,
                        digits: true
                    }


                },
                messages: {
                    title: {
                        required: "请输入主标题"
                    },
                    importance: {
                        required: "请输入序号",
                        digits: "请输入有效的整数"
                    }


                },

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
                

                    $.ajax({
                        url: 'permission_post.php',
                        type: 'POST',
                        data:  $(form).serialize(),
                        success: function(res) {
                            //  $('#resultreturn').prepend(res);
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