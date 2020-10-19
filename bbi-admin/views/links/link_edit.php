<?php
use Models\LinkCategory;
use Models\Link;
use Models\Language;

require_once('../../includes/common.php');

$pageTitle = isset($_GET['id'])?"编辑链接":"创建链接";
$action = isset($_GET['id'])?"update":"create";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = Link::find($id);
    //$data = $cateModel->fetch_data($id);
    //$imageUrl = explode('|', $data['image_url']);
}


$categories = LinkCategory::orderby('importance','desc')->get();
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
 

?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $pageTitle."_链接_组件_后台管理_".$site_info['sitename'];?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
    
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
                            <li class="breadcrumb-item"><a href="/bbi-admin/views/links/index.php">链接</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo $pageTitle; ?></li>
                        </ol>
                        </nav>
                    </div>
                    <div class="col-md-auto">
                        <time id="sitetime"></time>
                    </div>
                    </div>
                </div>



        <form   novalidate="novalidate">
    <div class="card">
        <div class="card-header">
            <?php echo $pageTitle ?>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-md">
            <input id="id" type="hidden" name="id" value="<?php echo isset($data['id'])?$data['id']:0; ?>" />
            <input type="hidden" name="action" value="<?php echo $action; ?>" />

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
                        <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo isset($data['title'])?$data['title']:''; ?>">
                  
                </div>
                <div class="form-group">
                                <label for="parent_id">分类</label> 
                                <select class="form-control" id="category_id" name="category_id" >
                                    <option value="">--请选择分类--</option>
                                    <?php recursive($categories, $level, $data['category_id']); ?>                                                    
                                </select>                              
                            </div>   

                <div class="form-group">
                    <label for="url" >链接</label>                  
                    <input type="text" class="form-control" id="url" name="url" placeholder="" value="<?php echo isset($data['url'])?$data['url']:''; ?>">
                
                </div>

      
                <div class="form-group">
                    <label for="description">描述</label>
                    <textarea class="form-control" id="description" name="description" placeholder=""><?php echo isset($data['description'])?$data['description']:''; ?></textarea>
                </div>
                

                <div class="form-group">
                    <label for="importance">排序</label>
                 
                        <input type="number" class="form-control" id="importance" name="importance" value="<?php echo empty($data['importance'])?"0":$data['importance'];?>" placeholder="">
               
                </div>


                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" <?php echo isset($data['active']) ? ($data['active']?"checked":"") : "checked"; ?> id="chkActive" name="active">
                        <label class="form-check-label" for="chkActive">发布</label>
                    </div>
                </div>
          
            </div>
            <div class="col-md-auto">
                <div style="width:300px;  text-align:center;" class="mb-3">
                    <div class="card">
                        <div class="card-body" style="background-color:#ccc;">                                           
                            <img ID="iLogo" src="<?php echo empty($data['image_url']) ? "holder.js/240x240?text=120X120像素" : $data['image_url']; ?>" class="img-fluid" />
                            
                        </div>
                        <div class="card-footer">
                            <button type="button" id="btnBrowser" class="btn btn-info btn-block"><i class="fa fa-picture-o"></i> 图片...</button>
                            <input id="image_url" type="hidden" name="image_url" value="<?php echo isset($data['image_url'])?$data['image_url']:''; ?>" />
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


    function SetThumbnail(fileUrl) {
        $('#image_url').val(fileUrl);
        $('#iLogo').attr('src', fileUrl);
    }

    $(document).ready(function () {
        //当前菜单
        $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');        
        $(".mainmenu li.links a").addClass("active");

       
        $("#btnBrowser").on("click", function () {         
            singleEelFinder.selectActionFunction = SetThumbnail;
            singleEelFinder.open();                
        });       


        $("form").validate({

            rules: {
                title: {
                    required: true
                },
                dictionary_id:{
                    required: true
                },
                link: {
                    url: true
                },
                importance: {
                    required: true,
                    digits:true
                }

            },
            messages:{
                title: {
                    required:"请输入主标题"
                },
                dictionary_id:{
                    required: "请选择分类",
                },
                link: {
                    url: "链接格式不正确"
                },
                importance: {
                    required: "请输入序号",
                    digits:"请输入有效的整数"
                }

            },

            errorClass: "invalid-feedback",
            errorElement: "div",
            highlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-valid');
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
                $(element).addClass('is-valid');
            },
            submitHandler: function(form) {
                //form.submit();


                $.ajax({
                    url : 'link_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {

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