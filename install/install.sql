-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-11-18 09:49:52
-- 服务器版本： 5.5.53
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `root`
--

-- --------------------------------------------------------

--
-- 表的结构 `ayangw_config`
--

CREATE TABLE `ayangw_config` (
  `ayangw_k` varchar(255) NOT NULL DEFAULT '',
  `ayangw_v` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ayangw_config`
--

INSERT INTO `ayangw_config` (`ayangw_k`, `ayangw_v`) VALUES
('title', '发卡君自动发卡网'),
('keywords', '发卡君自动发卡网，自动发卡平台'),
('description', 'QQ群：660639701 网址：fakajun.com'),
('zzqq', '466660801'),
('notice2', '付款后按提示点击确定跳转到提取页面，不可提前关闭窗口！否则无法提取到卡密！'),
('notice3', '提取码是订单编号 或者 您的联系方式！'),
('notice1', '提取卡密后请尽快激活使用或保存好，系统定期清除被提取的卡密'),
('foot', '发卡君自动发卡网'),
('dd_notice', '1.联系方式也可以作为你的提卡凭证<br>2.必须等待付款完成自动跳转，不可提前关闭页面，否则会导致订单失效，后果自负'),
('admin', 'admin'),
('pwd', 'admin'),
('web_url', 'http://faka.dev/'),
('paiapi', '1'),
('xq_id', '201711160202541001'),
('xq_key', '281ecb097a15a583ad244225a9f7a367cb422ea5'),
('showKc', '1'),
('CC_Defender', '2'),
('txprotect', '1'),
('qqtz', '1');

-- --------------------------------------------------------

--
-- 表的结构 `ayangw_goods`
--

CREATE TABLE `ayangw_goods` (
  `id` int(11) NOT NULL,
  `gName` varchar(255) DEFAULT NULL,
  `gInfo` text,
  `tpId` int(11) NOT NULL COMMENT 'Ã¦â€°â‚¬Ã¥Â±Å¾Ã¥Ë†â€ Ã§Â±Â»',
  `price` float DEFAULT NULL,
  `state` int(11) DEFAULT '1',
  `sales` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ayangw_goods`
--

INSERT INTO `ayangw_goods` (`id`, `gName`, `gInfo`, `tpId`, `price`, `state`, `sales`) VALUES
(2, '测试商品', '介绍信息', 2, 0.01, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ayangw_km`
--

CREATE TABLE `ayangw_km` (
  `id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `km` varchar(100) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `rel` varchar(50) DEFAULT NULL,
  `stat` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ayangw_km`
--

INSERT INTO `ayangw_km` (`id`, `gid`, `km`, `benTime`, `endTime`, `out_trade_no`, `trade_no`, `rel`, `stat`) VALUES
(9, 2, '网站：www.baidu.com', '2017-11-18 17:49:25', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ayangw_order`
--

CREATE TABLE `ayangw_order` (
  `id` int(11) NOT NULL,
  `out_trade_no` varchar(100) DEFAULT NULL,
  `trade_no` varchar(100) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `money` float DEFAULT NULL,
  `rel` varchar(30) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `benTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `sta` int(11) DEFAULT '0',
  `sendE` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ayangw_order`
--

INSERT INTO `ayangw_order` (`id`, `out_trade_no`, `trade_no`, `gid`, `money`, `rel`, `type`, `benTime`, `endTime`, `sta`, `sendE`) VALUES
(1, '20171018166821', NULL, 1, 0.01, '1231231', 'alipay', '2017-11-18 16:06:33', NULL, 0, 0),
(2, '201710181616689', NULL, 1, 0.01, '1231231', 'alipay', '2017-11-18 16:16:41', NULL, 0, 0),
(3, '201710181618426', NULL, 1, 0.01, '1231231', 'alipay', '2017-11-18 16:18:19', NULL, 0, 0),
(4, '20171018161817', NULL, 1, 0.01, '1231231', 'alipay', '2017-11-18 16:18:41', NULL, 0, 0),
(5, '201710181624751', NULL, 1, 0.01, '1231231', 'alipay', '2017-11-18 16:24:44', NULL, 0, 0),
(6, '201710181630676', NULL, 1, 0.01, '1231231', 'qqpay', '2017-11-18 16:30:04', NULL, 0, 0),
(7, '201710181630941', NULL, 1, 0.01, '1231231', 'qqpay', '2017-11-18 16:30:48', NULL, 0, 0),
(8, '201710181632223', NULL, 1, 0.01, '1231231', 'wxpay', '2017-11-18 16:32:24', NULL, 0, 0),
(9, '20171018171591', NULL, 1, 0.01, '1231231', 'alipay', '2017-11-18 17:01:56', NULL, 0, 0),
(10, '20171018177513', NULL, 1, 0.01, '1231231', 'alipay', '2017-11-18 17:07:11', NULL, 0, 0),
(11, '201710181717206', NULL, 1, 0.01, '1231231', 'qqpay', '2017-11-18 17:17:30', NULL, 0, 0),
(12, '2017101817190', NULL, 1, 0.01, '1231231', 'qqpay', '2017-11-18 17:19:33', NULL, 0, 0),
(13, '201710181721181', NULL, 1, 0.01, '1231231231', 'wxpay', '2017-11-18 17:21:16', NULL, 0, 0),
(14, '201710181722694', '4200000037201711185486617394', 1, 0.01, '123123123', 'wxpay', '2017-11-18 17:22:44', '2017-11-18 17:25:04', 1, 0),
(15, '201710181728487', '4200000034201711185487009347', 1, 0.01, '71314126', 'wxpay', '2017-11-18 17:28:25', '2017-11-18 17:29:06', 1, 0),
(16, '201710181730855', '4200000039201711185490628131', 1, 0.01, '123123123', 'wxpay', '2017-11-18 17:30:06', '2017-11-18 17:30:46', 1, 0),
(17, '201710181732169', '4200000049201711185490785088', 1, 0.01, '2463131', 'wxpay', '2017-11-18 17:32:42', '2017-11-18 17:33:08', 1, 0),
(18, '201710181734218', '4200000044201711185492891491', 1, 0.01, '5687431351', 'wxpay', '2017-11-18 17:34:27', '2017-11-18 17:34:48', 1, 0),
(19, '201710181737524', '4200000037201711185491091068', 1, 0.01, '71314126', 'wxpay', '2017-11-18 17:37:15', '2017-11-18 17:37:30', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ayangw_type`
--

CREATE TABLE `ayangw_type` (
  `id` int(11) NOT NULL,
  `tName` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ayangw_type`
--

INSERT INTO `ayangw_type` (`id`, `tName`, `state`) VALUES
(2, '测试分类', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ayangw_config`
--
ALTER TABLE `ayangw_config`
  ADD PRIMARY KEY (`ayangw_k`);

--
-- Indexes for table `ayangw_goods`
--
ALTER TABLE `ayangw_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ayangw_km`
--
ALTER TABLE `ayangw_km`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ayangw_order`
--
ALTER TABLE `ayangw_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ayangw_type`
--
ALTER TABLE `ayangw_type`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ayangw_goods`
--
ALTER TABLE `ayangw_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `ayangw_km`
--
ALTER TABLE `ayangw_km`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用表AUTO_INCREMENT `ayangw_order`
--
ALTER TABLE `ayangw_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用表AUTO_INCREMENT `ayangw_type`
--
ALTER TABLE `ayangw_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
