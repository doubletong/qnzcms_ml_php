<?php

require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");
require_once("data/article.php");

$articleClass = new Article();
$articles = $articleClass->fetch_category(1);

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "媒体关注-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="page-news">
<?php require_once('includes/header_news.php') ?>


<div class="container s1">
            <section class="linklist">
                <a href="#" target="_blank" class="link">
                    <h3 class="linktitle">
                        Health New Jkb.com
                    </h3>
                    <p class="des">Nanjing CR Medicon Expands Partnership with Medidata to Accelerate Clinical Development in China</p>
                    <p class="note">Aug 22，2018 | Healthcare</p>
                </a>
                <a href="#" target="_blank" class="link">
                    <h3 class="linktitle">
                        Yywsb.com
                    </h3>
                    <p class="des">Nanjing CR Medicon Expands Partnership with Medidata to Accelerate Clinical Development in China</p>
                    <p class="note">Aug 22，2018 | Healthcare</p>
                </a>
                <a href="#" target="_blank" class="link">
                    <h3 class="linktitle">
                        Health New Jkb.com
                    </h3>
                    <p class="des">Nanjing CR Medicon Expands Partnership with Medidata to Accelerate Clinical Development in China</p>
                    <p class="note">Aug 22，2018 | Healthcare</p>
                </a>
                <a href="#" target="_blank" class="link">
                    <h3 class="linktitle">
                        Health New Jkb.com
                    </h3>
                    <p class="des">Nanjing CR Medicon Expands Partnership with Medidata to Accelerate Clinical Development in China</p>
                    <p class="note">Aug 22，2018 | Healthcare</p>
                </a>
                <a href="#" target="_blank" class="link">
                    <h3 class="linktitle">
                        Health New Jkb.com
                    </h3>
                    <p class="des">Nanjing CR Medicon Expands Partnership with Medidata to Accelerate Clinical Development in China</p>
                    <p class="note">Aug 22，2018 | Healthcare</p>
                </a>
            </section>

        </div>


    </div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(5) a").addClass("active");
           $(".mainav li:nth-of-type(5) a").addClass("active");
           $(".subnav li:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>
</html>