<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/case.php");
require_once('includes/PDO_Pagination.php');

$caseClass = new CaseShow();
$caseCategories = $caseClass->get_case_categories();


$pagination = new PDO_Pagination(db::getInstance());
$model = array();
$pagination->config(6, 12);

if (isset($_GET['cid'])) {
    $category = $_GET['cid'];
    $pagination->param =  "&cid=".$category;
    $pagination->rowCount("SELECT * FROM cases WHERE categoryid = '$category '");

    $sql = "SELECT id,title,thumbnail,pubdate FROM cases WHERE categoryid = '$category ' ORDER BY importance DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query = db::getInstance()->prepare($sql);
    $query->execute();
    while ($rows = $query->fetch()) {
        $model[] = $rows;
    }

} else {

    $pagination->rowCount("SELECT * FROM cases");

    $sql = "SELECT id,title,thumbnail,pubdate FROM cases ORDER BY importance DESC  LIMIT $pagination->start_row, $pagination->max_rows";
    $query = db::getInstance()->prepare($sql);
    $query->execute();
    while ($rows = $query->fetch()) {
        $model[] = $rows;
    }
}


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "案例展示-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="page-cases">
        <div class="container-fluid top1">
        <div class="page-title wow slideInUp">
            <h1>案例展示</h1>
            <h3>case</h3>
        </div>
            <div class="row categories wow slideInUp">
                <?php foreach ($caseCategories as $cate) {
                    ?>
                    <div class="col-6 col-sm-4 col-md-4 col-lg-2">
                        <div class="item">
                            <div class="icon">
                                <a href="/cases?cid=<?php echo $cate["id"]; ?>" title="<?php echo $cate["title"]; ?>" >
                                    <img src="<?php echo $cate["imageurl"];  ?>" alt="<?php echo $cate["title"]; ?>" />
                                </a>
                            </div>
                            <h3><a href="/cases?cid=<?php echo $cate["id"]; ?>" title="<?php echo $cate["title"]; ?>" ><?php echo $cate["title"]; ?></a></h3>
                            <small><?php echo $cate["title_en"]; ?></small>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row caselist">
                <?php foreach ($model as $article) { ?>

                    <div class="col-md-4">
                        <div class="item wow slideInUp">
                            <a href="/cases/detail-<?php echo $article['id']; ?>" title="<?php echo $article['title']; ?>">
                                <img src="<?php echo $article['thumbnail']; ?>" alt="<?php echo $article['title']; ?>" />
                                <div class="txt">
                                    <h3>
                                        <?php echo $article['title']; ?></h3>

                                    <p class="date">
                                        <i class="iconfont icon-time"></i> <?php echo date('Y-m-d', $article['pubdate']); ?>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>

                <?php } ?>





            </div>

            <ul class="pagination wow slideInUp">
                <?php
                $pagination->pages("btn");
                ?>
            </ul>
        </div>


    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");

        });
    </script>
</body>

</html>