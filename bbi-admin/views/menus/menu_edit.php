<?php
require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Utils/Enum.php');

use Models\Menu;
use Models\Metadata;

$did = isset($_GET['gid']) ? $_GET['gid'] : "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Menu::find($id);

    $module = ModuleType::URL();
    $url = $data['url'];
    $metadata = Metadata::where('module_type',$module)->where('key_value',$url)->first();
}

$pageTitle = isset($_GET['id'])?"编辑栏目":"创建栏目";
$action = isset($_GET['id'])?"update":"create";

$menus = Menu::with('children')->where('group_id',$did)->where('parent',0)->orderBy('importance', 'DESC')->get();

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

            <div class="container-fluid maincontent">

                <form novalidate="novalidate" id="editform">
                    <div class="card">
                        <div class="card-header">
                            <?php echo $pageTitle;?>
                        </div>

                        <div class="card-body">
                            <input id="id" type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:0;?>" />
                            <input id="group_id" type="hidden" name="group_id" value="<?php echo $did; ?>" />
                            <input type="hidden" id="action" name="action" value="<?php echo $action; ?>" />
                            <div class="row">
                                <div class="col">
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
                                            <?php foreach( $menus as $model)
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
                                            <input type="checkbox" class="form-check-input" <?php echo isset($data['new_window']) ? ($data['new_window']?"checked":"") : ""; ?> id="chkActive" name="new_window">
                                            <label class="form-check-label" for="chkActive">新窗口打开</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                                            <label class="form-check-label" for="chkActive">发布</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">                                   
                                    <div class="card" style="width:300px;">
                                        <div class="card-header">SEO</div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title">SEO标题</label>
                                                <input type="text" class="form-control" id="seotitle" name="seotitle" placeholder="" value="<?php echo isset($metadata['title'])?$metadata['title']:''; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="description">SEO描述</label>
                                                <textarea class="form-control" id="seodescription" name="seodescription" rows="6" placeholder=""><?php echo isset($metadata['description'])?$metadata['description']:''; ?></textarea>

                                            </div>
                                            <div class="form-group">
                                                <label for="keywords">关键字</label>

                                                <input type="text" class="form-control" id="seokeywords" name="seokeywords" placeholder="" value="<?php echo isset($metadata['keywords'])?$metadata['keywords']:'';  ?>">

                                            </div>
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
           
            $(".mainmenu>li.plugins").addClass("nav-open").find("ul>li.menus a").addClass("active");
     

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
                        url: 'menu_post.php',
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