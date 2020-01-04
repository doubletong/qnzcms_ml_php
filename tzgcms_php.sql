-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 04, 2020 at 06:50 PM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tzgcms_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image_url_mobile` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `space_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `link`, `image_url`, `image_url_mobile`, `content`, `description`, `importance`, `space_id`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(2, '格科微电子  用芯看世界', 'http://www.baidu.com', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/slider01.jpg', '<p>aa</p>\r\n', '', 0, 2, 1, 'admin', '2019-12-30 05:47:45', '2020-01-01 04:07:12'),
(3, 'test', 'http://www.baidu.com', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/slider01.jpg', '', '', 0, 2, 1, 'admin', '2019-12-31 10:26:07', '2019-12-31 10:26:07'),
(4, 'test【拷贝】', 'http://www.baidu.com', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/slider01.jpg', '', '', 0, 2, 1, 'admin', '2019-12-31 10:28:07', '2019-12-31 10:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `advertising_spaces`
--

CREATE TABLE `advertising_spaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advertising_spaces`
--

INSERT INTO `advertising_spaces` (`id`, `title`, `code`, `description`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(2, '首页轮播【全屏】', 'A001', '', 0, 1, 'admin', '2019-12-30 05:47:23', '2019-12-30 05:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `annals`
--

CREATE TABLE `annals` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(4) DEFAULT NULL,
  `image_url` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `annals`
--

INSERT INTO `annals` (`id`, `year`, `month`, `image_url`, `description`, `dictionary_id`, `added_by`, `added_date`) VALUES
(7, 2018, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n', 13, 'admin', 1572831029),
(13, 2017, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832628),
(14, 2016, 0, '', '\r\n<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832644),
(15, 2015, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832647),
(16, 2014, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832650),
(17, 2013, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832654),
(18, 2012, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832657),
(19, 2012, 0, '', '<ul>\r\n	<li>\r\n	  fsdsfs \r\n	</li>\r\n</ul>\r\n', 14, 'admin', 1572833338),
(21, 2015, 0, '', '<ul>\r\n	<li>123</li>\r\n</ul>\r\n', 14, 'admin', 1572833359),
(22, 2013, 0, '', '<ul>\r\n	<li>erewrw</li>\r\n</ul>\r\n', 14, 'admin', 1572833363),
(23, 2016, 0, '', '<ul>\r\n	<li>格科产品500万像素图像传感器芯片GC5005荣获工业和信息化部软件与集成电路促进中心颁发的&rdquo;第十一届 &lsquo;中国芯&rsquo;最佳市场表现奖&rdquo;</li>\r\n	<li>获中国半导体行业协会评为&ldquo;2016年中国十大集成电路设计企业奖&rdquo;</li>\r\n	<li>获电子工程专辑颁发的&ldquo;十大大中华IC设计公司品牌&rdquo;</li>\r\n	<li>获上海市浦东新区科技和经济委员会颁发的&ldquo;2014-2016浦东新区集成电路设计业实力型企业&rdquo;</li>\r\n	<li>格科产品GC13003荣获中国半导体行业协会颁发的第十四届中国国际半导体博览会暨高峰论坛&ldquo;优秀参展产品</li>\r\n</ul>\r\n', 14, 'admin', 1572833367),
(24, 2017, 0, '', '<ul>\r\n	<li>格科产品800万像素图像传感器芯片GC8024荣获工业和信息化部软件与集成电路促进中心颁发的&rdquo;第十二届 &lsquo;中国芯&rsquo;最佳市场表现奖&rdquo;</li>\r\n	<li>获电子工程专辑颁发的&ldquo;2017年大中华IC设计成就奖&rdquo;</li>\r\n	<li>格科产品GC5005荣获电子工程专辑颁发的&ldquo;年度最佳MEMS/传感器&rdquo;</li>\r\n	<li>格科产品1300万像素图像传感器GC13003荣获中国半导体行业协会颁发的&ldquo;第十一届（2016年度）中国半导体创新产品和技术奖&rdquo;</li>\r\n	<li>获上海集成电路行业协会颁发&ldquo;上海市集成电路设计业销售前十名&rdquo;</li>\r\n</ul>\r\n', 14, 'admin', 1572833370),
(25, 2018, 0, '', '<ul>\r\n	<li>获中国半导体行业协会评为&ldquo;2017年中国十大集成电路设计企业奖&rdquo;</li>\r\n	<li>获上海集成电路行业协会颁发&ldquo;上海市集成电路设计业销售前十名&rdquo;</li>\r\n	<li>荣获2018年度知识产权海关保护联系点示范单位</li>\r\n	<li>被上海市知识产权局评为&ldquo;上海市专利工作示范企业&rdquo;</li>\r\n	<li>新认定为&ldquo;国家企业技术中心&rdquo;</li>\r\n</ul>\r\n', 14, 'admin', 1572833374),
(26, 2019, 0, '', '<ul>\r\n	<li>获选2019年度中国IC设计成就奖之十大IC中国设计公司</li>\r\n</ul>\r\n', 14, 'admin', 1572833377);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(150) DEFAULT NULL,
  `content` text NOT NULL,
  `pubdate` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keywords` varchar(150) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `background_image` varchar(150) NOT NULL,
  `author` varchar(100) NOT NULL,
  `source` varchar(150) NOT NULL,
  `source_url` varchar(150) DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` varchar(50) NOT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `added_date` int(11) NOT NULL,
  `categoryId` int(11) DEFAULT '1',
  `summary` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `subtitle`, `content`, `pubdate`, `description`, `keywords`, `dictionary_id`, `background_image`, `author`, `source`, `source_url`, `view_count`, `active`, `recommend`, `added_by`, `thumbnail`, `image_url`, `added_date`, `categoryId`, `summary`) VALUES
(1, '药政周报20190517期', NULL, '<p>先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;</p>\r\n', 1564675200, '', '', 1, '', '', '', '', 4, 1, 1, 'admin', '/uploads/images/news/n12.jpg', '', 1564736597, 13, '先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放腺癌……'),
(2, '第13届全国放射性药物与标记化合物学术交流会', NULL, '<p>先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;</p>\r\n', 1564675200, '', '', 1, '', '', '', '', 73, 1, 0, 'admin', '/uploads/images/news/n11.jpg', '', 1564736666, 13, '先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放腺癌……'),
(4, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开', NULL, '<p>世界级美术馆管理者与艺术教育者的针锋相对？&ldquo;未来的设计&rdquo;讲座成功在UPERENT召开</p>\r\n', 1569427200, '', '', 1, '', '', '', '', 1, 1, 0, 'admin', '/uploads/images/news/n13.jpg', '', 1569463379, 38, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开'),
(3, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开', NULL, '<p>世界级美术馆管理者与艺术教育者的针锋相对？&ldquo;未来的设计&rdquo;讲座成功在UPERENT召开</p>\r\n', 1569427200, '', '', 1, '', '', '', '', 3, 0, 1, 'admin', '/uploads/images/news/n13.jpg', '', 1569462752, 13, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开'),
(5, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开', NULL, '<p>世界级美术馆管理者与艺术教育者的针锋相对？&ldquo;未来的设计&rdquo;讲座成功在UPERENT召开</p>\r\n', 1569427200, '', '', 1, '', '', '', '', 21, 1, 1, 'admin', '/uploads/images/news/n12.jpg', '/uploads/news/n-d-01.jpg', 1569463418, 38, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开'),
(6, '药政周报20190517期', NULL, '<p>先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;</p>\r\n', 1569600000, '', '', 1, '', '', '', '', 1, 1, 0, 'admin', '/uploads/images/news/n13.jpg', '', 1569684252, 13, '先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放腺癌……'),
(7, '第13届全国放射性药物与标记化合物学术交流会', NULL, '<p>先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;</p>\r\n', 1569600000, '', '', 1, '', '', '', '', 20, 1, 0, 'admin', '/uploads/images/news/n11.jpg', '', 1569684262, 13, '先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放腺癌……'),
(8, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开【拷贝】', NULL, '<p>世界级美术馆管理者与艺术教育者的针锋相对？&ldquo;未来的设计&rdquo;讲座成功在UPERENT召开</p>\r\n', 1569600000, '', '', 1, '', '', '', '', 7, 1, 0, 'admin', '/uploads/images/news/n12.jpg', '', 1569684325, 38, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开'),
(9, '海水淡化', NULL, '<p>海水中含有大量盐类和多种元素，其中许多元素是人体所需要的。但海水中各种物质浓度太高，远远超过饮用水卫生标准，如果大量饮用，会导致某些元素过量进入人体，影响人体正常的生理功能，还会导致人体脱水...</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/application/appdetail1.jpg', '', 1571704598, 40, '海水中含有大量盐类和多种元素，其中许多元素是人体所需要的。但海水中各种物质浓度太高，远远超过饮用水卫生标准，如果大量饮用，会导致某些元素过量进入人体，影响人体正常的生理功能，还会导致人体脱水...'),
(10, '农村污水处理', NULL, '<p>随着我国中小城镇建设的步伐明显加快，城镇污水排放量也不断增加。我国城市污水排放量年年急剧增长，据报道大约会以年增24亿m3的速度蔓延。与此同时，我国相应的污水处理能力相对有限，远远不能适应过快增长...</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 1, 1, 0, 'admin', '/uploads/images/application/appdetail2.jpg', '', 1571704726, 40, '随着我国中小城镇建设的步伐明显加快，城镇污水排放量也不断增加。我国城市污水排放量年年急剧增长，据报道大约会以年增24亿m3的速度蔓延。与此同时，我国相应的污水处理能力相对有限，远远不能适应过快增长...'),
(11, '市政污水提标', NULL, '<p>膜技术是清洁生产、水资源再生、水循环利用的最佳手段之一，它对于有效减少污染物排放和实现污水资源化有着重要意义。三达应用MBR技术改造传统污水处理厂，应用超滤、纳滤技术提标自来水厂。三达开发适合中小...</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/application/appdetail3.jpg', '', 1571704749, 40, '膜技术是清洁生产、水资源再生、水循环利用的最佳手段之一，它对于有效减少污染物排放和实现污水资源化有着重要意义。三达应用MBR技术改造传统污水处理厂，应用超滤、纳滤技术提标自来水厂。三达开发适合中小...'),
(12, '养殖业', NULL, '<div class=\"title-se-art wow fadeInUp\">\r\n            <h3>\r\n                应用简介\r\n            </h3>\r\n        </div>\r\n        <div class=\"se wow fadeInUp\">\r\n            <p>海水中含有大量盐类和多种元素，其中许多元素是人体所需要的。但海水中各种物质浓度太高，远远超过饮用水卫生标准，如果大量饮用，会导致某些元素过量进入人体，影响人体正常的生理功能，还会导致人体脱水，严重的还会引起中毒。</p>\r\n            <p>地球表面约有70%以上为水所覆盖，其余约占地球表面30%的陆地也有水的存在。其中淡水储量为3.5×108亿m3，占总储量的2.53%。由于开发困难或技术经济的限制，到目前为止，海水、深层地下水、冰雪固态淡水等还很少被直接利用。比较容易开发利用的、与人类生活生产关系最为密切的湖泊、河流和浅层地下淡水资源，只占淡水总储量的0.34%，为104.6×104亿m3，还不到全球水总储量的万分之一，并且这部分水分布极不均匀。随着着经济的发展和人口的增加，世界用水量在逐年增加。以利用海水淡化技术向海洋取水是未来的发展趋势，而反渗透法海水淡化是现阶段的发展重心。</p>\r\n            <p>三达采用以膜技术为核心的零排放工艺，工艺采用预处理、膜集成以及蒸发结晶等多项工艺，微滤膜可以回收其中的纤维，较好的去除COD和BOD，超滤膜可以回收废水中的木质素和纸浆纤维，纳滤膜和反渗透膜用于去除废水中的盐分。 </p>\r\n        </div>\r\n        <div class=\"title-se-art wow fadeInUp\">\r\n            <h3>\r\n                工艺流程\r\n            </h3>\r\n        </div>\r\n        <div class=\"se wow fadeInUp\">\r\n            <div class=\"img-box \">\r\n                <img src=\"/assets/img/temp/app_02.jpg\" alt=\"工艺流程\">\r\n            </div>\r\n\r\n        </div>\r\n        <div class=\"title-se-art wow fadeInUp\">\r\n            <h3>\r\n                工艺应用\r\n            </h3>\r\n        </div>\r\n        <div class=\"se wow fadeInUp\">\r\n            <h4 class=\"dot-title\">\r\n                混凝沉淀\r\n            </h4>\r\n            <p>通过向水中投加混凝药剂，既可以降低原水的浊度、色度等水质的感观指标，又可以去除多种有毒有害污染物，针对浊度较高的海水使用。</p>\r\n            <h4 class=\"dot-title\">\r\n                混凝沉淀\r\n            </h4>\r\n            <p>通过向水中投加混凝药剂，既可以降低原水的浊度、色度等水质的感观指标，又可以去除多种有毒有害污染物，针对浊度较高的海水使用。</p>\r\n            <h4 class=\"dot-title\">\r\n                混凝沉淀\r\n            </h4>\r\n            <p>通过向水中投加混凝药剂，既可以降低原水的浊度、色度等水质的感观指标，又可以去除多种有毒有害污染物，针对浊度较高的海水使用。</p>\r\n            <h4 class=\"dot-title\">\r\n                混凝沉淀\r\n            </h4>\r\n            <p>通过向水中投加混凝药剂，既可以降低原水的浊度、色度等水质的感观指标，又可以去除多种有毒有害污染物，针对浊度较高的海水使用。</p>\r\n        </div>\r\n\r\n        <div class=\"title-se-art wow fadeInUp\">\r\n            <h3>\r\n                案例分析\r\n            </h3>\r\n        </div>\r\n        <div class=\"se wow fadeInUp\">\r\n            <div class=\"row\">\r\n                <div class=\"col-md-6\">\r\n                    <div class=\"case\">\r\n                        <img src=\"/assets/img/temp/app_03.jpg\" alt=\"造纸行业亚海水淡化项目\">\r\n                        <p>造纸行业亚海水淡化项目</p>\r\n                    </div>\r\n\r\n                </div>\r\n                <div class=\"col-md-6\">\r\n                    <div class=\"case\">\r\n                        <img src=\"/assets/img/temp/app_04.jpg\" alt=\"造纸行业亚海水淡化项目\">\r\n                        <p>造纸行业亚海水淡化项目</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>', 1571673600, '', '', 6, '', '', '', '', 94, 1, 0, 'admin', '/uploads/images/application/appdetail4.jpg', '/uploads/images/application/app_1.jpg', 1571704782, 40, '随着我国畜牧业的迅猛发展，养殖污水污染不断加剧，其污染防治迫在眉睫。养殖业废水属于高有机物浓度、高N、P含量和高有害微生物数量的“三高”废水。由于污水中的固体残渣主要是有机物，因此必须加强预处...'),
(13, 'Suntar三达净水机', NULL, '<p>Suntar三达净水机</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 1, 1, 0, 'admin', '', '', 1571704897, 41, 'Suntar三达净水机'),
(14, '氨基酸', NULL, '<p>氨基酸</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571704923, 42, ''),
(15, '抗生素', NULL, '<p>抗生素</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571704933, 42, ''),
(16, '维生素', NULL, '<p>维生素</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571704952, 42, ''),
(17, '有机酸', NULL, '<p>有机酸</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 1, 1, 0, 'admin', '', '', 1571704963, 42, ''),
(18, '糖及糖醇 ', NULL, '<p>糖及糖醇&nbsp;</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571704979, 43, ''),
(19, '酒及饮料', NULL, '<p>酒及饮料</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571704992, 43, ''),
(20, '电力行业', NULL, '<p>电力行业</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705029, 44, ''),
(21, '氯碱化工', NULL, '<p>氯碱化工</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705041, 44, ''),
(22, '皮革行业', NULL, '<p>皮革行业</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705054, 44, ''),
(23, '生物发酵', NULL, '<p>生物发酵</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705065, 44, ''),
(24, '石化行业', NULL, '<p>fsdfsd</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705116, 44, ''),
(25, '印染废水', NULL, '<p>fsdfsd</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705125, 44, ''),
(26, '造纸废水', NULL, '<p>fsdfsd</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705130, 44, ''),
(27, '中空纤维膜技术', NULL, '<p>中空纤维膜以具有选择渗透性的中空纤维丝为基础制成，主要用于水处理领域。三达研发的中空纤维膜材料采用以聚偏氟乙烯(PVDF)为主材及制备而成...</p>\r\n', 1571846400, '', '', 3, '/uploads/images/tech/te04.jpg', '', '', '', 3, 1, 1, 'admin', '/uploads/images/tech/tech04.jpg', '', 1571927000, 45, '中空纤维膜以具有选择渗透性的中空纤维丝为基础制成，主要用于水处理领域。三达研发的中空纤维膜材料采用以聚偏氟乙烯(PVDF)为主材及制备而成...'),
(28, '陶瓷膜技术', NULL, '<p>无机陶瓷膜具有耐高温、耐酸碱和高机械强度等多种特性，已经成为发展迅速且极具应用前景的膜材料之一。三达研发的特种分离陶瓷膜的膜层经过亲水性处理...</p>\r\n', 1571846400, '', '', 3, '/uploads/images/tech/te03.jpg', '', '', '', 1, 1, 1, 'admin', '/uploads/images/tech/tech03.jpg', '', 1571927055, 45, '无机陶瓷膜具有耐高温、耐酸碱和高机械强度等多种特性，已经成为发展迅速且极具应用前景的膜材料之一。三达研发的特种分离陶瓷膜的膜层经过亲水性处理...'),
(29, '纳滤芯技术', NULL, '<p>纳滤芯主要用于饮用水净化。我国饮用水普遍面临水源地水质污染、常规水处理工艺造成的消毒副产物污染和管网输送污染，迫切需要政府加大对饮用水水质...</p>\r\n', 1571846400, '', '', 3, '/uploads/images/tech/te02.jpg', '', '', '', 1, 1, 1, 'admin', '/uploads/images/tech/tech02.jpg', '', 1571927095, 45, '纳滤芯主要用于饮用水净化。我国饮用水普遍面临水源地水质污染、常规水处理工艺造成的消毒副产物污染和管网输送污染，迫切需要政府加大对饮用水水质...'),
(30, 'IMBR膜技术', 'IMBR TECH', '<div class=\"title-se-art wow fadeInUp\">\r\n<h3>技术介绍</h3>\r\n</div>\r\n\r\n<div class=\"se wow fadeInUp\">\r\n<p>膜生物反应器(MBR)是一种以生物处理技术和膜分离技术结合产生的新型污水处理系统。相对活性污泥法、氧化沟法等传统污水处理方法，MBR优势在于污水处理过程省去了二沉池等工艺环节，设备占地面积大幅减少，同时处理水质好、稳定，但投资运营成本较高。</p>\r\n\r\n<p>三达膜iMBR系列产品采用公司自主研发的iMBR专用配方，膜丝使用寿命和通量显著提高;膜组件采用一体化、垂直型曝气等结构创新工艺，稳定性好、能耗低、抗污染能力强。三达的iMBR成套设备已在多个污水处理项目上得到应用，产品形成了1项发明专利和4项实用新型专利，三达还参与制订了MBR技术的现行国家标准《膜生物反应器通用技术规范》(GB/T33898-2017)。</p>\r\n</div>\r\n\r\n<div class=\"title-se-art wow fadeInUp\">\r\n<h3>技术特点</h3>\r\n</div>\r\n\r\n<div class=\"se wow fadeInUp\">\r\n<div class=\"row tech\">\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>膜的高效截留作用可使出水悬浮物浓度极低</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>可以使SRT与HRT完全分开，在维持较短的HRT的同时，又可保持极长的SRT污泥产量少</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>可以维持极高的MLSS</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>膜分离课时费水中的大分子颗粒状难降解物质在反应器内停留较长的时间最终得以除去</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>可溶性大分子化合物也可以被截留下来。不会随着水流而影响出水水质最终也可以被降解</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>膜截流的高效性可以使世代时间长的如硝化菌等在生物反应器内生长因此脱氮效果较好</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"title-se-art wow fadeInUp\">\r\n<h3>应用领域</h3>\r\n</div>\r\n\r\n<div class=\"se wow fadeInUp\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"市政生活污水\" src=\"/uploads/images/tech/temp1.jpg\" />\r\n<p>市政生活污水</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"生物制药\" src=\"/uploads/images/tech/temp2.jpg\" />\r\n<p>生物制药</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"石化化工\" src=\"/uploads/images/tech/temp3.jpg\" />\r\n<p>石化化工</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"垃圾渗滤液\" src=\"/uploads/images/tech/temp4.jpg\" />\r\n<p>垃圾渗滤液</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"医院废水\" src=\"/uploads/images/tech/temp5.jpg\" />\r\n<p>医院废水</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 1571846400, '', '', 3, '/uploads/images/tech/bg01.jpg', '', '', '', 30, 1, 1, 'admin', '/uploads/images/tech/tech01.jpg', '/uploads/images/tech/img.jpg', 1571927135, 45, '膜生物反应器(MBR)是一种以生物处理技术和膜分离技术结合产生的新型污水处理系统。相对活性污泥法、氧化沟法等传统污水处理方法，MBR优势在于污水...'),
(31, 'Flow-Cel超滤膜技术', NULL, '<p>Flow-Cel超滤膜是一种以压力差为推动力、多组膜组件整合的膜分离装置，其膜片是用聚醚砜、聚酰胺等高分子材料制成的、切割分子量在1000~10000之间的复合膜。UItra―fIo超滤膜工艺过程及配套设备...</p>\r\n', 1571846400, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb2.jpg', '', 1571929791, 46, 'Flow-Cel超滤膜是一种以压力差为推动力、多组膜组件整合的膜分离装置，其膜片是用聚醚砜、聚酰胺等高分子材料制成的、切割分子量在1000~10000之间的复合膜。UItra―fIo超滤膜工艺过程及配套设备...\r\n'),
(32, '超滤膜技术', NULL, '<p>超滤采用一种多孔膜作为分离阻隔层，能根据分子形态和大小将溶液分离成各个组份，膜孔的大小决定了它的分离性能。由于超滤膜的透性结构，所以只需很低的操作压力就可使液体透过膜...</p>\r\n', 1568649600, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb4.jpg', '', 1571929859, 46, '超滤采用一种多孔膜作为分离阻隔层，能根据分子形态和大小将溶液分离成各个组份，膜孔的大小决定了它的分离性能。由于超滤膜的透性结构，所以只需很低的操作压力就可使液体透过膜...\r\n'),
(33, '反渗透膜技术', NULL, '<p>反渗透是渗透的反向迁移运动，是一种在压力驱动下，借助于半透膜的选择截留作用将溶液中的溶质与溶剂分开的分离方法。反渗透技术广泛应用于各种液体的提纯与浓缩，其中最普遍的应用实例便是在水处理工艺...</p>\r\n', 1568563200, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb3.jpg', '', 1571929893, 46, '反渗透是渗透的反向迁移运动，是一种在压力驱动下，借助于半透膜的选择截留作用将溶液中的溶质与溶剂分开的分离方法。反渗透技术广泛应用于各种液体的提纯与浓缩，其中最普遍的应用实例便是在水处理工艺...\r\n'),
(34, '连续离交', NULL, '<p>连续离子交换技术是一种完全革新的分离工艺技术，不同于传统的固定床、脉冲床、模拟移动床等工艺。连续离子交换系统由树脂柱系列和多孔分配旋转阀构成，根据工艺设计可把树脂柱系列分为几个功能区，物料进入...</p>\r\n', 1568476800, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb1.jpg', '', 1571929933, 46, '连续离子交换技术是一种完全革新的分离工艺技术，不同于传统的固定床、脉冲床、模拟移动床等工艺。连续离子交换系统由树脂柱系列和多孔分配旋转阀构成，根据工艺设计可把树脂柱系列分为几个功能区，物料进入...'),
(35, '膜生物反应器技术', NULL, '<p>MBR是将膜分离技术与生化处理技术结合的一种新型污水处理工艺，它是利用膜微孔截留的作用，将好氧或厌氧系统的活性污泥截留在反应器中，通过提高活性污泥浓度、延长泥龄，来提高COD、BOD等污染因子...</p>\r\n', 1568390400, '', '', 3, '', '', '', '', 1, 1, 0, 'admin', '/uploads/images/tech/thumb8.jpg', '', 1571929976, 46, 'MBR是将膜分离技术与生化处理技术结合的一种新型污水处理工艺，它是利用膜微孔截留的作用，将好氧或厌氧系统的活性污泥截留在反应器中，通过提高活性污泥浓度、延长泥龄，来提高COD、BOD等污染因子...'),
(36, '色谱分离', NULL, '<p>工业色谱技术是基于分子间亲和力差异的先行分离手段，是分离物理及化学性质比较相近的物质的有效方法之一。是利用了不同组分之间性质上的微小差异，使不同组分与固定相分子之间作用力差异从而导致不同组...</p>\r\n', 1568304000, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb7.jpg', '', 1571930013, 46, '工业色谱技术是基于分子间亲和力差异的先行分离手段，是分离物理及化学性质比较相近的物质的有效方法之一。是利用了不同组分之间性质上的微小差异，使不同组分与固定相分子之间作用力差异从而导致不同组...'),
(37, '微管膜技术', NULL, '<p>随着国内工业生产技术的不断升级改进，膜分离技术以期精准的分割能力,已广泛的应用于工业生产。近年来多数企业的产品脱盐浓缩在低浓度的条件下，多数采用卷式纳滤或反渗透工艺，随着膜技术应用要求的不断发展，对...</p>\r\n', 1568217600, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb6.jpg', '', 1571930048, 46, '随着国内工业生产技术的不断升级改进，膜分离技术以期精准的分割能力,已广泛的应用于工业生产。近年来多数企业的产品脱盐浓缩在低浓度的条件下，多数采用卷式纳滤或反渗透工艺，随着膜技术应用要求的不断发展，对...'),
(38, '厌氧技术', NULL, '<p>UASB Plus(UP)综合UASB、EGSB/IC反应器在制药、PTA、高浓度废水污水处理的运行工况，并结合不断改进的主工艺排水水质而开发的改进型UASB；UASB Plus(UP)反应器主要由配水系统、反应区、三相分离器...</p>\r\n', 1568131200, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb5.jpg', '', 1571930079, 46, 'UASB Plus(UP)综合UASB、EGSB/IC反应器在制药、PTA、高浓度废水污水处理的运行工况，并结合不断改进的主工艺排水水质而开发的改进型UASB；UASB Plus(UP)反应器主要由配水系统、反应区、三相分离器...\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE `article_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `thumbnail2` varchar(150) DEFAULT NULL,
  `dictionary_id` int(11) NOT NULL,
  `active` bit(1) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_categories`
--

INSERT INTO `article_categories` (`id`, `title`, `description`, `thumbnail`, `thumbnail2`, `dictionary_id`, `active`, `parent_id`, `added_date`, `importance`) VALUES
(13, '行业资讯', NULL, '/uploads/images/news/icons/icon_news_01@2x.png', '', 1, b'1', 0, 1559027615, 10),
(38, '公司新闻', NULL, '/uploads/images/news/icons/icon_news@2x.png', '', 1, b'1', 0, 1558324794, 50),
(39, '常见问题', NULL, '/uploads/images/news/icons/icon_news_02@2x.png', '', 1, b'1', 0, 1570669811, 0),
(40, '环保水处理', '', '/uploads/images/application/app2.jpg', '/uploads/images/application/home08.jpg', 6, b'1', 0, 1571702826, 0),
(41, '家用净水', '', '/uploads/images/application/app1.jpg', '/uploads/images/application/app02.jpg', 6, b'1', 0, 1571702858, 0),
(42, '生物制药', '', '/uploads/images/application/app3.jpg', '/uploads/images/application/app03.jpg', 6, b'1', 0, 1571702906, 0),
(43, '食品饮料', '', '/uploads/images/application/app5.jpg', '/uploads/images/application/app04.jpg', 6, b'1', 0, 1571702930, 0),
(44, '中水回收及零排放', '', '/uploads/images/application/app4.jpg', '/uploads/images/application/app05.jpg', 6, b'1', 0, 1571702956, 0),
(45, '主要技术', '', '', '', 3, b'1', 0, 1571926273, 0),
(46, '其它技术', 'Flow-Cel超滤膜技术、超滤膜技术、反渗透膜技术、连续离交、膜生物反应器技术、色谱分离、微管膜技术、厌氧技术。', '/uploads/images/tech/tech05.jpg', '', 3, b'1', 0, 1571926344, 0);

-- --------------------------------------------------------

--
-- Table structure for table `article_documents`
--

CREATE TABLE `article_documents` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  `file_url` varchar(150) NOT NULL,
  `importance` int(11) NOT NULL,
  `added_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_documents`
--

INSERT INTO `article_documents` (`id`, `title`, `article_id`, `file_url`, `importance`, `added_date`) VALUES
(12, '心血管介入产品', 117, '/uploads/documents/beauty_study.pdf', 0, 1561015911),
(13, '30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展', 117, '/uploads/documents/beauty_study.pdf', 0, 1561015918);

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `importance` int(11) NOT NULL,
  `link` varchar(150) NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `added_by` varchar(100) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `image_url_mobile` varchar(150) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `title`, `description`, `importance`, `link`, `position_id`, `added_by`, `image_url`, `image_url_mobile`, `active`, `created_at`, `updated_at`) VALUES
(11, '科技创新，让环保更简单1', '发 展 历 程', 0, 'http://www.baidu.com', 1, 'admin', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/banner01.jpg', 1, NULL, NULL),
(7, '科技创新，让环保更简单', '最具价值水处理国产膜品牌', 0, '', 1, 'water', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/banner01.jpg', 1, NULL, NULL),
(12, '科技创新，让环保更简单2', '发 展 历 程', 0, '', 1, 'admin', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/banner01.jpg', 1, NULL, NULL),
(13, '关于我们', 'ABOUT', 0, '', 3, 'admin', '/uploads/images/carousels/about.jpg', '', 1, NULL, NULL),
(14, '资讯中心', 'NEWS', 0, '', 5, 'admin', '/uploads/images/carousels/news.jpg', '', 1, NULL, NULL),
(15, '投资者关系', '10个字左右介绍介绍介绍介绍介绍', 0, '', 4, 'admin', '/uploads/images/carousels/invest.jpg', '', 1, NULL, NULL),
(16, '加入三达', '', 0, '', 6, 'admin', '/uploads/images/carousels/jion.jpg', '', 1, NULL, NULL),
(17, '应用领域', 'APPLICATION', 0, '', 7, 'admin', '/uploads/images/carousels/app.png', '', 1, NULL, NULL),
(18, '应用案例', '', 0, '', 9, 'admin', '/uploads/images/carousels/case.png', '', 1, NULL, NULL),
(19, '产品中心', 'PRODUCTS', 0, '', 10, 'admin', '/uploads/images/carousels/product.jpg', '', 1, NULL, NULL),
(20, '环境服务', 'ENVIRONMENT', 0, '', 11, 'admin', '/uploads/images/carousels/env.jpg', '', 1, NULL, NULL),
(21, '核心技术', 'TECHNOLOGY', 0, '', 12, 'admin', '/uploads/images/carousels/tech.jpg', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `categoryid` int(11) NOT NULL DEFAULT '1',
  `body` text NOT NULL,
  `summary` varchar(500) NOT NULL,
  `importance` int(11) NOT NULL,
  `recommend` bit(1) NOT NULL DEFAULT b'0',
  `pubdate` int(11) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `keywords` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `title`, `thumbnail`, `categoryid`, `body`, `summary`, `importance`, `recommend`, `pubdate`, `view_count`, `keywords`, `description`, `active`, `added_date`, `added_by`) VALUES
(2, '生物样本分析', '/uploads/images/cases/case4.jpg', 6, '', '本项目的水源水质变化较大，丰水期原水水质较好，枯水期原水含氯离子、铁离子浓度高，尤其是涨潮落潮时浓度变化大。根据潮涨潮落的水质变化情况，设计间歇取水，即在潭江水质较好的情况，将原水在短时间内...', 0, b'0', -28800, 4, '', '', 1, 1546612953, 'admin'),
(3, '生物样本分析', '/uploads/images/cases/case1.jpg', 3, '<p>fdsdfs</p>\r\n', 'fdsfsd', 0, b'0', -28800, 9, '', '', 1, 1546613043, 'admin'),
(4, '生物样本分析', '/uploads/images/cases/case4.jpg', 3, '<p>dfsd</p>\r\n', 'fds', 0, b'0', 1546272000, 15, '', '', 1, 1546613139, 'admin'),
(6, '生物样本分析ASGA', '/uploads/images/cases/case3.jpg', 6, '<p>sdds</p>\r\n', 'ds', 12, b'0', 1551715200, 18, '', '', 1, 1546613621, 'admin'),
(8, '生物样本分析123', '/uploads/images/cases/case2.jpg', 6, '<p>ds</p>\r\n', 'fds', 0, b'0', -28800, 2, '32', '32', 1, 1546613654, 'admin'),
(15, '生物样本分析', '/uploads/images/cases/case4.jpg', 5, '<p>xczxczx</p>\r\n', 'cxzcxz', 0, b'0', -28800, 1, '', '', 1, 1546613708, 'admin'),
(16, '生物样本分析ASGA【拷贝】', '/uploads/images/cases/case2.jpg', 5, '<p>sdds</p>\r\n', 'ds', 12, b'0', 1570896000, 43, '', '', 1, 1570933115, 'admin'),
(17, '造纸行业亚海水淡化项目', '/uploads/images/cases/case1.jpg', 3, '<p>本项目的水源水质变化较大，丰水期原水水质较好，枯水期原水含氯离子、铁离子浓度高，尤其是涨潮落潮时浓度变化大。根据潮涨潮落的水质变化情况，设计间歇取水，即在潭江水质较好的情况，将原水在短时间内（每天的取水时间约为6－8小时）取到厂内蓄水池中，蓄水池容量60000m3。</p>\r\n\r\n<p>本项目的设计规模是43000m3/天，采用&ldquo;混沉沉淀&ndash;滤池&ndash;UF&mdash;RO&rdquo; ，回收率63%－70%</p>\r\n\r\n<div class=\"table-container\">\r\n<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>项目</th>\r\n			<th>单位</th>\r\n			<th>进水</th>\r\n			<th>出水</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>COD</td>\r\n			<td>mg/L</td>\r\n			<td>&lt; 10</td>\r\n			<td>~0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>电导率</td>\r\n			<td>&mu;s/cm</td>\r\n			<td>20000</td>\r\n			<td>&lt; 400</td>\r\n		</tr>\r\n		<tr>\r\n			<td>硬度</td>\r\n			<td>mg/L</td>\r\n			<td>500</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '本项目的水源水质变化较大，丰水期原水水质较好，枯水期原水含氯离子、铁离子浓度高，尤其是涨潮落潮时浓度变化大。根据潮涨潮落的水质变化情况，设计间歇取水，即在潭江水质较好的情况，将原水在短时间内...', 0, b'0', 1570896000, 32, '', '', 1, 1570933455, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `case_categories`
--

CREATE TABLE `case_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_en` varchar(150) NOT NULL,
  `imageurl` varchar(150) NOT NULL,
  `active` bit(1) NOT NULL,
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `case_categories`
--

INSERT INTO `case_categories` (`id`, `title`, `title_en`, `imageurl`, `active`, `added_date`, `importance`) VALUES
(3, '中水回用及零排放', '', '/uploads/images/application/appdetail1.jpg', b'1', 1557113379, 0),
(4, '食品饮料', '', '/uploads/images/application/app5.jpg', b'1', 1557113406, 0),
(5, '生物制药', '', '/uploads/images/application/app3.jpg', b'1', 1557113425, 0),
(6, '环保水处理 ', '', '/uploads/images/application/app4.jpg', b'1', 1557113445, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chronicles`
--

CREATE TABLE `chronicles` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(4) DEFAULT NULL,
  `image_url` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chronicles`
--

INSERT INTO `chronicles` (`id`, `year`, `month`, `image_url`, `description`, `dictionary_id`, `added_by`, `added_date`) VALUES
(3, 2004, 4, '/uploads/images/chronicle/pz63 copy 7.png', '与海外跨国药企建立合作，共同开发中国市场\r\n', 13, 'admin', 1559012479),
(4, 2008, 2, '/uploads/images/chronicle/pz63 copy 6.png', '与海外跨国药企建立合作，共同开发中国市场', 13, 'admin', 1559012506),
(5, 2009, 3, '/uploads/images/chronicle/pz63 copy 5.png', '多个仿制产品上市，形成了研发、委托生产、销售为一体的产业链', 13, 'admin', 1559012526),
(6, 2014, 8, '/uploads/images/chronicle/pz63 copy 4.png', '与美国Navdiea公司签署Technetium (99mTc) tilmanocept产品的中国权利授权协议，Technetium (99mTc) tilmanocept是FDA此前十年批准的唯一一个99mTc标记的新药，用于实体瘤手术中的前哨淋巴结定位', 13, 'admin', 1559012547),
(7, 2016, 3, '', '并购单克隆抗体药物开发生物技术平台，成立先通生物，取得十二五重大新药创制品种CTB006全球权利', 14, 'admin', 1559577103),
(8, 2015, 10, '/uploads/chronicle/about_course_01.jpg', '全资子公司美国先通（Sinotau USA Inc.）在波士顿成立', 13, 'admin', 1560563482),
(9, 2015, 11, '/uploads/images/chronicle/pz63 copy 3.png', '投资入股加拿大Enigma公司', 13, 'admin', 1560563496),
(10, 2016, 2, '', '与加拿大Enigma公司合作，在波士顿成立美国合资公司Cerveau Technologies，Inc.公司', 14, 'admin', 1560565801),
(11, 2016, 11, '', '完成A轮1.3亿元人民币融资，深圳物明基金领投', 0, 'admin', 1564841273),
(12, 2016, 6, '', '从美国FluoroPharma Medical公司许可麻省总医院开发的核心脏诊断药物\r\nCardioPET和BFPET的中国权利', 0, 'admin', 1564841309),
(13, 2016, 12, '/uploads/images/chronicle/pz63 copy 2.png', 'Cerveau公司从美国MERCK SHARP & DOHME CORP.公司取得MK6240\r\n全球商业开发权利', 0, 'admin', 1564841334),
(14, 2017, 6, '', '完成B轮1.5亿元人民币融资，启明创投领投，公司部分员工参与定增，成为公司股东', 0, 'admin', 1564841373),
(15, 2017, 7, '', '先通医药获得专利独占许可用于制造正电子心肌灌注显像剂氟[18F]心酮注\r\n射液（MyoZone 18F] Injection）', 0, 'admin', 1564841398),
(16, 2017, 7, '', '先通医药与Cerveau Technologies，Inc.签订MK6240中国权利许可协议，\r\nMK6240是全球领先的用于阿尔兹海默症的tau蛋白诊断药物', 0, 'admin', 1564841427),
(17, 2017, 8, '', '与Piramal Imaging SA签订产品Neuraceq 中国权利许可协议，Neuraceq \r\n是用于阿尔兹海默症的Aβ淀粉样蛋白诊断药物', 0, 'admin', 1564841443),
(18, 2017, 9, '', '成立广东先通分子影像有限公司', 0, 'admin', 1564841465),
(19, 2017, 12, '/uploads/images/chronicle/pz63 copy.png', '成立江苏先通分子影像有限公司', 0, 'admin', 1564841479),
(20, 2018, 6, '', '成立先通云医药科技有限公司，开启了放射药的推广工作', 0, 'admin', 1564841497),
(21, 2018, 7, '', '取得原子高科mibi的全国推广权利', 0, 'admin', 1564841626),
(22, 2018, 9, '', '取得美国国立卫生研究院（NIH）核素治疗前列腺癌的新药全球授权', 0, 'admin', 1564841653),
(23, 2018, 12, '/uploads/images/chronicle/pz63.png', '取得美国国立卫生研究院（NIH）核素治疗前列腺癌的新药全球授权', 0, 'admin', 1564841668);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `active`, `added_date`, `importance`) VALUES
(42, '加拿大', 1, 1569830184, 0),
(43, '美国', 1, 1569830391, 0),
(44, '英国', 1, 1569830399, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dictionaries`
--

CREATE TABLE `dictionaries` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dictionaries`
--

INSERT INTO `dictionaries` (`id`, `title`, `type_id`) VALUES
(1, '新闻资讯', 1),
(2, '高管团队', 4),
(3, '核心技术', 1),
(4, '产品系列', 8),
(5, '产品配件', 8),
(6, '应用领域', 1),
(7, '社会招聘', 10),
(8, '校园招聘', 10),
(13, '发展历程', 2),
(14, '企业荣誉', 2),
(16, '应用案例', 1),
(17, '产品视频', 3),
(18, '品牌视频', 3),
(23, '《微创时代》报纸', 5),
(24, '《微创时代》杂志', 5),
(26, '相关案例', 6),
(27, '相关文档', 6),
(32, '前台主导航', 7),
(34, '上海', 9),
(40, '页底导航', 7),
(41, '合作伙伴', 11),
(43, '成都', 9),
(44, '美术', 12),
(45, '音乐', 12);

-- --------------------------------------------------------

--
-- Table structure for table `dictionary_type`
--

CREATE TABLE `dictionary_type` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dictionary_type`
--

INSERT INTO `dictionary_type` (`Id`, `Name`) VALUES
(1, '文章管理'),
(2, '荣誉资质'),
(3, '视频中心'),
(4, '管理团队'),
(5, '内刊'),
(6, '产品附件'),
(7, '导航'),
(8, '产品'),
(9, '工作城市'),
(10, '职位类别'),
(11, '链接'),
(12, '专业介绍');

-- --------------------------------------------------------

--
-- Table structure for table `distributors`
--

CREATE TABLE `distributors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `postcode` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `homepage` varchar(150) DEFAULT NULL,
  `fax` varchar(100) NOT NULL,
  `importance` int(11) NOT NULL,
  `intro` text NOT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `image_url` varchar(150) DEFAULT NULL,
  `added_date` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distributors`
--

INSERT INTO `distributors` (`id`, `name`, `postcode`, `phone`, `homepage`, `fax`, `importance`, `intro`, `thumbnail`, `image_url`, `added_date`, `added_by`, `address`, `active`) VALUES
(13, 'MicroPort CRM', '-74.475631,40.553841', '+1 (732) 624-9050', '', '美国新泽西', 27, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_03.png', '/uploads/branch/about_branch_03.jpg', 1425271071, 'wateradmin', '美国新泽西州皮斯卡塔韦市威尔路35号', 0),
(14, '上海微创心脉医疗科技股份有限公司', '114.338005,30.542371', '+86-27-59352192', '', '武汉', 26, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_04.png', '/uploads/branch/about_branch_04.jpg', 1425271175, 'wateradmin', '武汉市武昌区中南路7号中商广场写字楼B3108室', 1),
(15, '上海微创电生理医疗科技股份有限公司', '121.410713,31.212312', '+86-21-62556153', '', '上海', 25, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_05.png', '/uploads/branch/about_branch_05.jpg', 1425271203, 'wateradmin', '上海市长宁区仙霞路137号盛高国际大厦2301室', 1),
(16, '微创神通医疗科技（上海）有限公司', '116.506823,39.899829', '+86-10-52345921-811', '+86 13693083029 朱女士', '北京', 24, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_06.png', '/uploads/branch/about_branch_06.jpg', 1425271232, 'wateradmin', '北京市朝阳区广渠路11号院1号楼金泰国际大厦A座1507-1508室', 1),
(17, '苏州微创骨科学（集团）有限公司', '118.839437,31.939679', '+86-25-58707829', 'http://www.baidu.com', '南京(总部)', 23, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_02.png', '/uploads/branch/about_branch_02.jpg', 1425271263, 'wateradmin', '南京市江宁区菲尼克斯路99号', 1),
(73, 'MicroPort Orthopedics Inc.', '518000', '153 6182 8193', 'http://www.baidu.com', '153 6182 8193', 0, '<p>gdvxc</p>\r\n', '/uploads/subcompany/about_branch_logo_01.png', '/uploads/branch/about_branch_01.jpg', 1558368003, 'admin', '深圳市龙岗区坂田街道雪象社区园东工业园A栋5楼(B门上)', 1),
(74, '上海微创心通医疗科技有限公司', '534', '5435', 'http://www.baidu.com', '543', 0, '', '/uploads/subcompany/about_branch_logo_07.png', '/uploads/branch/about_branch_07.jpg', 1560519176, 'admin', 'test', 1),
(75, '上海微创生命科技有限公司', 'cxzcxz', 'cxzczx', 'http://www.baidu.com', 'cxzczx', 0, '', '/uploads/subcompany/about_branch_logo_08.png', '/uploads/branch/about_branch_08.jpg', 1560519231, 'admin', 'xczxczx', 1),
(76, '东莞科威医疗器械有限公司', '543534', '15361828193', 'http://www.baidu.com', '153 6182 8193', 0, '', '/uploads/subcompany/about_branch_logo_09.png', '/uploads/branch/about_branch_09.jpg', 1560519280, 'admin', 'fsdfds', 1),
(77, '上海微创龙脉医疗器材有限公司', 'fds', 'fds', 'http://www.baidu.com', '153 6182 8193', 0, '', '/uploads/subcompany/about_branch_logo_10.png', '/uploads/branch/about_branch_10.jpg', 1560519368, 'admin', 'dsfds', 1),
(78, '创领心律管理医疗器械（上海）有限公司', '518000', '15361828193', 'http://www.baidu.com', '153 6182 8193', 0, '', '/uploads/subcompany/about_branch_logo_11.png', '/uploads/branch/about_branch_11.jpg', 1560519448, 'admin', 'fsdfds', 1),
(79, 'MicroPort CRM【拷贝】', '-74.475631,40.553841', '+1 (732) 624-9050', '', '美国新泽西', 27, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_03.png', '/uploads/branch/about_branch_03.jpg', 1575413804, 'wateradmin', '美国新泽西州皮斯卡塔韦市威尔路35号', 0);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file_url` varchar(150) NOT NULL,
  `file_size` varchar(100) DEFAULT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `importance` int(11) NOT NULL,
  `down_count` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `title`, `description`, `file_url`, `file_size`, `thumbnail`, `importance`, `down_count`, `active`, `dictionary_id`, `added_by`, `added_date`) VALUES
(2, '2018年第32期', '微创荣获2018年度上海市质量金奖', '/uploads/documents/beauty_study.pdf', '765.64 KB', '/uploads/documents/news_magazine.jpg', 23, 9, 1, 23, 'admin', 1558973791),
(3, '2018年第31期', '', '/uploads/documents/beauty_study.pdf', '765.64 KB', '/uploads/documents/news_magazine.jpg', 24, 3, 1, 24, 'admin', 1558973914),
(5, '期刊一', '', '/uploads/documents/beauty_study.pdf', '765.64 KB', '/uploads/documents/news_magazine.jpg', 24, 0, 1, 24, 'admin', 1558973915),
(10, '2019年第2期  总第122期', '微创荣获2018年度上海市质量金奖', '/uploads/documents/beauty_study.pdf', '765.64 KB', '/uploads/documents/news_magazine.jpg', 0, 0, 1, 23, 'admin', 1558973919);

-- --------------------------------------------------------

--
-- Table structure for table `i18n`
--

CREATE TABLE `i18n` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `translation` json NOT NULL,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `importance` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `department`, `address`, `population`, `content`, `importance`, `active`, `added_date`, `added_by`) VALUES
(6, '财务人员', '社会招聘', '', 5, '<p>工作描述：</p>\r\n\r\n<p>1、负责研发产品PCBA评审，提出EMC、安规方面设计建议；</p>\r\n\r\n<p>2、负责研发阶段产品ESD、辐射、传导等EMC和安规方面的审核和提出整改方案；</p>\r\n\r\n<p>3、对新产品的产品进行EMC和安规方面的测试；</p>\r\n\r\n<p>4、负责产品CE、KC、CB、FCC、ROHS、CQC等认证工作，并就不良项进行整改或对接整改公司进行整改；</p>\r\n\r\n<p>5、负责EMC及安规资料简历及维护，测试仪器维护。</p>\r\n\r\n<p>资历：</p>\r\n\r\n<p>1、电子、自动化相关专业，大专以上学历；</p>\r\n\r\n<p>2、具备基本电路分析能力，3年以上电子产品认证测试、整改经验；</p>\r\n\r\n<p>3、熟悉电子产品的CE、KC、CB、FCC、ROHS、CQC测试；</p>\r\n\r\n<p>4、需在产品研发端对产品进行EMC、安规设计的风险评估，并能帮助研发端进行EMC、安规整改的能力；</p>\r\n\r\n<p>5、熟悉国际国内认证的流程及相关标准、法规，能处理测试和认证中的技术问题；</p>\r\n\r\n<p>6、熟悉LED灯具相关认证标准，如EN&nbsp;55032，EN301489等，有LED等具整改经验优先。</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 1, 1546517824, 'admin'),
(7, '出纳人员', '校园招聘', '', 2, '<div class=\"cont_title\">工作描述：</div>\r\n\r\n<p>1、负责研发产品PCBA评审，提出EMC、安规方面设计建议；</p>\r\n\r\n<p>2、负责研发阶段产品ESD、辐射、传导等EMC和安规方面的审核和提出整改方案；</p>\r\n\r\n<p>3、对新产品的产品进行EMC和安规方面的测试；</p>\r\n\r\n<p>4、负责产品CE、KC、CB、FCC、ROHS、CQC等认证工作，并就不良项进行整改或对接整改公司进行整改；</p>\r\n\r\n<p>5、负责EMC及安规资料简历及维护，测试仪器维护。</p>\r\n\r\n<div class=\"cont_title\">资历：</div>\r\n\r\n<p>1、电子、自动化相关专业，大专以上学历；</p>\r\n\r\n<p>2、具备基本电路分析能力，3年以上电子产品认证测试、整改经验；</p>\r\n\r\n<p>3、熟悉电子产品的CE、KC、CB、FCC、ROHS、CQC测试；</p>\r\n\r\n<p>4、需在产品研发端对产品进行EMC、安规设计的风险评估，并能帮助研发端进行EMC、安规整改的能力；</p>\r\n\r\n<p>5、熟悉国际国内认证的流程及相关标准、法规，能处理测试和认证中的技术问题；</p>\r\n\r\n<p>6、熟悉LED灯具相关认证标准，如EN&nbsp;55032，EN301489等，有LED等具整改经验优先。</p>\r\n', 0, 1, 1562077827, 'admin'),
(8, '运维技术员', '社会招聘', '', 1, '<p>工作描述：</p>\r\n\r\n<p>1、负责研发产品PCBA评审，提出EMC、安规方面设计建议；</p>\r\n\r\n<p>2、负责研发阶段产品ESD、辐射、传导等EMC和安规方面的审核和提出整改方案；</p>\r\n\r\n<p>3、对新产品的产品进行EMC和安规方面的测试；</p>\r\n\r\n<p>4、负责产品CE、KC、CB、FCC、ROHS、CQC等认证工作，并就不良项进行整改或对接整改公司进行整改；</p>\r\n\r\n<p>5、负责EMC及安规资料简历及维护，测试仪器维护。</p>\r\n\r\n<p>资历：</p>\r\n\r\n<p>1、电子、自动化相关专业，大专以上学历；</p>\r\n\r\n<p>2、具备基本电路分析能力，3年以上电子产品认证测试、整改经验；</p>\r\n\r\n<p>3、熟悉电子产品的CE、KC、CB、FCC、ROHS、CQC测试；</p>\r\n\r\n<p>4、需在产品研发端对产品进行EMC、安规设计的风险评估，并能帮助研发端进行EMC、安规整改的能力；</p>\r\n\r\n<p>5、熟悉国际国内认证的流程及相关标准、法规，能处理测试和认证中的技术问题；</p>\r\n\r\n<p>6、熟悉LED灯具相关认证标准，如EN&nbsp;55032，EN301489等，有LED等具整改经验优先。</p>\r\n', 0, 1, 1564973282, 'admin'),
(9, '新记录', '社会招聘', '', 1, '<p>工作描述：</p>\r\n\r\n<p>1、负责研发产品PCBA评审，提出EMC、安规方面设计建议；</p>\r\n\r\n<p>2、负责研发阶段产品ESD、辐射、传导等EMC和安规方面的审核和提出整改方案；</p>\r\n\r\n<p>3、对新产品的产品进行EMC和安规方面的测试；</p>\r\n\r\n<p>4、负责产品CE、KC、CB、FCC、ROHS、CQC等认证工作，并就不良项进行整改或对接整改公司进行整改；</p>\r\n\r\n<p>5、负责EMC及安规资料简历及维护，测试仪器维护。</p>\r\n\r\n<p>资历：</p>\r\n\r\n<p>1、电子、自动化相关专业，大专以上学历；</p>\r\n\r\n<p>2、具备基本电路分析能力，3年以上电子产品认证测试、整改经验；</p>\r\n\r\n<p>3、熟悉电子产品的CE、KC、CB、FCC、ROHS、CQC测试；</p>\r\n\r\n<p>4、需在产品研发端对产品进行EMC、安规设计的风险评估，并能帮助研发端进行EMC、安规整改的能力；</p>\r\n\r\n<p>5、熟悉国际国内认证的流程及相关标准、法规，能处理测试和认证中的技术问题；</p>\r\n\r\n<p>6、熟悉LED灯具相关认证标准，如EN&nbsp;55032，EN301489等，有LED等具整改经验优先。</p>\r\n', 0, 1, 1575379139, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dictionary_id` int(11) DEFAULT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `title`, `description`, `url`, `image_url`, `dictionary_id`, `importance`, `active`, `recommend`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'school-1', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:25:32', '2019-11-20 12:03:14'),
(2, 'school-2', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:30:12', '2019-11-20 12:03:07'),
(3, 'school-3', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:30:20', '2019-11-20 12:03:22'),
(4, 'school-4', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:30:26', '2019-11-20 12:02:59'),
(5, 'school-5', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:30:33', '2019-11-20 12:02:47'),
(6, 'school-6', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:30:41', '2019-11-20 12:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `dictionary_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` varchar(50) NOT NULL,
  `added_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `title`, `image_url`, `importance`, `dictionary_id`, `category_id`, `active`, `recommend`, `added_by`, `added_date`) VALUES
(1, '插画', '/uploads/majors/art_p_02.jpg', 0, 44, 13, 1, 1, 'admin', 1569767634),
(2, '平面设计', '/uploads/majors/art_p_01.jpg', 0, 44, 13, 1, 1, 'admin', 1569767749),
(3, '游戏设计', '/uploads/majors/art_p_03.jpg', 0, 44, 13, 1, 1, 'admin', 1569771614),
(4, '动画设计', '/uploads/majors/art_p_04.jpg', 0, 44, 13, 1, 1, 'admin', 1569771660),
(5, '纯艺', '/uploads/majors/art_p_05.jpg', 0, 44, 13, 1, 1, 'admin', 1569771741),
(6, '雕塑', '/uploads/majors/art_p_06.jpg', 0, 44, 13, 1, 1, 'admin', 1569771759),
(7, '装置设计', '/uploads/majors/art_p_07.jpg', 0, 44, 13, 1, 1, 'admin', 1569771772),
(8, '新媒体设计', '/uploads/majors/art_p_08.jpg', 0, 44, 13, 1, 1, 'admin', 1569771788),
(9, '工业设计', '/uploads/majors/art_p_09.jpg', 0, 44, 13, 1, 1, 'admin', 1569771797),
(10, '产品设计', '/uploads/majors/art_p_10.jpg', 0, 44, 13, 1, 1, 'admin', 1569771806),
(11, '摄影', '/uploads/majors/art_p_11.jpg', 0, 44, 13, 1, 1, 'admin', 1569771821),
(12, '影视制作', '/uploads/majors/art_p_12.jpg', 0, 44, 13, 1, 1, 'admin', 1569771835),
(13, '建筑设计', '/uploads/majors/art_p_13.jpg', 0, 44, 13, 1, 1, 'admin', 1569771848),
(14, '舞美设计', '/uploads/majors/art_p_14.jpg', 0, 44, 13, 1, 1, 'admin', 1569771873),
(15, '展示设计', '/uploads/majors/art_p_15.jpg', 0, 44, 13, 1, 1, 'admin', 1569771884),
(16, '策展', '/uploads/majors/art_p_16.jpg', 0, 44, 13, 1, 0, 'admin', 1569771901),
(17, '服装设计', '/uploads/majors/art_p_17.jpg', 0, 44, 13, 1, 0, 'admin', 1569771913),
(18, '珠宝设计', '/uploads/majors/art_p_18.jpg', 0, 44, 13, 1, 0, 'admin', 1569771924),
(19, '纺细品设计', '/uploads/majors/art_p_19.jpg', 0, 44, 13, 1, 0, 'admin', 1569771938),
(20, '交互设计', '/uploads/majors/art_p_20.jpg', 0, 44, 13, 1, 0, 'admin', 1569771949),
(21, 'CaLARTS', '/uploads/schools/school001.jpg', 0, 44, 0, 1, 0, 'admin', 1569836288);

-- --------------------------------------------------------

--
-- Table structure for table `major_categories`
--

CREATE TABLE `major_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `major_categories`
--

INSERT INTO `major_categories` (`id`, `title`, `dictionary_id`, `active`, `added_date`, `importance`) VALUES
(13, '默认分类', 44, 1, 1559027615, 10),
(38, '古典音乐类', 45, 1, 1558324794, 9),
(39, '流行音乐类', 45, 1, 1569759305, 8),
(40, '创作制作类', 45, 1, 1569759325, 7),
(41, '其他类', 45, 1, 1569759586, 0);

-- --------------------------------------------------------

--
-- Table structure for table `media_links`
--

CREATE TABLE `media_links` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `pubdate` int(11) NOT NULL,
  `topicsId` int(11) NOT NULL,
  `added_date` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `media_links`
--

INSERT INTO `media_links` (`id`, `title`, `link`, `summary`, `pubdate`, `topicsId`, `added_date`, `added_by`, `category`) VALUES
(1, 'Health New Jkb.com', 'http://tzgcms.com:8888/bbi-admin/media_add.php', 'Nanjing CR  Medicon Expands Partnership with Medidata to Accelerate Clinical Development  in China', 0, 1, 1546598237, 'admin', 'Healthcare'),
(2, '39.net', 'http://www.baidu.com', 'Nanjing CR  Medicon Expands Partnership with Medidata to Accelerate Clinical Development  in China', 6105600, 1, 1546599431, 'admin', 'Healthcare'),
(3, 'fdsfs', 'http://www.crmedresearch.com/', 'fds', 1554912000, 1, 1554988656, 'admin', 'fds');

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
(2, '2018 Medidata NEXT 中国区会议', '<p>本届&nbsp; Medidata NEXT 中国区会议聚焦开辟临床试验领域的新纪元，旨在以互动的形式为来宾提供从设计、执行、管理到见证临床开发全过程的实践机会。来自351家 Medidata 中国合作企业代表出席了本次会议，分别就临床试验数据分析，临床 IT 系统的全球监管和验证、临床试验项目的有效管理策略等话题展开讨论。</p>\r\n\r\n<p>希麦迪医药作为飞速发展的临床实验 CRO公司，以重要参展商的形式受邀出席了本次盛会。此次展会主要集中展示了公司在数据管理和统计领域取得的进展和成就，使来宾们在第一时间了解希麦迪在数据管理统计等领域的创新与展望。在此次展会中，希麦迪医药的展位吸引了与会者的极大关注，不少企业驻足聆听, 进行现场互动及业务咨询，加深了我们与企业的相互了解，为进一深入合作奠定了坚实基础。</p>\r\n\r\n<p>作为国际最大的 EDC系统提供商Medidata的认证合作伙伴，希麦迪数据统计团队规模已突破80人，拥有丰富的I-III期、BE、真实世界研究的数据管理和统计经验、丰富的中美项目经验和CDISC实施经验，团队成员完成过多个向FDA或EMA递交的注册研究的数据管理和统计分析项目。通过Medidata平台规范操作，更加夯实了希麦迪在早期和生物等效性（BE）研究领域的能力。</p>\r\n\r\n<p>此次参展有力促进了业内同仁对希麦迪医药的深入了解，展现了希麦迪精湛的技术服务能力。希麦迪也将充分利用本次参展的契机，协同各方资源，为客户提供更专业、优质、便捷的服务。在当前医药领域竞争激烈的大环境下，希麦迪人，正在以专业的技术能力和积极向上的态度，为广大客户提供高质量的解决方案。</p>\r\n', '2018-07-12 12:00:00', '涵盖临床前一站式服务，从LEADs(先导化合物)到PCCs(临床前候选化合物)，再到IND(申请临床研究批件)国内外申报', 'vers', 6, 1, 'admin', 'http://tzgcms.com:8888/uploads/meetings/m1.jpg', '南京市江宁区（成功报名后发送具体地点）', '上海美迪西生物医药股份有限公司', '《药学进展》编辑部|中国药科大学归国华侨联合会 |江苏省生物化学与分子生物学学会', 1546579061, '涵盖临床前一站式服务，从LEADs(先导化合物)到PCCs(临床前候选化合物)，再到IND(申请临床研究批件)国内外申报'),
(3, 'fsdfs', '<p>fsdf</p>\r\n', '2019-04-10 11:15:00', '', '', 0, 0, 'admin', '', 'fdsfds', 'fds', 'fds', 1554866127, 'fsd');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `url` varchar(150) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `importance` int(11) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `description`, `url`, `parent_id`, `importance`, `dictionary_id`, `active`) VALUES
(5, '奖项荣誉', NULL, '/honor', 1, 0, 32, 1),
(8, '应用领域', '', '/application', 0, 89, 32, 1),
(13, '产品系列', '', '/products', 0, 81, 32, 1),
(18, '解决方案', '', '/technology', 0, 80, 32, 1),
(39, '法律声明', '', '/law', 0, 0, 40, 1),
(40, '免责声明', '', '/disclaimer', 0, 0, 40, 1),
(41, '联系格科', '', '/contact', 0, 0, 40, 1),
(42, '快递查询', '', '/express', 0, 0, 40, 1),
(46, '关于格科', '', '/about', 0, 150, 32, 1),
(47, '新闻中心', '', '/news', 0, 0, 32, 1),
(48, '加入三达', '', '/jion', 46, 1, 32, 1),
(49, '技术支持', '', '/support', 0, 0, 32, 1),
(50, '陶瓷膜', '', '/products/detail/67', 13, 10, 32, 1),
(51, '中空纤维膜', '', '/products/detail/65', 13, 7, 32, 1),
(52, '公司新闻', '', '/news?cid=38', 47, 0, 32, 1),
(53, '行业资讯', '', '/news?cid=13', 47, 0, 32, 1),
(54, '陶瓷膜系统', '', '/technology/detail/46', 18, 13, 32, 1),
(55, '公司介绍', '', '/about', 46, 5, 32, 1),
(56, '董事长寄语', '', '/about/speech', 46, 3, 32, 1),
(66, '制药行业特种分离', '', '/application/list/42', 8, 15, 32, 1),
(67, '食品行业特种分离', '', '/application/list/43', 8, 14, 32, 1),
(68, '化工冶金特种分离', '', '/application/list/40', 8, 13, 32, 1),
(69, '膜法水处理', '', '/application/list/43', 8, 11, 32, 1),
(70, '能源行业特种分离', '', '/application/list/41', 8, 12, 32, 1),
(71, '纳滤芯', '', '/products/detail/62', 13, 6, 32, 1),
(72, '配套产品', '', '#', 13, 1, 32, 1),
(75, '卷式膜系统', '', '/technology/detail/30', 18, 12, 32, 1),
(76, 'Flow-Cel膜系统', '', '/technology/detail/29', 18, 11, 32, 1),
(77, '微管膜', '', '/technology/detail/27', 18, 10, 32, 1),
(78, '膜+N', '', '/technology/list/46', 18, 0, 32, 1),
(79, 'MBR膜系统', '', '/technology/detail/43', 18, 8, 32, 1),
(80, '中空纤维膜系统', '', '/technology/detail/44', 18, 8, 32, 1),
(81, '高压反渗透膜', '', '/technology/detail/42', 18, 7, 32, 1),
(82, '电渗析系统', '', '/technology/detail/41', 18, 6, 32, 1),
(83, '三达膜箱', '', '/technology/detail/40', 18, 5, 32, 1),
(84, '连续离子交换和色谱', '', '/technology/detail/45', 18, 9, 32, 1),
(85, '典型案例', '', '/application/cases', 8, 0, 32, 1),
(91, '首页', '', '/', 0, 180, 32, 1),
(92, '核心技术', '', '/about/technology', 46, 2, 32, 1),
(113, '生物发酵', '', '/application/detail/23', 69, 0, 32, 1),
(115, '印染行业', '', '/application/detail/25', 69, 0, 32, 1),
(116, '造纸行业', '', '/application/detail/26', 69, 0, 32, 1),
(117, '皮革行业', '', '/application/detail/22', 69, 0, 32, 1),
(118, '有色冶金', '', '/application/detail/21', 69, 0, 32, 1),
(119, '钢铁行业', '', '/application/detail/20', 69, 0, 32, 1),
(120, '海水淡化', '', '/application/detail/58', 69, 0, 32, 1),
(121, '电力行业', '', '/application/detail/59', 69, 0, 32, 1),
(122, '畜牧行业', '', '/application/detail/60', 69, 0, 32, 1),
(123, '市政供水', '', '/application/detail/61', 69, 0, 32, 1),
(124, '市政污水', '', '/application/detail/62', 69, 0, 32, 1),
(125, '煤化工', '', '/application/detail/63', 69, 0, 32, 1),
(127, 'iMBR', '', '/products/detail/66', 13, 8, 32, 1),
(128, '家用净水', '', '/products/detail/68', 13, 1, 32, 1),
(129, '卷式膜', '', '/products/detail/58', 13, 5, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus_temp`
--

CREATE TABLE `menus_temp` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `url` varchar(150) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `importance` int(11) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus_temp`
--

INSERT INTO `menus_temp` (`id`, `title`, `description`, `url`, `parent_id`, `importance`, `dictionary_id`, `active`) VALUES
(5, '奖项荣誉', NULL, '/honor', 1, 0, 32, 1),
(8, '应用领域', '', '/application', 0, 99, 32, 1),
(13, '产品中心', '', '/products', 0, 20, 32, 1),
(18, '核心技术', '', '/technology', 0, 0, 32, 1),
(28, '环境服务', '', '/environmental', 0, 10, 32, 1),
(39, '关于我们', NULL, '/about', 0, 0, 40, 1),
(40, '研发与产品管线', NULL, 'products', 0, 0, 40, 1),
(41, '核医学', NULL, '/nuclear_medicine', 0, 0, 40, 1),
(42, '新闻中心', NULL, '/news', 0, 0, 40, 1),
(43, '职业发展', NULL, '/career', 0, 0, 40, 1),
(44, '联系我们', NULL, '/contact', 0, 0, 40, 1),
(46, '关于三达', '', '/about', 0, 150, 32, 1),
(47, '资讯中心', '', '/news', 0, 0, 32, 1),
(48, '加入三达', '', '/jion', 46, 0, 32, 1),
(49, '投资者关系', '', '/investor', 0, 0, 32, 1),
(50, '膜材料', '', '/products#cateid2', 13, 0, 32, 1),
(51, '膜应用', '', '/products#cateid3', 13, 0, 32, 1),
(52, '公司新闻', '', '/news?cid=38', 47, 0, 32, 1),
(53, '行业资讯', '', '/news?cid=13', 47, 0, 32, 1),
(54, 'IMBR膜技术', '', '/technology/detail/30', 18, 0, 32, 1),
(55, '公司介绍', '', '/about', 46, 0, 32, 1),
(56, '董事长寄语', '', '/about/speech', 46, 0, 32, 1),
(57, '发展历程', '', '/about/chronicle', 46, 0, 32, 1),
(58, '企业文化', '', '/about/culture', 46, 0, 32, 1),
(59, '荣誉资质', '', '/about/honors', 46, 0, 32, 1),
(60, '研发实力', '', '/about/strength', 46, 0, 32, 1),
(61, '交易所公告', '', '/investor', 49, 0, 32, 1),
(62, '投资者关系联系方式', '', '/investor/contact', 49, 0, 32, 1),
(63, '联系我们', '', '/jion', 48, 0, 32, 1),
(64, '社会招聘', '', '/jion/recruitment1', 48, 0, 32, 1),
(65, '校园招聘', '', '/jion/recruitment2', 48, 0, 32, 1),
(66, '环保水处理', '', '/application/list/40', 8, 0, 32, 1),
(67, '家用净水', '', '/application/list/41', 8, 0, 32, 1),
(68, '生物制药', '', '/application/list/42', 8, 0, 32, 1),
(69, '食品饮料', '', '/application/list/43', 8, 0, 32, 1),
(70, '中水回收及零排放', '', '/application/list/44', 8, 0, 32, 1),
(71, '膜设备', '', '/products#cateid4', 13, 0, 32, 1),
(72, '清洗剂', '', '/products#cateid5', 13, 0, 32, 1),
(73, '水务运营', '', '/environmental/operation', 28, 0, 32, 1),
(74, '环境工程', '', '/environmental', 28, 2, 32, 1),
(75, ' 纳滤芯技术', '', '/technology/detail/29', 18, 0, 32, 1),
(76, '陶瓷膜技术', '', '/technology/detail/28', 18, 0, 32, 1),
(77, '中空纤维膜技术', '', '/technology/detail/27', 18, 0, 32, 1),
(78, '其他技术', '', '/technology/list/46', 18, 0, 32, 1),
(79, '首页', '', '/', 0, 160, 32, 1),
(80, '核心技术', '', '/about/technology', 46, 0, 32, 1),
(81, '污水提标', '', '/environmental/sewage', 28, 0, 32, 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `schools` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scholarship` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dictionary_id` int(11) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `schools`, `scholarship`, `thumbnail`, `image_url`, `dictionary_id`, `importance`, `active`, `recommend`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Chen同学', 'Art Center、SAIC、CCA... ', '6万1千美金', '/uploads/images/offers/offer01_03.jpg', '/uploads/images/offers/off_03.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 02:13:41', '2019-10-02 08:03:44'),
(2, 'Luo同学', 'Pratt、Calarts、SAIC... ', '36万8千美金', '/uploads/images/offers/offer01_05.jpg', '/uploads/images/offers/off_05.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:33:08', '2019-10-02 08:03:45'),
(3, 'Chen同学', 'FALMOUTH', '', '/uploads/images/offers/offer01_07.jpg', '/uploads/images/offers/off_07.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:33:45', '2019-10-02 08:03:46'),
(4, 'lv同学', 'FALMOUTH', '', '/uploads/images/offers/offer01_09.jpg', '/uploads/images/offers/off_09.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:34:17', '2019-10-02 08:03:48'),
(5, 'Wei同学', 'CSVPA、SAIC、CCA...', '', '/uploads/images/offers/offer01_16.jpg', '/uploads/images/offers/offer_03.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:34:48', '2019-10-02 08:03:49'),
(6, 'Wu同学', 'RISD、SCIA、Pratt... ', '15万2千美金', '/uploads/images/offers/offer01_17.jpg', '/uploads/images/offers/offer_05.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:36:04', '2019-10-02 08:03:50'),
(7, 'Yuan同学 ', 'UCA', '', '/uploads/images/offers/offer01_19.jpg', '/uploads/images/offers/offer_07.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:36:35', '2019-10-02 08:03:53'),
(8, 'Zhang同学 ', 'MICA、SAIC...', '', '/uploads/images/offers/offer01_20.jpg', '/uploads/images/offers/offer_09.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:36:58', '2019-10-02 08:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `config_name` varchar(100) NOT NULL,
  `config_values` json NOT NULL,
  `added_date` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`config_name`, `config_values`, `added_date`, `added_by`) VALUES
('site_info', '{\"qq\": \"13212847\", \"logo\": \"/uploads/images/logo.png\", \"email\": \"admin828@163.com\", \"logo2\": \"/uploads/images/logo_color.png\", \"phone\": \"0592-6778100\", \"theme\": \"black\", \"weibo\": \"https://weibo.com/p/1006062456896294\", \"qrcode\": \"/uploads/images/qrcode.jpg\", \"wechat\": \"upercent\", \"address\": \"深圳市龙岗区布吉街道龙岗大道龙岗大道1188-88号\", \"company\": \"格科微电子（上海）有限公司\", \"hremail\": \"hr@nanlite.com\", \"hrphone\": \"0754-85350187\", \"hotPhone\": \"400-669-8080\", \"keywords\": \"测试\", \"sitename\": \"格科微电子\", \"hrcontact\": \"余小姐\", \"webnumber\": \"沪ICP备12006582号-1\", \"description\": \"专业的企业网建设开发\", \"email_contact\": \"\", \"enableCaching\": \"0\"}', 1564633059, 'admin'),
('smtp', '{\"host\": \"smtp.qq.com\", \"port\": \"465\", \"password\": \"xcpzxryvkyegbiag\", \"username\": \"13212847@qq.com\", \"SMTPSecure\": \"1\"}', 1559273651, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `content` text,
  `background_image` varchar(150) DEFAULT NULL,
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

INSERT INTO `pages` (`id`, `title`, `alias`, `importance`, `content`, `background_image`, `view_count`, `active`, `added_by`, `added_date`, `keywords`, `description`) VALUES
(52, '关于格科', 'about', 0, '<h1 class=\"title\">BRIEF INTRODUCTION OF GALAXYCORE</h1>\r\n\r\n<h2 class=\"title-sub\">中国领先的图像传感器芯片设计公司</h2>\r\n\r\n<p>格科微电子（上海）有限公司创立于2003年，是中国领先的图像传感器芯片设计公司，目标瞄准全球移动设备及消费电子市场。</p>\r\n\r\n<p>我们设计、开发及销售具成本优势的高质量CMOS图像传感器芯片，该芯片可采集光学图像并转换成数字图像输出信号。我们的图像传感器主要用于功能手机、智能手机及平板计算机等移动终端。我们亦设计、开发及销售LCD驱动芯片，该装置可驱动LCD面板将图像数据显示于屏幕上。</p>\r\n\r\n<p>我们的核心实力是创新设计能力、高效及灵活的制造工序以及和供货商(例如代工厂及封装厂)、CMOS摄像模块制造商、LCD模块制造商、终端设备制造商及设计公司等业界参与者建立关系。</p>\r\n\r\n<p>我们对未来的增长信心十足，不断提升整体竞争力，巩固图像传感器行业以及LCD驱动行业的领先地位。</p>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/about_01.jpg\" /></figure>\r\n', '', 42, 1, 'admin', 1577955104, '', ''),
(50, '污水提标', 'sewage', 0, '<div class=\"page page-env \">\r\n<div class=\"container\">\r\n建设中...\r\n</div>\r\n</div>\r\n', '', 2, 1, 'admin', 1573109893, '', ''),
(51, '核心技术', 'technology', 0, '<div class=\"page\">\r\n<div class=\"container\">编辑内容</div>\r\n</div>\r\n', '', 1, 1, 'admin', 1574264681, '', ''),
(42, '招聘联系方式与员工福利', 'recruitment', 0, ' <div class=\"welfare\">\r\n                <h3 class=\"title\">\r\n                    联系方式\r\n                </h3>\r\n                <hr>\r\n                <dl>\r\n                    <dt>简历投递\r\n                    </dt>\r\n                    <dd>请有意者将个人简历以电子邮件方式发送至hr@suntar.com，主题请注明应聘岗位，简历以附件上传。\r\n                    </dd>\r\n                    <dt>招聘热线\r\n                    </dt>\r\n                    <dd>18030078191 0592-6778170 陈小姐</dd>\r\n                </dl>\r\n\r\n                <h3 class=\"title\">\r\n                    员工福利\r\n                </h3>\r\n                <hr>\r\n                <p>公司将为每一位三达人提供丰厚的福利，心动的话就投简历来吧~</p>\r\n                <dl>\r\n                    <dt>刚性福利\r\n\r\n                    </dt>\r\n                    <dd>五险+商业险、住房公积金、带薪年假、通讯补贴、双休、免费通勤车\r\n\r\n                    </dd>\r\n                    <dt>柔性福利\r\n\r\n                    </dt>\r\n                    <dd>补贴式工作餐、婚育等礼金、婚育丧假期、考试假、提升培训、全勤奖\r\n                    </dd>\r\n                    <dt>特别福利\r\n                    </dt>\r\n                    <dd>年度体检、年度旅游、中秋博饼、“三八”妇女节活动、绩效奖金、年终表彰会、每周1小时运动时间、健身房/篮球场/网球场/图书室</dd>\r\n                </dl>\r\n            </div>', '', 14, 1, 'admin', 1560917298, '', ''),
(43, '膜法水处理', 'environmental', 92, '<div class=\"page page-env container\">\r\n<p>膜技术是清洁生产、水资源再生、水循环利用的最佳手段之一，它对于有效减少污染物排放和实现污水资源化有着重要意义。三达应用MBR技术改造传统污水处理厂，应用超滤、纳滤技术提标自来水厂。</p>\r\n\r\n<p>三达开发适合中小城镇的污水处理技术具有巨大的市场前景。目前公司采用的污水处理技术类型主要有以下几种:AO+MBR膜工艺、外置式超滤膜+臭氧工艺、卡鲁塞尔氧化沟、CASS工艺和AAO生化池等技术。</p>\r\n\r\n<div class=\"row no-gutters\">\r\n<div class=\"col-6 col-md-4 col-lg\">\r\n<div class=\"c1\">\r\n<p>AO+MBR<br />\r\n膜工艺</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg\">\r\n<div class=\"c1\">\r\n<p>外置式超滤膜<br />\r\n+臭氧工艺</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg\">\r\n<div class=\"c1\">\r\n<p>卡鲁塞尔<br />\r\n氧化沟</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg\">\r\n<div class=\"c1\">\r\n<p>CASS工艺</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg\">\r\n<div class=\"c1\">\r\n<p>AAO生化池</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"item item-1\">\r\n<h3 class=\"title\">供水净化</h3>\r\n\r\n<p>以纳滤膜为核心的自来水厂升级改造工艺，可适用于处理重金属、化学成分(农药、抗生素等)超标的极端情况，可以确保去除水中的各项小分子污染物。该项目技术适合用于应急水处理，以及北方高铁锰地下水的处理。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"item item-2\">\r\n<h3 class=\"title\">提标改造</h3>\r\n\r\n<p>三达自主研发的超滤组件、MBR组件应用于污水处理厂提标改造从一级B 提高到一级A 、地表水IV类以及中水回用工程。</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"title title-list\">\r\n<h3>应用案例</h3>\r\n</div>\r\n\r\n<div class=\"project\">\r\n<div class=\"row no-gutters align-items-center\">\r\n<div class=\"col-lg-6\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/env03.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg-6\">\r\n<div class=\"des\">\r\n<h3 class=\"title-1\">山西省清徐县自来水厂纳滤膜法水处理项目</h3>\r\n\r\n<p>本项目针对铁锰和硫酸盐超标的深井地下水，采用除锰过滤及纳滤膜工艺。应用纳滤膜对水中的多价离子进行脱除，同时保留了水中的有益矿物质元素，充分发挥了纳滤膜选择性透过的优势。该项目的实施有效保障了城市供水安全，大幅提升了城市居民的用水质量，为国内首创将纳滤技术成功应用于市政供水领域。</p>\r\n\r\n<p>处理水量：30000m&sup3;/d</p>\r\n\r\n<div class=\"table-container\">\r\n<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th class=\"text-center\">支撑体</th>\r\n			<th>单位</th>\r\n			<th>进水</th>\r\n			<th>出水</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>PH</td>\r\n			<td>&nbsp;</td>\r\n			<td>7.61</td>\r\n			<td>6.5～8.5</td>\r\n		</tr>\r\n		<tr>\r\n			<td>总硬度</td>\r\n			<td>mg/L CaCO3</td>\r\n			<td>652</td>\r\n			<td>&lt;100</td>\r\n		</tr>\r\n		<tr>\r\n			<td>锰</td>\r\n			<td>mg/L</td>\r\n			<td>0.27</td>\r\n			<td>&lt;0.1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>硫酸盐</td>\r\n			<td>mg/L</td>\r\n			<td>597.7</td>\r\n			<td>&le;80</td>\r\n		</tr>\r\n		<tr>\r\n			<td>溶解性总固体</td>\r\n			<td>mg/L</td>\r\n			<td>1078</td>\r\n			<td>&le;500</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"project\">\r\n<div class=\"row no-gutters align-items-center\">\r\n<div class=\"col-lg-6\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/env04.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg-6\">\r\n<div class=\"des\">\r\n<h3 class=\"title-1\">山东省西王集团自来水厂双膜法水处理项目</h3>\r\n\r\n<p>本项目针对重污染，多泥沙的黄河水，采用混凝沉淀及多介质过滤工艺，降低原水浊度，通过超滤膜技术深度处理后进入反渗透系统脱盐，产水直接作为生产工艺用水使用。</p>\r\n\r\n<p>处理水量：16000 m&sup3;/d</p>\r\n\r\n<div class=\"table-container\">\r\n<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th class=\"text-center\">支撑体</th>\r\n			<th>单位</th>\r\n			<th>进水</th>\r\n			<th>出水</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>悬浮物</td>\r\n			<td>mg/L</td>\r\n			<td>23.6</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>溶解固形物</td>\r\n			<td>mg/L</td>\r\n			<td>549</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>全硬度</td>\r\n			<td>mg/L</td>\r\n			<td>262</td>\r\n			<td>450</td>\r\n		</tr>\r\n		<tr>\r\n			<td>电导率（25℃）</td>\r\n			<td>&mu;s/cm</td>\r\n			<td>1215</td>\r\n			<td>&lt; 100</td>\r\n		</tr>\r\n		<tr>\r\n			<td>硝酸根离子</td>\r\n			<td>mg/L</td>\r\n			<td>39.79</td>\r\n			<td>&lt; 10</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"project\">\r\n<div class=\"row no-gutters align-items-center\">\r\n<div class=\"col-lg-6\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/env05.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg-6\">\r\n<div class=\"des\">\r\n<h3 class=\"title-1\">吉林省公主岭自来水厂超滤膜水处理项目</h3>\r\n\r\n<p>本项目针对地表水受季节影响，浊度及微生物指标变化大的特点，采用超滤膜过滤技术对原自来水处理系统进行升级改造，提高了产水水质，保证饮用水的微生物安全性。该项目的实施在城市自来水厂升级改造、提高城市居民用水质量、解决日益突出的生活水源恶化、污染方面有重大意义。</p>\r\n\r\n<p>处理水量：50000 m&sup3;/d</p>\r\n\r\n<div class=\"table-container\">\r\n<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th class=\"text-center\">支撑体</th>\r\n			<th>单位</th>\r\n			<th>进水</th>\r\n			<th>出水</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>色度</td>\r\n			<td>度</td>\r\n			<td>20</td>\r\n			<td>5</td>\r\n		</tr>\r\n		<tr>\r\n			<td>浑浊度</td>\r\n			<td>NTU</td>\r\n			<td>5-600</td>\r\n			<td>1</td>\r\n		</tr>\r\n		<tr>\r\n			<td>细菌总数</td>\r\n			<td>个/ml</td>\r\n			<td>70</td>\r\n			<td>0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>大肠菌群</td>\r\n			<td>个/l</td>\r\n			<td>11</td>\r\n			<td>未检出</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', 170, 1, 'admin', 1560917839, '', ''),
(44, '投资者关系联系方式', 'investor_contact', 93, '    <div class=\"container page\">\r\n        <dl>\r\n            <dd>负责信息披露和投资者关系的部门：证券投资部</dd>\r\n            <dd>联系人：戴晓星</dd>\r\n            <dd>电 话：0592-6778016</dd>\r\n            <dd>传 真：0592-6778200</dd>\r\n            <dd>电子邮箱：IR@suntar.com</dd>   \r\n        </dl> \r\n    </div>', '', 15, 1, 'admin', 1560918066, '', ''),
(45, '投资者公告', 'investor', 94, '<div class=\"container page\">\r\n    <h1>暂无内容</h1>\r\n    <p>暂无内容</p>\r\n</div>', '', 33, 1, 'admin', 1560918360, '', ''),
(46, '企业文化', 'culture', 98, '<div class=\"page page-culture container\">\r\n<div class=\"row\">\r\n<div class=\"col-md\">\r\n<div class=\"item\">\r\n<div class=\"icon\"><img alt=\"愿景\" src=\"/assets/img/about_10.png\" /></div>\r\n\r\n<h3>愿景</h3>\r\n\r\n<p>成为应用先进膜技术发展环保水务、清洁生产与循环经济的全球领先企业</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"item\">\r\n<div class=\"icon\"><img alt=\"使命\" src=\"/assets/img/about_09.png\" /></div>\r\n\r\n<h3>使命</h3>\r\n\r\n<p>开发水技术，解决水问题科普水知识，弘扬水文化</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"item\">\r\n<div class=\"icon\"><img alt=\"理念\" src=\"/assets/img/about_08.png\" /></div>\r\n\r\n<h3>理念</h3>\r\n\r\n<p>与股东、员工、合作伙伴共创价值、共享成果、共谋发展</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"photos\">\r\n<header class=\"title title-photo\">\r\n<h3>员工风采</h3>\r\n</header>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md\"><img alt=\"员工风采\" src=\"/assets/img/about_11.jpg\" /></div>\r\n\r\n<div class=\"col-md\"><img alt=\"员工风采\" src=\"/assets/img/about_12.jpg\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', 38, 1, 'admin', 1560918560, '', ''),
(47, '研发实力', 'strength', 99, ' <div class=\"page page-strength\">\r\n        <div class=\"container \">\r\n            <h1 class=\"title title-v2\">研发实力</h1>\r\n            <p class=\"wow slideInUp\">三达膜科技拥有博士后科研工作站和福建省膜分离工程技术研究中心，公司的研发团队研发水平高、实践经验丰富。</p>\r\n\r\n            <p class=\"wow slideInUp\">博士后科研工作分站于2002年10月成立，致力于探索和研究膜分离技术、新型膜材料开发、移动床分离技术、膜生物反应器、膜污染、环保水处理等技术与产品开发。福建省膜分离工程技术中心是以三达膜科技为依托，组建了一支高层次、多学科结合的科技队伍。截至目前，中心完成的工艺开发大部分成功应用到制药、食品、化工、染料、冶金、水处理等领域。</p>\r\n\r\n            <div class=\"row wow slideInUp text-center\">\r\n                <div class=\"col-md\"><img src=\"/assets/img/about_04.jpg\" /></div>\r\n\r\n                <div class=\"col-md\"><img src=\"/assets/img/about_05.jpg\" /></div>\r\n\r\n                <div class=\"col-md\"><img src=\"/assets/img/about_06.png\" /></div>\r\n\r\n                <div class=\"col-md\"><img src=\"/assets/img/about_07.jpg\" /></div>\r\n            </div>\r\n        </div>\r\n    </div>', '', 26, 1, 'admin', 1560918812, '', ''),
(48, '董事长寄语', 'speech', 121, '<div class=\"page page-speech\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-9\">\r\n<div class=\"box\">\r\n<div class=\"row align-items-center profile\">\r\n<div class=\"col-auto\">\r\n<div class=\"avatar\"><img alt=\"董事长\" src=\"/assets/img/about_03.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col\">\r\n<h1 class=\"title-v2\">董事长寄语</h1>\r\n\r\n<p class=\"des\">成为应用先进膜技术发展环保水务、清洁生产与循环经济的全球领先企业</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"intro\">\r\n<p>三达膜环境技术股份有限公司（以下简称&ldquo;三达膜&rdquo;或&ldquo;公司&rdquo;）是国内知名的以膜技术应用为核心的工业分离纯化和膜法水处理综合解决方案提供商和水务投资运营商。</p>\r\n\r\n<p>在膜技术应用领域，三达膜能够根据客户的差异化需求提供综合解决方案：工业分离业务方面，主要帮助食品饮料、医药、生物发酵、化工、石化等行业客户，提高产品质量，降低生产成本，减少废物排放。在膜法水处理业务方面，公司应用膜技术为市政、工业、家庭用户提供供水净化、废水处理、中水回用等综合解决方案。</p>\r\n\r\n<p>在水务投资运营领域，公司通过BOT、TOT和委托运营方式在全国范围内多个地区投资和运营市政污水处理厂。</p>\r\n\r\n<p>三达膜科技（厦门）有限公司（以下简称&ldquo;三达膜科技&rdquo;）创建于1996年，是三达膜环境技术股份有限公司全资子公司。专业为生物、化工、制药、食品饮料等行业提供过滤及纯化综合解决方案，以及为工业、市政、民用环保等领域提供水处理解决方案，满足不同客户的高度差异化需求。业务领域集膜软件开发、工程设计、设备制造、系统集成、现场安装与售后服务为一体。</p>\r\n\r\n<p>三达膜科技经过多年的研究与实践，成功开发出一系列膜应用技术与工艺，帮助客户进行生产工艺的上下游技术整合与创新，实现清洁生产、节能环保。三达膜科技作为中国过滤纯化的知名企业，为客户承担分离提纯工艺的关键技术。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', 108, 1, 'admin', 1560919065, '', ''),
(49, '水务运营', 'operation', 0, '<div class=\"page page-env container\">\r\n        <p>三达旗下拥有国家人事部授予博士后科研工作站和福建省膜分离工 程研究中心，拥有各种膜分离与废水处理实验仪器及设备，并长期与国内 外多所知名高校与科研院所合作，从事各种新型水处理技术研究，可为客户提供“供水-污水-中水”的整体解决方案。</p>\r\n        <p>公司通过自主创新和持续技术积累，已掌握多项基础性市政水处理技术，所建设的污水厂主要应用的二级生物处理工艺有：AO+MBR膜工艺、外置式超滤膜+臭氧工艺、卡鲁塞尔氧化沟、CASS工艺和AAO工艺等技术，这些技术在公司运营的污水处理厂中得到了充分的利用。</p>\r\n\r\n\r\n        <div class=\"title title-list\">\r\n            <h3>商务模式</h3>\r\n        </div>\r\n\r\n        <p>三达经营模式灵活多样，可以根据用户的要求及实际情况制定不同的经营模式。主要有EPC、 BOT、BT及TOT等多种方式。</p>\r\n\r\n        <div class=\"row\">\r\n            <div class=\"col-lg-6\">\r\n                <div class=\"card\">\r\n                    <div class=\"card-header\">\r\n                        <div class=\"row align-items-center\">\r\n                            <div class=\"col\">\r\n                                <h3>BOT</h3>\r\n                            </div>\r\n                            <div class=\"col-auto\">建设-经营-移交</div>\r\n                        </div>\r\n                    </div>\r\n                    <div class=\"card-body\">\r\n                        <h4>出资方式：</h4>\r\n                        <p>由三达全额投资</p>\r\n                        <h4>责任：</h4>\r\n                        <ol>\r\n                            <li>工艺设计：由三达负责工艺设计及施工建设工作</li>\r\n                            <li>管理及运营：由三达负责日常管理及运营，并收取一定的运营费用</li>\r\n                            <li>项目移交：特许经营期满后，三达将项目无偿移交给地方政府/业主</li>\r\n                        </ol>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-lg-6\">\r\n                <div class=\"card\">\r\n                    <div class=\"card-header\">\r\n                        <div class=\"row align-items-center\">\r\n                            <div class=\"col\">\r\n                                <h3>TOT</h3>\r\n                            </div>\r\n                            <div class=\"col-auto\">移交-经营-移交</div>\r\n                        </div>\r\n                    </div>\r\n                    <div class=\"card-body\">\r\n                        <h4>出资方式：</h4>\r\n                        <p>由三达采取收购特许经营权方式，并全额投资</p>\r\n                        <h4>责任：</h4>\r\n                        <ol>\r\n                            <li>工艺设计：由三达根据实际运营情况，优化或改进工艺设计\r\n                            </li>\r\n                            <li>维护及改造：三达负责对设施等进行维护改造\r\n                            </li>\r\n                            <li>管理及运营：由三达负责日常管理及运营，并收取一定的运营费用\r\n                            </li>\r\n                            <li>项目移交：在双方约定的特许经营期结束后，三达讲项目无偿移交给当地政\r\n                                府/业主</li>\r\n                        </ol>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-lg-6\">\r\n                <div class=\"card\">\r\n                    <div class=\"card-header\">\r\n                        <div class=\"row align-items-center\">\r\n                            <div class=\"col\">\r\n                                <h3>EPC</h3>\r\n                            </div>\r\n                            <div class=\"col-auto\">工程总承包</div>\r\n                        </div>\r\n                    </div>\r\n                    <div class=\"card-body\">\r\n                        <h4>出资方式：</h4>\r\n                        <p>由政府/业主全额投资</p>\r\n                        <h4>责任：</h4>\r\n                        <ol>\r\n                            <li>工艺设计：采用三达的技术，由三达进行工艺设计</li>\r\n                            <li>施工建设：政府/业主对三达提供的设计方案进行会审，通过后由三达全权负责工程建设（包括土建、设备采购、及安装、绿化等）</li>\r\n                            <li>工程调试：工程建设竣工后，由三达进行调试，保证达到合同规定的标准</li>\r\n                            <li>技术培训：由三达专家对项目操作人员进行业务技能培训</li>\r\n                            <li>工程移交：政府/业主组织项目验收，三达将工程项目全部移交给政府/业主</li>\r\n                        </ol>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-lg-6\">\r\n                <div class=\"card\">\r\n                    <div class=\"card-header\">\r\n                        <div class=\"row align-items-center\">\r\n                            <div class=\"col\">\r\n                                <h3>委托运营</h3>\r\n                            </div>\r\n\r\n                        </div>\r\n                    </div>\r\n                    <div class=\"card-body\">\r\n                        <h4>出资方式：</h4>\r\n                        <p>由政府/业主将已建成的项目委托于三达，由三达进行专业化运营</p>\r\n                        <h4>责任：</h4>\r\n                        <ol>\r\n                            <li>项目维护：由三达负责对项目设施进行维护\r\n                            </li>\r\n                            <li>管理及运营：由三达负责项目日常管理及运营，并收取运营费用，保证项目稳定运营\r\n                            </li>\r\n                            <li>项目移交：在双方约定的委托运营期结束后，三达讲项目无偿归还给政府/业主\r\n                            </li>\r\n\r\n                        </ol>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n        <div class=\"title title-list\">\r\n            <h3>市政水务项目</h3>\r\n        </div>\r\n        <!-- 暂缺地图 -->\r\n        <div class=\"row\">\r\n            <div class=\"col-md-6\">\r\n                <div class=\"project-v1\">\r\n                    <div class=\"pic\">\r\n                        <img src=\"/assets/img/env06.jpg\" alt=\"四平：四平市污水处理厂\">\r\n                    </div>\r\n                    <div class=\"txt\">\r\n                        <h3 class=\"title\">四平：四平市污水处理厂</h3>\r\n                        <p>吉林省四平市污水处理厂设计总处理规模日处理污水18万立方米，主体采用A/O 处理工艺。项目于2001 年开工建设，2003 年完工。2006 年由我公司以TOT模式投资运营，经改造调试后，该厂运营稳定，出水达到设计标准，对四平市水环境的改善起到了重要作用。</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-md-6\">\r\n                <div class=\"project-v1\">\r\n                    <div class=\"pic\">\r\n                        <img src=\"/assets/img/env07.jpg\" alt=\"吉安：骡子山污水处理厂\">\r\n                    </div>\r\n                    <div class=\"txt\">\r\n                        <h3 class=\"title\">许昌：许昌县污水处理厂</h3>\r\n                        <p>许昌县污水处理厂设计总规模日处理污水4万立方米，采用氧化沟+深度处理工艺。项目以BOT模式建设运营,于2009年建设投产。</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-md-6\">\r\n                <div class=\"project-v1\">\r\n                    <div class=\"pic\">\r\n                        <img src=\"/assets/img/env08.jpg\" alt=\"吉安：骡子山污水处理厂\">\r\n                    </div>\r\n                    <div class=\"txt\">\r\n                        <h3 class=\"title\">吉安：骡子山污水处理厂</h3>\r\n                        <p>吉安市螺子山污水处理厂设计总规模日处理污水8万立方米，采用卡鲁塞尔氧化沟工艺，项目以BOT模式建设运营，于2007 年建成投产。</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-md-6\">\r\n                <div class=\"project-v1\">\r\n                    <div class=\"pic\">\r\n                        <img src=\"/assets/img/env09.jpg\" alt=\"巨野：巨野县污水处理厂\">\r\n                    </div>\r\n                    <div class=\"txt\">\r\n                        <h3 class=\"title\">巨野：巨野县污水处理厂</h3>\r\n                        <p>巨野县污水处理厂总设计日处理污水8万立方米，采用百乐克工艺，2006 年由我公司以TOT 模式投资运营。2010年我司对项目进行了升级改造，保证了该厂的运营稳定性。</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n            <div class=\"col-md-6\">\r\n                <div class=\"project-v1\">\r\n                    <div class=\"pic\">\r\n                        <img src=\"/assets/img/env10.jpg\" alt=\"白城：白城市污水处理厂\">\r\n                    </div>\r\n                    <div class=\"txt\">\r\n                        <h3 class=\"title\">白城：白城市污水处理厂</h3>\r\n                        <p>白城市污水处理厂设计建设总规模为日处理污水量10万立方米，采用微曝氧化沟工艺，项目以BOT模式建设运营，于2010 年建成投产。</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n\r\n            <div class=\"col-md-6\">\r\n                <div class=\"project-v1\">\r\n                    <div class=\"pic\">\r\n                        <img src=\"/assets/img/env11.jpg\" alt=\"四平：四平市污水处理厂\">\r\n                    </div>\r\n                    <div class=\"txt\">\r\n                        <h3 class=\"title\">武平：武平县污水处理厂</h3>\r\n                        <p>武平县污水处理厂总设计日处理污水4万立方米，采用改良型卡鲁塞尔氧化沟工艺。项目以BOT模式建设运营，于2009 年建成投产。</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n\r\n    </div>', '', 864, 1, 'admin', 1567057374, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `importance` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `title`, `importance`, `active`, `added_by`, `code`, `created_at`, `updated_at`) VALUES
(1, '首页轮播【全屏】', 0, 1, 'admin', 'A001', NULL, NULL),
(3, '关于我们Banner【1920x600像素】', 0, 1, 'admin', 'A002', NULL, NULL),
(4, '投资者关系Banner【1920x600像素】', 0, 1, 'admin', 'A003', NULL, NULL),
(5, '资讯中心Banner【1920x600像素】', 0, 1, 'admin', 'A004', NULL, NULL),
(6, '加入三达Banner【1920x600像素】', 0, 1, 'admin', 'A005', NULL, NULL),
(7, '应用领域Banner【1920x600像素】', 0, 1, 'admin', 'A006', NULL, NULL),
(9, '应用案例主图【590x380】', 0, 1, 'admin', 'A010', NULL, NULL),
(10, '产品中心Banner【1920x600】', 0, 1, 'admin', 'A008', NULL, NULL),
(11, '环境服务Banner[【1920x600】', 0, 1, 'admin', 'A007', NULL, NULL),
(12, '核心技术Banner【1920x600】', 0, 1, 'admin', 'A009', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(150) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `thumbnail` varchar(150) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `content` text NOT NULL,
  `specifications` text,
  `registration` text,
  `keywords` varchar(150) DEFAULT NULL,
  `added_by` varchar(50) NOT NULL,
  `image_url` varchar(150) DEFAULT NULL,
  `video_id` varchar(100) DEFAULT NULL,
  `dictionary_id` int(11) DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `recommend` tinyint(1) NOT NULL,
  `added_date` int(11) NOT NULL,
  `summary` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `subtitle`, `category_id`, `importance`, `thumbnail`, `description`, `content`, `specifications`, `registration`, `keywords`, `added_by`, `image_url`, `video_id`, `dictionary_id`, `view_count`, `active`, `recommend`, `added_date`, `summary`) VALUES
(67, '陶瓷膜', 'Ceramic membrane', 2, 0, '/uploads/images/products/p23.jpg', '', '<div class=\"fadeInUp title-se-art wow\">\r\n<h3>产品简介</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<p>漳 州纳 滤科技有限公司的陶瓷膜产品是通过完整地引进德国ltN Nanovation AG 的生产工艺， 生产与德国同等质量的产品 。产品具有高通量、高强度、抗污能力强等特点。业务范围涵盖陶瓷膜及组件的研发、设计、生产、销售及售后服务。目前，陶瓷膜产品已经广泛应用千环保、食品、化工、生物工程等众多领域。</p>\r\n<img alt=\"\" src=\"/assets/img/temp/p02.jpg\" /></div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>技术特点</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"row\">\r\n<div class=\"col-md\">\r\n<div class=\"card\">\r\n<div class=\"card-header\">防团聚</div>\r\n\r\n<div class=\"card-body\">纳米分散技术给材料提供了全新的、原先所未知的特性，在生产过程中成功地防止了纳米颗粒的团聚。</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"card\">\r\n<div class=\"card-header\">虐强亲水性</div>\r\n\r\n<div class=\"card-body\">在材料中添加均匀分布的、具有亲水性的纳 米 T i 02 颗粒 ， 大大提高了陶瓷膜的通量。</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md\">\r\n<div class=\"box\">\r\n<p>通过这种技术，纳米粉末才能充分发挥其作用:</p>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/assets/img/temp/p03.jpg\" /></div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"box\">\r\n<p>纳米颗粒的团聚会影响纳米粉末的性能：</p>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/assets/img/temp/p04.jpg\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md\">\r\n<div class=\"box\">\r\n<div class=\"row\">\r\n<div class=\"col-auto\"><img alt=\"\" src=\"/assets/img/temp/p05.jpg\" /></div>\r\n\r\n<div class=\"col\">\r\n<p>纳米分散技术赋予陶瓷膜均一的过滤孔径与均匀的连接强度，使陶瓷膜具备高精度过滤、高抗污染、高耐磨的特性</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"box\">\r\n<div class=\"row\">\r\n<div class=\"col-auto\"><img alt=\"\" src=\"/assets/img/temp/p06.jpg\" /></div>\r\n\r\n<div class=\"col\">\r\n<p>纳米分散技术使烧结后的陶瓷膜同时具备高孔隙率与高的连接强度，耐磨性能与使用寿命大大提高</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>产品参数</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"table-container\">\r\n<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>支撑体</th>\r\n			<th>&nbsp;</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>支撑体材质</td>\r\n			<td>a-A2l 0 3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>适用PH范围</td>\r\n			<td>0-14</td>\r\n		</tr>\r\n		<tr>\r\n			<td>破坏压力</td>\r\n			<td>25mm ;:,::4Mpa<br />\r\n			破坏压力 30mm 之6Mpa<br />\r\n			40mm <!--:8Mpa</td--></td>\r\n		</tr>\r\n		<tr>\r\n			<td>有机溶剂</td>\r\n			<td>不敏感</td>\r\n		</tr>\r\n		<tr>\r\n			<td>揆作温度</td>\r\n			<td>&lt; 3so&middot; c</td>\r\n		</tr>\r\n		<tr>\r\n			<td>操作压力</td>\r\n			<td>S1Mpa</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<p>可量身定做满足特殊设计需求</p>\r\n</div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>产品规格</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"table-container\">\r\n<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>支撑体</th>\r\n			<th>&nbsp;</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>支撑体材质</td>\r\n			<td>a-A2l 0 3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>适用PH范围</td>\r\n			<td>0-14</td>\r\n		</tr>\r\n		<tr>\r\n			<td>破坏压力</td>\r\n			<td>25mm ;:,::4Mpa<br />\r\n			破坏压力 30mm 之6Mpa<br />\r\n			40mm <!--:8Mpa</td--></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<p>表格中的产品长度为常规 尺寸， 若有其它需求， 可以定制小于1200mm的 尺寸。</p>\r\n</div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>产品设备</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"造纸行业亚海水淡化项目\" src=\"/assets/img/temp/app_03.jpg\" />\r\n<p>超滤膜设备</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"造纸行业亚海水淡化项目\" src=\"/assets/img/temp/app_04.jpg\" />\r\n<p>反渗透膜设备</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"造纸行业亚海水淡化项目\" src=\"/assets/img/temp/app_03.jpg\" />\r\n<p>造纸行业亚海水淡化项目</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"造纸行业亚海水淡化项目\" src=\"/assets/img/temp/app_04.jpg\" />\r\n<p>造纸行业亚海水淡化项目</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>应用领域</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"app\">\r\n<div class=\"align-items-center no-gutters row\">\r\n<div class=\"col-md-6\"><img alt=\"生物、医药行业\" src=\"/assets/img/temp/p07.jpg\" /></div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"txt\">\r\n<h4>生物、医药行业</h4>\r\n\r\n<ul>\r\n	<li>中药有效成分的提取和纯化</li>\r\n	<li>口服液澄清过滤</li>\r\n	<li>生物制品的纯化及精制</li>\r\n	<li>空气除菌、除尘</li>\r\n	<li>脱色活性炭的过滤分离等</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"app\">\r\n<div class=\"align-items-center no-gutters row\">\r\n<div class=\"col-md-6\"><img alt=\"其他领域\" src=\"/assets/img/temp/p08.jpg\" /></div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"txt\">\r\n<h4>其他领域</h4>\r\n\r\n<div class=\"row\">\r\n<div class=\"col\">\r\n<ul>\r\n	<li>高温气体除尘</li>\r\n	<li>天然色素生产</li>\r\n	<li>盐水精制</li>\r\n	<li>无机膜催化反应器</li>\r\n	<li>纳米材料浓缩纯化</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col\">\r\n<ul>\r\n	<li>稀有金属富集</li>\r\n	<li>新材料分离制备</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>主要客户</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"clients\">\r\n<div class=\"row\">\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', '', '', 'admin', '/uploads/images/products/p004.jpg', NULL, 0, 71, 1, 0, 1571792857, ''),
(58, 'fdfsd', NULL, 2, 0, '/uploads/images/products/p23.jpg', '', '<p>fdsds dfsd</p>\r\n', '<p>fds</p>\r\n', '', '', 'admin', '/uploads/images/services/p1.jpg', '', 0, 7, 1, 1, 1561972648, ''),
(57, 'dfsdfds', NULL, 5, 0, '/uploads/images/products/p21.jpg', 'fds', '<p>fds</p>\r\n', '<p>dfs</p>\r\n', '', 'fds', 'admin', '/uploads/images/services/p1.jpg', 'fds', 0, 1, 1, 1, 1561971023, 'fds'),
(65, '新记录', NULL, 2, 0, '/uploads/images/products/p22.jpg', '', '<p>fds</p>\r\n', '<p>fds</p>\r\n', '', '', 'admin', '/uploads/images/services/p1.jpg', NULL, 5, 6, 1, 0, 1562427571, ''),
(62, 'RWEREW', NULL, 2, 0, '/uploads/images/products/p24.jpg', '', '<p>RWE</p>\r\n', '', '', '', 'admin', '/uploads/images/services/p1.jpg', NULL, 0, 1, 0, 0, 1562426176, ''),
(66, 'LED Par灯', NULL, 2, 0, '/uploads/images/products/p21.jpg', '', '<p>为了提供更好的灯光音响租赁效果，轩悦视听选用了明道灯光的这款高端LED帕灯，其灯珠采用进口飞利浦的LED灯珠，54颗灯珠均为RGB三合一，每颗灯珠功率为6W，能够实现极佳的染色和变换效果。配备专用的防水罩能够适用于户外和复杂的天气环境中，非常适用于各类演出和会议活动。</p>\r\n\r\n<p>这款LED Par灯属于明道LED帕灯租赁产品中的高端型号，GTD-L654p采用了6瓦54颗高亮度的进口LED灯珠，每颗LED灯珠都独立封装，并且红绿蓝三色合一，每颗灯珠都能实现多达1670万中颜色的变换效果。独立线性调节可以轻松变换色彩而毫无察觉，混色纯正无杂色，一致性极高。高品质的光学透镜和合理的间距排布使得输出光效更高，且光斑均匀扩散。独特的电子控制技术可以分组或独立控制亮度变化，真正实现0-100%的线性调光效果，且调光过程线性平滑，光效稳定不闪烁。产品外壳采用高强度压铸铝，防腐、防氧、防水，能够全天候不间断使用。</p>\r\n\r\n<p>轩悦视听在上海、北京、广州、深圳均设立有分公司，当地拥有大型仓库和专业技术团队，可租赁的舞台灯光包括LED、Par 灯、面光灯、光束灯、图案灯、追光灯、成像灯、观众灯、聚光灯、灯控台、硅箱、烟雾机、泡泡机、TRUSS架</p>\r\n', '', '', '', 'admin', '/uploads/images/services/p1.jpg', NULL, 0, 20, 1, 0, 1571182582, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_en` varchar(150) DEFAULT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `thumbnail2` varchar(150) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `intro` text,
  `active` bit(1) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title`, `title_en`, `thumbnail`, `thumbnail2`, `dictionary_id`, `intro`, `active`, `parent_id`, `added_date`, `importance`) VALUES
(2, '主要产品', '', '/uploads/images/products/pc01.jpg', '', 0, '', b'1', 0, 1561968662, 0),
(5, '配套产品', '', '/uploads/images/products/pc04.jpg', '', 0, '', b'1', 0, 1561970696, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_documents`
--

CREATE TABLE `product_documents` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `file_url` varchar(150) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `added_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_documents`
--

INSERT INTO `product_documents` (`id`, `title`, `product_id`, `file_url`, `dictionary_id`, `address`, `importance`, `added_date`) VALUES
(2, 'test', 56, '/uploads/documents/beauty_study.pdf', 26, '', 0, 1560853518),
(3, '30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展', 56, '/uploads/documents/beauty_study.pdf', 26, '', 0, 1560854086),
(4, '30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展', 56, '/uploads/documents/beauty_study.pdf', 26, '', 0, 1560854094),
(5, '30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展', 56, '/uploads/documents/beauty_study.pdf', 26, '', 0, 1560854156),
(6, '期刊一5', 56, '/uploads/documents/beauty_study.pdf', 27, '', 0, 1560854173),
(7, '期刊一5sdfds', 56, '/uploads/documents/beauty_study.pdf', 27, '', 0, 1560854187),
(8, '心血管介入产品', 56, '/uploads/documents/beauty_study.pdf', 27, '', 0, 1560854205),
(9, '心血管介入产品', 56, '/uploads/documents/beauty_study.pdf', 26, '某某医院', 0, 1560862848),
(10, 'test', 59, '/uploads/products/71.jpg', 0, '', 0, 1562121928);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `dictionary_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` varchar(50) NOT NULL,
  `added_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `title`, `image_url`, `importance`, `dictionary_id`, `country_id`, `active`, `recommend`, `added_by`, `added_date`) VALUES
(21, 'CaLARTS', '/uploads/schools/school001.jpg', 0, 44, 43, 1, 0, 'admin', 1569836423),
(22, 'SFAI', '/uploads/schools/school002.jpg', 0, 44, 43, 1, 0, 'admin', 1569836514),
(23, 'PARSONS', '/uploads/schools/school003.jpg', 0, 44, 44, 1, 0, 'admin', 1569836532),
(24, 'ACADEMY of ART UNIVERSITY', '/uploads/schools/school004.jpg', 0, 44, 42, 1, 0, 'admin', 1569836556),
(25, 'NEW YORK UNIVERSITY', '/uploads/schools/school005.jpg', 0, 44, 42, 1, 0, 'admin', 1569836582),
(26, 'Carnegie Mellon University', '/uploads/schools/school006.jpg', 0, 44, 42, 1, 0, 'admin', 1569836611),
(27, 'SAIC', '/uploads/schools/school007.jpg', 0, 44, 43, 1, 0, 'admin', 1569836623),
(28, 'Pratt', '/uploads/schools/school008.jpg', 0, 44, 44, 1, 0, 'admin', 1569836637),
(29, 'UC San Diego', '/uploads/schools/school009.jpg', 0, 44, 44, 1, 0, 'admin', 1569836660),
(30, 'SAVANNAH COLLEGE', '/uploads/schools/school010.jpg', 0, 44, 42, 1, 0, 'admin', 1569836707),
(31, 'RISD', '/uploads/schools/school011.jpg', 0, 44, 43, 1, 0, 'admin', 1569836718),
(32, 'UCLA', '/uploads/schools/school012.jpg', 0, 44, 42, 1, 0, 'admin', 1569836728),
(33, 'Art Center', '/uploads/schools/school013.jpg', 0, 44, 43, 1, 1, 'admin', 1569836785),
(34, 'FIT', '/uploads/schools/school014.jpg', 0, 44, 44, 1, 0, 'admin', 1569836796),
(35, 'OTIS', '/uploads/schools/school015.jpg', 0, 44, 42, 1, 0, 'admin', 1569836809),
(36, 'CORNELL UNIVERSITY', '/uploads/schools/school016.jpg', 0, 44, 42, 1, 0, 'admin', 1569836828),
(37, 'MICA', '/uploads/schools/school017.jpg', 0, 44, 43, 1, 1, 'admin', 1569836840),
(38, 'LUX ET VERITAS', '/uploads/schools/school018.jpg', 0, 44, 43, 1, 0, 'admin', 1569836858),
(39, 'CCo7', '/uploads/schools/school019.jpg', 0, 44, 44, 1, 1, 'admin', 1569836872),
(40, 'MAINE COLLEGE OF ART', '/uploads/schools/school020.jpg', 0, 44, 43, 1, 1, 'admin', 1569836894);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `email` varchar(150) NOT NULL,
  `added_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`email`, `added_date`) VALUES
('13212847@qq.com', 1554987462);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `post` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `fullphoto` varchar(150) NOT NULL,
  `content` text,
  `dictionary_id` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `post`, `photo`, `fullphoto`, `content`, `dictionary_id`, `added_by`, `added_date`, `importance`) VALUES
(2, '芦田典裕先生', '非执行董事', '/uploads/images/teams/testimonial-2.jpg', '', '<h4>test</h4>\r\n', 3, 'admin', 1546661515, 100),
(9, '常兆华博士', '董事局主席、执行董事', '/uploads/images/teams/testimonial-1.jpg', '/uploads/team/about_team_detail_banner.png', '<h4>content</h4>\r\n', 3, 'admin', 1546662156, 100),
(16, '非执行董事', '非执行董事', '/uploads/images/teams/team-member-4.jpg', '', '<p>test</p>\r\n', 3, 'admin', 1559615162, 0),
(17, '张三', '非执行董事', '/uploads/images/teams/team-member-1.jpg', '', '<p>test</p>\r\n', 2, 'admin', 1564817037, 0),
(19, 'test', 'werew', '/uploads/images/teams/team-member-2.jpg', '', '<p>rewrewrew</p>\r\n', 2, 'admin', 1564817127, 0),
(20, 'doubletong', 'fds', '/uploads/images/teams/team-member-3.jpg', '', '<p>fdsfds</p>\r\n', 2, 'admin', 1564817145, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test001`
--

CREATE TABLE `test001` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test001`
--

INSERT INTO `test001` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Mark Mike', 'temp-email-1@mark.com', '1234', '2019-09-16 14:24:33', '2019-09-16 14:24:33'),
(4, 'Mark Mike', 'temp01-email-1@mark.com', '1234', '2019-09-17 01:58:52', '2019-09-17 01:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `test002`
--

CREATE TABLE `test002` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test002`
--

INSERT INTO `test002` (`id`, `title`, `body`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'New Blog Post', 'New Blog Content', 1, '2019-09-16 14:24:33', '2019-09-16 14:24:33'),
(2, 'New Blog Post dddddddd', 'New Blog Content ddddd', 1, '2019-09-17 01:58:52', '2019-09-17 01:58:52'),
(3, 'New Blog Post12', 'New Blog Content21', 11, '2019-09-30 17:41:12', '2019-09-30 17:41:12');

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
(1, '30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强 强联手，助力中国临床试验取得新进展', 'admin', 1546588491),
(2, 'fdsfds', 'admin', 1554866135);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `video_url` varchar(150) NOT NULL,
  `webm` varchar(150) DEFAULT NULL,
  `ogv` int(150) DEFAULT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `thumbnail2` varchar(150) DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `recommend` tinyint(1) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_date` datetime NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `content`, `video_url`, `webm`, `ogv`, `thumbnail`, `thumbnail2`, `importance`, `dictionary_id`, `recommend`, `added_by`, `added_date`, `view_count`, `active`) VALUES
(10, 'cxzcxzc', '<p>cxzcxzcxz</p>\r\n', 'XMjc2NTM5NDYyOA', NULL, NULL, '/uploads/videos/news_media_01.jpg', '/uploads/videos/news_media_02.jpg', 0, 18, 0, 'admin', '2019-06-15 17:26:52', 0, 1),
(7, 'test', '<p>fdsfds</p>\r\n', 'XMjc2NTM5NDYyOA', NULL, NULL, '/uploads/videos/news_media_01.jpg', '/uploads/videos/news_media_02.jpg', 0, 17, 0, 'admin', '2019-06-04 15:50:50', 0, 1),
(8, 'test', '<p>fdsfds</p>\r\n', 'XMjc2NTM5NDYyOA', NULL, NULL, '/uploads/videos/news_media_01.jpg', '/uploads/videos/news_media_03.jpg', 0, 17, 0, 'admin', '2019-06-04 15:55:59', 0, 1),
(9, 'testrrrr', '<p>fdsfds</p>\r\n', 'XMjc2NTM5NDYyOA', NULL, NULL, '/uploads/videos/news_media_01.jpg', '/uploads/videos/news_media_03.jpg', 0, 17, 0, 'admin', '2019-06-04 15:56:55', 0, 1),
(11, 'fdsfds', '<p>fdsfdsfds</p>\r\n', '无可奈何', '', NULL, '', '', 0, 18, 0, 'admin', '2019-06-18 09:48:25', 0, 1);

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
(9, 'doubletong', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-18 20:24:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisements_space_id_foreign` (`space_id`);

--
-- Indexes for table `advertising_spaces`
--
ALTER TABLE `advertising_spaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annals`
--
ALTER TABLE `annals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_documents`
--
ALTER TABLE `article_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_categories`
--
ALTER TABLE `case_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chronicles`
--
ALTER TABLE `chronicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `dictionaries`
--
ALTER TABLE `dictionaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PK_Dic_DicType` (`type_id`);

--
-- Indexes for table `dictionary_type`
--
ALTER TABLE `dictionary_type`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `distributors`
--
ALTER TABLE `distributors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `i18n`
--
ALTER TABLE `i18n`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `major_categories`
--
ALTER TABLE `major_categories`
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
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus_temp`
--
ALTER TABLE `menus_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`config_name`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_documents`
--
ALTER TABLE `product_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
-- Indexes for table `test001`
--
ALTER TABLE `test001`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test001_email_unique` (`email`);

--
-- Indexes for table `test002`
--
ALTER TABLE `test002`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `advertising_spaces`
--
ALTER TABLE `advertising_spaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `annals`
--
ALTER TABLE `annals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `article_documents`
--
ALTER TABLE `article_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `case_categories`
--
ALTER TABLE `case_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chronicles`
--
ALTER TABLE `chronicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `dictionaries`
--
ALTER TABLE `dictionaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `dictionary_type`
--
ALTER TABLE `dictionary_type`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `distributors`
--
ALTER TABLE `distributors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `i18n`
--
ALTER TABLE `i18n`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `major_categories`
--
ALTER TABLE `major_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `media_links`
--
ALTER TABLE `media_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `menus_temp`
--
ALTER TABLE `menus_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_documents`
--
ALTER TABLE `product_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `test001`
--
ALTER TABLE `test001`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test002`
--
ALTER TABLE `test002`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advertisements_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `advertising_spaces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dictionaries`
--
ALTER TABLE `dictionaries`
  ADD CONSTRAINT `PK_Dic_DicType` FOREIGN KEY (`type_id`) REFERENCES `dictionary_type` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
