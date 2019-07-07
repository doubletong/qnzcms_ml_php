<?php
require_once('../includes/common.php');
require_once('includes/common.php');
require_once('../config/db.php');
require_once('../includes/PDO_Pagination.php');
require_once('data/product_document.php');

if(isset($_GET['pid'])){
    $pid = $_GET['pid'];  
    
    $docClass = new ProductDocument();
    $documents = $docClass->get_all($pid);

}else{
    header('Location: products.php');
    exit;
}



?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "产品图片_产品_后台管理_" . SITENAME; ?></title>
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
              

         
                <form method="post" novalidate="novalidate" id="editform">
                <div class="card mb-3">
                    <div class="card-header">
                        上传文档
                    </div>
                    <div class="card-body">

               
                    <div class="row">
                        <input id="documentId" type="hidden" name="documentId" value="0" />
                        <input id="product_id" type="hidden" name="product_id" value="<?php echo $pid; ?>" />
                        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="file_url">
                                    图片</label>
                                <div class="input-group">
                                    <input id="file_url" name="file_url" class="form-control" placeholder="" aria-describedby="setFileUrl">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" id="setFileUrl" type="button">浏览…</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="title">描述</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="">
                            </div>
                        </div>
                       
        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="importance">排序</label>
                                <input class="form-control" id="importance" name="importance" value="0" placeholder="" type="number" />
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
                </form>
                <table class="table table-hover table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>图片</th>
                            <th>描述</th>
                        
                            <th>排序</th>
                            <th>发布日期</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($documents as $row) {
                            echo "<tr>";
                            ?>
                            <td>
                              <img src="<?php echo $row['file_url']; ?>" alt="<?php echo $row['title']; ?>" style="height:80px;" />
                            </td>
                            <td>
                                <?php echo $row['title']; ?>
                            </td>                      
                            <td>
                                <?php echo $row['importance']; ?>
                            </td>

                            <td><?php echo date('Y-m-d', $row['added_date']); ?></td>
                            <td><a href='<?php echo $row['file_url']; ?>' target="_blank" class='btn btn-primary btn-sm'>
                                    <i class="iconfont icon-download"></i>
                                </a>
                                <button type="button" data-id="<?php echo $row['id']; ?>" class='btn btn-danger btn-sm btn-delete'>
                                    <i class="iconfont icon-delete"></i>
                                </button>
                            </td>
                            <?php

                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>


            </div>
            <?php require_once('includes/footer.php'); ?>
        </section>
    </div>
    <?php require_once('includes/scripts.php'); ?>

    <script src="../js/vendor/toastr/toastr.min.js"></script>
    <script src="../js/vendor/bootbox.js/bootbox.js"></script>
    <script src="../js/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../js/vendor/ckfinder/ckfinder.js"></script>
    <script>
        function SetFileUrl(fileUrl) {
            $('#file_url').val(fileUrl);
        }
    

        $(document).ready(function() {
            //当前菜单
            $(".mainmenu>li.products").addClass("nav-open").find("ul>li.list a").addClass("active");

            $("#setFileUrl").on("click", function () {  
                // singleEelFinder.selectActionFunction = SetFileUrl;
                // singleEelFinder.open();  
                CKFinder.popup( {
                 chooseFiles: true,
                 onInit: function( finder ) {
                     finder.on( 'files:choose', function( evt ) {
                         var file = evt.data.files.first();                       
                         SetFileUrl(file.getUrl());
                     } );
                     finder.on( 'file:choose:resizedImage', function( evt ) {                      
                        SetFileUrl(evt.data.resizedUrl);
                     } );
                    }
                } );          
            });

            //确认框默认语言
            bootbox.setDefaults({
                locale: "zh_CN"
            });

            $(".btn-delete").click(function() {
                var $that = $(this);
                bootbox.confirm("删除后文档将无法恢复，您确定要删除吗？", function(result) {
                    if (result) {
                        var documentId = $that.attr("data-id");

                        $.ajax({
                            url: 'product_document_delete.php',
                            type: 'POST',
                            data: {
                                id: documentId
                            },
                            success: function(res) {

                                //  $('#resultreturn').prepend(res);
                                if (res) {
                                    toastr.success('文档已删除成功！', '删除文档')
                                    $that.closest("tr").remove();
                                } else {
                                    toastr.error('文档删除失败！', '删除文档')
                                }
                            }
                        });
                    }

                });

            });


            $("#editform").validate({
                rules: {
                    title: {
                        required: true
                    },
                
                    file_url: {
                        required: true
                    }

                },
                messages:{
                    title: {
                        required:"请输入主标题"
                    },
                
                    file_url: {
                        required: "请选择文档"
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
                        url : 'product_document_post.php',
                        type : 'POST',
                        data: $(form).serialize(),
                        success : function(res) {
                            console.log(res);
                            //  $('#resultreturn').prepend(res);
                            if (res) {
                                //toastr.success('文档已添加成功！', '添加文档')
                                location.reload();
                            } else {

                                toastr.error('文档添加失败！', '添加文档')
                            }
                        }
                    });
                }
            });

        });
    </script>
</body>

</html>