-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 04 月 26 日 07:28
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_ad`
--

CREATE TABLE `phpyun_ad` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `ad_name` varchar(100) NOT NULL,
  `did` varchar(100) NOT NULL DEFAULT '0',
  `time_start` varchar(100) NOT NULL,
  `time_end` varchar(100) NOT NULL,
  `ad_type` varchar(10) NOT NULL,
  `word_info` text NOT NULL,
  `word_url` varchar(100) NOT NULL,
  `pic_url` varchar(100) NOT NULL,
  `pic_src` varchar(100) NOT NULL,
  `pic_content` varchar(200) DEFAULT NULL,
  `pic_width` varchar(100) NOT NULL,
  `pic_height` varchar(100) NOT NULL,
  `flash_url` varchar(100) DEFAULT NULL,
  `flash_src` varchar(100) DEFAULT NULL,
  `flash_width` varchar(100) DEFAULT NULL,
  `flash_height` varchar(100) DEFAULT NULL,
  `class_id` int(20) DEFAULT NULL,
  `is_check` int(2) DEFAULT '0',
  `is_open` int(1) DEFAULT '0',
  `target` int(2) DEFAULT NULL,
  `hits` int(11) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `lianmeng_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_adclick`
--

CREATE TABLE `phpyun_adclick` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_announcement`
--

CREATE TABLE `phpyun_admin_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `datetime` int(11) NOT NULL,
  `startime` int(11) NOT NULL,
  `endtime`  int(11) NOT NULL,
  `did` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_config`
--

