<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");
require_once("../../data/dictionary.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("base");


$dicClass = new TZGCMS\Dictionary();
$categories = $dicClass->get_dictionaries_byid(4);
$n = 0;
$m = 0;
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo $data["title"]."-关于我们-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>

    <?php require_once('includes/header_about.php') ?>

    <!--main-->
    <div class="page page-about">
        <?php require_once('includes/subnav.php') ?>
     

        <div class="container">            
            <?php   echo $data["content"];   ?>
        </div>
    </div>


    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
           // $(".mainav li:nth-of-type(1)").addClass("active");
           // $(".subnav nav div:nth-of-type(5) a").addClass("active");
        });
    </script>
</body>

</html>