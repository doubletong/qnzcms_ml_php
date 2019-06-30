<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/team.php");

$teamClass = new Team();
if(isset($_GET['id'])){
    $id = $_GET['id'];   
    $data = $teamClass->fetch_data( $id);
    $teams = $teamClass->get_related_teams($id,$data['dictionary_id']);
  
}else{
    header('Location: /team');
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
    <title><?php echo $data['name']."-全球管理团队-关于我们-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="striving">

<!--banner-->
<div class="inside_banner about_team_detail_banner">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft"><?php echo $data['name']; ?></h1>
                <p class="wow fadeInLeft"><?php echo $data['post']; ?></p>
            </div>
            <div class="inside_banner_img wow fadeInRight" style="background-image:url(<?php echo $data['fullphoto']; ?>)"></div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main about">
        <div class="wrap">
            <div class="about_team_detail">
                <div class="about_team_detail_desc wow fadeInUp">
                <?php echo $data['content']; ?>
                
                </div>
            </div>
        </div>
        <div class="about_team_detail_other">
            <h3 class="wow fadeInUp">其它管理层档案</h3>
            <div class="about_team_detail_list wow fadeInUp">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach ($teams as $item) {?>
                            <div class="swiper-slide">
                            <div class="img">
                                <img src="<?php echo $item['photo']; ?>" alt="<?php echo $item['name']; ?>"/>
                            </div>
                            <div class="txt">
                                <h4><?php echo $item['name']; ?></h4>
                                <p><?php echo $item['post']; ?></p>
                                <a href="/team-detail-<?php echo $item['id']; ?>">了解更多</a>
                            </div>
                        </div>
                            <?php }?>
                            
                    </div>
                    <div class="about_team_detail_controls">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--main end-->
</div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
    //  var swiper = new Swiper('.swiper-container', {
    //     pagination: '.swiper-pagination',
    //     slidesPerView: 5,
    //     centeredSlides: true,
    //     loop:true,
    //     paginationClickable: true,
    //     spaceBetween: '1%',
    //     prevButton:'.swiper-button-prev',
    //     nextButton:'.swiper-button-next'
    // });
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(2) a").addClass("active");
           $(".mainav li:nth-of-type(2) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>