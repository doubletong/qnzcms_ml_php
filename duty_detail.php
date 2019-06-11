<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/team.php");

// $teamClass = new Team();
// $teams = $teamClass->fetch_category("核心团队");

?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "企业经营维度-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

<div class="striving">

<!--banner-->
<div class="inside_banner news_detail_banner" style="background-image:url(/images/about_duty_detail_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <div class="clear">
                    <span class="source wow fadeInLeft">企业经营维度</span>
                </div>
                <h1 class="wow fadeInLeft">创新平台</h1>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main about">
        <div class="wrap">
            <!--about_duty_detail-->
           <div class="about_duty_detail wow fadeInUp">
               <p>微创<sup>®</sup>为所有微创人提供1+12+1创新与产业化平台，以最少的资源、最低的代价、在最短时间内开发尽可能多的高科技产品。</p>
               <p>一个信息接收“前台”，作为与市场和学术交流创新的对接窗口；一个学术支撑“后台”，是基于大数据信息支撑下，为集团内外的实体业务提供多元化的服务保障；12个高度细分与专业化的平台贯穿了从“医生创意”到“产品生成”再到“医生培训”各个关键环节，形成了“从医生到医生”的创新产业链闭环。 </p>
               <p>微创<sup>®</sup>还连接创新链上游-高校和下游-医院，从而打通整个产业链的创新端口，提供国际领先的创新平台。经过长时间对产学研合作模式的探索，在产业链的上游，微创<sup>®</sup>集团与上海理工大学、上海交通大学等高校建立了产学研联盟，凭借在医疗器械领域的学术优势，上海理工大学向微创<sup>®</sup>集团培养并输送了大量的专业技术人才，增强企业技术能力；依靠上海交通大学在基础材料上的雄厚优势，帮助创新产品在原材料革新上的突破，改变医疗器械产业产品原材料完全依靠国外进口的局面。</p>
               <p>在产业链的下游，公司先后与上海中山医院、上海长海医院及北京阜外心血管病医院建立战略合作关系。这些医院分别是上海及北京在微创伤介入治疗水平最高的医疗机构，由它们承担临床试验可保证新产品上市后在中国市场上快速推广应用。</p>
           </div>
            <!--about_duty_detail end-->
        </div>
    </div>
<!--main end-->
</div>

<?php require_once('includes/footer.php') ?>
<?php require_once('includes/scripts.php') ?>

<script>
     $('.about_duty_nav li').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        $('.about_duty_item').eq($(this).index()).addClass('active').siblings().removeClass('active');
    });
    $('.about_duty_item_list').each(function(){
       $(this).find('li:odd').addClass('odd')
    })

        $(document).ready(function() {
            $(".leftnav li:nth-of-type(2) a").addClass("active");
           $(".mainav li:nth-of-type(2) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>