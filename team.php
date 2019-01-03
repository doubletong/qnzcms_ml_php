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
    <title><?php echo "核心团队-".SITENAME; ?></title>    
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
                                    <img src="img/team/wy.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>吴昱</h3>
                                        <div class="post">
                                            PhD, 统计专家, CEO
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>罗格斯大学，生物统计学博士</dd>
                                <dd>清华大学，电机工程和工业工程双学士学位</dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>19 年行业经验，曾在辉瑞、罗氏公司任职
                                </dd>
                                <dd>2003-2010年在美国创立统计咨询公司
                                </dd>
                                <dd>2010-2016年主管美国K&L公司数据和统计部门
                                </dd>
                                <dd>2013-2016年先后担任方恩医药COO及CEO
                                </dd>
                            </dl>
                            <h4>职业荣誉</h4>
                            <dl>
                                <dd>领导完成了超过25个向FDA/EMA NDA申报的统计分析工作</dd>
                            </dl>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/sly.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>孙立英</h3>
                                        <div class="post">
                                            MD, PhD, 首席医学官
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>第三军医大学，临床医学博士 </dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>七年临床外科医生经验

                                </dd>
                                <dd>曾任美国海军医学研究所资深研究员，项目组组长

                                </dd>
                                <dd>曾任美国军医大学和杜克大学外科副教授、教授

                                </dd>
                                <dd>曾任美国国立卫生研究院/癌症研究所，项目主任，资深统计学家，建立国际肿瘤分期 标准

                                </dd>
                                <dd>曾任美国食品药品管理局，资深流行病学家、评审组长，医疗器械临床研究和上市后 监管 </dd>
                            </dl>
                            <h4>职业荣誉</h4>
                            <dl>
                                <dd>国务院政府特殊津贴获得者
                                </dd>
                                <dd>国家科技进步一等奖、二等奖各一项
                                </dd>
                                <dd>军队科技进步一等奖
                                </dd>
                                <dd>2016年获美国FDA团队领导奖
                                </dd>
                                <dd>发表论文、专著130余篇
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/xlj.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>肖丽君</h3>
                                        <div class="post">
                                            高级注册总监
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>佳木斯医学院，药学学士</dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>27 年行业经验，18 年法规注册经验和 9 年临床前研发经验

                                </dd>
                                <dd>2010-2017 年，方恩医药注册部副总监、总监和高级总监

                                </dd>
                                <dd>成功申报数十个化学药品、生物制品、以及进口药品的 IND 和 NDA 作为策略咨询参与数十个创新药物的早期临床开发

                                </dd>
                                <dd>申报注册上百个医药产品

                                </dd>
                                <dd>多个产品的中美双报经验 </dd>
                            </dl>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/wza.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>吴子爱</h3>
                                        <div class="post">
                                            临床运营总监
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>北大医学部，EMBA
                                </dd>
                                <dd>北京军医学院，临床药学学士</dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>13年临床运营工作

                                </dd>
                                <dd>曾任诺华制药、拜耳医药、George Clinical、方恩医药 CRA、PM、PMD 和运营总监

                                </dd>
                                <dd>曾在方恩医药担任肿瘤药和创新药临床项目总监，负责超过 30 个 I-III 期新药临床运营

                                </dd>
                                <dd>丰富的 I-IV 期临床试验项目经验，领导过心血管、代谢、肿瘤、神经、肝病、肾病等 多个领域的临床运营
                                </dd>
                            </dl>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/xm.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>徐曼</h3>
                                        <div class="post">
                                            PhD, 生物检测机构负责人
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>北京大学医学部，药学专业博士</dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>11 年药代动力学研究及法规经验和生物分析管理经验，包括 ADME 筛选平台，IND DMPK 申报，以及用于支持 GLP 毒理和临床试验研究的法规生物分析

                                </dd>
                                <dd> 曾任康龙化成 DMPK 及法规性生物分析全球副总裁

                                </dd>
                                <dd>曾任康龙化成临床生物分析检测实验室机构负责人在药物的生物转化、吸收和代谢、外排/摄取/转运、相互作用等领域，极具经验

                                </dd>
                                <dd>熟悉 NMPA、FDA 新药的临床前及临床申报
                                </dd>
                            </dl>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/pym.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>彭宇梅</h3>
                                        <div class="post">
                                            数据统计总监
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>西安交通大学，生物工程硕士，遗传统计方向
                                </dd>
                                <dd>西安交通大学，生物工程学士 </dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>十年以上生物统计和编程经验

                                </dd>
                                <dd>曾任美斯达、方恩医药生物统计经理、高级经理及总监 负责多个 I 至 IV 期国际、国内项目（涉及不同治疗领域）的统计和编程， 两个 US NDA递交和多个中国 NDA 递交


                                </dd>

                            </dl>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="person">
                            <div class="row">
                                <div class="col-auto">
                                    <img src="img/team/cpy.jpg" alt="">
                                </div>
                                <div class="col">
                                    <div class="name">
                                        <h3>陈佩妘</h3>
                                        <div class="post">
                                            统计美国部高级总监
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="des">
                            <h4>教育背景</h4>
                            <dl>
                                <dd>北卡罗来纳州立大学，生物统计学博士
                                </dd>
                                <dd>国立政治大学，统计工商管理硕士
                                </dd>
                                <dd>国立台湾大学，数学学士
                                </dd>
                            </dl>
                            <h4>工作经历</h4>
                            <dl>
                                <dd>18 以上年生物统计行业经验

                                </dd>
                                <dd>曾任默克、美国 FMD K&L 高级统计师、统计副总监、总监和高级总监 作为负责统计师，多次参与 FDA 申报 NDA 工作，涉及多个治疗领域
                                </dd>

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
           $(".subnav li:nth-of-type(3) a").addClass("active");
        });
    </script>
</body>
</html>