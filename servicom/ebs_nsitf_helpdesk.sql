-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 19, 2023 at 03:06 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebs_NIWA_helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(90) NOT NULL,
  `announcement` text NOT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `helpful` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `not_helpful` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `visibility` tinyint(3) UNSIGNED NOT NULL,
  `logged_in_only` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `articles_categories`
--

CREATE TABLE `articles_categories` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `views` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `articles_votes`
--

CREATE TABLE `articles_votes` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `article_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `type` varchar(30) NOT NULL,
  `count` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `is_locked` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `attempted_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `backup_log`
--

CREATE TABLE `backup_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `backup_file` varchar(50) NOT NULL,
  `backup_option` tinyint(3) UNSIGNED NOT NULL,
  `backup_action` tinyint(3) UNSIGNED NOT NULL,
  `taken_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `canned_replies`
--

CREATE TABLE `canned_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `canned_replies`
--

INSERT INTO `canned_replies` (`id`, `subject`, `message`, `updated_at`, `created_at`) VALUES
(1, 'Working on Issue', 'Hi {REQUESTER_NAME},\r\n\r\nThanks for reaching out to us. We\'ve started working on your issue and will get back to you soon.\r\n\r\nIf you have some more questions, please let us know. We\'ll be happy to help you.\r\n\r\nThanks,\r\n{AGENT_NAME}\r\n{SITE_NAME} Support', NULL, 1627110924),
(2, 'Work in Progress', 'Hi {REQUESTER_NAME},\r\n\r\nYour issue is currently in progress. The team is working hard on it. We\'ll get back to you in [NUMBER OF HOURS] hours. Thanks for your patience.\r\n\r\nRegards,\r\n{AGENT_NAME}\r\n{SITE_NAME} Support', NULL, 1627110988),
(3, 'Issue Resolved', 'Hi {REQUESTER_NAME},\r\n\r\nWe\'ve resolved your issue. If there is something else you need help with, please feel free to reply to this ticket or open a new one.\r\n\r\nThanks again for reaching out to us.\r\n\r\nRegards,\r\n{AGENT_NAME}\r\n{SITE_NAME} Support', NULL, 1627111036),
(4, 'Going to Close', 'Hi {REQUESTER_NAME},\r\n\r\nThanks for taking the time to speak about {SUBJECT}.\r\n\r\nIt\'s been [NUMBER OF DAYS] days since we\'ve heard from you, so I wanted to let you know that we are going to close this ticket.\r\n\r\nPlease feel free to open a new ticket if you need any further assistance.\r\n\r\nThanks again for reaching out to us.\r\n\r\nRegards,\r\n{AGENT_NAME}\r\n{SITE_NAME} Support', NULL, 1627111158),
(5, 'Requester is Angry', 'Hi {REQUESTER_NAME},\r\n\r\nI\'m sorry about the {SUBJECT} issue that you faced. You\'re right that it shouldn\'t take long to fix.\r\n\r\nI\'ve got our team working on your issue. I will keep you informed until we have resolved your issue.\r\n\r\nAgain, we are sorry for the inconvenience.\r\n\r\nRegards,\r\n{AGENT_NAME}\r\n{SITE_NAME} Support', NULL, 1627111248),
(6, 'Header and Footer', 'Hi {REQUESTER_NAME},\r\n\r\nThanks for reaching out to us. [PLEASE ADD DETAILS HERE]\r\n\r\nThanks,\r\n{AGENT_NAME}\r\n{SITE_NAME} Support', NULL, 1627138443);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(90) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `assigned_to` int(10) UNSIGNED DEFAULT NULL,
  `department_id` int(10) UNSIGNED NOT NULL,
  `is_read` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `is_read_assigned` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `sub_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `ended_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_month_year` varchar(7) NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chats_replies`
--

CREATE TABLE `chats_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `chat_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `area` tinyint(3) UNSIGNED NOT NULL DEFAULT '2',
  `replied_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('h1tn1nsnr7t1kh52mv4clot3kqgqsqdk', '::1', 1692457330, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435373333303b7a5f757365725f746f6b656e7c733a38353a2231653266376239636338386463646632313665313435363663363839383730663939386563633731313930336234616665343065356239633932656666383539303666623966393836346530643834373932356165223b737563636573737c733a34323a22546865207570646174696f6e20636f6d6d616e64206973207375636365737366756c6c7920646f6e652e223b5f5f63695f766172737c613a313a7b733a373a2273756363657373223b733a333a226e6577223b7d),
('sqi3sfff45lti7ve3efg17ltot8154bn', '::1', 1692457564, 0x5f5f63695f6c6173745f726567656e65726174657c693a313639323435373333303b7a5f757365725f746f6b656e7c733a38353a2231653266376239636338386463646632313665313435363663363839383730663939386563633731313930336234616665343065356239633932656666383539303666623966393836346530643834373932356165223b);

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(90) NOT NULL,
  `type` varchar(30) NOT NULL,
  `options` varchar(1500) NOT NULL,
  `is_required` tinyint(3) UNSIGNED NOT NULL,
  `guide_text` varchar(255) NOT NULL,
  `visibility` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `custom_pages`
--