CREATE TABLE `phpyun_admin_config` (
  `name` varchar(100) NOT NULL DEFAULT '',
  `config` text NOT NULL,
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_email`
--

CREATE TABLE `phpyun_admin_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smtpserver` varchar(100) DEFAULT NULL,
  `smtpuser` varchar(100) DEFAULT NULL,
  `smtppass` varchar(100) DEFAULT NULL,
  `smtpport` varchar(100) DEFAULT NULL,
  `smtpnick` varchar(100) DEFAULT NULL,
  `default` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_integralclass`
--

CREATE TABLE `phpyun_admin_integralclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `integral` int(50) NOT NULL DEFAULT '0',
  `discount` int(2) DEFAULT '0',
  `state` int(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_jobwhb`
--

CREATE TABLE `phpyun_admin_jobwhb` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `pic` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL ,
  `isopen` int(1) NOT NULL default '0' ,
  `type` int(1) NOT NULL DEFAULT '1',
  `num` int(2) NOT NULL DEFAULT '0',
  `style` int(2) NOT NULL,
  PRIMARY KEY  USING BTREE (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC  AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_link`
--

CREATE TABLE `phpyun_admin_link` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(50) NOT NULL,
  `link_url` varchar(50) NOT NULL,
  `img_type` int(30) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `link_type` varchar(1) NOT NULL,
  `link_state` int(1) NOT NULL DEFAULT '0',
  `link_sorting` int(8) NOT NULL DEFAULT '0',
  `link_time` varchar(20) NOT NULL,
  `did` int(11) NOT NULL,
  `tem_type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_log`
--

CREATE TABLE `phpyun_admin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(200) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `ctime` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT '0',
  `opera` tinyint(2) DEFAULT NULL,
  `opera_id` int(11) DEFAULT NULL,
  `type` tinyint(2) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_navigation`
--

CREATE TABLE `phpyun_admin_navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `keyid` int(11) DEFAULT '0',
  `url` varchar(70) DEFAULT NULL,
  `menu` int(1) DEFAULT NULL,
  `classname` varchar(100) DEFAULT '0',
  `sort` int(5) DEFAULT '0',
  `display` int(1) DEFAULT NULL,
  `dids` int(1) NOT NULL,
  `level` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_template`
--

CREATE TABLE `phpyun_admin_template` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `tp_name` varchar(50) NOT NULL,
  `update_time` int(32) NOT NULL,
  `dir` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_user`
--

CREATE TABLE `phpyun_admin_user` (
  `uid` int(3) NOT NULL AUTO_INCREMENT,
  `m_id` int(2) NOT NULL,
  `username` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `isdid` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT '0',
  `lasttime` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `salt` varchar(20) DEFAULT '',
  `moblie` varchar(20) DEFAULT '',
  `weixin` varchar(20) DEFAULT '',
  `qq` varchar(20) DEFAULT '',
  `logo` varchar(100) DEFAULT '',
  `zan` int(11) DEFAULT '0',
  `r_status` tinyint(2) DEFAULT '0',
  `is_crm` int(11) DEFAULT '0',
  `wxid`  varchar(100)  NULL DEFAULT '',
  `crm_duty`  varchar(100)  NULL DEFAULT NULL,
  `crm_city`  varchar(200)  NULL DEFAULT NULL,
  `photo`  varchar(200)  NULL DEFAULT NULL,
  `ewm`  varchar(200)  NULL DEFAULT NULL,
  `control_login` varchar(255) default NULL,
  `index_lookstatistc` int(1) NOT NULL DEFAULT 2,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_user_group`
--

CREATE TABLE `phpyun_admin_user_group` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `group_power` text NOT NULL,
  `group_type` int(1) DEFAULT '1',
  `did` int(11) DEFAULT '0',
  `group_power_module` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- 表的结构 `phpyun_admin_wmtype`
--

CREATE TABLE `phpyun_admin_wmtype` (
  `id` int(11) NOT NULL auto_increment,
  `type` int(11) NOT NULL ,
  `uid` text NOT NULL ,
  `name` varchar(255) NOT NULL ,
  PRIMARY KEY  USING BTREE (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- 表的结构 `phpyun_advice_question`
--

CREATE TABLE `phpyun_advice_question` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `infotype` int(11) DEFAULT NULL,
  `content` varchar(250) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `handlecontent`  varchar(255)  NULL DEFAULT NULL,
  `status`  int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_ad_class`
--

CREATE TABLE `phpyun_ad_class` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) NOT NULL,
  `orders` int(20) NOT NULL,
  `href` varchar(100) NOT NULL,
  `integral_buy` varchar(100) DEFAULT '0',
  `type` int(11) DEFAULT '1',
  `btype` int(11) DEFAULT '1',
  `x` varchar(11) DEFAULT '',
  `y` varchar(11) DEFAULT '',
  `remark` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_answer`
--

CREATE TABLE `phpyun_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `nickname` varchar(25) DEFAULT NULL,
  `comment` int(11) NOT NULL DEFAULT '0',
  `support` int(11) NOT NULL DEFAULT '0',
  `oppose` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `add_time` int(11) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `usertype` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `statusbody` text,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_answer_review`
--

CREATE TABLE `phpyun_answer_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NOT NULL,
  `qid` int(11) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `support` int(11) DEFAULT '0',
  `content` text NOT NULL,
  `add_time` int(11) NOT NULL,
  `usertype` int(11) NOT NULL,
  `status` int(11) DEFAULT '1',
  `statusbody` text,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_atn`
--

CREATE TABLE `phpyun_atn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `sc_uid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `usertype` int(11) DEFAULT NULL,
  `sc_usertype` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT '0',
  `conid` int(11) DEFAULT NULL,
  `xjhid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_attention`
--

CREATE TABLE `phpyun_attention` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ids` text NOT NULL,
  `type` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_bank`
--

CREATE TABLE `phpyun_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `bank_number` varchar(200) DEFAULT NULL,
  `bank_address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_banner`
--

CREATE TABLE `phpyun_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `pic` varchar(100) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT '1',
  `statusbody` varchar(255) DEFAULT '',
  `did` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_blacklist`
--

CREATE TABLE `phpyun_blacklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_uid` int(11) DEFAULT NULL,
  `c_uid` int(11) DEFAULT NULL,
  `inputtime` int(11) DEFAULT NULL,
  `usertype` int(1) DEFAULT NULL,
  `com_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_change`
--

CREATE TABLE `phpyun_change` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `usertype` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `integral` int(11) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `linktel` varchar(100) DEFAULT '联系电话',
  `linkman` varchar(200) DEFAULT '联系人',
  `body` varchar(255) DEFAULT '备注',
  `status` int(11) DEFAULT '0',
  `statusbody` text,
  `express` varchar(100) DEFAULT NULL,
  `expnum` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_city_class`
--

CREATE TABLE `phpyun_city_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `letter` varchar(1) NOT NULL,
  `display` int(1) NOT NULL,
  `sitetype` int(2) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `e_name`  varchar(255)  NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_comclass`
--

CREATE TABLE `phpyun_comclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `variable` varchar(50) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company`
--

CREATE TABLE `phpyun_company` (
  `uid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL DEFAULT '',
  `shortname` varchar(25) NOT NULL DEFAULT '',
  `hy` int(5) DEFAULT NULL,
  `pr` int(5) DEFAULT NULL,
  `provinceid` int(5) DEFAULT NULL,
  `cityid` int(5) DEFAULT NULL,
  `three_cityid` int(5) DEFAULT NULL,
  `mun` int(3) DEFAULT NULL,
  `sdate` varchar(20) NOT NULL DEFAULT '',
  `money` int(11) DEFAULT NULL,
  `moneytype` int(11) DEFAULT '1',
  `content` longtext NOT NULL,
  `address` varchar(100) NOT NULL DEFAULT '',
  `zip` varchar(10) NOT NULL DEFAULT '',
  `linkman` varchar(50) NOT NULL DEFAULT '',
  `linkjob` varchar(50) NOT NULL DEFAULT '',
  `linkqq` varchar(20) NOT NULL DEFAULT '',
  `linkphone` varchar(100) NOT NULL DEFAULT '',
  `linktel` varchar(50) NOT NULL DEFAULT '',
  `linkmail` varchar(150) NOT NULL DEFAULT '',
  `website` varchar(100) NOT NULL DEFAULT '',
  `x` varchar(100) NOT NULL DEFAULT '',
  `y` varchar(100) NOT NULL DEFAULT '',
  `logo` varchar(100) NOT NULL DEFAULT '',
  `logo_status` int(11) DEFAULT '0',
  `logo_statusbody` varchar(255) NOT NULL DEFAULT '',
  `payd` int(8) DEFAULT '0',
  `integral` int(10) DEFAULT '0',
  `lastupdate` varchar(10) NOT NULL DEFAULT '',
  `cloudtype` int(2) DEFAULT NULL,
  `jobtime` int(11) DEFAULT '0',
  `r_status` int(2) DEFAULT '0',
  `firmpic` varchar(100) NOT NULL DEFAULT '',
  `rec` int(11) DEFAULT '0',
  `hits` int(11) DEFAULT '0',
  `expoure` int(11) DEFAULT '0',
  `ant_num` int(11) DEFAULT '0',
  `pl_time` int(11) DEFAULT NULL,
  `pl_status` int(11) DEFAULT '1',
  `order` int(11) unsigned DEFAULT '0',
  `admin_remark` varchar(255) NOT NULL DEFAULT '',
  `email_dy` int(11) DEFAULT '0',
  `msg_dy` int(11) DEFAULT '0',
  `sync` int(11) unsigned DEFAULT '0',
  `hy_dy` varchar(100) NOT NULL DEFAULT '',
  `moblie_status` int(1) DEFAULT '0',
  `email_status` int(1) DEFAULT '0',
  `yyzz_status` int(1) DEFAULT '0',
  `hottime` int(11) DEFAULT '0',
  `did` int(11) DEFAULT NULL,
  `busstops` text NOT NULL,
  `infostatus` int(11) DEFAULT '1',
  `conid` int(11) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `comqcode` varchar(200) NOT NULL DEFAULT '',
  `crm_uid` int(11) DEFAULT '0',
  `crm_time` int(11) DEFAULT NULL,
  `crm_status` tinyint(1) DEFAULT '0',
  `welfare` text NOT NULL,
  `hotstart` int(11) DEFAULT '0',
  `crm_type` int(11) DEFAULT '0',
  `crm_remark` text,
  `isfollow` tinyint(1) DEFAULT '0',
  `rating` int(5) DEFAULT '0',
  `rating_name` varchar(100) NOT NULL DEFAULT '',
  `vipstime` int(11) DEFAULT '0',
  `vipetime` int(11) DEFAULT '0',
  `login_date` int(11) DEFAULT NULL,
  `zt_time` int(11) default '0',
  `wxid`  varchar(100) DEFAULT '',
  KEY `uid` USING BTREE (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
--
-- 表的结构 `phpyun_company_cert`
--

CREATE TABLE `phpyun_company_cert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) default NULL,
  `usertype` int(1) default '0' ,
  `type` varchar(200) NOT NULL default '' ,
  `status` int(11) default '0' ,
  `step` int(11) default NULL ,
  `check` varchar(200) NOT NULL default '',
  `check2` varchar(200) NOT NULL default '',
  `social_credit` varchar(255) NOT NULL default '' ,
  `owner_cert` varchar(200) NOT NULL default '' ,
  `wt_cert` varchar(200) NOT NULL default '' ,
  `other_cert` varchar(200) default '' ,
  `ctime` int(11) default NULL,
  `statusbody` varchar(100) NOT NULL default '',
  `did` int(11) default NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_consultant`
--

CREATE TABLE `phpyun_company_consultant` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `qq` varchar(25) DEFAULT NULL,
  `adtime` int(20) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `weixin` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `zan` int(11) DEFAULT '0',
  `crm_uid` int(11) DEFAULT NULL,
  `assign` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_job`
--

CREATE TABLE `phpyun_company_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `com_name` varchar(50) NOT NULL DEFAULT '',
  `hy` int(5) DEFAULT NULL,
  `job1` int(5) DEFAULT NULL,
  `job1_son` int(5) DEFAULT NULL,
  `job_post` int(5) DEFAULT NULL,
  `provinceid` int(5) DEFAULT NULL,
  `cityid` int(5) DEFAULT NULL,
  `three_cityid` int(5) DEFAULT NULL,
  `cert` varchar(50) NOT NULL DEFAULT '',
  `type` int(5) NOT NULL,
  `number` int(2) NOT NULL,
  `exp` int(5) NOT NULL,
  `report` int(5) NOT NULL,
  `sex` int(5) NOT NULL,
  `edu` int(5) NOT NULL,
  `marriage` int(5) NOT NULL,
  `description` text NOT NULL,
  `xuanshang` int(11) NOT NULL DEFAULT '0',
  `xsdate` int(11) DEFAULT NULL,
  `sdate` int(11) NOT NULL,
  `edate` int(11) NOT NULL,
  `jobhits` int(10) NOT NULL DEFAULT '0',
  `jobexpoure` int(10) NOT NULL DEFAULT '0',
  `lastupdate` int(10) NOT NULL DEFAULT '0',
  `rec` int(2) DEFAULT '0',
  `cloudtype` int(2) DEFAULT NULL,
  `state` int(2) DEFAULT '0',
  `statusbody` varchar(200) NOT NULL DEFAULT '',
  `age` int(11) DEFAULT NULL,
  `lang` text NOT NULL,
  `welfare` text NOT NULL,
  `pr` int(5) DEFAULT NULL,
  `mun` int(5) DEFAULT NULL,
  `com_provinceid` int(5) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `urgent` int(1) DEFAULT NULL,
  `r_status` int(1) DEFAULT '1',
  `end_email` int(1) DEFAULT '0',
  `urgent_time` int(11) DEFAULT NULL,
  `com_logo` varchar(100) NOT NULL DEFAULT '',
  `autotype` int(11) DEFAULT '0',
  `autotime` int(11) DEFAULT '0',
  `is_link` int(1) DEFAULT '1',
  `link_type` int(1) DEFAULT '1',
  `source` int(1) DEFAULT '1',
  `rec_time` int(11) DEFAULT '0',
  `snum` int(11) DEFAULT '0',
  `operatime` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `is_email` int(1) DEFAULT '1',
  `minsalary` int(11) DEFAULT NULL,
  `maxsalary` int(11) DEFAULT NULL,
  `sharepack` int(11) NOT NULL DEFAULT '0',
  `rewardpack` int(11) NOT NULL DEFAULT '0',
  `is_graduate` int(11) DEFAULT '0',
  `zp_num` int(11) DEFAULT '0',
  `zp_minage` int(11) DEFAULT '0',
  `zp_maxage` int(11) DEFAULT '0',
  `upstatus_time` int(11) DEFAULT '0',
  `upstatus_count` int(11) DEFAULT '0',
  `x` varchar(50) DEFAULT NULL,
  `y` varchar(50) DEFAULT NULL,
  `zuid`  int(11) NULL DEFAULT NULL,
  `exp_req` varchar(255) default NULL ,
  `edu_req` varchar(255) default NULL ,
  `sex_req` varchar(255) default NULL ,
  `minage_req` int(5) default NULL ,
  `maxage_req` int(5) default NULL ,
  `is_reserve` int(1) default NULL ,
  `is_message` int(1) NOT NULL DEFAULT '1',
  `link_id` int(11) NULL,
  `yyzz_status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `lastupdate` (`lastupdate`),
  KEY `cityid` (`provinceid`,`cityid`,`three_cityid`),
  KEY `jobid` (`job1`,`job1_son`,`job_post`),
  KEY `urgent` (`urgent_time`),
  KEY `rectime` (`rec_time`),
  KEY `sharepcak` (`sharepack`),
  KEY `rewardpack` (`rewardpack`),
  KEY `xsdate` (`xsdate`),
  KEY `isgraduate` (`is_graduate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_job_link`
--

CREATE TABLE `phpyun_company_job_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `jobid` int(11) DEFAULT NULL,
  `link_man` varchar(100) DEFAULT NULL,
  `link_moblie` varchar(20) DEFAULT NULL,
  `link_phone` varchar(20) DEFAULT NULL,
  `email_type` int(2) DEFAULT NULL,
  `is_email` int(2) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `link_type` int(2) DEFAULT NULL,
  `link_address` varchar(255) NOT NULL DEFAULT '',
  `provinceid` int(11) NULL,
  `cityid` int(11) NULL,
  `three_cityid` int(11) NULL,
  `x` varchar(50) NULL,
  `y` varchar(50) NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_msg`
--

CREATE TABLE `phpyun_company_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `cuid` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `ctime` varchar(100) NOT NULL DEFAULT '',
  `status` int(2) DEFAULT '1',
  `reply` text NOT NULL,
  `reply_time` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `jobid` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL DEFAULT '',
  `desscore` int(11) DEFAULT '0',
  `hrscore` int(11) DEFAULT '0',
  `comscore` int(11) DEFAULT '0',
  `score` double(10,1) DEFAULT '0.0',
  `othercontent` text NOT NULL,
  `msgid` int(11) NOT NULL DEFAULT '0',
  `isnm` int(11) DEFAULT '0',
  `statusbody` varchar(255) NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `cuid` (`cuid`),
  KEY `jobid` (`jobid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_news`
--

CREATE TABLE `phpyun_company_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `title` varchar(200) DEFAULT '0',
  `ctime` int(11) DEFAULT '0',
  `body` text,
  `status` int(2) DEFAULT '0',
  `statusbody` text,
  `did` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_order`
--

CREATE TABLE `phpyun_company_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `order_id` varchar(18) NOT NULL DEFAULT '',
  `order_type` varchar(25) NOT NULL DEFAULT '',
  `order_dkjf` int(11) DEFAULT '0',
  `order_price` double(18,2) NOT NULL,
  `order_time` int(10) NOT NULL,
  `order_state` int(2) NOT NULL,
  `order_remark` text NOT NULL,
  `order_bank` varchar(150) NOT NULL DEFAULT '',
  `type` int(1) DEFAULT NULL,
  `rating` int(10) DEFAULT NULL,
  `integral` int(11) DEFAULT NULL,
  `is_invoice` int(1) DEFAULT '0',
  `coupon` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `order_pic` varchar(100) NOT NULL DEFAULT '',
  `bank_time` int(10) DEFAULT NULL,
  `order_info` text NOT NULL,
  `rewardid` int(11) DEFAULT NULL,
  `crm_uid` int(11) DEFAULT NULL,
  `once_id` int(11) DEFAULT NULL,
  `fast` varchar(6) DEFAULT NULL,
  `usertype` int(11) DEFAULT '0',
  `port` int(1) default NULL ,
  `is_crm` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_pay`
--

CREATE TABLE `phpyun_company_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(18) DEFAULT NULL,
  `order_price` decimal(10,2) DEFAULT NULL,
  `pay_time` int(11) DEFAULT NULL,
  `pay_state` int(2) DEFAULT NULL,
  `com_id` int(10) DEFAULT NULL,
  `pay_remark` varchar(255) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `pay_type` int(4) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT '0',
  `usertype` int(11) DEFAULT '0',
  `coupon_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `com_id` (`com_id`),
  KEY `com_id_2` (`com_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_product`
--

CREATE TABLE `phpyun_company_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `title` varchar(200) DEFAULT '0',
  `pic` varchar(200) DEFAULT '0',
  `body` text,
  `ctime` int(11) DEFAULT '0',
  `status` int(2) DEFAULT '0',
  `statusbody` text,
  `did` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_rating`
--

CREATE TABLE `phpyun_company_rating` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `service_price` varchar(100) DEFAULT NULL,
  `integral_buy` varchar(100) DEFAULT NULL,
  `yh_price` varchar(100) DEFAULT NULL,
  `yh_integral` varchar(100) DEFAULT NULL,
  `time_start` int(11) DEFAULT NULL,
  `time_end` int(11) DEFAULT NULL,
  `resume` int(5) DEFAULT NULL,
  `job_num` int(11) DEFAULT NULL,
  `interview` int(11) DEFAULT NULL,
  `editjob_num` int(11) DEFAULT NULL,
  `breakjob_num` int(11) DEFAULT NULL,
  `sort` int(10) DEFAULT NULL,
  `display` int(1) DEFAULT NULL,
  `explains` varchar(255) DEFAULT NULL,
  `com_pic` varchar(100) DEFAULT NULL,
  `com_color` varchar(100) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `lt_resume` int(11) DEFAULT NULL,
  `lt_job_num` int(11) DEFAULT NULL,
  `lt_editjob_num` int(11) DEFAULT NULL,
  `lt_breakjob_num` int(11) DEFAULT NULL,
  `category` int(2) DEFAULT NULL,
  `msg_num` int(11) DEFAULT '0',
  `service_time` int(11) DEFAULT NULL,
  `coupon` int(11) DEFAULT '0',
  `part_num` int(11) DEFAULT '0',
  `editpart_num` int(11) DEFAULT '0',
  `breakpart_num` int(11) DEFAULT '0',
  `zph_num` int(11) DEFAULT '0',
  `service_discount` int(2) DEFAULT NULL,
  `jobrec` int(11) DEFAULT '1',
  `top_num` int(11) DEFAULT '0',
  `urgent_num` int(11) DEFAULT '0',
  `rec_num` int(11) DEFAULT '0',
  `sons_num` int(11) DEFAULT '0',
  `xcx` int(11) DEFAULT '1',
  `xcx_num` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_service`
--

CREATE TABLE `phpyun_company_service` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `display` int(1) DEFAULT '1',
  `sort` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_service_detail`
--

CREATE TABLE `phpyun_company_service_detail` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `service_price` varchar(100) DEFAULT NULL,
  `resume` int(5) DEFAULT NULL,
  `interview` int(11) DEFAULT NULL,
  `job_num` int(11) DEFAULT NULL,
  `breakjob_num` int(11) DEFAULT NULL,
  `part_num` int(11) DEFAULT NULL,
  `breakpart_num` int(11) DEFAULT NULL,
  `lt_job_num` int(11) DEFAULT NULL,
  `lt_breakjob_num` int(11) DEFAULT NULL,
  `lt_resume` int(11) DEFAULT NULL,
  `type` int(6) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `zph_num` int(11) DEFAULT '0',
  `top_num` int(11) DEFAULT '0',
  `rec_num` int(11) DEFAULT '0',
  `urgent_num` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_show`
--

CREATE TABLE `phpyun_company_show` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `picurl` varchar(200) DEFAULT NULL,
  `body` varchar(200) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `sort` int(4) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `statusbody` varchar(255) DEFAULT '',
  `did` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_statis`
--

CREATE TABLE `phpyun_company_statis` (
  `uid` int(11) NOT NULL,
  `pay` double(10,2) NOT NULL DEFAULT '0.00',
  `packpay` double(10,2) DEFAULT '0.00',
  `freeze` double(10,2) unsigned DEFAULT '0.00',
  `integral` varchar(10) NOT NULL DEFAULT '',
  `sq_job` int(6) unsigned NOT NULL,
  `fav_job` int(6) unsigned NOT NULL,
  `rating` int(5) unsigned DEFAULT NULL,
  `rating_name` varchar(100) NOT NULL DEFAULT '',
  `all_pay` double(10,2) NOT NULL,
  `consum_pay` double(10,2) NOT NULL,
  `rating_type` int(11) unsigned DEFAULT NULL,
  `invite_resume` int(10)  DEFAULT '0',
  `comtpl` varchar(100) NOT NULL DEFAULT '',
  `comtpl_all` varchar(100) NOT NULL DEFAULT '',
  `job_num` int(11) DEFAULT '0',
  `editjob_num` int(11) DEFAULT '0',
  `breakjob_num` int(11) DEFAULT '0',
  `down_resume` int(10) DEFAULT '0',
  `qqshow` int(11) DEFAULT '0',
  `qqcomment` int(11) DEFAULT '0',
  `sinashare` int(11) DEFAULT '0',
  `sinashow` int(11) DEFAULT '0',
  `sinacomment` int(11) DEFAULT '0',
  `qqwname` varchar(100) NOT NULL DEFAULT '',
  `sinawname` varchar(100) NOT NULL DEFAULT '',
  `lt_job_num` int(11) DEFAULT '0',
  `lt_editjob_num` int(11) DEFAULT '0',
  `lt_breakjob_num` int(11) DEFAULT '0',
  `lt_down_resume` int(11) DEFAULT '0',
  `qqshare` int(11) DEFAULT '0',
  `msg_num` int(11) DEFAULT '0',
  `autotime` int(11) DEFAULT '0',
  `vip_stime` int(11) DEFAULT '0',
  `vip_etime` int(11) DEFAULT '0',
  `did` int(11) DEFAULT NULL,
  `part_num` int(11) DEFAULT '0',
  `editpart_num` int(11) DEFAULT '0',
  `breakpart_num` int(11) DEFAULT '0',
  `zph_num` int(11) DEFAULT '0',
  `oldrating` int(11) DEFAULT NULL,
  `oldrating_name` varchar(200) DEFAULT NULL,
  `top_num` int(11) DEFAULT '0',
  `urgent_num` int(11) DEFAULT '0',
  `rec_num` int(11) DEFAULT '0',
  `sons_num` int(11) DEFAULT '0',
  `xcx` int(1) DEFAULT '0',
  `xcxstime` varchar(100) NOT NULL DEFAULT '',
  `xcxetime` varchar(100) NOT NULL DEFAULT '',
  `xcx_num` int(11) DEFAULT '0',
  `res_job_num` int(11) NOT NULL DEFAULT '0',
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_company_tpl`
--

CREATE TABLE `phpyun_company_tpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '0',
  `url` varchar(100) DEFAULT '0',
  `pic` varchar(200) DEFAULT '0',
  `type` int(10) DEFAULT '1',
  `price` varchar(100) DEFAULT '0',
  `status` int(10) DEFAULT NULL,
  `service_uid` varchar(225) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_cron`
--

CREATE TABLE `phpyun_cron` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `dir` varchar(200) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `week` int(11) DEFAULT NULL,
  `month` int(10) DEFAULT NULL,
  `hour` int(10) DEFAULT NULL,
  `minute` int(10) DEFAULT NULL,
  `display` int(1) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `nowtime` int(11) DEFAULT '0',
  `nexttime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_description`
--

CREATE TABLE `phpyun_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `descs` text,
  `top_tpl` int(2) DEFAULT NULL,
  `top_tpl_dir` varchar(255) DEFAULT NULL,
  `footer_tpl` int(2) DEFAULT NULL,
  `footer_tpl_dir` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  `sort` int(11) DEFAULT NULL,
  `is_nav` int(1) DEFAULT '0',
  `ctime` int(11) DEFAULT NULL,
  `is_menu` int(11) DEFAULT '0',
  `is_type` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_desc_class`
--

CREATE TABLE `phpyun_desc_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sort` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_domain`
--

CREATE TABLE `phpyun_domain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `domain` varchar(200) NOT NULL,
  `province` int(11) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `three_cityid` int(11) DEFAULT NULL,
  `type` int(2) NOT NULL,
  `style` varchar(100) NOT NULL,
  `tpl` varchar(20) DEFAULT NULL,
  `hy` int(11) DEFAULT NULL,
  `fz_type` int(11) NOT NULL,
  `webtitle` text,
  `webkeyword` text,
  `webmeta` text,
  `weblogo` varchar(255) DEFAULT NULL,
  `mode` int(11) DEFAULT '0',
  `indexdir` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_down_resume`
--

CREATE TABLE `phpyun_down_resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `comid` int(11) DEFAULT NULL,
  `downtime` int(11) DEFAULT NULL,
  `remark` varchar(200) NOT NULL DEFAULT '',
  `did` int(11) DEFAULT NULL,
  `type` int(1) DEFAULT '0',
  `usertype` int(1) DEFAULT '0',
  `status` int(5) NOT NULL,
  `isdel` int(1) NOT NULL DEFAULT '9',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `comid` (`comid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_email_msg`
--

CREATE TABLE `phpyun_email_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `cuid` int(11) DEFAULT NULL,
  `cname` varchar(255) DEFAULT '系统',
  `email` varchar(200) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text,
  `ctime` int(11) DEFAULT NULL,
  `state` int(1) DEFAULT '0',
  `smtpserver` varchar(100) DEFAULT NULL,
  `del` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_entrust`
--

CREATE TABLE `phpyun_entrust` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `lt_uid` int(11) DEFAULT NULL,
  `datetime` int(11) DEFAULT NULL,
  `remind_status` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- 表的结构 `phpyun_error_log`
--

CREATE TABLE `phpyun_error_log` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) default NULL ,
  `type` int(11) default NULL ,
  `content` varchar(255) default NULL ,
  `ctime` int(10) default NULL ,
  `isread` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY  USING BTREE (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- 表的结构 `phpyun_evaluate`
--

CREATE TABLE `phpyun_evaluate` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `gid` int(4) DEFAULT NULL,
  `question` text,
  `option` text,
  `score` text,
  `sort` int(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_evaluate_group`
--

CREATE TABLE `phpyun_evaluate_group` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `keyid` int(4) NOT NULL DEFAULT '0',
  `name` varchar(32) NOT NULL,
  `sort` int(4) NOT NULL DEFAULT '0',
  `description` text,
  `ctime` int(11) DEFAULT NULL,
  `fromscore` text,
  `toscore` text,
  `comment` text,
  `visits` int(4) NOT NULL DEFAULT '0',
  `comnum` int(11) DEFAULT '0',
  `pic` varchar(64) DEFAULT NULL,
  `num` int(10) DEFAULT NULL,
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `score` int(11) DEFAULT '0',
  `top` int(1) DEFAULT '0',
  `hot` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_evaluate_leave_message`
--

CREATE TABLE `phpyun_evaluate_leave_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `examid` int(4) unsigned NOT NULL,
  `uid` varchar(36) NOT NULL,
  `usertype` int(1) DEFAULT NULL,
  `message` varchar(512) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_evaluate_log`
--

CREATE TABLE `phpyun_evaluate_log` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `uid` int(4) DEFAULT NULL,
  `nuid` varchar(36) DEFAULT NULL,
  `examid` int(4) NOT NULL,
  `grade` int(4) DEFAULT NULL,
  `ctime` int(11) NOT NULL,
  `usedsecond` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_fav_job`
--

CREATE TABLE `phpyun_fav_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `com_name` varchar(150) NOT NULL,
  `datetime` int(10) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `job_name` varchar(150) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_finder`
--

CREATE TABLE `phpyun_finder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `usertype` int(1) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `para` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- 表的结构 `phpyun_friend_help`
--
CREATE TABLE `phpyun_friend_help` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`comid`  int(11) NOT NULL ,
`stime`  int(11) NULL DEFAULT NULL ,
`etime`  int(11) NULL DEFAULT 0 ,
`token`  varchar(255)  NULL DEFAULT NULL ,
`zlnum`  int(11) NULL DEFAULT 0 ,
`job_num`  int(11) NULL DEFAULT 0 ,
`job_num_zl`  int(11) NULL DEFAULT 0 ,
`breakjob_num`  int(11) NULL DEFAULT 0 ,
`breakjob_num_zl`  int(11) NULL DEFAULT 0 ,
`invite_resume`  int(11) NULL DEFAULT 0 ,
`invite_resume_zl`  int(11) NULL DEFAULT 0 ,
`top_num`  int(11) NULL DEFAULT 0 ,
`top_num_zl`  int(11) NULL DEFAULT 0 ,
`urgent_num`  int(11) NULL DEFAULT 0 ,
`urgent_num_zl`  int(11) NULL DEFAULT 0 ,
`rec_num`  int(11) NULL DEFAULT 0 ,
`rec_num_zl`  int(11) NULL DEFAULT 0 ,
`down_resume`  int(11) NULL DEFAULT 0 ,
`down_resume_zl`  int(11) NULL DEFAULT 0 ,
`package`  text  NULL DEFAULT NULL ,
`receive`  text  NULL DEFAULT NULL ,
`state`  int(11) NULL DEFAULT 0 ,
PRIMARY KEY (`id`),
INDEX `comid` USING BTREE (`comid`) 
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_friend_help_log`
--
CREATE TABLE `phpyun_friend_help_log` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`comid`  int(11) NULL DEFAULT NULL ,
`pid`  int(11) NOT NULL ,
`wxid`  varchar(255)  NULL DEFAULT NULL ,
`wxname`  varchar(255)  NULL DEFAULT NULL ,
`city`  varchar(255)  NULL DEFAULT NULL ,
`wxpic`  text  NULL DEFAULT NULL ,
`time`  int(11) NULL DEFAULT NULL ,
`helpstate`  int(11) NULL DEFAULT 0 ,
`unionid` varchar(255) default NULL,
PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_friend_help_receive`
--
CREATE TABLE `phpyun_friend_help_receive` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`pid`  int(11) NOT NULL ,
`name`  varchar(255)  NULL DEFAULT NULL ,
`time`  int(11) NULL DEFAULT NULL ,
`num`  int(11) NULL DEFAULT 0 ,
PRIMARY KEY (`id`),
INDEX `name` USING BTREE (`name`) ,
INDEX `num` USING BTREE (`num`) 
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
-- --------------------------------------------------------

--
-- 表的结构 `phpyun_gongzhao`
--
CREATE TABLE `phpyun_gongzhao` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`title` varchar(255) NOT NULL DEFAULT '',
`keyword` varchar(255) NOT NULL DEFAULT '',
`description` varchar(255) NOT NULL DEFAULT '',
`content` longtext NOT NULL,
`datetime` int(11) NOT NULL,
`did` int(11) NOT NULL,
`startime` int(11) NOT NULL,
`endtime` int(11) NOT NULL,
`pic` varchar(200) NOT NULL,
`rec` int(1) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_hotjob`
--

CREATE TABLE `phpyun_hotjob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `rating` varchar(20) DEFAULT NULL,
  `hot_pic` varchar(100) DEFAULT NULL,
  `service_price` int(11) DEFAULT NULL,
  `time_start` int(11) DEFAULT NULL,
  `time_end` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `beizhu` varchar(200) DEFAULT NULL,
  `rating_id` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `lastupdate` int(10) NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_hot_key`
--

CREATE TABLE `phpyun_hot_key` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `key_name` varchar(100) NOT NULL,
  `num` int(20) NOT NULL DEFAULT '0',
  `type` int(2) NOT NULL,
  `size` varchar(10) DEFAULT NULL,
  `check` int(1) DEFAULT '0',
  `color` varchar(10) DEFAULT NULL,
  `bold` int(11) DEFAULT NULL,
  `tuijian` int(11) DEFAULT '0',
  `wxtime` int(11) DEFAULT '0',
  `wxuser` varchar(100) DEFAULT NULL,
  `wxid` varchar(100) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_industry`
--

CREATE TABLE `phpyun_industry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `sort` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_introduce_class`
--
CREATE TABLE `phpyun_introduce_class` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`name`  varchar(50)  NOT NULL DEFAULT '' ,
`sort`  int(11) NOT NULL ,
`content`  text  NOT NULL ,
PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


-- --------------------------------------------------------

--
-- 表的结构 `phpyun_job_class`
--

CREATE TABLE `phpyun_job_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL,
  `content` text,
  `e_name`  varchar(255)  NULL DEFAULT NULL,
  `rec` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- 表的结构 `phpyun_job_tellog`
--

CREATE TABLE `phpyun_job_tellog` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) default '0',
  `comid` int(11) default NULL,
  `jobid` int(11) default NULL,
  `ip` varchar(20) default NULL,
  `source` int(2) default '2',
  `ctime` int(11) default NULL,
  PRIMARY KEY  USING BTREE (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC  AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_job_refresh_log`
--

CREATE TABLE `phpyun_job_refresh_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `usertype` int(1) NOT NULL DEFAULT 0,
  `jobid` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `r_time` varchar(10) NOT NULL,
  `port` int(1) NULL DEFAULT NULL,
  `ip` varchar(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_login_log`
--

CREATE TABLE `phpyun_login_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `usertype` int(11) DEFAULT NULL,
  `content` text,
  `ip` varchar(40) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `remoteport` int(8) NOT NULL DEFAULT '0',
  `did` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_look_job`
--

CREATE TABLE `phpyun_look_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `jobid` int(11) DEFAULT NULL,
  `com_id` int(11) DEFAULT NULL,
  `datetime` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `com_status` int(1) DEFAULT '0',
  `did` int(11) DEFAULT NULL,
  `ip` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `com_id` (`com_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_look_resume`
--

CREATE TABLE `phpyun_look_resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `com_id` int(11) DEFAULT NULL,
  `resume_id` int(11) DEFAULT NULL,
  `datetime` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `com_status` int(1) DEFAULT '0',
  `did` int(11) DEFAULT NULL,
  `usertype` int(11) DEFAULT '0',
  `isshow` int(5) default '0' ,
  `ip` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `com_id` (`com_id`),
  KEY `resume_id` (`resume_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_member`
--

CREATE TABLE `phpyun_member` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `moblie` varchar(20) NOT NULL DEFAULT '',
  `reg_ip` varchar(40) NOT NULL DEFAULT '',
  `reg_date` int(11) DEFAULT NULL,
  `login_ip` varchar(40) NOT NULL DEFAULT '',
  `login_date` int(11) DEFAULT NULL,
  `usertype` int(1) NOT NULL DEFAULT '1',
  `login_hits` int(11) DEFAULT '0',
  `salt` varchar(6) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `name_repeat` int(2) DEFAULT '0',
  `qqid` varchar(200) NOT NULL DEFAULT '',
  `status` int(4) DEFAULT NULL,
  `pwuid` int(11) DEFAULT '0',
  `pw_repeat` int(1) DEFAULT '0',
  `lock_info` varchar(200) NOT NULL DEFAULT '',
  `email_status` int(1) DEFAULT NULL,
  `signature` varchar(100) NOT NULL DEFAULT '',
  `sinaid` varchar(100) NOT NULL DEFAULT '',
  `wxid` varchar(100) NOT NULL DEFAULT '',
  `wxopenid` varchar(100) NOT NULL DEFAULT '',
  `unionid` varchar(100) NOT NULL DEFAULT '',
  `wxname` varchar(100) NOT NULL DEFAULT '',
  `wxbindtime` int(11) DEFAULT '0',
  `passtext` varchar(100) NOT NULL DEFAULT '',
  `source` int(1) DEFAULT '1',
  `regcode` int(10) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `claim` int(1) DEFAULT '0',
  `restname` int(1) DEFAULT '0',
  `appeal` varchar(100) NOT NULL DEFAULT '',
  `appealtime` int(11) DEFAULT NULL,
  `appealstate` int(1) DEFAULT '1',
  `signday` int(11) DEFAULT '0',
  `signdays` int(11) DEFAULT '0',
  `token` varchar(200) DEFAULT NULL,
  `tokentime` int(11) DEFAULT NULL,
  `appuuid` varchar(200) DEFAULT NULL,
  `qqunionid` varchar(200) DEFAULT NULL,
  `clientid` varchar(200) DEFAULT NULL,
  `deviceToken` varchar(200) DEFAULT NULL,
  `applocker` int(9) DEFAULT '0',
  `maguid` int(11) DEFAULT NULL,
  `qfyuid` int(11) DEFAULT NULL,
  `moblie_status` int(11) DEFAULT '0',
  `pid` int(11) DEFAULT '0',
  `bdopenid` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  KEY `uid` (`uid`),
  KEY `username` (`username`),
  KEY `usertype` (`usertype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_member_log`
--

CREATE TABLE `phpyun_member_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) default NULL,
  `opera` int(11) default NULL ,
  `type` int(11) default NULL ,
  `usertype` int(11) default NULL ,
  `content` text NOT NULL,
  `ip` varchar(40) NOT NULL default '',
  `remoteport` int(8) default NULL,
  `ctime` int(11) default NULL ,
  `jobnum` int(11) default NULL ,
  `did` int(11) default NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_member_logout`
--
CREATE TABLE `phpyun_member_logout` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`uid`  int(11) NULL DEFAULT NULL ,
`ctime`  int(11) NULL DEFAULT 0 ,
`status`  int(1) NULL DEFAULT 1 ,
`username` varchar(30) NOT NULL DEFAULT '',
`tel` varchar(15) NOT NULL DEFAULT '',
PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
-- --------------------------------------------------------

--
-- 表的结构 `phpyun_member_reg`
--

CREATE TABLE `phpyun_member_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `usertype` int(11) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_member_statis`
--

CREATE TABLE `phpyun_member_statis` (
  `uid` int(11) NOT NULL,
  `integral` varchar(10) NOT NULL DEFAULT '',
  `pay` double(10,2) NOT NULL DEFAULT '0.00',
  `packpay` double(10,2) DEFAULT '0.00',
  `freeze` double(10,2) unsigned DEFAULT '0.00',
  `resume_num` int(10) NOT NULL,
  `fav_jobnum` int(10) NOT NULL,
  `sq_jobnum` int(10) NOT NULL,
  `message_num` int(10) NOT NULL,
  `down_num` int(10) NOT NULL,
  `tpl` int(11) DEFAULT '0',
  `paytpls` varchar(255) NOT NULL DEFAULT '',
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_member_withdraw`
--

CREATE TABLE `phpyun_member_withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL,
  `price` double(10,2) DEFAULT '0.00',
  `order_price` double(10,2) NOT NULL DEFAULT '0.00',
  `pound_price` double(10,2) DEFAULT '0.00',
  `uid` int(11) NOT NULL,
  `usertype` int(11) DEFAULT NULL,
  `real_name` varchar(100) DEFAULT NULL,
  `wxid` varchar(100) DEFAULT NULL,
  `order_state` int(11) DEFAULT '0',
  `order_remark` text,
  `time` int(11) DEFAULT NULL,
  `payment_no` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


--
-- 表的结构 `phpyun_moblie_msg`
--

CREATE TABLE `phpyun_moblie_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `cuid` int(11) DEFAULT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `moblie` varchar(200) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `ip` varchar(40) DEFAULT NULL,
  `port` int(1) default NULL ,
  `location` varchar(255) default NULL ,
  `del` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_msg`
--

CREATE TABLE `phpyun_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `jobid` int(11) DEFAULT NULL,
  `job_uid` int(11) DEFAULT NULL,
  `datetime` int(11) DEFAULT NULL,
  `reply` text,
  `content` text,
  `reply_time` int(11) DEFAULT NULL,
  `com_name` varchar(100) DEFAULT NULL,
  `job_name` varchar(100) DEFAULT NULL,
  `del_status` int(11) DEFAULT '0',
  `type` int(11) DEFAULT '1',
  `user_remind_status` int(1) DEFAULT '1',
  `com_remind_status` int(1) DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `statusbody` text,
  `issys` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_navigation`
--

CREATE TABLE `phpyun_navigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `display` int(1) NOT NULL,
  `eject` int(1) NOT NULL,
  `type` int(1) DEFAULT '1',
  `furl` varchar(100) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `bold` int(1) DEFAULT NULL,
  `desc` int(11) DEFAULT NULL,
  `news` int(11) DEFAULT NULL,
  `config` varchar(100) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_navigation_type`
--

CREATE TABLE `phpyun_navigation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_navmap`
--

CREATE TABLE `phpyun_navmap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `display` int(1) NOT NULL DEFAULT '0',
  `eject` int(1) NOT NULL,
  `type` int(1) DEFAULT '1',
  `furl` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_news_base`
--

CREATE TABLE `phpyun_news_base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nid` int(11) NOT NULL,
  `did` int(11) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `keyword` varchar(200) NOT NULL,
  `author` varchar(200) NOT NULL,
  `datetime` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `describe` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `newsphoto` varchar(100) DEFAULT NULL,
  `s_thumb` varchar(100) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `lastupdate` int(11) DEFAULT NULL,
  `starttime` int(11) NOT NULL default '0' ,
  `endtime` int(11) NOT NULL default '0' ,
  PRIMARY KEY (`id`),
  KEY `nid` (`nid`),
  KEY `datetime` (`datetime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_news_content`
--

CREATE TABLE `phpyun_news_content` (
  `nbid` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `did` int(11) DEFAULT '0',
  PRIMARY KEY (`nbid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_news_group`
--

CREATE TABLE `phpyun_news_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sort` int(11) DEFAULT '0',
  `rec` int(1) DEFAULT '0',
  `is_menu` int(1) DEFAULT '0',
  `rec_news` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_once_job`
--

CREATE TABLE `phpyun_once_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `mans` varchar(100) NOT NULL,
  `require` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `hits` int(11) DEFAULT '0',
  `linkman` varchar(50) NOT NULL,
  `provinceid` int(11) NOT NULL,
  `cityid` int(11) NOT NULL,
  `three_cityid` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `ctime` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `edate` int(11) DEFAULT NULL,
  `login_ip` varchar(40) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `sxtime` int(11) DEFAULT NULL,
  `sxnumber` int(11) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `salary` varchar(100) NOT NULL,
  `pay` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_once_price_gear`
--

CREATE TABLE `phpyun_once_price_gear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `days` int(11) NOT NULL DEFAULT '0',
  `price` decimal(10, 2) NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_outside`
--

CREATE TABLE `phpyun_outside` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `titlelen` int(10) DEFAULT NULL,
  `infolen` int(10) DEFAULT NULL,
  `byorder` varchar(200) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `code` text,
  `edittime` int(10) DEFAULT NULL,
  `lasttime` int(11) DEFAULT NULL,
  `urltype` varchar(200) DEFAULT NULL,
  `timetype` varchar(200) DEFAULT NULL,
  `where` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_partclass`
--

CREATE TABLE `phpyun_partclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `variable` varchar(50) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_partjob`
--

CREATE TABLE `phpyun_partjob` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL DEFAULT '',
  `type` int(11) DEFAULT NULL,
  `sdate` int(11) DEFAULT NULL,
  `edate` int(11) DEFAULT NULL,
  `worktime` varchar(255) NOT NULL DEFAULT '',
  `number` int(11) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `salary_type` int(11) DEFAULT NULL,
  `billing_cycle` int(11) DEFAULT NULL,
  `provinceid` int(11) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `three_cityid` int(11) DEFAULT NULL,
  `address` varchar(100) NOT NULL DEFAULT '',
  `x` varchar(10) NOT NULL DEFAULT '',
  `y` varchar(10) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `deadline` int(11) DEFAULT NULL,
  `linkman` varchar(10) NOT NULL DEFAULT '',
  `linktel` varchar(15) NOT NULL DEFAULT '',
  `addtime` int(11) DEFAULT NULL,
  `r_status` int(2) DEFAULT '1',
  `state` int(2) DEFAULT '0',
  `lastupdate` int(11) DEFAULT NULL,
  `statusbody` varchar(200) NOT NULL DEFAULT '',
  `hits` int(11) DEFAULT '0',
  `com_name` varchar(30) NOT NULL DEFAULT '',
  `rec_time` int(11) DEFAULT '0',
  `did` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `upstatus_count` int(11) NOT NULL DEFAULT '0',
  `upstatus_time` int(11) NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_part_apply`
--

CREATE TABLE `phpyun_part_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `jobid` int(11) DEFAULT NULL,
  `comid` int(11) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_part_collect`
--

CREATE TABLE `phpyun_part_collect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `jobid` int(11) DEFAULT NULL,
  `comid` int(11) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- 表的结构 `phpyun_property`
--

CREATE TABLE `phpyun_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `value` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_question`
--

CREATE TABLE `phpyun_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `answer_num` int(11) NOT NULL DEFAULT '0',
  `atnnum` int(11) DEFAULT '0',
  `visit` int(11) NOT NULL DEFAULT '0',
  `is_recom` int(1) NOT NULL DEFAULT '0',
  `lastupdate` int(11) DEFAULT NULL,
  `add_time` int(11) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `state` int(11) DEFAULT '0',
  `ip` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_q_class`
--

CREATE TABLE `phpyun_q_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `pid` int(11) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `intro` text,
  `add_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_reason`
--

CREATE TABLE `phpyun_reason` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_recommend`
--

CREATE TABLE `phpyun_recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `rec_type` tinyint(1) DEFAULT NULL,
  `rec_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_recycle`
--

CREATE TABLE `phpyun_recycle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL ,
  `username` varchar(255) DEFAULT NULL,
  `tablename` varchar(100) DEFAULT NULL,
  `body` longtext,
  `ctime` int(11) DEFAULT NULL,
  `ident` varchar(255) default NULL ,
  `uri` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_redeem_class`
--

CREATE TABLE `phpyun_redeem_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_report`
--

CREATE TABLE `phpyun_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_uid` int(11) DEFAULT NULL,
  `c_uid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `usertype` int(1) DEFAULT NULL,
  `c_usertype` int(1) DEFAULT NULL,
  `inputtime` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `r_name` varchar(100) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `r_reason` varchar(200) DEFAULT NULL,
  `type` int(11) DEFAULT '0',
  `r_type` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `rtime` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `datafh` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_reserve_refresh`
--
CREATE TABLE `phpyun_reserve_refresh` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL ,
  `status` int(1) NOT NULL DEFAULT 1 ,
  `interval` int(3) NOT NULL DEFAULT 0 ,
  `start_time` int(11) NOT NULL ,
  `end_time` int(11) NULL DEFAULT 0 ,
  `last_time` int(11) NULL DEFAULT NULL ,
  `next_time` int(11) NULL DEFAULT NULL ,
  `s_time` varchar(10) NOT NULL,
  `e_time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;
-- --------------------------------------------------------
--
-- 表的结构 `phpyun_resume`
--

CREATE TABLE `phpyun_resume` (
  `uid` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `nametype` int(11) DEFAULT '1',
  `sex` int(2) DEFAULT NULL,
  `birthday` varchar(10) DEFAULT NULL,
  `marriage` int(10) DEFAULT NULL,
  `height` varchar(4) DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `weight` varchar(4) DEFAULT NULL,
  `idcard` varchar(20) DEFAULT NULL,
  `telphone` varchar(20) DEFAULT NULL,
  `telhome` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `edu` int(11) DEFAULT NULL,
  `homepage` varchar(50) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `description` text,
  `resume_photo` varchar(100) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `phototype` int(11) DEFAULT '0',
  `photo_status` int(11) DEFAULT '0',
  `photo_statusbody` varchar(255) NOT NULL DEFAULT '',
  `expect` int(11) DEFAULT '0',
  `def_job` int(11) DEFAULT '0',
  `exp` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `lastupdate` int(11) DEFAULT NULL,
  `resumetime` int(11) DEFAULT '0',
  `idcard_pic` varchar(100) DEFAULT NULL,
  `email_status` int(1) DEFAULT '0',
  `moblie_status` int(1) DEFAULT '0',
  `idcard_status` int(1) DEFAULT '0',
  `statusbody` varchar(200) DEFAULT NULL,
  `cert_time` int(11) DEFAULT NULL,
  `r_status` int(1) DEFAULT '0',
  `ant_num` int(11) DEFAULT '0',
  `email_dy` int(1) DEFAULT '0',
  `msg_dy` int(1) DEFAULT '0',
  `living` varchar(100) DEFAULT NULL,
  `domicile` varchar(100) DEFAULT NULL,
  `basic_info` int(11) DEFAULT '1',
  `hy_dy` varchar(100) DEFAULT NULL,
  `info_status` int(1) DEFAULT '1',
  `did` int(11) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `wxewm` varchar(200) DEFAULT NULL,
  `tag` varchar(200) DEFAULT NULL,
  `retire` varchar(100) DEFAULT NULL,
  `retire_pic` varchar(200) DEFAULT NULL,
  `retire_status` int(1) DEFAULT '0',
  `retirebody` varchar(200) DEFAULT NULL,
  `login_date` int(11) DEFAULT NULL,
  `wxid`  varchar(100) DEFAULT '',
  `defphoto` int(1) NOT NULL DEFAULT '1',
  `label` text NULL,
  KEY `uid` USING BTREE (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resumeout`
--

CREATE TABLE `phpyun_resumeout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `comname` varchar(100) NOT NULL DEFAULT '',
  `jobname` varchar(100) NOT NULL DEFAULT '',
  `recipient` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `resume` varchar(100) NOT NULL DEFAULT '',
  `datetime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resumetpl`
--

CREATE TABLE `phpyun_resumetpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '0',
  `url` varchar(100) DEFAULT '0',
  `pic` varchar(200) DEFAULT '0',
  `type` int(10) DEFAULT '1',
  `price` varchar(100) DEFAULT '0',
  `status` int(10) DEFAULT NULL,
  `service_uid` varchar(225) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_cert`
--

CREATE TABLE `phpyun_resume_cert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL DEFAULT '',
  `sdate` int(10) DEFAULT NULL,
  `edate` int(10) DEFAULT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_city_job_class`
--

CREATE TABLE `phpyun_resume_city_job_class` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provinceid` int(10) unsigned NOT NULL DEFAULT '0',
  `provinceid_num` tinyint(4) NOT NULL DEFAULT '0',
  `cityid` int(10) unsigned NOT NULL DEFAULT '0',
  `cityid_num` tinyint(4) NOT NULL DEFAULT '0',
  `three_cityid` int(10) unsigned NOT NULL DEFAULT '0',
  `three_cityid_num` tinyint(4) NOT NULL DEFAULT '0',
  `job1` int(10) unsigned NOT NULL DEFAULT '0',
  `job1_num` tinyint(4) NOT NULL DEFAULT '0',
  `job1_son` int(10) unsigned NOT NULL DEFAULT '0',
  `job1_son_num` tinyint(4) NOT NULL DEFAULT '0',
  `job_post` int(10) unsigned NOT NULL DEFAULT '0',
  `job_post_num` tinyint(4) NOT NULL DEFAULT '0',
  `provinceid_job1_num` tinyint(4) NOT NULL DEFAULT '0',
  `provinceid_job1_son_num` tinyint(4) NOT NULL DEFAULT '0',
  `provinceid_job_post_num` tinyint(4) NOT NULL DEFAULT '0',
  `cityid_job1_num` tinyint(4) NOT NULL DEFAULT '0',
  `cityid_job1_son_num` tinyint(4) NOT NULL DEFAULT '0',
  `cityid_job_post_num` tinyint(4) NOT NULL DEFAULT '0',
  `three_cityid_job1_num` tinyint(4) NOT NULL DEFAULT '0',
  `three_cityid_job1_son_num` tinyint(4) NOT NULL DEFAULT '0',
  `three_cityid_job_post_num` tinyint(4) NOT NULL DEFAULT '0',
  `eid` int(10) unsigned NOT NULL DEFAULT '0',
  `lastupdate` int(11) NOT NULL DEFAULT '0',
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `provinceid_num_idx`(`provinceid`, `provinceid_num`) USING BTREE,
  INDEX `cityid_num_idx`(`cityid`, `cityid_num`) USING BTREE,
  INDEX `three_cityid_num_idx`(`three_cityid`, `three_cityid_num`) USING BTREE,
  INDEX `job1_num_idx`(`job1`, `job1_num`) USING BTREE,
  INDEX `job1_son_num_idx`(`job1_son`, `job1_son_num`) USING BTREE,
  INDEX `job_post_num_idx`(`job_post`, `job_post_num`) USING BTREE,
  INDEX `provinceid_job1_num_idx`(`provinceid`, `job1`, `provinceid_job1_num`) USING BTREE,
  INDEX `provinceid_job1_son_num_idx`(`provinceid`, `job1_son`, `provinceid_job1_son_num`) USING BTREE,
  INDEX `provinceid_job_post_num_idx`(`provinceid`, `job_post`, `provinceid_job_post_num`) USING BTREE,
  INDEX `cityid_job1_num_idx`(`cityid`, `job1`, `cityid_job1_num`) USING BTREE,
  INDEX `cityid_job1_son_num_idx`(`cityid`, `job1_son`, `cityid_job1_son_num`) USING BTREE,
  INDEX `cityid_job_post_num_idx`(`cityid`, `job_post`, `cityid_job_post_num`) USING BTREE,
  INDEX `three_cityid_job1_num_idx`(`three_cityid`, `job1`, `three_cityid_job1_num`) USING BTREE,
  INDEX `three_cityid_job1_son_num_idx`(`three_cityid`, `job1_son`, `three_cityid_job1_son_num`) USING BTREE,
  INDEX `three_cityid_job_post_num_idx`(`provinceid`, `job_post`, `three_cityid_job_post_num`) USING BTREE,
  INDEX `eid_idx`(`eid`) USING BTREE,
  INDEX `lastupdate_idx`(`lastupdate`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_cityclass`
--

CREATE TABLE `phpyun_resume_cityclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `provinceid` int(11) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `three_cityid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` USING BTREE (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_doc`
--

CREATE TABLE `phpyun_resume_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `doc` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_edu`
--

CREATE TABLE `phpyun_resume_edu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL DEFAULT '',
  `sdate` int(10) DEFAULT NULL,
  `edate` int(10) DEFAULT NULL,
  `specialty` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `education` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_expect`
--

CREATE TABLE `phpyun_resume_expect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL DEFAULT '',
  `hy` int(5) DEFAULT NULL,
  `job_classid` varchar(100) NOT NULL DEFAULT '',
  `city_classid` varchar(200) DEFAULT NULL,
  `provinceid` int(5) DEFAULT NULL,
  `cityid` int(5) DEFAULT NULL,
  `three_cityid` int(5) DEFAULT NULL,
  `salary` int(3) DEFAULT NULL,
  `jobstatus` int(11) DEFAULT NULL,
  `type` int(3) DEFAULT NULL,
  `report` int(3) DEFAULT NULL,
  `defaults` int(1) NOT NULL DEFAULT '0',
  `open` int(1) DEFAULT '1',
  `is_entrust` int(1) DEFAULT '0',
  `full` int(3) DEFAULT '0',
  `doc` int(1) DEFAULT '0',
  `hits` int(6) DEFAULT '0',
  `lastupdate` int(10) NOT NULL,
  `def_job` int(11) DEFAULT NULL,
  `cloudtype` int(2) DEFAULT NULL,
  `integrity` int(11) DEFAULT NULL,
  `height_status` int(11) DEFAULT '0',
  `statusbody` varchar(200) NOT NULL DEFAULT '',
  `status_time` int(11) DEFAULT NULL,
  `rec` int(11) DEFAULT '0',
  `top` int(11) DEFAULT NULL,
  `topdate` int(11) DEFAULT '0',
  `rec_resume` int(11) DEFAULT NULL,
  `source` int(1) DEFAULT '1',
  `tmpid` int(5) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `dnum` int(11) DEFAULT '0',
  `did` int(11) DEFAULT NULL,
  `uname` varchar(50) NOT NULL DEFAULT '',
  `idcard_status` int(1) DEFAULT '0',
  `status` int(1) DEFAULT '1',
  `r_status` int(4) DEFAULT '0',
  `edu` int(11) DEFAULT '0',
  `exp` int(11) DEFAULT '0',
  `sex` int(11) DEFAULT '0',
  `photo` varchar(100) NOT NULL DEFAULT '',
  `phototype` int(11) DEFAULT '0',
  `birthday` varchar(15) NOT NULL DEFAULT '',
  `annex` varchar(600) NOT NULL DEFAULT '',
  `annexname` varchar(255) NOT NULL DEFAULT '',
  `minsalary` int(11) NOT NULL,
  `maxsalary` int(11) DEFAULT NULL,
  `whour` int(11) DEFAULT '0',
  `avghour` int(11) DEFAULT '0',
  `content` text,
  `label` int(11) DEFAULT NULL,
  `state` int(4) DEFAULT '0',
  `sq_jobid` int(11) NULL,
  `defphoto` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `lastupdate` (`lastupdate`),
  KEY `city` USING BTREE (`provinceid`,`cityid`,`three_cityid`) ,
  KEY `topdate` (`topdate`),
  KEY `status` (`status`),
  KEY `r_status` (`r_status`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_jobclass`
--

CREATE TABLE `phpyun_resume_jobclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eid` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `job1` int(11) DEFAULT NULL,
  `job1_son` int(11) DEFAULT NULL,
  `job_post` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` USING BTREE (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_other`
--

CREATE TABLE `phpyun_resume_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_project`
--

CREATE TABLE `phpyun_resume_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL DEFAULT '',
  `sdate` int(10) DEFAULT NULL,
  `edate` int(10) DEFAULT NULL,
  `sys` varchar(50) NOT NULL DEFAULT '',
  `title` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_refresh_log`
--

CREATE TABLE `phpyun_resume_refresh_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `resume_id` int(11) NOT NULL,
  `r_time` varchar(10) NOT NULL,
  `port` int(1) NULL DEFAULT NULL,
  `ip` varchar(20) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_remark`
--

CREATE TABLE `phpyun_resume_remark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `comid` int(11) NOT NULL,
  `ctime` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `remark` text NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_show`
--

CREATE TABLE `phpyun_resume_show` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '',
  `picurl` varchar(200) NOT NULL DEFAULT '',
  `ctime` varchar(200) NOT NULL DEFAULT '',
  `uid` varchar(200) NOT NULL DEFAULT '',
  `sort` int(4) DEFAULT '0',
  `eid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `statusbody` varchar(255) DEFAULT '',
  `did` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8  AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_skill`
--

CREATE TABLE `phpyun_resume_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL DEFAULT '',
  `skill` int(5) NOT NULL,
  `ing` int(5) NOT NULL,
  `longtime` int(5) NOT NULL,
  `pic` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_tiny`
--

CREATE TABLE `phpyun_resume_tiny` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sex` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `hits` int(11) DEFAULT '0',
  `job` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `qq` varchar(25) NOT NULL,
  `evalute` text NOT NULL,
  `production` text NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(2) NOT NULL,
  `login_ip` varchar(40) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `lastupdate` int(11) DEFAULT NULL,
  `provinceid` int(11) NOT NULL DEFAULT '0',
  `cityid` int(11) NOT NULL DEFAULT '0',
  `three_cityid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_training`
--

CREATE TABLE `phpyun_resume_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL DEFAULT '',
  `sdate` int(10) DEFAULT NULL,
  `edate` int(10) DEFAULT NULL,
  `title` varchar(50) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eid` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_resume_work`
--

CREATE TABLE `phpyun_resume_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `sdate` int(10) DEFAULT NULL,
  `edate` int(10) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `salary` int(11) DEFAULT NULL,
  `tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `eid` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_reward`
--

CREATE TABLE `phpyun_reward` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `nid` int(11) DEFAULT NULL,
  `tnid` int(11) DEFAULT NULL,
  `integral` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT '0',
  `restriction` int(11) DEFAULT '0',
  `stock` int(11) DEFAULT '0',
  `pic` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `content` text,
  `status` int(1) DEFAULT NULL,
  `sdate` int(11) DEFAULT NULL,
  `rec` int(11) DEFAULT '0',
  `hot` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_seo`
--

CREATE TABLE `phpyun_seo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seoname` varchar(100) DEFAULT NULL,
  `seomodel` varchar(100) DEFAULT NULL,
  `ident` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text,
  `time` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `php_url` varchar(100) DEFAULT NULL,
  `rewrite_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_special`
--

CREATE TABLE `phpyun_special` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '',
  `tpl` varchar(100) NOT NULL DEFAULT '',
  `pic` varchar(255) NOT NULL DEFAULT '',
  `background` varchar(255) NOT NULL DEFAULT '',
  `limit` int(10) DEFAULT NULL,
  `num` int(11) DEFAULT '0',
  `rating` varchar(200) NOT NULL DEFAULT '',
  `display` int(10) DEFAULT '1',
  `com_bm` int(10) DEFAULT NULL,
  `integral` int(11) DEFAULT NULL,
  `etime` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `intro` text NOT NULL,
  `ctime` int(11) DEFAULT NULL,
  `wappic` varchar(255) NULL,
  `wapback` varchar(255) NULL,
  PRIMARY KEY (`id`),
  KEY `display` (`display`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_special_com`
--

CREATE TABLE `phpyun_special_com` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `integral` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `time` int(11) DEFAULT NULL,
  `statusbody` varchar(255) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL default '0',
  `famous` int(1) NOT NULL default '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `sid` (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_subscribe`
--

CREATE TABLE `phpyun_subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `job1` int(11) DEFAULT NULL,
  `job1_son` int(11) DEFAULT NULL,
  `job_post` int(11) DEFAULT NULL,
  `provinceid` int(11) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `three_cityid` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `code` varchar(10) DEFAULT NULL,
  `cycle_time` int(11) DEFAULT NULL,
  `time` int(2) DEFAULT '7',
  `minsalary` int(11) NOT NULL,
  `maxsalary` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_subscriberecord`
--

CREATE TABLE `phpyun_subscriberecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sid` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT '1',
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_sysmsg`
--

CREATE TABLE `phpyun_sysmsg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `fa_uid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '管理员',
  `ctime` int(11) NOT NULL,
  `remind_status` int(1) DEFAULT '0',
  `usertype` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fa_uid` (`fa_uid`),
  KEY `fa_uid_2` (`fa_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_talent_pool`
--

CREATE TABLE `phpyun_talent_pool` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `cuid` int(11) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_templates`
--

CREATE TABLE `phpyun_templates` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_temporary_resume`
--

CREATE TABLE `phpyun_temporary_resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `uname` varchar(10) DEFAULT NULL,
  `edu` int(11) DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `exp` int(11) DEFAULT NULL,
  `telphone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `living` varchar(100) DEFAULT NULL,
  `hy` int(11) DEFAULT NULL,
  `job_classid` varchar(100) DEFAULT NULL,
  `city_classid` varchar(200) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `provinceid` int(11) DEFAULT NULL,
  `cityid` int(11) DEFAULT NULL,
  `three_cityid` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `report` int(11) DEFAULT NULL,
  `jobstatus` int(11) DEFAULT NULL,
  `birthday` varchar(20) DEFAULT NULL,
  `minsalary` int(11) DEFAULT NULL,
  `maxsalary` int(11) DEFAULT NULL,
  `rid` int(11) DEFAULT NULL,
  `integrity` int(3) DEFAULT NULL,
  `whour` int(11) DEFAULT '0',
  `avghour` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_toolbox_class`
--

CREATE TABLE `phpyun_toolbox_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `content` text,
  `pic` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_toolbox_doc`
--

CREATE TABLE `phpyun_toolbox_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `is_show` int(1) DEFAULT '0',
  `add_time` int(11) DEFAULT NULL,
  `downnum` int(11) DEFAULT '0',
  `rec` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_tplindex`
--

CREATE TABLE `phpyun_tplindex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `height` int(3) DEFAULT '0',
  `se` int(1) DEFAULT NULL,
  `stime` int(11) DEFAULT NULL,
  `etime` int(11) DEFAULT NULL,
  `pic` varchar(200) NOT NULL DEFAULT '',
  `status` int(1) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- 表的结构 `phpyun_userclass`
--

CREATE TABLE `phpyun_userclass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `variable` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_userid_job`
--

CREATE TABLE `phpyun_userid_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_name` varchar(150) NOT NULL,
  `com_id` int(11) NOT NULL,
  `com_name` varchar(150) NOT NULL,
  `eid` int(10) unsigned NOT NULL,
  `datetime` int(10) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  `is_browse` int(1) NOT NULL DEFAULT '1',
  `body` varchar(255) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `quxiao` int(2) DEFAULT NULL,
  `zid` int(11) NOT NULL DEFAULT '0',
  `endtime` int(11) DEFAULT '0',
  `resume_state` int(1) NOT NULL DEFAULT '1',
  `invited` int(1) NULL,
  `invite_time` int(10) NULL,
  `isdel` int(1) NOT NULL DEFAULT '9',
  `remark` text NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `jobid` (`job_id`),
  KEY `comid` (`com_id`),
  KEY `eid` (`eid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_userid_msg`
--

CREATE TABLE `phpyun_userid_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `fid` int(11) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  `datetime` int(10) NOT NULL,
  `default` int(1) DEFAULT '0',
  `is_browse` int(1) DEFAULT '1',
  `address` varchar(255) DEFAULT NULL,
  `intertime` varchar(255) DEFAULT NULL,
  `linkman` varchar(50) DEFAULT NULL,
  `linktel` varchar(50) DEFAULT NULL,
  `jobid` int(11) DEFAULT NULL,
  `jobname` varchar(50) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `x` varchar(100) NULL,
  `y` varchar(100) NULL,
  `isdel` int(1) NOT NULL DEFAULT '9',
  `remark` text NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

--
-- 表的结构 `phpyun_user_log`
--

CREATE TABLE `phpyun_user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `usertype` int(11) NOT NULL,
  `opera` int(11) NOT NULL,
  `orderid` varchar(18) DEFAULT '',
  `url` varchar(200) DEFAULT '',
  `refer` varchar(200) DEFAULT '',
  `timein` int(11) NOT NULL,
  `timeout` int(11) NOT NULL,
  `second` int(11) NOT NULL,
  `content` text,
  `status` int(11) DEFAULT '0',
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_user_resume`
--

CREATE TABLE `phpyun_user_resume` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` int(10) NOT NULL,
  `eid` int(10) NOT NULL,
  `expect` int(1) DEFAULT '0',
  `skill` int(1) DEFAULT '0',
  `work` int(1) DEFAULT '0',
  `project` int(1) DEFAULT '0',
  `edu` int(1) DEFAULT '0',
  `training` int(1) DEFAULT '0',
  `cert` int(1) DEFAULT '0',
  `other` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_version`
--

CREATE TABLE `phpyun_version` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`version` varchar(50) NOT NULL DEFAULT '',
	`ctime` int(11) NOT NULL,
	`code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_warning`
--

CREATE TABLE `phpyun_warning` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_webscan360`
--

CREATE TABLE `phpyun_webscan360` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `var` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `ext1` varchar(100) DEFAULT NULL,
  `ext2` varchar(100) DEFAULT NULL,
  `state` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_wxnav`
--

CREATE TABLE `phpyun_wxnav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `keyid` int(11) DEFAULT NULL,
  `key` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `appid` varchar(100) DEFAULT NULL,
  `apppage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_wxqrcode`
--

CREATE TABLE `phpyun_wxqrcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wxloginid` varchar(100) NOT NULL,
  `ticket` varchar(100) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `wxid` varchar(100) DEFAULT NULL,
  `unionid` varchar(100) DEFAULT NULL,
  `auid`  int(11) NULL DEFAULT 0,
  `uid`  int(11) NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_wxzdcon`
--

CREATE TABLE `phpyun_wxzdcon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kid` int(11) NOT NULL DEFAULT '0',
  `msgtype` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `media_id` int(11) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_wxzdkeyword`
--

CREATE TABLE `phpyun_wxzdkeyword` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `keyword` text,
  `content` text,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- 表的结构 `phpyun_yqmb`
--

CREATE TABLE `phpyun_yqmb` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) default NULL,
  `name` varchar(100) NOT NULL default '',
  `linkman` varchar(255) NOT NULL default '',
  `linktel` varchar(255) NOT NULL default '',
  `address` varchar(255) NOT NULL,
  `intertime` int(10) NOT NULL,
  `content` text NOT NULL,
  `addtime` int(11) default NULL,
  `did` int(11) default NULL ,
  `status` int(11) DEFAULT '1',
  `statusbody` text,
  PRIMARY KEY  USING BTREE (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;


-- --------------------------------------------------------
--
-- 表的结构 `phpyun_zhaopinhui`
--

CREATE TABLE `phpyun_zhaopinhui` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '0',
  `sid` int(11) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL,
  `starttime` varchar(100) DEFAULT '0',
  `endtime` varchar(100) DEFAULT '0',
  `provinceid` int(11) DEFAULT '0',
  `cityid` int(11) DEFAULT '0',
  `address` varchar(200) DEFAULT NULL,
  `traffic` text,
  `phone` varchar(100) DEFAULT '0',
  `organizers` varchar(200) DEFAULT '0',
  `user` varchar(200) DEFAULT NULL,
  `weburl` varchar(100) DEFAULT '0',
  `body` text,
  `media` text,
  `packages` text,
  `booth` text,
  `participate` text,
  `status` int(11) DEFAULT '0',
  `ctime` int(11) DEFAULT '0',
  `zwpic` varchar(200) DEFAULT NULL,
  `did` int(11) DEFAULT '0',
  `reserved` varchar(225) DEFAULT NULL,
  `is_themb` varchar(200) DEFAULT NULL,
  `banner` varchar(200) DEFAULT NULL,
  `sort` int(11) default '0' ,
  `is_open` int(1) default '1' ,
  `is_themb_wap` varchar(200) NOT NULL DEFAULT '',
  `banner_wap` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_zhaopinhui_com`
--

CREATE TABLE `phpyun_zhaopinhui_com` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT '0',
  `zid` int(11) DEFAULT '0',
  `jobid` varchar(255) DEFAULT NULL,
  `ctime` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `statusbody` varchar(100) DEFAULT NULL,
  `inadd` varchar(100) DEFAULT NULL,
  `did` int(11) DEFAULT '0',
  `sid` int(11) DEFAULT '0',
  `cid` int(11) DEFAULT '0',
  `bid` int(11) DEFAULT '0',
  `price` int(11) DEFAULT '0',
  `com_name` varchar(64) NOT NULL DEFAULT '',
  `sort` int(11) NOT NULL default '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------
--
-- 表的结构 `phpyun_zhaopinhui_job`
--

CREATE TABLE `phpyun_zhaopinhui_job` (
  `id` int(11) NOT NULL auto_increment,
  `uid` int(11) default '0' ,
  `job_name` varchar(64) NOT NULL default '' ,
  `zid` int(11) default '0' ,
  `jobid` varchar(255) NOT NULL default '',
  `ctime` int(11) default '0' ,
  PRIMARY KEY  USING BTREE (`id`),
  KEY `zid` USING BTREE (`zid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


--
-- 表的结构 `phpyun_zhaopinhui_pic`
--

CREATE TABLE `phpyun_zhaopinhui_pic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL DEFAULT '',
  `pic` varchar(200) NOT NULL DEFAULT '',
  `sort` int(11) DEFAULT '0',
  `zid` int(11) DEFAULT '0',
  `is_themb` int(5) DEFAULT '0',
  `did` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `zid` (`zid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `phpyun_zhaopinhui_space`
--

CREATE TABLE `phpyun_zhaopinhui_space` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `keyid` int(11) DEFAULT '0',
  `pic` varchar(100) DEFAULT NULL,
  `content` tinytext,
  `price` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


-- --------------------------------------------------------
--
-- 表的结构 `phpyun_wxpub_temps`
--

CREATE TABLE `phpyun_wxpub_temps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `header` text,
  `body` text,
  `footer` text,
  `type` varchar(255) DEFAULT NULL,
  `temptype` int(11) DEFAULT '0',
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;


-- --------------------------------------------------------
--
-- 表的结构 `phpyun_wxpub_twtask`
--

CREATE TABLE `phpyun_wxpub_twtask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jobid` int(11) DEFAULT '0',
  `cuid` int(11) DEFAULT '0',
  `jobname` varchar(255) DEFAULT NULL,
  `comname` varchar(255) DEFAULT NULL,
  `jobsdate` int(11) DEFAULT '0',
  `auid` int(11) DEFAULT '0',
  `content` varchar(255) DEFAULT NULL,
  `urgent` int(1) NOT NULL DEFAULT '0',
  `wcmoments` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `ctime` int(11) DEFAULT NULL,
  `gzh` int(1) NOT NULL DEFAULT '0',
  `type` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------
--
-- 表的结构 `phpyun_cron_log`
--
CREATE TABLE `phpyun_cron_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cid` varchar(200) NOT NULL DEFAULT '',
  `ctime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;