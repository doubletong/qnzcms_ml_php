<?php
require_once("includes/common.php");
require_once("includes/output.php");
require_once("config/db.php");


?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "企业愿景-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

<div class="page-about">
    <?php require_once('includes/header_about.php') ?>
    <div class="container s3">
            <div class="content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/yh.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>尤红</h3>
                                        <div class="post">
                                            科学顾问委员会主席
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>白求恩医科大学临床医学专业学士</dd>
                                <dd>吉林大学行政管理硕士，法学博士</dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>1995-2000, 任白求恩医科大学党委副 书记、副校长、工会主席等职务

                                </dd>
                                <dd>2000-2002, 任卫生部干部培训中心副主任、党校副校长、办公厅新闻办 公室主任等职务

                                </dd>
                                <dd>2002-至今, 任中国康复研究中心党委书记、中心副主任，首都医科大学，康复医学院院长，中国残联办公厅主任、康复部主任等职务
                                </dd>
                            </dl>
                            <h4>职业荣誉</h4>
                            <dl>
                                <dd>参与并主持了中国狮子联会代表大会、国际自闭症康复会议等多次重要会议发起组织了多个公益项目 </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/mw.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>Michael Wang</h3>
                                        <div class="post">
                                            科学顾问委员会副主席
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>医科大学学士
                                </dd>
                                <dd>日本京都大学分子生物学博士
                                </dd>
                                <dd>宾夕法尼亚州立大学工商管理硕士</dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>2002 年加入美国癌症研究基金会（NFCR）之前，在全球领先的技术转让公司——British Technology Group (BTG) 担任肿瘤组，基因和蛋白质组的高级业务拓展经理

                                </dd>
                                <dd>作为首席科学官，全面负责癌症研究基金会癌症研究项目和研究行动计划组的工作


                                </dd>
                                <dd>亚洲癌症研究基金会（Asian Fund for Cancer Research）的首席运营官
                                </dd>
                            </dl>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/jwm.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>Judd W. Moul</h3>
                                        <div class="post">
                                            医学顾问委员
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>1978/09-1982/06，托马斯杰斐逊大学医学博士
                                </dd>
                                <dd>1982/06-1987/06，沃特尔•里德国家军事医学中心泌尿外科专科医生 </dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>1978-2004，美国陆军上尉，少校，中校，上校
                                </dd>
                                <dd>1989-2004，美国军医大学外科教授，美国特尔•里德国家军事医学中心泌尿外科前列腺中心主任

                                </dd>
                                <dd>2004/08 起，杜克大学医学中心外科系泌尿科主任，教授 </dd>
                            </dl>
                            <h4>职业荣誉</h4>
                            <dl>
                                <dd>国际著名的前列腺病专家，发表论文500余篇
                                </dd>
                                <dd>前列腺病杂志主编
                                </dd>
                                <dd>美国国防部前列腺病研究中心主任，杜克大学前列腺中心主任
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/jk.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>金拓</h3>
                                        <div class="post">
                                            药学顾问委员
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>1981，南开大学化学系化学学士

                                </dd>
                                <dd>1985，日本北海道大学理学院物理化学博士
                                </dd>
                                <dd>1997，加拿大多伦多大学药学院药剂学博士
                                </dd>
                                <dd>1985-1990，美国德州大学莱斯大学化学系博士后 </dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>1998-1999，美国 BioDelivery Sciences International, Inc.药剂研究部主任

                                </dd>
                                <dd>1999-2003，美国长岛大学药学院副教授

                                </dd>
                                <dd>2003-至今, 上海交通大学药学院教授博士生导师“药物输送与生物材料”研究室负责人
                                </dd>

                            </dl>
                            <h4>职业荣誉</h4>
                            <dl>
                                <dd>发表学术论文 20 余篇

                                </dd>
                                <dd>获得 2 项发明专利

                                </dd>
                                <dd>解决了蛋白药物以自然形态长效缓释这一药剂学领域36年久攻未克的难题，促红细胞生成素缓释微球进入了产业化开发阶段

                                </dd>
                                <dd>人体内源性分子与安全性已知药物代谢物构建的成药性与SiRNA合成载体研究获德国应用化学 TOP10% 论文的评价 </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/js.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>Joseph Su</h3>
                                        <div class="post">
                                            数理统计顾问委员
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>1998，北卡洛琳娜州大学营养流行病学博士
                                </dd>
                                <dd>1995，明尼苏达大学公共健康营养学硕士
                                </dd>
                                <dd>1993，明尼苏达大学营养科学学士
                                </dd>
                                <dd>1987，台湾中原大学化学系学士 </dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>主任，教授，阿肯色大学医学科学院的菲.布兹曼公共健康学院，流行病学教研室
                                </dd>
                                <dd>主任，阿肯色大学医学科学院的温斯若.洛克菲勒癌症研究所的癌症预防与公共卫生研究室
                                </dd>
                                <dd>1998-2004，助理教授，路易斯安娜州大学肿瘤登记中心
                                </dd>
                                <dd>2005-2013， 项目主任, 美国国立卫生研究院/国家癌症研究所（NIH/NCI）
                                </dd>
                                <dd>2014-2016，主任，美国药监局医疗器械中心流行病学部（FDA）</dd>
                            </dl>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/gj.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>关劼</h3>
                                        <div class="post">
                                            科学顾问委员会秘书长
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>毕业于吉林大学医学部医疗专业</dd>
                                <dd>中国人民大学医院管理工商管理硕士</dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>2011-2014，任中日医院健康管理中心副主任

                                </dd>
                                <dd>2015-至今，任中日医院消化科主任医师

                                </dd>
                                <dd>兼任北京医师协会健康管理专家委员会专家，北京市医疗事故鉴定委员会专家，中华实用医药杂志常务编委
                                </dd>
                                <dd>长期承担北京医科大学、北京中医药大学教学工作 </dd>
                            </dl>
                            <h4>职业荣誉</h4>
                            <dl>
                                <dd>完成卫生部及院级重点科研课题，发表论文30余篇</dd>
                                <dd>分别在2005和2008年，被评为中日友好医院优秀教师和优秀共产党员</dd>
                            </dl>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script>
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(2) a").addClass("active");
           $(".mainav li:nth-of-type(2) a").addClass("active");
           $(".subnav li:nth-of-type(4) a").addClass("active");
        });
    </script>
</body>
</html>