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
    <title><?php echo "管培生计划-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

<div class="striving">
<!--banner-->
<div class="inside_banner about_branch_banner" style="background-image:url(images/about_career_plan_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">管培生计划</h1>
            <p class="wow fadeInLeft">我们欢迎有志青年才俊踊跃加入到这个伟大的事业中来<br/>不仅让人们活得更久，而且活得有品质、有尊严</p>
        </div>
    </div>
</div>
<!--banner end-->

<!--main-->
<div class="main about">
    <div class="wrap">
        <div class="about_college_detail wow fadeInUp">
            <p>科技，不管如何发展，惟有当其能用于延长或改善人类自身生命时，才能获得其终极意义。</p>

            <p>因食品供应的充足和卫生条件的改善使人类目前的平均生命趋近于80岁，而单凭医疗科技的创新将极可能把人类平均寿命提升到115岁！微创医疗以对生命的敬畏投身医疗器械领域，“微创人”对自己的产品至始至终都拥有源于内心的敬畏、尊重、珍视和自豪感，因为每件产品都凝聚了一大批人至少8年的心血，也因为我们认为每件产品都是“科学技术- 工匠精神 - 艺术品味 - 自由思想 - 人文情怀”五位一体的天合之作。我们时刻牢记我们研发制造的不仅是好用的产品，更是为了挽救患者的生命或改善其生活品质。</p>

            <p>我们依靠“才-财”汇聚推动战略目标实现，秉持“质量，诚信，责任，效率，创新，争先，敬业，协作”的八大价值观。 倡导“容错”“试错”的创新理念。通过实施“一点二道三划”使微创医疗人才资源得到持续的增长。为“想干事、会干事、能干事”的各个层级、各个岗位的微创人创造必要的物理条件，切实做到让“想干事的人有机会，能干事的人有舞台，干成事的人有地位”，多视角发现挖掘培养和保留人才。</p>

            <p>我们欢迎有志青年才俊踊跃加入到这个伟大的事业中来，不仅让人们活得更久，而且活得有品质、有尊严！</p>

            <p>微创医疗管培生计划的目标是在国内985、211院校以及国外知名高等学府内招募优秀的专业人才，为集团及子公司储备新生力量，夯实多元化的专业人才基础；培养基层和中层管理与专业技术岗位的内部继任人才，从而促进集团及子公司核心部门的人才梯队建设。</p>

            <p>微创医疗管培生计划是针对内部所有部门开设的，共计约三十多个部门涉及研发、品质、注册、临床、生产工程、市场、营销、商务、运营、职能支持等几十多个岗位，为管培生计划人才提供了大量的职业发展机会；同时，管培生2年轮岗期间可以在部门内部、跨部门、跨城市、跨国家的参与到不同的项目以及从事不同的工作，从而快速提升个人的综合素质及工作能力，为真正成为全球化、多元化的人才打下坚实的基础。</p>

            <p>更多信息请联系 shenyi@microport.com</p>
        </div>
    </div>
</div>
<!--main end-->
</div>


<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
    

        $(document).ready(function() {
            $(".leftnav li:nth-of-type(2) a").addClass("active");
           $(".mainav li:nth-of-type(2) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>