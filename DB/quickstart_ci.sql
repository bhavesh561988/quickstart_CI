-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2014 at 10:34 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quickstart_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `text` text,
  `seo_page_title` varchar(200) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `meta_keywords` varchar(150) DEFAULT NULL,
  `meta_description` varchar(150) DEFAULT NULL,
  `lang` varchar(3) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `text`, `seo_page_title`, `slug`, `meta_keywords`, `meta_description`, `lang`, `status`) VALUES
(11, 'Terms and Conditions', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>\n            <p>Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>', 'Terms of Use', 'About us', 'Terms of Use', 'Terms of Use', 'en', 1),
(13, 'Privacy Policy ', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>\r\n            <p>Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>', '', 'Privacy Policy ', '', '', 'en', 1),
(14, 'Terms and Condition', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>\r\n            <p>Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>', 'indianic', 'indianic', 'indianic', 'indianic', 'en', 1),
(15, 'contact us', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n            <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>\r\n            <p>Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>', 'contact us', 'contact us', 'contact us', 'contact us', 'en', 1),
(17, 'The New Sheriff of Cyber Town', '<div><p class="MsoNormal">They’re called “smart phones”, but it’s frustrating scrolling\nsearch intensive web browsers and manipulating small screens only to discover\nthe site you’re trying to view is not suited for a mobile device. Not anymore! Move\nover “Dot com’s” there’s a new sheriff in cyber town called W-Address, The\nMobile Web Address, enabling everyone to better connect and become more interactive\nin the dynamic mobile environment!</p>\n\n<p class="MsoNormal"><u>W</u>-Address empowers subscribers\nwith resources to design exclusive Mobile Web Addresses. Simply select a\ncategory, choose a unique name then tailor your site with contact info, a\nphoto, relevant content and various Social Media connections. Publish and display\nyour W-Address and get discovered by a device crazed culture! &nbsp;&nbsp;<o:p></o:p></p>\n\n<p class="MsoNormal">Unlike the structured\nformat of domain names the <b><u>W</u></b> symbol\ncan vary in size and be sensibly placed anywhere next to or around a W-Address which\nthen seamlessly connects to the selected page when typed into the onsite data\nfield. <o:p></o:p></p>\n\n<p class="MsoNormal">Personal<b> </b>ID’s are FREE and can be used on\ncalling cards, resumes, personal stationary, social sites and in videos. <o:p></o:p></p>\n\n<p class="MsoNormal">Social<b><i> </i></b>Commerce\nlabels are FREE for 60 days and are productively resourceful when posted on public\nsigns used on items or properties For Sale, Rent or Lease and to provide\ninformation and directions to social gatherings, Garage and Estate sales.<o:p></o:p></p>\n\n<p class="MsoNormal">Commercial<b> </b>names are $39.00/year and will cost\neffectively and informatively introduce consumers to your product, service or\nprofession as well as stimulate Social Media activity. Display W-Addresses in storefronts\nand signs, in print and all varieties of visual media. Innovatively purchase\nseveral brand related names to showcase on billboards, banners, buses, bus\nstops, and blimps to effectively geo-target numerous markets simultaneously. Take\nadvantage of “WOW Deals” the inclusive marketing tool designed to boost business\nby creating and publishing Social buying deals on your site.<o:p></o:p></p>\n\n<p class="MsoNormal"><o:p>&nbsp;</o:p></p>\n\n<p class="MsoNormal" align="center">Sign up for W-Address\nand Design, Display and be Discovered today!</p>\n\n<p class="MsoNormal" align="center"><o:p>&nbsp;</o:p></p></div><div><b><br></b></div><div><br></div>', '', 'Video', '', '', 'en', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `waddress_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `subscription_id` varchar(200) NOT NULL,
  `paypal_email` varchar(500) NOT NULL,
  `transaction_token` varchar(255) NOT NULL,
  `price` float(10,4) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ipn_count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`plan_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `waddress_id`, `plan_id`, `subscription_id`, `paypal_email`, `transaction_token`, `price`, `payment_status`, `created`, `modified`, `ipn_count`) VALUES
(15, 133, 130, 3, '', 'yolopersonal@gmail.com', '81X18301KD378512K', 39.0000, 'Completed', '2014-02-04 00:00:00', '2014-02-04 11:21:45', 1),
(36, 174, 143, 3, '', 'yolopersonal@gmail.com', '0TA70455UB4472240', 39.0000, 'Completed', '2014-02-05 00:00:00', '2014-02-05 08:51:45', 1),
(43, 185, 149, 3, '', 'yolopersonal@gmail.com', '7RA59414UF999520W', 39.0000, 'Completed', '2014-02-11 00:00:00', '2014-02-06 10:30:43', 8),
(44, 190, 161, 3, '', 'yolopersonal@gmail.com', '8AP33376D64475135', 39.0000, 'Completed', '2014-02-06 00:00:00', '2014-02-06 10:51:52', 1),
(48, 194, 168, 3, '', 'yolopersonal@gmail.com', '2WM89185F3922525W', 39.0000, 'Completed', '2014-02-07 00:00:00', '2014-02-07 04:54:00', 1),
(52, 195, 170, 2, '', 'yolopersonal@gmail.com', '3FN84716MN8946014', 9.9500, 'Completed', '2014-02-10 00:00:00', '2014-02-10 06:37:49', 2),
(53, 196, 171, 2, '', 'yolopersonal@gmail.com', '14N426019R5620204', 19.9000, 'Completed', '2014-02-10 00:00:00', '2014-02-10 11:42:55', 3),
(54, 197, 172, 3, '', 'yolopersonal@gmail.com', '2R388099H54574308', 39.0000, 'Completed', '2014-02-11 00:00:00', '2014-02-11 05:47:07', 1),
(55, 198, 174, 2, '', 'yolopersonal@gmail.com', '0SA85428WP685121K', 9.9500, 'Completed', '2014-02-11 00:00:00', '2014-02-11 06:20:29', 1),
(56, 201, 181, 2, '', 'yolopersonal@gmail.com', '1GL35145TU478364P', 39.8000, 'Completed', '2014-02-12 00:00:00', '2014-02-12 06:23:58', 1),
(57, 202, 182, 3, '', 'yolopersonal@gmail.com', '833475379U022142Y', 39.0000, 'Completed', '2014-02-12 00:00:00', '2014-02-12 06:47:22', 1),
(58, 202, 183, 3, '', 'yolopersonal@gmail.com', '7PV25890UC232564A', 39.0000, 'Completed', '2014-02-12 00:00:00', '2014-02-12 06:51:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `label`) VALUES
(35, 'email_from', 'bhavesh.khanpara@indianic.com', 'Set Default email for send mail'),
(42, 'paypal_business_email', 'demo@indianic.com', 'paypal_business_email');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `email_publish` tinyint(4) NOT NULL DEFAULT '1',
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL COMMENT 'play role as a username',
  `profile_pic` varchar(255) NOT NULL DEFAULT 'default/default-avatar.png',
  `w_address` varchar(255) NOT NULL,
  `intro_text` text NOT NULL,
  `area_code` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `phone_publish` int(11) NOT NULL DEFAULT '1',
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `address` text NOT NULL,
  `status` enum('1','0') NOT NULL COMMENT 'mail conformation status',
  `subcription_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `payment_type` enum('a','m') NOT NULL DEFAULT 'm',
  `limit` int(11) NOT NULL,
  `created` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `last_name` (`last_name`),
  KEY `plan_id` (`plan_id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=203 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `plan_id`, `role_id`, `email`, `email_publish`, `password`, `first_name`, `last_name`, `profile_pic`, `w_address`, `intro_text`, `area_code`, `phone`, `phone_publish`, `city`, `state`, `zipcode`, `address`, `status`, `subcription_date`, `expiry_date`, `payment_type`, `limit`, `created`, `modified`) VALUES
(1, '0', 1, 'admin@indianic.com', 1, '1b363eeba055453e11102a3b3c83e904cd38ba42', 'admin', 'admin', 'default/default-avatar.png', '', '', 0, '', 1, '', '', 0, '', '1', '0000-00-00', '0000-00-00', 'a', 0, '0000-00-00', '2013-12-19 05:50:24'),
(117, 'personal', 2, 'bhavesh.khanpara@indianic.com', 1, 'a47857a46928d62424edaaffabcdf62adce754ab', '', 'Personal', '1387876601.png', '', ' I am a php developer with 5+ years commercial experience in PHP/MySQL – (LAMP). I have very good commercial experience in analysis, design, development, testing and implementation of web applications. Selfmade and good communicator which help me to work with clients at all levels of the business. I am very strict in meeting deadlines which is a critical aspect for any business. All my current work is developed using the latest version of PHP and MySQL and my code is upto the current standards, secure and safe from SQL injections or similar hacking attempts.', 0, '(079) 1234567', 1, '', '', 0, 'PHP Web Developer With 5+ Experiences', '1', '2013-12-24', '2014-12-24', 'm', 0, '2013-12-24', '2013-12-24 09:15:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
