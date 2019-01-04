<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/media.php");

$mediaClass = new Media();
$medias = $mediaClass->fetch_all();

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "媒体关注-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="page-news">
<?php require_once('includes/header_news.php') ?>


<div class="container s1">
            <section class="linklist">
            <?php foreach($medias as $data){ ?>
                <a href="<?php echo $data["link"]; ?>" target="_blank" class="link">
                    <h3 class="linktitle">
                    <?php echo $data["title"]; ?>
                    </h3>
                    <p class="des"><?php echo $data["summary"]; ?></p>
                    <p class="note"><?php echo date("Y-m-d",$data["added_date"]); ?> | <?php echo $data["category"]; ?></p>
                </a>
                <?php } ?>               
            </section>
        </div>
    </div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(5) a").addClass("active");
           $(".mainav li:nth-of-type(5) a").addClass("active");
           $(".subnav li:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>
</html>