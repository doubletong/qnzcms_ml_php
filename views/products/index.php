<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("research");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo $data["title"]."-研发与产品管线-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>

   
    <div class="page page-research">
        <?php require_once('includes/subnav.php') ?>
        <div class="container">
            <?php echo $data["content"]; ?>
        </div>
    </div>


    <?php require_once('../../includes/footer.php') ?>

    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {

            $(".mainav li:nth-of-type(2)").addClass("active");
            $(".subnav nav div:nth-of-type(1) a").addClass("active");
        });
    </script>
</body>

</html>