CREATE TABLE `custom_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `slug` varchar(30) NOT NULL,
  `content` mediumtext NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `visibility` tinyint(3) UNSIGNED NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(90) NOT NULL,
  `subject` varchar(90) NOT NULL,
  `hook` varchar(50) NOT NULL,
  `language` varchar(255) NOT NULL,
  `template` text NOT NULL,
  `is_built_in` tinyint(3) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `title`, `subject`, `hook`, `language`, `template`, `is_built_in`, `updated_at`, `created_at`) VALUES
(1, 'Email Verification', 'Please Verify your Account', 'email_verification', 'english', '<p>Hi {USER_NAME},<br><br>Thank you so much for joining the {SITE_NAME}.<br><br>Please verify your account by clicking on the following link:<br><a href=\"{EMAIL_LINK}\" target=\"_blank\">Click here</a><br><br>If you did not register, please kindly ignore this email.<br><br>Thanks,<br>{SITE_NAME}<br></p>', 1, NULL, 1611059287),
(2, 'Forgot Password', 'Password Reset', 'forgot_password', 'english', '<p>Hi {USER_NAME},<br><br>We\'ve received a password reset request. Please click on the following link to proceed:<br><a href=\"{EMAIL_LINK}\" target=\"_blank\">Reset Password</a><br><br>The link will expire after a limited time. If you didn\'t request to reset your password, please kindly ignore this message.<br><br>Thanks,<br>{SITE_NAME}<br></p>', 1, NULL, 1611135272),
(3, 'Ticket Replied by Agent', 'Your Ticket Has Been Replied', 'ticket_replied_agent', 'english', '<p>Hi {USER_NAME},<br><br>Your ticket has been replied to by our agent. You can see the ticket by clicking on the following link:<br><a href=\"{TICKET_URL}\" target=\"_blank\">Click here</a><br><br>Thanks,<br>{SITE_NAME} Support<br></p>', 1, NULL, 1611135470),
(4, 'Member Invite', 'Sign Up Invitation', 'member_invite', 'english', '<p>Hi there,<br><br>You have been invited to sign up as a member of {SITE_NAME}.<br><br>Please click on the following link to proceed:<br><a href=\"{EMAIL_LINK}\" target=\"_blank\">Register now</a><br><br>Thanks,<br>{SITE_NAME}<br></p>', 1, NULL, 1611136036),
(5, 'Change Email', 'Please Verify your Email Address', 'change_email', 'english', '<p>Hi there,<br><br>We\'ve received a request to change your email address. Please click on the following link to proceed:<br><a href=\"{EMAIL_LINK}\" target=\"_blank\">Click here</a><br><br>If you didn\'t request, please kindly ignore this email.<br><br>Thanks,<br>{SITE_NAME}</p>', 1, NULL, 1614102803),
(6, 'Changed Password', 'Password Changed', 'changed_password', 'english', '<p>Hi {USER_NAME},<br><br>Your account password is successfully changed. If you didn\'t request the change, please send us a message.<br><br>Thanks,<br>{SITE_NAME} Support</p>', 1, NULL, 1616355883),
(7, 'Welcome User', 'Your Account is Successfully Registered', 'welcome_user', 'english', '<p>Hi {USER_NAME},<br><br>You\'re welcome to {SITE_NAME}.<br><br>You can login to your account with username: {LOGIN_USERNAME} and the password that you created when registering.<br><br>You can go to the login page by clicking on the following link:<br><a href=\"{EMAIL_LINK}\" target=\"_blank\">Click here</a><br><br>Thanks,<br>{SITE_NAME}</p>', 1, NULL, 1625991429),
(8, 'Department Ticket', 'New Ticket Assigned to Department: {DEPARTMENT_NAME}', 'department_ticket', 'english', '<p>Hi {USER_NAME},<br><br>A new ticket has been assigned to your <b>{DEPARTMENT_NAME}</b> department.<br><br>You can see the assigned ticket by clicking on the following link:<br><a href=\"{TICKET_URL}\" target=\"_blank\">Click here</a><br><br>Regards,<br>{SITE_NAME} Support</p>', 1, NULL, 1627205276),
(9, 'Ticket Replied by User', 'User Replied to Assigned Ticket', 'ticket_replied_user', 'english', '<p>Hi {USER_NAME},<br><br>The user has replied to the ticket that\'s assigned to you. You can see the ticket by clicking on the following link:<br><a href=\"{TICKET_URL}\" target=\"_blank\">Click here</a><br><br>Thanks,<br>{SITE_NAME} Support<br></p>', 1, NULL, 1627224733),
(10, 'Ticket Assigned', 'Ticket Assigned', 'ticket_assigned', 'english', '<p>Hi {USER_NAME},<br><br>You have been assigned a ticket. You can see the ticket by clicking on the following link:<br><a href=\"{TICKET_URL}\" target=\"_blank\">Click here</a><br><br>Regards,<br>{SITE_NAME} Support</p>', 1, NULL, 1628170959),
(11, 'Department Chat', 'New Chat Assigned to Department: {DEPARTMENT_NAME}', 'department_chat', 'english', '<p>Hi {USER_NAME},<br><br>A new chat has been assigned to your <b>{DEPARTMENT_NAME}</b> department.<br><br>You can see the assigned chat by clicking on the following link:<br><a href=\"{CHAT_URL}\" target=\"_blank\">Click here</a><br><br>Regards,<br>{SITE_NAME} Support</p>', 1, NULL, 1638553679),
(12, 'Ticket Created (Unregistered User)', 'New Ticket Created For You', 'ticket_created_unregistered_user', 'english', '<p>Dear Customer,<br><br>A new ticket has been created for you by our support agent.<br><br>You can reach that ticket by clicking on the following link:<br><a href=\"{TICKET_URL}\" target=\"_blank\">Click here</a><br><br>Regards,<br>{SITE_NAME} Support</p>', 1, NULL, 1638868973),
(13, 'Chat Assigned', 'Chat Assigned', 'chat_assigned', 'english', '<p>Hi {USER_NAME},<br><br>You have been assigned a chat. You can see the chat by clicking on the following link:<br><a href=\"{CHAT_URL}\" target=\"_blank\">Click here</a><br><br>Regards,<br>{SITE_NAME} Support</p>', 1, NULL, 1639160537),
(14, 'Ticket Created by Guest', 'New Guest Ticket Created', 'ticket_created_guest', 'english', '<p>Dear Customer,<br><br>We have received a ticket submission request and a guest ticket has been successfully created for you.<br><br>Please kindly verify that the request was submitted by you, otherwise, you will not be able to add the replies:&nbsp;<a href=\"{EMAIL_LINK}\" target=\"_blank\">Verify Now</a><br><br>You can access it by clicking:&nbsp;<a href=\"{TICKET_URL}\" target=\"_blank\">View Ticket</a><br><br>If you didn\'t submit it, please kindly ignore this email (possibly the email address typing mistake).<br><br>Regards,<br>{SITE_NAME} Support</p>', 1, NULL, 1660817123),
(15, 'Resend Ticket Access', 'Re-sent Guest Ticket Access URL', 'resend_ticket_access', 'english', '<p>Dear Customer,<br><br>We have resent the URL of your guest ticket #{TICKET_ID}.<br><br>You can access that ticket by clicking on the following link:<br><a href=\"{TICKET_URL}\" target=\"_blank\">Click here</a><br><br>Regards,<br>{SITE_NAME} Support</p>', 1, NULL, 1660931621);

-- --------------------------------------------------------

--
-- Table structure for table `email_tokens`
--

CREATE TABLE `email_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `token` varchar(32) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `requested_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(90) NOT NULL,
  `answer` text NOT NULL,
  `category_id` tinyint(3) UNSIGNED NOT NULL,
  `visibility` tinyint(3) UNSIGNED NOT NULL,
  `logged_in_only` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faqs_categories`
--

