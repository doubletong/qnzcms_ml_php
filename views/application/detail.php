<?php
require_once("../../includes/common.php");
require_once("../../data/article.php");

$articleClass = new TZGCMS\Article();
$did = 1;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $articleClass->fetch_data($id);
    $prev = $articleClass->fetch_prev_data($id, $did);
    $next = $articleClass->fetch_next_data($id, $did);
} else {
    header('Location: /application');
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
    <title><?php echo $data['title'] . "-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>


    <div class="page page-news-detail ">

    <div class="container">

        <header class="title title-app wow fadeInUp">
            <h1 class="t1"><?php echo $data['title']; ?></h1>    
            <h4><?php echo $data['subtitle']; ?></h4>     
        </header>

        <div class="article">
            
            <?php echo $data['content']; ?>


        </div>

        </div>


    </div>



    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {

        });
    </script>
</body>

</html>