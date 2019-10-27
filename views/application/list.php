<?php
require_once("../../includes/common.php");
require_once("../../data/article.php");

$articleClass = new TZGCMS\Article();

if (isset($_GET['cid'])) {
    $id = $_GET['cid'];
    $category = $articleClass->get_category_byid($id);
    $articles = $articleClass->get_articles_bycategory($id);
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
    <title><?php echo $category['title']."-应用领域-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>


    <!--main-->
    <div class="page page-application container">
        <div class="title title-list">
            <h3><?php echo $category['title'];?></h3>
        </div>
        <div class="categories">
            <?php foreach ($articles as $article) { ?>
                <div class="item">
                <div class="row no-gutters align-items-center">
                    <div class="col-md">
                        <div class="thumb">
                            <img src="<?php echo $article['thumbnail']; ?>" alt="<?php echo $article['title']; ?>">
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="txt">
                            <h3 class="title title-art"><?php echo $article['title']; ?></h3>
                            <p class="summary"><?php echo $article['summary']; ?></p>
                            <a href="/application/detail/<?php echo $article['id']; ?>" class="more-art">了解更多</a>
                        </div>
                    </div>
                </div>
                </div>
            <?php   
        
        } ?>
        </div>



    </div>

    </div>
    <!--main end-->

    <?php require_once('../../includes/footer.php') ?>

    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {

        });
    </script>
</body>

</html>