CREATE TABLE `faqs_categories` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_key` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `for_team_member` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `is_read` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `content` mediumtext NOT NULL,
  `meta_description` varchar(255) NOT NULL,
  `meta_keywords` varchar(255) NOT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `content`, `meta_description`, `meta_keywords`, `updated_at`, `created_at`) VALUES
(1, '<p>The WEBSITE NAME website located at http://yourwebsite.com is a copyrighted work belonging to WEBSITE NAME. Certain features of the Site may be subject to additional guidelines, terms, or rules, which will be posted on the Site in connection with such features.<br><br>All such additional terms, guidelines, and rules are incorporated by reference into these Terms.<br><br>These Terms of Use described the legally binding terms and conditions that oversee your use of the Site. BY LOGGING INTO THE SITE, YOU ARE BEING COMPLIANT THAT THESE TERMS and you represent that you have the authority and capacity to enter into these Terms. YOU SHOULD BE AT LEAST 18 YEARS OF AGE TO ACCESS THE SITE. IF YOU DISAGREE WITH ALL OF THE PROVISION OF THESE TERMS, DO NOT LOG INTO AND/OR USE THE SITE.<br><br>These terms require the use of arbitration Section 10.2 on an individual basis to resolve disputes and also limit the remedies available to you in the event of a dispute.</p><h4>Accounts</h4><b>Account Creation.</b> For you to use the Site, you have to start an account and provide information about yourself. You warrant that: (a) all required registration information you submit is truthful, up-to-date and accurate; (b) you will maintain the accuracy of such information. You may delete your Account at any time by following the instructions on the Site. Company may suspend or terminate your Account in accordance with Section.<br><br><b>Account Responsibilities.</b> You are responsible for maintaining the confidentiality of your Account login information and are fully responsible for all activities that occur under your Account. You approve to immediately notify the Company of any unauthorized use, or suspected unauthorized use of your Account. Company cannot and will not be liable for any loss or damage arising from your failure to comply with the above requirements.<br><br><h4>Access to the Site</h4><b>Subject to these Terms.</b> Company grants you a non-transferable, non-exclusive, revocable, limited license to access the Site solely for your own personal, noncommercial use.<br><br><b>Certain Restrictions.</b> The rights approved to you in these Terms are subject to the following restrictions: (a) you shall not sell, rent, lease, transfer, assign, distribute, host, or otherwise commercially exploit the Site; (b) you shall not change, make derivative works of, disassemble, reverse compile or reverse engineer any part of the Site; (c) you shall not access the Site in order to build a similar or competitive website; and (d) except as expressly stated herein, no part of the Site may be copied, reproduced, distributed, republished, downloaded, displayed, posted or transmitted in any form or by any means unless otherwise indicated, any future release, update, or other addition to functionality of the Site shall be subject to these Terms. All copyright and other proprietary notices on the Site must be retained on all copies thereof.<br><br>Company reserves the right to change, suspend, or cease the Site with or without notice to you. You approved that Company will not be held liable to you or any third-party for any change, interruption, or termination of the Site or any part.<br><br><b>No Support or Maintenance.</b> You agree that Company will have no obligation to provide you with any support in connection with the Site.<br><br>Excluding any User Content that you may provide, you are aware that all the intellectual property rights, including copyrights, patents, trademarks, and trade secrets, in the Site and its content are owned by Company or Company\'s suppliers. Note that these Terms and access to the Site do not give you any rights, title or interest in or to any intellectual property rights, except for the limited access rights expressed in Section 2.1. Company and its suppliers reserve all rights not granted in these Terms.<br><br><h4>User Content</h4><b>User Content.</b> “User Content” means any and all information and content that a user submits to the Site. You are exclusively responsible for your User Content. You bear all risks associated with use of your User Content. You hereby certify that your User Content does not violate our Acceptable Use Policy. You may not represent or imply to others that your User Content is in any way provided, sponsored or endorsed by Company. Because you alone are responsible for your User Content, you may expose yourself to liability. Company is not obliged to backup any User Content that you post; also, your User Content may be deleted at any time without prior notice to you. You are solely responsible for making your own backup copies of your User Content if you desire.<br><br>You hereby grant to Company an irreversible, nonexclusive, royalty-free and fully paid, worldwide license to reproduce, distribute, publicly display and perform, prepare derivative works of, incorporate into other works, and otherwise use and exploit your User Content, and to grant sublicenses of the foregoing rights, solely for the purposes of including your User Content in the Site. You hereby irreversibly waive any claims and assertions of moral rights or attribution with respect to your User Content.<br><br><b>Acceptable Use Policy.</b> The following terms constitute our “Acceptable Use Policy”: You agree not to use the Site to collect, upload, transmit, display, or distribute any User Content (i) that violates any third-party right or any intellectual property or proprietary right; (ii) that is unlawful, harassing, abusive, tortious, threatening, harmful, invasive of another\'s privacy, vulgar, defamatory, false, intentionally misleading, trade libelous, pornographic, obscene, patently offensive, promotes racism, bigotry, hatred, or physical harm of any kind against any group or individual; (iii) that is harmful to minors in any way; or (iv) that is in violation of any law, regulation, or obligations or restrictions imposed by any third party.<br><br>In addition, you agree not to: (i) upload, transmit, or distribute to or through the Site any software intended to damage or alter a computer system or data; (ii) send through the Site unsolicited or unauthorized advertising, promotional materials, junk mail, spam, chain letters, pyramid schemes, or any other form of duplicative or unsolicited messages; (iii) use the Site to harvest, collect, gather or assemble information or data regarding other users without their consent; (iv) interfere with, disrupt, or create an undue burden on servers or networks connected to the Site, or violate the regulations, policies or procedures of such networks; (v) attempt to gain unauthorized access to the Site, whether through password mining or any other means; (vi) harass or interfere with any other user\'s use and enjoyment of the Site; or (vi) use software or automated agents or scripts to produce multiple accounts on the Site, or to generate automated searches, requests, or queries to the Site.<br><br>We reserve the right to review any User Content, and to investigate and/or take appropriate action against you in our sole discretion if you violate the Acceptable Use Policy or any other provision of these Terms or otherwise create liability for us or any other person. Such action may include removing or modifying your User Content, terminating your Account in accordance with Section 8, and/or reporting you to law enforcement authorities.<br><br>If you provide Company with any feedback or suggestions regarding the Site, you hereby assign to Company all rights in such Feedback and agree that Company shall have the right to use and fully exploit such Feedback and related information in any manner it believes appropriate. Company will treat any Feedback you provide to Company as non-confidential and non-proprietary.<br><br>You agree to indemnify and hold Company and its officers, employees, and agents harmless, including costs and attorneys\' fees, from any claim or demand made by any third-party due to or arising out of (a) your use of the Site, (b) your violation of these Terms, (c) your violation of applicable laws or regulations or (d) your User Content. Company reserves the right to assume the exclusive defense and control of any matter for which you are required to indemnify us, and you agree to cooperate with our defense of these claims. You agree not to settle any matter without the prior written consent of Company. Company will use reasonable efforts to notify you of any such claim, action or proceeding upon becoming aware of it.<br><br><h4>Third-Party Links & Ads; Other Users</h4><b>Third-Party Links & Ads.</b> The Site may contain links to third-party websites and services, and/or display advertisements for third-parties. Such Third-Party Links & Ads are not under the control of Company, and Company is not responsible for any Third-Party Links & Ads. Company provides access to these Third-Party Links & Ads only as a convenience to you, and does not review, approve, monitor, endorse, warrant, or make any representations with respect to Third-Party Links & Ads. You use all Third-Party Links & Ads at your own risk, and should apply a suitable level of caution and discretion in doing so. When you click on any of the Third-Party Links & Ads, the applicable third party\'s terms and policies apply, including the third party\'s privacy and data gathering practices.<br><br><b>Other Users.</b> Each Site user is solely responsible for any and all of its own User Content. Because we do not control User Content, you acknowledge and agree that we are not responsible for any User Content, whether provided by you or by others. You agree that Company will not be responsible for any loss or damage incurred as the result of any such interactions. If there is a dispute between you and any Site user, we are under no obligation to become involved.<br><br>You hereby release and forever discharge the Company and our officers, employees, agents, successors, and assigns from, and hereby waive and relinquish, each and every past, present and future dispute, claim, controversy, demand, right, obligation, liability, action and cause of action of every kind and nature, that has arisen or arises directly or indirectly out of, or that relates directly or indirectly to, the Site. If you are a California resident, you hereby waive California civil code section 1542 in connection with the foregoing, which states: “a general release does not extend to claims which the creditor does not know or suspect to exist in his or her favor at the time of executing the release, which if known by him or her must have materially affected his or her settlement with the debtor.”<br><br><b>Cookies and Web Beacons.</b> Like any other website, WEBSITE NAME uses ‘cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.<br><br><h4>Disclaimers</h4>The site is provided on an “as-is” and “as available” basis, and company and our suppliers expressly disclaim any and all warranties and conditions of any kind, whether express, implied, or statutory, including all warranties or conditions of merchantability, fitness for a particular purpose, title, quiet enjoyment, accuracy, or non-infringement. We and our suppliers make not guarantee that the site will meet your requirements, will be available on an uninterrupted, timely, secure, or error-free basis, or will be accurate, reliable, free of viruses or other harmful code, complete, legal, or safe. If applicable law requires any warranties with respect to the site, all such warranties are limited in duration to ninety (90) days from the date of first use.<br><br>Some jurisdictions do not allow the exclusion of implied warranties, so the above exclusion may not apply to you. Some jurisdictions do not allow limitations on how long an implied warranty lasts, so the above limitation may not apply to you.<br><br><b>Limitation on Liability</b><br>To the maximum extent permitted by law, in no event shall company or our suppliers be liable to you or any third-party for any lost profits, lost data, costs of procurement of substitute products, or any indirect, consequential, exemplary, incidental, special or punitive damages arising from or relating to these terms or your use of, or incapability to use the site even if company has been advised of the possibility of such damages. Access to and use of the site is at your own discretion and risk, and you will be solely responsible for any damage to your device or computer system, or loss of data resulting therefrom.<br><br>To the maximum extent permitted by law, notwithstanding anything to the contrary contained herein, our liability to you for any damages arising from or related to this agreement, will at all times be limited to a maximum of fifty U.S. dollars (u.s. $50). The existence of more than one claim will not enlarge this limit. You agree that our suppliers will have no liability of any kind arising from or relating to this agreement.<br><br>Some jurisdictions do not allow the limitation or exclusion of liability for incidental or consequential damages, so the above limitation or exclusion may not apply to you.<br><br><b>Term and Termination.</b> Subject to this Section, these Terms will remain in full force and effect while you use the Site. We may suspend or terminate your rights to use the Site at any time for any reason at our sole discretion, including for any use of the Site in violation of these Terms. Upon termination of your rights under these Terms, your Account and right to access and use the Site will terminate immediately. You understand that any termination of your Account may involve deletion of your User Content associated with your Account from our live databases. Company will not have any liability whatsoever to you for any termination of your rights under these Terms. Even after your rights under these Terms are terminated, the following provisions of these Terms will remain in effect: Sections 2 through 2.5, Section 3 and Sections 4 through 10.<br><br><h4>Copyright Policy.</h4>Company respects the intellectual property of others and asks that users of our Site do the same. In connection with our Site, we have adopted and implemented a policy respecting copyright law that provides for the removal of any infringing materials and for the termination of users of our online Site who are repeated infringers of intellectual property rights, including copyrights. If you believe that one of our users is, through the use of our Site, unlawfully infringing the copyright(s) in a work, and wish to have the allegedly infringing material removed, the following information in the form of a written notification (pursuant to 17 U.S.C. § 512(c)) must be provided to our designated Copyright Agent:<p></p><ul><li>your physical or electronic signature;</li><li>identification of the copyrighted work(s) that you claim to have been infringed;</li><li>identification of the material on our services that you claim is infringing and that you request us to remove;</li><li>sufficient information to permit us to locate such material;</li><li>your address, telephone number, and e-mail address;</li><li>a statement that you have a good faith belief that use of the objectionable material is not authorized by the copyright owner, its agent, or under the law; and</li><li>a statement that the information in the notification is accurate, and under penalty of perjury, that you are either the owner of the copyright that has allegedly been infringed or that you are authorized to act on behalf of the copyright owner.</li><li>Please note that, pursuant to 17 U.S.C. § 512(f), any misrepresentation of material fact in a written notification automatically subjects the complaining party to liability for any damages, costs and attorney\'s fees incurred by us in connection with the written notification and allegation of copyright infringement.</li></ul><p></p><h4>General</h4>These Terms are subject to occasional revision, and if we make any substantial changes, we may notify you by sending you an e-mail to the last e-mail address you provided to us and/or by prominently posting notice of the changes on our Site. You are responsible for providing us with your most current e-mail address. In the event that the last e-mail address that you have provided us is not valid our dispatch of the e-mail containing such notice will nonetheless constitute effective notice of the changes described in the notice. Any changes to these Terms will be effective upon the earliest of thirty (30) calendar days following our dispatch of an e-mail notice to you or thirty (30) calendar days following our posting of notice of the changes on our Site. These changes will be effective immediately for new users of our Site. Continued use of our Site following notice of such changes shall indicate your acknowledgement of such changes and agreement to be bound by the terms and conditions of such changes. Dispute Resolution. Please read this Arbitration Agreement carefully. It is part of your contract with Company and affects your rights. It contains procedures for MANDATORY BINDING ARBITRATION AND A CLASS ACTION WAIVER.<br><br><b>Applicability of Arbitration Agreement.</b> All claims and disputes in connection with the Terms or the use of any product or service provided by the Company that cannot be resolved informally or in small claims court shall be resolved by binding arbitration on an individual basis under the terms of this Arbitration Agreement. Unless otherwise agreed to, all arbitration proceedings shall be held in English. This Arbitration Agreement applies to you and the Company, and to any subsidiaries, affiliates, agents, employees, predecessors in interest, successors, and assigns, as well as all authorized or unauthorized users or beneficiaries of services or goods provided under the Terms.<br><br><b>Notice Requirement and Informal Dispute Resolution.</b> Before either party may seek arbitration, the party must first send to the other party a written Notice of Dispute describing the nature and basis of the claim or dispute, and the requested relief. A Notice to the Company should be sent to: YOUR COMPANY ADDRESS. After the Notice is received, you and the Company may attempt to resolve the claim or dispute informally. If you and the Company do not resolve the claim or dispute within thirty (30) days after the Notice is received, either party may begin an arbitration proceeding. The amount of any settlement offer made by any party may not be disclosed to the arbitrator until after the arbitrator has determined the amount of the award to which either party is entitled.<br><br><b>Arbitration Rules.</b> Arbitration shall be initiated through the American Arbitration Association, an established alternative dispute resolution provider that offers arbitration as set forth in this section. If AAA is not available to arbitrate, the parties shall agree to select an alternative ADR Provider. The rules of the ADR Provider shall govern all aspects of the arbitration except to the extent such rules are in conflict with the Terms. The AAA Consumer Arbitration Rules governing the arbitration are available online at adr.org or by calling the AAA at 1-800-778-7879. The arbitration shall be conducted by a single, neutral arbitrator. Any claims or disputes where the total amount of the award sought is less than Ten Thousand U.S. Dollars (US $10,000.00) may be resolved through binding non-appearance-based arbitration, at the option of the party seeking relief. For claims or disputes where the total amount of the award sought is Ten Thousand U.S. Dollars (US $10,000.00) or more, the right to a hearing will be determined by the Arbitration Rules. Any hearing will be held in a location within 100 miles of your residence, unless you reside outside of the United States, and unless the parties agree otherwise. If you reside outside of the U.S., the arbitrator shall give the parties reasonable notice of the date, time and place of any oral hearings. Any judgment on the award rendered by the arbitrator may be entered in any court of competent jurisdiction. If the arbitrator grants you an award that is greater than the last settlement offer that the Company made to you prior to the initiation of arbitration, the Company will pay you the greater of the award or $2,500.00. Each party shall bear its own costs and disbursements arising out of the arbitration and shall pay an equal share of the fees and costs of the ADR Provider.<br><br><b>Additional Rules for Non-Appearance Based Arbitration. </b>If non-appearance based arbitration is elected, the arbitration shall be conducted by telephone, online and/or based solely on written submissions; the specific manner shall be chosen by the party initiating the arbitration. The arbitration shall not involve any personal appearance by the parties or witnesses unless otherwise agreed by the parties.<br><br><b>Time Limits.</b> If you or the Company pursues arbitration, the arbitration action must be initiated and/or demanded within the statute of limitations and within any deadline imposed under the AAA Rules for the pertinent claim.<br><br><b>Authority of Arbitrator.</b> If arbitration is initiated, the arbitrator will decide the rights and liabilities of you and the Company, and the dispute will not be consolidated with any other matters or joined with any other cases or parties. The arbitrator shall have the authority to grant motions dispositive of all or part of any claim. The arbitrator shall have the authority to award monetary damages, and to grant any non-monetary remedy or relief available to an individual under applicable law, the AAA Rules, and the Terms. The arbitrator shall issue a written award and statement of decision describing the essential findings and conclusions on which the award is based. The arbitrator has the same authority to award relief on an individual basis that a judge in a court of law would have. The award of the arbitrator is final and binding upon you and the Company.<br><br><b>Waiver of Jury Trial.</b> THE PARTIES HEREBY WAIVE THEIR CONSTITUTIONAL AND STATUTORY RIGHTS TO GO TO COURT AND HAVE A TRIAL IN FRONT OF A JUDGE OR A JURY, instead electing that all claims and disputes shall be resolved by arbitration under this Arbitration Agreement. Arbitration procedures are typically more limited, more efficient and less expensive than rules applicable in a court and are subject to very limited review by a court. In the event any litigation should arise between you and the Company in any state or federal court in a suit to vacate or enforce an arbitration award or otherwise, YOU AND THE COMPANY WAIVE ALL RIGHTS TO A JURY TRIAL, instead electing that the dispute be resolved by a judge.<br><br><b>Waiver of Class or Consolidated Actions.</b> All claims and disputes within the scope of this arbitration agreement must be arbitrated or litigated on an individual basis and not on a class basis, and claims of more than one customer or user cannot be arbitrated or litigated jointly or consolidated with those of any other customer or user.<br><br><b>Confidentiality.</b> All aspects of the arbitration proceeding shall be strictly confidential. The parties agree to maintain confidentiality unless otherwise required by law. This paragraph shall not prevent a party from submitting to a court of law any information necessary to enforce this Agreement, to enforce an arbitration award, or to seek injunctive or equitable relief.<br><br><b>Severability.</b> If any part or parts of this Arbitration Agreement are found under the law to be invalid or unenforceable by a court of competent jurisdiction, then such specific part or parts shall be of no force and effect and shall be severed and the remainder of the Agreement shall continue in full force and effect.<br><br><b>Right to Waive.</b> Any or all of the rights and limitations set forth in this Arbitration Agreement may be waived by the party against whom the claim is asserted. Such waiver shall not waive or affect any other portion of this Arbitration Agreement.<br><br><b>Survival of Agreement.</b> This Arbitration Agreement will survive the termination of your relationship with Company.<br><br><b>Small Claims Court.</b> Nonetheless the foregoing, either you or the Company may bring an individual action in small claims court.<br><br><b>Emergency Equitable Relief.</b> Anyhow the foregoing, either party may seek emergency equitable relief before a state or federal court in order to maintain the status quo pending arbitration. A request for interim measures shall not be deemed a waiver of any other rights or obligations under this Arbitration Agreement.<br><br><b>Claims Not Subject to Arbitration.</b> Notwithstanding the foregoing, claims of defamation, violation of the Computer Fraud and Abuse Act, and infringement or misappropriation of the other party\'s patent, copyright, trademark or trade secrets shall not be subject to this Arbitration Agreement.<br><br>In any circumstances where the foregoing Arbitration Agreement permits the parties to litigate in court, the parties hereby agree to submit to the personal jurisdiction of the courts located within Netherlands County, California, for such purposes.<br><br>The Site may be subject to U.S. export control laws and may be subject to export or import regulations in other countries. You agree not to export, re-export, or transfer, directly or indirectly, any U.S. technical data acquired from Company, or any products utilizing such data, in violation of the United States export laws or regulations.<br><br>Company is located at the address in Section 10.8. If you are a California resident, you may report complaints to the Complaint Assistance Unit of the Division of Consumer Product of the California Department of Consumer Affairs by contacting them in writing at 400 R Street, Sacramento, CA 95814, or by telephone at (800) 952-5210.<br><br><b>Electronic Communications.</b> The communications between you and Company use electronic means, whether you use the Site or send us emails, or whether Company posts notices on the Site or communicates with you via email. For contractual purposes, you (a) consent to receive communications from Company in an electronic form; and (b) agree that all terms and conditions, agreements, notices, disclosures, and other communications that Company provides to you electronically satisfy any legal obligation that such communications would satisfy if it were be in a hard copy writing.<br><br><b>Entire Terms.</b> These Terms constitute the entire agreement between you and us regarding the use of the Site. Our failure to exercise or enforce any right or provision of these Terms shall not operate as a waiver of such right or provision. The section titles in these Terms are for convenience only and have no legal or contractual effect. The word “including” means “including without limitation”. If any provision of these Terms is held to be invalid or unenforceable, the other provisions of these Terms will be unimpaired and the invalid or unenforceable provision will be deemed modified so that it is valid and enforceable to the maximum extent permitted by law. Your relationship to Company is that of an independent contractor, and neither party is an agent or partner of the other. These Terms, and your rights and obligations herein, may not be assigned, subcontracted, delegated, or otherwise transferred by you without Company\'s prior written consent, and any attempted assignment, subcontract, delegation, or transfer in violation of the foregoing will be null and void. Company may freely assign these Terms. The terms and conditions set forth in these Terms shall be binding upon assignees.<br><br><b>Copyright/Trademark Information.</b> Copyright ©. All rights reserved. All trademarks, logos and service marks displayed on the Site are our property or the property of other third-parties. You are not permitted to use these Marks without our prior written consent or the consent of such third party which may own the Marks.<br><br><h4>Contact Information</h4><b>Address:</b> YOUR COMPANY ADDRESS<br><b>Email:</b> email@yourwebsite.com', 'The meta description goes here...', 'terms of use, terms', NULL, 1611744608),
(2, '<p>At WEBSITE NAME, accessible at http://yourwebsite.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by WEBSITE NAME and how we use it.<br><br>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.<br><br>This privacy policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in WEBSITE NAME. This policy is not applicable to any information collected offline or via channels other than this website.<br><br><b>Consent</b><br>By using our website, you hereby consent to our Privacy Policy and agree to its terms.<br><br><b>Information we collect</b><br>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.<br><br>If you contact us directly, we may receive additional information about you such as your name, email address, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.<br><br>When you register for an Account, we may ask for your contact information, including items such as name, and email address.<br><br><b>How we use your information</b><br>We use the information we collect in various ways, including to:</p><ul><li>Provide, operate, and maintain our website</li><li>Improve, personalize, and expand our website</li><li>Understand and analyze how you use our website</li><li>Develop new products, services, features, and functionality</li><li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li><li>Send you emails</li><li>Find and prevent fraud</li></ul><p><b>Log Files<br></b>WEBSITE NAME follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.<br><br><b>Cookies and Web Beacons</b><br>Like any other website, WEBSITE NAME uses ‘cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.<br><br><b>Advertising Partners Privacy Policies</b><br>You may consult this list to find the Privacy Policy for each of the advertising partners of WEBSITE NAME.<br><br>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on WEBSITE NAME, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.<br><br>Note that WEBSITE NAME has no access to or control over these cookies that are used by third-party advertisers.<br><br><b>Third-Party Privacy Policies</b><br>WEBSITE NAME\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.<br><br>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites.<br><br><b>CCPA Privacy Policy (Do Not Sell My Personal Information)</b><br>Under the CCPA, among other rights, California consumers have the right to:</p><ul><li>Request that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</li><li>Request that a business delete any personal data about the consumer that a business has collected.</li><li>Request that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.</li><li>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</li></ul><p><b>GDPR Privacy Policy (Data Protection Rights)</b><br>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p><ul><li>The right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.</li><li>The right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</li><li>The right to erasure – You have the right to request that we erase your personal data, under certain conditions.</li><li>The right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.</li><li>The right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.</li><li>The right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</li><li>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</li></ul><p><b>Children\'s Information</b><br>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.<br><br>WEBSITE NAME does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>', 'The meta description goes here...', 'privacy policy, visitor\'s privacy', NULL, 1611744759);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `access_key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `access_key`) VALUES
(1, 'Canned Replies', 'canned_replies'),
(2, 'Tickets', 'tickets'),
(3, 'All Tickets', 'all_tickets'),
(4, 'Departments', 'departments'),
(5, 'Knowledge Base', 'knowledge_base'),
(6, 'FAQs', 'faqs'),
(7, 'Announcements', 'announcements'),
(8, 'Backup', 'backup'),
(9, 'Email Templates', 'email_templates'),
(10, 'Pages', 'pages'),
(11, 'Impersonate', 'impersonate'),
(12, 'Users', 'users'),
(13, 'Roles & Permissions', 'roles_and_permissions'),
(14, 'Settings', 'settings'),
(15, 'Chats', 'chats'),
(16, 'All Chats', 'all_chats'),
(17, 'Reports', 'reports'),
(18, 'Custom Fields', 'custom_fields');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `users` int(10) UNSIGNED NOT NULL,
  `opened_tickets` int(10) UNSIGNED NOT NULL,
  `closed_tickets` int(10) UNSIGNED NOT NULL,
  `solved_tickets` int(10) UNSIGNED NOT NULL,
  `total_tickets` int(10) UNSIGNED NOT NULL,
  `active_chats` int(10) UNSIGNED NOT NULL,
  `ended_chats` int(10) UNSIGNED NOT NULL,
  `total_chats` int(10) UNSIGNED NOT NULL,
  `period` varchar(255) NOT NULL,
  `generated_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `access_key` varchar(50) NOT NULL,
  `is_built_in` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `access_key`, `is_built_in`) VALUES
(1, 'Super Admin', 'super_admin', 1),
(2, 'Agent', 'agent', 1),
(3, 'User', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles_permissions`
--

