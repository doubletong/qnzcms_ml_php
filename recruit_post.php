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
    <title><?php echo "管培生计划-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>

</head>
<body>
<?php require_once('includes/header.php') ?>
<?php //echo $data["content"];?>    
   

<div class="striving">
<!--banner-->
<div class="inside_banner about_banner" style="background-image:url(images/recruit_post_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">职位申请</h1>
            <p class="wow fadeInLeft">我们期待你的加入！</p>
        </div>
    </div>
</div>
<!--banner end-->


<!--main-->
<div class="main about_career">
    <div class="recruit_post_t">
        <div class="wrap">
            <h3 class="wow fadeInUp">我们的招聘流程</h3>
            <ul class="clear wow fadeInUp">
                <li>
                    <div class="icon">
                        <img src="images/recruit_post_icon_01.png"/>
                    </div>
                    <h4>职位申请</h4>
                    <div class="desc">
                        <p>您可以通过职位搜索了解您感兴趣的职位。当您找到心仪的职位后，您可以点击“申请职位”，根据提示进行注册和投递简历，简历成功投递后，您将收到一封确认电子邮件。</p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/recruit_post_icon_02.png"/>
                    </div>
                    <h4>面试</h4>
                    <div class="desc">
                        <p>我们的人才招聘团队将评估各空缺职位的候选人简历。您的申请入选后，我们的招聘团队人员会和您联络安排初步电话面试。之后如果您进入下一轮面试，我们将会进一步联系您。此网站提供大量信息，帮助您准备面试。您可以通过网站了解公司的历史、业务领域及公司文化等。 </p>
                    </div>
                </li>
                <li>
                    <div class="icon">
                        <img src="images/recruit_post_icon_03.png"/>
                    </div>
                    <h4>录用</h4>
                    <div class="desc">
                        <p>如您顺利通过全部面试环节，成为我们有意聘用的职位候选人，您将收到由我们的人才招募团队发送的录用通知书。该通知书将告知您回复是否接受录用的截止时间，以及应如何回复接受或拒绝录用。</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="about_career_b">
        <ul class="clear">
            <li class="wow fadeInUp">
                <div class="img">
                    <img src="images/recruit_post_01.jpg" alt=""/>
                </div>
                <div class="txt">
                    <h3>国内职位</h3>
                    <a href="" target="_blank">立即申请</a>
                </div>
            </li>
            <li class="wow fadeInUp">
                <div class="img">
                    <img src="images/recruit_post_02.jpg" alt=""/>
                </div>
                <div class="txt">
                    <h3>国外职位</h3>
                    <a href="" target="_blank">立即申请</a>
                </div>
            </li>
        </ul>
    </div>

</div>
<!--main end-->

</div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>

       
    </script>
</body>
</html>