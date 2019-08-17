-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 年 07 月 16 日 05:34
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET time_zone = "+00:00";

SET FOREIGN_KEY_CHECKS=0;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- SET FOREIGN_KEY_CHECKS=0;

--
-- 数据库: `security`
--
-- CREATE DATABASE `security` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- USE `security`;

-- --------------------------------------------------------

--
-- 表的结构 `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admins`
--

INSERT INTO `admins` (`id`, `user`, `passwd`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `tel` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `user`, `passwd`, `tel`) VALUES
(1, 'zhangsan', 'zhangsan123', '123456'),
(2, 'lisi', 'lisi123', '123456'),
(3, 'wangwu', 'wangwu123', '123456'),
(4, 'laoliu', 'laoliu123', '123456'),
(5, 'qiqi', 'qiqi123', '123465');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
