<?php 
function do_html_doctype($title){
?>
    <!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>

<title><?php echo $title;?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width">
    <link href="<?php echo SITEPATH ?>/bbi-admin/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo SITEPATH ?>/bbi-admin/assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?php echo SITEPATH ?>/bbi-admin/assets/css/Style.min.css" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="<?php echo SITEPATH ?>/bbi-admin/assets/js/html5shiv.min.js"></script>
    <script src="<?php echo SITEPATH ?>/bbi-admin/assets/js/respond.min.js"></script>
    <![endif]-->

<?php 
}
function do_html_header() {
  // print an HTML header
?>
</head>
<body>
<!-- navbar start -->
<nav class="navbar navbar-default navbar-inverse" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand logo" href="#"><?php echo SITENAME;?></a>
    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/" title="返回首页"><i class="fa fa-home"></i> 返回首页</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    你好，<?php echo $_SESSION['valid_user'] ?>
                    <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="/bbi-Admin/Users/UpdatePWD.aspx">修改密码</a></li>
                </ul>
            </li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i> 退出系统</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>
<!-- navbar end -->


<div id="wrapper">

    <div id="sidebar-nav" class="leftcol">
        <aside>
            <nav id="menu">
                <h3>导航</h3>
                <ul class="list-unstyled mainmenu">
                    <li class="liitem">
                        <a href="index.php">
                            <i class="glyphicon glyphicon-dashboard"></i> 控制面板
                            <div class="arrow-left"></div>
                        </a>
                    </li>


                    <li class="liitem down-nav">
                        <a href="#"><i class="glyphicon glyphicon-th-large"></i> 产品 <span class="badge">2</span></a>
                        <ul class="list-unstyled submenu">
                            <li>
                                <a href="products.php">
                                     产品列表
                                </a>
                            </li>
                            <li>
                                <a href="product_add.php">
                                   添加产品
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="liitem">
                        <a href="orders.php">
                            <i class="glyphicon glyphicon-shopping-cart"></i> 订单管理
                            <div class="arrow-left"></div>
                        </a>
                    </li>

                    <li class="liitem down-nav">
                        <a href="#"><span class="glyphicon glyphicon-list-alt"></span> 新闻资讯 <span class="badge">2</span></a>
                        <ul class="list-unstyled submenu">
                            <li><a href="news.php"><i class="fa fa-angle-double-right"></i> 新闻列表</a></li>
                            <li><a href="news_add.php"><i class="fa fa-angle-double-right"></i> 添加新闻</a></li>
                        </ul>
                    </li>
                    <li class="liitem down-nav">
                        <a href="#"><span class="glyphicon glyphicon-film"></span> 视频（服务） <span class="badge">2</span></a>
                        <ul class="list-unstyled submenu">
                            <li><a href="videos.php"><i class="fa fa-angle-double-right"></i> 视频列表</a></li>
                            <li><a href="video_add.php"><i class="fa fa-angle-double-right"></i> 添加视频</a></li>
                        </ul>
                    </li>
                    <li class="liitem down-nav">
                        <a href="#"><span class="glyphicon glyphicon-compressed"></span> 组件 <span class="badge">4</span></a>
                        <ul class="list-unstyled submenu">
                            <li><a href="carousels.php"><span class="glyphicon glyphicon-picture"></span> 轮播图</a></li>
                            <li><a href="links.php"><span class="glyphicon glyphicon-link"></span> 商城链接</a></li>
                            <li><a href="distributors.php"><span class="glyphicon glyphicon-user"></span> 经销商</a></li>
                            <li><a href="shopes.php"><span class="glyphicon glyphicon-shopping-cart"></span> 专卖店</a></li>
                        </ul>
                    </li>

                    <li class="liitem down-nav">
                        <a href="#"><span class="glyphicon glyphicon-leaf"></span> 系统安全 <span class="badge">2</span></a>
                        <ul class="list-unstyled submenu">
                            <li><a href="administrators.php"><i class="fa fa-angle-double-right"></i> 管理员</a></li>
                            <li><a href="admin_add.php"><i class="fa fa-angle-double-right"></i> 创建管理员</a></li>
                        </ul>
<!--                    <li class="liitem"><a href="/BBI-Admin/Pages/ManagePages.aspx"><i class="fa fa-paste"></i> 内容片段</a></li>-->

                    <!--<li class="liitem down-nav">
                        <a href="#"><span class="glyphicon glyphicon-link"></span> 链接管理 <span class="badge">2</span></a>
                        <ul class="list-unstyled submenu">
                            <li><a href="/BBI-Admin/Links/ManageLinks.aspx"><i class="fa fa-angle-double-right"></i> 链接列表</a></li>
                            <li><a href="/BBI-Admin/Links/ManageCategories.aspx"><i class="fa fa-angle-double-right"></i> 链接分类</a></li>
                        </ul>
                    </li>-->



                    <!--<li class="liitem down-nav">
                        <a href="#"><i class="fa fa-cog"></i> 常规设置 <span class="badge">4</span></a>
                        <ul class="submenu">
                            <li><a href="/bbi-admin/Common/SiteInfo.aspx"><i class="fa fa-home"></i> 站点信息</a></li>
                            <li><a href="/bbi-admin/Common/CompanyInfo.aspx"><i class="fa fa-info-circle"></i> 企业信息</a></li>
                            <li><a href="/bbi-admin/Common/Social.aspx"><i class="fa fa-twitter"></i> 社交资料</a></li>
                            <li class="hide"><a href="/bbi-admin/Common/MailSettings.aspx"><i class="fa fa-envelope-o"></i> 邮箱服务设置</a></li>
                        </ul>
                    </li>-->

                </ul>


            </nav>

            <div class="closemenu">
                <a href="#"><i class="fa fa-chevron-circle-left"></i></a>
            </div>
        </aside>

    </div>

    <div id="rightcol" class="rightcol">
    <?php
 
}

function do_html_footer() {
  // print an HTML footer
?>
        <footer id="pagefooter">
            Copyright &copy; 2012 <a id="hlSiteInfo" href="http://heiniaozhi.cn">黑鸟志</a> All Rights
            Reserved
        </footer>


    </div>
</div>

    <script src="assets/js/jquery-2.0.0.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/App.js"></script>



<?php
}
?>
