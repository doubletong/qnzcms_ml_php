<?php

require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $articleClass->fetch_data($id);
    $prev = $articleClass->fetch_prev_data($id);
    $next = $articleClass->fetch_next_data($id);
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


<div class="container news-detail">
            <header class="news-header  wow slideInUp">
                <h1><?php echo $data['title'];?></h1>
                <p><?php echo date('Y-m-d',$data['pubdate']) ;?></p>
            </header>
            <article class="news-body  wow slideInUp">
            <?php echo $data['content'];?>
            </article>
            <footer class="row prevnext wow slideInUp">
            <div class="col-md-6">
                <?php if(!empty($prev)){?>
                  
                        <a href="/news/detail-<?php echo $prev["id"];?>" class="more">上一篇：<?php echo $prev["title"];?> </a>
                
                <?php } ?>
                </div>
                <div class="col-md-6">
                <?php if(!empty($next)){?>
                  
                        <a href="/news/detail-<?php echo $next["id"];?>" class="more">下一篇：<?php echo $next["title"];?> </a>
                  
                <?php } ?>
                </div>
            </footer>
        </div>


    </div>

    <?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
     
        });
    </script>
</body>
</html>