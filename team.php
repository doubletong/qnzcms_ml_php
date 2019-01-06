<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/team.php");

$teamClass = new Team();
$teams = $teamClass->fetch_category("核心团队");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "核心团队-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

<div class="page-about">
    <?php require_once('includes/header_about.php') ?>
    <div class="container s3">
            <div class="content">
                <div class="row">
                    <?php foreach($teams as $team){ ?>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="<?php echo $team["photo"]; ?>" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3><?php echo $team["name"]; ?></h3>
                                        <div class="post">
                                        <?php echo $team["post"]; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                        <?php echo $team["content"]; ?>
                        </div>
                    </div>
                    <?php } ?>

                    
                </div>
            </div>
        </div>
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(2) a").addClass("active");
           $(".mainav li:nth-of-type(2) a").addClass("active");
           $(".subnav li:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>
</html>