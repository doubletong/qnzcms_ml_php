<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("laws");


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "患者故事-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="banner banner-story">
    <div class="container page-title">
        <h1>患者故事</h1>
        <p>不同的故事  同一种温暖</p>
    </div>
</div>
<div class="page page-story">
    <div class="container">
        <div class="list list-story">
        <div class="row">
            <div class="col-md-4">
                <div class="item">
                    <img src="/img/temp/cover.png" class="bg" alt="">
                    <div class="txt">
                        <div class="logo">
                            <img src="/img/temp/s-logo.png" alt="">
                        </div>
                        <div class="person"><span>贝琪</span>      |  <span>美国 西棕榈滩</span></div>
                        <h3>SuperPath® 技术接受者</h3>
                        <a href="/story/detail-1" class="view">查看故事</a>
                    </div>
                </div>                
            </div>
            <div class="col-md-4">
                <div class="item">
                    <img src="/img/temp/cover.png" class="bg" alt="">
                    <div class="txt">
                        <div class="logo">
                            <img src="/img/temp/s-logo.png" alt="">
                        </div>
                        <div class="person"><span>贝琪</span>      |  <span>美国 西棕榈滩</span></div>
                        <h3>SuperPath® 技术接受者</h3>
                        <a href="/story/detail-1" class="view">查看故事</a>
                    </div>
                </div>                
            </div>
            <div class="col-md-4">
                <div class="item">
                    <img src="/img/temp/cover.png" class="bg" alt="">
                    <div class="txt">
                        <div class="logo">
                            <img src="/img/temp/s-logo.png" alt="">
                        </div>
                        <div class="person"><span>贝琪</span>      |  <span>美国 西棕榈滩</span></div>
                        <h3>SuperPath® 技术接受者</h3>
                        <a href="/story/detail-1" class="view">查看故事</a>
                    </div>
                </div>                
            </div>
            <div class="col-md-4">
                <div class="item">
                    <img src="/img/temp/cover.png" class="bg" alt="">
                    <div class="txt">
                        <div class="logo">
                            <img src="/img/temp/s-logo.png" alt="">
                        </div>
                        <div class="person"><span>贝琪</span>      |  <span>美国 西棕榈滩</span></div>
                        <h3>SuperPath® 技术接受者</h3>
                        <a href="/story/detail-1" class="view">查看故事</a>
                    </div>
                </div>                
            </div>
            <div class="col-md-4">
                <div class="item">
                    <img src="/img/temp/cover.png" class="bg" alt="">
                    <div class="txt">
                        <div class="logo">
                            <img src="/img/temp/s-logo.png" alt="">
                        </div>
                        <div class="person"><span>贝琪</span>      |  <span>美国 西棕榈滩</span></div>
                        <h3>SuperPath® 技术接受者</h3>
                        <a href="/story/detail-1" class="view">查看故事</a>
                    </div>
                </div>                
            </div>
            <div class="col-md-4">
                <div class="item">
                    <img src="/img/temp/cover.png" class="bg" alt="">
                    <div class="txt">
                        <div class="logo">
                            <img src="/img/temp/s-logo.png" alt="">
                        </div>
                        <div class="person"><span>贝琪</span>      |  <span>美国 西棕榈滩</span></div>
                        <h3>SuperPath® 技术接受者</h3>
                        <a href="/story/detail-1" class="view">查看故事</a>
                    </div>
                </div>                
            </div>            
        </div>
        </div>

        <div class="pagination">
            <ul class="pager">
                <li><a class="prev" href="#">上一页</a></li>
                <li class="active"><a class="page-link" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#" class="more">…</a></li>        
                <li><a class="next" href="#">下一页</a></li>    
            </ul>
            <span>共5页，到第</span> <input type="number" id="pagenum" class="pagenum"> <span>页</span> <a href="javascript:void();" class="go">确定</a>
        </div>
    </div>
   


</div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
           $(".mainav li:nth-of-type(3) a").addClass("active");
        
        });
    </script>
</body>
</html>