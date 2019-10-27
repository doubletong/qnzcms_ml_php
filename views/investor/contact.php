
<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("investor_contact");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo $data["title"] . "-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>

    <?php require_once('includes/header.php') ?>
   
    <?php echo $data["content"]; ?>
    
    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>
    
</body>

</html>

