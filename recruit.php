<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("biologic");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo "职业发展-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>

</head>
<body>
<?php require_once('includes/header.php') ?>
<?php //echo $data["content"];?>    
   

<div class="striving">
<!--banner-->
<div class="inside_banner about_banner" style="background-image:url(/images/about_career_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">职业发展</h1>
            <p class="wow fadeInLeft">一点二道三划，助力人才发展成长</p>
        </div>
    </div>
</div>
<!--banner end-->

<!--main-->
<div class="main recruit">
    <ul class="about_duty_item_list recruit_list">
        <li class="clear wow fadeInUp">
            <div class="img">
                <img src="/images/recruit_01.jpg" alt=""/>
            </div>
            <div class="txt">
                <h3>一点：人才盘点</h3>
                <p>公司每年进行一次管理人员岗位胜任能力盘点流程，通过多维、多样的人才评估工具和方式，识别出将星人才、明星人才、新星人才，对于出类拔萃的人才给予及时肯定，并为其创造更多的职业发展机会。</p>
            </div>
        </li>
        <li class="clear wow fadeInUp">
            <div class="img">
                <img src="/images/recruit_02.jpg" alt=""/>
            </div>
            <div class="txt">
                <h3>二道：双通道职业发展路径</h3>
                <p>公司设有双通道职业发展路径，旨在鼓励并引导员工选择适合自己发展的通道类型：领导管理类或专业技术类，而且两大类通道下设了六种子通道，员工可在不同领域充分发挥个人特长，实现个人最大价值。同时，通过在双通道中设置职位发展层级及对应的任职资格标准，帮助大家在公司的宽广平台上不断进取、最终获得自身职业发展的成功。</p>
            </div>
        </li>
        <li class="clear wow fadeInUp">
            <div class="img">
                <img src="/images/recruit_03.jpg" alt=""/>
            </div>
            <div class="txt">
                <h3>三划：三划人才</h3>
                <p>技术创新是企业的核心竞争力，高科技人才则是企业可持续发展的关键。为吸引行业领军人才加盟公司，完善内部人才梯队建设，我们拥有针对处于不同成长阶段的技术人才的激励计划：双十企业领军人才计划、双十新生代领头雁人才计划、百人雏鹰培育人才计划。对于专业人才比如临床注册类，也拥有赤兔、蛟龙人才计划。希望通过这类人才计划激励更多专业技术人才发挥所长、释放潜能，与公司共同长期成长。</p>
            </div>
        </li>
    </ul>
</div>
<!--main end-->
</div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
   $('.about_duty_item_list').each(function(){
        $(this).find('li:odd').addClass('odd')
    })
       
    </script>
</body>
</html>