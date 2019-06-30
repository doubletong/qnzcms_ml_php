<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('data/menu.php');



$did = isset($_GET['did'])?$_GET['did']:"";


$cateModel = new Menu();
$categories = $cateModel->fetch_all($did);

function buildTree(array $elements, $parentId = 0) {
    $branch = array();

    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }         
            $branch[] = $element;
        }
    }

    return $branch;
}

$tree = buildTree($categories);


?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "创建栏目_栏目_组件_后台管理_" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

    <link href="../js/vendor/toastr/toastr.min.css" rel="stylesheet" />
  
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once('includes/header.php'); ?>

            <div class="container-fluid maincontent">

                <form novalidate="novalidate" id="editform">
                    <div class="card">
                        <div class="card-header">
                            创建栏目
                        </div>

                        <div class="card-body">
                            <input id="menu_id" type="hidden" name="menu_id" value="0" />
                            <input id="dictionary_id" type="hidden" name="dictionary_id" value="<?php echo $did; ?>" />
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="title">主题</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">链接</label>
                                        <input type="text" class="form-control" id="url" name="url" placeholder="">
                                    </div>
                                        <div class="form-group">
                                        <label for="parent_id">父路径</label>                                    
                                        <select class="form-control" id="parent_id" name="parent_id" placeholder="" >
                                            <option value="0">--请选择父路径--</option>
                                            <?php foreach( $tree as $model)
                                            {
                                                ?>
                                                <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?></option>

                                                <?php if($model['children']){ 
                                                 foreach( $model['children'] as $subModel){
                                                ?>
                                                     <option value="<?php echo $subModel["id"]; ?>"> - <?php echo $subModel["title"]; ?></option>

                                                <?php }
                                        }
                                        } ?>
                                                            
                                        </select>                          
                                        </div>   
                                        
                            

                                    <div class="form-group">
                                        <label for="importance">排序</label>
                                        <input type="number" class="form-control" id="importance" name="importance" value="0" placeholder="值越大越排前">
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" checked id="chkActive" name="active">
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
            <?php require_once('includes/footer.php'); ?>
        </section>

    </div>

    <?php require_once('includes/scripts.php'); ?>

    <script src="../js/vendor/holderjs/holder.min.js"></script>
    <script src="../js/vendor/toastr/toastr.min.js"></script>

    <script src="../js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>


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
                            if (res) {
                                toastr.success('栏目已添加成功！', '添加栏目')
                            } else {

                                toastr.error('栏目添加失败！', '添加栏目')
                            }
                        }
                    });

                }
            });
        });
    </script>

</body>

</html>