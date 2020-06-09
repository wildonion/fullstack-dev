
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 27, 2016 at 11:38 AM
-- Server version: 5.1.73
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u800459435_movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `psalt` text NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `psalt`, `reg_date`) VALUES
(9, 'ea_pain@yahoo.com', '0a431451661d01b3c41a4c1dae8580a8f9fa14f3a006270de4c7ea9c926dcc9f', 'gr6x1uuVtIulzllHIigS', '2016-04-13 12:39:45'),
(11, 'mohammad_gol@yahoo.com', '3b313b564ebde2cff33749d806e922bed41fe381348803173048383a34199254', 'P5siJVwN4GQvioFYXXMm', '2016-04-14 08:32:51'),
(10, 'assa_malahi@yahoo.com', 'f19dfbdf9b2ae84ebb8c47dba0be0bf286951c6692c20849a74899d87412ca9c', 'Bf1PugIRvtFioIwCP3OK', '2016-04-13 13:59:35'),
(12, 'amir_baba@yahoo.com', 'a016b80b23810904ac71c40b0347f0b2fe3b1c41aafd3fa39d104ec3210f8625', 'uqrsbAwZxkSDXsmkHb5a', '2016-04-16 07:54:20'),
(13, 'ali_es@yahoo.com', '01f804e7c205b5948d841075429a86dae73762e89575ee3ebf2d22d38452bdac', 'tSH7sCstwbZYtviuofLl', '2016-05-02 04:31:37'),
(16, 'mhsa_mir@yahoo.com', 'a3b98c7667da10e54a16e2058458fbc628c8ad247023e41c45e84150731727b6', 'nu1oTnNQb2dnrYdoFT7L', '2016-05-08 11:48:09'),
(15, 'rasol_af@yahoo.com', 'a7c0d8e72f1ec44102bcc49e3afba140f0a19902a98a7372cee64fd040b1f169', '1GKX7iESlvqR7Psp1l6B', '2016-05-08 11:47:12'),
(17, 'mahsa_mirz@yahoo.com', '4ae2c0e03de6ea3499a71422f99147ba1e55ab889935d48191a27232a0f8aa56', 'yCvtSBVYynPaYVDWaJgj', '2016-05-08 11:54:03'),
(18, 'amir_babarahim@yahoo.com', '0057d70ae42b040557cb8cef28bf49c20abad814a016aa324c9704eb15401f0e', 'lCbgj0cFat6xdzu1iCcg', '2016-05-13 07:57:00'),
(19, 'mohamad_reza@yahoo.com', '29ac7dd44a5f514c9f65bd6c90575a8e61acb01e5e41a54e0970d1396720fcfb', '3e1lTusI4cHLKJDlVLH7', '2016-05-13 08:00:59'),
(20, 'shayan_vali@yahoo.com', '279ed739263c3a835b4925b4ae463ecdf26bab6908c6e6fc6211e92927b6e364', 'uI32dc4qg1ngsYlunY1K', '2016-05-13 08:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `aodsite`
--

CREATE TABLE IF NOT EXISTS `aodsite` (
  `stext` varchar(100) NOT NULL,
  `simg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `c_id` int(10) DEFAULT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_message` text NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c_status` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `havenewitem` varchar(100) DEFAULT 'new',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `c_name`, `c_email`, `c_message`, `c_date`, `c_status`, `uid`, `havenewitem`) VALUES
(14, 'mahsa', 'mahsa_mir@yahoo.com', 'WOoooooi!', '2016-05-04 17:45:58', 1, 2, NULL),
(30, 'rasol', 'rasol_abbs@yahoo.com', 'hey guys I wanna download this movie how is it! [edited by admin]', '2016-05-05 07:16:06', 1, 3, NULL),
(20, 'Erfan', 'ea_pain@yahoo.com', 'hi shit movie!', '2016-05-05 20:25:17', 1, 4, NULL),
(30, 'mahsa', 'mahsa_mir@yahoo.com', 'Ooh yeah Awesome!', '2016-05-06 19:29:14', 1, 5, NULL),
(15, 'Erfan', 'ea_pain@yahoo.com', 'NICE!', '2016-05-07 07:36:42', 1, 6, NULL),
(19, 'Erfan', 'ea_pain@yahoo.com', 'hey guys this is an awesome movie[edited by admin]', '2016-05-07 11:37:03', 1, 7, NULL),
(22, 'reza', 'reza_ah@yahoo.com', 'hi how is it?', '2016-05-07 13:41:52', 1, 8, NULL),
(14, 'Erfan', 'ea_pain@yahoo.com', 'hi what is up?\r\n', '2016-05-08 11:00:21', 1, 9, NULL),
(14, 'Erfan', 'ea_pain@yahoo.com', 'do not shit in database please!', '2016-05-13 08:31:08', 1, 10, NULL),
(21, 'Erfan', 'ea_pain@yahoo.com', 'hello guys I wanna tell you guys something\r\nthis movie ... wait for it.... aha.. \r\nis fucking .... Ooh what am I saying ?!... is \r\nawesome', '2016-05-20 18:19:44', 1, 13, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE IF NOT EXISTS `hits` (
  `page` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`page`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`page`, `count`) VALUES
('default.php', 64),
('search.php', 9);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `movie_id` int(10) NOT NULL AUTO_INCREMENT,
  `movie_name` varchar(100) NOT NULL,
  `movie_keyword` varchar(100) NOT NULL,
  `movie_description` text NOT NULL,
  `movie_img` text NOT NULL,
  `movie_director` varchar(100) NOT NULL,
  `movie_actors` text NOT NULL,
  `movie_genre` varchar(100) NOT NULL,
  `movie_year` varchar(100) NOT NULL,
  `movie_rating` varchar(100) NOT NULL,
  `movie_lang` varchar(100) NOT NULL,
  PRIMARY KEY (`movie_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `movie_name`, `movie_keyword`, `movie_description`, `movie_img`, `movie_director`, `movie_actors`, `movie_genre`, `movie_year`, `movie_rating`, `movie_lang`) VALUES
(9, 'Southpaw', 'southpaw', 'Boxer Billy Hope turns to trainer Tick Willis to help him get his life back on track after losing his wife in a tragic accident and his daughter to child protection services.', 'southpaw-2015-large.jpg', 'Antoine Fuqua', 'Rachel McAdams,\r\nJake Gyllenhaal,\r\nForest Whitaker, \r\nOona Laurence, ', 'Action | Drama', '2015', '7.6', 'English'),
(13, 'Red Riding Hood ', 'fantasy - horror', 'Set in a medieval village that is haunted by a werewolf, a young girl falls for an orphaned woodcutter, much to her familys displeasure.', 'Red-Riding-Hood-2011-large.png', 'Catherine Hardwicke', 'Billy Burke - \r\nLukas Haas - \r\nGary Oldman - \r\nAmanda Seyfried', ' Fantasy | Horror', '2011', '5.2', 'English'),
(14, 'Final Fantasy VII Advent Children DIRECTORS CUT', 'animation - action', 'An ex-mercenary is forced out of isolation when three mysterious men kidnap and brainwash the citys children afflicted with the Geostigma disease.', 'Final-Fantasy-VII-Advent-Children-DIRECTORS-CUT-2005-1080p-large.jpg', 'Takeshi Nozue - Tetsuya Nomura', 'Maaya Sakamoto - \r\nShotaro Morikubo - \r\nAyumi Ito - \r\nTakahiro Sakurai', ' Animation | Action', '2005', '7.3', 'English'),
(15, 'Sinbad The Fifth Voyage', 'the fifth voyage - fantasy', 'When the Sultans first born is taken by an evil sorcerer, Sinbad is tasked with traveling to a desert of magic and creatures to save her.', 'Sinbad-The-Fifth-Voyage-2014-large.jpg', 'Shahin Sean Solimon', 'Isaac C. Singleton Jr. -\r\nMarco Khan - \r\nLorna Raver -  \r\nPatrick Stewart', ' Fantasy | ', '2014', '5.8', 'English'),
(16, 'Merlin and the Book of Beasts', 'fantasy - thriller ', 'Sorcerer Arkadian has taken over Camelot with a zoo of beasts from his magical book. King Arthurs daughter Avlynn asks Merlin to help her take back Camelot. She also has to find the sacred....', 'merlin-and-the-book-of-beasts-2009-720p-large.jpg', 'Warren P. Sonoda', 'Laura Harris -\r\nJesse Moss -\r\nJames Callis', 'Fantasy | Thriller', '2009', '3.8', 'English'),
(17, 'Ravenous', 'fantacy - horror', 'In a remote military outpost in the 19th Century, Captain John Boyd and his regiment embark on a rescue mission which takes a dark turn when they are ambushed by a sadistic cannibal.', 'ravenous-1999-720p-large.jpg', 'Antonia Bird', 'David Arquette -\r\nRobert Carlyle -\r\nGuy Pearce', ' Fantasy | Horror', '1999', '7.1', 'English'),
(18, 'The Hunger Games: Mockingjay - Part 2', 'adventure - sci-fi  ', 'After young Katniss Everdeen agrees to be the symbol of rebellion, the Mockingjay, she tries to return Peeta to his normal state, tries to get to the Capitol, and tries to deal with the battles coming her way...but all for her main goal; assassinating President Snow and returning peace to the Districts of Panem. As her squad starts to get smaller and smaller, will she make it to the Capitol? Will she get revenge on Snow? Or will her target change? Will she be with her "Star-Crossed Lover", Peeta? Or her long time friend, Gale? Deaths, Bombs, Bows and Arrows, A Love Triangle, Hope. What will happen? ', '118469.jpg', 'Francis Lawrence', 'Jennifer Lawrence -\r\nJena Malone -\r\nNatalie Dormer -  \r\nJosh Hutcherson  \r\n', 'Adventure | Sci-Fi   ', '2015', '6.9', 'English'),
(19, 'Dead Rising: Watchtower', 'action - horror - thriller ', 'A group of people fight to survive in a zombie infested town. ', '84050.jpg', 'Zach Lipovsky', 'Jesse Metcalfe - \r\nMeghan Ory -\r\nVirginia Madsen -\r\nKeegan Connor Tracy ', 'Action | Horror | Thriller', '2015', '5.2', 'English'),
(20, 'We Are the Night', ' drama - dantasy - horror - romance', 'The vampires Louise, Charlotte and Nora arrive in Berlin after attacking the passengers and crew of an airplane in a flight to Paris. The leader Louise has been looking for centuries for her missed love and Charlotte misses her daughter that she saw in 1923 for the last time. Meanwhile, the smalltime pickpocket Lena steals a Russian mobster and is chased by Detective Tom. When Lena goes to a nightclub, the lesbian Louise believes that Lena is the love of her life and transforms her into a vampire. Lena initially feels lost with the transformation, but sooner she joins the trio of vampires in their nightlife. When the pack of vampires attacks a group of criminals, the police department investigates the case and hunts the women without knowing the risks that they are taking. Meanwhile the lonely Tom and the Lena fall in love with each other but the unrequited love of Louise for Lena jeopardizes the couple.', 'we-are-the-night-2010-movie-poster.jpg', 'Dennis Gansel', 'Karoline Herfurth, Nina Hoss, Jennifer Ulrich, Anna Fischer, Max Riemelt, Arved Birnbaum, Steffi KÃ¼hnert, Jochen Nickel, Ivan Shvedoff, Nic Romm', '     Drama | Fantasy | Horror | Romance', '2010', '6.3', 'German'),
(21, 'Forsaken', 'drama - western', 'John Henry returns to his hometown in hopes of repairing his relationship with his estranged father, but a local gang is terrorizing the town. John Henry is the only one who can stop them, however he has abandoned both his gun and reputation as a fearless quick-draw killer.', 'forsaken-2015-movie-poster.jpg', 'Jon Cassar', 'Kiefer Sutherland, Donald Sutherland, Brian Cox, Michael Wincott, Aaron Poole, Demi Moore, Jonny Rees, Dylan Smith, Landon Liboiron, Brock Morgan', '    Drama | Western', '2015', '6.4', 'English'),
(22, '#Horror ', 'drama - horror - mystery - thriller', '#HORROR is a film about the lives of six young women, Sam, Georigie, Sofia, Francesca, Cat and Eva played by our young ensemble of emerging actresses. Their world is one of money, success, ease and decadence. This is a film about the HORROR of cyberbullying. This film is a integral insight on the pressure that girls take on as they grow in a world that is increasingly dependent on the promotion and attention that social media platforms provide yet prevent bullying. as well as the roles that parents must play regarding controlling their childs use of the internet and bullying plays such a terrifying role in society. These young woman are telling this story inside a glass mansion, filled with millions of dollars of artwork, as if they were living in a contemporary museum with artworks including works by Urs Fischer, Rob Pruitt, Dan Colen, Franz West, Steven Shearer.', 'horror-2015-movie-poster.jpg', 'Tara Subkoff', 'ChloÃ« Sevigny, Timothy Hutton, Balthazar Getty, Stella Schnabel, Sadie Seelert, Haley Murphy, Bridget McGarry, Blue Lindeberg, Mina Sundwall, Emma Adler', '	     Drama | Horror | Mystery | Thriller', '2015', '3.5', 'English'),
(24, 'In Her Shoes', 'comedy - drama - romance', 'Two sisters, plus a dead mother, a remarried father, and a hostile step-mother. The sisters, each in her way, have perfected the art of losing. The elder, Rose, is an attorney, responsible, lonely, with a closet full of shoes. The younger is Maggie, beautiful, selfish, and irresponsible. Her drunken behavior gets her tossed by her step-mother from her dads house worse behavior gets her tossed from Roses apartment. Then, while searching in her fathers desk for money to filch, Maggie finds an address the past and the future open up to her and, with any luck, may open to her sister as well.', 'in-her-shoes-2005-movie-poster.jpg', 'Curtis Hanson', 'Cameron Diaz, Anson Mount, Toni Collette, Richard Burgi, Candice Azzara, Brooke Smith, John Mastrangelo Sr., Emilio Mignucci, Mark Feuerstein', '    Comedy | Drama | Romance', '2005', '6.5', 'English'),
(25, 'Gone Girl', 'drama - mystery - thriller', 'On the occasion of his fifth wedding anniversary, Nick Dunne reports that his wife, Amy, has gone missing. Under pressure from the police and a growing media frenzy, Nicks portrait of a blissful union begins to crumble. Soon his lies, deceits and strange behavior have everyone asking the same dark question: Did Nick Dunne kill his wife?', 'gone-girl-2014-movie-poster.jpg', 'David Fincher', ' Ben Affleck, Rosamund Pike, Neil Patrick Harris, Tyler Perry, Carrie Coon, Kim Dickens, Patrick Fugit, David Clennon, Lisa Banes', '    Drama | Mystery | Thriller', '2014', '8.4', 'English'),
(26, 'Predestination', 'Sci-Fi - Thriller', 'PREDESTINATION chronicles the life of a Temporal Agent sent on an intricate series of time-travel journeys designed to ensure the continuation of his law enforcement career for all eternity. Now, on his final assignment, the Agent must pursue the one criminal that has eluded him throughout time.', 'predestination-2014-movie-poster.jpg', 'Michael Spierig, Peter Spierig', 'Ethan Hawke, Sarah Snook, Noah Taylor, Elise Jansen, Christopher Kirby, Freya Stafford, Cate Wolfe, Madeleine West, Alexis Fernandez', 'Sci-Fi | Thriller', '2014', '7.5', 'English'),
(27, 'Deadpool', '     action - adventure - comedy - sci-Fi', 'This is the origin story of former Special Forces operative turned mercenary Wade Wilson, who after being subjected to a rogue experiment that leaves him with accelerated healing powers, adopts the alter ego Deadpool. Armed with his new abilities and a dark, twisted sense of humor, Deadpool hunts down the man who nearly destroyed his life.', 'deadpool-2016-movie-poster.jpg', 'Tim Miller', ' Ryan Reynolds, Karan Soni, Ed Skrein, Michael Benyaer, Stefan Kapicic, Brianna Hildebrand, Style Dayne, Kyle Cassie, Taylor Hickson, Ayzee', 'Action | Adventure | Comedy | Sci-Fi', '2016', '8.3', 'English'),
(28, 'The Martian', 'adventure - drama - sci-Fi', 'During a manned mission to Mars, Astronaut Mark Watney is presumed dead after a fierce storm and left behind by his crew. But Watney has survived and finds himself stranded and alone on the hostile planet. With only meager supplies, he must draw upon his ingenuity, wit and spirit to subsist and find a way to signal to Earth that he is alive. Millions of miles away, NASA and a team of international scientists work tirelessly to bring "the Martian" home, while his crewmates concurrently plot a daring, if not impossible, rescue mission. As these stories of incredible bravery unfold, the world comes together to root for Watneys safe return.', 'the-martian-2015-movie-poster.jpg', 'Ridley Scott', 'Matt Damon, Jessica Chastain, Kristen Wiig, Jeff Daniels, Michael PeÃ±a, Sean Bean, Kate Mara, Sebastian Stan, Aksel Hennie, Chiwetel Ejiofor', ' Adventure | Drama | Sci-Fi', '2015', '8.1', 'English'),
(29, 'Jolene', 'jolene - drama', 'A teenage orphan spends ten years traveling cross-country experiencing life, love and heartbreak. Based on E.L. Doctorows story, "Jolene: A Life." ', 'jolene-2008-movie-poster.jpg', 'Dan Ireland', 'Jessica Chastain, Frances Fisher, Rupert Friend, Dermot Mulroney, Zeb Newman, Chazz Palminteri, Denise Richards, Theresa Russell, Michael Vartan, Shannon Whirry', 'Drama', '2008', '6.5', 'English'),
(30, 'Wild Card', 'wild card - action - crime - drama - hriller', 'When a Las Vegas bodyguard with lethal skills and a gambling problem gets in trouble with the mob, he has one last play...and its all or nothing.', 'wild-card-2015-movie-poster.jpg', 'Simon West', 'Jason Statham, Michael Angarano, Dominik GarcÃ­a-Lorido, Hope Davis, Milo Ventimiglia, Max Casella, Stanley Tucci, Jason Alexander, SofÃ­a Vergara, Anne Heche', 'Action | Crime | Drama | Thriller', '2015', '5.6', 'English'),
(31, 'Zoolander 2', 'zoolander 2 -comedy   ', 'Derek and Hansel are lured into modeling again, in Rome, where they find themselves the target of a sinister conspiracy. ', '127801.jpg', 'Ben Stiller', 'Olivia Munn, Benedict Cumberbatch, Justin Theroux, PenÃ©lope Cruz', 'Comedy |', '2016', '5.0', 'English'),
(32, 'The Revenant', 'the revenant - adventure - drama - thriller ', 'While exploring the uncharted wilderness in 1823, legendary frontiersman Hugh Glass sustains injuries from a brutal bear attack. When his hunting team leaves him for dead, Glass must utilize his survival skills to find a way back home while avoiding natives on their own hunt. Grief-stricken and fueled by vengeance, Glass treks through the wintry terrain to track down John Fitzgerald, the former confidant who betrayed and abandoned him. ', '127833.jpg', 'Alejandro GonzÃ¡lez IÃ±Ã¡rritu', 'Tom Hardy, Leonardo DiCaprio, Domhnall Gleeson, Will Poulter', 'Adventure | Drama | Thriller  ', '2015', '8.2', 'English'),
(33, 'The Finest Hours', 'the finest hours - action -history - thriller', 'In February of 1952, one of the worst storms to ever hit the East Coast struck New England, damaging an oil tanker off the coast of Cape Cod and literally ripping it in half. On a small lifeboat faced with frigid temperatures and 70-foot high waves, four members of the Coast Guard set out to rescue the more than 30 stranded sailors trapped aboard the rapidly-sinking vessel.', 'the-finest-hours-2016-movie-poster.jpg', 'Craig Gillespie', 'Chris Pine, Casey Affleck, Ben Foster, Eric Bana, Holliday Grainger, John Ortiz, Kyle Gallner, John Magaro, Graham McTavish, Michael Raymond-James', '     Action | Drama | History | Thriller', '2016', '6.8', 'English'),
(34, 'Triple 9', 'triple 9 - action - crime - drama - thriller', 'In TRIPLE 9, a crew of dirty cops is blackmailed by the Russian mob to execute a virtually impossible heist. The only way to pull it off is to manufacture a 999, police code for "officer down". Their plan is turned upside down when the unsuspecting rookie they set up to die foils the attack, triggering a breakneck, action-packed finale filled with double-crosses, greed and revenge.', 'triple-9-2016-movie-poster.jpg', 'John Hillcoat', 'Chiwetel Ejiofor, Casey Affleck, Anthony Mackie, Woody Harrelson, Aaron Paul, Kate Winslet, Gal Gadot, Norman Reedus, Teresa Palmer, Michael Kenneth Williams', 'Action | Crime | Drama | Thriller', '2016', '6.4', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `psetting`
--

CREATE TABLE IF NOT EXISTS `psetting` (
  `p_footer` varchar(100) NOT NULL,
  `p_title` varchar(100) NOT NULL,
  `p_footercol` text NOT NULL,
  `p_footersize` int(3) DEFAULT NULL,
  `p_footerlogo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `psetting`
--

INSERT INTO `psetting` (`p_footer`, `p_title`, `p_footercol`, `p_footersize`, `p_footerlogo`) VALUES
('Â© Copy Right | EA 2016\r\n', 'MAHSAMDB', '#ffff00', 180, 'movie_central.png');

-- --------------------------------------------------------

--
-- Table structure for table `tempid`
--

CREATE TABLE IF NOT EXISTS `tempid` (
  `ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempid`
--

INSERT INTO `tempid` (`ID`) VALUES
(25);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_info`
--

CREATE TABLE IF NOT EXISTS `visitor_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `user_agent` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `time_accessed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=74 ;

--
-- Dumping data for table `visitor_info`
--

INSERT INTO `visitor_info` (`id`, `ip_address`, `user_agent`, `time_accessed`) VALUES
(1, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-14 19:46:22'),
(2, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-14 19:48:40'),
(3, '78.38.84.159', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-15 08:13:59'),
(4, '37.114.206.10', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-15 08:16:24'),
(5, '37.114.206.10', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-15 08:20:51'),
(6, '78.38.84.159', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-15 08:27:21'),
(7, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-15 17:30:49'),
(8, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-15 17:58:29'),
(9, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-15 18:01:35'),
(10, '37.156.53.50', 'Mozilla/5.0 (Linux; Android 4.3; HTC Desire 516 dual sim Build/JWR66Y) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobile Safari/537.36', '2016-05-16 13:06:46'),
(11, '37.156.53.50', 'Mozilla/5.0 (Linux; Android 4.3; HTC Desire 516 dual sim Build/JWR66Y) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobile Safari/537.36', '2016-05-16 13:12:21'),
(12, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-16 15:44:27'),
(13, '188.210.132.111', 'Mozilla/5.0 (Linux; Android 6.0.1; HTC One_E8 dual sim Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-16 16:16:35'),
(14, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-16 16:34:01'),
(15, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-16 16:34:30'),
(16, '188.210.132.111', 'Mozilla/5.0 (Linux; Android 6.0.1; HTC One_E8 dual sim Build/MMB29M) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-16 16:37:06'),
(17, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-16 16:39:24'),
(18, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-17 16:44:01'),
(19, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:21:39'),
(20, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:21:47'),
(21, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:22:19'),
(22, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:24:35'),
(23, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:26:13'),
(24, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:26:14'),
(25, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:26:23'),
(26, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:26:37'),
(27, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:26:52'),
(28, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:26:59'),
(29, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:27:08'),
(30, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:27:29'),
(31, '31.57.125.126', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-18 14:28:01'),
(32, '95.82.101.187', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-19 19:32:33'),
(33, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 05:39:10'),
(34, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 08:12:13'),
(35, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 08:26:31'),
(36, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 08:26:47'),
(37, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 08:39:48'),
(38, '46.143.63.171', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-20 11:15:56'),
(39, '46.143.63.171', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', '2016-05-20 11:16:35'),
(40, '51.254.210.85', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-20 12:27:31'),
(41, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 12:51:45'),
(42, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 12:52:50'),
(43, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 13:08:45'),
(44, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 13:09:25'),
(45, '37.137.250.227', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 17:19:01'),
(46, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 17:24:30'),
(47, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 17:24:43'),
(48, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 17:26:40'),
(49, '31.57.105.23', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-20 17:26:42'),
(50, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 17:27:42'),
(51, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 17:28:27'),
(52, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 17:29:30'),
(53, '31.57.105.23', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-20 17:30:23'),
(54, '31.57.105.23', 'Mozilla/5.0 (Linux; Android 4.4.2; Hol-U19 Build/HUAWEIHol-U19) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.105 Mobile Safari/537.36', '2016-05-20 17:30:31'),
(55, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 17:48:55'),
(56, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 17:51:54'),
(57, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 18:09:23'),
(58, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 18:10:59'),
(59, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 18:17:58'),
(60, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 18:19:54'),
(61, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 18:21:13'),
(62, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-20 18:34:12'),
(63, '89.34.38.240', 'Mozilla/5.0 (Linux; Android 4.3; HTC Desire 516 dual sim Build/JWR66Y) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobile Safari/537.36', '2016-05-21 05:56:19'),
(64, '5.72.190.148', 'Mozilla/5.0 (Linux; Android 4.3; HTC Desire 516 dual sim Build/JWR66Y) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobile Safari/537.36', '2016-05-21 06:46:28'),
(65, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-21 13:13:23'),
(66, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-27 14:53:35'),
(67, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-27 14:54:39'),
(68, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-27 14:57:49'),
(69, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-27 14:58:43'),
(70, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-27 15:00:49'),
(71, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-27 15:05:11'),
(72, '37.114.206.10', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-27 15:22:26'),
(73, '78.38.84.44', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:44.0) Gecko/20100101 Firefox/44.0', '2016-05-27 15:24:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
