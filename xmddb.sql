-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 26, 2019 at 09:10 AM
-- Server version: 5.7.25
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tzgcms_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `added_date` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `title`, `thumbnail`, `added_date`, `category`, `added_by`) VALUES
(1, '生物样本分析', '/uploads/cases/c1.jpg', 1546612271, '药物临床开发策略', 'admin'),
(2, '生物样本分析', '/uploads/cases/c2.jpg', 1546612953, '药物临床开发策略', 'admin'),
(3, '生物样本分析', '/uploads/cases/c3.jpg', 1546613043, '药物临床开发策略', 'admin'),
(4, '生物样本分析', '/uploads/cases/c1.jpg', 1546613139, '药品注册途径和策略', 'admin'),
(5, '生物样本分析', '/uploads/cases/c2.jpg', 1546613608, '药品注册途径和策略', 'admin'),
(6, '生物样本分析', '/uploads/cases/c3.jpg', 1546613621, '药品注册途径和策略', 'admin'),
(7, '生物样本分析', '/uploads/cases/c1.jpg', 1546613632, '药物临床试验统计', 'admin'),
(8, '生物样本分析', '/uploads/cases/c2.jpg', 1546613654, '药物临床试验统计', 'admin'),
(9, '生物样本分析', '/uploads/cases/c3.jpg', 1546613669, '药物临床试验统计', 'admin'),
(10, '生物样本分析', '/uploads/cases/c1.jpg', 1546613684, '新药早期临床开发', 'admin'),
(11, '生物样本分析', '/uploads/cases/c2.jpg', 1546613690, '新药早期临床开发', 'admin'),
(12, '生物样本分析', '/uploads/cases/c3.jpg', 1546613695, '新药早期临床开发', 'admin'),
(13, '生物样本分析', '/uploads/cases/c3.jpg', 1546613701, '生物等效性试验', 'admin'),
(14, '生物样本分析', '/uploads/cases/c2.jpg', 1546613705, '生物等效性试验', 'admin'),
(15, '生物样本分析', '/uploads/cases/c1.jpg', 1546613708, '生物等效性试验', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `population` int(11) NOT NULL,
  `content` text NOT NULL,
  `added_date` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `department`, `address`, `population`, `content`, `added_date`, `added_by`) VALUES
