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
    <title><?php echo "企业社会责任-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

<div class="striving">

<!--banner-->
<div class="inside_banner about_banner" style="background-image:url(images/about_duty_banner.jpg)">
    <div class="wrap clear">
        <div class="inside_banner_txt pos_center">
            <h1 class="wow fadeInLeft">企业社会责任</h1>
            <p class="wow fadeInLeft">能力越大  责任越大</p>
        </div>
    </div>
</div>
<!--banner end-->

<!--main-->
    <div class="main about about_duty">
        <div class="about_duty_t">
            <div class="wrap">
                <div class="about_duty_title wow fadeInUp">
                    <h2>见微知著   共创奇迹</h2>
                    <p>微创的企业使命是：提供能延长和重塑生命的普惠化真善美方案。他代表的是让代表全球最高科技水平的医疗技术以最 公平、最平等的方式，将健康和长寿带给世界上的每一个角落，每一个社区，每 一个家庭和每一位患者。  </p>

                    <p>在微创的八大价值观中， “质量”是企业文化的根基，是所有微创人为之奋斗的初心，以“见微知著   共创奇迹”的公益理念，以完美普惠为目标，可持续地为股东、客户、员工和社会创造最大价值。
                    </p>
                </div>
                <div class="about_duty_nav wow fadeInUp">
                    <h2>我们的社会责任</h2>
                    <ul class="clear">
                        <li class="l1 active">
                            <div class="li_wrap">
                                <div class="icon"></div>
                                <h3>企业经营维度<br/><span>（股东角度）</span></h3>
                                <i>
                                    <img src="images/about_duty_icon_bottom.png"/>
                                </i>
                            </div>
                        </li>
                        <li class="l2">
                            <div class="li_wrap">
                                <div class="icon"></div>
                                <h3>雇主品牌维度<br/><span>（员工角度）</span></h3>
                                <i>
                                    <img src="images/about_duty_icon_bottom.png"/>
                                </i>
                            </div>
                        </li>
                        <li class="l3">
                            <div class="li_wrap">
                                <div class="icon"></div>
                                <h3>用户维度<br/><span>（患者、医生角度）</span></h3>
                                <i>
                                    <img src="images/about_duty_icon_bottom.png"/>
                                </i>
                            </div>
                        </li>
                        <li class="l4">
                            <div class="li_wrap">
                                <div class="icon"></div>
                                <h3>企业公民维度<br/><span>（社会等角度）</span></h3>
                                <i>
                                    <img src="images/about_duty_icon_bottom.png"/>
                                </i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="about_duty_box wow fadeInUp">
            <!--企业经营维度-->
            <div class="about_duty_item active">
                <div class="about_duty_item_title" style="background-image:url(images/about_duty_bg_01.jpg)">
                    <div class="wrap">
                        <div class="txt">
                            <h3>企业经营维度<span>股东角度</span></h3>
                            <p>对股东负责即资产增值，稳定回报：微创珍惜善用每一分资本，保持持续稳健的经营发展，构建完善的公司治理结构，不断提升全面风险管理水平。</p>
                            <p>微创以1+10+5的集团化运营模式和“创新反应炉”的创新体系既适合高、精、尖、难、险、费的行业特点，也符合多、快、好、省的国情。通过五位一体的产品观驱动我们在医疗器械领域不断创新，提升高端医疗器械的竞争力和替代性，让更多患者能够改善生活质量或重塑他们的生命。</p>
                            <p>利益相关方：股东、政府</p>
                        </div>
                    </div>
                </div>
                <ul class="about_duty_item_list">
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_01.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>企业合规</h3>
                            <p>微创®在20年的经营活动中恪守商业道德，遵守所有适用的反贿赂及反腐败法律，包括美国的反海外腐败法（简称“FCPA”）及中国相关的反贿赂反腐败法律（简称“中国反贿赂法”）。在隐私、广告促销、反贪污方面都采取了相关的管制措施...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_02.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>风控管理</h3>
                            <p>为了促进企业利润最大化和协调化，有力支撑公司战略目标的实现，微创®积极有效地组织和配置财务资源。公司以强化财务预算为前提，做好事前预测的规划工作；建立资金管理体制，提高资金的使用效益；完善风险管理机制，健全内部控制...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_03.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>创新平台</h3>
                            <p>微创®为所有微创人提供1+12+1创新与产业化平台，以最少的资源、最低的代价、在最短时间内开发尽可能多的高科技产品。一个信息接收“前台”，作为与市场和学术交流创新的对接窗口；一个学术支撑“后台”，是基于大数据信息支撑下...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                </ul>
            </div>
            <!--雇主品牌维度-->
            <div class="about_duty_item">
                <div class="about_duty_item_title" style="background-image:url(images/about_duty_bg_02.jpg)">
                    <div class="wrap">
                        <div class="txt">
                            <h3>雇主品牌维度<span>员工角度</span></h3>
                            <p>微创为员工营造和谐、愉悦的工作氛围，提供合适的薪酬和福利，清晰的职业发展方向和广阔的职业发展空间，专业、高效的培训。</p>
                            <p>微创用专业人才管理和“合纵连横”创新管理模式应对专业化、创新型极高的经营挑战，实现员工个人价值增值，实现公司、客户、员工利益的共同增长。   </p>
                            <p>利益相关方：员工</p>
                        </div>
                    </div>
                </div>
                <ul class="about_duty_item_list">
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_04.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>人才成长</h3>
                            <p>公司培训一直致力于打造卓越人才培养及学习型组织建设，根据公司整体发展战略以及人力资源规划，我们力求将员工的知识积累、技能培养与公司对员工的岗位要求相结合，将员工的个人成长与职业发展相结合，将人才培养与人力资源战略紧...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_05.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>健康与安全</h3>
                            <p>确保员工安全是微创®集团的首要任务，公司通过建立相关的管理系统及职业病防护措施来保障。微创®医疗遵守中国生产安全法及中国职业病防治法，致力于为所有员工提供安全及健康的工作环境。由于公司产品生产流程涉及化学品及特殊设备...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_06.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>员工权益</h3>
                            <p>公司营造良好的工作环境和氛围，根据不同需求，提供个性化支持，提高全员参与的积极性和满意度。每年年底公司开展 360 度评估反馈以及人才盘点大会，通过多维度测评收集员工满意度数据、通过 360 度反馈，员工可以多方位的对同级别、下级...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_07.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>多元化</h3>
                            <p>微创®目前有全球员工 近6000人，背景不同，文化不同，信仰不同，甚至语言也不同，但是大家为了一个共同的远景和一个共同的使命走到一起，“为患者服务”和“为‘为患者服务的医生’服务”是我们共同的信仰，公司在品牌经营实践中...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_08.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>创新环境</h3>
                            <p>微创学院不断为企业员工优化创新环境。知行学院：专业的、可持续的、与时俱进的全方位学术传递和交流平台；为转化医学的发展提供行之有效的思路、对策与方法 下设临床培训学院、科研与研发学院以及非临床学院，储备了大量优质人才...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                </ul>
            </div>
            <!--用户维度-->
            <div class="about_duty_item">
                <div class="about_duty_item_title" style="background-image:url(images/about_duty_bg_03.jpg)">
                    <div class="wrap">
                        <div class="txt">
                            <h3>用户维度<span>患者、医生角度</span></h3>
                            <p>对客户负责即产品质量为上、服务至上、诚信保障：</p>
                            <p>1）微创了解医疗器械的使用者和决策者的需求，运用新科技、新技术持续改善产品质量和服务</p>
                            <p>2）诚信对待用户，“微创植入卡”保障器材使用者权益 </p>
                            <p>3）一切以实现用户价值为前提</p>
                            <p>利益相关方：患者、医生</p>
                        </div>
                    </div>
                </div>
                <ul class="about_duty_item_list">
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_09.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>用户体验</h3>
                            <p>冠脉业务作为微创®的主营业务，自2004 年上市以来持续保持国内市场占有率领先。多次获得“上海名牌”荣誉的 Firebird2®支架系统是微创®集团自主研发的第二代药物洗脱支架产品，是目前临床使用量最大、客户最为熟悉的产品，在柔顺性、通过性...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_10.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>术后服务</h3>
                            <p>微创良知：专注于微创介入术前、术中、术后患者教育，是中国高端创新医疗解决方案的引领者——微创®公司所有患者群体的产品支持与服务者。24小时为微创伤介入患者以及照顾者提供帮助。微创良知患者关爱中心竭诚为每一位患者提供专业...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_11.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>经营效率</h3>
                            <p>微创®施行授权制及联合舰队的运行模式以保障在企业不断长大的同时尽可能保持小企业运作所特有的创业活力、灵活性和效率。微创®自1998年成立至今，业务覆盖心血管介入及结构性心脏病医疗、心脏节律管理及电生理医疗、骨科植入与修复...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                </ul>
            </div>
            <!--企业公民维度-->
            <div class="about_duty_item">
                <div class="about_duty_item_title" style="background-image:url(images/about_duty_bg_04.jpg)">
                    <div class="wrap">
                        <div class="txt">
                            <h3>企业公民维度<span>社会等角度</span></h3>
                            <p>对社会负责即回馈社会、建设国家。微创成立以来一直怀抱感恩之心反哺社会，在教育公益、患者教育、希望小学持续投入。</p>
                            <p>教育公益方向，微创通过对基础教育、高等教育方面的专注投入，扶持人才培养，为未来发展奠定基础，为国家进步和社会的可持续推动提供原动力。</p>
                            <p>在合作伙伴中，我们视代理商和供应商为重要的合作伙伴，针对代理商的不同需求，我们开发细分课程和培训，提升他们的成长，针对不同供应商，我们出台一系列的采购规范制度，保证招标流程、评标以及后续处理的公开、公正、公平和效率的原则，保障各方的利益。</p>
                            <p>利益相关方：商业合作伙伴、公益组织、政府、社区</p>
                        </div>
                    </div>
                </div>
                <div class="about_duty_good wow fadeInUp">
                    <div class="wrap">
                        <img src="images/about_duty_jg.jpg" alt=""/>
                        <!--<h3>公益项目</h3>
                        <div class="line"></div>
                        <div class="clear">
                            <div class="fl">
                                <h4>社会</h4>
                                <ul class="clear">
                                    <li>
                                        <dl>
                                            <dt>教育公益</dt>
                                            <dd>患者教育<br/>
                                                基础教育<br/>
                                                1）希望小学 <br/>
                                                高等教育<br/>
                                                1）励志奖学基金<br/>
                                                2）医疗器械图书信息中心
                                            </dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>医疗慈善公益</dt>
                                            <dd>医疗器械捐助<br/>
                                                爱心物资捐助
                                            </dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>社群</dt>
                                            <dd>员工志愿者协会</dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>精准扶贫</dt>
                                            <dd>精准扶贫项目</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                            <div class="fr">
                                <h4>环境</h4>
                                <ul class="clear">
                                    <li>
                                        <dl>
                                            <dt>精准扶贫</dt>
                                            <dd>环境管理<br/>
                                                低碳节能</dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                        </div>-->
                    </div>
                </div>
                <ul class="about_duty_item_list">
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_12.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>社会公益</h3>
                            <p>在社区文明共建的活动中，公司充分发挥自身资源为社区居民举办健康讲座、疾病防治、等科普教育活动，树立科学疾病防治知识；公司定期组织张江消防支付夏季慰问活动，参与张江东方爱民岗服务队的双拥爱民特色服务项目，并为退休老兵举办科...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_13.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>环境公益</h3>
                            <p>微创®已在组织内成立全面环境、健康及安全管理系统，由集团安全运营与责任委员会管理，负责环境管理、维持生产安全及职业健康培训。为保护环境，安全运营委员会推行各项环保措施并实施清洁生产项目，旨在提高资源及能源使用效率并降低...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                    <li class="clear wow fadeInUp">
                        <div class="img">
                            <img src="images/about_duty_14.jpg" alt=""/>
                        </div>
                        <div class="txt">
                            <h3>合作伙伴</h3>
                            <p>全集团共有约 2 千家供应商，这些供应商所提供的服务涵盖集团运营的各个领域，包括产品研发及生产物料，MRO 用品，设备软硬件，固定资产，行政办公用品，人力资源培训等多样化领域。目前长期合作的合格供方有 84 家，包含原材料供应商...</p>
                            <a href="/duty/detail-1">了解更多</a>
                        </div>
                    </li>
                </ul>
            </div>
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