SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自動編號',
  `name` int(11) NOT NULL COMMENT '帳號',
  `passwd` int(11) NOT NULL COMMENT '密碼',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理員' AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE IF NOT EXISTS `announcements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自動編號',
  `conferenceId` int(10) unsigned DEFAULT NULL COMMENT '會議編號',
  `title` varchar(200) NOT NULL COMMENT '標題',
  `content` text NOT NULL COMMENT '內容',
  `createDateTime` datetime NOT NULL COMMENT '建立日期',
  PRIMARY KEY (`id`),
  KEY `conferenceId` (`conferenceId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='公告' AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `conferences`;
CREATE TABLE IF NOT EXISTS `conferences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自動編號',
  `year` smallint(4) unsigned NOT NULL COMMENT '年度',
  `startDate` date NOT NULL COMMENT '舉辦日期',
  `endDate` date NOT NULL COMMENT '結束日期',
  `location` varchar(200) NOT NULL COMMENT '地點',
  `description` text NOT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='會議' AUTO_INCREMENT=3 ;

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自動編號',
  `conferenceId` int(10) unsigned DEFAULT NULL COMMENT '會議編號',
  `subject` varchar(200) NOT NULL COMMENT '主題',
  `talker` varchar(20) DEFAULT NULL COMMENT '講者',
  `startTime` time NOT NULL COMMENT '開始時間',
  `endTime` time NOT NULL COMMENT '結束時間',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='議程' AUTO_INCREMENT=11 ;

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自動編號',
  `name` int(11) NOT NULL COMMENT '姓名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='工作人員' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
