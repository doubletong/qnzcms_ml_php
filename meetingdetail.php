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
    <title><?php echo "会议信息-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>


<div class="page-news">
<?php require_once('includes/header_news.php') ?>

<div class="container news-detail">
            <header class="news-header">
                <h1>希麦迪建立PK分析实验室，加速推进生物样本分析领域布局</h1>
                <p>2018.07.24 11:33:49</p>
            </header>
            <article class="news-body">
                <ul class="deslist">
                    <li><span>会议主办：</span>上海美迪西生物医药股份有限公司
                    </li>
                    <li><span>会议协办：</span>《药学进展》编辑部|中国药科大学归国华侨联合会 |江苏省生物化学与分子生物学学会
                    </li>
                    <li><span>会议时间：</span>07月12日
                    </li>
                    <li><span>会议地点：</span>南京市江宁区（成功报名后发送具体地点）
                    </li>
                    <li><span>会议内容：</span>涵盖临床前一站式服务，从LEADs(先导化合物)到PCCs(临床前候选化合物)，再到IND(申请临床研究批件)国内外申报</li>
                </ul>
                <p>希麦迪医药在南京江宁总部基地新建生物分析实验室，该实验室占地面积超过1000㎡，于2018年5月正式投入运营，可支持全套临床样品生物分析服务：包括全方位先进的分析方法开发、分析方法验证以及样品分析等。从成立到现在, 我们已经开始在小分子化学药物临床及仿制药生物等效性实验等领域为客户提供准确而高质量的分析服务，此过程中的生物分析遵从FDA/CFDA GLP规范，符合审计的精准需求。</p>
            </article>

        </div>

    </div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(5) a").addClass("active");
           $(".mainav li:nth-of-type(5) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>