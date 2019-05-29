<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/page.php");

$pageClass = new Page();
$data = $pageClass->fetch_data("about");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">
<head>
    <title><?php echo "关于我们-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

       <?php //echo $data["content"];?>

       <div class="striving">

<!--banner-->
<div class="inside_banner about_banner" style="background-image:url(images/about_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">公司简介</h1>
            <p class="wow fadeInLeft">SINCE 1998，中国高端创新医疗解决方案的引领者</p>
        </div>
    </div>
</div>
<!--banner end-->

<!--main-->
    <div class="main">
        <!--about_item_01-->
        <div class="about_item about_item_01" style="background-image:url(images/about_01.jpg)">
            <div class="wrap">
                <h2 class="about_title wow fadeInUp">SINCE  1998</h2>
                <div class="about_desc wow fadeInUp">
                    <p>微创<sup>®</sup>起源于1998年成立的<br/>
                        上海微创医疗器械（集团）有限公司，<br/>
                        是一家中国领先的创新型高端医疗器械集团，<br/>
                        公司现有员工近6,000名，<br/>
                        来自于30多个国家，其中过半数为中国员工。<br/>
                        微创<sup>®</sup>致力于通过持续创新，<br/>
                        为医生提供能挽救并重塑患者生命或<br/>
                        改善其生活质量的真善美惠医疗解决方案。</p>
                </div>
            </div>
        </div>
        <!--about_item_02-->
        <div class="about_item about_item_02 fff" style="">
            <div class="wrap">
                <h2 class="about_title wow fadeInUp">微创<sup>®</sup>在全球</h2>
                <div class="about_desc wow fadeInUp">
                    <p>微创<sup>®</sup>总部位于中国上海张江科学城，在中国上海、苏州、嘉兴、东莞，美国孟菲斯，法国巴黎近郊，意大利米兰近郊和多米尼加共和国等地均建有主要生产（研发）基地，形成了全球化的研发、生产、营销和服务网络。</p>
                </div>
            </div>
            <div class="about_img wow fadeInUp">
                <img src="images/about_02.png"/>
            </div>
        </div>
        <!--about_item_03-->
        <div class="about_item about_item_03" style="background-image:url(images/about_03.jpg)">
            <div class="wrap">
                <h2 class="about_title wow fadeInUp">10大业务，已上市约300个产品</h2>
                <div class="about_desc wow fadeInUp">
                    <p>微创<sup>®</sup>已上市产品约300个<br/>
                        覆盖心血管介入及结构性心脏病医疗、心脏节律管理及电生理医疗、<br/>
                        骨科植入与修复、大动脉及外周血管介入、神经介入及脑科学、糖尿病及内分泌管理、<br/>
                        泌尿及妇女健康、外科手术、医疗机器人与人工智能等十大业务集群。</p>
                </div>
            </div>
        </div>
        <!--about_item_04-->
        <div class="about_item about_item_04 fff" style="background-image:url(images/about_04.jpg)">
            <div class="wrap">
                <h2 class="about_title wow fadeInUp">8秒的辉煌，亿万个精微铸造</h2>
                <div class="about_desc wow fadeInUp">
                    <p>微创<sup>®</sup>的产品已进入全球近万家医院，覆盖亚太、欧洲和美洲等主要地区。<br/>
                        在全球范围内，平均每8秒就有一个微创<sup>®</sup>的产品被用于救治患者生命<br/>
                        或改善其生活品质或用于帮助其催生新的生命。</p>
                    <p>2014年推出的药物靶向洗脱支架系统更是令微创<sup>®</sup>在冠脉支架领域完成了<br/>
                        从追随者和并跑者到全球引领者的跨越。<br/>
                        目前，在冠心病介入治疗、骨科关节、心律管理及大动脉介入治疗等多个分支领域，<br/>
                        微创<sup>®</sup>的市场占有率均位居世界前五。<br/>
                    </p>
                </div>
            </div>
        </div>
        <!--about_item_05-->
        <div class="about_item about_item_05 fff" style="background-image:url(images/about_05.jpg)">
            <div class="wrap">
                <h2 class="about_title wow fadeInUp">百亿的投资，只为不断创新</h2>
                <div class="about_desc wow fadeInUp">
                    <p>微创<sup>®</sup>专注于自主创新并一以贯之高强度投资于研发，<br/>
                        累计研发总投入数百亿元人民币（含海外公司历史累计金额），<br/>
                        现已拥有专利（申请）3,500余项（国外2,000项），先后5次获得中国国家科学技术进步奖<br/>
                        （其中一项为企业创新平台模式奖）和多个省部级科技进步奖，<br/>
                        15个产品进入国家创新医疗器械注册绿色通道（截至2018年12月）；<br/>
                        微创<sup>®</sup>尊崇循证医学，几乎所有核心产品与解决方案的临床应用效果（经验）<br/>
                        都在全球主流学术杂志上得到了发表。</p>
                </div>
            </div>
        </div>
        <!--###-->
        <ul class="about_other_list">
            <li class="clear">
                <div class="img fl" style="background-image:url(images/about_06.jpg)"></div>
                <div class="txt fr wow fadeInUp">
                    <h3>VISION</h3>
                    <p>我们的远景</p>
                    <span class="line"></span>
                    <h2>以人为本</h2>
                    <p>建设一个以人为本的新兴医疗科技超级集群</p>
                </div>
            </li>
            <li class="clear">
                <div class="img fr" style="background-image:url(images/about_07.jpg)"></div>
                <div class="txt fl wow fadeInUp">
                    <h3>MISSION</h3>
                    <p>我们的使命</p>
                    <span class="line"></span>
                    <h2>持续创新</h2>
                    <p>提供能延长和重塑生命的普惠化真善美方案</p>
                </div>
            </li>
        </ul>
        <!--###-->
        <!--about_item_06-->
        <div class="about_item about_item_06 fff" style="background-image:url(images/about_08.jpg)">
            <div class="wrap">
                <h2 class="about_title wow fadeInUp">一个属于患者和医生的品牌</h2>
                <div class="about_desc wow fadeInUp">
                    <p>微创<sup>®</sup>人的创新动力源于一个属于患者和医生的品牌观，<br/>
                        一切经营活动的理念和动机皆源自于患者，为了患者和用之于患者；<br/>
                        一切创新的想法皆取之于医生，为了医生，并归之于医生。<br/>
                        “日月不以毫末而不照，雨露不以草草而不滋”，<br/>
                        微创<sup>®</sup>人坚定地信仰人人都有生而平等的医疗权、健康权和追求活得更久的权利，<br/>
                        并希冀与社会各界通力合作，<br/>
                        为人人享有这种权利而积极创造各种各样的变革性医疗手段。</p>
                </div>
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
           $(".subnav li:nth-of-type(1) a").addClass("active");
        });
    </script>
</body>
</html>