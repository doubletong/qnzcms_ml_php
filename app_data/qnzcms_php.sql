/*
 Navicat Premium Data Transfer

 Source Server         : MacMyQL
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : localhost:3306
 Source Schema         : tzgcms_php

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 22/01/2020 19:59:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for advertisements
-- ----------------------------
DROP TABLE IF EXISTS `advertisements`;
CREATE TABLE `advertisements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_url_mobile` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `space_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `advertisements_space_id_foreign` (`space_id`),
  CONSTRAINT `advertisements_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `advertising_spaces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of advertisements
-- ----------------------------
BEGIN;
INSERT INTO `advertisements` VALUES (2, '格科微电子  用芯看世界', 'http://www.baidu.com', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/slider01.jpg', '<p>aa</p>\r\n', '', 0, 2, 1, 'admin', '2019-12-30 05:47:45', '2020-01-01 04:07:12');
INSERT INTO `advertisements` VALUES (3, 'test', 'http://www.baidu.com', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/slider01.jpg', '', '', 0, 2, 1, 'admin', '2019-12-31 10:26:07', '2019-12-31 10:26:07');
INSERT INTO `advertisements` VALUES (4, 'test123', 'http://www.baidu.com', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/slider01.jpg', '', '', 0, 2, 1, 'admin', '2019-12-31 10:28:07', '2019-12-31 10:28:07');
COMMIT;

-- ----------------------------
-- Table structure for advertising_spaces
-- ----------------------------
DROP TABLE IF EXISTS `advertising_spaces`;
CREATE TABLE `advertising_spaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of advertising_spaces
-- ----------------------------
BEGIN;
INSERT INTO `advertising_spaces` VALUES (2, '首页轮播【全屏】', 'A001', '', 0, 1, 'admin', '2019-12-30 05:47:23', '2019-12-30 05:47:23');
COMMIT;

-- ----------------------------
-- Table structure for annals
-- ----------------------------
DROP TABLE IF EXISTS `annals`;
CREATE TABLE `annals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `month` int(4) DEFAULT NULL,
  `image_url` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of annals
-- ----------------------------
BEGIN;
INSERT INTO `annals` VALUES (7, 2018, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n', 13, 'admin', 1572831029);
INSERT INTO `annals` VALUES (13, 2017, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832628);
INSERT INTO `annals` VALUES (14, 2016, 0, '', '\r\n<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832644);
INSERT INTO `annals` VALUES (15, 2015, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832647);
INSERT INTO `annals` VALUES (16, 2014, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832650);
INSERT INTO `annals` VALUES (17, 2013, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832654);
INSERT INTO `annals` VALUES (18, 2012, 0, '', '<ul>\r\n	<li>第二代背照式(BSI)CMOS图像传感器成功投放市场并量产。</li>\r\n	<li>Chip On Module(COM)自主研发封装成功投放市场并量产。</li>\r\n	<li>LCD驱动芯片年度出货量突破1.5亿颗。</li>\r\n</ul>\r\n\r\n', 13, 'admin', 1572832657);
INSERT INTO `annals` VALUES (19, 2012, 0, '', '<ul>\r\n	<li>\r\n	  fsdsfs \r\n	</li>\r\n</ul>\r\n', 14, 'admin', 1572833338);
INSERT INTO `annals` VALUES (21, 2015, 0, '', '<ul>\r\n	<li>123</li>\r\n</ul>\r\n', 14, 'admin', 1572833359);
INSERT INTO `annals` VALUES (22, 2013, 0, '', '<ul>\r\n	<li>erewrw</li>\r\n</ul>\r\n', 14, 'admin', 1572833363);
INSERT INTO `annals` VALUES (23, 2016, 0, '', '<ul>\r\n	<li>格科产品500万像素图像传感器芯片GC5005荣获工业和信息化部软件与集成电路促进中心颁发的&rdquo;第十一届 &lsquo;中国芯&rsquo;最佳市场表现奖&rdquo;</li>\r\n	<li>获中国半导体行业协会评为&ldquo;2016年中国十大集成电路设计企业奖&rdquo;</li>\r\n	<li>获电子工程专辑颁发的&ldquo;十大大中华IC设计公司品牌&rdquo;</li>\r\n	<li>获上海市浦东新区科技和经济委员会颁发的&ldquo;2014-2016浦东新区集成电路设计业实力型企业&rdquo;</li>\r\n	<li>格科产品GC13003荣获中国半导体行业协会颁发的第十四届中国国际半导体博览会暨高峰论坛&ldquo;优秀参展产品</li>\r\n</ul>\r\n', 14, 'admin', 1572833367);
INSERT INTO `annals` VALUES (24, 2017, 0, '', '<ul>\r\n	<li>格科产品800万像素图像传感器芯片GC8024荣获工业和信息化部软件与集成电路促进中心颁发的&rdquo;第十二届 &lsquo;中国芯&rsquo;最佳市场表现奖&rdquo;</li>\r\n	<li>获电子工程专辑颁发的&ldquo;2017年大中华IC设计成就奖&rdquo;</li>\r\n	<li>格科产品GC5005荣获电子工程专辑颁发的&ldquo;年度最佳MEMS/传感器&rdquo;</li>\r\n	<li>格科产品1300万像素图像传感器GC13003荣获中国半导体行业协会颁发的&ldquo;第十一届（2016年度）中国半导体创新产品和技术奖&rdquo;</li>\r\n	<li>获上海集成电路行业协会颁发&ldquo;上海市集成电路设计业销售前十名&rdquo;</li>\r\n</ul>\r\n', 14, 'admin', 1572833370);
INSERT INTO `annals` VALUES (25, 2018, 0, '', '<ul>\r\n	<li>获中国半导体行业协会评为&ldquo;2017年中国十大集成电路设计企业奖&rdquo;</li>\r\n	<li>获上海集成电路行业协会颁发&ldquo;上海市集成电路设计业销售前十名&rdquo;</li>\r\n	<li>荣获2018年度知识产权海关保护联系点示范单位</li>\r\n	<li>被上海市知识产权局评为&ldquo;上海市专利工作示范企业&rdquo;</li>\r\n	<li>新认定为&ldquo;国家企业技术中心&rdquo;</li>\r\n</ul>\r\n', 14, 'admin', 1572833374);
INSERT INTO `annals` VALUES (26, 2019, 0, '', '<ul>\r\n	<li>获选2019年度中国IC设计成就奖之十大IC中国设计公司</li>\r\n</ul>\r\n', 14, 'admin', 1572833377);
COMMIT;

-- ----------------------------
-- Table structure for application_areas
-- ----------------------------
DROP TABLE IF EXISTS `application_areas`;
CREATE TABLE `application_areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `intro` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cases` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of application_areas
-- ----------------------------
BEGIN;
INSERT INTO `application_areas` VALUES (1, '移动设备', 'MOBILE DEVICES', '<p>格科微电子拥有完全自主知识产权和行业领先水平的制造工艺。为智能手机厂商提供了高性价比的产品。目前广泛应用在智能手机的主摄像头、前置摄像头与多摄副摄上。</p>\r\n\r\n<p><img alt=\"\" src=\"/uploads/images/application/app_1.jpg\" /></p>\r\n', '', 0, 1, 'admin', '2020-01-09 14:16:51', '2020-01-10 05:24:32');
INSERT INTO `application_areas` VALUES (2, '安防监控', 'SECURITY MONITORING', '<p>未来的监控不仅仅是摄像头，它们将为是智慧城市、智能家庭的数据入口，CIS需要具备更好的感光性能以及更高的像素 目前主要产品有IPC（网络监控相机）、模拟监控相机。</p>\r\n\r\n<p>格科微优秀的像素工艺，先进的电路设计，保证了在低光下优秀的图像质量、以及红外光下优秀的感光性能</p>\r\n\r\n<p><img alt=\"\" src=\"/uploads/images/application/app_2.jpg\" /></p>\r\n', '<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>4M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC4653.pdf\">GC4653</a></li>\r\n	<li><a href=\"/uploads/files/GC4663.pdf\">GC4663</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>IPC：海思Hi3516EV300、Sstar 327/328、富翰FH8856、君正T31</p>\r\n\r\n<p>AHD：富瀚FH8538M、FH8556、TP3805</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>1080P</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC2053.pdf\">GC2053</a></li>\r\n	<li><a href=\"/uploads/files/GC2063.pdf\">GC2063</a></li>\r\n	<li><a href=\"/uploads/files/GC2033.pdf\">GC2033</a></li>\r\n	<li><a href=\"/uploads/files/GC2093.pdf\">GC2093</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>IPC：海思Hi3516EV200、HI3556V200、国科GK7102C、君正T21/T31、SStar MS313E/325/323、瑞昱RTS3903/3913、富瀚FH8852、安凯AK3918EV300、智原GM8136S、联咏NT98513、安霸CV22/CV25</p>\r\n\r\n<p>AHD：FH8536H、FH8550M、Nextchip2441/2470、TP3803</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>720P</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC1034.pdf\">GC1034</a></li>\r\n	<li><a href=\"/uploads/files/GC1054.pdf\">GC1054</a></li>\r\n	<li><a href=\"/uploads/files/GC1064.pdf\">GC1064</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>IPC：海思Hi3518EV200、国科GK7102S/C、智原GM8135S、安凯3918EV200、君正T10、瑞昱平台</p>\r\n\r\n<p>AHD：Nextchip2431/2433、富瀚FH8532E</p>\r\n</div>\r\n</div>\r\n</div>\r\n', 0, 1, 'admin', '2020-01-09 14:29:27', '2020-01-10 12:20:35');
INSERT INTO `application_areas` VALUES (3, '汽车电子', 'AUTOMOTIVE ELECTRONICS', '<p>为您的驾驶提供保驾护航，减少行驶过程中的事故和纠纷。</p>\r\n\r\n<p>目前产品有行车记录仪、车内监控、360&deg;环视、倒车后视、驾驶员疲脑检测。</p>\r\n\r\n<p>格科微优秀的像素工艺，先进的电路设计，保证了在低光下优秀的图像质量、以及高动态范围。</p>\r\n\r\n<p><img alt=\"\" src=\"/uploads/images/application/app_3.jpg\" /></p>\r\n', '<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>4M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC4653.pdf\">GC4653</a></li>\r\n	<li><a href=\"/uploads/files/GC4663.pdf\">GC4663</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>行车记录仪：海思3556V200、联咏NT96675/NT96672/NT96660、全志V536</p>\r\n\r\n<p>AHD后拉：富翰8538、8556；Tech-point 3805</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>1080P</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC2053.pdf\">GC2053</a></li>\r\n	<li><a href=\"/uploads/files/GC2063.pdf\">GC2063</a></li>\r\n	<li><a href=\"/uploads/files/GC2023A.pdf\">GC2023A</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>行车记录仪：海思 3518EV300/3556V200、联咏NT96675/NT96658、Mstar 8328/SSC8336/SSC8339、杰理JL5401/JL5601、凌通GP5168/GP6248 、全志V3S、兴芯微XC6131/XC7021、MTK3G/4G带ISP全系列产品、展讯9832A/E</p>\r\n\r\n<p>AHD后拉：富翰8536H、NextchipC4、Xchip 5013、Techpoint 3803</p>\r\n\r\n<p>USB后拉：凌阳2092、瑞昱5842、松翰SN5256/SN98671</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>720P</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC1034.pdf\">GC1034</a></li>\r\n	<li><a href=\"/uploads/files/GC1054.pdf\">GC1054</a></li>\r\n	<li><a href=\"/uploads/files/GC1064.pdf\">GC1064</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>行车记录仪：凌通GP2247/GP4248/GP6248、杰理5201/5203/5601、建荣3282</p>\r\n<p>AHD后拉：富翰8536H、 NextchipC1/C4、Xchip 5011</p>\r\n<p>USB后拉：凌阳2085、瑞昱5846/5842、松翰302A/303/291B、安国3822U</p>\r\n</div>\r\n</div>\r\n</div>\r\n', 0, 1, 'admin', '2020-01-09 14:41:00', '2020-01-10 12:31:59');
INSERT INTO `application_areas` VALUES (4, 'USB camera', 'USB CAMERA', '<p>方便连接各个需要摄像头的智能终端，实现视频和图像信息采集、视频通话等功能 产品有电视&amp;电话会议系统、高拍仪、广告机、信息采集设备 格科提供从VGA到13M像素的CMOS图像传感器，可搭配目前市场上主流的USB SOC。</p>\r\n\r\n<p><img alt=\"\" src=\"/uploads/images/application/app_4.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', '<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>8M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC8603.pdf\">GC8603</a></li>\r\n	<li><a href=\"/uploads/files/GC8054.pdf\">GC8054</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>凌阳2089/2620、瑞昱5880</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>5M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC5035.pdf\">GC5035</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>凌阳SPCA2089、瑞昱5876、松翰5258/5259</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>4M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC4653.pdf\">GC4653</a></li>\r\n	<li><a href=\"/uploads/files/GC4663.pdf\">GC4663</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>凌阳SPCA2089、瑞昱5876、松翰5258/5259、海思3516DV300、NT96517、FH8852</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>2M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC2145.pdf\">GC2145</a></li>\r\n	<li><a href=\"/uploads/files/GC2053.pdf\">GC2053</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>瑞昱5842/5852、安国3841/3822U、松翰5256、慧荣3732、FH8852、NT96517</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>1M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC1009.pdf\">GC1009</a></li>\r\n	<li><a href=\"/uploads/files/GC1054.pdf\">GC1054</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>凌阳2085、瑞昱5846/5852、安国3826</p>\r\n</div>\r\n</div>\r\n</div>\r\n', 0, 1, 'admin', '2020-01-09 14:41:35', '2020-01-10 12:40:02');
INSERT INTO `application_areas` VALUES (5, '智慧屏电视', 'SMART SCREEN TV', '<p>提供小型化、星光级的CIS解决方案，实现在电视大屏优秀的显示效果， 适合做升降式或者屏下摄像头 摄像头是电视与用户实现人机交互的通道，未来需求会更高智能化、更好低照度图像品质、更高动态范围。</p>\r\n\r\n<p><img alt=\"\" src=\"/uploads/images/application/app_5.jpg\" /></p>\r\n', '<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>4M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC4C33.pdf\">GC4C33</a></li>\r\n	<li><a href=\"/uploads/files/GC4653.pdf\">GC4653</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>ISP:海思、Novatek、富翰、松翰、凌阳等</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>2M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC20A3T.pdf\">GC20A3T</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>ISP:海思、Novatek、富翰、松翰、凌阳等</p>\r\n</div>\r\n</div>\r\n</div>\r\n', 0, 1, 'admin', '2020-01-09 14:42:18', '2020-01-10 13:08:17');
INSERT INTO `application_areas` VALUES (6, '生物识别&扫码', 'BIOMETRIC & SCAN THE CODE', '<p>生物识别已经成为门禁、打卡、支付、身份核对等领域不可或缺的一项技术，正逐步渗入到我们生活中的各个环节 目前产品有指纹打卡机、人脸打卡、人脸支付设备。</p>\r\n\r\n<p>格科产品具备高动态范围、红外增强、优秀的低照度感光性能</p>\r\n\r\n<p><img alt=\"\" src=\"/uploads/images/application/app_6.jpg\" /></p>\r\n', '<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>5M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC5035.pdf\">GC5035</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>凌阳SPCA2089、瑞昱5876、松翰5258/5259</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>2M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC2145.pdf\">GC2145</a></li>\r\n	<li><a href=\"/uploads/files/GC2053.pdf\">GC2053</a></li>\r\n	<li><a href=\"/uploads/files/GC2093.pdf\">GC2093</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>瑞昱5842/5852、安国3841/3822U、松翰5256、慧荣3732、海思3518EV300、3516CV500</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>1M</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC1054.pdf\">GC1054</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>海思3518EV300、3516CV500</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"box-header\">\r\n<h4>VGA</h4>\r\n</div>\r\n\r\n<div class=\"box-body\">\r\n<ul class=\"models\">\r\n	<li><a href=\"/uploads/files/GC0308.pdf\">GC0308</a></li>\r\n</ul>\r\n\r\n<div class=\"des\">\r\n<p>适用于所有平台</p>\r\n</div>\r\n</div>\r\n</div>\r\n', 0, 1, 'admin', '2020-01-09 14:42:53', '2020-01-10 13:13:27');
COMMIT;

-- ----------------------------
-- Table structure for article_categories
-- ----------------------------
DROP TABLE IF EXISTS `article_categories`;
CREATE TABLE `article_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `thumbnail2` varchar(150) DEFAULT NULL,
  `dictionary_id` int(11) NOT NULL,
  `active` bit(1) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_categories
-- ----------------------------
BEGIN;
INSERT INTO `article_categories` VALUES (13, '行业资讯', NULL, '/uploads/images/news/icons/icon_news_01@2x.png', '', 1, b'1', 0, 1559027615, 10);
INSERT INTO `article_categories` VALUES (38, '公司新闻', NULL, '/uploads/images/news/icons/icon_news@2x.png', '', 1, b'1', 0, 1558324794, 50);
INSERT INTO `article_categories` VALUES (39, '常见问题', NULL, '/uploads/images/news/icons/icon_news_02@2x.png', '', 1, b'1', 0, 1570669811, 0);
INSERT INTO `article_categories` VALUES (40, '环保水处理', '', '/uploads/images/application/app2.jpg', '/uploads/images/application/home08.jpg', 6, b'1', 0, 1571702826, 0);
INSERT INTO `article_categories` VALUES (41, '家用净水', '', '/uploads/images/application/app1.jpg', '/uploads/images/application/app02.jpg', 6, b'1', 0, 1571702858, 0);
INSERT INTO `article_categories` VALUES (42, '生物制药', '', '/uploads/images/application/app3.jpg', '/uploads/images/application/app03.jpg', 6, b'1', 0, 1571702906, 0);
INSERT INTO `article_categories` VALUES (43, '食品饮料', '', '/uploads/images/application/app5.jpg', '/uploads/images/application/app04.jpg', 6, b'1', 0, 1571702930, 0);
INSERT INTO `article_categories` VALUES (44, '中水回收及零排放', '', '/uploads/images/application/app4.jpg', '/uploads/images/application/app05.jpg', 6, b'1', 0, 1571702956, 0);
INSERT INTO `article_categories` VALUES (45, '主要技术', '', '', '', 3, b'1', 0, 1571926273, 0);
INSERT INTO `article_categories` VALUES (46, '其它技术', 'Flow-Cel超滤膜技术、超滤膜技术、反渗透膜技术、连续离交、膜生物反应器技术、色谱分离、微管膜技术、厌氧技术。', '/uploads/images/tech/tech05.jpg', '', 3, b'1', 0, 1571926344, 0);
COMMIT;

-- ----------------------------
-- Table structure for article_documents
-- ----------------------------
DROP TABLE IF EXISTS `article_documents`;
CREATE TABLE `article_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `article_id` int(11) NOT NULL,
  `file_url` varchar(150) NOT NULL,
  `importance` int(11) NOT NULL,
  `added_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article_documents
-- ----------------------------
BEGIN;
INSERT INTO `article_documents` VALUES (12, '心血管介入产品', 117, '/uploads/documents/beauty_study.pdf', 0, 1561015911);
INSERT INTO `article_documents` VALUES (13, '30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展', 117, '/uploads/documents/beauty_study.pdf', 0, 1561015918);
COMMIT;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `summary` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
-- ----------------------------
BEGIN;
INSERT INTO `articles` VALUES (1, '药政周报20190517期', NULL, '<p>先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;</p>\r\n', 1564675200, '', '', 1, '', '', '', '', 5, 1, 1, 'admin', '/uploads/images/news/n12.jpg', '', 1564736597, 13, '先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放腺癌……');
INSERT INTO `articles` VALUES (2, '第13届全国放射性药物与标记化合物学术交流会', NULL, '<p>先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;</p>\r\n', 1564675200, '', '', 1, '', '', '', '', 74, 1, 0, 'admin', '/uploads/images/news/n11.jpg', '', 1564736666, 13, '先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放腺癌……');
INSERT INTO `articles` VALUES (4, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开', NULL, '<p>世界级美术馆管理者与艺术教育者的针锋相对？&ldquo;未来的设计&rdquo;讲座成功在UPERENT召开</p>\r\n', 1569427200, '', '', 1, '', '', '', '', 3, 1, 0, 'admin', '/uploads/images/news/n13.jpg', '', 1569463379, 38, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开');
INSERT INTO `articles` VALUES (3, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开', NULL, '<p>世界级美术馆管理者与艺术教育者的针锋相对？&ldquo;未来的设计&rdquo;讲座成功在UPERENT召开</p>\r\n', 1569427200, '', '', 1, '', '', '', '', 4, 0, 1, 'admin', '/uploads/images/news/n13.jpg', '', 1569462752, 13, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开');
INSERT INTO `articles` VALUES (5, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开', NULL, '<p>世界级美术馆管理者与艺术教育者的针锋相对？&ldquo;未来的设计&rdquo;讲座成功在UPERENT召开</p>\r\n', 1569427200, '', '', 1, '', '', '', '', 23, 1, 1, 'admin', '/uploads/images/news/n12.jpg', '/uploads/news/n-d-01.jpg', 1569463418, 38, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开');
INSERT INTO `articles` VALUES (6, '药政周报20190517期', NULL, '<p>先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;</p>\r\n', 1569600000, '', '', 1, '', '', '', '', 18, 1, 0, 'admin', '/uploads/images/news/n13.jpg', '', 1569684252, 13, '先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放腺癌……');
INSERT INTO `articles` VALUES (7, '第13届全国放射性药物与标记化合物学术交流会', NULL, '<p>先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予&ldquo;治疗转移性去势抵抗前列腺癌的放腺癌&hellip;&hellip;</p>\r\n', 1569600000, '', '', 1, '', '', '', '', 23, 1, 0, 'admin', '/uploads/images/news/n11.jpg', '', 1569684262, 13, '先通医药首席技术官张裕民博士发布了北京先通国际医药科技股份有限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放限公司获得美国国立卫生研究院授予“治疗转移性去势抵抗前列腺癌的放腺癌……');
INSERT INTO `articles` VALUES (8, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开【拷贝】', NULL, '<p>世界级美术馆管理者与艺术教育者的针锋相对？&ldquo;未来的设计&rdquo;讲座成功在UPERENT召开</p>\r\n', 1569600000, '', '', 1, '', '', '', '', 10, 1, 0, 'admin', '/uploads/images/news/n12.jpg', '', 1569684325, 38, '世界级美术馆管理者与艺术教育者的针锋相对？“未来的设计”讲座成功在UPERENT召开');
INSERT INTO `articles` VALUES (9, '海水淡化', NULL, '<p>海水中含有大量盐类和多种元素，其中许多元素是人体所需要的。但海水中各种物质浓度太高，远远超过饮用水卫生标准，如果大量饮用，会导致某些元素过量进入人体，影响人体正常的生理功能，还会导致人体脱水...</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/application/appdetail1.jpg', '', 1571704598, 40, '海水中含有大量盐类和多种元素，其中许多元素是人体所需要的。但海水中各种物质浓度太高，远远超过饮用水卫生标准，如果大量饮用，会导致某些元素过量进入人体，影响人体正常的生理功能，还会导致人体脱水...');
INSERT INTO `articles` VALUES (10, '农村污水处理', NULL, '<p>随着我国中小城镇建设的步伐明显加快，城镇污水排放量也不断增加。我国城市污水排放量年年急剧增长，据报道大约会以年增24亿m3的速度蔓延。与此同时，我国相应的污水处理能力相对有限，远远不能适应过快增长...</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 1, 1, 0, 'admin', '/uploads/images/application/appdetail2.jpg', '', 1571704726, 40, '随着我国中小城镇建设的步伐明显加快，城镇污水排放量也不断增加。我国城市污水排放量年年急剧增长，据报道大约会以年增24亿m3的速度蔓延。与此同时，我国相应的污水处理能力相对有限，远远不能适应过快增长...');
INSERT INTO `articles` VALUES (11, '市政污水提标', NULL, '<p>膜技术是清洁生产、水资源再生、水循环利用的最佳手段之一，它对于有效减少污染物排放和实现污水资源化有着重要意义。三达应用MBR技术改造传统污水处理厂，应用超滤、纳滤技术提标自来水厂。三达开发适合中小...</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/application/appdetail3.jpg', '', 1571704749, 40, '膜技术是清洁生产、水资源再生、水循环利用的最佳手段之一，它对于有效减少污染物排放和实现污水资源化有着重要意义。三达应用MBR技术改造传统污水处理厂，应用超滤、纳滤技术提标自来水厂。三达开发适合中小...');
INSERT INTO `articles` VALUES (12, '养殖业', NULL, '<div class=\"title-se-art wow fadeInUp\">\r\n            <h3>\r\n                应用简介\r\n            </h3>\r\n        </div>\r\n        <div class=\"se wow fadeInUp\">\r\n            <p>海水中含有大量盐类和多种元素，其中许多元素是人体所需要的。但海水中各种物质浓度太高，远远超过饮用水卫生标准，如果大量饮用，会导致某些元素过量进入人体，影响人体正常的生理功能，还会导致人体脱水，严重的还会引起中毒。</p>\r\n            <p>地球表面约有70%以上为水所覆盖，其余约占地球表面30%的陆地也有水的存在。其中淡水储量为3.5×108亿m3，占总储量的2.53%。由于开发困难或技术经济的限制，到目前为止，海水、深层地下水、冰雪固态淡水等还很少被直接利用。比较容易开发利用的、与人类生活生产关系最为密切的湖泊、河流和浅层地下淡水资源，只占淡水总储量的0.34%，为104.6×104亿m3，还不到全球水总储量的万分之一，并且这部分水分布极不均匀。随着着经济的发展和人口的增加，世界用水量在逐年增加。以利用海水淡化技术向海洋取水是未来的发展趋势，而反渗透法海水淡化是现阶段的发展重心。</p>\r\n            <p>三达采用以膜技术为核心的零排放工艺，工艺采用预处理、膜集成以及蒸发结晶等多项工艺，微滤膜可以回收其中的纤维，较好的去除COD和BOD，超滤膜可以回收废水中的木质素和纸浆纤维，纳滤膜和反渗透膜用于去除废水中的盐分。 </p>\r\n        </div>\r\n        <div class=\"title-se-art wow fadeInUp\">\r\n            <h3>\r\n                工艺流程\r\n            </h3>\r\n        </div>\r\n        <div class=\"se wow fadeInUp\">\r\n            <div class=\"img-box \">\r\n                <img src=\"/assets/img/temp/app_02.jpg\" alt=\"工艺流程\">\r\n            </div>\r\n\r\n        </div>\r\n        <div class=\"title-se-art wow fadeInUp\">\r\n            <h3>\r\n                工艺应用\r\n            </h3>\r\n        </div>\r\n        <div class=\"se wow fadeInUp\">\r\n            <h4 class=\"dot-title\">\r\n                混凝沉淀\r\n            </h4>\r\n            <p>通过向水中投加混凝药剂，既可以降低原水的浊度、色度等水质的感观指标，又可以去除多种有毒有害污染物，针对浊度较高的海水使用。</p>\r\n            <h4 class=\"dot-title\">\r\n                混凝沉淀\r\n            </h4>\r\n            <p>通过向水中投加混凝药剂，既可以降低原水的浊度、色度等水质的感观指标，又可以去除多种有毒有害污染物，针对浊度较高的海水使用。</p>\r\n            <h4 class=\"dot-title\">\r\n                混凝沉淀\r\n            </h4>\r\n            <p>通过向水中投加混凝药剂，既可以降低原水的浊度、色度等水质的感观指标，又可以去除多种有毒有害污染物，针对浊度较高的海水使用。</p>\r\n            <h4 class=\"dot-title\">\r\n                混凝沉淀\r\n            </h4>\r\n            <p>通过向水中投加混凝药剂，既可以降低原水的浊度、色度等水质的感观指标，又可以去除多种有毒有害污染物，针对浊度较高的海水使用。</p>\r\n        </div>\r\n\r\n        <div class=\"title-se-art wow fadeInUp\">\r\n            <h3>\r\n                案例分析\r\n            </h3>\r\n        </div>\r\n        <div class=\"se wow fadeInUp\">\r\n            <div class=\"row\">\r\n                <div class=\"col-md-6\">\r\n                    <div class=\"case\">\r\n                        <img src=\"/assets/img/temp/app_03.jpg\" alt=\"造纸行业亚海水淡化项目\">\r\n                        <p>造纸行业亚海水淡化项目</p>\r\n                    </div>\r\n\r\n                </div>\r\n                <div class=\"col-md-6\">\r\n                    <div class=\"case\">\r\n                        <img src=\"/assets/img/temp/app_04.jpg\" alt=\"造纸行业亚海水淡化项目\">\r\n                        <p>造纸行业亚海水淡化项目</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </div>', 1571673600, '', '', 6, '', '', '', '', 94, 1, 0, 'admin', '/uploads/images/application/appdetail4.jpg', '/uploads/images/application/app_1.jpg', 1571704782, 40, '随着我国畜牧业的迅猛发展，养殖污水污染不断加剧，其污染防治迫在眉睫。养殖业废水属于高有机物浓度、高N、P含量和高有害微生物数量的“三高”废水。由于污水中的固体残渣主要是有机物，因此必须加强预处...');
INSERT INTO `articles` VALUES (13, 'Suntar三达净水机', NULL, '<p>Suntar三达净水机</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 1, 1, 0, 'admin', '', '', 1571704897, 41, 'Suntar三达净水机');
INSERT INTO `articles` VALUES (14, '氨基酸', NULL, '<p>氨基酸</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571704923, 42, '');
INSERT INTO `articles` VALUES (15, '抗生素', NULL, '<p>抗生素</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571704933, 42, '');
INSERT INTO `articles` VALUES (16, '维生素', NULL, '<p>维生素</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571704952, 42, '');
INSERT INTO `articles` VALUES (17, '有机酸', NULL, '<p>有机酸</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 1, 1, 0, 'admin', '', '', 1571704963, 42, '');
INSERT INTO `articles` VALUES (18, '糖及糖醇 ', NULL, '<p>糖及糖醇&nbsp;</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571704979, 43, '');
INSERT INTO `articles` VALUES (19, '酒及饮料', NULL, '<p>酒及饮料</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571704992, 43, '');
INSERT INTO `articles` VALUES (20, '电力行业', NULL, '<p>电力行业</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705029, 44, '');
INSERT INTO `articles` VALUES (21, '氯碱化工', NULL, '<p>氯碱化工</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705041, 44, '');
INSERT INTO `articles` VALUES (22, '皮革行业', NULL, '<p>皮革行业</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705054, 44, '');
INSERT INTO `articles` VALUES (23, '生物发酵', NULL, '<p>生物发酵</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705065, 44, '');
INSERT INTO `articles` VALUES (24, '石化行业', NULL, '<p>fsdfsd</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705116, 44, '');
INSERT INTO `articles` VALUES (25, '印染废水', NULL, '<p>fsdfsd</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705125, 44, '');
INSERT INTO `articles` VALUES (26, '造纸废水', NULL, '<p>fsdfsd</p>\r\n', 1571673600, '', '', 6, '', '', '', '', 0, 1, 0, 'admin', '', '', 1571705130, 44, '');
INSERT INTO `articles` VALUES (27, '中空纤维膜技术', NULL, '<p>中空纤维膜以具有选择渗透性的中空纤维丝为基础制成，主要用于水处理领域。三达研发的中空纤维膜材料采用以聚偏氟乙烯(PVDF)为主材及制备而成...</p>\r\n', 1571846400, '', '', 3, '/uploads/images/tech/te04.jpg', '', '', '', 3, 1, 1, 'admin', '/uploads/images/tech/tech04.jpg', '', 1571927000, 45, '中空纤维膜以具有选择渗透性的中空纤维丝为基础制成，主要用于水处理领域。三达研发的中空纤维膜材料采用以聚偏氟乙烯(PVDF)为主材及制备而成...');
INSERT INTO `articles` VALUES (28, '陶瓷膜技术', NULL, '<p>无机陶瓷膜具有耐高温、耐酸碱和高机械强度等多种特性，已经成为发展迅速且极具应用前景的膜材料之一。三达研发的特种分离陶瓷膜的膜层经过亲水性处理...</p>\r\n', 1571846400, '', '', 3, '/uploads/images/tech/te03.jpg', '', '', '', 1, 1, 1, 'admin', '/uploads/images/tech/tech03.jpg', '', 1571927055, 45, '无机陶瓷膜具有耐高温、耐酸碱和高机械强度等多种特性，已经成为发展迅速且极具应用前景的膜材料之一。三达研发的特种分离陶瓷膜的膜层经过亲水性处理...');
INSERT INTO `articles` VALUES (29, '纳滤芯技术', NULL, '<p>纳滤芯主要用于饮用水净化。我国饮用水普遍面临水源地水质污染、常规水处理工艺造成的消毒副产物污染和管网输送污染，迫切需要政府加大对饮用水水质...</p>\r\n', 1571846400, '', '', 3, '/uploads/images/tech/te02.jpg', '', '', '', 1, 1, 1, 'admin', '/uploads/images/tech/tech02.jpg', '', 1571927095, 45, '纳滤芯主要用于饮用水净化。我国饮用水普遍面临水源地水质污染、常规水处理工艺造成的消毒副产物污染和管网输送污染，迫切需要政府加大对饮用水水质...');
INSERT INTO `articles` VALUES (30, 'IMBR膜技术', 'IMBR TECH', '<div class=\"title-se-art wow fadeInUp\">\r\n<h3>技术介绍</h3>\r\n</div>\r\n\r\n<div class=\"se wow fadeInUp\">\r\n<p>膜生物反应器(MBR)是一种以生物处理技术和膜分离技术结合产生的新型污水处理系统。相对活性污泥法、氧化沟法等传统污水处理方法，MBR优势在于污水处理过程省去了二沉池等工艺环节，设备占地面积大幅减少，同时处理水质好、稳定，但投资运营成本较高。</p>\r\n\r\n<p>三达膜iMBR系列产品采用公司自主研发的iMBR专用配方，膜丝使用寿命和通量显著提高;膜组件采用一体化、垂直型曝气等结构创新工艺，稳定性好、能耗低、抗污染能力强。三达的iMBR成套设备已在多个污水处理项目上得到应用，产品形成了1项发明专利和4项实用新型专利，三达还参与制订了MBR技术的现行国家标准《膜生物反应器通用技术规范》(GB/T33898-2017)。</p>\r\n</div>\r\n\r\n<div class=\"title-se-art wow fadeInUp\">\r\n<h3>技术特点</h3>\r\n</div>\r\n\r\n<div class=\"se wow fadeInUp\">\r\n<div class=\"row tech\">\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>膜的高效截留作用可使出水悬浮物浓度极低</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>可以使SRT与HRT完全分开，在维持较短的HRT的同时，又可保持极长的SRT污泥产量少</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>可以维持极高的MLSS</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>膜分离课时费水中的大分子颗粒状难降解物质在反应器内停留较长的时间最终得以除去</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>可溶性大分子化合物也可以被截留下来。不会随着水流而影响出水水质最终也可以被降解</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col col-md-6 col-lg-4\">\r\n<div class=\"item\">\r\n<p>膜截流的高效性可以使世代时间长的如硝化菌等在生物反应器内生长因此脱氮效果较好</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"title-se-art wow fadeInUp\">\r\n<h3>应用领域</h3>\r\n</div>\r\n\r\n<div class=\"se wow fadeInUp\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"市政生活污水\" src=\"/uploads/images/tech/temp1.jpg\" />\r\n<p>市政生活污水</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"生物制药\" src=\"/uploads/images/tech/temp2.jpg\" />\r\n<p>生物制药</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"石化化工\" src=\"/uploads/images/tech/temp3.jpg\" />\r\n<p>石化化工</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"垃圾渗滤液\" src=\"/uploads/images/tech/temp4.jpg\" />\r\n<p>垃圾渗滤液</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"医院废水\" src=\"/uploads/images/tech/temp5.jpg\" />\r\n<p>医院废水</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 1571846400, '', '', 3, '/uploads/images/tech/bg01.jpg', '', '', '', 30, 1, 1, 'admin', '/uploads/images/tech/tech01.jpg', '/uploads/images/tech/img.jpg', 1571927135, 45, '膜生物反应器(MBR)是一种以生物处理技术和膜分离技术结合产生的新型污水处理系统。相对活性污泥法、氧化沟法等传统污水处理方法，MBR优势在于污水...');
INSERT INTO `articles` VALUES (31, 'Flow-Cel超滤膜技术', NULL, '<p>Flow-Cel超滤膜是一种以压力差为推动力、多组膜组件整合的膜分离装置，其膜片是用聚醚砜、聚酰胺等高分子材料制成的、切割分子量在1000~10000之间的复合膜。UItra―fIo超滤膜工艺过程及配套设备...</p>\r\n', 1571846400, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb2.jpg', '', 1571929791, 46, 'Flow-Cel超滤膜是一种以压力差为推动力、多组膜组件整合的膜分离装置，其膜片是用聚醚砜、聚酰胺等高分子材料制成的、切割分子量在1000~10000之间的复合膜。UItra―fIo超滤膜工艺过程及配套设备...\r\n');
INSERT INTO `articles` VALUES (32, '超滤膜技术', NULL, '<p>超滤采用一种多孔膜作为分离阻隔层，能根据分子形态和大小将溶液分离成各个组份，膜孔的大小决定了它的分离性能。由于超滤膜的透性结构，所以只需很低的操作压力就可使液体透过膜...</p>\r\n', 1568649600, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb4.jpg', '', 1571929859, 46, '超滤采用一种多孔膜作为分离阻隔层，能根据分子形态和大小将溶液分离成各个组份，膜孔的大小决定了它的分离性能。由于超滤膜的透性结构，所以只需很低的操作压力就可使液体透过膜...\r\n');
INSERT INTO `articles` VALUES (33, '反渗透膜技术', NULL, '<p>反渗透是渗透的反向迁移运动，是一种在压力驱动下，借助于半透膜的选择截留作用将溶液中的溶质与溶剂分开的分离方法。反渗透技术广泛应用于各种液体的提纯与浓缩，其中最普遍的应用实例便是在水处理工艺...</p>\r\n', 1568563200, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb3.jpg', '', 1571929893, 46, '反渗透是渗透的反向迁移运动，是一种在压力驱动下，借助于半透膜的选择截留作用将溶液中的溶质与溶剂分开的分离方法。反渗透技术广泛应用于各种液体的提纯与浓缩，其中最普遍的应用实例便是在水处理工艺...\r\n');
INSERT INTO `articles` VALUES (34, '连续离交', NULL, '<p>连续离子交换技术是一种完全革新的分离工艺技术，不同于传统的固定床、脉冲床、模拟移动床等工艺。连续离子交换系统由树脂柱系列和多孔分配旋转阀构成，根据工艺设计可把树脂柱系列分为几个功能区，物料进入...</p>\r\n', 1568476800, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb1.jpg', '', 1571929933, 46, '连续离子交换技术是一种完全革新的分离工艺技术，不同于传统的固定床、脉冲床、模拟移动床等工艺。连续离子交换系统由树脂柱系列和多孔分配旋转阀构成，根据工艺设计可把树脂柱系列分为几个功能区，物料进入...');
INSERT INTO `articles` VALUES (35, '膜生物反应器技术', NULL, '<p>MBR是将膜分离技术与生化处理技术结合的一种新型污水处理工艺，它是利用膜微孔截留的作用，将好氧或厌氧系统的活性污泥截留在反应器中，通过提高活性污泥浓度、延长泥龄，来提高COD、BOD等污染因子...</p>\r\n', 1568390400, '', '', 3, '', '', '', '', 1, 1, 0, 'admin', '/uploads/images/tech/thumb8.jpg', '', 1571929976, 46, 'MBR是将膜分离技术与生化处理技术结合的一种新型污水处理工艺，它是利用膜微孔截留的作用，将好氧或厌氧系统的活性污泥截留在反应器中，通过提高活性污泥浓度、延长泥龄，来提高COD、BOD等污染因子...');
INSERT INTO `articles` VALUES (36, '色谱分离', NULL, '<p>工业色谱技术是基于分子间亲和力差异的先行分离手段，是分离物理及化学性质比较相近的物质的有效方法之一。是利用了不同组分之间性质上的微小差异，使不同组分与固定相分子之间作用力差异从而导致不同组...</p>\r\n', 1568304000, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb7.jpg', '', 1571930013, 46, '工业色谱技术是基于分子间亲和力差异的先行分离手段，是分离物理及化学性质比较相近的物质的有效方法之一。是利用了不同组分之间性质上的微小差异，使不同组分与固定相分子之间作用力差异从而导致不同组...');
INSERT INTO `articles` VALUES (37, '微管膜技术', NULL, '<p>随着国内工业生产技术的不断升级改进，膜分离技术以期精准的分割能力,已广泛的应用于工业生产。近年来多数企业的产品脱盐浓缩在低浓度的条件下，多数采用卷式纳滤或反渗透工艺，随着膜技术应用要求的不断发展，对...</p>\r\n', 1568217600, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb6.jpg', '', 1571930048, 46, '随着国内工业生产技术的不断升级改进，膜分离技术以期精准的分割能力,已广泛的应用于工业生产。近年来多数企业的产品脱盐浓缩在低浓度的条件下，多数采用卷式纳滤或反渗透工艺，随着膜技术应用要求的不断发展，对...');
INSERT INTO `articles` VALUES (38, '厌氧技术', NULL, '<p>UASB Plus(UP)综合UASB、EGSB/IC反应器在制药、PTA、高浓度废水污水处理的运行工况，并结合不断改进的主工艺排水水质而开发的改进型UASB；UASB Plus(UP)反应器主要由配水系统、反应区、三相分离器...</p>\r\n', 1568131200, '', '', 3, '', '', '', '', 0, 1, 0, 'admin', '/uploads/images/tech/thumb5.jpg', '', 1571930079, 46, 'UASB Plus(UP)综合UASB、EGSB/IC反应器在制药、PTA、高浓度废水污水处理的运行工况，并结合不断改进的主工艺排水水质而开发的改进型UASB；UASB Plus(UP)反应器主要由配水系统、反应区、三相分离器...\r\n');
COMMIT;

-- ----------------------------
-- Table structure for carousels
-- ----------------------------
DROP TABLE IF EXISTS `carousels`;
CREATE TABLE `carousels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of carousels
-- ----------------------------
BEGIN;
INSERT INTO `carousels` VALUES (11, '科技创新，让环保更简单1', '发 展 历 程', 0, 'http://www.baidu.com', 1, 'admin', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/banner01.jpg', 1, NULL, NULL);
INSERT INTO `carousels` VALUES (7, '科技创新，让环保更简单', '最具价值水处理国产膜品牌', 0, '', 1, 'water', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/banner01.jpg', 1, NULL, NULL);
INSERT INTO `carousels` VALUES (12, '科技创新，让环保更简单2', '发 展 历 程', 0, '', 1, 'admin', '/uploads/images/carousels/banner01.jpg', '/uploads/images/carousels/banner01.jpg', 1, NULL, NULL);
INSERT INTO `carousels` VALUES (13, '关于我们', 'ABOUT', 0, '', 3, 'admin', '/uploads/images/carousels/about.jpg', '', 1, NULL, NULL);
INSERT INTO `carousels` VALUES (14, '资讯中心', 'NEWS', 0, '', 5, 'admin', '/uploads/images/carousels/news.jpg', '', 1, NULL, NULL);
INSERT INTO `carousels` VALUES (15, '投资者关系', '10个字左右介绍介绍介绍介绍介绍', 0, '', 4, 'admin', '/uploads/images/carousels/invest.jpg', '', 1, NULL, NULL);
INSERT INTO `carousels` VALUES (16, '加入三达', '', 0, '', 6, 'admin', '/uploads/images/carousels/jion.jpg', '', 1, NULL, NULL);
INSERT INTO `carousels` VALUES (17, '应用领域', 'APPLICATION', 0, '', 7, 'admin', '/uploads/images/carousels/app.png', '', 1, NULL, NULL);
INSERT INTO `carousels` VALUES (18, '应用案例', '', 0, '', 9, 'admin', '/uploads/images/carousels/case.png', '', 1, NULL, NULL);
INSERT INTO `carousels` VALUES (19, '产品中心', 'PRODUCTS', 0, '', 10, 'admin', '/uploads/images/carousels/product.jpg', '', 1, NULL, NULL);
INSERT INTO `carousels` VALUES (20, '环境服务', 'ENVIRONMENT', 0, '', 11, 'admin', '/uploads/images/carousels/env.jpg', '', 1, NULL, NULL);
INSERT INTO `carousels` VALUES (21, '核心技术', 'TECHNOLOGY', 0, '', 12, 'admin', '/uploads/images/carousels/tech.jpg', '', 1, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for case_categories
-- ----------------------------
DROP TABLE IF EXISTS `case_categories`;
CREATE TABLE `case_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `title_en` varchar(150) NOT NULL,
  `imageurl` varchar(150) NOT NULL,
  `active` bit(1) NOT NULL,
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of case_categories
-- ----------------------------
BEGIN;
INSERT INTO `case_categories` VALUES (3, '中水回用及零排放', '', '/uploads/images/application/appdetail1.jpg', b'1', 1557113379, 0);
INSERT INTO `case_categories` VALUES (4, '食品饮料', '', '/uploads/images/application/app5.jpg', b'1', 1557113406, 0);
INSERT INTO `case_categories` VALUES (5, '生物制药', '', '/uploads/images/application/app3.jpg', b'1', 1557113425, 0);
INSERT INTO `case_categories` VALUES (6, '环保水处理 ', '', '/uploads/images/application/app4.jpg', b'1', 1557113445, 0);
COMMIT;

-- ----------------------------
-- Table structure for cases
-- ----------------------------
DROP TABLE IF EXISTS `cases`;
CREATE TABLE `cases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `added_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cases
-- ----------------------------
BEGIN;
INSERT INTO `cases` VALUES (2, '生物样本分析', '/uploads/images/cases/case4.jpg', 6, '', '本项目的水源水质变化较大，丰水期原水水质较好，枯水期原水含氯离子、铁离子浓度高，尤其是涨潮落潮时浓度变化大。根据潮涨潮落的水质变化情况，设计间歇取水，即在潭江水质较好的情况，将原水在短时间内...', 0, b'0', -28800, 4, '', '', 1, 1546612953, 'admin');
INSERT INTO `cases` VALUES (3, '生物样本分析', '/uploads/images/cases/case1.jpg', 3, '<p>fdsdfs</p>\r\n', 'fdsfsd', 0, b'0', -28800, 9, '', '', 1, 1546613043, 'admin');
INSERT INTO `cases` VALUES (4, '生物样本分析', '/uploads/images/cases/case4.jpg', 3, '<p>dfsd</p>\r\n', 'fds', 0, b'0', 1546272000, 15, '', '', 1, 1546613139, 'admin');
INSERT INTO `cases` VALUES (6, '生物样本分析ASGA', '/uploads/images/cases/case3.jpg', 6, '<p>sdds</p>\r\n', 'ds', 12, b'0', 1551715200, 18, '', '', 1, 1546613621, 'admin');
INSERT INTO `cases` VALUES (8, '生物样本分析123', '/uploads/images/cases/case2.jpg', 6, '<p>ds</p>\r\n', 'fds', 0, b'0', -28800, 2, '32', '32', 1, 1546613654, 'admin');
INSERT INTO `cases` VALUES (15, '生物样本分析', '/uploads/images/cases/case4.jpg', 5, '<p>xczxczx</p>\r\n', 'cxzcxz', 0, b'0', -28800, 1, '', '', 1, 1546613708, 'admin');
INSERT INTO `cases` VALUES (16, '生物样本分析ASGA【拷贝】', '/uploads/images/cases/case2.jpg', 5, '<p>sdds</p>\r\n', 'ds', 12, b'0', 1570896000, 43, '', '', 1, 1570933115, 'admin');
INSERT INTO `cases` VALUES (17, '造纸行业亚海水淡化项目', '/uploads/images/cases/case1.jpg', 3, '<p>本项目的水源水质变化较大，丰水期原水水质较好，枯水期原水含氯离子、铁离子浓度高，尤其是涨潮落潮时浓度变化大。根据潮涨潮落的水质变化情况，设计间歇取水，即在潭江水质较好的情况，将原水在短时间内（每天的取水时间约为6－8小时）取到厂内蓄水池中，蓄水池容量60000m3。</p>\r\n\r\n<p>本项目的设计规模是43000m3/天，采用&ldquo;混沉沉淀&ndash;滤池&ndash;UF&mdash;RO&rdquo; ，回收率63%－70%</p>\r\n\r\n<div class=\"table-container\">\r\n<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>项目</th>\r\n			<th>单位</th>\r\n			<th>进水</th>\r\n			<th>出水</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>COD</td>\r\n			<td>mg/L</td>\r\n			<td>&lt; 10</td>\r\n			<td>~0</td>\r\n		</tr>\r\n		<tr>\r\n			<td>电导率</td>\r\n			<td>&mu;s/cm</td>\r\n			<td>20000</td>\r\n			<td>&lt; 400</td>\r\n		</tr>\r\n		<tr>\r\n			<td>硬度</td>\r\n			<td>mg/L</td>\r\n			<td>500</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '本项目的水源水质变化较大，丰水期原水水质较好，枯水期原水含氯离子、铁离子浓度高，尤其是涨潮落潮时浓度变化大。根据潮涨潮落的水质变化情况，设计间歇取水，即在潭江水质较好的情况，将原水在短时间内...', 0, b'0', 1570896000, 32, '', '', 1, 1570933455, 'admin');
COMMIT;

-- ----------------------------
-- Table structure for chronicles
-- ----------------------------
DROP TABLE IF EXISTS `chronicles`;
CREATE TABLE `chronicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `month` int(4) DEFAULT NULL,
  `image_url` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `added_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of chronicles
-- ----------------------------
BEGIN;
INSERT INTO `chronicles` VALUES (3, 2004, 4, '/uploads/images/chronicle/pz63 copy 7.png', '与海外跨国药企建立合作，共同开发中国市场\r\n', 13, 'admin', 1559012479);
INSERT INTO `chronicles` VALUES (4, 2008, 2, '/uploads/images/chronicle/pz63 copy 6.png', '与海外跨国药企建立合作，共同开发中国市场', 13, 'admin', 1559012506);
INSERT INTO `chronicles` VALUES (5, 2009, 3, '/uploads/images/chronicle/pz63 copy 5.png', '多个仿制产品上市，形成了研发、委托生产、销售为一体的产业链', 13, 'admin', 1559012526);
INSERT INTO `chronicles` VALUES (6, 2014, 8, '/uploads/images/chronicle/pz63 copy 4.png', '与美国Navdiea公司签署Technetium (99mTc) tilmanocept产品的中国权利授权协议，Technetium (99mTc) tilmanocept是FDA此前十年批准的唯一一个99mTc标记的新药，用于实体瘤手术中的前哨淋巴结定位', 13, 'admin', 1559012547);
INSERT INTO `chronicles` VALUES (7, 2016, 3, '', '并购单克隆抗体药物开发生物技术平台，成立先通生物，取得十二五重大新药创制品种CTB006全球权利', 14, 'admin', 1559577103);
INSERT INTO `chronicles` VALUES (8, 2015, 10, '/uploads/chronicle/about_course_01.jpg', '全资子公司美国先通（Sinotau USA Inc.）在波士顿成立', 13, 'admin', 1560563482);
INSERT INTO `chronicles` VALUES (9, 2015, 11, '/uploads/images/chronicle/pz63 copy 3.png', '投资入股加拿大Enigma公司', 13, 'admin', 1560563496);
INSERT INTO `chronicles` VALUES (10, 2016, 2, '', '与加拿大Enigma公司合作，在波士顿成立美国合资公司Cerveau Technologies，Inc.公司', 14, 'admin', 1560565801);
INSERT INTO `chronicles` VALUES (11, 2016, 11, '', '完成A轮1.3亿元人民币融资，深圳物明基金领投', 0, 'admin', 1564841273);
INSERT INTO `chronicles` VALUES (12, 2016, 6, '', '从美国FluoroPharma Medical公司许可麻省总医院开发的核心脏诊断药物\r\nCardioPET和BFPET的中国权利', 0, 'admin', 1564841309);
INSERT INTO `chronicles` VALUES (13, 2016, 12, '/uploads/images/chronicle/pz63 copy 2.png', 'Cerveau公司从美国MERCK SHARP & DOHME CORP.公司取得MK6240\r\n全球商业开发权利', 0, 'admin', 1564841334);
INSERT INTO `chronicles` VALUES (14, 2017, 6, '', '完成B轮1.5亿元人民币融资，启明创投领投，公司部分员工参与定增，成为公司股东', 0, 'admin', 1564841373);
INSERT INTO `chronicles` VALUES (15, 2017, 7, '', '先通医药获得专利独占许可用于制造正电子心肌灌注显像剂氟[18F]心酮注\r\n射液（MyoZone 18F] Injection）', 0, 'admin', 1564841398);
INSERT INTO `chronicles` VALUES (16, 2017, 7, '', '先通医药与Cerveau Technologies，Inc.签订MK6240中国权利许可协议，\r\nMK6240是全球领先的用于阿尔兹海默症的tau蛋白诊断药物', 0, 'admin', 1564841427);
INSERT INTO `chronicles` VALUES (17, 2017, 8, '', '与Piramal Imaging SA签订产品Neuraceq 中国权利许可协议，Neuraceq \r\n是用于阿尔兹海默症的Aβ淀粉样蛋白诊断药物', 0, 'admin', 1564841443);
INSERT INTO `chronicles` VALUES (18, 2017, 9, '', '成立广东先通分子影像有限公司', 0, 'admin', 1564841465);
INSERT INTO `chronicles` VALUES (19, 2017, 12, '/uploads/images/chronicle/pz63 copy.png', '成立江苏先通分子影像有限公司', 0, 'admin', 1564841479);
INSERT INTO `chronicles` VALUES (20, 2018, 6, '', '成立先通云医药科技有限公司，开启了放射药的推广工作', 0, 'admin', 1564841497);
INSERT INTO `chronicles` VALUES (21, 2018, 7, '', '取得原子高科mibi的全国推广权利', 0, 'admin', 1564841626);
INSERT INTO `chronicles` VALUES (22, 2018, 9, '', '取得美国国立卫生研究院（NIH）核素治疗前列腺癌的新药全球授权', 0, 'admin', 1564841653);
INSERT INTO `chronicles` VALUES (23, 2018, 12, '/uploads/images/chronicle/pz63.png', '取得美国国立卫生研究院（NIH）核素治疗前列腺癌的新药全球授权', 0, 'admin', 1564841668);
COMMIT;

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of countries
-- ----------------------------
BEGIN;
INSERT INTO `countries` VALUES (42, '加拿大', 1, 1569830184, 0);
INSERT INTO `countries` VALUES (43, '美国', 1, 1569830391, 0);
INSERT INTO `countries` VALUES (44, '英国', 1, 1569830399, 0);
COMMIT;

-- ----------------------------
-- Table structure for dictionaries
-- ----------------------------
DROP TABLE IF EXISTS `dictionaries`;
CREATE TABLE `dictionaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `PK_Dic_DicType` (`type_id`),
  CONSTRAINT `PK_Dic_DicType` FOREIGN KEY (`type_id`) REFERENCES `dictionary_type` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dictionaries
-- ----------------------------
BEGIN;
INSERT INTO `dictionaries` VALUES (1, '新闻资讯', 1);
INSERT INTO `dictionaries` VALUES (2, '高管团队', 4);
INSERT INTO `dictionaries` VALUES (3, '核心技术', 1);
INSERT INTO `dictionaries` VALUES (4, '产品系列', 8);
INSERT INTO `dictionaries` VALUES (5, '产品配件', 8);
INSERT INTO `dictionaries` VALUES (6, '应用领域', 1);
INSERT INTO `dictionaries` VALUES (7, '社会招聘', 10);
INSERT INTO `dictionaries` VALUES (8, '校园招聘', 10);
INSERT INTO `dictionaries` VALUES (13, '发展历程', 2);
INSERT INTO `dictionaries` VALUES (14, '企业荣誉', 2);
INSERT INTO `dictionaries` VALUES (16, '应用案例', 1);
INSERT INTO `dictionaries` VALUES (17, '产品视频', 3);
INSERT INTO `dictionaries` VALUES (18, '品牌视频', 3);
INSERT INTO `dictionaries` VALUES (23, '《微创时代》报纸', 5);
INSERT INTO `dictionaries` VALUES (24, '《微创时代》杂志', 5);
INSERT INTO `dictionaries` VALUES (26, '相关案例', 6);
INSERT INTO `dictionaries` VALUES (27, '相关文档', 6);
INSERT INTO `dictionaries` VALUES (32, '前台主导航', 7);
INSERT INTO `dictionaries` VALUES (34, '上海', 9);
INSERT INTO `dictionaries` VALUES (40, '页底导航', 7);
INSERT INTO `dictionaries` VALUES (41, '合作伙伴', 11);
INSERT INTO `dictionaries` VALUES (43, '成都', 9);
INSERT INTO `dictionaries` VALUES (44, '美术', 12);
INSERT INTO `dictionaries` VALUES (45, '音乐', 12);
COMMIT;

-- ----------------------------
-- Table structure for dictionary_type
-- ----------------------------
DROP TABLE IF EXISTS `dictionary_type`;
CREATE TABLE `dictionary_type` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dictionary_type
-- ----------------------------
BEGIN;
INSERT INTO `dictionary_type` VALUES (1, '文章管理');
INSERT INTO `dictionary_type` VALUES (2, '荣誉资质');
INSERT INTO `dictionary_type` VALUES (3, '视频中心');
INSERT INTO `dictionary_type` VALUES (4, '管理团队');
INSERT INTO `dictionary_type` VALUES (5, '内刊');
INSERT INTO `dictionary_type` VALUES (6, '产品附件');
INSERT INTO `dictionary_type` VALUES (7, '导航');
INSERT INTO `dictionary_type` VALUES (8, '产品');
INSERT INTO `dictionary_type` VALUES (9, '工作城市');
INSERT INTO `dictionary_type` VALUES (10, '职位类别');
INSERT INTO `dictionary_type` VALUES (11, '链接');
INSERT INTO `dictionary_type` VALUES (12, '专业介绍');
COMMIT;

-- ----------------------------
-- Table structure for distributors
-- ----------------------------
DROP TABLE IF EXISTS `distributors`;
CREATE TABLE `distributors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of distributors
-- ----------------------------
BEGIN;
INSERT INTO `distributors` VALUES (13, 'MicroPort CRM', '-74.475631,40.553841', '+1 (732) 624-9050', '', '美国新泽西', 27, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_03.png', '/uploads/branch/about_branch_03.jpg', 1425271071, 'wateradmin', '美国新泽西州皮斯卡塔韦市威尔路35号', 0);
INSERT INTO `distributors` VALUES (14, '上海微创心脉医疗科技股份有限公司', '114.338005,30.542371', '+86-27-59352192', '', '武汉', 26, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_04.png', '/uploads/branch/about_branch_04.jpg', 1425271175, 'wateradmin', '武汉市武昌区中南路7号中商广场写字楼B3108室', 1);
INSERT INTO `distributors` VALUES (15, '上海微创电生理医疗科技股份有限公司', '121.410713,31.212312', '+86-21-62556153', '', '上海', 25, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_05.png', '/uploads/branch/about_branch_05.jpg', 1425271203, 'wateradmin', '上海市长宁区仙霞路137号盛高国际大厦2301室', 1);
INSERT INTO `distributors` VALUES (16, '微创神通医疗科技（上海）有限公司', '116.506823,39.899829', '+86-10-52345921-811', '+86 13693083029 朱女士', '北京', 24, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_06.png', '/uploads/branch/about_branch_06.jpg', 1425271232, 'wateradmin', '北京市朝阳区广渠路11号院1号楼金泰国际大厦A座1507-1508室', 1);
INSERT INTO `distributors` VALUES (17, '苏州微创骨科学（集团）有限公司', '118.839437,31.939679', '+86-25-58707829', 'http://www.baidu.com', '南京(总部)', 23, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_02.png', '/uploads/branch/about_branch_02.jpg', 1425271263, 'wateradmin', '南京市江宁区菲尼克斯路99号', 1);
INSERT INTO `distributors` VALUES (73, 'MicroPort Orthopedics Inc.', '518000', '153 6182 8193', 'http://www.baidu.com', '153 6182 8193', 0, '<p>gdvxc</p>\r\n', '/uploads/subcompany/about_branch_logo_01.png', '/uploads/branch/about_branch_01.jpg', 1558368003, 'admin', '深圳市龙岗区坂田街道雪象社区园东工业园A栋5楼(B门上)', 1);
INSERT INTO `distributors` VALUES (74, '上海微创心通医疗科技有限公司', '534', '5435', 'http://www.baidu.com', '543', 0, '', '/uploads/subcompany/about_branch_logo_07.png', '/uploads/branch/about_branch_07.jpg', 1560519176, 'admin', 'test', 1);
INSERT INTO `distributors` VALUES (75, '上海微创生命科技有限公司', 'cxzcxz', 'cxzczx', 'http://www.baidu.com', 'cxzczx', 0, '', '/uploads/subcompany/about_branch_logo_08.png', '/uploads/branch/about_branch_08.jpg', 1560519231, 'admin', 'xczxczx', 1);
INSERT INTO `distributors` VALUES (76, '东莞科威医疗器械有限公司', '543534', '15361828193', 'http://www.baidu.com', '153 6182 8193', 0, '', '/uploads/subcompany/about_branch_logo_09.png', '/uploads/branch/about_branch_09.jpg', 1560519280, 'admin', 'fsdfds', 1);
INSERT INTO `distributors` VALUES (77, '上海微创龙脉医疗器材有限公司', 'fds', 'fds', 'http://www.baidu.com', '153 6182 8193', 0, '', '/uploads/subcompany/about_branch_logo_10.png', '/uploads/branch/about_branch_10.jpg', 1560519368, 'admin', 'dsfds', 1);
INSERT INTO `distributors` VALUES (78, '创领心律管理医疗器械（上海）有限公司', '518000', '15361828193', 'http://www.baidu.com', '153 6182 8193', 0, '', '/uploads/subcompany/about_branch_logo_11.png', '/uploads/branch/about_branch_11.jpg', 1560519448, 'admin', 'fsdfds', 1);
INSERT INTO `distributors` VALUES (79, 'MicroPort CRM【拷贝】', '-74.475631,40.553841', '+1 (732) 624-9050', '', '美国新泽西', 27, '<p>test</p>\r\n', '/uploads/subcompany/about_branch_logo_03.png', '/uploads/branch/about_branch_03.jpg', 1575413804, 'wateradmin', '美国新泽西州皮斯卡塔韦市威尔路35号', 0);
COMMIT;

-- ----------------------------
-- Table structure for documents
-- ----------------------------
DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `added_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of documents
-- ----------------------------
BEGIN;
INSERT INTO `documents` VALUES (2, '2018年第32期', '微创荣获2018年度上海市质量金奖', '/uploads/documents/beauty_study.pdf', '765.64 KB', '/uploads/documents/news_magazine.jpg', 23, 9, 1, 23, 'admin', 1558973791);
INSERT INTO `documents` VALUES (3, '2018年第31期', '', '/uploads/documents/beauty_study.pdf', '765.64 KB', '/uploads/documents/news_magazine.jpg', 24, 3, 1, 24, 'admin', 1558973914);
INSERT INTO `documents` VALUES (5, '期刊一', '', '/uploads/documents/beauty_study.pdf', '765.64 KB', '/uploads/documents/news_magazine.jpg', 24, 0, 1, 24, 'admin', 1558973915);
INSERT INTO `documents` VALUES (10, '2019年第2期  总第122期', '微创荣获2018年度上海市质量金奖', '/uploads/documents/beauty_study.pdf', '765.64 KB', '/uploads/documents/news_magazine.jpg', 0, 0, 1, 23, 'admin', 1558973919);
COMMIT;

-- ----------------------------
-- Table structure for i18n
-- ----------------------------
DROP TABLE IF EXISTS `i18n`;
CREATE TABLE `i18n` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `translation` json NOT NULL,
  `created_by` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `population` int(11) NOT NULL,
  `content` text NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jobs
-- ----------------------------
BEGIN;
INSERT INTO `jobs` VALUES (6, '财务人员', '社会招聘', '', 5, '<p>工作描述：</p>\r\n\r\n<p>1、负责研发产品PCBA评审，提出EMC、安规方面设计建议；</p>\r\n\r\n<p>2、负责研发阶段产品ESD、辐射、传导等EMC和安规方面的审核和提出整改方案；</p>\r\n\r\n<p>3、对新产品的产品进行EMC和安规方面的测试；</p>\r\n\r\n<p>4、负责产品CE、KC、CB、FCC、ROHS、CQC等认证工作，并就不良项进行整改或对接整改公司进行整改；</p>\r\n\r\n<p>5、负责EMC及安规资料简历及维护，测试仪器维护。</p>\r\n\r\n<p>资历：</p>\r\n\r\n<p>1、电子、自动化相关专业，大专以上学历；</p>\r\n\r\n<p>2、具备基本电路分析能力，3年以上电子产品认证测试、整改经验；</p>\r\n\r\n<p>3、熟悉电子产品的CE、KC、CB、FCC、ROHS、CQC测试；</p>\r\n\r\n<p>4、需在产品研发端对产品进行EMC、安规设计的风险评估，并能帮助研发端进行EMC、安规整改的能力；</p>\r\n\r\n<p>5、熟悉国际国内认证的流程及相关标准、法规，能处理测试和认证中的技术问题；</p>\r\n\r\n<p>6、熟悉LED灯具相关认证标准，如EN&nbsp;55032，EN301489等，有LED等具整改经验优先。</p>\r\n\r\n<p>&nbsp;</p>\r\n', 0, 1, 1546517824, 'admin');
INSERT INTO `jobs` VALUES (7, '出纳人员', '校园招聘', '', 2, '<div class=\"cont_title\">工作描述：</div>\r\n\r\n<p>1、负责研发产品PCBA评审，提出EMC、安规方面设计建议；</p>\r\n\r\n<p>2、负责研发阶段产品ESD、辐射、传导等EMC和安规方面的审核和提出整改方案；</p>\r\n\r\n<p>3、对新产品的产品进行EMC和安规方面的测试；</p>\r\n\r\n<p>4、负责产品CE、KC、CB、FCC、ROHS、CQC等认证工作，并就不良项进行整改或对接整改公司进行整改；</p>\r\n\r\n<p>5、负责EMC及安规资料简历及维护，测试仪器维护。</p>\r\n\r\n<div class=\"cont_title\">资历：</div>\r\n\r\n<p>1、电子、自动化相关专业，大专以上学历；</p>\r\n\r\n<p>2、具备基本电路分析能力，3年以上电子产品认证测试、整改经验；</p>\r\n\r\n<p>3、熟悉电子产品的CE、KC、CB、FCC、ROHS、CQC测试；</p>\r\n\r\n<p>4、需在产品研发端对产品进行EMC、安规设计的风险评估，并能帮助研发端进行EMC、安规整改的能力；</p>\r\n\r\n<p>5、熟悉国际国内认证的流程及相关标准、法规，能处理测试和认证中的技术问题；</p>\r\n\r\n<p>6、熟悉LED灯具相关认证标准，如EN&nbsp;55032，EN301489等，有LED等具整改经验优先。</p>\r\n', 0, 1, 1562077827, 'admin');
INSERT INTO `jobs` VALUES (8, '运维技术员', '社会招聘', '', 1, '<p>工作描述：</p>\r\n\r\n<p>1、负责研发产品PCBA评审，提出EMC、安规方面设计建议；</p>\r\n\r\n<p>2、负责研发阶段产品ESD、辐射、传导等EMC和安规方面的审核和提出整改方案；</p>\r\n\r\n<p>3、对新产品的产品进行EMC和安规方面的测试；</p>\r\n\r\n<p>4、负责产品CE、KC、CB、FCC、ROHS、CQC等认证工作，并就不良项进行整改或对接整改公司进行整改；</p>\r\n\r\n<p>5、负责EMC及安规资料简历及维护，测试仪器维护。</p>\r\n\r\n<p>资历：</p>\r\n\r\n<p>1、电子、自动化相关专业，大专以上学历；</p>\r\n\r\n<p>2、具备基本电路分析能力，3年以上电子产品认证测试、整改经验；</p>\r\n\r\n<p>3、熟悉电子产品的CE、KC、CB、FCC、ROHS、CQC测试；</p>\r\n\r\n<p>4、需在产品研发端对产品进行EMC、安规设计的风险评估，并能帮助研发端进行EMC、安规整改的能力；</p>\r\n\r\n<p>5、熟悉国际国内认证的流程及相关标准、法规，能处理测试和认证中的技术问题；</p>\r\n\r\n<p>6、熟悉LED灯具相关认证标准，如EN&nbsp;55032，EN301489等，有LED等具整改经验优先。</p>\r\n', 0, 1, 1564973282, 'admin');
INSERT INTO `jobs` VALUES (9, '新记录', '社会招聘', '', 1, '<p>工作描述：</p>\r\n\r\n<p>1、负责研发产品PCBA评审，提出EMC、安规方面设计建议；</p>\r\n\r\n<p>2、负责研发阶段产品ESD、辐射、传导等EMC和安规方面的审核和提出整改方案；</p>\r\n\r\n<p>3、对新产品的产品进行EMC和安规方面的测试；</p>\r\n\r\n<p>4、负责产品CE、KC、CB、FCC、ROHS、CQC等认证工作，并就不良项进行整改或对接整改公司进行整改；</p>\r\n\r\n<p>5、负责EMC及安规资料简历及维护，测试仪器维护。</p>\r\n\r\n<p>资历：</p>\r\n\r\n<p>1、电子、自动化相关专业，大专以上学历；</p>\r\n\r\n<p>2、具备基本电路分析能力，3年以上电子产品认证测试、整改经验；</p>\r\n\r\n<p>3、熟悉电子产品的CE、KC、CB、FCC、ROHS、CQC测试；</p>\r\n\r\n<p>4、需在产品研发端对产品进行EMC、安规设计的风险评估，并能帮助研发端进行EMC、安规整改的能力；</p>\r\n\r\n<p>5、熟悉国际国内认证的流程及相关标准、法规，能处理测试和认证中的技术问题；</p>\r\n\r\n<p>6、熟悉LED灯具相关认证标准，如EN&nbsp;55032，EN301489等，有LED等具整改经验优先。</p>\r\n', 0, 1, 1575379139, 'admin');
COMMIT;

-- ----------------------------
-- Table structure for links
-- ----------------------------
DROP TABLE IF EXISTS `links`;
CREATE TABLE `links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dictionary_id` int(11) DEFAULT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of links
-- ----------------------------
BEGIN;
INSERT INTO `links` VALUES (1, 'school-1', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:25:32', '2019-11-20 12:03:14');
INSERT INTO `links` VALUES (2, 'school-2', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:30:12', '2019-11-20 12:03:07');
INSERT INTO `links` VALUES (3, 'school-3', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:30:20', '2019-11-20 12:03:22');
INSERT INTO `links` VALUES (4, 'school-4', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:30:26', '2019-11-20 12:02:59');
INSERT INTO `links` VALUES (5, 'school-5', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:30:33', '2019-11-20 12:02:47');
INSERT INTO `links` VALUES (6, 'school-6', '', '', '/uploads/images/logo_color.png', 41, 0, 1, 0, 'admin', '2019-10-01 14:30:41', '2019-11-20 12:02:38');
COMMIT;

-- ----------------------------
-- Table structure for major_categories
-- ----------------------------
DROP TABLE IF EXISTS `major_categories`;
CREATE TABLE `major_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of major_categories
-- ----------------------------
BEGIN;
INSERT INTO `major_categories` VALUES (13, '默认分类', 44, 1, 1559027615, 10);
INSERT INTO `major_categories` VALUES (38, '古典音乐类', 45, 1, 1558324794, 9);
INSERT INTO `major_categories` VALUES (39, '流行音乐类', 45, 1, 1569759305, 8);
INSERT INTO `major_categories` VALUES (40, '创作制作类', 45, 1, 1569759325, 7);
INSERT INTO `major_categories` VALUES (41, '其他类', 45, 1, 1569759586, 0);
COMMIT;

-- ----------------------------
-- Table structure for majors
-- ----------------------------
DROP TABLE IF EXISTS `majors`;
CREATE TABLE `majors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `dictionary_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` varchar(50) NOT NULL,
  `added_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of majors
-- ----------------------------
BEGIN;
INSERT INTO `majors` VALUES (1, '插画', '/uploads/majors/art_p_02.jpg', 0, 44, 13, 1, 1, 'admin', 1569767634);
INSERT INTO `majors` VALUES (2, '平面设计', '/uploads/majors/art_p_01.jpg', 0, 44, 13, 1, 1, 'admin', 1569767749);
INSERT INTO `majors` VALUES (3, '游戏设计', '/uploads/majors/art_p_03.jpg', 0, 44, 13, 1, 1, 'admin', 1569771614);
INSERT INTO `majors` VALUES (4, '动画设计', '/uploads/majors/art_p_04.jpg', 0, 44, 13, 1, 1, 'admin', 1569771660);
INSERT INTO `majors` VALUES (5, '纯艺', '/uploads/majors/art_p_05.jpg', 0, 44, 13, 1, 1, 'admin', 1569771741);
INSERT INTO `majors` VALUES (6, '雕塑', '/uploads/majors/art_p_06.jpg', 0, 44, 13, 1, 1, 'admin', 1569771759);
INSERT INTO `majors` VALUES (7, '装置设计', '/uploads/majors/art_p_07.jpg', 0, 44, 13, 1, 1, 'admin', 1569771772);
INSERT INTO `majors` VALUES (8, '新媒体设计', '/uploads/majors/art_p_08.jpg', 0, 44, 13, 1, 1, 'admin', 1569771788);
INSERT INTO `majors` VALUES (9, '工业设计', '/uploads/majors/art_p_09.jpg', 0, 44, 13, 1, 1, 'admin', 1569771797);
INSERT INTO `majors` VALUES (10, '产品设计', '/uploads/majors/art_p_10.jpg', 0, 44, 13, 1, 1, 'admin', 1569771806);
INSERT INTO `majors` VALUES (11, '摄影', '/uploads/majors/art_p_11.jpg', 0, 44, 13, 1, 1, 'admin', 1569771821);
INSERT INTO `majors` VALUES (12, '影视制作', '/uploads/majors/art_p_12.jpg', 0, 44, 13, 1, 1, 'admin', 1569771835);
INSERT INTO `majors` VALUES (13, '建筑设计', '/uploads/majors/art_p_13.jpg', 0, 44, 13, 1, 1, 'admin', 1569771848);
INSERT INTO `majors` VALUES (14, '舞美设计', '/uploads/majors/art_p_14.jpg', 0, 44, 13, 1, 1, 'admin', 1569771873);
INSERT INTO `majors` VALUES (15, '展示设计', '/uploads/majors/art_p_15.jpg', 0, 44, 13, 1, 1, 'admin', 1569771884);
INSERT INTO `majors` VALUES (16, '策展', '/uploads/majors/art_p_16.jpg', 0, 44, 13, 1, 0, 'admin', 1569771901);
INSERT INTO `majors` VALUES (17, '服装设计', '/uploads/majors/art_p_17.jpg', 0, 44, 13, 1, 0, 'admin', 1569771913);
INSERT INTO `majors` VALUES (18, '珠宝设计', '/uploads/majors/art_p_18.jpg', 0, 44, 13, 1, 0, 'admin', 1569771924);
INSERT INTO `majors` VALUES (19, '纺细品设计', '/uploads/majors/art_p_19.jpg', 0, 44, 13, 1, 0, 'admin', 1569771938);
INSERT INTO `majors` VALUES (20, '交互设计', '/uploads/majors/art_p_20.jpg', 0, 44, 13, 1, 0, 'admin', 1569771949);
INSERT INTO `majors` VALUES (21, 'CaLARTS', '/uploads/schools/school001.jpg', 0, 44, 0, 1, 0, 'admin', 1569836288);
COMMIT;

-- ----------------------------
-- Table structure for media_links
-- ----------------------------
DROP TABLE IF EXISTS `media_links`;
CREATE TABLE `media_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `link` varchar(150) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `pubdate` int(11) NOT NULL,
  `topicsId` int(11) NOT NULL,
  `added_date` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of media_links
-- ----------------------------
BEGIN;
INSERT INTO `media_links` VALUES (1, 'Health New Jkb.com', 'http://tzgcms.com:8888/bbi-admin/media_add.php', 'Nanjing CR  Medicon Expands Partnership with Medidata to Accelerate Clinical Development  in China', 0, 1, 1546598237, 'admin', 'Healthcare');
INSERT INTO `media_links` VALUES (2, '39.net', 'http://www.baidu.com', 'Nanjing CR  Medicon Expands Partnership with Medidata to Accelerate Clinical Development  in China', 6105600, 1, 1546599431, 'admin', 'Healthcare');
INSERT INTO `media_links` VALUES (3, 'fdsfs', 'http://www.crmedresearch.com/', 'fds', 1554912000, 1, 1554988656, 'admin', 'fds');
COMMIT;

-- ----------------------------
-- Table structure for meetings
-- ----------------------------
DROP TABLE IF EXISTS `meetings`;
CREATE TABLE `meetings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `summary` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of meetings
-- ----------------------------
BEGIN;
INSERT INTO `meetings` VALUES (2, '2018 Medidata NEXT 中国区会议', '<p>本届&nbsp; Medidata NEXT 中国区会议聚焦开辟临床试验领域的新纪元，旨在以互动的形式为来宾提供从设计、执行、管理到见证临床开发全过程的实践机会。来自351家 Medidata 中国合作企业代表出席了本次会议，分别就临床试验数据分析，临床 IT 系统的全球监管和验证、临床试验项目的有效管理策略等话题展开讨论。</p>\r\n\r\n<p>希麦迪医药作为飞速发展的临床实验 CRO公司，以重要参展商的形式受邀出席了本次盛会。此次展会主要集中展示了公司在数据管理和统计领域取得的进展和成就，使来宾们在第一时间了解希麦迪在数据管理统计等领域的创新与展望。在此次展会中，希麦迪医药的展位吸引了与会者的极大关注，不少企业驻足聆听, 进行现场互动及业务咨询，加深了我们与企业的相互了解，为进一深入合作奠定了坚实基础。</p>\r\n\r\n<p>作为国际最大的 EDC系统提供商Medidata的认证合作伙伴，希麦迪数据统计团队规模已突破80人，拥有丰富的I-III期、BE、真实世界研究的数据管理和统计经验、丰富的中美项目经验和CDISC实施经验，团队成员完成过多个向FDA或EMA递交的注册研究的数据管理和统计分析项目。通过Medidata平台规范操作，更加夯实了希麦迪在早期和生物等效性（BE）研究领域的能力。</p>\r\n\r\n<p>此次参展有力促进了业内同仁对希麦迪医药的深入了解，展现了希麦迪精湛的技术服务能力。希麦迪也将充分利用本次参展的契机，协同各方资源，为客户提供更专业、优质、便捷的服务。在当前医药领域竞争激烈的大环境下，希麦迪人，正在以专业的技术能力和积极向上的态度，为广大客户提供高质量的解决方案。</p>\r\n', '2018-07-12 12:00:00', '涵盖临床前一站式服务，从LEADs(先导化合物)到PCCs(临床前候选化合物)，再到IND(申请临床研究批件)国内外申报', 'vers', 6, 1, 'admin', 'http://tzgcms.com:8888/uploads/meetings/m1.jpg', '南京市江宁区（成功报名后发送具体地点）', '上海美迪西生物医药股份有限公司', '《药学进展》编辑部|中国药科大学归国华侨联合会 |江苏省生物化学与分子生物学学会', 1546579061, '涵盖临床前一站式服务，从LEADs(先导化合物)到PCCs(临床前候选化合物)，再到IND(申请临床研究批件)国内外申报');
INSERT INTO `meetings` VALUES (3, 'fsdfs', '<p>fsdf</p>\r\n', '2019-04-10 11:15:00', '', '', 0, 0, 'admin', '', 'fdsfds', 'fds', 'fds', 1554866127, 'fsd');
COMMIT;

-- ----------------------------
-- Table structure for menus
-- ----------------------------
DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `url` varchar(150) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `importance` int(11) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus
-- ----------------------------
BEGIN;
INSERT INTO `menus` VALUES (5, '奖项荣誉', NULL, '/honor', 1, 0, 32, 1);
INSERT INTO `menus` VALUES (8, '应用领域', '', '/application', 0, 89, 32, 1);
INSERT INTO `menus` VALUES (13, '产品系列', '', '/products', 0, 81, 32, 1);
INSERT INTO `menus` VALUES (18, '解决方案', '', '/solution', 0, 80, 32, 1);
INSERT INTO `menus` VALUES (39, '法律声明', '', '/law', 0, 0, 40, 1);
INSERT INTO `menus` VALUES (40, '免责声明', '', '/disclaimer', 0, 0, 40, 1);
INSERT INTO `menus` VALUES (41, '联系格科', '', '/about/contact', 0, 0, 40, 1);
INSERT INTO `menus` VALUES (46, '关于格科', '', '/about', 0, 150, 32, 1);
INSERT INTO `menus` VALUES (47, '新闻中心', '', '/news', 0, 0, 32, 1);
INSERT INTO `menus` VALUES (48, '联系我们', '', '/about/contact', 46, 1, 32, 1);
INSERT INTO `menus` VALUES (49, '技术支持', '', '/support', 0, 0, 32, 1);
INSERT INTO `menus` VALUES (50, '移动设备', '', '/application/index-1', 8, 10, 32, 1);
INSERT INTO `menus` VALUES (51, '汽车电子', '', '/application/index-3', 8, 7, 32, 1);
INSERT INTO `menus` VALUES (55, '公司简介', '', '/about', 46, 5, 32, 1);
INSERT INTO `menus` VALUES (56, '发展历程', '', '/about/history', 46, 3, 32, 1);
INSERT INTO `menus` VALUES (71, 'USB camera', '', '/application/index-4', 8, 6, 32, 1);
INSERT INTO `menus` VALUES (72, 'DDI', '', '/products/index?cid=1', 13, 1, 32, 1);
INSERT INTO `menus` VALUES (91, '首页', '', '/', 0, 180, 32, 1);
INSERT INTO `menus` VALUES (92, '企业荣誉', '', '/about/honor', 46, 2, 32, 1);
INSERT INTO `menus` VALUES (113, '生物发酵', '', '/application/detail/23', 69, 0, 32, 1);
INSERT INTO `menus` VALUES (115, '印染行业', '', '/application/detail/25', 69, 0, 32, 1);
INSERT INTO `menus` VALUES (116, '造纸行业', '', '/application/detail/26', 69, 0, 32, 1);
INSERT INTO `menus` VALUES (119, '钢铁行业', '', '/application/detail/20', 69, 0, 32, 1);
INSERT INTO `menus` VALUES (122, '畜牧行业', '', '/application/detail/60', 69, 0, 32, 1);
INSERT INTO `menus` VALUES (124, '市政污水', '', '/application/detail/62', 69, 0, 32, 1);
INSERT INTO `menus` VALUES (127, '安防监控', '', '/application/index-2', 8, 8, 32, 1);
INSERT INTO `menus` VALUES (128, 'ISF', '', '/products/index?cid=3', 13, 1, 32, 1);
INSERT INTO `menus` VALUES (129, 'CIS', '', '/products/index?cid=2', 13, 5, 32, 1);
INSERT INTO `menus` VALUES (130, '智慧屏电视', '', '/application/index-5', 8, 0, 32, 1);
INSERT INTO `menus` VALUES (131, '生物识别&扫码', '', '/application/index-6', 8, 0, 32, 1);
COMMIT;

-- ----------------------------
-- Table structure for menus_temp
-- ----------------------------
DROP TABLE IF EXISTS `menus_temp`;
CREATE TABLE `menus_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `url` varchar(150) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `importance` int(11) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menus_temp
-- ----------------------------
BEGIN;
INSERT INTO `menus_temp` VALUES (5, '奖项荣誉', NULL, '/honor', 1, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (8, '应用领域', '', '/application', 0, 99, 32, 1);
INSERT INTO `menus_temp` VALUES (13, '产品中心', '', '/products', 0, 20, 32, 1);
INSERT INTO `menus_temp` VALUES (18, '核心技术', '', '/technology', 0, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (28, '环境服务', '', '/environmental', 0, 10, 32, 1);
INSERT INTO `menus_temp` VALUES (39, '关于我们', NULL, '/about', 0, 0, 40, 1);
INSERT INTO `menus_temp` VALUES (40, '研发与产品管线', NULL, 'products', 0, 0, 40, 1);
INSERT INTO `menus_temp` VALUES (41, '核医学', NULL, '/nuclear_medicine', 0, 0, 40, 1);
INSERT INTO `menus_temp` VALUES (42, '新闻中心', NULL, '/news', 0, 0, 40, 1);
INSERT INTO `menus_temp` VALUES (43, '职业发展', NULL, '/career', 0, 0, 40, 1);
INSERT INTO `menus_temp` VALUES (44, '联系我们', NULL, '/contact', 0, 0, 40, 1);
INSERT INTO `menus_temp` VALUES (46, '关于三达', '', '/about', 0, 150, 32, 1);
INSERT INTO `menus_temp` VALUES (47, '资讯中心', '', '/news', 0, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (48, '加入三达', '', '/jion', 46, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (49, '投资者关系', '', '/investor', 0, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (50, '膜材料', '', '/products#cateid2', 13, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (51, '膜应用', '', '/products#cateid3', 13, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (52, '公司新闻', '', '/news?cid=38', 47, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (53, '行业资讯', '', '/news?cid=13', 47, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (54, 'IMBR膜技术', '', '/technology/detail/30', 18, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (55, '公司介绍', '', '/about', 46, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (56, '董事长寄语', '', '/about/speech', 46, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (57, '发展历程', '', '/about/chronicle', 46, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (58, '企业文化', '', '/about/culture', 46, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (59, '荣誉资质', '', '/about/honors', 46, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (60, '研发实力', '', '/about/strength', 46, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (61, '交易所公告', '', '/investor', 49, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (62, '投资者关系联系方式', '', '/investor/contact', 49, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (63, '联系我们', '', '/jion', 48, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (64, '社会招聘', '', '/jion/recruitment1', 48, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (65, '校园招聘', '', '/jion/recruitment2', 48, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (66, '环保水处理', '', '/application/list/40', 8, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (67, '家用净水', '', '/application/list/41', 8, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (68, '生物制药', '', '/application/list/42', 8, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (69, '食品饮料', '', '/application/list/43', 8, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (70, '中水回收及零排放', '', '/application/list/44', 8, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (71, '膜设备', '', '/products#cateid4', 13, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (72, '清洗剂', '', '/products#cateid5', 13, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (73, '水务运营', '', '/environmental/operation', 28, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (74, '环境工程', '', '/environmental', 28, 2, 32, 1);
INSERT INTO `menus_temp` VALUES (75, ' 纳滤芯技术', '', '/technology/detail/29', 18, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (76, '陶瓷膜技术', '', '/technology/detail/28', 18, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (77, '中空纤维膜技术', '', '/technology/detail/27', 18, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (78, '其他技术', '', '/technology/list/46', 18, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (79, '首页', '', '/', 0, 160, 32, 1);
INSERT INTO `menus_temp` VALUES (80, '核心技术', '', '/about/technology', 46, 0, 32, 1);
INSERT INTO `menus_temp` VALUES (81, '污水提标', '', '/environmental/sewage', 28, 0, 32, 1);
COMMIT;

-- ----------------------------
-- Table structure for offers
-- ----------------------------
DROP TABLE IF EXISTS `offers`;
CREATE TABLE `offers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `schools` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `scholarship` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dictionary_id` int(11) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of offers
-- ----------------------------
BEGIN;
INSERT INTO `offers` VALUES (1, 'Chen同学', 'Art Center、SAIC、CCA... ', '6万1千美金', '/uploads/images/offers/offer01_03.jpg', '/uploads/images/offers/off_03.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 02:13:41', '2019-10-02 08:03:44');
INSERT INTO `offers` VALUES (2, 'Luo同学', 'Pratt、Calarts、SAIC... ', '36万8千美金', '/uploads/images/offers/offer01_05.jpg', '/uploads/images/offers/off_05.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:33:08', '2019-10-02 08:03:45');
INSERT INTO `offers` VALUES (3, 'Chen同学', 'FALMOUTH', '', '/uploads/images/offers/offer01_07.jpg', '/uploads/images/offers/off_07.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:33:45', '2019-10-02 08:03:46');
INSERT INTO `offers` VALUES (4, 'lv同学', 'FALMOUTH', '', '/uploads/images/offers/offer01_09.jpg', '/uploads/images/offers/off_09.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:34:17', '2019-10-02 08:03:48');
INSERT INTO `offers` VALUES (5, 'Wei同学', 'CSVPA、SAIC、CCA...', '', '/uploads/images/offers/offer01_16.jpg', '/uploads/images/offers/offer_03.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:34:48', '2019-10-02 08:03:49');
INSERT INTO `offers` VALUES (6, 'Wu同学', 'RISD、SCIA、Pratt... ', '15万2千美金', '/uploads/images/offers/offer01_17.jpg', '/uploads/images/offers/offer_05.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:36:04', '2019-10-02 08:03:50');
INSERT INTO `offers` VALUES (7, 'Yuan同学 ', 'UCA', '', '/uploads/images/offers/offer01_19.jpg', '/uploads/images/offers/offer_07.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:36:35', '2019-10-02 08:03:53');
INSERT INTO `offers` VALUES (8, 'Zhang同学 ', 'MICA、SAIC...', '', '/uploads/images/offers/offer01_20.jpg', '/uploads/images/offers/offer_09.jpg', 44, 0, 1, 1, 'admin', '2019-10-01 08:36:58', '2019-10-02 08:03:54');
COMMIT;

-- ----------------------------
-- Table structure for options
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `config_name` varchar(100) NOT NULL,
  `config_values` json NOT NULL,
  `added_date` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  PRIMARY KEY (`config_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of options
-- ----------------------------
BEGIN;
INSERT INTO `options` VALUES ('site_info', '{\"qq\": \"13212847\", \"logo\": \"/uploads/images/logo.png\", \"email\": \"admin828@163.com\", \"logo2\": \"/uploads/images/logo_color.png\", \"phone\": \"0592-6778100\", \"theme\": \"black\", \"weibo\": \"https://weibo.com/p/1006062456896294\", \"qrcode\": \"/uploads/images/qrcode.jpg\", \"wechat\": \"upercent\", \"address\": \"深圳市龙岗区布吉街道龙岗大道龙岗大道1188-88号\", \"company\": \"格科微电子（上海）有限公司\", \"hremail\": \"hr@nanlite.com\", \"hrphone\": \"0754-85350187\", \"hotPhone\": \"400-669-8080\", \"keywords\": \"测试\", \"sitename\": \"格科微电子\", \"hrcontact\": \"余小姐\", \"webnumber\": \"沪ICP备12006582号-1\", \"description\": \"专业的企业网建设开发\", \"email_contact\": \"\", \"enableCaching\": \"0\"}', 1564633059, 'admin');
INSERT INTO `options` VALUES ('smtp', '{\"host\": \"smtp.qq.com\", \"port\": \"465\", \"password\": \"xcpzxryvkyegbiag\", \"username\": \"13212847@qq.com\", \"SMTPSecure\": \"1\"}', 1559273651, 'admin');
COMMIT;

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pages
-- ----------------------------
BEGIN;
INSERT INTO `pages` VALUES (52, '关于格科', 'about', 100, '<h1 class=\"title\">BRIEF INTRODUCTION OF GALAXYCORE</h1>\r\n\r\n<h2 class=\"title-sub\">中国领先的图像传感器芯片设计公司</h2>\r\n\r\n<p>格科微电子（上海）有限公司创立于2003年，是中国领先的图像传感器芯片设计公司，目标瞄准全球移动设备及消费电子市场。</p>\r\n\r\n<p>我们设计、开发及销售具成本优势的高质量CMOS图像传感器芯片，该芯片可采集光学图像并转换成数字图像输出信号。我们的图像传感器主要用于功能手机、智能手机及平板计算机等移动终端。我们亦设计、开发及销售LCD驱动芯片，该装置可驱动LCD面板将图像数据显示于屏幕上。</p>\r\n\r\n<p>我们的核心实力是创新设计能力、高效及灵活的制造工序以及和供货商(例如代工厂及封装厂)、CMOS摄像模块制造商、LCD模块制造商、终端设备制造商及设计公司等业界参与者建立关系。</p>\r\n\r\n<p>我们对未来的增长信心十足，不断提升整体竞争力，巩固图像传感器行业以及LCD驱动行业的领先地位。</p>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/about_01.jpg\" /></figure>\r\n', '', 252, 1, 'admin', 1577955104, '', '');
INSERT INTO `pages` VALUES (47, '解决方案', 'solution', 98, '<h1 class=\"title\">COM</h1>\r\n\r\n<h2 class=\"title-sub\">封装技术</h2>\r\n\r\n<p>格科自主研发，基于锡焊COB的高性能第三代CIS封装技术。</p>\r\n\r\n<p>前道生产均在百级无尘室中，采用全自动高精度封装设备完成封装，出厂前进行100% 功能和外观检测，后道工艺在模组厂生产也采用自动化贴装和焊接设备，确保模组产品的性能和品质。</p>\r\n\r\n<div class=\"coms\">\r\n<div class=\"row no-gutters\">\r\n<div class=\"col-md-4\">\r\n<div class=\"item\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/solu_03.jpg\" /></div>\r\n\r\n<div class=\"num\">1st Gen</div>\r\n\r\n<div class=\"txt\">\r\n<h3>CSP</h3>\r\n\r\n<p>Chip Scale Package</p>\r\n\r\n<ul>\r\n	<li>简单的制造工艺</li>\r\n	<li>尺寸较小</li>\r\n	<li>光学性能较差</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-4\">\r\n<div class=\"item\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/solu_05.jpg\" /></div>\r\n\r\n<div class=\"num\">2st Gen</div>\r\n\r\n<div class=\"txt\">\r\n<h3>COB</h3>\r\n\r\n<p>金线超声焊COB</p>\r\n\r\n<ul>\r\n	<li>金线键合提高可靠性</li>\r\n	<li>去除CSP白玻璃提升光学性能</li>\r\n	<li>高成本和复杂的制造工艺</li>\r\n	<li>Moving Particle问题</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-4\">\r\n<div class=\"item last\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/solu_07.jpg\" /></div>\r\n\r\n<div class=\"num\">3st Gen</div>\r\n\r\n<div class=\"txt\">\r\n<h3>COM</h3>\r\n\r\n<p>锡焊COB</p>\r\n\r\n<ul>\r\n	<li>更易管控的Moving Particle</li>\r\n	<li>更少的光学系统误差</li>\r\n	<li>更高的键合可靠性</li>\r\n	<li>Moving Particle问题</li>\r\n	<li>更优异的的散热性能</li>\r\n	<li>更具成本优势的生产制造</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"title-v2\">COM的优势</div>\r\n\r\n<div class=\"youshi\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"row align-items-center r1\">\r\n<div class=\"col-auto\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/com8-1.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col\">更易管控的可动脏污（POD/POG）</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"row align-items-center r1\">\r\n<div class=\"col-auto\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/com8-2.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col\">更少的光学系统误差</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"row align-items-center r1\">\r\n<div class=\"col-auto\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/com8-3.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col\">更多的键合可靠性</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"row align-items-center r1\">\r\n<div class=\"col-auto\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/com8-4.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col\">更优异的散热性能</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"row align-items-center r1\">\r\n<div class=\"col-auto\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/com8-5.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col\">更具成本优势的生产制造</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<p>进步一了解COM封装技术，请点击下方链接在线浏览。</p>\r\n\r\n<p><a class=\"btn btn-primary\" href=\"#\">PDF下载</a></p>\r\n', '', 33, 1, 'admin', 1560918812, '', '');
INSERT INTO `pages` VALUES (48, '技术支持', 'support', 99, '<h1 class=\"title\">TECHNICAL SUPPORT</h1>\r\n\r\n<h2 class=\"title-sub\">技术支持</h2>\r\n\r\n<p>您在使用格科微产品中遇到任何问题请联系我们，我们有专业的团队会第一时间协助解决您的问题，请按需要联系格科微各地区的销售窗口。</p>\r\n\r\n<p><a class=\"btn btn-primary\" href=\"/about/contact\">联系我们</a></p>\r\n', '', 118, 1, 'admin', 1560919065, '', '');
COMMIT;

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `importance` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of positions
-- ----------------------------
BEGIN;
INSERT INTO `positions` VALUES (1, '首页轮播【全屏】', 0, 1, 'admin', 'A001', NULL, NULL);
INSERT INTO `positions` VALUES (3, '关于我们Banner【1920x600像素】', 0, 1, 'admin', 'A002', NULL, NULL);
INSERT INTO `positions` VALUES (4, '投资者关系Banner【1920x600像素】', 0, 1, 'admin', 'A003', NULL, NULL);
INSERT INTO `positions` VALUES (5, '资讯中心Banner【1920x600像素】', 0, 1, 'admin', 'A004', NULL, NULL);
INSERT INTO `positions` VALUES (6, '加入三达Banner【1920x600像素】', 0, 1, 'admin', 'A005', NULL, NULL);
INSERT INTO `positions` VALUES (7, '应用领域Banner【1920x600像素】', 0, 1, 'admin', 'A006', NULL, NULL);
INSERT INTO `positions` VALUES (9, '应用案例主图【590x380】', 0, 1, 'admin', 'A010', NULL, NULL);
INSERT INTO `positions` VALUES (10, '产品中心Banner【1920x600】', 0, 1, 'admin', 'A008', NULL, NULL);
INSERT INTO `positions` VALUES (11, '环境服务Banner[【1920x600】', 0, 1, 'admin', 'A007', NULL, NULL);
INSERT INTO `positions` VALUES (12, '核心技术Banner【1920x600】', 0, 1, 'admin', 'A009', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `title_en` varchar(150) DEFAULT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `thumbnail2` varchar(150) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `intro` text,
  `active` bit(1) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
BEGIN;
INSERT INTO `product_categories` VALUES (2, 'CIS', '', '', '', 0, '', b'1', 0, 1561968662, 0);
INSERT INTO `product_categories` VALUES (5, 'DDI', '', '', '', 0, '', b'1', 0, 1561970696, 0);
INSERT INTO `product_categories` VALUES (6, 'ISF', '', '', '', 0, '<p>dsa</p>\r\n', b'1', 0, 1578650714, 0);
COMMIT;

-- ----------------------------
-- Table structure for product_categories_v1
-- ----------------------------
DROP TABLE IF EXISTS `product_categories_v1`;
CREATE TABLE `product_categories_v1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) unsigned DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_categories_v1_parent_foreign` (`parent`),
  CONSTRAINT `product_categories_v1_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `product_categories_v1` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product_categories_v1
-- ----------------------------
BEGIN;
INSERT INTO `product_categories_v1` VALUES (1, 'DDI', NULL, 0, 1, 'admin', '2020-01-10 16:00:00', '2020-01-10 16:00:00');
INSERT INTO `product_categories_v1` VALUES (2, 'CIS', NULL, 10, 1, 'admin', '2020-01-12 05:21:19', '2020-01-12 05:24:59');
INSERT INTO `product_categories_v1` VALUES (3, 'ISF', NULL, 0, 1, 'admin', '2020-01-12 05:23:20', '2020-01-12 05:24:49');
INSERT INTO `product_categories_v1` VALUES (4, '800万-1300万像素', 2, 0, 1, 'admin', '2020-01-12 05:26:55', '2020-01-12 05:26:55');
INSERT INTO `product_categories_v1` VALUES (5, '200万-500万像素', 2, 0, 1, 'admin', '2020-01-12 05:27:18', '2020-01-12 06:31:03');
INSERT INTO `product_categories_v1` VALUES (6, '100万像素以下', 2, 0, 1, 'admin', '2020-01-12 05:27:42', '2020-01-12 05:27:42');
INSERT INTO `product_categories_v1` VALUES (7, 'HD/HD+', 1, 0, 1, 'admin', '2020-01-12 06:29:47', '2020-01-12 06:29:47');
INSERT INTO `product_categories_v1` VALUES (8, 'WVGA/FW', 1, 0, 1, 'admin', '2020-01-12 06:29:57', '2020-01-12 06:29:57');
INSERT INTO `product_categories_v1` VALUES (9, 'LQVGA', 1, 0, 1, 'admin', '2020-01-12 06:30:11', '2020-01-12 06:30:11');
INSERT INTO `product_categories_v1` VALUES (10, 'QVGA', 1, 0, 1, 'admin', '2020-01-12 06:30:22', '2020-01-12 06:30:22');
INSERT INTO `product_categories_v1` VALUES (11, 'QCIF', 1, 0, 1, 'admin', '2020-01-12 06:30:34', '2020-01-12 06:30:34');
INSERT INTO `product_categories_v1` VALUES (12, 'QQVGA', 1, 0, 1, 'admin', '2020-01-12 06:30:42', '2020-01-12 06:30:42');
COMMIT;

-- ----------------------------
-- Table structure for product_documents
-- ----------------------------
DROP TABLE IF EXISTS `product_documents`;
CREATE TABLE `product_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `file_url` varchar(150) NOT NULL,
  `dictionary_id` int(11) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `added_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_documents
-- ----------------------------
BEGIN;
INSERT INTO `product_documents` VALUES (2, 'test', 56, '/uploads/documents/beauty_study.pdf', 26, '', 0, 1560853518);
INSERT INTO `product_documents` VALUES (3, '30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展', 56, '/uploads/documents/beauty_study.pdf', 26, '', 0, 1560854086);
INSERT INTO `product_documents` VALUES (4, '30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展', 56, '/uploads/documents/beauty_study.pdf', 26, '', 0, 1560854094);
INSERT INTO `product_documents` VALUES (5, '30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强强联手，助力中国临床试验取得新进展', 56, '/uploads/documents/beauty_study.pdf', 26, '', 0, 1560854156);
INSERT INTO `product_documents` VALUES (6, '期刊一5', 56, '/uploads/documents/beauty_study.pdf', 27, '', 0, 1560854173);
INSERT INTO `product_documents` VALUES (7, '期刊一5sdfds', 56, '/uploads/documents/beauty_study.pdf', 27, '', 0, 1560854187);
INSERT INTO `product_documents` VALUES (8, '心血管介入产品', 56, '/uploads/documents/beauty_study.pdf', 27, '', 0, 1560854205);
INSERT INTO `product_documents` VALUES (9, '心血管介入产品', 56, '/uploads/documents/beauty_study.pdf', 26, '某某医院', 0, 1560862848);
INSERT INTO `product_documents` VALUES (10, 'test', 59, '/uploads/products/71.jpg', 0, '', 0, 1562121928);
COMMIT;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `summary` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (67, '800万-1300万像素', '', 2, 100, '/uploads/images/products/p23.jpg', '', '<div class=\"fadeInUp title-se-art wow\">\r\n<h3>产品简介</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<p>漳 州纳 滤科技有限公司的陶瓷膜产品是通过完整地引进德国ltN Nanovation AG 的生产工艺， 生产与德国同等质量的产品 。产品具有高通量、高强度、抗污能力强等特点。业务范围涵盖陶瓷膜及组件的研发、设计、生产、销售及售后服务。目前，陶瓷膜产品已经广泛应用千环保、食品、化工、生物工程等众多领域。</p>\r\n<img alt=\"\" src=\"/assets/img/temp/p02.jpg\" /></div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>技术特点</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"row\">\r\n<div class=\"col-md\">\r\n<div class=\"card\">\r\n<div class=\"card-header\">防团聚</div>\r\n\r\n<div class=\"card-body\">纳米分散技术给材料提供了全新的、原先所未知的特性，在生产过程中成功地防止了纳米颗粒的团聚。</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"card\">\r\n<div class=\"card-header\">虐强亲水性</div>\r\n\r\n<div class=\"card-body\">在材料中添加均匀分布的、具有亲水性的纳 米 T i 02 颗粒 ， 大大提高了陶瓷膜的通量。</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md\">\r\n<div class=\"box\">\r\n<p>通过这种技术，纳米粉末才能充分发挥其作用:</p>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/assets/img/temp/p03.jpg\" /></div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"box\">\r\n<p>纳米颗粒的团聚会影响纳米粉末的性能：</p>\r\n\r\n<div class=\"text-center\"><img alt=\"\" src=\"/assets/img/temp/p04.jpg\" /></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md\">\r\n<div class=\"box\">\r\n<div class=\"row\">\r\n<div class=\"col-auto\"><img alt=\"\" src=\"/assets/img/temp/p05.jpg\" /></div>\r\n\r\n<div class=\"col\">\r\n<p>纳米分散技术赋予陶瓷膜均一的过滤孔径与均匀的连接强度，使陶瓷膜具备高精度过滤、高抗污染、高耐磨的特性</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"box\">\r\n<div class=\"row\">\r\n<div class=\"col-auto\"><img alt=\"\" src=\"/assets/img/temp/p06.jpg\" /></div>\r\n\r\n<div class=\"col\">\r\n<p>纳米分散技术使烧结后的陶瓷膜同时具备高孔隙率与高的连接强度，耐磨性能与使用寿命大大提高</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>产品参数</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"table-container\">\r\n<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>支撑体</th>\r\n			<th>&nbsp;</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>支撑体材质</td>\r\n			<td>a-A2l 0 3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>适用PH范围</td>\r\n			<td>0-14</td>\r\n		</tr>\r\n		<tr>\r\n			<td>破坏压力</td>\r\n			<td>25mm ;:,::4Mpa<br />\r\n			破坏压力 30mm 之6Mpa<br />\r\n			40mm <!--:8Mpa</td--></td>\r\n		</tr>\r\n		<tr>\r\n			<td>有机溶剂</td>\r\n			<td>不敏感</td>\r\n		</tr>\r\n		<tr>\r\n			<td>揆作温度</td>\r\n			<td>&lt; 3so&middot; c</td>\r\n		</tr>\r\n		<tr>\r\n			<td>操作压力</td>\r\n			<td>S1Mpa</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<p>可量身定做满足特殊设计需求</p>\r\n</div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>产品规格</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"table-container\">\r\n<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>支撑体</th>\r\n			<th>&nbsp;</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>支撑体材质</td>\r\n			<td>a-A2l 0 3</td>\r\n		</tr>\r\n		<tr>\r\n			<td>适用PH范围</td>\r\n			<td>0-14</td>\r\n		</tr>\r\n		<tr>\r\n			<td>破坏压力</td>\r\n			<td>25mm ;:,::4Mpa<br />\r\n			破坏压力 30mm 之6Mpa<br />\r\n			40mm <!--:8Mpa</td--></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n\r\n<p>表格中的产品长度为常规 尺寸， 若有其它需求， 可以定制小于1200mm的 尺寸。</p>\r\n</div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>产品设备</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"造纸行业亚海水淡化项目\" src=\"/assets/img/temp/app_03.jpg\" />\r\n<p>超滤膜设备</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"造纸行业亚海水淡化项目\" src=\"/assets/img/temp/app_04.jpg\" />\r\n<p>反渗透膜设备</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"造纸行业亚海水淡化项目\" src=\"/assets/img/temp/app_03.jpg\" />\r\n<p>造纸行业亚海水淡化项目</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"case\"><img alt=\"造纸行业亚海水淡化项目\" src=\"/assets/img/temp/app_04.jpg\" />\r\n<p>造纸行业亚海水淡化项目</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>应用领域</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"app\">\r\n<div class=\"align-items-center no-gutters row\">\r\n<div class=\"col-md-6\"><img alt=\"生物、医药行业\" src=\"/assets/img/temp/p07.jpg\" /></div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"txt\">\r\n<h4>生物、医药行业</h4>\r\n\r\n<ul>\r\n	<li>中药有效成分的提取和纯化</li>\r\n	<li>口服液澄清过滤</li>\r\n	<li>生物制品的纯化及精制</li>\r\n	<li>空气除菌、除尘</li>\r\n	<li>脱色活性炭的过滤分离等</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"app\">\r\n<div class=\"align-items-center no-gutters row\">\r\n<div class=\"col-md-6\"><img alt=\"其他领域\" src=\"/assets/img/temp/p08.jpg\" /></div>\r\n\r\n<div class=\"col-md-6\">\r\n<div class=\"txt\">\r\n<h4>其他领域</h4>\r\n\r\n<div class=\"row\">\r\n<div class=\"col\">\r\n<ul>\r\n	<li>高温气体除尘</li>\r\n	<li>天然色素生产</li>\r\n	<li>盐水精制</li>\r\n	<li>无机膜催化反应器</li>\r\n	<li>纳米材料浓缩纯化</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col\">\r\n<ul>\r\n	<li>稀有金属富集</li>\r\n	<li>新材料分离制备</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"fadeInUp title-se-art wow\">\r\n<h3>主要客户</h3>\r\n</div>\r\n\r\n<div class=\"fadeInUp se wow\">\r\n<div class=\"clients\">\r\n<div class=\"row\">\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-lg-2 col-md-4\">\r\n<div class=\"item\"><img alt=\"\" src=\"/assets/img/temp/p09.jpg\" />\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>韩国希杰</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', '', '', 'admin', '/uploads/images/products/p004.jpg', NULL, 0, 71, 1, 0, 1571792857, '');
INSERT INTO `products` VALUES (58, 'fdfsd', NULL, 2, 0, '/uploads/images/products/p23.jpg', '', '<p>fdsds dfsd</p>\r\n', '<p>fds</p>\r\n', '', '', 'admin', '/uploads/images/services/p1.jpg', '', 0, 7, 1, 1, 1561972648, '');
INSERT INTO `products` VALUES (57, 'dfsdfds', NULL, 5, 0, '/uploads/images/products/p21.jpg', 'fds', '<p>fds</p>\r\n', '<p>dfs</p>\r\n', '', 'fds', 'admin', '/uploads/images/services/p1.jpg', 'fds', 0, 1, 1, 1, 1561971023, 'fds');
INSERT INTO `products` VALUES (65, '200万-500万像素', '', 2, 70, '/uploads/images/products/p22.jpg', '', '<p>fds</p>\r\n', '', '', '', 'admin', '/uploads/images/services/p1.jpg', NULL, 0, 6, 1, 0, 1562427571, '');
INSERT INTO `products` VALUES (62, 'HD/HD+', '', 5, 0, '/uploads/images/products/p24.jpg', '', '<p>RWE</p>\r\n', '', '', '', 'admin', '/uploads/images/services/p1.jpg', NULL, 0, 1, 1, 0, 1562426176, '');
INSERT INTO `products` VALUES (66, '100万像素以下', '', 2, 0, '/uploads/images/products/p21.jpg', '', '<p>为了提供更好的灯光音响租赁效果，轩悦视听选用了明道灯光的这款高端LED帕灯，其灯珠采用进口飞利浦的LED灯珠，54颗灯珠均为RGB三合一，每颗灯珠功率为6W，能够实现极佳的染色和变换效果。配备专用的防水罩能够适用于户外和复杂的天气环境中，非常适用于各类演出和会议活动。</p>\r\n\r\n<p>这款LED Par灯属于明道LED帕灯租赁产品中的高端型号，GTD-L654p采用了6瓦54颗高亮度的进口LED灯珠，每颗LED灯珠都独立封装，并且红绿蓝三色合一，每颗灯珠都能实现多达1670万中颜色的变换效果。独立线性调节可以轻松变换色彩而毫无察觉，混色纯正无杂色，一致性极高。高品质的光学透镜和合理的间距排布使得输出光效更高，且光斑均匀扩散。独特的电子控制技术可以分组或独立控制亮度变化，真正实现0-100%的线性调光效果，且调光过程线性平滑，光效稳定不闪烁。产品外壳采用高强度压铸铝，防腐、防氧、防水，能够全天候不间断使用。</p>\r\n\r\n<p>轩悦视听在上海、北京、广州、深圳均设立有分公司，当地拥有大型仓库和专业技术团队，可租赁的舞台灯光包括LED、Par 灯、面光灯、光束灯、图案灯、追光灯、成像灯、观众灯、聚光灯、灯控台、硅箱、烟雾机、泡泡机、TRUSS架</p>\r\n', '', '', '', 'admin', '/uploads/images/services/p1.jpg', NULL, 0, 20, 1, 0, 1571182582, '');
COMMIT;

-- ----------------------------
-- Table structure for products_v1
-- ----------------------------
DROP TABLE IF EXISTS `products_v1`;
CREATE TABLE `products_v1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pdf` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_v1_category_id_foreign` (`category_id`),
  CONSTRAINT `products_v1_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories_v1` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products_v1
-- ----------------------------
BEGIN;
INSERT INTO `products_v1` VALUES (1, 'GC13053', '<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>像素</th>\r\n			<th>光学尺寸</th>\r\n			<th>输出格式</th>\r\n			<th>帧率</th>\r\n			<th>数据接口</th>\r\n			<th>像素尺寸</th>\r\n			<th>像素技术</th>\r\n			<th>色彩阵列</th>\r\n			<th>封装</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>13M</td>\r\n			<td>1/3.06&quot;</td>\r\n			<td>RAW</td>\r\n			<td>Full Size @ 30 FPS</td>\r\n			<td>MIPI</td>\r\n			<td>1.12&micro;m</td>\r\n			<td>BSI</td>\r\n			<td>RGB Bayer</td>\r\n			<td>COB/ TPLCC</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '/uploads/files/test.pdf', 0, 4, 1, 'admin', '2020-01-12 09:53:29', '2020-01-12 10:23:53');
INSERT INTO `products_v1` VALUES (2, 'GC13603P', '<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>像素</th>\r\n			<th>光学尺寸</th>\r\n			<th>输出格式</th>\r\n			<th>帧率</th>\r\n			<th>数据接口</th>\r\n			<th>像素尺寸</th>\r\n			<th>像素技术</th>\r\n			<th>色彩阵列</th>\r\n			<th>封装</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>13M</td>\r\n			<td>1/3.06&quot;</td>\r\n			<td>RAW</td>\r\n			<td>Full Size @ 30 FPS</td>\r\n			<td>MIPI</td>\r\n			<td>1.12&micro;m</td>\r\n			<td>BSI</td>\r\n			<td>RGB Bayer</td>\r\n			<td>TPLCC</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '/uploads/files/test.pdf', 0, 4, 1, 'admin', '2020-01-12 09:53:47', '2020-01-12 10:25:10');
INSERT INTO `products_v1` VALUES (3, 'GC8054', '<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>像素</th>\r\n			<th>光学尺寸</th>\r\n			<th>输出格式</th>\r\n			<th>帧率</th>\r\n			<th>数据接口</th>\r\n			<th>像素尺寸</th>\r\n			<th>像素技术</th>\r\n			<th>色彩阵列</th>\r\n			<th>封装</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>8M</td>\r\n			<td>1/4&quot;</td>\r\n			<td>RAW</td>\r\n			<td>Full Size @ 30 FPS</td>\r\n			<td>MIPI</td>\r\n			<td>1.12&micro;m</td>\r\n			<td>BSI</td>\r\n			<td>RGB Bayer</td>\r\n			<td>COB/ TPLCC</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '/uploads/files/test.pdf', 0, 4, 1, 'admin', '2020-01-12 10:26:43', '2020-01-12 10:26:43');
INSERT INTO `products_v1` VALUES (4, 'GC8034', '<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>像素</th>\r\n			<th>光学尺寸</th>\r\n			<th>输出格式</th>\r\n			<th>帧率</th>\r\n			<th>数据接口</th>\r\n			<th>像素尺寸</th>\r\n			<th>像素技术</th>\r\n			<th>色彩阵列</th>\r\n			<th>封装</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>8M</td>\r\n			<td>1/4&quot;</td>\r\n			<td>RAW</td>\r\n			<td>Full Size @ 30 FPS</td>\r\n			<td>MIPI</td>\r\n			<td>1.12&micro;m</td>\r\n			<td>BSI</td>\r\n			<td>RGB Bayer</td>\r\n			<td>COB/ TPLCC</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '/uploads/files/test.pdf', 0, 4, 1, 'admin', '2020-01-12 10:27:11', '2020-01-12 10:27:11');
INSERT INTO `products_v1` VALUES (5, 'GC8603', '<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>像素</th>\r\n			<th>光学尺寸</th>\r\n			<th>输出格式</th>\r\n			<th>帧率</th>\r\n			<th>数据接口</th>\r\n			<th>像素尺寸</th>\r\n			<th>像素技术</th>\r\n			<th>色彩阵列</th>\r\n			<th>封装</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>8M</td>\r\n			<td>1/3.2&quot;</td>\r\n			<td>RAW</td>\r\n			<td>Full Size @ 30 FPS</td>\r\n			<td>MIPI</td>\r\n			<td>1.4&micro;m</td>\r\n			<td>BSI</td>\r\n			<td>RGB Bayer</td>\r\n			<td>CSP</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '/uploads/files/test.pdf', 0, 4, 1, 'admin', '2020-01-12 10:28:24', '2020-01-12 10:28:24');
INSERT INTO `products_v1` VALUES (6, 'GC0D3C', '<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>特色</th>\r\n			<th>类型</th>\r\n			<th>源极开关</th>\r\n			<th>栅极开关</th>\r\n			<th>接口</th>\r\n			<th>显示缓存</th>\r\n			<th>显示模式</th>\r\n			<th>翻转类型</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>0D0C</td>\r\n			<td>HD/HD+ 720*1600</td>\r\n			<td>2160</td>\r\n			<td>GIP</td>\r\n			<td>MIPI/RGB</td>\r\n			<td>RAMless</td>\r\n			<td>16.7M-Color / 262K-Color / 65K-Color Idle mode / 8-color</td>\r\n			<td>Dot Inversion Column Inversion</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '/uploads/files/test.pdf', 0, 7, 1, 'admin', '2020-01-12 10:28:24', '2020-01-12 12:00:54');
INSERT INTO `products_v1` VALUES (7, 'GC607', '<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>应用场景</th>\r\n			<th>描述</th>\r\n			<th>主要特色</th>\r\n			<th>输入接口</th>\r\n			<th>输出接口</th>\r\n			<th>控制接口</th>\r\n			<th>最大帧率</th>\r\n			<th>封装种类</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Mobile</td>\r\n			<td>Bridge chip with hardware remosaic</td>\r\n			<td>Remosaic Crosstalk Correction Bad Pixel Correction</td>\r\n			<td>MIPI</td>\r\n			<td>MIPI</td>\r\n			<td>I2C SPI</td>\r\n			<td>9320 x 7008 @ 10FPS</td>\r\n			<td>WLBGA POP</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '/uploads/files/test.pdf', 0, 3, 1, 'admin', '2020-01-12 12:05:15', '2020-01-12 12:05:15');
INSERT INTO `products_v1` VALUES (8, 'GC2601', '<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th>应用场景</th>\r\n			<th>描述</th>\r\n			<th>主要特色</th>\r\n			<th>输入接口</th>\r\n			<th>输出接口</th>\r\n			<th>控制接口</th>\r\n			<th>最大帧率</th>\r\n			<th>封装种类</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>Automobile Smart Home</td>\r\n			<td>SOC chip with both rear view and front view ISPs for automotive applications</td>\r\n			<td>ISP x 2 H264 video codec MJPEG/JPEG codec Audio codec ARM Cortex A5</td>\r\n			<td>MIPI CSI GC-LVDS I2S</td>\r\n			<td>MIPI DSI I2S</td>\r\n			<td>I2C</td>\r\n			<td>ISP1: 5M @ 30FPS ISP2: FHD @ 30FPS</td>\r\n			<td>WLBGA</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '/uploads/files/test.pdf', 0, 3, 1, 'admin', '2020-01-12 12:05:38', '2020-01-12 12:05:38');
COMMIT;

-- ----------------------------
-- Table structure for schools
-- ----------------------------
DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_url` varchar(150) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `dictionary_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` varchar(50) NOT NULL,
  `added_date` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of schools
-- ----------------------------
BEGIN;
INSERT INTO `schools` VALUES (21, 'CaLARTS', '/uploads/schools/school001.jpg', 0, 44, 43, 1, 0, 'admin', 1569836423);
INSERT INTO `schools` VALUES (22, 'SFAI', '/uploads/schools/school002.jpg', 0, 44, 43, 1, 0, 'admin', 1569836514);
INSERT INTO `schools` VALUES (23, 'PARSONS', '/uploads/schools/school003.jpg', 0, 44, 44, 1, 0, 'admin', 1569836532);
INSERT INTO `schools` VALUES (24, 'ACADEMY of ART UNIVERSITY', '/uploads/schools/school004.jpg', 0, 44, 42, 1, 0, 'admin', 1569836556);
INSERT INTO `schools` VALUES (25, 'NEW YORK UNIVERSITY', '/uploads/schools/school005.jpg', 0, 44, 42, 1, 0, 'admin', 1569836582);
INSERT INTO `schools` VALUES (26, 'Carnegie Mellon University', '/uploads/schools/school006.jpg', 0, 44, 42, 1, 0, 'admin', 1569836611);
INSERT INTO `schools` VALUES (27, 'SAIC', '/uploads/schools/school007.jpg', 0, 44, 43, 1, 0, 'admin', 1569836623);
INSERT INTO `schools` VALUES (28, 'Pratt', '/uploads/schools/school008.jpg', 0, 44, 44, 1, 0, 'admin', 1569836637);
INSERT INTO `schools` VALUES (29, 'UC San Diego', '/uploads/schools/school009.jpg', 0, 44, 44, 1, 0, 'admin', 1569836660);
INSERT INTO `schools` VALUES (30, 'SAVANNAH COLLEGE', '/uploads/schools/school010.jpg', 0, 44, 42, 1, 0, 'admin', 1569836707);
INSERT INTO `schools` VALUES (31, 'RISD', '/uploads/schools/school011.jpg', 0, 44, 43, 1, 0, 'admin', 1569836718);
INSERT INTO `schools` VALUES (32, 'UCLA', '/uploads/schools/school012.jpg', 0, 44, 42, 1, 0, 'admin', 1569836728);
INSERT INTO `schools` VALUES (33, 'Art Center', '/uploads/schools/school013.jpg', 0, 44, 43, 1, 1, 'admin', 1569836785);
INSERT INTO `schools` VALUES (34, 'FIT', '/uploads/schools/school014.jpg', 0, 44, 44, 1, 0, 'admin', 1569836796);
INSERT INTO `schools` VALUES (35, 'OTIS', '/uploads/schools/school015.jpg', 0, 44, 42, 1, 0, 'admin', 1569836809);
INSERT INTO `schools` VALUES (36, 'CORNELL UNIVERSITY', '/uploads/schools/school016.jpg', 0, 44, 42, 1, 0, 'admin', 1569836828);
INSERT INTO `schools` VALUES (37, 'MICA', '/uploads/schools/school017.jpg', 0, 44, 43, 1, 1, 'admin', 1569836840);
INSERT INTO `schools` VALUES (38, 'LUX ET VERITAS', '/uploads/schools/school018.jpg', 0, 44, 43, 1, 0, 'admin', 1569836858);
INSERT INTO `schools` VALUES (39, 'CCo7', '/uploads/schools/school019.jpg', 0, 44, 44, 1, 1, 'admin', 1569836872);
INSERT INTO `schools` VALUES (40, 'MAINE COLLEGE OF ART', '/uploads/schools/school020.jpg', 0, 44, 43, 1, 1, 'admin', 1569836894);
COMMIT;

-- ----------------------------
-- Table structure for subscriptions
-- ----------------------------
DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE `subscriptions` (
  `email` varchar(150) NOT NULL,
  `added_date` int(11) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subscriptions
-- ----------------------------
BEGIN;
INSERT INTO `subscriptions` VALUES ('13212847@qq.com', 1554987462);
COMMIT;

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `post` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `fullphoto` varchar(150) NOT NULL,
  `content` text,
  `dictionary_id` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_date` int(11) NOT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teams
-- ----------------------------
BEGIN;
INSERT INTO `teams` VALUES (2, '芦田典裕先生', '非执行董事', '/uploads/images/teams/testimonial-2.jpg', '', '<h4>test</h4>\r\n', 3, 'admin', 1546661515, 100);
INSERT INTO `teams` VALUES (9, '常兆华博士', '董事局主席、执行董事', '/uploads/images/teams/testimonial-1.jpg', '/uploads/team/about_team_detail_banner.png', '<h4>content</h4>\r\n', 3, 'admin', 1546662156, 100);
INSERT INTO `teams` VALUES (16, '非执行董事', '非执行董事', '/uploads/images/teams/team-member-4.jpg', '', '<p>test</p>\r\n', 3, 'admin', 1559615162, 0);
INSERT INTO `teams` VALUES (17, '张三', '非执行董事', '/uploads/images/teams/team-member-1.jpg', '', '<p>test</p>\r\n', 2, 'admin', 1564817037, 0);
INSERT INTO `teams` VALUES (19, 'test', 'werew', '/uploads/images/teams/team-member-2.jpg', '', '<p>rewrewrew</p>\r\n', 2, 'admin', 1564817127, 0);
INSERT INTO `teams` VALUES (20, 'doubletong', 'fds', '/uploads/images/teams/team-member-3.jpg', '', '<p>fdsfds</p>\r\n', 2, 'admin', 1564817145, 0);
COMMIT;

-- ----------------------------
-- Table structure for topics
-- ----------------------------
DROP TABLE IF EXISTS `topics`;
CREATE TABLE `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `added_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of topics
-- ----------------------------
BEGIN;
INSERT INTO `topics` VALUES (1, '30家媒体关注并发布了新闻“Medidata与南京希麦迪再度强 强联手，助力中国临床试验取得新进展', 'admin', 1546588491);
INSERT INTO `topics` VALUES (2, 'fdsfds', 'admin', 1554866135);
COMMIT;

-- ----------------------------
-- Table structure for videos
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of videos
-- ----------------------------
BEGIN;
INSERT INTO `videos` VALUES (10, 'cxzcxzc', '<p>cxzcxzcxz</p>\r\n', 'XMjc2NTM5NDYyOA', NULL, NULL, '/uploads/videos/news_media_01.jpg', '/uploads/videos/news_media_02.jpg', 0, 18, 0, 'admin', '2019-06-15 17:26:52', 0, 1);
INSERT INTO `videos` VALUES (7, 'test', '<p>fdsfds</p>\r\n', 'XMjc2NTM5NDYyOA', NULL, NULL, '/uploads/videos/news_media_01.jpg', '/uploads/videos/news_media_02.jpg', 0, 17, 0, 'admin', '2019-06-04 15:50:50', 0, 1);
INSERT INTO `videos` VALUES (8, 'test', '<p>fdsfds</p>\r\n', 'XMjc2NTM5NDYyOA', NULL, NULL, '/uploads/videos/news_media_01.jpg', '/uploads/videos/news_media_03.jpg', 0, 17, 0, 'admin', '2019-06-04 15:55:59', 0, 1);
INSERT INTO `videos` VALUES (9, 'testrrrr', '<p>fdsfds</p>\r\n', 'XMjc2NTM5NDYyOA', NULL, NULL, '/uploads/videos/news_media_01.jpg', '/uploads/videos/news_media_03.jpg', 0, 17, 0, 'admin', '2019-06-04 15:56:55', 0, 1);
INSERT INTO `videos` VALUES (11, 'fdsfds', '<p>fdsfdsfds</p>\r\n', '无可奈何', '', NULL, '', '', 0, 18, 0, 'admin', '2019-06-18 09:48:25', 0, 1);
COMMIT;

-- ----------------------------
-- Table structure for wp_orderitems
-- ----------------------------
DROP TABLE IF EXISTS `wp_orderitems`;
CREATE TABLE `wp_orderitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `product_no` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=514 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_orderitems
-- ----------------------------
BEGIN;
INSERT INTO `wp_orderitems` VALUES (25, 20, 38, 1, 0.01, '洁碧精致型水牙线(测试不卖)', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (26, 21, 38, 1, 0.01, '洁碧精致型水牙线(测试不卖)', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (27, 22, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (31, 26, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (29, 24, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (30, 25, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (32, 27, 39, 1, 0.01, '测试', '00001');
INSERT INTO `wp_orderitems` VALUES (33, 28, 40, 1, 128.00, '纳米超声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (34, 29, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (35, 30, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (36, 31, 38, 1, 799.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (37, 32, 38, 1, 799.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (38, 33, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (39, 33, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (40, 34, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (41, 35, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (42, 36, 37, 2, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (43, 37, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (44, 38, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (45, 39, 40, 2, 128.00, '纳米超声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (46, 40, 40, 2, 128.00, '纳米超声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (47, 41, 40, 2, 128.00, '纳米超声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (48, 42, 40, 2, 128.00, '纳米超声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (49, 43, 36, 2, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (50, 44, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (51, 45, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (52, 46, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (53, 47, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (54, 48, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (55, 49, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (56, 50, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (57, 51, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (58, 52, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (59, 53, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (60, 54, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (61, 55, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (62, 56, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (63, 57, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (64, 58, 37, 2, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (65, 59, 37, 2, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (66, 60, 37, 2, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (67, 61, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (68, 62, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (69, 63, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (70, 64, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (71, 65, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (72, 66, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (73, 67, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (74, 68, 40, 1, 128.00, '纳米超声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (75, 68, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (76, 69, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (77, 70, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (78, 71, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (79, 72, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (80, 73, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (81, 74, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (82, 75, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (83, 76, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (84, 78, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (85, 79, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (86, 80, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (87, 81, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (88, 82, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (89, 83, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (90, 84, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (91, 86, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (92, 87, 35, 2, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (93, 88, 35, 2, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (94, 89, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (95, 90, 35, 2, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (96, 91, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (97, 92, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (98, 93, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (99, 94, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (100, 95, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (101, 96, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (102, 97, 40, 1, 128.00, '纳米超声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (103, 98, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (104, 99, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (105, 100, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (106, 101, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (107, 102, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (108, 103, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (109, 104, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (110, 105, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (111, 106, 37, 1, 810.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (112, 107, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (113, 108, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (114, 109, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (115, 110, 36, 1, 399.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (116, 111, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (117, 112, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (118, 113, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (119, 114, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (120, 115, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (121, 116, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (122, 117, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (123, 118, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (124, 119, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (125, 121, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (126, 122, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (127, 123, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (128, 124, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (129, 126, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (130, 127, 35, 2, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (131, 128, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (132, 129, 35, 2, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (133, 131, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (134, 132, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (135, 133, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (136, 134, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (137, 135, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (138, 136, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (139, 137, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (140, 138, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (141, 139, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (142, 140, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (143, 141, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (144, 142, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (145, 143, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (146, 144, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (147, 145, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (148, 146, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (149, 147, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (150, 148, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (151, 149, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (152, 150, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (153, 151, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (154, 152, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (155, 153, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (156, 154, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (157, 155, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (158, 158, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (159, 161, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (160, 162, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (161, 163, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (162, 164, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (163, 165, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (164, 166, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (165, 167, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (166, 168, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (167, 169, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (168, 170, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (169, 171, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (170, 172, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (171, 173, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (172, 174, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (173, 175, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (174, 176, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (175, 177, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (176, 178, 40, 2, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (177, 179, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (178, 180, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (179, 181, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (180, 182, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (181, 183, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (182, 184, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (183, 185, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (184, 187, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (185, 188, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (186, 189, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (187, 190, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (188, 191, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (189, 192, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (190, 193, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (191, 193, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (192, 194, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (193, 195, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (194, 196, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (195, 197, 37, 2, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (196, 198, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (197, 199, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (198, 200, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (199, 201, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (200, 202, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (201, 203, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (202, 204, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (203, 206, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (204, 207, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (205, 208, 47, 1, 899.00, '洁碧便携式水牙线', '（WP-462EC）');
INSERT INTO `wp_orderitems` VALUES (206, 209, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (207, 210, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (208, 211, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (209, 212, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (210, 213, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (211, 214, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (212, 215, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (213, 216, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (214, 217, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (215, 218, 35, 100, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (216, 219, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (217, 220, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (218, 221, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (219, 222, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (220, 223, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (221, 224, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (222, 225, 35, 2, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (223, 226, 35, 2, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (224, 227, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (225, 228, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (226, 229, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (227, 230, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (228, 231, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (229, 232, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (230, 233, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (231, 234, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (232, 235, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (233, 236, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (234, 237, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (235, 238, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (236, 239, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (237, 240, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (238, 241, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (239, 242, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (240, 242, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (241, 243, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (242, 244, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (243, 245, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (244, 246, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (245, 246, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (246, 247, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (247, 247, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (248, 248, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (249, 249, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (250, 250, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (251, 251, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (252, 252, 40, 2, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (253, 253, 40, 2, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (254, 254, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (255, 255, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (256, 256, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (257, 257, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (258, 258, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (259, 259, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (260, 260, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (261, 261, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (262, 262, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (263, 263, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (264, 264, 36, 2, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (265, 265, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (266, 266, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (267, 267, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (268, 268, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (269, 269, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (270, 270, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (271, 271, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (272, 272, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (273, 273, 47, 1, 899.00, '洁碧便携式水牙线', '（WP-462EC）');
INSERT INTO `wp_orderitems` VALUES (274, 274, 49, 1, 1398.00, '洁碧超效型水牙线', 'WP-108EC');
INSERT INTO `wp_orderitems` VALUES (275, 275, 50, 1, 499.00, '洁碧无线型水牙线', 'WF-02EC');
INSERT INTO `wp_orderitems` VALUES (276, 276, 51, 1, 1698.00, '洁碧全护型5.0水牙线及声波牙刷组合', 'WP-861EC');
INSERT INTO `wp_orderitems` VALUES (277, 277, 49, 1, 1398.00, '洁碧超效型水牙线', 'WP-108EC');
INSERT INTO `wp_orderitems` VALUES (278, 278, 49, 1, 1398.00, '洁碧超效型水牙线', 'WP-108EC');
INSERT INTO `wp_orderitems` VALUES (279, 279, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (280, 280, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (281, 281, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (282, 282, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (283, 283, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (284, 284, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (285, 285, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (286, 285, 50, 1, 499.00, '洁碧无线型水牙线', 'WF-02EC');
INSERT INTO `wp_orderitems` VALUES (287, 286, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (288, 287, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (289, 288, 38, 3, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (290, 289, 38, 3, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (291, 290, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (292, 291, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (293, 292, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (294, 293, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (295, 294, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (296, 295, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (297, 296, 35, 4, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (298, 297, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (299, 298, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (300, 299, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (301, 300, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (302, 301, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (303, 302, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (304, 303, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (305, 304, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (306, 305, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (307, 306, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (308, 308, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (309, 309, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (310, 310, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (311, 311, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (312, 312, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (313, 314, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (314, 315, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (315, 316, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (316, 317, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (317, 318, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (318, 319, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (319, 320, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (320, 321, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (321, 322, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (322, 323, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (323, 324, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (324, 325, 50, 1, 499.00, '洁碧无线型水牙线', 'WF-02EC');
INSERT INTO `wp_orderitems` VALUES (325, 326, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (326, 327, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (327, 329, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (328, 330, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (329, 331, 49, 1, 1398.00, '洁碧超效型水牙线', 'WP-108EC');
INSERT INTO `wp_orderitems` VALUES (330, 332, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (331, 333, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (332, 334, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (333, 335, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (334, 336, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (335, 337, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (336, 338, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (337, 339, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (338, 340, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (339, 341, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (340, 342, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (341, 343, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (342, 344, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (343, 345, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (344, 346, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (345, 347, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (346, 348, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (347, 349, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (348, 350, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (349, 351, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (350, 352, 51, 1, 1698.00, '洁碧全护型5.0水牙线及声波牙刷组合', 'WP-861EC');
INSERT INTO `wp_orderitems` VALUES (351, 353, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (352, 354, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (353, 355, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (354, 356, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (355, 357, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (356, 358, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (357, 359, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (358, 360, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (359, 361, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (360, 362, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (361, 363, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (362, 364, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (363, 365, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (364, 366, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (365, 367, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (366, 368, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (367, 369, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (368, 370, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (369, 371, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (370, 372, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (371, 373, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (372, 374, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (373, 375, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (374, 376, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (375, 377, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (376, 378, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (377, 379, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (378, 380, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (379, 381, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (380, 382, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (381, 383, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (382, 384, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (383, 385, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (384, 386, 47, 1, 899.00, '洁碧便携式水牙线', '（WP-462EC）');
INSERT INTO `wp_orderitems` VALUES (385, 387, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (386, 388, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (387, 389, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (388, 390, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (389, 391, 35, 2, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (390, 392, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (391, 393, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (392, 394, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (393, 395, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (394, 396, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (395, 397, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (396, 398, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (397, 399, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (398, 400, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (399, 401, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (400, 402, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (401, 403, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (402, 404, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (403, 405, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (404, 406, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (405, 407, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (406, 408, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (407, 409, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (408, 410, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (409, 411, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (410, 412, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (411, 413, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (412, 414, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (413, 415, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (414, 416, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (415, 417, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (416, 418, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (417, 419, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (418, 420, 45, 1, 1298.00, '洁碧超效型水牙线', 'WP-112EC');
INSERT INTO `wp_orderitems` VALUES (419, 421, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (420, 422, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (421, 423, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (422, 424, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (423, 425, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (424, 426, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (425, 427, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (426, 428, 50, 1, 599.00, '洁碧无线型水牙线', 'WF-02EC');
INSERT INTO `wp_orderitems` VALUES (427, 429, 40, 2, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (428, 430, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (429, 431, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (430, 432, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (431, 433, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (432, 434, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (433, 436, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (434, 437, 37, 2, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (435, 438, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (436, 439, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (437, 440, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (438, 441, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (439, 442, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (440, 443, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (441, 444, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (442, 445, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (443, 446, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (444, 447, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (445, 448, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (446, 449, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (447, 450, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (448, 450, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (449, 451, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (450, 452, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (451, 453, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (452, 454, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (453, 455, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (454, 456, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (455, 457, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (456, 458, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (457, 459, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (458, 460, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (459, 461, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (460, 462, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (461, 463, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (462, 464, 51, 1, 1698.00, '洁碧全护型5.0水牙线及声波牙刷组合', 'WP-861EC');
INSERT INTO `wp_orderitems` VALUES (463, 465, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (464, 466, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (465, 467, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (466, 468, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (467, 469, 40, 2, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (468, 470, 40, 2, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (469, 471, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (470, 472, 40, 2, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (471, 473, 40, 2, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (472, 474, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (473, 475, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (474, 476, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (475, 477, 37, 2, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (476, 478, 38, 1, 699.00, '洁碧精致型水牙线', 'WP-250EC');
INSERT INTO `wp_orderitems` VALUES (477, 479, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (478, 480, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (479, 481, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (480, 482, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (481, 483, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (482, 484, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (483, 485, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (484, 486, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (485, 487, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (486, 488, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (487, 489, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (488, 490, 45, 1, 1298.00, '洁碧超效型水牙线', 'WP-112EC');
INSERT INTO `wp_orderitems` VALUES (489, 491, 45, 1, 1298.00, '洁碧超效型水牙线', 'WP-112EC');
INSERT INTO `wp_orderitems` VALUES (490, 492, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (491, 493, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (492, 494, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (493, 495, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (494, 496, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (495, 497, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (496, 498, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (497, 499, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (498, 500, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (499, 501, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (500, 502, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (501, 503, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (502, 504, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (503, 505, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (504, 506, 40, 1, 128.00, '纳米声波自动电动牙刷', 'Nano-Sonic');
INSERT INTO `wp_orderitems` VALUES (505, 507, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (506, 508, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (507, 509, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (508, 510, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (509, 511, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
INSERT INTO `wp_orderitems` VALUES (510, 512, 36, 1, 499.00, '洁碧标准型水牙线', 'WP-70EC');
INSERT INTO `wp_orderitems` VALUES (511, 513, 50, 1, 599.00, '洁碧无线型水牙线', 'WF-02EC');
INSERT INTO `wp_orderitems` VALUES (512, 514, 35, 1, 899.00, '洁碧超效型水牙线', 'WP-100EC');
INSERT INTO `wp_orderitems` VALUES (513, 515, 37, 1, 599.00, '洁碧便携式水牙线', 'WP-450EC');
COMMIT;

-- ----------------------------
-- Table structure for wp_orders
-- ----------------------------
DROP TABLE IF EXISTS `wp_orders`;
CREATE TABLE `wp_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `remark` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=516 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_orders
-- ----------------------------
BEGIN;
INSERT INTO `wp_orders` VALUES (20, '广东省渤海市', '张三(测试)', '15361828193', 1428224676, 1, 0.01, 0, '', '', NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (21, '广东省渤海市', '张三(测试)', '15361828193', 1428224999, 1, 0.01, 1, '', '', 'ddd', 'dddddddd', 'ddddddd');
INSERT INTO `wp_orders` VALUES (22, '北京丰台大成郡四区纤云园8号楼1单元102', '张丽娟', '13718229777', 1428481549, 1, 399.00, 0, '', '', NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (26, '湖北省荆州市沙市区江津东路153号联通公司', '余功华', '18607211003', 1430912903, 1, 399.00, 1, '', '', '顺丰快递', '906765621805', NULL);
INSERT INTO `wp_orders` VALUES (24, '浙江省温州市鹿城区绣山路198号水利局大楼401室', '夏志昌', '139658926957', 1430366615, 1, 810.00, 1, '', '', NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (25, '深圳市南山区', '健标', '134565454', 1430366963, 1, 899.00, 0, '', '', NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (27, 'fgf', '张三(测试)', '15361828193', 1431072444, 1, 0.01, 1, '2015050800001000000053627959', '', '顺风快递', 'RE002514254', NULL);
INSERT INTO `wp_orders` VALUES (28, '山东济南市中区舜耕路48号', '路洪贵', '13395310607', 1431918251, 1, 128.00, 1, '2015051800001000340053203825', NULL, '顺丰快递', '918316054402', NULL);
INSERT INTO `wp_orders` VALUES (29, '上海市闵行区水清路999弄34号301室', '何亚楠', '13671703109', 1432266653, 1, 899.00, 1, '2015052200001000100067416310', NULL, '顺丰快递', '909885601000', NULL);
INSERT INTO `wp_orders` VALUES (30, '庄行镇邬桥安邬路23号 上海天融电器有限公司', '袁金芳', '13795285271', 1432433765, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (31, '辽宁鞍山市铁西区铁西十道街', '李丽', '15140811151', 1432746673, 1, 799.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (32, '辽宁鞍山市铁西区铁西', '李莉', '15140811151', 1432746781, 1, 799.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (33, '深圳市南山区南山大道1002号深意工业大厦三层北座303 香蕉设计', '林徐攀', '13480825343', 1433991010, 2, 1298.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (34, '广东省深圳市南山区南海大道海典居1栋16F', '尹先生', '13723401015', 1434080039, 1, 399.00, 1, '2015061200001000280058521878', NULL, '顺丰快递', '906767799221', '');
INSERT INTO `wp_orders` VALUES (35, '中国广东省广州市海珠区东晓南路锦文街4号1901房', '张晓明', '15013325267', 1434299683, 1, 399.00, 1, '2015061500001000200060030339', NULL, '顺丰快递', '906767799355', '');
INSERT INTO `wp_orders` VALUES (36, '云南省昆明市五华区国防路1栋2单元9室', '赵国翔', '13708405069', 1434722694, 2, 1620.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (37, '云南省昆明市五华区国防路1栋2单元9室', '赵国翔', '13708405069', 1434722714, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (38, '云南省昆明市五华区国防路1栋2单元9室', '赵国翔', '13708405069', 1434722906, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (39, '深圳市龍崗區平湖街道新南社區鳳凰大道25號', '張蘭婷', '18219297612', 1435808526, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (40, '深圳市龍崗區平湖街道鳳凰大道 25號', '張蘭婷', '18219297612', 1435808715, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (41, '深圳市龙岗区凤凰大道25号   荣发厂', '张兰婷', '18219297612', 1435851826, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (42, '深圳市龙岗区平湖街道新南社区凤凰大道25号      荣发厂', '张兰婷', '18219297612', 1435851950, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (43, '甘肃省嘉峪关市酒钢公司大楼D楼204', '张建利', '18993798822', 1436255077, 2, 798.00, 1, '2015070700001000640055266716', NULL, '顺丰快递', '906767798941', '');
INSERT INTO `wp_orders` VALUES (44, '北京市西城区平安里西大街31号航天金融大厦7层', '郭漪', '13811980649', 1436445250, 1, 899.00, 1, '2015070900001000190058091470', NULL, '顺丰快递', '023572256614', '北京发货');
INSERT INTO `wp_orders` VALUES (45, '香港  新界 馬鞍山,  鞍駿街 1號,  馬鞍山中心. 第 3 座 , 17  樓 H室', '苏南', '13602898265', 1436580607, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (46, '广东省东莞市长安镇厦岗福海路27号二楼二商银行2楼(即标记贸易)', '黎露', '15876994570', 1436772004, 1, 399.00, 1, '2015071300001000340059355294', NULL, '顺丰快递', '906767798323', '');
INSERT INTO `wp_orders` VALUES (47, '31 bishan street 11, #20-01, Singapore 579819', 'Sim s h ', '+6597207766', 1436843549, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (48, '成都市锦江区三官堂一号望江橡树林', '赵晚露', '13608233617', 1437784518, 1, 399.00, 1, '2015072500001000500058848765', NULL, '顺丰快递', '906767797734', '');
INSERT INTO `wp_orders` VALUES (49, '深圳横岗', '\\\'', '123', 1437844944, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (50, '广东省广州市花都区迎宾大道95号交通大楼', '顾菲（吴明昊代收）', '15625116008', 1438158309, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (51, '哈哈看到', 'yu', '1301202911', 1438277721, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (52, '上海徐汇区钦州南路8弄11号2001室', '王贞', '13818369742', 1438323423, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (53, '上海市徐汇区钦州南路8弄11号2001', '王贞', '13818369742', 1438359158, 1, 399.00, 1, '2015080100001000100075197731', NULL, '顺丰快递', '906767797813', '');
INSERT INTO `wp_orders` VALUES (54, '上海市闵行区龙吴路5530弄93号105室', '许愿', '18217743001', 1438523904, 1, 399.00, 1, '2015080200001000000061358237', NULL, '顺丰快递', '918098469445', '上海发货');
INSERT INTO `wp_orders` VALUES (55, '辽宁省沈阳市和平区肇东街52号 民富小区13号楼 （团结路小学对面）', '由一', '13504059939', 1439713043, 1, 399.00, 1, '2015081600001000330063047664', NULL, '顺丰', '993345900290', '北京发货');
INSERT INTO `wp_orders` VALUES (56, '河北省廊坊市广阳区银河北路336号华为基地L3', '袁博', '13911147928', 1439731543, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (57, '河北省廊坊市广阳区银河北路336号华为基地L3', '袁博', '13911147928', 1439731906, 1, 399.00, 1, '2015081600001000310058934353', NULL, '顺丰', '993345900227', '北京发货');
INSERT INTO `wp_orders` VALUES (58, '上海市黄浦区白渡路88号', '雷雅丽', '18817809664', 1440135560, 2, 1620.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (59, '上海市黄浦区白渡路88号康诺口腔', '雷雅丽', '18817809664', 1440135581, 2, 1620.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (60, '上海市黄浦区白渡路88号康诺口腔', '雷雅丽', '18817809664', 1440136827, 2, 1620.00, 1, '2015082100001000860057699615', NULL, '顺丰', '919697594928', '上海发货，送2个便携袋');
INSERT INTO `wp_orders` VALUES (61, '上海市松江区泖港镇范家公路晨兴公路口辰塔大桥项目部', '陈龙', '13801718122', 1441158044, 1, 899.00, 1, '2015090221001004420078065646', NULL, '顺丰快递', '919697596539', '上海发货');
INSERT INTO `wp_orders` VALUES (62, '松江', '于俊杰', '18321285232', 1441240112, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (63, '山东省菏泽市巨野县龙固镇新巨龙能源有限责任公司（邮编274918）', '李森', '18265401066', 1441614905, 1, 399.00, 1, '2015090721001004870073881793', NULL, '顺丰快递', '919697596469', '上海发货，客户旺旺：snlee1989');
INSERT INTO `wp_orders` VALUES (64, '上海', '啊', '1234567890', 1442463626, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (65, '广东省中山市东区兴中道55号国家税务局直属税务分局', '罗剑晖', '18928168009', 1442499345, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (66, '陕西省西安市高新区科技二路58号枫叶新新家园1#3-602', '贺勇', '13609122341', 1442562298, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (67, '上海市浦东新区龙东大道415弄332号（汤臣高尔夫N102）', '胡沐群', '13801997829', 1443359683, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (68, '广西壮族自治区来宾市象州县平安大道215号', '覃晓鑫', '13263859087', 1443536272, 2, 1027.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (69, '多大的', '松下', '13333333', 1444615265, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (70, '送', '送', '送', 1444617051, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (71, '上海松江龙源路555号明镜楼B418', '寿新宝', '13818668848', 1444977796, 1, 399.00, 1, '2015101621001004570081977350', NULL, '顺丰速运', '919113418710', '');
INSERT INTO `wp_orders` VALUES (72, '四川省成都市武侯区聚贤街733号3栋2单元1704室', '冯骁骅', '13880990589', 1445173722, 1, 899.00, 1, '2015101821001004280007913403', NULL, '顺丰速运', '920260540395', '送羊毛毡袋1个');
INSERT INTO `wp_orders` VALUES (73, '山东济南槐荫区美里路1088号', '王楠', '15865318181', 1445178881, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (74, '北京市门头沟区新桥南大街3号门头沟区中医院病房4楼内三科医生办公室', '马鸣', '13466370866', 1445596036, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (75, '北京市门头沟区新桥南大街3号门头沟区中医院病房4楼内三科医生办公室', '马鸣', '13466370866', 1446009119, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (76, '北京市门头沟区新桥南大街3号门头沟区中医院病房4楼内三科医生办公室', '马鸣', '13466370866', 1446012348, 1, 399.00, 1, '2015102821001004350061709924', NULL, '顺丰速运', '307367737154', '北京发货\r\n');
INSERT INTO `wp_orders` VALUES (77, '北京市门头沟区新桥南大街3号门头沟区中医院病房4楼内三科医生办公室', '马鸣', '13466370866', 1446014035, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (78, '东安路', 'a', '13512174886', 1446521701, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (79, '的', 'a', '13512174886', 1446525216, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (80, '贵州省贵阳市小河区四方河路山水黔城三组团', '关关', '15186868842', 1447200965, 1, 899.00, 1, '2015111121001004230041067740', NULL, '韵达单号', '1901297443099', '');
INSERT INTO `wp_orders` VALUES (81, '江西省抚州市临川一中老校区', '孙兰婷', '13918696340', 1447314701, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (82, '上海市虹口区广粤路95号309', '舒承毅', '13601714451', 1447729821, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (83, '上海杨浦区民星路250号', '庄宏', '13917469896', 1447729902, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (84, '上海杨浦区民星路250号', '庄宏', '13917469896', 1447730373, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (85, '上海杨浦区民星路250号', '庄宏', '13917469896', 1447730506, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (86, '上海杨浦区民星路250号', '庄宏', '13917469896', 1447730848, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (87, '福州市长乐市东鹤路1号吴航街道办事处', '张雪珠', '13960876499', 1448375754, 2, 1798.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (88, '福州市长乐市东鹤路1号吴航街道办事处', '张雪珠', '13960876499', 1448375817, 2, 1798.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (89, '福建省福州市长乐市东鹤路1号吴航街道办事处', '张雪珠', '13960876499', 1448376035, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (90, '福建省福州市长乐市东鹤路1号吴航街道办事处', '张雪珠', '13960876499', 1448376278, 2, 1798.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (91, '', '', '', 1448446652, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (92, '', '', '', 1448446653, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (93, '福州市台江区排尾路268号利嘉花园27号店瑞涛五金标准件店', '陈瑞国', '13635294127', 1448633582, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (94, '广州市先烈中路81号大院62栋604', '钟红海', '87681231', 1449547760, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (95, '浙江省杭州市浙江大学附属第一医院门诊7楼口腔科26号位子', '姜鑫俊', '18858181041', 1450093650, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (96, '浙江省杭州市浙江大学附属第一医院门诊7楼口腔科26号位子', '姜鑫俊', '18858181041', 1450093747, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (97, '广州市越秀区百灵路九星巷11号808', '黄育明', '13302284002', 1450333136, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (98, '北京市海淀区永丰路百旺茉莉园一期10号楼104', '田亚楠', '18010130021', 1450945551, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (99, '北京市海淀区永丰路百旺茉莉园一期10号楼104', '田亚楠', '18010130021', 1450945563, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (100, ' 宝山区 华灵路1781 弄70号1001室 200442', '陈琦', '13003233395', 1451003873, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (101, ' 宝山区 华灵路1781 弄70号1001室 200442', '陈琦', '13003233395', 1451003907, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (102, '北京海淀清河小营君安家园东区7号楼1606号', '吴谦坤', '13621041760', 1451048407, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (103, '北京海淀清河小营君安家园东区7号楼1606号', '吴谦坤', '13621041760', 1451048601, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (104, 'tianjin', 'jun zhu', '01186222', 1451143899, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (105, '浙江省杭州市浙江大学附属第一医院门诊7楼口腔科26号位子', '姜鑫俊', '18858181041', 1451391915, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (106, '浙江省杭州市浙江大学附属第一医院门诊7楼口腔科26号位子', '姜鑫俊', '18858181041', 1451392299, 1, 810.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (107, '上海市宝山区华灵路1781弄70号1001室', '陈琦', '13003233395', 1451633878, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (108, '上海市宝山区华灵路1781弄70号1001室', '陈琦', '13003233395', 1451633894, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (109, '111', '111', '111', 1452568407, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (110, '北京', '韩冰', '13401137253', 1452676089, 1, 399.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (111, '上海市普陀区光新路168号石泉金融大厦11层', '路飞', '17701609929', 1453432951, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (112, '上海市普陀区光新路168号石泉金融大厦11层', '路飞', '17701609929', 1453433349, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (113, '湖南省株洲市荷塘区电焊条厂东城家园3-705号', '余鹏', '13973323335', 1455332924, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (114, '北京市朝阳区建国门外大街丙24号京泰大厦23层', '林真', '010-65156551', 1455770413, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (115, '江苏省常州市钟楼区荷花池街道健身路29号体育彩票中心', '臧荣芳', '13961127635', 1455778508, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (116, '南京江宁区将军路翠屏清华园51栋906', '洪灏', '13952006561', 1455853092, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (117, '南京江宁区将军路翠屏清华园51栋906', '洪灏', '13952006561', 1455874783, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (118, '重庆市江津区江津中学地理组', '许新叶', '13508396330', 1456313420, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (119, '山东临沂临西七路与水田路交汇向北50米路西琅琊王石业', '张乃征', '15562986055', 1456481061, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (120, '广东省肇庆高新区尚城国际花园A1   1403房  ', '梁银萍', '18027813156', 1456536939, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (121, '广东省肇庆高新区（四会大旺）尚城国际花园A1  1403房', '梁银萍', '18027813156', 1456537847, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (122, '', '', '', 1457850674, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (123, '昆明市青年路395号3506室', '齐矿铸', '13658886007', 1458003101, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (124, '延吉市，极美水岸，b座15楼13号', '李晓妍', '18744333167', 1458068358, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (125, '延吉市，极美水岸，b座15楼13号', '李晓妍', '18744333167', 1458100895, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (126, '上海徐汇区宜山路868号漕河泾开发区总公司4楼', '姚遥', '18930170802', 1458107032, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (127, '1', '1', '1', 1458111663, 2, 1798.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (128, '1', '1', '1', 1458111862, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (129, '吴江', '李', '17714218520', 1458112026, 2, 1798.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (130, '延吉市，极美水岸，b座15楼13号', '李晓妍', '18744333167', 1458124580, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (131, '极美水岸b座15楼13号', '李晓妍', '18744333167', 1458124792, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (132, '吴江', '李晓敏', '17714218520', 1458186036, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (133, '朝阳市朝阳大街', '赵国庆', '15801331073', 1458289864, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (134, '上海徐汇区汾阳路83号6号楼6楼', '缪爱珠', '13801891501', 1458369796, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (135, '上海徐汇区汾阳路83号6号楼6楼', '缪爱珠', '13801891501', 1458370568, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (136, '上海徐汇区汾阳路83号6号楼6楼', '缪爱珠', '13801891501', 1458370586, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (137, '上海市徐汇区汾阳路83号6号楼6楼', '缪爱珠', '13801891501', 1458387900, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (138, '成都市八宝街28号', '蒋晓旭', '13908059284', 1459140467, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (139, '浙江省宁波市镇海区平海路1188号物流枢纽港Ｄ座423室', '徐暮斌', '18650803131', 1459211127, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (140, '浙江省宁波市镇海区平海路1188号物流枢纽港Ｄ座４楼', '徐暮斌', '18667806333', 1459217017, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (141, '湖北省黄石市黄石港区人民法院', '彭方治', '13329925966', 1459314795, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (142, '北京市 海淀区 万柳东路 万泉新新家园 29楼4门101', '张红', '13381003933', 1459321232, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (143, '北京市石景山区八角东街65号融科创意产业中心A座1006', '刘肖克', '18612558887', 1459828995, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (144, '33dasdfsadf ', 'test', '13811283726', 1459908212, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (145, '北京市朝阳区', '张测试', '13222222222', 1459910063, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (146, 'shenzhen', 'gina', '1234567890', 1459912804, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (147, '建行西藏分行（拉萨市北京西路21号）', '拉巴顿珠', '13889013000', 1459954151, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (148, '上海市徐汇区东泉小区东泉路50弄20号403室', '历小雅', '13122534818', 1460981690, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (149, '', '', '', 1460982317, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (150, '上海市徐汇区东泉小区东泉路50弄20号403室', '历小雅', '13122534818', 1460982444, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (151, '上海市徐汇区东泉小区东泉路50弄20号403室', '历小雅', '13122534818', 1460986993, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (152, '浙江省杭州市滨江区彩虹城44#1302', '倪璐舟', '15957183123', 1461839659, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (153, '江苏省南通市啬园路9号 南通大学校办', '蒋乃华', '15706296789', 1462051276, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (154, '江苏省南通市啬园路9号 南通大学 校办', '蒋乃华', '15706296789', 1462051416, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (155, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462074313, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (156, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462074571, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (157, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462074619, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (158, '重庆九龙坡32栋1单元3一1', '魏晓霞', '13908318281', 1462074930, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (159, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462077302, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (160, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462077320, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (161, '重庆九龙波美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462077945, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (162, '重庆九龙波美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462077970, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (163, '重庆九龙波美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462078042, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (164, '重庆九龙坡32栋1单元3一1', '魏晓霞', '13908318281', 1462078839, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (165, '重庆九龙坡32栋1单元3一1', '魏晓霞', '13908318281', 1462078955, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (166, '重庆九龙坡32栋1单元3一1', '魏晓霞', '13908318281', 1462078972, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (167, '重庆九龙坡32栋1单元3一1', '魏晓霞', '13908318281', 1462078977, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (168, '重庆九龙坡美茵河谷32栋1单元3一1', '魏晓霞', '13908318281', 1462079202, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (169, '北京市昌平区天通苑派出所往东200米1号门', '陈帆', '13691487604', 1462086331, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (170, '北京市天通苑派出所往东100米', '陈帆', '13691487604', 1462086876, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (171, '天津塘沽区大洋百货好日子服饰中心', '宋军', '1338986026', 1463542820, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (172, '江苏无锡市锡山区羊尖工业园B区6号', '陆元生', '13806179292', 1463889161, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (173, '江苏无锡市锡山区羊尖工业园B区6号', '陆元生', '13806179292', 1463889211, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (174, '上海市松江区松江大学城学生公寓一期文汇路600弄86号楼4009室', '贾佳', '13262881116', 1464435373, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (175, '', '', '', 1464763552, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (176, '123455555', 'gina', '123455555', 1466585368, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (177, '郑州市金水区金水路9号', '王先生', '18638391161', 1466669115, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (178, '郑州市金水路9号', '王先生', '18638391161', 1466669335, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (179, '湖南省长沙市人民中路66号3栋408室', '胡巨保', '18627313143', 1466773184, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (180, '厦门市思明区槟榔西里201号302室', '江新华', '13959273858', 1466783646, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (181, '厦门市思明区槟榔西里201号302室', '江新华', '13959273858', 1466821836, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (182, '上海虹许路731号3号楼东5楼', '张静', '13916346511', 1466924750, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (183, '123', '123', '123', 1467096028, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (184, '浙江省宁波市江南公路1498号高新科技广场1号5楼', '庄战萍', '15267888627', 1467112181, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (185, '123', '123', '123', 1467192186, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (186, '厦门市思明区槟榔西里201号302室', '江新华', '13959273858', 1467299952, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (187, 'ppp', 'aaa', '888', 1467521623, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (188, '福建省福州市鼓楼区湖东路208号晓康苑北楼2401（周末可送件）', '林泽昆', '18750101899', 1467623687, 1, 899.00, 1, '2016070421001004790229327328', NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (189, '', '', '', 1467720105, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (190, '', '', '', 1467794675, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (191, '', '', '', 1467794675, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (192, '', '', '', 1467796961, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (193, '湖北省襄阳市南漳县县政府12栋2单元', '童一鸣', '15171108087', 1467824914, 2, 1027.00, 1, '2016070721001004400248412174', NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (194, '', '', '', 1468150249, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (195, '广东省深圳市南山区蛇口望海路南海玫瑰园一期18栋3A', '梁杰', '18938910238', 1468552463, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (196, '北京西单横二条四号院一单元302', '王玲', '13611353589', 1468586824, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (197, '重庆市南岸区南坪光电路龙湖观山水1号楼29-4', '王琴', '13908312980', 1468668647, 2, 1198.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (198, '北京丰台区西局欣园4号楼', '孙奕', '13501367909', 1468673335, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (199, '延边州龙井市第一幼儿园', '单良', '15844373611', 1468744766, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (200, '紫马岭上街一号之二', '钟国铭', '13528262167', 1468752385, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (201, '广东省中山市紫马岭上街一号之二', '钟国铭', '13528262167', 1469114590, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (202, '广东省中山市东区紫马岭上街一号之二', '钟国铭', '13528262167', 1469114639, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (203, '广东省中山市东区紫马岭上街一号之二', '钟国铭', '13528262167', 1469115530, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (204, '广东省中山市东区紫马岭上街一号之二', '钟国铭', '13528262167', 1469198471, 1, 499.00, 1, '2016072221001004590242603873', NULL, '顺丰', '906767790363', '');
INSERT INTO `wp_orders` VALUES (205, '广东省中山市东区紫马岭上街一号之二', '钟国铭', '13528262167', 1469204081, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (206, '上海市古北路530弄28号604室', '张斌', '13524050428', 1469339710, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (207, '上海市天宝路828弄4号1301', '施琴', '13661879069', 1469698259, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (208, 'test', 'test', 'test', 1469778578, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (209, '云南省昆明市西山区前卫街道前卫西路未名城二期A8一栋607', '蔡新国', '13759455332', 1470372043, 1, 599.00, 1, '2016080521001004060296158516', NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (210, '广东深圳南山深意工业大厦', '岑文婷', '13632880813', 1470381409, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (211, '广东深圳南山深意工业大厦', '岑文婷', '13632880813', 1470381519, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (212, '黑龙江省鸡西市鸡冠区南岗3号楼1单元301', '石雷', '13314678888', 1470804577, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (213, '广东省广州市番禺区市桥街道康乐园四街六座', '姚妍', '15768613532', 1470938935, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (214, '广东省梅县区新城办楣杆南路1-5号刘振球中医骨伤科诊所', '刘振球', '15219110769', 1471075931, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (215, '辽宁省大连市高新园区黄浦路977号，华信国际软件园1号楼快递中转站', '王艳明', '13009419939', 1471435950, 1, 599.00, 1, '2016081721001004790267805649', NULL, '顺丰', '924946098601', '');
INSERT INTO `wp_orders` VALUES (216, '广西巴马县甲篆乡坡月村', '郑海燕', '15683260841', 1471656041, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (217, '就恢复萨的痕迹卡位的阖家安康对话框集散地', '低洼地化科技等哈哈的', '65356456121', 1471671191, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (218, 'hngf', 'vdvc', 'gdvv', 1473160763, 100, 89900.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (219, '宁夏银川市兴庆区新华东街83-2#银川承天物业', '李红卫', '13995316500', 1473237796, 1, 899.00, 1, '2016090721001004370293589849', NULL, '顺丰', '304907472563', '');
INSERT INTO `wp_orders` VALUES (220, '555', '344', '445', 1473324201, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (221, '', '', '', 1473399664, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (222, '广东省佛山市禅城区普澜二街6号301', '潘红斌', '13902841270', 1473601809, 1, 899.00, 1, '2016091121001004450224592966', NULL, '顺丰', '924946099924', '');
INSERT INTO `wp_orders` VALUES (223, '安徽省淮南市田家庵区公安小区17号楼', '程隽清', '18605545016', 1473604452, 1, 499.00, 1, '2016091121001004570263185585', NULL, '顺丰', '920662269478', '');
INSERT INTO `wp_orders` VALUES (224, '', '', '', 1473648891, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (225, '辽宁省铁岭市开原市经济开发区铁西北街83号', '高航', '18504102931', 1473918488, 2, 1798.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (226, '辽宁省铁岭市开原市经济开发区铁西北街83号', '高航', '18504102931', 1473919613, 2, 1798.00, 1, '2016091521001004570295623846', NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (227, '辽宁省铁岭市开原市经济开发区铁西北街83号', '高航', '18504102931', 1473920809, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (228, '山东省 滨州市 滨城区 彭李街道 山东省滨州市人民医院办公室 ，256610', '邹健', '15854308776，', 1474078422, 1, 599.00, 1, '2016091721001004900210155696', NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (229, '', '', '', 1477647866, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (230, '福建省 福州市 闽侯区 乌龙江打到 旗山高校教师公寓 13号楼', '刘可', '18606065820', 1477902080, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (231, '广州省，广州市，番禺区，祈福新村名都11座3107室', '薛旋達', '18138722806', 1477993348, 1, 699.00, 1, '2016110121001004090263636559', NULL, '顺丰', '952364549629', '');
INSERT INTO `wp_orders` VALUES (232, '广州市天河区广和一街十二号502房', '李广', '13802736833', 1477998596, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (233, '广东省江门市蓬江区发展大道231号江门市国家税务局，529000', '杨新华', '13902883975', 1478316303, 1, 499.00, 1, '2016110521001004680217329344', NULL, '顺丰', '928153854239', '');
INSERT INTO `wp_orders` VALUES (234, '', '', '', 1478670970, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (235, '', '', '', 1478743946, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (236, '新疆乌鲁木齐河北西路137号四建三区18#1-502', '潘雪莹', '15899185396', 1479461265, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (237, '广东省东莞市常平镇常平大道嘉美豪苑嘉茵阁802', '张柏坚', '15814323128', 1479469376, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (238, '广东省东莞市常平镇常平大道嘉美豪苑嘉茵阁802室', '张柏坚', '15814323128', 1479526772, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (239, '广东省东莞市常平镇常平大道嘉美豪苑嘉茵阁802室', '张柏坚', '15814323128', 1479526856, 1, 599.00, 1, '2016111921001004240231674542', NULL, '顺丰', '928153853880', '深圳发');
INSERT INTO `wp_orders` VALUES (240, '中国深圳市罗湖区', '横说竖说', '11111111111', 1479568620, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (241, '上海市宝山区松兰路1166弄46号601室(宝山万科四季花城)', '周大成', '13901934507', 1479613741, 1, 599.00, 1, '2016112021001004690284675404', NULL, '顺丰', '920662266978', '上海发');
INSERT INTO `wp_orders` VALUES (242, '1', '1', '1', 1479896151, 2, 1027.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (243, '北京市石景山区时代庐峰10号楼1单元1002', '闫旭', '18511857050', 1480298738, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (244, '', '', '', 1480318653, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (245, '', '', '', 1480319152, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (246, '1', '1', '1', 1480319681, 2, 1398.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (247, '', '', '', 1480323662, 2, 1398.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (248, '北京市丰台区蒲黄榆四里西区3号楼西门103号', '巩东红', '13671073745', 1480767464, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (249, '北京市丰台区蒲黄榆四里西区3号楼西门103号', '巩东红', '13671073745', 1480767644, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (250, '北京市丰台区蒲黄榆四里西区3号楼西门103号', '巩东红', '13671073745', 1480767817, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (251, '乌鲁木齐市扬子江路红十月小区东二区12号楼6单元801', '纪同伟', '13579968168', 1480914907, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (252, '新疆乌鲁木齐市新华北路305号美丽华酒店营业部', '张莉沁', '13579264539', 1480919705, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (253, '新疆乌鲁木齐市新华北路305号美丽华酒店营业部', '张莉沁', '13579264539', 1480919935, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (254, '新疆乌鲁木齐市新华北路305号美丽华酒店', '张莉沁', '13579915888', 1480929772, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (255, '乌市扬子江路红十月小区12号楼6单元801', '纪同伟', '13579968168', 1480948179, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (256, '乌市扬子江路红十月小区12号楼6单元801', '纪同伟', '13579968168', 1480948260, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (257, '乌市扬子江路红十月小区12号楼6单元801', '纪同伟', '13579968168', 1480948261, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (258, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481201015, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (259, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481201054, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (260, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481255258, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (261, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481255993, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (262, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481256438, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (263, '新疆乌鲁木齐市天山区新华北路305号美丽华酒店', '张莉沁', '13579915888', 1481256714, 1, 128.00, 1, '2016120921001004970209296073', NULL, '顺丰', '304907475742', '');
INSERT INTO `wp_orders` VALUES (264, '1', '1', '1', 1481273317, 2, 998.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (265, '南京市东郊小镇8街区31栋908室', '李湘', '13675188587', 1481297035, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (266, '南京市东郊小镇8街区31栋908室', '李湘', '13675188587', 1481297072, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (267, '四川省成都市双流县西航港大道中四段615号', '丁华', '17761263435', 1481605985, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (268, '浙江省杭州市下城区东新街道万家信城34幢2单元1101', '张哲敏', '13805788078', 1481699981, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (269, '浙江省杭州市下城区东新街道万家新城34幢2单元1101', '张哲敏', '13805788078', 1481699992, 1, 599.00, 1, '2016121421001004470282212936', NULL, '顺丰', '927312437155', '');
INSERT INTO `wp_orders` VALUES (270, '上海崇明县竖新镇响椿路106号', '周曰冬', '13801634014', 1482135350, 1, 499.00, 1, '2016121921001004760298322306', NULL, '顺丰', '927312437164', '上海发');
INSERT INTO `wp_orders` VALUES (271, '深圳市福田区翠海花园B1座10A', '崔根', '13602640084', 1482387877, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (272, '深圳市福田区翠海花园B1座10A', '崔根', '13602640084', 1482388511, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (273, 'test', 'test', 'test', 1482396786, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (274, 'test', 'test', 'test', 1482458935, 1, 1398.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (275, 'test', 'test', 'test', 1482459196, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (276, 'test', 'test', 'test', 1482718099, 1, 1698.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (277, '广州市越秀区沿江西路107号中山大学孙逸仙纪念医院', '杨川', '13640242307', 1482850594, 1, 1398.00, 1, '2016122721001004360221526889', NULL, '顺丰', '928196200890', '');
INSERT INTO `wp_orders` VALUES (278, '浦北县民兴路方正机电', '何超钊', '18607770230', 1482978836, 1, 1398.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (279, '上海市徐汇区番禺路900号1109室', '吴引明', '13636524189', 1483194922, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (280, '徐汇区番禺路900号1109室', '吴引明', '13636524189', 1483195341, 1, 599.00, 1, '2016123121001004730261109426', NULL, '顺丰', '928196201610', '上海发货');
INSERT INTO `wp_orders` VALUES (281, '浙江省余姚市凤山街道春江花月10幢104室', '缪敏娥', '13505788778', 1483413528, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (282, '北京市西城区真武庙二条真武家园3号楼3单元1203', '杨朝晖', '13032706926', 1483592281, 1, 599.00, 1, '2017010521001004660232759392', NULL, '顺丰', '358316145036', '北京发');
INSERT INTO `wp_orders` VALUES (283, '江苏省南京市江宁区禄口街道禄口镇神舟路15号南京磁晨医疗技术有限公司', '赵华炜', '13815890981', 1483625016, 1, 599.00, 1, '2017010521001004780204951312', NULL, '顺丰', '612102383526', '上海发');
INSERT INTO `wp_orders` VALUES (284, '上海市浦东新区周东南路鹤沙路688弄18号710', '董玮', '15902177163', 1483771143, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (285, '广州市萝岗区科学城国际企业孵化器A区604', '孙佳丽', '15625125065', 1483790102, 2, 1398.00, 1, '2017010721001004790276000211', NULL, '顺丰', '928196201761', '');
INSERT INTO `wp_orders` VALUES (286, '上海市汾阳路79号', '洪贤方', '13801667286', 1483845974, 1, 699.00, 1, '2017010821001004620236901378', NULL, '顺丰', '612137940691', '上海');
INSERT INTO `wp_orders` VALUES (287, '广东省 东莞市 石排镇 石排大道与潭溪西路交汇处东苑花园1栋412', '李方圆', '15918316163', 1483892012, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (288, '', '', '', 1484025525, 3, 2097.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (289, '', '', '', 1484025573, 3, 2097.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (290, '河南省荥阳市囯泰路与荥泽大道交叉口东荥正佳苑2号楼2101', '刘剑', '15538171222', 1484147500, 1, 899.00, 1, '2017011121001004110246113034', NULL, '顺丰', '612189435695', '上海发');
INSERT INTO `wp_orders` VALUES (291, '73 - 29 Fundy Bay Blvd.', 'Sheng Jin', '4163202652', 1484368156, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (292, '广东省佛山市南海区大沥镇黄岐花园新村10号', '黄正东', '13318852831', 1484382899, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (293, '北京市门头沟区中门寺南坡十号楼1003室', '金明', '13611087430', 1484570200, 1, 599.00, 1, '2017011621001004480242454762', NULL, '顺丰', '358316144923', '北京发');
INSERT INTO `wp_orders` VALUES (294, '北京市朝阳区朝外大街乙12号昆泰国际公寓2209', '周子钦', '18918685979', 1484896559, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (295, '北京市西城区二里沟朝阳庵12号楼1门402', '赵天程', '13681271235', 1485861649, 1, 599.00, 1, '2017013121001004530275165697', NULL, '顺丰', '358316144880', '北京发');
INSERT INTO `wp_orders` VALUES (296, '11', '11', '11', 1486343740, 4, 3596.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (297, '北京海淀区五棵松路20号，美丽园小区28-2-202', '周勇', '13801037444', 1486440881, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (298, '上海市場中路1980號', '俞露', '13916034838', 1486463131, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (299, '北京市西城区', '李四', '13700823136', 1486463250, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (300, '北京市海淀区万科西山庭院2-1-102', '张女士', '13910674981', 1486518574, 1, 899.00, 1, '2017020821001004530283443489', NULL, '顺丰', '358316144817', '北京发');
INSERT INTO `wp_orders` VALUES (301, '深圳市南山区深南大道9678号 大冲商务中心1栋2号楼29层', '梅冰冰', '15827490405', 1486557089, 1, 599.00, 1, '2017020821001004910297859004', NULL, '韵达', '1901764866812', '');
INSERT INTO `wp_orders` VALUES (302, '湖北省武汉市硚口区xinshij汇豪邸4-1，1702', '蔡晨', '17771447429', 1486611590, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (303, '湖北省武汉市硚口区新世界汇豪邸4-1，1702', '蔡晨', '17771447429', 1486612440, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (304, '北京市东城区地坛北里小区6-2-301', '李蕊', '13911605968', 1486717670, 1, 899.00, 1, '2017021021001004760270330885', NULL, '顺丰', '358316144783', '北京发');
INSERT INTO `wp_orders` VALUES (305, '江西南昌青山湖区中大南路28号中大青山湖花园6栋', '刘女士', '18979176816', 1486994314, 1, 899.00, 1, '2017021321001004940226252566', NULL, '不发', '不发', '退款');
INSERT INTO `wp_orders` VALUES (306, '江西南昌', '杨辰', '18770027227', 1486995191, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (307, '江西南昌青山湖区中大南路28号中大青山湖花园6栋', '刘女士', '18979176816', 1486995356, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (308, 'academic', '擦擦', 'academic', 1486996544, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (309, '22', '22', '22', 1487145608, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (310, '广州市天河区五山能源路4号', '郭华芳', '13316153210', 1487302491, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (311, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487335642, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (312, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487335887, 1, 599.00, 1, '2017021721001004130285997373', NULL, '顺丰', '308628228424', '北京发');
INSERT INTO `wp_orders` VALUES (313, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487337846, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (314, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487339242, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (315, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487339301, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (316, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487339328, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (317, '天津河东区昕旺北苑阳光星期八６号楼１门1501', '夏印春', '13820912280', 1487339336, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (318, '陕西省西安市友谊西路256号陕西省人民医院呼吸内一科', '王君', '13152135929', 1487389785, 1, 599.00, 1, '2017021821001004140299871303', NULL, '顺丰', '308628228382', '北京发');
INSERT INTO `wp_orders` VALUES (319, '北京市朝阳区金台北街4-1-803', '马凤清', '13611191402', 1487393830, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (320, '浙江省宁波市环城西路南段942号汽配市场133铺位', '戚琼华', '13777132328', 1487589478, 1, 899.00, 1, '2017022021001004350273845680', NULL, '顺丰', '920662267779', '上海发');
INSERT INTO `wp_orders` VALUES (321, '上海市虹口区东汉阳路309弄6号802室', '杨小姐', '18821003837', 1487684727, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (322, '上海市东汉阳路309弄6号802室', '杨小姐', '18821003837', 1487685057, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (323, '福州市仓山区金桔路230水印长天小区26#1801室', '林忠飞', '18559885368', 1487761537, 1, 599.00, 1, '2017022221001004760286536956', NULL, '顺丰', '928196202987', '');
INSERT INTO `wp_orders` VALUES (324, '北京市昌平区西关北路甲15号', '李婷', '18735101825', 1487829518, 1, 128.00, 1, '2017022321001004780263041185', NULL, '顺丰', '308628228346', '北京发');
INSERT INTO `wp_orders` VALUES (325, '浙江省杭州市滨江区浦沿街道伟业路298号先锋科技大厦10楼', '任波', '15388462415', 1487951095, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (326, '上海市普陀区江宁路1415弄16号1902室', '朱晨怡', '15692114099', 1488077328, 1, 499.00, 1, '2017022621001004260202836924', NULL, '顺丰', '920662266', '上海发');
INSERT INTO `wp_orders` VALUES (327, '浦东新区世博村路300号3号楼', '陈家彦', '13701746743', 1488108669, 1, 599.00, 1, '2017022621001004570216687069', NULL, '顺丰', '920662266899', '上海发');
INSERT INTO `wp_orders` VALUES (328, '浦东新区世博村路300号3号楼', '陈家彦', '13701746743', 1488108919, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (329, '哈尔滨市道外区南直路泰富长安城D5~5单元701', '晴空', '13945175753', 1488277253, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (330, '黑龙江省哈尔滨市道外区南直路泰富长安城D5~5单元701', '晴空', '13945175753', 1488349123, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (331, '苏州市吴江区开平路300号', '王卫其', '13901551468', 1488370125, 1, 1398.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (332, '陕西省西安市曲江池北路999号曲江和园公馆别墅区1805.', '庄凯', '13571880805', 1488501774, 1, 499.00, 1, '2017030321001004330270335073', NULL, '顺丰', '928196203081', '');
INSERT INTO `wp_orders` VALUES (333, '浙江台州椒江横河新村98号', '徐斌', '13957698375', 1488556213, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (334, '浙江省台州市椒江区横河新村98号', '徐斌', '13957698375', 1488558414, 1, 499.00, 1, '2017030421001004150293049721', NULL, '顺丰', '920662267788', '上海发');
INSERT INTO `wp_orders` VALUES (335, '3', '1', '2', 1488597109, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (336, '广东省揭阳市榕城区晓翠路市国税局', '余得雁', '13502609196', 1489297733, 1, 599.00, 0, NULL, NULL, '顺丰', '928196203600', '深圳发，苏丽英打款');
INSERT INTO `wp_orders` VALUES (337, '上海市 松江区 泗泾镇 泗凯路 875弄13号504室', '吴忠', '13651765408', 1489324758, 1, 699.00, 1, '2017031221001004920294023947', NULL, '顺丰', '927312437182', '上海发');
INSERT INTO `wp_orders` VALUES (338, '上海市黄浦区大沽路100号3205室', '姜文娟', '13651621429', 1489413039, 1, 599.00, 1, '2017031321001004750264138826', NULL, '顺丰', '927312436381', '上海发');
INSERT INTO `wp_orders` VALUES (339, '123', '123', '13686823958', 1489425185, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (340, '21851', '123123', '123151', 1489454835, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (341, '包头市九原区开元大街1号市党政大楼', '老赵', '18547296931', 1489974195, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (342, '包头市九原区开元大街1号市党政大楼', '老赵', '18547296931', 1489974362, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (343, '包头市九原区开元大街1号市党政大楼', '老赵', '18547296931', 1489974569, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (344, '闵行区平吉路88弄16号601', '袁兆熊', '13818034341', 1490048966, 1, 599.00, 1, '2017032121001004810234480161', NULL, '顺丰', '927312436114', '上海发');
INSERT INTO `wp_orders` VALUES (345, 'adfkjfafa', 'A', '18988681213', 1490142492, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (346, '西安市华山中心医院', '王静', '13572405429', 1490282128, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (347, '广东省阳春市河朗镇圩边', '熔', '13430351620', 1490676158, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (348, '福州市金塘路52号', '施峰', '13705083313', 1490865820, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (349, '福州市金塘路52号', '施峰', '13705083313', 1490865836, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (350, '西安市华山中心医院', '王静', '18049460596', 1490962949, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (351, '西安市华山中心医院', '王静', '18049460596', 1490964214, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (352, 'test', '123', 'test', 1491967874, 1, 1698.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (353, '四川省成都市双流县西航港温哥华花园六期', '张曼宇', '18483638447', 1491994503, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (354, '顺义龙湖别墅香醍慢步庄园一区33栋', '刘振敏', '13241933861', 1492180723, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (355, '厦门市思明区永福宫路5号2102', '张斯斯', '15805904554', 1492318292, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (356, '江西省九江市长虹大道176号', '陈尚青', '18160792815', 1492405224, 1, 128.00, 1, '2017041721001004720252917401', NULL, '顺丰', '928196204359', '深圳发');
INSERT INTO `wp_orders` VALUES (357, '江西省九江市长虹大道176号', '陈尚青', '18160792815', 1492406841, 1, 899.00, 1, '2017041721001004720252887091', NULL, '顺丰', '928196204359', '深圳发');
INSERT INTO `wp_orders` VALUES (358, '上海长宁区通协路268号尚品都汇272-5F名阑意大利餐厅', '洪戈', '18918938592', 1492442616, 1, 499.00, 1, '2017041721001004940236129657', NULL, '顺丰', '927312436266', '上海发');
INSERT INTO `wp_orders` VALUES (359, '江苏省苏州市工业园区玲珑湾花园1幢2302室', '金晓澄', '13913729688', 1492491186, 1, 599.00, 1, '2017041821001004890208426760', NULL, '顺丰', '929307741931', '上海发');
INSERT INTO `wp_orders` VALUES (360, '重庆市潼南区梓潼街道办事处凉风垭', '胡先生', '18983898567', 1492510289, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (361, '深圳市龙岗区坂田华为基地F区', '张慧', '15602981091', 1492968721, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (362, '广西宜州市城西大转盘旁喜来登酒店', 'Gary Ely', '18877832397', 1493003061, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (363, '4444', '11', '1555', 1493004956, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (364, '广西宜州市城西大转盘旁喜来登酒店', 'Gary Ely', '6788822881', 1493005129, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (365, '浦东新区惠南镇拱极路2381弄51号', '张佳娜', '13817156565', 1493183180, 1, 599.00, 1, '2017042621001004990216401914', NULL, '顺丰', '928196204631', '深圳发');
INSERT INTO `wp_orders` VALUES (366, '陕西省西安市雁塔区小寨西路49号（军区三号院）', '张纪春', '18092337288', 1493202830, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (367, '广东省湛江市霞山区文明东路2号广东医科大学', '蔡梓滔', '13729138510', 1493343930, 1, 599.00, 1, '2017042821001004100217941935', NULL, '顺丰', '928196204640', '深圳发');
INSERT INTO `wp_orders` VALUES (368, '四川省巴中市通江县诺江镇石梯街33号', '邓江', '15983986222', 1493712394, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (369, '甘肃省兰州市七里河区体育街69号甘肃省体育彩票管理中心', '刘湘珺', '18298331853', 1493796122, 1, 499.00, 1, '2017050321001004450273351881', NULL, '顺丰', '35865265199', '北京发');
INSERT INTO `wp_orders` VALUES (370, '深圳市罗湖区莲塘街道罗沙路口兰亭国际A栋26h', '朱伟芬', '13902998066', 1493798279, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (371, '深圳市罗湖区莲塘街道罗沙路口兰亭国际A栋26h', '朱伟芬', '13902998066', 1493798354, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (372, '深圳市罗湖区莲塘街道罗沙路口兰亭国际A栋26h', '朱伟芬', '13902998066', 1493798355, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (373, '深圳市罗湖区莲塘街道罗沙路口兰亭国际A栋26h', '朱伟芬', '13902998066', 1493798358, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (374, '北京海淀区泉宗路2号光大家园4--1509', '张红', '13701009201', 1493822981, 1, 499.00, 1, '2017050321001004060252425632', NULL, '顺丰', '928196204825', '深圳发');
INSERT INTO `wp_orders` VALUES (375, '浙江省宁波市海曙区西湾路39弄36号501室', '郑杏英', '18368276112', 1494130976, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (376, '北京海淀区泉宗路2号光大家园4--1509', '张红', '13701009201', 1494222494, 1, 699.00, 1, '2017050821001004060260307313', NULL, '顺丰', '358271031795', '北京发');
INSERT INTO `wp_orders` VALUES (377, '北京西城区车公庄大街19号中国', '娄莎莎', '13911001380', 1494320363, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (378, '北京西城区车公庄大街19号 中国建筑设计院有限公司', '娄莎莎', '13911001380', 1494320398, 1, 499.00, 1, '2017050921001004130212078926', NULL, '顺丰', '35868565245', '北京发');
INSERT INTO `wp_orders` VALUES (379, '安居街88号戎居苑', '夏晓蓉', '13658020052', 1494374706, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (380, '江苏省无锡市万科魅力之城二区246-302', '万敏', '15961813006', 1494628339, 1, 499.00, 1, '2017051321001004950213261859', NULL, '顺丰', '357073846436', '北京发');
INSERT INTO `wp_orders` VALUES (381, '江苏省无锡市万科魅力之城二区246-302', '万敏', '15961813006', 1494628474, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (382, '北京市东城区王府井东方广场C2座206', '高振萍', '18701530239', 1494758393, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (383, '上海市浦东新区凌环路179弄16号501室', '黄顺忠', '13817657610', 1494849192, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (384, '湖北省武汉市汉阳区华润中央公园一期5-2-1502', '黎阳', '15377566978', 1494917718, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (385, '贵州省贵阳市', '曹时宁', '18984281092', 1495002216, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (386, 'cjdtlWEfEJjKRENLG', 'JimmiXzSq', '14687284209', 1495206840, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (387, '深圳市福田区兰天路403在栋206', '符旭莲', '13654228911', 1495220871, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (388, '深圳市福田区兰天路403栋206', '符旭莲', '13652448911', 1495268237, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (389, '深圳市福田区兰天路403栋206', '符旭莲', '13652448911', 1495268367, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (390, '深圳市福田区兰天路403栋206', '符旭莲', '13652448911', 1495268382, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (391, '4', '2', '3', 1495626543, 2, 1798.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (392, '上海浦东新区临港环湖西一路819号C区511室', '朱超嵩', '13801677184', 1495782890, 1, 599.00, 1, '2017052621001004870252393225', NULL, '顺丰', '927312436248', '上海发');
INSERT INTO `wp_orders` VALUES (393, '上海市长宁区幸福路137号306室', '陈颖', '13916032267', 1496304583, 1, 599.00, 1, '2017060121001004750295201736', NULL, '顺丰', '929307741464', '上海发');
INSERT INTO `wp_orders` VALUES (394, '河北省邯郸市雪驰路59号邯山区市场监管局', '杨文志', '18931626321', 1496373464, 1, 599.00, 1, '2017060221001004530263427046', NULL, '顺丰', '929307741400', '上海发');
INSERT INTO `wp_orders` VALUES (395, '河北省邯郸市雪驰路59号邯山区市场监管局', '杨文志', '18931626321', 1496373573, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (396, '上海市普陀区交通西路108弄11号705室', '詹琳', '56531011', 1496410801, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (397, '四川省成都市金牛区马河湾1号6-2-7', '孙跃', '13308227041', 1497402520, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (398, '广州天河中山大道55号华南师大教师村D座2604', '高凌飚', '13922115832', 1497820062, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (399, '辽宁省盘锦市盘山县太平经济开发区盘锦耀隆洗涤服务有限公司', '赵斌', '18604279666', 1497845671, 1, 899.00, 1, '2017061921001004720264744268', NULL, '顺丰', '357073846949', '北京发');
INSERT INTO `wp_orders` VALUES (400, '云南省楚雄彝族自治州楚雄市罗马庄园C42幢', '梁芳', '18721398897', 1497885734, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (401, '云南省楚雄彝族自治州楚雄市罗马庄园C42幢', '梁芳', '18721398897', 1497885788, 1, 599.00, 1, '2017061921001004440283829562', NULL, '顺丰', '086166445514', '深圳发');
INSERT INTO `wp_orders` VALUES (402, '北京市海淀区万科西山庭院2-1-102 ', '黄先生', '18611979299', 1498011912, 1, 599.00, 1, '2017062121001004530299285058', NULL, '顺丰', '3577073846897', '北京发');
INSERT INTO `wp_orders` VALUES (403, '广东省珠海市拱北街道拱北地下商城负一层莱福士D1258铺', '赵峻汝', '17765692367', 1498794512, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (404, '成都市金牛区长福街', '朱先生', '13909097907', 1498978383, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (405, '成都市金牛区长福街', '朱先生', '13909097907', 1498978501, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (406, '成都市金牛区长福街', '朱先生', '13909097907', 1498978524, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (407, '成都市金牛区长福街', '朱先生', '13909097907', 1498978581, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (408, '广东省汕头市潮阳区贵屿镇仙马乡毓秀南路东五街16号', '马子滨', '13542862329', 1499093379, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (409, '广东省汕头市潮阳区贵屿镇仙马乡毓秀南路东五街16号', '马子滨', '13542862329', 1499100289, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (410, '广东省汕头市朝阳区贵屿镇仙马乡毓秀南路东五街16号', '马子滨', '13542862329', 1499167041, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (411, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178422, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (412, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178435, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (413, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178445, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (414, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178451, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (415, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178462, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (416, '江苏省无锡市崇安区工运路8号江苏银行国际业务部', '唐丹玲', '13706193511', 1499178480, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (417, '北京市西城区德胜街道六铺炕北小街5号', '龚群', '13501066627', 1499233181, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (418, '四川省南充市顺庆区舞凤街道镇江东路尚水佳苑', '卢河东', '13696212676', 1499244532, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (419, '武汉市江岸区九万方长江科学院岩土大楼716室', '李玫', '15807180706', 1499392517, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (420, 'GRWoajBqpAa', 'Barnypok', '97856556682', 1499496649, 1, 1298.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (421, 'lUUkWlXJNAPGlNlojSR', 'Barnypok', '26450051626', 1499568209, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (422, '成都市（邮编610072）大石西路66号柏仕晶舍1-4-202', '姜环宇', '18980707736', 1499570073, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (423, 'gmKahtCaRIVuR', 'Barnypok', '36081977586', 1499595567, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (424, '贵州省遵义市汇川区深圳路明珠花园云天苑309', '刘俊', '15329724760', 1499601539, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (425, '河北省衡水市桃城区育才街大陆裕丰3号楼一单元502', '孙木森', '15713180769', 1499749631, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (426, '北京市东三环中路一号环球金融中心东塔20层', '李小姐', '13810578938', 1499762158, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (427, '北京市东三环中路一号环球金融中心东塔20层', '李小姐', '13810578938', 1499762249, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (428, '中国云南大理市洱海庄园42-1-101', '陈建平', '13987248333', 1499923564, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (429, '新疆喀什市迎宾大道120号（喀什地区第一人民医院）', '陈娟', '13600093819', 1499938222, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (430, '四川省德阳市中江县凯北帝景D栋一单元', '王嘉尔', '15183657215', 1499953591, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (431, '四川省德阳市中江县凯北帝景D栋一单元', '黄雪', '15183657215', 1499953717, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (432, '1', '1', '1', 1499999618, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (433, '广东省湛江市霞山区海淀路23栋4门507房', '邓明亮', '13702880969', 1500025942, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (434, '上海市徐汇区龙吴路1700号', '陈力', '64510346', 1500089040, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (435, '新疆喀什市迎宾大道120号（喀什地区第一人民医院）', '陈娟', '13600093819', 1500093085, 0, 0.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (436, '阿三地方', '大风车', '方法大', 1500208999, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (437, '黑龙江哈尔滨南岗区学府路哈医大二院外科楼5层普外一病房', '韩德恩', '13359852888', 1500348035, 2, 1198.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (438, '深圳市南山区华侨城一期K302', '钟冬连', '18965199183', 1500426286, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (439, '湖南省娄底市双峰县杏子铺镇和睦村双峰农村信用社丰瑞支行', '卞灿', '15073839891', 1500546565, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (440, '湖南省娄底市双峰县杏子铺镇和睦村双峰农村信用社丰瑞支行', '卞灿', '15073839891', 1500546590, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (441, '湖南省娄底市双峰县杏子铺镇和睦村双峰农村信用社丰瑞支行', '卞灿', '15073839891', 1500546613, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (442, '', '', '', 1500712011, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (443, '南宁市良庆区银象路50号', '陈勇', '13397712260', 1501004575, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (444, '广东省湛江市霞山区文明东路2号', '李明颖', '13888613506', 1501595686, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (445, '345345', '345345', '345345', 1501674166, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (446, '44444444444444', '44444444', '444444444444', 1501674185, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (447, '深圳市南山区南山大道南山大道时代骄子大厦B712', '陈小姐', '13798279547', 1501776214, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (448, '深圳市南山区南山大道南山大道时代骄子大厦B712', '陈小姐', '13798279547', 1501811295, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (449, '深圳市南山区南山大道南山大道时代骄子大厦B712', '陈小姐', '13798279547', 1501812864, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (450, '广州市海珠区纺织路中海名都A3-2102', '陈愈坚', '18620105148', 1501843602, 2, 1098.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (451, '上海浦东新区商城路1177弄19号504室', '王夷倩', '13564513856', 1502199301, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (452, '上海浦东新区商城路1177弄19号504室', '王夷倩', '13564513856', 1502199357, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (453, '上海浦东新区商城路1177弄19号504室', '王夷倩', '13564513856', 1502199604, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (454, '广东省佛山市顺德区乐从镇乐从大道西B333号', '熊丹', '13226995080', 1502201257, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (455, '南京市中华路50号弘业大厦1188室', '严宏斌', '13851823002', 1502352941, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (456, '南京市中华路50号弘业大厦1188室', '严宏斌', '13851823002', 1502353063, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (457, '湖北省宜昌市秭归县茅坪镇屈原路8号自来水公司大楼', '卢静', '15071791986', 1502365276, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (458, '湖北省宜昌市秭归县茅坪镇屈原路8号自来水公司大楼', '卢静', '15071791986', 1502365297, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (459, '湖北省宜昌市秭归县茅坪镇屈原路8号自来水公司大楼', '卢静', '15071791986', 1502365388, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (460, '湖北省宜昌市秭归县茅坪镇屈原路8号', '卢静', '15071791986', 1502365575, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (461, '湖北省宜昌市秭归县茅坪镇屈原路8号', '卢静', '15071791986', 1502365761, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (462, '湖北省宜昌市秭归县茅坪镇屈原路8号自来水公司大楼', '卢静', '15071791986', 1502369296, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (463, '上海市浦东新区商城路1177弄19号504室', '王夷倩', '13564513856', 1502458594, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (464, '湖北省武汉市江汉区香港路228号长福公寓三单元903', '向力', '18986165779', 1502532018, 1, 1698.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (465, '广西南宁市江南区星光大道238号玫瑰园6栋2单元', '苏国贵', '13197718122', 1502547523, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (466, '江苏省昆山市玉山镇朝阳西村22号楼503室', '陈刚', '13328059275', 1502775205, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (467, '江苏省昆山市玉山镇朝阳西村22号楼503室', '陈刚', '13328059275', 1502775384, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (468, '浙江省杭州市下沙24号大街 观澜时代天筑3幢1单元1802', '周媛', '13757174234', 1502850871, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (469, '北京海淀区泉宗路2号光大花园4---1509', '张s', '13701009201', 1503239847, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (470, '北京海淀区泉宗路2号光大家园4--1509', '张s', '13701009201', 1503324063, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (471, '重庆江北区建新北路三支路69号(耐德佳宛)1栋6一6', '黄永秀', '15123104396', 1503398835, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (472, '北京海淀区泉宗路2号光大家园4---1509', '张s', '13701009201', 1503466114, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (473, '北京海淀区泉宗路2号光大家园4----1509', '张s', '13701009201', 1503466222, 2, 256.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (474, '云南省昆明市盘龙区福泽雅苑', '张大牛', '13908759571', 1503489074, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (475, '浙江省温州市鹿城区五马街道瓯江路江晨佳苑1幢2102室', '侯强', '13806885594', 1503585134, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (476, '', '', '', 1503585302, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (477, '山东省济南市旅游路28666号国华东方美郡108楼', '袁奇清', '18660117755', 1503904635, 2, 1198.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (478, '宁波', '董先生', '13777085060', 1504657684, 1, 699.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (479, '上海市嘉定区翔江公路965弄108号', '上海广坤物流有限公司', '13701766729', 1504683343, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (480, '上海市嘉定区翔江公路965弄108号', '上海广坤物流有限公司', '13701766729', 1504683370, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (481, '上海市嘉定区翔江公路965弄108号', '上海广坤物流有限公司', '13701766729', 1504683398, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (482, '浙江杭州市文三路108号中大文锦苑4幢201室', '包玲君', '13958006119', 1504769372, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (483, 'eLUQUHFzmZvghQo', 'JimmiNu', '30965020274', 1505016743, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (484, '深圳西乡劳驾108', '冯先生', '13530271696', 1505025308, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (485, '深圳市宝安区坪洲地铁', '刘德财', '13538228353', 1505059857, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (486, '深圳市宝安区坪洲地铁', '刘德财', '13538228353', 1505059987, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (487, '广东省汕头市外马路20号海关宿舍', '周沁园', '18602521250', 1505087529, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (488, '广东省深圳市宝安区坪洲地铁B口麻布新村9巷13号', '刘德财', '13538228353', 1505100612, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (489, '江西省赣州市章贡区经济技术开发区香港工业区 金潭大道26号3栋206积嘉网络', '钟飞飞', '15770741377', 1505100995, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (490, '上海市浦东新区新场镇笋心路102号', '王翔', '13524873247', 1505118235, 1, 1298.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (491, '上海市浦东新区新场镇笋心路102号', '王翔', '13524873247', 1505118871, 1, 1298.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (492, '广东省汕头市金平区外马路20号海关宿舍18栋', '周沁园', '18602521250', 1505304262, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (493, '广东省汕头市金平区外马路20号海关宿舍18栋', '周沁园', '18602521250', 1505304405, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (494, '广东省汕头市金平区外马路20号海关宿舍18栋', '周沁园', '18602521250', 1505383775, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (495, '上海市宝山区祁华路655弄1号楼', '张玉', '17374345616', 1505721399, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (496, '上海市宝山区祁华路655弄1号楼', '张玉', '17374345616', 1505721917, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (497, '上海市宝山区祁华路655弄1号楼', '张玉', '17374345616', 1505722380, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (498, 'q', 'q', 'q', 1506008063, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (499, '广东省广州市海珠区晓港西路3号12栋16C', '黄小琥', '13590555868', 1506008121, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (500, '湖北省武汉市东湖高新技术开发区华工科技园一路五号', '刘文', '13972922312', 1506482519, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (501, '湖北省武汉市东湖高新技术开发区华工科技园一路五号', '刘文', '13972922312', 1506482775, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (502, '1', '1', '1', 1506492148, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (503, '陕西省西安市未央区大兴西路48号进丰小区', '冯苗', '15529016982', 1506513450, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (504, '2', '2', '2', 1506847866, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (505, '山西省太原市和平南路59号院1号楼23号', '匡衡', '13503519824', 1506934730, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (506, '山西省太原市和平南路59号院1号楼23号', '匡衡', '15536659131', 1506940301, 1, 128.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (507, '宁波市鄞州区首南街道太康东路宁波诺丁汉大学22号楼', '赵世琦', '18888683313', 1507118476, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (508, '宁波市鄞州区首南街道太康东路宁波诺丁汉大学22号楼', '赵世琦', '18888683313', 1507118485, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (509, '宁波市鄞州区首南街道太康东路宁波诺丁汉大学22号楼', '赵世琦', '18888683313', 1507118491, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (510, '宁波市鄞州区首南街道太康东路宁波诺丁汉大学22号楼', '赵世琦', '18888683313', 1507118512, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (511, '宁波市鄞州区首南街道泰康东路宁波诺丁汉大学22号楼', '赵世琦', '18888683313', 1507118606, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (512, '浙江省宁波市海曙区段塘街道芳草苑3幢', '王玛丽', '15868759028', 1507370783, 1, 499.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (513, '成都市高新区交子北一路88号', '艾琳', '18681703013', 1507535926, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (514, 'ddd', 'ddd', 'ddd', 1507608678, 1, 899.00, 0, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `wp_orders` VALUES (515, '', '', '', 1507785555, 1, 599.00, 0, NULL, NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for wp_shopes
-- ----------------------------
DROP TABLE IF EXISTS `wp_shopes`;
CREATE TABLE `wp_shopes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `authorization_no` varchar(100) NOT NULL,
  `link` varchar(150) NOT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_date` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_shopes
-- ----------------------------
BEGIN;
INSERT INTO `wp_shopes` VALUES (1, '洁碧华南专卖店 ', '深圳市', 'CP0755001-1（E）', 'http://shop58859170.taobao.com', 0, 1, 1423021417, 'doubletong');
INSERT INTO `wp_shopes` VALUES (2, 'waterpik洁碧旗舰店', '深圳市', 'CP0755001（E）', 'http://waterpik.tmall.com/', 0, 1, 1423021896, 'doubletong');
INSERT INTO `wp_shopes` VALUES (3, '洁碧莱格专卖店', '无锡市', 'CP05100001（E）', 'http://waterpiklg.tmall.com/', 0, 1, 1425089676, 'wateradmin');
COMMIT;

-- ----------------------------
-- Table structure for wp_special
-- ----------------------------
DROP TABLE IF EXISTS `wp_special`;
CREATE TABLE `wp_special` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pic_title` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_special
-- ----------------------------
BEGIN;
INSERT INTO `wp_special` VALUES (77, '保持口腔清洁的方法有哪些', '<p>日常生活中，保持口腔清洁的方法有哪些呢？被大多人所熟知的可能就是刷牙和漱口这两种。刷牙是早晚都会做的，但是我们的刷牙方式正确吗？饭后用牙签剔牙真的对吗？这样真的能达到口腔清洁的效果吗？为什么会有口臭呢？是不是刷牙方法不对？这些关于口腔健康的问题值得我们好好思考。下面小编为大家介绍保持口腔清洁的几种方法。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"日常生活中口腔该如何正确清洁\" src=\"/assets/ckfinder/userfiles/images/23.jpg\" style=\"float:left; height:130px; width:150px\" /><strong><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/care/53.html\">日常生活中口腔该如何正确清洁</a></span></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 日常生活中口腔该如何正确清洁？人们常说，&ldquo;牙好，胃口好，吃嘛嘛香&rdquo;。口腔健康，特别是牙周健康与人体身心健康是息息相关的。我们都认为睡前漱口，起床漱口，饭后漱口就做好口腔卫生了。刷牙时大部分人都习惯于把牙膏、水和泡沫混在一起刷，很快就刷好了。在短暂的刷牙过程中，清洁了牙齿，但是牙龈的边缘与牙齿之间的部位都是很难照顾到的，这是生活中大部分人刷牙的习惯。生活中口腔该如何正确清洁呢？&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"如何保持口腔清洁四大招\" src=\"/assets/ckfinder/userfiles/images/25.jpg\" style=\"float:right; height:150px; width:150px\" /><strong><a href=\"http://www.chinawaterpik.com/knowledge/care/55.html\"><span style=\"font-size:16px\">如何保持口腔清洁四大招</span></a></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 如何保持口腔清洁，远离口臭？口臭是口腔局部疾患引起的，同时口臭也常是某些严重系统性疾病的口腔表现，有一些器质性疾患也会导致口臭症。口腔卫生的重点在于控制菌斑，消除污垢和食物残渣，增强生理刺激，使口腔和牙颌系统有一个清洁健康的良好环境，从而发挥其生理功能，维护口腔健康。如何保持口腔清洁卫生？应从以下几个方面采取措施：</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"正确的口腔清洁方法有哪些\" src=\"/assets/ckfinder/userfiles/images/26.jpg\" style=\"float:left; height:100px; width:150px\" /><strong><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/care/56.html\">正确的口腔清洁方法有哪些</a></span></strong></p>\r\n\r\n<p>要想&ldquo;牙好，胃口好&rdquo;，需要掌握正确的口腔清洁方法，养成睡前刷牙、起床刷牙、吃完东西漱口等口腔清洁的好习惯。但是很多人却忽视了，不以为然。当出现牙痛、牙龈出血、蛀牙、口气重等一系列口腔问题的时候才会意识到口腔健康的重要性。应该树立防患于未然的意识，树立口腔清洁理念，用正确的口腔清洁方法呵护口腔健康。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"\" src=\"/assets/ckfinder/userfiles/images/27.jpg\" style=\"float:right; height:100px; width:150px\" /><strong><a href=\"http://www.chinawaterpik.com/knowledge/care/57.html\"><span style=\"font-size:16px\">专业的口腔清洁方法有哪些</span></a></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 父母应该学习一些专业的口腔清洁知识，用专业的口腔清洁方法呵护孩子健康成长。爱牙护牙伴随人的一生，对于每个人来说都是非常重要的。儿童口腔健康应该从小抓起，如何正确刷牙也自然而然地成为孩子从小的必修功课之一。父母从宝宝小时候起就需帮助及督促其每天认认真真地完成刷牙任务，慢慢地教会孩子正确的刷牙方式。伴随着年龄的增长，科学的、专业的口腔清洁方法将使他们受用终生。</p>\r\n', '洁碧网为大家介绍如何正确的清洁口腔、保持口腔清洁，以及专业的口腔清洁方法，希望能帮助您更好的了解口腔清洁。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '如何正确的清洁口腔_保持口腔清洁_专业的口腔清洁方法', 997, 1, 'water', '/assets/ckfinder/userfiles/images/16.jpg', '/assets/ckfinder/userfiles/images/16.jpg', 1480572729, 1, '', NULL);
INSERT INTO `wp_special` VALUES (78, '如何专业护理口腔，洁碧水牙线来帮你', '<p>&nbsp; &nbsp; 想要进行彻底的口腔护理，单靠刷牙是远远不够的。那么如何专业护理口腔？世界卫生组织对口腔健康的定义是：牙齿清洁，无龋洞，无痛感，牙龈颜色正常，无出血现象。想要达到这样的标准，却不知道如何专业护理口腔的话，就让洁碧水牙线来帮你吧。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"口腔护理的重要性——口腔护理知识\" src=\"/assets/ckfinder/userfiles/images/22.jpg\" style=\"float:left; height:110px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/52.html\"><strong>口腔护理的重要性</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; 本文将研究口腔护理的重要性。很多人都会觉得口腔护理不重要，其实不然，口腔健康是人类现代文明的重要标志之一。单从这一点来看，口腔护理的重要性就不言而喻了。在人与人之间的交往中, 口腔健康、整齐洁白的牙齿是人的外表形象重要的一部分。随着人们之间的交往日益增多，接触日渐频繁，口腔健康客观上已成为影响人们职业选择、配偶选择的重要因素之一。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"口腔护理的注意事项一览\" src=\"/assets/ckfinder/userfiles/images/28.jpg\" style=\"float:right; height:110px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/44.html\"><strong>口腔护理的注意事项一览</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; 口腔作为人体消化系统的开口，对我们身心的健康会产生重要的影响。最近有来自国外的学者宣称，人体口腔中存在的&ldquo;CNM&rdquo;基因的变形链球菌（牙菌斑的主要成分之一）可能导致痴呆及脑出血，所以，口腔对我们的大脑健康也至关重要。因此在日常的口腔护理的过程中，一定要了解口腔护理的注意事项。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"正确的进行口腔护理绝非刷牙那么简单\" src=\"/assets/ckfinder/userfiles/images/shutterstock_2501446241.jpg\" style=\"float:left; height:110px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/43.html\"><strong>正确的进行口腔护理绝非刷牙那么简单</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; 学会如何正确地进行口腔护理非常重要，因为口腔健康不仅保障我们充分地咀嚼，享受美味佳肴；也保障我们口气清新，可以更自信地开口表达自己。然而，如果没有准确地进行口腔护理，会产生牙周疾病，甚至会影响到全身健康。因此，学会如何正确地进行口腔护理，能有效地帮助消除身体疾病的隐患。那如何正确地进行口腔护理呢？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"爱护身体，从口腔护理开始\" src=\"/assets/ckfinder/userfiles/images/shutterstock_2077212821.jpg\" style=\"float:right; height:130px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/45.html\"><strong>爱护身体，从口腔护理开始</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; 口腔健康与身体健康有难解难分的关系，要保持身体健康也就是需要我们经常进行口腔护理保持口腔健康。口腔护理的目的不单单是为了口腔健康，口腔护理的目的更是为了全身健康。我们熟知的进行口腔护理的目的有：1、保持口腔清洁、湿润；2、去除口臭、牙垢，增进食欲。所以口腔护理的目的还有以下重要两点</p>\r\n', '洁碧网为大家介绍如何正确的护理口腔、口腔护理注意事项，以及口腔护理的重要性，希望能帮助您更好的了解如何护理口腔。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '如何正确的护理口腔_口腔护理注意事项_口腔护理的重要性', 1258, 1, 'water', '/assets/ckfinder/userfiles/images/17066-an-asian-couple-smiling-at-each-other-outdoors-pv.jpg', '/assets/ckfinder/userfiles/images/17066-an-asian-couple-smiling-at-each-other-outdoors-pv.jpg', 1480938014, 1, '', NULL);
INSERT INTO `wp_special` VALUES (79, '常用的口腔护理产品有哪些', '<p>&nbsp; &nbsp; 大部分人都很注重身体健康，会做各种保养和保健工作，却时常忽略很重要的口腔问题。如果您不希望有一天去牙科看医生，就从现在开始注重口腔健康护理工作，认真对待您的口腔问题。很多人想了解常见的口腔护理产品，下面将介绍一些常用的口腔护理产品。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"口腔护理产品有哪些——口腔护理注意事项\" src=\"/assets/ckfinder/userfiles/images/31.jpg\" style=\"float:left; height:90px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/61.html\"><strong>口腔护理产品有哪些</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; 口腔护理产品有哪些？现在市场上的口腔护理产品种类和品牌很多，如何对口腔护理产品进行选择，口腔护理产品有哪些，也成为大家日常关注的话题。其实口腔护理产品的选择注意这三点就足够了：对牙齿损伤尽量小、有美白效果、抑制细菌并能保持口气清新。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:14px\"><strong><img alt=\"日常口腔护理用品推荐——口腔护理用品有哪些\" src=\"/assets/ckfinder/userfiles/images/35.jpg\" style=\"float:right; height:90px; width:150px\" /></strong></span><span style=\"font-size:16px\"><strong><a href=\"http://www.chinawaterpik.com/knowledge/65.html\">日常口腔护理用品推荐</a></strong></span></p>\r\n\r\n<p>&nbsp; &nbsp; 生活水平的提高，也让越来越多的人开始注重健康。虽然口腔只是身体的一个小部分，但是也需要我们做好日常的护理工作。口腔护理用品也是我们生活中必不可少的，现在人们对口腔用品的需求已经从刷牙开始向外延伸。其实口腔护理用品的种类很多：</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><img alt=\"最常见的口腔保健用品有哪些_口腔保健用品推荐\" src=\"/assets/ckfinder/userfiles/images/36.jpg\" style=\"float:left; height:90px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/66.html\">最常见的口腔保健用品有哪些</a></span></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 最常见的口腔保健用品有哪些呢?健康洁白的牙齿不仅能让人更好的享受美食，还能让人更自信的展现笑容。想要展现自信笑容就从现在开始使用口腔健康产品来保护口腔吧，这对预防牙龈疾病，保持牙齿健康都有很大帮助。那么最常见的口腔保健用品有哪些呢?</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong><img alt=\"日常口腔护理技巧有哪些_口腔护理知识\" src=\"/assets/ckfinder/userfiles/images/37.jpg\" style=\"float:right; height:90px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/67.html\">日常口腔护理技巧有哪些</a></span></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 日常口腔护理技巧有哪些?正所谓疾病从口中进入，其实日常口腔护理与我们的健康息息相关，口腔护理如果做不好就会给我们带来很多疾病问题。当然，要做好口腔护理也要了解口腔护理技巧，这样我们的护理才会更有效。针对这种情况，我们来对日常口腔护理技巧做下介绍吧。</p>\r\n', '洁碧网为大家介绍口腔护理产品大全、口腔护理产品有哪些，以及日常口腔护理用品，希望能帮助您更好的了解口腔护理产品。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '口腔护理产品大全_口腔护理产品有哪些_日常口腔护理用品', 835, 1, 'water', '/assets/ckfinder/userfiles/images/29.jpg', '/assets/ckfinder/userfiles/images/29.jpg', 1481254569, 1, '', NULL);
INSERT INTO `wp_special` VALUES (86, '去除口臭的方法大全', '<p>&nbsp; &nbsp; 去除口臭的方法大全，您了解吗？现实生活中，口臭的原因有很多，人们通常认为上火是主要原因，上火可能会在一定程度上引起口臭，但是这并不是口臭的唯一原因。因此了解口臭的原因，才能更好地掌握方法。以下就是一些去除口臭的方法大全，希望对您会有帮助。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"去除口臭的最好办法是什么\" src=\"/assets/ckfinder/userfiles/images/group-smiling.jpg\" style=\"float:left; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/85.html\"><span style=\"font-size:16px\"><strong>去除口臭的最好办法是什么</strong></span></a></p>\r\n\r\n<p>&nbsp; &nbsp; 由于日常生活和工作的忙碌，常常会让人们忽视自身的健康。口臭就是其中之一，那么，去除口臭的最好办法是什么呢？口臭最直接的原因就是日常饮食的问题，当然也不排除一些是由疾病引起。以下将介绍去除口臭的最好办法是什么？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"去除口臭的最佳方法有哪些\" src=\"/assets/ckfinder/userfiles/images/smiling-family.jpg\" style=\"float:right; height:100px; width:150px\" /><strong><a href=\"http://www.chinawaterpik.com/knowledge/86.html\"><span style=\"font-size:16px\">去除口臭的最佳方法有哪些</span></a></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 生活中难免有的人群有口臭问题，口臭的引发原因主要还是口腔的问题，因此需要认真对待口腔清洁问题。那么，去除口臭的最佳方法有哪些呢？一般口臭的问题主要由口腔局部和全身两大因素引起。当然，口腔局部的问题还是引发口臭的主要原因。针对口腔局部，一起来了解下，去除口臭的最佳方法有哪些？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"去除口臭最有效的偏方有哪些\" src=\"/assets/ckfinder/userfiles/images/two-women-smiling.jpg\" style=\"float:left; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/87.html\"><span style=\"font-size:16px\"><strong>去除口臭最有效的偏方有哪些</strong></span></a></p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;口臭是日常生活中让人很尴尬的一种问题，往往自己不知道，别人却能闻到，造成很多不便。是否想知道去除口臭最有效的偏方有哪些？如果出现口臭，一定要采取有效的措施，才可以避免生活中因为口气带来的不便。下面，就为大家介绍一些去除口臭最有效的偏方。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"最好清除口气用什么方法\" src=\"/assets/ckfinder/userfiles/images/baby-toothbrush.jpg\" style=\"float:right; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/88.html\"><span style=\"font-size:16px\"><strong>最好清除口气用什么方法</strong></span></a></p>\r\n\r\n<p>&nbsp; &nbsp; 最好清除口气用什么方法？对于有口臭的朋友来说，肯定迫切想知道一个方法。口臭问题的影响不仅是健康上的，也是个人的形象问题。甚至有一些人因为这个问题丧失了自信，失去了原有的活泼和开朗，不愿与人亲密接触。因此不要小看口臭的问题。针对这种情况，来了解下，最好清除口气用什么方法？</p>\r\n', '洁碧网为大家介绍治疗口臭的最佳方法、怎么快速去除口臭以及去除口臭的最好办法是什么，希望能帮助您更好的了解去除口臭的最佳方法。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '治疗口臭的最佳方法_怎么快速去除口臭_去除口臭的最好办法是什么', 742, 1, 'water', '/assets/ckfinder/userfiles/images/woman-4.jpg', '/assets/ckfinder/userfiles/images/woman-4.jpg', 1486110561, 3, '', '');
INSERT INTO `wp_special` VALUES (80, '常见的口腔护理包括哪些', '<p>&nbsp; &nbsp; 常见的口腔护理包括哪些？人们常说，病从口入, 日常生活中口腔护理和口腔保健的重要性显而易见。做好口腔护理工作，才能有更好的胃口和心情去品尝美食。但是，不良的口腔护理也可能引起其他疾病。那么常见的口腔护理究竟包括哪些？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><img alt=\"几种常见的口腔护理方法介绍\" src=\"/assets/ckfinder/userfiles/images/30.jpg\" style=\"float:left; height:110px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/60.html\"><span style=\"font-size:16px\">几种常见的口腔护理方法介绍</span></a></strong></p>\r\n\r\n<p><strong>&nbsp; </strong>&nbsp; 口腔护理方法你了解吗？日常生活中，很多人羡慕广告中那些洁白整齐的牙齿，也有很多人花大价钱去修牙和矫正牙齿，却忽视了一些日常的牙齿护理工作，只要保持良好的日常口腔护理习惯，就可以拥有洁白整齐的牙齿。接下来将介绍几种常见的口腔护理方法，帮助人们做好日常口腔护理工作。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong><img alt=\"口腔护理方法哪些最有效_口腔护理小常识\" src=\"/assets/ckfinder/userfiles/images/32.jpg\" style=\"float:right; height:90px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/62.html\">口腔护理方法哪些最有效</a></span></strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; 了解一些口腔护理方法对日常口腔健康的保健，这样可以避免出现一些口腔方面的疾病。口腔护理方法哪些最有效常常是大众想要了解的，其实身边很多人对口腔护理知识的了解都还停留在刷牙清洁上面，护理意识比较薄弱。下面就一起来了解一下口腔护理方法哪些最有效。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/63.html\"><span style=\"font-size:16px\"><strong><img alt=\"口腔护理知识与方法介绍\" src=\"/assets/ckfinder/userfiles/images/33.jpg\" style=\"float:left; height:110px; width:150px\" />口腔护理知识与方法介绍</strong></span></a></p>\r\n\r\n<p>&nbsp; &nbsp; 了解口腔护理知识与方法，有利于我们保持口腔的健康，可以避免出现口腔疾病。可是我们身边很多人对口腔的护理还只是停留在刷牙漱口阶段，其实这只是最薄弱的护理方法，长期下去会导致蛀牙的出现，这对我们来说是很不利的。针对这种情况，我们将对口腔护理知识与方法进行介绍，希望以下内容对您会有帮助。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong><img alt=\"日常口腔护理方法有哪些呢\" src=\"/assets/ckfinder/userfiles/images/34.jpg\" style=\"float:right; height:129px; width:150px\" /><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/64.html\">日常口腔护理方法有哪些呢</a></span></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 日常口腔护理方法有哪些呢？调查显示，超过80%的口腔疾病是可以通过有效的日常口腔护理避免的，这也说明了日常口腔护理方法的重要性。生活中有很多人不重视口腔问题，认为口腔问题不是大问题，因为并不危及生命。其实这种想法是错误的，口腔如果不健康，就会影响食欲，严重的甚至会引发其他疾病，因此对口腔的日常护理还是很重要的。下面本文将介绍一些口腔护理方法。</p>\r\n', '洁碧网为大家介绍最有效的口腔护理方法、口腔护理方法大全，以及口腔护理方法介绍，希望能帮助您更好的了解口腔护理方法。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '最有效的口腔护理方法_口腔护理方法大全_口腔护理方法介绍', 847, 1, 'water', '/assets/ckfinder/userfiles/images/28.jpg', '/assets/ckfinder/userfiles/images/28.jpg', 1481261129, 1, '', NULL);
INSERT INTO `wp_special` VALUES (83, '口腔预防常识', '<p>&nbsp; &nbsp; 中国饮食文化深厚，饕餮食客也无时无刻不在尝试各色美食，可是在肆无忌惮享受美食时，有没有考虑过牙齿的感受？口腔预防常识知多少？牙齿为什么会在悄然不觉间就坏掉了？虽然现在诊牙治牙的诊所医院处处皆是，可有点名气的则是人满为患，然而大部分就诊的人都是年轻人。如此看来，不得不重视一下口腔预防常识问题。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><img alt=\"口腔护理知识大全\" src=\"/assets/ckfinder/userfiles/images/18.jpg\" style=\"float:left; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/72.html\"><span style=\"font-size:16px\">口腔护理知识大全</span></a></strong></p>\r\n\r\n<p>&nbsp; &nbsp; 俗话说&ldquo;牙疼不是病，疼起来要人命。&rdquo;这充分说明了牙齿要是出现故障，那个痛可真是会让你刻骨铭心。因此，不想被这种疼痛折磨就赶紧拿着口腔护理知识大全这本秘籍好好精读一番吧！为适应快节奏碎片式的阅读风格，洁碧有限公司特此在口腔护理知识大全这类书籍中挑出一些对大家实用且重要的几点加以列举说明：</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:16px\"><strong><img alt=\"口腔保健护理知识有哪些\" src=\"/assets/ckfinder/userfiles/images/20.jpg\" style=\"float:right; height:100px; width:150px\" /></strong><a href=\"http://www.chinawaterpik.com/knowledge/50.html\"><strong>口腔保健护理知识有哪些</strong></a></span></p>\r\n\r\n<p><strong>&nbsp; &nbsp;</strong>2007年，世界卫生组织提出，口腔疾病是一个严重的公共卫生问题，需要积极防治。口腔保健护理知识有哪些？在我们的口腔中，长期存在许多微生物，他们可导致口腔疾病，如龋病、牙周疾病等，会破坏牙齿硬组织和牙齿周围支持组织，除影响咀嚼、言语、美观等功能，也有可能加剧某些全身疾病如冠心病、糖尿病等，危害全身健康。可见，口腔的护理对健康非常重要，因此要养成良好的口腔卫生习惯，呵护口腔健康。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:16px\"><strong><img alt=\"孕期妈妈口腔保健知识必读\" src=\"/assets/ckfinder/userfiles/images/45.jpg\" style=\"float:left; height:100px; width:150px\" /></strong><a href=\"http://www.chinawaterpik.com/knowledge/71.html\"><strong>孕期妈妈口腔保健知识必读</strong></a></span></p>\r\n\r\n<p>&nbsp; &nbsp; 我国事业型女性越来越多，也随着&ldquo;二胎政策&rdquo;的实施，30岁以上大龄女性怀孕的现象日益增多，口腔保健知识对于准妈妈们来说也是相当重要。龋齿是孕期妈妈非常常见的口腔病，还有一种孕期特有的口腔病妊娠期牙龈炎。这两种口腔病是准妈妈们最常见的口腔病。那么造成这两种病的原因是什么呢？如何进行预防？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/55.html\"><strong><img alt=\"牙龈出血口腔护理小常识\" src=\"/assets/ckfinder/userfiles/images/25.jpg\" style=\"float:right; height:100px; width:150px\" />牙龈出血口腔护理小常识</strong></a></span></p>\r\n\r\n<p><strong>&nbsp; &nbsp;</strong>口腔护理小常识是生活中必不可少的，但口腔问题常常被忽视。很多人都会遇到早上刷牙出血等问题，这些都需要引起重视。牙龈出血是一个比较常见的口腔病，很多因素都会导致牙龈出血的发生。这些小问题给我们的生活带来了什么样的危害呢？</p>\r\n', '洁碧网为大家介绍口腔护理小知识、口腔护理常识，以及口腔护理知识大全，希望能帮助您更好的了解口腔护理知识。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '口腔护理小知识_口腔护理常识_口腔护理知识大全', 1071, 1, 'water', '/assets/ckfinder/userfiles/images/8.jpg', '/assets/ckfinder/userfiles/images/8.jpg', 1481264132, 1, '', NULL);
INSERT INTO `wp_special` VALUES (87, '牙疼的常见原因及解决方法', '<p>&nbsp; &nbsp; 牙疼是很多人都有过的经历，那牙疼的常见原因有哪些？俗话说，牙疼不是病，疼起来要人命。这句老话足以证明牙疼的痛苦程度了。其实牙疼并没有那么可怕，只要了解了牙疼的常见原因，根据病因来解决，就可以很好地消除这个隐患。下面，就来了解下牙疼的常见原因。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"牙疼原因是什么\" src=\"/assets/ckfinder/userfiles/images/man-2.jpg\" style=\"float:left; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/90.html\"><strong><span style=\"font-size:16px\">牙疼原因是什么</span></strong></a></p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;相信牙疼是很多人生活中的一个烦恼，牙疼的时候吃不好睡不好，那么牙疼原因是什么呢？了解了牙疼的原因，才能让人们知道痛苦的根源，从而解决问题。那么，牙疼原因是什么呢？一起来了解下。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"牙龈肿痛怎么办\" src=\"/assets/ckfinder/userfiles/images/woman-1.jpg\" style=\"float:right; height:103px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/91.html\"><strong><span style=\"font-size:16px\">牙龈肿痛怎么办</span></strong></a></p>\r\n\r\n<p><span style=\"color:rgb(101, 101, 101); font-family:microsoft yahei,helvetica neue,helvetica,arial,sans-serif; font-size:14px\">&nbsp; &nbsp; 相信很多人都会有牙龈肿痛的痛苦，那牙龈肿痛怎么办？人们经常会把牙龈肿痛看作是上火，其实这种理解并不全面。因为牙龈肿痛也有可能是口腔内疾病的一个征兆，当然这种疾病的诱发因素一般也是多方面的。那么，面对这种征兆，该怎么预防呢？一起来了解下，牙龈肿痛怎么办？</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"一般引起牙痛的原因有哪些\" src=\"/assets/ckfinder/userfiles/images/woman-2.jpg\" style=\"float:left; height:100px; width:150px\" /><a href=\"http://www.chinawaterpik.com/knowledge/92.html\"><strong><span style=\"font-size:16px\">一般引起牙痛的原因有哪些</span></strong></a></p>\r\n\r\n<p><span style=\"color:rgb(101, 101, 101); font-family:microsoft yahei,helvetica neue,helvetica,arial,sans-serif; font-size:14px\">&nbsp; &nbsp; 牙痛的原因有哪些？牙痛是常见的口腔疾病，如果炎症不尽快消除，会一直处于这种病发状态。牙痛都是有一定发病原因的，以下将介绍牙痛的原因有哪些？</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><img alt=\"引起牙疼的原因有哪些\" src=\"/assets/ckfinder/userfiles/images/woman-3.jpg\" style=\"float:right; height:100px; width:150px\" /><strong><a href=\"http://www.chinawaterpik.com/knowledge/93.html\"><span style=\"font-size:16px\">引起牙疼的原因有哪些</span></a></strong></p>\r\n\r\n<p><span style=\"color:rgb(101, 101, 101); font-family:microsoft yahei,helvetica neue,helvetica,arial,sans-serif; font-size:14px\">&nbsp; &nbsp; 日常生活中引起牙疼的原因有很多，例如牙周炎，还有牙齿本身的坏死，一些口腔疾病等。引起牙疼的原因有哪些？如果不进行具体的总结，相信您还不是那么的了解。针对这种情况，来介绍下引起牙疼的原因有哪些？</span></p>\r\n', '洁碧网为大家介绍牙疼的原因都有哪些、牙疼的原因是什么以及经常牙疼的原因希望能帮助您更好的了解牙疼的原因。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '牙疼的原因都有哪些_牙疼的原因是什么_经常牙疼的原因', 708, 1, 'water', '/assets/ckfinder/userfiles/images/man-1.jpg', '/assets/ckfinder/userfiles/images/man-1.jpg', 1486111673, 2, '', '');
INSERT INTO `wp_special` VALUES (88, '口腔护理操作流程有哪些', '<p>&nbsp; &nbsp; 虽然知道日常的口腔护理很重要，但不是所有人都了解口腔护理操作流程有哪些？其实很多口腔疾病都是源于日常生活的不良习惯，还有一些不注意造成的。不要小看口腔疾病，一旦患病，对人体会造成不小的影响，包括影响饮食。下面就来介绍下口腔护理操作流程有哪些？</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/81.html\"><span style=\"font-size:16px\"><strong>口腔护理的操作步骤是什么</strong></span></a></p>\r\n\r\n<p><strong><img alt=\"口腔护理的操作步骤是什么\" src=\"/assets/ckfinder/userfiles/images/201714.jpg\" style=\"float:left; height:100px; width:150px\" /><span style=\"font-size:14px\">&nbsp; &nbsp;&nbsp;</span></strong><span style=\"font-size:14px\">口腔护理的操作步骤是什么？口腔问题是生活中常见的问题，相信很多人一直把口腔护理当作健康的一个小方面，这就是对口腔健康不重视的表现。而且，相信很多人不知道，口腔护理如果不到位，就会引发很多疾病，严重也会威胁身体的各项器官，所以口腔护理是至关重要的。下面就来了解下口腔护理的操作步骤是什么？</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><a href=\"http://www.chinawaterpik.com/knowledge/care/95.html\"><span style=\"font-size:16px\"><strong>口腔护理程序是什么</strong></span></a></p>\r\n\r\n<p><img alt=\"口腔护理程序是什么\" src=\"/assets/ckfinder/userfiles/images/201729.jpg\" style=\"float:right; height:100px; width:150px\" /><span style=\"color:rgb(101, 101, 101); font-family:microsoft yahei,helvetica neue,helvetica,arial,sans-serif; font-size:14px\">&nbsp; &nbsp; 刷牙是日常生活中非常微不足道的一件事情，然而正因为不被重视，很多人就忽视了这其实是对口腔护理很有效的一个做法。那么，口腔护理程序是什么?你了解吗?因为很多人刷牙的方式不正确，导致了牙齿的不健康。在日常的口腔护理上还需要多加重视，这样才能保证牙齿健康。那么，口腔护理程序是什么呢?一起了解下。</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/care/82.html\"><span style=\"font-size:16px\"><strong>口腔护理的操作方法有哪些</strong></span></a></p>\r\n\r\n<p><img alt=\"口腔护理的操作方法有哪些\" src=\"/assets/ckfinder/userfiles/images/201718.jpg\" style=\"float:left; height:100px; width:150px\" /><span style=\"color:rgb(101, 101, 101); font-family:microsoft yahei,helvetica neue,helvetica,arial,sans-serif; font-size:14px\">&nbsp; &nbsp; 口腔护理的操作方法有哪些？其实普通人对口腔的护理工作了解有限，都觉得每天正常刷个牙就可以了，然而每日的刷牙只是口腔护理一个最基础的操作而已。不要觉得口腔护理是小事，口腔的健康问题其实会影响到身体的健康。就以下就为您介绍口腔护理的操作方法有哪些？</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><a href=\"http://www.chinawaterpik.com/knowledge/care/83.html\"><span style=\"font-size:16px\"><strong>新生儿口腔护理操作全部流程</strong></span></a></p>\r\n\r\n<p><img alt=\"新生儿口腔护理操作全部流程\" src=\"/assets/ckfinder/userfiles/images/201711.jpg\" style=\"float:right; height:100px; width:150px\" />&nbsp; &nbsp;&nbsp;新生儿口腔护理操作全部流程有哪些？我们知道新生命的身体各项机能是很稚嫩的，口腔也是如此。那作为新生儿，更要注意口腔的护理问题，尤其是口腔黏膜的清洁方面，如果处理不好就容易造成感染等情况。那第一次当父母，对新生儿的照顾还不是很了解，那么新生儿口腔护理操作全部流程有哪些呢？我们一起来了解下吧。</p>\r\n', '洁碧网为大家介绍日常口腔护理流程步骤、日口腔护理流程标准以及口腔护理流程都有哪些，希望能帮助您更好的了解口腔护理流程。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '口腔护理流程步骤,口腔护理流程标准,口腔护理流程都有哪些', 590, 1, 'water', '/assets/ckfinder/userfiles/images/201701.jpg', '/assets/ckfinder/userfiles/images/201701.jpg', 1488541636, 1, '', '口腔护理操作流程有哪些');
INSERT INTO `wp_special` VALUES (89, '口腔护理的日常步骤是什么', '<p><strong>&nbsp; &nbsp;</strong> 口腔护理的日常步骤是什么？随着生活水平的提高，有越来越多的人开始注重健康问题，毕竟拥有健康的身体，才能更好地享受生活。那口腔作为身体的一部分，对身体的健康也有着很大的影响。不过，如果想做好口腔护理，还是要了解相关的护理步骤才行。下面就为大家介绍口腔护理的日常步骤是什么？</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/care/76.html\"><span style=\"font-size:16px\"><strong>口腔日常护理知识有哪些</strong></span></a></p>\r\n\r\n<p><img alt=\"口腔日常护理知识有哪些\" src=\"/assets/ckfinder/userfiles/images/201702.jpg\" style=\"float:left; height:99px; width:150px\" />&nbsp; &nbsp; 口腔日常护理知识有哪些？日常生活中，常常会被口腔疾病困扰，口腔问题看似很小，其实一旦患病，对生活及健康的影响也会很大，尤其是它会引发一系列其他方面的疾病，让患者苦不堪言。那么口腔日常护理知识有哪些？了解了口腔的日常护理常识，就可以避免一些口腔方面的疾病。下面就来一起了解一下口腔日常护理知识有哪些？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><a href=\"http://www.chinawaterpik.com/knowledge/care/77.html\"><span style=\"font-size:16px\"><strong>日常口腔护理几大误区</strong></span></a></p>\r\n\r\n<p><strong><img alt=\"日常口腔护理几大误区\" src=\"/assets/ckfinder/userfiles/images/201706.jpg\" style=\"float:right; height:100px; width:150px\" /></strong>&nbsp; &nbsp; 日常口腔护理几大误区有哪些？生活中，人们常常会因为懒惰和不了解健康常识，养成一些不好的习惯，口腔疾病就是这样引起的。其实平时做好口腔护理工作很重要，不然会引发一系列疾病，对健康造成更大的影响。那么日常口腔护理几大误区有哪些？下面就一起来了解一下。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/care/78.html\"><span style=\"font-size:16px\"><strong>日常口腔护理经常遇到的问题有哪些</strong></span></a></p>\r\n\r\n<p><strong><img alt=\"日常口腔护理经常遇到的问题有哪些\" src=\"/assets/ckfinder/userfiles/images/201721.jpg\" style=\"float:left; height:101px; width:150px\" /></strong><strong>&nbsp; &nbsp;</strong> 日常口腔护理经常遇到的问题有哪些？日常口腔护理也许会遇到一些问题，可是生活中很多人并不知道该如何处理。口腔疾病一般都是日常生活习惯不规律造成的，因此只要做好日常的口腔护理，就能对口腔保护起到关键的作用。针对这种情况，就一起来对日常口腔护理经常遇到的问题做以下总结</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/care/79.html\"><span style=\"font-size:16px\"><strong>日常生活中如何做好口腔护理</strong></span></a></p>\r\n\r\n<p><img alt=\"日常生活中如何做好口腔护理\" src=\"/assets/ckfinder/userfiles/images/201717.jpg\" style=\"float:right; height:100px; width:150px\" />&nbsp;&nbsp; &nbsp;日常生活中如何做好口腔护理？口腔问题看似很小，如果不稍加注意就会引发很多口腔疾病，牙周炎就是其中的一种。虽然牙周炎在口腔疾病中算小事，但还是要做好相关方面的了解及防护才行，如果引发其他方面的疾病，可就得不偿失了。其实牙周炎的护理方法并不难，只要稍加了解即可。</p>\r\n', '洁碧网为大家介绍日常口腔护理操作流程、日常口腔护理注意事项以及日常口腔护理有哪些步骤，希望能帮助您更好的了解日常口腔护理。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '日常口腔护理操作流程,日常口腔护理注意事项,日常口腔护理有哪些步骤', 633, 1, 'water', '/assets/ckfinder/userfiles/images/201709.jpg', '/assets/ckfinder/userfiles/images/201709.jpg', 1488543045, 1, '', '');
INSERT INTO `wp_special` VALUES (90, '口腔护理的目的是什么', '<p>&nbsp; &nbsp; 日常生活中，大家都能做到勤刷牙，保持口腔的清洁，但是大多数人并不了解，口腔护理的目的是什么？其实口腔护理的目的主要就是保持口腔的清洁和清新，预防口腔感染，避免出现一些不必要的疾病。下面就来做一下相关方面的介绍。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/97.html\"><span style=\"font-size:16px\"><strong>口腔护理有什么目的</strong></span></a></p>\r\n\r\n<p><img alt=\"口腔护理有什么目的\" src=\"/assets/ckfinder/userfiles/images/201730.jpg\" style=\"float:left; height:100px; width:150px\" />&nbsp; &nbsp; 虽然日常的口腔护理工作做得很好，但是很多人并不了解，口腔护理有什么目的？口腔护理的主要目的就是保持口腔的清洁及健康，口腔健康对身体有不小的影响。下面来对口腔护理有什么目的做一些相关介绍。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><span style=\"font-size:16px\"><a href=\"http://www.chinawaterpik.com/knowledge/98.html\"><strong>日常口腔护理的目的</strong></a></span></p>\r\n\r\n<p><img alt=\"日常口腔护理的目的\" src=\"/assets/ckfinder/userfiles/images/201731.jpg\" style=\"float:right; height:100px; width:150px\" />&nbsp;&nbsp; &nbsp;对于老年人，身体机能及各个器官已经出现衰老的情况，牙齿也是一样。因此了解日常口腔护理的目的，从而更有针对性的对口腔问题进行处理。作为老年人，除了日常的口腔清洁，也可以做一些口腔的保健操，多做一些口腔健康的检查。日常口腔护理的目的还有以下几方面。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/99.html\"><span style=\"font-size:16px\"><strong>特殊口腔护理操作的目的有哪些</strong></span></a></p>\r\n\r\n<p><img alt=\"特殊口腔护理操作的目的有哪些\" src=\"/assets/ckfinder/userfiles/images/201727.jpg\" style=\"float:left; height:83px; width:150px\" />&nbsp;&nbsp; &nbsp;特殊口腔护理操作的目的有哪些？可能很多人对特殊口腔护理的了解并不多，其实特殊口腔护理对象，主要是一些处于高热、昏迷，和一些危重和禁食等生活上出现不能自理现象的病人。那特殊口腔护理操作的目的有哪些？可能很多人并不了解，下文将做简单介绍。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><a href=\"http://www.chinawaterpik.com/knowledge/100.html\"><span style=\"font-size:16px\"><strong>特殊口腔护理的目的有哪些</strong></span></a></p>\r\n\r\n<p><img alt=\"特殊口腔护理的目的有哪些\" src=\"/assets/ckfinder/userfiles/images/201728.jpg\" style=\"float:right; height:100px; width:150px\" /><strong>&nbsp; &nbsp; </strong>特殊口腔护理的目的有哪些？很多人都把口腔问题当作身体健康的小问题，就算口腔患上疾病，也不会引起太多的重视。其实这样的想法是错误的，因为口腔疾病与身体的很多疾病都有着密切的关系，口腔如果不健康，会诱发身体各方面的疾病。特殊口腔护理的目的有哪些？一起来了解下。</p>\r\n', '洁碧网为大家介绍口腔护理目的是什么、口腔护理目的与方法以及口腔护理目的如何达成，希望能帮助您更好的了解口腔护理目的。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '口腔护理目的是什么_口腔护理目的与方法_口腔护理目的如何达成-洁碧官网', 573, 1, 'water', '/assets/ckfinder/userfiles/images/201703.jpg', '/assets/ckfinder/userfiles/images/201703.jpg', 1488544127, 1, '', '');
INSERT INTO `wp_special` VALUES (91, '冬季口腔护理习惯误区', '<p>&nbsp; &nbsp; 冬季口腔护理习惯误区有哪些？冬季温度低，尤其是北方，室内外温差大，更容易对身体健康造成隐患。因此，冬季里也要注意口腔健康，尤其是不要让牙齿忽冷忽热，会对牙齿造成很大的危害。下面来了解下冬季口腔护理习惯误区有哪些？</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/102.html\"><span style=\"font-size:16px\"><strong>纠正口腔护理三大误区</strong></span></a></p>\r\n\r\n<p><strong><img alt=\"纠正口腔护理三大误区\" src=\"/assets/ckfinder/userfiles/images/201712.jpg\" style=\"float:left; height:100px; width:150px\" /></strong>&nbsp;&nbsp; &nbsp;纠正口腔护理三大误区，你了解吗？大多数人日常生活中对口腔护理都会做得很好，但还是避免不了陷入一些误区。其实这也是由于对口腔护理知识不够了解导致的，因此在日常生活中需要了解相关的口腔护理知识。以下将介绍口腔护理三大误区。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: right;\"><a href=\"http://www.chinawaterpik.com/knowledge/103.html\"><span style=\"font-size:16px\"><strong>口腔护理常见误区介绍</strong></span></a></p>\r\n\r\n<p><strong><img alt=\"口腔护理常见误区介绍\" src=\"/assets/ckfinder/userfiles/images/201722.jpg\" style=\"float:right; height:100px; width:150px\" /></strong>&nbsp; &nbsp; 口腔护理常见误区介绍，你了解吗？日常生活中，人们常常由于疏忽或者不了解口腔护理知识，而陷入一些误区，并导致了口腔问题的产生，因此还是要做好相关方面的预防措施，了解口腔护理常见误区介绍。下面进行口腔护理常见误区介绍。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"http://www.chinawaterpik.com/knowledge/care/104.html\"><span style=\"font-size:16px\"><strong>口腔护理误区有哪些</strong></span></a></p>\r\n\r\n<p><img alt=\"口腔护理误区有哪些\" src=\"/assets/ckfinder/userfiles/images/201705.jpg\" style=\"float:left; height:100px; width:150px\" />&nbsp; &nbsp; 口腔护理误区有哪些？相信这个问题是很多朋友们都想了解的，毕竟每个人都希望有一口健康洁白的牙齿，不仅因为好看，还因为拥有健康的牙齿才能享受更多的美食。但是，往往因为不了解口腔护理知识而陷入一些误区，这会严重影响口腔健康。那么口腔护理误区有哪些？一起来看下。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align: right;\"><a href=\"http://www.chinawaterpik.com/knowledge/care/105.html\"><span style=\"font-size:16px\"><strong>盘点口腔护理几大误区</strong></span></a></p>\r\n\r\n<p><img alt=\"盘点口腔护理几大误区\" src=\"/assets/ckfinder/userfiles/images/201725.jpg\" style=\"float:right; height:100px; width:150px\" />&nbsp;&nbsp; &nbsp;盘点口腔护理几大误区，你知道哪些？其实生活中，每个人都很注重口腔护理，但是因为对口腔护理知识不是很了解，导致陷入误区，相信这种情况不在少数。如果陷入口腔护理误区，不仅对口腔健康不利，而且会造成更严重的隐患。下面就盘点口腔护理几大误区。</p>\r\n', '洁碧网为大家介绍口腔护理误区都有哪些、如何避免口腔护理误区以及怎么走出口腔护理误区，希望能帮助您更好的了解口腔护理误区。全球冲牙器领导品牌美国洁碧，给您一个自信、迷人的微笑！', '口腔护理误区都有哪些_如何避免口腔护理误区_怎么走出口腔护理误区-洁碧官网', 505, 1, 'water', '/assets/ckfinder/userfiles/images/201710.jpg', '/assets/ckfinder/userfiles/images/201710.jpg', 1488544665, 1, '', '冬季口腔护理习惯误区');
COMMIT;

-- ----------------------------
-- Table structure for wp_users
-- ----------------------------
DROP TABLE IF EXISTS `wp_users`;
CREATE TABLE `wp_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wp_users
-- ----------------------------
BEGIN;
INSERT INTO `wp_users` VALUES (8, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2017-10-12 13:55:25');
INSERT INTO `wp_users` VALUES (9, 'doubletong', 'e10adc3949ba59abbe56e057f20f883e', '2019-03-18 20:24:58');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