(1, '医学写作专员', '医学事务', '南京/上海', 4, '<p>岗位职责：&nbsp; &nbsp;</p>\r\n\r\n<p>1、 药物临床项目的方案设计、资料（CRF、研究者手册、综述、总结报告等）编写；&nbsp;</p>\r\n\r\n<p>2、 国内外相关文献资料收集与整理；&nbsp;</p>\r\n\r\n<p>3、 内部医学文件 QC；&nbsp;</p>\r\n\r\n<p>4、 支持商务部门竞标相关医学资料搜集，整理；&nbsp;</p>\r\n\r\n<p>5、 对项目 CRA、CRC 等进行临床方案培训；&nbsp;</p>\r\n\r\n<p>6、 完成上级安排的其他相关工作。&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>任职要求： &nbsp;</p>\r\n\r\n<p>1、 临床医学或药学相关专业本科学历，硕士优先；&nbsp;</p>\r\n\r\n<p>2、 在医院临床科室、制药企业或 CRO 公司有 1 年及以上相关工作经验，有精神类、内分 泌心脑血管项目临床经验者优先；&nbsp;</p>\r\n\r\n<p>3、 熟悉 GCP 和相关法律法规；&nbsp;</p>\r\n\r\n<p>4、 良好的英语书写能力；&nbsp;</p>\r\n\r\n<p>5、 工作仔细、认真，具有良好的问题协调/解决能力及应急处置能力；&nbsp;</p>\r\n\r\n<p>6、 具有良好的沟通技能和团队合作精神。&nbsp;</p>\r\n', 1546516788, 'admin'),
(2, 'PV(药物安全警戒)', '医学事务', '不限地点', 4, '', 1546517685, 'admin'),
(4, '医学写作经理', '医学事务', '不限地点', 2, '', 1546517743, 'admin'),
(5, '医学经理/医学顾问', '医学事务', '不限地点', 1, '<p>医学写作经理</p>\r\n', 1546517762, 'admin'),
(6, 'CRA(临床监查员)', '临床运营', '南京/北京/上海/广州', 1, '<p>医学经理/医学顾问</p>\r\n', 1546517824, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `media_links`
--

CREATE TABLE `media_links` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `topicsId` int(11) NOT NULL,
  `added_date` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media_links`
--

INSERT INTO `media_links` (`id`, `title`, `link`, `summary`, `topicsId`, `added_date`, `added_by`, `category`) VALUES
(1, 'Health New Jkb.com', 'http://tzgcms.com:8888/bbi-admin/media_add.php', 'Nanjing CR  Medicon Expands Partnership with Medidata to Accelerate Clinical Development  in China', 1, 1546598237, 'admin', 'Healthcare'),
(2, '39.net', 'http://www.baidu.com', 'Nanjing CR  Medicon Expands Partnership with Medidata to Accelerate Clinical Development  in China', 1, 1546599431, 'admin', 'Healthcare');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `meeting_time` datetime DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(150) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `sponsor` varchar(150) DEFAULT NULL,
  `co_organizer` varchar(150) DEFAULT NULL,
  `added_date` int(11) NOT NULL,
  `summary` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `title`, `content`, `meeting_time`, `description`, `keywords`, `view_count`, `active`, `added_by`, `thumbnail`, `address`, `sponsor`, `co_organizer`, `added_date`, `summary`) VALUES
(2, '2018 Medidata NEXT 中国区会议', '<p>本届&nbsp; Medidata NEXT 中国区会议聚焦开辟临床试验领域的新纪元，旨在以互动的形式为来宾提供从设计、执行、管理到见证临床开发全过程的实践机会。来自351家 Medidata 中国合作企业代表出席了本次会议，分别就临床试验数据分析，临床 IT 系统的全球监管和验证、临床试验项目的有效管理策略等话题展开讨论。</p>\r\n\r\n<p>希麦迪医药作为飞速发展的临床实验 CRO公司，以重要参展商的形式受邀出席了本次盛会。此次展会主要集中展示了公司在数据管理和统计领域取得的进展和成就，使来宾们在第一时间了解希麦迪在数据管理统计等领域的创新与展望。在此次展会中，希麦迪医药的展位吸引了与会者的极大关注，不少企业驻足聆听, 进行现场互动及业务咨询，加深了我们与企业的相互了解，为进一深入合作奠定了坚实基础。</p>\r\n\r\n<p>作为国际最大的 EDC系统提供商Medidata的认证合作伙伴，希麦迪数据统计团队规模已突破80人，拥有丰富的I-III期、BE、真实世界研究的数据管理和统计经验、丰富的中美项目经验和CDISC实施经验，团队成员完成过多个向FDA或EMA递交的注册研究的数据管理和统计分析项目。通过Medidata平台规范操作，更加夯实了希麦迪在早期和生物等效性（BE）研究领域的能力。</p>\r\n\r\n<p>此次参展有力促进了业内同仁对希麦迪医药的深入了解，展现了希麦迪精湛的技术服务能力。希麦迪也将充分利用本次参展的契机，协同各方资源，为客户提供更专业、优质、便捷的服务。在当前医药领域竞争激烈的大环境下，希麦迪人，正在以专业的技术能力和积极向上的态度，为广大客户提供高质量的解决方案。</p>\r\n', '2018-07-12 12:00:00', '涵盖临床前一站式服务，从LEADs(先导化合物)到PCCs(临床前候选化合物)，再到IND(申请临床研究批件)国内外申报', 'vers', 6, 1, 'admin', 'http://tzgcms.com:8888/uploads/meetings/m1.jpg', '南京市江宁区（成功报名后发送具体地点）', '上海美迪西生物医药股份有限公司', '《药学进展》编辑部|中国药科大学归国华侨联合会 |江苏省生物化学与分子生物学学会', 1546579061, '涵盖临床前一站式服务，从LEADs(先导化合物)到PCCs(临床前候选化合物)，再到IND(申请临床研究批件)国内外申报');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `content` text,
  `view_count` int(11) DEFAULT '0',
  `active` tinyint(1) DEFAULT NULL,
  `added_by` varchar(50) DEFAULT NULL,
  `added_date` int(11) DEFAULT NULL,
  `keywords` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `alias`, `content`, `view_count`, `active`, `added_by`, `added_date`, `keywords`, `description`) VALUES
(1, '公司简介', 'about', '<div class=\"container s1\">\r\n<h2 class=\"s-title\">服务与规模</h2>\r\n\r\n<p>南京希麦迪医药科技有限公司（希麦迪）为客户提供包括药品注册、医学事务、临床运营、数据管理 和统计分析、生物样品分析在内的全方位临床开发服务, 是众多国内外知名申办方在中国最为得力的临 床CRO伙伴。希麦迪凝聚业内精英, 高速健康成长。目前公司全职人员近 200，核心成员人均有 15 年 以上行业经验，全员平均行业经验超过 5 年。</p>\r\n\r\n<div class=\"tongji\">\r\n<div class=\"row\">\r\n<div class=\"col\">\r\n<div class=\"item\">\r\n<div class=\"sum\">200<small>人</small></div>\r\n\r\n<p>公司规模</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col\">\r\n<div class=\"item\">\r\n<div class=\"sum\"><span>&gt;</span>15<small>年</small></div>\r\n\r\n<p>核心成员经验</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col\">\r\n<div class=\"item last\">\r\n<div class=\"sum\"><span>&gt;</span>5<small>年</small></div>\r\n\r\n<p>平均行业经验</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n\r\n\r\n<p>希麦迪生物样本分析部门。位于南京市江宁区，面积超过 1000 平方米，设施完善、设备先进，有全新 液相质谱联用（ LC-MS/MS）系统 8 套。其中质谱仪 AB Sciex 5500 六台、6500 两台；高效液相系统 （HPLC）用 Watson LIMS 系统管理，其中 Waters UPLC I Class 四台，Shimadzu LC-30A 四台。 </p>\r\n\r\n<h2 class=\"s-title\">优质的一体化临床研发平台</h2>\r\n\r\n<p>在药物临床开发的每个环节，希麦迪都在为客户提供着业内最为优质的服务，让一站式的服务平台， 为客户的产品开发提升质量、节约时间、降低成本。希麦迪已成为众多优秀企业临床研发与合作的最佳伙伴和理性选择。</p>\r\n</div>\r\n', 127, 1, 'admin', 1545460815, '希麦迪', '南京希麦迪医药科技有限公司（希麦迪）为客户提供包括药品注册、医学事务、临床运营、数据管理 和统计分析、生物样品分析在内的全方位临床开发服务, 是众多国内外知名申办方在中国最为得力的临 床 CRO 伙伴'),
(2, '企业愿景', 'vision', '<div class=\"container s2\">\r\n        <div class=\"content\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-7\">\r\n                    <img src=\"img/v_logo.jpg\" alt=\"\">\r\n                </div>\r\n                <div class=\"col-lg-5\">\r\n                    <div class=\"des\">\r\n                        <h2 class=\"title\">\r\n                            企业愿景\r\n                        </h2>\r\n                        <p>希麦迪时刻谨记人类健康，立志成为引领行业质量标准的全球 CRO 公司。我们的宗旨和目标，体现在 希麦迪的公司 LOGO中：融船舵，指南针，瞄准定位系统于一身，指引正确的方向，精准、专业、高 质、决心。圆形意味着守护和无限的潜能。蓝色代表理智、成熟和稳重；红色代表热情，活力和希望。\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>', 5, 1, 'admin', 1545460815, '企业愿景', '希麦迪时刻谨记人类健康，立志成为引领行业质量标准的全球 CRO 公司。'),
(3, '我们的优势', 'superiority', '<div class=\"container s4\">\r\n<div class=\"box-default\">\r\n<div class=\"box\"><a href=\"javascript:void(0);\"><i class=\"iconfont icon-down_fill\"></i> 持续为客户创造价值</a></div>\r\n\r\n<div class=\"box-body\">希麦迪的技术团队充分理解中国本地市场的特征，通过国内广泛的合作网络以及差异化的竞争优势来 拓展自身的进一步发展，为国内外制药企业提供在中国本地化的全方位专业化服务；同时公司目前已 经建立中美平台，充分依从 GCP 和注册法规的证据（文件等）及公司内部的标准操作规范，了解并熟 知药品临床试验的国际惯例和指导原则，按照国际化标准操作程序组织实施临床试验。</div>\r\n</div>\r\n\r\n<div class=\"box-default\">\r\n<div class=\"box\" ><a href=\"javascript:void(0);\"><i class=\"iconfont icon-down_fill\"></i> 解决方案既有本土优势又符合国际标准 </a></div>\r\n\r\n<div class=\"box-body\">希麦迪的技术团队充分理解中国本地市场的特征，通过国内广泛的合作网络以及差异化的竞争优势来 拓展自身的进一步发展，为国内外制药企业提供在中国本地化的全方位专业化服务；同时公司目前已 经建立中美平台，充分依从 GCP 和注册法规的证据（文件等）及公司内部的标准操作规范，了解并熟 知药品临床试验的国际惯例和指导原则，按照国际化标准操作程序组织实施临床试验。</div>\r\n</div>\r\n\r\n<div class=\"box-default\">\r\n<div class=\"box\" ><a href=\"javascript:void(0);\"><i class=\"iconfont icon-down_fill\"></i> 从临床前研究到药品上市后的一站式服务平台 </a></div>\r\n\r\n<div class=\"box-body\">希麦迪的技术团队充分理解中国本地市场的特征，通过国内广泛的合作网络以及差异化的竞争优势来 拓展自身的进一步发展，为国内外制药企业提供在中国本地化的全方位专业化服务；同时公司目前已 经建立中美平台，充分依从 GCP 和注册法规的证据（文件等）及公司内部的标准操作规范，了解并熟 知药品临床试验的国际惯例和指导原则，按照国际化标准操作程序组织实施临床试验。</div>\r\n</div>\r\n\r\n<div class=\"box-default\">\r\n<div class=\"box\" ><a href=\"javascript:void(0);\"><i class=\"iconfont icon-down_fill\"></i> 与全国多家中心保持良好的合作关系 </a></div>\r\n\r\n<div class=\"box-body\">希麦迪的技术团队充分理解中国本地市场的特征，通过国内广泛的合作网络以及差异化的竞争优势来 拓展自身的进一步发展，为国内外制药企业提供在中国本地化的全方位专业化服务；同时公司目前已 经建立中美平台，充分依从 GCP 和注册法规的证据（文件等）及公司内部的标准操作规范，了解并熟 知药品临床试验的国际惯例和指导原则，按照国际化标准操作程序组织实施临床试验。</div>\r\n</div>\r\n\r\n<div class=\"box-default\">\r\n<div class=\"box\" ><a href=\"javascript:void(0);\"><i class=\"iconfont icon-down_fill\"></i> 超1000㎡生物样本分析实验室，支持全套临床样品生物分析服务 </a></div>\r\n\r\n<div class=\"box-body\">希麦迪的技术团队充分理解中国本地市场的特征，通过国内广泛的合作网络以及差异化的竞争优势来 拓展自身的进一步发展，为国内外制药企业提供在中国本地化的全方位专业化服务；同时公司目前已 经建立中美平台，充分依从 GCP 和注册法规的证据（文件等）及公司内部的标准操作规范，了解并熟 知药品临床试验的国际惯例和指导原则，按照国际化标准操作程序组织实施临床试验。</div>\r\n</div>\r\n\r\n<div class=\"box-default\">\r\n<div class=\"box\" ><a href=\"javascript:void(0);\"><i class=\"iconfont icon-down_fill\"></i> 高素质稳定的核心管理团队和专业技术队伍 </a></div>\r\n\r\n<div class=\"box-body\">希麦迪的技术团队充分理解中国本地市场的特征，通过国内广泛的合作网络以及差异化的竞争优势来 拓展自身的进一步发展，为国内外制药企业提供在中国本地化的全方位专业化服务；同时公司目前已 经建立中美平台，充分依从 GCP 和注册法规的证据（文件等）及公司内部的标准操作规范，了解并熟 知药品临床试验的国际惯例和指导原则，按照国际化标准操作程序组织实施临床试验。</div>\r\n</div>\r\n</div>\r\n', 55, 1, 'admin', 1546617332, '希麦迪', '希麦迪的技术团队充分理解中国本地市场的特征，通过国内广泛的合作网络以及差异化的竞争优势来 拓展自身的进一步发展，为国内外制药企业提供在中国本地化的全方位专业化服务；'),
(15, '中美双报', 'declare', '<div class=\"container s1\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-6\">\r\n                    <div class=\"des\">\r\n                        <div class=\"icon\">\r\n                            <i class=\"iconfont icon-shuangbao\"></i>\r\n                        </div>\r\n                        <h3 class=\"title\">中美双报</h3>\r\n                       <p>希麦迪的团队成员具有丰富的国际化经验，对中国和美国的新药申报政策都十分地熟悉，并已经服务多个开展中/美同步临床开发的客户。</p>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-lg-6\">\r\n                    <img src=\"img/case_p2.jpg\" alt=\"\" class=\"p1\">\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class=\"container s2\">\r\n            <div class=\"content1\">\r\n            <h3 class=\"se-title\"><i class=\"iconfont icon-xuehua\"></i> 整合服务及优势</h3>\r\n\r\n            <div class=\"box\">\r\n            <ul class=\"list\">\r\n                <li>同一开发策略下的中、美协同申报和临床开发\r\n\r\n\r\n</li>\r\n                <li>IND (I, II, III, IV期）申报、NDA (505(b)(1), (505(b)(2))和ANDA/BLA申报，DMF/CEP注册\r\n\r\n</li>\r\n                <li>中美申报与开发策略的咨询，以及申报资料的审阅和缺陷分析\r\n\r\n</li>\r\n                <li>支持NMPA和FDA各类沟通会议\r\n</li>\r\n                <li>在美国巴尔的摩有可开展高质量、高难度非重大疾病早期临床的临床药理中心</li>\r\n            </ul>\r\n            </div>\r\n            </div>\r\n         \r\n        </div>', 6, 1, 'admin', 1552482786, '', ''),
(4, '我们的文化', 'culture', ' <div class=\"s5\">\r\n            <div class=\"top\">\r\n\r\n            </div>\r\n            <div class=\"container\">\r\n                <div class=\"des\">\r\n                    <h2>保证质量，提高标准</h2>\r\n                    <p>服务的质量和人员的素质，是我们的核心竞争力；员工与企业的共同进步与协调发展，是我们的内在凝聚力；客户利益为先，合作共赢，是我们的强大推动力；高质，高效，高速，高性价比是客户选择我们的最大原因。\r\n                    </p>\r\n                </div>\r\n            </div>\r\n        </div>', 2, 1, 'admin', 1546617433, '保证质量', '服务的质量和人员的素质，是我们的核心竞争力；员工与企业的共同进步与协调发展，是我们的内在凝聚力；客户利益为先，合作共赢，是我们的强大推动力；高质，高效，高速，高性价比是客户选择我们的最大原因。'),
(18, '概念验证及关键性临床研究', 'experiment', '<div class=\"container s1\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-6\">\r\n                    <div class=\"des\">\r\n                        <div class=\"icon\">\r\n                            <i class=\"iconfont icon-anchuang\"></i>\r\n                        </div>\r\n                        <h3 class=\"title\">概念验证及关键性临床研究</h3>\r\n                       <p>概念验证研究和关键性临床研究的设计和执行有赖于高水平的统计和医学专家及高效且稳定的临床运营团队。希麦迪整合了关键资源，以实现对此类试验的有力支持。\r\n</p>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-lg-6\">\r\n                    <img src=\"img/case_p3.jpg\" alt=\"\" class=\"p1\">\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class=\"container s2\">\r\n            <div class=\"content1\">\r\n            <h3 class=\"se-title\"><i class=\"iconfont icon-xuehua\"></i> 整合服务及优势</h3>\r\n\r\n            <div class=\"box\">\r\n            <ul class=\"list\">\r\n                <li>行业顶级的统计师团队。概念验证试验和关键性试验的设计往往是多样化的，采用何种设计很大程度依赖于统计学。希麦迪的统计师团队完成过超过50个向FDA递交的NDA申报，能够在试验设计、执行以及报告阶段提供权威咨询；\r\n\r\n\r\n</li>\r\n                <li>药物安全与警戒。对于监管机构特别关注的药物安全性事件，希麦迪拥有独立的PV团队和资深的医学监查人员对事件进行处理；\r\n\r\n\r\n</li>\r\n                <li>临床运营团队分布于全国各个主要城市，能够覆盖绝大多数主要的临床试验机构；采用Medidata CTMS系统，能够提供满足ICH国家法规要求的临床监查和项目管理服务；\r\n\r\n</li>\r\n                <li>自建的生物样本分析实验室能够承担群体PK的检测与计算\r\n</li>\r\n<li>希麦迪团队有丰富的独立数据监查委员会（DMC）的设立与维护经验\r\n</li>\r\n<li>可针对双盲试验提供满足法规要求的非盲服务</li>\r\n            </ul>\r\n            </div>\r\n            </div>\r\n        </div>', 6, 1, 'admin', 1552483490, '', ''),
(19, '医疗器械', 'instrument', '<div class=\"container s1\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-6\">\r\n                    <div class=\"des\">\r\n                        <div class=\"icon\">\r\n                            <i class=\"iconfont icon-qixie\"></i>\r\n                        </div>\r\n                        <h3 class=\"title\">医疗器械</h3>\r\n                       <p>希麦迪构建了单独的医疗器械团队，以更好地服务于医疗器械及体外诊断试剂的客户。</p>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-lg-6\">\r\n                    <img src=\"img/case_p6.jpg\" alt=\"\" class=\"p1\">\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class=\"container s2\">\r\n            <div class=\"content1\">\r\n            <h3 class=\"se-title\"><i class=\"iconfont icon-xuehua\"></i> 整合服务及优势</h3>\r\n\r\n            <div class=\"box\">\r\n            <ul class=\"list\">\r\n                <li>独立起草的、完全满足监管要求的适用于医疗器械和体外诊断试剂的临床运营SOP体系；\r\n\r\n</li>\r\n                <li>和国内外多个领域的医疗器械各个领域KOL有着深入合作；\r\n\r\n\r\n</li>\r\n                <li>熟悉医疗器械相关法规要求，能够提供建设性的法规注册意见；\r\n\r\n</li>\r\n                <li>可同时提供优质的数据管理和统计分析服务</li>\r\n            </ul>\r\n            </div>\r\n            </div>\r\n        </div>', 4, 1, 'admin', 1552484156, '', ''),
(6, '法规注册', 'laws', '<div class=\"container s2\">\r\n<div class=\"des\">\r\n<h3 class=\"title\">法规注册</h3>\r\n\r\n<p>希麦迪法规注册团队由超过18年经验的业内专家领衔，拥有非常丰富的化学药品和生物制剂的IND、NDA注册经验，为国内外制药企业成功地完成了大量药品和器械注册项目，凭借着丰富的经验和广泛的意见领袖（KOL）资源，能最大程度地规避法规风险，缩短注册时限，加快药品的审批速度。</p>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-fuwuneirong\"></i> 服务内容</h3>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-sm-6\">\r\n<div class=\"box\">\r\n<div class=\"item first\">法规咨询</div>\r\n\r\n<div class=\"down\"><img alt=\"\" src=\"img/down.png\" /></div>\r\n\r\n<div class=\"item\">个性化战略设计和指导实施</div>\r\n\r\n<div class=\"item\">产品开发及注册过程中遇到个案问题分析</div>\r\n\r\n<div class=\"item\">项目阶段性难点问题处理</div>\r\n\r\n<div class=\"item\">探索开发法规空白领域注册路径</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-sm-6\">\r\n<div class=\"box\">\r\n<div class=\"item first\">注册业务</div>\r\n\r\n<div class=\"down\"><img alt=\"\" src=\"img/down.png\" /></div>\r\n\r\n<div class=\"item\">全球新创新药，改良型新药，进口药，仿制药，器械</div>\r\n\r\n<div class=\"item\">全程管理过程跟进</div>\r\n\r\n<div class=\"item\">临床试验申请（MRCT/IND/CTA),上市申请（NDA/ ANDA/BLA)以及补充申请</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n  <div class=\"col-sm-6\">\r\n<div class=\"box\">\r\n<div class=\"item first\">eCTD申报系统</div>\r\n<div class=\"down\"><img alt=\"\" src=\"img/down.png\" /></div>\r\n<div class=\"item\">eCTD文档发布器</div>\r\n<div class=\"item\">eCTD文档校验器</div>\r\n<div class=\"item\">PDF编辑器</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-youshi\"></i> 优势</h3>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-sm-6\">\r\n<div class=\"box\">\r\n<ul class=\"list\">\r\n	<li>具备在创新治疗领域建立注册路径的能力\r\n\r\n</li>\r\n	<li>超过10年行业经验的核心团队，同时精通药品和器械的注册\r\n</li>\r\n	<li>对法规动态的精准把握和预判\r\n</li>\r\n	<li>与监管部门的沟通渠道持久通畅\r\n</li>\r\n<li>中英界面，随时切换，界面美观，操作简单\r\n</li>\r\n<li>文档验收等部分功能模块为首家独有\r\n</li>\r\n<li>系统集合度高，省去冗余安装及操作\r\n</li>\r\n<li>性价比高，在希麦迪平台享受打包价格\r\n</li>\r\n<li>前FDA审评官坐阵指导，步步审核\r\n</li>\r\n<li>一站式培训、售后、技术咨询和法规注册服务</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 81, 1, 'admin', 1546617929, '', ''),
(7, '医学事务', 'medicine', '<div class=\"container s3\">\r\n<div class=\"des\">\r\n<h3 class=\"title\">医学事务</h3>\r\n\r\n<p>希麦迪医学事务部依托医学专家和撰写人员极为丰富的医学背景和经验，能够为客户制定最优化的临床开发计划，并为客户提供最优质的临床试验方案设计和撰写、及注册资料的撰写服务。医学监察团队专注于临床研究的医学监察服务，建立最专业高效的医学监察服务体系。药物警戒团队深度洞察临床试验安全风险，提供高品质的药物警戒解决方案。</p>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-fuwuneirong\"></i> 服务内容</h3>\r\n\r\n<div class=\"box\">\r\n<ul class=\"list\">\r\n	<li>结合内部专业的统计和PK专家资源，制定I &ndash; III期临床研究开发策略</li>\r\n	<li>提供医学撰写服务，包括I-III 期，BE临床研究方案，研究者手册，以及总结报告</li>\r\n	<li>编写临床前试验资料</li>\r\n	<li>医学监察服务</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-youshi\"></i> 优势</h3>\r\n\r\n<div class=\"box\">\r\n<ul class=\"list\">\r\n	<li>团队由医学博士和硕士组成，核心成员在美国和中国都有10-20年的创新药开发经验</li>\r\n	<li>团队拥有数百份I-III期临床试验方案撰写经验并覆盖多种治疗领域</li>\r\n	<li>团队在国内外知名期刊上多次发表学术论文</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n', 50, 1, 'admin', 1546617973, '', ''),
(8, '临床监查和项目管理', 'clinical', '<div class=\"container s4\">\r\n<div class=\"des\">\r\n<h3 class=\"title\">临床监查和项目管理</h3>\r\n\r\n<p>希麦迪的临床操作部门，人员规模近50，并持续高速发展，成员具有丰富的I-III期临床、BE和医疗器械领域临床研究经验，与国内知名临床试验机构和领域专家有着深入而广泛的合作。团队立足完善的项目管理流程，在全国多个城市设立驻地监查员，依照临床试验方案，严格遵循SOP操作规程，有力把控项目进度，为客户节约成本，确保项目顺利的实施和完成。</p>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-fuwuneirong\"></i> 服务内容</h3>\r\n\r\n<div class=\"box clearfix\">\r\n<p>提供I-III期、IV期、器械上市前与上市后的临床监查和项目管理服务，包括：</p>\r\n\r\n<ul class=\"list h-list1\">\r\n	<li>中心筛选 　　　　</li>\r\n	<li>伦理递办</li>\r\n	<li>遗传办申请</li>\r\n	<li>中心启动 　　　　</li>\r\n	<li>常规监查 　　　　</li>\r\n	<li>非盲监查</li>\r\n	<li>中心关闭 　　　　</li>\r\n	<li>质量控制　　　　　　　</li>\r\n	<li>独立监察委员（DMC）的组织与开会</li>\r\n	<li>第三方供应商的管理</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-linchuangtuanduifenbu\"></i> 临床操作团队分布</h3>\r\n\r\n<div class=\"box clearfix\">\r\n<ul class=\"list h-list2\">\r\n	<li>长春</li>\r\n	<li>北京</li>\r\n	<li>石家庄</li>\r\n	<li>南京</li>\r\n	<li>上海</li>\r\n	<li>武汉</li>\r\n	<li>成都</li>\r\n	<li>广州</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"img/china.png\" /></div>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-youshi\"></i> 优势</h3>\r\n\r\n<div class=\"box\">\r\n<ul class=\"list\">\r\n	<li>质量控制体系严格遵循ICH-GCP标准</li>\r\n	<li>全部成员均为医药专业背景，一半以上有硕士学位</li>\r\n	<li>项目经理具备5年-15年临床试验行经验</li>\r\n	<li>所有CRA均来自知名CRO，具备医药产品临床试验经验</li>\r\n	<li>人员稳定性优良（2018年离职率低于10%）</li>\r\n	<li>整体团队在新药I-III期试验、BE和医疗器械项目管理上经验突出</li>\r\n	<li>运行前沿领域的项目，包括肿瘤免疫、细胞个体治疗，生物类似物等</li>\r\n	<li>共建菏泽中医院、郑州弘大心血管医院和新郑市人民医院共三家I期临床试验中心，总床位数超过200张</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n', 67, 1, 'admin', 1546618033, '', ''),
(14, '药物临床开发策略', 'strategy', '\r\n        <div class=\"container s1\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-6\">\r\n                    <div class=\"des\">\r\n                        <div class=\"icon\">\r\n                            <i class=\"iconfont icon-celue\"></i>\r\n                        </div>\r\n                        <h3 class=\"title\">药物临床开发策略</h3>\r\n                       <p>对于新药的临床开发，在首次人体试验（First-in-Human）之前，结合未满足的临床需求（un-met medical need）和可知的治疗手段来制定整体的药物临床开发策略尤为关键。</p>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-lg-6\">\r\n                    <img src=\"img/case_p1.jpg\" alt=\"\" class=\"p1\">\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class=\"container s2\">\r\n            <div class=\"content1\">\r\n            <h3 class=\"se-title\"><i class=\"iconfont icon-xuehua\"></i> 整合服务及优势</h3>\r\n\r\n            <div class=\"box\">\r\n            <ul class=\"list\">\r\n                <li>具备快速提供各领域新药I-III期整体临床开发策略的能力，包括首创药（first-in-class）、Me-too类药物、改良型新药等</li>\r\n                <li>高效支持和CDE的各类沟通会议，如撰写/审阅会议资料和会议纪要，现场演讲与交流，以促进会议取得更为理想的效果</li>\r\n                <li>在整体开发策略框架下，快速交付I-III期临床试验方案</li>\r\n                <li>希麦迪具有一支特别设立的新药临床开发策略团队，结合公司内部资深注册专家、统计专家和医学专家的支持，希麦迪能够为客户的新药开发提供关键的策略意见。</li>\r\n            </ul>\r\n            </div>\r\n            </div>\r\n         \r\n        </div>', 13, 1, 'admin', 1552482662, '', ''),
(9, '数据管理和统计分析', 'statistics', '<div class=\"container s5\">\r\n<div class=\"des\">\r\n<h3 class=\"title\">数据管理和统计分析</h3>\r\n\r\n<p>希麦迪的数据管理和统计部门，从质量标准、中美行业经验、到多种 EDC 系统的使用, 都是 CRO 行业的领先者。团队严格执行 CDISC 规则，遵循 GCP 标准，内部与客户的 SOP 流程，善于根据申办方需求，设计个性化解决方案，从方案设计的起点，到全程项目管理的介入，灵活方便，保证药物监管部门和研究者之间的沟通顺畅。部门核心成员均来自国内国际知名药企和全球性的 CRO，具有丰富的 I到 III 期国际多中心和临床注册试验经验，诚意为客户提供最准确、最及时、最可靠的临床试验数据管理和统计分析服务。</p>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-fuwuneirong\"></i> 服务内容</h3>\r\n\r\n<div class=\"box\">\r\n<ul class=\"list\">\r\n\r\n	<li>数据管理\r\n	<ul>\r\n		<li>病例报告表（CRF、eCRF）设计</li>\r\n		<li>随机和药物供应系统设计</li>\r\n		<li>数据库设计、建立、测试和维护</li>\r\n		<li>纸质研究的双份数据录入和比对</li>\r\n		<li>数据核查和质疑管理</li>\r\n		<li>医学编码、SAE一致性核查、外部数据管理</li>\r\n		<li>数据管理的质量保证和稽查</li>\r\n	</ul>\r\n	</li>\r\n	<li>统计分析\r\n	<ul>\r\n		<li>临床试验设计</li>\r\n		<li>样本量计算</li>\r\n		<li>临床实验方案相关章节撰写</li>\r\n		<li>统计分析计划撰写</li>\r\n		<li>随机计划撰写</li>\r\n		<li>建立符合CDISC SDTM/ADaM标准和分析的数据集</li>\r\n		<li>SAS编程</li>\r\n		<li>敏感度和探索性分析</li>\r\n		<li>中期分析</li>\r\n		<li>数据监查委员会（DMC）相关统计活动</li>\r\n		<li>ISS/ISE分析</li>\r\n		<li>统计分析报告撰写</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-youshi\"></i> 优势</h3>\r\n\r\n<div class=\"box\">\r\n<ul class=\"list\">\r\n	<li>中美团队规模近90人, 多数成员拥有超过5年行业经验，核心成员具有10-20年行业经验</li>\r\n	<li>丰富的I-III期、BE、真实世界研究的数据管理和统计经验，丰富的中、美项目经验和申报经验</li>\r\n	<li>熟悉多种EDC系统，包括Rave、百奥知、太美等</li>\r\n	<li>国际最大的EDC系统提供商Medidata的认证合作伙伴</li>\r\n	<li>依照标准词典MedDRA、WHO Drug进行数据编码, 使数据管理更加规范化和科学化</li>\r\n	<li>丰富的CDISC标准实施经验</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n', 22, 1, 'admin', 1546618137, '', ''),
(17, '新药早期临床研究', 'development', '<div class=\"container s1\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-6\">\r\n                    <div class=\"des\">\r\n                        <div class=\"icon\">\r\n                            <i class=\"iconfont icon-yanjiu\"></i>\r\n                        </div>\r\n                        <h3 class=\"title\">新药早期临床研究</h3>\r\n                       <p>整合注册、医学、I期中心、PK检测实验室等资源，希麦迪能够完成高质量的新药早期研究。</p>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-lg-6\">\r\n                    <img src=\"img/case_p4.jpg\" alt=\"\" class=\"p1\">\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class=\"container s2\">\r\n        <div class=\"content1\">\r\n            <h3 class=\"se-title\"><i class=\"iconfont icon-xuehua\"></i> 整合服务及优势</h3>\r\n\r\n            <div class=\"box\">\r\n            <ul class=\"list\">\r\n                <li>从Pre-IND Meeting 、方案撰写，到前置伦理审批和IND申报，直至首例受试者入组的各环节协同快速推进方案；\r\n\r\n</li>\r\n                <li>在国内有多家合作良好的I期中心，可承接不同难度、不同适应症的早期临床研究，可实现中心快速启动和受试者快速入组；\r\n\r\n</li>\r\n                <li>美国巴尔的摩的I期中心可支持美国申报的新药项目的早期研究；\r\n\r\n</li>\r\n                <li>自建的满足FDA GLP要求的生物样本分析检测实验室，能够实现快速方法学建立，并拥有高灵敏度的分析仪器，完全满足新药及代谢物检测要求，且能够实现每个分析批的快速分析；\r\n\r\n</li>\r\n                <li>一体化的服务体系，能够实现不同业务团队的快速对接，以加快项目进度</li>\r\n            </ul>\r\n            </div>\r\n            </div>\r\n         \r\n        </div>', 6, 1, 'admin', 1552482973, '', ''),
(10, '生物样本分析', 'biologic', '<div class=\"container s6\">\r\n\r\n            <div class=\"des\">\r\n                <h3 class=\"title\">\r\n                    生物样本分析\r\n                </h3>\r\n                <p>希麦迪投入大量资金，在南京建立了设备先进、管理标准的生物样本分析实验室，团队拥有行业顶级的药物代谢科学家和资深运营人员。聚合全球化战略合作伙伴，凭借优秀的生物分析能力和国内及欧美资源的整合能力，严格依照《药物临床试验生物样本分析实验室管理指南》的质量体系，生物样本分析团队为客户及时递交研究结果并预测监管趋势，对客户的问题进行及时反馈，提供专业化的解决方案。</p>\r\n            </div>\r\n\r\n            <div class=\"content1\">\r\n                <h3 class=\"se-title\">\r\n                    <i class=\"iconfont icon-icon-fuwuneirong\"></i> 服务内容\r\n                </h3>\r\n                <div class=\"box\">\r\n                    <ul class=\"list\">\r\n                        <li>方法论开发\r\n\r\n                        </li>\r\n                        <li>方法论验证\r\n\r\n                        </li>\r\n                        <li>生物样本分析\r\n                        </li>\r\n                        <li>生物样本保存</li>\r\n\r\n                    </ul>\r\n                </div>\r\n            </div>\r\n\r\n\r\n            <div class=\"content1\">\r\n                <h3 class=\"se-title\">\r\n                    <i class=\"iconfont icon-icon-youshi\"></i> 优势\r\n                </h3>\r\n\r\n                <div class=\"box\">\r\n                    <ul class=\"list\">\r\n                        <li>符合FDA和NMPA的GLP标准的生物样本分析实验室（1000平米）\r\n\r\n                        </li>\r\n                        <li>Watson LIMS 实验室管理系统\r\n\r\n                        </li>\r\n                        <li>LC-MS/MS系统8套，含AB Sciex 5500质谱6台，6500质谱2台; HPLC 8台, 含Waters UPLC I Class 4台, Shimadzu LC-30A4台\r\n\r\n                        </li>\r\n                        <li>优秀的科研团队和实验室管理团队，快速方法学开发和验证\r\n\r\n                        </li>\r\n                        <li>完善的SOP管理体系\r\n                        </li>\r\n                        <li>短时高效的时间节点</li>\r\n                    </ul>\r\n                </div>\r\n\r\n            </div>\r\n\r\n        </div>\r\n        <div class=\"owl-carousel\">\r\n            <div><img src=\"img/temp/owl1.jpg\" alt=\"\"></div>\r\n            <div><img src=\"img/temp/owl2.jpg\" alt=\"\"></div>\r\n            <div><img src=\"img/temp/owl3.jpg\" alt=\"\"></div>\r\n            <div><img src=\"img/temp/owl4.jpg\" alt=\"\"></div>\r\n            <div><img src=\"img/temp/owl5.jpg\" alt=\"\"></div>\r\n            <div><img src=\"img/temp/owl6.jpg\" alt=\"\"></div>\r\n            <div><img src=\"img/temp/owl1.jpg\" alt=\"\"></div>\r\n            <div><img src=\"img/temp/owl4.jpg\" alt=\"\"></div>\r\n            <div><img src=\"img/temp/owl5.jpg\" alt=\"\"></div>\r\n            <div><img src=\"img/temp/owl6.jpg\" alt=\"\"></div>\r\n        </div>', 20, 1, 'admin', 1546618199, '', ''),
(11, '专业培训', 'train', '<div class=\"container s7\">\r\n\r\n            <div class=\"des\">\r\n                <h3 class=\"title\">\r\n                    专业培训\r\n                </h3>\r\n                <p>希麦迪专家团队均为业内顶级的专家，从临床前研究至药品上市，均有丰富的实战经验，已协助众多中美客户，加速着创新药的中美开发、临床研究及注册申报。希麦迪希望通过组织医药行业专业培训及会议，与医药同仁交流心得、碰撞思想、互动成长，共同为中国医药事业的健康发展，贡献力量。</p>\r\n            </div>\r\n\r\n            <div class=\"content1\">\r\n                <h3 class=\"se-title\">\r\n                    <i class=\"iconfont icon-icon-fuwuneirong\"></i> 培训内容\r\n                </h3>\r\n                <div class=\"box\">\r\n                    <ul class=\"list\">\r\n                        <li>创新药I-III期的临床研究开发策略\r\n\r\n                        </li>\r\n                        <li>创新药I-III期临床试验运营及项目管理\r\n\r\n                        </li>\r\n                        <li>临床I-IV期研究数据管理及统计分析\r\n\r\n                        </li>\r\n                        <li>CDISC标准实施经验\r\n                        </li>\r\n                        <li>药物警戒体系及如何实施\r\n                        </li>\r\n                        <li>ICH CTD及eCTD法规讲解及eCTD申报系统实操\r\n                        </li>\r\n                        <li>创新药中美双报注册路径及策略</li>\r\n\r\n                    </ul>\r\n                </div>\r\n            </div>\r\n\r\n\r\n            <div class=\"content1\">\r\n                <h3 class=\"se-title\">\r\n                    <i class=\"iconfont icon-icon-youshi\"></i> 优势\r\n                </h3>\r\n\r\n                <div class=\"box\">\r\n                    <ul class=\"list\">\r\n                        <li>与康龙化成、三泰联手，选聘高级中外讲员，从新药审评、企业合规等多点切入，解读核心内容和关键趋势，提供建设性意见和深度思考\r\n\r\n                        </li>\r\n                        <li>服务客户众多，实战经验丰富，讲师平均行业经验超15年\r\n\r\n                        </li>\r\n                        <li>精到实用，把握企业的难点、痛点和疑点\r\n\r\n                        </li>\r\n                        <li>丰富全面，覆盖临床前、临床、注册、上市后\r\n                        </li>\r\n\r\n                    </ul>\r\n                </div>\r\n\r\n            </div>\r\n\r\n        </div>', 16, 1, 'admin', 1546618275, '', ''),
(13, '药物警戒', 'pharmacovigilance', '<div class=\"container s3 s8\">\r\n<div class=\"des\">\r\n<h3 class=\"title\">药物警戒</h3>\r\n\r\n<p>希麦迪团队提供基于先进技术的药物警戒解决方案，进行系统化药物警戒管理和服务项目监管。提供IND申报资料所需的药物警戒系统建立情况说明、安全管理计划、药物警戒系统的搭建、个例安全性报告（ICSR）、研发期间安全性更新报告（DSUR）等服务采用Oracle Argus 系统和百奥知安全警戒管理系统</p>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-fuwuneirong\"></i> 服务内容</h3>\r\n\r\n<div class=\"box\">\r\n<ul class=\"list\">\r\n	<li>早期发现未知药品的不良反应及其相互作用</li>\r\n	<li>确定风险因素</li>\r\n	<li>发现已知药品的不良反应的增长趋势，监测药品不良反应的动态</li>\r\n	<li>分析药品不良反应的风险因素和可能的机制；</li>\r\n	<li>对风险/效益评价进行定量分析，发布相关信息，促进药品监督管理和指导临床用药</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-youshi\"></i> 优势</h3>\r\n\r\n<div class=\"box\">\r\n<ul class=\"list\">\r\n	<li>依托多家医院资源，完成不良反应统计</li>\r\n	<li>帮助客户遵守临床试验安全性数据报告</li>\r\n	<li>协助客户完成药品注册工作</li>\r\n	<li>满足客户监管合规和患者安全性的要求</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n', 8, 1, 'admin', 1551884952, '', ''),
(12, '医疗器械临床试验', 'trials', '<div class=\"container s3 s9\">\r\n<div class=\"des\">\r\n<h3 class=\"title\">医疗器械临床试验</h3>\r\n\r\n<p>在中国国内的监管环境下，医疗器械/诊断试剂的临床试验有一定的特殊性。为了实现更好的交付，希麦迪单独组建了医疗器械团队，并建立了满足国内监管要求的质量体系。</p>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-fuwuneirong\"></i> 服务内容</h3>\r\n\r\n<div class=\"box\">\r\n<ul class=\"list\">\r\n	<li>PMA（上市前研究）和PMS（上市后研究）</li>\r\n	<li>高风险医疗器械</li>\r\n	<li>II类医疗器械</li>\r\n	<li>体外诊断试剂</li>\r\n	<li>支持研究者发起的科研项目（IIT）</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class=\"content1\">\r\n<h3 class=\"se-title\"><i class=\"iconfont icon-icon-youshi\"></i> 优势</h3>\r\n\r\n<div class=\"box\">\r\n<ul class=\"list\">\r\n	<li>在心血管支架（药物洗脱支架、药物洗脱球囊、可降解支架、心脏封堵器、经皮腔内斑块旋切术、主动脉支架等）、眼科、生殖等领域具有丰富经验；</li>\r\n	<li>独立起草的、完全满足监管要求的适用于医疗器械和体外诊断试剂的临床运营SOP体系；</li>\r\n	<li>多位资深的医疗器械和体外诊断试剂临床试验项目经理；</li>\r\n	<li>和国内外多个领域的医疗器械各个领域KOL有着深入合作；</li>\r\n	<li>熟悉医疗器械相关法规要求，能够提供建设性的法规注册意见</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n', 46, 1, 'admin', 1551883444, '', ''),
(20, '生物等效性试验', 'equivalence', '<div class=\"container s1\">\r\n            <div class=\"row\">\r\n                <div class=\"col-lg-6\">\r\n                    <div class=\"des\">\r\n                        <div class=\"icon\">\r\n                            <i class=\"iconfont icon-shiyan\"></i>\r\n                        </div>\r\n                        <h3 class=\"title\">生物等效性试验</h3>\r\n                       <p>希麦迪构建了一体化的生物等效性试验平台，帮助客户实现项目快速推进。</p>\r\n                    </div>\r\n                </div>\r\n                <div class=\"col-auto\">\r\n                    <img src=\"img/case_p5.jpg\" alt=\"\" class=\"p1\">\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class=\"container s2\">\r\n        <div class=\"content1\">\r\n            <h3 class=\"se-title\"><i class=\"iconfont icon-xuehua\"></i> 整合服务及优势</h3>\r\n\r\n            <div class=\"box\">\r\n            <ul class=\"list\">\r\n                <li>丰富的BE经验，可高质量地快速建立试验所需文档，如临床试验方案等\r\n\r\n</li>\r\n                <li>多家合作良好的I期中心，可承接不同规模和难度的BE试验，且能够实现中心快速启动和受试者快速招募；\r\n\r\n</li>\r\n                <li>自建的满足NMPA和FDA GLP要求的生物样本分析检测实验室，能够实现快速方法学建立，并拥有高灵敏度的分析仪器，完全BE试验检测要求；\r\n\r\n</li>\r\n                <li>一体化的服务体系，能够实现不同业务团队的快速对接，以加快项目进度\r\n\r\n</li>\r\n                <li>针对BE试验特别优化的统计分析流程，能够在短时间内出具统计分析报告</li>\r\n            </ul>\r\n            </div>\r\n            </div>\r\n        </div>', 5, 1, 'admin', 1552484289, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`email`) VALUES
('13212847@qq.com'),
('twotong@gmail.com'),
('twotong@gmail.com1');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `post` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `content` text,
  `category` varchar(50) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `post`, `photo`, `content`, `category`, `added_by`, `added_date`, `importance`) VALUES
(2, '吴昱', 'PhD, 统计专家, CEO', '/uploads/team/wy.jpg', '<h4>教育背景</h4>\r\n                            <dl>\r\n                                <dd>罗格斯大学，生物统计学博士</dd>\r\n                                <dd>清华大学，电机工程和工业工程双学士学位</dd>\r\n                            </dl>\r\n                            <h4>工作经历</h4>\r\n                            <dl>\r\n                                <dd>19 年行业经验，曾在辉瑞、罗氏公司任职\r\n                                </dd>\r\n                                <dd>2003-2010年在美国创立统计咨询公司\r\n                                </dd>\r\n                                <dd>2010-2016年主管美国K&L公司数据和统计部门\r\n                                </dd>\r\n                                <dd>2013-2016年先后担任方恩医药COO及CEO\r\n                                </dd>\r\n                            </dl>\r\n                            <h4>职业荣誉</h4>\r\n                            <dl>\r\n                                <dd>领导完成了超过25个向FDA/EMA NDA申报的统计分析工作</dd>\r\n                            </dl>', '核心团队', 'admin', 1546661515, 100),
(3, '孙立英', 'MD, PhD, 首席医学官', '/uploads/team/sly.jpg', '<h4>教育背景</h4>\r\n\r\n<dl>\r\n	<dd>第三军医大学，临床医学博士</dd>\r\n</dl>\r\n\r\n<h4>工作经历</h4>\r\n\r\n<dl>\r\n	<dd>七年临床外科医生经验</dd>\r\n	<dd>曾任美国海军医学研究所资深研究员，项目组组长</dd>\r\n	<dd>曾任美国军医大学和杜克大学外科副教授、教授</dd>\r\n	<dd>曾任美国国立卫生研究院/癌症研究所，项目主任，资深统计学家，建立国际肿瘤分期 标准</dd>\r\n	<dd>曾任美国食品药品管理局，资深流行病学家、评审组长，医疗器械临床研究和上市后 监管</dd>\r\n</dl>\r\n\r\n<h4>职业荣誉</h4>\r\n\r\n<dl>\r\n	<dd>国务院政府特殊津贴获得者</dd>\r\n	<dd>国家科技进步一等奖、二等奖各一项</dd>\r\n	<dd>军队科技进步一等奖</dd>\r\n	<dd>2016年获美国FDA团队领导奖</dd>\r\n	<dd>发表论文、专著130余篇</dd>\r\n</dl>\r\n', '核心团队', 'admin', 1546661751, 6),
(4, '肖丽君', '高级注册总监', '/uploads/team/xlj.jpg', '<h4>教育背景</h4>\r\n                            <dl>\r\n                                <dd>佳木斯医学院，药学学士</dd>\r\n                            </dl>\r\n                            <h4>工作经历</h4>\r\n                            <dl>\r\n                                <dd>27 年行业经验，18 年法规注册经验和 9 年临床前研发经验\r\n\r\n                                </dd>\r\n                                <dd>2010-2017 年，方恩医药注册部副总监、总监和高级总监\r\n\r\n                                </dd>\r\n                                <dd>成功申报数十个化学药品、生物制品、以及进口药品的 IND 和 NDA 作为策略咨询参与数十个创新药物的早期临床开发\r\n\r\n                                </dd>\r\n                                <dd>申报注册上百个医药产品\r\n\r\n                                </dd>\r\n                                <dd>多个产品的中美双报经验 </dd>\r\n                            </dl>', '核心团队', 'admin', 1546661799, 0),
(5, '吴子爱', '临床运营总监', '/uploads/team/wza.jpg', '<h4>教育背景</h4>\r\n                            <dl>\r\n                                <dd>北大医学部，EMBA\r\n                                </dd>\r\n                                <dd>北京军医学院，临床药学学士</dd>\r\n                            </dl>\r\n                            <h4>工作经历</h4>\r\n                            <dl>\r\n                                <dd>13年临床运营工作\r\n\r\n                                </dd>\r\n                                <dd>曾任诺华制药、拜耳医药、George Clinical、方恩医药 CRA、PM、PMD 和运营总监\r\n\r\n                                </dd>\r\n                                <dd>曾在方恩医药担任肿瘤药和创新药临床项目总监，负责超过 30 个 I-III 期新药临床运营\r\n\r\n                                </dd>\r\n                                <dd>丰富的 I-IV 期临床试验项目经验，领导过心血管、代谢、肿瘤、神经、肝病、肾病等 多个领域的临床运营\r\n                                </dd>\r\n                            </dl>', '核心团队', 'admin', 1546661837, 0),
(6, '徐曼', 'PhD, 生物检测机构负责人', '/uploads/team/xm.jpg', '<h4>教育背景</h4>\r\n                            <dl>\r\n                                <dd>北京大学医学部，药学专业博士</dd>\r\n                            </dl>\r\n                            <h4>工作经历</h4>\r\n                            <dl>\r\n                                <dd>11 年药代动力学研究及法规经验和生物分析管理经验，包括 ADME 筛选平台，IND DMPK 申报，以及用于支持 GLP 毒理和临床试验研究的法规生物分析\r\n\r\n                                </dd>\r\n                                <dd> 曾任康龙化成 DMPK 及法规性生物分析全球副总裁\r\n\r\n                                </dd>\r\n                                <dd>曾任康龙化成临床生物分析检测实验室机构负责人在药物的生物转化、吸收和代谢、外排/摄取/转运、相互作用等领域，极具经验\r\n\r\n                                </dd>\r\n                                <dd>熟悉 NMPA、FDA 新药的临床前及临床申报\r\n                                </dd>\r\n                            </dl>\r\n', '核心团队', 'admin', 1546661879, 0),
(7, '彭宇梅', '数据统计总监', '/uploads/team/pym.jpg', '<h4>教育背景</h4>\r\n                            <dl>\r\n                                <dd>西安交通大学，生物工程硕士，遗传统计方向\r\n                                </dd>\r\n                                <dd>西安交通大学，生物工程学士 </dd>\r\n                            </dl>\r\n                            <h4>工作经历</h4>\r\n                            <dl>\r\n                                <dd>十年以上生物统计和编程经验\r\n\r\n                                </dd>\r\n                                <dd>曾任美斯达、方恩医药生物统计经理、高级经理及总监 负责多个 I 至 IV 期国际、国内项目（涉及不同治疗领域）的统计和编程， 两个 US NDA递交和多个中国 NDA 递交\r\n\r\n\r\n                                </dd>\r\n\r\n                            </dl>', '核心团队', 'admin', 1546661926, 0),
(8, '陈佩妘', '统计美国部高级总监', '/uploads/team/cpy.jpg', '<h4>教育背景</h4>\r\n                            <dl>\r\n                                <dd>北卡罗来纳州立大学，生物统计学博士\r\n                                </dd>\r\n                                <dd>国立政治大学，统计工商管理硕士\r\n                                </dd>\r\n                                <dd>国立台湾大学，数学学士\r\n                                </dd>\r\n                            </dl>\r\n                            <h4>工作经历</h4>\r\n                            <dl>\r\n                                <dd>18 以上年生物统计行业经验\r\n\r\n                                </dd>\r\n                                <dd>曾任默克、美国 FMD K&L 高级统计师、统计副总监、总监和高级总监 作为负责统计师，多次参与 FDA 申报 NDA 工作，涉及多个治疗领域\r\n                                </dd>\r\n\r\n                            </dl>', '核心团队', 'admin', 1546661977, 0),
(9, '尤红', '科学顾问委员会主席', '/uploads/team/yh.jpg', '<h4>教育背景</h4>\r\n                            <dl>\r\n                                <dd>白求恩医科大学临床医学专业学士</dd>\r\n                                <dd>吉林大学行政管理硕士，法学博士</dd>\r\n                            </dl>\r\n                            <h4>工作经历</h4>\r\n                            <dl>\r\n                                <dd>1995-2000, 任白求恩医科大学党委副 书记、副校长、工会主席等职务\r\n\r\n                                </dd>\r\n                                <dd>2000-2002, 任卫生部干部培训中心副主任、党校副校长、办公厅新闻办 公室主任等职务\r\n\r\n                                </dd>\r\n                                <dd>2002-至今, 任中国康复研究中心党委书记、中心副主任，首都医科大学，康复医学院院长，中国残联办公厅主任、康复部主任等职务\r\n                                </dd>\r\n                            </dl>\r\n                            <h4>职业荣誉</h4>\r\n                            <dl>\r\n                                <dd>参与并主持了中国狮子联会代表大会、国际自闭症康复会议等多次重要会议发起组织了多个公益项目 </dd>\r\n                            </dl>', '专家顾问', 'admin', 1546662156, 100),
(10, 'Michael Wang', '科学顾问委员会副主席', '/uploads/team/mw.jpg', '<h4>教育背景</h4>\r\n\r\n<dl>\r\n	<dd>医科大学学士</dd>\r\n	<dd>日本京都大学分子生物学博士</dd>\r\n	<dd>宾夕法尼亚州立大学工商管理硕士</dd>\r\n</dl>\r\n\r\n<h4>工作经历</h4>\r\n\r\n<dl>\r\n	<dd>2002 年加入美国癌症研究基金会（NFCR）之前，在全球领先的技术转让公司&mdash;&mdash;British Technology Group (BTG) 担任肿瘤组，基因和蛋白质组的高级业务拓展经理</dd>\r\n	<dd>作为首席科学官，全面负责癌症研究基金会癌症研究项目和研究行动计划组的工作</dd>\r\n	<dd>亚洲癌症研究基金会（Asian Fund for Cancer Research）的首席运营官</dd>\r\n</dl>\r\n', '专家顾问', 'admin', 1546662202, 99),
(11, 'Judd W. Moul', '医学顾问委员', '/uploads/team/jwm.jpg', '<h4>教育背景</h4>\r\n\r\n<dl>\r\n	<dd>1978/09-1982/06，托马斯杰斐逊大学医学博士</dd>\r\n	<dd>1982/06-1987/06，沃特尔&bull;里德国家军事医学中心泌尿外科专科医生</dd>\r\n</dl>\r\n\r\n<h4>工作经历</h4>\r\n\r\n<dl>\r\n	<dd>1978-2004，美国陆军上尉，少校，中校，上校</dd>\r\n	<dd>1989-2004，美国军医大学外科教授，美国特尔&bull;里德国家军事医学中心泌尿外科前列腺中心主任</dd>\r\n	<dd>2004/08 起，杜克大学医学中心外科系泌尿科主任，教授</dd>\r\n</dl>\r\n\r\n<h4>职业荣誉</h4>\r\n\r\n<dl>\r\n	<dd>国际著名的前列腺病专家，发表论文500余篇</dd>\r\n	<dd>前列腺病杂志主编</dd>\r\n	<dd>美国国防部前列腺病研究中心主任，杜克大学前列腺中心主任</dd>\r\n</dl>\r\n', '专家顾问', 'admin', 1546662244, 98),
(12, '金拓', '药学顾问委员', '/uploads/team/jk.jpg', '<h4>教育背景</h4>\r\n                            <dl>\r\n                                <dd>1981，南开大学化学系化学学士\r\n\r\n                                </dd>\r\n                                <dd>1985，日本北海道大学理学院物理化学博士\r\n                                </dd>\r\n                                <dd>1997，加拿大多伦多大学药学院药剂学博士\r\n                                </dd>\r\n                                <dd>1985-1990，美国德州大学莱斯大学化学系博士后 </dd>\r\n                            </dl>\r\n                            <h4>工作经历</h4>\r\n                            <dl>\r\n                                <dd>1998-1999，美国 BioDelivery Sciences International, Inc.药剂研究部主任\r\n\r\n                                </dd>\r\n                                <dd>1999-2003，美国长岛大学药学院副教授\r\n\r\n                                </dd>\r\n                                <dd>2003-至今, 上海交通大学药学院教授博士生导师“药物输送与生物材料”研究室负责人\r\n                                </dd>\r\n\r\n                            </dl>\r\n                            <h4>职业荣誉</h4>\r\n                            <dl>\r\n                                <dd>发表学术论文 20 余篇\r\n\r\n                                </dd>\r\n                                <dd>获得 2 项发明专利\r\n\r\n                                </dd>\r\n                                <dd>解决了蛋白药物以自然形态长效缓释这一药剂学领域36年久攻未克的难题，促红细胞生成素缓释微球进入了产业化开发阶段\r\n\r\n                                </dd>\r\n                                <dd>人体内源性分子与安全性已知药物代谢物构建的成药性与SiRNA合成载体研究获德国应用化学 TOP10% 论文的评价 </dd>\r\n                            </dl>', '专家顾问', 'admin', 1546662387, 97),
(13, 'Joseph Su', '数理统计顾问委员', '/uploads/team/js.jpg', '<h4>教育背景</h4>\r\n                            <dl>\r\n                                <dd>1998，北卡洛琳娜州大学营养流行病学博士\r\n                                </dd>\r\n                                <dd>1995，明尼苏达大学公共健康营养学硕士\r\n                                </dd>\r\n                                <dd>1993，明尼苏达大学营养科学学士\r\n                                </dd>\r\n                                <dd>1987，台湾中原大学化学系学士 </dd>\r\n                            </dl>\r\n                            <h4>工作经历</h4>\r\n                            <dl>\r\n                                <dd>主任，教授，阿肯色大学医学科学院的菲.布兹曼公共健康学院，流行病学教研室\r\n                                </dd>\r\n                                <dd>主任，阿肯色大学医学科学院的温斯若.洛克菲勒癌症研究所的癌症预防与公共卫生研究室\r\n                                </dd>\r\n                                <dd>1998-2004，助理教授，路易斯安娜州大学肿瘤登记中心\r\n                                </dd>\r\n                                <dd>2005-2013， 项目主任, 美国国立卫生研究院/国家癌症研究所（NIH/NCI）\r\n                                </dd>\r\n                                <dd>2014-2016，主任，美国药监局医疗器械中心流行病学部（FDA）</dd>\r\n                            </dl>', '专家顾问', 'admin', 1546662427, 96),
(14, '关劼', '科学顾问委员会秘书长', '/uploads/team/gj.jpg', '<h4>教育背景</h4>\r\n\r\n<dl>\r\n	<dd>毕业于吉林大学医学部医疗专业</dd>\r\n	<dd>中国人民大学医院管理工商管理硕士</dd>\r\n</dl>\r\n\r\n<h4>工作经历</h4>\r\n\r\n<dl>\r\n	<dd>2011-2014，任中日医院健康管理中心副主任</dd>\r\n	<dd>2015-至今，任中日医院消化科主任医师</dd>\r\n	<dd>兼任北京医师协会健康管理专家委员会专家，北京市医疗事故鉴定委员会专家，中华实用医药杂志常务编委</dd>\r\n	<dd>长期承担北京医科大学、北京中医药大学教学工作</dd>\r\n</dl>\r\n\r\n<h4>职业荣誉</h4>\r\n\r\n<dl>\r\n	<dd>完成卫生部及院级重点科研课题，发表论文30余篇</dd>\r\n	<dd>分别在2005和2008年，被评为中日友好医院优秀教师和优秀共产党员</dd>\r\n</dl>\r\n', '专家顾问', 'admin', 1546662462, 95),
(15, 'Wilson Wong ', 'MD,首席医学官', 'http://tzgcms.com:8888/uploads/team/wilson_wong.jpg', '<h4>教育背景</h4>\r\n\r\n<dl>\r\n	<dd>国立台湾大学，临床医学本科</dd>\r\n	<dd>国立台湾大学，内科住院医师</dd>\r\n	<dd>美国范德堡大学（Vanderbilt University），临床药理学，研究员</dd>\r\n	<dd>美国范德堡大学（Vanderbilt University），临床医学心血管方向，研究员</dd>\r\n	<dd>美国范德堡大学（Vanderbilt University），心脏电生理学，研究员</dd>\r\n</dl>\r\n\r\n<h4>工作经历</h4>\r\n\r\n<dl>\r\n	<dd>阿肯色州立心脏病医院，心血管和心脏电生理高级医师，1994年至今，长期从事心血管和心脏电生理临床诊治工作</dd>\r\n</dl>\r\n\r\n<h4>职业荣誉</h4>\r\n\r\n<dl>\r\n	<dd>1988年至今，以主要研究者和研究者身份，完成和参与多项用于FDA申报的临床研究</dd>\r\n</dl>\r\n', '核心团队', 'admin', 1552032924, 5);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `added_by`, `added_date`) VALUES
(1, '30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强 强联手，助力中国临床试验取得新进展', 'admin', 1546588491);

-- --------------------------------------------------------

--
-- Table structure for table `wp_articles`
--

CREATE TABLE `wp_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `pubdate` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(150) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `added_date` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT '1',
  `summary` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_articles`
--

INSERT INTO `wp_articles` (`id`, `title`, `content`, `pubdate`, `description`, `keywords`, `view_count`, `active`, `added_by`, `thumbnail`, `image_url`, `added_date`, `categoryId`, `summary`) VALUES
(112, '希麦迪建立PK分析实验室，加速推进生物样本分析领域布局', '<p>希麦迪医药在南京江宁总部基地新建生物分析实验室，该实验室占地面积超过1000㎡，于2018年5月正式投入运营，可支持全套临床样品生物分析服务：包括全方位先进的分析法开发、分析方法验证以及样品分析等。</p>\r\n', 1535731200, '希麦迪医药在南京江宁总部基地新建生物分析实验室，该实验室占地面积超过1000㎡，于2018年5月正式投入运营，可支持全套临床样品生物分析服务：包括全方位先进的分析法开发、分析方法验证以及样品分析等。', '', 11, 1, 'admin', 'http://tzgcms.com:8888/uploads/news/n1.jpg', '/uploads/news/n1.jpg', 1546439794, 1, '希麦迪医药在南京江宁总部基地新建生物分析实验室，该实验室占地面积超过1000㎡，于2018年5月正式投入运营，可支持全套临床样品生物分析服务：包括全方位先进的分析法开发、分析方法验证以及样品分析等。'),
(113, '2018 Medidata Next: 希麦迪展位吸引众多与会者聚焦', '<p>在 2018 Medidata NEXT 中国区会议于2018年7月12日在上海盛大开幕。希麦迪医药与众来宾们齐聚一堂，共同讨论临床开发技术变革，交流分享生命科学技术前沿和创新，一同揭秘临床研究的未来蓝图。</p>\r\n', 1533052800, '在 2018 Medidata NEXT 中国区会议于2018年7月12日在上海盛大开幕。希麦迪医药与众来宾们齐聚一堂，共同讨论临床开发技术变革，交流分享生命科学技术前沿和创新，一同揭秘临床研究的未来蓝图。', '', 12, 1, 'admin', 'http://tzgcms.com:8888/uploads/news/n2.jpg', '', 1546440106, 1, '在 2018 Medidata NEXT 中国区会议于2018年7月12日在上海盛大开幕。希麦迪医药与众来宾们齐聚一堂，共同讨论临床开发技术变革，交流分享生命科学技术前沿和创新，一同揭秘临床研究的未来蓝图。'),
(114, '“史上最严”的药物临床试验数据核查', '<p>必须下大力开展核查，把问题消灭在萌芽状态，为药品安全扫除隐患，食品药品监管部门下定了决心。作为公众用药安全的守护者，监管部门深切地认识到，临床数据真实性、完整性、规范性问题不解决，就不可能有真正意义的药物科学研究和技术创新，就不可能保证上市药品的安全、有效和质量可控.</p>\r\n', 1532361600, '必须下大力开展核查，把问题消灭在萌芽状态，为药品安全扫除隐患，食品药品监管部门下定了决心。作为公众用药安全的守护者，监管部门深切地认识到，临床数据真实性、完整性、规范性问题不解决，就不可能有真正意义的药物科学研究和技术创新，就不可能保证上市药品的安全、有效和质量可控.', '', 13, 1, 'admin', 'http://tzgcms.com:8888/uploads/news/n3.jpg', '', 1546440150, 1, '必须下大力开展核查，把问题消灭在萌芽状态，为药品安全扫除隐患，食品药品监管部门下定了决心。作为公众用药安全的守护者，监管部门深切地认识到，临床数据真实性、完整性、规范性问题不解决，就不可能有真正意义的药物科学研究和技术创新，就不可能保证上市药品的安全、有效和质量可控.');

-- --------------------------------------------------------

--
-- Table structure for table `wp_carousels`
--

CREATE TABLE `wp_carousels` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `importance` int(11) NOT NULL,
  `link` varchar(150) NOT NULL,
  `added_date` datetime NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_carousels`
--

INSERT INTO `wp_carousels` (`id`, `title`, `description`, `importance`, `link`, `added_date`, `added_by`, `image_url`, `active`) VALUES
(11, 'test004', '', 0, 'http://www.baidu.com', '2019-01-02 22:21:30', 'admin', '/uploads/sliders/s001.jpg', 1),
(7, 'test002', '', 0, 'http://www.baidu.com', '2016-06-27 21:06:55', 'water', '/uploads/sliders/s002.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_distributors`
--

CREATE TABLE `wp_distributors` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `coordinate` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `cooperation` varchar(100) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `importance` int(11) NOT NULL,
  `added_date` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_distributors`
--

INSERT INTO `wp_distributors` (`id`, `email`, `coordinate`, `phone`, `cooperation`, `city`, `importance`, `added_date`, `added_by`, `address`, `active`) VALUES
(13, 'info@crmedicon.com', '-74.475631,40.553841', '+1 (732) 624-9050', '', '美国新泽西', 27, 1425271071, 'wateradmin', '美国新泽西州皮斯卡塔韦市威尔路35号', 1),
(14, 'info@crmedicon.com', '114.338005,30.542371', '+86-27-59352192', '', '武汉', 26, 1425271175, 'wateradmin', '武汉市武昌区中南路7号中商广场写字楼B3108室', 1),
(15, 'info@crmedicon.com', '121.410713,31.212312', '+86-21-62556153', '', '上海', 25, 1425271203, 'wateradmin', '上海市长宁区仙霞路137号盛高国际大厦2301室', 1),
(16, 'bd@crmedicon.com', '116.506823,39.899829', '+86-10-52345921-811', '+86 13693083029 朱女士', '北京', 24, 1425271232, 'wateradmin', '北京市朝阳区广渠路11号院1号楼金泰国际大厦A座1507-1508室', 1),
(17, 'bd@crmedicon.com', '118.839437,31.939679', '+86-25-58707829', '+86 15821263950 仲先生', '南京(总部)', 23, 1425271263, 'wateradmin', '南京市江宁区菲尼克斯路99号', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wp_links`
--

CREATE TABLE `wp_links` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(150) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_date` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_links`
--

INSERT INTO `wp_links` (`id`, `title`, `link`, `image_url`, `importance`, `active`, `added_date`, `added_by`) VALUES
(1, '天猫商城', 'https://waterpikgrhl.tmall.hk/', '/assets/ckfinder/userfiles/images/link/logo_03.jpg', 10, 1, 1422975168, 'doubletong'),
(2, '淘宝网', 'http://careplus.taobao.com/', '/assets/ckfinder/userfiles/images/link/logo_09.jpg', 8, 1, 1425106564, 'wateradmin'),
(3, 'suning', 'http://shop.suning.com/70080446', '/assets/ckfinder/userfiles/images/link/logo_18.jpg', 8, 1, 1425106596, 'wateradmin'),
(4, 'yihaodian', 'http://shop.yhd.com/m-71056.html?tp=51.%E6%B4%81%E7%A2%A7.124.0.267.Kg63Wyd', '/assets/ckfinder/userfiles/images/link/logo_22.jpg', 7, 1, 1425106618, 'wateradmin'),
(5, 'yamasun', 'http://www.amazon.cn/gp/', '/assets/ckfinder/userfiles/images/link/logo_07.jpg', 6, 1, 1425106639, 'wateradmin'),
(6, '京东商城5445ll', 'http://brand.gome.com.cn/147j-cat15985630.html', '/assets/ckfinder/userfiles/files/videos/gome(1).jpg', 0, 1, 1460366645, 'wateradmin'),
(7, '京东商城', 'http://mall.jd.com/index-1000004667.html', '/assets/ckfinder/userfiles/images/link/logo_05.jpg', 9, 1, 1468380827, 'water');

-- --------------------------------------------------------

--
-- Table structure for table `wp_orderitems`
--

CREATE TABLE `wp_orderitems` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `product_no` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_orderitems`
--

INSERT INTO `wp_orderitems` (`id`, `order_id`, `product_id`, `quantity`, `price`, `title`, `product_no`) VALUES
(25, 20, 38, 1, '0.01', '洁碧精致型水牙线(测试不卖)', 'WP-250EC'),
(26, 21, 38, 1, '0.01', '洁碧精致型水牙线(测试不卖)', 'WP-250EC'),
(27, 22, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(31, 26, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(29, 24, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(30, 25, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(32, 27, 39, 1, '0.01', '测试', '00001'),
(33, 28, 40, 1, '128.00', '纳米超声波自动电动牙刷', 'Nano-Sonic'),
(34, 29, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(35, 30, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(36, 31, 38, 1, '799.00', '洁碧精致型水牙线', 'WP-250EC'),
(37, 32, 38, 1, '799.00', '洁碧精致型水牙线', 'WP-250EC'),
(38, 33, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(39, 33, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(40, 34, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(41, 35, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(42, 36, 37, 2, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(43, 37, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(44, 38, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(45, 39, 40, 2, '128.00', '纳米超声波自动电动牙刷', 'Nano-Sonic'),
(46, 40, 40, 2, '128.00', '纳米超声波自动电动牙刷', 'Nano-Sonic'),
(47, 41, 40, 2, '128.00', '纳米超声波自动电动牙刷', 'Nano-Sonic'),
(48, 42, 40, 2, '128.00', '纳米超声波自动电动牙刷', 'Nano-Sonic'),
(49, 43, 36, 2, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(50, 44, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(51, 45, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(52, 46, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(53, 47, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(54, 48, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(55, 49, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(56, 50, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(57, 51, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(58, 52, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(59, 53, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(60, 54, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(61, 55, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(62, 56, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(63, 57, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(64, 58, 37, 2, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(65, 59, 37, 2, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(66, 60, 37, 2, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(67, 61, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(68, 62, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(69, 63, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(70, 64, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(71, 65, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(72, 66, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(73, 67, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(74, 68, 40, 1, '128.00', '纳米超声波自动电动牙刷', 'Nano-Sonic'),
(75, 68, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(76, 69, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(77, 70, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(78, 71, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(79, 72, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(80, 73, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(81, 74, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(82, 75, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(83, 76, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(84, 78, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(85, 79, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(86, 80, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(87, 81, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(88, 82, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(89, 83, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(90, 84, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(91, 86, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(92, 87, 35, 2, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(93, 88, 35, 2, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(94, 89, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(95, 90, 35, 2, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(96, 91, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(97, 92, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(98, 93, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(99, 94, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(100, 95, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(101, 96, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(102, 97, 40, 1, '128.00', '纳米超声波自动电动牙刷', 'Nano-Sonic'),
(103, 98, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(104, 99, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(105, 100, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(106, 101, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(107, 102, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(108, 103, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(109, 104, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(110, 105, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(111, 106, 37, 1, '810.00', '洁碧便携式水牙线', 'WP-450EC'),
(112, 107, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(113, 108, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(114, 109, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(115, 110, 36, 1, '399.00', '洁碧标准型水牙线', 'WP-70EC'),
(116, 111, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(117, 112, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(118, 113, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(119, 114, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(120, 115, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(121, 116, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(122, 117, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(123, 118, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(124, 119, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(125, 121, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(126, 122, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(127, 123, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(128, 124, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(129, 126, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(130, 127, 35, 2, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(131, 128, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(132, 129, 35, 2, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(133, 131, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(134, 132, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(135, 133, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(136, 134, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(137, 135, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(138, 136, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(139, 137, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(140, 138, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(141, 139, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(142, 140, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(143, 141, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(144, 142, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(145, 143, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(146, 144, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(147, 145, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(148, 146, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(149, 147, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(150, 148, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(151, 149, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(152, 150, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(153, 151, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(154, 152, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(155, 153, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(156, 154, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(157, 155, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(158, 158, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(159, 161, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(160, 162, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(161, 163, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(162, 164, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(163, 165, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(164, 166, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(165, 167, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(166, 168, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(167, 169, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(168, 170, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(169, 171, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(170, 172, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(171, 173, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(172, 174, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(173, 175, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(174, 176, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(175, 177, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(176, 178, 40, 2, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(177, 179, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(178, 180, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(179, 181, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(180, 182, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(181, 183, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(182, 184, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(183, 185, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(184, 187, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(185, 188, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(186, 189, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(187, 190, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(188, 191, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(189, 192, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(190, 193, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(191, 193, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(192, 194, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(193, 195, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(194, 196, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(195, 197, 37, 2, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(196, 198, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(197, 199, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(198, 200, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(199, 201, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(200, 202, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(201, 203, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(202, 204, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(203, 206, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(204, 207, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(205, 208, 47, 1, '899.00', '洁碧便携式水牙线', '（WP-462EC）'),
(206, 209, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(207, 210, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(208, 211, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(209, 212, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(210, 213, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(211, 214, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(212, 215, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(213, 216, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(214, 217, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(215, 218, 35, 100, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(216, 219, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(217, 220, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(218, 221, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(219, 222, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(220, 223, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(221, 224, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(222, 225, 35, 2, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(223, 226, 35, 2, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(224, 227, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(225, 228, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(226, 229, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(227, 230, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(228, 231, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(229, 232, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(230, 233, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(231, 234, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(232, 235, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(233, 236, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(234, 237, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(235, 238, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(236, 239, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(237, 240, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(238, 241, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(239, 242, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(240, 242, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(241, 243, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(242, 244, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(243, 245, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(244, 246, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(245, 246, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(246, 247, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(247, 247, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(248, 248, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(249, 249, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(250, 250, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(251, 251, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(252, 252, 40, 2, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(253, 253, 40, 2, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(254, 254, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(255, 255, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(256, 256, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(257, 257, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(258, 258, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(259, 259, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(260, 260, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(261, 261, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(262, 262, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(263, 263, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(264, 264, 36, 2, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(265, 265, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(266, 266, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(267, 267, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(268, 268, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(269, 269, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(270, 270, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(271, 271, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(272, 272, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(273, 273, 47, 1, '899.00', '洁碧便携式水牙线', '（WP-462EC）'),
(274, 274, 49, 1, '1398.00', '洁碧超效型水牙线', 'WP-108EC'),
(275, 275, 50, 1, '499.00', '洁碧无线型水牙线', 'WF-02EC'),
(276, 276, 51, 1, '1698.00', '洁碧全护型5.0水牙线及声波牙刷组合', 'WP-861EC'),
(277, 277, 49, 1, '1398.00', '洁碧超效型水牙线', 'WP-108EC'),
(278, 278, 49, 1, '1398.00', '洁碧超效型水牙线', 'WP-108EC'),
(279, 279, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(280, 280, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(281, 281, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(282, 282, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(283, 283, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(284, 284, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(285, 285, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(286, 285, 50, 1, '499.00', '洁碧无线型水牙线', 'WF-02EC'),
(287, 286, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(288, 287, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(289, 288, 38, 3, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(290, 289, 38, 3, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(291, 290, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(292, 291, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(293, 292, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(294, 293, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(295, 294, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(296, 295, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(297, 296, 35, 4, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(298, 297, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(299, 298, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(300, 299, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(301, 300, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(302, 301, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(303, 302, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(304, 303, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(305, 304, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(306, 305, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(307, 306, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(308, 308, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(309, 309, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(310, 310, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(311, 311, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(312, 312, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(313, 314, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(314, 315, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(315, 316, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(316, 317, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(317, 318, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(318, 319, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(319, 320, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(320, 321, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(321, 322, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(322, 323, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(323, 324, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(324, 325, 50, 1, '499.00', '洁碧无线型水牙线', 'WF-02EC'),
(325, 326, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(326, 327, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(327, 329, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(328, 330, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(329, 331, 49, 1, '1398.00', '洁碧超效型水牙线', 'WP-108EC'),
(330, 332, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(331, 333, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(332, 334, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(333, 335, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(334, 336, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(335, 337, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(336, 338, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(337, 339, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(338, 340, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(339, 341, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(340, 342, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(341, 343, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(342, 344, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(343, 345, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(344, 346, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(345, 347, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(346, 348, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(347, 349, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(348, 350, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(349, 351, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(350, 352, 51, 1, '1698.00', '洁碧全护型5.0水牙线及声波牙刷组合', 'WP-861EC'),
(351, 353, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(352, 354, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(353, 355, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(354, 356, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(355, 357, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(356, 358, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(357, 359, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(358, 360, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(359, 361, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(360, 362, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(361, 363, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(362, 364, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(363, 365, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(364, 366, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(365, 367, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(366, 368, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(367, 369, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(368, 370, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(369, 371, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(370, 372, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(371, 373, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(372, 374, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(373, 375, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(374, 376, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(375, 377, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(376, 378, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(377, 379, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(378, 380, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(379, 381, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(380, 382, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(381, 383, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(382, 384, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(383, 385, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(384, 386, 47, 1, '899.00', '洁碧便携式水牙线', '（WP-462EC）'),
(385, 387, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(386, 388, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(387, 389, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(388, 390, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(389, 391, 35, 2, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(390, 392, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(391, 393, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(392, 394, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(393, 395, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(394, 396, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(395, 397, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(396, 398, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(397, 399, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(398, 400, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(399, 401, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(400, 402, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(401, 403, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(402, 404, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(403, 405, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(404, 406, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(405, 407, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(406, 408, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(407, 409, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(408, 410, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(409, 411, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(410, 412, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(411, 413, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(412, 414, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(413, 415, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(414, 416, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(415, 417, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(416, 418, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(417, 419, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(418, 420, 45, 1, '1298.00', '洁碧超效型水牙线', 'WP-112EC'),
(419, 421, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(420, 422, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(421, 423, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(422, 424, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(423, 425, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(424, 426, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(425, 427, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(426, 428, 50, 1, '599.00', '洁碧无线型水牙线', 'WF-02EC'),
(427, 429, 40, 2, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(428, 430, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(429, 431, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(430, 432, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(431, 433, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(432, 434, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(433, 436, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(434, 437, 37, 2, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(435, 438, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(436, 439, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(437, 440, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(438, 441, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(439, 442, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(440, 443, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(441, 444, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(442, 445, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(443, 446, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(444, 447, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(445, 448, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(446, 449, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(447, 450, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(448, 450, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(449, 451, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(450, 452, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(451, 453, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(452, 454, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(453, 455, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(454, 456, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(455, 457, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(456, 458, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(457, 459, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(458, 460, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(459, 461, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(460, 462, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(461, 463, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(462, 464, 51, 1, '1698.00', '洁碧全护型5.0水牙线及声波牙刷组合', 'WP-861EC'),
(463, 465, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(464, 466, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(465, 467, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(466, 468, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(467, 469, 40, 2, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(468, 470, 40, 2, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(469, 471, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(470, 472, 40, 2, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(471, 473, 40, 2, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(472, 474, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(473, 475, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(474, 476, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(475, 477, 37, 2, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(476, 478, 38, 1, '699.00', '洁碧精致型水牙线', 'WP-250EC'),
(477, 479, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(478, 480, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(479, 481, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(480, 482, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(481, 483, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(482, 484, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(483, 485, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(484, 486, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(485, 487, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(486, 488, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(487, 489, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(488, 490, 45, 1, '1298.00', '洁碧超效型水牙线', 'WP-112EC'),
(489, 491, 45, 1, '1298.00', '洁碧超效型水牙线', 'WP-112EC'),
(490, 492, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(491, 493, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(492, 494, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(493, 495, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(494, 496, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(495, 497, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(496, 498, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(497, 499, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(498, 500, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(499, 501, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(500, 502, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(501, 503, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(502, 504, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(503, 505, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(504, 506, 40, 1, '128.00', '纳米声波自动电动牙刷', 'Nano-Sonic'),
(505, 507, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(506, 508, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(507, 509, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(508, 510, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(509, 511, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC'),
(510, 512, 36, 1, '499.00', '洁碧标准型水牙线', 'WP-70EC'),
(511, 513, 50, 1, '599.00', '洁碧无线型水牙线', 'WF-02EC'),
(512, 514, 35, 1, '899.00', '洁碧超效型水牙线', 'WP-100EC'),
(513, 515, 37, 1, '599.00', '洁碧便携式水牙线', 'WP-450EC');

-- --------------------------------------------------------

--
-- Table structure for table `wp_orders`
--

CREATE TABLE `wp_orders` (
  `id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `added_date` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `ispay` tinyint(1) NOT NULL,
  `trade_no` varchar(50) DEFAULT NULL,
  `trade_status` varchar(50) DEFAULT NULL,
  `express` varchar(50) DEFAULT NULL,
  `expressNo` varchar(50) DEFAULT NULL,
  `remark` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_orders`
--

INSERT INTO `wp_orders` (`id`, `address`, `customer`, `phone`, `added_date`, `quantity`, `amount`, `ispay`, `trade_no`, `trade_status`, `express`, `expressNo`, `remark`) VALUES
(20, '广东省渤海市', '张三(测试)', '15361828193', 1428224676, 1, '0.01', 0, '', '', NULL, NULL, NULL),
(21, '广东省渤海市', '张三(测试)', '15361828193', 1428224999, 1, '0.01', 1, '', '', 'ddd', 'dddddddd', 'ddddddd'),
(22, '北京丰台大成郡四区纤云园8号楼1单元102', '张丽娟', '13718229777', 1428481549, 1, '399.00', 0, '', '', NULL, NULL, NULL),
(26, '湖北省荆州市沙市区江津东路153号联通公司', '余功华', '18607211003', 1430912903, 1, '399.00', 1, '', '', '顺丰快递', '906765621805', NULL),
(24, '浙江省温州市鹿城区绣山路198号水利局大楼401室', '夏志昌', '139658926957', 1430366615, 1, '810.00', 1, '', '', NULL, NULL, NULL),
(25, '深圳市南山区', '健标', '134565454', 1430366963, 1, '899.00', 0, '', '', NULL, NULL, NULL),
(27, 'fgf', '张三(测试)', '15361828193', 1431072444, 1, '0.01', 1, '2015050800001000000053627959', '', '顺风快递', 'RE002514254', NULL),
(28, '山东济南市中区舜耕路48号', '路洪贵', '13395310607', 1431918251, 1, '128.00', 1, '2015051800001000340053203825', NULL, '顺丰快递', '918316054402', NULL),
(29, '上海市闵行区水清路999弄34号301室', '何亚楠', '13671703109', 1432266653, 1, '899.00', 1, '2015052200001000100067416310', NULL, '顺丰快递', '909885601000', NULL),
(30, '庄行镇邬桥安邬路23号 上海天融电器有限公司', '袁金芳', '13795285271', 1432433765, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(31, '辽宁鞍山市铁西区铁西十道街', '李丽', '15140811151', 1432746673, 1, '799.00', 0, NULL, NULL, NULL, NULL, NULL),
(32, '辽宁鞍山市铁西区铁西', '李莉', '15140811151', 1432746781, 1, '799.00', 0, NULL, NULL, NULL, NULL, NULL),
(33, '深圳市南山区南山大道1002号深意工业大厦三层北座303 香蕉设计', '林徐攀', '13480825343', 1433991010, 2, '1298.00', 0, NULL, NULL, NULL, NULL, NULL),
(34, '广东省深圳市南山区南海大道海典居1栋16F', '尹先生', '13723401015', 1434080039, 1, '399.00', 1, '2015061200001000280058521878', NULL, '顺丰快递', '906767799221', ''),
(35, '中国广东省广州市海珠区东晓南路锦文街4号1901房', '张晓明', '15013325267', 1434299683, 1, '399.00', 1, '2015061500001000200060030339', NULL, '顺丰快递', '906767799355', ''),
(36, '云南省昆明市五华区国防路1栋2单元9室', '赵国翔', '13708405069', 1434722694, 2, '1620.00', 0, NULL, NULL, NULL, NULL, NULL),
(37, '云南省昆明市五华区国防路1栋2单元9室', '赵国翔', '13708405069', 1434722714, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(38, '云南省昆明市五华区国防路1栋2单元9室', '赵国翔', '13708405069', 1434722906, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(39, '深圳市龍崗區平湖街道新南社區鳳凰大道25號', '張蘭婷', '18219297612', 1435808526, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(40, '深圳市龍崗區平湖街道鳳凰大道 25號', '張蘭婷', '18219297612', 1435808715, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(41, '深圳市龙岗区凤凰大道25号   荣发厂', '张兰婷', '18219297612', 1435851826, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(42, '深圳市龙岗区平湖街道新南社区凤凰大道25号      荣发厂', '张兰婷', '18219297612', 1435851950, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(43, '甘肃省嘉峪关市酒钢公司大楼D楼204', '张建利', '18993798822', 1436255077, 2, '798.00', 1, '2015070700001000640055266716', NULL, '顺丰快递', '906767798941', ''),
(44, '北京市西城区平安里西大街31号航天金融大厦7层', '郭漪', '13811980649', 1436445250, 1, '899.00', 1, '2015070900001000190058091470', NULL, '顺丰快递', '023572256614', '北京发货'),
(45, '香港  新界 馬鞍山,  鞍駿街 1號,  馬鞍山中心. 第 3 座 , 17  樓 H室', '苏南', '13602898265', 1436580607, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(46, '广东省东莞市长安镇厦岗福海路27号二楼二商银行2楼(即标记贸易)', '黎露', '15876994570', 1436772004, 1, '399.00', 1, '2015071300001000340059355294', NULL, '顺丰快递', '906767798323', ''),
(47, '31 bishan street 11, #20-01, Singapore 579819', 'Sim s h ', '+6597207766', 1436843549, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(48, '成都市锦江区三官堂一号望江橡树林', '赵晚露', '13608233617', 1437784518, 1, '399.00', 1, '2015072500001000500058848765', NULL, '顺丰快递', '906767797734', ''),
(49, '深圳横岗', '\\\'', '123', 1437844944, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(50, '广东省广州市花都区迎宾大道95号交通大楼', '顾菲（吴明昊代收）', '15625116008', 1438158309, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(51, '哈哈看到', 'yu', '1301202911', 1438277721, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(52, '上海徐汇区钦州南路8弄11号2001室', '王贞', '13818369742', 1438323423, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(53, '上海市徐汇区钦州南路8弄11号2001', '王贞', '13818369742', 1438359158, 1, '399.00', 1, '2015080100001000100075197731', NULL, '顺丰快递', '906767797813', ''),
(54, '上海市闵行区龙吴路5530弄93号105室', '许愿', '18217743001', 1438523904, 1, '399.00', 1, '2015080200001000000061358237', NULL, '顺丰快递', '918098469445', '上海发货'),
(55, '辽宁省沈阳市和平区肇东街52号 民富小区13号楼 （团结路小学对面）', '由一', '13504059939', 1439713043, 1, '399.00', 1, '2015081600001000330063047664', NULL, '顺丰', '993345900290', '北京发货'),
(56, '河北省廊坊市广阳区银河北路336号华为基地L3', '袁博', '13911147928', 1439731543, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(57, '河北省廊坊市广阳区银河北路336号华为基地L3', '袁博', '13911147928', 1439731906, 1, '399.00', 1, '2015081600001000310058934353', NULL, '顺丰', '993345900227', '北京发货'),
(58, '上海市黄浦区白渡路88号', '雷雅丽', '18817809664', 1440135560, 2, '1620.00', 0, NULL, NULL, NULL, NULL, NULL),
(59, '上海市黄浦区白渡路88号康诺口腔', '雷雅丽', '18817809664', 1440135581, 2, '1620.00', 0, NULL, NULL, NULL, NULL, NULL),
(60, '上海市黄浦区白渡路88号康诺口腔', '雷雅丽', '18817809664', 1440136827, 2, '1620.00', 1, '2015082100001000860057699615', NULL, '顺丰', '919697594928', '上海发货，送2个便携袋'),
(61, '上海市松江区泖港镇范家公路晨兴公路口辰塔大桥项目部', '陈龙', '13801718122', 1441158044, 1, '899.00', 1, '2015090221001004420078065646', NULL, '顺丰快递', '919697596539', '上海发货'),
(62, '松江', '于俊杰', '18321285232', 1441240112, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(63, '山东省菏泽市巨野县龙固镇新巨龙能源有限责任公司（邮编274918）', '李森', '18265401066', 1441614905, 1, '399.00', 1, '2015090721001004870073881793', NULL, '顺丰快递', '919697596469', '上海发货，客户旺旺：snlee1989'),
(64, '上海', '啊', '1234567890', 1442463626, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(65, '广东省中山市东区兴中道55号国家税务局直属税务分局', '罗剑晖', '18928168009', 1442499345, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(66, '陕西省西安市高新区科技二路58号枫叶新新家园1#3-602', '贺勇', '13609122341', 1442562298, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(67, '上海市浦东新区龙东大道415弄332号（汤臣高尔夫N102）', '胡沐群', '13801997829', 1443359683, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(68, '广西壮族自治区来宾市象州县平安大道215号', '覃晓鑫', '13263859087', 1443536272, 2, '1027.00', 0, NULL, NULL, NULL, NULL, NULL),
(69, '多大的', '松下', '13333333', 1444615265, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(70, '送', '送', '送', 1444617051, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(71, '上海松江龙源路555号明镜楼B418', '寿新宝', '13818668848', 1444977796, 1, '399.00', 1, '2015101621001004570081977350', NULL, '顺丰速运', '919113418710', ''),
(72, '四川省成都市武侯区聚贤街733号3栋2单元1704室', '冯骁骅', '13880990589', 1445173722, 1, '899.00', 1, '2015101821001004280007913403', NULL, '顺丰速运', '920260540395', '送羊毛毡袋1个'),
(73, '山东济南槐荫区美里路1088号', '王楠', '15865318181', 1445178881, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(74, '北京市门头沟区新桥南大街3号门头沟区中医院病房4楼内三科医生办公室', '马鸣', '13466370866', 1445596036, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(75, '北京市门头沟区新桥南大街3号门头沟区中医院病房4楼内三科医生办公室', '马鸣', '13466370866', 1446009119, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(76, '北京市门头沟区新桥南大街3号门头沟区中医院病房4楼内三科医生办公室', '马鸣', '13466370866', 1446012348, 1, '399.00', 1, '2015102821001004350061709924', NULL, '顺丰速运', '307367737154', '北京发货\r\n'),
(77, '北京市门头沟区新桥南大街3号门头沟区中医院病房4楼内三科医生办公室', '马鸣', '13466370866', 1446014035, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(78, '东安路', 'a', '13512174886', 1446521701, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(79, '的', 'a', '13512174886', 1446525216, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(80, '贵州省贵阳市小河区四方河路山水黔城三组团', '关关', '15186868842', 1447200965, 1, '899.00', 1, '2015111121001004230041067740', NULL, '韵达单号', '1901297443099', ''),
(81, '江西省抚州市临川一中老校区', '孙兰婷', '13918696340', 1447314701, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(82, '上海市虹口区广粤路95号309', '舒承毅', '13601714451', 1447729821, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(83, '上海杨浦区民星路250号', '庄宏', '13917469896', 1447729902, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(84, '上海杨浦区民星路250号', '庄宏', '13917469896', 1447730373, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(85, '上海杨浦区民星路250号', '庄宏', '13917469896', 1447730506, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(86, '上海杨浦区民星路250号', '庄宏', '13917469896', 1447730848, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(87, '福州市长乐市东鹤路1号吴航街道办事处', '张雪珠', '13960876499', 1448375754, 2, '1798.00', 0, NULL, NULL, NULL, NULL, NULL),
(88, '福州市长乐市东鹤路1号吴航街道办事处', '张雪珠', '13960876499', 1448375817, 2, '1798.00', 0, NULL, NULL, NULL, NULL, NULL),
(89, '福建省福州市长乐市东鹤路1号吴航街道办事处', '张雪珠', '13960876499', 1448376035, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(90, '福建省福州市长乐市东鹤路1号吴航街道办事处', '张雪珠', '13960876499', 1448376278, 2, '1798.00', 0, NULL, NULL, NULL, NULL, NULL),
(91, '', '', '', 1448446652, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(92, '', '', '', 1448446653, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(93, '福州市台江区排尾路268号利嘉花园27号店瑞涛五金标准件店', '陈瑞国', '13635294127', 1448633582, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(94, '广州市先烈中路81号大院62栋604', '钟红海', '87681231', 1449547760, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(95, '浙江省杭州市浙江大学附属第一医院门诊7楼口腔科26号位子', '姜鑫俊', '18858181041', 1450093650, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(96, '浙江省杭州市浙江大学附属第一医院门诊7楼口腔科26号位子', '姜鑫俊', '18858181041', 1450093747, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(97, '广州市越秀区百灵路九星巷11号808', '黄育明', '13302284002', 1450333136, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(98, '北京市海淀区永丰路百旺茉莉园一期10号楼104', '田亚楠', '18010130021', 1450945551, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(99, '北京市海淀区永丰路百旺茉莉园一期10号楼104', '田亚楠', '18010130021', 1450945563, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(100, ' 宝山区 华灵路1781 弄70号1001室 200442', '陈琦', '13003233395', 1451003873, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(101, ' 宝山区 华灵路1781 弄70号1001室 200442', '陈琦', '13003233395', 1451003907, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(102, '北京海淀清河小营君安家园东区7号楼1606号', '吴谦坤', '13621041760', 1451048407, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(103, '北京海淀清河小营君安家园东区7号楼1606号', '吴谦坤', '13621041760', 1451048601, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(104, 'tianjin', 'jun zhu', '01186222', 1451143899, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(105, '浙江省杭州市浙江大学附属第一医院门诊7楼口腔科26号位子', '姜鑫俊', '18858181041', 1451391915, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(106, '浙江省杭州市浙江大学附属第一医院门诊7楼口腔科26号位子', '姜鑫俊', '18858181041', 1451392299, 1, '810.00', 0, NULL, NULL, NULL, NULL, NULL),
(107, '上海市宝山区华灵路1781弄70号1001室', '陈琦', '13003233395', 1451633878, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(108, '上海市宝山区华灵路1781弄70号1001室', '陈琦', '13003233395', 1451633894, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(109, '111', '111', '111', 1452568407, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(110, '北京', '韩冰', '13401137253', 1452676089, 1, '399.00', 0, NULL, NULL, NULL, NULL, NULL),
(111, '上海市普陀区光新路168号石泉金融大厦11层', '路飞', '17701609929', 1453432951, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(112, '上海市普陀区光新路168号石泉金融大厦11层', '路飞', '17701609929', 1453433349, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(113, '湖南省株洲市荷塘区电焊条厂东城家园3-705号', '余鹏', '13973323335', 1455332924, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(114, '北京市朝阳区建国门外大街丙24号京泰大厦23层', '林真', '010-65156551', 1455770413, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(115, '江苏省常州市钟楼区荷花池街道健身路29号体育彩票中心', '臧荣芳', '13961127635', 1455778508, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(116, '南京江宁区将军路翠屏清华园51栋906', '洪灏', '13952006561', 1455853092, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(117, '南京江宁区将军路翠屏清华园51栋906', '洪灏', '13952006561', 1455874783, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(118, '重庆市江津区江津中学地理组', '许新叶', '13508396330', 1456313420, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(119, '山东临沂临西七路与水田路交汇向北50米路西琅琊王石业', '张乃征', '15562986055', 1456481061, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(120, '广东省肇庆高新区尚城国际花园A1   1403房  ', '梁银萍', '18027813156', 1456536939, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(121, '广东省肇庆高新区（四会大旺）尚城国际花园A1  1403房', '梁银萍', '18027813156', 1456537847, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(122, '', '', '', 1457850674, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(123, '昆明市青年路395号3506室', '齐矿铸', '13658886007', 1458003101, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(124, '延吉市，极美水岸，b座15楼13号', '李晓妍', '18744333167', 1458068358, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(125, '延吉市，极美水岸，b座15楼13号', '李晓妍', '18744333167', 1458100895, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(126, '上海徐汇区宜山路868号漕河泾开发区总公司4楼', '姚遥', '18930170802', 1458107032, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(127, '1', '1', '1', 1458111663, 2, '1798.00', 0, NULL, NULL, NULL, NULL, NULL),
(128, '1', '1', '1', 1458111862, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(129, '吴江', '李', '17714218520', 1458112026, 2, '1798.00', 0, NULL, NULL, NULL, NULL, NULL),
(130, '延吉市，极美水岸，b座15楼13号', '李晓妍', '18744333167', 1458124580, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(131, '极美水岸b座15楼13号', '李晓妍', '18744333167', 1458124792, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(132, '吴江', '李晓敏', '17714218520', 1458186036, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(133, '朝阳市朝阳大街', '赵国庆', '15801331073', 1458289864, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(134, '上海徐汇区汾阳路83号6号楼6楼', '缪爱珠', '13801891501', 1458369796, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(135, '上海徐汇区汾阳路83号6号楼6楼', '缪爱珠', '13801891501', 1458370568, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(136, '上海徐汇区汾阳路83号6号楼6楼', '缪爱珠', '13801891501', 1458370586, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(137, '上海市徐汇区汾阳路83号6号楼6楼', '缪爱珠', '13801891501', 1458387900, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(138, '成都市八宝街28号', '蒋晓旭', '13908059284', 1459140467, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(139, '浙江省宁波市镇海区平海路1188号物流枢纽港Ｄ座423室', '徐暮斌', '18650803131', 1459211127, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(140, '浙江省宁波市镇海区平海路1188号物流枢纽港Ｄ座４楼', '徐暮斌', '18667806333', 1459217017, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(141, '湖北省黄石市黄石港区人民法院', '彭方治', '13329925966', 1459314795, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(142, '北京市 海淀区 万柳东路 万泉新新家园 29楼4门101', '张红', '13381003933', 1459321232, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(143, '北京市石景山区八角东街65号融科创意产业中心A座1006', '刘肖克', '18612558887', 1459828995, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(144, '33dasdfsadf ', 'test', '13811283726', 1459908212, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(145, '北京市朝阳区', '张测试', '13222222222', 1459910063, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(146, 'shenzhen', 'gina', '1234567890', 1459912804, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(147, '建行西藏分行（拉萨市北京西路21号）', '拉巴顿珠', '13889013000', 1459954151, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(148, '上海市徐汇区东泉小区东泉路50弄20号403室', '历小雅', '13122534818', 1460981690, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(149, '', '', '', 1460982317, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(150, '上海市徐汇区东泉小区东泉路50弄20号403室', '历小雅', '13122534818', 1460982444, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(151, '上海市徐汇区东泉小区东泉路50弄20号403室', '历小雅', '13122534818', 1460986993, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(152, '浙江省杭州市滨江区彩虹城44#1302', '倪璐舟', '15957183123', 1461839659, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(153, '江苏省南通市啬园路9号 南通大学校办', '蒋乃华', '15706296789', 1462051276, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(154, '江苏省南通市啬园路9号 南通大学 校办', '蒋乃华', '15706296789', 1462051416, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(155, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462074313, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(156, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462074571, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(157, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462074619, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(158, '重庆九龙坡32栋1单元3一1', '魏晓霞', '13908318281', 1462074930, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(159, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462077302, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(160, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462077320, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(161, '重庆九龙波美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462077945, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(162, '重庆九龙波美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462077970, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(163, '重庆九龙波美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462078042, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(164, '重庆九龙坡32栋1单元3一1', '魏晓霞', '13908318281', 1462078839, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(165, '重庆九龙坡32栋1单元3一1', '魏晓霞', '13908318281', 1462078955, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(166, '重庆九龙坡32栋1单元3一1', '魏晓霞', '13908318281', 1462078972, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(167, '重庆九龙坡32栋1单元3一1', '魏晓霞', '13908318281', 1462078977, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(168, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462079202, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(169, '北京市昌平区天通苑派出所往东200米1号门', '陈帆', '13691487604', 1462086331, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(170, '北京市天通苑派出所往东100米', '陈帆', '13691487604', 1462086876, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(171, '天津塘沽区大洋百货好日子服饰中心', '宋军', '1338986026', 1463542820, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(172, '江苏无锡市锡山区羊尖工业园B区6号', '陆元生', '13806179292', 1463889161, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(173, '江苏无锡市锡山区羊尖工业园B区6号', '陆元生', '13806179292', 1463889211, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(174, '上海市松江区松江大学城学生公寓一期文汇路600弄86号楼4009室', '贾佳', '13262881116', 1464435373, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(175, '', '', '', 1464763552, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(176, '123455555', 'gina', '123455555', 1466585368, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(177, '郑州市金水区金水路9号', '王先生', '18638391161', 1466669115, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(178, '郑州市金水路9号', '王先生', '18638391161', 1466669335, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(179, '湖南省长沙市人民中路66号3栋408室', '胡巨保', '18627313143', 1466773184, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(180, '厦门市思明区槟榔西里201号302室', '江新华', '13959273858', 1466783646, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(181, '厦门市思明区槟榔西里201号302室', '江新华', '13959273858', 1466821836, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(182, '上海虹许路731号3号楼东5楼', '张静', '13916346511', 1466924750, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(183, '123', '123', '123', 1467096028, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(184, '浙江省宁波市江南公路1498号高新科技广场1号5楼', '庄战萍', '15267888627', 1467112181, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(185, '123', '123', '123', 1467192186, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(186, '厦门市思明区槟榔西里201号302室', '江新华', '13959273858', 1467299952, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(187, 'ppp', 'aaa', '888', 1467521623, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(188, '福建省福州市鼓楼区湖东路208号晓康苑北楼2401（周末可送件）', '林泽昆', '18750101899', 1467623687, 1, '899.00', 1, '2016070421001004790229327328', NULL, NULL, NULL, NULL),
(189, '', '', '', 1467720105, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(190, '', '', '', 1467794675, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(191, '', '', '', 1467794675, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(192, '', '', '', 1467796961, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(193, '湖北省襄阳市南漳县县政府12栋2单元', '童一鸣', '15171108087', 1467824914, 2, '1027.00', 1, '2016070721001004400248412174', NULL, NULL, NULL, NULL),
(194, '', '', '', 1468150249, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(195, '广东省深圳市南山区蛇口望海路南海玫瑰园一期18栋3A', '梁杰', '18938910238', 1468552463, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(196, '北京西单横二条四号院一单元302', '王玲', '13611353589', 1468586824, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(197, '重庆市南岸区南坪光电路龙湖观山水1号楼29-4', '王琴', '13908312980', 1468668647, 2, '1198.00', 0, NULL, NULL, NULL, NULL, NULL),
(198, '北京丰台区西局欣园4号楼', '孙奕', '13501367909', 1468673335, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(199, '延边州龙井市第一幼儿园', '单良', '15844373611', 1468744766, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(200, '紫马岭上街一号之二', '钟国铭', '13528262167', 1468752385, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(201, '广东省中山市紫马岭上街一号之二', '钟国铭', '13528262167', 1469114590, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(202, '广东省中山市东区紫马岭上街一号之二', '钟国铭', '13528262167', 1469114639, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(203, '广东省中山市东区紫马岭上街一号之二', '钟国铭', '13528262167', 1469115530, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(204, '广东省中山市东区紫马岭上街一号之二', '钟国铭', '13528262167', 1469198471, 1, '499.00', 1, '2016072221001004590242603873', NULL, '顺丰', '906767790363', ''),
(205, '广东省中山市东区紫马岭上街一号之二', '钟国铭', '13528262167', 1469204081, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(206, '上海市古北路530弄28号604室', '张斌', '13524050428', 1469339710, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(207, '上海市天宝路828弄4号1301', '施琴', '13661879069', 1469698259, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(208, 'test', 'test', 'test', 1469778578, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(209, '云南省昆明市西山区前卫街道前卫西路未名城二期A8一栋607', '蔡新国', '13759455332', 1470372043, 1, '599.00', 1, '2016080521001004060296158516', NULL, NULL, NULL, NULL),
(210, '广东深圳南山深意工业大厦', '岑文婷', '13632880813', 1470381409, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(211, '广东深圳南山深意工业大厦', '岑文婷', '13632880813', 1470381519, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(212, '黑龙江省鸡西市鸡冠区南岗3号楼1单元301', '石雷', '13314678888', 1470804577, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(213, '广东省广州市番禺区市桥街道康乐园四街六座', '姚妍', '15768613532', 1470938935, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(214, '广东省梅县区新城办楣杆南路1-5号刘振球中医骨伤科诊所', '刘振球', '15219110769', 1471075931, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(215, '辽宁省大连市高新园区黄浦路977号，华信国际软件园1号楼快递中转站', '王艳明', '13009419939', 1471435950, 1, '599.00', 1, '2016081721001004790267805649', NULL, '顺丰', '924946098601', ''),
(216, '广西巴马县甲篆乡坡月村', '郑海燕', '15683260841', 1471656041, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(217, '就恢复萨的痕迹卡位的阖家安康对话框集散地', '低洼地化科技等哈哈的', '65356456121', 1471671191, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(218, 'hngf', 'vdvc', 'gdvv', 1473160763, 100, '89900.00', 0, NULL, NULL, NULL, NULL, NULL),
(219, '宁夏银川市兴庆区新华东街83-2#银川承天物业', '李红卫', '13995316500', 1473237796, 1, '899.00', 1, '2016090721001004370293589849', NULL, '顺丰', '304907472563', ''),
(220, '555', '344', '445', 1473324201, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(221, '', '', '', 1473399664, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(222, '广东省佛山市禅城区普澜二街6号301', '潘红斌', '13902841270', 1473601809, 1, '899.00', 1, '2016091121001004450224592966', NULL, '顺丰', '924946099924', ''),
(223, '安徽省淮南市田家庵区公安小区17号楼', '程隽清', '18605545016', 1473604452, 1, '499.00', 1, '2016091121001004570263185585', NULL, '顺丰', '920662269478', ''),
(224, '', '', '', 1473648891, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(225, '辽宁省铁岭市开原市经济开发区铁西北街83号', '高航', '18504102931', 1473918488, 2, '1798.00', 0, NULL, NULL, NULL, NULL, NULL),
(226, '辽宁省铁岭市开原市经济开发区铁西北街83号', '高航', '18504102931', 1473919613, 2, '1798.00', 1, '2016091521001004570295623846', NULL, NULL, NULL, NULL),
(227, '辽宁省铁岭市开原市经济开发区铁西北街83号', '高航', '18504102931', 1473920809, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(228, '山东省 滨州市 滨城区 彭李街道 山东省滨州市人民医院办公室 ，256610', '邹健', '15854308776，', 1474078422, 1, '599.00', 1, '2016091721001004900210155696', NULL, NULL, NULL, NULL),
(229, '', '', '', 1477647866, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(230, '福建省 福州市 闽侯区 乌龙江打到 旗山高校教师公寓 13号楼', '刘可', '18606065820', 1477902080, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(231, '广州省，广州市，番禺区，祈福新村名都11座3107室', '薛旋達', '18138722806', 1477993348, 1, '699.00', 1, '2016110121001004090263636559', NULL, '顺丰', '952364549629', ''),
(232, '广州市天河区广和一街十二号502房', '李广', '13802736833', 1477998596, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(233, '广东省江门市蓬江区发展大道231号江门市国家税务局，529000', '杨新华', '13902883975', 1478316303, 1, '499.00', 1, '2016110521001004680217329344', NULL, '顺丰', '928153854239', ''),
(234, '', '', '', 1478670970, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(235, '', '', '', 1478743946, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(236, '新疆乌鲁木齐河北西路137号四建三区18#1-502', '潘雪莹', '15899185396', 1479461265, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(237, '广东省东莞市常平镇常平大道嘉美豪苑嘉茵阁802', '张柏坚', '15814323128', 1479469376, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(238, '广东省东莞市常平镇常平大道嘉美豪苑嘉茵阁802室', '张柏坚', '15814323128', 1479526772, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(239, '广东省东莞市常平镇常平大道嘉美豪苑嘉茵阁802室', '张柏坚', '15814323128', 1479526856, 1, '599.00', 1, '2016111921001004240231674542', NULL, '顺丰', '928153853880', '深圳发'),
(240, '中国深圳市罗湖区', '横说竖说', '11111111111', 1479568620, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(241, '上海市宝山区松兰路1166弄46号601室(宝山万科四季花城)', '周大成', '13901934507', 1479613741, 1, '599.00', 1, '2016112021001004690284675404', NULL, '顺丰', '920662266978', '上海发'),
(242, '1', '1', '1', 1479896151, 2, '1027.00', 0, NULL, NULL, NULL, NULL, NULL),
(243, '北京市石景山区时代庐峰10号楼1单元1002', '闫旭', '18511857050', 1480298738, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(244, '', '', '', 1480318653, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(245, '', '', '', 1480319152, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(246, '1', '1', '1', 1480319681, 2, '1398.00', 0, NULL, NULL, NULL, NULL, NULL),
(247, '', '', '', 1480323662, 2, '1398.00', 0, NULL, NULL, NULL, NULL, NULL),
(248, '北京市丰台区蒲黄榆四里西区3号楼西门103号', '巩东红', '13671073745', 1480767464, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(249, '北京市丰台区蒲黄榆四里西区3号楼西门103号', '巩东红', '13671073745', 1480767644, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(250, '北京市丰台区蒲黄榆四里西区3号楼西门103号', '巩东红', '13671073745', 1480767817, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(251, '乌鲁木齐市扬子江路红十月小区东二区12号楼6单元801', '纪同伟', '13579968168', 1480914907, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(252, '新疆乌鲁木齐市新华北路305号美丽华酒店营业部', '张莉沁', '13579264539', 1480919705, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(253, '新疆乌鲁木齐市新华北路305号美丽华酒店营业部', '张莉沁', '13579264539', 1480919935, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(254, '新疆乌鲁木齐市新华北路305号美丽华酒店', '张莉沁', '13579915888', 1480929772, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(255, '乌市扬子江路红十月小区12号楼6单元801', '纪同伟', '13579968168', 1480948179, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(256, '乌市扬子江路红十月小区12号楼6单元801', '纪同伟', '13579968168', 1480948260, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(257, '乌市扬子江路红十月小区12号楼6单元801', '纪同伟', '13579968168', 1480948261, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(258, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481201015, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(259, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481201054, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(260, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481255258, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(261, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481255993, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(262, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481256438, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(263, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481256714, 1, '128.00', 1, '2016120921001004970209296073', NULL, '顺丰', '304907475742', ''),
(264, '1', '1', '1', 1481273317, 2, '998.00', 0, NULL, NULL, NULL, NULL, NULL),
(265, '南京市东郊小镇8街区31栋908室', '李湘', '13675188587', 1481297035, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(266, '南京市东郊小镇8街区31栋908室', '李湘', '13675188587', 1481297072, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(267, '四川省成都市双流县西航港大道中四段615号', '丁华', '17761263435', 1481605985, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(268, '浙江省杭州市下城区东新街道万家信城34幢2单元1101', '张哲敏', '13805788078', 1481699981, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(269, '浙江省杭州市下城区东新街道万家新城34幢2单元1101', '张哲敏', '13805788078', 1481699992, 1, '599.00', 1, '2016121421001004470282212936', NULL, '顺丰', '927312437155', ''),
(270, '上海崇明县竖新镇响椿路106号', '周曰冬', '13801634014', 1482135350, 1, '499.00', 1, '2016121921001004760298322306', NULL, '顺丰', '927312437164', '上海发'),
(271, '深圳市福田区翠海花园B1座10A', '崔根', '13602640084', 1482387877, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(272, '深圳市福田区翠海花园B1座10A', '崔根', '13602640084', 1482388511, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(273, 'test', 'test', 'test', 1482396786, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(274, 'test', 'test', 'test', 1482458935, 1, '1398.00', 0, NULL, NULL, NULL, NULL, NULL),
(275, 'test', 'test', 'test', 1482459196, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(276, 'test', 'test', 'test', 1482718099, 1, '1698.00', 0, NULL, NULL, NULL, NULL, NULL),
(277, '广州市越秀区沿江西路107号中山大学孙逸仙纪念医院', '杨川', '13640242307', 1482850594, 1, '1398.00', 1, '2016122721001004360221526889', NULL, '顺丰', '928196200890', ''),
(278, '浦北县民兴路方正机电', '何超钊', '18607770230', 1482978836, 1, '1398.00', 0, NULL, NULL, NULL, NULL, NULL),
(279, '上海市徐汇区番禺路900号1109室', '吴引明', '13636524189', 1483194922, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(280, '徐汇区番禺路900号1109室', '吴引明', '13636524189', 1483195341, 1, '599.00', 1, '2016123121001004730261109426', NULL, '顺丰', '928196201610', '上海发货'),
(281, '浙江省余姚市凤山街道春江花月10幢104室', '缪敏娥', '13505788778', 1483413528, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(282, '北京市西城区真武庙二条真武家园3号楼3单元1203', '杨朝晖', '13032706926', 1483592281, 1, '599.00', 1, '2017010521001004660232759392', NULL, '顺丰', '358316145036', '北京发'),
(283, '江苏省南京市江宁区禄口街道禄口镇神舟路15号南京磁晨医疗技术有限公司', '赵华炜', '13815890981', 1483625016, 1, '599.00', 1, '2017010521001004780204951312', NULL, '顺丰', '612102383526', '上海发'),
(284, '上海市浦东新区周东南路鹤沙路688弄18号710', '董玮', '15902177163', 1483771143, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(285, '广州市萝岗区科学城国际企业孵化器A区604', '孙佳丽', '15625125065', 1483790102, 2, '1398.00', 1, '2017010721001004790276000211', NULL, '顺丰', '928196201761', ''),
(286, '上海市汾阳路79号', '洪贤方', '13801667286', 1483845974, 1, '699.00', 1, '2017010821001004620236901378', NULL, '顺丰', '612137940691', '上海'),
(287, '广东省 东莞市 石排镇 石排大道与潭溪西路交汇处东苑花园1栋412', '李方圆', '15918316163', 1483892012, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(288, '', '', '', 1484025525, 3, '2097.00', 0, NULL, NULL, NULL, NULL, NULL),
(289, '', '', '', 1484025573, 3, '2097.00', 0, NULL, NULL, NULL, NULL, NULL),
(290, '河南省荥阳市囯泰路与荥泽大道交叉口东荥正佳苑2号楼2101', '刘剑', '15538171222', 1484147500, 1, '899.00', 1, '2017011121001004110246113034', NULL, '顺丰', '612189435695', '上海发'),
(291, '73 - 29 Fundy Bay Blvd.', 'Sheng Jin', '4163202652', 1484368156, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(292, '广东省佛山市南海区大沥镇黄岐花园新村10号', '黄正东', '13318852831', 1484382899, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(293, '北京市门头沟区中门寺南坡十号楼1003室', '金明', '13611087430', 1484570200, 1, '599.00', 1, '2017011621001004480242454762', NULL, '顺丰', '358316144923', '北京发'),
(294, '北京市朝阳区朝外大街乙12号昆泰国际公寓2209', '周子钦', '18918685979', 1484896559, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(295, '北京市西城区二里沟朝阳庵12号楼1门402', '赵天程', '13681271235', 1485861649, 1, '599.00', 1, '2017013121001004530275165697', NULL, '顺丰', '358316144880', '北京发'),
(296, '11', '11', '11', 1486343740, 4, '3596.00', 0, NULL, NULL, NULL, NULL, NULL),
(297, '北京海淀区五棵松路20号，美丽园小区28-2-202', '周勇', '13801037444', 1486440881, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(298, '上海市場中路1980號', '俞露', '13916034838', 1486463131, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(299, '北京市西城区', '李四', '13700823136', 1486463250, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(300, '北京市海淀区万科西山庭院2-1-102', '张女士', '13910674981', 1486518574, 1, '899.00', 1, '2017020821001004530283443489', NULL, '顺丰', '358316144817', '北京发'),
(301, '深圳市南山区深南大道9678号 大冲商务中心1栋2号楼29层', '梅冰冰', '15827490405', 1486557089, 1, '599.00', 1, '2017020821001004910297859004', NULL, '韵达', '1901764866812', ''),
(302, '湖北省武汉市硚口区xinshij汇豪邸4-1，1702', '蔡晨', '17771447429', 1486611590, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(303, '湖北省武汉市硚口区新世界汇豪邸4-1，1702', '蔡晨', '17771447429', 1486612440, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(304, '北京市东城区地坛北里小区6-2-301', '李蕊', '13911605968', 1486717670, 1, '899.00', 1, '2017021021001004760270330885', NULL, '顺丰', '358316144783', '北京发'),
(305, '江西南昌青山湖区中大南路28号中大青山湖花园6栋', '刘女士', '18979176816', 1486994314, 1, '899.00', 1, '2017021321001004940226252566', NULL, '不发', '不发', '退款'),
(306, '江西南昌', '杨辰', '18770027227', 1486995191, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(307, '江西南昌青山湖区中大南路28号中大青山湖花园6栋', '刘女士', '18979176816', 1486995356, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(308, 'academic', '擦擦', 'academic', 1486996544, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(309, '22', '22', '22', 1487145608, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(310, '广州市天河区五山能源路4号', '郭华芳', '13316153210', 1487302491, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(311, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487335642, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(312, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487335887, 1, '599.00', 1, '2017021721001004130285997373', NULL, '顺丰', '308628228424', '北京发'),
(313, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487337846, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(314, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487339242, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(315, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487339301, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(316, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487339328, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(317, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487339336, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(318, '陕西省西安市友谊西路256号陕西省人民医院呼吸内一科', '王君', '13152135929', 1487389785, 1, '599.00', 1, '2017021821001004140299871303', NULL, '顺丰', '308628228382', '北京发'),
(319, '北京市朝阳区金台北街4-1-803', '马凤清', '13611191402', 1487393830, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(320, '浙江省宁波市环城西路南段942号汽配市场133铺位', '戚琼华', '13777132328', 1487589478, 1, '899.00', 1, '2017022021001004350273845680', NULL, '顺丰', '920662267779', '上海发'),
(321, '上海市虹口区东汉阳路309弄6号802室', '杨小姐', '18821003837', 1487684727, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(322, '上海市东汉阳路309弄6号802室', '杨小姐', '18821003837', 1487685057, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(323, '福州市仓山区金桔路230水印长天小区26#1801室', '林忠飞', '18559885368', 1487761537, 1, '599.00', 1, '2017022221001004760286536956', NULL, '顺丰', '928196202987', ''),
(324, '北京市昌平区西关北路甲15号', '李婷', '18735101825', 1487829518, 1, '128.00', 1, '2017022321001004780263041185', NULL, '顺丰', '308628228346', '北京发'),
(325, '浙江省杭州市滨江区浦沿街道伟业路298号先锋科技大厦10楼', '任波', '15388462415', 1487951095, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(326, '上海市普陀区江宁路1415弄16号1902室', '朱晨怡', '15692114099', 1488077328, 1, '499.00', 1, '2017022621001004260202836924', NULL, '顺丰', '920662266', '上海发'),
(327, '浦东新区世博村路300号3号楼', '陈家彦', '13701746743', 1488108669, 1, '599.00', 1, '2017022621001004570216687069', NULL, '顺丰', '920662266899', '上海发'),
(328, '浦东新区世博村路300号3号楼', '陈家彦', '13701746743', 1488108919, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(329, '哈尔滨市道外区南直路泰富长安城D5~5单元701', '晴空', '13945175753', 1488277253, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(330, '黑龙江省哈尔滨市道外区南直路泰富长安城D5~5单元701', '晴空', '13945175753', 1488349123, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(331, '苏州市吴江区开平路300号', '王卫其', '13901551468', 1488370125, 1, '1398.00', 0, NULL, NULL, NULL, NULL, NULL),
(332, '陕西省西安市曲江池北路999号曲江和园公馆别墅区1805.', '庄凯', '13571880805', 1488501774, 1, '499.00', 1, '2017030321001004330270335073', NULL, '顺丰', '928196203081', ''),
(333, '浙江台州椒江横河新村98号', '徐斌', '13957698375', 1488556213, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(334, '浙江省台州市椒江区横河新村98号', '徐斌', '13957698375', 1488558414, 1, '499.00', 1, '2017030421001004150293049721', NULL, '顺丰', '920662267788', '上海发'),
(335, '3', '1', '2', 1488597109, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(336, '广东省揭阳市榕城区晓翠路市国税局', '余得雁', '13502609196', 1489297733, 1, '599.00', 0, NULL, NULL, '顺丰', '928196203600', '深圳发，苏丽英打款'),
(337, '上海市 松江区 泗泾镇 泗凯路 875弄13号504室', '吴忠', '13651765408', 1489324758, 1, '699.00', 1, '2017031221001004920294023947', NULL, '顺丰', '927312437182', '上海发'),
(338, '上海市黄浦区大沽路100号3205室', '姜文娟', '13651621429', 1489413039, 1, '599.00', 1, '2017031321001004750264138826', NULL, '顺丰', '927312436381', '上海发'),
(339, '123', '123', '13686823958', 1489425185, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(340, '21851', '123123', '123151', 1489454835, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(341, '包头市九原区开元大街1号市党政大楼', '老赵', '18547296931', 1489974195, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(342, '包头市九原区开元大街1号市党政大楼', '老赵', '18547296931', 1489974362, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(343, '包头市九原区开元大街1号市党政大楼', '老赵', '18547296931', 1489974569, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(344, '闵行区平吉路88弄16号601', '袁兆熊', '13818034341', 1490048966, 1, '599.00', 1, '2017032121001004810234480161', NULL, '顺丰', '927312436114', '上海发'),
(345, 'adfkjfafa', 'A', '18988681213', 1490142492, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(346, '西安市华山中心医院', '王静', '13572405429', 1490282128, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(347, '广东省阳春市河朗镇圩边', '熔', '13430351620', 1490676158, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(348, '福州市金塘路52号', '施峰', '13705083313', 1490865820, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(349, '福州市金塘路52号', '施峰', '13705083313', 1490865836, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(350, '西安市华山中心医院', '王静', '18049460596', 1490962949, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(351, '西安市华山中心医院', '王静', '18049460596', 1490964214, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(352, 'test', '123', 'test', 1491967874, 1, '1698.00', 0, NULL, NULL, NULL, NULL, NULL),
(353, '四川省成都市双流县西航港温哥华花园六期', '张曼宇', '18483638447', 1491994503, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(354, '顺义龙湖别墅香醍慢步庄园一区33栋', '刘振敏', '13241933861', 1492180723, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(355, '厦门市思明区永福宫路5号2102', '张斯斯', '15805904554', 1492318292, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(356, '江西省九江市长虹大道176号', '陈尚青', '18160792815', 1492405224, 1, '128.00', 1, '2017041721001004720252917401', NULL, '顺丰', '928196204359', '深圳发'),
(357, '江西省九江市长虹大道176号', '陈尚青', '18160792815', 1492406841, 1, '899.00', 1, '2017041721001004720252887091', NULL, '顺丰', '928196204359', '深圳发'),
(358, '上海长宁区通协路268号尚品都汇272-5F名阑意大利餐厅', '洪戈', '18918938592', 1492442616, 1, '499.00', 1, '2017041721001004940236129657', NULL, '顺丰', '927312436266', '上海发'),
(359, '江苏省苏州市工业园区玲珑湾花园1幢2302室', '金晓澄', '13913729688', 1492491186, 1, '599.00', 1, '2017041821001004890208426760', NULL, '顺丰', '929307741931', '上海发'),
(360, '重庆市潼南区梓潼街道办事处凉风垭', '胡先生', '18983898567', 1492510289, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(361, '深圳市龙岗区坂田华为基地F区', '张慧', '15602981091', 1492968721, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(362, '广西宜州市城西大转盘旁喜来登酒店', 'Gary Ely', '18877832397', 1493003061, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(363, '4444', '11', '1555', 1493004956, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(364, '广西宜州市城西大转盘旁喜来登酒店', 'Gary Ely', '6788822881', 1493005129, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(365, '浦东新区惠南镇拱极路2381弄51号', '张佳娜', '13817156565', 1493183180, 1, '599.00', 1, '2017042621001004990216401914', NULL, '顺丰', '928196204631', '深圳发'),
(366, '陕西省西安市雁塔区小寨西路49号（军区三号院）', '张纪春', '18092337288', 1493202830, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(367, '广东省湛江市霞山区文明东路2号广东医科大学', '蔡梓滔', '13729138510', 1493343930, 1, '599.00', 1, '2017042821001004100217941935', NULL, '顺丰', '928196204640', '深圳发'),
(368, '四川省巴中市通江县诺江镇石梯街33号', '邓江', '15983986222', 1493712394, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(369, '甘肃省兰州市七里河区体育街69号甘肃省体育彩票管理中心', '刘湘珺', '18298331853', 1493796122, 1, '499.00', 1, '2017050321001004450273351881', NULL, '顺丰', '35865265199', '北京发'),
(370, '深圳市罗湖区莲塘街道罗沙路口兰亭国际A栋26h', '朱伟芬', '13902998066', 1493798279, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(371, '深圳市罗湖区莲塘街道罗沙路口兰亭国际A栋26h', '朱伟芬', '13902998066', 1493798354, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(372, '深圳市罗湖区莲塘街道罗沙路口兰亭国际A栋26h', '朱伟芬', '13902998066', 1493798355, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(373, '深圳市罗湖区莲塘街道罗沙路口兰亭国际A栋26h', '朱伟芬', '13902998066', 1493798358, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(374, '北京海淀区泉宗路2号光大家园4--1509', '张红', '13701009201', 1493822981, 1, '499.00', 1, '2017050321001004060252425632', NULL, '顺丰', '928196204825', '深圳发'),
(375, '浙江省宁波市海曙区西湾路39弄36号501室', '郑杏英', '18368276112', 1494130976, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(376, '北京海淀区泉宗路2号光大家园4--1509', '张红', '13701009201', 1494222494, 1, '699.00', 1, '2017050821001004060260307313', NULL, '顺丰', '358271031795', '北京发'),
(377, '北京西城区车公庄大街19号中国', '娄莎莎', '13911001380', 1494320363, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(378, '北京西城区车公庄大街19号 中国建筑设计院有限公司', '娄莎莎', '13911001380', 1494320398, 1, '499.00', 1, '2017050921001004130212078926', NULL, '顺丰', '35868565245', '北京发'),
(379, '安居街88号戎居苑', '夏晓蓉', '13658020052', 1494374706, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(380, '江苏省无锡市万科魅力之城二区246-302', '万敏', '15961813006', 1494628339, 1, '499.00', 1, '2017051321001004950213261859', NULL, '顺丰', '357073846436', '北京发'),
(381, '江苏省无锡市万科魅力之城二区246-302', '万敏', '15961813006', 1494628474, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(382, '北京市东城区王府井东方广场C2座206', '高振萍', '18701530239', 1494758393, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(383, '上海市浦东新区凌环路179弄16号501室', '黄顺忠', '13817657610', 1494849192, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(384, '湖北省武汉市汉阳区华润中央公园一期5-2-1502', '黎阳', '15377566978', 1494917718, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(385, '贵州省贵阳市', '曹时宁', '18984281092', 1495002216, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(386, 'cjdtlWEfEJjKRENLG', 'JimmiXzSq', '14687284209', 1495206840, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(387, '深圳市福田区兰天路403在栋206', '符旭莲', '13654228911', 1495220871, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(388, '深圳市福田区兰天路403栋206', '符旭莲', '13652448911', 1495268237, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(389, '深圳市福田区兰天路403栋206', '符旭莲', '13652448911', 1495268367, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(390, '深圳市福田区兰天路403栋206', '符旭莲', '13652448911', 1495268382, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(391, '4', '2', '3', 1495626543, 2, '1798.00', 0, NULL, NULL, NULL, NULL, NULL),
(392, '上海浦东新区临港环湖西一路819号C区511室', '朱超嵩', '13801677184', 1495782890, 1, '599.00', 1, '2017052621001004870252393225', NULL, '顺丰', '927312436248', '上海发'),
(393, '上海市长宁区幸福路137号306室', '陈颖', '13916032267', 1496304583, 1, '599.00', 1, '2017060121001004750295201736', NULL, '顺丰', '929307741464', '上海发'),
(394, '河北省邯郸市雪驰路59号邯山区市场监管局', '杨文志', '18931626321', 1496373464, 1, '599.00', 1, '2017060221001004530263427046', NULL, '顺丰', '929307741400', '上海发'),
(395, '河北省邯郸市雪驰路59号邯山区市场监管局', '杨文志', '18931626321', 1496373573, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(396, '上海市普陀区交通西路108弄11号705室', '詹琳', '56531011', 1496410801, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(397, '四川省成都市金牛区马河湾1号6-2-7', '孙跃', '13308227041', 1497402520, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(398, '广州天河中山大道55号华南师大教师村D座2604', '高凌飚', '13922115832', 1497820062, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(399, '辽宁省盘锦市盘山县太平经济开发区盘锦耀隆洗涤服务有限公司', '赵斌', '18604279666', 1497845671, 1, '899.00', 1, '2017061921001004720264744268', NULL, '顺丰', '357073846949', '北京发'),
(400, '云南省楚雄彝族自治州楚雄市罗马庄园C42幢', '梁芳', '18721398897', 1497885734, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(401, '云南省楚雄彝族自治州楚雄市罗马庄园C42幢', '梁芳', '18721398897', 1497885788, 1, '599.00', 1, '2017061921001004440283829562', NULL, '顺丰', '086166445514', '深圳发'),
(402, '北京市海淀区万科西山庭院2-1-102 ', '黄先生', '18611979299', 1498011912, 1, '599.00', 1, '2017062121001004530299285058', NULL, '顺丰', '3577073846897', '北京发'),
(403, '广东省珠海市拱北街道拱北地下商城负一层莱福士D1258铺', '赵峻汝', '17765692367', 1498794512, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(404, '成都市金牛区长福街', '朱先生', '13909097907', 1498978383, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(405, '成都市金牛区长福街', '朱先生', '13909097907', 1498978501, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(406, '成都市金牛区长福街', '朱先生', '13909097907', 1498978524, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(407, '成都市金牛区长福街', '朱先生', '13909097907', 1498978581, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(408, '广东省汕头市潮阳区贵屿镇仙马乡毓秀南路东五街16号', '马子滨', '13542862329', 1499093379, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(409, '广东省汕头市潮阳区贵屿镇仙马乡毓秀南路东五街16号', '马子滨', '13542862329', 1499100289, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(410, '广东省汕头市朝阳区贵屿镇仙马乡毓秀南路东五街16号', '马子滨', '13542862329', 1499167041, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(411, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178422, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(412, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178435, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(413, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178445, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(414, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178451, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(415, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178462, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(416, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178480, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(417, '北京市西城区德胜街道六铺炕北小街5号', '龚群', '13501066627', 1499233181, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(418, '四川省南充市顺庆区舞凤街道镇江东路尚水佳苑', '卢河东', '13696212676', 1499244532, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(419, '武汉市江岸区九万方长江科学院岩土大楼716室', '李玫', '15807180706', 1499392517, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(420, 'GRWoajBqpAa', 'Barnypok', '97856556682', 1499496649, 1, '1298.00', 0, NULL, NULL, NULL, NULL, NULL),
(421, 'lUUkWlXJNAPGlNlojSR', 'Barnypok', '26450051626', 1499568209, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(422, '成都市（邮编610072）大石西路66号柏仕晶舍1-4-202', '姜环宇', '18980707736', 1499570073, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(423, 'gmKahtCaRIVuR', 'Barnypok', '36081977586', 1499595567, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(424, '贵州省遵义市汇川区深圳路明珠花园云天苑309', '刘俊', '15329724760', 1499601539, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(425, '河北省衡水市桃城区育才街大陆裕丰3号楼一单元502', '孙木森', '15713180769', 1499749631, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(426, '北京市东三环中路一号环球金融中心东塔20层', '李小姐', '13810578938', 1499762158, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(427, '北京市东三环中路一号环球金融中心东塔20层', '李小姐', '13810578938', 1499762249, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(428, '中国云南大理市洱海庄园42-1-101', '陈建平', '13987248333', 1499923564, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(429, '新疆喀什市迎宾大道120号（喀什地区第一人民医院）', '陈娟', '13600093819', 1499938222, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(430, '四川省德阳市中江县凯北帝景D栋一单元', '王嘉尔', '15183657215', 1499953591, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(431, '四川省德阳市中江县凯北帝景D栋一单元', '黄雪', '15183657215', 1499953717, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(432, '1', '1', '1', 1499999618, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(433, '广东省湛江市霞山区海淀路23栋4门507房', '邓明亮', '13702880969', 1500025942, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(434, '上海市徐汇区龙吴路1700号', '陈力', '64510346', 1500089040, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(435, '新疆喀什市迎宾大道120号（喀什地区第一人民医院）', '陈娟', '13600093819', 1500093085, 0, '0.00', 0, NULL, NULL, NULL, NULL, NULL),
(436, '阿三地方', '大风车', '方法大', 1500208999, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(437, '黑龙江哈尔滨南岗区学府路哈医大二院外科楼5层普外一病房', '韩德恩', '13359852888', 1500348035, 2, '1198.00', 0, NULL, NULL, NULL, NULL, NULL),
(438, '深圳市南山区华侨城一期K302', '钟冬连', '18965199183', 1500426286, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(439, '湖南省娄底市双峰县杏子铺镇和睦村双峰农村信用社丰瑞支行', '卞灿', '15073839891', 1500546565, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(440, '湖南省娄底市双峰县杏子铺镇和睦村双峰农村信用社丰瑞支行', '卞灿', '15073839891', 1500546590, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(441, '湖南省娄底市双峰县杏子铺镇和睦村双峰农村信用社丰瑞支行', '卞灿', '15073839891', 1500546613, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(442, '', '', '', 1500712011, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(443, '南宁市良庆区银象路50号', '陈勇', '13397712260', 1501004575, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(444, '广东省湛江市霞山区文明东路2号', '李明颖', '13888613506', 1501595686, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(445, '345345', '345345', '345345', 1501674166, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(446, '44444444444444', '44444444', '444444444444', 1501674185, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(447, '深圳市南山区南山大道南山大道时代骄子大厦B712', '陈小姐', '13798279547', 1501776214, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(448, '深圳市南山区南山大道南山大道时代骄子大厦B712', '陈小姐', '13798279547', 1501811295, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(449, '深圳市南山区南山大道南山大道时代骄子大厦B712', '陈小姐', '13798279547', 1501812864, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(450, '广州市海珠区纺织路中海名都A3-2102', '陈愈坚', '18620105148', 1501843602, 2, '1098.00', 0, NULL, NULL, NULL, NULL, NULL),
(451, '上海浦东新区商城路1177弄19号504室', '王夷倩', '13564513856', 1502199301, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(452, '上海浦东新区商城路1177弄19号504室', '王夷倩', '13564513856', 1502199357, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(453, '上海浦东新区商城路1177弄19号504室', '王夷倩', '13564513856', 1502199604, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(454, '广东省佛山市顺德区乐从镇乐从大道西B333号', '熊丹', '13226995080', 1502201257, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(455, '南京市中华路50号弘业大厦1188室', '严宏斌', '13851823002', 1502352941, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(456, '南京市中华路50号弘业大厦1188室', '严宏斌', '13851823002', 1502353063, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(457, '湖北省宜昌市秭归县茅坪镇屈原路8号自来水公司大楼', '卢静', '15071791986', 1502365276, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(458, '湖北省宜昌市秭归县茅坪镇屈原路8号自来水公司大楼', '卢静', '15071791986', 1502365297, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(459, '湖北省宜昌市秭归县茅坪镇屈原路8号自来水公司大楼', '卢静', '15071791986', 1502365388, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(460, '湖北省宜昌市秭归县茅坪镇屈原路8号', '卢静', '15071791986', 1502365575, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(461, '湖北省宜昌市秭归县茅坪镇屈原路8号', '卢静', '15071791986', 1502365761, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(462, '湖北省宜昌市秭归县茅坪镇屈原路8号自来水公司大楼', '卢静', '15071791986', 1502369296, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(463, '上海市浦东新区商城路1177弄19号504室', '王夷倩', '13564513856', 1502458594, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(464, '湖北省武汉市江汉区香港路228号长福公寓三单元903', '向力', '18986165779', 1502532018, 1, '1698.00', 0, NULL, NULL, NULL, NULL, NULL),
(465, '广西南宁市江南区星光大道238号玫瑰园6栋2单元', '苏国贵', '13197718122', 1502547523, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(466, '江苏省昆山市玉山镇朝阳西村22号楼503室', '陈刚', '13328059275', 1502775205, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` (`id`, `address`, `customer`, `phone`, `added_date`, `quantity`, `amount`, `ispay`, `trade_no`, `trade_status`, `express`, `expressNo`, `remark`) VALUES
(467, '江苏省昆山市玉山镇朝阳西村22号楼503室', '陈刚', '13328059275', 1502775384, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(468, '浙江省杭州市下沙24号大街 观澜时代天筑3幢1单元1802', '周媛', '13757174234', 1502850871, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(469, '北京海淀区泉宗路2号光大花园4---1509', '张s', '13701009201', 1503239847, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(470, '北京海淀区泉宗路2号光大家园4--1509', '张s', '13701009201', 1503324063, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(471, '重庆江北区建新北路三支路69号(耐德佳宛)1栋6一6', '黄永秀', '15123104396', 1503398835, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(472, '北京海淀区泉宗路2号光大家园4---1509', '张s', '13701009201', 1503466114, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(473, '北京海淀区泉宗路2号光大家园4----1509', '张s', '13701009201', 1503466222, 2, '256.00', 0, NULL, NULL, NULL, NULL, NULL),
(474, '云南省昆明市盘龙区福泽雅苑', '张大牛', '13908759571', 1503489074, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(475, '浙江省温州市鹿城区五马街道瓯江路江晨佳苑1幢2102室', '侯强', '13806885594', 1503585134, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(476, '', '', '', 1503585302, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(477, '山东省济南市旅游路28666号国华东方美郡108楼', '袁奇清', '18660117755', 1503904635, 2, '1198.00', 0, NULL, NULL, NULL, NULL, NULL),
(478, '宁波', '董先生', '13777085060', 1504657684, 1, '699.00', 0, NULL, NULL, NULL, NULL, NULL),
(479, '上海市嘉定区翔江公路965弄108号', '上海广坤物流有限公司', '13701766729', 1504683343, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(480, '上海市嘉定区翔江公路965弄108号', '上海广坤物流有限公司', '13701766729', 1504683370, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(481, '上海市嘉定区翔江公路965弄108号', '上海广坤物流有限公司', '13701766729', 1504683398, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(482, '浙江杭州市文三路108号中大文锦苑4幢201室', '包玲君', '13958006119', 1504769372, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(483, 'eLUQUHFzmZvghQo', 'JimmiNu', '30965020274', 1505016743, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(484, '深圳西乡劳驾108', '冯先生', '13530271696', 1505025308, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(485, '深圳市宝安区坪洲地铁', '刘德财', '13538228353', 1505059857, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(486, '深圳市宝安区坪洲地铁', '刘德财', '13538228353', 1505059987, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(487, '广东省汕头市外马路20号海关宿舍', '周沁园', '18602521250', 1505087529, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(488, '广东省深圳市宝安区坪洲地铁B口麻布新村9巷13号', '刘德财', '13538228353', 1505100612, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(489, '江西省赣州市章贡区经济技术开发区香港工业区 金潭大道26号3栋206积嘉网络', '钟飞飞', '15770741377', 1505100995, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(490, '上海市浦东新区新场镇笋心路102号', '王翔', '13524873247', 1505118235, 1, '1298.00', 0, NULL, NULL, NULL, NULL, NULL),
(491, '上海市浦东新区新场镇笋心路102号', '王翔', '13524873247', 1505118871, 1, '1298.00', 0, NULL, NULL, NULL, NULL, NULL),
(492, '广东省汕头市金平区外马路20号海关宿舍18栋', '周沁园', '18602521250', 1505304262, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(493, '广东省汕头市金平区外马路20号海关宿舍18栋', '周沁园', '18602521250', 1505304405, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(494, '广东省汕头市金平区外马路20号海关宿舍18栋', '周沁园', '18602521250', 1505383775, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(495, '上海市宝山区祁华路655弄1号楼', '张玉', '17374345616', 1505721399, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(496, '上海市宝山区祁华路655弄1号楼', '张玉', '17374345616', 1505721917, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(497, '上海市宝山区祁华路655弄1号楼', '张玉', '17374345616', 1505722380, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(498, 'q', 'q', 'q', 1506008063, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(499, '广东省广州市海珠区晓港西路3号12栋16C', '黄小琥', '13590555868', 1506008121, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(500, '湖北省武汉市东湖高新技术开发区华工科技园一路五号', '刘文', '13972922312', 1506482519, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(501, '湖北省武汉市东湖高新技术开发区华工科技园一路五号', '刘文', '13972922312', 1506482775, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(502, '1', '1', '1', 1506492148, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(503, '陕西省西安市未央区大兴西路48号进丰小区', '冯苗', '15529016982', 1506513450, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(504, '2', '2', '2', 1506847866, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(505, '山西省太原市和平南路59号院1号楼23号', '匡衡', '13503519824', 1506934730, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(506, '山西省太原市和平南路59号院1号楼23号', '匡衡', '15536659131', 1506940301, 1, '128.00', 0, NULL, NULL, NULL, NULL, NULL),
(507, '宁波市鄞州区首南街道太康东路宁波诺丁汉大学22号楼', '赵世琦', '18888683313', 1507118476, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(508, '宁波市鄞州区首南街道太康东路宁波诺丁汉大学22号楼', '赵世琦', '18888683313', 1507118485, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(509, '宁波市鄞州区首南街道太康东路宁波诺丁汉大学22号楼', '赵世琦', '18888683313', 1507118491, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(510, '宁波市鄞州区首南街道太康东路宁波诺丁汉大学22号楼', '赵世琦', '18888683313', 1507118512, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(511, '宁波市鄞州区首南街道泰康东路宁波诺丁汉大学22号楼', '赵世琦', '18888683313', 1507118606, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(512, '浙江省宁波市海曙区段塘街道芳草苑3幢', '王玛丽', '15868759028', 1507370783, 1, '499.00', 0, NULL, NULL, NULL, NULL, NULL),
(513, '成都市高新区交子北一路88号', '艾琳', '18681703013', 1507535926, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL),
(514, 'ddd', 'ddd', 'ddd', 1507608678, 1, '899.00', 0, NULL, NULL, NULL, NULL, NULL),
(515, '', '', '', 1507785555, 1, '599.00', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wp_products`
--

CREATE TABLE `wp_products` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `thumbnail` varchar(150) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `content` text NOT NULL,
  `keywords` varchar(150) DEFAULT NULL,
  `sub_title` varchar(80) DEFAULT NULL,
  `slogan` varchar(100) NOT NULL COMMENT '标语',
  `added_by` varchar(50) NOT NULL,
  `background` varchar(150) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `product_no` varchar(50) NOT NULL,
  `recommend` tinyint(1) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `link` varchar(150) NOT NULL,
  `added_date` int(11) NOT NULL,
  `summary` varchar(500) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `company` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `rotate_pic` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_products`
--

INSERT INTO `wp_products` (`id`, `title`, `importance`, `thumbnail`, `description`, `content`, `keywords`, `sub_title`, `slogan`, `added_by`, `background`, `view_count`, `active`, `product_no`, `recommend`, `price`, `link`, `added_date`, `summary`, `brand`, `company`, `category`, `rotate_pic`) VALUES
(35, '洁碧超效型水牙线', 0, '/assets/ckfinder/userfiles/images/product/100.png', 'waterpik洁碧官网,为您提供waterpik洁碧超效型水牙线（WP-100EC）【价格、多少钱、图片、怎么样】等信息，想了解更多冲牙器、水牙线、洗牙器等产品，就上洁碧官方网站！', '<p><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/100EC/1001.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/100EC/1002.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/100EC/1003.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/100EC/1004.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/100EC/1005.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/100EC/1006.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/100EC/1007.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/100EC/1008.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/100EC/1009.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/100EC/10010.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/100EC/10011.jpg\" /></p>\r\n', 'waterpik洁碧超效型水牙线（WP-100EC）价格,waterpik洁碧超效型水牙线（WP-100EC）怎么样', 'Waterpik Ultra Water Flosser', '能，人所不能', 'wateradmin', '/assets/ckfinder/userfiles/files/100.jpg', 0, 1, 'WP-100EC', 1, '899.00', 'http://detail.tmall.com/item.htm?spm=a1z10.1-b.w7932002-7321530685.1.nxQHCJ&id=39157339798', 1425026304, 'Waterpik®美国洁碧超效型水牙线拥有先进口腔脉冲高压冲洗技术。附有六款共七支喷咀，可满足一家多口不同需要。比传统牙线更有效清洁食物碎屑，深入清洁牙缝和牙龈沟。洁碧官网', '洁碧', '洁碧有限公司 (Water Pik, Inc)', '超效型水牙线', ''),
(40, '纳米声波自动电动牙刷', 0, '/assets/ckfinder/userfiles/images/product/tee.png', 'waterpik洁碧官网,为您提供waterpik纳米声波牙刷【价格、多少钱、图片、怎么样】等信息，想了解更多冲牙器、水牙线、洗牙器等产品，就上洁碧官方网站！', '<p><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/ys/ys01ys.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/ys/ys02ys.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/ys/ys03ys.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/ys04ys.jpg\" style=\"height:1158px; width:790px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/ys/ys05ys.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/ys/ys06ys.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/ys/ys07ys.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/ys/ys08ys.jpg\" /></p>\r\n', 'waterpik洁碧纳米声波牙刷价格,waterpik洁碧纳米声波牙刷怎么样', 'Nano-Sonic® Toothbrush', '', 'wateradmin', '/assets/ckfinder/userfiles/images/product/teebg.jpg', 0, 1, 'Nano-Sonic', 0, '128.00', '', 1431662229, '纳米声波牙刷具有结构紧凑，符合人体工程学的手柄设计，并每分钟16000温柔的声音笔触。软，圆头刷毛其独特的高进低出的模式有效地清除牙菌斑难以到达的地区。包括一个可更换的AAA电池。', '洁碧', '洁碧有限公司 (Water Pik, Inc)', '纳米声波电动牙刷', NULL),
(36, '洁碧标准型水牙线', 0, '/assets/ckfinder/userfiles/images/product/75.png', 'waterpik洁碧官网,为您提供waterpik洁碧标准型水牙线（WP-70EC）【价格、多少钱、图片、怎么样】等信息，想了解更多冲牙器、水牙线、洗牙器等产品，就上洁碧官方网站！', '<p><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC01.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC02.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC03.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC04.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC05.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC06.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC07.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC08.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC09.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC10.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC11.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/70/70EC12.jpg\" /></p>\r\n', 'waterpik洁碧标准型水牙线（WP-70EC）价格,waterpik洁碧标准型水牙线（WP-70EC）怎么样', 'Waterpik Classic Water Flosser', '性价比，硬道理！', 'wateradmin', '/assets/ckfinder/userfiles/images/product/70.jpg', 0, 1, 'WP-70EC', 1, '499.00', '', 1425028592, 'Waterpik®洁碧标准型水牙线是注重口腔健康家庭的不二之选，洁碧水牙线是目前唯一替代传统牙线的，能够有效去除牙菌斑和预防牙龈炎的专业产品；只要14天！保证您能享受到洁碧冲牙器为您带来的健康！,洁碧官网', '洁碧', '洁碧有限公司 (Water Pik, Inc)', '标准型水牙线', NULL),
(37, '洁碧便携式水牙线', 0, '/assets/ckfinder/userfiles/images/product/450.png', 'waterpik洁碧官网,为您提供waterpik洁碧便携式水牙线（WP-450EC）【价格、多少钱、图片、怎么样】等信息，想了解更多冲牙器、水牙线、洗牙器等产品，就上洁碧官方网站！', '<p><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC001.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC002.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC003.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC004.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC005.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC006.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC007.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC008.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC009.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC010.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC011.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC012.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/450/450EC013.jpg\" /></p>\r\n', 'waterpik洁碧便携式水牙线（WP-450EC）价格,waterpik洁碧超效型水牙线（WP-450EC）怎么样', 'Waterpik Cordless Plus Water Flosser', '告别宅，随身带！', 'wateradmin', '/assets/ckfinder/userfiles/images/product/450.jpg', 0, 1, 'WP-450EC', 1, '599.00', '', 1425087607, 'Waterpik® 美国洁碧便携式水牙线拥有先进口腔脉冲高压冲洗技术。附有四款不同刷头，方便携带，适合旅行及放在公司使用。比传统牙线更有效清洁食物碎屑，深入清洁牙缝和牙龈沟。', '洁碧', '洁碧有限公司 (Water Pik, Inc)', '便携式水牙线', NULL),
(38, '洁碧精致型水牙线', 0, '/assets/ckfinder/userfiles/images/product/250.png', 'waterpik洁碧官网,为您提供waterpik洁碧精致型水牙线（WP-250EC）【价格、多少钱、图片、怎么样】等信息，想了解更多冲牙器、水牙线、洗牙器等产品，就上洁碧官方网站！', '<p><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC001.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC002.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC003.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC004.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC005.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC006.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC007.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC008.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC009.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC010.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC011.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC012.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC013.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC014.jpg\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/250/250EC015.jpg\" /></p>\r\n', 'waterpik洁碧精致型水牙线（WP-250EC）价格,waterpik洁碧精致型水牙线（WP-250EC）怎么样', 'Waterpik Nano Water Flosser', '小身材，大作为！', 'wateradmin', '/assets/ckfinder/userfiles/images/product/250.jpg', 0, 1, 'WP-250EC', 1, '699.00', '', 1425088337, 'Waterpik 美国洁碧精致型水牙线拥有先进口腔脉冲高压冲洗技术。附有2款喷咀，可满足漱洗室空间不足家庭或经常出门人士对口腔护理的需要。全球通用电压设计，适合于任何国家使用。', '洁碧', '洁碧有限公司 (Water Pik, Inc)', '精致型水牙线', NULL),
(49, '洁碧超效型水牙线', 0, '/assets/ckfinder/userfiles/files/108EC.png', 'waterpik洁碧官网，为您提供waterpik洁碧超效型水牙线（WP-108EC）【价格、多少钱、图片、怎么样】等信息，想了解更多冲牙器、水牙线、洗牙器等产品，就上洁碧官方网站！', '<p><img alt=\"\" src=\"http://tzgcms.com:8888/uploads/products/thumb/20120122042431.jpg\" style=\"height:390px; width:500px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/108EC/108EC1212_01.jpg\" style=\"height:903px; width:790px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/108EC/108EC1212_02.jpg\" style=\"height:734px; width:790px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/108EC/108EC1212_03.jpg\" style=\"height:1195px; width:790px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/108EC/108EC1212_04.jpg\" style=\"height:990px; width:790px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/108EC/108EC1212_05.jpg\" style=\"height:1422px; width:790px\" /></p>\r\n', 'waterpik洁碧超效型水牙线（WP-108EC）价格，waterpik洁碧超效型水牙线（WP-108EC）怎么样', 'Waterpik Ultra Water Flosser', 'waterpik洁碧超效型水牙线（WP-108EC）_价格_怎么样-洁碧官网', 'water', '/assets/ckfinder/userfiles/files/bg_108ec.jpg', 0, 1, 'WP-108EC', 0, '1398.00', 'http://www.chinawaterpik.com/products/49.html', 1482458304, '静音设计，体型小巧，可与您最喜爱的漱口液一同使用。10段压力调节，设计美观；水箱盖罩及密闭的刷头储藏室，配备全套8支喷头。拥有360°旋转刷头和压力控制系统。', '洁碧', '洁碧有限公司 (Water Pik, Inc)', '超效型水牙线', NULL),
(50, '洁碧无线型水牙线', 0, 'http://tzgcms.com:8888/uploads/news/n1.jpg', 'waterpik洁碧官网，为您提供waterpik洁碧无线型水牙线（WF-02EC）【价格、多少钱、图片、怎么样】等信息，想了解更多冲牙器、水牙线、洗牙器等产品，就上洁碧官方网站！', '<p><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/02EC/WF-02EC_01.jpg\" style=\"height:722px; width:790px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/02EC/WF-02EC_02.jpg\" style=\"height:605px; width:790px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/02EC/WF-02EC_03.jpg\" style=\"height:575px; width:790px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/02EC/WF-02EC_04.jpg\" style=\"height:541px; width:790px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/02EC/WF-02EC_05.jpg\" style=\"height:975px; width:790px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/02EC/WF-02EC_06.jpg\" style=\"height:1204px; width:790px\" /><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/product/02EC/WF-02EC_07.jpg\" style=\"height:921px; width:790px\" /></p>\r\n', 'waterpik洁碧无线型水牙线（WF-02EC）价格，waterpik洁碧无线型水牙线（WF-02EC）怎么样', 'Waterpik Cordless Express Water Flosser', 'waterpik洁碧无线型水牙线（WF-02EC）_价格_怎么样-洁碧官网', 'water', '/assets/ckfinder/userfiles/files/bg_WF02EC.jpg', 0, 1, 'WF-02EC', 0, '599.00', 'http://www.chinawaterpik.com/products/50.html', 1482458782, '快速释放机制方便更换喷头；防水设计可让您在淋浴时使用；无需充电，非常适合旅行携带。', '洁碧', '洁碧有限公司 (Water Pik, Inc)', '无线型水牙线', ''),
(52, 'Handsontable example', 0, '', 'fdg', '<p>23432</p>\r\n', 'gdf', '432', '432', 'admin', '', 0, 1, '432', 1, '443.00', 'http://www.baidu.com', 1545279409, '432', '432', '42', '423', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wp_shopes`
--

CREATE TABLE `wp_shopes` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `authorization_no` varchar(100) NOT NULL,
  `link` varchar(150) NOT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_date` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_shopes`
--

INSERT INTO `wp_shopes` (`id`, `title`, `address`, `authorization_no`, `link`, `importance`, `active`, `added_date`, `added_by`) VALUES
(1, '洁碧华南专卖店 ', '深圳市', 'CP0755001-1（E）', 'http://shop58859170.taobao.com', 0, 1, 1423021417, 'doubletong'),
(2, 'waterpik洁碧旗舰店', '深圳市', 'CP0755001（E）', 'http://waterpik.tmall.com/', 0, 1, 1423021896, 'doubletong'),
(3, '洁碧莱格专卖店', '无锡市', 'CP05100001（E）', 'http://waterpiklg.tmall.com/', 0, 1, 1425089676, 'wateradmin');

-- --------------------------------------------------------

--
-- Table structure for table `wp_special`
--

CREATE TABLE `wp_special` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(150) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `added_date` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT '1',
  `title_url` varchar(150) DEFAULT '',
  `pic_title` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_special`
--

INSERT INTO `wp_special` (`id`, `title`, `content`, `description`, `keywords`, `view_count`, `active`, `added_by`, `thumbnail`, `image_url`, `added_date`, `categoryId`, `title_url`, `pic_title`) VALUES
(77, '保持口腔清洁的方法有哪些', '<p>日常生活中，保持口腔清洁的方法有哪些呢？被大多人所熟知的可能就是刷牙和漱口这两种。刷牙是早晚都会做的，但是我们的刷牙方式正确吗？饭后用牙签剔牙真的对吗？这样真的能达到口腔清洁的效果吗？为什么会有口臭呢？是不是刷牙方法不对？这些关于口腔健康的问题值得我们好好思考。下面小编为大家介绍保持口腔清洁的几种方法。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"日常生活中口腔该如何正确清洁\" src=\"/assets/ckfinder/userfiles/images/23.jpg\" style=\"float:left; height:130px; width:150px\" /><strong><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/care/53.html\">日常生活中口腔该如何正确清洁</a></span></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 日常生活中口腔该如何正确清洁？人们常说，&ldquo;牙好，胃口好，吃嘛嘛香&rdquo;。口腔健康，特别是牙周健康与人体身心健康是息息相关的。我们都认为睡前漱口，起床漱口，饭后漱口就做好口腔卫生了。刷牙时大部分人都习惯于把牙膏、水和泡沫混在一起刷，很快就刷好了。在短暂的刷牙过程中，清洁了牙齿，但是牙龈的边缘与牙齿之间的部位都是很难照顾到的，这是生活中大部分人刷牙的习惯。生活中口腔该如何正确清洁呢？&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"如何保持口腔清洁四大招\" src=\"/assets/ckfinder/userfiles/images/25.jpg\" style=\"float:right; height:150px; width:150px\" /><strong><a href=\"http://www.chinawaterpik.com/knowledge/care/55.html\"><span style=\"font-size:16px\">如何保持口腔清洁四大招</span></a></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 如何保持口腔清洁，远离口臭？口臭是口腔局部疾患引起的，同时口臭也常是某些严重系统性疾病的口腔表现，有一些器质性疾患也会导致口臭症。口腔卫生的重点在于控制菌斑，消除污垢和食物残渣，增强生理刺激，使口腔和牙颌系统有一个清洁健康的良好环境，从而发挥其生理功能，维护口腔健康。如何保持口腔清洁卫生？应从以下几个方面采取措施：</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"正确的口腔清洁方法有哪些\" src=\"/assets/ckfinder/userfiles/images/26.jpg\" style=\"float:left; height:100px; width:150px\" /><strong><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/care/56.html\">正确的口腔清洁方法有哪些</a></span></strong></p>\r\n\r\n<p>要想&ldquo;牙好，胃口好&rdquo;，需要掌握正确的口腔清洁方法，养成睡前刷牙、起床刷牙、吃完东西漱口等口腔清洁的好习惯。但是很多人却忽视了，不以为然。当出现牙痛、牙龈出血、蛀牙、口气重等一系列口腔问题的时候才会意识到口腔健康的重要性。应该树立防患于未然的意识，树立口腔清洁理念，用正确的口腔清洁方法呵护口腔健康。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/27.jpg\" style=\"float:right; height:100px; width:150px\" /><strong><a href=\"http://www.chinawaterpik.com/knowledge/care/57.html\"><span style=\"font-size:16px\">专业的口腔清洁方法有哪些</span></a></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 父母应该学习一些专业的口腔清洁知识，用专业的口腔清洁方法呵护孩子健康成长。爱牙护牙伴随人的一生，对于每个人来说都是非常重要的。儿童口腔健康应该从小抓起，如何正确刷牙也自然而然地成为孩子从小的必修功课之一。父母从宝宝小时候起就需帮助及督促其每天认认真真地完成刷牙任务，慢慢地教会孩子正确的刷牙方式。伴随着年龄的增长，科学的、专业的口腔清洁方法将使他们受用终生。</p>\r\n', '洁碧网为大家介绍如何正确的清洁口腔、保持口腔清洁，以及专业的口腔清洁方法，希望能帮助您更好的了解口腔清洁。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '如何正确的清洁口腔_保持口腔清洁_专业的口腔清洁方法', 997, 1, 'water', '/assets/ckfinder/userfiles/images/16.jpg', '/assets/ckfinder/userfiles/images/16.jpg', 1480572729, 1, '', NULL),
(78, '如何专业护理口腔，洁碧水牙线来帮你', '<p>&nbsp; &nbsp; 想要进行彻底的口腔护理，单靠刷牙是远远不够的。那么如何专业护理口腔？世界卫生组织对口腔健康的定义是：牙齿清洁，无龋洞，无痛感，牙龈颜色正常，无出血现象。想要达到这样的标准，却不知道如何专业护理口腔的话，就让洁碧水牙线来帮你吧。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"口腔护理的重要性——口腔护理知识\" src=\"/assets/ckfinder/userfiles/images/22.jpg\" style=\"float:left; height:110px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/52.html\"><strong>口腔护理的重要性</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; 本文将研究口腔护理的重要性。很多人都会觉得口腔护理不重要，其实不然，口腔健康是人类现代文明的重要标志之一。单从这一点来看，口腔护理的重要性就不言而喻了。在人与人之间的交往中, 口腔健康、整齐洁白的牙齿是人的外表形象重要的一部分。随着人们之间的交往日益增多，接触日渐频繁，口腔健康客观上已成为影响人们职业选择、配偶选择的重要因素之一。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"口腔护理的注意事项一览\" src=\"/assets/ckfinder/userfiles/images/28.jpg\" style=\"float:right; height:110px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/44.html\"><strong>口腔护理的注意事项一览</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; 口腔作为人体消化系统的开口，对我们身心的健康会产生重要的影响。最近有来自国外的学者宣称，人体口腔中存在的&ldquo;CNM&rdquo;基因的变形链球菌（牙菌斑的主要成分之一）可能导致痴呆及脑出血，所以，口腔对我们的大脑健康也至关重要。因此在日常的口腔护理的过程中，一定要了解口腔护理的注意事项。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"正确的进行口腔护理绝非刷牙那么简单\" src=\"/assets/ckfinder/userfiles/images/shutterstock_2501446241.jpg\" style=\"float:left; height:110px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/43.html\"><strong>正确的进行口腔护理绝非刷牙那么简单</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; 学会如何正确地进行口腔护理非常重要，因为口腔健康不仅保障我们充分地咀嚼，享受美味佳肴；也保障我们口气清新，可以更自信地开口表达自己。然而，如果没有准确地进行口腔护理，会产生牙周疾病，甚至会影响到全身健康。因此，学会如何正确地进行口腔护理，能有效地帮助消除身体疾病的隐患。那如何正确地进行口腔护理呢？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"爱护身体，从口腔护理开始\" src=\"/assets/ckfinder/userfiles/images/shutterstock_2077212821.jpg\" style=\"float:right; height:130px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/45.html\"><strong>爱护身体，从口腔护理开始</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; 口腔健康与身体健康有难解难分的关系，要保持身体健康也就是需要我们经常进行口腔护理保持口腔健康。口腔护理的目的不单单是为了口腔健康，口腔护理的目的更是为了全身健康。我们熟知的进行口腔护理的目的有：1、保持口腔清洁、湿润；2、去除口臭、牙垢，增进食欲。所以口腔护理的目的还有以下重要两点</p>\r\n', '洁碧网为大家介绍如何正确的护理口腔、口腔护理注意事项，以及口腔护理的重要性，希望能帮助您更好的了解如何护理口腔。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '如何正确的护理口腔_口腔护理注意事项_口腔护理的重要性', 1258, 1, 'water', '/assets/ckfinder/userfiles/images/17066-an-asian-couple-smiling-at-each-other-outdoors-pv.jpg', '/assets/ckfinder/userfiles/images/17066-an-asian-couple-smiling-at-each-other-outdoors-pv.jpg', 1480938014, 1, '', NULL),
(79, '常用的口腔护理产品有哪些', '<p>&nbsp; &nbsp; 大部分人都很注重身体健康，会做各种保养和保健工作，却时常忽略很重要的口腔问题。如果您不希望有一天去牙科看医生，就从现在开始注重口腔健康护理工作，认真对待您的口腔问题。很多人想了解常见的口腔护理产品，下面将介绍一些常用的口腔护理产品。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"口腔护理产品有哪些——口腔护理注意事项\" src=\"/assets/ckfinder/userfiles/images/31.jpg\" style=\"float:left; height:90px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/61.html\"><strong>口腔护理产品有哪些</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; 口腔护理产品有哪些？现在市场上的口腔护理产品种类和品牌很多，如何对口腔护理产品进行选择，口腔护理产品有哪些，也成为大家日常关注的话题。其实口腔护理产品的选择注意这三点就足够了：对牙齿损伤尽量小、有美白效果、抑制细菌并能保持口气清新。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:14px\"><strong><img alt=\"日常口腔护理用品推荐——口腔护理用品有哪些\" src=\"/assets/ckfinder/userfiles/images/35.jpg\" style=\"float:right; height:90px; width:150px\" /></strong></span><span style=\"font-size:16px\"><strong><a href=\"http://www.chinawaterpik.com/knowledge/65.html\">日常口腔护理用品推荐</a></strong></span></p>\r\n\r\n<p>&nbsp; &nbsp; 生活水平的提高，也让越来越多的人开始注重健康。虽然口腔只是身体的一个小部分，但是也需要我们做好日常的护理工作。口腔护理用品也是我们生活中必不可少的，现在人们对口腔用品的需求已经从刷牙开始向外延伸。其实口腔护理用品的种类很多：</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><img alt=\"最常见的口腔保健用品有哪些_口腔保健用品推荐\" src=\"/assets/ckfinder/userfiles/images/36.jpg\" style=\"float:left; height:90px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/66.html\">最常见的口腔保健用品有哪些</a></span></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 最常见的口腔保健用品有哪些呢?健康洁白的牙齿不仅能让人更好的享受美食，还能让人更自信的展现笑容。想要展现自信笑容就从现在开始使用口腔健康产品来保护口腔吧，这对预防牙龈疾病，保持牙齿健康都有很大帮助。那么最常见的口腔保健用品有哪些呢?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong><img alt=\"日常口腔护理技巧有哪些_口腔护理知识\" src=\"/assets/ckfinder/userfiles/images/37.jpg\" style=\"float:right; height:90px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/67.html\">日常口腔护理技巧有哪些</a></span></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 日常口腔护理技巧有哪些?正所谓疾病从口中进入，其实日常口腔护理与我们的健康息息相关，口腔护理如果做不好就会给我们带来很多疾病问题。当然，要做好口腔护理也要了解口腔护理技巧，这样我们的护理才会更有效。针对这种情况，我们来对日常口腔护理技巧做下介绍吧。</p>\r\n', '洁碧网为大家介绍口腔护理产品大全、口腔护理产品有哪些，以及日常口腔护理用品，希望能帮助您更好的了解口腔护理产品。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '口腔护理产品大全_口腔护理产品有哪些_日常口腔护理用品', 835, 1, 'water', '/assets/ckfinder/userfiles/images/29.jpg', '/assets/ckfinder/userfiles/images/29.jpg', 1481254569, 1, '', NULL),
(86, '去除口臭的方法大全', '<p>&nbsp; &nbsp; 去除口臭的方法大全，您了解吗？现实生活中，口臭的原因有很多，人们通常认为上火是主要原因，上火可能会在一定程度上引起口臭，但是这并不是口臭的唯一原因。因此了解口臭的原因，才能更好地掌握方法。以下就是一些去除口臭的方法大全，希望对您会有帮助。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"去除口臭的最好办法是什么\" src=\"/assets/ckfinder/userfiles/images/group-smiling.jpg\" style=\"float:left; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/85.html\"><span style=\"font-size:16px\"><strong>去除口臭的最好办法是什么</strong></span></a></p>\r\n\r\n<p>&nbsp; &nbsp; 由于日常生活和工作的忙碌，常常会让人们忽视自身的健康。口臭就是其中之一，那么，去除口臭的最好办法是什么呢？口臭最直接的原因就是日常饮食的问题，当然也不排除一些是由疾病引起。以下将介绍去除口臭的最好办法是什么？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"去除口臭的最佳方法有哪些\" src=\"/assets/ckfinder/userfiles/images/smiling-family.jpg\" style=\"float:right; height:100px; width:150px\" /><strong><a href=\"http://www.chinawaterpik.com/knowledge/86.html\"><span style=\"font-size:16px\">去除口臭的最佳方法有哪些</span></a></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 生活中难免有的人群有口臭问题，口臭的引发原因主要还是口腔的问题，因此需要认真对待口腔清洁问题。那么，去除口臭的最佳方法有哪些呢？一般口臭的问题主要由口腔局部和全身两大因素引起。当然，口腔局部的问题还是引发口臭的主要原因。针对口腔局部，一起来了解下，去除口臭的最佳方法有哪些？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"去除口臭最有效的偏方有哪些\" src=\"/assets/ckfinder/userfiles/images/two-women-smiling.jpg\" style=\"float:left; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/87.html\"><span style=\"font-size:16px\"><strong>去除口臭最有效的偏方有哪些</strong></span></a></p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;口臭是日常生活中让人很尴尬的一种问题，往往自己不知道，别人却能闻到，造成很多不便。是否想知道去除口臭最有效的偏方有哪些？如果出现口臭，一定要采取有效的措施，才可以避免生活中因为口气带来的不便。下面，就为大家介绍一些去除口臭最有效的偏方。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"最好清除口气用什么方法\" src=\"/assets/ckfinder/userfiles/images/baby-toothbrush.jpg\" style=\"float:right; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/88.html\"><span style=\"font-size:16px\"><strong>最好清除口气用什么方法</strong></span></a></p>\r\n\r\n<p>&nbsp; &nbsp; 最好清除口气用什么方法？对于有口臭的朋友来说，肯定迫切想知道一个方法。口臭问题的影响不仅是健康上的，也是个人的形象问题。甚至有一些人因为这个问题丧失了自信，失去了原有的活泼和开朗，不愿与人亲密接触。因此不要小看口臭的问题。针对这种情况，来了解下，最好清除口气用什么方法？</p>\r\n', '洁碧网为大家介绍治疗口臭的最佳方法、怎么快速去除口臭以及去除口臭的最好办法是什么，希望能帮助您更好的了解去除口臭的最佳方法。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '治疗口臭的最佳方法_怎么快速去除口臭_去除口臭的最好办法是什么', 742, 1, 'water', '/assets/ckfinder/userfiles/images/woman-4.jpg', '/assets/ckfinder/userfiles/images/woman-4.jpg', 1486110561, 3, '', ''),
(80, '常见的口腔护理包括哪些', '<p>&nbsp; &nbsp; 常见的口腔护理包括哪些？人们常说，病从口入, 日常生活中口腔护理和口腔保健的重要性显而易见。做好口腔护理工作，才能有更好的胃口和心情去品尝美食。但是，不良的口腔护理也可能引起其他疾病。那么常见的口腔护理究竟包括哪些？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><img alt=\"几种常见的口腔护理方法介绍\" src=\"/assets/ckfinder/userfiles/images/30.jpg\" style=\"float:left; height:110px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/60.html\"><span style=\"font-size:16px\">几种常见的口腔护理方法介绍</span></a></strong></p>\r\n\r\n<p><strong>&nbsp; </strong>&nbsp; 口腔护理方法你了解吗？日常生活中，很多人羡慕广告中那些洁白整齐的牙齿，也有很多人花大价钱去修牙和矫正牙齿，却忽视了一些日常的牙齿护理工作，只要保持良好的日常口腔护理习惯，就可以拥有洁白整齐的牙齿。接下来将介绍几种常见的口腔护理方法，帮助人们做好日常口腔护理工作。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong><img alt=\"口腔护理方法哪些最有效_口腔护理小常识\" src=\"/assets/ckfinder/userfiles/images/32.jpg\" style=\"float:right; height:90px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/62.html\">口腔护理方法哪些最有效</a></span></strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; 了解一些口腔护理方法对日常口腔健康的保健，这样可以避免出现一些口腔方面的疾病。口腔护理方法哪些最有效常常是大众想要了解的，其实身边很多人对口腔护理知识的了解都还停留在刷牙清洁上面，护理意识比较薄弱。下面就一起来了解一下口腔护理方法哪些最有效。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/63.html\"><span style=\"font-size:16px\"><strong><img alt=\"口腔护理知识与方法介绍\" src=\"/assets/ckfinder/userfiles/images/33.jpg\" style=\"float:left; height:110px; width:150px\" />口腔护理知识与方法介绍</strong></span></a></p>\r\n\r\n<p>&nbsp; &nbsp; 了解口腔护理知识与方法，有利于我们保持口腔的健康，可以避免出现口腔疾病。可是我们身边很多人对口腔的护理还只是停留在刷牙漱口阶段，其实这只是最薄弱的护理方法，长期下去会导致蛀牙的出现，这对我们来说是很不利的。针对这种情况，我们将对口腔护理知识与方法进行介绍，希望以下内容对您会有帮助。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong><img alt=\"日常口腔护理方法有哪些呢\" src=\"/assets/ckfinder/userfiles/images/34.jpg\" style=\"float:right; height:129px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/64.html\">日常口腔护理方法有哪些呢</a></span></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 日常口腔护理方法有哪些呢？调查显示，超过80%的口腔疾病是可以通过有效的日常口腔护理避免的，这也说明了日常口腔护理方法的重要性。生活中有很多人不重视口腔问题，认为口腔问题不是大问题，因为并不危及生命。其实这种想法是错误的，口腔如果不健康，就会影响食欲，严重的甚至会引发其他疾病，因此对口腔的日常护理还是很重要的。下面本文将介绍一些口腔护理方法。</p>\r\n', '洁碧网为大家介绍最有效的口腔护理方法、口腔护理方法大全，以及口腔护理方法介绍，希望能帮助您更好的了解口腔护理方法。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '最有效的口腔护理方法_口腔护理方法大全_口腔护理方法介绍', 847, 1, 'water', '/assets/ckfinder/userfiles/images/28.jpg', '/assets/ckfinder/userfiles/images/28.jpg', 1481261129, 1, '', NULL),
(83, '口腔预防常识', '<p>&nbsp; &nbsp; 中国饮食文化深厚，饕餮食客也无时无刻不在尝试各色美食，可是在肆无忌惮享受美食时，有没有考虑过牙齿的感受？口腔预防常识知多少？牙齿为什么会在悄然不觉间就坏掉了？虽然现在诊牙治牙的诊所医院处处皆是，可有点名气的则是人满为患，然而大部分就诊的人都是年轻人。如此看来，不得不重视一下口腔预防常识问题。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><img alt=\"口腔护理知识大全\" src=\"/assets/ckfinder/userfiles/images/18.jpg\" style=\"float:left; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/72.html\"><span style=\"font-size:16px\">口腔护理知识大全</span></a></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 俗话说&ldquo;牙疼不是病，疼起来要人命。&rdquo;这充分说明了牙齿要是出现故障，那个痛可真是会让你刻骨铭心。因此，不想被这种疼痛折磨就赶紧拿着口腔护理知识大全这本秘籍好好精读一番吧！为适应快节奏碎片式的阅读风格，洁碧有限公司特此在口腔护理知识大全这类书籍中挑出一些对大家实用且重要的几点加以列举说明：</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:16px\"><strong><img alt=\"口腔保健护理知识有哪些\" src=\"/assets/ckfinder/userfiles/images/20.jpg\" style=\"float:right; height:100px; width:150px\" /></strong><a href=\"http://www.chinawaterpik.com/knowledge/50.html\"><strong>口腔保健护理知识有哪些</strong></a></span></p>\r\n\r\n<p><strong>&nbsp; &nbsp;</strong>2007年，世界卫生组织提出，口腔疾病是一个严重的公共卫生问题，需要积极防治。口腔保健护理知识有哪些？在我们的口腔中，长期存在许多微生物，他们可导致口腔疾病，如龋病、牙周疾病等，会破坏牙齿硬组织和牙齿周围支持组织，除影响咀嚼、言语、美观等功能，也有可能加剧某些全身疾病如冠心病、糖尿病等，危害全身健康。可见，口腔的护理对健康非常重要，因此要养成良好的口腔卫生习惯，呵护口腔健康。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong><img alt=\"孕期妈妈口腔保健知识必读\" src=\"/assets/ckfinder/userfiles/images/45.jpg\" style=\"float:left; height:100px; width:150px\" /></strong><a href=\"http://www.chinawaterpik.com/knowledge/71.html\"><strong>孕期妈妈口腔保健知识必读</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; 我国事业型女性越来越多，也随着&ldquo;二胎政策&rdquo;的实施，30岁以上大龄女性怀孕的现象日益增多，口腔保健知识对于准妈妈们来说也是相当重要。龋齿是孕期妈妈非常常见的口腔病，还有一种孕期特有的口腔病妊娠期牙龈炎。这两种口腔病是准妈妈们最常见的口腔病。那么造成这两种病的原因是什么呢？如何进行预防？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/55.html\"><strong><img alt=\"牙龈出血口腔护理小常识\" src=\"/assets/ckfinder/userfiles/images/25.jpg\" style=\"float:right; height:100px; width:150px\" />牙龈出血口腔护理小常识</strong></a></span></p>\r\n\r\n<p><strong>&nbsp; &nbsp;</strong>口腔护理小常识是生活中必不可少的，但口腔问题常常被忽视。很多人都会遇到早上刷牙出血等问题，这些都需要引起重视。牙龈出血是一个比较常见的口腔病，很多因素都会导致牙龈出血的发生。这些小问题给我们的生活带来了什么样的危害呢？</p>\r\n', '洁碧网为大家介绍口腔护理小知识、口腔护理常识，以及口腔护理知识大全，希望能帮助您更好的了解口腔护理知识。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '口腔护理小知识_口腔护理常识_口腔护理知识大全', 1071, 1, 'water', '/assets/ckfinder/userfiles/images/8.jpg', '/assets/ckfinder/userfiles/images/8.jpg', 1481264132, 1, '', NULL),
(87, '牙疼的常见原因及解决方法', '<p>&nbsp; &nbsp; 牙疼是很多人都有过的经历，那牙疼的常见原因有哪些？俗话说，牙疼不是病，疼起来要人命。这句老话足以证明牙疼的痛苦程度了。其实牙疼并没有那么可怕，只要了解了牙疼的常见原因，根据病因来解决，就可以很好地消除这个隐患。下面，就来了解下牙疼的常见原因。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"牙疼原因是什么\" src=\"/assets/ckfinder/userfiles/images/man-2.jpg\" style=\"float:left; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/90.html\"><strong><span style=\"font-size:16px\">牙疼原因是什么</span></strong></a></p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;相信牙疼是很多人生活中的一个烦恼，牙疼的时候吃不好睡不好，那么牙疼原因是什么呢？了解了牙疼的原因，才能让人们知道痛苦的根源，从而解决问题。那么，牙疼原因是什么呢？一起来了解下。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"牙龈肿痛怎么办\" src=\"/assets/ckfinder/userfiles/images/woman-1.jpg\" style=\"float:right; height:103px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/91.html\"><strong><span style=\"font-size:16px\">牙龈肿痛怎么办</span></strong></a></p>\r\n\r\n<p><span style=\"color:rgb(101, 101, 101); font-family:microsoft yahei,helvetica neue,helvetica,arial,sans-serif; font-size:14px\">&nbsp; &nbsp; 相信很多人都会有牙龈肿痛的痛苦，那牙龈肿痛怎么办？人们经常会把牙龈肿痛看作是上火，其实这种理解并不全面。因为牙龈肿痛也有可能是口腔内疾病的一个征兆，当然这种疾病的诱发因素一般也是多方面的。那么，面对这种征兆，该怎么预防呢？一起来了解下，牙龈肿痛怎么办？</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"一般引起牙痛的原因有哪些\" src=\"/assets/ckfinder/userfiles/images/woman-2.jpg\" style=\"float:left; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/92.html\"><strong><span style=\"font-size:16px\">一般引起牙痛的原因有哪些</span></strong></a></p>\r\n\r\n<p><span style=\"color:rgb(101, 101, 101); font-family:microsoft yahei,helvetica neue,helvetica,arial,sans-serif; font-size:14px\">&nbsp; &nbsp; 牙痛的原因有哪些？牙痛是常见的口腔疾病，如果炎症不尽快消除，会一直处于这种病发状态。牙痛都是有一定发病原因的，以下将介绍牙痛的原因有哪些？</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"引起牙疼的原因有哪些\" src=\"/assets/ckfinder/userfiles/images/woman-3.jpg\" style=\"float:right; height:100px; width:150px\" /><strong><a href=\"http://www.chinawaterpik.com/knowledge/93.html\"><span style=\"font-size:16px\">引起牙疼的原因有哪些</span></a></strong></p>\r\n\r\n<p><span style=\"color:rgb(101, 101, 101); font-family:microsoft yahei,helvetica neue,helvetica,arial,sans-serif; font-size:14px\">&nbsp; &nbsp; 日常生活中引起牙疼的原因有很多，例如牙周炎，还有牙齿本身的坏死，一些口腔疾病等。引起牙疼的原因有哪些？如果不进行具体的总结，相信您还不是那么的了解。针对这种情况，来介绍下引起牙疼的原因有哪些？</span></p>\r\n', '洁碧网为大家介绍牙疼的原因都有哪些、牙疼的原因是什么以及经常牙疼的原因希望能帮助您更好的了解牙疼的原因。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '牙疼的原因都有哪些_牙疼的原因是什么_经常牙疼的原因', 708, 1, 'water', '/assets/ckfinder/userfiles/images/man-1.jpg', '/assets/ckfinder/userfiles/images/man-1.jpg', 1486111673, 2, '', ''),
(88, '口腔护理操作流程有哪些', '<p>&nbsp; &nbsp; 虽然知道日常的口腔护理很重要，但不是所有人都了解口腔护理操作流程有哪些？其实很多口腔疾病都是源于日常生活的不良习惯，还有一些不注意造成的。不要小看口腔疾病，一旦患病，对人体会造成不小的影响，包括影响饮食。下面就来介绍下口腔护理操作流程有哪些？</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/81.html\"><span style=\"font-size:16px\"><strong>口腔护理的操作步骤是什么</strong></span></a></p>\r\n\r\n<p><strong><img alt=\"口腔护理的操作步骤是什么\" src=\"/assets/ckfinder/userfiles/images/201714.jpg\" style=\"float:left; height:100px; width:150px\" /><span style=\"font-size:14px\">&nbsp; &nbsp;&nbsp;</span></strong><span style=\"font-size:14px\">口腔护理的操作步骤是什么？口腔问题是生活中常见的问题，相信很多人一直把口腔护理当作健康的一个小方面，这就是对口腔健康不重视的表现。而且，相信很多人不知道，口腔护理如果不到位，就会引发很多疾病，严重也会威胁身体的各项器官，所以口腔护理是至关重要的。下面就来了解下口腔护理的操作步骤是什么？</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><a href=\"http://www.chinawaterpik.com/knowledge/care/95.html\"><span style=\"font-size:16px\"><strong>口腔护理程序是什么</strong></span></a></p>\r\n\r\n<p><img alt=\"口腔护理程序是什么\" src=\"/assets/ckfinder/userfiles/images/201729.jpg\" style=\"float:right; height:100px; width:150px\" /><span style=\"color:rgb(101, 101, 101); font-family:microsoft yahei,helvetica neue,helvetica,arial,sans-serif; font-size:14px\">&nbsp; &nbsp; 刷牙是日常生活中非常微不足道的一件事情，然而正因为不被重视，很多人就忽视了这其实是对口腔护理很有效的一个做法。那么，口腔护理程序是什么?你了解吗?因为很多人刷牙的方式不正确，导致了牙齿的不健康。在日常的口腔护理上还需要多加重视，这样才能保证牙齿健康。那么，口腔护理程序是什么呢?一起了解下。</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/care/82.html\"><span style=\"font-size:16px\"><strong>口腔护理的操作方法有哪些</strong></span></a></p>\r\n\r\n<p><img alt=\"口腔护理的操作方法有哪些\" src=\"/assets/ckfinder/userfiles/images/201718.jpg\" style=\"float:left; height:100px; width:150px\" /><span style=\"color:rgb(101, 101, 101); font-family:microsoft yahei,helvetica neue,helvetica,arial,sans-serif; font-size:14px\">&nbsp; &nbsp; 口腔护理的操作方法有哪些？其实普通人对口腔的护理工作了解有限，都觉得每天正常刷个牙就可以了，然而每日的刷牙只是口腔护理一个最基础的操作而已。不要觉得口腔护理是小事，口腔的健康问题其实会影响到身体的健康。就以下就为您介绍口腔护理的操作方法有哪些？</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><a href=\"http://www.chinawaterpik.com/knowledge/care/83.html\"><span style=\"font-size:16px\"><strong>新生儿口腔护理操作全部流程</strong></span></a></p>\r\n\r\n<p><img alt=\"新生儿口腔护理操作全部流程\" src=\"/assets/ckfinder/userfiles/images/201711.jpg\" style=\"float:right; height:100px; width:150px\" />&nbsp; &nbsp;&nbsp;新生儿口腔护理操作全部流程有哪些？我们知道新生命的身体各项机能是很稚嫩的，口腔也是如此。那作为新生儿，更要注意口腔的护理问题，尤其是口腔黏膜的清洁方面，如果处理不好就容易造成感染等情况。那第一次当父母，对新生儿的照顾还不是很了解，那么新生儿口腔护理操作全部流程有哪些呢？我们一起来了解下吧。</p>\r\n', '洁碧网为大家介绍日常口腔护理流程步骤、日口腔护理流程标准以及口腔护理流程都有哪些，希望能帮助您更好的了解口腔护理流程。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '口腔护理流程步骤,口腔护理流程标准,口腔护理流程都有哪些', 590, 1, 'water', '/assets/ckfinder/userfiles/images/201701.jpg', '/assets/ckfinder/userfiles/images/201701.jpg', 1488541636, 1, '', '口腔护理操作流程有哪些'),
(89, '口腔护理的日常步骤是什么', '<p><strong>&nbsp; &nbsp;</strong> 口腔护理的日常步骤是什么？随着生活水平的提高，有越来越多的人开始注重健康问题，毕竟拥有健康的身体，才能更好地享受生活。那口腔作为身体的一部分，对身体的健康也有着很大的影响。不过，如果想做好口腔护理，还是要了解相关的护理步骤才行。下面就为大家介绍口腔护理的日常步骤是什么？</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/care/76.html\"><span style=\"font-size:16px\"><strong>口腔日常护理知识有哪些</strong></span></a></p>\r\n\r\n<p><img alt=\"口腔日常护理知识有哪些\" src=\"/assets/ckfinder/userfiles/images/201702.jpg\" style=\"float:left; height:99px; width:150px\" />&nbsp; &nbsp; 口腔日常护理知识有哪些？日常生活中，常常会被口腔疾病困扰，口腔问题看似很小，其实一旦患病，对生活及健康的影响也会很大，尤其是它会引发一系列其他方面的疾病，让患者苦不堪言。那么口腔日常护理知识有哪些？了解了口腔的日常护理常识，就可以避免一些口腔方面的疾病。下面就来一起了解一下口腔日常护理知识有哪些？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><a href=\"http://www.chinawaterpik.com/knowledge/care/77.html\"><span style=\"font-size:16px\"><strong>日常口腔护理几大误区</strong></span></a></p>\r\n\r\n<p><strong><img alt=\"日常口腔护理几大误区\" src=\"/assets/ckfinder/userfiles/images/201706.jpg\" style=\"float:right; height:100px; width:150px\" /></strong>&nbsp; &nbsp; 日常口腔护理几大误区有哪些？生活中，人们常常会因为懒惰和不了解健康常识，养成一些不好的习惯，口腔疾病就是这样引起的。其实平时做好口腔护理工作很重要，不然会引发一系列疾病，对健康造成更大的影响。那么日常口腔护理几大误区有哪些？下面就一起来了解一下。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/care/78.html\"><span style=\"font-size:16px\"><strong>日常口腔护理经常遇到的问题有哪些</strong></span></a></p>\r\n\r\n<p><strong><img alt=\"日常口腔护理经常遇到的问题有哪些\" src=\"/assets/ckfinder/userfiles/images/201721.jpg\" style=\"float:left; height:101px; width:150px\" /></strong><strong>&nbsp; &nbsp;</strong> 日常口腔护理经常遇到的问题有哪些？日常口腔护理也许会遇到一些问题，可是生活中很多人并不知道该如何处理。口腔疾病一般都是日常生活习惯不规律造成的，因此只要做好日常的口腔护理，就能对口腔保护起到关键的作用。针对这种情况，就一起来对日常口腔护理经常遇到的问题做以下总结</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/care/79.html\"><span style=\"font-size:16px\"><strong>日常生活中如何做好口腔护理</strong></span></a></p>\r\n\r\n<p><img alt=\"日常生活中如何做好口腔护理\" src=\"/assets/ckfinder/userfiles/images/201717.jpg\" style=\"float:right; height:100px; width:150px\" />&nbsp;&nbsp; &nbsp;日常生活中如何做好口腔护理？口腔问题看似很小，如果不稍加注意就会引发很多口腔疾病，牙周炎就是其中的一种。虽然牙周炎在口腔疾病中算小事，但还是要做好相关方面的了解及防护才行，如果引发其他方面的疾病，可就得不偿失了。其实牙周炎的护理方法并不难，只要稍加了解即可。</p>\r\n', '洁碧网为大家介绍日常口腔护理操作流程、日常口腔护理注意事项以及日常口腔护理有哪些步骤，希望能帮助您更好的了解日常口腔护理。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '日常口腔护理操作流程,日常口腔护理注意事项,日常口腔护理有哪些步骤', 633, 1, 'water', '/assets/ckfinder/userfiles/images/201709.jpg', '/assets/ckfinder/userfiles/images/201709.jpg', 1488543045, 1, '', ''),
(90, '口腔护理的目的是什么', '<p>&nbsp; &nbsp; 日常生活中，大家都能做到勤刷牙，保持口腔的清洁，但是大多数人并不了解，口腔护理的目的是什么？其实口腔护理的目的主要就是保持口腔的清洁和清新，预防口腔感染，避免出现一些不必要的疾病。下面就来做一下相关方面的介绍。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/97.html\"><span style=\"font-size:16px\"><strong>口腔护理有什么目的</strong></span></a></p>\r\n\r\n<p><img alt=\"口腔护理有什么目的\" src=\"/assets/ckfinder/userfiles/images/201730.jpg\" style=\"float:left; height:100px; width:150px\" />&nbsp; &nbsp; 虽然日常的口腔护理工作做得很好，但是很多人并不了解，口腔护理有什么目的？口腔护理的主要目的就是保持口腔的清洁及健康，口腔健康对身体有不小的影响。下面来对口腔护理有什么目的做一些相关介绍。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/98.html\"><strong>日常口腔护理的目的</strong></a></span></p>\r\n\r\n<p><img alt=\"日常口腔护理的目的\" src=\"/assets/ckfinder/userfiles/images/201731.jpg\" style=\"float:right; height:100px; width:150px\" />&nbsp;&nbsp; &nbsp;对于老年人，身体机能及各个器官已经出现衰老的情况，牙齿也是一样。因此了解日常口腔护理的目的，从而更有针对性的对口腔问题进行处理。作为老年人，除了日常的口腔清洁，也可以做一些口腔的保健操，多做一些口腔健康的检查。日常口腔护理的目的还有以下几方面。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/99.html\"><span style=\"font-size:16px\"><strong>特殊口腔护理操作的目的有哪些</strong></span></a></p>\r\n\r\n<p><img alt=\"特殊口腔护理操作的目的有哪些\" src=\"/assets/ckfinder/userfiles/images/201727.jpg\" style=\"float:left; height:83px; width:150px\" />&nbsp;&nbsp; &nbsp;特殊口腔护理操作的目的有哪些？可能很多人对特殊口腔护理的了解并不多，其实特殊口腔护理对象，主要是一些处于高热、昏迷，和一些危重和禁食等生活上出现不能自理现象的病人。那特殊口腔护理操作的目的有哪些？可能很多人并不了解，下文将做简单介绍。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><a href=\"http://www.chinawaterpik.com/knowledge/100.html\"><span style=\"font-size:16px\"><strong>特殊口腔护理的目的有哪些</strong></span></a></p>\r\n\r\n<p><img alt=\"特殊口腔护理的目的有哪些\" src=\"/assets/ckfinder/userfiles/images/201728.jpg\" style=\"float:right; height:100px; width:150px\" /><strong>&nbsp; &nbsp; </strong>特殊口腔护理的目的有哪些？很多人都把口腔问题当作身体健康的小问题，就算口腔患上疾病，也不会引起太多的重视。其实这样的想法是错误的，因为口腔疾病与身体的很多疾病都有着密切的关系，口腔如果不健康，会诱发身体各方面的疾病。特殊口腔护理的目的有哪些？一起来了解下。</p>\r\n', '洁碧网为大家介绍口腔护理目的是什么、口腔护理目的与方法以及口腔护理目的如何达成，希望能帮助您更好的了解口腔护理目的。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '口腔护理目的是什么_口腔护理目的与方法_口腔护理目的如何达成-洁碧官网', 573, 1, 'water', '/assets/ckfinder/userfiles/images/201703.jpg', '/assets/ckfinder/userfiles/images/201703.jpg', 1488544127, 1, '', ''),
(91, '冬季口腔护理习惯误区', '<p>&nbsp; &nbsp; 冬季口腔护理习惯误区有哪些？冬季温度低，尤其是北方，室内外温差大，更容易对身体健康造成隐患。因此，冬季里也要注意口腔健康，尤其是不要让牙齿忽冷忽热，会对牙齿造成很大的危害。下面来了解下冬季口腔护理习惯误区有哪些？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/102.html\"><span style=\"font-size:16px\"><strong>纠正口腔护理三大误区</strong></span></a></p>\r\n\r\n<p><strong><img alt=\"纠正口腔护理三大误区\" src=\"/assets/ckfinder/userfiles/images/201712.jpg\" style=\"float:left; height:100px; width:150px\" /></strong>&nbsp;&nbsp; &nbsp;纠正口腔护理三大误区，你了解吗？大多数人日常生活中对口腔护理都会做得很好，但还是避免不了陷入一些误区。其实这也是由于对口腔护理知识不够了解导致的，因此在日常生活中需要了解相关的口腔护理知识。以下将介绍口腔护理三大误区。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: right;\"><a href=\"http://www.chinawaterpik.com/knowledge/103.html\"><span style=\"font-size:16px\"><strong>口腔护理常见误区介绍</strong></span></a></p>\r\n\r\n<p><strong><img alt=\"口腔护理常见误区介绍\" src=\"/assets/ckfinder/userfiles/images/201722.jpg\" style=\"float:right; height:100px; width:150px\" /></strong>&nbsp; &nbsp; 口腔护理常见误区介绍，你了解吗？日常生活中，人们常常由于疏忽或者不了解口腔护理知识，而陷入一些误区，并导致了口腔问题的产生，因此还是要做好相关方面的预防措施，了解口腔护理常见误区介绍。下面进行口腔护理常见误区介绍。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/care/104.html\"><span style=\"font-size:16px\"><strong>口腔护理误区有哪些</strong></span></a></p>\r\n\r\n<p><img alt=\"口腔护理误区有哪些\" src=\"/assets/ckfinder/userfiles/images/201705.jpg\" style=\"float:left; height:100px; width:150px\" />&nbsp; &nbsp; 口腔护理误区有哪些？相信这个问题是很多朋友们都想了解的，毕竟每个人都希望有一口健康洁白的牙齿，不仅因为好看，还因为拥有健康的牙齿才能享受更多的美食。但是，往往因为不了解口腔护理知识而陷入一些误区，这会严重影响口腔健康。那么口腔护理误区有哪些？一起来看下。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: right;\"><a href=\"http://www.chinawaterpik.com/knowledge/care/105.html\"><span style=\"font-size:16px\"><strong>盘点口腔护理几大误区</strong></span></a></p>\r\n\r\n<p><img alt=\"盘点口腔护理几大误区\" src=\"/assets/ckfinder/userfiles/images/201725.jpg\" style=\"float:right; height:100px; width:150px\" />&nbsp;&nbsp; &nbsp;盘点口腔护理几大误区，你知道哪些？其实生活中，每个人都很注重口腔护理，但是因为对口腔护理知识不是很了解，导致陷入误区，相信这种情况不在少数。如果陷入口腔护理误区，不仅对口腔健康不利，而且会造成更严重的隐患。下面就盘点口腔护理几大误区。</p>\r\n', '洁碧网为大家介绍口腔护理误区都有哪些、如何避免口腔护理误区以及怎么走出口腔护理误区，希望能帮助您更好的了解口腔护理误区。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '口腔护理误区都有哪些_如何避免口腔护理误区_怎么走出口腔护理误区-洁碧官网', 505, 1, 'water', '/assets/ckfinder/userfiles/images/201710.jpg', '/assets/ckfinder/userfiles/images/201710.jpg', 1488544665, 1, '', '冬季口腔护理习惯误区');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_users`
--

INSERT INTO `wp_users` (`id`, `username`, `password`, `created_date`) VALUES
(8, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2017-10-12 13:55:25'),
(7, 'waterNC', '8dd8734a6c52f4303dd36cc61e11b6fc', '2017-07-07 09:50:52'),
(9, 'doubletong', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-18 20:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `wp_videos`
--

CREATE TABLE `wp_videos` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prompt` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `video_url` varchar(150) NOT NULL,
  `ogv` varchar(150) NOT NULL,
  `webm` varchar(150) NOT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `importance` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_date` datetime NOT NULL,
  `view_count` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `productName` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_videos`
--

INSERT INTO `wp_videos` (`id`, `title`, `sub_title`, `description`, `prompt`, `keywords`, `content`, `video_url`, `ogv`, `webm`, `thumbnail`, `importance`, `added_by`, `added_date`, `view_count`, `active`, `productName`) VALUES
(1, '洁碧超效型水牙线（WP-100EC）使用指引', 'Waterpik Ultra Water Flosser Use Guidelines', 'waterpik洁碧官网，为您提供洁碧超效型水牙线（WP-100EC）使用指引,洁碧超效型水牙线（WP-100EC）使用方法视频等服务。想了解更多，就上洁碧官方网站！', '洁碧超效型水牙线(WP-100EC)使用指引频道为您提供洁碧超效型水牙线(WP-100EC)使用指引，使用方法枧频等优质服务，让您安心又省心.了解洁碧超效型水牙线（WP-100EC）使用指引就到洁碧超效型水牙线（WP-100EC）使用指引频道.\r\n', '洁碧超效型水牙线（WP-100EC）使用指引,洁碧超效型水牙线（WP-100EC）使用方法视频', '<p>1</p>\r\n', '/assets/ckfinder/userfiles/files/videos/100EC(2).mp4', '/assets/ckfinder/userfiles/files/videos/100EC.ogv', '/assets/ckfinder/userfiles/files/videos/100EC_(webm).webm', '/assets/ckfinder/userfiles/files/videos/v.jpg', 0, 'admin', '2015-02-02 15:07:52', 0, 0, '洁碧超效型水牙线（WP-100EC）'),
(2, '洁碧标准型水牙线（WP-70EC）使用指引', 'Waterpik Classic Water Flosser', 'waterpik洁碧官网，为您提供洁碧标准型水牙线（WP-70EC）使用指引,洁碧标准型水牙线（WP-70EC）使用方法视频等服务。想了解更多，就上洁碧官方网站！', '', '洁碧标准型水牙线（WP-70EC）使用指引,洁碧标准型水牙线（WP-70EC）使用方法视频', '<p>洁碧标准型水牙线（WP-70EC）使用指引</p>\r\n', '/assets/ckfinder/userfiles/files/videos/70EC(1).mp4', '/assets/ckfinder/userfiles/files/videos/70EC(1).ogv', '/assets/ckfinder/userfiles/files/videos/70EC.webm', '/assets/ckfinder/userfiles/files/videos/70.jpg', 0, 'admin', '2015-02-02 15:15:18', 0, 1, '洁碧标准型水牙线（WP-70EC）'),
(3, '洁碧便携式水牙线（WP-450EC）使用指引', 'Waterpik Cordless Plus Water Flosser Use Guidelines', 'waterpik洁碧官网，为您提供洁碧便携式水牙线（WP-450EC）使用指引,洁碧便携式水牙线（WP-450EC）使用方法视频等服务。想了解更多，就上洁碧官方网站！', '', '洁碧便携式水牙线（WP-450EC）使用指引,洁碧便携式水牙线（WP-450EC）使用方法视频', '<p>洁碧便携式水牙线（WP-450EC）使用指引</p>\r\n', '/assets/ckfinder/userfiles/files/videos/450EC(1).mp4', '/assets/ckfinder/userfiles/files/videos/450EC(1).ogv', '/assets/ckfinder/userfiles/files/videos/450EC.webm', '/assets/ckfinder/userfiles/files/videos/450.jpg', 0, 'doubletong', '2015-02-03 07:59:55', 0, 1, '洁碧便携式水牙线（WP-450EC）');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_links`
--
ALTER TABLE `media_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_articles`
--
ALTER TABLE `wp_articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_carousels`
--
ALTER TABLE `wp_carousels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_distributors`
--
ALTER TABLE `wp_distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_orderitems`
--
ALTER TABLE `wp_orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_orders`
--
ALTER TABLE `wp_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_products`
--
ALTER TABLE `wp_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_shopes`
--
ALTER TABLE `wp_shopes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_special`
--
ALTER TABLE `wp_special`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_videos`
--
ALTER TABLE `wp_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `media_links`
--
ALTER TABLE `media_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wp_articles`
--
ALTER TABLE `wp_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `wp_carousels`
--
ALTER TABLE `wp_carousels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wp_distributors`
--
ALTER TABLE `wp_distributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wp_orderitems`
--
ALTER TABLE `wp_orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=514;

--
-- AUTO_INCREMENT for table `wp_orders`
--
ALTER TABLE `wp_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT for table `wp_products`
--
ALTER TABLE `wp_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `wp_shopes`
--
ALTER TABLE `wp_shopes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wp_special`
--
ALTER TABLE `wp_special`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wp_videos`
--
ALTER TABLE `wp_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