CREATE TABLE `roles_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `permission_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles_permissions`
--

INSERT INTO `roles_permissions` (`id`, `role_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13),
(14, 1, 14),
(15, 2, 1),
(16, 2, 2),
(17, 1, 15),
(18, 1, 16),
(19, 2, 15),
(20, 1, 17),
(21, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `access_key` varchar(50) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `access_key`, `value`) VALUES
(1, 'auto_close_tickets', '1'),
(2, 'create_ticket_page_message', 'Please note that our response time can be up to 3 business days.'),
(3, 'e_encryption', ''),
(4, 'e_host', ''),
(5, 'e_password', ''),
(6, 'e_port', ''),
(7, 'e_protocol', 'mail'),
(8, 'e_sender', ''),
(9, 'e_sender_name', ''),
(10, 'e_username', ''),
(11, 'fb_app_id', ''),
(12, 'fb_app_secret', ''),
(13, 'fb_enable_login', '0'),
(14, 'gl_client_key', ''),
(15, 'gl_enable', '0'),
(16, 'gl_secret_key', ''),
(17, 'google_analytics_id', ''),
(18, 'gr_enable', '0'),
(19, 'gr_public_key', ''),
(20, 'gr_secret_key', ''),
(21, 'ipinfo_token', ''),
(22, 'maintenance_mode', '0'),
(23, 'mm_allowed_ips', ''),
(24, 'mm_message', 'We\'re very sorry for the inconvenience, the site is currently undergoing scheduled maintenance.'),
(25, 'show_tp_message', '1'),
(26, 'site_about', 'About NIWA Support Helpdesk App Welcome to the NIWA Support Helpdesk App, your dedicated companion for seamless assistance and information regarding the Nigeria Social Insurance Trust Fund (NIWA). Our app has been meticulously crafted to cater to your inquiries, concerns, and needs, providing you with swift access to the vital resources you require. Who We Are: The NIWA Support Helpdesk App is an extension of the Nigeria Social Insurance Trust Fund, an institution committed to safeguarding the welfare of Nigerian workers and their families. With a history of serving as a reliable safety net for workers\' compensation, injury-related support, and social insurance, NIWA continues its legacy by extending its services into the digital realm through this app. Our Mission: Our mission is to ensure that every individual\'s interaction with NIWA is as effortless and effective as possible. The NIWA Support Helpdesk App has been designed to bridge the gap between you and the valuable services NIWA offers. We strive to enhance accessibility, streamline communication, and provide timely solutions to your queries. Key Features: Instant Support: Have a question or concern? The app offers real-time support, connecting you to our knowledgeable representatives who are ready to assist. Information Hub: Access comprehensive information about NIWA\'s services, eligibility criteria, claims process, and more. Stay informed about your entitlements as a worker. Claims Tracking: Monitor the progress of your claims through the app. Receive updates and notifications as your claim moves through the processing stages. Resource Center: Browse through a collection of resources, including safety guidelines, educational materials, and informative articles related to workplace safety and insurance. Document Submission: Upload and submit essential documents directly through the app, ensuring a seamless and paperless experience. Notification Center: Stay informed about important announcements, policy changes, and upcoming events related to NIWA. User-Friendly Interface: The app\'s intuitive design makes navigation effortless, ensuring that you can find the information you need without any hassle.'),
(27, 'site_color', '3'),
(28, 'site_description', 'NIWA Support HelpDesk'),
(29, 'site_favicon', 'ac696024b61d305a9b30b550711beacc.png'),
(30, 'site_keywords', 'NIWA, Helpdesk, NIWA Support, NIWA Helpdesk,'),
(31, 'site_logo', 'ca303150c07893a1faa1008a163e735e.png'),
(32, 'site_name', 'NIWA HELP DESK'),
(33, 'site_show_cookie_popup', '1'),
(34, 'site_tagline', 'Support Tickets System with Knowledge Base and FAQs'),
(35, 'site_theme', 'default'),
(36, 'site_timezone', 'Africa/Lagos'),
(37, 'sp_allow_ticket_reopen', '0'),
(38, 'sp_email_notifications', '1'),
(39, 'sp_verification_before_submit', '0'),
(40, 'tw_consumer_key', ''),
(41, 'tw_consumer_secret', ''),
(42, 'tw_enable_login', '0'),
(43, 'u_allow_username_change', '1'),
(44, 'u_can_remove_them', '0'),
(45, 'u_enable_registration', '1'),
(46, 'u_lockout_unlock_time', '1'),
(47, 'u_max_avator_size', '500x500'),
(48, 'u_notify_pass_changed', '1'),
(49, 'u_password_requirement', 'low'),
(50, 'u_req_ev_onchange', '1'),
(51, 'u_reset_password', '1'),
(52, 'u_temporary_lockout', 'medium'),
(53, 'sp_live_chatting', '0'),
(54, 'sp_guest_ticketing', '0'),
(55, 'i_pc_string', '31200164-dd02-49ea-baef-3865c90acc123'),
(56, 'i_pc_status', '0'),
(57, 'i_at', '1692456994'),
(58, 'site_custom_css', ''),
(59, 'i_app_id', ''),
(60, 'err_invalid_detected', '<strong>Please note that the system detected this copy as unlicensed, kindly reach out to support (with your purchase code) as soon as possible if it\'s a mistake.</strong>');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(90) NOT NULL,
  `message` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `attachment_name` varchar(255) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `assigned_to` int(10) UNSIGNED DEFAULT NULL,
  `department_id` tinyint(3) UNSIGNED NOT NULL,
  `security_key` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `is_verified` tinyint(3) UNSIGNED DEFAULT NULL,
  `email_attempts` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `last_email_attempt` int(10) UNSIGNED DEFAULT NULL,
  `is_read` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `is_read_assigned` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `last_agent_replied_at` int(10) UNSIGNED DEFAULT NULL,
  `reopened_awaiting` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `last_reply_area` tinyint(3) UNSIGNED DEFAULT NULL,
  `sub_status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `closed_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_month_year` varchar(7) NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_attachments`
