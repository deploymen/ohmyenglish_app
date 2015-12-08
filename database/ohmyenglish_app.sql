-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 14, 2015 at 11:15 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ohmyenglish_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `t0121_game`
--

CREATE TABLE IF NOT EXISTS `t0121_game` (
  `id` int(11) unsigned NOT NULL,
  `stage` tinyint(4) unsigned NOT NULL,
  `question` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `options` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t0121_game`
--

INSERT INTO `t0121_game` (`id`, `stage`, `question`, `answer`, `options`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ingredient', 'fish', 'fishaeioufgh', '2015-05-03 06:59:15', NULL, NULL),
(2, 1, 'cooking method', 'fried', 'friedaeiouft', '2015-05-03 06:59:15', NULL, NULL),
(3, 2, 'ingredient', 'noodle', 'noodleaeioug', '2015-05-03 06:59:15', NULL, NULL),
(4, 2, 'cuisine', 'dessert', 'dessertaeiou', '2015-05-03 06:59:15', NULL, NULL),
(5, 3, 'colour', 'yellow', 'yellowknhyts', '2015-05-03 06:59:15', NULL, NULL),
(6, 3, 'ingredient', 'soup', 'soupderuiklm', '2015-05-03 06:59:15', NULL, NULL),
(7, 4, 'dish', 'nasi lemak', 'nasilemakouh', '2015-05-03 06:59:15', NULL, NULL),
(8, 4, 'ingredient', 'egg', 'eggouprfcbmn', '2015-05-03 06:59:15', NULL, NULL),
(9, 5, 'cuisine', 'indian', 'indiansxdrfn', '2015-05-03 06:59:15', NULL, NULL),
(10, 5, 'dish', 'burger', 'burgervcdxsr', '2015-05-03 06:59:15', NULL, NULL),
(11, 6, 'taste', 'spicy', 'spicyvhujgrs', '2015-05-03 07:12:41', NULL, NULL),
(12, 6, 'ingredient', 'soybean', 'soybeanfczuy', '2015-05-03 07:12:41', NULL, NULL),
(13, 7, 'dish', 'ice kacang', 'icekacangbvs', '2015-05-03 07:14:15', NULL, NULL),
(14, 7, 'taste', 'sweet', 'sweetplokhen', '2015-05-03 07:14:15', NULL, NULL),
(15, 8, 'ingredient', 'tofu', 'tofukmjnhbgy', '2015-05-03 07:15:17', NULL, NULL),
(16, 8, 'ingredient', 'curry', 'currydfokjnt', '2015-05-03 07:15:17', NULL, NULL),
(17, 9, 'method', 'grilled', 'grilledredsx', '2015-05-03 07:16:29', NULL, NULL),
(18, 9, 'ingredient', 'mango', 'mangoolterxv', '2015-05-03 07:16:29', NULL, NULL),
(19, 10, 'colour', 'brown', 'brownsexdcfo', '2015-05-03 07:17:22', NULL, NULL),
(20, 10, 'ingredient', 'rice', 'ricexdsertlo', '2015-05-03 07:17:22', NULL, NULL),
(21, 11, 'dish', 'satay', 'satayvgyuhje', '2015-05-03 07:18:18', NULL, NULL),
(22, 11, 'cuisine', 'malay', 'malayserdcft', '2015-05-03 07:18:18', NULL, NULL),
(23, 12, 'dish', 'rendang', 'rendangercvl', '2015-05-03 07:19:17', NULL, NULL),
(24, 12, 'colour', 'green', 'greenokmnjiu', '2015-05-03 07:19:17', NULL, NULL),
(25, 13, 'dish', 'layer cake', 'layercakerci', '2015-05-03 07:20:40', NULL, NULL),
(26, 13, 'ingredient', 'vegetable', 'vegetableiux', '2015-05-03 07:20:40', NULL, NULL),
(27, 14, 'cuisine', 'seafood', 'seafoodnoexr', '2015-05-03 07:21:34', NULL, NULL),
(28, 14, 'ingredient', 'crab', 'craberiobhnj', '2015-05-03 07:21:34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t0122_game_submission`
--

CREATE TABLE IF NOT EXISTS `t0122_game_submission` (
  `id` int(11) unsigned NOT NULL,
  `facebook_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `play_time` int(5) unsigned NOT NULL,
  `hash` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t0123_game_leaderboard`
--

CREATE TABLE IF NOT EXISTS `t0123_game_leaderboard` (
  `id` int(10) unsigned NOT NULL,
  `facebook_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `play_time_min` tinyint(4) unsigned NOT NULL,
  `play_time_sec` tinyint(4) unsigned NOT NULL,
  `played_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rank` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t0201_socialbuzz`
--

CREATE TABLE IF NOT EXISTS `t0201_socialbuzz` (
  `id` int(10) unsigned NOT NULL,
  `platform` enum('facebook','twitter','instagram') COLLATE utf8_unicode_ci NOT NULL,
  `feed_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('text','photo') COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t0201_socialbuzz`
--

INSERT INTO `t0201_socialbuzz` (`id`, `platform`, `feed_id`, `type`, `message`, `picture`, `post_link`, `posted_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'twitter', '596260477891547136', 'text', '@Para2601 Thank you Parames. Do stay tuned for more updates! :)', '', '', '2015-05-07 10:29:10', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(2, 'twitter', '596260296148144130', 'text', '@MissNazira Hihi!!! Awww thank you so much. Do stay tuned to find out more Nazira! :)', '', '', '2015-05-07 10:28:27', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(3, 'twitter', '596260135934111744', 'text', '@jjnethanael Hi Nethanael, thank you for supporting us. :)', '', '', '2015-05-07 10:27:49', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(4, 'twitter', '595971284946669568', 'text', 'Kata periuk belanga hitam = The pot calls the kettle black #OhMyEnglish #proverbs #pepatah #peribahasa #dwibahasa #translation', '', '', '2015-05-06 15:20:01', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(5, 'twitter', '595970982533181440', 'text', 'Kecil umpama semut = As small as an ant #OhMyEnglish #LearnEnglish #perumpamaan', '', '', '2015-05-06 15:18:49', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(6, 'twitter', '595970522682232832', 'text', '"You open fast where?" #SYS #OhMyEnglish #LearnEnglish #throwback', '', '', '2015-05-06 15:16:59', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(7, 'instagram', '978993420675232811_211454780', 'photo', 'Let''s learn some new #words! #OhMyEnglish #learnEnglish #vocabulary #grammar #funlearning', 'https://scontent.cdninstagram.com/hphotos-xfa1/t51.2885-15/e15/11203426_1426882877618995_1067912694_n.jpg', 'https://instagram.com/p/2WFVREyrQr/', '2015-05-06 15:12:11', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(8, 'facebook', '227747950638855_849114888502155', 'text', 'Tahukah anda bahawa setiap episod #OhMyEnglish mengandungi 3 kapsul pendek untuk menerangkan penggunaan Bahasa Inggeris dengan tepat?', '', '', '2015-05-06 06:50:16', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(9, 'twitter', '595621755458293761', 'text', 'RT @daft64: @Oh_My_English though I had to pick between Jibam and him, it was a hard decision.', '', '', '2015-05-05 16:11:07', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(10, 'twitter', '595621712588316674', 'text', 'RT @Para2601: @oh_my_english Yes we r!!!', '', '', '2015-05-05 16:10:57', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(11, 'twitter', '595595846973923328', 'text', 'RT now if you can''t wait to watch the new season of #OhMyEnglish! #LearnEnglish', '', '', '2015-05-05 14:28:10', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(12, 'twitter', '595485641695080448', 'text', '@Para2601 Thank you for responding to this question. :)', '', '', '2015-05-05 07:10:15', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(13, 'twitter', '595485063816421377', 'text', '@daft64 Wowwww! Why See Yew Soon? :)', '', '', '2015-05-05 07:07:57', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(14, 'facebook', '227747950638855_848700138543630', 'text', 'Share with us other ''double negatives'' that you know :)', '', '', '2015-05-05 05:42:44', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(15, 'facebook', '227747950638855_848637111883266', 'text', 'WeLL....I can''t wait for OME ! Season 4.. :v hoho..But something bother me :3 .. Henry is ENGLISH people right ?? Why not he use "BRITISH ENGLISH ACCENT" LoL', '', '', '2015-05-05 01:28:15', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(16, 'twitter', '595377838422790144', 'text', 'Tanam lalang tak akan tumbuh padi = You can’t make a silk purse out of a sow’s ear #OhMyEnglish #LearnEnglish #Proverbs #Peribahasa', '', '', '2015-05-05 00:01:52', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(17, 'twitter', '595377705740210177', 'text', '"Amboi bukan main lagi kamu semua ni, ye? Main bola kat tengah-tengah susur gajah ni!" #PuanAida #OhMyEnglish #throwback', '', '', '2015-05-05 00:01:21', '2015-05-07 10:42:03', '2015-05-14 11:06:26', NULL),
(18, 'twitter', '595030835985657856', 'text', 'Happy #StarWarsDay peeps! #OhMyEnglish #StarWarsDay http://t.co/M9CE4vHLWm', '', '', '2015-05-04 01:03:01', '2015-05-07 10:42:03', '2015-05-12 12:53:57', NULL),
(19, 'instagram', '977114575923754832_211454780', 'photo', '"The force is strong with this one." Happy #StarWars Day! #StarWarsDay #OhMyEnglish #PopCulture', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11226778_382486075288029_713116947_n.jpg', 'https://instagram.com/p/2PaIeiyrdQ/', '2015-05-04 00:59:16', '2015-05-07 10:42:03', '2015-05-12 12:53:57', NULL),
(20, 'facebook', '227747950638855_848070655273245', 'text', 'Happy Star Wars Day, peeps!', '', '', '2015-05-03 17:01:23', '2015-05-07 10:42:03', '2015-05-12 12:53:57', NULL),
(21, 'twitter', '594848216543207425', 'text', 'Dalam kelas #OhMyEnglish, siapa yang kamu ingin jadikan #BFF kamu? #OhMyEnglish #BigChanges', '', '', '2015-05-03 12:57:21', '2015-05-07 10:42:03', '2015-05-12 12:53:57', NULL),
(22, 'twitter', '594848076688334848', 'text', 'Sepandai-pandai tupai melompat, akhirnya jatuh ke tanah juga = Curses, like chickens, come home to roost #OhMyEnglish #Proverbs #Peribahasa', '', '', '2015-05-03 12:56:47', '2015-05-07 10:42:03', '2015-05-12 12:53:57', NULL),
(23, 'facebook', '227747950638855_847863268627317', 'text', 'How would you react if somebody you know changed the way they live, or their personality?', '', '', '2015-05-03 04:40:16', '2015-05-07 10:42:03', '2015-05-12 12:53:57', NULL),
(24, 'twitter', '594508040440713216', 'text', '@JefryShafrezZ98 Stay tuned :P', '', '', '2015-05-02 14:25:36', '2015-05-07 10:42:03', '2015-05-12 12:53:57', NULL),
(25, 'twitter', '594507634817912832', 'text', 'Jika tidak dipecahkan ruyung, manakan dapat sagunya = You can’t make bricks without straw #OhMyEnglish #LearnEnglish #Proverbs #Peribahasa', '', '', '2015-05-02 14:24:00', '2015-05-07 10:42:03', '2015-05-12 12:53:57', NULL),
(26, 'twitter', '594507457180794881', 'text', '"How can you have no heart and stomach!" #Jibam #OhMyEnglish #throwback #LearnEnglish', '', '', '2015-05-02 14:23:17', '2015-05-07 10:42:03', '2015-05-12 12:53:57', NULL),
(27, 'twitter', '594507187973595137', 'text', '#BigChanges are happening to #OhMyEnglish this 7 June 2015, 6.30 pm! RT! RT!', '', '', '2015-05-02 14:22:13', '2015-05-07 10:42:03', '2015-05-12 12:53:57', NULL),
(28, 'instagram', '976068337359041809_211454780', 'photo', 'Someone is coming back to #SMKAyerDalam! Guess who?! #OhMyEnglish #LearnEnglish', 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/e15/11203418_758349207613651_182377590_n.jpg', 'https://instagram.com/p/2LsPs8yrUR/', '2015-05-02 14:20:34', '2015-05-07 10:42:03', '2015-05-12 12:53:57', NULL),
(29, 'facebook', '227747950638855_847538551993122', 'text', 'when is the upcoming season??', '', '', '2015-05-02 06:56:16', '2015-05-07 10:42:03', '2015-05-11 03:36:14', NULL),
(30, 'facebook', '227747950638855_847527108660933', 'text', 'Someone is coming back to SMK Ayer Dalam! Guess who?!', '', '', '2015-05-02 06:18:18', '2015-05-07 10:42:03', '2015-05-11 03:36:14', NULL),
(31, 'twitter', '594154536459063296', 'text', 'Like father like son = Bagaimana acuan begitulah kuihnya. #OhMyEnglish #LearnEnglish #Proverbs #Peribahasa #Pepatah', '', '', '2015-05-01 15:00:55', '2015-05-07 10:42:03', '2015-05-11 03:36:14', NULL),
(32, 'twitter', '594154369123094528', 'text', 'Siapa di antara kamu yang telah mengalami perubahan ketara tahun ini #BigChanges #OhMyEnglish', '', '', '2015-05-01 15:00:15', '2015-05-07 10:42:03', '2015-05-11 03:36:14', NULL),
(33, 'twitter', '594119406688407553', 'text', 'RT @Para2601: @oh_my_english Yeap!!! Really enjoying this weekend!!!It''s awesome!''/?0)', '', '', '2015-05-01 12:41:19', '2015-05-07 10:42:03', '2015-05-11 03:36:14', NULL),
(34, 'instagram', '975277165048935750_211454780', 'photo', 'Dup dap berdebar-debar rasanya! Jom saksikan kehebatan peserta-peserta Ceria Popstar musim ke-3, MALAM INI pukul 9 malam hanya di Astro Ceria & Maya HD #ceriapopstar @astroceria', 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/e15/11205812_560919540716075_1300835885_n.jpg', 'https://instagram.com/p/2I4WoUSrVG/', '2015-05-01 12:08:39', '2015-05-07 10:42:03', '2015-05-11 03:36:14', NULL),
(35, 'twitter', '594006181888163840', 'text', 'Enjoy your long weekend, folks! #OhMyEnglish #publicholiday #labourday #Malaysia', '', '', '2015-05-01 05:11:24', '2015-05-07 10:42:03', '2015-05-11 03:36:14', NULL),
(36, 'facebook', '227747950638855_846917722055205', 'text', 'Happy Labour Day & have a fabulous long weekend ahead!', '', '', '2015-04-30 21:05:07', '2015-05-07 10:42:03', '2015-05-09 13:41:13', NULL),
(37, 'twitter', '593672935237296129', 'text', '@lutherkon17 Hi Luther, thank you so much for your support all this while. We truly appreciate your honest feedback.', '', '', '2015-04-30 07:07:12', '2015-05-07 10:42:03', '2015-05-09 13:41:13', NULL),
(38, 'facebook', '227747950638855_846551125425198', 'text', 'Pernahkah anda mencuba teknik ini untuk mengembangkan isi karangan anda?', '', '', '2015-04-30 06:15:37', '2015-05-07 10:42:03', '2015-05-09 13:41:13', NULL),
(39, 'facebook', '227747950638855_845917795488531', 'text', 'Some tips for you guys :)', '', '', '2015-04-29 06:30:39', '2015-05-07 10:42:03', '2015-05-08 02:19:36', NULL),
(40, 'twitter', '593248876221497345', 'text', '@lutherkon17 Hi Luther, sad that you didn''t enjoy the show. Do you have any feedback for us to improve? Thank you :)', '', '', '2015-04-29 03:02:08', '2015-05-07 10:42:03', '2015-05-08 02:19:36', NULL),
(41, 'instagram', '973190786345252714_211454780', 'photo', 'How would you describe your hair? #OhMyEnglish #LearnEnglish #Vocabulary #Words (Source : English and the City)', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/e15/11199501_688718781239683_1562402237_n.jpg', 'https://instagram.com/p/2Bd90uyrdq/', '2015-04-28 15:03:23', '2015-05-07 10:42:03', '2015-05-08 02:19:36', NULL),
(42, 'twitter', '593022892385775616', 'text', 'Pejamkan mata anda, bayangkan di masa akan datang anda sudah hebat menggunakan Bahasa Inggeris! #OhMyEnglish #Motivasi #KataSemangat', '', '', '2015-04-28 12:04:10', '2015-05-07 10:42:03', '2015-05-08 02:19:36', NULL),
(43, 'twitter', '593022704170610688', 'text', '"Paddle your own canoe" = "Sauk air mandikan diri" #OhMyEnglish #LearnEnglish #Proverbs #Pepatah #Peribahasa #Sayings', '', '', '2015-04-28 12:03:25', '2015-05-07 10:42:03', '2015-05-08 02:19:36', NULL),
(44, 'twitter', '593022574793068544', 'text', 'Apparatus = Radas #OhMyEnglish #LearnEnglish #Translation #Words #Maksud', '', '', '2015-04-28 12:02:54', '2015-05-07 10:42:03', '2015-05-08 02:19:36', NULL),
(45, 'facebook', '227747950638855_845363472210630', 'text', 'Kitchen tools & gadgets :)', '', '', '2015-04-28 07:00:36', '2015-05-07 10:42:03', '2015-05-08 02:19:36', NULL),
(66, 'twitter', '596320534335356928', 'text', 'Looks like SYS is back with a bang! What''s with the bruised eye? Find out tomorrow! #OhMyEnglish #OME2015 http://t.co/v9PneZSDWS', '', '', '2015-05-07 14:27:49', '2015-05-08 02:19:36', '2015-05-14 11:06:26', NULL),
(67, 'instagram', '979695429002901009_211454780', 'photo', 'Looks like SYS is back with a bang! What''s with the bruised eye? Stay tuned to find out how he got it... and the premiere date for "Oh My English! Class of 2015"! #OhMyEnglish #OME2015 #OMEClassof2015 @roaxtan', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/e15/11208105_831883750217617_1080064771_n.jpg', '', '2015-05-07 14:26:57', '2015-05-08 02:19:36', '2015-05-14 11:06:26', NULL),
(68, 'twitter', '596291437722898432', 'text', 'Uh oh! What''s Mazlee so shocked about? Tomorrow, we''ll reveal what he saw! Stay tuned! #OhMyEnglish #OME2015 http://t.co/AbQLxvHaQd', '', '', '2015-05-07 12:32:11', '2015-05-08 02:19:36', '2015-05-14 11:06:26', NULL),
(69, 'instagram', '979637123504846058_211454780', 'photo', 'Uh oh! What''s Mazlee so shocked about? Tomorrow, we''ll reveal what he saw... AND the official premiere date for #OhMyEnglish''s brand new season! Stay tuned! @zhafheybat #LearnEnglish #OME2015', 'https://scontent.cdninstagram.com/hphotos-xfa1/t51.2885-15/e15/11243660_1128668373815249_1301430838_n.jpg', '', '2015-05-07 12:31:07', '2015-05-08 02:19:36', '2015-05-14 11:06:26', NULL),
(70, 'facebook', '218640731587394_776024885848973', 'text', 'Oops?! Why I act this way in Oh My English?', '', '', '2015-05-07 07:13:44', '2015-05-08 02:19:36', '2015-05-14 11:06:26', NULL),
(71, 'facebook', '227747950638855_849489345131376', 'text', 'Looks like SYS is back with a bang! What''s with the bruised eye? Stay tuned to find out how he got it... and the premiere date for "Oh My English! Class of 2015"!', '', '', '2015-05-07 06:25:13', '2015-05-08 02:19:36', '2015-05-14 11:06:26', NULL),
(72, 'facebook', '227747950638855_849457761801201', 'text', 'Uh oh! What''s Mazlee so shocked about? Tomorrow, we''ll reveal what he saw... AND the official premiere date for Oh My English''s brand new season! Stay tuned!', '', '', '2015-05-07 04:28:35', '2015-05-08 02:19:36', '2015-05-14 11:06:26', NULL),
(81, 'twitter', '597021564551368704', 'text', 'Zack has got a new pick-up line! Watch the FULL video here : https://t.co/Mxo1goXisD @juzzthinx #OhMyEnglish #OME2015', '', '', '2015-05-09 12:53:27', '2015-05-09 13:13:34', '2015-05-14 11:06:26', NULL),
(82, 'instagram', '981071071543997654_211454780', 'photo', 'Zack has got a new pick-up line! Watch the FULL video here : https://youtu.be/S84D8XrQ618. Don''t forget to watch the new season of #OhMyEnglish starting Sunday, 7 June at 6.30PM via Astro TVIQ (610) and Maya HD (135)! @officialjuzzthin', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11259160_927147353972025_297856904_n.jpg', 'https://instagram.com/p/2ddvEOyrTW/', '2015-05-09 12:00:07', '2015-05-09 13:13:34', '2015-05-14 11:06:26', NULL),
(83, 'facebook', '227747950638855_850202401726737', 'text', 'Zack has got a new pick-up line! Watch this video to find out what it is! Don''t forget to watch the new season of Oh My English starting Sunday, 7 June at 6.30PM via Astro TVIQ (610) and Maya HD (135)!', '', '', '2015-05-09 03:50:36', '2015-05-09 13:13:34', '2015-05-14 11:06:26', NULL),
(84, 'twitter', '596674889630621696', 'text', 'Zack has found a new love interest! Who could it be? Visit http://t.co/DaMtkqgEWV to find out now! #OhMyEnglish http://t.co/6Tadz1W799', '', '', '2015-05-08 13:55:54', '2015-05-09 13:13:34', '2015-05-14 11:06:26', NULL),
(85, 'instagram', '980402561058780949_211454780', 'photo', 'Zack has found a new love interest! Who could it be? Stay tuned to find out or visit http://youtu.be/S84D8XrQ618 now! @officialjuzzthin', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11249973_1634094633492337_1577436170_n.jpg', 'https://instagram.com/p/2bFu9UyrcV/', '2015-05-08 13:51:54', '2015-05-09 13:13:34', '2015-05-14 11:06:26', NULL),
(86, 'instagram', '980345936058955058_211454780', 'photo', 'Jom saksikan bakat kawan kawan kita menyanyi di Konsert Ceria Popstar 3! Segalanya Bermula Disini. Setiap Jumaat, jam 9 malam hanya di Astro Ceria saluran 611. Untuk kita aje! #ceriapopstar', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11241873_826340750775213_1541451706_n.jpg', 'https://instagram.com/p/2a429LyrUy/', '2015-05-08 11:59:24', '2015-05-09 13:13:34', '2015-05-14 11:06:26', NULL),
(87, 'twitter', '596555319825674242', 'text', 'Find out how @roaxtan got a bruised eye : http://t.co/qgo6EbYtAF @AkhmalNazri #SYS #Jibam #OhMyEnglish #OME2015', '', '', '2015-05-08 06:00:46', '2015-05-09 13:13:34', '2015-05-14 11:06:26', NULL),
(88, 'instagram', '980163584900904450_211454780', 'photo', 'Ohhh, so THIS is how SYS got a bruised eye! Check out the video, guys - and don''t forget to share it with your friends! Watch the FULL video at #OhMyEnglish''s YouTube page : http://youtu.be/DWNx351Seas. Remember, the new season of Oh My English starts Sun', 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/e15/11205719_494876533999886_1210735358_n.jpg', 'https://instagram.com/p/2aPZZbyrYC/', '2015-05-08 05:57:06', '2015-05-09 13:13:34', '2015-05-14 11:06:26', NULL),
(89, 'facebook', '227747950638855_849897298423914', 'text', 'Zack has found a new love interest! Who could it be? Stay tuned to find out or visit http://youtu.be/S84D8XrQ618 now!', '', '', '2015-05-08 05:52:20', '2015-05-09 13:13:34', '2015-05-14 11:06:26', NULL),
(90, 'twitter', '596520612727652352', 'text', '@Salshabila_GMC Hi Salshabila, stay tuned for more updates! :)', '', '', '2015-05-08 03:42:51', '2015-05-09 13:13:34', '2015-05-14 11:06:26', NULL),
(91, 'facebook', '227747950638855_849763578437286', 'text', 'Ohhh, so THIS is how SYS got a bruised eye! Check out the video, guys - and don''t forget to share it with your friends! Remember, the new season of Oh My English starts Sunday, 7 June at 6.30PM on Astro TVIQ (610) and Maya HD (135)!', '', '', '2015-05-07 20:47:58', '2015-05-09 13:13:34', '2015-05-14 11:06:26', NULL),
(97, 'instagram', '981817838849930269_211454780', 'photo', 'Apakah yang berlaku seterusnya? ', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11226720_456400134526762_964802410_n.jpg', 'https://instagram.com/p/2gHh9eyrQd/', '2015-05-10 12:43:48', '2015-05-11 03:36:14', '2015-05-14 11:06:26', NULL),
(98, 'twitter', '597325995960446976', 'text', 'Someone got reaaaaally BIG over the holidays. Guess who! #OhMyEnglish #OME2015 http://t.co/ylErMed3CW', '', '', '2015-05-10 09:03:09', '2015-05-11 03:36:14', '2015-05-14 11:06:26', NULL),
(99, 'instagram', '981706404161828036_211454780', 'photo', 'Someone got reaaaaally BIG over the holidays. Guess who! #OhMyEnglish #OME2015', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11241322_1386773274986002_1032867560_n.jpg', 'https://instagram.com/p/2fuMX1yrTE/', '2015-05-10 09:02:24', '2015-05-11 03:36:14', '2015-05-14 11:06:26', NULL),
(100, 'twitter', '597296329564389376', 'text', 'Comelnya.. Perut siapa ni? ', '', '', '2015-05-10 07:05:16', '2015-05-11 03:36:14', '2015-05-14 11:06:26', NULL),
(101, 'instagram', '981646626161079367_211454780', 'photo', 'Comelnya... Perut siapa ni? #OhMyEnglish #OME2015', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11226747_429897600518258_1090458207_n.jpg', 'https://instagram.com/p/2fgmfPSrRH/', '2015-05-10 07:03:38', '2015-05-11 03:36:14', '2015-05-14 11:06:26', NULL),
(102, 'facebook', '227747950638855_850559325024378', 'text', 'Haaaa.... nak tahu kenapa Mazlee kelihatan terkejut tempoh hari? Video ini ada jawapannya! Tengok jangan tak tengok tau :) Pastikan anda menonton musim terbaru Oh My English bermula Ahad, 7 Jun 2015, jam 6:30 petang menerusi saluran Astro TVIQ (610) dan M', '', '', '2015-05-10 04:20:00', '2015-05-11 03:36:14', '2015-05-14 11:06:26', NULL),
(103, 'facebook', '227747950638855_850530925027218', 'text', 'Someone got reaaaaally BIG over the holidays. Guess who!', '', '', '2015-05-10 01:01:51', '2015-05-11 03:36:14', '2015-05-14 11:06:26', NULL),
(104, 'facebook', '227747950638855_850510505029260', 'text', 'Comelnya... Perut siapa ni?', '', '', '2015-05-09 23:04:14', '2015-05-11 03:36:14', '2015-05-14 11:06:26', NULL),
(112, 'twitter', '598079126528856065', 'text', 'RT @ibnzakuan: @Oh_My_English mr midelton?!! Omg ', '', '', '2015-05-12 10:55:50', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(113, 'twitter', '598079110930280448', 'text', 'RT @zxl96: can''t wait for oh my english class of 2015!!! #OME2015 @Oh_My_English', '', '', '2015-05-12 10:55:46', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(114, 'twitter', '598079083868659712', 'text', 'RT @arvinvevo: @Oh_My_English i guess im not the only one who''s waiting. ☺️☺️yippie', '', '', '2015-05-12 10:55:40', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(115, 'twitter', '598079061487849472', 'text', 'RT @MissNazira: @Oh_My_English Okay, I will wait. Hoping it more than my expected for ths new seasons. Hehe', '', '', '2015-05-12 10:55:34', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(116, 'twitter', '598076674249371648', 'text', '@MissNazira Thank you for your continuous support! :)', '', '', '2015-05-12 10:46:05', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(117, 'twitter', '598076431801786369', 'text', '@Para2601 Yay! Thank you for your continuous support! :)', '', '', '2015-05-12 10:45:07', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(118, 'twitter', '598076109704429569', 'text', '@ninajihah Hihi! Stay tuned for more updates and don''t forget to catch the new season of Oh My English! Thank you :)', '', '', '2015-05-12 10:43:50', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(119, 'twitter', '598073202183569408', 'text', '"Masuk kandang kambing mengembik, masuk kandang kerbau menguak" = "When in Rome, do as the Romans do" #OhMyEnglish #Peribahasa #Proverbs', '', '', '2015-05-12 10:32:17', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(120, 'twitter', '598072077669666818', 'text', 'Rasa-rasanyalah.. adakah #SYS akan mengenakan GST pada barang-barang yang dijualnya? Jom bincang! #OhMyEnglish #OME2015 #OMEClassof2015', '', '', '2015-05-12 10:27:49', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(121, 'instagram', '982570569969612369_211454780', 'photo', 'It is not an easy task to be in a big suit but we are proud of @therealzainsaidin for handling it like a PRO! #OhMyEnglish #OME2015 #OMEClassof2015', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11240440_949457021771316_2061252745_n.jpg', 'https://instagram.com/p/2iyro9yrZR/', '2015-05-11 13:39:21', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(122, 'twitter', '597717620461215744', 'text', '@arvinvevo Yay! Thank you for your continuous support! :)', '', '', '2015-05-11 10:59:20', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(123, 'twitter', '597717310418194432', 'text', '@MissNazira Hihi surprise!! Make sure you don''t forget to catch Oh My English''s brand new season! :)', '', '', '2015-05-11 10:58:06', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(124, 'twitter', '597716550322294784', 'text', '@arvinvevo Hihi stay tuned and watch Oh My English''s brand new season! :)', '', '', '2015-05-11 10:55:05', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(125, 'twitter', '597716338321137664', 'text', '@ibnzakuan Hihi stay tuned and watch Oh My English''s brand new season! :)', '', '', '2015-05-11 10:54:14', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(126, 'twitter', '597716023949668352', 'text', '@zxl96 Yeah! We too can''t wait to watch the new season! :)', '', '', '2015-05-11 10:52:59', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(127, 'twitter', '597715763797983233', 'text', '@Para2601 Hihi. Make sure you don''t forget to catch Oh My English''s brand new season! :)', '', '', '2015-05-11 10:51:57', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(128, 'facebook', '227747950638855_851008121646165', 'text', 'What changed, Jibam? You look so…. Different!', '', '', '2015-05-11 05:52:16', '2015-05-12 12:53:57', '2015-05-14 11:06:26', NULL),
(143, 'twitter', '598712514646450179', 'text', 'Tong kosong nyaring bunyinya = Empty vessels make the most noise #OhMyEnglish #OME2015 #Peribahasa #Pepatah #Proverbs', '', '', '2015-05-14 04:52:41', '2015-05-14 11:06:26', NULL, NULL),
(144, 'twitter', '598712324724101120', 'text', 'Siapakah di antara para pelajar #SMKAyerDalam yang selalu berubah pendiriannya? #OhMyEnglish #OME2015', '', '', '2015-05-14 04:51:56', '2015-05-14 11:06:26', NULL, NULL),
(145, 'twitter', '598712128355205120', 'text', '"Tepung pun tak tahu?!" #CikguBedah #OhMyEnglish #throwback', '', '', '2015-05-14 04:51:09', '2015-05-14 11:06:26', NULL, NULL),
(146, 'twitter', '598707103352508417', 'text', 'Hihi! Terima kasih Parames @Para2601. :)', '', '', '2015-05-14 04:31:11', '2015-05-14 11:06:26', NULL, NULL),
(147, 'instagram', '984407498625300115_211454780', 'photo', 'ANUSHA IS 39… and SYS is only 14?! How many of you have tried this app? Let us know YOUR results! #OhMyEnglish #HowOld #OME2015', 'https://scontent.cdninstagram.com/hphotos-xfa1/t51.2885-15/e15/11257802_462083237289339_269292009_n.jpg', 'https://instagram.com/p/2pUWeFyraT/', '2015-05-14 02:29:00', '2015-05-14 11:06:26', NULL, NULL),
(148, 'twitter', '598628910645940224', 'text', 'RT @izzulf_ismail: Pelakon bru dlm oh my English tu lawanyeee ❤', '', '', '2015-05-13 23:20:28', '2015-05-14 11:06:26', NULL, NULL),
(149, 'twitter', '598628895412228096', 'text', 'RT @nadiraismyname: Best jugak tengok oh my english! ni', '', '', '2015-05-13 23:20:25', '2015-05-14 11:06:26', NULL, NULL),
(150, 'twitter', '598628819314941952', 'text', 'RT @AzriFakhrul: Sweep her off her feet..  Oh my english', '', '', '2015-05-13 23:20:07', '2015-05-14 11:06:26', NULL, NULL),
(151, 'twitter', '598628803041046528', 'text', 'RT @Para2601: @Oh_My_English tak sabar nak tengok OME...Terutamanya SYS...hihi sebab nak tahu dia kenakan GST ke tak !!!;)', '', '', '2015-05-13 23:20:03', '2015-05-14 11:06:26', NULL, NULL),
(152, 'instagram', '983986211054597889_211454780', 'photo', 'Special effects for #feedHenry #OhMyEnglish #OME2015 #OMEClassof2015', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11263282_809383582509352_142423071_n.jpg', 'https://instagram.com/p/2n0j7dyrcB/', '2015-05-13 12:31:58', '2015-05-14 11:06:26', NULL, NULL),
(153, 'instagram', '983985443547297519_211454780', 'photo', 'Some of the things needed to make the brand new Henry Middleton! #OhMyEnglish #OME2015 #OMEClassof2015 #FeedHenry', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11259924_898847966840578_2072971152_n.jpg', 'https://instagram.com/p/2n0Ywqyrbv/', '2015-05-13 12:30:27', '2015-05-14 11:06:26', NULL, NULL),
(154, 'facebook', '227747950638855_851719148241729', 'text', 'Who VS Whom', '', '', '2015-05-13 06:14:47', '2015-05-14 11:06:26', NULL, NULL),
(155, 'twitter', '598330373374746624', 'text', '@Zeeni06 Yay! We can''t wait too! :)', '', '', '2015-05-13 03:34:12', '2015-05-14 11:06:26', NULL, NULL),
(156, 'twitter', '598330185864220675', 'text', '@Para2601 Hihi! Kalau nak tahu sama ada SYS kenakan GST atau tidak, nantikan musim terbaru "Oh My English!" ya. Terima kasih Parames! :)', '', '', '2015-05-13 03:33:27', '2015-05-14 11:06:26', NULL, NULL),
(157, 'facebook', '227747950638855_486053404893105', 'text', 'Salam dan selamat sejahtera semua.mari kita dapatkan kredit percuma dari mcent.anda hanya perlu klik pada link di bawah ini dan install aplikasi mcent tersebut. Dah install nnt ada beberapa app yang mcent suruh kita\ndownload...setiap kali download mereka ', '', '', '2015-05-12 15:27:55', '2015-05-14 11:06:26', NULL, NULL),
(158, 'facebook', '227747950638855_851401938273450', 'text', 'For example, Anusha and Hani swapped their email addresses so they could keep in touch.', '', '', '2015-05-12 07:07:39', '2015-05-14 11:06:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t9401_log_general`
--

CREATE TABLE IF NOT EXISTS `t9401_log_general` (
  `id` int(11) unsigned NOT NULL,
  `level_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `environment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t9401_log_general`
--

INSERT INTO `t9401_log_general` (`id`, `level_name`, `message`, `environment`, `created_at`, `created_ip`) VALUES
(1, 'ERROR', 'Undefined property: Facebook\\GraphUser::$id', '{"inputs":{"play_time":"100","facebook_access_token":"CAAOwiR2L0UcBAC8rjkoB9cnHyQEz0qJNiF3ZAdhHjMsZATfHGznnAJMLEmlZB2t1OQoBFiW8vH3sLA8D3XUd2wemalziw2ZBw7C6e56ZB9lXZCUSu8BsBpyw6Nm4xlIJRqejYZB2c98dmpFSpC554o1ax1svEw8VknZBZB3ybXfh0IzpzNnnOMPD4xRaB6nAkgzjZBs2Bs7iZC8nRJmj4TxFOQb"}}', '2015-05-03 09:33:54', '127.0.0.1'),
(2, 'ERROR', 'Undefined property: Facebook\\GraphUser::$id', '{"inputs":{"play_time":"100","facebook_access_token":"CAAOwiR2L0UcBAC8rjkoB9cnHyQEz0qJNiF3ZAdhHjMsZATfHGznnAJMLEmlZB2t1OQoBFiW8vH3sLA8D3XUd2wemalziw2ZBw7C6e56ZB9lXZCUSu8BsBpyw6Nm4xlIJRqejYZB2c98dmpFSpC554o1ax1svEw8VknZBZB3ybXfh0IzpzNnnOMPD4xRaB6nAkgzjZBs2Bs7iZC8nRJmj4TxFOQb"}}', '2015-05-03 09:34:00', '127.0.0.1'),
(3, 'ERROR', 'Undefined property: Facebook\\GraphUser::$id', '{"inputs":{"play_time":"100","facebook_access_token":"CAAOwiR2L0UcBAC8rjkoB9cnHyQEz0qJNiF3ZAdhHjMsZATfHGznnAJMLEmlZB2t1OQoBFiW8vH3sLA8D3XUd2wemalziw2ZBw7C6e56ZB9lXZCUSu8BsBpyw6Nm4xlIJRqejYZB2c98dmpFSpC554o1ax1svEw8VknZBZB3ybXfh0IzpzNnnOMPD4xRaB6nAkgzjZBs2Bs7iZC8nRJmj4TxFOQb"}}', '2015-05-03 09:34:36', '127.0.0.1'),
(4, 'ERROR', 'SQLSTATE[HY093]: Invalid parameter number: parameter was not defined (SQL: \n       SELECT FIND_IN_SET( `play_time`, ( SELECT GROUP_CONCAT( `play_time` ORDER BY `play_time` ASC ) FROM `t0122_game_submission` ) ) AS `rank`\n         FROM `t0122_game_submission`\n            WHERE `id` = :id\n              ORDER BY `rank` ASC\n               LIMIT 30;\n     )', '{"inputs":{"play_time":"101","key":"2015-05-03T10:53:41.558Z","hash":"914512587efbd87c4b7e875f1211cbb305bf799a","facebook_access_token":"CAAOwiR2L0UcBACbEzAyRbG0beRWgPEwzZClHsCfSbyjYVc7zFv6j7p5Us5ABmnZAtdM0AZBcSkGYrZBoweHRBaTMcNbZB0qm1oq8ishBIemgtUOLPVjkeXAspEViAMi9QZA2ntfFpvX0r8iXgl9gUQwvq2zomYBwuv8OwlclZCflBEa67kijnI4sKAzEIvJEOZC3n9gLcjcYtWmubSs4ZCElI"}}', '2015-05-03 10:53:42', '127.0.0.1'),
(5, 'ERROR', 'Trying to get property of non-object', '{"inputs":{"play_time":"102","key":"2015-05-03T10:55:15.931Z","hash":"68d9bd8b63fb8e885d62956281c57a35cb78cda3","facebook_access_token":"CAAOwiR2L0UcBACbEzAyRbG0beRWgPEwzZClHsCfSbyjYVc7zFv6j7p5Us5ABmnZAtdM0AZBcSkGYrZBoweHRBaTMcNbZB0qm1oq8ishBIemgtUOLPVjkeXAspEViAMi9QZA2ntfFpvX0r8iXgl9gUQwvq2zomYBwuv8OwlclZCflBEa67kijnI4sKAzEIvJEOZC3n9gLcjcYtWmubSs4ZCElI"}}', '2015-05-03 10:55:16', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `t9402_log_stored_procedures`
--

CREATE TABLE IF NOT EXISTS `t9402_log_stored_procedures` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `environment1` text COLLATE utf8_unicode_ci,
  `environment2` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t9411_log_insert`
--

CREATE TABLE IF NOT EXISTS `t9411_log_insert` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `table_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `table_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t9412_log_update`
--

CREATE TABLE IF NOT EXISTS `t9412_log_update` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `table_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `table_id` int(11) unsigned NOT NULL,
  `wiped_data` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t9431_log_facebook_feed`
--

CREATE TABLE IF NOT EXISTS `t9431_log_facebook_feed` (
  `id` int(11) unsigned NOT NULL,
  `feed_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t9431_log_facebook_feed`
--

INSERT INTO `t9431_log_facebook_feed` (`id`, `feed_id`, `type`, `status_type`, `message`, `picture`, `posted_at`, `created_at`, `created_ip`) VALUES
(1, '227747950638855_849114888502155', 'status', 'mobile_status_update', 'Tahukah anda bahawa setiap episod #OhMyEnglish mengandungi 3 kapsul pendek untuk menerangkan penggunaan Bahasa Inggeris dengan tepat?', '', '2015-05-06 06:50:16', '2015-05-07 10:41:56', ''),
(2, '227747950638855_848700138543630', 'photo', 'added_photos', 'Share with us other ''double negatives'' that you know :)', 'https://scontent.xx.fbcdn.net/hphotos-xaf1/v/t1.0-9/11203097_848700138543630_2189208064804446422_n.jpg?oh=b868213ccb413d23856d1e6c13f35a09&oe=560C3E72', '2015-05-05 05:42:44', '2015-05-07 10:41:57', ''),
(3, '227747950638855_848637111883266', 'status', 'wall_post', 'WeLL....I can''t wait for OME ! Season 4.. :v hoho..But something bother me :3 .. Henry is ENGLISH people right ?? Why not he use "BRITISH ENGLISH ACCENT" LoL', '', '2015-05-05 01:28:15', '2015-05-07 10:41:57', ''),
(4, '227747950638855_848070655273245', 'photo', 'added_photos', 'Happy Star Wars Day, peeps!', 'https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-xpf1/v/t1.0-9/10981681_848070655273245_7265318664900044125_n.jpg?oh=ef3dbc7b1c2d6c97871ff6c87d701daf&oe=55DC9D60&__gda__=1440871434_cd49622006c78b0575b28bacfa85374e', '2015-05-03 17:01:23', '2015-05-07 10:41:57', ''),
(5, '227747950638855_847863268627317', 'photo', 'added_photos', 'How would you react if somebody you know changed the way they live, or their personality?', 'https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xat1/v/t1.0-9/11210402_847863268627317_5696765386379680558_n.jpg?oh=d8c2d2b606c545540947b28c707963b4&oe=55C19ABA&__gda__=1439543397_64d121579c0ed5ef5cdf0fc4992f1b1f', '2015-05-03 04:40:16', '2015-05-07 10:41:57', ''),
(6, '227747950638855_847538551993122', 'status', 'wall_post', 'when is the upcoming season??', '', '2015-05-02 06:56:16', '2015-05-07 10:41:57', ''),
(7, '227747950638855_847527108660933', 'photo', 'added_photos', 'Someone is coming back to SMK Ayer Dalam! Guess who?!', 'https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-xfp1/v/t1.0-9/11162202_847527108660933_7085374889907676551_n.jpg?oh=467d5d8d5534af5f59c3a1e38845a39f&oe=55D4B7A7&__gda__=1440539182_3d445a7a4104b94ad1cc5e3acfa0d4d0', '2015-05-02 06:18:18', '2015-05-07 10:41:58', ''),
(8, '227747950638855_846917722055205', 'status', 'mobile_status_update', 'Happy Labour Day & have a fabulous long weekend ahead!', '', '2015-04-30 21:05:07', '2015-05-07 10:41:58', ''),
(9, '227747950638855_846551125425198', 'photo', 'added_photos', 'Pernahkah anda mencuba teknik ini untuk mengembangkan isi karangan anda?', 'https://scontent.xx.fbcdn.net/hphotos-xpf1/v/t1.0-9/10984137_846550468758597_792988804032874022_n.jpg?oh=6f3ab3530a3d41bd89d013da887a9f7a&oe=55D88A02', '2015-04-30 06:15:37', '2015-05-07 10:41:58', ''),
(10, '227747950638855_845917795488531', 'photo', 'added_photos', 'Some tips for you guys :)', 'https://scontent.xx.fbcdn.net/hphotos-xtp1/v/t1.0-9/11203061_845917708821873_6243783612704620692_n.jpg?oh=f0866287e93bf7d4d2d4093a7400c8e3&oe=55D6C499', '2015-04-29 06:30:39', '2015-05-07 10:41:58', ''),
(11, '227747950638855_845363472210630', 'photo', 'added_photos', 'Kitchen tools & gadgets :)', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xpt1/v/t1.0-9/11140350_845363405543970_2939193770745074326_n.jpg?oh=7d37fa0d250b49326fec16aab9aa936f&oe=55E20731&__gda__=1439037749_8c9da4bf9ba7d1e1a0b29b4bd6295ca1', '2015-04-28 07:00:36', '2015-05-07 10:41:59', ''),
(12, '227747950638855_844743042272673', 'photo', 'added_photos', 'Wow, the English language is spoken in so many countries! \n\n(Source : http://www.washingtonpost.com)', 'https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-xfp1/v/t1.0-9/11181284_844743005606010_6046850789210609147_n.jpg?oh=911fa7306e9dd4bff94fe43f3cf42ab5&oe=55E1A41D&__gda__=1439346324_34ac05d5ed3f13b2434b2378733b09ac', '2015-04-26 23:01:27', '2015-05-07 10:41:59', ''),
(13, '227747950638855_844686308945013', 'status', 'wall_post', 'Nice page!', '', '2015-04-26 20:07:48', '2015-05-07 10:41:59', ''),
(14, '227747950638855_844331962313781', 'photo', 'added_photos', 'Misused & Confused Words', 'https://scontent.xx.fbcdn.net/hphotos-xft1/t31.0-8/11159921_844331708980473_6041544053317269724_o.jpg', '2015-04-26 06:56:30', '2015-05-07 10:41:59', ''),
(15, '227747950638855_1003765352981984', 'photo', 'added_photos', 'Hotdog with BAN (bun)!?? What the heck was that???\n\nPinoy English, Its more fun in OME...', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xta1/t31.0-8/11143174_1003765352981984_806639459449037577_o.jpg', '2015-04-25 17:05:34', '2015-05-07 10:41:59', ''),
(16, '227747950638855_843801892366788', 'photo', 'added_photos', 'Is it the same for you too? (Source : Grammarly)', 'https://scontent.xx.fbcdn.net/hphotos-xfp1/v/t1.0-9/11188457_843801675700143_6918358016149464471_n.jpg?oh=f7fe5bee1762084cad5e885a3a9d62d7&oe=55CE5A56', '2015-04-25 06:46:00', '2015-05-07 10:42:00', ''),
(17, '227747950638855_843639179049726', 'status', 'wall_post', 'Would anybody like to suggest corrections here ?\n1/ In his youngday he was very handsome.\n2/ He got his father''s provity.', '', '2015-04-24 22:26:26', '2015-05-07 10:42:00', ''),
(18, '227747950638855_843337999079844', 'photo', 'added_photos', 'Try to build a sentence using any of the words listed below!', 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xtf1/v/t1.0-9/11112491_843337612413216_4559546910265617067_n.jpg?oh=5c1f8b87dff87817605bcf1033094f03&oe=55CD0838&__gda__=1440453475_25d5dd6d1c0ef138980469b28098a832', '2015-04-24 06:34:13', '2015-05-07 10:42:00', ''),
(19, '227747950638855_842806415799669', 'photo', 'added_photos', 'Try this, friends!', 'https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/11182241_842806359133008_5538634184358523723_n.jpg?oh=e49b003235b54ac39bdc90f2491fe6a9&oe=55C4F90A&__gda__=1443738034_e8e3f9c900fda269d78205b8bcf890ea', '2015-04-23 06:55:20', '2015-05-07 10:42:00', ''),
(20, '227747950638855_638244899640453', 'photo', 'added_photos', 'Selamat petang kawan2..saya menjemput kawan2 datang beramai-ramai ke program Tari Show yang di adakan pada 26 april 2015 (Ahad) bertempat di Menara Kuala Lumpur. program ini mempersembahkan tarian tradisional dan moden dari kalangan kanak-kanak. selain it', 'https://scontent.xx.fbcdn.net/hphotos-xpa1/t31.0-8/11154909_638244899640453_4559247662093219765_o.jpg', '2015-04-21 23:59:23', '2015-05-07 10:42:01', ''),
(21, '227747950638855_842040345876276', 'status', 'mobile_status_update', 'Fill in the blank with the correct answer : \n\nZack is learning how to play _____ guitar at his school. \na) an\nb) a\nc) the', '', '2015-04-21 20:58:19', '2015-05-07 10:42:01', ''),
(22, '227747950638855_841696845910626', 'photo', 'added_photos', 'List of prepositions :)', 'https://scontent.xx.fbcdn.net/hphotos-xtp1/v/t1.0-9/11150687_841696705910640_3378673299969123161_n.jpg?oh=ab75154f475577e067c13963c5287b8d&oe=55DFF834', '2015-04-21 08:00:03', '2015-05-07 10:42:01', ''),
(23, '227747950638855_841135015966809', 'link', 'shared_story', 'Do you say “terror” instead of “brilliant” too? ;) Remember to only use them with fellow Malaysians because other English speakers might not get what you are trying to say! http://www.tallypress.com/fun/10-english-words-only-malaysians-will-understand', '', '2015-04-20 05:04:00', '2015-05-07 10:42:01', ''),
(24, '227747950638855_840534652693512', 'photo', 'added_photos', 'Sebagai rujukan anda :)', 'https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-xfa1/v/t1.0-9/11161340_840534446026866_3243083168769979891_n.jpg?oh=8214e25c00c36722374d04f0f465b583&oe=55D19BA9&__gda__=1438659743_0c2d670d911cb327b32e45f61c7963bb', '2015-04-19 07:23:30', '2015-05-07 10:42:01', ''),
(25, '227747950638855_840102292736748', 'photo', 'added_photos', 'More words for you to use!', 'https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-xft1/t31.0-8/11143450_840102226070088_2453118275232427069_o.jpg', '2015-04-18 07:15:56', '2015-05-07 10:42:02', ''),
(76, '218640731587394_776024885848973', 'photo', 'added_photos', 'Oops?! Why I act this way in Oh My English?', 'https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-xaf1/v/t1.0-9/11203121_776024885848973_3452475570146765081_n.jpg?oh=2337b7357d43b7cd306220e9d19bd3f9&oe=55C62CE5&__gda__=1440363348_c068d00ef4952440deed4e91540696d7', '2015-05-07 07:13:44', '2015-05-08 02:19:28', ''),
(77, '227747950638855_849489345131376', 'photo', 'added_photos', 'Looks like SYS is back with a bang! What''s with the bruised eye? Stay tuned to find out how he got it... and the premiere date for "Oh My English! Class of 2015"!', 'https://scontent.xx.fbcdn.net/hphotos-xft1/t31.0-8/11252499_849489345131376_8781822778807842881_o.png', '2015-05-07 06:25:13', '2015-05-08 02:19:28', ''),
(78, '227747950638855_849457761801201', 'photo', 'added_photos', 'Uh oh! What''s Mazlee so shocked about? Tomorrow, we''ll reveal what he saw... AND the official premiere date for Oh My English''s brand new season! Stay tuned!', 'https://scontent.xx.fbcdn.net/hphotos-xpt1/v/t1.0-9/11151048_849457761801201_5893572111751182795_n.png?oh=1d90fdfa68b7f4a0a69af8a0b9e2123d&oe=55D9464B', '2015-05-07 04:28:35', '2015-05-08 02:19:28', ''),
(101, '227747950638855_850202401726737', 'video', 'added_video', 'Zack has got a new pick-up line! Watch this video to find out what it is! Don''t forget to watch the new season of Oh My English starting Sunday, 7 June at 6.30PM via Astro TVIQ (610) and Maya HD (135)!', '', '2015-05-09 03:50:36', '2015-05-09 13:13:26', ''),
(102, '227747950638855_849897298423914', 'photo', 'added_photos', 'Zack has found a new love interest! Who could it be? Stay tuned to find out or visit http://youtu.be/S84D8XrQ618 now!', 'https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-xap1/v/t1.0-9/11196344_849897298423914_3975129526760367605_n.jpg?oh=5f3b8593500cf36a6ef4693e40404ab7&oe=560A812B&__gda__=1439011831_d07adbb082a965353333cc691c81572a', '2015-05-08 05:52:20', '2015-05-09 13:13:26', ''),
(103, '227747950638855_849763578437286', 'video', 'added_video', 'Ohhh, so THIS is how SYS got a bruised eye! Check out the video, guys - and don''t forget to share it with your friends! Remember, the new season of Oh My English starts Sunday, 7 June at 6.30PM on Astro TVIQ (610) and Maya HD (135)!', '', '2015-05-07 20:47:58', '2015-05-09 13:13:26', ''),
(151, '227747950638855_850559325024378', 'video', 'added_video', 'Haaaa.... nak tahu kenapa Mazlee kelihatan terkejut tempoh hari? Video ini ada jawapannya! Tengok jangan tak tengok tau :) Pastikan anda menonton musim terbaru Oh My English bermula Ahad, 7 Jun 2015, jam 6:30 petang menerusi saluran Astro TVIQ (610) dan M', '', '2015-05-10 04:20:00', '2015-05-11 03:36:06', ''),
(152, '227747950638855_850530925027218', 'photo', 'added_photos', 'Someone got reaaaaally BIG over the holidays. Guess who!', 'https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/11210471_850530925027218_2379787459338677815_n.jpg?oh=d0b6a9fb2481bcf938c72963c8a22b76&oe=55D33DCE&__gda__=1438756982_d37858dca4baa0b9395976249237c843', '2015-05-10 01:01:51', '2015-05-11 03:36:06', ''),
(153, '227747950638855_850510505029260', 'photo', 'added_photos', 'Comelnya... Perut siapa ni?', 'https://scontent.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/11212779_850510505029260_677754093395785653_n.jpg?oh=5ba7025d2c448dd9127bb49da8316b4c&oe=55DB0BD3', '2015-05-09 23:04:14', '2015-05-11 03:36:06', ''),
(176, '227747950638855_851008121646165', 'photo', 'added_photos', 'What changed, Jibam? You look so…. Different!', 'https://fbcdn-sphotos-e-a.akamaihd.net/hphotos-ak-xpf1/v/t1.0-9/10375027_851008121646165_2066920587418523627_n.jpg?oh=9aeaee72bd90721b7cf3424dfd013860&oe=55C75F23&__gda__=1443623753_f799cc12da0cd265d230315d8c957413', '2015-05-11 05:52:16', '2015-05-12 12:53:48', ''),
(201, '227747950638855_851719148241729', 'photo', 'added_photos', 'Who VS Whom', 'https://scontent.xx.fbcdn.net/hphotos-xtp1/t31.0-8/11203611_851719148241729_105453265701021868_o.jpg', '2015-05-13 06:14:47', '2015-05-14 11:06:17', ''),
(202, '227747950638855_486053404893105', 'link', 'shared_story', 'Salam dan selamat sejahtera semua.mari kita dapatkan kredit percuma dari mcent.anda hanya perlu klik pada link di bawah ini dan install aplikasi mcent tersebut. Dah install nnt ada beberapa app yang mcent suruh kita\ndownload...setiap kali download mereka ', '', '2015-05-12 15:27:55', '2015-05-14 11:06:17', ''),
(203, '227747950638855_851401938273450', 'photo', 'added_photos', 'For example, Anusha and Hani swapped their email addresses so they could keep in touch.', 'https://fbcdn-sphotos-h-a.akamaihd.net/hphotos-ak-xta1/v/t1.0-9/11233993_851401938273450_2162873554379565723_n.jpg?oh=2ea471acb5c039bc5b09387e5505c5a4&oe=55D660BE&__gda__=1440007223_02b3d9c77d546ed5da085ee699f50b3f', '2015-05-12 07:07:39', '2015-05-14 11:06:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `t9432_log_twitter_feed`
--

CREATE TABLE IF NOT EXISTS `t9432_log_twitter_feed` (
  `id` int(11) unsigned NOT NULL,
  `feed_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t9432_log_twitter_feed`
--

INSERT INTO `t9432_log_twitter_feed` (`id`, `feed_id`, `message`, `posted_at`, `created_at`, `created_ip`) VALUES
(1, '596260477891547136', '@Para2601 Thank you Parames. Do stay tuned for more updates! :)', '2015-05-07 10:29:10', '2015-05-07 10:42:03', ''),
(2, '596260296148144130', '@MissNazira Hihi!!! Awww thank you so much. Do stay tuned to find out more Nazira! :)', '2015-05-07 10:28:27', '2015-05-07 10:42:03', ''),
(3, '596260135934111744', '@jjnethanael Hi Nethanael, thank you for supporting us. :)', '2015-05-07 10:27:49', '2015-05-07 10:42:03', ''),
(4, '595971284946669568', 'Kata periuk belanga hitam = The pot calls the kettle black #OhMyEnglish #proverbs #pepatah #peribahasa #dwibahasa #translation', '2015-05-06 15:20:01', '2015-05-07 10:42:03', ''),
(5, '595970982533181440', 'Kecil umpama semut = As small as an ant #OhMyEnglish #LearnEnglish #perumpamaan', '2015-05-06 15:18:49', '2015-05-07 10:42:03', ''),
(6, '595970522682232832', '"You open fast where?" #SYS #OhMyEnglish #LearnEnglish #throwback', '2015-05-06 15:16:59', '2015-05-07 10:42:03', ''),
(7, '595621755458293761', 'RT @daft64: @Oh_My_English though I had to pick between Jibam and him, it was a hard decision.', '2015-05-05 16:11:07', '2015-05-07 10:42:03', ''),
(8, '595621712588316674', 'RT @Para2601: @oh_my_english Yes we r!!!', '2015-05-05 16:10:57', '2015-05-07 10:42:03', ''),
(9, '595595846973923328', 'RT now if you can''t wait to watch the new season of #OhMyEnglish! #LearnEnglish', '2015-05-05 14:28:10', '2015-05-07 10:42:03', ''),
(10, '595485641695080448', '@Para2601 Thank you for responding to this question. :)', '2015-05-05 07:10:15', '2015-05-07 10:42:03', ''),
(11, '595485063816421377', '@daft64 Wowwww! Why See Yew Soon? :)', '2015-05-05 07:07:57', '2015-05-07 10:42:03', ''),
(12, '595377838422790144', 'Tanam lalang tak akan tumbuh padi = You can’t make a silk purse out of a sow’s ear #OhMyEnglish #LearnEnglish #Proverbs #Peribahasa', '2015-05-05 00:01:52', '2015-05-07 10:42:03', ''),
(13, '595377705740210177', '"Amboi bukan main lagi kamu semua ni, ye? Main bola kat tengah-tengah susur gajah ni!" #PuanAida #OhMyEnglish #throwback', '2015-05-05 00:01:21', '2015-05-07 10:42:03', ''),
(14, '595030835985657856', 'Happy #StarWarsDay peeps! #OhMyEnglish #StarWarsDay http://t.co/M9CE4vHLWm', '2015-05-04 01:03:01', '2015-05-07 10:42:03', ''),
(15, '594848216543207425', 'Dalam kelas #OhMyEnglish, siapa yang kamu ingin jadikan #BFF kamu? #OhMyEnglish #BigChanges', '2015-05-03 12:57:21', '2015-05-07 10:42:03', ''),
(16, '594848076688334848', 'Sepandai-pandai tupai melompat, akhirnya jatuh ke tanah juga = Curses, like chickens, come home to roost #OhMyEnglish #Proverbs #Peribahasa', '2015-05-03 12:56:47', '2015-05-07 10:42:03', ''),
(17, '594508040440713216', '@JefryShafrezZ98 Stay tuned :P', '2015-05-02 14:25:36', '2015-05-07 10:42:03', ''),
(18, '594507634817912832', 'Jika tidak dipecahkan ruyung, manakan dapat sagunya = You can’t make bricks without straw #OhMyEnglish #LearnEnglish #Proverbs #Peribahasa', '2015-05-02 14:24:00', '2015-05-07 10:42:03', ''),
(19, '594507457180794881', '"How can you have no heart and stomach!" #Jibam #OhMyEnglish #throwback #LearnEnglish', '2015-05-02 14:23:17', '2015-05-07 10:42:03', ''),
(20, '594507187973595137', '#BigChanges are happening to #OhMyEnglish this 7 June 2015, 6.30 pm! RT! RT!', '2015-05-02 14:22:13', '2015-05-07 10:42:03', ''),
(21, '594154536459063296', 'Like father like son = Bagaimana acuan begitulah kuihnya. #OhMyEnglish #LearnEnglish #Proverbs #Peribahasa #Pepatah', '2015-05-01 15:00:55', '2015-05-07 10:42:03', ''),
(22, '594154369123094528', 'Siapa di antara kamu yang telah mengalami perubahan ketara tahun ini #BigChanges #OhMyEnglish', '2015-05-01 15:00:15', '2015-05-07 10:42:03', ''),
(23, '594119406688407553', 'RT @Para2601: @oh_my_english Yeap!!! Really enjoying this weekend!!!It''s awesome!''/?0)', '2015-05-01 12:41:19', '2015-05-07 10:42:03', ''),
(24, '594006181888163840', 'Enjoy your long weekend, folks! #OhMyEnglish #publicholiday #labourday #Malaysia', '2015-05-01 05:11:24', '2015-05-07 10:42:03', ''),
(25, '593672935237296129', '@lutherkon17 Hi Luther, thank you so much for your support all this while. We truly appreciate your honest feedback.', '2015-04-30 07:07:12', '2015-05-07 10:42:03', ''),
(26, '593248876221497345', '@lutherkon17 Hi Luther, sad that you didn''t enjoy the show. Do you have any feedback for us to improve? Thank you :)', '2015-04-29 03:02:08', '2015-05-07 10:42:03', ''),
(27, '593022892385775616', 'Pejamkan mata anda, bayangkan di masa akan datang anda sudah hebat menggunakan Bahasa Inggeris! #OhMyEnglish #Motivasi #KataSemangat', '2015-04-28 12:04:10', '2015-05-07 10:42:03', ''),
(28, '593022704170610688', '"Paddle your own canoe" = "Sauk air mandikan diri" #OhMyEnglish #LearnEnglish #Proverbs #Pepatah #Peribahasa #Sayings', '2015-04-28 12:03:25', '2015-05-07 10:42:03', ''),
(29, '593022574793068544', 'Apparatus = Radas #OhMyEnglish #LearnEnglish #Translation #Words #Maksud', '2015-04-28 12:02:54', '2015-05-07 10:42:03', ''),
(30, '592628162585960449', 'Terlalu cepat, jadi lambat = More haste, less speed #OhMyEnglish #LearnEnglish #Proverbs #Pepatah #Peribahasa', '2015-04-27 09:55:39', '2015-05-07 10:42:03', ''),
(91, '596320534335356928', 'Looks like SYS is back with a bang! What''s with the bruised eye? Find out tomorrow! #OhMyEnglish #OME2015 http://t.co/v9PneZSDWS', '2015-05-07 14:27:49', '2015-05-08 02:19:34', ''),
(92, '596291437722898432', 'Uh oh! What''s Mazlee so shocked about? Tomorrow, we''ll reveal what he saw! Stay tuned! #OhMyEnglish #OME2015 http://t.co/AbQLxvHaQd', '2015-05-07 12:32:11', '2015-05-08 02:19:34', ''),
(121, '597021564551368704', 'Zack has got a new pick-up line! Watch the FULL video here : https://t.co/Mxo1goXisD @juzzthinx #OhMyEnglish #OME2015', '2015-05-09 12:53:27', '2015-05-09 13:13:32', ''),
(122, '596674889630621696', 'Zack has found a new love interest! Who could it be? Visit http://t.co/DaMtkqgEWV to find out now! #OhMyEnglish http://t.co/6Tadz1W799', '2015-05-08 13:55:54', '2015-05-09 13:13:32', ''),
(123, '596555319825674242', 'Find out how @roaxtan got a bruised eye : http://t.co/qgo6EbYtAF @AkhmalNazri #SYS #Jibam #OhMyEnglish #OME2015', '2015-05-08 06:00:46', '2015-05-09 13:13:32', ''),
(124, '596520612727652352', '@Salshabila_GMC Hi Salshabila, stay tuned for more updates! :)', '2015-05-08 03:42:51', '2015-05-09 13:13:32', ''),
(181, '597325995960446976', 'Someone got reaaaaally BIG over the holidays. Guess who! #OhMyEnglish #OME2015 http://t.co/ylErMed3CW', '2015-05-10 09:03:09', '2015-05-11 03:36:12', ''),
(182, '597296329564389376', 'Comelnya.. Perut siapa ni? ', '2015-05-10 07:05:16', '2015-05-11 03:36:12', ''),
(211, '598079126528856065', 'RT @ibnzakuan: @Oh_My_English mr midelton?!! Omg ', '2015-05-12 10:55:50', '2015-05-12 12:53:54', ''),
(212, '598079110930280448', 'RT @zxl96: can''t wait for oh my english class of 2015!!! #OME2015 @Oh_My_English', '2015-05-12 10:55:46', '2015-05-12 12:53:54', ''),
(213, '598079083868659712', 'RT @arvinvevo: @Oh_My_English i guess im not the only one who''s waiting. ☺️☺️yippie', '2015-05-12 10:55:40', '2015-05-12 12:53:54', ''),
(214, '598079061487849472', 'RT @MissNazira: @Oh_My_English Okay, I will wait. Hoping it more than my expected for ths new seasons. Hehe', '2015-05-12 10:55:34', '2015-05-12 12:53:54', ''),
(215, '598076674249371648', '@MissNazira Thank you for your continuous support! :)', '2015-05-12 10:46:05', '2015-05-12 12:53:54', ''),
(216, '598076431801786369', '@Para2601 Yay! Thank you for your continuous support! :)', '2015-05-12 10:45:07', '2015-05-12 12:53:54', ''),
(217, '598076109704429569', '@ninajihah Hihi! Stay tuned for more updates and don''t forget to catch the new season of Oh My English! Thank you :)', '2015-05-12 10:43:50', '2015-05-12 12:53:54', ''),
(218, '598073202183569408', '"Masuk kandang kambing mengembik, masuk kandang kerbau menguak" = "When in Rome, do as the Romans do" #OhMyEnglish #Peribahasa #Proverbs', '2015-05-12 10:32:17', '2015-05-12 12:53:54', ''),
(219, '598072077669666818', 'Rasa-rasanyalah.. adakah #SYS akan mengenakan GST pada barang-barang yang dijualnya? Jom bincang! #OhMyEnglish #OME2015 #OMEClassof2015', '2015-05-12 10:27:49', '2015-05-12 12:53:54', ''),
(220, '597717620461215744', '@arvinvevo Yay! Thank you for your continuous support! :)', '2015-05-11 10:59:20', '2015-05-12 12:53:54', ''),
(221, '597717310418194432', '@MissNazira Hihi surprise!! Make sure you don''t forget to catch Oh My English''s brand new season! :)', '2015-05-11 10:58:06', '2015-05-12 12:53:54', ''),
(222, '597716550322294784', '@arvinvevo Hihi stay tuned and watch Oh My English''s brand new season! :)', '2015-05-11 10:55:05', '2015-05-12 12:53:54', ''),
(223, '597716338321137664', '@ibnzakuan Hihi stay tuned and watch Oh My English''s brand new season! :)', '2015-05-11 10:54:14', '2015-05-12 12:53:54', ''),
(224, '597716023949668352', '@zxl96 Yeah! We too can''t wait to watch the new season! :)', '2015-05-11 10:52:59', '2015-05-12 12:53:54', ''),
(225, '597715763797983233', '@Para2601 Hihi. Make sure you don''t forget to catch Oh My English''s brand new season! :)', '2015-05-11 10:51:57', '2015-05-12 12:53:55', ''),
(241, '598712514646450179', 'Tong kosong nyaring bunyinya = Empty vessels make the most noise #OhMyEnglish #OME2015 #Peribahasa #Pepatah #Proverbs', '2015-05-14 04:52:41', '2015-05-14 11:06:24', ''),
(242, '598712324724101120', 'Siapakah di antara para pelajar #SMKAyerDalam yang selalu berubah pendiriannya? #OhMyEnglish #OME2015', '2015-05-14 04:51:56', '2015-05-14 11:06:24', ''),
(243, '598712128355205120', '"Tepung pun tak tahu?!" #CikguBedah #OhMyEnglish #throwback', '2015-05-14 04:51:09', '2015-05-14 11:06:24', ''),
(244, '598707103352508417', 'Hihi! Terima kasih Parames @Para2601. :)', '2015-05-14 04:31:11', '2015-05-14 11:06:24', ''),
(245, '598628910645940224', 'RT @izzulf_ismail: Pelakon bru dlm oh my English tu lawanyeee ❤', '2015-05-13 23:20:28', '2015-05-14 11:06:24', ''),
(246, '598628895412228096', 'RT @nadiraismyname: Best jugak tengok oh my english! ni', '2015-05-13 23:20:25', '2015-05-14 11:06:24', ''),
(247, '598628819314941952', 'RT @AzriFakhrul: Sweep her off her feet..  Oh my english', '2015-05-13 23:20:07', '2015-05-14 11:06:24', ''),
(248, '598628803041046528', 'RT @Para2601: @Oh_My_English tak sabar nak tengok OME...Terutamanya SYS...hihi sebab nak tahu dia kenakan GST ke tak !!!;)', '2015-05-13 23:20:03', '2015-05-14 11:06:24', ''),
(249, '598330373374746624', '@Zeeni06 Yay! We can''t wait too! :)', '2015-05-13 03:34:12', '2015-05-14 11:06:24', ''),
(250, '598330185864220675', '@Para2601 Hihi! Kalau nak tahu sama ada SYS kenakan GST atau tidak, nantikan musim terbaru "Oh My English!" ya. Terima kasih Parames! :)', '2015-05-13 03:33:27', '2015-05-14 11:06:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `t9433_log_instagram_feed`
--

CREATE TABLE IF NOT EXISTS `t9433_log_instagram_feed` (
  `id` int(11) unsigned NOT NULL,
  `feed_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t9433_log_instagram_feed`
--

INSERT INTO `t9433_log_instagram_feed` (`id`, `feed_id`, `type`, `message`, `picture`, `video`, `post_link`, `posted_at`, `created_at`, `created_ip`) VALUES
(1, '978993420675232811_211454780', 'image', 'Let''s learn some new #words! #OhMyEnglish #learnEnglish #vocabulary #grammar #funlearning', 'https://scontent.cdninstagram.com/hphotos-xfa1/t51.2885-15/e15/11203426_1426882877618995_1067912694_n.jpg', '', 'https://instagram.com/p/2WFVREyrQr/', '2015-05-06 15:12:11', '2015-05-07 10:42:03', ''),
(2, '977114575923754832_211454780', 'image', '"The force is strong with this one." Happy #StarWars Day! #StarWarsDay #OhMyEnglish #PopCulture', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11226778_382486075288029_713116947_n.jpg', '', 'https://instagram.com/p/2PaIeiyrdQ/', '2015-05-04 00:59:16', '2015-05-07 10:42:03', ''),
(3, '976068337359041809_211454780', 'image', 'Someone is coming back to #SMKAyerDalam! Guess who?! #OhMyEnglish #LearnEnglish', 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/e15/11203418_758349207613651_182377590_n.jpg', '', 'https://instagram.com/p/2LsPs8yrUR/', '2015-05-02 14:20:34', '2015-05-07 10:42:03', ''),
(4, '975277165048935750_211454780', 'video', 'Dup dap berdebar-debar rasanya! Jom saksikan kehebatan peserta-peserta Ceria Popstar musim ke-3, MALAM INI pukul 9 malam hanya di Astro Ceria & Maya HD #ceriapopstar @astroceria', 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/e15/11205812_560919540716075_1300835885_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xat1/t50.2886-16/11200332_1002336629807127_1877681283_n.mp4', 'https://instagram.com/p/2I4WoUSrVG/', '2015-05-01 12:08:39', '2015-05-07 10:42:03', ''),
(5, '973190786345252714_211454780', 'image', 'How would you describe your hair? #OhMyEnglish #LearnEnglish #Vocabulary #Words (Source : English and the City)', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/e15/11199501_688718781239683_1562402237_n.jpg', '', 'https://instagram.com/p/2Bd90uyrdq/', '2015-04-28 15:03:23', '2015-05-07 10:42:03', ''),
(6, '971021260203669200_211454780', 'image', 'Here''s a fun fact! #ohmyenglish #learnenglish #funfacts #vocabulary', 'https://scontent.cdninstagram.com/hphotos-xtf1/t51.2885-15/e15/11142715_395219297326864_929894463_n.jpg', '', 'https://instagram.com/p/15wrEDyrbQ/', '2015-04-25 15:12:56', '2015-05-07 10:42:03', ''),
(7, '970286145496331453_211454780', 'image', '#WordoftheDay #OhMyEnglish #LearnEnglish', 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/e15/11191138_1633662216869497_1856219867_n.jpg', '', 'https://instagram.com/p/13JhvIyrS9/', '2015-04-24 14:52:23', '2015-05-07 10:42:03', ''),
(8, '969565609896097500_211454780', 'image', 'These are some of the things that you can usually find in a kitchen (well, except for the crocodile). (Source : pencilfury) #OhMyEnglish #LearnEnglish #Vocabulary', 'https://scontent.cdninstagram.com/hphotos-xpf1/t51.2885-15/e15/11186953_1407011086286464_446121678_n.jpg', '', 'https://instagram.com/p/10lskESrbc/', '2015-04-23 15:00:49', '2015-05-07 10:42:03', ''),
(9, '969539258795340828_211454780', 'video', 'Demam Ceria Popstar musim ke-3 dah bermula. Nak tau siapa yang bakal bertanding di Konsert Ceria Popstar??? Jom kita layan Tirai Ceria Popstar, Jumaat ini, 9 malam, hanya di Astro Ceria & Maya HD! #ceriapopstar', 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/e15/11190778_986396858079505_450054998_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xat1/t50.2886-16/11179494_373395282857328_1302392018_n.mp4', 'https://instagram.com/p/10ftGsSrQc/', '2015-04-23 14:08:27', '2015-05-07 10:42:03', ''),
(10, '968531751213905465_211454780', 'image', 'Now can you tell which way is ''horizontal'' and which way is ''vertical''? (Source : BuzzFeed) #OhMyEnglish #LearnEnglish #Grammar #Directions', 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/e15/11142410_1573998346202349_1852161837_n.jpg', '', 'https://instagram.com/p/1w6n8IyrY5/', '2015-04-22 04:46:43', '2015-05-07 10:42:03', ''),
(11, '968179256545424912_211454780', 'image', 'Study smart for your mid-year #exams :) #OhMyEnglish #LearnEnglish', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/e15/11143053_540441542761846_142877250_n.jpg', '', 'https://instagram.com/p/1vqed5SrYQ/', '2015-04-21 17:06:23', '2015-05-07 10:42:03', ''),
(12, '966673828422530998_211454780', 'image', '#wordoftheday #OhMyEnglish #LearnEnglish #Vocabulary #Words', 'https://scontent.cdninstagram.com/hphotos-xft1/t51.2885-15/e15/11098384_1579249572314445_82530070_n.jpg', '', 'https://instagram.com/p/1qULmsyre2/', '2015-04-19 15:15:22', '2015-05-07 10:42:03', ''),
(13, '965186788136760685_211454780', 'image', 'Do you agree that the English language is weird? Heh heh! #OhMyEnglish #LearnEnglish', 'https://scontent.cdninstagram.com/hphotos-xfp1/t51.2885-15/e15/11084826_688108851317675_172385301_n.jpg', '', 'https://instagram.com/p/1lCEUgyrVt/', '2015-04-17 14:00:53', '2015-05-07 10:42:03', ''),
(14, '964503632609981776_211454780', 'image', 'For your reference :) #OhMyEnglish #LearnEnglish #Time #Vocabulary (Source : Marilena@Pinterest)', 'https://scontent.cdninstagram.com/hphotos-xfa1/t51.2885-15/e15/11085106_815054155231056_823870722_n.jpg', '', 'https://instagram.com/p/1imvGWSrVQ/', '2015-04-16 15:23:34', '2015-05-07 10:42:03', ''),
(15, '963809279365264490_211454780', 'image', 'It''s time to stop using the same words repeatedly. #OhMyEnglish #LearnEnglish #Vocabulary #Words', 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/e15/11078474_959065864133368_894072195_n.jpg', '', 'https://instagram.com/p/1gI27fyrRq/', '2015-04-15 16:24:01', '2015-05-07 10:42:03', ''),
(16, '963062266390558408_211454780', 'image', 'LIKE this if you agree! #OhMyEnglish #LearnEnglish #qotd #quoteoftheday', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/e15/11142913_953600544671702_359850771_n.jpg', '', 'https://instagram.com/p/1dfAdcyrbI/', '2015-04-14 15:39:50', '2015-05-07 10:42:03', ''),
(17, '961451938447799740_211454780', 'image', 'Try to make a sentence using this idiom! #OhMyEnglish #LearnEnglish #Idioms', 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/e15/11084918_850333158373528_59901725_n.jpg', '', 'https://instagram.com/p/1Xw3GryrW8/', '2015-04-12 10:20:24', '2015-05-07 10:42:03', ''),
(18, '960870170648818738_211454780', 'image', 'Irregular Plurals #OhMyEnglish #LearnEnglish #Grammar (Source : Grammar.net)', 'https://scontent.cdninstagram.com/hphotos-xap1/t51.2885-15/e15/11093055_801396803301837_908458662_n.jpg', '', 'https://instagram.com/p/1VslRMyrQy/', '2015-04-11 15:04:32', '2015-05-07 10:42:03', ''),
(19, '960039537613649104_211454780', 'image', 'Sempat tak tonton episod pertama tadi? Nak dapat peluang bercuti ke Jepun tak? Mudah saja! Tontoni “Ultraman Zero: The Chronicle” setiap Jumaat, bermula 10 April di Astro Ceria (611). Dapatkan kata kunci yang terdapat dalam 5 episod pertama dan isikannya ', 'https://scontent.cdninstagram.com/hphotos-xta1/t51.2885-15/e15/11123746_675405882582421_1741181104_n.jpg', '', 'https://instagram.com/p/1Svt95yrTQ/', '2015-04-10 11:34:12', '2015-05-07 10:42:03', ''),
(20, '958505038283191745_211454780', 'image', 'Don''t mess with the cat. He looks serious! ', 'https://scontent.cdninstagram.com/hphotos-xpt1/t51.2885-15/e15/11117066_1558381741094388_1241022074_n.jpg', '', 'https://instagram.com/p/1NS0ECSrXB/', '2015-04-08 08:45:26', '2015-05-07 10:42:03', ''),
(61, '979695429002901009_211454780', 'image', 'Looks like SYS is back with a bang! What''s with the bruised eye? Stay tuned to find out how he got it... and the premiere date for "Oh My English! Class of 2015"! #OhMyEnglish #OME2015 #OMEClassof2015 @roaxtan', 'https://scontent.cdninstagram.com/hphotos-xtp1/t51.2885-15/e15/11208105_831883750217617_1080064771_n.jpg', '', '', '2015-05-07 14:26:57', '2015-05-08 02:19:36', ''),
(62, '979637123504846058_211454780', 'image', 'Uh oh! What''s Mazlee so shocked about? Tomorrow, we''ll reveal what he saw... AND the official premiere date for #OhMyEnglish''s brand new season! Stay tuned! @zhafheybat #LearnEnglish #OME2015', 'https://scontent.cdninstagram.com/hphotos-xfa1/t51.2885-15/e15/11243660_1128668373815249_1301430838_n.jpg', '', '', '2015-05-07 12:31:07', '2015-05-08 02:19:36', ''),
(81, '981071071543997654_211454780', 'video', 'Zack has got a new pick-up line! Watch the FULL video here : https://youtu.be/S84D8XrQ618. Don''t forget to watch the new season of #OhMyEnglish starting Sunday, 7 June at 6.30PM via Astro TVIQ (610) and Maya HD (135)! @officialjuzzthin', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11259160_927147353972025_297856904_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xaf1/t50.2886-16/11229195_1565007063764959_572298590_n.mp4', 'https://instagram.com/p/2ddvEOyrTW/', '2015-05-09 12:00:07', '2015-05-09 13:13:33', ''),
(82, '980402561058780949_211454780', 'image', 'Zack has found a new love interest! Who could it be? Stay tuned to find out or visit http://youtu.be/S84D8XrQ618 now! @officialjuzzthin', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11249973_1634094633492337_1577436170_n.jpg', '', 'https://instagram.com/p/2bFu9UyrcV/', '2015-05-08 13:51:54', '2015-05-09 13:13:33', ''),
(83, '980345936058955058_211454780', 'video', 'Jom saksikan bakat kawan kawan kita menyanyi di Konsert Ceria Popstar 3! Segalanya Bermula Disini. Setiap Jumaat, jam 9 malam hanya di Astro Ceria saluran 611. Untuk kita aje! #ceriapopstar', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11241873_826340750775213_1541451706_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xaf1/t50.2886-16/11234622_1600083593612110_426797638_n.mp4', 'https://instagram.com/p/2a429LyrUy/', '2015-05-08 11:59:24', '2015-05-09 13:13:33', ''),
(84, '980163584900904450_211454780', 'video', 'Ohhh, so THIS is how SYS got a bruised eye! Check out the video, guys - and don''t forget to share it with your friends! Watch the FULL video at #OhMyEnglish''s YouTube page : http://youtu.be/DWNx351Seas. Remember, the new season of Oh My English starts Sun', 'https://scontent.cdninstagram.com/hphotos-xpa1/t51.2885-15/e15/11205719_494876533999886_1210735358_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xaf1/t50.2886-16/11214936_768577946594127_21208390_n.mp4', 'https://instagram.com/p/2aPZZbyrYC/', '2015-05-08 05:57:06', '2015-05-09 13:13:34', ''),
(121, '981817838849930269_211454780', 'video', 'Apakah yang berlaku seterusnya? ', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11226720_456400134526762_964802410_n.jpg', 'https://scontent.cdninstagram.com/hphotos-xaf1/t50.2886-16/11237503_101022396900578_126103889_n.mp4', 'https://instagram.com/p/2gHh9eyrQd/', '2015-05-10 12:43:48', '2015-05-11 03:36:14', ''),
(122, '981706404161828036_211454780', 'image', 'Someone got reaaaaally BIG over the holidays. Guess who! #OhMyEnglish #OME2015', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11241322_1386773274986002_1032867560_n.jpg', '', 'https://instagram.com/p/2fuMX1yrTE/', '2015-05-10 09:02:24', '2015-05-11 03:36:14', ''),
(123, '981646626161079367_211454780', 'image', 'Comelnya... Perut siapa ni? #OhMyEnglish #OME2015', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11226747_429897600518258_1090458207_n.jpg', '', 'https://instagram.com/p/2fgmfPSrRH/', '2015-05-10 07:03:38', '2015-05-11 03:36:14', ''),
(141, '982570569969612369_211454780', 'image', 'It is not an easy task to be in a big suit but we are proud of @therealzainsaidin for handling it like a PRO! #OhMyEnglish #OME2015 #OMEClassof2015', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11240440_949457021771316_2061252745_n.jpg', '', 'https://instagram.com/p/2iyro9yrZR/', '2015-05-11 13:39:21', '2015-05-12 12:53:56', ''),
(161, '984407498625300115_211454780', 'image', 'ANUSHA IS 39… and SYS is only 14?! How many of you have tried this app? Let us know YOUR results! #OhMyEnglish #HowOld #OME2015', 'https://scontent.cdninstagram.com/hphotos-xfa1/t51.2885-15/e15/11257802_462083237289339_269292009_n.jpg', '', 'https://instagram.com/p/2pUWeFyraT/', '2015-05-14 02:29:00', '2015-05-14 11:06:26', ''),
(162, '983986211054597889_211454780', 'image', 'Special effects for #feedHenry #OhMyEnglish #OME2015 #OMEClassof2015', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11263282_809383582509352_142423071_n.jpg', '', 'https://instagram.com/p/2n0j7dyrcB/', '2015-05-13 12:31:58', '2015-05-14 11:06:26', ''),
(163, '983985443547297519_211454780', 'image', 'Some of the things needed to make the brand new Henry Middleton! #OhMyEnglish #OME2015 #OMEClassof2015 #FeedHenry', 'https://scontent.cdninstagram.com/hphotos-xaf1/t51.2885-15/e15/11259924_898847966840578_2072971152_n.jpg', '', 'https://instagram.com/p/2n0Ywqyrbv/', '2015-05-13 12:30:27', '2015-05-14 11:06:26', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t0121_game`
--
ALTER TABLE `t0121_game`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t0122_game_submission`
--
ALTER TABLE `t0122_game_submission`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `hash` (`hash`);

--
-- Indexes for table `t0123_game_leaderboard`
--
ALTER TABLE `t0123_game_leaderboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t0201_socialbuzz`
--
ALTER TABLE `t0201_socialbuzz`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `feed_id` (`platform`,`feed_id`);

--
-- Indexes for table `t9401_log_general`
--
ALTER TABLE `t9401_log_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t9402_log_stored_procedures`
--
ALTER TABLE `t9402_log_stored_procedures`
  ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `t9411_log_insert`
--
ALTER TABLE `t9411_log_insert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t9412_log_update`
--
ALTER TABLE `t9412_log_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t9431_log_facebook_feed`
--
ALTER TABLE `t9431_log_facebook_feed`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `feed_id` (`feed_id`);

--
-- Indexes for table `t9432_log_twitter_feed`
--
ALTER TABLE `t9432_log_twitter_feed`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `feed_id` (`feed_id`);

--
-- Indexes for table `t9433_log_instagram_feed`
--
ALTER TABLE `t9433_log_instagram_feed`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `feed_id` (`feed_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t0121_game`
--
ALTER TABLE `t0121_game`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `t0122_game_submission`
--
ALTER TABLE `t0122_game_submission`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t0123_game_leaderboard`
--
ALTER TABLE `t0123_game_leaderboard`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t0201_socialbuzz`
--
ALTER TABLE `t0201_socialbuzz`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `t9401_log_general`
--
ALTER TABLE `t9401_log_general`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `t9402_log_stored_procedures`
--
ALTER TABLE `t9402_log_stored_procedures`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t9411_log_insert`
--
ALTER TABLE `t9411_log_insert`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t9412_log_update`
--
ALTER TABLE `t9412_log_update`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t9431_log_facebook_feed`
--
ALTER TABLE `t9431_log_facebook_feed`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=226;
--
-- AUTO_INCREMENT for table `t9432_log_twitter_feed`
--
ALTER TABLE `t9432_log_twitter_feed`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=271;
--
-- AUTO_INCREMENT for table `t9433_log_instagram_feed`
--
ALTER TABLE `t9433_log_instagram_feed`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=181;