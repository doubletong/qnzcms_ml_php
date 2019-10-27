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
  


    <!--main-->
    <div class="page page-chronicle">


        <div class="container">          

            <div class="list list-chronicles">
                <?php foreach ($years as $year) { ?>
                    <div class="item">
                      
                         
                                <h3 class="year"><?php echo $year['year']; ?></h3>
                                <ul>
                                <?php foreach ($chronicles as $course) {
                                    if ($year['year'] === $course['year']) {
                                        ?>
                                        <li>
                                        
                                                <span class="month">
                                                    <?php echo $course['month']; ?>月
                                                </span>                                                
                                         
                                             
                                                <?php echo $course['description'] ?>
                                              
                                         
                                    </li>
                                    <?php } ?>
                                <?php } ?>
                                </ul>
                      
                          
                      
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