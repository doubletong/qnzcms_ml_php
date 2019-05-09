<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("laws");


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "患者故事-" . SITENAME; ?></title>
    <?php require_once('includes/meta.php') ?>

</head>

<body>
    <?php require_once('includes/header.php') ?>
    <div class="banner banner-story-detail" style="background-image:url(../img/temp/b1.jpg)">
        <div class="container page-title">
          
            <p>贝琪  <span>|</span>  美国 西棕榈滩</p>
            <h1>SuperPath® 技术接受者</h1>
        </div>
    </div>
    <div class="page page-story-detail">
        <div class="container">
            <p>贝琪，一位63岁的西棕榈滩居民，再也不会把“小事情”当作理所当然了。当很多人觉得，在交谈中翘个二郎腿、快速地上下车又或者在一个温暖的夏天悠闲地散个步，是些平常不过的事情的时候，这些简单的活动曾经一度对贝琪来说是不可能的。
            </p>
            <p>
                很多年以来，贝琪已经习惯了和孩子们一起工作，以及和他们一起在地上打滚。但是在2010年的时候，贝琪开始感觉到髋关节的疼痛。非处方药物暂时缓解了疼痛，并且使她可以活动。但是症状出现两年后，贝琪陷入了剧烈的疼痛，以至于她已经无法上下楼梯。
            </p>
            <p>
                2012年初期，疼痛让贝琪开始衰弱，于是她意识到该做些什么了。在波因顿海滩，贝琪参加了骨外科协会埃尔维斯·格兰迪可医生主办的研讨会之后，为了了解更多关于微创医疗SuperPath®全髋关节置换技术的知识，咨询了格兰迪可医生。格兰迪可医生向贝琪解释说，因为在SuperPath®手术中，髋关节不会脱臼，所以她经历的术后疼痛更少，恢复时间更快。
            </p>
            <p>
                在2012年1月，格兰迪可医生用SuperPath® 技术来替换贝琪的左髋关节。SuperPath® 技术，是一种植入物植入身体内的外科手术方法，因此髋关节不会在手术中脱臼或者扭曲成不自然的位置——这是其他髋关节手术中常见的一个现象。SuperPath® 手术过程使外科医生考虑到每一个患者独特的骨骼解剖结构，选择最合适的植入，并且，只有在必要时，才选择性地在手术中释放单个肌腱。
            </p>
            <p>
                当贝琪术后醒来时，她发现她不再感受到任何疼痛。更值得关注的是，在大手术结束后的几个小时内，她已经可以站立并且行走了。手术后三天，贝琪就出院了。
            </p>
            <p>
                贝琪让自己全身心投入了物理治疗，而且迅速地康复了。事实上，她进展地很好。在格兰迪可医生对她做的术后检查中，她把用SuperPath® 技术来替换她右髋关节的手术时间定在了三月。那个手术也同样很成功。“选择用SuperPath® 技术替换两个髋关节是我做过最好的决定。”贝琪说，“我再也不疼了，而且我现在比从前还灵活，简直太棒了！”</p>
        </div>



    </div>

    <?php require_once('includes/footer.php') ?>

    <?php require_once('includes/scripts.php') ?>

    <script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(3) a").addClass("active");
            $(".mainav li:nth-of-type(3) a").addClass("active");
            $(".subnav li:nth-of-type(1) a").addClass("active");
        });
    </script>
</body>

</html>