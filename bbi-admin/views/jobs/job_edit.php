<?php
require_once('../../includes/common.php');

use Models\Job;
use Models\Team;
use Models\Language;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Job::find($id);    
}

$action = isset($_GET['id'])?"update":"create";
$pageTitle = isset($_GET['id']) ? "编辑" : "创建";

$langs = Language::where('active',1)->orderby('importance','DESC')->get();
$teams = Team::where('active',1)->orderby('first_letter','DESC')->get();
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
                                <label for="lang">语言</label> 
                                <select class="form-control" id="lang" name="lang">
                                    <option value="">--请选择语言--</option>
                                    <?php foreach($langs as $item ) {                                     
                                        ?>                                  
                                        <option value="<?php echo $item->code;?>" <?php echo (isset($data['lang']) && $data["lang"]==$item->code)?"selected":""; ?>><?php echo $item->name; ?></option>
                                    <?php }  ?>                      
                                </select>                              
                            </div> 

                            
                            <div class="form-group">
                                <label for="parent_id">课题组</label> 
                                <select class="form-control" id="team_id" name="team_id">
                                    <option value="">--请选择课题组--</option>
                                    <?php foreach($teams as $item ) {                                     
                                        ?>                                  
                                        <option value="<?php echo $item->id;?>" <?php echo (isset($data['team_id']) && $data["team_id"]==$item->id)?"selected":""; ?>><?php echo $item->name; ?></option>
                                    <?php }  ?>                      
                                </select>                              
                            </div> 

                            <div class="form-group">
                                <label for="title">主题</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($data['title']) ? $data['title'] : ''; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="homepage">实验室主页</label>
                                <textarea class="form-control" id="homepage" name="homepage" placeholder=""><?php echo isset($data['homepage']) ? $data['homepage'] : ''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php';
                                    CKEDITOR.replace('homepage', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,
                                        allowedContent: true                       

                                    });
                                </script>
                            </div>
                           

                            <div class="form-group">
                                <label for="post">招聘岗位</label>
                                <input type="text" class="form-control" id="post" name="post" value="<?php echo isset($data['post']) ? $data['post'] : ''; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="population">招聘人数</label>
                                <input class="form-control" id="population" name="population" value="<?php echo isset($data['population']) ? $data['population'] : ''; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="education">学历要求</label>
                                <input class="form-control" id="education" name="education" value="<?php echo isset($data['education']) ? $data['education'] : ''; ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="requirement">招聘条件</label>
                                <textarea class="form-control" id="requirement" name="requirement" placeholder=""><?php echo isset($data['requirement']) ? $data['requirement'] : ''; ?></textarea>
                                <script>
                                   
                                    CKEDITOR.replace('requirement', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,
                                        allowedContent: true                  
                                        
                                    });
       
                                </script>
                            </div>       
                            
                            <div class="form-group">
                                <label for="research">研究方向</label>
                                <textarea class="form-control" id="research" name="research" placeholder=""><?php echo isset($data['research']) ? $data['research'] : ''; ?></textarea>
                                <script>
                                 
                                    CKEDITOR.replace('research', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,
                                        allowedContent: true                       

                                    });
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="address">工作地址</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($data['address']) ? $data['address'] : ''; ?>" placeholder="">
                            </div>   
                           
                            <div class="form-group">
                                <label for="other">其它说明</label>
                                <textarea class="form-control" id="other" name="other" placeholder=""><?php echo isset($data['other'])?$data['other']:''; ?></textarea>
                            </div>   

                            <div class="form-group">
                                <label for="application">申请方式</label>
                                <textarea class="form-control" id="application" name="application" placeholder=""><?php echo isset($data['application'])?$data['application']:''; ?></textarea>
                            </div>   
                          
                    
                            <div class="form-group">
                                <label for="intro">脑所简介</label>
                                <textarea class="form-control" id="intro" name="intro" placeholder=""><?php echo isset($data['intro']) ? $data['intro'] : ''; ?></textarea>
                                <script>
                                
                                    CKEDITOR.replace('intro', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,
                                        allowedContent: true                       

                                    });
                                </script>
                            </div>

                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance']) ? $data['importance'] : '0'; ?>" placeholder="">
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
                    lang: {
                        required: true                   
                    },
                    title: {
                        required: true,
                        maxlength: 150
                    },
                    address: {                    
                        maxlength: 150
                    },
                    homepage: {                    
                        maxlength: 500
                    },
                    post: {  
                        required: true,                  
                        maxlength: 150
                    },
                    education: {                    
                        maxlength: 150
                    },
                    research: {                    
                        maxlength: 500
                    },
                    other: {                    
                        maxlength: 500
                    },
                    application: {                    
                        maxlength: 500
                    },
                    population: {
                        maxlength: 100
                    },
             
                    importance: {
                        required: true,
                        digits: true
                    }

                },
                messages: {
                    lang: {
                        required:"请选择语言",        
                    },
                    title: {
                        required: "请输入招聘主题",
                        maxlength: "不能超过150个字符"
                    },
                    address: {                    
                        maxlength:"不能超过150个字符"
                    },
                    homepage: {                    
                        maxlength: "不能超过500个字符"
                    },
                    post: {      
                        required: "请输入招聘岗位",              
                        maxlength: "不能超过150个字符"
                    },
                    education: {                    
                        maxlength:"不能超过150个字符"
                    },
                    research: {                    
                        maxlength: "不能超过500个字符"
                    },
                    other: {                    
                        maxlength: "不能超过500个字符"
                    },
                    application: {                    
                        maxlength:"不能超过500个字符"
                    },
                    population: {
                        maxlength:"不能超过100个字符"
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