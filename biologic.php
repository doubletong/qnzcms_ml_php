<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("biologic");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "生物样本分析-".SITENAME; ?></title>    
    <link rel="stylesheet" href="plugins/owl/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owl/assets/owl.theme.default.min.css">
    <?php require_once('includes/meta.php') ?>

</head>
<body>
<?php require_once('includes/header.php') ?>
<div class="page-service">
<?php require_once('includes/header_service.php') ?>

<?php echo $data["content"];?>    
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>
<script src="plugins/owl/owl.carousel.min.js"></script>
<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
           $(".mainav li:nth-of-type(3) a").addClass("active");
           $(".subnav li:nth-of-type(6) a").addClass("active");

           $('.owl-carousel').owlCarousel({
                center: true,
                nav: true,
                items: 2,
                loop: true,
                margin: 10,
                responsive: {
                    768: {
                        items: 4
                    },
                    992: {
                        items: 5
                    },
                    1400: {
                        items: 6
                    }
                }
            });
        });

       
    </script>
</body>
</html>