--

CREATE TABLE `tickets_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `attachment_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_custom_fields`
--

CREATE TABLE `tickets_custom_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `custom_field_id` tinyint(3) UNSIGNED NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_departments`
--

CREATE TABLE `tickets_departments` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `team` text NOT NULL,
  `visibility` tinyint(3) UNSIGNED NOT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets_departments`
--

INSERT INTO `tickets_departments` (`id`, `name`, `team`, `visibility`, `updated_at`, `created_at`) VALUES
(1, 'General Inquiries', '{\"users\":[1]}', 1, NULL, 1611213421);

-- --------------------------------------------------------

--
-- Table structure for table `tickets_history`
--

CREATE TABLE `tickets_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_key` varchar(255) NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_notes`
--

CREATE TABLE `tickets_notes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `note` varchar(500) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `attachment_name` varchar(255) NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_replies`
--

CREATE TABLE `tickets_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `message` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `attachment_name` varchar(255) NOT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `replied_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets_replies_attachments`
--

CREATE TABLE `tickets_replies_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_reply_id` int(10) UNSIGNED NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `attachment_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `pending_email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `date_format` varchar(10) NOT NULL DEFAULT 'd/m/Y',
  `time_format` varchar(10) NOT NULL DEFAULT 'H:i:s',
  `timezone` varchar(32) NOT NULL,
  `language` varchar(255) NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL,
  `is_online` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `online_time` int(10) UNSIGNED DEFAULT NULL,
  `online_date` varchar(10) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `is_verified` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `send_email_notifications` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `announcements_last_read_at` int(10) UNSIGNED DEFAULT NULL,
  `last_activity` int(10) UNSIGNED DEFAULT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `registration_source` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `oauth_identifier` varchar(255) NOT NULL,
  `registered_month_year` varchar(7) NOT NULL,
  `registered_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email_address`, `pending_email_address`, `password`, `picture`, `date_format`, `time_format`, `timezone`, `language`, `role`, `is_online`, `online_time`, `online_date`, `status`, `is_verified`, `send_email_notifications`, `announcements_last_read_at`, `last_activity`, `last_login`, `updated_at`, `registration_source`, `oauth_identifier`, `registered_month_year`, `registered_at`) VALUES
