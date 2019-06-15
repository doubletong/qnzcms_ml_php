<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/team.php");

$teamClass = new Team();
$teams = $teamClass->get_all_teams();

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "全球管理团队-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="striving">

<!--banner-->
<div class="inside_banner about_banner" style="background-image:url(images/about_team_banner.jpg)">
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
        <div class="about_team_t">
            <div class="wrap">
                <h2 class="wow fadeInUp">我们的员工</h2>
                <ul class="clear wow fadeInUp">
                    <li>
                        <div class="icon">
                            <img src="images/about_team_icon_01.png"/>
                        </div>
                        <p>6000<span>名</span></p>
                        <i>微创<sup>®</sup>在职员工</i>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="images/about_team_icon_02.png"/>
                        </div>
                        <p>30<span>个</span></p>
                        <i>员工来自30个不同国家</i>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="images/about_team_icon_03.png"/>
                        </div>
                        <p>>50<span>%</span></p>
                        <i>中国员工占比</i>
                    </li>
                </ul>
           </div>
        </div>
        <div class="about_team_c">
            <div class="wrap">
                <h2 class="wow fadeInUp">组织架构</h2>
                <p class="wow fadeInUp">微创医疗科学有限公司旗下的业务由大中华地区和除大中华地区以外的微创<sup>®</sup>业务构成，<br/>分别由大中华执行委员会和两个洲际执行委员会领导和协调。</p>
                <div class="about_team_c_wrap wow fadeInUp">
                    <img src="images/about_team_jg.jpg" alt=""/>
                </div>
            </div>
        </div>
        <div class="about_team_b">
            <div class="wrap">
                <h2 class="wow fadeInUp">管理层档案</h2>
                <div class="tab_nav wow fadeInUp">
                    <ul class="clear">
                        <li class="active">董事局</li>
                        <li>全球管理委员会</li>
                        <li>协同委员会</li>
                        <li>大中华执行委员会</li>
                        <li>洲际骨科执行委员会</li>
                        <li>洲际心律管理委员会</li>
                    </ul>
                </div>
                <div class="about_team_b_list wow fadeInUp">
                    <ul class="clear about_team_b_item active">
                        <?php foreach($teams as $team) {
                            if($team['dictionary_id'] == 7){                            
                            ?>
                        
                        <li>
                            <div class="img">
                                <img src="<?php echo $team['photo']; ?>" alt=""/>
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
                    <ul class="clear about_team_b_item">
                    <?php foreach($teams as $team) {
                            if($team['dictionary_id'] == 8){                            
                            ?>
                        
                        <li>
                            <div class="img">
                                <img src="<?php echo $team['photo']; ?>" alt=""/>
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
                    <ul class="clear about_team_b_item">
                    <?php foreach($teams as $team) {
                            if($team['dictionary_id'] == 9){                            
                            ?>
                        
                        <li>
                            <div class="img">
                                <img src="<?php echo $team['photo']; ?>" alt=""/>
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
                    <ul class="clear about_team_b_item">
                    <?php foreach($teams as $team) {
                            if($team['dictionary_id'] == 10){                            
                            ?>
                        
                        <li>
                            <div class="img">
                                <img src="<?php echo $team['photo']; ?>" alt=""/>
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
                    <ul class="clear about_team_b_item">
                    <?php foreach($teams as $team) {
                            if($team['dictionary_id'] == 11){                            
                            ?>
                        
                        <li>
                            <div class="img">
                                <img src="<?php echo $team['photo']; ?>" alt=""/>
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
                    <ul class="clear about_team_b_item">
                    <?php foreach($teams as $team) {
                            if($team['dictionary_id'] == 12){                            
                            ?>
                        
                        <li>
                            <div class="img">
                                <img src="<?php echo $team['photo']; ?>" alt=""/>
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