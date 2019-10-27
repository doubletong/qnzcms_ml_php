<?php
require_once("../../includes/common.php");
require_once("../../data/case.php");

$caseClass = new TZGCMS\CaseShow();
$categories = $caseClass->get_all_categories();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $caseClass->get_case_by($id);
    $prev = $caseClass->fetch_prev_data($id);
    $next = $caseClass->fetch_next_data($id);
} else {
    header('Location: /cases');
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

    <div class="page page-application container">
        <div class="title title-list">
            <h3>应用案例</h3>
        </div>

        <div class="case-categories  wow fadeInUp">
            <div class="row no-gutters">
                <div class="col-md">
                    <a href="/application/cases" class="<?php echo empty($data['categoryid']) ? "active" : ""; ?>">全部案例</a>
                </div>
                <?php foreach ($categories as $category) { ?>
                    <div class="col-md">
                        <a href="/application/cases/<?php echo $category['id']; ?>" class="<?php echo $data['categoryid'] == $category['id'] ? "active" : ""; ?>">
                            <?php echo $category['title']; ?>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>


        <!--news_detail-->

        <div class="case-detail">
            <h1 class="title">
                <?php echo $data['title']; ?>
            </h1>

            <article class="wow fadeInUp">
                <?php echo $data['body']; ?>
                


               
            </article>


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