(1, 'Super', 'Admin', 'superadmin', 'helpdesk@NIWA.gov.ng', '', '$2y$10$J5ph8N8yXbMgoeyHNpV9UOhjK7wTNa4g3PvvcSBS99bF76j0B1AP2', 'default.png', 'd/m/Y', 'H:i:s', '', '', 1, 1, 1692457347, '2023-08-19', 1, 1, 1, NULL, 1692457563, 1692457031, NULL, 1, '', '8-2023', 1692456994);

-- --------------------------------------------------------

--
-- Table structure for table `users_invites`
--

CREATE TABLE `users_invites` (
  `id` int(10) UNSIGNED NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `invitation_code` varchar(32) NOT NULL,
  `expires_in` tinyint(3) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `bypass_registration` tinyint(3) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `updated_at` int(10) UNSIGNED DEFAULT NULL,
  `invited_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_sent_emails`
--

CREATE TABLE `users_sent_emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent_to` int(10) UNSIGNED NOT NULL,
  `sent_by` int(10) UNSIGNED NOT NULL,
  `sent_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_sessions`
--

CREATE TABLE `users_sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `interface` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `last_activity` int(10) UNSIGNED DEFAULT NULL,
  `last_location` varchar(255) NOT NULL,
  `logged_in_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_sessions`
--

INSERT INTO `users_sessions` (`id`, `user_id`, `token`, `ip_address`, `platform`, `browser`, `interface`, `last_activity`, `last_location`, `logged_in_at`) VALUES
(1, 1, '1e2f7b9cc88dcdf216e14566c689870f998ecc711903b4afe40e5b9c92eff85906fb9f9864e0d847925ae', '::1', 'Windows 10', 'Chrome', 1, 1692457563, 'admin/tools/email_templates', 1692457031);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `articles_categories`
--
ALTER TABLE `articles_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_votes`
--
ALTER TABLE `articles_votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_log`
--
ALTER TABLE `backup_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `canned_replies`
--
ALTER TABLE `canned_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats_replies`
--
ALTER TABLE `chats_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_pages`
--
ALTER TABLE `custom_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_tokens`
--
ALTER TABLE `email_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs_categories`
--
ALTER TABLE `faqs_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `access_key` (`access_key`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_attachments`
--
ALTER TABLE `tickets_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_custom_fields`
--
ALTER TABLE `tickets_custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_departments`
--
ALTER TABLE `tickets_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_history`
--
ALTER TABLE `tickets_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_notes`
--
ALTER TABLE `tickets_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_replies`
--
ALTER TABLE `tickets_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets_replies_attachments`
--
ALTER TABLE `tickets_replies_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users_invites`
--
ALTER TABLE `users_invites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sent_emails`
--
ALTER TABLE `users_sent_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_sessions`
--
ALTER TABLE `users_sessions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles_categories`
--
ALTER TABLE `articles_categories`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles_votes`
--
ALTER TABLE `articles_votes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `backup_log`
--
ALTER TABLE `backup_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `canned_replies`
--
ALTER TABLE `canned_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats_replies`
--
ALTER TABLE `chats_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_pages`
--
ALTER TABLE `custom_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `email_tokens`
--
ALTER TABLE `email_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs_categories`
--
ALTER TABLE `faqs_categories`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles_permissions`
--
ALTER TABLE `roles_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_attachments`
--
ALTER TABLE `tickets_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_custom_fields`
--
ALTER TABLE `tickets_custom_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_departments`
--
ALTER TABLE `tickets_departments`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets_history`
--
ALTER TABLE `tickets_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_notes`
--
ALTER TABLE `tickets_notes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_replies`
--
ALTER TABLE `tickets_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets_replies_attachments`
--
ALTER TABLE `tickets_replies_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_invites`
--
ALTER TABLE `users_invites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_sent_emails`
--
ALTER TABLE `users_sent_emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_sessions`
--
ALTER TABLE `users_sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
