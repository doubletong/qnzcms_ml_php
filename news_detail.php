<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $articleClass->fetch_data($id);
}else{
    header('Location: /news');
    exit;
}



?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo $data['title']."-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
    <meta name=keywords content="<?php echo $data['keywords'];?>">
    <meta name=description content="<?php echo $data['description'];?>">
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="page-news">
<?php require_once('includes/header_news.php') ?>

<div class="container news-detail">
            <header class="news-header">
                <h1><?php echo $data['title'];?></h1>
                <p><?php echo date('Y-m-d H:i:s',$data['pubdate']) ;?></p>
            </header>
            <article class="news-body">
            <?php echo $data['content'];?>
            </article>
            <footer class="text-center">
                <div class="nav">
                    <a href="javascript:void(0);" class="more">上一篇：2018 Medidata Next: 希麦迪展位吸引众多与会者聚焦 </a>
                </div>
                <div class="nav">
                    <a href="javascript:void(0);" class="more">下一篇：2018 Medidata Next: 希麦迪展位吸引众多与会者聚焦 </a>
                </div>
            </footer>
        </div>


    </div>

    <?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(5) a").addClass("active");
           $(".mainav li:nth-of-type(5) a").addClass("active");
           $(".subnav li:nth-of-type(1) a").addClass("active");
        });
    </script>
</body>
</html>