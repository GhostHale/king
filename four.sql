-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2014 at 10:31 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `four`
--

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE IF NOT EXISTS `announce` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bbs_main`
--

CREATE TABLE IF NOT EXISTS `bbs_main` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL,
  `pid` int(10) unsigned DEFAULT NULL,
  `content` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `append` tinytext,
  `readtimes` int(10) unsigned NOT NULL DEFAULT '0',
  `reply` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `in` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bbs_rep`
--

CREATE TABLE IF NOT EXISTS `bbs_rep` (
  `rid` bigint(20) unsigned NOT NULL,
  `main` int(10) unsigned DEFAULT NULL,
  `pid` int(10) unsigned DEFAULT NULL,
  `content` text,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agree` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`),
  KEY `index` (`main`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bbs_user`
--

CREATE TABLE IF NOT EXISTS `bbs_user` (
  `pid` int(10) unsigned NOT NULL,
  `tou` tinyint(3) unsigned DEFAULT '0',
  `rank` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `sex` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `age` tinyint(3) unsigned DEFAULT '0',
  `froze` date DEFAULT NULL,
  `begin` date NOT NULL,
  `name` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bbs_zan`
--

CREATE TABLE IF NOT EXISTS `bbs_zan` (
  `rid` bigint(20) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`rid`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `p2p_bd`
--

CREATE TABLE IF NOT EXISTS `p2p_bd` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `status` int(10) unsigned NOT NULL DEFAULT '1',
  `total` int(10) unsigned NOT NULL,
  `need` int(10) unsigned NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `paytype` tinyint(3) unsigned NOT NULL,
  `bdtype` tinyint(3) unsigned NOT NULL,
  `isday` tinyint(4) DEFAULT '0',
  `period` tinyint(3) unsigned NOT NULL,
  `rate` float unsigned NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `title` varchar(40) NOT NULL,
  `intro` text,
  `default` double unsigned DEFAULT '0',
  PRIMARY KEY (`bid`),
  KEY `index2` (`pid`,`status`,`isday`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `p2p_tz`
--

CREATE TABLE IF NOT EXISTS `p2p_tz` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `bid` int(10) unsigned NOT NULL,
  `money` int(10) unsigned NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index` (`pid`,`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `p2p_user`
--

CREATE TABLE IF NOT EXISTS `p2p_user` (
  `pid` int(10) unsigned NOT NULL,
  `rank` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `peo` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `bank` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `car` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `comany` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `marry` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `credit` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `tax` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `society` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `educa` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `house` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `hukou` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `skill` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `possess`
--

CREATE TABLE IF NOT EXISTS `possess` (
  `pid` int(10) unsigned NOT NULL,
  `total` double unsigned NOT NULL DEFAULT '0',
  `froze` int(10) unsigned NOT NULL DEFAULT '0',
  `lend` double unsigned DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rank_com`
--

CREATE TABLE IF NOT EXISTS `rank_com` (
  `pid` int(10) unsigned NOT NULL,
  `bhistory` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `yyzz` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `zzdm` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `swdj` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `gszc` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `nszm` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `sjbb` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rank_tao`
--

CREATE TABLE IF NOT EXISTS `rank_tao` (
  `pid` int(10) unsigned NOT NULL,
  `yyzz` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `smrz` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `jkzh` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `dmjt` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rank_worker`
--

CREATE TABLE IF NOT EXISTS `rank_worker` (
  `pid` int(10) unsigned NOT NULL,
  `card` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `com` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `bhistory` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_buy`
--

CREATE TABLE IF NOT EXISTS `shop_buy` (
  `pid` int(10) unsigned NOT NULL,
  `attribute` text,
  `address` varchar(50) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  `num` int(10) unsigned DEFAULT NULL,
  `price` float DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `append` varchar(50) DEFAULT NULL,
  `time` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`),
  KEY `index2` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_collect`
--

CREATE TABLE IF NOT EXISTS `shop_collect` (
  `pid` int(10) unsigned NOT NULL,
  `gid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`pid`,`gid`),
  KEY `f` (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_goods`
--

CREATE TABLE IF NOT EXISTS `shop_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `belong` int(10) unsigned NOT NULL,
  `price` float NOT NULL,
  `have` int(10) unsigned NOT NULL DEFAULT '0',
  `collected` int(10) unsigned NOT NULL DEFAULT '0',
  `buyed` int(10) unsigned NOT NULL DEFAULT '0',
  `kind` text,
  `type` text,
  `intro` text,
  PRIMARY KEY (`id`),
  KEY `index2` (`belong`),
  KEY `belong` (`belong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shop_tobuy`
--

CREATE TABLE IF NOT EXISTS `shop_tobuy` (
  `pid` int(10) unsigned NOT NULL,
  `gid` int(10) unsigned NOT NULL,
  `type` text,
  `kind` varchar(10) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`pid`,`gid`),
  KEY `f2` (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shop_type`
--

CREATE TABLE IF NOT EXISTS `shop_type` (
  `id` int(10) unsigned NOT NULL,
  `par1` int(10) unsigned NOT NULL DEFAULT '0',
  `par2` int(10) unsigned NOT NULL DEFAULT '0',
  `rank` tinyint(3) unsigned NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(20) DEFAULT NULL,
  `psw` char(32) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `realname` varchar(10) DEFAULT NULL,
  `peoid` char(18) DEFAULT NULL,
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `address` varchar(50) DEFAULT NULL,
  `pictou` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `check` char(32) DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`pid`, `user`, `psw`, `phone`, `email`, `realname`, `peoid`, `sex`, `address`, `pictou`, `check`) VALUES
(1, 'admin', '898e77dc065ccb05a7253bb728b61ff5', '11111111111', 'aqq@qq.com', NULL, NULL, 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `zhong`
--

CREATE TABLE IF NOT EXISTS `zhong` (
  `zid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `total` int(10) unsigned NOT NULL,
  `need` int(10) unsigned NOT NULL,
  `intro` text NOT NULL,
  `title` varchar(40) NOT NULL,
  `end` date NOT NULL,
  `time` date DEFAULT NULL,
  `rank` tinytext,
  PRIMARY KEY (`zid`),
  KEY `index` (`status`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zhong_cj`
--

CREATE TABLE IF NOT EXISTS `zhong_cj` (
  `cid` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `title` varchar(45) DEFAULT NULL,
  `intro` varchar(45) DEFAULT NULL,
  `end` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `ind` (`status`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `zhong_cj_res`
--

CREATE TABLE IF NOT EXISTS `zhong_cj_res` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index2` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `zhong_tz`
--

CREATE TABLE IF NOT EXISTS `zhong_tz` (
  `zid` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `money` int(10) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`zid`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shop_collect`
--
ALTER TABLE `shop_collect`
  ADD CONSTRAINT `f` FOREIGN KEY (`gid`) REFERENCES `shop_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shop_goods`
--
ALTER TABLE `shop_goods`
  ADD CONSTRAINT `` FOREIGN KEY (`belong`) REFERENCES `shop_type` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `shop_tobuy`
--
ALTER TABLE `shop_tobuy`
  ADD CONSTRAINT `f2` FOREIGN KEY (`gid`) REFERENCES `shop_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
