-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 06 月 12 日 11:14
-- 服务器版本: 5.5.40
-- PHP 版本: 5.2.17

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `sp_ads`
--

INSERT INTO `sp_ads` (`id`, `title`, `url`, `thumb`, `status`, `tid`, `sort`) VALUES
(2, '1', 'http://www.baidu.com/', 'upload/news/2016-06-12/6d87e92a7ca1c28bd5fe62f08a981b13.jpg', 1, 1, 0),
(3, '2', 'http://hersface.com/', 'upload/news/2016-06-12/b8aaf8037cfc49b9ee7ea4584b8547c7.jpg', 1, 1, 0),
(4, '3', 'http://www.baidu.com/', 'upload/news/2016-06-12/10610d1f894ff0c342baad85484061c1.jpg', 1, 1, 0),
(5, '4', 'http://www.baidu.com/', 'upload/news/2016-06-12/929470112356d492c481f643de7099db.jpg', 1, 1, 0);

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
(2, '测试文章', '摘要摘要摘要摘要', 1465632037, 1, 'upload/news/2016-06-12/da746206eec5316f660657bb8d1f0aeb.png', '摘要', 0);

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
(3, '12331', '123', 1465653915, 'upload/news/2016-06-12/724568c6434808fe20365d678d1516e6.png', 0);

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
  `addtime` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `sp_order`
--

INSERT INTO `sp_order` (`id`, `name`, `telephone`, `age`, `city`, `area`, `addtime`) VALUES
(1, '斌神', '15555555555', '没有填写', '请选择..', '0', NULL),
(2, '斌神', '15555555555', '没有填写', '请选择..', '0', NULL),
(3, '斌神', '15555555555', '没有填写', '请选择..', '0', NULL),
(4, '斌神', '15555555555', '6-8岁', '河北省', '0', NULL),
(5, '杨尚斌', '15555555555', '3-5岁', '广东省', '没有填写', 1465701124);

-- --------------------------------------------------------

--
-- 表的结构 `sp_system`
--

CREATE TABLE IF NOT EXISTS `sp_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `web` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sp_system`
--

INSERT INTO `sp_system` (`id`, `web`) VALUES
(1, '{"thumb":"upload\\/web\\/2016-06-12\\/702d8008d6683cdb4f9c3c76e9218aa6.png","webname":"\\u82f1\\u8bed\\u5b66\\u6821\\u5b98\\u65b9\\u7f51\\u7ad9-\\u7528\\u82f1\\u8bed\\u63a2\\u7d22\\u4e16\\u754c","keywords":"\\u82f1\\u8bed\\u5b66\\u6821,\\u5b98\\u65b9\\u7f51\\u7ad9,\\u82f1\\u8bed,\\u63a2\\u7d22\\u4e16\\u754c","description":"123","copyright":"123","address":"xxxxxxxxxxxxx","icp":"xxxxxxxxxxxxx","webphone":"xxxxxxxxxxxxx"}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
