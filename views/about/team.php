<?php
require_once("../../includes/common.php");
require_once("../../data/team.php");
require_once("../../data/page.php");
require_once("../../data/dictionary.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("teams");

$teamClass = new Team();
$teams = $teamClass->get_all_teams();

$dicClass = new Dictionary();
$categories = $dicClass->get_dictionaries_byid(4);
$n = 0;
$m = 0;
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "领导团队-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>

    <?php require_once('includes/header_about.php') ?>

    <!--main-->
    <div class="page page-about">
        <?php require_once('includes/subnav.php') ?>
        <?php  // echo $data["content"]; 
        ?>


        <div class="container">
            <header class="title title-section">
                <h2 class=" wow fadeInUp">领导团队</h2>
            </header>
            <div class="teams">
                <p class="importance-des">我们怀着共同的情怀与理想走到一起<br />
                    希望通过凝聚更多的社会管理精英及科学家精英<br />
                    为了实现药物的创新及为百姓带去解决疾病痛苦的诊疗方案而做出自己的努力</p>



                <div class="list list-teams wow fadeInUp">

                    <?php foreach ($categories as $category) { ?>
                       <div class="box">
                        <h3 class="title title-small">
                            <?php echo $category['title']; ?>
                        </h3>

                        <div class="row">
                            <?php foreach ($teams as $team) {
                                if ($team['dictionary_id'] === $category['id']) {
                                    ?>

                                    <div class="col-md col-md-6 col-lg-4">
                                        <div class="item">
                                            <div class="pic">
                                                <img src="<?php echo $team['photo']; ?>" alt="" />
                                            </div>
                                            <div class="txt">
                                                <h4><?php echo $team['name']; ?></h4>
                                                <p><?php echo $team['post']; ?></p>                                             
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            }
                            ?>

                        </div>
                        </div>
                    <?php } ?>

                </div>
           
            </div>
        </div>
    </div>


    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

    <script>
     
        $(document).ready(function() {
           // $(".mainav li:nth-of-type(1)").addClass("active");
           // $(".subnav div:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>

</html>