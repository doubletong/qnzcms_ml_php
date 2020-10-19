<?php
use Models\NewsCategory;
use Models\News;
use Models\Language;
use Models\Team;

require_once('../../includes/common.php');

$pagetitle = isset($_GET['id'])?"编辑文章":"创建文章";
$action = isset($_GET['id'])?"update":"create";

$authors = [];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = News::find($id);
    //$data = $cateModel->fetch_data($id);
    $authors = explode('|', $data->author_ext);
    // $imageUrl = explode('|', $data['image_url']);
}


$categories = NewsCategory::with("children")->where(["parent" => null])->orderby('importance','desc')->get();
$langs = Language::where('active',1)->orderby('importance','DESC')->get();

$level = 0;
function recursive($items, $level, $parent){
    $level++;
    foreach ($items as $row) {
        $titles = json_decode($row['title'],true);
        $select = (isset($parent) && $row["id"]==$parent)?"selected":"";
        echo '<option value="'.$row["id"].'"  '.$select.' >';
        for($i=1;$i<$level;$i++){
            echo "—";
        }
        echo $titles["zh-CN"].'</option>';                   
        $children = $row['children'];          
        if(!empty($children)){
            //Call the function again. Increment number by one.
            recursive($children,$level,$parent);
        }
   
    }
}
 
