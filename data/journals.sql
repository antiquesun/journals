-- Database: `silis_journals`
--
CREATE DATABASE `journals` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `journals`;

-- --------------------------------------------------------

--
-- Table structure for table `Blogs`
--

CREATE TABLE IF NOT EXISTS `Blogs` (
  `blog_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(5) unsigned zerofill NOT NULL DEFAULT '00000',
  `title` varchar(200) NOT NULL DEFAULT '',
  `summary` mediumtext NOT NULL,
  `body` longtext NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Blogs`
--

INSERT INTO `Blogs` (`blog_id`, `account_id`, `title`, `summary`, `body`, `created`, `updated`, `deleted`) VALUES
(4, 00001, 'Our Family Archives', 'An introduction to our new site', '[Let''s fill this in here]\r\n', '2008-07-23 21:40:08', '2008-08-09 21:28:05', 1),
(5, 00001, 'The Year in Review: A perspective from the California Blodgetts', '2008 was, well, just a tough year - but will be remembered for its highs and lows.  ', '<img src="../../js/tinymce/jscripts/tiny_mce/plugins/emotions/images/smiley-cool.gif" border="0" alt="Cool" title="Cool" />I wanted to start adding in some memories from the year and capture as much as I can remember for the years ahead.&nbsp; I may not get this in one sitting, but I will add on as necessary.but seriously\r\n', '2009-01-07 17:14:16', '2009-09-19 21:15:42', 1),
(6, 00001, 'Blodge Goes to Stockholm', 'I had the opportunity to go to Sweden for a business trip and saw a whole different world for a week.', 'Hold this one\r\n', '2009-09-19 21:13:05', '2009-12-16 20:31:49', 1),
(7, 00001, 'Work is over...', 'Free from the jobs for a bit, we can turn our attention to trying to relax.', '<p>\r\nHi All - \r\n</p>\r\n<p>\r\nWe have reached the end of the week and are glad to be free from work; Lyn is done with her job with no plan now to return and I am taking next week off and may do so the following week.&nbsp; Today, Lyn is feeling OK but it appears that she is sick with a sore throat and congestion.&nbsp; That was something the doctor and we wanted to avoid.&nbsp; She is resting now and will be drinking fluids and Emergen-C to counter it as much as possible.\r\n</p>\r\n<p>\r\nWe feel pretty prepared now due to the false alarm earlier this week (14/15th).&nbsp; She thought that she was going into labor because of some intese contractions and the hormones kicking in.&nbsp; She ended up taking Children''s Tylenol and this helped to soothe things a bit and stop the contractions - I think maybe she was doing quite a bit to wrap things up.&nbsp; At the least, it made us realize we did not have the bags ready to go to the hospital or all the granular details tied off. &nbsp;\r\n</p>\r\n<p>\r\nMonica should arrive on the 22nd due to the storm and Ariston will follow.&nbsp; We are planning to have a Christmas gathering if it seems appropriate and that will bring Amanda and Joe into the mix.\r\n</p>\r\n<p>\r\nGetting close! \r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n', '2009-12-19 13:54:39', '2010-02-19 08:46:30', 0),
(8, 00001, 'Status Quo', 'So far...things are pretty quiet', '<p>\r\nMonica and Ariston arrived yesterday and are staying with us for the time being until the baby comes.&nbsp; Amanda, Matthew, Joe and Kat came over in the afternoon and we had a large feast of Zachary''s, wine, beer, pie and other goodies.\r\n</p>\r\n<p>\r\nLyn is feeling fine and we are now going beyond the due date; she has an appointment tomorrow with a doctor from her clinic.&nbsp; Unfortunately, as we are having our daughter near the holidays, we are without our primary doctor as it was with Calin.&nbsp;&nbsp;\r\n</p>\r\n<p>\r\nIt has been nice to see family and to take a breather from work.\r\n</p>\r\n', '2009-12-23 14:52:44', '2009-12-23 14:52:44', 0),
(9, 00001, 'Natalya is Home', 'We are now on our fifth day with Natalya and we are all getting settled in with a family of four.', '<p>\r\n<strong>At the Hospital</strong>\r\n</p>\r\n<p>\r\nNatalya was born on December 26th at 10:16 AM.&nbsp; Lyn was amazing!&nbsp; Early in the morning (around 4) she said that the contractions were becomming stonger and she felt that there was a steady increase in the intervals and intensity. We left the house and arrived at the hospital around 8, did our time in triage where she was found to be 3.5 centimeters dialated, and taken to the delivery room.&nbsp; By this time, Lyn was having to take things pretty slow and stop when contractions came.\r\n</p>\r\n<p>\r\nOnce in the room, (around 8:45), things started moving very quickly.&nbsp; The next check found her at 7 cms and the nurse raised the flag to get the doctor in.&nbsp; Because we choose to have babies on major national holidays, we never seem to have our regular doctor there, but we really liked Dr. Hambrecht, and were very glad when we learned he was on call.\r\n</p>\r\n<p>\r\nLyn was able to get Natalya out in 3 big pushes and a few small ones that Dr Hambrecht talked her through.&nbsp; This was unexpected good fortune and I think the nurse and doctor were a pleasantly surprised as well.&nbsp; \r\n</p>\r\n<p>\r\nWe stayed the night in the hospital and finally got her home around noon the following day.\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\n<strong>First Few Days</strong>\r\n</p>\r\n<p>\r\nWe are learning a few things about Natalya already:\r\n</p>\r\n<ul>\r\n	<li> she *really* does not like being changed and it sounds like it is the end of her world whenever we go through the operation</li>\r\n	<li>She sleeps in pretty regular cycles now; during the day she nurses for about 45 minutes to an hour, looks around at things for about 15 minutes, then sleeps for a couple of hours; at night, she does the same but omits the research portion and just adds another hour or so of sleep.</li>\r\n</ul>\r\n<br />\r\n', '2009-12-31 08:04:45', '2010-01-04 20:48:39', 0);

--
-- Triggers `Blogs`
--
DROP TRIGGER IF EXISTS `blogd_before_insert`;
DELIMITER //
CREATE TRIGGER `blogd_before_insert` BEFORE INSERT ON `Blogs`
 FOR EACH ROW SET NEW.created = NOW(), NEW.updated = NOW()
//
DELIMITER ;
DROP TRIGGER IF EXISTS `blogs_before_update`;
DELIMITER //
CREATE TRIGGER `blogs_before_update` BEFORE UPDATE ON `Blogs`
 FOR EACH ROW SET  NEW.updated = NOW()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Comments`
--

CREATE TABLE IF NOT EXISTS `Comments` (
  `comment_id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `blog_id` int(10) unsigned NOT NULL DEFAULT '0',
  `gallery_id` int(5) unsigned NOT NULL DEFAULT '0',
  `video_id` int(5) unsigned NOT NULL,
  `account_id` int(5) unsigned zerofill NOT NULL DEFAULT '00000',
  `title` varchar(250) NOT NULL DEFAULT '',
  `author` varchar(40) NOT NULL,
  `comment` longtext NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `Comments`
--

INSERT INTO `Comments` (`comment_id`, `blog_id`, `gallery_id`, `video_id`, `account_id`, `title`, `author`, `comment`, `created`, `updated`, `deleted`) VALUES
(0000000001, 0, 2, 0, 00001, 'Three cheers for Adison!', '', 'Hey Dave - \r\n\r\nWow!  Thanks so much for posting these - they are wonderful.  I love his contemplative moment as well. :-)', '2008-12-08 12:54:27', '2008-12-08 12:54:27', 0),
(0000000006, 0, 0, 13, 00003, 'Hilarious', '', 'This had me LOL — had to watch several times. Too good!', '2009-01-25 18:11:22', '2009-01-25 18:11:22', 0),
(0000000007, 0, 3, 0, 00003, 'Wow!', '', 'Kent & Lyn, the place is looking great! Your efforts have really paid off — isn''t it satisfying to see the fruits of your labors? Some nice shots of them, too.', '2009-07-13 18:33:42', '2009-07-13 18:33:42', 0),
(0000000015, 0, 12, 0, 00000, 'Re:  Calin and his rainbow', 'Barbara Blodgett (aka Grandma)', 'Cute, cute, cute!!!!!\r\nlove, Grandma', '2009-12-24 12:05:24', '2009-12-24 12:05:24', 0),
(0000000016, 0, 11, 0, 00000, 'Nice shots!', 'Dave', 'I love these pics, Kent. The ship is from what era? 15th or 16th century?', '2009-12-29 18:42:32', '2009-12-29 18:42:32', 0),
(0000000017, 9, 0, 0, 00000, 'Natalya at home', 'Grandma Blodgett', 'It is so interesting to learn about her birth, how easy it was and now to hear about her schedule at home.  Love it!  Thanks, K! ', '2010-01-04 16:51:34', '2010-01-04 16:51:34', 0),
(0000000018, 0, 11, 0, 00001, 'Re: Vasa', '', 'Hi Dave -\r\n\r\nIt actually was early 17th century (1626).  You should read about this here: http://en.wikipedia.org/wiki/Vasa_%28ship%29.  Really interesting story. ', '2010-01-26 22:47:58', '2010-01-26 22:47:58', 0);

--
-- Triggers `Comments`
--
DROP TRIGGER IF EXISTS `comment_before_insert`;
DELIMITER //
CREATE TRIGGER `comment_before_insert` BEFORE INSERT ON `Comments`
 FOR EACH ROW SET NEW.created = NOW(), NEW.updated = NOW()
//
DELIMITER ;
DROP TRIGGER IF EXISTS `comment_before_update`;
DELIMITER //
CREATE TRIGGER `comment_before_update` BEFORE UPDATE ON `Comments`
 FOR EACH ROW SET  NEW.updated = NOW()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Galleries`
--

CREATE TABLE IF NOT EXISTS `Galleries` (
  `gallery_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `account_id` int(5) unsigned zerofill NOT NULL DEFAULT '00000',
  `gallery_title` varchar(200) NOT NULL DEFAULT '',
  `gallery_summary` mediumtext NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `Galleries`
--

INSERT INTO `Galleries` (`gallery_id`, `account_id`, `gallery_title`, `gallery_summary`, `created`, `updated`, `deleted`) VALUES
(1, 00001, 'Guatemala ''99', 'Lyn and I took this two week trip while she was down in Guatemala volunteering and learning Spanish for 6 months.&nbsp; I have had all the memories on these slides which I just digitized.&nbsp; Hope you enjoy them.', '2008-11-06 22:36:53', '2009-02-12 20:35:04', 0),
(2, 00003, 'Welcome, Adison!', 'Adison was born on November 26, 2008 &mdash; here''s some images of the event and the days that followed.', '2008-12-07 14:14:08', '2008-12-07 14:14:08', 0),
(3, 00001, 'Spring ''09', 'I took a few pictures of the yard as spring came in - I think we are at a good point with it now after good deal of work.&nbsp; Now we have to fix our backs....', '2009-05-10 14:17:35', '2009-05-10 14:31:37', 0),
(4, 00001, 'Trip To Seattle', 'Here are some pics of the trip North.&nbsp; Since we drove, we missed a lot of good photo ops, but what can you do?', '2009-07-09 20:39:47', '2009-08-02 22:00:55', 0),
(11, 00001, 'Stockholm', 'Here are a few photos of a trip I took to Sweden to visit the MobiTV team in Stockholm.', '2009-09-26 22:03:48', '2009-09-28 22:07:04', 0),
(12, 00001, 'Calin Pictures', 'A gallery of images just of Calin.', '2009-09-28 21:22:41', '2009-09-28 21:22:41', 0),
(13, 00001, 'Natalya', 'Here are some images of Natalya for folks to take a look at.', '2010-01-01 15:57:49', '2010-01-01 15:57:49', 0),
(14, 00001, 'Misc-Life-Random', 'There are one offs that don''t constitute a whole gallery - just moments in time.', '2010-01-30 20:56:05', '2010-01-30 21:42:33', 0),
(15, 00001, '6167 Overdale Ave Before/After', 'This is a set of photos of before/after work on the house.', '2010-02-24 21:14:08', '2011-01-09 07:33:58', 0),
(16, 00001, 'Summer/Fall 2010', 'Some pictures from over the mid-year that I thought I would share.', '2010-10-17 00:00:00', '2010-10-30 20:26:29', 0),
(17, 00001, 'Guitar Build Series', '<p>I created this gallery to somewhat document the build out of the guitar that I am working on at the moment.&nbsp; May take some time to complete but it will get there.&nbsp; Some things that people may be interested in knowing about the design:</p><ul><li>Mahogany body and neck</li><li>Maple top</li><li>Palisander (Madagascar rosewood) Fingerboard</li><li>Snakewood headstock veneer</li><li>24 3/4 inch scale</li><li>Semi hollow electric </li></ul>', '2010-12-24 16:50:49', '2010-12-26 22:17:08', 0),
(18, 00001, 'Christmas 2010', 'Natalya is now a year, the jobs are keeping steady and we are assessing the process for leaving Oakland.&nbsp; Here are some shots of us with Amy and Matthew over the holidays.', '2011-01-09 16:09:52', '2011-01-22 10:39:56', 0),
(19, 00001, '32 Oakland Ave - San Anselmo', 'Here are some pics of the place we are in contract with at the moment.', '2012-02-26 14:12:52', '2012-02-26 14:12:52', 0);

--
-- Triggers `Galleries`
--
DROP TRIGGER IF EXISTS `gallery_before_insert`;
DELIMITER //
CREATE TRIGGER `gallery_before_insert` BEFORE INSERT ON `Galleries`
 FOR EACH ROW SET NEW.created = NOW(), NEW.updated = NOW()
//
DELIMITER ;
DROP TRIGGER IF EXISTS `gallery_before_update`;
DELIMITER //
CREATE TRIGGER `gallery_before_update` BEFORE UPDATE ON `Galleries`
 FOR EACH ROW SET  NEW.updated = NOW()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `GalleryImage`
--

CREATE TABLE IF NOT EXISTS `GalleryImage` (
  `image_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_id` int(5) unsigned NOT NULL DEFAULT '0',
  `image_title` varchar(200) NOT NULL DEFAULT '',
  `image_caption` mediumtext NOT NULL,
  `image_order` int(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=186 ;

--
-- Dumping data for table `GalleryImage`
--

INSERT INTO `GalleryImage` (`image_id`, `gallery_id`, `image_title`, `image_caption`, `image_order`, `created`, `updated`) VALUES
(1, 1, 'Chichen Itza Temple', 'This was quite a place and was the last site that we visited.', 1, '2008-11-06 22:39:47', '2009-02-12 20:35:04'),
(2, 1, 'Chichen Itza Observatory', 'Hard to believe how advanced these people were - this place I am sure everyone knows about.', 2, '2008-11-06 22:40:53', '2009-02-12 20:35:04'),
(3, 1, 'Lake Atitlan', 'This was the lake off of Panajachel - a pretty touristy area but beautiful nonetheless.', 3, '2008-11-06 22:43:38', '2009-02-12 20:35:04'),
(4, 1, 'Lyn at Tikal', 'Lyn struck a pensive pose/moment here at Tikal', 5, '2008-11-06 22:45:18', '2009-02-12 20:35:04'),
(5, 1, 'Sunset at Isla Mujeres', 'Lyn and I made the last boat over to Isla Mujeres after a long day of travelling and caught the sunset.', 18, '2008-11-06 22:48:31', '2009-02-12 20:35:04'),
(6, 1, 'Window At Tikal', 'We were about to stroll down to the ruins and I snapped this shot of Lyn in the morning light of the hotel room.', 6, '2008-11-06 22:52:11', '2009-02-12 20:35:04'),
(7, 1, 'Palenque', 'I absolutely loved Palenque - this was the temple that had the famous sarcophogus of Quetzlcoatl but it was closed due to archaeological research - bummer. ', 11, '2008-11-06 22:54:57', '2009-02-12 20:35:04'),
(8, 1, 'Tikal Temple IV', 'The grand plaza with temple IV.', 7, '2008-11-06 22:59:45', '2009-02-12 20:35:04'),
(9, 1, 'Waterfall', 'I believe this was near Palenque.', 9, '2008-11-06 23:03:21', '2009-02-12 20:35:04'),
(10, 1, 'Lyn with Chak', 'We were at the top of a temple in Uxmal ruins.', 17, '2008-11-06 23:03:56', '2009-02-12 20:35:04'),
(11, 1, 'Chak the Rain God', 'The symbol of Chak was everywhere but this was by far the biggest we saw at Tikal - about 6 x 4 feet', 8, '2008-11-08 21:06:01', '2009-02-12 20:35:04'),
(12, 1, 'Kent at Agua Azul', 'Just relaxing...', 13, '2008-11-08 21:06:39', '2009-02-12 20:35:04'),
(13, 1, 'Lyn and the Rubber Tree', 'It''s not little red riding hood.', 10, '2008-11-08 21:08:01', '2009-02-12 20:35:04'),
(14, 1, 'Agua Azul', 'An amazing place near Palenque - about a quarter mile of falls like this.', 14, '2008-11-08 21:08:54', '2009-02-12 20:35:04'),
(15, 1, 'City of Palenque', 'The sacred city - there was definitely a feel to this unlike any other sites.', 12, '2008-11-08 21:09:56', '2009-02-12 20:35:04'),
(16, 1, 'Panajachel', 'A main street in Panajachel.', 4, '2008-11-08 21:10:35', '2009-02-12 20:35:04'),
(17, 1, 'San Cristobol', 'From our hotel window in town.', 15, '2008-11-08 21:11:08', '2009-02-12 20:35:04'),
(18, 1, 'Sunset at Isla', 'Another shot of the sunset on the way to Isla Mujeres.  We stayed here the longest ;-)', 20, '2008-11-08 21:12:14', '2009-02-12 20:35:04'),
(19, 1, 'Uxmal Plaza', 'A main plaza area in Uxmal - very desert like environment here.  Every ruin seemed to have its own signature that blended with the climate.', 16, '2008-11-08 21:13:34', '2009-02-12 20:35:04'),
(20, 1, 'The Ocean', 'I believe this was on Isla Mujeres - near Cancun.', 19, '2008-11-08 21:14:22', '2009-02-12 20:35:04'),
(23, 2, 'Happy mom', '', 0, '2008-12-07 14:17:36', '2008-12-07 14:17:36'),
(24, 2, 'First kiss', '', 0, '2008-12-07 14:20:54', '2008-12-07 14:20:54'),
(25, 2, 'A contemplative moment', '', 0, '2008-12-07 14:23:38', '2008-12-07 14:23:38'),
(26, 2, 'yawn', '', 0, '2008-12-07 14:25:04', '2008-12-07 14:25:04'),
(27, 2, 'No. 1 meets no. 4', '', 0, '2008-12-07 14:27:42', '2008-12-07 14:27:42'),
(28, 2, 'Austin chills with Adison while Mom calls Tom', '', 0, '2008-12-07 14:29:43', '2008-12-07 14:29:43'),
(29, 2, 'brothers', '', 0, '2008-12-07 14:31:19', '2008-12-07 14:31:19'),
(30, 3, 'Backyard Pan', 'This is a little pan shot I put together - I hope it turns out.', 4, '2009-05-10 14:18:17', '2009-05-10 14:31:37'),
(31, 3, 'Orchid', 'By the kitchen window.', 1, '2009-05-10 14:19:43', '2009-05-10 14:31:37'),
(32, 3, 'Side walk way', 'Taken on the north side facing west.', 2, '2009-05-10 14:21:34', '2009-05-10 14:31:37'),
(33, 3, 'The cottage and hot tub', 'The place to relax.  The shed/cottage is getting some work done inside at the moment.', 5, '2009-05-10 14:23:02', '2009-05-10 14:31:37'),
(34, 3, 'The hot tub', 'This has become a fun place to relax and just chill.', 6, '2009-05-10 14:24:32', '2009-05-10 14:31:37'),
(35, 3, 'The backyard.', 'The yard facing northeast.', 7, '2009-05-10 14:25:20', '2009-05-10 14:31:37'),
(36, 3, 'Fern', 'This fern has seen a lot of actionand I am so excited to see it happy this year!', 8, '2009-05-10 14:26:28', '2009-05-10 14:31:37'),
(37, 3, 'Grass close up', 'This is facing south as you come outside.', 3, '2009-05-10 14:29:20', '2009-05-10 14:31:37'),
(39, 4, 'Aboard Jerry''s boat', 'Jerry took us out into Puget sound on his boat - since it was the 4th, we saw an airshow of some pretty loud planes.', 1, '2009-07-09 20:45:45', '2009-08-02 22:00:55'),
(40, 4, 'Calin and Dana', 'Calin and AD on the boat out in Puget Sound', 2, '2009-07-09 20:48:08', '2009-08-02 22:00:55'),
(41, 4, 'Daddy and Calin', 'There we are!', 3, '2009-07-09 20:49:24', '2009-08-02 22:00:55'),
(42, 4, 'Birthday Boy', 'Opening present on July 5th', 4, '2009-07-09 20:52:35', '2009-08-02 22:00:55'),
(43, 4, 'Pike''s Fish Market', 'I had not idea...', 5, '2009-07-10 09:01:21', '2009-08-02 22:00:55'),
(44, 4, 'Market', 'Part of the downtown market', 6, '2009-07-10 21:17:16', '2009-08-02 22:00:55'),
(45, 4, 'At the Needle Park', 'We stopped to have some fun at the water spout by the Space Needle', 7, '2009-07-10 21:18:52', '2009-08-02 22:00:55'),
(46, 4, 'After the water', 'Lyn and Calin all wet', 8, '2009-07-10 21:19:17', '2009-08-02 22:00:55'),
(47, 4, 'At the Needle', '', 9, '2009-07-10 21:20:56', '2009-08-02 22:00:55'),
(48, 4, 'Woohoo!', 'Calin and Aunt Dana', 10, '2009-07-10 21:22:29', '2009-08-02 22:00:55'),
(50, 4, 'Mt Shasta', '', 12, '2009-07-10 21:27:36', '2009-08-02 22:00:55'),
(51, 4, 'Calin', '', 13, '2009-07-10 21:27:57', '2009-08-02 22:00:55'),
(52, 4, 'Playing around', 'This was in Shasta county, at the Castle Crags State park', 14, '2009-07-10 21:28:53', '2009-08-02 22:00:55'),
(53, 4, 'Bye-bye', '', 15, '2009-07-10 21:29:38', '2009-08-02 22:00:55'),
(54, 4, 'Eugene, OR', 'Stopping in to see the local geese', 11, '2009-07-10 21:32:29', '2009-08-02 22:00:55'),
(55, 5, 'A test pic', 'test', 0, '2009-09-02 22:02:46', '2009-09-02 22:02:46'),
(56, 5, 'gsdfgsd', 'sdfgsd', 0, '2009-09-02 22:34:39', '2009-09-02 22:34:39'),
(57, 5, 'gndg', 'dfgdfg', 0, '2009-09-02 22:35:15', '2009-09-02 22:35:15'),
(58, 5, 'gndg', 'dfgdfg', 0, '2009-09-02 22:36:25', '2009-09-02 22:36:25'),
(59, 5, 'h,fjkff', 'hjfghjfgjh', 0, '2009-09-02 22:38:15', '2009-09-02 22:38:15'),
(60, 5, 'zxdvzxvz', 'xcvz', 0, '2009-09-02 22:40:03', '2009-09-02 22:40:03'),
(68, 11, 'Old Town street', 'Afternoon stroll', 4, '2009-09-27 12:58:09', '2009-09-28 22:07:04'),
(70, 12, 'Calin Rainbow', '', 0, '2009-09-28 21:23:42', '2009-09-28 21:23:42'),
(71, 12, 'Calin Rainbow', '', 0, '2009-09-28 21:25:47', '2009-09-28 21:25:47'),
(72, 12, 'Calin drawing', '', 0, '2009-09-28 21:28:55', '2009-09-28 21:28:55'),
(73, 12, 'Calin Rainbow', '', 0, '2009-09-28 21:31:45', '2009-09-28 21:31:45'),
(74, 12, 'Calin is surprised!', '', 0, '2009-09-28 21:33:17', '2009-09-28 21:33:17'),
(75, 11, 'Bridge to Skeppsholmen', 'On the way to the Vasa Museum', 5, '2009-09-28 21:36:59', '2009-09-28 22:07:04'),
(76, 11, 'Vasa', 'This is the first view of the ship upon entering', 6, '2009-09-28 21:37:47', '2009-09-28 22:07:04'),
(78, 11, 'Nordic Sea', 'My IKEA hotel room', 1, '2009-09-28 21:41:39', '2009-09-28 22:07:04'),
(79, 11, 'Stern', 'This is the where the ornate carvings were.', 7, '2009-09-28 21:45:01', '2009-09-28 22:07:04'),
(80, 11, 'The coat of arms', 'The stern carvings - too much there to capture and describe', 8, '2009-09-28 21:47:24', '2009-09-28 22:07:04'),
(81, 11, 'Port side', '', 9, '2009-09-28 21:48:09', '2009-09-28 22:07:04'),
(82, 11, 'Starboard side', '', 10, '2009-09-28 21:48:57', '2009-09-28 22:07:04'),
(83, 11, 'Vasa', 'Starboard/deck', 11, '2009-09-28 21:49:48', '2009-09-28 22:07:04'),
(84, 11, 'Vasa', 'The capstan', 12, '2009-09-28 21:50:33', '2009-09-28 22:07:04'),
(85, 11, 'Vasa', 'Upper deck', 13, '2009-09-28 21:52:39', '2009-09-28 22:07:04'),
(86, 11, 'Bridge to Gamla Stan', 'Old Town', 2, '2009-09-28 21:55:05', '2009-09-28 22:07:04'),
(87, 11, 'Tunnel', 'Just shooting some interesting architecture', 14, '2009-09-28 21:56:10', '2009-09-28 22:07:04'),
(88, 11, 'Västerlängattan', 'The main tourist trap street inOld Town', 15, '2009-09-28 21:59:32', '2009-09-28 22:07:04'),
(89, 11, 'The Office', 'The MobiTV office is to the left', 3, '2009-09-28 22:00:23', '2009-09-28 22:07:04'),
(90, 11, 'Alley', '', 17, '2009-09-28 22:01:02', '2009-09-28 22:07:04'),
(91, 11, 'Doorway and street signs', '', 18, '2009-09-28 22:01:44', '2009-09-28 22:07:04'),
(92, 11, 'Old Town square', 'The main church of Old Town with the Royal Palace and apartments to the right', 16, '2009-09-28 22:03:09', '2009-09-28 22:07:04'),
(94, 13, 'Mather and daughter meeting for first time', 'Here they are resting together minutes after birth.', 0, '2010-01-01 16:06:50', '2010-01-01 16:06:50'),
(95, 13, 'Weigh in time', 'Natalya weighs in at a cool 7 lbs 14.8 ozs', 0, '2010-01-01 17:13:08', '2010-01-01 17:13:08'),
(97, 13, 'Dad and Talya', '', 0, '2010-01-01 17:19:36', '2010-01-01 17:19:36'),
(98, 13, 'Calin vists', 'At the hospital - Calin first meets/holds Talya', 0, '2010-01-01 17:24:13', '2010-01-01 17:24:13'),
(99, 13, 'Getting a bath', 'Vanessa, our nurse, gives Natalya her first spa experience.', 0, '2010-01-01 21:35:16', '2010-01-01 21:35:16'),
(100, 12, 'Waking up', '', 0, '2010-01-21 21:03:43', '2010-01-21 21:03:43'),
(102, 14, 'Evening sky', '', 1, '2010-01-30 21:34:32', '2010-01-30 21:42:33'),
(103, 14, 'Weekend Breakfast', '', 2, '2010-01-30 21:35:03', '2010-01-30 21:42:33'),
(104, 14, 'Mom and Natalya', '', 3, '2010-01-30 21:35:33', '2010-01-30 21:42:33'),
(105, 14, 'Tub time', '', 4, '2010-01-30 21:35:57', '2010-01-30 21:42:33'),
(106, 14, 'More tub time', '', 5, '2010-01-30 21:36:19', '2010-01-30 21:42:33'),
(107, 14, 'And more tub time', '', 6, '2010-01-30 21:36:45', '2010-01-30 21:42:33'),
(108, 14, 'The Bay trail', '', 7, '2010-01-30 21:37:22', '2010-01-30 21:42:33'),
(109, 14, 'Calin waliking the bay trail', '', 8, '2010-01-30 21:37:48', '2010-01-30 21:42:33'),
(110, 15, 'Old Kitchen', 'Starting to demo', 7, '2010-02-26 07:04:58', '2011-01-09 07:33:58'),
(111, 15, 'Old Kitchen 2', '', 8, '2010-02-26 07:05:47', '2011-01-09 07:33:58'),
(112, 15, 'Kitchen demo', '', 9, '2010-02-26 07:06:34', '2011-01-09 07:33:58'),
(113, 15, 'Kitchen remodel', '', 10, '2010-02-26 07:08:40', '2011-01-09 07:33:58'),
(114, 15, 'Kitchen after', '', 11, '2010-02-26 07:10:44', '2011-01-09 07:33:58'),
(115, 15, 'Kitchen after 2/French doors before', 'Notice the windows as they are now - this is the state of them before the new french doors', 12, '2010-02-26 07:13:12', '2011-01-09 07:33:58'),
(116, 15, 'Shed before replacement', '', 15, '2010-02-26 07:26:29', '2011-01-09 07:33:58'),
(117, 15, 'New shed/studio/workspace', '', 16, '2010-02-26 07:34:34', '2011-01-09 07:33:58'),
(118, 15, 'Hot tub area', '', 17, '2010-02-26 07:38:27', '2011-01-09 07:33:58'),
(119, 15, 'backyard ', '', 18, '2010-02-26 08:02:37', '2011-01-09 07:33:58'),
(120, 15, 'Backyard, facing house', '', 19, '2010-02-26 08:03:28', '2011-01-09 07:33:58'),
(121, 15, 'Front of house; before', '', 20, '2010-02-26 08:06:27', '2011-01-09 07:33:58'),
(122, 15, 'Front door, before', '', 21, '2010-02-26 08:06:56', '2011-01-09 07:33:58'),
(123, 15, 'Old Kitchen - 1st year', '', 6, '2010-02-26 08:07:31', '2011-01-09 07:33:58'),
(124, 15, 'Front of house, today', '', 22, '2010-02-26 08:07:57', '2011-01-09 07:33:58'),
(125, 15, 'Studio before', '', 1, '2010-02-26 08:22:21', '2011-01-09 07:33:58'),
(126, 15, 'Studio before 2', '', 2, '2010-02-26 08:22:53', '2011-01-09 07:33:58'),
(127, 15, 'Studio completed', '', 3, '2010-02-26 08:23:37', '2011-01-09 07:33:58'),
(128, 15, 'Studio/loft area completed', '', 4, '2010-02-26 08:24:14', '2011-01-09 07:33:58'),
(129, 15, 'The studio', '', 5, '2010-02-26 08:24:53', '2011-01-09 07:33:58'),
(136, 16, 'Morning on Chappaquiddick', 'Taken ~ 6AM from the back deck', 1, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(137, 16, 'Window', 'From Calin''s room on Chappy', 2, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(138, 16, 'BB', 'At the helm...', 3, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(139, 16, 'Zoltar', 'Taken at Flying Horses, Oak Bluffs', 5, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(140, 16, 'Walkway', 'Heading down to the beach', 6, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(141, 16, 'Sailing Crew', 'Taken for Sailing magazine', 7, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(142, 16, 'Lyn in SD', 'Our trip concluded in San Diego for Michael''s wedding', 9, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(143, 16, 'Attacked', 'My daughter already showing who''s boss', 12, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(144, 16, 'Talya', '', 13, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(145, 16, 'Calin B-Day', 'Calin got a litle shy when 50 people were singing happy birthday to him', 16, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(146, 16, 'Family', 'at Calin''s party', 17, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(147, 16, 'In Yosemite', 'Calin and I were heading up to the base of El Capitan ', 18, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(148, 16, 'Making way for new stuff', 'On Labor Day weekend, I took out the old window and put in french doors', 19, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(149, 16, 'Sunset', 'On the island', 8, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(150, 16, 'French Doors!', '', 20, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(151, 16, 'Crashed', 'These kids slept when they got to San DIego', 10, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(152, 16, 'Joe and Kat', 'Chillin in SD', 11, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(153, 16, 'Talya and Lyn', '', 4, '0000-00-00 00:00:00', '2010-10-30 20:26:29'),
(154, 16, 'Natalya is crawling!', '', 15, '2010-10-30 20:24:16', '2010-10-30 20:26:29'),
(155, 16, 'Natalya', '', 14, '2010-10-30 20:24:52', '2010-10-30 20:26:29'),
(158, 13, 'Christmas is coming!', '', 0, '2010-12-05 21:23:49', '2010-12-05 21:23:49'),
(159, 13, 'Learning to walk', 'Talya using the laundry basket to walk around', 0, '2010-12-05 21:24:41', '2010-12-05 21:24:41'),
(160, 13, 'Art photo opt', '', 0, '2010-12-05 21:25:13', '2010-12-05 21:25:13'),
(161, 17, 'Body: Front', 'Front; shape is essentially done here - will now rout out the chambers', 1, '2010-12-24 17:08:25', '2010-12-26 22:17:08'),
(162, 17, 'Body', 'Backside', 2, '2010-12-24 17:09:10', '2010-12-26 22:17:08'),
(163, 17, 'Fingerboard and headstock veneer', '', 3, '2010-12-24 17:09:56', '2010-12-26 22:17:08'),
(164, 17, 'Headstock veneer close-up', 'Snakewood', 4, '2010-12-24 17:11:03', '2010-12-26 22:17:08'),
(165, 17, 'Neck blank', 'The neck I will be using is on the right side; the one on the left is a comparison to what it will resemble but I was aiming for a neck-through design with that one, which obviously never was completed', 5, '2010-12-24 17:12:56', '2010-12-26 22:17:08'),
(166, 17, 'Headstock', 'Here is what the headstock design will look like and the snakewood will be the veneer', 6, '2010-12-24 17:13:57', '2010-12-26 22:17:08'),
(167, 17, 'Body and top ', 'Here is the rough top piece sitting on the body - I need to spend many hours forming the arch shape ', 7, '2010-12-24 17:16:41', '2010-12-26 22:17:08'),
(168, 15, 'French door addition ', 'under construction', 13, '2011-01-09 07:25:20', '2011-01-09 07:33:58'),
(169, 15, 'French doors ', 'installed', 14, '2011-01-09 07:25:54', '2011-01-09 07:33:58'),
(171, 18, 'Hiking', 'Calin leading the way in San Geronimo', 1, '2011-01-09 19:39:35', '2011-01-22 10:39:56'),
(172, 18, 'At the tree', 'Getting ready for our photo op; Talya could not get that apple out of her mouth', 2, '2011-01-09 19:42:03', '2011-01-22 10:39:56'),
(173, 18, 'Dad and Talya', 'The apple is still there', 3, '2011-01-09 19:44:15', '2011-01-22 10:39:56'),
(174, 18, 'Lyn and Talya', '', 4, '2011-01-09 19:49:37', '2011-01-22 10:39:56'),
(175, 18, 'Christmas morning', '', 5, '2011-01-09 19:50:06', '2011-01-22 10:39:56'),
(176, 18, 'Calin and his new scooter', 'We forgot to get kneepads - ouch!', 6, '2011-01-09 19:54:49', '2011-01-22 10:39:56'),
(177, 18, 'Red piggy bank', '', 7, '2011-01-09 20:00:48', '2011-01-22 10:39:56'),
(178, 18, 'Calin by the fire', 'new toys to play with ', 8, '2011-01-09 20:05:40', '2011-01-22 10:39:56'),
(179, 18, 'Sitting down for dinner', 'Amy, Talya, Calin and Lyn', 11, '2011-01-09 20:07:17', '2011-01-22 10:39:56'),
(180, 18, 'Calin on Benadryl', '', 12, '2011-01-09 20:07:41', '2011-01-22 10:39:56'),
(181, 18, 'Christmas dinner', 'Wine magazine submission', 13, '2011-01-09 20:08:37', '2011-01-22 10:39:56'),
(182, 18, 'Christmas dinner', 'We had a wonderful time with Amy and Matthew - very nice and mellow evening with lots to eat and drink and great conversation', 14, '2011-01-09 20:09:06', '2011-01-22 10:39:56'),
(184, 18, 'Matthew at the helm', 'Making his famous kale', 9, '2011-01-22 10:31:03', '2011-01-22 10:39:56'),
(185, 18, 'Matthew ', 'Still cooking!', 10, '2011-01-22 10:34:09', '2011-01-22 10:39:56');

--
-- Triggers `GalleryImage`
--
DROP TRIGGER IF EXISTS `gallery_image_before_insert`;
DELIMITER //
CREATE TRIGGER `gallery_image_before_insert` BEFORE INSERT ON `GalleryImage`
 FOR EACH ROW SET NEW.created = NOW(), NEW.updated = NOW()
//
DELIMITER ;
DROP TRIGGER IF EXISTS `gallery_image_before_update`;
DELIMITER //
CREATE TRIGGER `gallery_image_before_update` BEFORE UPDATE ON `GalleryImage`
 FOR EACH ROW SET  NEW.updated = NOW()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `UserAccount`
--

CREATE TABLE IF NOT EXISTS `UserAccount` (
  `account_id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(60) NOT NULL DEFAULT '',
  `first_name` varchar(30) NOT NULL DEFAULT '',
  `last_name` varchar(40) NOT NULL DEFAULT '',
  `profile_image` varchar(100) DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `UserAccount`
--

INSERT INTO `UserAccount` (`account_id`, `username`, `email`, `password`, `first_name`, `last_name`, `profile_image`, `activated`, `created`, `updated`) VALUES
(00001, 'kblodgett', 'kent@winfieldstudios.com', 'b373f024c8548d0c1bdf4ec865279f7c', 'Kent', 'Blodgett', NULL, 1, '2008-01-19 20:04:28', '2009-01-07 17:15:19'),
(00003, 'dtblodgett', 'dtblodgett@yahoo.com', 'b4fade83b9f58a54a1d93f9758ad38d4', 'Dave', 'Blodgett', NULL, 1, '2008-01-27 18:24:08', '2010-01-02 11:03:04'),
(00004, 'vblodgett', 'verneblodgett@verizon.net', 'c80947a130bed55dd16a26fd04482320', 'Verne', 'Blodgett', NULL, 1, '2008-04-27 11:13:10', '2008-04-27 21:01:21'),
(00005, 'Commodore', 'verneblodgett@verizon.net', 'c80947a130bed55dd16a26fd04482320', 'Verne', 'Blodgett', NULL, 1, '2008-07-06 19:24:32', '2008-07-09 22:18:19'),
(00009, 'lyn', 'lyn@winfieldstudios.com', 'e8253205e2eee608fddde64051c42645', 'Lyn', 'Blodgett', NULL, 1, '2010-01-17 15:39:03', '2010-01-17 15:39:03');

--
-- Triggers `UserAccount`
--
DROP TRIGGER IF EXISTS `account_before_insert`;
DELIMITER //
CREATE TRIGGER `account_before_insert` BEFORE INSERT ON `UserAccount`
 FOR EACH ROW SET NEW.created = NOW(), NEW.updated = NOW()
//
DELIMITER ;
DROP TRIGGER IF EXISTS `account_before_update`;
DELIMITER //
CREATE TRIGGER `account_before_update` BEFORE UPDATE ON `UserAccount`
 FOR EACH ROW SET  NEW.updated = NOW()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Videos`
--

CREATE TABLE IF NOT EXISTS `Videos` (
  `video_id` int(5) NOT NULL AUTO_INCREMENT,
  `account_id` int(5) NOT NULL,
  `video_title` varchar(200) CHARACTER SET latin1 NOT NULL,
  `video_summary` mediumtext CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `Videos`
--

INSERT INTO `Videos` (`video_id`, `account_id`, `video_title`, `video_summary`, `created`, `updated`, `deleted`) VALUES
(15, 1, 'Drake''s Bay', 'We took a day trip to Point Reyes State Park and walked at Drake''s Bay.  Unfortunately, a seagull took an interest in Calin''s ball and made off with it.', '2009-01-25 19:14:09', '2009-01-25 19:14:09', 0),
(16, 1, 'Milk du jour', 'Calin was wined and dined by Ariston that afternoon.  ', '2009-02-12 20:57:34', '2009-02-14 13:29:14', 0),
(39, 1, 'Calin Crawls', 'This is a short film of Calin learning to crawl with parental support in the background.', '2009-09-26 21:27:49', '2009-09-26 21:27:49', 0),
(40, 1, 'Natalya and Mom', 'She is just 4 days old here.', '2009-12-30 21:32:39', '2009-12-30 21:32:39', 0),
(41, 1, 'Trains', 'Talya, Calin, M & D hanging out in Calin''s room on a typical weekend playing with the trains.', '2010-10-17 21:35:17', '2010-10-17 21:35:17', 0),
(42, 1, 'Natalya with her stroller', 'She loves her present from Grandma!', '2011-01-24 06:40:00', '2011-01-24 23:37:39', 0);

--
-- Triggers `Videos`
--
DROP TRIGGER IF EXISTS `video_create`;
DELIMITER //
CREATE TRIGGER `video_create` BEFORE INSERT ON `Videos`
 FOR EACH ROW SET  NEW.created = NOW(), NEW.updated = NOW()
//
DELIMITER ;
DROP TRIGGER IF EXISTS `video_update`;
DELIMITER //
CREATE TRIGGER `video_update` BEFORE UPDATE ON `Videos`
 FOR EACH ROW SET  NEW.updated = NOW()
//
DELIMITER ;