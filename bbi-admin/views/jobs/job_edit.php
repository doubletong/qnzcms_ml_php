<?php
require_once('../../includes/common.php');

use Models\Job;


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Job::find($id);    
}

$action = isset($_GET['id'])?"update":"create";
$pageTitle = isset($_GET['id']) ? "编辑" : "创建";

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pageTitle . "_岗位招聘_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>
    <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once('../../includes/nav.php'); ?>
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
                            <li class="breadcrumb-item"><a href="/bbi-admin/views/jobs/index.php">招聘岗位</a></li>
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
                            <?php echo $pageTitle . "岗位"; ?>
                        </div>
                        <div class="card-body">
                            <input id="id" type="hidden" name="id" value="<?php echo isset($data['id']) ? $data['id'] : 0; ?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />
                            <div class="form-group">
                                <label for="title">招聘岗位</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($data['title']) ? $data['title'] : ''; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="title">部门</label>
                                <input type="text" class="form-control" id="department" name="department" value="<?php echo isset($data['department']) ? $data['department'] : ''; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="title">城市</label>
                                <input type="text" class="form-control" id="city" name="city" value="<?php echo isset($data['city']) ? $data['city'] : ''; ?>" placeholder="">
                            </div>

                     

                            <div class="form-group">
                                <label for="population">招聘人数</label>
                                <input type="number" class="form-control" id="population" name="population" value="<?php echo isset($data['population']) ? $data['population'] : '1'; ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance']) ? $data['importance'] : '0'; ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="responsibilities">岗位描述</label>
                                <textarea class="form-control" id="responsibilities" name="responsibilities" placeholder=""><?php echo isset($data['responsibilities']) ? $data['responsibilities'] : ''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php';
                                    CKEDITOR.replace('responsibilities', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,
                                        allowedContent: true                       

                                    });
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="requirement">岗位要求</label>
                                <textarea class="form-control" id="requirement" name="requirement" placeholder=""><?php echo isset($data['requirement']) ? $data['requirement'] : ''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php';
                                    CKEDITOR.replace('requirement', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,
                                        allowedContent: true                       

                                    });
                                </script>
                            </div>
                            <div class="form-group">
                                <label for="intro">摘要</label>
                                <textarea class="form-control" id="summary" name="summary" placeholder=""><?php echo isset($data['summary'])?$data['summary']:''; ?></textarea>
                            
                            </div>    

                            <div class="form-group">
                                <label for="title">作者</label>
                                <input type="text" class="form-control" id="author" name="author" value="<?php echo isset($data['author'])?$data['author']:''; ?>">
                            </div>   

                            <div class="form-group">
                                <label for="pubdate">发布日期</label>
                                <input class="form-control" id="pubdate" name="pubdate" value="<?php echo isset($data['pubdate'])?date_format(date_create($data['pubdate']),"Y-m-d"):date("Y-m-d"); ?>" placeholder="" type="date" />
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active'] ? "checked" : "") : "checked"; ?> id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">发布</label>
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
            $(".mainmenu>li.jobs a").addClass("active");


            $("form").validate({

                rules: {
                    title: {
                        required: true,
                        maxlength: 150
                    },
                    city: {                    
                        maxlength: 100
                    },
                    department: {                    
                        maxlength: 150
                    },
                    author: {                    
                        maxlength: 50
                    },
                    summary: {                    
                        maxlength: 500
                    },
                    population: {
                        required: true,
                        digits: true
                    },
                    importance: {
                        required: true,
                        digits: true
                    }

                },
                messages: {
                    title: {
                        required: "请输入招聘岗位",
                        maxlength: "不能超过150个字符"
                    },
                    city: {                    
                        maxlength: "不能超过100个字符"
                    },
                    department: {                    
                        maxlength: "不能超过150个字符"
                    },
                    author: {                    
                        maxlength: "不能超过50个字符"
                    },
                    summary: {                    
                        maxlength: "不能超过500个字符"
                    },
                 
                    population: {
                        required: "请输入招聘人数",
                        digits: "请输入有效的整数"
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
                    //form.submit();
                    var values = {};
                    var fields = {};
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    $.each($(form).serializeArray(), function(i, field) {
                        values[field.name] = field.value;
                    });

                    $.ajax({
                        url: 'job_post.php',
                        type: 'POST',
                        data: values,
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