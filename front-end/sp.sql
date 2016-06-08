-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 年 05 月 28 日 18:11
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
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, '', '', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
