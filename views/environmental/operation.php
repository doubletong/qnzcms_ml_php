<?php
require_once("../../includes/common.php");
require_once("../../data/page.php");

$pageClass = new TZGCMS\Page();
$data = $pageClass->fetch_data("about");

?>
<!doctype html>
<html class="no-js" lang="zh-CN">

<head>
    <title><?php echo $data["title"] . "-" . $site_info["sitename"]; ?></title>
    <?php require_once('../../includes/meta.php') ?>
</head>

<body>
    <?php require_once('../../includes/header.php') ?>

    <?php require_once('includes/header.php') ?>

    <?php // echo $data["content"]; 
    ?>

    <div class="page page-env container">
        <p>三达旗下拥有国家人事部授予博士后科研工作站和福建省膜分离工 程研究中心，拥有各种膜分离与废水处理实验仪器及设备，并长期与国内 外多所知名高校与科研院所合作，从事各种新型水处理技术研究，可为客户提供“供水-污水-中水”的整体解决方案。</p>
        <p>公司通过自主创新和持续技术积累，已掌握多项基础性市政水处理技术，所建设的污水厂主要应用的二级生物处理工艺有：AO+MBR膜工艺、外置式超滤膜+臭氧工艺、卡鲁塞尔氧化沟、CASS工艺和AAO工艺等技术，这些技术在公司运营的污水处理厂中得到了充分的利用。</p>


        <div class="title title-list">
            <h3>商务模式</h3>
        </div>

        <p>三达经营模式灵活多样，可以根据用户的要求及实际情况制定不同的经营模式。主要有EPC、 BOT、BT及TOT等多种方式。</p>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3>BOT</h3>
                            </div>
                            <div class="col-auto">建设-经营-移交</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>出资方式：</h4>
                        <p>由三达全额投资</p>
                        <h4>责任：</h4>
                        <ol>
                            <li>工艺设计：由三达负责工艺设计及施工建设工作</li>
                            <li>管理及运营：由三达负责日常管理及运营，并收取一定的运营费用</li>
                            <li>项目移交：特许经营期满后，三达将项目无偿移交给地方政府/业主</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3>TOT</h3>
                            </div>
                            <div class="col-auto">移交-经营-移交</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>出资方式：</h4>
                        <p>由三达采取收购特许经营权方式，并全额投资</p>
                        <h4>责任：</h4>
                        <ol>
                            <li>工艺设计：由三达根据实际运营情况，优化或改进工艺设计
                            </li>
                            <li>维护及改造：三达负责对设施等进行维护改造
                            </li>
                            <li>管理及运营：由三达负责日常管理及运营，并收取一定的运营费用
                            </li>
                            <li>项目移交：在双方约定的特许经营期结束后，三达讲项目无偿移交给当地政
                                府/业主</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3>EPC</h3>
                            </div>
                            <div class="col-auto">工程总承包</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>出资方式：</h4>
                        <p>由政府/业主全额投资</p>
                        <h4>责任：</h4>
                        <ol>
                            <li>工艺设计：采用三达的技术，由三达进行工艺设计</li>
                            <li>施工建设：政府/业主对三达提供的设计方案进行会审，通过后由三达全权负责工程建设（包括土建、设备采购、及安装、绿化等）</li>
                            <li>工程调试：工程建设竣工后，由三达进行调试，保证达到合同规定的标准</li>
                            <li>技术培训：由三达专家对项目操作人员进行业务技能培训</li>
                            <li>工程移交：政府/业主组织项目验收，三达将工程项目全部移交给政府/业主</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3>委托运营</h3>
                            </div>
                       
                        </div>
                    </div>
                    <div class="card-body">
                        <h4>出资方式：</h4>
                        <p>由政府/业主将已建成的项目委托于三达，由三达进行专业化运营</p>
                        <h4>责任：</h4>
                        <ol>
                            <li>项目维护：由三达负责对项目设施进行维护
                            </li>
                            <li>管理及运营：由三达负责项目日常管理及运营，并收取运营费用，保证项目稳定运营
                            </li>
                            <li>项目移交：在双方约定的委托运营期结束后，三达讲项目无偿归还给政府/业主
                            </li>
                     
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="title title-list">
            <h3>市政水务项目</h3>
        </div>
        <!-- 暂缺地图 -->
        <div class="row">
            <div class="col-md-6">
                <div class="project-v1">
                    <div class="pic">
                        <img src="/assets/img/env06.jpg" alt="四平：四平市污水处理厂">
                    </div>
                    <div class="txt">
                        <h3 class="title">四平：四平市污水处理厂</h3>
                        <p>吉林省四平市污水处理厂设计总处理规模日处理污水18万立方米，主体采用A/O 处理工艺。项目于2001 年开工建设，2003 年完工。2006 年由我公司以TOT模式投资运营，经改造调试后，该厂运营稳定，出水达到设计标准，对四平市水环境的改善起到了重要作用。</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="project-v1">
                    <div class="pic">
                        <img src="/assets/img/env07.jpg" alt="吉安：骡子山污水处理厂">
                    </div>
                    <div class="txt">
                        <h3 class="title">许昌：许昌县污水处理厂</h3>
                        <p>许昌县污水处理厂设计总规模日处理污水4万立方米，采用氧化沟+深度处理工艺。项目以BOT模式建设运营,于2009年建设投产。</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="project-v1">
                    <div class="pic">
                        <img src="/assets/img/env08.jpg" alt="吉安：骡子山污水处理厂">
                    </div>
                    <div class="txt">
                        <h3 class="title">吉安：骡子山污水处理厂</h3>
                        <p>吉安市螺子山污水处理厂设计总规模日处理污水8万立方米，采用卡鲁塞尔氧化沟工艺，项目以BOT模式建设运营，于2007 年建成投产。</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="project-v1">
                    <div class="pic">
                        <img src="/assets/img/env09.jpg" alt="巨野：巨野县污水处理厂">
                    </div>
                    <div class="txt">
                        <h3 class="title">巨野：巨野县污水处理厂</h3>
                        <p>巨野县污水处理厂总设计日处理污水8万立方米，采用百乐克工艺，2006 年由我公司以TOT 模式投资运营。2010年我司对项目进行了升级改造，保证了该厂的运营稳定性。</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="project-v1">
                    <div class="pic">
                        <img src="/assets/img/env10.jpg" alt="白城：白城市污水处理厂">
                    </div>
                    <div class="txt">
                        <h3 class="title">白城：白城市污水处理厂</h3>
                        <p>白城市污水处理厂设计建设总规模为日处理污水量10万立方米，采用微曝氧化沟工艺，项目以BOT模式建设运营，于2010 年建成投产。</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="project-v1">
                    <div class="pic">
                        <img src="/assets/img/env11.jpg" alt="四平：四平市污水处理厂">
                    </div>
                    <div class="txt">
                        <h3 class="title">武平：武平县污水处理厂</h3>
                        <p>武平县污水处理厂总设计日处理污水4万立方米，采用改良型卡鲁塞尔氧化沟工艺。项目以BOT模式建设运营，于2009 年建成投产。</p>
                    </div>
                </div>
            </div>
        </div>
        

    </div>

    <?php require_once('../../includes/footer.php') ?>
    <?php require_once('../../includes/scripts.php') ?>

</body>

</html>