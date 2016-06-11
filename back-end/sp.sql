-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 06 月 11 日 22:54
-- 服务器版本: 5.5.40
-- PHP 版本: 5.4.33

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `sp`
--

-- --------------------------------------------------------

--
-- 表的结构 `sp_admin`
--

CREATE TABLE IF NOT EXISTS `sp_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(32) NOT NULL COMMENT '密码',
  `realname` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `mobile` int(11) DEFAULT NULL COMMENT '手机号',
  `email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `qq` varchar(11) DEFAULT NULL COMMENT 'QQ',
  `address` varchar(100) DEFAULT NULL COMMENT '地址',
  `loginip` varchar(20) NOT NULL COMMENT '登录IP',
  `logintime` varchar(11) NOT NULL COMMENT '登录时间',
  `error` int(11) NOT NULL COMMENT '登录错误次数',
  `errortime` int(11) NOT NULL COMMENT '登录错误时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sp_admin`
--

INSERT INTO `sp_admin` (`id`, `username`, `password`, `realname`, `mobile`, `email`, `qq`, `address`, `loginip`, `logintime`, `error`, `errortime`) VALUES
(1, 'admin', '5f8ec64977085720630d9ef95622519f', NULL, NULL, NULL, NULL, NULL, '', '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_ads`
--

CREATE TABLE IF NOT EXISTS `sp_ads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `tid` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `sp_content`
--

CREATE TABLE IF NOT EXISTS `sp_content` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text,
  `addtime` int(10) NOT NULL,
  `cate` int(2) NOT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  `abstract` varchar(200) DEFAULT NULL,
  `sort` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `sp_content`
--

INSERT INTO `sp_content` (`id`, `title`, `content`, `addtime`, `cate`, `thumb`, `abstract`, `sort`) VALUES
(2, '测试文章', '摘要摘要摘要摘要', 1465632037, 2, 'upload/news/2016-06-11/1c0e8ae04a4e7354742c4b7e5f0c06f7.png', '摘要', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_explore`
--

CREATE TABLE IF NOT EXISTS `sp_explore` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `abstract` varchar(500) DEFAULT NULL,
  `addtime` int(10) NOT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `sp_explore`
--

INSERT INTO `sp_explore` (`id`, `title`, `abstract`, `addtime`, `thumb`, `sort`) VALUES
(3, '12331', '123', 1465653915, 'upload/news/2016-06-11/8df04c49ffdc3bc88cc1a337df70af01.png', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sp_navigation`
--

CREATE TABLE IF NOT EXISTS `sp_navigation` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `target` int(1) DEFAULT '0',
  `show` int(1) DEFAULT '1',
  `sort` int(5) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `sp_order`
--

CREATE TABLE IF NOT EXISTS `sp_order` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `area` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sp_system`
--

CREATE TABLE IF NOT EXISTS `sp_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `web` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
