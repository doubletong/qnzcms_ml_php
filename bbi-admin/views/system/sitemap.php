<?php
require_once('../../includes/common.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo "基本信息_系统_后台管理_" . $site_info['sitename']; ?></title>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/meta.php') ?>
</head>

<body>
    <div class="wrapper" id="wrapper">
        <!-- nav start -->
        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/bbi-admin/includes/nav_system.php'); ?>
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
                                <li class="breadcrumb-item"><a href="#">系统</a></li>
                                <li class="breadcrumb-item active" aria-current="page">生成Sitemap</li>
                            </ol>
                        </nav>
                        </div>
                        <div class="col-md-auto">
                            <time id="sitetime"></time>
                        </div>
                    </div>
                </div> 
              
                <form method="post" id="export_form">
              <div class="card">
              <header class="card-header">
                        <div class="row">
                            <div class="col">
                                <div class="card-title-v1"> <i class="iconfont icon-apartment"></i>生成Sitemap</div>
                            </div>
                            <div class="col-auto">
                                <div class="control"><a class="expand" href="#"><i class="iconfont icon-fullscreen"></i></a><a class="compress" href="#"><i class="iconfont icon-shrink"></i></a></div>
                            </div>
                        </div>
                    </header>
                <div class="card-body">
                        <input type="hidden" name='sitemap' value="sitemap" />
                        <div class="form-group">
                            <button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="iconfont icon-export"></i> 生成 Sitemap</button>
                        </div>
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
            $("#module_nav>li:nth-of-type(2)").addClass("active").siblings().removeClass('active');       
            $(".mainmenu>li.sitemap a").addClass("active");


            $('#submit').click(function(e){         
              e.preventDefault();
                $.ajax({
                    url: 'sitemap_post.php',
                    type: 'POST',
                    data: $('#export_form').serialize(),
                    success: function (res) {
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
            });
          
        });
    </script>

</body>

</html>