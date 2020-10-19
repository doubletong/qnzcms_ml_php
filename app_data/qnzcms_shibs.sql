-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2020 at 12:11 AM
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
-- Database: `qnzcms_shibs`
--

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
-- Table structure for table `qnz_advertisements`
--

CREATE TABLE `qnz_advertisements` (
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
-- Dumping data for table `qnz_advertisements`
--

INSERT INTO `qnz_advertisements` (`id`, `title`, `link`, `image_url`, `image_url_mobile`, `content`, `description`, `importance`, `space_id`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(2, '001', 'http://www.baidu.com', '/uploads/images/carousels/slider01.jpg', '/uploads/images/carousels/slider01.jpg', '<p>aafdsfds</p>\r\n\r\n<p>fsdfdsf</p>\r\n', '', 0, 2, 1, 'admin', '2019-12-30 05:47:45', '2020-06-27 02:01:23'),
(3, 'test', 'http://www.baidu.com', '/uploads/images/carousels/slider01.jpg', '/uploads/images/carousels/slider01.jpg', '', '', 0, 2, 1, 'admin', '2019-12-31 10:26:07', '2020-06-27 02:01:32'),
(4, 'test【拷贝】', 'http://www.baidu.com', '/uploads/images/carousels/slider01.jpg', '/uploads/images/carousels/slider01.jpg', '', '', 0, 2, 1, 'admin', '2019-12-31 10:28:07', '2020-06-27 02:01:44'),
(6, '人才队伍', '', '/uploads/images/carousels/banner_team.jpg', '', '', '', 12, 5, 1, 'admin', '2020-05-16 07:55:15', '2020-06-24 16:46:59'),
(7, '科研平台', '', '/uploads/images/carousels/banner_platform.jpg', '', '', '', 11, 6, 1, 'admin', '2020-05-16 08:11:02', '2020-06-24 16:49:03'),
(8, '研究生教育', '', '/uploads/images/carousels/banner_education.jpg', '', '', '', 10, 7, 1, 'admin', '2020-05-29 15:52:02', '2020-06-24 16:50:49'),
(9, '关于我们', '', '/uploads/images/carousels/banner_about.jpg', '', '', '', 97, 4, 1, 'admin', '2020-05-30 03:36:51', '2020-07-30 14:23:57'),
(10, '科研概况', '', '/uploads/images/carousels/banner_research.jpg', '', '', '', 0, 3, 1, 'admin', '2020-05-30 03:36:53', '2020-06-24 16:36:29'),
(11, '合作交流', '', '/uploads/images/carousels/banner_cooperation.jpg', '', '', '', 0, 8, 1, 'admin', '2020-05-30 03:36:54', '2020-06-24 16:54:55'),
(12, '新闻动态', '', '/uploads/images/carousels/banner_news.jpg', '', '', '', 0, 9, 1, 'admin', '2020-06-24 16:59:45', '2020-06-24 16:59:45'),
(13, '脑未来资源', '', '/uploads/images/carousels/banner_future.jpg', '', '', '', 0, 10, 1, 'admin', '2020-06-24 17:08:29', '2020-06-24 17:08:29'),
(14, '党建文化', '', '/uploads/images/carousels/banner_culture.jpg', '', '', '', 0, 11, 1, 'admin', '2020-06-24 17:13:55', '2020-06-24 17:13:55'),
(15, '联系我们', '', '/uploads/images/carousels/banner_contact.jpg', '', '', '', 0, 12, 1, 'admin', '2020-06-24 17:14:14', '2020-06-24 17:14:14'),
(16, 'slider', '', '/uploads/images/carousels/1eoxip3.jpg', '', '', '', 100, 13, 1, 'admin', '2020-07-30 13:48:18', '2020-07-30 13:59:35'),
(17, 'Slider2', 'http://www.baidu.com', '/uploads/images/carousels/544.jpg', '', '', '', 99, 13, 1, 'admin', '2020-07-30 13:49:06', '2020-07-30 14:00:34'),
(18, 'slider3', '', '/uploads/images/carousels/22.jpg', '', '', '', 98, 13, 1, 'admin', '2020-07-30 13:51:45', '2020-07-30 14:01:08'),
(19, 'ABOUT US', '', '/uploads/images/carousels/banner_about.jpg', '', '', '', 97, 14, 1, 'admin', '2020-07-30 14:22:20', '2020-07-30 14:23:38'),
(21, 'Contact Us', '', '/uploads/images/carousels/banner_contact.jpg', '', '', '', 0, 23, 1, 'admin', '2020-07-30 14:41:04', '2020-07-30 14:41:47'),
(22, 'RESEARCH OVERVIEW', '', '/uploads/images/carousels/banner_research.jpg', '', '', '', 0, 15, 1, 'admin', '2020-07-30 14:44:25', '2020-07-30 14:45:16'),
(23, 'Our Team', '', '/uploads/images/carousels/banner_team.jpg', '', '', '', 12, 16, 1, 'admin', '2020-07-30 14:51:06', '2020-07-30 14:51:22'),
(24, 'SCIENCE RESEARCH', '', '/uploads/images/carousels/banner_platform.jpg', '', '', '', 11, 17, 1, 'admin', '2020-07-30 14:54:45', '2020-07-30 14:55:12'),
(25, 'POSTGRADUATE COURSES', '', '/uploads/images/carousels/banner_education.jpg', '', '', '', 10, 19, 1, 'admin', '2020-07-30 15:04:56', '2020-07-30 15:05:27'),
(26, 'COLLABORATION', '', '/uploads/images/carousels/banner_cooperation.jpg', '', '', '', 0, 18, 1, 'admin', '2020-07-30 15:07:55', '2020-07-30 15:08:21'),
(27, 'News', '', '/uploads/images/carousels/banner_news.jpg', '', '', '', 0, 20, 1, 'admin', '2020-07-30 15:10:18', '2020-07-30 15:10:34'),
(28, 'Resource in the future', '', '/uploads/images/carousels/banner_future.jpg', '', '', '', 0, 21, 1, 'admin', '2020-07-30 15:14:07', '2020-07-30 15:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_advertising_spaces`
--

CREATE TABLE `qnz_advertising_spaces` (
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
-- Dumping data for table `qnz_advertising_spaces`
--

INSERT INTO `qnz_advertising_spaces` (`id`, `title`, `code`, `description`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(2, '首页轮播【1920x1080像素】', 'A001', '', 150, 1, 'admin', '2019-12-30 05:47:23', '2020-07-30 14:21:55'),
(3, '科研概况-Banner【1920x286像素】', 'A004', '', 148, 1, 'admin', '2020-05-16 07:54:13', '2020-07-30 14:31:33'),
(4, '关于我们-Banner【1920x286像素】', 'A003', '', 149, 1, 'admin', '2020-05-16 08:10:12', '2020-07-30 14:20:49'),
(5, '人才队伍-Banner【1920x286像素】', 'A005', '', 147, 1, 'admin', '2020-06-24 16:42:12', '2020-07-30 14:32:09'),
(6, '科研平台-Banner【1920x286像素】', 'A006', '', 146, 1, 'admin', '2020-06-24 16:46:21', '2020-07-30 14:32:42'),
(7, '研究生教育-Banner【1920x286像素】', 'A007', '', 145, 1, 'admin', '2020-06-24 16:49:56', '2020-07-30 14:33:17'),
(8, '合作交流-Banner【1920x286像素】', 'A008', '', 144, 1, 'admin', '2020-06-24 16:54:19', '2020-07-30 14:34:12'),
(9, '新闻动态-Banner【1920x286像素】', 'A009', '', 143, 1, 'admin', '2020-06-24 16:56:24', '2020-07-30 14:34:42'),
(10, '脑未来资源-Banner【1920x286像素】', 'A010', '', 142, 1, 'admin', '2020-06-24 17:07:50', '2020-07-30 14:37:54'),
(11, '党建文化-Banner【1920x286像素】', 'A011', '', 140, 1, 'admin', '2020-06-24 17:10:20', '2020-07-30 14:37:17'),
(12, '联系我们-Banner【1920x286像素】', 'A012', '', 0, 1, 'admin', '2020-06-24 17:10:39', '2020-06-24 17:13:08'),
(13, '首页轮播【1920x1080像素】英文版', 'A001_en', '', 150, 1, 'admin', '2020-07-30 13:37:39', '2020-07-30 14:21:41'),
(14, '关于我们-Banner【1920x286像素】英文版', 'A003_en', '', 149, 1, 'admin', '2020-07-30 14:19:51', '2020-07-30 14:22:07'),
(15, '科研概况-Banner【1920x286像素】英文版', 'A004_en', '', 148, 1, 'admin', '2020-07-30 14:28:55', '2020-07-30 14:31:49'),
(16, '人才队伍-Banner【1920x286像素】英文版', 'A005_en', '', 147, 1, 'admin', '2020-07-30 14:29:29', '2020-07-30 14:32:25'),
(17, '科研平台-Banner【1920x286像素】英文版', 'A006_en', '', 146, 1, 'admin', '2020-07-30 14:30:01', '2020-07-30 14:32:52'),
(18, '合作交流-Banner【1920x286像素】英文版', 'A008_en', '', 144, 1, 'admin', '2020-07-30 14:31:09', '2020-07-30 14:34:23'),
(19, '研究生教育-Banner【1920x286像素】英文版', 'A007_en', '', 145, 1, 'admin', '2020-07-30 14:33:44', '2020-07-30 14:34:01'),
(20, '新闻动态-Banner【1920x286像素】英文版', 'A009_en', '', 143, 1, 'admin', '2020-07-30 14:35:10', '2020-07-30 14:35:24'),
(21, '脑未来资源-Banner【1920x286像素】英文版', 'A010_en', '', 142, 1, 'admin', '2020-07-30 14:36:08', '2020-07-30 14:36:08'),
(22, '党建文化-Banner【1920x286像素】英文版', 'A011_en', '', 140, 1, 'admin', '2020-07-30 14:36:48', '2020-07-30 14:36:48'),
(23, '联系我们-Banner【1920x286像素】英文版', 'A012_en', '', 0, 1, 'admin', '2020-07-30 14:39:22', '2020-07-30 14:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_albums`
--

CREATE TABLE `qnz_albums` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_albums`
--

INSERT INTO `qnz_albums` (`id`, `title`, `description`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '默认相册', '', 0, 1, 'admin', '2020-04-16 15:03:37', '2020-04-16 15:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_announcements`
--

CREATE TABLE `qnz_announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `importance` int(10) UNSIGNED NOT NULL,
  `view_count` int(10) UNSIGNED NOT NULL,
  `pubdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qnz_ann_categories`
--

CREATE TABLE `qnz_ann_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qnz_application_areas`
--

CREATE TABLE `qnz_application_areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `intro` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cases` longtext COLLATE utf8_unicode_ci NOT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_application_areas`
--

INSERT INTO `qnz_application_areas` (`id`, `title`, `sub_title`, `intro`, `cases`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '移动设备', 'MOBILE DEVICES', '<p>格科微电子拥有完全自主知识产权和行业领先水平的制造工艺。为智能手机厂商提供了高性价比的产品。目前广泛应用在智能手机的主摄像头、前置摄像头与多摄副摄上。</p>\r\n\r\n<p><img alt=\"\" src=\"/uploads/images/application/app_1.jpg\" /></p>\r\n', '', 0, 1, 'admin', '2020-01-09 14:16:51', '2020-01-10 02:11:04'),
(2, '安防监控', 'SECURITY MONITORING', '<p>test</p>\r\n', '<p>test</p>\r\n', 0, 1, 'admin', '2020-01-09 14:29:27', '2020-01-09 14:39:31'),
(3, '汽车电子', 'AUTOMOTIVE ELECTRONICS', '<p>dd</p>\r\n', '<p>ddd</p>\r\n', 0, 1, 'admin', '2020-01-09 14:41:00', '2020-01-09 14:41:00'),
(4, 'USB camera', 'USB CAMERA', '<p>fs</p>\r\n', '<p>fds</p>\r\n', 0, 1, 'admin', '2020-01-09 14:41:35', '2020-01-09 14:41:35'),
(5, '智慧屏电视', 'SMART SCREEN TV', '<p>fs</p>\r\n', '<p>fds</p>\r\n', 0, 1, 'admin', '2020-01-09 14:42:18', '2020-01-09 14:42:18'),
(6, '生物识别&扫码', 'BIOMETRIC & SCAN THE CODE', '<p>fs</p>\r\n', '<p>fds</p>\r\n', 0, 1, 'admin', '2020-01-09 14:42:53', '2020-01-09 14:42:53'),
(7, '游学画册', '移动设备', '<p>erew</p>\r\n', '<p>rewrwe</p>\r\n', 0, 1, 'admin', '2020-03-15 18:45:37', '2020-03-15 18:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_downloads`
--

CREATE TABLE `qnz_downloads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `file_size` int(11) NOT NULL,
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `down_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_downloads`
--

INSERT INTO `qnz_downloads` (`id`, `title`, `file_url`, `file_size`, `thumbnail`, `content`, `description`, `importance`, `down_count`, `category_id`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Axson PX521HT', '/uploads/documents/beauty_study.pdf', 784017, '/uploads/documents/pdf.png', '<p>jjhhhh</p>\r\n', '', 0, 0, 2, 1, 'admin', '2020-03-23 20:54:38', '2020-04-18 05:33:48'),
(2, 'Axson PX521HT', '/uploads/documents/beauty_study.pdf', 784017, '/uploads/documents/pdf.png', '', '', 0, 0, 2, 1, 'admin', '2020-04-18 05:33:35', '2020-04-18 05:33:35'),
(3, 'Axson PX521HT', '/uploads/documents/beauty_study.pdf', 784017, '/uploads/documents/pdf.png', '', '', 0, 0, 2, 1, 'admin', '2020-04-18 05:34:22', '2020-04-18 05:34:22'),
(4, 'Axson PX521HT', '/uploads/documents/beauty_study.pdf', 784017, '/uploads/documents/pdf.png', '', '', 0, 0, 2, 1, 'admin', '2020-04-18 05:34:52', '2020-04-18 05:34:52'),
(5, 'Axson PX521HT', '/uploads/documents/beauty_study.pdf', 784017, '/uploads/documents/pdf.png', '', '', 0, 0, 2, 1, 'admin', '2020-04-18 05:34:53', '2020-04-18 05:34:53'),
(6, 'Axson PX521HT', '/uploads/documents/beauty_study.pdf', 784017, '/uploads/documents/pdf.png', '', '', 0, 0, 2, 1, 'admin', '2020-04-18 05:34:55', '2020-04-18 05:34:55'),
(7, 'Axson PX521HT', '/uploads/documents/beauty_study.pdf', 784017, '/uploads/documents/pdf.png', '', '', 0, 0, 2, 1, 'admin', '2020-04-18 05:34:56', '2020-04-18 05:34:56'),
(8, 'Axson PX521HT', '/uploads/documents/beauty_study.pdf', 784017, '/uploads/documents/pdf.png', '', '', 0, 0, 2, 1, 'admin', '2020-04-18 05:34:56', '2020-04-18 05:34:56'),
(9, 'Axson PX521HT', '/uploads/documents/beauty_study.pdf', 784017, '/uploads/documents/pdf.png', '', '', 0, 0, 2, 1, 'admin', '2020-04-18 05:34:58', '2020-04-18 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_download_categories`
--

CREATE TABLE `qnz_download_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_download_categories`
--

INSERT INTO `qnz_download_categories` (`id`, `title`, `description`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(2, '默认分类', '', 12, 1, 'admin', '2020-03-23 12:49:27', '2020-04-18 05:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_email_templates`
--

CREATE TABLE `qnz_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `htmlbody` longtext COLLATE utf8_unicode_ci NOT NULL,
  `importance` int(11) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_email_templates`
--

INSERT INTO `qnz_email_templates` (`id`, `title`, `code`, `htmlbody`, `importance`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Quote邮件模板', 'T001', '<p>姓名：{name}</p>\r\n\r\n<p>公司：{company}</p>\r\n\r\n<p>邮箱：{email}</p>\r\n\r\n<p>联系电话：{phone}</p>\r\n\r\n<p>国家：{country}</p>\r\n\r\n<p>行业：{industry}</p>\r\n\r\n<p>预计交货时间：{delivery}</p>\r\n\r\n<p>预估金额：{expected}</p>\r\n\r\n<p>内容：{message}</p>\r\n', 0, 'admin', '2020-03-15 18:51:50', '2020-04-20 09:14:12'),
(2, 'test', 'T002', '<p>very google</p>\r\n', 0, 'admin', '2020-03-15 19:03:10', '2020-03-15 19:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_events`
--

CREATE TABLE `qnz_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `organizer` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `organizer_en` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `issue` int(11) DEFAULT NULL,
  `meet_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_company` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_intro` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_note` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(10) UNSIGNED NOT NULL,
  `view_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `datestart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `compere` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_events`
--

INSERT INTO `qnz_events` (`id`, `title`, `summary`, `thumbnail`, `content`, `organizer`, `organizer_en`, `issue`, `meet_id`, `link`, `pro_name`, `pro_company`, `pro_intro`, `footer_note`, `importance`, `view_count`, `datestart`, `compere`, `address`, `category_id`, `active`, `recommend`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Becoming Urban in a Chinese Way: Critical Observations and Research Agendas', 'Biological electron microscopy has gone into a new era with great advances of specimen preparation, instrumentation and data processing. With the three dimensional reconstruction technique, the three dimensional electron microscopy (3DEM) has been becoming important approaches to image the biological system in high resolution and multiple scales.', '/uploads/images/teams/huanyan.jpg', '<p>Biological electron microscopy has gone into a new era with great advances of specimen preparation, instrumentation and data processing. With the three dimensional reconstruction technique, the three dimensional electron microscopy (3DEM) has been becoming important approaches to image the biological system in high resolution and multiple scales. Based on the principle of the methodology itself, 3DEM can be classified into several categories to meet different needs from structural biology to cell biology, developmental biology and neuron sciences. In this talk, I will summarize my personal view of different 3DEM techique and then introduce the relevant technology develoments in ourbiological imaging center.</p>\r\n', '中国科学员深圳先进技术研究院脑认知与脑疾病研究所\r\n深港脑科学创新研究院\r\n中国科学院联结解析与调控重点实验室\r\n深圳市药物成瘾重点实验室', 'The Brain Cognition and Brain Disease Institute of SIAT at CAS\r\nShenzhen-Hong Kong Institute of Brain Science\r\nCAS Key Laboratory of Brain Connectome and Manipulation\r\nShenZhen Key Lab of Drug Addiction', 200, '798  701  0118 ', 'http://www.lifewinner.net/', '孙飞', '中国科学院生物物理研究所', '研究员，博士生导师，国家万人（青年拔尖），长江学者（青年）国家杰青', 'Organized by Brain Cognition and Disease Institute, SIAT Enquiries: Ms. Yichun Ye; Email: yc.ye@siat.ac.cn', 0, 3, '2020-05-10 18:32:00', 'Dr. Lili Wang', '深圳市龙岗区', 1, 1, 1, 'admin', '2020-05-10 16:14:33', '2020-07-26 18:00:17'),
(2, 'Personal Hygiene in Ancient China', 'Biological electron microscopy has gone into a new era with great advances of specimen preparation, instrumentation and data processing. With the three dimensional reconstruction technique, the three dimensional electron microscopy (3DEM) has been becoming important approaches to image the biological system in high resolution and multiple scales', '/uploads/images/teams/duzhuanhong.jpg', '<p>Biological electron microscopy has gone into a new era with great advances of specimen preparation, instrumentation and data processing. With the three dimensional reconstruction technique, the three dimensional electron microscopy (3DEM) has been becoming important approaches to image the biological system in high resolution and multiple scales. Based on the principle of the methodology itself, 3DEM can be classified into several categories to meet different needs from structural biology to cell biology, developmental biology and neuron sciences. In this talk, I will summarize my personal view of different 3DEM techique and then introduce the relevant technology develoments in ourbiological imaging center.</p>\r\n', '中国科学员深圳先进技术研究院脑认知与脑疾病研究所\r\n深港脑科学创新研究院\r\n中国科学院联结解析与调控重点实验室\r\n深圳市药物成瘾重点实验室', 'The Brain Cognition and Brain Disease Institute of SIAT at CAS\r\nShenzhen-Hong Kong Institute of Brain Science\r\nCAS Key Laboratory of Brain Connectome and Manipulation\r\nShenZhen Key Lab of Drug Addiction', 202, '798  701  0118 ', 'http://www.lifewinner.net/', '李四', '深圳市歌奈时代科技有限公司', '研究员，博士生导师，国家万人（青年拔尖），长江学者（青年）国家杰青', 'Organized by Brain Cognition and Disease Institute, SIAT Enquiries: Ms. Yichun Ye; Email: yc.ye@siat.ac.cn', 0, 1, '2020-05-11 06:30:00', '张三', 'A栋5楼(B门上)', 1, 1, 1, 'admin', '2020-05-10 16:14:45', '2020-07-26 18:01:13'),
(3, 'Flowing Skills: Michelangelo, From Sculpture to Architecture', 'Biological electron microscopy has gone into a new era with great advances of specimen preparation, instrumentation and data processing. With the three dimensional reconstruction technique, the three dimensional electron microscopy (3DEM) has been becoming important approaches to image the biological system in high resolution and multiple scales. Based on the principle of the methodology itself', '/uploads/images/teams/hongwei.jpg', '<p>Biological electron microscopy has gone into a new era with great advances of specimen preparation, instrumentation and data processing. With the three dimensional reconstruction technique, the three dimensional electron microscopy (3DEM) has been becoming important approaches to image the biological system in high resolution and multiple scales. Based on the principle of the methodology itself, 3DEM can be classified into several categories to meet different needs from structural biology to cell biology, developmental biology and neuron sciences. In this talk, I will summarize my personal view of different 3DEM techique and then introduce the relevant technology develoments in ourbiological imaging center.</p>\r\n', '中国科学员深圳先进技术研究院脑认知与脑疾病研究所\r\n深港脑科学创新研究院\r\n中国科学院联结解析与调控重点实验室\r\n深圳市药物成瘾重点实验室', 'The Brain Cognition and Brain Disease Institute of SIAT at CAS\r\nShenzhen-Hong Kong Institute of Brain Science\r\nCAS Key Laboratory of Brain Connectome and Manipulation\r\nShenZhen Key Lab of Drug Addiction', 202, '798  701  0118 ', 'https://us02web.zoom.us/j/7987010118', '孙飞', '中国科学院生物物理研究所', '石材城ssfdsfsdsa', 'Organized by Brain Cognition and Disease Institute, SIAT Enquiries: Ms. Yichun Ye; Email: yc.ye@siat.ac.cn', 0, 25, '2020-05-16 08:42:00', 'Xiangnan XIONG', 'Room 203, Library', 1, 1, 1, 'admin', '2020-05-16 08:42:55', '2020-07-26 18:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_event_categories`
--

CREATE TABLE `qnz_event_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_event_categories`
--

INSERT INTO `qnz_event_categories` (`id`, `title`, `description`, `importance`, `active`, `added_by`, `parent`, `created_at`, `updated_at`) VALUES
(1, '会议预告', NULL, 0, 1, 'admin', NULL, '2020-05-10 15:41:08', '2020-07-26 15:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_exhibitions`
--

CREATE TABLE `qnz_exhibitions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` longtext COLLATE utf8_unicode_ci,
  `summary` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `view_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `recommend` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_exhibitions`
--

INSERT INTO `qnz_exhibitions` (`id`, `title`, `thumbnail`, `start_date`, `end_date`, `content`, `summary`, `view_count`, `active`, `recommend`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'rewrwe', '/uploads/images/logo_color.png', '2020-03-16 16:00:00', '2020-03-16 16:00:00', '<p>sfdsf</p>\r\n', 'fsdfsd', 0, 1, 0, 'admin', '2020-03-17 12:26:10', '2020-03-17 12:52:07'),
(2, 'rewrwe【拷贝】', '', '2020-03-16 16:00:00', '2020-03-16 16:00:00', '<p>sfdsf</p>\r\n', 'fsdfsd', 0, 1, 0, 'admin', '2020-03-17 12:51:01', '2020-03-17 12:51:01'),
(3, '心血管介入产品', '', '2020-07-28 01:36:37', '2020-07-28 01:36:37', '<p>dsf</p>\r\n', 'dsffsdfs', 0, 1, 1, 'admin', '2020-07-28 01:36:37', '2020-07-28 01:36:37'),
(4, 'fdsfds', '', '2020-07-28 01:37:43', '2020-07-28 01:37:43', '<p>fdsfds</p>\r\n', 'fdsfsd', 0, 1, 1, 'admin', '2020-07-28 01:37:43', '2020-07-28 01:37:43'),
(5, 'fdsfds', '', '2020-07-28 01:39:18', '2020-07-28 01:39:18', '<p>fdsfds</p>\r\n', 'fdsfsd', 0, 1, 1, 'admin', '2020-07-28 01:39:18', '2020-07-28 01:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_jobs`
--

CREATE TABLE `qnz_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `homepage` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `requirement` longtext COLLATE utf8_unicode_ci,
  `research` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `population` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `application` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `team_id` int(11) NOT NULL DEFAULT '0',
  `intro` longtext COLLATE utf8_unicode_ci,
  `lang` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_jobs`
--

INSERT INTO `qnz_jobs` (`id`, `title`, `homepage`, `address`, `post`, `education`, `requirement`, `research`, `other`, `population`, `application`, `team_id`, `intro`, `lang`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '招聘博士后&助理研究员&科研助理-戴辑课题组', '', '广州', '博士后/助理研究员/科研助理', '', '<p>霜无可奈何</p>\r\n', '', '', '2-3人', '', 12, '<p>Hefei Institutes of Physical Science is located on an island and is all about science and engineer. That is why we are also called Science Island. We are Science Islanders as well as scientists, engineers, postdoctoral researchers, and many other kinds of specialists working together to seek grand science solutions to challenges of world&rsquo;s scientific and technical frontiers.</p>\r\n', 'zh-CN', 0, 1, 'admin', '2020-03-18 12:54:15', '2020-06-28 10:25:51'),
(3, 'TALENTS WANTED AT HEFEI INSTITUTES OF PHYSICAL SCIENCE', '', '广州', '海外市场部', '', '<p>霜无可奈何</p>\r\n', '', '', '1', '', 16, '<p>Hefei Institutes of Physical Science is located on an island and is all about science and engineer. That is why we are also called Science Island. We are Science Islanders as well as scientists, engineers, postdoctoral researchers, and many other kinds of specialists working together to seek grand science solutions to challenges of world&rsquo;s scientific and technical frontiers.</p>\r\n', 'zh-CN', 0, 1, 'admin', '2020-03-18 13:18:19', '2020-06-28 10:26:11'),
(4, 'TWO POSTDOC POSITIONS IN PLANT DIVERSITY AND GENOMICS', '', '广州', '海外市场部', '', '<p>霜无可奈何</p>\r\n', '', '', '1', '', 14, '<p>Hefei Institutes of Physical Science is located on an island and is all about science and engineer. That is why we are also called Science Island. We are Science Islanders as well as scientists, engineers, postdoctoral researchers, and many other kinds of specialists working together to seek grand science solutions to challenges of world&rsquo;s scientific and technical frontiers.</p>\r\n', 'en', 0, 1, 'admin', '2020-03-18 13:19:37', '2020-07-19 17:51:31'),
(5, 'TALENTS WANTED AT HEFEI INSTITUTES OF PHYSICAL SCIENCE', '', 'dfsdfs', 'HANG Nannan', '', '<p>dsfds</p>\r\n', '', '', '1', '', 12, '<p>Hefei Institutes of Physical Science is located on an island and is all about science and engineer. That is why we are also called Science Island. We are Science Islanders as well as scientists, engineers, postdoctoral researchers, and many other kinds of specialists working together to seek grand science solutions to challenges of world&rsquo;s scientific and technical frontiers.</p>\r\n', 'en', 0, 1, 'admin', '2020-05-12 01:15:59', '2020-07-19 17:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_labs`
--

CREATE TABLE `qnz_labs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'zh-CN',
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `summary` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `structure` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `committee` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL DEFAULT '0',
  `view_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `template` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_labs`
--

INSERT INTO `qnz_labs` (`id`, `title`, `lang`, `thumbnail`, `content`, `summary`, `structure`, `committee`, `importance`, `view_count`, `template`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '中国科学院脑联结解析与调控重点实验室', 'zh-CN', '/uploads/images/labs/platform_04.jpg', '<div class=\"container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">中国科学院脑联结解析与调控重点实验室</h2>\r\n</div>\r\n\r\n<p class=\"p1\">2019年，脑认知与脑疾病研究所获批&ldquo; 中科院脑联结解析与调控重点实验室 &rdquo;。该重点实验室的成立将 充分整合粤港澳大湾区脑联结组学研究的优势团队的研究力量，弥补国内在此研究领域创新载体建设的 &ldquo;空白&rdquo;；依托此创新载体，通过与国际一流研究团队的深入合作，充分整合国际创新资源，在脑认知 的基本规律和脑疾病的发生机制、干预靶点和新药研发等领域获得原创性的成果；提升大湾区此研究领 域的研究能力、加大人才培养的力度、提升国际影响力，促进优化产业结构，增强产业核心技术竞争力。</p>\r\n</div>\r\n\r\n<section class=\"s1\">\r\n<div class=\"container\">\r\n<div class=\"c3\"><img alt=\"\" class=\"bg wow fadeInUp\" src=\"/assets/img/platform_07.jpg\" />\r\n<div class=\"box\">\r\n<div class=\"txt\">\r\n<h3>实验室定位与建设目标</h3>\r\n\r\n<p>本重点实验室团队瞄准脑科学与脑疾病重大问题，致力于研发神经环路解析与调控研究的关键技术，通 过从脑联结层面系统揭示脑基本功能和重大疾病的环路机制，为智力和意识本源、脑疾病的防治提供理 论基础。 我们的目标是建成脑联结组学领域国际一流的创新研究平台，人才培养和学术交流基地，与生物医药企 业共享开放的、有国际影响力的创新载体。</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"c4\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h3 class=\"text-center\">实验室组织构架</h3>\r\n</div>\r\n\r\n<figure class=\"wow fadeInUp\"><img alt=\"\" src=\"/assets/img/platform_09.png\" /></figure>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class=\"s2 container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h3 class=\"text-center\">研究方向和内容</h3>\r\n</div>\r\n\r\n<div class=\"row no-gutters\">\r\n<div class=\"col-md-6 col-lg-4\">\r\n<div class=\"zib wow fadeInUp\">\r\n<h3 class=\"title\">脑联结组结构解析与功能调控</h3>\r\n\r\n<h4>研究内容：</h4>\r\n\r\n<ol>\r\n	<li>本能行动的脑联结组学。</li>\r\n	<li>习得行为、学习的记忆的脑联结组学。</li>\r\n	<li>注意的脑联结组学基础和特征。</li>\r\n	<li>神经元网络回响和学习记忆的调节机制。</li>\r\n</ol>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg-4\">\r\n<div class=\"zib ood wow fadeInUp\">\r\n<h3 class=\"title\">脑联结组动态变化与脑功能异常</h3>\r\n\r\n<h4>研究内容：</h4>\r\n\r\n<ol>\r\n	<li>突触可塑性变化中的联结组学及新型表观机制。</li>\r\n	<li>自闭症、应激相关疾病、成瘾的联结组变化及调控机制。</li>\r\n	<li>阿尔茨海默症的联结组特征，新型标志物鉴定及新型干预靶点研究。</li>\r\n	<li>非人灵长类脑疾病模型创制及药物与干预手段研发。</li>\r\n</ol>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg-4\">\r\n<div class=\"zib wow fadeInUp\">\r\n<h3 class=\"title\">脑联结组解析与调控的新技术及新工具</h3>\r\n\r\n<h4>研究内容：</h4>\r\n\r\n<ol>\r\n	<li>新型神经环路示踪技术、神经元亚型环路研究。</li>\r\n	<li>高时空精准光遗传学工具研发，柔性光遗传调控技术，柔性神经电信号检测技术研发。</li>\r\n	<li>大尺度快速全脑光成像系统，样品处理系统，可扩展的脑图谱绘制与分析技术研发。</li>\r\n	<li>非人灵长类神经环路干预技术研发。</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 'sdfsd', '10|11|13|20', '14|21|23', 100, 30, 'platform/detail_lab.html', 1, 'admin', '2020-07-28 02:01:13', '2020-07-29 02:51:47'),
(2, ' 广东省脑连接图谱重点实验室', 'zh-CN', '/uploads/images/labs/platform_05.jpg', '<div class=\"title-section\">\r\n<h2 class=\"text-center\">广东省脑连接图谱重点实验室</h2>\r\n</div>\r\n\r\n<p class=\"p1\">广东省脑连接图谱重点实验室于2017年经广东省科技厅批准筹建，实验室依托于中国科学院深圳先进技术研究院，瞄准国际神经科学研究发展的前沿，聚焦于对跨物种大脑内神经环路结构和功能图谱特征及其在认知障碍性疾病模型中变异规律和调控机制的研究，以期阐明大脑的工作原理。</p>\r\n\r\n<div class=\"c1\"><img alt=\"\" class=\"bg\" src=\"/assets/img/platform_06.jpg\" />\r\n<div class=\"box\">\r\n<h3>整体研究目标</h3>\r\n\r\n<p>跨物种的理解&ldquo;自上而下&rdquo;与&ldquo;自下而上&rdquo;信息相互调控的神经环路结构和功能图谱特征及其在认知障碍性疾病（自闭症、AD、药物成瘾等）模型中变异规律和调控机制。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<h3>重点研究方向</h3>\r\n\r\n<ol>\r\n	<li>围绕本能情绪的&ldquo;自上而下&rdquo;与&ldquo;自下而上&rdquo;信息相互调控的神经环路结构和功能图谱解析；</li>\r\n	<li>中枢神经系统通过交感／副交感神经系统与外周脏器相互调控的神经图谱解析；</li>\r\n	<li>非人灵长类和啮齿类脑疾病动物模型的发展；</li>\r\n	<li>神经调控和环路示踪新工具的研发。</li>\r\n</ol>\r\n</div>\r\n</div>\r\n', 'cxzczx', NULL, '8|10|12|14|16|17', 90, 4, 'platform/detail_lab1.html', 1, 'admin', '2020-07-28 02:06:25', '2020-07-29 02:52:26'),
(3, ' 广东省脑连接图谱重点实验室【en】', 'en', '/uploads/images/labs/platform_05.jpg', '<div class=\"title-section\">\r\n<h2 class=\"text-center\">广东省脑连接图谱重点实验室</h2>\r\n</div>\r\n\r\n<p class=\"p1\">广东省脑连接图谱重点实验室于2017年经广东省科技厅批准筹建，实验室依托于中国科学院深圳先进技术研究院，瞄准国际神经科学研究发展的前沿，聚焦于对跨物种大脑内神经环路结构和功能图谱特征及其在认知障碍性疾病模型中变异规律和调控机制的研究，以期阐明大脑的工作原理。</p>\r\n\r\n<div class=\"c1\"><img alt=\"\" class=\"bg\" src=\"/assets/img/platform_06.jpg\" />\r\n<div class=\"box\">\r\n<h3>整体研究目标</h3>\r\n\r\n<p>跨物种的理解&ldquo;自上而下&rdquo;与&ldquo;自下而上&rdquo;信息相互调控的神经环路结构和功能图谱特征及其在认知障碍性疾病（自闭症、AD、药物成瘾等）模型中变异规律和调控机制。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<h3>重点研究方向</h3>\r\n\r\n<ol>\r\n	<li>围绕本能情绪的&ldquo;自上而下&rdquo;与&ldquo;自下而上&rdquo;信息相互调控的神经环路结构和功能图谱解析；</li>\r\n	<li>中枢神经系统通过交感／副交感神经系统与外周脏器相互调控的神经图谱解析；</li>\r\n	<li>非人灵长类和啮齿类脑疾病动物模型的发展；</li>\r\n	<li>神经调控和环路示踪新工具的研发。</li>\r\n</ol>\r\n</div>\r\n</div>\r\n', 'cxzczx', NULL, '8|10|12|14|16|17', 90, 4, 'platform/detail_lab1.html', 1, 'admin', '2020-07-29 02:51:32', '2020-08-08 17:22:32'),
(4, '中国科学院脑联结解析与调控重点实验室【en】', 'en', '/uploads/images/labs/platform_04.jpg', '<div class=\"container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">中国科学院脑联结解析与调控重点实验室</h2>\r\n</div>\r\n\r\n<p class=\"p1\">2019年，脑认知与脑疾病研究所获批&ldquo; 中科院脑联结解析与调控重点实验室 &rdquo;。该重点实验室的成立将 充分整合粤港澳大湾区脑联结组学研究的优势团队的研究力量，弥补国内在此研究领域创新载体建设的 &ldquo;空白&rdquo;；依托此创新载体，通过与国际一流研究团队的深入合作，充分整合国际创新资源，在脑认知 的基本规律和脑疾病的发生机制、干预靶点和新药研发等领域获得原创性的成果；提升大湾区此研究领 域的研究能力、加大人才培养的力度、提升国际影响力，促进优化产业结构，增强产业核心技术竞争力。</p>\r\n</div>\r\n\r\n<section class=\"s1\">\r\n<div class=\"container\">\r\n<div class=\"c3\"><img alt=\"\" class=\"bg wow fadeInUp\" src=\"/assets/img/platform_07.jpg\" />\r\n<div class=\"box\">\r\n<div class=\"txt\">\r\n<h3>实验室定位与建设目标</h3>\r\n\r\n<p>本重点实验室团队瞄准脑科学与脑疾病重大问题，致力于研发神经环路解析与调控研究的关键技术，通 过从脑联结层面系统揭示脑基本功能和重大疾病的环路机制，为智力和意识本源、脑疾病的防治提供理 论基础。 我们的目标是建成脑联结组学领域国际一流的创新研究平台，人才培养和学术交流基地，与生物医药企 业共享开放的、有国际影响力的创新载体。</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"c4\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h3 class=\"text-center\">实验室组织构架</h3>\r\n</div>\r\n\r\n<figure class=\"wow fadeInUp\"><img alt=\"\" src=\"/assets/img/platform_09.png\" /></figure>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class=\"s2 container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h3 class=\"text-center\">研究方向和内容</h3>\r\n</div>\r\n\r\n<div class=\"row no-gutters\">\r\n<div class=\"col-md-6 col-lg-4\">\r\n<div class=\"zib wow fadeInUp\">\r\n<h3 class=\"title\">脑联结组结构解析与功能调控</h3>\r\n\r\n<h4>研究内容：</h4>\r\n\r\n<ol>\r\n	<li>本能行动的脑联结组学。</li>\r\n	<li>习得行为、学习的记忆的脑联结组学。</li>\r\n	<li>注意的脑联结组学基础和特征。</li>\r\n	<li>神经元网络回响和学习记忆的调节机制。</li>\r\n</ol>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg-4\">\r\n<div class=\"zib ood wow fadeInUp\">\r\n<h3 class=\"title\">脑联结组动态变化与脑功能异常</h3>\r\n\r\n<h4>研究内容：</h4>\r\n\r\n<ol>\r\n	<li>突触可塑性变化中的联结组学及新型表观机制。</li>\r\n	<li>自闭症、应激相关疾病、成瘾的联结组变化及调控机制。</li>\r\n	<li>阿尔茨海默症的联结组特征，新型标志物鉴定及新型干预靶点研究。</li>\r\n	<li>非人灵长类脑疾病模型创制及药物与干预手段研发。</li>\r\n</ol>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg-4\">\r\n<div class=\"zib wow fadeInUp\">\r\n<h3 class=\"title\">脑联结组解析与调控的新技术及新工具</h3>\r\n\r\n<h4>研究内容：</h4>\r\n\r\n<ol>\r\n	<li>新型神经环路示踪技术、神经元亚型环路研究。</li>\r\n	<li>高时空精准光遗传学工具研发，柔性光遗传调控技术，柔性神经电信号检测技术研发。</li>\r\n	<li>大尺度快速全脑光成像系统，样品处理系统，可扩展的脑图谱绘制与分析技术研发。</li>\r\n	<li>非人灵长类神经环路干预技术研发。</li>\r\n</ol>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 'sdfsd', '10|11|13|20', '14|21|23', 100, 33, 'platform/detail_lab.html', 1, 'admin', '2020-07-29 02:51:34', '2020-08-09 03:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_languages`
--

CREATE TABLE `qnz_languages` (
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `issys` tinyint(1) NOT NULL DEFAULT '0',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `importance` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_languages`
--

INSERT INTO `qnz_languages` (`code`, `name`, `issys`, `default`, `importance`, `active`, `created_at`, `updated_at`) VALUES
('en', 'english', 0, 0, 0, 1, '2020-03-25 07:18:37', '2020-03-25 12:03:43'),
('zh-CN', '中文', 0, 1, 100, 1, '2020-03-25 07:05:36', '2020-06-28 00:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_links`
--

CREATE TABLE `qnz_links` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_links`
--

INSERT INTO `qnz_links` (`id`, `title`, `lang`, `url`, `image_url`, `description`, `importance`, `category_id`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '中国科学院深圳先进技术研究院', 'zh-CN', '#', '', NULL, 0, 1, 1, 'admin', '2020-08-09 06:33:40', '2020-08-09 06:33:40'),
(2, '中国科学院', 'zh-CN', '#', '', NULL, 0, 1, 1, 'admin', '2020-08-09 06:40:42', '2020-08-09 06:40:42'),
(3, '深圳先进技术研究院', 'zh-CN', '#', '', NULL, 0, 1, 1, 'admin', '2020-08-09 06:40:54', '2020-08-09 06:40:54'),
(4, '中国科学院en', 'en', '#', '', NULL, 0, 1, 1, 'admin', '2020-08-09 06:52:59', '2020-08-09 06:53:52'),
(5, '中国科学院深圳先进技术研究院en', 'en', '#', '', NULL, 0, 1, 1, 'admin', '2020-08-09 06:53:05', '2020-08-09 06:53:27'),
(6, '深圳先进技术研究院en', 'en', '#', '', NULL, 0, 1, 1, 'admin', '2020-08-09 06:53:09', '2020-08-09 06:53:36'),
(7, '中国科学院深圳先进技术研究院脑认知与脑疾病研究所', 'zh-CN', '#', '/uploads/images/links/con_02.png', 'The Brain Cognition and Brain Disease Institute of Shenzhen Institutes of Advanced Technology, Chinese Academy of Sciences', 0, 2, 1, 'admin', '2020-08-09 07:14:39', '2020-08-09 07:14:39'),
(8, '中国科学院深圳先进技术研究院', 'zh-CN', '#', '/uploads/images/links/con_02.png', 'Shenzhen Institutes of Advanced Technology, Chinese Academy of Sciences', 0, 2, 1, 'admin', '2020-08-09 07:15:33', '2020-08-09 07:15:46'),
(9, '中国科学院深圳先进技术研究院en', 'en', '#', '/uploads/images/links/con_02.png', 'Shenzhen Institutes of Advanced Technology, Chinese Academy of Sciences', 0, 2, 1, 'admin', '2020-08-09 07:15:58', '2020-08-09 07:16:33'),
(10, '中国科学院深圳先进技术研究院en', 'en', '#', '/uploads/images/links/con_02.png', 'Shenzhen Institutes of Advanced Technology, Chinese Academy of Sciences', 0, 2, 1, 'admin', '2020-08-09 07:16:00', '2020-08-09 07:16:25');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_link_categories`
--

CREATE TABLE `qnz_link_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_link_categories`
--

INSERT INTO `qnz_link_categories` (`id`, `title`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"links of page footer\", \"zh-CN\": \"页脚链接\"}', 0, 1, 'admin', '2020-08-09 05:50:28', '2020-08-09 05:50:28'),
(2, '{\"en\": \"友情链接en\", \"zh-CN\": \"友情链接\"}', 0, 1, 'admin', '2020-08-09 05:51:00', '2020-08-09 05:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_menus`
--

CREATE TABLE `qnz_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'zh-CN',
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `importance` int(10) UNSIGNED NOT NULL,
  `new_window` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_menus`
--

INSERT INTO `qnz_menus` (`id`, `lang`, `title`, `url`, `description`, `icon`, `parent`, `group_id`, `importance`, `new_window`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'zh-CN', '科研概况', '/researches', '', '', 0, 1, 99, 0, 1, 'admin', '2020-03-19 09:58:38', '2020-06-22 12:41:45'),
(4, 'zh-CN', '关于我们', '/about', '', '', 0, 1, 100, 0, 1, 'admin', '2020-03-19 11:55:40', '2020-06-22 12:40:51'),
(9, 'zh-CN', '人才队伍', '/team', '', '', 0, 1, 98, 0, 1, 'admin', '2020-04-19 09:06:42', '2020-06-22 12:45:18'),
(10, 'zh-CN', '合作交流', '/cooperation', '', '', 0, 2, 20, 0, 1, 'admin', '2020-05-11 16:49:31', '2020-06-22 13:16:33'),
(11, 'zh-CN', '关于我们', '/about', '', '', 0, 2, 100, 0, 1, 'admin', '2020-05-11 16:49:50', '2020-06-22 13:00:44'),
(12, 'zh-CN', '科研概况', '/researches', '', '', 0, 2, 99, 0, 1, 'admin', '2020-05-11 16:50:11', '2020-06-22 13:07:41'),
(13, 'zh-CN', '研究布局', '/researches/index', '', '', 12, 2, 7, 0, 1, 'admin', '2020-05-11 16:50:26', '2020-06-22 13:10:57'),
(14, 'zh-CN', '科研平台', '/platform', '', '', 0, 2, 80, 0, 1, 'admin', '2020-05-11 16:50:34', '2020-06-22 13:14:06'),
(15, 'zh-CN', '科研进展', '/projects/evolve', '', '', 12, 2, 4, 0, 1, 'admin', '2020-05-11 16:50:45', '2020-06-22 13:11:21'),
(16, 'zh-CN', '科研项目', '/researches/projects', '', '', 12, 2, 6, 0, 1, 'admin', '2020-05-16 06:17:38', '2020-06-22 13:10:36'),
(17, 'zh-CN', '人才队伍', '/team', '', '', 0, 2, 90, 0, 1, 'admin', '2020-05-29 16:06:29', '2020-06-22 13:11:46'),
(18, 'zh-CN', '科研平台', '/platform', '', '', 0, 1, 97, 0, 1, 'admin', '2020-06-22 12:45:57', '2020-06-22 12:45:57'),
(19, 'zh-CN', '合作交流', '/cooperation', '', '', 0, 1, 90, 0, 1, 'admin', '2020-06-22 12:46:28', '2020-06-23 01:06:07'),
(20, 'zh-CN', '院况简介', '/about/index', '', '', 4, 1, 0, 0, 1, 'admin', '2020-06-22 12:48:01', '2020-06-22 12:48:01'),
(21, 'zh-CN', '现任领导', '/about/leadership', '', '', 4, 1, 0, 0, 1, 'admin', '2020-06-22 12:48:26', '2020-06-22 12:48:26'),
(22, 'zh-CN', '机构设置', '/about/institutions', '', '', 4, 1, 0, 0, 1, 'admin', '2020-06-22 12:48:47', '2020-06-22 12:48:47'),
(23, 'zh-CN', '研究布局', '/researches/index', '', '', 1, 1, 0, 0, 1, 'admin', '2020-06-22 12:49:19', '2020-06-22 12:49:19'),
(24, 'zh-CN', '科研项目', '/researches/projects', '', '', 1, 1, 0, 0, 1, 'admin', '2020-06-22 12:49:45', '2020-06-22 12:49:45'),
(25, 'zh-CN', '科研进展', '/researches/evolve', '', '', 1, 1, 0, 0, 1, 'admin', '2020-06-22 12:50:05', '2020-06-22 12:50:05'),
(26, 'zh-CN', '论文', '/researches/papers', '', '', 1, 1, 0, 0, 1, 'admin', '2020-06-22 12:50:25', '2020-06-22 12:50:25'),
(27, 'zh-CN', '获奖', '/researches/awards', '', '', 1, 1, 0, 0, 1, 'admin', '2020-06-22 12:50:50', '2020-06-22 12:50:50'),
(28, 'zh-CN', '人才概览', '/team/index', '', '', 9, 1, 0, 0, 1, 'admin', '2020-06-22 12:51:21', '2020-06-22 12:51:21'),
(29, 'zh-CN', '院士', '/team/academician', '', '', 9, 1, 0, 0, 1, 'admin', '2020-06-22 12:51:42', '2020-06-22 12:51:42'),
(30, 'zh-CN', '正高级序列', '/team/higher', '', '', 9, 1, 0, 0, 1, 'admin', '2020-06-22 12:52:20', '2020-06-22 12:52:20'),
(31, 'zh-CN', '副高级序列', '/team/deputy', '', '', 9, 1, 0, 0, 1, 'admin', '2020-06-22 12:52:40', '2020-06-22 12:52:40'),
(32, 'zh-CN', '人才招聘', '/team/jobs', '', '', 9, 1, 0, 0, 1, 'admin', '2020-06-22 12:52:58', '2020-06-22 12:52:58'),
(33, 'zh-CN', '研究中心', '/platform/index', '', '', 18, 1, 0, 0, 1, 'admin', '2020-06-22 12:53:36', '2020-06-22 12:53:36'),
(34, 'zh-CN', '脑设施', '/platform/facilities', '', '', 18, 1, 0, 0, 1, 'admin', '2020-06-22 12:54:02', '2020-06-22 12:54:02'),
(35, 'zh-CN', '重点实验室', '/platform/lab', '', '', 18, 1, 0, 0, 1, 'admin', '2020-06-22 12:54:19', '2020-06-22 12:54:19'),
(36, 'zh-CN', '科研支撑', '/platform/support', '', '', 18, 1, 0, 0, 1, 'admin', '2020-06-22 12:54:48', '2020-06-22 12:54:48'),
(37, 'zh-CN', '国际合作', '/cooperation/index', '', '', 19, 1, 0, 0, 1, 'admin', '2020-06-22 12:56:04', '2020-06-22 12:56:59'),
(38, 'zh-CN', '国内合作', '/cooperation/index?cid=11', '', '', 19, 1, 0, 0, 1, 'admin', '2020-06-22 12:56:31', '2020-06-27 11:03:12'),
(39, 'zh-CN', '合作项目', '/cooperation/index?cid=12', '', '', 19, 1, 0, 0, 1, 'admin', '2020-06-22 12:56:46', '2020-06-27 11:03:19'),
(40, 'zh-CN', '院况简介', '/about/index', '', '', 11, 2, 0, 0, 1, 'admin', '2020-06-22 13:01:30', '2020-06-22 13:01:30'),
(41, 'zh-CN', '现任领导', '/about/leadership', '', '', 11, 2, 0, 0, 1, 'admin', '2020-06-22 13:01:56', '2020-06-22 13:01:56'),
(42, 'zh-CN', '机构设置', '/about/institutions', '', '', 11, 2, 0, 0, 1, 'admin', '2020-06-22 13:06:56', '2020-06-22 13:06:56'),
(43, 'zh-CN', '论文', '/researches/papers', '', '', 12, 2, 0, 0, 1, 'admin', '2020-06-22 13:09:41', '2020-06-22 13:09:41'),
(44, 'zh-CN', '获奖', '/researches/awards', '', '', 12, 2, 0, 0, 1, 'admin', '2020-06-22 13:10:05', '2020-06-22 13:10:05'),
(45, 'zh-CN', '人才概况', '/team/index', '', '', 17, 2, 0, 0, 1, 'admin', '2020-06-22 13:12:15', '2020-06-22 13:12:15'),
(46, 'zh-CN', '院士', '/team/academician', '', '', 17, 2, 0, 0, 1, 'admin', '2020-06-22 13:12:44', '2020-06-22 13:12:44'),
(47, 'zh-CN', '正高级序列', '/team/higher', '', '', 17, 2, 0, 0, 1, 'admin', '2020-06-22 13:13:02', '2020-06-22 13:13:02'),
(48, 'zh-CN', '副高级序列', '/team/deputy', '', '', 17, 2, 0, 0, 1, 'admin', '2020-06-22 13:13:22', '2020-06-22 13:13:22'),
(49, 'zh-CN', '人才招聘', '/team/jobs', '', '', 17, 2, 0, 0, 1, 'admin', '2020-06-22 13:13:33', '2020-06-22 13:13:33'),
(50, 'zh-CN', '研究中心', '/platform/index', '', '', 14, 2, 0, 0, 1, 'admin', '2020-06-22 13:14:42', '2020-06-22 13:14:42'),
(51, 'zh-CN', '脑设施', '/platform/facilities', '', '', 14, 2, 0, 0, 1, 'admin', '2020-06-22 13:15:07', '2020-06-22 13:15:07'),
(52, 'zh-CN', '重点实验室', '/platform/lab', '', '', 14, 2, 0, 0, 1, 'admin', '2020-06-22 13:15:20', '2020-06-22 13:15:20'),
(53, 'zh-CN', '科研支撑', '/platform/support', '', '', 14, 2, 0, 0, 1, 'admin', '2020-06-22 13:15:52', '2020-06-22 13:15:52'),
(54, 'zh-CN', '国际合作', '/cooperation/index', '', '', 10, 2, 0, 0, 1, 'admin', '2020-06-22 13:17:44', '2020-06-22 13:17:44'),
(55, 'zh-CN', '国内合作', '/cooperation/index?cid=1', '', '', 10, 2, 0, 0, 1, 'admin', '2020-06-22 13:17:59', '2020-06-22 13:17:59'),
(56, 'zh-CN', '合作项目', '/cooperation/index?cid=3', '', '', 10, 2, 0, 0, 1, 'admin', '2020-06-22 13:18:23', '2020-06-22 13:18:23'),
(57, 'zh-CN', '新闻动态', '/news', '', '', 0, 2, 0, 0, 1, 'admin', '2020-06-22 13:21:12', '2020-06-22 13:21:12'),
(58, 'zh-CN', '新闻中心', '/news/index', '', '', 57, 2, 0, 0, 1, 'admin', '2020-06-22 13:21:49', '2020-06-22 13:21:49'),
(59, 'zh-CN', '会议预告', '/news/meeting', '', '', 57, 2, 0, 0, 1, 'admin', '2020-06-22 13:22:46', '2020-06-22 13:22:46'),
(60, 'zh-CN', '通知公告', '/news/notice', '', '', 57, 2, 0, 0, 1, 'admin', '2020-06-22 13:23:26', '2020-06-22 13:23:26'),
(61, 'zh-CN', '党建文化', '/culture', '', '', 0, 2, 0, 0, 1, 'admin', '2020-06-22 13:24:32', '2020-06-22 13:24:32'),
(62, 'zh-CN', '脑所党支部', '/culture/index', '', '', 61, 2, 0, 0, 1, 'admin', '2020-06-22 13:25:11', '2020-06-22 13:25:11'),
(63, 'zh-CN', '脑所分团委', '/culture/committee', '', '', 61, 2, 0, 0, 1, 'admin', '2020-06-22 13:26:30', '2020-06-22 13:26:30'),
(64, 'zh-CN', '创新文化', '/culture/innovation', '', '', 61, 2, 0, 0, 1, 'admin', '2020-06-22 13:27:34', '2020-06-22 13:27:34'),
(66, 'zh-CN', '新闻动态', '/news', '', '', 0, 3, 0, 0, 1, 'admin', '2020-06-22 13:35:37', '2020-06-22 13:35:37'),
(67, 'zh-CN', '脑未来资源', '/future', '', '', 0, 3, 0, 0, 1, 'admin', '2020-06-22 13:36:11', '2020-06-22 13:36:11'),
(68, 'zh-CN', '党建文化', '/culture', '', '', 0, 3, 0, 0, 1, 'admin', '2020-06-22 13:36:32', '2020-06-22 13:36:32'),
(69, 'zh-CN', '联系我们', '/contact', '', '', 0, 3, 0, 0, 1, 'admin', '2020-06-22 13:36:52', '2020-06-22 13:36:52'),
(70, 'zh-CN', '研究生教育', '/education', '', '', 0, 1, 94, 0, 1, 'admin', '2020-06-23 01:05:55', '2020-06-23 01:06:17'),
(71, 'zh-CN', '教育概况', '/education/index', '', '', 70, 1, 0, 0, 1, 'admin', '2020-06-23 01:06:58', '2020-06-23 01:06:58'),
(72, 'zh-CN', '学科方向', '/education/orientation', '', '', 70, 1, 0, 0, 1, 'admin', '2020-06-23 01:07:18', '2020-06-23 01:07:18'),
(73, 'zh-CN', '招生信息', '/education/admissions', '', '', 70, 1, 0, 0, 1, 'admin', '2020-06-23 01:07:41', '2020-06-23 01:07:41'),
(74, 'zh-CN', '联合培养', '/education/training', '', '', 70, 1, 0, 0, 1, 'admin', '2020-06-23 01:08:03', '2020-06-23 01:08:03'),
(75, 'zh-CN', '导师介绍', '/education/tutor', '', '', 70, 1, 0, 0, 1, 'admin', '2020-06-23 01:08:27', '2020-06-23 01:08:27'),
(76, 'zh-CN', '联系方式', '/education/contact', '', '', 70, 1, 0, 0, 1, 'admin', '2020-06-23 01:08:44', '2020-06-23 01:09:09'),
(77, 'zh-CN', '研究生教育', '/education', '', '', 0, 2, 75, 0, 1, 'admin', '2020-06-23 01:13:33', '2020-06-23 01:16:42'),
(78, 'zh-CN', '教育概况', '/education/index', '', '', 77, 2, 0, 0, 1, 'admin', '2020-06-23 01:14:09', '2020-06-23 01:14:09'),
(79, 'zh-CN', '学科方向', '/education/orientation', '', '', 77, 2, 0, 0, 1, 'admin', '2020-06-23 01:14:33', '2020-06-23 01:14:33'),
(80, 'zh-CN', '招生信息', '/education/admissions', '', '', 77, 2, 0, 0, 1, 'admin', '2020-06-23 01:14:55', '2020-06-23 01:14:55'),
(81, 'zh-CN', '联合培养', '/education/training', '', '', 77, 2, 0, 0, 1, 'admin', '2020-06-23 01:15:12', '2020-06-23 01:15:12'),
(82, 'zh-CN', '导师介绍', '/education/tutor', '', '', 77, 2, 0, 0, 1, 'admin', '2020-06-23 01:15:32', '2020-06-23 01:15:32'),
(83, 'zh-CN', '联系方式', '/education/contact', '', '', 77, 2, 0, 0, 1, 'admin', '2020-06-23 01:15:48', '2020-06-23 01:15:48'),
(84, 'zh-CN', '视频', '/future/index', '', '', 67, 3, 0, 0, 1, 'admin', '2020-06-24 16:05:02', '2020-06-24 16:05:02'),
(85, 'zh-CN', '科普', '/future/science', '', '', 67, 3, 0, 0, 1, 'admin', '2020-06-24 16:05:42', '2020-06-24 16:05:42'),
(86, 'en', 'About Us', '/en/about', '', '', 0, 1, 1000, 0, 1, 'admin', '2020-06-29 02:21:38', '2020-07-30 06:39:25'),
(87, 'en', 'Introduction', '/en/about/index', '', '', 86, 1, 0, 0, 1, 'admin', '2020-06-29 02:42:04', '2020-07-30 06:39:48'),
(88, 'en', 'About Us', '/en/about', '', '', 0, 2, 0, 0, 1, 'admin', '2020-06-29 02:45:21', '2020-07-30 06:54:29'),
(89, 'en', 'News', '/en/news', '', '', 0, 3, 0, 0, 1, 'admin', '2020-06-29 02:45:37', '2020-07-20 01:07:39'),
(90, 'en', 'Directors', '/en/about/leadership', '', '', 86, 1, 0, 0, 1, 'admin', '2020-06-30 01:15:08', '2020-07-30 06:40:06'),
(91, 'en', 'Organization', '/en/about/institutions', '', '', 86, 1, 0, 0, 1, 'admin', '2020-06-30 01:31:03', '2020-07-30 06:40:26'),
(92, 'en', 'Research overview', '/en/researches', '', '', 0, 1, 0, 0, 1, 'admin', '2020-06-30 01:31:40', '2020-07-30 06:40:44'),
(93, 'en', 'Research arrangement', '/en/researches/index', '', '', 92, 1, 0, 0, 1, 'admin', '2020-07-01 02:45:36', '2020-07-30 06:41:02'),
(94, 'en', 'Research project', '/en/researches/projects', '', '', 92, 1, 0, 0, 1, 'admin', '2020-07-01 02:46:56', '2020-07-30 06:41:17'),
(95, 'en', 'Research Progress', '/en/researches/evolve', '', '', 92, 1, 0, 0, 1, 'admin', '2020-07-01 02:47:20', '2020-07-30 06:41:33'),
(96, 'en', 'Essays and papers', '/en/researches/papers', '', '', 92, 1, 0, 0, 1, 'admin', '2020-07-01 02:47:37', '2020-07-30 06:41:51'),
(97, 'en', 'Awards', '/en/researches/awards', '', '', 92, 1, 0, 0, 1, 'admin', '2020-07-01 02:47:55', '2020-07-19 14:27:33'),
(98, 'en', 'Our team', '/en/team', '', '', 0, 1, 0, 0, 1, 'admin', '2020-07-01 02:49:20', '2020-07-30 06:42:12'),
(99, 'en', 'The overviews of our team', '/en/team/index', '', '', 98, 1, 0, 0, 1, 'admin', '2020-07-01 02:50:01', '2020-07-30 06:42:27'),
(100, 'en', 'Our academicians', '/en/team/academician', '', '', 98, 1, 0, 0, 1, 'admin', '2020-07-01 02:50:24', '2020-07-30 06:42:47'),
(101, 'en', 'Principal investigators', '/en/team/higher', '', '', 98, 1, 0, 0, 1, 'admin', '2020-07-01 02:50:45', '2020-07-30 06:43:08'),
(102, 'en', 'Associate investigators', '/en/team/deputy', '', '', 98, 1, 0, 0, 1, 'admin', '2020-07-01 02:51:01', '2020-07-30 06:43:28'),
(103, 'en', 'Join us', '/en/team/jobs', '', '', 98, 1, 0, 0, 1, 'admin', '2020-07-01 02:51:22', '2020-07-30 06:43:44'),
(104, 'en', 'Science research', '/en/platform', '', '', 0, 1, 0, 0, 1, 'admin', '2020-07-01 02:52:38', '2020-07-30 06:44:34'),
(105, 'en', 'Affiliated institutes', '/en/platform/index', '', '', 104, 1, 0, 0, 1, 'admin', '2020-07-01 02:53:29', '2020-07-30 06:44:55'),
(106, 'en', 'Our facilities', '/en/platform/facilities', '', '', 104, 1, 0, 0, 1, 'admin', '2020-07-01 02:59:36', '2020-07-30 06:45:02'),
(107, 'en', 'Flagship laboratories', '/en/platform/lab', '', '', 104, 1, 0, 0, 1, 'admin', '2020-07-01 02:59:56', '2020-07-30 06:45:16'),
(108, 'en', 'Research support', '/en/platform/support', '', '', 104, 1, 0, 0, 1, 'admin', '2020-07-01 03:00:38', '2020-07-30 06:45:29'),
(109, 'en', 'Postgraduate courses', '/en/education', '', '', 0, 1, 0, 0, 1, 'admin', '2020-07-01 03:01:19', '2020-07-30 06:45:49'),
(110, 'en', 'The overview of our courses', '/en/education/index', '', '', 109, 1, 0, 0, 1, 'admin', '2020-07-01 03:02:23', '2020-07-30 06:46:05'),
(111, 'en', 'Subjects', '/en/education/orientation', '', '', 109, 1, 0, 0, 1, 'admin', '2020-07-01 03:02:48', '2020-07-30 06:46:19'),
(112, 'en', 'Postgraduate course prospectus ', '/en/education/admissions', '', '', 109, 1, 0, 0, 1, 'admin', '2020-07-01 03:03:12', '2020-07-30 06:46:45'),
(113, 'en', 'Joint-training programme', '/en/education/training', '', '', 109, 1, 0, 0, 1, 'admin', '2020-07-01 03:03:29', '2020-07-30 06:47:01'),
(114, 'en', 'Our academic staff', '/en/education/tutor', '', '', 109, 1, 0, 0, 1, 'admin', '2020-07-01 03:04:09', '2020-07-30 06:47:16'),
(115, 'en', 'Contact us', '/en/education/contact', '', '', 109, 1, 0, 0, 1, 'admin', '2020-07-01 03:04:31', '2020-07-30 06:47:31'),
(116, 'en', 'Collaboration', '/en/cooperation', '', '', 0, 1, 0, 0, 1, 'admin', '2020-07-01 03:07:35', '2020-07-30 06:47:48'),
(117, 'en', 'International collaboration', '/en/cooperation/index', '', '', 116, 1, 0, 0, 1, 'admin', '2020-07-01 03:08:01', '2020-07-30 06:48:02'),
(118, 'en', 'Domestic collaboration', '/en/cooperation/c11', '', '', 116, 1, 0, 0, 1, 'admin', '2020-07-01 03:09:03', '2020-07-30 06:48:15'),
(119, 'en', 'Collaborative programme', '/en/cooperation/c12', '', '', 116, 1, 0, 0, 1, 'admin', '2020-07-01 03:09:26', '2020-07-30 06:48:30'),
(120, 'en', 'News center', '', '', '/en/news/index', 89, 3, 0, 0, 1, 'admin', '2020-07-01 03:10:19', '2020-07-30 06:49:48'),
(121, 'en', 'Upcoming conferences', '', '', '/en/news/meeting', 89, 3, 0, 0, 1, 'admin', '2020-07-01 03:10:40', '2020-07-30 06:49:56'),
(122, 'en', 'Notices', '', '', '/en/news/notice', 89, 3, 0, 0, 1, 'admin', '2020-07-01 03:11:05', '2020-07-30 06:50:12'),
(123, 'en', 'Resource in the future', '/en/future', '', '', 0, 3, 0, 0, 1, 'admin', '2020-07-01 03:11:50', '2020-07-30 06:49:00'),
(124, 'en', 'Video', '/en/future/index', '', '', 123, 3, 0, 0, 1, 'admin', '2020-07-01 03:12:33', '2020-07-30 06:50:37'),
(125, 'en', 'Popular science', '/en/future/science', '', '', 123, 3, 0, 0, 1, 'admin', '2020-07-01 03:12:49', '2020-07-30 06:50:53'),
(126, 'en', '党建文化', '/en/culture', '', '', 0, 3, 0, 0, 1, 'admin', '2020-07-01 03:13:24', '2020-07-01 03:13:24'),
(127, 'en', '脑所党支部', '/en/culture/index', '', '', 126, 3, 0, 0, 1, 'admin', '2020-07-01 03:14:16', '2020-07-01 03:14:16'),
(128, 'en', '脑所分团委', '/en/culture/committee', '', '', 126, 3, 0, 0, 1, 'admin', '2020-07-01 03:14:43', '2020-07-01 03:14:43'),
(129, 'en', '创新文化', '/en/culture/innovation', '', '', 126, 3, 0, 0, 1, 'admin', '2020-07-01 03:15:08', '2020-07-01 03:15:08'),
(130, 'en', 'Contact us', '/en/contact', '', '', 0, 3, 0, 0, 1, 'admin', '2020-07-01 03:16:35', '2020-07-30 06:51:19'),
(131, 'en', 'Introduction', '/en/about/index', '', '', 88, 2, 0, 0, 1, 'admin', '2020-07-01 03:18:58', '2020-07-30 06:54:39'),
(132, 'en', 'Directors', '/en/about/leadership', '', '', 88, 2, 0, 0, 1, 'admin', '2020-07-01 03:19:22', '2020-07-30 06:55:15'),
(133, 'en', 'Organization', '/en/about/institutions', '', '', 88, 2, 0, 0, 1, 'admin', '2020-07-01 03:19:50', '2020-07-30 06:55:26'),
(134, 'en', 'Research overview', '/en/researches', '', '', 0, 2, 0, 0, 1, 'admin', '2020-07-01 03:20:18', '2020-07-30 06:55:36'),
(135, 'en', 'Research arrangement', '/en/researches/index', '', '', 134, 2, 0, 0, 1, 'admin', '2020-07-01 03:20:42', '2020-07-30 06:55:46'),
(136, 'en', 'Research project', '/en/researches/projects', '', '', 134, 2, 0, 0, 1, 'admin', '2020-07-01 03:21:18', '2020-07-30 06:55:57'),
(137, 'en', 'Research Progress', '/en/projects/evolve', '', '', 134, 2, 0, 0, 1, 'admin', '2020-07-01 03:21:42', '2020-07-30 06:56:09'),
(138, 'en', 'Essays and papers', '/en/researches/papers', '', '', 134, 2, 0, 0, 1, 'admin', '2020-07-01 03:22:15', '2020-07-30 06:56:20'),
(139, 'en', 'Awards', '/en/researches/awards', '', '', 134, 2, 0, 0, 1, 'admin', '2020-07-01 03:22:43', '2020-07-30 06:56:30'),
(140, 'en', 'Our team', '/en/team', '', '', 0, 2, 0, 0, 1, 'admin', '2020-07-01 03:23:06', '2020-07-30 06:56:45'),
(141, 'en', 'The overviews of our team', '/en/team/index', '', '', 140, 2, 0, 0, 1, 'admin', '2020-07-01 03:23:49', '2020-07-30 06:56:56'),
(142, 'en', 'Our academicians', '/en/team/academician', '', '', 140, 2, 0, 0, 1, 'admin', '2020-07-01 03:24:13', '2020-07-30 06:57:06'),
(143, 'en', 'Principal investigators', '/en/team/higher', '', '', 140, 2, 0, 0, 1, 'admin', '2020-07-01 03:24:40', '2020-07-30 06:57:15'),
(144, 'en', 'Associate investigators', '/en/team/deputy', '', '', 140, 2, 0, 0, 1, 'admin', '2020-07-01 03:25:03', '2020-07-30 06:57:26'),
(145, 'en', 'Join us', '/en/team/jobs', '', '', 140, 2, 0, 0, 1, 'admin', '2020-07-01 03:25:26', '2020-07-30 06:57:36'),
(146, 'en', 'Science research', '/en/platform', '', '', 0, 2, 0, 0, 1, 'admin', '2020-07-01 03:25:44', '2020-07-30 06:57:57'),
(147, 'en', 'Affiliated institutes', '/en/platform/index', '', '', 146, 2, 0, 0, 1, 'admin', '2020-07-01 03:26:17', '2020-07-30 06:57:48'),
(148, 'en', 'Our facilities', '/en/platform/facilities', '', '', 146, 2, 0, 0, 1, 'admin', '2020-07-01 03:26:36', '2020-07-30 06:58:06'),
(149, 'en', 'Flagship laboratories', '/en/platform/lab', '', '', 146, 2, 0, 0, 1, 'admin', '2020-07-01 03:27:06', '2020-07-30 06:58:15'),
(150, 'en', 'Research support', '/en/platform/support', '', '', 146, 2, 0, 0, 1, 'admin', '2020-07-01 03:27:30', '2020-07-30 06:58:25'),
(151, 'en', 'Collaboration', '/en/cooperation', '', '', 0, 2, 0, 0, 1, 'admin', '2020-07-01 03:28:02', '2020-07-30 06:58:42'),
(152, 'en', 'International collaboration', '/en/cooperation/index', '', '', 151, 2, 0, 0, 1, 'admin', '2020-07-01 03:28:31', '2020-07-30 06:58:52'),
(153, 'en', 'Domestic collaboration', '/en/cooperation/c11', '', '', 151, 2, 0, 0, 1, 'admin', '2020-07-01 03:29:07', '2020-07-30 06:59:03'),
(154, 'en', 'Collaborative programme', '/en/cooperation/c12', '', '', 151, 2, 0, 0, 1, 'admin', '2020-07-01 03:29:22', '2020-07-30 06:59:14'),
(155, 'en', 'News', '/en/news', '', '', 0, 2, 0, 0, 1, 'admin', '2020-07-01 03:30:01', '2020-07-30 06:59:34'),
(156, 'en', 'News center', '/en/news/index', '', '', 155, 2, 0, 0, 1, 'admin', '2020-07-01 03:30:29', '2020-07-30 06:59:49'),
(157, 'en', 'Upcoming conferences', '/en/news/meeting', '', '', 155, 2, 0, 0, 1, 'admin', '2020-07-01 03:30:52', '2020-07-30 07:00:03'),
(158, 'en', 'Notices', '/en/news/notice', '', '', 155, 2, 0, 0, 1, 'admin', '2020-07-01 03:31:25', '2020-07-30 07:00:23'),
(159, 'en', '党建文化', '/en/culture', '', '', 0, 2, 0, 0, 1, 'admin', '2020-07-01 03:31:52', '2020-07-01 03:31:52'),
(160, 'en', '脑所党支部', '/en/culture/index', '', '', 159, 2, 0, 0, 1, 'admin', '2020-07-01 03:34:07', '2020-07-01 03:34:07'),
(161, 'en', '脑所分团委', '/en/culture/committee', '', '', 159, 2, 0, 0, 1, 'admin', '2020-07-01 03:34:25', '2020-07-01 03:34:25'),
(162, 'en', '创新文化', '/en/culture/innovation', '', '', 159, 2, 0, 0, 1, 'admin', '2020-07-01 03:34:44', '2020-07-01 03:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_metadatas`
--

CREATE TABLE `qnz_metadatas` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `module_type` int(10) UNSIGNED NOT NULL,
  `key_value` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_metadatas`
--

INSERT INTO `qnz_metadatas` (`id`, `title`, `keywords`, `description`, `module_type`, `key_value`, `created_at`, `updated_at`) VALUES
(1, 'fds12121', 'fs', 'dfs', 1, '/pages/test', '2020-03-17 01:55:26', '2020-03-17 02:16:34'),
(2, '', '', '', 1, '/pages/nofound', '2020-03-17 03:51:04', '2020-03-17 03:51:04'),
(3, 'fsd', 'fsdfsd', 's', 4, '1', '2020-03-17 12:26:10', '2020-03-17 12:26:10'),
(4, '', '', '', 1, '/', '2020-03-19 09:54:46', '2020-05-29 16:02:37'),
(5, '', '', '', 1, '/about', '2020-03-19 11:51:48', '2020-03-19 11:51:48'),
(6, '', '', '', 1, '/about/pic', '2020-03-19 11:55:25', '2020-03-19 11:55:25'),
(7, '', '', '', 1, '/about/test', '2020-03-19 11:55:40', '2020-03-19 11:55:40'),
(8, '', '', '', 1, '/news', '2020-03-23 01:49:12', '2020-03-23 01:49:12'),
(9, 'services 1234', 'description,test', 'test description', 1, '/products', '2020-03-23 01:49:34', '2020-04-29 06:37:10'),
(10, '', '', '', 1, '/contact', '2020-03-23 01:50:04', '2020-03-23 01:50:04'),
(11, '', '', '', 5, '1', '2020-04-08 05:27:48', '2020-04-08 05:27:48'),
(12, '', '', '', 5, '2', '2020-04-08 05:28:14', '2020-04-18 06:04:01'),
(14, '', '', '', 1, '/material', '2020-04-17 07:25:15', '2020-04-17 07:25:15'),
(15, '', '', '', 1, '/resource', '2020-04-17 07:25:49', '2020-04-19 09:05:41'),
(16, '', '', '', 1, 'about', '2020-04-17 07:43:52', '2020-04-17 07:43:52'),
(17, 'CNC MACHINING123', '12432432', 'test', 6, '1', '2020-04-17 08:59:31', '2020-04-17 13:26:38'),
(18, '', '', '', 6, '2', '2020-04-17 09:00:28', '2020-04-17 09:00:28'),
(19, '', '', '', 6, '3', '2020-04-17 09:16:39', '2020-04-17 09:16:39'),
(20, '', '', '', 6, '4', '2020-04-17 09:18:16', '2020-04-17 09:18:16'),
(21, '', '', '', 6, '5', '2020-04-17 09:21:48', '2020-04-17 09:21:48'),
(22, '', '', '', 6, '6', '2020-04-17 09:22:25', '2020-04-17 09:22:25'),
(23, '', '', '', 6, '7', '2020-04-17 09:22:59', '2020-04-17 09:22:59'),
(24, '', '', '', 6, '8', '2020-04-17 09:23:37', '2020-04-17 09:23:37'),
(25, '', '', '', 6, '9', '2020-04-17 09:24:15', '2020-04-17 09:24:15'),
(26, 'services 1234', 'description,test', 'test description', 1, '/services', '2020-04-17 10:01:35', '2020-04-19 07:59:29'),
(27, 'test', '1233dsdsa', 'tesfds', 3, '6', '2020-04-19 08:38:14', '2020-04-19 08:38:14'),
(28, '', '', '', 1, '/resource/blog', '2020-04-19 09:06:16', '2020-04-19 09:06:16'),
(29, '', '', '', 1, '/resource/gallery', '2020-04-19 09:06:42', '2020-04-19 09:06:42'),
(30, '', '', '', 1, '/resource/faq', '2020-04-19 09:07:07', '2020-04-19 09:07:07'),
(31, '', '', '', 1, 'quote', '2020-04-20 01:27:42', '2020-04-20 01:27:42'),
(32, '', '', '', 3, '11', '2020-04-22 09:47:32', '2020-04-22 09:47:32'),
(33, '', '', '', 3, '12', '2020-04-22 09:50:01', '2020-04-22 09:50:01'),
(34, '', '', '', 5, '3', '2020-04-22 10:01:11', '2020-04-22 10:01:11'),
(35, '', '', '', 1, '/products/detail-1', '2020-04-29 06:38:14', '2020-04-29 06:38:14'),
(36, '', '', '', 1, '/products/detail-2', '2020-04-29 06:38:46', '2020-04-29 06:38:46'),
(37, '', '', '', 1, '/products/detail-3', '2020-04-29 06:38:54', '2020-04-29 06:38:54'),
(38, '', '', '', 1, '/join', '2020-04-29 06:40:16', '2020-04-29 06:40:16'),
(39, '', '', '', 1, 'join', '2020-04-29 07:27:30', '2020-04-29 07:27:30'),
(40, 'services 1234', 'description,test', 'test description', 1, '#', '2020-04-29 07:51:37', '2020-04-29 07:51:37'),
(41, '', '', '', 3, '10', '2020-04-29 08:18:59', '2020-04-29 08:18:59'),
(42, '', '', '', 3, '9', '2020-04-29 08:24:14', '2020-04-29 08:24:14'),
(43, '', '', '', 3, '8', '2020-04-29 08:24:43', '2020-04-29 08:24:43'),
(44, '', '', '', 1, '/products/detail-10', '2020-04-29 08:25:10', '2020-04-29 08:25:10'),
(45, '', '', '', 1, '/products/detail-9', '2020-04-29 08:25:18', '2020-04-29 08:25:18'),
(46, '', '', '', 1, '/products/detail-8', '2020-04-29 08:25:29', '2020-04-29 08:25:29'),
(47, '', '', '', 1, '/team', '2020-05-11 16:42:02', '2020-05-11 16:44:15'),
(48, '', '', '', 1, '/research', '2020-05-11 16:42:50', '2020-05-11 16:42:50'),
(49, '', '', '', 1, 'contact', '2020-05-12 00:34:13', '2020-05-12 00:34:13'),
(50, '', '', '', 1, '/publications	', '2020-05-16 04:16:56', '2020-05-16 04:16:56'),
(51, '', '', '', 1, '/fellows', '2020-05-16 04:17:20', '2020-05-16 04:17:20'),
(52, '', '', '', 1, '/courses', '2020-05-16 04:17:48', '2020-05-16 04:17:48'),
(53, '', '', '', 1, '/events', '2020-05-16 06:16:52', '2020-05-16 06:16:52'),
(54, '', '', '', 1, '/application', '2020-05-16 06:17:13', '2020-05-16 06:17:13'),
(55, '', '', '', 1, '/applications', '2020-05-16 06:27:43', '2020-05-16 06:27:43'),
(56, '', '', '', 1, 'applications', '2020-05-16 08:50:48', '2020-05-16 08:50:48'),
(57, '', '', '', 1, '/projects', '2020-05-29 07:14:17', '2020-05-29 16:03:13'),
(58, '', '', '', 5, '4', '2020-05-29 07:49:51', '2020-05-29 07:49:51'),
(59, '', '', '', 1, 'projects', '2020-05-29 13:48:01', '2020-05-29 13:48:01'),
(60, '', '', '', 1, 'project_one', '2020-05-29 14:54:27', '2020-05-29 14:54:27'),
(61, '', '', '', 1, 'project_two', '2020-05-29 15:06:12', '2020-05-29 15:06:12'),
(62, '', '', '', 1, 'project_three', '2020-05-29 15:22:43', '2020-05-29 15:22:43'),
(63, '', '', '', 1, 'high', '2020-05-29 15:35:11', '2020-05-29 15:35:11'),
(64, '', '', '', 1, '/projects/one', '2020-05-29 16:03:55', '2020-05-29 16:03:55'),
(65, '', '', '', 1, '/projects/two', '2020-05-29 16:04:31', '2020-05-29 16:04:31'),
(66, '', '', '', 1, '/projects/three', '2020-05-29 16:05:07', '2020-05-29 16:05:07'),
(67, '', '', '', 1, '/education/high', '2020-05-29 16:06:29', '2020-05-29 16:06:29'),
(68, '', '', '', 1, 'nofound', '2020-05-30 03:24:36', '2020-05-30 03:24:36'),
(69, '', '', '', 1, 'products_3', '2020-05-30 03:27:25', '2020-05-30 03:27:25'),
(70, '', '', '', 1, 'projects_3', '2020-05-30 03:33:12', '2020-05-30 03:33:12'),
(71, '', '', '', 1, 'about_contact', '2020-05-30 03:47:46', '2020-05-30 03:47:46'),
(72, '', '', '', 1, '/researches', '2020-06-22 12:41:46', '2020-06-22 12:41:46'),
(73, '', '', '', 1, '/platform', '2020-06-22 12:45:57', '2020-06-22 12:45:57'),
(74, '', '', '', 1, '/education', '2020-06-22 12:46:28', '2020-06-22 12:46:28'),
(75, '', '', '', 1, '/cooperation', '2020-06-22 12:47:12', '2020-06-22 12:47:12'),
(76, '', '', '', 1, '/about/index', '2020-06-22 12:48:01', '2020-06-22 12:48:01'),
(77, '', '', '', 1, '/about/leadership', '2020-06-22 12:48:26', '2020-06-22 12:48:26'),
(78, '', '', '', 1, '/about/institutions', '2020-06-22 12:48:47', '2020-06-22 12:48:47'),
(79, '', '', '', 1, '/researches/index', '2020-06-22 12:49:19', '2020-06-22 12:49:19'),
(80, '', '', '', 1, '/researches/projects', '2020-06-22 12:49:45', '2020-06-22 12:49:45'),
(81, '', '', '', 1, '/researches/evolve', '2020-06-22 12:50:05', '2020-06-22 12:50:05'),
(82, '', '', '', 1, '/researches/papers', '2020-06-22 12:50:25', '2020-06-22 12:50:25'),
(83, '', '', '', 1, '/researches/awards', '2020-06-22 12:50:50', '2020-06-22 12:50:50'),
(84, '', '', '', 1, '/team/index', '2020-06-22 12:51:21', '2020-06-22 12:51:21'),
(85, '', '', '', 1, '/team/academician', '2020-06-22 12:51:42', '2020-06-22 12:51:42'),
(86, '', '', '', 1, '/team/higher', '2020-06-22 12:52:20', '2020-06-22 12:52:20'),
(87, '', '', '', 1, '/team/deputy', '2020-06-22 12:52:40', '2020-06-22 12:52:40'),
(88, '', '', '', 1, '/team/jobs', '2020-06-22 12:52:58', '2020-06-22 12:52:58'),
(89, '', '', '', 1, '/platform/index', '2020-06-22 12:53:36', '2020-06-22 12:53:36'),
(90, '', '', '', 1, '/platform/facilities', '2020-06-22 12:54:02', '2020-06-22 12:54:02'),
(91, '', '', '', 1, '/platform/lab', '2020-06-22 12:54:19', '2020-06-22 12:54:19'),
(92, '', '', '', 1, '/platform/support', '2020-06-22 12:54:48', '2020-06-22 12:54:48'),
(93, '', '', '', 1, '/cooperation/index', '2020-06-22 12:56:04', '2020-06-22 12:56:04'),
(94, '', '', '', 1, '/cooperation/index?cid=2', '2020-06-22 12:56:31', '2020-06-22 12:56:31'),
(95, '', '', '', 1, '/cooperation/index?cid=3', '2020-06-22 12:56:46', '2020-06-22 12:56:46'),
(96, '', '', '', 1, '/projects/evolve', '2020-06-22 13:11:21', '2020-06-22 13:11:21'),
(97, '', '', '', 1, '/cooperation/index?cid=1', '2020-06-22 13:17:59', '2020-06-22 13:17:59'),
(98, '', '', '', 1, '/news/index', '2020-06-22 13:21:49', '2020-06-22 13:21:49'),
(99, '', '', '', 1, '/news/meeting', '2020-06-22 13:22:46', '2020-06-22 13:22:46'),
(100, '', '', '', 1, '/news/notice', '2020-06-22 13:23:26', '2020-06-22 13:23:26'),
(101, '', '', '', 1, '/culture', '2020-06-22 13:24:32', '2020-06-22 13:24:32'),
(102, '', '', '', 1, '/culture/index', '2020-06-22 13:25:11', '2020-06-22 13:25:11'),
(103, '', '', '', 1, '/culture/committee', '2020-06-22 13:26:30', '2020-06-22 13:26:30'),
(104, '', '', '', 1, '/culture/innovation', '2020-06-22 13:27:34', '2020-06-22 13:27:34'),
(105, '', '', '', 1, '/future', '2020-06-22 13:36:11', '2020-06-22 13:36:11'),
(106, '', '', '', 1, '/education/index', '2020-06-23 01:06:58', '2020-06-23 01:06:58'),
(107, '', '', '', 1, '/education/orientation', '2020-06-23 01:07:18', '2020-06-23 01:07:18'),
(108, '', '', '', 1, '/education/admissions', '2020-06-23 01:07:41', '2020-06-23 01:07:41'),
(109, '', '', '', 1, '/education/training', '2020-06-23 01:08:03', '2020-06-23 01:08:03'),
(110, '', '', '', 1, '/education/tutor', '2020-06-23 01:08:27', '2020-06-23 01:08:27'),
(111, '', '', '', 1, '/education/联系方式', '2020-06-23 01:08:44', '2020-06-23 01:08:44'),
(112, '', '', '', 1, '/education/contact', '2020-06-23 01:09:09', '2020-06-23 01:09:09'),
(113, '', '', '', 1, 'institutions', '2020-06-23 03:01:30', '2020-06-23 03:01:30'),
(114, '', '', '', 1, 'research', '2020-06-23 03:39:01', '2020-06-23 03:39:01'),
(115, '', '', '', 1, 'evolve', '2020-06-23 05:32:34', '2020-06-23 05:32:34'),
(116, '', '', '', 1, 'team', '2020-06-24 06:13:04', '2020-06-24 06:13:04'),
(117, '', '', '', 1, 'academician', '2020-06-24 06:16:35', '2020-06-24 06:16:35'),
(118, '', '', '', 1, 'facilities', '2020-06-24 08:26:02', '2020-06-24 08:26:02'),
(119, '', '', '', 1, 'education', '2020-06-24 10:26:43', '2020-06-24 10:26:43'),
(120, '', '', '', 1, 'orientation', '2020-06-24 10:31:30', '2020-06-24 10:31:30'),
(121, '', '', '', 1, 'education_contact', '2020-06-24 10:47:56', '2020-06-24 10:47:56'),
(122, '', '', '', 1, 'committee', '2020-06-24 14:06:33', '2020-06-24 14:06:33'),
(123, '', '', '', 1, 'innovation', '2020-06-24 14:07:54', '2020-06-24 14:07:54'),
(124, '', '', '', 1, 'admissions', '2020-06-24 15:54:37', '2020-06-24 15:54:37'),
(125, '', '', '', 1, 'training', '2020-06-24 15:57:35', '2020-06-24 15:57:35'),
(126, '', '', '', 1, '/future/index', '2020-06-24 16:05:02', '2020-06-24 16:05:02'),
(127, '', '', '', 1, '/future/science', '2020-06-24 16:05:42', '2020-06-24 16:05:42'),
(128, '', '', '', 5, '5', '2020-06-27 04:43:04', '2020-06-27 04:43:04'),
(129, '', '', '', 1, 'culture', '2020-06-27 09:23:30', '2020-06-27 09:23:30'),
(130, '', '', '', 5, '6', '2020-06-27 09:44:42', '2020-06-27 09:44:42'),
(131, '', '', '', 5, '7', '2020-06-27 10:58:20', '2020-06-27 10:58:20'),
(132, '', '', '', 5, '8', '2020-06-27 10:58:51', '2020-06-27 10:58:51'),
(133, '', '', '', 1, '/cooperation/index?cid=11', '2020-06-27 11:03:12', '2020-06-27 11:03:12'),
(134, '', '', '', 1, '/cooperation/index?cid=12', '2020-06-27 11:03:19', '2020-06-27 11:03:19'),
(135, '', '', '', 1, '/en/about', '2020-06-29 02:21:38', '2020-06-29 02:21:38'),
(136, '', '', '', 1, '/en/about/index', '2020-06-29 02:42:04', '2020-06-29 02:42:04'),
(137, '', '', '', 1, '/en/news', '2020-06-29 02:45:37', '2020-06-29 02:45:37'),
(138, '', '', '', 5, '9', '2020-06-29 07:35:50', '2020-06-29 07:35:50'),
(139, '', '', '', 5, '10', '2020-06-29 07:36:31', '2020-06-29 07:36:31'),
(140, '', '', '', 5, '11', '2020-06-29 07:36:54', '2020-06-29 07:36:54'),
(141, '', '', '', 5, '12', '2020-06-29 07:37:09', '2020-06-29 07:37:09'),
(142, '', '', '', 5, '13', '2020-06-29 07:37:22', '2020-06-29 07:37:22'),
(143, '', '', '', 5, '14', '2020-06-29 07:37:33', '2020-06-29 07:37:33'),
(144, '', '', '', 5, '15', '2020-06-29 07:37:45', '2020-06-29 07:37:45'),
(145, '', '', '', 5, '16', '2020-06-29 07:38:00', '2020-06-29 07:38:00'),
(146, '', '', '', 5, '17', '2020-06-29 07:38:12', '2020-06-29 07:38:12'),
(147, '', '', '', 5, '18', '2020-06-29 23:45:21', '2020-06-29 23:45:21'),
(148, '', '', '', 5, '19', '2020-06-29 23:45:44', '2020-06-29 23:45:44'),
(149, '', '', '', 5, '20', '2020-06-29 23:46:37', '2020-06-29 23:46:37'),
(150, '', '', '', 1, '/en/about/leadership', '2020-06-30 01:15:08', '2020-06-30 01:15:08'),
(151, '', '', '', 1, '/en/about/institutions', '2020-06-30 01:31:03', '2020-06-30 01:31:03'),
(152, '', '', '', 1, '/en/researches', '2020-06-30 01:31:40', '2020-06-30 01:31:40'),
(153, '', '', '', 1, '/en/researches/index', '2020-07-01 02:45:36', '2020-07-01 02:45:36'),
(154, '', '', '', 1, '/en/researches/projects', '2020-07-01 02:46:56', '2020-07-01 02:46:56'),
(155, '', '', '', 1, '/en/researches/evolve', '2020-07-01 02:47:20', '2020-07-01 02:47:20'),
(156, '', '', '', 1, '/en/researches/papers', '2020-07-01 02:47:37', '2020-07-01 02:47:37'),
(157, '', '', '', 1, '/en/researches/awards', '2020-07-01 02:47:55', '2020-07-01 02:47:55'),
(158, '', '', '', 1, '/en/team', '2020-07-01 02:49:20', '2020-07-01 02:49:20'),
(159, '', '', '', 1, '/en/team/index', '2020-07-01 02:50:01', '2020-07-01 02:50:01'),
(160, '', '', '', 1, '/en/team/academician', '2020-07-01 02:50:24', '2020-07-01 02:50:24'),
(161, '', '', '', 1, '/en/team/higher', '2020-07-01 02:50:45', '2020-07-01 02:50:45'),
(162, '', '', '', 1, '/en/team/deputy', '2020-07-01 02:51:01', '2020-07-01 02:51:01'),
(163, '', '', '', 1, '/en/team/jobs', '2020-07-01 02:51:22', '2020-07-01 02:51:22'),
(164, '', '', '', 1, '/en/platform', '2020-07-01 02:52:38', '2020-07-01 02:52:38'),
(165, '', '', '', 1, '/en/platform/index', '2020-07-01 02:53:29', '2020-07-01 02:53:29'),
(166, '', '', '', 1, '/en/platform/facilities', '2020-07-01 02:59:36', '2020-07-01 02:59:36'),
(167, '', '', '', 1, '/en/platform/lab', '2020-07-01 02:59:56', '2020-07-01 02:59:56'),
(168, '', '', '', 1, '/en/platform/support', '2020-07-01 03:00:38', '2020-07-01 03:00:38'),
(169, '', '', '', 1, '/en/education', '2020-07-01 03:01:19', '2020-07-01 03:01:19'),
(170, '', '', '', 1, '/en/education/index', '2020-07-01 03:02:23', '2020-07-01 03:02:23'),
(171, '', '', '', 1, '/en/education/orientation', '2020-07-01 03:02:48', '2020-07-01 03:02:48'),
(172, '', '', '', 1, '/en/education/admissions', '2020-07-01 03:03:12', '2020-07-01 03:03:12'),
(173, '', '', '', 1, '/en/education/training', '2020-07-01 03:03:29', '2020-07-01 03:03:29'),
(174, '', '', '', 1, '/en/education/tutor', '2020-07-01 03:04:09', '2020-07-01 03:04:09'),
(175, '', '', '', 1, '/en/education/contact', '2020-07-01 03:04:31', '2020-07-01 03:04:31'),
(176, '', '', '', 1, '/en/cooperation', '2020-07-01 03:07:35', '2020-07-01 03:07:35'),
(177, '', '', '', 1, '/en/cooperation/index', '2020-07-01 03:08:01', '2020-07-01 03:08:01'),
(178, '', '', '', 1, '/en/cooperation/index?cid=11', '2020-07-01 03:09:03', '2020-07-01 03:09:03'),
(179, '', '', '', 1, '/en/cooperation/index?cid=12', '2020-07-01 03:09:26', '2020-07-01 03:09:26'),
(180, '', '', '', 1, '', '2020-07-01 03:10:19', '2020-07-01 03:10:19'),
(181, '', '', '', 1, '/en/future', '2020-07-01 03:11:50', '2020-07-01 03:11:50'),
(182, '', '', '', 1, '/en/future/index', '2020-07-01 03:12:33', '2020-07-01 03:12:33'),
(183, '', '', '', 1, '/en/future/science', '2020-07-01 03:12:49', '2020-07-01 03:12:49'),
(184, '', '', '', 1, '/en/culture', '2020-07-01 03:13:24', '2020-07-01 03:13:24'),
(185, '', '', '', 1, '/en/culture/index', '2020-07-01 03:14:16', '2020-07-01 03:14:16'),
(186, '', '', '', 1, '/en/culture/committee', '2020-07-01 03:14:43', '2020-07-01 03:14:43'),
(187, '', '', '', 1, '/en/culture/innovation', '2020-07-01 03:15:08', '2020-07-01 03:15:08'),
(188, '', '', '', 1, '/en/contact', '2020-07-01 03:16:35', '2020-07-01 03:16:35'),
(189, '', '', '', 1, '/en/projects/evolve', '2020-07-01 03:21:42', '2020-07-01 03:21:42'),
(190, '', '', '', 1, '/en/news/index', '2020-07-01 03:30:29', '2020-07-01 03:30:29'),
(191, '', '', '', 1, '/en/news/meeting', '2020-07-01 03:30:52', '2020-07-01 03:30:52'),
(192, '', '', '', 1, '/en/news/notice', '2020-07-01 03:31:25', '2020-07-01 03:31:25'),
(193, '', '', '', 1, 'dsfdfsd_en', '2020-07-19 13:58:15', '2020-07-19 13:58:15'),
(194, '', '', '', 1, 'institutions_en', '2020-07-19 13:58:41', '2020-07-19 13:58:41'),
(195, '', '', '', 1, 'research_en', '2020-07-19 14:04:30', '2020-07-19 14:04:30'),
(196, '', '', '', 1, 'projects_en', '2020-07-19 14:31:51', '2020-07-19 14:31:51'),
(197, '', '', '', 5, '21', '2020-07-19 14:32:54', '2020-07-19 14:32:54'),
(198, '', '', '', 5, '22', '2020-07-19 14:33:11', '2020-07-19 14:33:11'),
(199, '', '', '', 5, '23', '2020-07-19 14:34:49', '2020-07-19 14:34:49'),
(200, '', '', '', 5, '24', '2020-07-19 14:35:04', '2020-07-19 14:35:04'),
(201, '', '', '', 5, '25', '2020-07-19 15:08:39', '2020-07-19 15:08:39'),
(202, '', '', '', 5, '26', '2020-07-19 15:15:00', '2020-07-19 15:15:00'),
(203, '', '', '', 5, '28', '2020-07-19 15:38:22', '2020-07-19 15:38:22'),
(204, '', '', '', 5, '31', '2020-07-19 16:37:49', '2020-07-19 16:37:49'),
(205, '', '', '', 5, '32', '2020-07-19 16:37:56', '2020-07-19 16:37:56'),
(206, '', '', '', 5, '30', '2020-07-19 16:38:05', '2020-07-19 16:38:05'),
(207, '', '', '', 1, 'team_en', '2020-07-19 17:11:17', '2020-07-19 17:11:17'),
(208, '', '', '', 1, 'academician_en', '2020-07-19 17:15:50', '2020-07-19 17:15:50'),
(209, '', '', '', 1, 'facilities_en', '2020-07-19 18:06:13', '2020-07-19 18:06:13'),
(210, '', '', '', 5, '33', '2020-07-19 18:17:21', '2020-07-19 18:17:21'),
(211, '', '', '', 1, 'education_en', '2020-07-19 18:25:24', '2020-07-19 18:25:24'),
(212, '', '', '', 1, 'orientation_en', '2020-07-19 18:29:01', '2020-07-19 18:29:01'),
(213, '', '', '', 1, 'admissions_en', '2020-07-19 18:32:13', '2020-07-19 18:32:13'),
(214, '', '', '', 1, 'training_en', '2020-07-19 18:38:19', '2020-07-19 18:38:19'),
(215, '', '', '', 1, 'education_contact_en', '2020-07-19 18:43:01', '2020-07-19 18:43:01'),
(216, '', '', '', 5, '34', '2020-07-20 00:26:28', '2020-07-20 00:26:28'),
(217, '', '', '', 1, '/en/cooperation/c11', '2020-07-20 00:30:53', '2020-07-20 00:30:53'),
(218, '', '', '', 1, '/en/cooperation/c12', '2020-07-20 00:31:03', '2020-07-20 00:31:03'),
(219, '', '', '', 5, '38', '2020-07-20 00:43:50', '2020-07-20 00:43:50'),
(220, '', '', '', 5, '37', '2020-07-20 00:44:08', '2020-07-20 00:44:08'),
(221, '', '', '', 5, '36', '2020-07-20 00:44:16', '2020-07-20 00:44:16'),
(222, '', '', '', 5, '35', '2020-07-20 00:44:25', '2020-07-20 00:44:25'),
(223, '', '', '', 5, '39', '2020-07-20 00:49:50', '2020-07-20 00:49:50'),
(224, '', '', '', 1, 'culture_en', '2020-07-20 00:50:48', '2020-07-20 00:50:48'),
(225, '', '', '', 1, 'committee_en', '2020-07-20 00:57:37', '2020-07-20 00:57:37'),
(226, '', '', '', 1, 'innovation_en', '2020-07-20 01:01:18', '2020-07-20 01:01:18'),
(227, '', '', '', 1, 'contact_en', '2020-07-20 01:05:52', '2020-07-20 01:05:52'),
(228, '', '', '', 9, '3', '2020-07-26 15:55:18', '2020-07-26 15:55:18'),
(229, '', '', '', 9, '2', '2020-07-26 16:05:33', '2020-07-26 16:05:33'),
(230, '', '', '', 9, '1', '2020-07-26 16:08:10', '2020-07-26 16:08:10'),
(231, '', '', '', 4, '3', '2020-07-28 01:36:37', '2020-07-28 01:36:37'),
(232, '', '', '', 4, '4', '2020-07-28 01:37:43', '2020-07-28 01:37:43'),
(233, '', '', '', 4, '5', '2020-07-28 01:39:18', '2020-07-28 01:39:18'),
(234, '', '', '', 10, '1', '2020-07-28 02:01:13', '2020-07-28 02:01:13'),
(235, '', '', '', 10, '2', '2020-07-28 02:06:25', '2020-07-28 02:06:25'),
(236, '', '', '', 11, '1', '2020-07-28 13:26:04', '2020-07-28 13:26:04'),
(237, '', '', '', 11, '2', '2020-07-28 13:34:17', '2020-07-28 13:34:17'),
(238, '', '', '', 11, '3', '2020-07-28 13:35:51', '2020-07-28 13:35:51'),
(239, '', '', '', 11, '4', '2020-07-28 13:36:37', '2020-07-28 13:36:37'),
(240, '', '', '', 11, '5', '2020-07-28 13:37:15', '2020-07-28 13:37:15'),
(241, '', '', '', 11, '6', '2020-07-28 13:48:49', '2020-07-28 13:48:49'),
(242, '', '', '', 11, '7', '2020-07-28 13:50:25', '2020-07-28 13:50:25'),
(243, '', '', '', 11, '8', '2020-07-28 15:15:36', '2020-07-28 15:15:36'),
(244, '', '', '', 11, '9', '2020-07-28 15:15:53', '2020-07-28 15:15:53'),
(245, '', '', '', 11, '10', '2020-07-28 15:16:08', '2020-07-28 15:16:08'),
(246, '', '', '', 11, '11', '2020-07-28 15:16:52', '2020-07-28 15:16:52'),
(247, '', '', '', 11, '12', '2020-07-28 15:17:06', '2020-07-28 15:17:06'),
(248, '', '', '', 11, '13', '2020-07-28 15:17:20', '2020-07-28 15:17:20'),
(249, '', '', '', 11, '14', '2020-07-28 15:17:29', '2020-07-28 15:17:29'),
(250, '', '', '', 10, '4', '2020-07-29 02:52:00', '2020-07-29 02:52:00'),
(251, '', '', '', 10, '3', '2020-07-29 02:52:13', '2020-07-29 02:52:13'),
(252, '', '', '', 1, 'evolve_en', '2020-07-29 02:56:13', '2020-07-29 02:56:13'),
(253, '', '', '', 1, 'contact_zh-CN', '2020-08-09 07:27:56', '2020-08-09 07:27:56'),
(254, '', '', '', 5, '29', '2020-08-09 10:42:29', '2020-08-09 10:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_news`
--

CREATE TABLE `qnz_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'zh-CN',
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `importance` int(10) UNSIGNED NOT NULL,
  `view_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `pubdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_ext` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_news`
--

INSERT INTO `qnz_news` (`id`, `lang`, `title`, `summary`, `thumbnail`, `image_url`, `content`, `importance`, `view_count`, `pubdate`, `author`, `author_ext`, `category_id`, `active`, `recommend`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'zh-CN', ' CREATING A SUCCESSFUL OUTSOURCING PARTNERSHIP', 'Researchers from the Shenzhen Institutes of Advanced Technology (SIAT) of the Chinese Academy of Sciences designed a novel combined machine learning and deep learning framework ...', '/uploads/images/news/n3.jpg', NULL, '<p>CNC machining is a computer numerical control machining. It is a subtractive manufacturing procedure where a variety of tools directed by a computer is used to systemically remove raw materials till a final product or production part is made. CNC machining processes specialized digital design models to manufacture high-quality prototypes, tool molds and production arts. CNC machining can also be employed in pressure die casting or plastic injection molding services. CNC machining takes a number of forms, and CNC milling and turning are two of the more common CNC techniques in the industry.</p>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/temp/blog_body_1.jpg\" /></figure>\r\n\r\n<p>CNC Machining is one of the most effective means for rapid prototyping. The process allows you to take advantage of the computer numerical control to deliver high-quality prototypes in the quickest turnaround period. Here are some more reasons why CNC machining should one your preferred technique for making rapid prototypes of your design.</p>\r\n\r\n<h4>1. Speed</h4>\r\n\r\n<p>CNC Machines have greatly improved since their inception in 1970s. The addition of computerized controls to these numerical control machines has greatly accelerated the capacity of CNC machines to deliver higher quality at improved speeds.</p>\r\n\r\n<p>As rapid prototyping demands genuine models with fast turnaround times, CNC machining is one of the most preferred methods in the industry for obvious reasons. From setup times to actual execution, CNC machines will translate 3-dimensional CAD/CAM models into G-code software and then commence milling to produce the final part in a number of hours.</p>\r\n\r\n<p>The automation of the CNC milling technique also means there is limited human interaction and almost zero downtimes during the production process.</p>\r\n\r\n<h4>2. Tooling &ndash; CNC Machines will run without tooling and dies</h4>\r\n\r\n<p>There is a significant cost associated with the production of dies and molds. For manufacturing techniques like pressure die casting and injection molding, there is usually a need for a rigid die that is mad from steel alloys. These dies can take weeks to manufacture based on complexity of the design and the desired shape. Also, errors in the details in these dies will automatically reflect in the copies produced from them.</p>\r\n\r\n<p>CNC machining on the other hand requires no fixed tooling. The process on its own only requires a CAD/CAM design, a computer software and some metal cutting inserts to execute a production. Because of this, CNC machining is considerably faster, cost-efficient and possibly more accurate for rapid prototyping.</p>\r\n\r\n<h4>3. Accuracy and Precision</h4>\r\n\r\n<p>The level of accuracy and precision of CNC machines is unmatched by any other manufacturing process in the industry. In modern production hubs, the computerized numerical control is the most effective way of achieving the highest level of accuracy with tolerances in the neighborhood of 0.05mm give or take.</p>\r\n\r\n<p>The accuracy of CNC machines is also highly scalable and repeatable, which guarantees that all the prototypes to be produced with look and work exactly alike. The tolerances attainable when using CNC machines is so accurate that it will fit for virtually all the commercial applications it may be employed for.</p>\r\n\r\n<h4>4. Control and Modifications</h4>\r\n\r\n<p>By simply altering a few lines in the software program, an entire manufacturing process can be modified to match new specifications in a number of seconds. The G-code program allows for very interacting and controlled prototyping, where multiple design iterations may be run by simply refining and tweaking certain specifications without additional cost. This is a great advantage over conventional manufacturing and prototyping techniques where modifications may require new dies or expensive modifications to existing ones</p>\r\n\r\n<h4>5. Material Variety</h4>\r\n\r\n<p>CNC machines are for the most part unselective machines. This means that they will cut and mill any type of material being used for production as long as the material is strong enough not to deform under pressure.</p>\r\n\r\n<p>CNC machining is suitable for rapid prototyping as it offers many developers and engineers to run multiple prototypes of their part from a wide array of materials. This way, the same design and prototypes can be made from several materials to evaluate the option with the best-fit mechanical, functional and physical property for its end use. With only small modifications to the feed parameters and running speed, the same design can be run across several materials to get the perfect prototype and ideal product.</p>\r\n\r\n<h4>Premium Part CNC Machining Services in China</h4>\r\n\r\n<p>At Premium Part, we offer high-quality CNC machining services that are optimized for the production of many precision parts. Our expertise range across a number of services and we can generate exceptional quality products with quick turnaround. We can work with an extensive range of materials and produce both mass manufacture volumes and low-volume manufacturing. From CNC machining to 3D printing and rapid injection molding, our engineers are highly experienced to deliver best-in-class manufacturing quality and standards.</p>\r\n', 0, 9, '2020-04-07 16:00:00', 'DR.Shuguan Yuan', NULL, 3, 1, 1, 'admin', '2020-04-08 05:27:48', '2020-06-27 03:55:27'),
(2, 'zh-CN', 'SCIENTISTS DESIGN NOVEL ALGORITHMIC...', 'Researchers from the Shenzhen Institutes of Advanced Technology (SIAT) of the Chinese Academy of Sciences designed a novel combined machine learning and deep learning framework ...', '/uploads/images/news/n2.jpg', NULL, '<p>CNC machining is a computer numerical control machining. It is a subtractive manufacturing procedure where a variety of tools directed by a computer is used to systemically remove raw materials till a final product or production part is made. CNC machining processes specialized digital design models to manufacture high-quality prototypes, tool molds and production arts. CNC machining can also be employed in pressure die casting or plastic injection molding services. CNC machining takes a number of forms, and CNC milling and turning are two of the more common CNC techniques in the industry.</p>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/temp/blog_body_1.jpg\" /></figure>\r\n\r\n<p>CNC Machining is one of the most effective means for rapid prototyping. The process allows you to take advantage of the computer numerical control to deliver high-quality prototypes in the quickest turnaround period. Here are some more reasons why CNC machining should one your preferred technique for making rapid prototypes of your design.</p>\r\n\r\n<h4>1. Speed</h4>\r\n\r\n<p>CNC Machines have greatly improved since their inception in 1970s. The addition of computerized controls to these numerical control machines has greatly accelerated the capacity of CNC machines to deliver higher quality at improved speeds.</p>\r\n\r\n<p>As rapid prototyping demands genuine models with fast turnaround times, CNC machining is one of the most preferred methods in the industry for obvious reasons. From setup times to actual execution, CNC machines will translate 3-dimensional CAD/CAM models into G-code software and then commence milling to produce the final part in a number of hours.</p>\r\n\r\n<p>The automation of the CNC milling technique also means there is limited human interaction and almost zero downtimes during the production process.</p>\r\n\r\n<h4>2. Tooling &ndash; CNC Machines will run without tooling and dies</h4>\r\n\r\n<p>There is a significant cost associated with the production of dies and molds. For manufacturing techniques like pressure die casting and injection molding, there is usually a need for a rigid die that is mad from steel alloys. These dies can take weeks to manufacture based on complexity of the design and the desired shape. Also, errors in the details in these dies will automatically reflect in the copies produced from them.</p>\r\n\r\n<p>CNC machining on the other hand requires no fixed tooling. The process on its own only requires a CAD/CAM design, a computer software and some metal cutting inserts to execute a production. Because of this, CNC machining is considerably faster, cost-efficient and possibly more accurate for rapid prototyping.</p>\r\n\r\n<h4>3. Accuracy and Precision</h4>\r\n\r\n<p>The level of accuracy and precision of CNC machines is unmatched by any other manufacturing process in the industry. In modern production hubs, the computerized numerical control is the most effective way of achieving the highest level of accuracy with tolerances in the neighborhood of 0.05mm give or take.</p>\r\n\r\n<p>The accuracy of CNC machines is also highly scalable and repeatable, which guarantees that all the prototypes to be produced with look and work exactly alike. The tolerances attainable when using CNC machines is so accurate that it will fit for virtually all the commercial applications it may be employed for.</p>\r\n\r\n<h4>4. Control and Modifications</h4>\r\n\r\n<p>By simply altering a few lines in the software program, an entire manufacturing process can be modified to match new specifications in a number of seconds. The G-code program allows for very interacting and controlled prototyping, where multiple design iterations may be run by simply refining and tweaking certain specifications without additional cost. This is a great advantage over conventional manufacturing and prototyping techniques where modifications may require new dies or expensive modifications to existing ones</p>\r\n\r\n<h4>5. Material Variety</h4>\r\n\r\n<p>CNC machines are for the most part unselective machines. This means that they will cut and mill any type of material being used for production as long as the material is strong enough not to deform under pressure.</p>\r\n\r\n<p>CNC machining is suitable for rapid prototyping as it offers many developers and engineers to run multiple prototypes of their part from a wide array of materials. This way, the same design and prototypes can be made from several materials to evaluate the option with the best-fit mechanical, functional and physical property for its end use. With only small modifications to the feed parameters and running speed, the same design can be run across several materials to get the perfect prototype and ideal product.</p>\r\n\r\n<h4>Premium Part CNC Machining Services in China</h4>\r\n\r\n<p>At Premium Part, we offer high-quality CNC machining services that are optimized for the production of many precision parts. Our expertise range across a number of services and we can generate exceptional quality products with quick turnaround. We can work with an extensive range of materials and produce both mass manufacture volumes and low-volume manufacturing. From CNC machining to 3D printing and rapid injection molding, our engineers are highly experienced to deliver best-in-class manufacturing quality and standards.</p>\r\n', 0, 15, '2020-04-07 16:00:00', 'DR.Shuguan Yuan', NULL, 6, 1, 1, 'admin', '2020-04-08 05:28:14', '2020-07-30 10:15:40'),
(3, 'zh-CN', '是非成败转头空，青山依旧在，惯看秋月春风。一壶浊酒喜相逢', 'Researchers from the Shenzhen Institutes of Advanced Technology (SIAT) of the Chinese Academy of Sciences designed a novel combined machine learning and deep learning framework ...', '/uploads/images/news/n3.jpg', NULL, '<p>在 composer.json 文件中加入如下代码，以确保上面创建的类文件能够被自动加载。</p>\r\n\r\n<p>&quot;autoload&quot;: {<br />\r\n&nbsp; &nbsp; &quot;classmap&quot;: [<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &quot;Models&quot; // Folder where all your models are<br />\r\n&nbsp; &nbsp; &nbsp;]<br />\r\n}<br />\r\n然后执行</p>\r\n\r\n<p>&nbsp;composer dump-autoload<br />\r\n通过 Eloquent 操作数据库</p>\r\n\r\n<p>基本大功告成了。 测一下吧，在根目录创建 index.php 文件，添加如下代码：</p>\r\n', 0, 0, '2020-05-09 16:00:00', 'DR.Shuguan Yuan', NULL, 4, 1, 1, 'admin', '2020-05-10 08:08:16', '2020-06-27 04:05:09'),
(4, 'zh-CN', '是非成败转头空，青山依旧在，惯看秋月春风。一壶浊酒喜相逢', '', '/uploads/images/news/n2.jpg', NULL, '<p>test</p>\r\n', 0, 3, '2020-05-28 16:00:00', '', NULL, 3, 1, 1, 'admin', '2020-05-29 07:49:51', '2020-07-19 14:44:30'),
(5, 'zh-CN', '美味，如何让我们快速获得满足感？', '', '/uploads/images/news/se_01.jpg', NULL, '<p>test</p>\r\n', 0, 8, '2020-06-26 16:00:00', 'doubletong', '22|23', 2, 1, 0, 'admin', '2020-06-27 04:43:04', '2020-08-09 13:29:12'),
(6, 'zh-CN', '诺奖、院士双双助阵 50余顶尖脑科学专家齐聚深圳', '', '/uploads/images/news/n2.jpg', NULL, '<p>test</p>\r\n', 0, 0, '2020-06-26 16:00:00', '', NULL, 8, 1, 0, 'admin', '2020-06-27 09:44:42', '2020-06-27 09:44:42'),
(7, 'zh-CN', '国际合作基因—MIT麦戈文脑研究所建设发展历程', '', '/uploads/images/news/coo_01.jpg', NULL, '<p>test</p>\r\n', 0, 5, '2020-06-26 16:00:00', '', NULL, 10, 1, 0, 'admin', '2020-06-27 10:58:20', '2020-07-30 10:41:20'),
(8, 'zh-CN', ' 积极吸引国际创新资源汇聚深圳：与Broad研究所签署合作备忘录，双方将在脑科学等领域建立深入合作', '', '/uploads/images/news/coo_02.jpg', NULL, '', 0, 1, '2020-06-26 16:00:00', '', NULL, 10, 1, 0, 'admin', '2020-06-27 10:58:51', '2020-07-30 07:16:19'),
(9, 'zh-CN', '公共技术服务平台', '', '', NULL, '<p>...</p>\r\n', 0, 0, '2020-06-28 16:00:00', '', NULL, 13, 1, 0, 'admin', '2020-06-29 07:35:50', '2020-06-29 07:35:50'),
(10, 'zh-CN', '检察审计处', '', '', NULL, '<p>...</p>\r\n', 0, 0, '2020-06-28 16:00:00', '', NULL, 13, 1, 0, 'admin', '2020-06-29 07:36:31', '2020-06-29 07:36:31'),
(11, 'zh-CN', '党群工作处', '', '', NULL, '<p>...</p>\r\n', 0, 0, '2020-06-28 16:00:00', '', NULL, 13, 1, 0, 'admin', '2020-06-29 07:36:54', '2020-06-29 07:36:54'),
(12, 'zh-CN', '原地合作与成果转化处', '', '', NULL, '<p>...</p>\r\n', 0, 0, '2020-06-28 16:00:00', '', NULL, 13, 1, 0, 'admin', '2020-06-29 07:37:09', '2020-06-29 07:37:09'),
(13, 'zh-CN', '院企合作与创新发展处', '', '', NULL, '<p>...</p>\r\n', 0, 0, '2020-06-28 16:00:00', '', NULL, 13, 1, 0, 'admin', '2020-06-29 07:37:22', '2020-06-29 07:37:22'),
(14, 'zh-CN', '教育处', '', '', NULL, '<p>...</p>\r\n', 0, 0, '2020-06-28 16:00:00', '', NULL, 13, 1, 0, 'admin', '2020-06-29 07:37:33', '2020-06-29 07:37:33'),
(15, 'zh-CN', '人力资源处', '', '', NULL, '<p>...</p>\r\n', 0, 0, '2020-06-28 16:00:00', '', NULL, 13, 1, 0, 'admin', '2020-06-29 07:37:45', '2020-06-29 07:37:45'),
(16, 'zh-CN', '科研管理与支撑处', '', '', NULL, '<p>...</p>\r\n', 0, 0, '2020-06-28 16:00:00', '', NULL, 13, 1, 0, 'admin', '2020-06-29 07:38:00', '2020-06-29 07:38:00'),
(17, 'zh-CN', '公共事务与财务资产处', '', '', NULL, '<section class=\"s1 container\">\r\n        <div class=\"title-section wow fadeInUp\">\r\n          <h2 class=\"text-center\">综合事务部</h2>\r\n        </div>\r\n        <p>简称“公财处”，Department of Administration and Finance，由文秘办、运行管理办、基建办、核算财务室、项目财务室、资产财务室、综合财务室组成。为院理事会、院安委会秘书处。 </p>\r\n        <p>负责院公共资源及财务资产规划；负责公共关系的维护及重要来访接待、行政资源的管理与保障、公共事务的服务与安全管理、公文规范管理与机要保密，园区公共设施基本建设；负责财务规划、过程管理与监管、预决算、固定资产安全。负责根据国家、中科院和地方政府有关政策制定和完善我院相关制度。完成领导交办的其他任务。</p>\r\n      </section>\r\n      <section class=\"s2\">\r\n        <div class=\"container\">\r\n          <div class=\"title-section wow fadeInUp\">\r\n            <h2 class=\"text-center\">公共事务与财务资产处</h2>\r\n          </div>\r\n          <div class=\"c1\">\r\n            <h4>文秘办</h4>\r\n            <p>负责院领导秘书工作；协调组织理事会、务虚会、院长办公会、院务会、院长接待日等院级会议；负责文书流转及档案管理；机要保密；院务会议决策事务督办；负责全院印章、资质文件管理；牵头全院制度建设； </p>\r\n          </div>\r\n          <div class=\"c1\">\r\n            <h4>基建办</h4>\r\n            <p>负责院级基本建设工程的规划与实施；配合科研与支撑处对全院实验环境的改造和提升；</p>\r\n          </div>\r\n          <div class=\"c1\">\r\n            <h4>核算财务室</h4>\r\n            <p>负责会计核算、组织编制院决算、提供财务分析报告、财务档案管理等工作； </p>\r\n          </div>\r\n          <div class=\"c1\">\r\n            <h4>项目财务室</h4>\r\n            <p>负责科研项目的财务预算审核、过程管理、财务结题；负责派出财务秘书的培养、业务指导和考核； </p>\r\n          </div>\r\n          <div class=\"c1\">\r\n            <h4>运行管理办</h4>\r\n            <p>负责安办秘书处日常工作，牵头落实安办各项安全管理措施、监督落实园区安保管理，协助处理各类公共安全事件；负责院级接待工作；负责院监督管理物业等第三方服务；负责处内相关内务工作； </p>\r\n          </div>\r\n          <div class=\"c1\">\r\n            <h4>资产财务室</h4>\r\n            <p>负责院固定资产的核算和管理；按照财政部和国资委的要求，上报有关固定资产报表；负责政府采购计划执行情况统计和上报； </p>\r\n          </div>\r\n          <div class=\"c1\">\r\n            <h4>综合财务室</h4>\r\n            <p>编制对外预算报表和内部管理预算报表；负责建立健全资源管理体系，做好资源整体调配工作；负责全院资源的分析汇总工作；负责事业法人和税务工作。 </p>\r\n          </div>\r\n        </div>\r\n      </section>', 0, 1, '2020-06-28 16:00:00', '', NULL, 13, 1, 0, 'admin', '2020-06-29 07:38:12', '2020-06-29 08:08:13'),
(18, 'zh-CN', '诺奖、院士双双助阵 50余顶尖脑科学专 家齐聚深圳', '', '/uploads/images/news/pro_01.jpg', NULL, '<p>。。。</p>\r\n', 0, 0, '2020-06-29 16:00:00', '', NULL, 14, 1, 0, 'admin', '2020-06-29 23:45:21', '2020-06-29 23:45:21'),
(19, 'zh-CN', '“第二届非人灵长类神经科学研究国际 研讨会”在深圳先进院举办', '', '/uploads/images/news/pro_02.jpg', NULL, '<p>。。。</p>\r\n', 0, 0, '2020-06-29 16:00:00', '', NULL, 14, 1, 0, 'admin', '2020-06-29 23:45:44', '2020-06-29 23:45:44'),
(20, 'zh-CN', '深港脑科学创新研究院SIAT-UBC院士工 作站正式揭牌成立', '', '/uploads/images/news/pro_03.jpg', NULL, '<p>。。。</p>\r\n', 0, 0, '2020-06-29 16:00:00', '', NULL, 14, 1, 0, 'admin', '2020-06-29 23:46:37', '2020-06-29 23:46:37'),
(21, 'en', '“第二届非人灵长类神经科学研究国际 研讨会”在深圳先进院举办【拷贝】', '', '/uploads/images/news/pro_02.jpg', NULL, '<p>。。。</p>\r\n', 0, 0, '2020-06-29 16:00:00', '', NULL, 14, 1, 0, 'admin', '2020-07-19 14:32:47', '2020-07-19 14:32:54'),
(22, 'en', '深港脑科学创新研究院SIAT-UBC院士工 作站正式揭牌成立【拷贝】', '', '/uploads/images/news/pro_03.jpg', NULL, '<p>。。。</p>\r\n', 0, 0, '2020-06-29 16:00:00', '', NULL, 14, 1, 0, 'admin', '2020-07-19 14:33:02', '2020-07-19 14:33:11'),
(23, 'zh-CN', '深港脑科学创新研究院SIAT-UBC院士工', '', '/uploads/images/news/pro_03.jpg', NULL, '<p>。。。</p>\r\n', 0, 1, '2020-06-29 16:00:00', '', NULL, 16, 1, 1, 'admin', '2020-07-19 14:34:35', '2020-07-30 14:09:39'),
(24, 'en', '深港脑科学创新研究院SIAT-UBC院士工【拷贝】', '', '/uploads/images/news/pro_03.jpg', NULL, '<p>。。。</p>\r\n', 0, 1, '2020-06-29 16:00:00', '', NULL, 16, 1, 1, 'admin', '2020-07-19 14:34:56', '2020-07-30 14:06:23'),
(25, 'en', '惯看秋月春风。一壶浊酒喜相逢【拷贝】', '', '/uploads/images/news/n2.jpg', NULL, '<p>test</p>\r\n', 0, 18, '2020-05-28 16:00:00', '', NULL, 3, 1, 1, 'admin', '2020-07-19 15:08:25', '2020-08-08 19:17:04'),
(26, 'en', 'SCIENTISTS DESIGN NOVEL ALGORITHMIC...【拷贝】', 'Researchers from the Shenzhen Institutes of Advanced Technology (SIAT) of the Chinese Academy of Sciences designed a novel combined machine learning and deep learning framework ...', '/uploads/images/news/n2.jpg', NULL, '<p>CNC machining is a computer numerical control machining. It is a subtractive manufacturing procedure where a variety of tools directed by a computer is used to systemically remove raw materials till a final product or production part is made. CNC machining processes specialized digital design models to manufacture high-quality prototypes, tool molds and production arts. CNC machining can also be employed in pressure die casting or plastic injection molding services. CNC machining takes a number of forms, and CNC milling and turning are two of the more common CNC techniques in the industry.</p>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/temp/blog_body_1.jpg\" /></figure>\r\n\r\n<p>CNC Machining is one of the most effective means for rapid prototyping. The process allows you to take advantage of the computer numerical control to deliver high-quality prototypes in the quickest turnaround period. Here are some more reasons why CNC machining should one your preferred technique for making rapid prototypes of your design.</p>\r\n\r\n<h4>1. Speed</h4>\r\n\r\n<p>CNC Machines have greatly improved since their inception in 1970s. The addition of computerized controls to these numerical control machines has greatly accelerated the capacity of CNC machines to deliver higher quality at improved speeds.</p>\r\n\r\n<p>As rapid prototyping demands genuine models with fast turnaround times, CNC machining is one of the most preferred methods in the industry for obvious reasons. From setup times to actual execution, CNC machines will translate 3-dimensional CAD/CAM models into G-code software and then commence milling to produce the final part in a number of hours.</p>\r\n\r\n<p>The automation of the CNC milling technique also means there is limited human interaction and almost zero downtimes during the production process.</p>\r\n\r\n<h4>2. Tooling &ndash; CNC Machines will run without tooling and dies</h4>\r\n\r\n<p>There is a significant cost associated with the production of dies and molds. For manufacturing techniques like pressure die casting and injection molding, there is usually a need for a rigid die that is mad from steel alloys. These dies can take weeks to manufacture based on complexity of the design and the desired shape. Also, errors in the details in these dies will automatically reflect in the copies produced from them.</p>\r\n\r\n<p>CNC machining on the other hand requires no fixed tooling. The process on its own only requires a CAD/CAM design, a computer software and some metal cutting inserts to execute a production. Because of this, CNC machining is considerably faster, cost-efficient and possibly more accurate for rapid prototyping.</p>\r\n\r\n<h4>3. Accuracy and Precision</h4>\r\n\r\n<p>The level of accuracy and precision of CNC machines is unmatched by any other manufacturing process in the industry. In modern production hubs, the computerized numerical control is the most effective way of achieving the highest level of accuracy with tolerances in the neighborhood of 0.05mm give or take.</p>\r\n\r\n<p>The accuracy of CNC machines is also highly scalable and repeatable, which guarantees that all the prototypes to be produced with look and work exactly alike. The tolerances attainable when using CNC machines is so accurate that it will fit for virtually all the commercial applications it may be employed for.</p>\r\n\r\n<h4>4. Control and Modifications</h4>\r\n\r\n<p>By simply altering a few lines in the software program, an entire manufacturing process can be modified to match new specifications in a number of seconds. The G-code program allows for very interacting and controlled prototyping, where multiple design iterations may be run by simply refining and tweaking certain specifications without additional cost. This is a great advantage over conventional manufacturing and prototyping techniques where modifications may require new dies or expensive modifications to existing ones</p>\r\n\r\n<h4>5. Material Variety</h4>\r\n\r\n<p>CNC machines are for the most part unselective machines. This means that they will cut and mill any type of material being used for production as long as the material is strong enough not to deform under pressure.</p>\r\n\r\n<p>CNC machining is suitable for rapid prototyping as it offers many developers and engineers to run multiple prototypes of their part from a wide array of materials. This way, the same design and prototypes can be made from several materials to evaluate the option with the best-fit mechanical, functional and physical property for its end use. With only small modifications to the feed parameters and running speed, the same design can be run across several materials to get the perfect prototype and ideal product.</p>\r\n\r\n<h4>Premium Part CNC Machining Services in China</h4>\r\n\r\n<p>At Premium Part, we offer high-quality CNC machining services that are optimized for the production of many precision parts. Our expertise range across a number of services and we can generate exceptional quality products with quick turnaround. We can work with an extensive range of materials and produce both mass manufacture volumes and low-volume manufacturing. From CNC machining to 3D printing and rapid injection molding, our engineers are highly experienced to deliver best-in-class manufacturing quality and standards.</p>\r\n', 0, 13, '2020-04-07 16:00:00', 'DR.Shuguan Yuan', NULL, 3, 1, 1, 'admin', '2020-07-19 15:14:48', '2020-07-30 10:37:27'),
(27, 'zh-CN', '深港脑科学创新研究院SIAT-UBC院士工【拷贝】', '', '/uploads/images/news/pro_03.jpg', NULL, '<p>。。。</p>\r\n', 0, 0, '2020-06-29 16:00:00', '', NULL, 16, 1, 1, 'admin', '2020-07-19 15:38:07', '2020-07-30 14:05:51'),
(28, 'en', '深港脑科学创新研究院SIAT-UBC院士工【拷贝】【拷贝】', '', '/uploads/images/news/pro_03.jpg', NULL, '<p>。。。</p>\r\n', 0, 0, '2020-06-29 16:00:00', '', NULL, 16, 1, 1, 'admin', '2020-07-19 15:38:13', '2020-07-30 14:06:21'),
(29, 'zh-CN', '美味，如何让我们快速获得满足感？【拷贝】', '', '/uploads/images/news/se_01.jpg', NULL, '<p>test</p>\r\n', 0, 2, '2020-06-26 16:00:00', 'doubletong', '17|18', 2, 1, 0, 'admin', '2020-07-19 16:37:34', '2020-08-09 10:46:17'),
(30, 'en', '美味，如何让我们快速获得满足感？【拷贝】', '', '/uploads/images/news/se_01.jpg', NULL, '<p>test</p>\r\n', 0, 15, '2020-06-26 16:00:00', 'doubletong', NULL, 2, 1, 0, 'admin', '2020-07-19 16:37:37', '2020-08-09 13:24:36'),
(31, 'en', '美味，如何让我们快速获得满足感？【拷贝】', '', '/uploads/images/news/se_01.jpg', NULL, '<p>test</p>\r\n', 0, 3, '2020-06-26 16:00:00', 'doubletong', NULL, 2, 1, 0, 'admin', '2020-07-19 16:37:39', '2020-08-09 09:54:10'),
(32, 'en', '美味，如何让我们快速获得满足感？【拷贝】【拷贝】', '', '/uploads/images/news/se_01.jpg', NULL, '<p>test</p>\r\n', 0, 5, '2020-06-26 16:00:00', 'doubletong', NULL, 2, 1, 0, 'admin', '2020-07-19 16:37:41', '2020-08-09 09:55:33'),
(33, 'en', '惯看秋月春风。一壶浊酒喜相逢', '', '/uploads/images/news/n2.jpg', NULL, '<section class=\"s1 container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">综合事务部</h2>\r\n</div>\r\n\r\n<p>简称&ldquo;公财处&rdquo;，Department of Administration and Finance，由文秘办、运行管理办、基建办、核算财务室、项目财务室、资产财务室、综合财务室组成。为院理事会、院安委会秘书处。</p>\r\n\r\n<p>负责院公共资源及财务资产规划；负责公共关系的维护及重要来访接待、行政资源的管理与保障、公共事务的服务与安全管理、公文规范管理与机要保密，园区公共设施基本建设；负责财务规划、过程管理与监管、预决算、固定资产安全。负责根据国家、中科院和地方政府有关政策制定和完善我院相关制度。完成领导交办的其他任务。</p>\r\n</section>\r\n\r\n<section class=\"s2\">\r\n<div class=\"container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">公共事务与财务资产处</h2>\r\n</div>\r\n\r\n<div class=\"c1\">\r\n<h4>文秘办</h4>\r\n\r\n<p>负责院领导秘书工作；协调组织理事会、务虚会、院长办公会、院务会、院长接待日等院级会议；负责文书流转及档案管理；机要保密；院务会议决策事务督办；负责全院印章、资质文件管理；牵头全院制度建设；</p>\r\n</div>\r\n\r\n<div class=\"c1\">\r\n<h4>基建办</h4>\r\n\r\n<p>负责院级基本建设工程的规划与实施；配合科研与支撑处对全院实验环境的改造和提升；</p>\r\n</div>\r\n\r\n<div class=\"c1\">\r\n<h4>核算财务室</h4>\r\n\r\n<p>负责会计核算、组织编制院决算、提供财务分析报告、财务档案管理等工作；</p>\r\n</div>\r\n\r\n<div class=\"c1\">\r\n<h4>项目财务室</h4>\r\n\r\n<p>负责科研项目的财务预算审核、过程管理、财务结题；负责派出财务秘书的培养、业务指导和考核；</p>\r\n</div>\r\n\r\n<div class=\"c1\">\r\n<h4>运行管理办</h4>\r\n\r\n<p>负责安办秘书处日常工作，牵头落实安办各项安全管理措施、监督落实园区安保管理，协助处理各类公共安全事件；负责院级接待工作；负责院监督管理物业等第三方服务；负责处内相关内务工作；</p>\r\n</div>\r\n\r\n<div class=\"c1\">\r\n<h4>资产财务室</h4>\r\n\r\n<p>负责院固定资产的核算和管理；按照财政部和国资委的要求，上报有关固定资产报表；负责政府采购计划执行情况统计和上报；</p>\r\n</div>\r\n\r\n<div class=\"c1\">\r\n<h4>综合财务室</h4>\r\n\r\n<p>编制对外预算报表和内部管理预算报表；负责建立健全资源管理体系，做好资源整体调配工作；负责全院资源的分析汇总工作；负责事业法人和税务工作。</p>\r\n</div>\r\n</div>\r\n</section>\r\n', 0, 19, '2020-05-28 16:00:00', '', NULL, 13, 1, 1, 'admin', '2020-07-19 18:17:01', '2020-08-09 03:37:33'),
(34, 'en', '国际合作基因—MIT麦戈文脑研究所建设发展历程【拷贝】', '', '/uploads/images/news/coo_01.jpg', NULL, '<p>test</p>\r\n', 0, 0, '2020-06-26 16:00:00', '', NULL, 10, 1, 0, 'admin', '2020-07-20 00:26:17', '2020-07-20 00:26:28'),
(35, 'en', '国际合作基因—MIT麦戈文脑研究所建设发展历程【拷贝】', '', '/uploads/images/news/coo_01.jpg', NULL, '<p>test</p>\r\n', 0, 0, '2020-06-26 16:00:00', '', NULL, 10, 1, 0, 'admin', '2020-07-20 00:43:18', '2020-07-20 00:44:25'),
(36, 'en', '国际合作基因—MIT麦戈文脑研究所建设发展历程【拷贝】', '', '/uploads/images/news/coo_01.jpg', NULL, '<p>test</p>\r\n', 0, 1, '2020-06-26 16:00:00', '', NULL, 12, 1, 0, 'admin', '2020-07-20 00:43:24', '2020-08-08 19:21:45'),
(37, 'en', ' 积极吸引国际创新资源汇聚深圳：与Broad研究所签署合作备忘录', '', '/uploads/images/news/coo_02.jpg', NULL, '', 0, 4, '2020-06-26 16:00:00', '', NULL, 11, 1, 0, 'admin', '2020-07-20 00:43:26', '2020-08-08 19:21:36'),
(38, 'en', '公共技术服务平台【拷贝】', '', '', NULL, '<p>...</p>\r\n', 0, 3, '2020-06-28 16:00:00', '', NULL, 13, 1, 0, 'admin', '2020-07-20 00:43:27', '2020-08-09 03:37:43'),
(39, 'en', '国际合作基因—MIT麦戈文脑研究所建设发展历', '', '/uploads/images/news/coo_01.jpg', NULL, '<p>test</p>\r\n', 0, 0, '2020-06-26 16:00:00', '', NULL, 8, 1, 0, 'admin', '2020-07-20 00:49:22', '2020-07-20 00:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_news_categories`
--

CREATE TABLE `qnz_news_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` json DEFAULT NULL,
  `title_tmp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_news_categories`
--

INSERT INTO `qnz_news_categories` (`id`, `title`, `title_tmp`, `description`, `importance`, `active`, `added_by`, `parent`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"新闻动态en\", \"zh-CN\": \"新闻动态\"}', '新闻动态', NULL, 0, 1, 'admin', NULL, '2020-04-08 01:46:47', '2020-08-08 18:12:25'),
(2, '{\"en\": \"科普en\", \"zh-CN\": \"科普\"}', '科普', NULL, 0, 1, 'admin', NULL, '2020-05-12 00:59:00', '2020-08-08 18:22:57'),
(3, '{\"en\": \"头条要闻en\", \"zh-CN\": \"头条要闻\"}', '头条要闻', NULL, 0, 1, 'admin', 1, '2020-06-27 03:28:37', '2020-08-08 18:21:02'),
(4, '{\"en\": \"科研进展en\", \"zh-CN\": \"科研进展\"}', '科研进展', NULL, 0, 1, 'admin', 1, '2020-06-27 03:28:48', '2020-08-08 18:21:38'),
(5, '{\"en\": \"学术活动en\", \"zh-CN\": \"学术活动\"}', '学术活动', NULL, 0, 1, 'admin', 1, '2020-06-27 03:28:59', '2020-08-08 18:21:58'),
(6, '{\"en\": \"综合新闻en\", \"zh-CN\": \"综合新闻\"}', '综合新闻', NULL, 0, 1, 'admin', 1, '2020-06-27 03:29:07', '2020-08-08 18:22:17'),
(7, '{\"en\": \"媒体聚焦en\", \"zh-CN\": \"媒体聚焦\"}', '媒体聚焦', NULL, 0, 1, 'admin', 1, '2020-06-27 03:29:13', '2020-08-08 18:22:40'),
(8, '{\"en\": \"党建文化en\", \"zh-CN\": \"党建文化\"}', '党建文化', NULL, 0, 1, 'admin', NULL, '2020-06-27 03:30:26', '2020-08-08 18:23:16'),
(9, '{\"en\": \"合作交流en\", \"zh-CN\": \"合作交流\"}', '合作交流', NULL, 0, 1, 'admin', NULL, '2020-06-27 04:29:15', '2020-08-08 18:23:45'),
(10, '{\"en\": \"国际合作en\", \"zh-CN\": \"国际合作\"}', '国际合作', NULL, 0, 1, 'admin', 9, '2020-06-27 04:29:39', '2020-08-08 18:24:08'),
(11, '{\"en\": \"国内合作en\", \"zh-CN\": \"国内合作\"}', '国内合作', NULL, 0, 1, 'admin', 9, '2020-06-27 04:29:44', '2020-08-08 18:24:31'),
(12, '{\"en\": \"合作项目en\", \"zh-CN\": \"合作项目\"}', '合作项目', NULL, 0, 1, 'admin', 9, '2020-06-27 04:29:52', '2020-08-08 18:24:56'),
(13, '{\"en\": \"科研支撑en\", \"zh-CN\": \"科研支撑\"}', '科研支撑', NULL, 0, 1, 'admin', NULL, '2020-06-29 07:33:01', '2020-08-08 18:25:22'),
(14, '{\"en\": \"科研项目en\", \"zh-CN\": \"科研项目\"}', '科研项目', NULL, 0, 1, 'admin', NULL, '2020-06-29 23:42:34', '2020-08-08 18:25:45'),
(15, '{\"en\": \"通知公告en\", \"zh-CN\": \"通知公告\"}', '通知公告', NULL, 0, 1, 'admin', NULL, '2020-07-12 10:17:09', '2020-08-08 18:26:10'),
(16, '{\"en\": \"招生信息en\", \"zh-CN\": \"招生信息\"}', '招生信息', NULL, 0, 1, 'admin', 15, '2020-07-12 10:18:09', '2020-08-08 18:26:28'),
(17, '{\"en\": \"联合培养en\", \"zh-CN\": \"联合培养\"}', '联合培养', NULL, 0, 1, 'admin', 15, '2020-07-12 10:18:22', '2020-08-08 18:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_offers`
--

CREATE TABLE `qnz_offers` (
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
-- Dumping data for table `qnz_offers`
--

INSERT INTO `qnz_offers` (`id`, `name`, `schools`, `scholarship`, `thumbnail`, `image_url`, `dictionary_id`, `importance`, `active`, `recommend`, `created_by`, `created_at`, `updated_at`) VALUES
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
-- Table structure for table `qnz_options`
--

CREATE TABLE `qnz_options` (
  `config_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `config_values` json DEFAULT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_options`
--

INSERT INTO `qnz_options` (`config_name`, `config_values`, `added_by`, `created_at`, `updated_at`) VALUES
('site_info', '{\"logo\": \"/uploads/images/logo_white.png\", \"email\": \"info@siat.ac.cn\", \"phone\": \"\", \"theme\": \"black\", \"address\": \"深圳市南山区西丽深圳大学学苑大道1068号 \", \"company\": \"中国科学深圳先进技术研究院\", \"hremail\": \"hr@nanlite.com\", \"hrphone\": \"0754-85350187\", \"hotPhone\": \"\", \"postcode\": \"518055\", \"sitename\": \"深港脑院\", \"hrcontact\": \"余小姐\", \"webnumber\": \"粤ICP备09184136号-3\", \"enableCaching\": \"0\"}', 'admin', '2020-03-21 16:00:00', '2020-08-08 17:05:21'),
('site_info_en', '{\"logo\": \"/uploads/images/logo_white.png\", \"email\": \"info@siat.ac.cn\", \"phone\": \"\", \"theme\": \"black\", \"address\": \"深圳市南山区西丽深圳大学学苑大道1068号 \", \"company\": \"中国科学深圳先进技术研究院en\", \"hremail\": \"\", \"hrphone\": \"\", \"hotPhone\": \"\", \"postcode\": \"518055\", \"sitename\": \"深港脑院en\", \"hrcontact\": \"\", \"webnumber\": \"粤ICP备09184136号-3\", \"enableCaching\": \"0\"}', 'admin', '2020-08-08 17:13:26', '2020-08-08 17:15:53'),
('smtp', '{\"host\": \"smtp.qq.com\", \"port\": \"465\", \"password\": \"xcpzxryvkyegbiag\", \"username\": \"13212847@qq.com\", \"SMTPSecure\": \"1\", \"email_contact\": \"183506403@qq.com\"}', 'admin', '2020-03-21 16:00:00', '2020-04-20 17:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_organizations`
--

CREATE TABLE `qnz_organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qnz_pages`
--

CREATE TABLE `qnz_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'zh-CN',
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `background_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `view_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `importance` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_pages`
--

INSERT INTO `qnz_pages` (`id`, `lang`, `title`, `alias`, `background_image`, `view_count`, `content`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'zh-CN', '院况简介', 'about', '', 258, '<div class=\"page page-about\">\r\n<section class=\"section container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">院况简介</h2>\r\n</div>\r\n\r\n<div class=\"intro wow fadeInUp\">\r\n<p>深港脑科学创新研究院面对国家推动粤港澳大湾区国际科技产业创新中心建设的战略；需求，充分发挥深圳、香港两地人才、教育、资源优势，结合脑科学与类脑智能领域的国际前沿，以创新驱动发展为指引，以&ldquo;国际资源汇聚&rdquo;、&ldquo;重点领域突破&rdquo;和&ldquo;全球科技开放&rdquo;为建设原则，依托深圳先进技术研究院，与香港科技大学牵头建设，联合南方科技大学、深圳大学、北京大学深圳研究生院等深港脑科学领域的优势研究机构合作共建，开放融合。</p>\r\n</div>\r\n\r\n<div class=\"intro2 wow fadeInUp\">\r\n<figure class=\"pic\"><img alt=\"\" src=\"/assets/img/about_01.png\" /></figure>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-lg-auto order-lg-last\"><img alt=\"\" class=\"img01\" src=\"/assets/img/about_02.jpg\" /></div>\r\n\r\n<div class=\"col-lg\">\r\n<p class=\"des\">深港脑科学创新研究院围绕脑认知及脑疾病的神经机制这一核心问题，在&ldquo;认知的神经基础&rdquo;、&ldquo;重大脑疾病机理&rdquo;、&ldquo;重大脑疾病诊疗策略&rdquo;和&ldquo;脑科学研究新技术方法&rdquo;四个重点领域开展研究，为深圳脑科学科技设施、粤港澳脑与类脑智能、生物医药、生命健康与医疗器械研发等领域原始创新和产业升级聚集智力、聚集技术、聚集国际创新资源，并通过探索体制创新，助力构建&ldquo;基础研究 + 技术攻关 + 成果产业化 + 科技金融&rdquo; 的全过程创新生态链。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class=\"section container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">建设定位</h2>\r\n</div>\r\n\r\n<div class=\"intro wow fadeInUp\">\r\n<p>面对国家和地方科技发展的重大战略需求，在深圳市的支持下建设成为具有全球影响力、在国内有不可或缺学术地位的脑科学研究基地，成为国家脑科学发展南方布局的重要载体，以及人才培养和产业化基地。</p>\r\n</div>\r\n</section>\r\n\r\n<section class=\"s1 section\" style=\"background-image:url(/assets/img/about_03.jpg)\">\r\n<div class=\"container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">总体目标</h2>\r\n</div>\r\n\r\n<p class=\"p1 wow fadeInUp\">以脑科学与脑疾病领域国际前沿科学问题为创新驱动力，通过对国际前沿生物技术的开发和跨物种研究，产生一系列有国际影响力、原创性的科技成果，为深圳脑科学基础设施、深圳实验室建设和国家实验室建设汇集高端人才，支撑脑科学领域原始创新。</p>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md\">\r\n<div class=\"item\">\r\n<div class=\"num wow fadeInUp\">1<small>个</small></div>\r\n\r\n<h3 class=\"wow fadeInUp\">创新焦点</h3>\r\n\r\n<p class=\"wow fadeInUp\">将深港脑院建设成为：&ldquo;一个创新焦点&rdquo;，国际创新资源汇聚的焦点。充分发挥深港在脑科学领域的优势资源，进一步吸引国际高端创新人才和国际前沿技术，使深港脑院成为国际脑科学领域创新资源汇聚的焦点之一。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"item\">\r\n<div class=\"num wow fadeInUp\">2<small>个</small></div>\r\n\r\n<h3 class=\"wow fadeInUp\">创新引擎</h3>\r\n\r\n<p class=\"wow fadeInUp\">&ldquo;两个创新引擎&rdquo;，国际学术引领的创新引擎、粤港澳科技产业引领的创新引擎。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"item\">\r\n<div class=\"num wow fadeInUp\">5<small>个</small></div>\r\n\r\n<h3 class=\"wow fadeInUp\">能力提升</h3>\r\n\r\n<p class=\"wow fadeInUp\">助力深圳实现&ldquo;五个能力提升&rdquo;：完善深圳市涵盖脑科学基础和转化研究的科研设施平台建设和团队建设；提升深港脑科学、脑技术、脑疾病研究领域源头创新能力、提升人才培养能力、提升产业推动能力、提升科研支撑能力、提升战略咨询能力，为粤港澳生物医药、人工智能领域创新驱动发展做出实质性贡献。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class=\"s2 section\">\r\n<div class=\"container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">研究方向</h2>\r\n</div>\r\n\r\n<p class=\"p1 wow fadeInUp\">结合脑科学研究的国际前沿，国家推动粤港澳大湾区建设的战略需求，以及国家脑科学重大项目拟定布局方向，通过深圳、香港研究团队的深度融合，深港脑院以认知和脑疾病的为核心，在&ldquo;认知的神经基础&rdquo;&ldquo;重大脑疾病机理&rdquo;&ldquo;重大脑疾病诊疗策略&rdquo;和&ldquo;脑科学研究新技术方法&rdquo;四个重点领域开展研究。</p>\r\n\r\n<div class=\"row no-gutters\">\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item\">\r\n<div class=\"bg\">1</div>\r\n\r\n<h3 class=\"wow fadeInUp\">认知的神经基础</h3>\r\n\r\n<p class=\"wow fadeInUp\">重点针对本能行为、情绪情感、注意、社会行为、学习记忆等脑功能，以及与脑疾病相关的认知障碍的发生机制。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item item1\">\r\n<div class=\"bg\">2</div>\r\n\r\n<h3 class=\"wow fadeInUp\">重大脑疾病的机理研究</h3>\r\n\r\n<p class=\"wow fadeInUp\">重点针对阿尔茨海默症、自闭症、情绪障碍、成瘾、脑卒中、睡眠障碍等神经精神疾病，揭示疾病发生发展的病理生理学机制和治疗新靶点等。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item\">\r\n<div class=\"bg\">3</div>\r\n\r\n<h3 class=\"wow fadeInUp\">重大脑疾病的诊疗手段</h3>\r\n\r\n<p class=\"wow fadeInUp\">建立脑疾病的生物标志物、认知功能的定量检测指标、功能和结构脑成像的影像指标、脑疾病个性化诊断、评估和治疗等；研发可用于针对脑疾病的有效预防、干预手段。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item item1\">\r\n<div class=\"bg\">4</div>\r\n\r\n<h3 class=\"wow fadeInUp\">脑科学研究新技术和新方法</h3>\r\n\r\n<p class=\"wow fadeInUp\">围绕脑疾病机理和诊疗技术需求，在解析特定脑区的细胞图谱、分子图谱和介观尺度结构与功能图谱等领域布局新技术研发。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n</div>\r\n', 500, 1, 'admin', '2020-03-17 02:01:12', '2020-08-09 06:59:17'),
(2, 'zh-CN', '404错误页', 'nofound', '', 2362, '<p><img alt=\"\" src=\"/uploads/images/pages/404.svg\" /></p>\r\n', 0, 1, 'admin', '2020-03-17 03:51:04', '2020-08-09 13:29:13'),
(3, 'zh-CN', '科研项目', 'projects', '/uploads/images/pages/banner-application.jpg', 72, '<div class=\"s1 section container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-auto\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/research_03.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg\">\r\n<div class=\"row justify-content-between\">\r\n<div class=\"col-auto\">\r\n<div class=\"val\">\r\n<div class=\"num\">190</div>\r\n\r\n<div class=\"unit\">余项</div>\r\n</div>\r\n\r\n<div class=\"t\">国家省部地方各级项目</div>\r\n</div>\r\n\r\n<div class=\"col-auto\">\r\n<div class=\"val\">\r\n<div class=\"num\">2.5</div>\r\n\r\n<div class=\"unit\">亿元</div>\r\n</div>\r\n\r\n<div class=\"t\">项目资金共</div>\r\n</div>\r\n</div>\r\n\r\n<p>国自然重大研究计划重点项目、国自然重点、国自然杰青、国自然优青、国自然重点国别合作、国家重点研发计划、中科院国际大科学计划培育项目、中科院先导 B 课题、中科院百人计划、广东省创新团队、广东省重点实验室、深圳市孔雀团队、深圳市学科建设等重点重大项目。</p>\r\n</div>\r\n</div>\r\n</div>\r\n', 470, 1, 'admin', '2020-04-20 01:27:42', '2020-08-09 02:02:05'),
(5, 'zh-CN', '人才概览', 'team', '/uploads/images/pages/banner_03.jpg', 111, '<div class=\"page page-team container\">\r\n<div class=\"s1 section\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">汇聚英才，招贤纳士</h2>\r\n</div>\r\n\r\n<p class=\"p1 text-center\">脑院秉承&ldquo;近者悦，远者来&rdquo;：引进比自己学术能力强、威望高、影响力大的人才；帮扶年轻人尽快腾飞。各核心研究方向研究队伍进一步壮大、优化。</p>\r\n\r\n<div class=\"person\">\r\n<div class=\"row\">\r\n<div class=\"col\">\r\n<div class=\"val\">\r\n<div class=\"num\">183</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">全职员工</div>\r\n</div>\r\n\r\n<div class=\"col\">\r\n<div class=\"val\">\r\n<div class=\"num\">92</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">学生</div>\r\n</div>\r\n\r\n<div class=\"col\">\r\n<div class=\"val\">\r\n<div class=\"num\">275</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">总人数</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"personodd\">\r\n<div class=\"row no-gutters\">\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item itemodd\">\r\n<div class=\"val\">\r\n<div class=\"num\">41</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">高级职称以上</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">18</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">正研究员</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item itemodd\">\r\n<div class=\"val\">\r\n<div class=\"num\">20</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">副研究员</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">2</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">正高级工程师</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row no-gutters\">\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">1</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">高级工程师</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item itemodd\">\r\n<div class=\"val\">\r\n<div class=\"num\">71</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">中级员工</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">73</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">初级员工</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item itemodd\">\r\n<div class=\"val\">\r\n<div class=\"num\">91</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">博士以上学历</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 450, 1, 'admin', '2020-05-29 14:54:27', '2020-08-09 03:16:47'),
(6, 'zh-CN', '院士', 'academician', '/uploads/images/pages/banner_02.jpg', 21, '<div class=\"page page-academician container\">\r\n<div class=\"s1 section\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-auto\">\r\n<div class=\"pic\"><img alt=\"厄温 · 内尔教授\" src=\"/assets/img/team_02.png\" /></div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"txt\">\r\n<h3 class=\"title\">厄温 &middot; 内尔教授</h3>\r\n\r\n<p>深圳内尔神经可塑性诺奖实验室，实验室主任诺贝尔奖获得者</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"bg\"><img alt=\"\" src=\"/assets/img/team_03.png\" /></div>\r\n</div>\r\n</div>\r\n', 440, 1, 'admin', '2020-05-29 15:06:12', '2020-07-30 15:43:07'),
(7, 'zh-CN', '脑设施', 'facilities', '/uploads/images/pages/banner_01.jpg', 20, '<div class=\"page page-facilities container\">\r\n<section class=\"s1\">\r\n<p>脑设施以服务粤港澳国际科技创新中心建设为指针，围绕解决重大脑疾病发生和干预的神经机制及诊疗策略的核心问题的实际需求。</p>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/platform_02.jpg\" /></figure>\r\n\r\n<p>通过建立标准化、规模化的脑疾病基因编辑动物制备平台，精准化、系统化的脑结构和功能解析平台和智能化、协同化的脑数据采集和模拟平台，加速重大脑疾病神经机制解析和诊疗策略研发的迭代周期，开展基于跨物种、多层次、全尺度对脑疾病致病因素的鉴定和功能表型解析，及定量、精准和可视化的神经调控干预。努力将脑解析和脑模拟设施建设成为立足粤港澳，服务国内、国际脑功能、脑疾病、类脑智能与脑技术开发、基础与应用转化研究提供资源共享的设施群，通过实现科技平台资源共享，推动我国脑疾病诊断治疗技术、脑认知与类脑智能基础理论以及脑科学研究技术领域实现跨越式发展。</p>\r\n\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/platform_03.jpg\" />\r\n<div class=\"des\">设施分为三个模块开展建设，包括脑解析模块、脑编辑模块和脑模拟模块。三个模块分别包括数个实验平台，在实现各自模块核心功能的同时，模块之间实现功能相互支撑与密切合作，发展出单独模块所不具备的多模式动物同一时空精确解析模拟能力，实现脑科学研究和脑疾病诊疗手段以及药物开发的跨越式发展。</div>\r\n</div>\r\n\r\n<p>（1）脑解析模块：建设动静态结合，以动态为主的脑连接图谱解析平台（包括神经调控下多尺度脑功能图谱研究平台、脑连接图谱示踪平台、脑组织快速三维成像和透射电镜等）；建成从实验动物到人体的多模态成像、基于超声/光感基因的脑神经调控与功能干预设施等新一代科研装备，进而提供脑功能动态解析工具。</p>\r\n\r\n<p>（2）脑编辑模块：建设跨物种模式动物子模块、基因编辑子模块以及动物表型分析子模块三个子模块。其中跨物种模式动物子模块将建设大、小动物模式动物及其他模式动物三个平台；基因编辑子模块将建设核苷酸操作平台、胚胎显微注射平台和标准手术平台；动物表型分析子模块将建设行为分析系统、电生理信息采集分析系统、生理生化分析系统、单细胞分析系统、病理药物毒理分析系统以及特殊实验环境。</p>\r\n\r\n<p>（3）脑模拟模块：建立脑神经信息平台，获取全面和必要的动物生长、生理、行为学及各种脑活动的数据；以此为基础，开展脑模拟科学研究，建立成数个大脑局部功能运作机制的模型，并形成一个大脑功能模型库。在充分理解大脑动态运作机制的情况下，开展类脑计算的研究。设施建设面积约5万平方米，配套研究院建设面积约1.5万平方米。配套设施（专家公寓、学生公寓、餐厅、停车场等）与合成生物学大设施共同建设，两个设施在光明科学城启动区，占地面积约70亩，总建筑面积约23万平方米。建设周期五年（2019-2024）。设备总投资10亿元人民币。</p>\r\n</section>\r\n</div>\r\n', 430, 1, 'admin', '2020-05-29 15:22:43', '2020-07-30 07:03:14'),
(8, 'zh-CN', '研究布局', 'research', '', 61, '<div class=\"page page-research container\">\r\n<div class=\"s1\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item\">\r\n<h3 class=\"title\">学术定位</h3>\r\n\r\n<p>脑认知神经基础；非人灵长类脑疾病动物模型资源库建立；脑疾病机制与治疗新策略研究。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item\">\r\n<h3 class=\"title\">需求牵引</h3>\r\n\r\n<p>脑科学研究新技术、脑疾病诊疗新技术、新药物研发和产业化应用与服务。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-lg\">\r\n<div class=\"item\">\r\n<h3 class=\"title\">学术定位</h3>\r\n\r\n<p>将应用基础研究的研发能力在深圳生根；促进自主创新与国家生物产业需求有机结合；成为国际一流研究机构和生物医药企业共享开放的、有国际影响力的平台；加强技术服务、成果转化、技术转移力度，实现科学前沿对创新驱动发展的实质贡献。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"s2\">\r\n<figure class=\"pic\"><img alt=\"\" src=\"/assets/img/research_04.jpg\" />\r\n<div class=\"item a1\"><img alt=\"\" src=\"/assets/img/icon-video.png\" />\r\n<div class=\"box\"><img alt=\"\" src=\"/assets/img/research_05.png\" />\r\n<div class=\"des\">\r\n<h3 class=\"title\">应用、前沿</h3>\r\n\r\n<p>脑研究新技术：光遗传技术、基因编辑、工具病毒和脑图谱技术等</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"item a2\"><img alt=\"\" src=\"/assets/img/icon-cpu.png\" />\r\n<div class=\"box\"><img alt=\"\" src=\"/assets/img/research_05.png\" />\r\n<div class=\"des\">\r\n<h3 class=\"title\">应用、前沿</h3>\r\n\r\n<p>脑研究新技术：光遗传技术、基因编辑、工具病毒和脑图谱技术等</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"item a3\"><img alt=\"\" src=\"/assets/img/icon-laptop.png\" />\r\n<div class=\"box\"><img alt=\"\" src=\"/assets/img/research_05.png\" />\r\n<div class=\"des\">\r\n<h3 class=\"title\">应用、前沿</h3>\r\n\r\n<p>脑研究新技术：光遗传技术、基因编辑、工具病毒和脑图谱技术等</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"item a4\"><img alt=\"\" src=\"/assets/img/icon-bag.png\" />\r\n<div class=\"box\"><img alt=\"\" src=\"/assets/img/research_05.png\" />\r\n<div class=\"des\">\r\n<h3 class=\"title\">应用、前沿</h3>\r\n\r\n<p>脑研究新技术：光遗传技术、基因编辑、工具病毒和脑图谱技术等</p>\r\n</div>\r\n</div>\r\n</div>\r\n</figure>\r\n</div>\r\n</div>\r\n', 480, 1, 'admin', '2020-05-29 15:35:11', '2020-08-09 06:56:20'),
(9, 'zh-CN', '科研进展', 'evolve', '', 52, '<div class=\"s1 section container\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-md\">\r\n<div class=\"val\">\r\n<div class=\"num\">78</div>\r\n\r\n<div class=\"unit\">篇</div>\r\n</div>\r\n\r\n<div class=\"t\">国际顶级期刊论文</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"val\">\r\n<div class=\"num\">200</div>\r\n\r\n<div class=\"add\">+</div>\r\n\r\n<div class=\"unit\">项</div>\r\n</div>\r\n\r\n<div class=\"t\">申请专利</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"val\">\r\n<div class=\"num\">50</div>\r\n\r\n<div class=\"add\">+</div>\r\n\r\n<div class=\"unit\">项</div>\r\n</div>\r\n\r\n<div class=\"t\">获授权专利</div>\r\n</div>\r\n</div>\r\n\r\n<p>脑院共发表包括Nature、Science、Nature Neuroscience、Neuron、Nature Communications、Neuron、PNAS等国际顶级期刊在内的SCI论文78篇，申请专利两百余项，获授权专利50余项。</p>\r\n\r\n<div class=\"row pics\">\r\n<div class=\"col\"><img alt=\"\" src=\"/assets/img/evolve_01.jpg\" /></div>\r\n\r\n<div class=\"col\"><img alt=\"\" src=\"/assets/img/evolve_02.jpg\" /></div>\r\n\r\n<div class=\"col\"><img alt=\"\" src=\"/assets/img/evolve_03.jpg\" /></div>\r\n</div>\r\n</div>\r\n', 460, 1, 'admin', '2020-05-30 03:27:25', '2020-08-09 08:28:29'),
(10, 'zh-CN', '机构设置', 'institutions', '', 37, '<div class=\"page page-institutions container\">\r\n<section class=\"s1\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">深港脑科学创新研究院（筹）- 组织管理架构（拟）</h2>\r\n</div>\r\n\r\n<figure class=\"pic wow fadeInUp\"><img alt=\"机构\" src=\"/assets/img/about_05.png\" /></figure>\r\n</section>\r\n</div>\r\n', 490, 1, 'admin', '2020-05-30 03:47:46', '2020-08-09 02:23:39'),
(11, 'zh-CN', '教育概况', 'education', '', 34, '<div class=\"page page-education\">\r\n<section class=\"s1 container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">教育概况</h2>\r\n</div>\r\n\r\n<p>脑所于2014年11月16日揭牌筹建，2016年11月19日正式去筹成立，已设有脑功能图谱与行为研究、脑认知与类脑智能研究、神经发育与退行性脑疾病研究、基因编辑脑疾病动物模型研究四个研究中心和一个由诺贝尔奖得主Erwin Neher教授领导的神经可塑性诺奖实验室，即将设立脑疾病基础转化和脑信息研究两个新的研究中心。</p>\r\n\r\n<p>脑所定位于脑认知神经基础、非人灵长类脑疾病动物模型资源库建立及脑疾病机制与治疗新策略研究，以脑科学研究新技术、脑疾病诊疗新技术、新药物研发和产业化应用与服务为需求牵引，将应用基础研究的研发能力在深圳生根，促进自主创新与国家生物产业需求有机结合，成为国际一流研究机构和生物医药企业共享开放的、有国际影响力的平台，加强技术服务、成果转化、技术转移力度，实现科学前沿对创新驱动发展的实质贡献。</p>\r\n</section>\r\n\r\n<section class=\"s2\">\r\n<div class=\"pic wow fadeInUp\"><img alt=\"\" src=\"/assets/img/e_02.jpg\" /></div>\r\n\r\n<div class=\"container\">\r\n<div class=\"c1 wow fadeInUp\">\r\n<div class=\"txt\">\r\n<p>脑所致力于培养一流的具有学科交叉背景的学者；一流高技术含量的领军人才和具有高尚人格和理想的社会栋梁。目前拥有神经生物学二级学科博士授权点（2014年）、生物化学与分子生物学二级学科博士授权点（2014年）、生物学一级学科博士授权点（2018年）、生物学一级学科博士后流动站（2019年）；硕士招生专业有神经生物学、生物化学与分子生物学、细胞生物学、发育生物学四个学术型硕士授权点以及生物工程专业学位硕士授权点。</p>\r\n\r\n<p>脑所开设有面向硕博生的共享课程；同时，结合国际科研前沿和交叉领域，积极引进海外一流导师师资，开设有科技前沿相关的全英文讲座和研讨课程。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class=\"s3 container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h3>脑所自筹建以来的学生、导师数据</h3>\r\n</div>\r\n\r\n<div class=\"row wow fadeInUp\">\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">150</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">累计培养学术</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">94</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">目前培养学生</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">21</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">博士生</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">65</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">硕士生</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">8</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">本科生</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">30</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">全时研究生导师</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">21</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">博士生导师</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">76</div>\r\n\r\n<div class=\"unit\">%</div>\r\n</div>\r\n\r\n<div class=\"t\">境外留学和工作经历</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n</div>\r\n', 420, 1, 'admin', '2020-06-24 10:26:43', '2020-08-08 16:48:26'),
(12, 'zh-CN', '学科方向', 'orientation', '', 46, '<div class=\"page page-orientation\">\r\n<section class=\"s1 container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">学科方向</h2>\r\n</div>\r\n\r\n<p>脑所学科培养点以建设国际一流学科为目标，国际一流标准为牵引，力争优化学科结构，推动生物学学科快速发展和人才培养；发挥多学科优势，深化学科交叉融合，构建理工医协调发展的学科体系；围绕学科前沿和国家重大战略，全面提升学科核心竞争力和影响力。</p>\r\n\r\n<p>脑所围绕生物学一级科点发展，经过四年多积累，聚集培养了包括教育部长江特聘教授、国家杰出青年基金获得者、中组部青年千人等优秀人才的科技创新团队。2014年，中国科学院深圳先进院获批神经生物学和生物化学与分子生物学2个二级学科博士点，经过逐步积累，到2018年申请获批了生物学一级学科博士点。本学科在2016年获批深圳市神经科学学科建设项目，强有力的促进了优势学科发展。学科重点依托凝聚以下研究室/所方向力量开展建设。依托学科点发展，脑所学科建设重点围绕以下三个方向布局：</p>\r\n</section>\r\n\r\n<section class=\"s2 container\">\r\n<div class=\"box\">\r\n<div class=\"num\">1</div>\r\n\r\n<h3 class=\"title\">神经脑认知与脑疾病方向</h3>\r\n\r\n<p>脑认知与脑疾病方向综合细胞分子、环路、系统、行为、转化等多层次的研究，探索生物智能的发生机理，解析脑疾病机制，开发脑疾病诊疗新技术和新策略。研究包括：通过跨物种、神经生物学与人工智能学科交叉研究，系统地解析视觉认知、情感、社会认知、记忆、以及本能行为的神经机制，理解中枢对骨骼、代谢、内分泌、消化等外周系统调控机制；开展针对人类自闭症、脑中风、药物成瘾、PD、AD等重大脑疾病的跨物种研究，解析脑疾病机理，探索疾病生物标记物、药物作用新靶点，与医疗机构合作，开发疾病诊疗新技术；理解人类高级认知功能如语言、阅读等行为规律和神经基础等。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"num\">2</div>\r\n\r\n<h3 class=\"title\">发育的多系统交叉关联研究方向</h3>\r\n\r\n<p>发育的多系统交叉关联研究方向通过多学科交叉方式基于遗传学、分子生物学、生物化学、细胞生物学、胚胎学等学科的研究方法和研究成果，建立比较完善系统的发育生物学研究手段。学科点着重研究神经发育、免疫发育和身体其他器官发生发展中的各个变化的分子遗传基础，相关基因调控过程，以求较为详尽解释神经发育与身体各个系统发育过程中的交互作用的变化的原因机制。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"num\">3</div>\r\n\r\n<h3 class=\"title\">信号转导与细胞遗传工程方向</h3>\r\n\r\n<p>本方向是研究细胞的分化、发育及功能等相关的信号转导机制，以及使用遗传工程方法研究疾病状态下细胞功能的变化机制及可能的干预策略。</p>\r\n</div>\r\n</section>\r\n</div>\r\n', 410, 1, 'admin', '2020-06-24 10:31:30', '2020-07-29 01:57:26'),
(13, 'zh-CN', '联系我们', 'education_contact', '', 6, '<div class=\"page page-edu-contact\">\r\n<section class=\"s1 container\">\r\n<div class=\"title-section\">\r\n<h2 class=\"text-center\">联系方式</h2>\r\n</div>\r\n\r\n<p>咨询热线：88888888</p>\r\n</section>\r\n</div>\r\n', 380, 1, 'admin', '2020-06-24 10:47:56', '2020-07-19 18:40:27'),
(14, 'zh-CN', '脑所分团委', 'committee', '', 7, '<div class=\"page page-culture-detail\">\r\n<section class=\"s1 container\">\r\n<div class=\"title-section\">\r\n<h3 class=\"text-center\">中国共产主义青年团中国科学院深圳先进技术研究院脑认知与脑疾病研究所支部委员会</h3>\r\n</div>\r\n\r\n<div class=\"article\">\r\n<p>中国共产主义青年团中国科学院深圳先进技术研究院脑认知与脑疾病研究所支部委员会（简称：脑所分团委），于2019年1月15日成立，同时经过脑所全体团员选举产生了1位书记，2位副书记，2名委员。团支部现有团干5名，团员62名，自成立以来，青年团员们同心协力，积极进取，无论在思想道德修养，还是组织建设上，都表现优秀。在开展的各种主题教育团日活动，主题演讲时，都积极参与并志愿组织活动，为团干部分忧解难，积极表达自己的看法和发表意见，为脑所分团委的建设，献出自己的一份力量。</p>\r\n\r\n<p>在组织建设上，脑所分团委积极配合深圳先进院团委做好团员团干信息化工作，管理并利用好广东省&ldquo;智慧团建&rdquo;系统，在系统上完成了团员团干入录，团组织转接等工作，并在每个月初，完成团费缴纳工作，自愿缴纳团费人数比例为100%，每月完成团委缴纳人数比例为100%。在今年，因一位团干已毕业，脑所分团委及时增补了一位团干，保证团委工作的正常进行。</p>\r\n\r\n<p>在思想建设上，脑所分团委组织了&ldquo;我与祖国共奋进&mdash;&mdash;国旗下的演讲&rdquo;特别主题团日活动、&ldquo;奋斗的青春最美丽&rdquo;主题报告会、邀请校友来我院进行主题演讲等活动，得到了广大青年团员的喜欢，同时促进了团员之间的交流，激发青年团员的爱国精神，通过认真倾听校友的演讲，充分学习他们的精神和创业经历，培养他们的创新创业精神。</p>\r\n\r\n<p>希望在青年团员的监督，青年团干的管理下，脑所分团委会越来越好，做一个能够聆听团员心声，关心青年成长的优秀基层组织。</p>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/culture_01.jpg\" />\r\n<figcaption>2019.1.15脑所分团委成立及团干部的选举</figcaption>\r\n</figure>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/culture_02.jpg\" />\r\n<figcaption>2019.05.04收看纪念五四运动100周年大会直播现场</figcaption>\r\n</figure>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/culture_03.jpg\" />\r\n<figcaption>2019.10.14&ldquo;我与祖国共奋进&mdash;&mdash;国旗下的演讲&rdquo;特别主题团日活动</figcaption>\r\n</figure>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/culture_04.jpg\" />\r\n<figcaption>2019.11.25广州华南农业大学进行一次科学调研与交流合作以及参观爱国主义教育基地黄埔军校活动</figcaption>\r\n</figure>\r\n</div>\r\n</section>\r\n</div>\r\n', 360, 1, 'admin', '2020-06-24 14:06:33', '2020-07-20 00:54:36'),
(15, 'zh-CN', '创新文化', 'innovation', '', 8, '<div class=\"page page-culture-detail\">\r\n<section class=\"s1 container\">\r\n<div class=\"title-section\">\r\n<h3 class=\"text-center\">创新文化</h3>\r\n</div>\r\n\r\n<div class=\"article\">\r\n<p>待建中...</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</section>\r\n</div>\r\n', 350, 1, 'admin', '2020-06-24 14:07:54', '2020-07-20 01:00:27'),
(16, 'zh-CN', '联系我们', 'contact', '', 16, '<section class=\"s1 container\">\r\n            <div class=\"baidumap wow fadeInUp\" id=\"baidumap\">&nbsp;</div>\r\n        </section>\r\n    \r\n        <section class=\"s2 container\">\r\n            <div class=\"row\">\r\n                <div class=\"col-md\">\r\n                    <ul>\r\n                        <li><i class=\"iconfont icon-marker\"> </i>地址：深圳市南山区西丽深圳大学城学苑大道1068号</li>\r\n                        <li><i class=\"iconfont icon-youbian\"> </i>邮编：518055</li>\r\n                        <li><i class=\"iconfont icon-email\"> </i>电子邮件：bcbdihr@gmail.com</li>\r\n                    </ul>\r\n                </div>\r\n    \r\n                <div class=\"col-md-auto\">\r\n                    <div class=\"icon\"><img alt=\"\" src=\"/assets/img/qrcode.png\" /></div>\r\n    \r\n                    <div class=\"wechat\">微信公众号</div>\r\n                </div>\r\n            </div>\r\n        </section>', 340, 1, 'admin', '2020-06-24 14:38:05', '2020-08-09 07:27:56'),
(17, 'zh-CN', '招生信息', 'admissions', '', 12, '<div class=\"title-section wow fadeInUp\">\r\n        <h2 class=\"text-center\">招生信息</h2>\r\n      </div>\r\n      <p>热忱欢迎广大考生报考中国科学院大学深圳先进技术研究院脑认知与脑疾病研究所硕士研究生和博士研究生，此外，我们常年招聘客座（本科生、研究生、博士生），欢迎持续关注网站信息！</p>\r\n      <p class=\"note\">招生简章详见：http://www.siat.cas.cn/yjsjy2016/zsjs2016/</p>\r\n      <figure><img src=\"/assets/img/e_03.jpg\" alt=\"\"></figure>', 400, 1, 'admin', '2020-06-24 15:54:37', '2020-07-30 15:43:15'),
(18, 'zh-CN', '联合培养', 'training', '', 10, '<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">联合培养</h2>\r\n</div>\r\n\r\n<p>依托先进院，脑所积极拓展教育资源，目前已与加拿大不列颠哥伦比亚大学、香港科技大学、香港城市大学、中国科学技术大学等高校建立了共同招生、联合培养研究生计划。</p>\r\n\r\n<ol>\r\n	<li>申请中科院深圳先进院／香港科技大学研究生项目（神经科学方向）,入围后，在香港科技大学接受研究生课程教育；根据研究方向的实际需要，在深圳BCBDI和／或MIT或其他国际合作实验室接受科研训练，授予香港科技大学学位。</li>\r\n	<li>申请中国科学院深圳先进院/澳门大学联合培养博士生计划，授予澳门大学学位。</li>\r\n	<li>申请中科院深圳先进院脑所与加拿大哥伦比亚大学（UBC）联合培养学生计划，授予UBC学位。</li>\r\n	<li>申请报考中国科学院大学（国科大）研究生：深圳先进技术研究院神经生物学专业，生物化学与分子生物学专业等；脑所导师均可以在上述学科招生。学生于国科大（北京）接受研究生课程教育；根据研究方向的实际需要，在深圳BCBDI和／或MIT或其他国际合作实验室接受科研训练。</li>\r\n	<li>申请中国科技大学生命科学院，我们每一年可以在中科大招收数量有限的研究生。在中科大上学位课，根据研究方向的实际需要，在深圳BCBDI和／或MIT或其他国际合作实验室接受科研训练，授予中科大学位。</li>\r\n</ol>\r\n', 390, 1, 'admin', '2020-06-24 15:57:35', '2020-07-30 15:43:16'),
(19, 'zh-CN', '脑所党支部', 'culture', '', 15, '<div class=\"s1 section container\">\r\n<div class=\"title-section\">\r\n<h2 class=\"text-center\">脑所党支部</h2>\r\n</div>\r\n\r\n<p>2016年4月19日，脑所党支部在联系委员许建国院长的见证下正式成立，成立之初有正式党员12人，选举产生第一届支委：书记王立平、宣传委员刘雪梅、组织纪律委员孟珍。</p>\r\n\r\n<p>脑所是先进院2014年11月筹建的第6个研究所，2016年11月正式去筹，2018年作为牵头单位获批建设深港脑科学创新研究院以及&ldquo;脑解析与脑模拟&rdquo;重大科技基础设施。当前，脑所面临新的机遇与新的挑战，为了进一步促进党建工作和科研工作的有机结合，充分发挥脑所党组织的战斗堡垒和党员的先锋模范带头作用，保障脑所的各项工作在党的领导下高效、科学、均衡的发展，脑所根据先进院党委的部署要求，在原党支部的基础上成立脑所党总支。总支书记王立平、总支宣传委员刘雪梅、总支组织纪律委员邓春山。</p>\r\n\r\n<p>脑所截止2019年12月共有党员77名，其中副研以上党员17人，根据部门分成2个支部，脑所第一党支部，由脑图谱中心与院办组成，共45人，一支部书记李翔、宣传委员任真、组织纪律委员刘畅；脑所第二党支部由脑智能中心、脑疾病中心、脑编辑中心以及诺奖实验室组成，共30人，二支部书记邓春山、宣传委员陈攀、组织纪律委员柏艳阳。</p>\r\n</div>\r\n', 370, 1, 'admin', '2020-06-27 09:23:30', '2020-07-20 00:45:36'),
(20, 'en', 'Company Profile', 'about', '', 27, '<div class=\"page page-about\">\r\n<section class=\"section container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">院况简介</h2>\r\n</div>\r\n\r\n<div class=\"intro wow fadeInUp\">\r\n<p>深港脑科学创新研究院面对国家推动粤港澳大湾区国际科技产业创新中心建设的战略；需求，充分发挥深圳、香港两地人才、教育、资源优势，结合脑科学与类脑智能领域的国际前沿，以创新驱动发展为指引，以&ldquo;国际资源汇聚&rdquo;、&ldquo;重点领域突破&rdquo;和&ldquo;全球科技开放&rdquo;为建设原则，依托深圳先进技术研究院，与香港科技大学牵头建设，联合南方科技大学、深圳大学、北京大学深圳研究生院等深港脑科学领域的优势研究机构合作共建，开放融合。</p>\r\n</div>\r\n\r\n<div class=\"intro2 wow fadeInUp\">\r\n<figure class=\"pic\"><img alt=\"\" src=\"/assets/img/about_01.png\" /></figure>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-lg-auto order-lg-last\"><img alt=\"\" class=\"img01\" src=\"/assets/img/about_02.jpg\" /></div>\r\n\r\n<div class=\"col-lg\">\r\n<p class=\"des\">深港脑科学创新研究院围绕脑认知及脑疾病的神经机制这一核心问题，在&ldquo;认知的神经基础&rdquo;、&ldquo;重大脑疾病机理&rdquo;、&ldquo;重大脑疾病诊疗策略&rdquo;和&ldquo;脑科学研究新技术方法&rdquo;四个重点领域开展研究，为深圳脑科学科技设施、粤港澳脑与类脑智能、生物医药、生命健康与医疗器械研发等领域原始创新和产业升级聚集智力、聚集技术、聚集国际创新资源，并通过探索体制创新，助力构建&ldquo;基础研究 + 技术攻关 + 成果产业化 + 科技金融&rdquo; 的全过程创新生态链。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class=\"section container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">建设定位</h2>\r\n</div>\r\n\r\n<div class=\"intro wow fadeInUp\">\r\n<p>面对国家和地方科技发展的重大战略需求，在深圳市的支持下建设成为具有全球影响力、在国内有不可或缺学术地位的脑科学研究基地，成为国家脑科学发展南方布局的重要载体，以及人才培养和产业化基地。</p>\r\n</div>\r\n</section>\r\n\r\n<section class=\"s1 section\" style=\"background-image:url(/assets/img/about_03.jpg)\">\r\n<div class=\"container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">总体目标</h2>\r\n</div>\r\n\r\n<p class=\"p1 wow fadeInUp\">以脑科学与脑疾病领域国际前沿科学问题为创新驱动力，通过对国际前沿生物技术的开发和跨物种研究，产生一系列有国际影响力、原创性的科技成果，为深圳脑科学基础设施、深圳实验室建设和国家实验室建设汇集高端人才，支撑脑科学领域原始创新。</p>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-md\">\r\n<div class=\"item\">\r\n<div class=\"num wow fadeInUp\">1<small>个</small></div>\r\n\r\n<h3 class=\"wow fadeInUp\">创新焦点</h3>\r\n\r\n<p class=\"wow fadeInUp\">将深港脑院建设成为：&ldquo;一个创新焦点&rdquo;，国际创新资源汇聚的焦点。充分发挥深港在脑科学领域的优势资源，进一步吸引国际高端创新人才和国际前沿技术，使深港脑院成为国际脑科学领域创新资源汇聚的焦点之一。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"item\">\r\n<div class=\"num wow fadeInUp\">2<small>个</small></div>\r\n\r\n<h3 class=\"wow fadeInUp\">创新引擎</h3>\r\n\r\n<p class=\"wow fadeInUp\">&ldquo;两个创新引擎&rdquo;，国际学术引领的创新引擎、粤港澳科技产业引领的创新引擎。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"item\">\r\n<div class=\"num wow fadeInUp\">5<small>个</small></div>\r\n\r\n<h3 class=\"wow fadeInUp\">能力提升</h3>\r\n\r\n<p class=\"wow fadeInUp\">助力深圳实现&ldquo;五个能力提升&rdquo;：完善深圳市涵盖脑科学基础和转化研究的科研设施平台建设和团队建设；提升深港脑科学、脑技术、脑疾病研究领域源头创新能力、提升人才培养能力、提升产业推动能力、提升科研支撑能力、提升战略咨询能力，为粤港澳生物医药、人工智能领域创新驱动发展做出实质性贡献。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class=\"s2 section\">\r\n<div class=\"container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">研究方向</h2>\r\n</div>\r\n\r\n<p class=\"p1 wow fadeInUp\">结合脑科学研究的国际前沿，国家推动粤港澳大湾区建设的战略需求，以及国家脑科学重大项目拟定布局方向，通过深圳、香港研究团队的深度融合，深港脑院以认知和脑疾病的为核心，在&ldquo;认知的神经基础&rdquo;&ldquo;重大脑疾病机理&rdquo;&ldquo;重大脑疾病诊疗策略&rdquo;和&ldquo;脑科学研究新技术方法&rdquo;四个重点领域开展研究。</p>\r\n\r\n<div class=\"row no-gutters\">\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item\">\r\n<div class=\"bg\">1</div>\r\n\r\n<h3 class=\"wow fadeInUp\">认知的神经基础</h3>\r\n\r\n<p class=\"wow fadeInUp\">重点针对本能行为、情绪情感、注意、社会行为、学习记忆等脑功能，以及与脑疾病相关的认知障碍的发生机制。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item item1\">\r\n<div class=\"bg\">2</div>\r\n\r\n<h3 class=\"wow fadeInUp\">重大脑疾病的机理研究</h3>\r\n\r\n<p class=\"wow fadeInUp\">重点针对阿尔茨海默症、自闭症、情绪障碍、成瘾、脑卒中、睡眠障碍等神经精神疾病，揭示疾病发生发展的病理生理学机制和治疗新靶点等。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item\">\r\n<div class=\"bg\">3</div>\r\n\r\n<h3 class=\"wow fadeInUp\">重大脑疾病的诊疗手段</h3>\r\n\r\n<p class=\"wow fadeInUp\">建立脑疾病的生物标志物、认知功能的定量检测指标、功能和结构脑成像的影像指标、脑疾病个性化诊断、评估和治疗等；研发可用于针对脑疾病的有效预防、干预手段。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item item1\">\r\n<div class=\"bg\">4</div>\r\n\r\n<h3 class=\"wow fadeInUp\">脑科学研究新技术和新方法</h3>\r\n\r\n<p class=\"wow fadeInUp\">围绕脑疾病机理和诊疗技术需求，在解析特定脑区的细胞图谱、分子图谱和介观尺度结构与功能图谱等领域布局新技术研发。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n</div>\r\n', 500, 1, 'admin', '2020-06-29 02:53:10', '2020-08-09 09:56:30'),
(21, 'en', '机构设置', 'institutions', '', 3, '<div class=\"page page-institutions container\">\r\n<section class=\"s1\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">深港脑科学创新研究院（筹）- 组织管理架构（拟）</h2>\r\n</div>\r\n\r\n<figure class=\"pic wow fadeInUp\"><img alt=\"机构\" src=\"/assets/img/about_05.png\" /></figure>\r\n</section>\r\n</div>\r\n', 490, 1, 'admin', '2020-07-19 13:58:14', '2020-08-09 03:03:46'),
(22, 'en', '研究布局', 'research', '', 25, '<div class=\"page page-research container\">\r\n<div class=\"s1\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item\">\r\n<h3 class=\"title\">学术定位</h3>\r\n\r\n<p>脑认知神经基础；非人灵长类脑疾病动物模型资源库建立；脑疾病机制与治疗新策略研究。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-6 col-lg\">\r\n<div class=\"item\">\r\n<h3 class=\"title\">需求牵引</h3>\r\n\r\n<p>脑科学研究新技术、脑疾病诊疗新技术、新药物研发和产业化应用与服务。</p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-md-12 col-lg\">\r\n<div class=\"item\">\r\n<h3 class=\"title\">学术定位</h3>\r\n\r\n<p>将应用基础研究的研发能力在深圳生根；促进自主创新与国家生物产业需求有机结合；成为国际一流研究机构和生物医药企业共享开放的、有国际影响力的平台；加强技术服务、成果转化、技术转移力度，实现科学前沿对创新驱动发展的实质贡献。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"s2\">\r\n<figure class=\"pic\"><img alt=\"\" src=\"/assets/img/research_04.jpg\" />\r\n<div class=\"item a1\"><img alt=\"\" src=\"/assets/img/icon-video.png\" />\r\n<div class=\"box\"><img alt=\"\" src=\"/assets/img/research_05.png\" />\r\n<div class=\"des\">\r\n<h3 class=\"title\">应用、前沿</h3>\r\n\r\n<p>脑研究新技术：光遗传技术、基因编辑、工具病毒和脑图谱技术等</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"item a2\"><img alt=\"\" src=\"/assets/img/icon-cpu.png\" />\r\n<div class=\"box\"><img alt=\"\" src=\"/assets/img/research_05.png\" />\r\n<div class=\"des\">\r\n<h3 class=\"title\">应用、前沿</h3>\r\n\r\n<p>脑研究新技术：光遗传技术、基因编辑、工具病毒和脑图谱技术等</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"item a3\"><img alt=\"\" src=\"/assets/img/icon-laptop.png\" />\r\n<div class=\"box\"><img alt=\"\" src=\"/assets/img/research_05.png\" />\r\n<div class=\"des\">\r\n<h3 class=\"title\">应用、前沿</h3>\r\n\r\n<p>脑研究新技术：光遗传技术、基因编辑、工具病毒和脑图谱技术等</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"item a4\"><img alt=\"\" src=\"/assets/img/icon-bag.png\" />\r\n<div class=\"box\"><img alt=\"\" src=\"/assets/img/research_05.png\" />\r\n<div class=\"des\">\r\n<h3 class=\"title\">应用、前沿</h3>\r\n\r\n<p>脑研究新技术：光遗传技术、基因编辑、工具病毒和脑图谱技术等</p>\r\n</div>\r\n</div>\r\n</div>\r\n</figure>\r\n</div>\r\n</div>\r\n', 480, 1, 'admin', '2020-07-19 14:04:30', '2020-08-09 08:28:38'),
(23, 'en', '科研项目', 'projects', '', 11, '<div class=\"s1 section container\">\r\n<div class=\"row\">\r\n<div class=\"col-lg-auto\">\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/research_03.jpg\" /></div>\r\n</div>\r\n\r\n<div class=\"col-lg\">\r\n<div class=\"row justify-content-between\">\r\n<div class=\"col-auto\">\r\n<div class=\"val\">\r\n<div class=\"num\">190</div>\r\n\r\n<div class=\"unit\">余项</div>\r\n</div>\r\n\r\n<div class=\"t\">国家省部地方各级项目</div>\r\n</div>\r\n\r\n<div class=\"col-auto\">\r\n<div class=\"val\">\r\n<div class=\"num\">2.5</div>\r\n\r\n<div class=\"unit\">亿元</div>\r\n</div>\r\n\r\n<div class=\"t\">项目资金共</div>\r\n</div>\r\n</div>\r\n\r\n<p>国自然重大研究计划重点项目、国自然重点、国自然杰青、国自然优青、国自然重点国别合作、国家重点研发计划、中科院国际大科学计划培育项目、中科院先导 B 课题、中科院百人计划、广东省创新团队、广东省重点实验室、深圳市孔雀团队、深圳市学科建设等重点重大项目。</p>\r\n</div>\r\n</div>\r\n</div>\r\n', 470, 1, 'admin', '2020-07-19 14:31:51', '2020-08-09 08:28:27'),
(24, 'en', '人才概览', 'team', '', 22, '<div class=\"page page-team container\">\r\n<div class=\"s1 section\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">汇聚英才，招贤纳士</h2>\r\n</div>\r\n\r\n<p class=\"p1 text-center\">脑院秉承&ldquo;近者悦，远者来&rdquo;：引进比自己学术能力强、威望高、影响力大的人才；帮扶年轻人尽快腾飞。各核心研究方向研究队伍进一步壮大、优化。</p>\r\n\r\n<div class=\"person\">\r\n<div class=\"row\">\r\n<div class=\"col\">\r\n<div class=\"val\">\r\n<div class=\"num\">183</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">全职员工</div>\r\n</div>\r\n\r\n<div class=\"col\">\r\n<div class=\"val\">\r\n<div class=\"num\">92</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">学生</div>\r\n</div>\r\n\r\n<div class=\"col\">\r\n<div class=\"val\">\r\n<div class=\"num\">275</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">总人数</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"personodd\">\r\n<div class=\"row no-gutters\">\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item itemodd\">\r\n<div class=\"val\">\r\n<div class=\"num\">41</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">高级职称以上</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">18</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">正研究员</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item itemodd\">\r\n<div class=\"val\">\r\n<div class=\"num\">20</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">副研究员</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">2</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">正高级工程师</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"row no-gutters\">\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">1</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">高级工程师</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item itemodd\">\r\n<div class=\"val\">\r\n<div class=\"num\">71</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">中级员工</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">73</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">初级员工</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"item itemodd\">\r\n<div class=\"val\">\r\n<div class=\"num\">91</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">博士以上学历</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', 450, 1, 'admin', '2020-07-19 17:11:17', '2020-08-09 09:56:24'),
(25, 'en', '院士', 'academician', '', 8, '<div class=\"page page-academician container\">\r\n<div class=\"s1 section\">\r\n<div class=\"row align-items-center\">\r\n<div class=\"col-md-auto\">\r\n<div class=\"pic\"><img alt=\"厄温 · 内尔教授\" src=\"/assets/img/team_02.png\" /></div>\r\n</div>\r\n\r\n<div class=\"col-md\">\r\n<div class=\"txt\">\r\n<h3 class=\"title\">厄温 &middot; 内尔教授</h3>\r\n\r\n<p>深圳内尔神经可塑性诺奖实验室，实验室主任诺贝尔奖获得者</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"bg\"><img alt=\"\" src=\"/assets/img/team_03.png\" /></div>\r\n</div>\r\n</div>\r\n', 440, 1, 'admin', '2020-07-19 17:15:50', '2020-08-09 03:16:18'),
(26, 'en', '脑设施', 'facilities', '', 14, '<div class=\"page page-facilities container\">\r\n<section class=\"s1\">\r\n<p>脑设施以服务粤港澳国际科技创新中心建设为指针，围绕解决重大脑疾病发生和干预的神经机制及诊疗策略的核心问题的实际需求。</p>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/platform_02.jpg\" /></figure>\r\n\r\n<p>通过建立标准化、规模化的脑疾病基因编辑动物制备平台，精准化、系统化的脑结构和功能解析平台和智能化、协同化的脑数据采集和模拟平台，加速重大脑疾病神经机制解析和诊疗策略研发的迭代周期，开展基于跨物种、多层次、全尺度对脑疾病致病因素的鉴定和功能表型解析，及定量、精准和可视化的神经调控干预。努力将脑解析和脑模拟设施建设成为立足粤港澳，服务国内、国际脑功能、脑疾病、类脑智能与脑技术开发、基础与应用转化研究提供资源共享的设施群，通过实现科技平台资源共享，推动我国脑疾病诊断治疗技术、脑认知与类脑智能基础理论以及脑科学研究技术领域实现跨越式发展。</p>\r\n\r\n<div class=\"pic\"><img alt=\"\" src=\"/assets/img/platform_03.jpg\" />\r\n<div class=\"des\">设施分为三个模块开展建设，包括脑解析模块、脑编辑模块和脑模拟模块。三个模块分别包括数个实验平台，在实现各自模块核心功能的同时，模块之间实现功能相互支撑与密切合作，发展出单独模块所不具备的多模式动物同一时空精确解析模拟能力，实现脑科学研究和脑疾病诊疗手段以及药物开发的跨越式发展。</div>\r\n</div>\r\n\r\n<p>（1）脑解析模块：建设动静态结合，以动态为主的脑连接图谱解析平台（包括神经调控下多尺度脑功能图谱研究平台、脑连接图谱示踪平台、脑组织快速三维成像和透射电镜等）；建成从实验动物到人体的多模态成像、基于超声/光感基因的脑神经调控与功能干预设施等新一代科研装备，进而提供脑功能动态解析工具。</p>\r\n\r\n<p>（2）脑编辑模块：建设跨物种模式动物子模块、基因编辑子模块以及动物表型分析子模块三个子模块。其中跨物种模式动物子模块将建设大、小动物模式动物及其他模式动物三个平台；基因编辑子模块将建设核苷酸操作平台、胚胎显微注射平台和标准手术平台；动物表型分析子模块将建设行为分析系统、电生理信息采集分析系统、生理生化分析系统、单细胞分析系统、病理药物毒理分析系统以及特殊实验环境。</p>\r\n\r\n<p>（3）脑模拟模块：建立脑神经信息平台，获取全面和必要的动物生长、生理、行为学及各种脑活动的数据；以此为基础，开展脑模拟科学研究，建立成数个大脑局部功能运作机制的模型，并形成一个大脑功能模型库。在充分理解大脑动态运作机制的情况下，开展类脑计算的研究。设施建设面积约5万平方米，配套研究院建设面积约1.5万平方米。配套设施（专家公寓、学生公寓、餐厅、停车场等）与合成生物学大设施共同建设，两个设施在光明科学城启动区，占地面积约70亩，总建筑面积约23万平方米。建设周期五年（2019-2024）。设备总投资10亿元人民币。</p>\r\n</section>\r\n</div>\r\n', 430, 1, 'admin', '2020-07-19 18:06:13', '2020-08-09 03:39:46'),
(27, 'en', '教育概况', 'education', '', 14, '<div class=\"page page-education\">\r\n<section class=\"s1 container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">教育概况</h2>\r\n</div>\r\n\r\n<p>脑所于2014年11月16日揭牌筹建，2016年11月19日正式去筹成立，已设有脑功能图谱与行为研究、脑认知与类脑智能研究、神经发育与退行性脑疾病研究、基因编辑脑疾病动物模型研究四个研究中心和一个由诺贝尔奖得主Erwin Neher教授领导的神经可塑性诺奖实验室，即将设立脑疾病基础转化和脑信息研究两个新的研究中心。</p>\r\n\r\n<p>脑所定位于脑认知神经基础、非人灵长类脑疾病动物模型资源库建立及脑疾病机制与治疗新策略研究，以脑科学研究新技术、脑疾病诊疗新技术、新药物研发和产业化应用与服务为需求牵引，将应用基础研究的研发能力在深圳生根，促进自主创新与国家生物产业需求有机结合，成为国际一流研究机构和生物医药企业共享开放的、有国际影响力的平台，加强技术服务、成果转化、技术转移力度，实现科学前沿对创新驱动发展的实质贡献。</p>\r\n</section>\r\n\r\n<section class=\"s2\">\r\n<div class=\"pic wow fadeInUp\"><img alt=\"\" src=\"/assets/img/e_02.jpg\" /></div>\r\n\r\n<div class=\"container\">\r\n<div class=\"c1 wow fadeInUp\">\r\n<div class=\"txt\">\r\n<p>脑所致力于培养一流的具有学科交叉背景的学者；一流高技术含量的领军人才和具有高尚人格和理想的社会栋梁。目前拥有神经生物学二级学科博士授权点（2014年）、生物化学与分子生物学二级学科博士授权点（2014年）、生物学一级学科博士授权点（2018年）、生物学一级学科博士后流动站（2019年）；硕士招生专业有神经生物学、生物化学与分子生物学、细胞生物学、发育生物学四个学术型硕士授权点以及生物工程专业学位硕士授权点。</p>\r\n\r\n<p>脑所开设有面向硕博生的共享课程；同时，结合国际科研前沿和交叉领域，积极引进海外一流导师师资，开设有科技前沿相关的全英文讲座和研讨课程。</p>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class=\"s3 container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h3>脑所自筹建以来的学生、导师数据</h3>\r\n</div>\r\n\r\n<div class=\"row wow fadeInUp\">\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">150</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">累计培养学术</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">94</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">目前培养学生</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">21</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">博士生</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">65</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">硕士生</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">8</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">本科生</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">30</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">全时研究生导师</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">21</div>\r\n\r\n<div class=\"unit\">人</div>\r\n</div>\r\n\r\n<div class=\"t\">博士生导师</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md-4 col-lg-3\">\r\n<div class=\"item\">\r\n<div class=\"val\">\r\n<div class=\"num\">76</div>\r\n\r\n<div class=\"unit\">%</div>\r\n</div>\r\n\r\n<div class=\"t\">境外留学和工作经历</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n</div>\r\n', 420, 1, 'admin', '2020-07-19 18:25:24', '2020-08-09 03:41:30'),
(28, 'en', '学科方向', 'orientation', '', 4, '<div class=\"page page-orientation\">\r\n<section class=\"s1 container\">\r\n<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">学科方向</h2>\r\n</div>\r\n\r\n<p>脑所学科培养点以建设国际一流学科为目标，国际一流标准为牵引，力争优化学科结构，推动生物学学科快速发展和人才培养；发挥多学科优势，深化学科交叉融合，构建理工医协调发展的学科体系；围绕学科前沿和国家重大战略，全面提升学科核心竞争力和影响力。</p>\r\n\r\n<p>脑所围绕生物学一级科点发展，经过四年多积累，聚集培养了包括教育部长江特聘教授、国家杰出青年基金获得者、中组部青年千人等优秀人才的科技创新团队。2014年，中国科学院深圳先进院获批神经生物学和生物化学与分子生物学2个二级学科博士点，经过逐步积累，到2018年申请获批了生物学一级学科博士点。本学科在2016年获批深圳市神经科学学科建设项目，强有力的促进了优势学科发展。学科重点依托凝聚以下研究室/所方向力量开展建设。依托学科点发展，脑所学科建设重点围绕以下三个方向布局：</p>\r\n</section>\r\n\r\n<section class=\"s2 container\">\r\n<div class=\"box\">\r\n<div class=\"num\">1</div>\r\n\r\n<h3 class=\"title\">神经脑认知与脑疾病方向</h3>\r\n\r\n<p>脑认知与脑疾病方向综合细胞分子、环路、系统、行为、转化等多层次的研究，探索生物智能的发生机理，解析脑疾病机制，开发脑疾病诊疗新技术和新策略。研究包括：通过跨物种、神经生物学与人工智能学科交叉研究，系统地解析视觉认知、情感、社会认知、记忆、以及本能行为的神经机制，理解中枢对骨骼、代谢、内分泌、消化等外周系统调控机制；开展针对人类自闭症、脑中风、药物成瘾、PD、AD等重大脑疾病的跨物种研究，解析脑疾病机理，探索疾病生物标记物、药物作用新靶点，与医疗机构合作，开发疾病诊疗新技术；理解人类高级认知功能如语言、阅读等行为规律和神经基础等。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"num\">2</div>\r\n\r\n<h3 class=\"title\">发育的多系统交叉关联研究方向</h3>\r\n\r\n<p>发育的多系统交叉关联研究方向通过多学科交叉方式基于遗传学、分子生物学、生物化学、细胞生物学、胚胎学等学科的研究方法和研究成果，建立比较完善系统的发育生物学研究手段。学科点着重研究神经发育、免疫发育和身体其他器官发生发展中的各个变化的分子遗传基础，相关基因调控过程，以求较为详尽解释神经发育与身体各个系统发育过程中的交互作用的变化的原因机制。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<div class=\"num\">3</div>\r\n\r\n<h3 class=\"title\">信号转导与细胞遗传工程方向</h3>\r\n\r\n<p>本方向是研究细胞的分化、发育及功能等相关的信号转导机制，以及使用遗传工程方法研究疾病状态下细胞功能的变化机制及可能的干预策略。</p>\r\n</div>\r\n</section>\r\n</div>\r\n', 410, 1, 'admin', '2020-07-19 18:29:01', '2020-08-09 03:41:43'),
(29, 'en', '招生信息', 'admissions', '', 5, '<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">招生信息</h2>\r\n</div>\r\n\r\n<p>热忱欢迎广大考生报考中国科学院大学深圳先进技术研究院脑认知与脑疾病研究所硕士研究生和博士研究生，此外，我们常年招聘客座（本科生、研究生、博士生），欢迎持续关注网站信息！</p>\r\n\r\n<p class=\"note\">招生简章详见：http://www.siat.cas.cn/yjsjy2016/zsjs2016/</p>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/e_03.jpg\" /></figure>\r\n', 400, 1, 'admin', '2020-07-19 18:32:13', '2020-08-09 03:41:48'),
(30, 'en', '联合培养', 'training', '', 5, '<div class=\"title-section wow fadeInUp\">\r\n<h2 class=\"text-center\">联合培养</h2>\r\n</div>\r\n\r\n<p>依托先进院，脑所积极拓展教育资源，目前已与加拿大不列颠哥伦比亚大学、香港科技大学、香港城市大学、中国科学技术大学等高校建立了共同招生、联合培养研究生计划。</p>\r\n\r\n<ol>\r\n	<li>申请中科院深圳先进院／香港科技大学研究生项目（神经科学方向）,入围后，在香港科技大学接受研究生课程教育；根据研究方向的实际需要，在深圳BCBDI和／或MIT或其他国际合作实验室接受科研训练，授予香港科技大学学位。</li>\r\n	<li>申请中国科学院深圳先进院/澳门大学联合培养博士生计划，授予澳门大学学位。</li>\r\n	<li>申请中科院深圳先进院脑所与加拿大哥伦比亚大学（UBC）联合培养学生计划，授予UBC学位。</li>\r\n	<li>申请报考中国科学院大学（国科大）研究生：深圳先进技术研究院神经生物学专业，生物化学与分子生物学专业等；脑所导师均可以在上述学科招生。学生于国科大（北京）接受研究生课程教育；根据研究方向的实际需要，在深圳BCBDI和／或MIT或其他国际合作实验室接受科研训练。</li>\r\n	<li>申请中国科技大学生命科学院，我们每一年可以在中科大招收数量有限的研究生。在中科大上学位课，根据研究方向的实际需要，在深圳BCBDI和／或MIT或其他国际合作实验室接受科研训练，授予中科大学位。</li>\r\n</ol>\r\n', 390, 1, 'admin', '2020-07-19 18:38:19', '2020-08-09 03:47:08'),
(31, 'en', 'Contact Us', 'education_contact', '', 3, '<div class=\"page page-edu-contact\">\r\n<section class=\"s1 container\">\r\n<div class=\"title-section\">\r\n<h2 class=\"text-center\">联系方式</h2>\r\n</div>\r\n\r\n<p>咨询热线：88888888</p>\r\n</section>\r\n</div>\r\n', 380, 1, 'admin', '2020-07-19 18:43:01', '2020-08-09 03:47:25'),
(32, 'en', '脑所党支部', 'culture', '', 7, '<div class=\"s1 section container\">\r\n<div class=\"title-section\">\r\n<h2 class=\"text-center\">脑所党支部</h2>\r\n</div>\r\n\r\n<p>2016年4月19日，脑所党支部在联系委员许建国院长的见证下正式成立，成立之初有正式党员12人，选举产生第一届支委：书记王立平、宣传委员刘雪梅、组织纪律委员孟珍。</p>\r\n\r\n<p>脑所是先进院2014年11月筹建的第6个研究所，2016年11月正式去筹，2018年作为牵头单位获批建设深港脑科学创新研究院以及&ldquo;脑解析与脑模拟&rdquo;重大科技基础设施。当前，脑所面临新的机遇与新的挑战，为了进一步促进党建工作和科研工作的有机结合，充分发挥脑所党组织的战斗堡垒和党员的先锋模范带头作用，保障脑所的各项工作在党的领导下高效、科学、均衡的发展，脑所根据先进院党委的部署要求，在原党支部的基础上成立脑所党总支。总支书记王立平、总支宣传委员刘雪梅、总支组织纪律委员邓春山。</p>\r\n\r\n<p>脑所截止2019年12月共有党员77名，其中副研以上党员17人，根据部门分成2个支部，脑所第一党支部，由脑图谱中心与院办组成，共45人，一支部书记李翔、宣传委员任真、组织纪律委员刘畅；脑所第二党支部由脑智能中心、脑疾病中心、脑编辑中心以及诺奖实验室组成，共30人，二支部书记邓春山、宣传委员陈攀、组织纪律委员柏艳阳。</p>\r\n</div>\r\n', 370, 1, 'admin', '2020-07-20 00:50:48', '2020-08-09 13:22:11'),
(33, 'en', '脑所分团委', 'committee', '', 3, '<div class=\"page page-culture-detail\">\r\n<section class=\"s1 container\">\r\n<div class=\"title-section\">\r\n<h3 class=\"text-center\">中国共产主义青年团中国科学院深圳先进技术研究院脑认知与脑疾病研究所支部委员会</h3>\r\n</div>\r\n\r\n<div class=\"article\">\r\n<p>中国共产主义青年团中国科学院深圳先进技术研究院脑认知与脑疾病研究所支部委员会（简称：脑所分团委），于2019年1月15日成立，同时经过脑所全体团员选举产生了1位书记，2位副书记，2名委员。团支部现有团干5名，团员62名，自成立以来，青年团员们同心协力，积极进取，无论在思想道德修养，还是组织建设上，都表现优秀。在开展的各种主题教育团日活动，主题演讲时，都积极参与并志愿组织活动，为团干部分忧解难，积极表达自己的看法和发表意见，为脑所分团委的建设，献出自己的一份力量。</p>\r\n\r\n<p>在组织建设上，脑所分团委积极配合深圳先进院团委做好团员团干信息化工作，管理并利用好广东省&ldquo;智慧团建&rdquo;系统，在系统上完成了团员团干入录，团组织转接等工作，并在每个月初，完成团费缴纳工作，自愿缴纳团费人数比例为100%，每月完成团委缴纳人数比例为100%。在今年，因一位团干已毕业，脑所分团委及时增补了一位团干，保证团委工作的正常进行。</p>\r\n\r\n<p>在思想建设上，脑所分团委组织了&ldquo;我与祖国共奋进&mdash;&mdash;国旗下的演讲&rdquo;特别主题团日活动、&ldquo;奋斗的青春最美丽&rdquo;主题报告会、邀请校友来我院进行主题演讲等活动，得到了广大青年团员的喜欢，同时促进了团员之间的交流，激发青年团员的爱国精神，通过认真倾听校友的演讲，充分学习他们的精神和创业经历，培养他们的创新创业精神。</p>\r\n\r\n<p>希望在青年团员的监督，青年团干的管理下，脑所分团委会越来越好，做一个能够聆听团员心声，关心青年成长的优秀基层组织。</p>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/culture_01.jpg\" />\r\n<figcaption>2019.1.15脑所分团委成立及团干部的选举</figcaption>\r\n</figure>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/culture_02.jpg\" />\r\n<figcaption>2019.05.04收看纪念五四运动100周年大会直播现场</figcaption>\r\n</figure>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/culture_03.jpg\" />\r\n<figcaption>2019.10.14&ldquo;我与祖国共奋进&mdash;&mdash;国旗下的演讲&rdquo;特别主题团日活动</figcaption>\r\n</figure>\r\n\r\n<figure><img alt=\"\" src=\"/assets/img/culture_04.jpg\" />\r\n<figcaption>2019.11.25广州华南农业大学进行一次科学调研与交流合作以及参观爱国主义教育基地黄埔军校活动</figcaption>\r\n</figure>\r\n</div>\r\n</section>\r\n</div>\r\n', 360, 1, 'admin', '2020-07-20 00:57:37', '2020-08-09 04:16:10'),
(34, 'en', '创新文化', 'innovation', '', 3, '<div class=\"page page-culture-detail\">\r\n<section class=\"s1 container\">\r\n<div class=\"title-section\">\r\n<h3 class=\"text-center\">创新文化</h3>\r\n</div>\r\n\r\n<div class=\"article\">\r\n<p>待建中...</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</section>\r\n</div>\r\n', 350, 1, 'admin', '2020-07-20 01:01:18', '2020-08-09 04:16:07'),
(35, 'en', 'Contact us', 'contact', '', 19, '<section class=\"s1 container\">\r\n<div class=\"baidumap wow fadeInUp\" id=\"baidumap\">&nbsp;</div>\r\n</section>\r\n\r\n<section class=\"s2 container\">\r\n<div class=\"row\">\r\n<div class=\"col-md\">\r\n<ul>\r\n	<li><i class=\"iconfont icon-marker\"> </i>地址：深圳市南山区西丽深圳大学城学苑大道1068号</li>\r\n	<li><i class=\"iconfont icon-youbian\"> </i>邮编：518055</li>\r\n	<li><i class=\"iconfont icon-email\"> </i>电子邮件：bcbdihr@gmail.com</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-md-auto\">\r\n<div class=\"icon\"><img alt=\"\" src=\"/assets/img/qrcode.png\" /></div>\r\n\r\n<div class=\"wechat\">微信公众号</div>\r\n</div>\r\n</div>\r\n</section>\r\n', 340, 1, 'admin', '2020-07-20 01:05:52', '2020-08-09 07:37:03'),
(36, 'en', '科研进展', 'evolve', '', 0, '<div class=\"s1 section container\">\r\n<div class=\"row\">\r\n<div class=\"col-12 col-md\">\r\n<div class=\"val\">\r\n<div class=\"num\">78</div>\r\n\r\n<div class=\"unit\">篇</div>\r\n</div>\r\n\r\n<div class=\"t\">国际顶级期刊论文</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"val\">\r\n<div class=\"num\">200</div>\r\n\r\n<div class=\"add\">+</div>\r\n\r\n<div class=\"unit\">项</div>\r\n</div>\r\n\r\n<div class=\"t\">申请专利</div>\r\n</div>\r\n\r\n<div class=\"col-6 col-md\">\r\n<div class=\"val\">\r\n<div class=\"num\">50</div>\r\n\r\n<div class=\"add\">+</div>\r\n\r\n<div class=\"unit\">项</div>\r\n</div>\r\n\r\n<div class=\"t\">获授权专利</div>\r\n</div>\r\n</div>\r\n\r\n<p>脑院共发表包括Nature、Science、Nature Neuroscience、Neuron、Nature Communications、Neuron、PNAS等国际顶级期刊在内的SCI论文78篇，申请专利两百余项，获授权专利50余项。</p>\r\n\r\n<div class=\"row pics\">\r\n<div class=\"col\"><img alt=\"\" src=\"/assets/img/evolve_01.jpg\" /></div>\r\n\r\n<div class=\"col\"><img alt=\"\" src=\"/assets/img/evolve_02.jpg\" /></div>\r\n\r\n<div class=\"col\"><img alt=\"\" src=\"/assets/img/evolve_03.jpg\" /></div>\r\n</div>\r\n</div>\r\n', 460, 1, 'admin', '2020-07-29 02:56:13', '2020-07-29 02:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_papers`
--

CREATE TABLE `qnz_papers` (
  `id` int(10) UNSIGNED NOT NULL,
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `pubdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `importance` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_papers`
--

INSERT INTO `qnz_papers` (`id`, `thumbnail`, `lang`, `content`, `pubdate`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '/uploads/images/papers/pager_01.png', 'zh-CN', '<p>Kuikui Zhou, Yingjie Zhu*. The paraventricular thalamic nucleus: <a href=\"#\">A key hub of neural</a>circuits underlying drug addiction. Pharmacological Research. 2019,142:70-76.<a href=\"#\">[PDF]</a></p>\r\n', '2020-06-28 16:00:00', 0, 1, 'admin', '2020-06-29 10:03:53', '2020-06-29 10:04:42'),
(2, '/uploads/images/papers/pager_01.png', 'zh-CN', '<p>Kuikui Zhou, Yingjie Zhu*. The paraventricular thalamic nucleus: <a href=\"#\">A key hub of neural</a>circuits underlying drug addiction. Pharmacological Research. 2019,142:70-76.<a href=\"#\">[PDF]</a>123</p>\r\n', '2019-06-28 16:00:00', 0, 1, 'admin', '2020-06-29 10:08:49', '2020-06-29 22:18:34'),
(3, '/uploads/images/papers/pager_01.png', 'zh-CN', '<p>Kuikui Zhou, Yingjie Zhu*. The paraventricular thalamic nucleus: <a href=\"#\">A key hub of neural</a>circuits underlying drug addiction. Pharmacological Research. 2019,142:70-76.<a href=\"#\">[PDF]</a><a href=\"#\">A key hub of neural</a>circuits underlying drug addiction. Pharmacological Research. 2019,142:70-76.<a href=\"#\">[PDF]</a></p>', '2020-06-28 16:00:00', 0, 1, 'admin', '2020-06-29 10:09:11', '2020-06-29 10:10:05'),
(4, '/uploads/images/papers/pager_01.png', 'en', '<p>Kuikui Zhou, Yingjie Zhu*. The paraventricular thalamic nucleus: <a href=\"#\">A key hub of neural</a>circuits underlying drug addiction. Pharmacological Research. 2019,142:70-76.<a href=\"#\">[PDF]</a><a href=\"#\">A key hub of neural</a>circuits underly&nbsp;Pharmacological Research. 2019,142:70-76.<a href=\"#\">[PDF]</a></p>\r\n', '2020-06-28 16:00:00', 0, 1, 'admin', '2020-07-19 16:58:57', '2020-07-19 17:00:08'),
(5, '/uploads/images/papers/pager_01.png', 'en', '<p>Kuikui Zhou, Yingjie Zhu*. The paraventricular thalamic nucleus: <a href=\"#\">A key hub of neural</a>circuits underlying drug addiction. Pharmacological Research. 2019,142:70-76.<a href=\"#\">[PDF]</a><a href=\"#\">A key hub of neural</a>circuits underlying drug addiction. Pharmacological Research. 2019,142:70-76.<a href=\"#\">[PDF]</a></p>\r\n', '2020-06-28 16:00:00', 0, 1, 'admin', '2020-07-19 16:59:18', '2020-07-19 16:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_photos`
--

CREATE TABLE `qnz_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'zh-CN',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(10) UNSIGNED NOT NULL,
  `album_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_photos`
--

INSERT INTO `qnz_photos` (`id`, `lang`, `title`, `image_url`, `description`, `importance`, `album_id`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'zh-CN', '广东省自然科学奖 一等奖（2018）', '/uploads/images/gallery/aw_01.jpg', '', 0, 1, 1, 'admin', '2020-04-16 15:22:45', '2020-06-29 22:45:50'),
(2, 'zh-CN', '广东省自然科学奖 一等奖（2018）', '/uploads/images/gallery/aw_02.jpg', '', 0, 1, 1, 'admin', '2020-04-16 18:58:27', '2020-06-29 22:46:33'),
(3, 'zh-CN', '广东省自然科学奖 一等奖（2017）', '/uploads/images/gallery/aw_03.jpg', '', 0, 1, 1, 'admin', '2020-04-16 19:46:21', '2020-06-29 22:46:53'),
(4, 'en', '被誉为“亚洲四小龙”', '/uploads/images/gallery/aw_02.jpg', '', 0, 1, 1, 'admin', '2020-05-29 16:47:00', '2020-06-29 22:54:50'),
(5, 'en', '世界上最安全的国家之一', '/uploads/images/gallery/aw_03.jpg', '', 0, 1, 1, 'admin', '2020-05-29 16:47:44', '2020-06-29 22:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_products`
--

CREATE TABLE `qnz_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `feature` longtext COLLATE utf8_unicode_ci,
  `reference` longtext COLLATE utf8_unicode_ci,
  `application` longtext COLLATE utf8_unicode_ci,
  `code` longtext COLLATE utf8_unicode_ci,
  `downloads` longtext COLLATE utf8_unicode_ci,
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_products`
--

INSERT INTO `qnz_products` (`id`, `title`, `content`, `feature`, `reference`, `application`, `code`, `downloads`, `thumbnail`, `image_url`, `importance`, `category_id`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(6, 'CNC Metal', '<div class=\"table-container\">\r\n<table class=\"table\">\r\n	<thead>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:#d44038;width:28%;\">Material</th>\r\n			<th style=\"background-color:#000;width:18%;\">Aluminum 1050</th>\r\n			<th style=\"background-color:#000;width:18%;\">Aluminum 1060</th>\r\n			<th style=\"background-color:#000;width:18%;\">Aluminum 2024-T3/T4</th>\r\n			<th style=\"background-color:#000;width:18%;\">Aluminum 5052-H32</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<th rowspan=\"3\" style=\"background-color:#d44038;width:120px;\">Typicsl Phydicsl Propsrtes</th>\r\n			<th style=\"background-color:#d44038;width:120px;\">Elastic Modulus (GPa)</th>\r\n			<td>-</td>\r\n			<td>69</td>\r\n			<td>72.4</td>\r\n			<td>70</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"background-color:#d44038;\">Tensile Strength(MPa)</th>\r\n			<td>35-126</td>\r\n			<td>110-136</td>\r\n			<td>485/470</td>\r\n			<td>230</td>\r\n		</tr>\r\n		<tr>\r\n			<th style=\"background-color:#d44038;\">Yeild Strenght(Mpa)</th>\r\n			<td>75</td>\r\n			<td>35</td>\r\n			<td>345/325</td>\r\n			<td>195</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:#d44038;\">Attributes</th>\r\n			<td>\r\n			<ul>\r\n				<li>Malleable (Excellent)</li>\r\n				<li>Corrosion resistance</li>\r\n				<li>Weldability</li>\r\n				<li>Conductivity</li>\r\n			</ul>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li>Malleable (Excellent)</li>\r\n				<li>Corrosion resistance</li>\r\n				<li>Weldability</li>\r\n				<li>Conductivity</li>\r\n			</ul>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li>Strength</li>\r\n				<li>Fatigue resistance</li>\r\n			</ul>\r\n			</td>\r\n			<td>\r\n			<ul>\r\n				<li>Corrosion resistance</li>\r\n				<li>Weldability</li>\r\n				<li>Medium strength</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:#d44038;\">Application</th>\r\n			<td>\r\n			<p>Chemical instruments, sheet metal parts, deep drawing or spinning concave vessels, welding parts, heat exchangers, bell surfaces and disc surfaces, nameplates, kitchen utensils, ornaments, reflective devices, etc.</p>\r\n			</td>\r\n			<td>\r\n			<p>Lithium battery, decorations, lamps, electronic aluminum gasket, aluminum furniture base material, chemical, etc.</p>\r\n			</td>\r\n			<td>\r\n			<p>Military, aerospace, mold. etc.</p>\r\n			</td>\r\n			<td>\r\n			<p>Sheet metals, oil pipe, traffic vehicles, ships, instruments, lamp bracket and rivets, hardware, electrical shell, etc</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th colspan=\"2\" style=\"background-color:#d44038;\">Thickness(mm)</th>\r\n			<td>0.2-60</td>\r\n			<td>0.2-60</td>\r\n			<td>8-120</td>\r\n			<td>0.5-80</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', '', '', '/uploads/images/products/m1.jpg', '/uploads/images/products/m1.jpg', 0, 2, 1, 'admin', '2020-01-12 10:28:24', '2020-04-19 08:31:31'),
(7, 'CNC Plastic', '<div class=\"table-container\">\r\n              <table class=\"table\">\r\n                <thead>\r\n                  <tr>\r\n                    <th colspan=\"2\" style=\"background-color:#d44038;width:28%;\">Material</th>\r\n                    <th style=\"background-color:#000;width:18%;\">Aluminum 1050</th>\r\n                    <th style=\"background-color:#000;width:18%;\">Aluminum 1060</th>\r\n                    <th style=\"background-color:#000;width:18%;\">Aluminum 2024-T3/T4     </th>\r\n                    <th style=\"background-color:#000;width:18%;\">Aluminum 5052-H32</th>\r\n                  </tr>\r\n                </thead>\r\n                <tbody>\r\n                  <tr>\r\n                    <th rowspan=\"3\" style=\"background-color:#d44038;width:120px;\">Typicsl Phydicsl Propsrtes</th>\r\n                    <th style=\"background-color:#d44038;width:120px;\">Elastic Modulus (GPa)</th>\r\n                    <td>-</td>\r\n                    <td>69</td>\r\n                    <td>72.4</td>\r\n                    <td>70</td>\r\n                  </tr>\r\n                  <tr>                                  \r\n                    <th style=\"background-color:#d44038;\"> Tensile Strength(MPa)</th>\r\n                    <td>35-126</td>\r\n                    <td>110-136</td>\r\n                    <td>485/470   </td>\r\n                    <td>230</td>\r\n                  </tr>\r\n                  <tr>                              \r\n                    <th style=\"background-color:#d44038;\">Yeild Strenght(Mpa)</th>\r\n                    <td>75</td>\r\n                    <td>35</td>\r\n                    <td>345/325 </td>\r\n                    <td>195</td>\r\n                  </tr>\r\n                  <tr>                              \r\n                    <th colspan=\"2\" style=\"background-color:#d44038;\">Attributes</th>\r\n                    <td> \r\n                      <ul>\r\n                        <li>Malleable (Excellent) </li>\r\n                        <li>Corrosion resistance  </li>\r\n                        <li>Weldability </li>\r\n                        <li>Conductivity  </li>\r\n                      </ul>\r\n                    </td>\r\n                    <td> \r\n                      <ul>\r\n                        <li>Malleable (Excellent) </li>\r\n                        <li>Corrosion resistance  </li>\r\n                        <li>Weldability </li>\r\n                        <li>Conductivity  </li>\r\n                      </ul>\r\n                    </td>\r\n                    <td>\r\n                      <ul> \r\n                        <li>Strength</li>\r\n                        <li>Fatigue resistance</li>\r\n                      </ul>\r\n                    </td>\r\n                    <td> \r\n                      <ul>\r\n                        <li>Corrosion resistance     </li>\r\n                        <li>Weldability</li>\r\n                        <li>Medium strength    </li>\r\n                      </ul>\r\n                    </td>\r\n                  </tr>\r\n                  <tr>                              \r\n                    <th colspan=\"2\" style=\"background-color:#d44038;\">Application</th>\r\n                    <td> \r\n                      <p> Chemical instruments, sheet metal parts, deep drawing or spinning concave vessels, welding parts, heat exchangers, bell surfaces and disc surfaces, nameplates, kitchen utensils, ornaments, reflective devices, etc.</p>\r\n                    </td>\r\n                    <td> \r\n                      <p> Lithium battery, decorations, lamps, electronic aluminum gasket, aluminum furniture base material, chemical, etc.  </p>\r\n                    </td>\r\n                    <td>\r\n                      <p> Military, aerospace, mold. etc.</p>\r\n                    </td>\r\n                    <td> \r\n                      <p> Sheet metals, oil pipe, traffic vehicles, ships, instruments, lamp bracket and rivets, hardware, electrical shell, etc   </p>\r\n                    </td>\r\n                  </tr>\r\n                  <tr>                              \r\n                    <th colspan=\"2\" style=\"background-color:#d44038;\">Thickness(mm)</th>\r\n                    <td>0.2-60 </td>\r\n                    <td>0.2-60</td>\r\n                    <td>8-120     </td>\r\n                    <td>0.5-80  </td>\r\n                  </tr>\r\n                </tbody>\r\n              </table>\r\n            </div>', '', '', '', '', '', '/uploads/images/products/m2.jpg', '', 0, 2, 1, 'admin', '2020-01-12 12:05:15', '2020-04-18 00:28:09'),
(8, '第三代电子烟', '<img alt=\"\" src=\"/assets/img/temp/pd_03.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_06.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_08.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_10.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_12.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_14.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_15.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_17.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_18.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_20.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_23.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_25.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_27.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_28.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_29.jpg\" />', '', '', '', '', '', '/uploads/images/products/p_3.jpg', '', 0, 2, 1, 'admin', '2020-01-12 12:05:38', '2020-04-29 08:24:43'),
(9, '第二代电子烟', '<img alt=\"\" src=\"/assets/img/temp/pd_03.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_06.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_08.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_10.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_12.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_14.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_15.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_17.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_18.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_20.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_23.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_25.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_27.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_28.jpg\" /><img alt=\"\" src=\"/assets/img/temp/pd_29.jpg\" />', '', '', '', '', '', '/uploads/images/products/p_2.png', '', 0, 2, 1, 'admin', '2020-04-18 00:30:04', '2020-04-29 08:24:14'),
(10, '第一代电子烟', '<img src=\"/assets/img/temp/pd_03.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_06.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_08.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_10.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_12.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_14.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_15.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_17.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_18.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_20.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_23.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_25.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_27.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_28.jpg\" alt=\"\"><img src=\"/assets/img/temp/pd_29.jpg\" alt=\"\">', '', '', '', '', '', '/uploads/images/products/p_1.png', '', 0, 2, 1, 'admin', '2020-04-18 00:30:39', '2020-04-29 08:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_product_categories`
--

CREATE TABLE `qnz_product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_product_categories`
--

INSERT INTO `qnz_product_categories` (`id`, `title`, `parent`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(2, '默认分类', NULL, 10, 1, 'admin', '2020-01-12 05:21:19', '2020-04-18 00:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_questions`
--

CREATE TABLE `qnz_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_questions`
--

INSERT INTO `qnz_questions` (`id`, `title`, `answer`, `importance`, `active`, `added_by`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'HOW DO I GET A QUOTE?', 'We can accept most of the 3D file formats like SolidWorks (.sldprt)/ ProE(.prt) / IGES(.igs) / STEP (.stp) / Parasolid (.x_t)/.stl. We can also use 2D drawing (.pdf) for quote against the parts with simple structure. All the other files formats are not listed above but can be read in SolidWorks/ProE/UG will be also fine.', 0, 1, 'admin', 1, '2020-04-09 13:10:15', '2020-04-18 07:36:48'),
(2, 'WHAT FORMATS OF THE FILES CAN PREMIUM PARTS’ ACCEPT?', 'We can accept most of the 3D file formats like SolidWorks (.sldprt)/ ProE(.prt) / IGES(.igs) / STEP (.stp) / Parasolid (.x_t)/.stl. We can also use 2D drawing (.pdf) for quote against the parts with simple structure. All the other files formats are not listed above but can be read in SolidWorks/ProE/UG will be also fine.', 0, 1, 'admin', 1, '2020-04-18 07:37:30', '2020-04-18 07:37:30'),
(3, 'HOW DO I GET A QUOTE?', 'We can accept most of the 3D file formats like SolidWorks (.sldprt)/ ProE(.prt) / IGES(.igs) / STEP (.stp) / Parasolid (.x_t)/.stl. We can also use 2D drawing (.pdf) for quote against the parts with simple structure. All the other files formats are not listed above but can be read in SolidWorks/ProE/UG will be also fine.', 0, 1, 'admin', 2, '2020-04-18 07:58:17', '2020-04-18 07:58:17'),
(4, 'HOW DO I GET A QUOTE?', 'We can accept most of the 3D file formats like SolidWorks (.sldprt)/ ProE(.prt) / IGES(.igs) / STEP (.stp) / Parasolid (.x_t)/.stl. We can also use 2D drawing (.pdf) for quote against the parts with simple structure. All the other files formats are not listed above but can be read in SolidWorks/ProE/UG will be also fine.', 0, 1, 'admin', 3, '2020-04-18 07:58:20', '2020-04-18 07:58:20'),
(5, 'HOW DO I GET A QUOTE?', 'We can accept most of the 3D file formats like SolidWorks (.sldprt)/ ProE(.prt) / IGES(.igs) / STEP (.stp) / Parasolid (.x_t)/.stl. We can also use 2D drawing (.pdf) for quote against the parts with simple structure. All the other files formats are not listed above but can be read in SolidWorks/ProE/UG will be also fine.', 0, 1, 'admin', 4, '2020-04-18 07:58:24', '2020-04-18 07:58:24'),
(6, 'HOW DO I GET A QUOTE?', 'We can accept most of the 3D file formats like SolidWorks (.sldprt)/ ProE(.prt) / IGES(.igs) / STEP (.stp) / Parasolid (.x_t)/.stl. We can also use 2D drawing (.pdf) for quote against the parts with simple structure. All the other files formats are not listed above but can be read in SolidWorks/ProE/UG will be also fine.', 0, 1, 'admin', 5, '2020-04-18 07:58:26', '2020-04-18 07:58:26'),
(7, 'HOW DO I GET A QUOTE?', 'We can accept most of the 3D file formats like SolidWorks (.sldprt)/ ProE(.prt) / IGES(.igs) / STEP (.stp) / Parasolid (.x_t)/.stl. We can also use 2D drawing (.pdf) for quote against the parts with simple structure. All the other files formats are not listed above but can be read in SolidWorks/ProE/UG will be also fine.', 0, 1, 'admin', 6, '2020-04-18 07:58:29', '2020-04-18 07:58:29');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_question_categories`
--

CREATE TABLE `qnz_question_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_question_categories`
--

INSERT INTO `qnz_question_categories` (`id`, `title`, `description`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'QUOTE', '', 0, 1, 'admin', '2020-04-09 12:43:21', '2020-04-18 07:54:17'),
(2, 'ORDER', '', 0, 1, 'admin', '2020-04-18 07:54:39', '2020-04-18 07:54:39'),
(3, 'PRODUCTION', '', 0, 1, 'admin', '2020-04-18 07:54:56', '2020-04-18 07:54:56'),
(4, 'SHIPPING', '', 0, 1, 'admin', '2020-04-18 07:55:09', '2020-04-18 07:55:09'),
(5, 'PAYMENT', '', 0, 1, 'admin', '2020-04-18 07:55:24', '2020-04-18 07:55:24'),
(6, 'GENERAL', '', 0, 1, 'admin', '2020-04-18 07:55:36', '2020-04-18 07:55:36');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_researches`
--

CREATE TABLE `qnz_researches` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `title_short` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lab` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `summary` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `research_group` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `teachers` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `importance` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_researches`
--

INSERT INTO `qnz_researches` (`id`, `title`, `title_short`, `lab`, `lang`, `icon`, `thumbnail`, `image_url`, `content`, `summary`, `research_group`, `teachers`, `importance`, `view_count`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '脑功能图谱与行为研究中心', '脑功能图谱与行为', '研究中心', 'zh-CN', '/uploads/images/researches/icon_naogongneng.png', '/uploads/images/researches/home_bg1.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '12|13|16|17', '12|14|17', 100, 0, 1, 'admin', '2020-07-28 13:26:04', '2020-07-29 01:43:29'),
(2, '脑认知与类脑智能123', '脑认知与类脑智能', '研究中心', 'zh-CN', '/uploads/images/researches/icon_naorenzhi.png', '/uploads/images/researches/home_bg2.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '6|12', '9|18', 92, 0, 1, 'admin', '2020-07-28 13:34:17', '2020-07-28 14:26:13'),
(3, '神经发育与退行性脑疾病123', '神经发育与退行性脑疾病', '研究中心', 'zh-CN', '/uploads/images/researches/icon_shenjingfayu.png', '/uploads/images/researches/home_bg3.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '6|12', '9|18', 86, 0, 1, 'admin', '2020-07-28 13:35:51', '2020-07-28 14:26:47'),
(4, '基因编辑脑疾病动物模型123', '基因编辑脑疾病动物模型', '研究中心', 'zh-CN', '/uploads/images/researches/icon_jiyinbianji_.png', '/uploads/images/researches/home_bg3.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '6|12', '9|18', 78, 0, 1, 'admin', '2020-07-28 13:36:37', '2020-07-28 14:26:59'),
(5, '内尔神经可塑性123', '内尔神经可塑性', '诺奖实验室', 'zh-CN', '/uploads/images/researches/icon_neiershenjing.png', '/uploads/images/researches/home_bg4.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '6|12', '9|18', 0, 0, 1, 'admin', '2020-07-28 13:37:15', '2020-07-28 14:25:19'),
(6, '脑信息中心123', '脑信息中心', NULL, 'zh-CN', '/uploads/images/researches/xizhongxin.png', '/uploads/images/researches/home_bg7.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '5|13', '14|22|23', 0, 0, 1, 'admin', '2020-07-28 13:48:49', '2020-07-28 13:48:49'),
(7, '神经系统疾病转化123', '神经系统疾病转化', '研究中心', 'zh-CN', '/uploads/images/researches/zhuanhua.png', '/uploads/images/researches/home_bg6.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '5|13', '14|22|23', 0, 0, 1, 'admin', '2020-07-28 13:50:25', '2020-07-28 14:24:57'),
(8, '内尔神经可塑性123【拷贝】', '内尔神经可塑性', '诺奖实验室', 'en', '/uploads/images/researches/icon_neiershenjing.png', '/uploads/images/researches/home_bg4.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '6|12', '9|18', 0, 0, 1, 'admin', '2020-07-28 15:15:27', '2020-07-28 15:15:36'),
(9, '脑信息中心123【拷贝】', '脑信息中心', '', 'en', '/uploads/images/researches/xizhongxin.png', '/uploads/images/researches/home_bg7.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '5|13', '14|22|23', 0, 0, 1, 'admin', '2020-07-28 15:15:42', '2020-07-28 15:15:53'),
(10, '神经系统疾病转化123【拷贝】', '神经系统疾病转化', '研究中心', 'en', '/uploads/images/researches/zhuanhua.png', '/uploads/images/researches/home_bg6.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '5|13', '14|22|23', 0, 0, 1, 'admin', '2020-07-28 15:15:59', '2020-07-28 15:16:08'),
(11, '基因编辑脑疾病动物模型123【拷贝】', '基因编辑脑疾病动物模型', '研究中心', 'en', '/uploads/images/researches/icon_jiyinbianji_.png', '/uploads/images/researches/home_bg3.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '6|12', '9|18', 78, 0, 1, 'admin', '2020-07-28 15:16:43', '2020-07-28 15:16:52'),
(12, '神经发育与退行性脑疾病123【拷贝】', '神经发育与退行性脑疾病', '研究中心', 'en', '/uploads/images/researches/icon_shenjingfayu.png', '/uploads/images/researches/home_bg3.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '6|12', '9|18', 86, 0, 1, 'admin', '2020-07-28 15:16:59', '2020-07-28 15:17:06'),
(13, '脑认知与类脑智能123【拷贝】', '脑认知与类脑智能', '研究中心', 'en', '/uploads/images/researches/icon_naorenzhi.png', '/uploads/images/researches/home_bg2.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '6|12', '9|18', 92, 0, 1, 'admin', '2020-07-28 15:17:13', '2020-07-28 15:17:20'),
(14, '脑功能图谱与行为研究中心【en】', '脑功能图谱与行为en', '研究中心', 'en', '/uploads/images/researches/icon_naogongneng.png', '/uploads/images/researches/home_bg1.jpg', '/uploads/images/researches/e_05.jpg', '<p>研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。</p>\r\n\r\n<p>脑功能图谱与行为研究中心团队领导的光遗传技术研发及应用研究是深圳脑科学研究的优势方向，连续7年在深圳举办&ldquo;全国光遗传技术培训班&rdquo;，技术辐射到境内外460家实验室。应用光遗传等技术，在本能恐惧行为、情绪情感等脑基本功能的研究中均取得了原创性的重大科学发现，研究成果发表在Neuron、Nature Communications等杂志，处于世界前沿地位。</p>\r\n', '研究方向：本能情绪的脑连接图谱解析；脑疾病的脑图谱变异基础研究；功能连接图谱解析技术开发。', '4|6', '12|14|17', 100, 0, 1, 'admin', '2020-07-28 15:17:22', '2020-08-09 02:59:15');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_resources`
--

CREATE TABLE `qnz_resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_resources`
--

INSERT INTO `qnz_resources` (`id`, `lang_code`, `key`, `value`, `added_by`, `created_at`, `updated_at`) VALUES
(2, 'en', 'Create', 'Create', 'admin', '2020-03-25 13:30:13', '2020-03-27 07:38:33'),
(3, 'zh-CN', 'Edit', '编辑', 'admin', '2020-03-25 13:30:27', '2020-03-25 13:30:27'),
(4, 'zh-CN', 'Create', '创建', 'admin', '2020-03-25 13:46:06', '2020-03-26 09:17:55'),
(5, 'zh-CN', 'General Information', '基本信息', 'admin', '2020-03-26 08:44:52', '2020-03-26 08:44:52'),
(6, 'zh-CN', 'System Environments', '系统环境', 'admin', '2020-03-26 08:45:28', '2020-03-26 08:45:28'),
(7, 'zh-CN', 'System Information', '系统信息', 'admin', '2020-03-26 09:17:06', '2020-03-26 09:17:06'),
(8, 'zh-CN', 'Email', '邮箱', 'admin', '2020-03-26 09:18:31', '2020-03-26 09:18:31'),
(9, 'zh-CN', 'Update', '更新', 'admin', '2020-03-26 09:51:06', '2020-03-26 09:51:06'),
(10, 'zh-CN', 'Delete', '删除', 'admin', '2020-03-26 09:51:20', '2020-03-26 09:51:20'),
(11, 'zh-CN', 'Search', '搜索', 'admin', '2020-03-27 06:53:40', '2020-03-27 06:53:40'),
(12, 'zh-CN', 'Save', '保存', 'admin', '2020-03-27 06:53:50', '2020-03-27 06:53:50'),
(13, 'zh-CN', 'Back', '返回', 'admin', '2020-03-27 06:54:05', '2020-03-27 06:54:05'),
(14, 'zh-CN', 'Next', '下一页', 'admin', '2020-03-27 06:55:12', '2020-03-27 06:55:12'),
(15, 'zh-CN', 'Page', '页面', 'admin', '2020-03-27 07:31:01', '2020-03-27 07:31:01'),
(16, 'zh-CN', 'Title', '主题', 'admin', '2020-03-27 07:31:20', '2020-03-27 07:31:20'),
(17, 'zh-CN', 'Active', '激活', 'admin', '2020-03-27 07:31:37', '2020-03-27 07:51:10'),
(18, 'zh-CN', 'Hello', '你好', 'admin', '2020-03-27 07:32:16', '2020-03-27 07:32:16'),
(19, 'zh-CN', 'Logout', '退出', 'admin', '2020-03-27 07:33:09', '2020-03-27 07:33:09'),
(20, 'zh-CN', 'Add', '添加', 'admin', '2020-03-27 07:33:37', '2020-03-27 07:33:37'),
(21, 'en', 'Edit', 'Edit', 'admin', '2020-03-27 07:41:30', '2020-03-27 07:41:30'),
(22, 'en', 'General Information', 'General Information', 'admin', '2020-03-27 07:42:20', '2020-03-27 07:42:20'),
(23, 'en', 'System Environments', 'System Environments', 'admin', '2020-03-27 07:42:34', '2020-03-27 07:42:34'),
(24, 'en', 'System Information', 'System Information', 'admin', '2020-03-27 07:42:47', '2020-03-27 07:42:47'),
(25, 'en', 'Email', 'Email', 'admin', '2020-03-27 07:43:02', '2020-03-27 07:43:02'),
(26, 'en', 'Update', 'Update', 'admin', '2020-03-27 07:43:09', '2020-03-27 07:43:09'),
(27, 'en', 'Delete', 'Delete', 'admin', '2020-03-27 07:43:20', '2020-03-27 07:43:20'),
(28, 'en', 'Search', 'Search', 'admin', '2020-03-27 07:43:41', '2020-03-27 07:43:41'),
(29, 'en', 'Save', 'Save', 'admin', '2020-03-27 07:43:50', '2020-03-27 07:43:50'),
(30, 'en', 'Back', 'Back', 'admin', '2020-03-27 07:43:59', '2020-03-27 07:43:59'),
(31, 'en', 'Next', 'Next', 'admin', '2020-03-27 07:44:15', '2020-03-27 07:44:15'),
(32, 'en', 'Title', 'Title', 'admin', '2020-03-27 07:44:29', '2020-03-27 07:44:29'),
(33, 'en', 'Active', 'Active', 'admin', '2020-03-27 07:45:06', '2020-03-27 07:51:27'),
(34, 'en', 'Hello', 'Hello', 'admin', '2020-03-27 07:45:23', '2020-03-27 07:45:23'),
(35, 'en', 'Logout', 'Logout', 'admin', '2020-03-27 07:45:38', '2020-03-27 07:45:38'),
(36, 'en', 'Add', 'Add', 'admin', '2020-03-27 07:45:51', '2020-03-27 07:45:51'),
(37, 'en', 'News', 'News', 'admin', '2020-03-27 08:01:19', '2020-03-27 08:01:19'),
(38, 'zh-CN', 'News', '新闻资讯', 'admin', '2020-03-27 08:01:33', '2020-03-27 08:01:33'),
(39, 'zh-CN', 'Products', '产品', 'admin', '2020-03-27 08:01:47', '2020-03-27 08:01:47'),
(40, 'en', 'Products', 'Products', 'admin', '2020-03-27 08:01:54', '2020-03-27 08:02:13'),
(41, 'en', 'login', 'Login', 'admin', '2020-03-27 11:58:01', '2020-03-27 11:58:01'),
(42, 'zh-CN', 'login', '登录', 'admin', '2020-03-27 11:58:16', '2020-03-27 11:58:16'),
(43, 'en', 'Username', 'Username', 'admin', '2020-03-27 12:11:23', '2020-03-27 12:11:23'),
(44, 'en', 'Cancel', 'Cancel', 'admin', '2020-03-27 12:11:30', '2020-03-27 12:13:09'),
(45, 'zh-CN', 'Username', '用户名', 'admin', '2020-03-27 12:13:40', '2020-03-27 12:13:40'),
(46, 'zh-CN', 'Password', '密码', 'admin', '2020-03-27 12:13:53', '2020-03-27 12:13:53'),
(47, 'en', 'Captcha', 'Captcha', 'admin', '2020-03-27 14:41:27', '2020-03-27 14:41:27'),
(48, 'zh-CN', 'Captcha', '验证码', 'admin', '2020-03-27 14:41:41', '2020-03-27 14:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_service_items`
--

CREATE TABLE `qnz_service_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image_url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `importance` int(10) UNSIGNED NOT NULL,
  `view_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_service_items`
--

INSERT INTO `qnz_service_items` (`id`, `title`, `thumbnail`, `image_url`, `banner`, `summary`, `content`, `importance`, `view_count`, `active`, `recommend`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'CNC MACHINING', '/uploads/images/services/news_01.jpg', '/uploads/images/services/s1.jpg', '/uploads/images/services/ser1.jpg', 'The core of our capability and it guarantees our other services', '<div class=\"section\">\r\n<p>CNC machining is a computer numerical control machining. It is a subtractive manufacturing procedure where a variety of tools directed by a computer is used to systemically remove raw materials till a final product or production part is made. CNC machining processes specialized digital design models to manufacture high-quality prototypes, tool molds and production arts. CNC machining can also be employed in pressure die casting or plastic injection molding services. CNC machining takes a number of forms, and CNC milling and turning are two of the more common CNC techniques in the industry.</p>\r\n</div>\r\n\r\n<div class=\"section\">\r\n<div class=\"title-section-v4\">\r\n<h2>CNC Milling</h2>\r\n</div>\r\n\r\n<div class=\"imgs\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\"><img alt=\"\" src=\"/assets/img/temp/ser1_01.jpg\" /></div>\r\n\r\n<div class=\"col-md-6\"><img alt=\"\" src=\"/assets/img/temp/ser1_02.jpg\" /></div>\r\n</div>\r\n</div>\r\n\r\n<p>CNC milling is essentially a process where a machine command is deployed by the computer for to designate specific drilling and turning along axes to cut the material into the pre-set specifications and dimensions.</p>\r\n\r\n<p>At Premium Parts, we offer both 3/4/5-axis CNC machining capabilities. Our machine milling services are specialized for a wide array of processes including the fabrication of complex 3D shapes, machining production-grade prototypes or applying machined surface finishes. CNC milling machining processes can also produce ball joints, rollers, spindles, brackets, valve bodies and many more.</p>\r\n</div>\r\n\r\n<div class=\"section\">\r\n<div class=\"title-section-v4\">\r\n<h2>CNC Turning</h2>\r\n</div>\r\n\r\n<div class=\"imgs\"><img alt=\"\" src=\"/assets/img/temp/ser1_03.jpg\" /></div>\r\n\r\n<p>Our CNC turning process is excellent for all projects that have complex external round shapes and internal bores. The CNC turning procedure is an intricate and thorough process that allows for the creation of high quality production arts using a lathe. At Premium Part, we offer both live and standard tooling to deliver top tier prototypes backed by advanced, state-of-the-art technology that facilitates delivery of parts in 3-5 days.</p>\r\n</div>\r\n\r\n<div class=\"section\">\r\n<div class=\"title-section-v4\">\r\n<h2>Why run your CNC Machining services at Premium Parts?</h2>\r\n</div>\r\n\r\n<div class=\"imgs\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\"><img alt=\"\" src=\"/assets/img/temp/ser1_04.jpg\" /></div>\r\n\r\n<div class=\"col-md-6\"><img alt=\"\" src=\"/assets/img/temp/ser1_05.jpg\" /></div>\r\n</div>\r\n</div>\r\n\r\n<h4 class=\"title\">&bull; Not MOQ setup</h4>\r\n\r\n<p>We don&rsquo;t setup MOQ to our machined parts, 1 or thousands pieces are pleased to start. We had handled many cases of initial prototype parts to our clients for their exhibitions</p>\r\n\r\n<h4 class=\"title\">&bull; Efficient Low volume production</h4>\r\n\r\n<p>Produce production-grade parts from 50 to 1000+ pieces in 7 days. Our low-volume manufacturing services are optimized to deliver best value for money without compromising on quality. We know how to optimize our tool, manage our team and using the specify machines for an efficient low volume production process. We generally can save more machine times than our competitors. That also means we can offer a competitive quote for production quantity</p>\r\n\r\n<h4 class=\"title\">&bull; Quick turnaround delivery</h4>\r\n\r\n<p>At Premium Parts, we understand the essence of a quick turnaround and on-time delivery. With our optimized supply and delivery logistics, you can be rest assured of receiving tour machined parts before or at the stipulated time frame, while all low-volume manufacturing parts are made available in 7 days. At Premium Parts, our slogan remains &ldquo;innovation accelerated&rdquo;, this is why we are dedicated to helping you iterate and produce as many parts as possible in the shortest time frame</p>\r\n\r\n<h4 class=\"title\">&bull; In-house capabilities</h4>\r\n\r\n<p>Our manufacturing units and warehouses are efficient and expansive. What this means is that you do not have to worry about outsourcing any service in your manufacturing. Eliminate downtimes and reach your market quicker then competition as our in-house capabilities will be there every step of your project from concept to prototype, finishing and quality control. We equipped both 3/4/5 axis machining to meet our client&rsquo;s requirement</p>\r\n\r\n<h4 class=\"title\">&bull; Technological capacity</h4>\r\n\r\n<p>Avail yourself with our state-of-the-art machining capabilities that cover both quality and quantity needs. At Premium parts, we employ only the best solutions that are highly scalable and repeatable to deliver consistent quality all round your design project</p>\r\n\r\n<h4 class=\"title\">&bull; Single supplier</h4>\r\n\r\n<p>Our single supplier agenda guarantees that all of your products will be delivered with uniformity and consistency across material and other functional product property</p>\r\n\r\n<h4 class=\"title\">&bull; Material selection range</h4>\r\n\r\n<p>Machine your low-volume production parts and product prototypes from a wide array of materials from metal and plastic. Choose from ABS to Acrylic, r, Delrin, HDPE, Stainless steel, Nylon, PTFE, Polycarbonate, Polypropene, Magnesium, Steel, Aluminium, Brass, Coppe and more. We also offer customized services to provide tailor-made solutions for any raw material that you may require!</p>\r\n</div>\r\n\r\n<div class=\"section\">\r\n<div class=\"title-section-v4\">\r\n<h2>Premium Parts CNC Machining in China</h2>\r\n</div>\r\n\r\n<p>With an excellent range of finishing services, pronounced product quality, on-time delivery and service affordability, allow us to take care of all your CNC machining needs for you! Our in-house capabilities and quality control is defined to deliver the best output that fits your specification and standard with high repeatability and scalability. We boast of an experienced team that will evaluate your project, its design-for-production and suggest the best approach from process to material and budget.</p>\r\n</div>\r\n\r\n<div class=\"section\">\r\n<div class=\"title-section-v4\">\r\n<h2>Applications of CNC Machining</h2>\r\n</div>\r\n\r\n<div class=\"mb-2 row\">\r\n<div class=\"col-md-6\">\r\n<ul class=\"no-style\">\r\n	<li>&bull; Low-volume manufacturing</li>\r\n	<li>&bull; Tooling</li>\r\n	<li>&bull; CNC machined parts</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"col-md-6\">\r\n<ul class=\"no-style\">\r\n	<li>&bull; Turning parts</li>\r\n	<li>&bull; Post machining on casting or injection units</li>\r\n	<li>&bull; jigs and fixtures</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"section\">\r\n<div class=\"title-section-v4\">\r\n<h2>Design Guidelines</h2>\r\n</div>\r\n\r\n<ul class=\"no-style\">\r\n	<li>Maximum Dimensions: <span style=\"color:#e62e2e;\">1600*1300*900</span></li>\r\n	<li>Minimum tolerance: <span style=\"color:#e62e2e;\">0.005mm</span></li>\r\n	<li>Minimum machined radius: <span style=\"color:#e62e2e;\">0.25mm</span></li>\r\n	<li>Minimum machined thickness: <span style=\"color:#e62e2e;\">0.20mm</span></li>\r\n	<li>Surface finish: <span style=\"color:#e62e2e;\">Ra0.4-Ra1.6</span></li>\r\n</ul>\r\n</div>\r\n', 100, 0, 1, 1, 'admin', '2020-04-17 08:59:30', '2020-04-17 13:26:38'),
(2, 'SHEET METAL', '/uploads/images/services/news_02.jpg', '/uploads/images/services/s2.jpg', '/uploads/images/services/ser2.jpg', 'Custom and Precision Sheet Matal Prototyes and Low-volume parts in 5-7 days', '<div class=\"section\">\r\n          <p>Sheet metal fabrication is a meticulous manufacturing that is used in transforming ordinary, flat metal sheets into full scale production-grade functional parts. The process starts with a thin sheet of metal which is then fabricated into simple and complex parts using any single process or a combination of techniques including milling, laser cutting, welding, forming, stamping, bending, punching, cutting and much more into desired specifications. Custom Sheet Metal Fabrication is in high demand across various industries because of a number of reasons. Sheet metal parts are affordable, scalable and provide a decent range of material selection.</p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Sheet Metal Fabrication in Premium Part</h2>\r\n          </div>\r\n          <div class=\"imgs\"><img src=\"/assets/img/temp/ser2_01.jpg\" alt=\"\"></div>\r\n          <p>At Premium Part, Sheet metal fabrication solutions exist for the creation of a non-exhaustive possibilities in production part. Our processes are ideal for all functional prototyping needs or as end-use parts after post-fabrication finishing and treatment that make them plug-and-play ready. We employ a number of processes in our sheet metal fabrication. Our processes can be categorized into: </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>CNC Turning</h2>\r\n          </div>\r\n          <div class=\"imgs\">\r\n            <div class=\"row\">\r\n              <div class=\"col-md-6\"><img src=\"/assets/img/temp/ser2_02.jpg\" alt=\"\"></div>\r\n              <div class=\"col-md-6\"><img src=\"/assets/img/temp/ser2_03.jpg\" alt=\"\"></div>\r\n            </div>\r\n          </div>\r\n          <p style=\"margin-bottom:3rem;\">Our CNC turning process is excellent for all projects that have complex external round shapes and internal bores. The CNC turning procedure is an intricate and thorough process that allows for the creation of high quality production arts using a lathe. At Premium Part, we offer both live and standard tooling to deliver top tier prototypes backed by advanced, state-of-the-art technology that facilitates delivery of parts in 3-5 days.</p>\r\n          <div class=\"row\">\r\n            <div class=\"col-md-4\">\r\n              <ul class=\"no-style\">\r\n                <li>•	Material Deformation </li>\r\n                <li>•	Bending	</li>\r\n                <li>•	Stamping 	</li>\r\n                <li>•	Spinning </li>\r\n              </ul>\r\n            </div>\r\n            <div class=\"col-md-4\">\r\n              <ul class=\"no-style\">\r\n                <li>•	Material Forming/Assembly</li>\r\n                <li>•	Assembly</li>\r\n                <li>•	Welding </li>\r\n                <li>•	Roll forming</li>\r\n              </ul>\r\n            </div>\r\n            <div class=\"col-md-4\">\r\n              <ul class=\"no-style\">\r\n                <li>•	Material Removal</li>\r\n                <li>•	Laser cutting </li>\r\n                <li>•	Punching</li>\r\n                <li>•	Blanking </li>\r\n              </ul>\r\n            </div>\r\n          </div>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Here’s why to choose Premium Part’s sheet metal fabrication services?</h2>\r\n          </div>\r\n          <h4 class=\"title\">•	Material specifications </h4>\r\n          <p>Choose between Aluminium, copper, steel, zinc and stainless-steel sheet metal options </p>\r\n          <h4 class=\"title\">•	Durability </h4>\r\n          <p>Sheet metal parts are highly durable for direct end-use application or prototyping needs</p>\r\n          <h4 class=\"title\">•	Finishing and Post-fabrication options  </h4>\r\n          <p>Choose from a decent array of finishing to deliver visual excellence, extra strength, protection or varying textures with bead blasting, anodizing, painting or powder coating</p>\r\n          <h4 class=\"title\">•	Quick turnaround</h4>\r\n          <p>Receive fully functional end-use parts and prototypes in as fast as 7 days </p>\r\n          <h4 class=\"title\">•	Scalability </h4>\r\n          <p>Enjoy a cost-efficient approach that delivers low prices for large volumes</p>\r\n          <h4 class=\"title\">•	Production Components </h4>\r\n          <p>Avail yourself of the numerous in-house designed inserts that will speed and improve your sheet metal fabrication </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Applications of CNC Machining</h2>\r\n          </div>\r\n          <div class=\"mb-2 row\">\r\n            <div class=\"col-md-6\">\r\n              <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n                <li>•	Body Panels</li>\r\n                <li>•	Automotive </li>\r\n                <li>•	Automobile </li>\r\n                <li>•	Electrical appliances and Consumer electronics </li>\r\n                <li>•	Office equipment </li>\r\n                <li>•	Chipsets and boards </li>\r\n                <li>•	MRI Scanners </li>\r\n              </ul>\r\n            </div>\r\n            <div class=\"col-md-6\">\r\n              <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n                <li>•	Chassis </li>\r\n                <li>•	Fuselages </li>\r\n                <li>•	Culinary and Cutlery equipment  </li>\r\n                <li>•	Office equipment </li>\r\n                <li>•	Chipsets and boards </li>\r\n                <li>•	Sinks and counters </li>\r\n                <li>•	Surgical implants </li>\r\n              </ul>\r\n            </div>\r\n          </div>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Looking for high quality Sheet Metal Services?</h2>\r\n          </div>\r\n          <p>Premium Part is your one-stop service provider for all sheet metal fabrication needs. From basic manufacturing to post-fabrication and finishing, we have got you covered. We offer many procedures including sheet metal stamping, cutting, rolling, bending, rolling, laser cutting, assembly, plating, powder coating, riveting, welding, silk screening, painting and more. </p>\r\n          <p>We have infinite production capacity that never fails to deliver on time. From 1 to 1000 parts, our sheet metal fabrication services are structured to deliver production-grade prototype and functional end-use parts with quick turnaround!</p>\r\n        </div>', 99, 0, 1, 1, 'admin', '2020-04-17 09:00:28', '2020-04-17 13:58:49'),
(3, 'URETHANE CASTING', '/uploads/images/services/news_03.jpg', '/uploads/images/services/s3.jpg', '/uploads/images/services/ser3.jpg', 'production grade parts with low-volume manufacturing and fast turnover', '<div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>What is Urethane Casting</h2>\r\n          </div>\r\n          <div class=\"imgs\"><img src=\"/assets/img/temp/ser3_01.jpg\" alt=\"\"></div>\r\n          <p>Urethane casting is a molding technique that uses silicone molds and urethane to form high-quality production-grade parts. The process is also known as cast urethane, silicone molding or RTV molding. Urethane casting is an excellent production technique that can help deliver production parts without the high overheads associated with traditional manufacturing with a speedier turnaround </p>\r\n          <h4 class=\"title\">•	Low-volume manufacturing, production-grade quality </h4>\r\n          <p>At Premium Part, our cast urethane service is fast, affordable and suitable for production of 20-100 units at production quality grades. Our capacity has been designed such that each silicone mold is capable of delivering 20 castings without compromising quality on even the smallest demand quantities. </p>\r\n          <h4 class=\"title\">•	Complex elastomeric parts and geometry</h4>\r\n          <p>Our urethane castings are ideal for prototyping and producing complex parts with varying rigidity and elastomeric memory even under high temperatures, pressure and tensile strength. </p>\r\n          <h4 class=\"title\">•	Flawless detailing and precision manufacturing </h4>\r\n          <p>Bring even the most complex designs to life and smash the limits of CNC machining with cast urethane parts that detail design to perfection. Produce cast urethane parts with unimaginable complexity beyond the capacity of injection molding. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Urethane Casting Materials               </h2>\r\n          </div>\r\n          <p>Choose between multiple material types to find the best-fit solution for your production parts</p>\r\n          <h4 class=\"title\">•	ABS-grade </h4>\r\n          <p>ABS-like material that can be used for a general-purpose urethane casting. This material grade is similar to the ABS thermoplastic and excellent for hardware inserts and enclosures. ABS-grade materials boast of excellent impact and chemical resistance, excellent low and high temperature performance, structural strength and ease of finish application.</p>\r\n          <h4 class=\"title\">•	Acrylic-like </h4>\r\n          <p>These materials are transparent, stiff and similar to PMMA acrylic. They serve for the production of parts that require some element of see-though such as light pipes, safety screens, automotive rear-light clustering, baths, dental fittings and more. Acrylic-like urethane cast materials have outstanding surface hardness, may be scratch-proof and has unlimited colouring and finishing potential. </p>\r\n          <h4 class=\"title\">•	Elastomers or PU rubber</h4>\r\n          <p>We also offer elastomer materials that are similar and rubber-like. These elastomers may resemble TPU, TPE rubber-like and silicone rubber materials that are great for wearables, overmolds, gaskets and more. They have excellent abrasion resistance and insulating properties and their versatility allows them to be tailored for some of the most demanding markets and industrial sectors. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Finishing and Quality control</h2>\r\n          </div>\r\n          <div class=\"imgs\"><img src=\"/assets/img/temp/ser3_02.jpg\" alt=\"\"></div>\r\n          <p>Choose amongst a wide array of finishes and treatment options after production of your urethane casting parts. Premium Parts provides standard colour and finishes that involves the addition of pigment to the urethane before casting or the use of pantone code colour swatches for precise colour matches. We also deliver custom finishes that allows you to customize the texture by painting the mold before production or by texture-painting the finished parts. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Basic Applications</h2>\r\n          </div>\r\n          <p>Premium Parts urethane casting may be employed across several industries to serve many diverse functions including: </p>\r\n          <div class=\"mb-2 row\">\r\n            <div class=\"col-md-6\">\r\n              <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n                <li>•	Rapid prototyping</li>\r\n                <li>•	Low-volume manufacturing </li>\r\n                <li>•	Consumer testing and user evaluation parts </li>\r\n              </ul>\r\n            </div>\r\n            <div class=\"col-md-6\">\r\n              <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n                <li>•	Concept model  </li>\r\n                <li>•	Bridge tooling </li>\r\n                <li>•	zroduction of end-use parts </li>\r\n              </ul>\r\n            </div>\r\n          </div>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Premium Part Urethane Casting</h2>\r\n          </div>\r\n          <div class=\"imgs\"><img src=\"/assets/img/temp/ser3_03.jpg\" alt=\"\"></div>\r\n          <p>Looking for production quality cast urethane parts in China? Our industrial urethane casting process is specialized for mass production and low-volume demands with high precision and repeatability. At Premium Parts, we have optimized our urethane casting to work across a wide array of industries, delivering functional prototypes and complex designs that are market-ready in as fast as 5 days  </p>\r\n        </div>', 98, 0, 1, 1, 'admin', '2020-04-17 09:06:32', '2020-04-17 14:00:43'),
(4, 'ALUMINUM EXTRUSION', '/uploads/images/services/news_04.jpg', '/uploads/images/services/s4.jpg', '/uploads/images/services/ser4.jpg', 'Low Volume,High-quality Extreded Aluminium Parts in 10 days or less', '<div class=\"section\">\r\n          <p>The process is employed in the shaping of aluminium materials by pushing the aluminium billet through a steel die already shaped to the style of the desired production part. The emerging aluminium extruded part will have a uniform cross section that shares the profile of the die and matches the specifications of the project. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>The Aluminium Extrusion Process</h2>\r\n          </div>\r\n          <div class=\"imgs\">\r\n            <div class=\"row\">\r\n              <div class=\"col-md-6\"><img src=\"/assets/img/temp/ser4_01.jpg\" alt=\"\"></div>\r\n              <div class=\"col-md-6\"><img src=\"/assets/img/temp/ser4_02.jpg\" alt=\"\"></div>\r\n            </div>\r\n          </div>\r\n          <p>The Aluminium Extrusion process at Premium Part is very dynamic and versatile. In a bid to deliver the best services and production parts to our customers, we ensure that we optimize our extrusion process to match the specifics and desired outputs from the process. </p>\r\n          <ul>\r\n            <li>AGenerally, the process begins with the designing of the die shape and its creation. After this is complete, the next process is the heating of the billet (aluminium alloy) to around 750F or 925F depending on the type of alloy. This is done to soften the aluminium. </li>\r\n            <li>The heated billet is then transferred to the loader where a lubricant is added to prevent the aluminium from smearing the extru sion machine. </li>\r\n            <li>Pressure is then applied to the billet to push it into a container and force it through the die opening.</li>\r\n            <li>Next, nitrogen gas is applied to create an inert atmosphere and prevent oxide formation.</li>\r\n            <li>The extruded part, now formed to the same profile and cross section of the die is then cooled .</li>\r\n            <li>The aluminium extruded is cut and hardened. Any subsequent adjustment and treatment is done here. Post-extrusion finishing relating to texture, brightness or colour then follows. </li>\r\n          </ul>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Why choose Aluminium Extrusion Services from Premium Part? </h2>\r\n          </div>\r\n          <div class=\"mb-2 row\">\r\n            <div class=\"col-md-6\">\r\n              <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n                <li>•	Top quality Aluminium alloys and billets</li>\r\n                <li>•	Highly repeatable and consistent process</li>\r\n                <li>•	Production parts with excellent strength to weight ratio</li>\r\n                <li>•	Low-volume manufacturing and small batch production</li>\r\n              </ul>\r\n            </div>\r\n            <div class=\"col-md-6\">\r\n              <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n                <li>•	Superior post-extrusion and finishing services </li>\r\n                <li>•	Custom Aluminium Extrusion Services </li>\r\n                <li>•	In-house capacities and capabilities</li>\r\n              </ul>\r\n            </div>\r\n          </div>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Common Industrial capabilities and Applications </h2>\r\n          </div>\r\n          <div class=\"mb-2 row\">\r\n            <div class=\"col-md-6\">\r\n              <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n                <li>•	Automotive </li>\r\n                <li>•	Aerospace </li>\r\n                <li>•	Transportation </li>\r\n                <li>•	Freight and Construction </li>\r\n              </ul>\r\n            </div>\r\n            <div class=\"col-md-6\">\r\n              <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n                <li>•	Medical devices </li>\r\n                <li>•	Electrical appliances and Consumer electronics</li>\r\n                <li>•	Heatsinks</li>\r\n                <li>•	Chipsets and boards</li>\r\n              </ul>\r\n            </div>\r\n          </div>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Premium Parts Custom Aluminium Extrusions</h2>\r\n          </div>\r\n          <div class=\"imgs\"><img src=\"/assets/img/temp/ser4_03.jpg\" alt=\"\"></div>\r\n          <p>Aluminium Extrusion is one of the exhaustive services provided at Premium Part. We offer custom aluminium extrusion services tailored to match the specific needs of the designer and project. Our process is optimized to minimize material waste and optimize the production of high quality aluminium extrusions possible. </p>\r\n          <p>From the simplest, basic shapes to complex geometries that demand tight tolerances, our aluminium extrusion process offers solutions for producing products and parts with definitive cross section profile. </p>\r\n          <p>The custom aluminium extrusion process begins with material grade selection, design conclusion, assembly protocols, functionality checks and post-production finishing, all of which make it very suitable for low-volume manufacturing and rapid prototyping that require quick turnaround. </p>\r\n        </div>', 0, 0, 1, 1, 'admin', '2020-04-17 09:18:16', '2020-04-17 14:02:19'),
(5, 'RAPID TOOLING', '/uploads/images/services/news_05.jpg', '/uploads/images/services/s5.jpg', '/uploads/images/services/ser5.jpg', 'Simplified and shorter lead time rapidv tooling to deliver low-mid volume production parts for cost reductionand capability repeatability', '<div class=\"section\">\r\n          <p>Rapid tooling is a rapid prototyping technique that is largely used in the place of conventional tooling to produce functional molds for lower costs and shorter lead times. This method of manufacturing combines rapid prototyping techniques with digital tenacity of electronic CAD data files to produce a mold instead of a part. Molds produced with rapid tooling services can then be used in any molding process to manufacture multiple copies of a part. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Rapid Tooling at Premium Parts</h2>\r\n          </div>\r\n          <div class=\"imgs\"><img src=\"/assets/img/temp/ser5_01.jpg\" alt=\"\"></div>\r\n          <p>Premium Part offers super-efficient and affordable rapid tooling services for the production of high-quality hardened steel and aluminium prototype tooling. Our services cut across both low-volume, bridge and mass production units that guarantees the delivery of production molds and parts in a variety of finish. Our services strongly emphasize the need for perfection, ensuring that design for manufacturability (DFM) is embodied in tailor-making your molds to specification. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>What use our Rapid Tooling Services? </h2>\r\n          </div>\r\n          <div class=\"mb-2 row\">\r\n            <div class=\"col-md-6\">\r\n              <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n                <li>•	Multi-process approach </li>\r\n                <li>•	Efficiency ratio</li>\r\n                <li>•	Excellent detailing and accuracy</li>\r\n                <li>•	Competitive rates </li>\r\n              </ul>\r\n            </div>\r\n            <div class=\"col-md-6\">\r\n              <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n                <li>•	Low and high-volume manufacturing options </li>\r\n                <li>•	High-strength molds and parts </li>\r\n                <li>•	Finishing variety </li>\r\n              </ul>\r\n            </div>\r\n          </div>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Advantages of Rapid Tooling </h2>\r\n          </div>\r\n          <p>Rapid tooling holds many advantages over the conventional tooling process. Some of the most important merits of employing rapid tooling includes: </p>\r\n          <h4 class=\"title\">•	Shorter lead times</h4>\r\n          <p>Reduce the normal time for tooling from weeks to days. </p>\r\n          <h4 class=\"title\">•	Low cost </h4>\r\n          <p>Offers a cost-effective approach for creation of complex geometry molds that would not be attainable with conventional tooling . </p>\r\n          <h4 class=\"title\">•	Direct production from CAD data files</h4>\r\n          <p>Ensure higher accuracy with direct production from digital CAD data files. </p>\r\n          <h4 class=\"title\">•	Automation </h4>\r\n          <p>Produce an endless array of tools with automated processes that require little or no human interaction from start to finish. </p>\r\n          <h4 class=\"title\">•	Error-free</h4>\r\n          <p>By building the tool from the direct master pattern, human error that could arise in conventional tooling is greatly avoided. </p>\r\n          <h4 class=\"title\">•	Speed </h4>\r\n          <p>One swift operation that cuts away time-consuming techniques to deliver high-quality molds in appreciable time frame. </p>\r\n          <h4 class=\"title\">•	Design possibilities</h4>\r\n          <p>Innovate with freedom and without restriction to bring complex shapes and pattern to live with digital capabilities integrated into the rapid tooling process. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Premium Parts Rapid Tooling Services</h2>\r\n          </div>\r\n          <div class=\"imgs\"><img src=\"/assets/img/temp/ser5_02.jpg\" alt=\"\"></div>\r\n          <p>The need for rapid tooling services is greatly emphasized by the fact-paced innovation in the manufacturing industry. As product needs across industries begin to expand, the need for quick production solutions that shortens the cycle from idea to mass production is understandably on the rise. At Premium part, we offer rapid tooling services that meet industry standards across various lines of industrial applications. We provide extensive material options to deliver highly durable parts along with a variety finish preferences to perfect your product. </p>\r\n          <p>Our design for manufacturability approach cuts through several tedious trial and error processes, using CAD data to capture and produce the best quality parts that are functional, tailor-made to specifications. </p>\r\n        </div>', 0, 0, 1, 1, 'admin', '2020-04-17 09:21:48', '2020-04-17 14:05:17'),
(6, 'PLASTIC INJECTION MOLDING', '/uploads/images/services/news_06.jpg', '/uploads/images/services/s6.jpg', '/uploads/images/services/ser6.jpg', 'Simplified and shorter lead time rapid tooling to deliver low-mid vilume production parts for cost', '<div class=\"section\">\r\n          <p>Our Plastic Injection Molding technique is a highly efficient and grossly scalable process that produces high-quality custom prototypes and production-grade parts. </p>\r\n          <p>At Premium Part, we take special care in optimizing our injection molding process across diverse material and end-use applications in order to deliver amazing parts that is stable, tailored-to-specifications and cost-efficient. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Injection Molding | How it works</h2>\r\n          </div>\r\n          <div class=\"imgs\"><img src=\"/assets/img/temp/ser6_01.jpg\" alt=\"\"></div>\r\n          <p>Plastic Injection Molding has seen diverse patronage across a wide array of industries. The versatility of the process helps to produce large volumes of production-grade plastic parts ready to serve Industrial, commercial and private uses. </p>\r\n          <p>Injection molding basically involves the infusion of molten resin into a metal die cavity under high pressure. The resin is then rapidly cooled to lower the temperature and aid the formation of a solid shape that fits the shape of the die.</p>\r\n          <p>The process may range from seconds to days or even weeks depending on the material, part size and design complexity</p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Material selection range </h2>\r\n          </div>\r\n          <h4 class=\"title\">•	Material selection range </h4>\r\n          <p>Choose from thousands of plastic materials all available from a guaranteed quality source. </p>\r\n          <h4 class=\"title\">•	Low-volume production, high speed delivery</h4>\r\n          <p>Expedite your high-grade production parts from volumes as low as 10 with extra fast deliveries. </p>\r\n          <h4 class=\"title\">•	Stability and consistency </h4>\r\n          <p>Plastic injection molding is known to deliver consistent quality across manufactured parts. </p>\r\n          <h4 class=\"title\">•	Tool life span</h4>\r\n          <p>Use and re-use your tool parts for thousands and millions of re-run cycles. </p>\r\n          <h4 class=\"title\">•	Excellent surface quality </h4>\r\n          <p>Avail yourself with our state-of-the-art machining capabilities that cover both quality and quantity needs. At Premium parts, we employ only the best solutions that are highly scalable and repeatable to deliver consistent quality all round your design project</p>\r\n          <h4 class=\"title\">•	Single supplier </h4>\r\n          <p>Get high quality products with excellent surface quality for customized finishing.</p>\r\n          <h4 class=\"title\">•	Production Tooling </h4>\r\n          <p>From 10k units and up, our production tooling services is perfect for high-volume production parts including steel and multi-cavity tooling. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Premium Part Plastic Injection Molding Services </h2>\r\n          </div>\r\n          <div class=\"imgs row\">\r\n            <div class=\"col-md-6\"><img src=\"/assets/img/temp/ser6_02.jpg\" alt=\"\"></div>\r\n            <div class=\"col-md-6\"><img src=\"/assets/img/temp/ser6_03.jpg\" alt=\"\"></div>\r\n          </div>\r\n          <p>Take advantage of our professional injection molding services and produce top-tier quality parts that match your specification and production needs. Our injection molded parts are hand-vetted and built to last. Here are some other reasons why we are your one-stop plastic injection molding service provider in China: </p>\r\n          <h4 class=\"title\">•	High Quality Parts </h4>\r\n          <p>Experienced operator with strict adherence with design, model and production specifications. All our parts are subject to a stringent in-house quality control service that ensures that we deliver only the best.</p>\r\n          <h4 class=\"title\">•	Experience and Expertise </h4>\r\n          <p>With over thousands projects completed amounting to million parts manufactured, our team is budding with experts and experience in both USA and Europe manufacturing markets.</p>\r\n          <h4 class=\"title\">•	Secure and Private </h4>\r\n          <p>We place special emphasis on maintaining the highest confidentiality and protect our customers designs and concepts. This is why we have ultra-secure file transfer and storage capabilities. Our in-house capacities also mean that all phases of your project are ran under the same roof or with our vetted local and overseas business partners. </p>\r\n          <h4 class=\"title\">•	Scalability and Precision </h4>\r\n          <p>Enjoy concurrent product quality across all production scales from 250 to 10,000+ parts. </p>\r\n          <h4 class=\"title\">•	Rapid turnaround</h4>\r\n          <p>Leveraging our network of resources will see us produce top tier, production-grade molded parts in 10 days or earlier.</p>\r\n          <h4 class=\"title\">•	Cost and Efficiency </h4>\r\n          <p>When running higher volumes, our cost-efficient injection molding process delivers less waste and lower price per part, giving you the ability to scale up your profit and minimize losses. </p>\r\n        </div>', 0, 0, 1, 1, 'admin', '2020-04-17 09:22:25', '2020-04-17 14:08:14'),
(7, 'DIE CASTING', '/uploads/images/services/news_07.jpg', '/uploads/images/services/s7.jpg', '/uploads/images/services/ser7.jpg', 'Custom design die casting tool for medium and high-volume manufacturing', '<div class=\"section\">\r\n          <p>Pressure die casting service involves injection of molten metal into a mold cavity or steel die to produce strong, functional and trustworthy parts of your design. The process is similar to injection molding, and is a guaranteed method of producing average to substantial volumes of metal parts. Premium Part employs the use of state-of-the-art machines and high-quality pressure casting dies to produce parts with excellent surface finish, tight tolerances and inch-perfect dimensional precision. </p>\r\n          <p>With varied and extensive experience in die casting, our process is dynamic, effective and cost-optimal. Choose from zinc, aluminium, magnesium to accommodate your material, end-use and volume needs. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>The Pressure Die Casting Process</h2>\r\n          </div>\r\n          <div class=\"imgs\"><img src=\"/assets/img/temp/ser7_01.jpg\" alt=\"\"></div>\r\n          <p>Our pressure die casting process basically consists of 7 steps. Die cast parts are manufactured in steel molds similar to the ones used in injection molding under high pressure and cooled to set into the shape of the casting. Our premium die casting manufacturing process can be summarized as follows: </p>\r\n          <h4 class=\"title\">•	Clamping </h4>\r\n          <p>Here, the dies are cleaned and lubricated. The die halves are then closed and clamped under high pressure. </p>\r\n          <h4 class=\"title\">•	Injection </h4>\r\n          <p>During the injection phase, the molten metal is injected and forced into the clamped die under extremely high pressure. The molten metal is kept in the die until it solidifies. </p>\r\n          <h4 class=\"title\">•	Cooling</h4>\r\n          <p>The molten metal which is now in the die is then cooled. This process is important to allow the solidification of the metal. The cooled metal fully forms the part and takes the shape of the casting. </p>\r\n          <h4 class=\"title\">•	Ejection </h4>\r\n          <p>Once the metal has cooled, the ejection process begins. Here, the die halves are unclamped and the solidified part is pushed out of the die. </p>\r\n          <h4 class=\"title\">•	Trimming </h4>\r\n          <p>This process is a pre-finishing process that ensures the removal of excess metals in the sprue and runner along with any splash or metal debris. These extra materials are removed from the final die-casted product to ensure cleanliness, dimensional and physical accuracy.</p>\r\n          <h4 class=\"title\">•	Recycling</h4>\r\n          <p>At Premium part, we strive to optimize material utility. After trimming of extra material from the runner and sprue, we reprocess these materials for the next set of die-casting process to ensure higher product yield from material input. </p>\r\n          <h4 class=\"title\">•	Finishing service</h4>\r\n          <p>After completing the die-casting process, we offer high quality finishing services ranging from polishing, plating, painting, sandblasting and powder coating. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Why use our Die Casting Services?</h2>\r\n          </div>\r\n          <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n            <li>•	Relatively lower cost compared to other processes </li>\r\n            <li>•	Mold tools can be used to produce tens of thousands of parts before replacement </li>\r\n            <li>•	Excellent surface finish and dimensional accuracy</li>\r\n            <li>•	Achieve durable and dimensionally stable complex geometries for small and large metal parts with little or no need for post die-casting machining </li>\r\n            <li>•	Faster turnaround for medium or large production parts</li>\r\n            <li>•	Stronger parts with more temperature and pressure resistance </li>\r\n            <li>•	Precision production for design needs with tighter tolerances </li>\r\n            <li>•	Custom finish options that allows for the production of smooth or textured parts</li>\r\n          </ul>\r\n          <p style=\"color:#999;\">We also offer a variety of colour and plating finishes that can improve cosmetic performance or corrosion resistance. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Premium Part Pressure Die Casting Service</h2>\r\n          </div>\r\n          <div class=\"imgs\"><img src=\"/assets/img/temp/ser7_02.jpg\" alt=\"\"></div>\r\n          <p>At Premium Part, our engineering and design specialists are ready to partner with you and deliver high-quality production parts in as fast as 15 days. Contact us for all your die-casting need from design optimization to raw material selection. Our quality control and assurance guarantees the quality of your raw materials and finished products against the toughest quality standards. </p>\r\n          <p>You can send us your CAD files for free and let us proceed to give you the best pricing for our array of services. </p>\r\n        </div>', 0, 0, 1, 1, 'admin', '2020-04-17 09:22:59', '2020-04-17 14:09:56'),
(8, '3D PRINTING', '/uploads/images/services/news_08.jpg', '/uploads/images/services/s8.jpg', '/uploads/images/services/ser8.jpg', 'Cutting edge technology 3D printing service to satisfy your prototyper and production', '<div class=\"section\">\r\n          <p>3D Printing, alternatively termed “additive manufacturing” is a production technique used to produce high-quality precision parts by printing a digital model file into a 3-dimensional object using a material substance layer by layer. At Premium Part, our Industrial 3D printing capabilities provides you with an array of services suitable for every stage of your design cycle, from prototyping to final product in as quick as 3 days. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>3D Plastic Printing</h2>\r\n          </div>\r\n          <div class=\"imgs\"><img src=\"/assets/img/temp/ser8_01.jpg\" alt=\"\"></div>\r\n          <p>Develop iterative, innovative, functional and quality prototype and custom parts with our 3D Plastic Printing. 3D Plastic Printing offers one of the most cost-efficient and fastest printing solutions in the business. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>3D Metal Printing </h2>\r\n          </div>\r\n          <div class=\"imgs\">\r\n            <div class=\"row\">\r\n              <div class=\"col-md-6\"><img src=\"/assets/img/temp/ser8_02.jpg\" alt=\"\"></div>\r\n              <div class=\"col-md-6\"><img src=\"/assets/img/temp/ser8_03.jpg\" alt=\"\"></div>\r\n            </div>\r\n          </div>\r\n          <p>Take advantage of our DMLS or SLM printing processes to print a wide range of metal 3D parts suitable for application across extensive industries. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Our 3D techniques </h2>\r\n          </div>\r\n          <h4 class=\"title\">•	Fused Deposition Modelling (FDM)</h4>\r\n          <p>Inarguably the most widely used 3D printing technique suitable for design validation and low-volume prototyping. </p>\r\n          <h4 class=\"title\">•	Stereolithography (SLA)</h4>\r\n          <p>Efficient 3D printing technique that uses a UV laser and liquid thermoset resin to form production-grade parts. Ideal for projects where visual appeal is key and injection-mold like finishes are desired.</p>\r\n          <h4 class=\"title\">•	Selective Laser Sintering (SLS)</h4>\r\n          <p>Create finely fused thermoplastic parts with excellent mechanical and functional properties in small batches using our SLS 3D printing process. </p>\r\n          <h4 class=\"title\">•	Direct Metal Laser Sintering (DMLS) / Selective Laser Melting (SLM)</h4>\r\n          <p>A powerful combination of fibre-laser system and atomized powder to conjure fully functional metal part that can serve automotive, aerospace and even medical industries. Both of these technologies are similar to SLS but while SLS isn’t used for metallic parts, SMLS and SLM are used for the production of parts from single element materials and metal alloys. </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Advantages of 3D Printing Services</h2>\r\n          </div>\r\n          <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n            <li>•	Cost-effective option for prototyping and low-volume production</li>\r\n            <li>•	Effectively produce parts with complex geometries </li>\r\n            <li>•	Quick turnaround times</li>\r\n            <li>•	Material selection range</li>\r\n            <li>•	Minimum material waste </li>\r\n            <li>•	Multiple precision parts with high repeatability and scalability</li>\r\n          </ul>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"title-section-v4\">\r\n            <h2>Why Premium Part 3D Printing Services? </h2>\r\n          </div>\r\n          <ul class=\"no-style\" style=\"font-weight:bold;\">\r\n            <li>•	Our way of producing parts ensures accuracy, consistency, repeatability and scalability in the production design so that you get guaranteed quality production-grade parts every time. </li>\r\n            <li>•	Our process is designed to deliver strong and durable 3D parts across a wide array of simple and complex geometry parts. </li>\r\n            <li>•	Understanding the rapid needs of designers and product developers, we have optimized our 3D printing services to quote, produces and deliver in as fast as 3 days </li>\r\n            <li>•	Premium Part’s 3D printing services is highly scalable and grossly repeatable across varying volumes of production. </li>\r\n            <li>•	We provide you varies of material selection options for both plastic and metal 3D printing services. </li>\r\n            <li>•	Our ability to generate minimal material waste and produce ultralight parts when necessary shows our diversity and readiness for application in diverse industries. With all other non-3D manufacturing techniques available, you can accelerate your production of great parts in-house by taking avail of our subtractive manufacturing services when needed. </li>\r\n            <li>•	Post machining can be achieved in our house to ensure the high accuracy of parts. </li>\r\n          </ul>\r\n        </div>', 0, 0, 1, 1, 'admin', '2020-04-17 09:23:37', '2020-04-17 14:12:49');
INSERT INTO `qnz_service_items` (`id`, `title`, `thumbnail`, `image_url`, `banner`, `summary`, `content`, `importance`, `view_count`, `active`, `recommend`, `added_by`, `created_at`, `updated_at`) VALUES
(9, 'FINISHING', '/uploads/images/services/news_09.jpg', '/uploads/images/services/s9.jpg', '/uploads/images/services/ser9.jpg', 'Excellent multi way post machiningsurface finishing to ensure your special needs for', '<div class=\"section\">\r\n          <p>Finishing services is the umbrella term to describe the different processes we use to alter the surface appearance, durability and functionality of a product. </p>\r\n          <p>At Premium Part, we fully comprehend the importance of excellence in product finishes. From techniques used to deliver visual appeal and aesthetics such as painting and plating, to those related to other industrial attributes such as surface adherence, resistance to corrosion, shininess, conductivity and hardness, our finishing services are well diversified to accommodate all of your production needs. </p>\r\n          <p>We offer premium surface finishing options for all types of material parts and components and handle all volumes of parts regardless of whether you have produced them at our facilities or not. Explore our different standard and customizable finishing services available to all our client to help you find the perfect finish for your parts: </p>\r\n        </div>\r\n        <div class=\"section\">\r\n          <div class=\"imgs\">\r\n            <div class=\"row\">\r\n              <div class=\"col-md-6\"><img src=\"/assets/img/temp/ser9_01.jpg\" alt=\"\"></div>\r\n              <div class=\"col-md-6\"><img src=\"/assets/img/temp/ser9_02.jpg\" alt=\"\"></div>\r\n            </div>\r\n          </div>\r\n          <h4 class=\"title\">•	Painting </h4>\r\n          <p>Painting may be considered basic, but remains one of the best way to deliver visual appeal. At Premium part, we offer high quality spray painting over a wide array of colours, palettes and finishes. With only the finest materials, we provide custom paint options that will remain uniform across all your parts with the highest quality standards and certifications. Choose between matte to semi-glossy, flat or glossy, satin, smooth or textured finishes and be rest assured of a professional paint job that will crown your product.</p>\r\n          <h4 class=\"title\">•	High-gloss polishing </h4>\r\n          <p>Get that shiny mirror-like appearance by polishing your metal with a moderately-rough sandpaper for a high-decorative finish. We use a systemic process that enables us to have the perfect finish using different grains of diamond paste. </p>\r\n          <h4 class=\"title\">•	Anodizing </h4>\r\n          <p>Anodizing your parts will not only deliver visual effects, it helps to improve corrosion resistance, reduce wear and tear, promote heat dissipation and improve surface hardness. Our anodizing process is excellent for painting and priming and may be used in conjunction with dyes and tints to deliver a variety of visual aesthetics that make your parts look and feel premium. Anodizing is more popular in electronics and is one of the most popular methods that smartphone giant Apple uses in over 80 percent of her products. </p>\r\n          <h4 class=\"title\">•	Blasting </h4>\r\n          <p>This process involves the use of an abrasive media sprayed with utmost accuracy and control to clean and deburr your part. Blasting is excellent for imprinting unique and custom textures and can be done with a wide array of media.</p>\r\n          <h4 class=\"title\">•	Logo and inscriptions </h4>\r\n          <p>Mark your custom printing and etch your desired finish on your product. Premium part offers a variety of ways to etch and engrave logos, inscriptions, trademarks and more on your part without ruining the surface appearance while achieving precision and permanent markings that will never fade off. </p>\r\n          <h4 class=\"title\">•	Electrophoresis  </h4>\r\n          <p>This is the application of a special paint film that allows for a hard, adhesive and corrosion-resistant surface. At premium part, we offer electrophoresis to deliver many desired effects ranging from surface protection, discolouration resistance, anti-corrosion performance and much more. </p>\r\n          <h4 class=\"title\">•	Tinting  </h4>\r\n          <p>Add character to your ABS, PMMA, PC or PS parts by applying the perfect shade of tint. Tinting is excellent for colouring plastic prototypes such as tail lights and turn signals. </p>\r\n          <p>If your products are going to look, feel and function as intended, it is essential to apply the right techniques to obtain the best results. Today, at Premium Part, our solutions span across prototyping to manufacturing and finishing. With utmost attention to details, our design specialists and engineers are poised to deliver full in-house solutions from anodizing to polishing, painting, plating and more. </p>\r\n        </div>', 0, 0, 1, 1, 'admin', '2020-04-17 09:24:15', '2020-04-17 14:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_social_accounts`
--

CREATE TABLE `qnz_social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qrcode` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(10) UNSIGNED NOT NULL,
  `social_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_social_accounts`
--

INSERT INTO `qnz_social_accounts` (`id`, `username`, `url`, `qrcode`, `importance`, `social_id`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '13212847@qq.com', 'http://www.google.com', '/uploads/images/qrcode.jpg', 0, 1, 1, 'admin', '2020-04-23 14:34:22', '2020-04-23 14:38:10'),
(2, '13212847@qq.com【拷贝】', 'http://www.google.com', '/uploads/images/qrcode.jpg', 0, 1, 1, 'admin', '2020-04-23 14:38:55', '2020-04-23 14:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_social_softwares`
--

CREATE TABLE `qnz_social_softwares` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iconfont` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_social_softwares`
--

INSERT INTO `qnz_social_softwares` (`id`, `name`, `icon`, `iconfont`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'QQ', '/uploads/images/qrcode.jpg', 'icon-qq', 0, 1, 'admin', '2020-04-23 13:51:47', '2020-04-23 13:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_teams`
--

CREATE TABLE `qnz_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_letter` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interests` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `school` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `homepage` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `introduction` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `fullphoto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `importance` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_teams`
--

INSERT INTO `qnz_teams` (`id`, `name`, `first_letter`, `post`, `interests`, `education`, `email`, `office_phone`, `school`, `homepage`, `lang`, `introduction`, `photo`, `fullphoto`, `content`, `importance`, `category_id`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(3, '王立平', 'W', '院长', NULL, NULL, NULL, NULL, NULL, NULL, 'zh-CN', NULL, '/uploads/images/teams/wangliping.jpg', '', '<div class=\"box\">\r\n<h4>个人简介</h4>\r\n\r\n<p>中国科学院深圳先进技术研究院脑认知与脑疾病研究所所长、广东省脑连接图谱重点实验室主任、深圳神经精神调控重点实验室主任，博士生导师。国家基金委杰出青年基金（2014）获得者、教育部长江学者特聘教授（2017）、万人计划科技创新领军人才（2016）、科技部中青年科技创新领军人才（2014）、中科院百人计划（2010）入选者。担任中国神经科学学会中国认知科学学会理事，中国神经科学学会神经科学技术研究分会主任委员。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<h4>主要研究方向</h4>\r\n\r\n<p>精神疾病病理生理机制的研究，着重于本能恐惧情绪神经环路生理机制的跨物种解析，以及精神疾病发生的神经环路病理机制和干预策略。已经发表SCI论文53篇（其中第一作者/通讯作者Nature及其子刊论文7篇），被他人引用2500余次，单篇最高被引用超过840次。公开国家发明专利60余件，其中授权近40件。承担的科研项目主要包括基金委杰出青年基金项目、科学院脑科学战略先导专项、国际大科学合作等21项。曾担任中美科学前沿论坛中方组委（2011）、共同主席（2012）、中德科学前沿论坛中方主席（2014）、组委（2015）。</p>\r\n</div>\r\n', 950, 4, 1, 'admin', '2020-05-16 06:52:50', '2020-06-27 13:40:27'),
(4, '周晖晖', 'Y', '副院长', NULL, NULL, NULL, NULL, NULL, NULL, 'zh-CN', NULL, '/uploads/images/teams/zhouhuihui.jpg', '', ' <div class=\"box\">\r\n                <h4>个人简介</h4>\r\n                <p>中国科学院深圳先进技术研究院脑认知与脑疾病研究所副所长、脑智能研究中心主任，博士生导师。国家中科院百人计划（2015）入选者。担任中国认知科学学会认知计算与人工智能工作委员会委员。</p>\r\n              </div>\r\n              <div class=\"box\">\r\n                <h4>主要研究方向</h4>\r\n                <p>非人灵长类视觉认知、认知障碍、神经网络模型与类脑计算等。以通讯/共同通讯作者在国际顶级期刊Nature, Neuron (IF 14.3) 发表论文3篇，论文总他引900余次，成果被Neuron、F1000等推荐多次。主持国家科技部、自然科学基金委、中科院等国家和省部级项目7项，作为核心骨干参与4项。</p>\r\n              </div>', 900, 4, 1, 'admin', '2020-05-16 06:53:28', '2020-06-27 13:40:15'),
(5, '陈宇', 'C', '院长助理', NULL, NULL, NULL, NULL, NULL, NULL, 'zh-CN', NULL, '/uploads/images/teams/chenyu.jpg', '', '<div class=\"box\">\r\n<h4>个人简介</h4>\r\n\r\n<p>中国科学院深圳先进技术研究院研究员，脑疾病中心主任。申报人专注于神经发育和可塑性的分子机理，以及阿尔茨海默症等神经退行性疾病的病理生理学等方面的研究。他发现了多种细胞表面受体酪氨酸激酶（RTK）在树突和突触发育过程中的关键作用，提示了神经信号传递的新分子机制及其病变条件下的异常调控方式；他也通过首个针对中国阿尔茨海默症（AD）患者的全基因组测序研究揭示了新的风险基因和信号网络，为疾病的诊断和治疗提供了重要线索。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<h4>主要研究方向</h4>\r\n\r\n<p>他在Nature Neuroscience、PNAS、Journal of Cell Biology、Pharmacology &amp; Therapeutics等优秀学术期刊上发表 19篇论文，并申请了1项国际专利。</p>\r\n</div>\r\n', 899, 4, 1, 'admin', '2020-05-16 06:54:13', '2020-06-27 13:42:04'),
(6, '屠洁', 'T', '院长助理', NULL, NULL, NULL, NULL, NULL, NULL, 'zh-CN', NULL, '/uploads/images/teams/tujie.jpg', '', '<div class=\"box\">\r\n                <h4>个人简介</h4>\r\n                <p>中国科学院深圳先进技术研究院脑认知与脑疾病研究所所所长助理，博士生导师，深圳市海外高层次人才(B类)，深圳市地方级领军人才。加入先进院后，致力于：脑疾病的神经环路和细胞机制；胶质细胞对受损神经环路的修复和调控机制等方向研究。</p>\r\n              </div>\r\n              <div class=\"box\">\r\n                <h4>最主要贡献</h4>\r\n                <p>作为团队核心成员，搭建了国内最为完善的高时空精准细胞调控技术平台，并将该技术体系广泛地用于各类脑疾病动物模型干预的应用基础研究。这一系列的工作分别获得了广东省自然科学奖一等奖（2018）、深圳市自然科学奖一等奖（2017）和二等奖（2013）。现主持国家自然科学基金委面上项目、国际（地区）合作项目（NSFC-RGC）、中科院国际合作局重点项目等；以课题核心骨干身份参与科技部973课题、科技部先导专项（B类）、广东省重点领域研发计划项目等。已发表SCI期刊论文12篇，他引311次，单篇他引最高达184次；其中第一（含共同一作）/通讯作者论文8篇；研究成果发表于包括Nature、Cell子刊Nature Communications，Cell Reports等。</p>\r\n              </div>\r\n              <div class=\"box\">\r\n                <h4>获得发明专利</h4>\r\n                <p>申请人已获授权国家发明专利16项，申请专利11项。现任国际期刊Frontiers in Molecular Neuroscience的Review Editor。</p>\r\n              </div>', 895, 4, 1, 'admin', '2020-05-16 06:54:46', '2020-06-27 13:43:48'),
(7, '王枫', 'W', '院长助理', NULL, NULL, NULL, NULL, NULL, NULL, 'zh-CN', NULL, '/uploads/images/teams/wangfeng.jpg', '', '<div class=\"box\">\r\n                <h4>个人简介</h4>\r\n                <p>中国科学院深圳先进技术研究院脑认知与脑疾病研究所副研究员，2006年本科毕业于第四军医大学临床医学专业，2012年于第四军医大学获博士学位，2013年赴加拿大渥太华大学精神健康研究所开展博士后研究。</p>\r\n              </div>\r\n              <div class=\"box\">\r\n                <h4>主要研究方向</h4>\r\n                <p>内源性大麻素系统对负性情绪的神经环路调控机制。主持1项国防科技青年创新培育课题、主持完成1项国家自然科学基金青年项目，发表SCI收录论文24篇，其中第一/通讯作者10篇（JCR一区5篇）。作为申报材料撰写及答辩工作主要负责人，曾帮助团队先后获得教育部创新团队（2011）、 “973”项目（2013）、国家自然科学基金重大国际合作项目（2014）、国家科技进步一等奖（2011）、陕西省科学技术进步一等奖（2016）等。</p>\r\n              </div>', 890, 4, 1, 'admin', '2020-05-16 06:55:19', '2020-06-27 13:44:56'),
(8, '陈培华', 'C', '副研究员', '', '', '', '', '浙江大学', '', 'zh-CN', NULL, '/uploads/images/teams/chenpeihua.jpg', '', '<p>...</p>\r\n', 889, 3, 1, 'admin', '2020-05-16 06:55:50', '2020-06-28 01:32:08'),
(9, '陈宇', 'C', '研究员', '', '', '', '', '香港科技大学', '', 'zh-CN', NULL, '/uploads/images/teams/chenyu-1.jpg', '', '<p>...</p>\r\n', 888, 3, 1, 'admin', '2020-05-16 06:57:33', '2020-06-28 01:33:49'),
(10, '陈岳文', 'C', '副研究员', '', '', '', '', '香港科技大学', '', 'zh-CN', NULL, '/uploads/images/teams/chenyuewen.jpg', '', '<p>。。。</p>\r\n', 887, 3, 1, 'admin', '2020-05-16 06:58:24', '2020-06-28 01:40:42'),
(11, '陈祖昕', 'C', '副研究员', '', '', '', '', '纽约西奈山医学院', '', 'en', '', '/uploads/images/teams/chenzuxin.jpg', '', '<p>。。。</p>\r\n', 886, 2, 1, 'admin', '2020-05-16 06:58:55', '2020-07-19 17:46:46'),
(12, '戴辑', 'D', '副研究员', '', '', '', '', '中国科学院', '', 'zh-CN', NULL, '/uploads/images/teams/daiji.jpg', '', '<p>...</p>\r\n', 885, 3, 1, 'admin', '2020-05-16 06:59:21', '2020-06-28 03:13:05'),
(13, '邓春山', 'D', '高级工程师', '', '', '', '', 'NIH', '', 'zh-CN', NULL, '/uploads/images/teams/dengchunshan.jpg', '', '<p>...</p>\r\n', 884, 3, 1, 'admin', '2020-05-16 06:59:51', '2020-06-28 03:14:28'),
(14, '都展宏', 'D', '副研究员', '', '', '', '', '匹兹堡大学', '', 'zh-CN', NULL, '/uploads/images/teams/duzhuanhong.jpg', '', '<p>...</p>\r\n', 0, 3, 1, 'admin', '2020-05-16 07:00:45', '2020-06-28 03:15:28'),
(15, '高亮', 'G', '副研究员', '', '', '', '', '海德堡大学', '', 'en', '', '/uploads/images/teams/gaoliang.jpg', '', '<p>。。。</p>\r\n', 0, 3, 1, 'admin', '2020-05-16 07:01:16', '2020-07-19 17:21:46'),
(16, '洪伟', 'H', '副研究员', '', '', '', '', '哈佛大学', '', 'zh-CN', NULL, '/uploads/images/teams/hongwei.jpg', '', '<p>...</p>\r\n', 0, 3, 1, 'admin', '2020-05-16 07:01:33', '2020-06-28 03:17:25'),
(17, '黄天文', 'H', '研究员', '', '', '', '', '哈佛大学', '', 'zh-CN', NULL, '/uploads/images/teams/huantianwei.jpg', '', '<p>。。。</p>\r\n', 0, 3, 1, 'admin', '2020-06-28 03:19:58', '2020-06-28 03:19:58'),
(18, '黄艳', 'H', '副研究员', '', '', '', '', '中国科学院', '', 'zh-CN', NULL, '/uploads/images/teams/huanyan.jpg', '', '<p>...</p>\r\n', 0, 3, 1, 'admin', '2020-06-28 03:22:17', '2020-06-28 03:22:17'),
(19, '李翔', 'L', '研究员', '', '', '', '', '哥伦比亚大学', '', 'zh-CN', NULL, '/uploads/images/teams/lixiang.jpg', '', '<p>...</p>\r\n', 0, 3, 1, 'admin', '2020-06-28 03:23:13', '2020-06-28 03:23:13'),
(20, '李骁健', 'L', '正高级工程师', '', '', '', '', '美国西北大学', '', 'zh-CN', NULL, '/uploads/images/teams/liyaojian.jpg', '', '<p>...</p>\r\n', 0, 3, 1, 'admin', '2020-06-28 03:24:04', '2020-06-28 03:24:04'),
(21, '刘畅', 'L', '研究员', '', '', '', '', '布兰迪斯大学', '', 'zh-CN', NULL, '/uploads/images/teams/liuchuang.jpg', '', '<p>...</p>\r\n', 0, 3, 1, 'admin', '2020-06-28 03:25:57', '2020-06-28 03:25:57'),
(22, '刘欣安', 'L', '副研究员', '', '', '', '', '纽约西奈山医学院', '', 'zh-CN', NULL, '/uploads/images/teams/liuxinan.jpg', '', '<p>...</p>\r\n', 0, 3, 1, 'admin', '2020-06-28 03:26:58', '2020-06-28 03:26:58'),
(23, '孙坚源', 'S', '研究员', '', '', '', '', '华盛顿大学', '', 'zh-CN', NULL, '/uploads/images/teams/sunjingyuan.jpg', '', '<section class=\"s2\">\r\n<h3 class=\"title1\">...</h3>\r\n</section>\r\n', 0, 3, 1, 'admin', '2020-06-28 03:31:22', '2020-06-28 03:37:23'),
(24, '王立平【en】', 'W', '院长', '', '', '', '', '', '', 'en', '', '/uploads/images/teams/wangliping.jpg', '', '<div class=\"box\">\r\n<h4>个人简介</h4>\r\n\r\n<p>中国科学院深圳先进技术研究院脑认知与脑疾病研究所所长、广东省脑连接图谱重点实验室主任、深圳神经精神调控重点实验室主任，博士生导师。国家基金委杰出青年基金（2014）获得者、教育部长江学者特聘教授（2017）、万人计划科技创新领军人才（2016）、科技部中青年科技创新领军人才（2014）、中科院百人计划（2010）入选者。担任中国神经科学学会中国认知科学学会理事，中国神经科学学会神经科学技术研究分会主任委员。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<h4>主要研究方向</h4>\r\n\r\n<p>精神疾病病理生理机制的研究，着重于本能恐惧情绪神经环路生理机制的跨物种解析，以及精神疾病发生的神经环路病理机制和干预策略。已经发表SCI论文53篇（其中第一作者/通讯作者Nature及其子刊论文7篇），被他人引用2500余次，单篇最高被引用超过840次。公开国家发明专利60余件，其中授权近40件。承担的科研项目主要包括基金委杰出青年基金项目、科学院脑科学战略先导专项、国际大科学合作等21项。曾担任中美科学前沿论坛中方组委（2011）、共同主席（2012）、中德科学前沿论坛中方主席（2014）、组委（2015）。</p>\r\n</div>\r\n', 950, 4, 1, 'admin', '2020-07-19 14:23:25', '2020-07-19 14:23:43'),
(25, '周晖晖【en】', 'Y', '副院长', '', '', '', '', '', '', 'en', '', '/uploads/images/teams/zhouhuihui.jpg', '', '<div class=\"box\">\r\n<h4>个人简介</h4>\r\n\r\n<p>中国科学院深圳先进技术研究院脑认知与脑疾病研究所副所长、脑智能研究中心主任，博士生导师。国家中科院百人计划（2015）入选者。担任中国认知科学学会认知计算与人工智能工作委员会委员。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<h4>主要研究方向</h4>\r\n\r\n<p>非人灵长类视觉认知、认知障碍、神经网络模型与类脑计算等。以通讯/共同通讯作者在国际顶级期刊Nature, Neuron (IF 14.3) 发表论文3篇，论文总他引900余次，成果被Neuron、F1000等推荐多次。主持国家科技部、自然科学基金委、中科院等国家和省部级项目7项，作为核心骨干参与4项。</p>\r\n</div>\r\n', 900, 4, 1, 'admin', '2020-07-19 14:23:51', '2020-07-19 14:24:10'),
(26, '陈宇【en】', 'C', '院长助理', '', '', '', '', '', '', 'en', '', '/uploads/images/teams/chenyu.jpg', '', '<div class=\"box\">\r\n<h4>个人简介</h4>\r\n\r\n<p>中国科学院深圳先进技术研究院研究员，脑疾病中心主任。申报人专注于神经发育和可塑性的分子机理，以及阿尔茨海默症等神经退行性疾病的病理生理学等方面的研究。他发现了多种细胞表面受体酪氨酸激酶（RTK）在树突和突触发育过程中的关键作用，提示了神经信号传递的新分子机制及其病变条件下的异常调控方式；他也通过首个针对中国阿尔茨海默症（AD）患者的全基因组测序研究揭示了新的风险基因和信号网络，为疾病的诊断和治疗提供了重要线索。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<h4>主要研究方向</h4>\r\n\r\n<p>他在Nature Neuroscience、PNAS、Journal of Cell Biology、Pharmacology &amp; Therapeutics等优秀学术期刊上发表 19篇论文，并申请了1项国际专利。</p>\r\n</div>\r\n', 899, 4, 1, 'admin', '2020-07-19 14:24:48', '2020-07-19 14:25:02'),
(27, '屠洁【en】', 'T', '院长助理', '', '', '', '', '', '', 'en', '', '/uploads/images/teams/tujie.jpg', '', '<div class=\"box\">\r\n<h4>个人简介</h4>\r\n\r\n<p>中国科学院深圳先进技术研究院脑认知与脑疾病研究所所所长助理，博士生导师，深圳市海外高层次人才(B类)，深圳市地方级领军人才。加入先进院后，致力于：脑疾病的神经环路和细胞机制；胶质细胞对受损神经环路的修复和调控机制等方向研究。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<h4>最主要贡献</h4>\r\n\r\n<p>作为团队核心成员，搭建了国内最为完善的高时空精准细胞调控技术平台，并将该技术体系广泛地用于各类脑疾病动物模型干预的应用基础研究。这一系列的工作分别获得了广东省自然科学奖一等奖（2018）、深圳市自然科学奖一等奖（2017）和二等奖（2013）。现主持国家自然科学基金委面上项目、国际（地区）合作项目（NSFC-RGC）、中科院国际合作局重点项目等；以课题核心骨干身份参与科技部973课题、科技部先导专项（B类）、广东省重点领域研发计划项目等。已发表SCI期刊论文12篇，他引311次，单篇他引最高达184次；其中第一（含共同一作）/通讯作者论文8篇；研究成果发表于包括Nature、Cell子刊Nature Communications，Cell Reports等。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<h4>获得发明专利</h4>\r\n\r\n<p>申请人已获授权国家发明专利16项，申请专利11项。现任国际期刊Frontiers in Molecular Neuroscience的Review Editor。</p>\r\n</div>\r\n', 895, 4, 1, 'admin', '2020-07-19 14:25:11', '2020-07-19 14:25:26'),
(28, '王枫【en】', 'W', '院长助理', '', '', '', '', '', '', 'en', '', '/uploads/images/teams/wangfeng.jpg', '', '<div class=\"box\">\r\n<h4>个人简介</h4>\r\n\r\n<p>中国科学院深圳先进技术研究院脑认知与脑疾病研究所副研究员，2006年本科毕业于第四军医大学临床医学专业，2012年于第四军医大学获博士学位，2013年赴加拿大渥太华大学精神健康研究所开展博士后研究。</p>\r\n</div>\r\n\r\n<div class=\"box\">\r\n<h4>主要研究方向</h4>\r\n\r\n<p>内源性大麻素系统对负性情绪的神经环路调控机制。主持1项国防科技青年创新培育课题、主持完成1项国家自然科学基金青年项目，发表SCI收录论文24篇，其中第一/通讯作者10篇（JCR一区5篇）。作为申报材料撰写及答辩工作主要负责人，曾帮助团队先后获得教育部创新团队（2011）、 &ldquo;973&rdquo;项目（2013）、国家自然科学基金重大国际合作项目（2014）、国家科技进步一等奖（2011）、陕西省科学技术进步一等奖（2016）等。</p>\r\n</div>\r\n', 890, 4, 1, 'admin', '2020-07-19 14:25:31', '2020-07-19 14:25:42');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_teams_organizations`
--

CREATE TABLE `qnz_teams_organizations` (
  `organizations_id` int(10) UNSIGNED NOT NULL,
  `teams_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qnz_team_categories`
--

CREATE TABLE `qnz_team_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` json NOT NULL,
  `title_tmp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_team_categories`
--

INSERT INTO `qnz_team_categories` (`id`, `title`, `title_tmp`, `description`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '{\"en\": \"Other\", \"zh-CN\": \"其它\"}', '其它', '', 0, 1, 'admin', '2020-04-07 08:12:07', '2020-08-09 05:03:32'),
(2, '{\"en\": \"Associate investigators\", \"zh-CN\": \"副高级序列\"}', '副高级序列', '', 0, 1, 'admin', '2020-04-07 08:12:46', '2020-08-09 05:04:16'),
(3, '{\"en\": \"Principal investigators\", \"zh-CN\": \"正高级序列\"}', '正高级序列', '', 0, 1, 'admin', '2020-05-16 06:48:47', '2020-08-09 05:03:51'),
(4, '{\"en\": \"Directors\", \"zh-CN\": \"现任领导\"}', '现任领导', NULL, 0, 1, 'admin', '2020-05-16 06:49:30', '2020-08-09 05:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_users`
--

CREATE TABLE `qnz_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `passwordhash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_users`
--

INSERT INTO `qnz_users` (`id`, `username`, `email`, `photo`, `passwordhash`, `last_login`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'twotong@gmail.com', '/uploads/images/teams/team-member-2.jpg', '$2y$08$JHPlujf04sh9KIO5Mf.Io.mUYYAP9DH99eKjjpmZVTkq3oiGtfMDy', '2020-04-18 09:58:20', 1, 'admin', '2020-04-18 09:58:20', '2020-04-18 12:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_videos`
--

CREATE TABLE `qnz_videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'zh-CN',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file_url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `file_size` int(10) UNSIGNED NOT NULL,
  `poster` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_videos`
--

INSERT INTO `qnz_videos` (`id`, `lang`, `title`, `file_url`, `file_size`, `poster`, `description`, `importance`, `category_id`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'en', '游学画册', '/uploads/videos/Background02.mp4', 1800358, '/uploads/videos/blog1.jpg', 'test', 0, 1, 1, 'admin', '2020-04-19 06:25:09', '2020-08-09 08:38:02'),
(2, 'en', '游学画册', '/uploads/videos/Background02.mp4', 1800358, '/uploads/videos/blog1.jpg', 'test', 0, 1, 1, 'admin', '2020-04-19 06:25:12', '2020-08-09 08:38:15'),
(3, 'zh-CN', '游学画册', '/uploads/videos/Background02.mp4', 1800358, '/uploads/videos/blog1.jpg', 'test', 0, 1, 1, 'admin', '2020-04-19 06:25:13', '2020-08-09 08:38:30'),
(4, 'en', '游学画册', '/uploads/videos/Background02.mp4', 1800358, '/uploads/videos/blog1.jpg', 'test', 0, 1, 1, 'admin', '2020-04-19 06:25:14', '2020-08-09 08:39:21'),
(5, 'zh-CN', '游学画册', '/uploads/videos/Background02.mp4', 1800358, '/uploads/videos/blog1.jpg', 'test', 0, 1, 1, 'admin', '2020-04-19 06:25:15', '2020-08-09 08:39:36'),
(6, 'zh-CN', '游学画册', '/uploads/videos/Background02.mp4', 1800358, '/uploads/videos/blog1.jpg', 'test', 0, 1, 1, 'admin', '2020-04-19 06:25:15', '2020-08-09 08:39:49'),
(7, 'zh-CN', '游学画册', '/uploads/videos/Background02.mp4', 1800358, '/uploads/videos/blog1.jpg', 'test', 0, 1, 1, 'admin', '2020-04-19 06:25:16', '2020-08-09 08:40:01'),
(8, 'zh-CN', '游学画册', '/uploads/videos/Background02.mp4', 1800358, '/uploads/videos/blog1.jpg', 'test', 0, 1, 1, 'admin', '2020-04-19 06:25:17', '2020-08-09 08:40:25'),
(9, 'zh-CN', '游学画册', '/uploads/videos/Background02.mp4', 1800358, '/uploads/videos/blog1.jpg', 'test', 0, 1, 1, 'admin', '2020-04-19 06:25:18', '2020-08-09 08:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `qnz_video_categories`
--

CREATE TABLE `qnz_video_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `importance` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `added_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `qnz_video_categories`
--

INSERT INTO `qnz_video_categories` (`id`, `title`, `description`, `importance`, `active`, `added_by`, `created_at`, `updated_at`) VALUES
(1, '默认分类', '', 0, 1, 'admin', '2020-04-19 06:08:15', '2020-04-19 06:08:15');

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

--
-- Indexes for dumped tables
--

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
-- Indexes for table `qnz_advertisements`
--
ALTER TABLE `qnz_advertisements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `advertisements_space_id_foreign` (`space_id`);

--
-- Indexes for table `qnz_advertising_spaces`
--
ALTER TABLE `qnz_advertising_spaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_albums`
--
ALTER TABLE `qnz_albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_announcements`
--
ALTER TABLE `qnz_announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_category_id_foreign` (`category_id`);

--
-- Indexes for table `qnz_ann_categories`
--
ALTER TABLE `qnz_ann_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ann_categories_parent_foreign` (`parent`);

--
-- Indexes for table `qnz_application_areas`
--
ALTER TABLE `qnz_application_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_downloads`
--
ALTER TABLE `qnz_downloads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloads_category_id_foreign` (`category_id`);

--
-- Indexes for table `qnz_download_categories`
--
ALTER TABLE `qnz_download_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_email_templates`
--
ALTER TABLE `qnz_email_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_templates_code_unique` (`code`);

--
-- Indexes for table `qnz_events`
--
ALTER TABLE `qnz_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_category_id_foreign` (`category_id`);

--
-- Indexes for table `qnz_event_categories`
--
ALTER TABLE `qnz_event_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_categories_parent_foreign` (`parent`);

--
-- Indexes for table `qnz_exhibitions`
--
ALTER TABLE `qnz_exhibitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_jobs`
--
ALTER TABLE `qnz_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_labs`
--
ALTER TABLE `qnz_labs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_languages`
--
ALTER TABLE `qnz_languages`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `qnz_links`
--
ALTER TABLE `qnz_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `links_category_id_foreign` (`category_id`);

--
-- Indexes for table `qnz_link_categories`
--
ALTER TABLE `qnz_link_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_menus`
--
ALTER TABLE `qnz_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_metadatas`
--
ALTER TABLE `qnz_metadatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_news`
--
ALTER TABLE `qnz_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Indexes for table `qnz_news_categories`
--
ALTER TABLE `qnz_news_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_categories_parent_foreign` (`parent`);

--
-- Indexes for table `qnz_offers`
--
ALTER TABLE `qnz_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_options`
--
ALTER TABLE `qnz_options`
  ADD PRIMARY KEY (`config_name`);

--
-- Indexes for table `qnz_organizations`
--
ALTER TABLE `qnz_organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_pages`
--
ALTER TABLE `qnz_pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `IX_lang_alias` (`lang`,`alias`) USING BTREE;

--
-- Indexes for table `qnz_papers`
--
ALTER TABLE `qnz_papers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_photos`
--
ALTER TABLE `qnz_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_album_id_foreign` (`album_id`);

--
-- Indexes for table `qnz_products`
--
ALTER TABLE `qnz_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_v1_category_id_foreign` (`category_id`);

--
-- Indexes for table `qnz_product_categories`
--
ALTER TABLE `qnz_product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_v1_parent_foreign` (`parent`);

--
-- Indexes for table `qnz_questions`
--
ALTER TABLE `qnz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_category_id_foreign` (`category_id`);

--
-- Indexes for table `qnz_question_categories`
--
ALTER TABLE `qnz_question_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_researches`
--
ALTER TABLE `qnz_researches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_resources`
--
ALTER TABLE `qnz_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_service_items`
--
ALTER TABLE `qnz_service_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_social_accounts`
--
ALTER TABLE `qnz_social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_accounts_social_id_foreign` (`social_id`);

--
-- Indexes for table `qnz_social_softwares`
--
ALTER TABLE `qnz_social_softwares`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_softwares_name_unique` (`name`);

--
-- Indexes for table `qnz_teams`
--
ALTER TABLE `qnz_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_category_id_foreign` (`category_id`);

--
-- Indexes for table `qnz_teams_organizations`
--
ALTER TABLE `qnz_teams_organizations`
  ADD KEY `teams_organizations_organizations_id_index` (`organizations_id`),
  ADD KEY `teams_organizations_teams_id_index` (`teams_id`);

--
-- Indexes for table `qnz_team_categories`
--
ALTER TABLE `qnz_team_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qnz_users`
--
ALTER TABLE `qnz_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `qnz_videos`
--
ALTER TABLE `qnz_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_category_id_foreign` (`category_id`);

--
-- Indexes for table `qnz_video_categories`
--
ALTER TABLE `qnz_video_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`email`);

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
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `qnz_advertisements`
--
ALTER TABLE `qnz_advertisements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `qnz_advertising_spaces`
--
ALTER TABLE `qnz_advertising_spaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `qnz_albums`
--
ALTER TABLE `qnz_albums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qnz_announcements`
--
ALTER TABLE `qnz_announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qnz_ann_categories`
--
ALTER TABLE `qnz_ann_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qnz_application_areas`
--
ALTER TABLE `qnz_application_areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `qnz_downloads`
--
ALTER TABLE `qnz_downloads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `qnz_download_categories`
--
ALTER TABLE `qnz_download_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qnz_email_templates`
--
ALTER TABLE `qnz_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qnz_events`
--
ALTER TABLE `qnz_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qnz_event_categories`
--
ALTER TABLE `qnz_event_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qnz_exhibitions`
--
ALTER TABLE `qnz_exhibitions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qnz_jobs`
--
ALTER TABLE `qnz_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qnz_labs`
--
ALTER TABLE `qnz_labs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qnz_links`
--
ALTER TABLE `qnz_links`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `qnz_link_categories`
--
ALTER TABLE `qnz_link_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qnz_menus`
--
ALTER TABLE `qnz_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `qnz_metadatas`
--
ALTER TABLE `qnz_metadatas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `qnz_news`
--
ALTER TABLE `qnz_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `qnz_news_categories`
--
ALTER TABLE `qnz_news_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `qnz_offers`
--
ALTER TABLE `qnz_offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `qnz_organizations`
--
ALTER TABLE `qnz_organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qnz_pages`
--
ALTER TABLE `qnz_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `qnz_papers`
--
ALTER TABLE `qnz_papers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qnz_photos`
--
ALTER TABLE `qnz_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qnz_products`
--
ALTER TABLE `qnz_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `qnz_product_categories`
--
ALTER TABLE `qnz_product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qnz_questions`
--
ALTER TABLE `qnz_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `qnz_question_categories`
--
ALTER TABLE `qnz_question_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `qnz_researches`
--
ALTER TABLE `qnz_researches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `qnz_resources`
--
ALTER TABLE `qnz_resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `qnz_service_items`
--
ALTER TABLE `qnz_service_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `qnz_social_accounts`
--
ALTER TABLE `qnz_social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qnz_social_softwares`
--
ALTER TABLE `qnz_social_softwares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qnz_teams`
--
ALTER TABLE `qnz_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `qnz_team_categories`
--
ALTER TABLE `qnz_team_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qnz_users`
--
ALTER TABLE `qnz_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qnz_videos`
--
ALTER TABLE `qnz_videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `qnz_video_categories`
--
ALTER TABLE `qnz_video_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for dumped tables
--

--
-- Constraints for table `dictionaries`
--
ALTER TABLE `dictionaries`
  ADD CONSTRAINT `PK_Dic_DicType` FOREIGN KEY (`type_id`) REFERENCES `dictionary_type` (`Id`);

--
-- Constraints for table `qnz_advertisements`
--
ALTER TABLE `qnz_advertisements`
  ADD CONSTRAINT `advertisements_space_id_foreign` FOREIGN KEY (`space_id`) REFERENCES `qnz_advertising_spaces` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_announcements`
--
ALTER TABLE `qnz_announcements`
  ADD CONSTRAINT `announcements_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `qnz_ann_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_ann_categories`
--
ALTER TABLE `qnz_ann_categories`
  ADD CONSTRAINT `ann_categories_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `qnz_ann_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_downloads`
--
ALTER TABLE `qnz_downloads`
  ADD CONSTRAINT `downloads_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `qnz_download_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_events`
--
ALTER TABLE `qnz_events`
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `qnz_event_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_event_categories`
--
ALTER TABLE `qnz_event_categories`
  ADD CONSTRAINT `event_categories_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `qnz_event_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_links`
--
ALTER TABLE `qnz_links`
  ADD CONSTRAINT `links_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `qnz_link_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_news`
--
ALTER TABLE `qnz_news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `qnz_news_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_news_categories`
--
ALTER TABLE `qnz_news_categories`
  ADD CONSTRAINT `news_categories_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `qnz_news_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_photos`
--
ALTER TABLE `qnz_photos`
  ADD CONSTRAINT `photos_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `qnz_albums` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_products`
--
ALTER TABLE `qnz_products`
  ADD CONSTRAINT `products_v1_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `qnz_product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_product_categories`
--
ALTER TABLE `qnz_product_categories`
  ADD CONSTRAINT `product_categories_v1_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `qnz_product_categories` (`id`);

--
-- Constraints for table `qnz_questions`
--
ALTER TABLE `qnz_questions`
  ADD CONSTRAINT `questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `qnz_question_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_social_accounts`
--
ALTER TABLE `qnz_social_accounts`
  ADD CONSTRAINT `social_accounts_social_id_foreign` FOREIGN KEY (`social_id`) REFERENCES `qnz_social_softwares` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_teams`
--
ALTER TABLE `qnz_teams`
  ADD CONSTRAINT `teams_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `qnz_team_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_teams_organizations`
--
ALTER TABLE `qnz_teams_organizations`
  ADD CONSTRAINT `teams_organizations_organizations_id_foreign` FOREIGN KEY (`organizations_id`) REFERENCES `qnz_organizations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teams_organizations_teams_id_foreign` FOREIGN KEY (`teams_id`) REFERENCES `qnz_teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qnz_videos`
--
ALTER TABLE `qnz_videos`
  ADD CONSTRAINT `videos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `qnz_video_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
