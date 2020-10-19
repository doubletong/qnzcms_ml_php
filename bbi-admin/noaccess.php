<?php
require_once('includes/common.php');


?>
<!DOCTYPE html>
<html>

<head>
    <title>
        <?php echo "没有权限_后台管理_".$site_info["sitename"];?>
    </title>
    <?php require_once('includes/meta.php') ?>
   
</head>

<body>
    <div class="wrapper" id="wrapper">
        <!-- nav start -->
        <?php require_once('includes/nav.php'); ?>
        <!-- /nav end -->

        <section class="rightcol" id="rightcol">
            <?php require_once('includes/header.php'); ?>

            <div class="main-content">     
                <div class="breadcrumb-container">
                    <div class="row">
                        <div class="col-md">
                            <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">控制面板</a></li>
                              
                            </ol>
                            </nav>
                        </div>
                        <div class="col-md-auto">
                            <time id="sitetime"></time>
                        </div>
                    </div>
                </div>    
                <div class="page page-home"> 
                    
                    <div class="alert alert-danger" role="alert">
                        很抱歉，当前帐号没有权限查看此页面！
                    </div>
                    

                </div>

            </div>
            <?php require_once('includes/footer.php'); ?>

        </section>
    </div>
    <?php require_once('includes/scripts.php'); ?>

    <script type="text/javascript">
        
        $(document).ready(function () {
            //当前菜单
            $("#module_nav>li:nth-of-type(1)").addClass("active").siblings().removeClass('active');
            $(".mainmenu>li:nth-of-type(1) a").addClass("active");
            
        });
    </script>
</body>

</html>