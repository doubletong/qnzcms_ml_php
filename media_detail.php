<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();
$did= 16;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $data = $articleClass->fetch_data($id);
    $prev = $articleClass->fetch_prev_data($id,$did);
    $next = $articleClass->fetch_next_data($id,$did);
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
    <title><?php echo $data['title']."媒体报道-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>
    
    <div class="striving">
<!--banner-->
<div class="inside_banner news_detail_banner" style="background-color:#4866b4; background-image:url(<?php echo $data['background_image']; ?>)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <div class="clear">
                    <span class="source wow fadeInLeft"><?php echo $data['source']; ?></span>
                    <span class="date wow fadeInLeft"><?php echo date('Y-m-d', $data['pubdate']); ?></span>
                </div>
                <h2 class="wow fadeInLeft"><?php echo $data['title']; ?></h2>
                <?php if(!empty($data['source_url'])){?>
                <a class="source_link wow fadeInLeft" href="<?php echo $data['source_url']; ?>" target="_blank">原文链接 ></a>
                <?php } ?>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="wrap">
            <!--news_detail-->
           <div class="news_detail">
               <div class="news_detail_main wow fadeInUp">
                    <?php echo $data['content'];?>
               </div>
               <!--#####-->
               <div class="news_detail_link wow fadeInUp">
               <?php if(!empty($prev)){?>
                        <a href="/media-detail-<?php echo $prev["id"];?>" class="more">上一篇：<?php echo $prev["title"];?> </a>
                    <?php } ?>

                    <?php if(!empty($next)){?>                  
                         <a href="/media-detail-<?php echo $next["id"];?>" class="more">下一篇：<?php echo $next["title"];?> </a>            
                    <?php } ?>
               </div>
           </div>
            <!--news_detail end-->
        </div>
    </div>
<!--main end-->
    </div>


    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>