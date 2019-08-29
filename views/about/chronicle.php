<?php
require_once("../../includes/common.php");
require_once("../../data/chronicle.php");

$chronicleClass = new TZGCMS\Chronicle();
$chronicles = $chronicleClass->get_all_chronicles_v1();
$years = $chronicleClass->get_years();
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "发展历程-关于我们-" . $site_info['sitename']; ?></title>
    <?php require_once('../../includes/meta.php') ?>

</head>

<body>
    <?php require_once('../../includes/header.php') ?>
    <?php require_once('includes/header_about.php') ?>
    <?php // echo $data["content"];
    ?>


    <!--main-->
    <div class="page page-about">
        <?php require_once('includes/subnav.php') ?>

        <div class="container">
            <header class="title title-section">
                <h2 class=" wow fadeInUp">发展历程</h2>
            </header>

            <div class="list list-chronicles">
                <?php foreach ($years as $year) { ?>
                    <div class="item">
                        <div class="row">
                            <div class="col-md">
                                <h3 class="year"><?php echo $year['year']; ?></h3>
                                <?php foreach ($chronicles as $course) {
                                    if ($year['year'] === $course['year']) {
                                        ?>
                                        <div class="row li align-items-center">
                                            <div class="col-auto">
                                                <div class="month">
                                                    <?php echo $course['month']; ?>月
                                                </div>                                                
                                            </div>
                                            <div class="col">
                                                <div class="des">
                                                <?php echo $course['description'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="col-md-auto">
                                <div class="pic">
                                <?php foreach ($chronicles as $course) {
                                    if ($year['year'] === $course['year'] && !empty($course['image_url'])) {
                                        ?>
                                         <img src=" <?php echo $course['image_url']; ?>" />                                       
                                    <?php } ?>
                                <?php } ?>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>



            </div>
        </div>
    </div>
    <!--main end-->

    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
          //  $(".mainav li:nth-of-type(1)").addClass("active");
          //  $(".subnav nav div:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>

</html>