<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");
require_once("../../data/article.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("environmental");

$articleClass = new TZGCMS\Article();
$did = 3;

$articles = $articleClass->get_articles_bycategory(45);
$category = $articleClass->get_category_byid(46);
$n = 1

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo $data["title"] . "-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>

    <?php require_once('components/header.php') ?>

    <?php //  echo $data["content"]; ?>

    <div class="page page-tech container">
        <?php foreach($articles as $article){ ?>
            <div class="item <?php echo $n % 2 == 0 ?"item-odd":"" ?>" style="background-image:url('<?php echo $article['thumbnail'];?>')">
            <div class="txt">
                <h3 class="title">
                <?php echo $article['title'];?>
                </h3>
                <p><?php echo $article['summary'];?></p>
                <a href="/technology/detail/<?php echo $article['id'];?>" class="more">了解更多</a>
            </div>
        </div>
        <?php 
            $n++;
            } 
        ?>

<?php if(isset($category)){ ?>
        <div class="item" style="background-image:url('<?php echo $category['thumbnail'];?>')">
            <div class="txt">
                <h3 class="title">
                <?php echo $category['title'];?>
                </h3>
                <p><?php echo $category['description'];?></p>
                <a href="/technology/list/<?php echo $category['id'];?>" class="more">了解更多</a>
            </div>
        </div>
<?php } ?>
    </div>
    

    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

</body>

</html>