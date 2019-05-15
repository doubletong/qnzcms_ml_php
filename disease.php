<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("clinical");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "疾病管理-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-disease">
        <div class="container page-title">
            <h1>疾病管理</h1>
            <p>了解疾病知识 更好地管理自己</p>
        </div>
    </div>
    <div class="page page-disease">
        <div class="container">
            <section class="list list-disease">
                <div class="row">
                    <div class="col-md-6">
                        <div class="item">
                            <img src="/img/temp/d001.jpg" alt="">
                            <div class="bg">                                
                            </div>
                            <a href="/disease/list-1" class="txt">
                                    <div class="des">
                                        <h3 class="title">了解颅内疾病</h3>
                                        <ul>
                                            <li>— 出血性脑血管病
                                            </li>
                                            <li>— 缺血性脑血管病
                                            </li>                                           
                                        </ul>
                                    </div>
                                </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="item">
                            <img src="/img/temp/d002.jpg" alt="">
                            <div class="bg">                                
                            </div>
                            <a href="/disease/list-1" class="txt">
                                    <div class="des">
                                        <h3 class="title">了解心脏疾病</h3>
                                        <ul>
                                            <li>— 冠心病
                                            </li>
                                            <li>— 房颤
                                            </li>
                                            <li>— 心动过缓
                                            </li>
                                            <li>— 室上速
                                            </li>
                                            <li>— 瓣膜疾病
                                            </li>
                                            <li>— 心律失常</li>
                                        </ul>
                                    </div>
                                </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="item">
                            <img src="/img/temp/d003.jpg" alt="">
                            <div class="bg">                                
                            </div>
                            <a href="/disease/list-1" class="txt">
                                    <div class="des">
                                        <h3 class="title">了解动脉疾病</h3>
                                        <ul>
                                            <li>— 主动脉夹层</li>                                          
                                        </ul>
                                    </div>
                                </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="item">
                            <img src="/img/temp/d004.jpg" alt="">
                            <div class="bg">                                
                            </div>
                            <a href="/disease/list-1" class="txt">
                                    <div class="des">
                                        <h3 class="title">了解胰腺疾病</h3>
                                        <ul>
                                            <li>— 糖尿病
                                            </li>
                                            <li>— IHH/卡尔曼综合征
                                            </li>                                         
                                        </ul>
                                    </div>
                                </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="item">
                            <img src="/img/temp/d005.jpg" alt="">
                            <div class="bg">                                
                            </div>
                            <a href="/disease/list-1" class="txt">
                                    <div class="des">
                                        <h3 class="title">了解髋关节疾病</h3>
                                        <ul>
                                            <li>— 髋关节疾病</li>
                                            
                                        </ul>
                                    </div>
                                </a>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="item">
                            <img src="/img/temp/d006.jpg" alt="">
                            <div class="bg">                                
                            </div>
                            <a href="/disease/list-1" class="txt">
                                    <div class="des">
                                        <h3 class="title">了解膝关节疾病</h3>
                                        <ul>
                                            <li>— 漆关节疾病</li>
                                          
                                        </ul>
                                    </div>
                                </a>
                        </div>
                    </div>

                    
                </div>
            </section>
        </div>

    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");
            $(".subnav li:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>

</html>