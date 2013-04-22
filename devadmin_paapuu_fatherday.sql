-- phpMyAdmin SQL Dump
-- version 2.11.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 19, 2013 at 12:09 PM
-- Server version: 5.1.67
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `devadmin_paapuu_fatherday`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE IF NOT EXISTS `tb_department` (
  `department_id` tinyint(6) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(100) NOT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`department_id`, `department_name`) VALUES
(1, 'MIS Support'),
(4, 'Finance & Admin'),
(5, 'Creative Technology'),
(6, 'Software & System'),
(7, 'Business Development'),
(12, 'SMS'),
(13, 'CEO Office'),
(14, 'IT Support Department'),
(15, 'Technology & Innovation'),
(18, 'testasd s'),
(19, 'asdfa'),
(20, 'ertert'),
(21, 'qwe'),
(22, 'wer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invalid`
--

CREATE TABLE IF NOT EXISTS `tb_invalid` (
  `invalid_id` int(5) NOT NULL AUTO_INCREMENT,
  `message` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`invalid_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_invalid`
--

INSERT INTO `tb_invalid` (`invalid_id`, `message`, `date_time`) VALUES
(1, 'STAR 333108', '2012-06-06 09:58:31'),
(2, 'STAR 345676', '2012-06-06 12:20:13'),
(3, 'STAR 345676', '2012-06-06 12:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `tb_iod_user`
--

CREATE TABLE IF NOT EXISTS `tb_iod_user` (
  `from` bigint(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `text` varchar(160) NOT NULL,
  `telco` char(2) NOT NULL,
  `msgId` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_iod_user`
--

INSERT INTO `tb_iod_user` (`from`, `datetime`, `text`, `telco`, `msgId`) VALUES
(60163399985, '2012-06-06 12:46:51', 'STAR 345676', 'DG', '885130'),
(60163399985, '2012-06-06 16:07:44', 'STAR 891412', 'DG', '885151'),
(60163399985, '2012-06-06 16:17:09', 'STAR 891412', 'DG', '885153');

-- --------------------------------------------------------

--
-- Table structure for table `tb_leave_application`
--

CREATE TABLE IF NOT EXISTS `tb_leave_application` (
  `leave_application_id` int(6) NOT NULL AUTO_INCREMENT,
  `staff_id` int(5) NOT NULL,
  `leave_type_id` tinyint(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `no_of_day` decimal(3,1) NOT NULL,
  `period` enum('a','p','f') NOT NULL COMMENT 'a=am,p=pm,f=full',
  `reason` varchar(100) NOT NULL,
  `leave_status` enum('a','w','c','r','p') NOT NULL COMMENT 'a=approved,w=withdraw,c=canceled,r=rejected,p=pending',
  `reject_reason` varchar(100) NOT NULL,
  `date_apply` date NOT NULL,
  `approval_id` int(5) NOT NULL,
  PRIMARY KEY (`leave_application_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_leave_application`
--

INSERT INTO `tb_leave_application` (`leave_application_id`, `staff_id`, `leave_type_id`, `start_date`, `end_date`, `no_of_day`, `period`, `reason`, `leave_status`, `reject_reason`, `date_apply`, `approval_id`) VALUES
(1, 2, 4, '2013-02-20', '2013-02-22', 3.0, 'a', 'test', 'w', '', '2013-01-25', 1),
(2, 2, 5, '2013-01-25', '2013-01-26', 2.5, 'a', 'test', 'r', 'asdfadf', '2013-01-25', 1),
(3, 3, 6, '2013-01-25', '2013-01-26', 1.0, 'a', 'test', 'a', '', '2013-01-25', 1),
(4, 3, 3, '2013-03-01', '2013-03-01', 3.0, 'a', 'yes', 'a', '', '2013-01-25', 1),
(5, 2, 5, '2013-03-22', '2013-03-23', 1.0, 'a', 'asdfasdfasdf', 'w', '', '2013-03-29', 4),
(6, 2, 5, '2013-04-04', '2013-04-05', 2.0, 'a', 'fucasdfsad', 'w', '', '2013-04-04', 0),
(7, 2, 5, '2013-04-04', '2013-04-06', 3.0, 'a', 'test', 'w', '', '2013-04-04', 0),
(8, 2, 5, '2013-04-04', '2013-04-08', 5.0, 'a', 'test', 'w', '', '2013-04-04', 0),
(9, 2, 5, '2013-04-04', '2013-04-06', 3.0, 'a', 'test', 'w', '', '2013-04-04', 0),
(10, 2, 3, '2013-04-05', '2013-04-13', 9.0, 'a', 'travel', 'w', '', '2013-04-04', 0),
(11, 2, 5, '2013-04-04', '2013-04-06', 3.0, 'a', 'test', 'r', 'tset', '2013-04-04', 4),
(12, 2, 1, '2013-04-05', '2013-04-13', 9.0, 'a', 'asdf', 'r', 'lubang', '2013-04-04', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_leave_data`
--

CREATE TABLE IF NOT EXISTS `tb_leave_data` (
  `leave_data_id` int(5) NOT NULL AUTO_INCREMENT,
  `staff_id` int(5) NOT NULL,
  `annual_leave` decimal(5,1) DEFAULT NULL,
  `sick_leave` decimal(5,1) DEFAULT NULL,
  `annual_leave_balance` decimal(5,1) DEFAULT NULL,
  `sick_leave_balance` decimal(5,1) DEFAULT NULL,
  `year` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`leave_data_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_leave_data`
--

INSERT INTO `tb_leave_data` (`leave_data_id`, `staff_id`, `annual_leave`, `sick_leave`, `annual_leave_balance`, `sick_leave_balance`, `year`) VALUES
(1, 2, 20.0, 20.0, 20.0, 26.0, '2013'),
(2, 3, 14.0, 14.0, 3.5, 14.0, '2013'),
(3, 4, 12.0, 12.0, 12.0, 12.0, '2013'),
(4, 5, 23.0, 23.0, 23.0, 23.0, '2013'),
(5, 6, 11.0, 11.0, 11.0, 11.0, '2013');

-- --------------------------------------------------------

--
-- Table structure for table `tb_leave_notification`
--

CREATE TABLE IF NOT EXISTS `tb_leave_notification` (
  `notification_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `notification_title` varchar(50) NOT NULL,
  `notification_description` text NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_leave_notification`
--

INSERT INTO `tb_leave_notification` (`notification_id`, `notification_title`, `notification_description`, `date_created`) VALUES
(5, 'sdas asd asd asd as', '<p>\n	<i><b><a href="http://en.wikipedia.org/wiki/David_Suzuki:_The_Autobiography" title="David Suzuki: The Autobiography">David Suzuki: The Autobiography</a></b></i> is the 2006 <a href="http://en.wikipedia.org/wiki/Autobiography" title="Autobiography">autobiography</a> of Canadian science writer and broadcaster <a href="http://en.wikipedia.org/wiki/David_Suzuki" title="David Suzuki">David Suzuki</a> <i>(pictured)</i>. The book focuses mostly on his life since the 1987 publication of his first autobiography, <i>Metamorphosis: Stages in a Life</i>. It begins with a chronological account of his childhood, academic years, and broadcasting career. In later chapters, Suzuki adopts a <a href="http://en.wikipedia.org/wiki/Memoir" title="Memoir">memoir</a> style, writing about themes such as his relationship with Australia, his experiences in <a href="http://en.wikipedia.org/wiki/Brazil" title="Brazil">Brazil</a> and <a href="http://en.wikipedia.org/wiki/Papua_New_Guinea" title="Papua New Guinea">Papua New Guinea</a>, the founding of the <a href="http://en.wikipedia.org/wiki/David_Suzuki_Foundation" title="David Suzuki Foundation">David Suzuki Foundation</a>, and his thoughts on climate change, celebrity status, technology, and death. Throughout, Suzuki highlights the continuing impact of events from his childhood. Critics have called the book candid, sincere, and charming, with insightful commentary if occasionally flat stories. Suzuki&#39;s scientific background is reflected in the writing&#39;s rational and analytic style. Suzuki&#39;s autobiography spent four weeks atop the <i><a href="http://en.wikipedia.org/wiki/Maclean%27s" title="Maclean''s">Maclean&#39;s</a></i> list of non-fiction best-sellers and six weeks at number&nbsp;6 on the <i><a href="http://en.wikipedia.org/wiki/The_Globe_and_Mail" title="The Globe and Mail">Globe and Mail&#39;s</a></i> list. The book won two awards in 2007: the Canadian Booksellers&#39; Association&#39;s Libris Award for Non-Fiction Book of the Year and the British Columbia Booksellers&#39; Choice Award.</p>\n<p>\n	&nbsp;</p>\n<p>\n	<i><b><a href="http://en.wikipedia.org/wiki/David_Suzuki:_The_Autobiography" title="David Suzuki: The Autobiography">David Suzuki: The Autobiography</a></b></i>&nbsp;is the 2006&nbsp;<a href="http://en.wikipedia.org/wiki/Autobiography" title="Autobiography">autobiography</a>&nbsp;of Canadian science writer and broadcaster&nbsp;<a href="http://en.wikipedia.org/wiki/David_Suzuki" title="David Suzuki">David Suzuki</a>&nbsp;<i>(pictured)</i>. The book focuses mostly on his life since the 1987 publication of his first autobiography,&nbsp;<i>Metamorphosis: Stages in a Life</i>. It begins with a chronological account of his childhood, academic years, and broadcasting career. In later chapters, Suzuki adopts a&nbsp;<a href="http://en.wikipedia.org/wiki/Memoir" title="Memoir">memoir</a>&nbsp;style, writing about themes such as his relationship with Australia, his experiences in&nbsp;<a href="http://en.wikipedia.org/wiki/Brazil" title="Brazil">Brazil</a>&nbsp;and&nbsp;<a href="http://en.wikipedia.org/wiki/Papua_New_Guinea" title="Papua New Guinea">Papua New Guinea</a>, the founding of the&nbsp;<a href="http://en.wikipedia.org/wiki/David_Suzuki_Foundation" title="David Suzuki Foundation">David Suzuki Foundation</a>, and his thoughts on climate change, celebrity status, technology, and death. Throughout, Suzuki highlights the continuing impact of events from his childhood. Critics have called the book candid, sincere, and charming, with insightful commentary if occasionally flat stories. Suzuki&#39;s scientific background is reflected in the writing&#39;s rational and analytic style. Suzuki&#39;s autobiography spent four weeks atop the&nbsp;<i><a href="http://en.wikipedia.org/wiki/Maclean%27s" title="Maclean''s">Maclean&#39;s</a></i>&nbsp;list of non-fiction best-sellers and six weeks at number&nbsp;6 on the&nbsp;<i><a href="http://en.wikipedia.org/wiki/The_Globe_and_Mail" title="The Globe and Mail">Globe and Mail&#39;s</a></i>&nbsp;list. The book won two awards in 2007: the Canadian Booksellers&#39; Association&#39;s Libris Award for Non-Fiction Book of the Year and the British Columbia Booksellers&#39; Choice Award.</p>', '2012-11-15 03:32:15'),
(8, 'test', '<p>\n	&nbsp;</p>\n<p style="margin: 0px 0px 10px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">\n	<i><b><a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki:_The_Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki: The Autobiography">David Suzuki: The Autobiography</a></b></i>&nbsp;is the 2006&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Autobiography">autobiography</a>&nbsp;of Canadian science writer and broadcaster&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki">David Suzuki</a>&nbsp;<i>(pictured)</i>. The book focuses mostly on his life since the 1987 publication of his first autobiography,&nbsp;<i>Metamorphosis: Stages in a Life</i>. It begins with a chronological account of his childhood, academic years, and broadcasting career. In later chapters, Suzuki adopts a&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Memoir" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Memoir">memoir</a>&nbsp;style, writing about themes such as his relationship with Australia, his experiences in&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Brazil" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Brazil">Brazil</a>&nbsp;and<a class="external_link" href="http://en.wikipedia.org/wiki/Papua_New_Guinea" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Papua New Guinea">Papua New Guinea</a>, the founding of the&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki_Foundation" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki Foundation">David Suzuki Foundation</a>, and his thoughts on climate change, celebrity status, technology, and death. Throughout, Suzuki highlights the continuing impact of events from his childhood. Critics have called the book candid, sincere, and charming, with insightful commentary if occasionally flat stories. Suzuki&#39;s scientific background is reflected in the writing&#39;s rational and analytic style. Suzuki&#39;s autobiography spent four weeks atop the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/Maclean%27s" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Maclean''s">Maclean&#39;s</a></i>&nbsp;list of non-fiction best-sellers and six weeks at number&nbsp;6 on the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/The_Globe_and_Mail" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="The Globe and Mail">Globe and Mail&#39;s</a></i>&nbsp;list. The book won two awards in 2007: the Canadian Booksellers&#39; Association&#39;s Libris Award for Non-Fiction Book of the Year and the British Columbia Booksellers&#39; Choice Award.</p>\n<p style="margin: 0px 0px 10px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">\n	&nbsp;</p>\n<p style="margin: 0px 0px 10px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">\n	<i><b><a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki:_The_Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki: The Autobiography">David Suzuki: The Autobiography</a></b></i>&nbsp;is the 2006&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Autobiography">autobiography</a>&nbsp;of Canadian science writer and broadcaster&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki">David Suzuki</a>&nbsp;<i>(pictured)</i>. The book focuses mostly on his life since the 1987 publication of his first autobiography,&nbsp;<i>Metamorphosis: Stages in a Life</i>. It begins with a chronological account of his childhood, academic years, and broadcasting career. In later chapters, Suzuki adopts a&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Memoir" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Memoir">memoir</a>&nbsp;style, writing about themes such as his relationship with Australia, his experiences in&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Brazil" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Brazil">Brazil</a>&nbsp;and&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Papua_New_Guinea" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Papua New Guinea">Papua New Guinea</a>, the founding of the&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki_Foundation" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki Foundation">David Suzuki Foundation</a>, and his thoughts on climate change, celebrity status, technology, and death. Throughout, Suzuki highlights the continuing impact of events from his childhood. Critics have called the book candid, sincere, and charming, with insightful commentary if occasionally flat stories. Suzuki&#39;s scientific background is reflected in the writing&#39;s rational and analytic style. Suzuki&#39;s autobiography spent four weeks atop the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/Maclean%27s" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Maclean''s">Maclean&#39;s</a></i>&nbsp;list of non-fiction best-sellers and six weeks at number&nbsp;6 on the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/The_Globe_and_Mail" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="The Globe and Mail">Globe and Mail&#39;s</a></i>&nbsp;list. The book won two awards in 2007: the Canadian Booksellers&#39; Association&#39;s Libris Award for Non-Fiction Book of the Year and the British Columbia Booksellers&#39; Choice Award.</p>\n<p style="margin: 0px 0px 10px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">\n	&nbsp;</p>\n<p style="margin: 0px 0px 10px;">\n	<i><b><a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki:_The_Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki: The Autobiography">David Suzuki: The Autobiography</a></b></i>&nbsp;is the 2006&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Autobiography">autobiography</a>&nbsp;of Canadian science writer and broadcaster&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki">David Suzuki</a>&nbsp;<i>(pictured)</i>. The book focuses mostly on his life since the 1987 publication of his first autobiography,&nbsp;<i>Metamorphosis: Stages in a Life</i>. It begins with a chronological account of his childhood, academic years, and broadcasting career. In later chapters, Suzuki adopts a&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Memoir" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Memoir">memoir</a>&nbsp;style, writing about themes such as his relationship with Australia, his experiences in&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Brazil" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Brazil">Brazil</a>&nbsp;and<a class="external_link" href="http://en.wikipedia.org/wiki/Papua_New_Guinea" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Papua New Guinea">Papua New Guinea</a>, the founding of the&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki_Foundation" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki Foundation">David Suzuki Foundation</a>, and his thoughts on climate change, celebrity status, technology, and death. Throughout, Suzuki highlights the continuing impact of events from his childhood. Critics have called the book candid, sincere, and charming, with insightful commentary if occasionally flat stories. Suzuki&#39;s scientific background is reflected in the writing&#39;s rational and analytic style. Suzuki&#39;s autobiography spent four weeks atop the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/Maclean%27s" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Maclean''s">Maclean&#39;s</a></i>&nbsp;list of non-fiction best-sellers and six weeks at number&nbsp;6 on the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/The_Globe_and_Mail" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="The Globe and Mail">Globe and Mail&#39;s</a></i>&nbsp;list. The book won two awards in 2007: the Canadian Booksellers&#39; Association&#39;s Libris Award for Non-Fiction Book of the Year and the British Columbia Booksellers&#39; Choice Award.</p>\n<p style="margin: 0px 0px 10px;">\n	&nbsp;</p>\n<p style="margin: 0px 0px 10px;">\n	<i><b><a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki:_The_Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki: The Autobiography">David Suzuki: The Autobiography</a></b></i>&nbsp;is the 2006&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Autobiography">autobiography</a>&nbsp;of Canadian science writer and broadcaster&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki">David Suzuki</a>&nbsp;<i>(pictured)</i>. The book focuses mostly on his life since the 1987 publication of his first autobiography,&nbsp;<i>Metamorphosis: Stages in a Life</i>. It begins with a chronological account of his childhood, academic years, and broadcasting career. In later chapters, Suzuki adopts a&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Memoir" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Memoir">memoir</a>&nbsp;style, writing about themes such as his relationship with Australia, his experiences in&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Brazil" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Brazil">Brazil</a>&nbsp;and&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Papua_New_Guinea" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Papua New Guinea">Papua New Guinea</a>, the founding of the&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki_Foundation" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki Foundation">David Suzuki Foundation</a>, and his thoughts on climate change, celebrity status, technology, and death. Throughout, Suzuki highlights the continuing impact of events from his childhood. Critics have called the book candid, sincere, and charming, with insightful commentary if occasionally flat stories. Suzuki&#39;s scientific background is reflected in the writing&#39;s rational and analytic style. Suzuki&#39;s autobiography spent four weeks atop the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/Maclean%27s" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Maclean''s">Maclean&#39;s</a></i>&nbsp;list of non-fiction best-sellers and six weeks at number&nbsp;6 on the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/The_Globe_and_Mail" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="The Globe and Mail">Globe and Mail&#39;s</a></i>&nbsp;list. The book won two awards in 2007: the Canadian Booksellers&#39; Association&#39;s Libris Award for Non-Fiction Book of the Year and the British Columbia Booksellers&#39; Choice Award.</p>', '2013-01-31 04:25:26'),
(9, 'asdxcv', '<p>\n	&nbsp;</p>\n<p style="margin: 0px 0px 10px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">\n	<i><b><a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki:_The_Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki: The Autobiography">David Suzuki: The Autobiography</a></b></i>&nbsp;is the 2006&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Autobiography">autobiography</a>&nbsp;of Canadian science writer and broadcaster&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki">David Suzuki</a>&nbsp;<i>(pictured)</i>. The book focuses mostly on his life since the 1987 publication of his first autobiography,&nbsp;<i>Metamorphosis: Stages in a Life</i>. It begins with a chronological account of his childhood, academic years, and broadcasting career. In later chapters, Suzuki adopts a&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Memoir" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Memoir">memoir</a>&nbsp;style, writing about themes such as his relationship with Australia, his experiences in&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Brazil" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Brazil">Brazil</a>&nbsp;and<a class="external_link" href="http://en.wikipedia.org/wiki/Papua_New_Guinea" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Papua New Guinea">Papua New Guinea</a>, the founding of the&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki_Foundation" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki Foundation">David Suzuki Foundation</a>, and his thoughts on climate change, celebrity status, technology, and death. Throughout, Suzuki highlights the continuing impact of events from his childhood. Critics have called the book candid, sincere, and charming, with insightful commentary if occasionally flat stories. Suzuki&#39;s scientific background is reflected in the writing&#39;s rational and analytic style. Suzuki&#39;s autobiography spent four weeks atop the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/Maclean%27s" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Maclean''s">Maclean&#39;s</a></i>&nbsp;list of non-fiction best-sellers and six weeks at number&nbsp;6 on the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/The_Globe_and_Mail" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="The Globe and Mail">Globe and Mail&#39;s</a></i>&nbsp;list. The book won two awards in 2007: the Canadian Booksellers&#39; Association&#39;s Libris Award for Non-Fiction Book of the Year and the British Columbia Booksellers&#39; Choice Award.</p>\n<p style="margin: 0px 0px 10px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">\n	&nbsp;</p>\n<p style="margin: 0px 0px 10px; font-family: ''Helvetica Neue'', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 20px;">\n	<i><b><a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki:_The_Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki: The Autobiography">David Suzuki: The Autobiography</a></b></i>&nbsp;is the 2006&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Autobiography" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Autobiography">autobiography</a>&nbsp;of Canadian science writer and broadcaster&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki">David Suzuki</a>&nbsp;<i>(pictured)</i>. The book focuses mostly on his life since the 1987 publication of his first autobiography,&nbsp;<i>Metamorphosis: Stages in a Life</i>. It begins with a chronological account of his childhood, academic years, and broadcasting career. In later chapters, Suzuki adopts a&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Memoir" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Memoir">memoir</a>&nbsp;style, writing about themes such as his relationship with Australia, his experiences in&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Brazil" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Brazil">Brazil</a>&nbsp;and&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/Papua_New_Guinea" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Papua New Guinea">Papua New Guinea</a>, the founding of the&nbsp;<a class="external_link" href="http://en.wikipedia.org/wiki/David_Suzuki_Foundation" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="David Suzuki Foundation">David Suzuki Foundation</a>, and his thoughts on climate change, celebrity status, technology, and death. Throughout, Suzuki highlights the continuing impact of events from his childhood. Critics have called the book candid, sincere, and charming, with insightful commentary if occasionally flat stories. Suzuki&#39;s scientific background is reflected in the writing&#39;s rational and analytic style. Suzuki&#39;s autobiography spent four weeks atop the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/Maclean%27s" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="Maclean''s">Maclean&#39;s</a></i>&nbsp;list of non-fiction best-sellers and six weeks at number&nbsp;6 on the&nbsp;<i><a class="external_link" href="http://en.wikipedia.org/wiki/The_Globe_and_Mail" style="color: rgb(0, 136, 204); text-decoration: initial; outline: none !important;" target="_self" title="The Globe and Mail">Globe and Mail&#39;s</a></i>&nbsp;list. The book won two awards in 2007: the Canadian Booksellers&#39; Association&#39;s Libris Award for Non-Fiction Book of the Year and the British Columbia Booksellers&#39; Choice Award.</p>', '2013-01-31 04:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_leave_type`
--

CREATE TABLE IF NOT EXISTS `tb_leave_type` (
  `leave_type_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `leave_type` varchar(40) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`leave_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_leave_type`
--

INSERT INTO `tb_leave_type` (`leave_type_id`, `leave_type`, `status`) VALUES
(1, 'Annual Leave', 'Y'),
(2, 'Compassionate', 'Y'),
(3, 'Marriage', 'Y'),
(4, 'Maternity', 'Y'),
(5, 'Medical', 'Y'),
(6, 'Paternity', 'Y'),
(7, 'Unpaid', 'Y'),
(8, 'test', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE IF NOT EXISTS `tb_news` (
  `news_id` int(4) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(200) NOT NULL,
  `news_content` text NOT NULL,
  `news_date` date NOT NULL,
  `news_last_update` datetime NOT NULL,
  `news_slug` varchar(300) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_news`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_position`
--

CREATE TABLE IF NOT EXISTS `tb_position` (
  `position_id` tinyint(6) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(50) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tb_position`
--

INSERT INTO `tb_position` (`position_id`, `position_name`) VALUES
(1, 'MIS Officer'),
(2, 'Technology & Innovation Manager'),
(3, 'System Developer'),
(4, 'Creative Designer'),
(5, 'Product Consultant (Business)'),
(6, 'Senior Finance Executive'),
(7, 'Finance & Admin Manager'),
(8, 'CEO'),
(9, 'Software Engineer'),
(10, 'Programmer'),
(11, 'Administration Executive'),
(12, 'Personal Assistant'),
(13, 'Human Resource Executive'),
(14, 'Helpdesk Executive'),
(15, 'Business Manager'),
(16, 'System Administrator'),
(17, 'Product Support Engineer'),
(18, 'Sales Executive'),
(19, 'Driver'),
(20, 'Senior Business Executive'),
(21, 'Business Development Executive'),
(22, 'Junior Business Executive'),
(23, 'Senior System Administrator'),
(24, 'Senior Software Engineer'),
(25, 'Assistant to CEO'),
(26, 'Junior Secretary'),
(27, 'Marketing Executive'),
(28, 'Accounts Cum Admin Assistant'),
(29, 'Office Administrator'),
(30, 'test'),
(31, 'test123'),
(32, 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_public_holiday`
--

CREATE TABLE IF NOT EXISTS `tb_public_holiday` (
  `holiday` varchar(20) NOT NULL,
  `date` date NOT NULL,
  UNIQUE KEY `date` (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_public_holiday`
--

INSERT INTO `tb_public_holiday` (`holiday`, `date`) VALUES
('national day', '2013-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE IF NOT EXISTS `tb_role` (
  `role_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `role_position` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role_position`) VALUES
(1, 'HR Admin'),
(2, 'Superior'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staff`
--

CREATE TABLE IF NOT EXISTS `tb_staff` (
  `staff_id` int(8) NOT NULL AUTO_INCREMENT,
  `role_id` tinyint(1) NOT NULL DEFAULT '0',
  `position_id` tinyint(5) NOT NULL,
  `department_id` tinyint(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(70) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `date_created` datetime NOT NULL,
  `superior_id` tinyint(5) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_staff`
--

INSERT INTO `tb_staff` (`staff_id`, `role_id`, `position_id`, `department_id`, `username`, `password`, `salt`, `email_address`, `gender`, `mobile_phone`, `date_created`, `superior_id`) VALUES
(1, 1, 3, 4, 'admin', 'tiytEQ2dgRpwfHaE2hsN8arMg0MP8kOGY0NN/gou5sY=', '$2a$08$A9Dxo2GjDZn1p4TuypzAx.fgy1XBEKtBrtaa9t5Xy8OoWbeamEOyC', 'oscar.hue@alphacrossing.com', 'F', '5436234234', '2012-12-03 05:54:56', 0),
(2, 3, 2, 13, 'oscarhue', 'EUz1SFuFLePMv5xRQCDKCN1lfUs0vs5XEANBrfF4zfA=', '$2a$08$okWxXxEE4X3usNP4Cluzouzr1yglhvOPbg86oWih21DPsioyWsYge', 'tiekwai.hue@alphacrossing.com', 'M', '60163855853', '2013-03-22 01:35:53', 4),
(3, 3, 9, 13, 'test', 'MjStmyPSvMdSV6dfHhhwkjA7vYEbFYQIoRAmSOulHfs=', '$2a$08$gbbnYHGiF9OCZ3ftB3hkrOiVwq1AgzmPEocyLz2GrzlFgT807yruq', 't-wai1990@hotmail.com', 'M', '2345345345', '2013-03-28 11:59:11', 5),
(4, 2, 3, 13, 'oscarhue1', 'PknoK0CeaSfz76MKOja7HAFWZGARerMbYrlVUpOAeCM=', '$2a$08$uEeMTkgm15SXKIJ2tcL99Oynn3QG2Tyz8rozvlpLvX1YEwDVrPHdq', 'test@test.com', 'M', '6016838554526', '2013-03-27 04:25:20', 1),
(5, 2, 3, 13, 'testtest', 'ZJUS9Scyl2k36pvuuFe48yAlWycQp7SBc7JSJS1Uh6s=', '$2a$08$/W6jZOOa1yGo57YKdYZiaurBeL9SZo9BNn7ldXyolpvBqQW/gCOAa', 'test@test.com', 'M', '234234234', '2013-03-28 11:58:57', 4),
(6, 2, 2, 12, 'oscarhue2', 's3i5aY5AwEg4sNRKAceYbWZs+TpnveYnev8hr0Sw7ac=', '$2a$08$Qyodqu3kTdj/OtVDPeH3N.5FC4wwWQ455DRTdf6lmm4/KdG8UTt6m', 'admin@admin.com', 'F', '601638554523', '2013-03-28 01:54:52', 5);
