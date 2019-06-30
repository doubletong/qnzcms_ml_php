<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/team.php");
require_once("data/page.php");
require_once("data/dictionary.php");

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
    <title><?php echo "全球管理团队-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>


    <div class="striving">

        <!--banner-->
        <div class="inside_banner about_banner" style="background-image:url(<?php echo $data["background_image"]; ?>)">
            <div class="wrap clear">
                <div class="inside_banner_txt pos_center">
                    <h1 class="wow fadeInLeft">全球管理团队</h1>
                    <p class="wow fadeInLeft">最优质的管理团队，最优质的产品</p>
                </div>
            </div>
        </div>
        <!--banner end-->

        <!--main-->
        <div class="main about_team">
            <?php echo $data["content"]; ?>


            <div class="about_team_b">
                <div class="wrap">
                    <h2 class="wow fadeInUp">管理层档案</h2>
                    <div class="about_team_nav wow fadeInUp">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php foreach ($categories as $category) {
                                    if ($n == 0) {
                                        ?>
                                        <div class="swiper-slide active"><?php echo $category['title']; ?></div>
                                    <?php
                                } else {
                                    ?>
                                        <div class="swiper-slide"><?php echo $category['title']; ?></div>
                                    <?php
                                }
                                ?>
                                    <?php
                                    $n++;
                                } ?>

                            </div>
                        </div>
                        <div class="about_team_nav_controls">
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                    <div class="about_team_b_list wow fadeInUp">

                    <?php foreach ($categories as $category) {                                 
                                        ?>
                        <ul class="clear about_team_b_item <?php echo $m===0?"active":""; ?>  <?php echo $category['id'];?>">
                            <?php foreach ($teams as $team) {
                                if ($team['dictionary_id'] === $category['id']) {
                                    ?>

                                    <li>
                                        <div class="img">
                                            <img src="<?php echo $team['photo']; ?>" alt="" />
                                        </div>
                                        <div class="txt">
                                            <h4><?php echo $team['name']; ?></h4>
                                            <p><?php echo $team['post']; ?></p>
                                            <a href="team-detail-<?php echo $team['id']; ?>">了解更多</a>
                                        </div>
                                    </li>
                                <?php }
                        }
                        ?>

                        </ul>
                        <?php
                                    $m++;
                                } ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--main end-->
    </div>

    <?php require_once('includes/footer.php') ?>
    <?php require_once('includes/scripts.php') ?>

    <script>
        domTab('.about_team_b_item')
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(2) a").addClass("active");
            $(".mainav li:nth-of-type(2) a").addClass("active");
            $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>

</html>