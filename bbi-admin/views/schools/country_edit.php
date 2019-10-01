<?php
require_once('../../includes/common.php');
require_once('../../data/country.php');
require_once('../../data/dictionary.php');



$cateModel = new TZGCMS\Admin\Country();

$did = isset($_GET['did']) ? $_GET['did'] : "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $cateModel->fetch_data($id);
}

$pageTitle = isset($_GET['id'])?"编辑国家":"创建国家";


?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "编辑_院校管理_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>


<link href="/assets/js/vendor/select2/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
<div class="wrapper">
    <!-- nav start -->
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
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
                            <input id="categoryId" type="hidden" name="categoryId" value="<?php echo isset($data['id'])?$data['id']:0;?>" />
                  
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="name">名称</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($data['name'])?$data['name']:''; ?>">
                                    </div>

                              
                                
                                    <div class="form-group">
                                        <label for="importance">排序</label>
                                        <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:'0'; ?>" placeholder="值越大越排前">
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                                            <label class="form-check-label" for="chkActive">发布</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-auto">
                               


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
    <script src="/assets/js/vendor/select2/dist/js/select2.min.js"></script>
    <script src="/assets/js/vendor/select2/dist/js/i18n/zh-CN.js"></script>

    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>

    <script type="text/javascript">
       

        $(document).ready(function() {
            //当前菜单                
            $(".mainmenu>li.majors").addClass("nav-open").find("ul>li.category a").addClass("active");
        

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
                        url: 'country_post.php',
                        type: 'POST',
                        data:  $(form).serialize(),
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