<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("academic_promotion");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo $data["title"]."-关于我们-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header_about.php') ?>

  
    <div class="page page-about">
        <?php require_once('includes/subnav.php') ?>
        <div class="container">
            <?php  echo $data["content"];   ?>

            
        </div>
    </div>


    <?php require_once('../../includes/footer.php') ?>

    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
          //  $(".mainav li:nth-of-type(1)").addClass("active");
          //  $(".subnav div:nth-of-type(4) a").addClass("active");
        });
    </script>
</body>

</html>