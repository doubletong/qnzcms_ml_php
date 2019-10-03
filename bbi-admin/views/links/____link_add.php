<?php
require_once('../../includes/common.php');
require_once('../../data/dictionary.php');
$dictionaryClass = new TZGCMS\Admin\Dictionary();
$dictionaries = $dictionaryClass->get_dictionaries_byid(11);

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "添加_链接_组件_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
   
</head>

<body>
    <div class="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav.php'); ?>
        <!-- /nav end -->
        <section class="rightcol">
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/header.php'); ?>

            <div class="container-fluid maincontent">

                <form novalidate="novalidate">
                    <div class="card">
                        <div class="card-header">
                            添加链接
                        </div>
                        <div class="card-body">



                            <div class="form-group">
                                <label for="title">主题</label>

                                <input type="text" class="form-control" id="title" name="title" placeholder="主题">

                            </div>
                            <div class="form-group">
                                <label for="dictionary_id">类别</label>
                                <select class="form-control" id="dictionary_id" name="dictionary_id" placeholder="">
                                    <option value="">--请选择类别--</option>
                                    <?php foreach ($dictionaries as $model) {
                                        ?>
                                        <option value="<?php echo $model["id"]; ?>"><?php echo $model["title"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="link">链接</label>
                                <input type="text" class="form-control" id="link" name="link" placeholder="链接">
                            </div>

                            <div class="form-group">
                                <label for="imageUrl">Logo</label>
                                <div class="input-group">
                                    <input id="imageUrl" name="imageUrl" class="form-control" placeholder="Logo" aria-describedby="setImageUrl">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="setImageUrl" type="button">浏览…</button>
                                    </div>
                                </div>
                                <small id="emailHelp" class="form-text text-muted">图片尺寸：180*60像素</small>
                            </div>

                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input type="number" class="form-control" id="importance" name="importance" value="0" placeholder="">

                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" checked id="chkActive" name="active">
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
            <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/footer.php'); ?>
        </section>
    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/scripts.php'); ?>

    <script src="/assets/js/vendor/holderjs/holder.min.js"></script>
    <script src="/assets/js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        function SetBackground(fileUrl) {
            $('#imageUrl').val(fileUrl);
        }
        $(document).ready(function() {
            //当前菜单
            $(".mainmenu>li:nth-of-type(9)").addClass("nav-open").find("ul>li:nth-of-type(2) a").addClass("active");



            $("#setImageUrl").on("click", function() {
                singleEelFinder.selectActionFunction = SetBackground;
                singleEelFinder.open();
            });


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
                        digits: true
                    }

                },
                messages: {
                    title: {
                        required: "请输入主标题"
                    },
                    link: {
                        url: "链接格式不正确"
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

                    $.ajax({
                        url: 'link_post.php',
                        type: 'POST',
                        data: $(form).serialize(),
                        success: function(res) {                       

                            var myobj = JSON.parse(res);                    
                                console.log(myobj.status);
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