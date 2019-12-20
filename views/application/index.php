<?php
require_once("../../includes/common.php");
require_once("../../data/article.php");
require_once("../../data/case.php");

$articleClass = new TZGCMS\Article();
$did = 6;
$categories = $articleClass->get_categories($did);
$articles = $articleClass->get_all_articles($did);

$n = 1;

$caseClass = new TZGCMS\CaseShow();
$caseCategories = $caseClass->get_all_categories();



?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "应用领域-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header.php') ?>


    <!--main-->
    <div class="page page-application container">

        <div class="categories">
            <?php 
          
          $caseCarousels = $carouselClass->get_carousels('A010');

            foreach ($categories as $category) { ?>
                <div class="item">
                    <div class="row no-gutters">
                        <div class="col-lg">
                            <div class="thumb">
                                <img src="<?php echo $category['thumbnail']; ?>" alt="<?php echo $category['title']; ?>">
                            </div>
                        </div>
                        <div class="col-lg <?php echo $n%2==0 ? "order-lg-first":""; ?>">
                            <div class="txt">
                                <h3 class="title"><?php echo $category['title']; ?></h3>
                                <ul>
                                    <?php foreach ($articles as $article) { 

                                        if($category['id'] === $article['categoryId']){
                                        ?>
                                        
                                        <li>
                                            <a href="/application/detail/<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>
                                        </li>

                                    <?php } 
                                    
                                    }  
                                ?>
                                </ul>
                                <a href="/application/list/<?php echo $category['id']; ?>" class="more">了解更多</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php   
             $n++;
        } ?>
        
        <div class="item">
            <div class="row no-gutters">
                <div class="col-lg">
                    <div class="thumb">
                        <img src="<?php echo isset($caseCarousels[0])?$caseCarousels[0]["image_url"]:""; ?>" alt="<?php echo isset($caseCarousels[0])?$caseCarousels[0]["title"]:""; ?>">
                    </div>
                </div>
                <div class="col-lg order-lg-first">
                    <div class="txt">
                        <h3 class="title"><?php echo isset($caseCarousels[0])?$caseCarousels[0]["title"]:""; ?></h3>
                        <ul>
                            <?php foreach ($caseCategories as $category) { ?>
                                
                                <li>
                                    <a href="/application/cases/<?php echo $category['id']; ?>"><?php echo $category['title']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                        <a href="/application/cases" class="more">了解更多</a>
                    </div>
                </div>
            </div>
        </div>

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