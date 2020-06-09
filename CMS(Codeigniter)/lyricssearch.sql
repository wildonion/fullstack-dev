-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2016 at 09:49 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lyricssearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` char(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_pic` text NOT NULL,
  `enter_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `skills` text,
  `bio` text,
  `birthday_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `username`, `password`, `email`, `admin_pic`, `enter_added`, `skills`, `bio`, `birthday_date`) VALUES
(88, 'Parsa', '$2a$08$Lh0Wn9px/3WxJKFTYsrwoeAkLb/z88Hi.qRkrGdQu8vIhEMlNIJuu', 'parsa_esk@yahoo.com', '06c88fc1a12bd67153439b787ddcd6b2.jpg', '2016-09-21 06:32:37', NULL, NULL, NULL),
(89, 'ali', '$2a$08$mEVyqzTMDyvlP3g0.s27PuRhHZU0qzI3KTjrc4/hxS4CRWWWeeBRO', 'ali_pain@yahoo.com', 'debb12bdac30d492bc43f091c08bb6ce.jpg', '2016-09-21 11:55:53', NULL, NULL, NULL),
(94, 'erfan', '$2a$08$c.DYaGV3o5KKIXrVRHcbAupC2J/DczslZInFE9IKqATMD1HdR6khO', 'ea_pain@yahoo.com', '91d36965d25623fef7a46f59d1a6c497.jpg', '2016-10-14 17:15:23', 'PHP,Jquery,JavaScript', 'sjjsdbvsdvsdvsdvsdvs', '2016-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `l_id` int(11) DEFAULT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_message` text NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c_id` int(11) NOT NULL,
  `havenewitem` varchar(100) DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `id_code_for_reg`
--

CREATE TABLE `id_code_for_reg` (
  `id` text NOT NULL,
  `code` text NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id_code_for_reg`
--

INSERT INTO `id_code_for_reg` (`id`, `code`, `email`) VALUES
('MTY=', '4cb84e01cd635861423ea992c44d91ae', 'ea_pain@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `ipaddress_likes_map`
--

CREATE TABLE `ipaddress_likes_map` (
  `id` int(8) NOT NULL,
  `lyrics_id` int(8) NOT NULL,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipaddress_likes_map`
--

INSERT INTO `ipaddress_likes_map` (`id`, `lyrics_id`, `ip_address`) VALUES
(96, 141, '::1'),
(98, 172, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `lyrics`
--

CREATE TABLE `lyrics` (
  `l_id` int(11) NOT NULL,
  `name_of_music` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `artist` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `name_of_singer` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Album` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `publish_year` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lyrics` varchar(3000) COLLATE utf8_unicode_ci DEFAULT 'empty',
  `translated_lyrics` varchar(5000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `translateby` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'no one yet',
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lyrics`
--

INSERT INTO `lyrics` (`l_id`, `name_of_music`, `artist`, `name_of_singer`, `genre`, `Album`, `publish_year`, `lyrics`, `translated_lyrics`, `translateby`, `post_date`, `likes`) VALUES
(108, 'Hello Adele', 'Adele', 'Adele', 'romantic', 'single track', '2013', '<p>Hello, it''s me<br />I was wondering if after all these years<br />You''d like to meet, to go over everything. <br />They say that time''s supposed to heal ya<br />But I ain''t done much healing<br /><br />Hello, can you save me?<br />I''m in California dreaming about who we used to be<br />When we were younger and free<br />I''ve forgotten how it felt before the world fell at our feet<br /><br /><br />There''s such a difference between us<br />And a million miles<br /><br /><br />Hello from the other side<br />I must''ve called a thousand times to tell you<br />I''m sorry, for everything that I''ve done<br />But when I call you never seem to be home<br /><br />Hello from the outside<br />At least I can say that I''ve tried to tell you<br />I''m sorry, for breaking your heart<br />But it don''t matter, it clearly doesn''t tear you apart anymore<br /><br /><br />Hello, how are you?<br />It''s so typical of me to talk about myself<br />I''m sorry, I hope that you''re well<br />Did you ever make it out of that town<br />Where nothing ever happened?<br /><br /><br />It''s no secret<br />That the both of us are running out of time<br /><br /><br />Hello from the other side<br />I must''ve called a thousand times to tell you<br />I''m sorry, for everything that I''ve done<br />But when I call you never seem to be home<br /><br />Hello from the outside<br />At least I can say that I''ve tried to tell you<br />I''m sorry, for breaking your heart<br />But it don''t matter, it clearly doesn''t tear you apart anymore<br /><br /><br />Ooooohh, anymore<br />Ooooohh, anymore<br />Ooooohh, anymore<br />Anymore<br /><br /><br />Hello from the other side<br />I must''ve called a thousand times to tell you<br />I''m sorry, for everything that I''ve done<br />But when I call you never seem to be home<br /><br />Hello from the outside<br />At least I can say that I''ve tried to tell you<br />I''m sorry, for breaking your heart<br />But it don''t matter, it clearly doesn''t tear you apart anymore</p>', '<pre>سلام منم!</pre>', 'ea_pain@yahoo.com', '2016-09-09 19:11:23', 0),
(140, 'Evanecsence', 'Eva', 'Amy lee', '', '', '', 'empty', 'no', 'no one yet', '2016-10-17 19:52:05', 0),
(141, 'Sam Smith', 'Eva', 'Amy lee', '', '', '', 'empty', 'no', 'no one yet', '2016-10-17 19:58:02', 0),
(142, 'Shamrine', 'sham', 'Amy_lee', '', '', '', 'empty', 'no', 'no one yet', '2016-10-17 19:58:21', 0),
(170, 'fgbdgbdg', 'sfbsf', '', '', '', '', 'empty', 'no', 'no one yet', '2016-10-18 14:41:59', 0),
(171, 'bdjvb', 'jskbjv', 'jdbvj', 'jbdjvb', 'jbdjv', 'jbdvb', 'empty', 'no', 'no one yet', '2016-10-26 08:24:13', 0),
(172, 'jkbfvjk', 'jkfbv', 'bdkjb', 'bvjbj', 'bdv', 'jbfjbj', '<p><span style="color: #ff6600;">hjbvsdhjbsdhvb</span></p>\n<p><span style="color: #ff6600;">skjbdvjkbsjv</span></p>\n<p><span style="color: #ff6600;">nsjkfvbjsbjv</span></p>', 'no', 'no one yet', '2016-10-26 08:37:36', 0),
(173, 'pojaf', 'paojsd', 'pojasf', 'opjf', 'pojsf', 'pojasf', '<p>&nbsp;An</p>', 'no', 'no one yet', '2016-10-31 12:40:18', 0),
(174, 'jbdvjb', 'jsdbvj', 'jbdvjbj', 'jbdjvb', 'jbdvj', 'sjdbv', '<p><span style="color: #ff9900;">hi how are you??</span></p>\n<p><span style="color: #ff9900;">are you still there?</span></p>', 'no', 'no one yet', '2016-11-16 09:38:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `msgforadmin`
--

CREATE TABLE `msgforadmin` (
  `u_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `replymsgfromuser` text NOT NULL,
  `new` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msgforadmin`
--

INSERT INTO `msgforadmin` (`u_id`, `name`, `email`, `message`, `msg_date`, `replymsgfromuser`, `new`) VALUES
(45, 'erfan ', 'ea_pain@yahoo.com', 'hello there how are you admin\r\nwhat are you doing?', '2016-09-23 18:22:15', '', 'N'),
(47, 'erfan', 'ea_pain@yahoo.com', 'bSDJbvjsbduvgufsdbrugvusidgvbew', '2016-09-23 18:26:52', '', 'N'),
(48, 'erfan', 'ea_pain@yahoo.com', 'iuwerhiuwyueiyleryuyreuw', '2016-09-23 18:27:43', '', 'N'),
(67, 'erfan', 'ea_pain@yahoo.com', 'ndvjjsfhvbjfdbv', '2016-09-29 14:40:02', '', 'N'),
(68, 'erfan', 'ea_pain@yahoo.com', 'ndvjjsfhvbjfdbv', '2016-09-29 14:43:54', '', 'N'),
(69, 'erfan', 'ea_pain@yahoo.com', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiii', '2016-10-22 15:38:17', '', 'N'),
(70, 'erfan', 'ea_pain@yahoo.com', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiii', '2016-10-22 15:42:42', '', 'N'),
(71, 'erfan', 'ea_pain@yahoo.com', 'hello there', '2016-10-26 08:39:57', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `msgfromadmin`
--

CREATE TABLE `msgfromadmin` (
  `m_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `message` text NOT NULL,
  `havenewitem` varchar(100) NOT NULL DEFAULT 'no',
  `replymsgfromadmin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msgfromadmin`
--

INSERT INTO `msgfromadmin` (`m_id`, `user_id`, `reg_date`, `message`, `havenewitem`, `replymsgfromadmin`) VALUES
(1, 1, '2016-09-04 20:02:41', '<p>hello erfan My name is Admin</p>\n<p>I wanna Block u!</p>', 'old', ''),
(2, 1, '2016-09-04 20:03:17', '<p>hello again .</p>', 'old', ''),
(3, 1, '2016-09-05 08:06:35', '<p>hey there ?&nbsp;</p>\n<p>Im a friend of admin&nbsp;</p>\n<p>he is worried about you</p>\n<p>where are you?</p>', 'old', ''),
(4, 1, '2016-09-05 08:51:15', '<p>usere an j bede</p>', 'old', ''),
(5, 1, '2016-09-05 09:10:56', '<p>look&nbsp;</p>\n<p>I know you''re angry with me!</p>\n<p>just please answer me!</p>', 'old', ''),
(6, 1, '2016-09-05 09:11:57', '<p>heyyyyyyyyyyyyyyyyyyyyyyyyyyy kose nanat j bd</p>', 'old', ''),
(7, 1, '2016-09-05 09:21:56', '<p><span style="color: #ff0000;">fuck u</span></p>', 'old', ''),
(8, 1, '2016-09-05 10:27:11', '<p>hello there agein !!!!!!</p>', 'old', ''),
(14, 1, '2016-09-05 21:04:15', '<p>salam erfan chetori?</p>', 'old', ''),
(17, 1, '2016-09-06 02:04:53', '<p>hi</p>\n<p>how are you doing?</p>', 'old', '<p>hello&nbsp;</p>'),
(18, 1, '2016-09-06 04:15:21', '<p>hey ? Im all yours! what?</p>', 'old', '<p>hey admin!</p>'),
(19, 1, '2016-09-06 09:34:47', '<p>what I answered you</p>', 'old', '<p>admin please answer me!</p>\n<p><strong>IM DAYING!</strong></p>'),
(20, 1, '2016-09-06 09:36:54', '<p>I wanna block you</p>', 'old', '<p>hey admin!</p>'),
(21, 1, '2016-09-06 11:56:25', '<p><span style="color: #000080;">agha chiz kooooooooooon mikham codeingniter ro shoro konam!!</span></p>', 'old', ''),
(22, 1, '2016-09-06 12:03:47', '<p>dekiiiiiiii</p>', 'old', '<p>khoo be anam shoro kon&nbsp;</p>'),
(23, 1, '2016-09-11 09:05:26', '<p><span style="color: #99cc00;">kose nane khodet!!!</span></p>', 'old', '<p><span style="color: #ff0000;">admin kose nanat!@!!!</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` text,
  `address` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `accessing_status` varchar(255) NOT NULL DEFAULT 'UB',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `psalt` text NOT NULL,
  `tokenCode` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `user_pic` text NOT NULL,
  `exp_date` timestamp NULL DEFAULT NULL,
  `exp_date_status` varchar(255) NOT NULL DEFAULT 'not yet'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstname`, `lastname`, `gender`, `address`, `dob`, `accessing_status`, `reg_date`, `email`, `username`, `password`, `psalt`, `tokenCode`, `userStatus`, `user_pic`, `exp_date`, `exp_date_status`) VALUES
(16, 'erfan', 'kheibari', 'female', 'UMZ', '2016-11-14', 'UB', '2016-11-10 09:38:22', 'ea_pain@yahoo.com', 'erfan', '8b3e030afd61d8801ef2f64075c5ba7e65dd78252237f44aae180b4ec613cebc', '5166aa8d37fd68fe', '4cb84e01cd635861423ea992c44d91ae', 'Y', 'ccdb645db015d35145570762cc8d9cc6.jpg', '2016-12-10 09:38:22', 'not yet');

-- --------------------------------------------------------

--
-- Table structure for table `tempadminmsg`
--

CREATE TABLE `tempadminmsg` (
  `tempmsg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempadminmsg`
--

INSERT INTO `tempadminmsg` (`tempmsg`) VALUES
('<p>dekiiiiiiii</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tempemailforeditlyrics`
--

CREATE TABLE `tempemailforeditlyrics` (
  `tempemailedit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempemailforeditlyrics`
--

INSERT INTO `tempemailforeditlyrics` (`tempemailedit`) VALUES
('ea_pain@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tempemailforlyrics`
--

CREATE TABLE `tempemailforlyrics` (
  `tempemail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempemailforlyrics`
--

INSERT INTO `tempemailforlyrics` (`tempemail`) VALUES
('ea_pain@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tempid`
--

CREATE TABLE `tempid` (
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempid`
--

INSERT INTO `tempid` (`user_id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `tempidforadminseeeditedlyrics`
--

CREATE TABLE `tempidforadminseeeditedlyrics` (
  `tempid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempidforadminseeeditedlyrics`
--

INSERT INTO `tempidforadminseeeditedlyrics` (`tempid`) VALUES
(108);

-- --------------------------------------------------------

--
-- Table structure for table `tempidforadminseelyrics`
--

CREATE TABLE `tempidforadminseelyrics` (
  `tempid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempidforadminseelyrics`
--

INSERT INTO `tempidforadminseelyrics` (`tempid`) VALUES
(108);

-- --------------------------------------------------------

--
-- Table structure for table `tempidforadminseetranslatedlyrics`
--

CREATE TABLE `tempidforadminseetranslatedlyrics` (
  `tempid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempidforadminseetranslatedlyrics`
--

INSERT INTO `tempidforadminseetranslatedlyrics` (`tempid`) VALUES
(108);

-- --------------------------------------------------------

--
-- Table structure for table `tempidformsg`
--

CREATE TABLE `tempidformsg` (
  `tempidmsg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempidformsg`
--

INSERT INTO `tempidformsg` (`tempidmsg`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `tempidlyrics`
--

CREATE TABLE `tempidlyrics` (
  `tempid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempidlyrics`
--

INSERT INTO `tempidlyrics` (`tempid`) VALUES
(174);

-- --------------------------------------------------------

--
-- Table structure for table `templyricsidforedit`
--

CREATE TABLE `templyricsidforedit` (
  `tempidedit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templyricsidforedit`
--

INSERT INTO `templyricsidforedit` (`tempidedit`) VALUES
(108);

-- --------------------------------------------------------

--
-- Table structure for table `tempnameofmusic`
--

CREATE TABLE `tempnameofmusic` (
  `name_of_music` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempnameofmusic`
--

INSERT INTO `tempnameofmusic` (`name_of_music`) VALUES
('sskldnv');

-- --------------------------------------------------------

--
-- Table structure for table `tempuseremail`
--

CREATE TABLE `tempuseremail` (
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempuseremail`
--

INSERT INTO `tempuseremail` (`email`) VALUES
('ea_pain@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `tempusermsg`
--

CREATE TABLE `tempusermsg` (
  `tempmsg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempusermsg`
--

INSERT INTO `tempusermsg` (`tempmsg`) VALUES
('<p><span style="color: #ff0000;">admin kose nanat!@!!!</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `temp_admin_email`
--

CREATE TABLE `temp_admin_email` (
  `tempemail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_admin_email`
--

INSERT INTO `temp_admin_email` (`tempemail`) VALUES
('ea_pain@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `translateby`
--

CREATE TABLE `translateby` (
  `u_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name_of_music_that_translated_by_user` varchar(200) NOT NULL,
  `translate_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `translateby`
--

INSERT INTO `translateby` (`u_id`, `user_name`, `email`, `name_of_music_that_translated_by_user`, `translate_date`) VALUES
(17, 'erfan arefi', 'ea_pain@yahoo.com', 'Hello Adele', '2016-09-12 19:43:48'),
(18, 'erfan arefi', 'ea_pain@yahoo.com', 'sskldnv', '2016-09-13 16:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `useraccepttranslate`
--

CREATE TABLE `useraccepttranslate` (
  `u_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `psalt` text NOT NULL,
  `accessing_status` varchar(100) DEFAULT 'unblocked',
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccepttranslate`
--

INSERT INTO `useraccepttranslate` (`u_id`, `user_name`, `email`, `password`, `psalt`, `accessing_status`, `userStatus`, `tokenCode`, `reg_date`) VALUES
(1, 'erfan arefi', 'ea_pain@yahoo.com', '2a15ac4e19c409d0b63216364eed5ee786cf92e7aaedd6087cd8885c5656ce07', '5fb5086a4dcc62ba', 'unblocked', 'Y', '8969a3b1a3aabf4c8a8c5bad5ada40b4', '2016-09-02 18:13:37'),
(5, 'ali', 'erfan_arefi@yahoo.com', '7e8446484e3e679f88f57a2bb5234509cceb71785b51d07d6d757a421f5fd6c4', '52593ea86474bf9', 'blocked', 'N', '9f53a0126b8d96be27880d05147714c7', '2016-09-02 18:21:31'),
(6, 'reza', 'reza_es@yahoo.com', '53df7a08a0bc3ce221c628d944855113b7d2fd433197cd08dbaf1705d7066cd2', '27032a4676cfda5a', 'blocked', 'N', 'e522c8628b80c1ff7a1f6e0ad1b6fe52', '2016-09-02 18:28:04'),
(7, 'ahmad', 'ah_shar@yahoo.com', 'd11813f1c285c409c4eba49862844d0a694250af741e15f41f5d7ac1f46bbefa', '5a1a34351941206b', 'unblocked', 'N', 'ca306b82fa97226b84f3d010a0a28148', '2016-09-02 18:28:34'),
(8, 'negar', 'neg_moh@yahoo.com', 'b651943cbd1391b89e043aa3697dab603feac05ad3ff8554526e3c54afc20b49', '2589469f7e3e6deb', 'unblocked', 'N', '2ef797d88b62968128fdfecc7fd5d4b4', '2016-09-02 18:29:17'),
(9, 'mina', 'mina_khei@yahoo.com', '7eed4663d2e7f5774d6d41757b50613d8d5b77809aa4da736389ca82146e699b', '74b84dc61b5c12b3', 'unblocked', 'N', 'f46688448877c8e2953687a82ea67b46', '2016-09-02 18:29:49'),
(10, 'amir', 'amir_baba@yahoo.com', '00fee401fbe12ac340388c5f45c7acb5ca379129dc06625743f42c7aa71a27e4', '319ad3362ee06599', 'unblocked', 'N', '1eeec7c54cade433fff767d22e830a41', '2016-09-02 18:30:13'),
(11, 'shayan', 'shayan_vali@yahoo.com', '50ceb4d965b251cd7cab5ef2c8248688051087b5d829d4cd8ce91b8436f8c819', '49ff5ec1168a0329', 'unblocked', 'N', '40402cbbb38c0a5636f1543298c14e7d', '2016-09-02 18:31:28'),
(12, 'parsa', 'pari_esk@yahoo.com', 'b825fa5e12f36ded6e07985be4357b5a5c3de45caae8a68492be354b343892b4', '4df190c672aba636', 'unblocked', 'N', '424ae157c462a7e866d82c2c6c7df9fb', '2016-09-02 18:31:46'),
(13, 'sabze', 'sabzeh_mei@yahoo.com', 'ddc9d40b8e9160316fe5a921d19c954c9504cad83a87e08cff4eeb5edd158043', '57c6c38d1dd534ef', 'unblocked', 'N', '057a79f453690c15d46ce6fb9c49a43e', '2016-09-02 18:32:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `ipaddress_likes_map`
--
ALTER TABLE `ipaddress_likes_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lyrics`
--
ALTER TABLE `lyrics`
  ADD PRIMARY KEY (`l_id`),
  ADD UNIQUE KEY `name_of_music` (`name_of_music`);

--
-- Indexes for table `msgforadmin`
--
ALTER TABLE `msgforadmin`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `msgfromadmin`
--
ALTER TABLE `msgfromadmin`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translateby`
--
ALTER TABLE `translateby`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `useraccepttranslate`
--
ALTER TABLE `useraccepttranslate`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ipaddress_likes_map`
--
ALTER TABLE `ipaddress_likes_map`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `lyrics`
--
ALTER TABLE `lyrics`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
--
-- AUTO_INCREMENT for table `msgforadmin`
--
ALTER TABLE `msgforadmin`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `msgfromadmin`
--
ALTER TABLE `msgfromadmin`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `translateby`
--
ALTER TABLE `translateby`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `useraccepttranslate`
--
ALTER TABLE `useraccepttranslate`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