$teams = Team::all();

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $pagetitle."_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    <link rel="stylesheet" href="/assets/js/vendor/select2/dist/css/select2.min.css">
    <script src="/assets/js/vendor/ckeditor/ckeditor.js"></script>
    <style>
        .img_max{
            object-fit: contain;
            width:100px;
            height:100px;
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
            <div class="main-content">         
                <div class="breadcrumb-container">
                    <div class="row">
                    <div class="col-md">
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/bbi-admin">控制面板</a></li>
                            <li class="breadcrumb-item"><a href="/bbi-admin/views/news/index.php">文章</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $pagetitle; ?></li>
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
                            <?php echo $pagetitle;?>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />
                            <div class="row">
                                <div class="col-md">

                                <div class="form-group">
                                    <label for="parent_id">语言</label> 
                                    <select class="form-control" id="lang" name="lang">
                                        <option value="">--请选择语言--</option>
                                        <?php foreach($langs as $item ) {
                                        
                                            ?>                                  
                                            <option value="<?php echo $item->code;?>" <?php echo (isset($data['lang']) && $data["lang"]==$item->code)?"selected":""; ?>><?php echo $item->name; ?></option>

                                        <?php }  ?>
                                    </select>
                                </div>    

                            <div class="form-group">
                                <label for="title">主题</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($data['title'])?$data['title']:''; ?>">
                            </div>   

                            <div class="form-group">
                                <label for="parent_id">分类</label> 
                                <select class="form-control" id="category_id" name="category_id" placeholder="" >
                                    <option value="">--请选择父类--</option>
                                    <?php recursive($categories, $level, $data['category_id']); ?>                                                    
                                </select>                              
                            </div>    
                            

                            <div class="form-group">
                                <label for="intro">内容</label>
                                <textarea class="form-control" id="content" name="content" placeholder=""><?php echo isset($data['content'])?stripslashes($data['content']):''; ?></textarea>
                                <script>
                                    var elFinder = '/assets/js/vendor/elfinder/elfinder-cke.php';
                                    CKEDITOR.replace('content', {
                                        filebrowserBrowseUrl: elFinder,
                                        filebrowserImageBrowseUrl: elFinder,                                  
                                        allowedContent: true                  
                                    });
                                </script>
                            </div>    
                            <div class="form-group">
                                <label for="intro">摘要</label>
                                <textarea class="form-control" id="summary" name="summary" placeholder=""><?php echo isset($data['summary'])?stripslashes($data['summary']):''; ?></textarea>
                            
                            </div>    

                            <div class="form-group">
                                <label for="title">作者</label>
                                <input type="text" class="form-control" id="author" name="author" value="<?php echo isset($data['author'])?$data['author']:''; ?>">
                            </div>   

                            <div class="form-group">
                                <label for="group">作者（科普模块）</label>
                                <select multiple id="authorExt" name="authorExt[]" class="form-control">
                                    <?php foreach ($teams as $item) { ?>
                                        <option value="<?php echo $item->id; ?>" <?php echo in_array($item->id, $authors)?"selected":"";?>  ><?php echo $item->name . '【'.$item->lang.'】'; ?></option>
                                    <?php } ?>
                                </select>                         
                            </div>

                            <div class="form-group">
                                <label for="pubdate">发布日期</label>
                                <input class="form-control" id="pubdate" name="pubdate" value="<?php echo isset($data['pubdate'])?date_format(date_create($data['pubdate']),"Y-m-d"):date("Y-m-d"); ?>" placeholder="" type="date" />
                            </div>

                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="<?php echo isset($data['importance'])?$data['importance']:0; ?>" placeholder="值越大越排前">
                            </div>                           
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"  <?php echo isset($data['recommend']) ? ($data['recommend']?"checked":"") : ""; ?> id="chkRecommend" name="recommend">
                                    <label class="form-check-label" for="chkRecommend">推荐</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input"  <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                                    <label class="form-check-label" for="chkActive">发布</label>
                                </div>
                            </div>

                                </div>
                                <div class="col-md-auto">
                                <div style="width:300px;  text-align:center;" class="mb-3">
                                        <div class="card">
                                        <div class="card-header">缩略图</div>
                                            <div class="card-body">                                       
                                                <img ID="iLogo" data-default-src="holder.js/240x180?text=720X480像素" src="<?php echo empty($data['thumbnail']) ? "holder.js/240x180?text=720X480像素" : $data['thumbnail']; ?>" class="img-fluid" />
                                            </div>
                                            <div class="card-footer">
                                                <button type="button" id="btnThumbnail" class="btn btn-info"><i class="fa fa-picture-o"></i> 浏览...</button>
                                                <?php if(!empty($data['thumbnail'])){ ?>
                                                <button type="button" id="btnImgDelete" class="btn btn-danger"><i class="iconfont icon-delete"></i> 移除</button>
                                            <?php } ?>
                                                <input id="thumbnail" type="hidden" name="thumbnail" value="<?php echo isset($data['thumbnail'])?$data['thumbnail']:''; ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
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
    <script src="/assets/js/vendor/select2/dist/js/select2.full.min.js"></script>
    <script type="text/javascript">
        function SetThumbnail(fileUrl) {
            $('#thumbnail').val(fileUrl);
            $('#iLogo').attr('src', fileUrl);
        }
  
        $(document).ready(function() {

            //当前菜单        
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');
            $(".mainmenu>li.news").addClass("nav-open").find("ul>li.list a").addClass("active");     

            $("#btnThumbnail").on("click", function () {
                singleEelFinder.selectActionFunction = SetThumbnail;
                singleEelFinder.open();
            });

            $("#btnImgDelete").on("click", function() {
                $('#background_image').val("");
                $('#iLogo').attr('src', $('#iLogo').attr('data-default-src'));
                var myImage = document.getElementById('iLogo');
                Holder.run({
                    images: myImage
                });
            });

            $("#authorExt").select2();
   

            $("form").validate({
                rules: {
                    title: {
                        required: true,
                        maxlength: 150
                    },
                    content: {
                        required: true
                    },
                    category_id: {
                        required: true
                    },
                    summary: {
                        maxlength: 500
                    },
                    author: {
                        maxlength: 50
                    },
                    importance: {
                        required: true,
                        digits:true
                    },
                    seotitle: {
                        maxlength: 150
                    },
                    seokeywords: {
                        maxlength: 250
                    },
                    seodescription: {
                        maxlength: 500
                    }

                },
                messages:{
                    title: {
                        required:"请输入主题",
                        maxlength: "不能超过150个字符"
                    },
                    content: {
                        required: "请输入新闻内容"
                    },
                    category_id: {
                        required: "请选择分类"
                    },
                    summary: {
                        maxlength: "不能超过500个字符"
                    },
                    author: {
                        maxlength: "不能超过50个字符"
                    },
                    importance: {
                        required: "请输入排序",
                        digits:"请输入有效的整数"
                    },
                    seotitle: {
                        maxlength: "不能超过150个字符"
                    },
                    seokeywords: {
                        maxlength: "不能超过250个字符"
                    },
                    seodescription: {
                        maxlength: "不能超过500个字符"
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
                    // var values = {};
                    // var fields = {};
                    for (var instanceName in CKEDITOR.instances) {
                        CKEDITOR.instances[instanceName].updateElement();
                    }

                    // $.each($(form).serializeArray(), function(i, field) {
                    //     values[field.name] = field.value;
                    // });

                    $.ajax({
                        url: 'news_post.php',
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