<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('includes/output.php');
require_once('data/shop.php');

$shopClass = new Shop();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $shopClass->fetch_data($id);
}else{
    header('Location: shopes.php');
    exit;
}


do_html_doctype("编辑专卖店_后台管理".SITENAME);
?>
<link href="assets/css/toastr.min.css" rel="stylesheet"/>

<?php
do_html_header();

?>
<div class="toolbar">
    <a href="#" class="showmenu"><i class="fa fa-bars"></i></a>
    <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home fa-fw"></i> 控制面板</a></li>
        <li><a href="shopes.php">专卖店</a></li>
        <li class="active">编辑专卖店</li>

    </ol>
</div>
<div class="main-content">

    <div class="panel panel-default">
        <div class="panel-heading">
            编辑专卖店
        </div>
        <div class="panel-body">
            <form class="form-horizontal" style="position: relative;"  novalidate="novalidate">
                <input id="shopId" type="hidden" name="shopId" value="<?php echo $data['id'];?>" />



                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">标题</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo $data['title'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">所在地</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="address" name="address" placeholder="" value="<?php echo $data['address'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="authorization_no" class="col-sm-2 control-label">授权证号</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="authorization_no" name="authorization_no" placeholder="" value="<?php echo $data['authorization_no'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="link" class="col-sm-2 control-label">网址</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="link" name="link" placeholder="" value="<?php echo $data['link'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="importance" class="col-sm-2 control-label">排序</label>
                    <div class="col-sm-7">
                        <input type="number" class="form-control" id="importance" name="importance" value="<?php echo empty($data['importance'])?"0":$data['importance'];?>" placeholder="">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" <?php echo $data['active']?"checked":"";?> name="active" > 发布
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">保存</button>
                        <a href="shopes.php" class="btn btn-default">返回</a>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>
</div>

<?php
do_html_footer();
?>

<script src="assets/js/holder.min.js"></script>
<script src="assets/js/toastr.min.js"></script>
<script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        //当前菜单
        $(".mainmenu li.liitem:nth-of-type(5)").addClass("nav-open").find("ul li:nth-of-type(1) a").addClass("active");




        $("form").validate({

            rules: {
                title: {
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
                link: {
                    url:  "网址格式不正确"
                },
                importance: {
                    required: "请输入序号",
                    digits:"请输入有效的整数"
                }

            },

            errorClass: "help-block",
            errorElement: "span",
            highlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass('has-success');
                $(element).parents('.form-group').addClass(' has-error');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents('.form-group').removeClass(' has-error');
                $(element).parents('.form-group').addClass('has-success');
            },
            submitHandler: function(form) {


                $.ajax({
                    url : 'shop_post.php',
                    type : 'POST',
                    data : $(form).serialize(),
                    success : function(res) {

                        //  $('#resultreturn').prepend(res);
                        if (res) {
                            toastr.success('专卖店已保存成功！', '编辑专卖店')
                        } else {
                            toastr.error('专卖店保存失败！', '编辑专卖店')
                        }
                    }
                });

            }
        });
    });
</script>

</body>
</html>