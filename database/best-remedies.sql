-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 04:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `best-remedies`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `idaboutUs` int(11) NOT NULL,
  `bodyText` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `additionalremedy`
--

CREATE TABLE `additionalremedy` (
  `remedy_idremedy` int(11) NOT NULL,
  `testimony_idtestimony` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `additionalremedy`
--

INSERT INTO `additionalremedy` (`remedy_idremedy`, `testimony_idtestimony`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `name`, `surname`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `idarticle` int(11) NOT NULL,
  `seo_title` varchar(60) DEFAULT NULL,
  `seo_description` varchar(160) DEFAULT NULL,
  `seo_keywords` varchar(300) DEFAULT NULL,
  `thumbnailImage` varchar(200) DEFAULT NULL,
  `imageAltText` varchar(100) DEFAULT NULL,
  `sources` text DEFAULT NULL,
  `reviewerId` int(11) DEFAULT NULL,
  `authorId` int(11) DEFAULT NULL,
  `editor_idEditor` int(11) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `articleUrl` varchar(400) DEFAULT NULL,
  `clicks` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`idarticle`, `seo_title`, `seo_description`, `seo_keywords`, `thumbnailImage`, `imageAltText`, `sources`, `reviewerId`, `authorId`, `editor_idEditor`, `category`, `articleUrl`, `clicks`, `created_at`, `updated_at`) VALUES
(2, 'ter', 'rser', 'teser', 'a9889-download.jpg', 'test', '<p>\n	teststt</p>\n', 1, 1, 2, '1', 'tests', 29, '0000-00-00 00:00:00', NULL),
(3, 'sdf', 'sdf', 'sdf', 'a15fc-download.jpg', 'asf', '<p>\n	asfas</p>\n', 1, 2, 2, '2', 'asf', 31, '2020-06-29 15:04:39', '2020-06-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `articlepart`
--

CREATE TABLE `articlepart` (
  `idarticlePart` int(11) NOT NULL,
  `title` varchar(300) DEFAULT NULL,
  `body` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `articlesuccess`
--

CREATE TABLE `articlesuccess` (
  `idarticleSuccess` int(11) NOT NULL,
  `sucessRating` varchar(45) DEFAULT NULL,
  `article_idarticle` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articlesuccess`
--

INSERT INTO `articlesuccess` (`idarticleSuccess`, `sucessRating`, `article_idarticle`, `user_iduser`) VALUES
(1, '1', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `idavailability` int(11) NOT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `localCommonName` varchar(45) DEFAULT NULL,
  `localScientificName` varchar(45) DEFAULT NULL,
  `remedy_idremedy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`idavailability`, `country`, `state`, `localCommonName`, `localScientificName`, `remedy_idremedy`) VALUES
(1, '251', 'tests', 'gdgdf', 'dgdfg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `idbrands` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`idbrands`, `name`) VALUES
(1, 'A LA Maison'),
(2, 'A. Vogel'),
(3, 'ABB'),
(4, 'Absolute Nutrition'),
(5, 'AbsorbAid'),
(6, 'ACORELLE'),
(7, 'Acure'),
(8, 'Acusine'),
(9, 'Adora'),
(10, 'Advanced Molecular Labs'),
(11, 'Ageless Foundation'),
(12, 'Air Scense'),
(13, 'Airborne'),
(14, 'Akeso'),
(15, 'Alba Botanica'),
(16, 'Algalife USA'),
(17, 'Alkalife'),
(18, 'Alkazone'),
(19, 'All Terrain'),
(20, 'Allera Health Products'),
(21, 'AlliMax'),
(22, 'Almased®'),
(23, 'Aloha Bay'),
(24, 'Aloha Inc'),
(25, 'ALR Industries'),
(26, 'Alta Health'),
(27, 'AlternaScript'),
(28, 'Alvera'),
(29, 'Amazing Grass'),
(30, 'Amazing Herbs'),
(31, 'Amazon Therapeutics'),
(32, 'American Bioscience'),
(33, 'American Biotech Labs'),
(34, 'American Health'),
(35, 'American Provenance'),
(36, 'Ancient Secrets'),
(37, 'Andalou Naturals'),
(38, 'ANSi'),
(39, 'Anumed International'),
(40, 'Anutra'),
(41, 'Apex Hair No More'),
(42, 'Applied Nutraceuticals'),
(43, 'AQUAHYDRATE'),
(44, 'Arizona Natural'),
(45, 'Ark Naturals'),
(46, 'AST Sports Science'),
(47, 'At Last Naturals'),
(48, 'Athletic Xtreme'),
(49, 'Atkins Nutritionals'),
(50, 'AURA CACIA'),
(51, 'Aura Cacia Organics'),
(52, 'Auromere'),
(53, 'Avalon Organics'),
(54, 'Axia 3 Heartburn Extinguisher'),
(55, 'Axis Labs'),
(56, 'Azo'),
(57, 'Babo Botanicals'),
(58, 'Baby Basics'),
(59, 'Baby Nasakleen'),
(60, 'Bach'),
(61, 'Balance Nutrition'),
(62, 'Balanceuticals'),
(63, 'Barndad Nutrition'),
(64, 'Basic Research'),
(65, 'Baudelaire'),
(66, 'Be Tru Wellness'),
(67, 'BEANITOS'),
(68, 'Beast Sports Nutrition'),
(69, 'Beauty Without Cruelty'),
(70, 'Bedu'),
(71, 'Bee & Flower'),
(72, 'Bell Plantation'),
(73, 'Belle and Bella'),
(74, 'Bellybar'),
(75, 'Best Bar Ever'),
(76, 'Best Naturals'),
(77, 'Betancourt Nutrition'),
(78, 'Better Life'),
(79, 'Beyond Better Foods'),
(80, 'Beyond Fresh'),
(81, 'Bhi/Medinatura'),
(82, 'Bhu Foods'),
(83, 'Big Lift Nutrition'),
(84, 'Big Sky Aloha'),
(85, 'Bio Follicle'),
(86, 'Bio Nutrition'),
(87, 'Bio Sport USA'),
(88, 'Bio-Allers'),
(89, 'BIO-STRATH'),
(90, 'BioBag'),
(91, 'Bioglan'),
(92, 'Biokleen'),
(93, 'Biomed Health Inc'),
(94, 'Biotech Nutritions'),
(95, 'BIOTEST'),
(96, 'Bioved Pharma Inc'),
(97, 'Biovi'),
(98, 'Birch Benders'),
(99, 'Bite Fuel'),
(100, 'BLACK SEED'),
(101, 'BlackStone Labs'),
(102, 'Blossom Organics'),
(103, 'Blue Avocado'),
(104, 'Blum Naturals'),
(105, 'Blur Relief'),
(106, 'Body FX'),
(107, 'BodyAnew'),
(108, 'BodyLogix'),
(109, 'Boericke & Tafel'),
(110, 'BOIRON'),
(111, 'Bonk Breaker'),
(112, 'Boo Bamboo'),
(113, 'BOOKS ALL PUBLISHER TITLES'),
(114, 'Bornfree/Summer Infant'),
(115, 'Bos'),
(116, 'BOULDER CLEAN'),
(117, 'BPI'),
(118, 'Brain Armor'),
(119, 'Brain Pharma'),
(120, 'Brainstrong'),
(121, 'Bravo Teas & Herbs'),
(122, 'Breathe Cleaner'),
(123, 'Bretanna'),
(124, 'Brew Dr.'),
(125, 'Bricker Labs'),
(126, 'BROTHER BRU BRU\'S'),
(127, 'BSN'),
(128, 'Buddha Teas'),
(129, 'Bulldog Natural Skincare'),
(130, 'Bundle Organics'),
(131, 'Buried Treasure'),
(132, 'Burt\'s Bees'),
(133, 'C2O Pure Coconut Water'),
(134, 'California Natural'),
(135, 'CALIFORNIA PURE NATURALS'),
(136, 'Calnaturale Svelte'),
(137, 'CARTILADE'),
(138, 'Caveman Foods'),
(139, 'Celebration Herbals'),
(140, 'Celestial Seasonings'),
(141, 'Cell Shield'),
(142, 'Cellucor'),
(143, 'Celsius'),
(144, 'CELSIUS INC.'),
(145, 'Celtic Sea Salt'),
(146, 'Ceramedx'),
(147, 'Champion Nutrition'),
(148, 'Chandrika'),
(149, 'Charantea'),
(150, 'Cherry Works'),
(151, 'Chike Nutrition'),
(152, 'CHILD LIFE ESSENTIALS'),
(153, 'ChildLife'),
(154, 'Choice Organic Teas'),
(155, 'Chromalux'),
(156, 'CITRA-SOLV'),
(157, 'CITRONELLA OUTDOOR STICKS'),
(158, 'Citrus Magic'),
(159, 'CLEANLOGIC'),
(160, 'CLEANWELL'),
(161, 'Clear Conscience'),
(162, 'CLEAR PRODUCTS'),
(163, 'ClearLife Medinatura'),
(164, 'Clearly Natural'),
(165, 'CLEARTRACT-DISCOVER NUTRITION'),
(166, 'Click Co.'),
(167, 'CLIF'),
(168, 'CLIF BAR'),
(169, 'CLIF KID ZBAR'),
(170, 'Cobra Labs'),
(171, 'COBRA VERDE'),
(172, 'Cococare'),
(173, 'Cold Sores BeGone'),
(174, 'Come Ready'),
(175, 'Con-Cret'),
(176, 'Contessa'),
(177, 'Controlled Labs'),
(178, 'Cookie Republic'),
(179, 'Core Nutritionals'),
(180, 'COSAMIN AVOCA'),
(181, 'Counter Culture'),
(182, 'Country Archer'),
(183, 'COUNTRY COMFORT'),
(184, 'Creative BioScience'),
(185, 'Crystal Deodorants'),
(186, 'CTD Sports'),
(187, 'Culturelle'),
(188, 'Cutler Nutrition'),
(189, 'CYCLONE CIDER'),
(190, 'CYCLONE CUP'),
(191, 'CYLINDER WORKS'),
(192, 'Cytosport'),
(193, 'D\'s Naturals'),
(194, 'D\'VASH ORGANICS'),
(195, 'Daily Detox'),
(196, 'DAIWA HEALTH DEVELOPMENT'),
(197, 'DAPPLE'),
(198, 'DARRELL'),
(199, 'Dead Sea Moringa'),
(200, 'Deluxe Whey'),
(201, 'DEODORANT STONES OF AMERICA'),
(202, 'DERMA E'),
(203, 'DESERT ESSENCE'),
(204, 'Designer Protein'),
(205, 'DESIGNER WHEY'),
(206, 'DETOXIFY'),
(207, 'Detoxify LLC'),
(208, 'DEVA VEGAN VITAMINS'),
(209, 'DEVITA'),
(210, 'DIAMOND-HERPANACINE'),
(211, 'Dick Stevens'),
(212, 'DICKINSON BRANDS'),
(213, 'DIET WORKS'),
(214, 'DIVA CUP'),
(215, 'DIVERTIGO'),
(216, 'Divine Health'),
(217, 'DMSO'),
(218, 'Doctor\'s Best'),
(219, 'DOGGIE SUDZ'),
(220, 'DOLCI DI MARIA'),
(221, 'DR. BRONNER\'S'),
(222, 'DR. CHRISTOPHER\'S FORMULAS'),
(223, 'DR. CLARK\'S PURITY PRODUCTS'),
(224, 'DR. DUNNER'),
(225, 'DR. GINGER\'S'),
(226, 'DR. HESS'),
(227, 'DR. SHEN\'S'),
(228, 'DR. SINGHA\'S MUSTARD BATH'),
(229, 'DR. TUNG\'S'),
(230, 'DR. VENESSA\'S FORMULAS'),
(231, 'DR. WOODS'),
(232, 'DR. ZANG HOMEOPATHIC'),
(233, 'Driven Sports'),
(234, 'DUDE WIPES'),
(235, 'Dymatize'),
(236, 'DYNAMIC HEALTH'),
(237, 'E-CLOTH'),
(238, 'E-Pharm'),
(239, 'EARTH KISS'),
(240, 'EARTH MAMA'),
(241, 'EARTH SCIENCE'),
(242, 'EARTH THERAPEUTICS'),
(243, 'EARTH\'S BEST'),
(244, 'EARTH\'S BOUNTY'),
(245, 'EARTH\'S CARE'),
(246, 'EARTHRISE'),
(247, 'EAS Sport Nutrition'),
(248, 'Eat The Bear'),
(249, 'Eboost'),
(250, 'EBOOST SPRUCE'),
(251, 'ECLAIR NATURALS'),
(252, 'Eclipse Sport Supplements'),
(253, 'ECO DRINK'),
(254, 'ECO EGG'),
(255, 'ECO-BAGS'),
(256, 'ECO-DENT'),
(257, 'ECO-FRIENDLY BAGS'),
(258, 'ECO-PRODUCTS'),
(259, 'ECOLOVE'),
(260, 'ECOLUME'),
(261, 'ECOS'),
(262, 'ECOVER'),
(263, 'EERO'),
(264, 'EFX Sports'),
(265, 'ELEVATE'),
(266, 'ELYPTOL'),
(267, 'ELYTE'),
(268, 'EMERALD HEALTH BIO'),
(269, 'Emergen-C'),
(270, 'EMERITA'),
(271, 'ENER-C'),
(272, 'Ener-G'),
(273, 'EO PRODUCTS'),
(274, 'EPIC DENTAL'),
(275, 'EQUALINE'),
(276, 'ERAS NATURAL SCIENCES'),
(277, 'ESSENTIAL EVERYDAY'),
(278, 'ESSENTIAL HEALTH PRODUCTS'),
(279, 'ESSENTIAL OXYGEN'),
(280, 'ESTROVEN'),
(281, 'EVERY MAN JACK'),
(282, 'EVERYONE'),
(283, 'Evogen'),
(284, 'EVOLUTION SALT'),
(285, 'EXTENZE'),
(286, 'FACE DOCTOR'),
(287, 'FAITH IN NATURE'),
(288, 'FARMER\'S MARKET'),
(289, 'FARMHOUSE CULTURE'),
(290, 'FEARNS SOYA FOOD'),
(291, 'FEVER-TREE'),
(292, 'FIBROMALIC'),
(293, 'FINAFLEX'),
(294, 'FIRE & FLAVOR'),
(295, 'FISHERMAN\'S FRIEND'),
(296, 'fit & fresh'),
(297, 'FIT & HEALTHY'),
(298, 'Fit Crunch Bars'),
(299, 'Fit Miss'),
(300, 'FITJOY'),
(301, 'Fitness Enterprise'),
(302, 'Fitness Pro'),
(303, 'FLOWER VALLEY'),
(304, 'FLOYD\'S OF LEADVILLE'),
(305, 'Foods Alive'),
(306, 'FOODSCIENCE OF VERMONT'),
(307, 'FORCES OF NATURE'),
(308, 'FRANKINCENSE & MYRRH'),
(309, 'FUCHS'),
(310, 'FULL CIRCLE HOME'),
(311, 'FUN FRESH'),
(312, 'FUTUREBIOTICS'),
(313, 'GAIAM'),
(314, 'Gamma Labs'),
(315, 'GARDEN GREENS'),
(316, 'GASP'),
(317, 'GasPari Nutrition'),
(318, 'GAT'),
(319, 'Gatorade'),
(320, 'GC7X & GC7X SURGE'),
(321, 'GEFEN'),
(322, 'GELATO FIASCO'),
(323, 'GENCEUTIC NATURALS'),
(324, 'GENIAL DAY'),
(325, 'GEO-DEO'),
(326, 'GEORGE\'S ALOE VERA'),
(327, 'Giant Sports'),
(328, 'GINA\'S SOUTHERN STYLE'),
(329, 'GINGER PEOPLE'),
(330, 'GINKOBA'),
(331, 'GIOVANNI HAIR CARE PRODUCTS'),
(332, 'GLADRAGS'),
(333, 'Glamour Nutrition'),
(334, 'GLICO POCKY'),
(335, 'GLOBAL HEALTHCARE CORP.'),
(336, 'GODDESS GARDEN'),
(337, 'GOJO'),
(338, 'GOLD Q'),
(339, 'GOOD CLEAN LOVE'),
(340, 'GOOD GOO'),
(341, 'Good Health Natural Foods'),
(342, 'Grab The Gold'),
(343, 'GRANDPA SOAP'),
(344, 'GREEN BEAVER,THE'),
(345, 'GREEN FOODS'),
(346, 'GREEN N\' PACK'),
(347, 'GREEN SPROUTS'),
(348, 'GREEN TOYS'),
(349, 'GREENERWAYS ORGANIC'),
(350, 'GREENS PLUS'),
(351, 'Grenade'),
(352, 'Growing Naturals'),
(353, 'GTS KOMBUCHA'),
(354, 'HAGER PHARMA'),
(355, 'HAN\'S HONEY LOQUAT'),
(356, 'HAND IN HAND'),
(357, 'HANGOVER NATURALS'),
(358, 'HAPPY BABY'),
(359, 'HAPPY CREAMIES'),
(360, 'HAPPY LITTLE BODIES'),
(361, 'HAPPY MUNCHIES'),
(362, 'HAPPY TOT'),
(363, 'HAPPYYOGIS'),
(364, 'HARVEST BAY'),
(365, 'HEALING SOLUTIONS'),
(366, 'HEALTH FROM THE SEA'),
(367, 'Health From The Sun'),
(368, 'HEALTH KING MEDICINAL TEAS'),
(369, 'HEALTH LOGICS'),
(370, 'HEALTH PLUS'),
(371, 'HEALTH SUPPORT'),
(372, 'HEALTH THRU NUTRITION'),
(373, 'Health Warrior'),
(374, 'HEALTHY \'N FIT'),
(375, 'HEALTHY ORIGINS'),
(376, 'HEAROS'),
(377, 'HEAVEN SENT'),
(378, 'HERB PHARM'),
(379, 'HERBAL CLEAR'),
(380, 'HERBAL MELANGE'),
(381, 'HERBAL ZAP!'),
(382, 'HERBAN COWBOY'),
(383, 'HERBASWAY'),
(384, 'HERBATINT'),
(385, 'HERBION NATURALS'),
(386, 'HERBS FOR KIDS'),
(387, 'HERITAGE STORE'),
(388, 'HERO NUTRITIONAL PRODUCTS'),
(389, 'Hi Tech Pharma'),
(390, 'High Performance Fitness'),
(391, 'HIMALAYAN CHANDRA'),
(392, 'HIMALAYAN SALT'),
(393, 'HINT SUNSCREEN'),
(394, 'HISTORICAL REMEDIES'),
(395, 'HOBE LABORATORIES'),
(396, 'HOLLYWOOD DIET'),
(397, 'HOME HEALTH'),
(398, 'HOMEOLAB USA'),
(399, 'HONEES'),
(400, 'HONEY FEAST'),
(401, 'HONEY GARDENS'),
(402, 'Honey Stringer'),
(403, 'HONEYBEE GARDENS'),
(404, 'HOST DEFENSE MUSHROOM'),
(405, 'HOT KID'),
(406, 'HOT STUFF'),
(407, 'Hot Stuff Nutritionals'),
(408, 'HPF (HEALTHY ORIGINS)'),
(409, 'HUMPHREYS HOMEOPATHIC REMEDIES'),
(410, 'Hydroxycut'),
(411, 'HYLANDS HOMEOPATHIC'),
(412, 'IDS'),
(413, 'IF YOU CARE'),
(414, 'iForce Nutrition'),
(415, 'IL HWA KOREAN GINSENG'),
(416, 'IMPERIAL ELIXIR'),
(417, 'IMPERIAL ORGANIC'),
(418, 'INDIUMEASE THE SILVER BULLET'),
(419, 'INHOLTRA'),
(420, 'INNER HEALTH'),
(421, 'iSatori'),
(422, 'ISLAND TWIST'),
(423, 'ISS RESEARCH'),
(424, 'J.R. LIGGETT\'S'),
(425, 'J.R. WATKINS'),
(426, 'JACK N JILL KIDS'),
(427, 'JADE LEAF ORGANICS LLC'),
(428, 'JAKEMANS'),
(429, 'JAMS 2'),
(430, 'JASON NATURAL PRODUCTS'),
(431, 'JAXX'),
(432, 'JEFFREY JAMES BOTANICALS'),
(433, 'JILZ GLUTEN FREE'),
(434, 'Jimmy Bar'),
(435, 'KARE-N-HERBS'),
(436, 'KAY\'S NATURALS'),
(437, 'KEEP YOUR INK'),
(438, 'KENDY USA'),
(439, 'KETO ZONE'),
(440, 'KetoSports'),
(441, 'Kill Cliff'),
(442, 'KIMONO CONDOMS'),
(443, 'KIND'),
(444, 'Kind Snacks'),
(445, 'KIRK\'S NATURAL'),
(446, 'Kirkland Signature'),
(447, 'KISS MY FACE'),
(448, 'KITU'),
(449, 'Krave Pure Foods'),
(450, 'KROEGER HERB'),
(451, 'KYO*DOPHILUS'),
(452, 'KYO*GREEN'),
(453, 'KYOLIC'),
(454, 'Labrada Nutrition'),
(455, 'LACI LE BEAU'),
(456, 'LAFE\'S NATURAL BODY CARE'),
(457, 'LAKANTO'),
(458, 'LEAN & PURE'),
(459, 'LEE HANEY NUTRITIONAL SUPPORT'),
(460, 'Lenny & Larry'),
(461, 'LIDDELL HOMEOPATHIC'),
(462, 'LIFE FLO'),
(463, 'Lifeaid Beverage Company'),
(464, 'LIFELINE FITNESS'),
(465, 'LIFESTIX'),
(466, 'LifeTime Vitamins'),
(467, 'Light Mountain'),
(468, 'Lily Of The Desert'),
(469, 'LIPLOOB'),
(470, 'LIQUID HEALTH PRODUCTS'),
(471, 'LIVE CLEAN'),
(472, 'LIVERITE'),
(473, 'LIVING CLAY'),
(474, 'Living Essentials'),
(475, 'LOMA LUX LABORATORIES'),
(476, 'LOVE YOUR COLOR'),
(477, 'LUCKY 7'),
(478, 'LUMINO HOME'),
(479, 'LUNA'),
(480, 'LUNETTE'),
(481, 'LUVENA'),
(482, 'Lw Scientific'),
(483, 'MACA MAGIC'),
(484, 'MACRO LIFE NATURALS'),
(485, 'MACROLIFE NATURALS'),
(486, 'MALABAR'),
(487, 'MAN CAVE'),
(488, 'MAN Sports'),
(489, 'Mancakes'),
(490, 'MANISCHEWITZ'),
(491, 'MANITOBA HARVEST'),
(492, 'MANUKAGUARD'),
(493, 'MARGARITE COSMETICS'),
(494, 'MASON NATURALS'),
(495, 'MASTER LOCK'),
(496, 'MASTER SUPPLEMENTS INC'),
(497, 'MAXI HEALTH KOSHER VITAMINS'),
(498, 'MAXIM HYGIENE PRODUCTS'),
(499, 'MAXIMUM INTERNATIONAL'),
(500, 'MAYER LABORATORIES'),
(501, 'MAYUMI'),
(502, 'ME4KIDS'),
(503, 'MELLISA B NATURALLY'),
(504, 'MET-Rx'),
(505, 'Metabolic Nutrition'),
(506, 'METHOD PRODUCTS INC'),
(507, 'MHP'),
(508, 'Military Trail'),
(509, 'MILL CREEK'),
(510, 'MINERAL FUSION'),
(511, 'MODE DE VIE'),
(512, 'MODUCARE'),
(513, 'MOLECULAR NUTRITION'),
(514, 'MOM\'S BEST NATURALS'),
(515, 'MOMMY\'S BLISS'),
(516, 'MONOI'),
(517, 'MONTANA BIG SKY'),
(518, 'MOOM'),
(519, 'MOTIONEAZE'),
(520, 'MOUNTAIN OCEAN'),
(521, 'MOUTH WATCHERS'),
(522, 'MRI'),
(523, 'MRM'),
(524, 'MRS.MEYERS CLEAN DAY'),
(525, 'MUSCLE ELEMENTS'),
(526, 'Muscle Meds'),
(527, 'Muscle Sandwich'),
(528, 'Muscleology Sports Nutrition'),
(529, 'MusclePharm'),
(530, 'MuscleTech'),
(531, 'MUSHROOM WISDOM'),
(532, 'MY MAGIC MUD'),
(533, 'MYADERM'),
(534, 'NASALINE'),
(535, 'NASOPURE'),
(536, 'NATRA-BIO'),
(537, 'NATRACARE'),
(538, 'NATRALIA'),
(539, 'NATREN'),
(540, 'NATROL'),
(541, 'NATROL TWIN PACK'),
(542, 'Naturade'),
(543, 'Natural Advancement'),
(544, 'NATURAL BALANCE'),
(545, 'NATURAL CARE'),
(546, 'NATURAL CHEMISTRY'),
(547, 'NATURAL DENTIST'),
(548, 'NATURAL DYNAMIX DX'),
(549, 'NATURAL FITNESS'),
(550, 'NATURAL HIGH'),
(551, 'NATURAL NATIVE'),
(552, 'NATURAL SOURCES'),
(553, 'NATURAL VITALITY'),
(554, 'NATURALLY FRESH'),
(555, 'NATURALLY VITAMINS'),
(556, 'NATURE BY CANUS'),
(557, 'NATURE NUT'),
(558, 'NATURE\'S ALCHEMY'),
(559, 'NATURE\'S ANSWER'),
(560, 'NATURE\'S BABY ORGANICS'),
(561, 'Nature\'s Bakery'),
(562, 'Nature\'s Best'),
(563, 'NATURE\'S EARTHLY CHOICE'),
(564, 'NATURE\'S GATE'),
(565, 'NATURE\'S GIFT'),
(566, 'NATURE\'S LIFE'),
(567, 'Nature\'s Plus'),
(568, 'NATURE\'S SECRET'),
(569, 'NATURE\'S WAY'),
(570, 'NATUREWISE'),
(571, 'NATUREWORKS'),
(572, 'NATURIGIN'),
(573, 'NATURTINT'),
(574, 'NEEMAURA NATURALS'),
(575, 'NELSONS'),
(576, 'NEOCELL'),
(577, 'NEPTUNE\'S HARVEST FERTILIZERS'),
(578, 'Nestle Waters'),
(579, 'NEW NORDIC'),
(580, 'NF SPORTS'),
(581, 'NFUSE'),
(582, 'NITRO FUSION'),
(583, 'NLA For Her'),
(584, 'Nogii'),
(585, 'NORTH AMERICAN HERB & SPICE'),
(586, 'NOURISH'),
(587, 'NOURISH BOTANICAL BEAUTY'),
(588, 'Now Foods'),
(589, 'NOYAH'),
(590, 'NUAGE'),
(591, 'NUBIAN HERITAGE'),
(592, 'NUCO'),
(593, 'Nugenix'),
(594, 'Nugo Nutrition'),
(595, 'NUGO NUTRITION BAR'),
(596, 'NUHAIR'),
(597, 'NUMI TEA'),
(598, 'NURTURME'),
(599, 'NUTIVA'),
(600, 'NUTRAMAX LABS'),
(601, 'Nutrex'),
(602, 'Nutrex Hawaii'),
(603, 'NUTRICOLOGY'),
(604, 'NutriForce'),
(605, 'NUTRITION NOW'),
(606, 'Nutrition53'),
(607, 'NUUN HYDRATION'),
(608, 'NUUN VITAMINS'),
(609, 'O MY!'),
(610, 'Oh My Spice'),
(611, 'OHCO'),
(612, 'OLA LOA PRODUCTS'),
(613, 'OLBAS'),
(614, 'OLIVELLA'),
(615, 'OLIVINA MEN'),
(616, 'OLLY'),
(617, 'OLYMPIAN LABS'),
(618, 'OM'),
(619, 'OMNI'),
(620, 'On The Go'),
(621, 'ONE WITH NATURE'),
(622, 'ONLY NATURAL'),
(623, 'ONLY WHAT YOU NEED'),
(624, 'OPTIMAL BLEND'),
(625, 'Optimum Nutrition'),
(626, 'ORACOAT'),
(627, 'ORGANIC EXCELLENCE'),
(628, 'ORGANIC FIJI'),
(629, 'Organic India'),
(630, 'ORGANYC'),
(631, 'Ostrim'),
(632, 'OVEGA-3'),
(633, 'OWN'),
(634, 'OXYLIFE PRODUCTS'),
(635, 'P28 Foods'),
(636, 'PACIFIC RESOURCES INT.'),
(637, 'Pacifichealth Laboratories'),
(638, 'PANDA'),
(639, 'PARADISE HERBS'),
(640, 'PARISSA'),
(641, 'PEACEFUL MOUNTAIN'),
(642, 'PEELU'),
(643, 'PERFECT SHAKER'),
(644, 'PERFECTLY HEALTHY'),
(645, 'PerfectShaker'),
(646, 'PERI-GUM'),
(647, 'Perky Jerky'),
(648, 'PERSIAN'),
(649, 'PERSONNA'),
(650, 'PES'),
(651, 'PET NATURALS OF VERMONT'),
(652, 'PETGUARD'),
(653, 'PHARMATON NATURAL HEALTH PRODS'),
(654, 'PHION BALANCE'),
(655, 'PHRESH PRODUCTS'),
(656, 'PHRESH SUPERFOODS'),
(657, 'PHYTO-THERAPY'),
(658, 'PILL CRUSHER'),
(659, 'PINES INTERNATIONAL'),
(660, 'PLANTFUSION'),
(661, 'POMONA ORGANIC'),
(662, 'Power Blendz'),
(663, 'Power Crunch'),
(664, 'PRBar'),
(665, 'PREBIOTIN'),
(666, 'PRELIEF'),
(667, 'PRESERVE'),
(668, 'PrimaForce'),
(669, 'PRINCE OF PEACE'),
(670, 'PRO 30'),
(671, 'Pro Source'),
(672, 'PROBAR'),
(673, 'Prolab'),
(674, 'PROLAB NUTRITION'),
(675, 'PROMAX'),
(676, 'PROMENSIL'),
(677, 'ProSupps'),
(678, 'PRUNELAX'),
(679, 'PUKKA HERBAL TEAS'),
(680, 'PURE & BASIC'),
(681, 'PURE GOODNESS'),
(682, 'PURE LIFE SOAP'),
(683, 'PURE PLANET'),
(684, 'PURE PROTEIN'),
(685, 'PureFit Nutrition Bar'),
(686, 'PURETOUCH SKIN CARE'),
(687, 'Purus Labs'),
(688, 'QII'),
(689, 'QUANTUM HEALTH'),
(690, 'QUEEN HELENE'),
(691, 'Quest Nutrition'),
(692, 'QUIT NITS'),
(693, 'RADIUS'),
(694, 'RAINBOW LIGHT'),
(695, 'RAINBOW RESEARCH'),
(696, 'RAW ELEMENTS'),
(697, 'RAW REVOLUTION'),
(698, 'REAL ALOE'),
(699, 'REAL HEALTH'),
(700, 'REAL SALT'),
(701, 'REBEL GREEN'),
(702, 'REBEL ROSE'),
(703, 'REBELS REFINERY'),
(704, 'REBOOST-MEDINATURA'),
(705, 'Redcon1'),
(706, 'REDMOND CLAY'),
(707, 'REDMOND LIFE'),
(708, 'RegiMEN'),
(709, 'REJUVICARE'),
(710, 'RENDER'),
(711, 'REQUA'),
(712, 'RESERVEAGE NUTRITION'),
(713, 'RESTORATIVE BOTANICALS'),
(714, 'REVIVA'),
(715, 'RHOOST'),
(716, 'RICOLA'),
(717, 'RIDGECREST HERBALS'),
(718, 'Rivalus'),
(719, 'ROBERT RESEARCH LABORATORIES'),
(720, 'Rock Tape'),
(721, 'Rockstar'),
(722, 'Ronnie Coleman Signature Series'),
(723, 'ROOTS & FRUITS'),
(724, 'ROYAL TROPICS'),
(725, 'Rule One Proteins'),
(726, 'RUMI'),
(727, 'RXBAR'),
(728, 'SAFE CATCH'),
(729, 'SAI BABA'),
(730, 'SALBA SMART'),
(731, 'SALONPAS'),
(732, 'SAMBUCOL'),
(733, 'SAN'),
(734, 'SANA BOTANICALS'),
(735, 'SANHELIOS'),
(736, 'SANTEVIA WATER SYSTEMS'),
(737, 'SAPPO HILL SOAPWORKS'),
(738, 'SAVESTA'),
(739, 'SAVOR TOOTH PALEO'),
(740, 'SCHIFF VITAMINS'),
(741, 'SCHMIDT\'S'),
(742, 'Scivation'),
(743, 'SDC Nutrition'),
(744, 'SEA MINERALS'),
(745, 'SEA-BAND'),
(746, 'SEABUCK WONDERS'),
(747, 'SECURE DENTURE ADHESIVE'),
(748, 'SERA TOPICAL'),
(749, 'SEVENTH GENERATION'),
(750, 'SHADOW LAKE'),
(751, 'Shanti Bars'),
(752, 'SHEA MOISTURE'),
(753, 'SHEA NATURAL'),
(754, 'SHEA RADIANCE'),
(755, 'SHEN MIN'),
(756, 'SHIKAI PRODUCTS'),
(757, 'SHROOMS'),
(758, 'SIBU BEAUTY'),
(759, 'SIDDA FLOWER ESSENCES'),
(760, 'SIGG'),
(761, 'SILK'),
(762, 'SILVER BIOTICS'),
(763, 'SIMILASAN'),
(764, 'SIMPLY PROTEIN'),
(765, 'SIMPLY SLICK'),
(766, 'SINOL'),
(767, 'SINUPRET BY BIONORICA'),
(768, 'SLICE OF LIFE ORGANICS'),
(769, 'SLIMQUICK'),
(770, 'SMART ORGANICS'),
(771, 'Smart Shake'),
(772, 'SMARTSHAKE'),
(773, 'SMARTYPANTS'),
(774, 'SMILE BRITE'),
(775, 'SMITH TEAMAKER'),
(776, 'SNAC System'),
(777, 'SNOOZE'),
(778, 'SOLSTICE MEDICINE COMPANY'),
(779, 'SOLUS'),
(780, 'SOMA'),
(781, 'SONNE\'S'),
(782, 'SOOTHING TOUCH'),
(783, 'SOUTH OF FRANCE'),
(784, 'SPA ROOM'),
(785, 'SPEAR PERFORMANCE'),
(786, 'Species Nutrition'),
(787, 'SPECTRUM ESSENTIALS'),
(788, 'Sportlegs'),
(789, 'SQUIP PRODUCTS'),
(790, 'ST CLAIRE\'S'),
(791, 'ST DALFOUR'),
(792, 'STASH TEA'),
(793, 'STAY AWAY BY EARTHKIND'),
(794, 'STEVITA'),
(795, 'STONY BROOK BOTANICALS'),
(796, 'STRENGTH OF HOPE'),
(797, 'Stryve Foods'),
(798, 'STUFFY NOSE STRIPS'),
(799, 'SUBLINGUAL PRODUCTS'),
(800, 'SUKIN'),
(801, 'SUMMIT NUTRITIONS'),
(802, 'SUN & EARTH'),
(803, 'SUN CHLORELLA'),
(804, 'SUNSWEET NATURALS'),
(805, 'SUPERIOR TRADING'),
(806, 'Supplement RX'),
(807, 'SURF SWEETS'),
(808, 'SURYA BRASIL'),
(809, 'SUSTAIN'),
(810, 'SW BASICS'),
(811, 'SWEET LEAF'),
(812, 'SWEETIE PIE'),
(813, 'SWISS KRISS'),
(814, 'SWISSPERS'),
(815, 'SWISSPERS ORGANICS'),
(816, 'SYMBIOTICS'),
(817, 'T-Relief Medinatura'),
(818, 'Tapout'),
(819, 'Tea Tree Therapy'),
(820, 'Teecino'),
(821, 'Tera\'s Whey'),
(822, 'TestMedica'),
(823, 'That\'s It Nutrition'),
(824, 'Thayers'),
(825, 'The Coromega Company'),
(826, 'The Honey Pot'),
(827, 'The Pure Bar Company'),
(828, 'The Seaweed Bath Co.'),
(829, 'The Stuff'),
(830, 'The Tongue Cleaner'),
(831, 'TheKooler.com'),
(832, 'Theraneem Naturals'),
(833, 'THINKBABY'),
(834, 'THINKSPORT'),
(835, 'thinkThin'),
(836, 'thinkThin'),
(837, 'This Bar Saves Lives'),
(838, 'Three Lollies'),
(839, 'THUNDER RIDGE EMU PRODUCTS'),
(840, 'TIGER BALM'),
(841, 'TIGERS MILK'),
(842, 'TINTS OF NATURE'),
(843, 'TO GO BRANDS'),
(844, 'TOM\'S OF MAINE'),
(845, 'TOOTH TISSUES'),
(846, 'TOPRICIN'),
(847, 'TRADITIONAL MEDICINALS'),
(848, 'TRASK NUTRITION'),
(849, 'TREE HUGGER'),
(850, 'TRES PUPUSAS'),
(851, 'Trimr'),
(852, 'TRIPLE LEAF TEA'),
(853, 'TROPICAL OASIS'),
(854, 'TROPICAL PLANTATION'),
(855, 'TRP COMPANY'),
(856, 'TRU DERMA'),
(857, 'TruProteins'),
(858, 'TUMERICA'),
(859, 'TWEEZERMAN'),
(860, 'TWINLAB'),
(861, 'Uas Laboratories'),
(862, 'Ultra Glandulars'),
(863, 'UMAC Marine Phytoplankton'),
(864, 'Un-Petroleum'),
(865, 'Uncle Lees Tea'),
(866, 'Universal Nutrition'),
(867, 'Up4 Probiotics'),
(868, 'Urban Moonshine'),
(869, 'Vegan Pure'),
(870, 'Vegan Smart'),
(871, 'Veggie Wash'),
(872, 'Vermont Smoke & Cure'),
(873, 'VH Essentials'),
(874, 'Vital Earth Minerals'),
(875, 'Vitargo'),
(876, 'VMI Sports'),
(877, 'VPX'),
(878, 'Wallys Natural'),
(879, 'Wedderspoon'),
(880, 'Weider Global Nutrition'),
(881, 'Weleda'),
(882, 'Wellements'),
(883, 'Wellements Baby'),
(884, 'Wellinhand Action Remedies'),
(885, 'Wellmind-Medinatura'),
(886, 'Wfit Nutrition'),
(887, 'White Egret'),
(888, 'Whole Foods'),
(889, 'Wholesome!'),
(890, 'Wild Harvest'),
(891, 'Windmill Health Products'),
(892, 'Wisdom of the Ancients'),
(893, 'Wise Essentials'),
(894, 'WodFuel'),
(895, 'Wolo Wanderbar'),
(896, 'Women'),
(897, 'Wonder Melon'),
(898, 'Woobamboo'),
(899, 'Wow'),
(900, 'X1 Fuel'),
(901, 'Xyience'),
(902, 'Xylichew'),
(903, 'Yakshi Naturals'),
(904, 'Yeast Gard Advanced'),
(905, 'Yellow Yak'),
(906, 'Yerba Prima'),
(907, 'Yogi'),
(908, 'Yogourmet'),
(909, 'Youtheory'),
(910, 'YumEarth'),
(911, 'Yummi Bears Organics'),
(912, 'YUMV\'S'),
(913, 'YumVs'),
(914, 'Zand'),
(915, 'Zarbee\'s'),
(916, 'Zephyrhills'),
(917, 'Zhou Nutrition'),
(918, 'Zint Nutrition'),
(919, 'Zion Health'),
(920, 'Zone Perfect'),
(921, 'Zuke\'s');

-- --------------------------------------------------------

--
-- Table structure for table `citedbrands`
--

CREATE TABLE `citedbrands` (
  `testimony_idtestimony` int(11) NOT NULL,
  `brands_idbrands` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citedbrands`
--

INSERT INTO `citedbrands` (`testimony_idtestimony`, `brands_idbrands`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `idcomment` int(11) NOT NULL,
  `datePosted` datetime DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `user_iduser` int(11) NOT NULL,
  `testimony_idtestimony` int(11) NOT NULL,
  `editDate` datetime DEFAULT NULL,
  `comment_idcomment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`idcomment`, `datePosted`, `comment`, `user_iduser`, `testimony_idtestimony`, `editDate`, `comment_idcomment`) VALUES
(1, NULL, '<p>\n	fsdfsdf</p>\n', 1, 1, NULL, NULL),
(2, '2020-06-29 12:37:16', '<p>\n	adas</p>\n', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(100) NOT NULL DEFAULT '',
  `currencyCode` char(3) DEFAULT NULL,
  `fipsCode` char(2) DEFAULT NULL,
  `isoNumeric` char(4) DEFAULT NULL,
  `north` varchar(30) DEFAULT NULL,
  `south` varchar(30) DEFAULT NULL,
  `east` varchar(30) DEFAULT NULL,
  `west` varchar(30) DEFAULT NULL,
  `capital` varchar(30) DEFAULT NULL,
  `continentName` varchar(100) DEFAULT NULL,
  `continent` char(2) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  `isoAlpha3` char(3) DEFAULT NULL,
  `geonameId` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `countryName`, `currencyCode`, `fipsCode`, `isoNumeric`, `north`, `south`, `east`, `west`, `capital`, `continentName`, `continent`, `languages`, `isoAlpha3`, `geonameId`) VALUES
(1, 'AD', 'Andorra', 'EUR', 'AN', '020', '42.65604389629997', '42.42849259876837', '1.7865427778319827', '1.4071867141112762', 'Andorra la Vella', 'Europe', 'EU', 'ca', 'AND', 3041565),
(2, 'AE', 'United Arab Emirates', 'AED', 'AE', '784', '26.08415985107422', '22.633329391479492', '56.38166046142578', '51.58332824707031', 'Abu Dhabi', 'Asia', 'AS', 'ar-AE,fa,en,hi,ur', 'ARE', 290557),
(3, 'AF', 'Afghanistan', 'AFN', 'AF', '004', '38.483418', '29.377472', '74.879448', '60.478443', 'Kabul', 'Asia', 'AS', 'fa-AF,ps,uz-AF,tk', 'AFG', 1149361),
(4, 'AG', 'Antigua and Barbuda', 'XCD', 'AC', '028', '17.729387', '16.996979', '-61.672421', '-61.906425', 'St. John\'s', 'North America', 'NA', 'en-AG', 'ATG', 3576396),
(5, 'AI', 'Anguilla', 'XCD', 'AV', '660', '18.283424', '18.166815', '-62.971359', '-63.172901', 'The Valley', 'North America', 'NA', 'en-AI', 'AIA', 3573511),
(6, 'AL', 'Albania', 'ALL', 'AL', '008', '42.665611', '39.648361', '21.068472', '19.293972', 'Tirana', 'Europe', 'EU', 'sq,el', 'ALB', 783754),
(7, 'AM', 'Armenia', 'AMD', 'AM', '051', '41.301834', '38.830528', '46.772435045159995', '43.44978', 'Yerevan', 'Asia', 'AS', 'hy', 'ARM', 174982),
(8, 'AO', 'Angola', 'AOA', 'AO', '024', '-4.376826', '-18.042076', '24.082119', '11.679219', 'Luanda', 'Africa', 'AF', 'pt-AO', 'AGO', 3351879),
(9, 'AQ', 'Antarctica', '', 'AY', '010', '-60.515533', '-89.9999', '179.9999', '-179.9999', '', 'Antarctica', 'AN', '', 'ATA', 6697173),
(10, 'AR', 'Argentina', 'ARS', 'AR', '032', '-21.781277', '-55.061314', '-53.591835', '-73.58297', 'Buenos Aires', 'South America', 'SA', 'es-AR,en,it,de,fr,gn', 'ARG', 3865483),
(11, 'AS', 'American Samoa', 'USD', 'AQ', '016', '-11.0497', '-14.382478', '-169.416077', '-171.091888', 'Pago Pago', 'Oceania', 'OC', 'en-AS,sm,to', 'ASM', 5880801),
(12, 'AT', 'Austria', 'EUR', 'AU', '040', '49.0211627691393', '46.3726520216244', '17.1620685652599', '9.53095237240833', 'Vienna', 'Europe', 'EU', 'de-AT,hr,hu,sl', 'AUT', 2782113),
(13, 'AU', 'Australia', 'AUD', 'AS', '036', '-10.062805', '-43.64397', '153.639252', '112.911057', 'Canberra', 'Oceania', 'OC', 'en-AU', 'AUS', 2077456),
(14, 'AW', 'Aruba', 'AWG', 'AA', '533', '12.623718127152925', '12.411707706190716', '-69.86575120104982', '-70.0644737196045', 'Oranjestad', 'North America', 'NA', 'nl-AW,es,en', 'ABW', 3577279),
(15, 'AX', 'Åland Islands', 'EUR', '', '248', '60.488861', '59.90675', '21.011862', '19.317694', 'Mariehamn', 'Europe', 'EU', 'sv-AX', 'ALA', 661882),
(16, 'AZ', 'Azerbaijan', 'AZN', 'AJ', '031', '41.90564', '38.38915252685547', '50.370083', '44.774113', 'Baku', 'Asia', 'AS', 'az,ru,hy', 'AZE', 587116),
(17, 'BA', 'Bosnia and Herzegovina', 'BAM', 'BK', '070', '45.239193', '42.546112', '19.622223', '15.718945', 'Sarajevo', 'Europe', 'EU', 'bs,hr-BA,sr-BA', 'BIH', 3277605),
(18, 'BB', 'Barbados', 'BBD', 'BB', '052', '13.327257', '13.039844', '-59.420376', '-59.648922', 'Bridgetown', 'North America', 'NA', 'en-BB', 'BRB', 3374084),
(19, 'BD', 'Bangladesh', 'BDT', 'BG', '050', '26.631945', '20.743334', '92.673668', '88.028336', 'Dhaka', 'Asia', 'AS', 'bn-BD,en', 'BGD', 1210997),
(20, 'BE', 'Belgium', 'EUR', 'BE', '056', '51.505444', '49.49361', '6.403861', '2.546944', 'Brussels', 'Europe', 'EU', 'nl-BE,fr-BE,de-BE', 'BEL', 2802361),
(21, 'BF', 'Burkina Faso', 'XOF', 'UV', '854', '15.082593', '9.401108', '2.405395', '-5.518916', 'Ouagadougou', 'Africa', 'AF', 'fr-BF', 'BFA', 2361809),
(22, 'BG', 'Bulgaria', 'BGN', 'BU', '100', '44.21764', '41.242084', '28.612167', '22.371166', 'Sofia', 'Europe', 'EU', 'bg,tr-BG,rom', 'BGR', 732800),
(23, 'BH', 'Bahrain', 'BHD', 'BA', '048', '26.282583', '25.796862', '50.664471', '50.45414', 'Manama', 'Asia', 'AS', 'ar-BH,en,fa,ur', 'BHR', 290291),
(24, 'BI', 'Burundi', 'BIF', 'BY', '108', '-2.310123', '-4.465713', '30.847729', '28.993061', 'Bujumbura', 'Africa', 'AF', 'fr-BI,rn', 'BDI', 433561),
(25, 'BJ', 'Benin', 'XOF', 'BN', '204', '12.418347', '6.225748', '3.851701', '0.774575', 'Porto-Novo', 'Africa', 'AF', 'fr-BJ', 'BEN', 2395170),
(26, 'BL', 'Saint Barthélemy', 'EUR', 'TB', '652', '17.928808791949283', '17.878183227405575', '-62.788983372985854', '-62.8739118253784', 'Gustavia', 'North America', 'NA', 'fr', 'BLM', 3578476),
(27, 'BM', 'Bermuda', 'BMD', 'BD', '060', '32.393833', '32.246639', '-64.651993', '-64.89605', 'Hamilton', 'North America', 'NA', 'en-BM,pt', 'BMU', 3573345),
(28, 'BN', 'Brunei Darussalam', 'BND', 'BX', '096', '5.047167', '4.003083', '115.359444', '114.071442', 'Bandar Seri Begawan', 'Asia', 'AS', 'ms-BN,en-BN', 'BRN', 1820814),
(29, 'BO', 'Bolivia', 'BOB', 'BL', '068', '-9.680567', '-22.896133', '-57.45809600000001', '-69.640762', 'Sucre', 'South America', 'SA', 'es-BO,qu,ay', 'BOL', 3923057),
(30, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'USD', '', '535', '12.304535', '12.017149', '-68.192307', '-68.416458', '', 'North America', 'NA', 'nl,pap,en', 'BES', 7626844),
(31, 'BR', 'Brazil', 'BRL', 'BR', '076', '5.264877', '-33.750706', '-32.392998', '-73.985535', 'Brasília', 'South America', 'SA', 'pt-BR,es,en,fr', 'BRA', 3469034),
(32, 'BS', 'Bahamas', 'BSD', 'BF', '044', '26.919243', '22.852743', '-74.423874', '-78.995911', 'Nassau', 'North America', 'NA', 'en-BS', 'BHS', 3572887),
(33, 'BT', 'Bhutan', 'BTN', 'BT', '064', '28.323778', '26.70764', '92.125191', '88.75972', 'Thimphu', 'Asia', 'AS', 'dz', 'BTN', 1252634),
(34, 'BV', 'Bouvet Island', 'NOK', 'BV', '074', '-54.400322', '-54.462383', '3.487976', '3.335499', '', 'Antarctica', 'AN', '', 'BVT', 3371123),
(35, 'BW', 'Botswana', 'BWP', 'BC', '072', '-17.780813', '-26.907246', '29.360781', '19.999535', 'Gaborone', 'Africa', 'AF', 'en-BW,tn-BW', 'BWA', 933860),
(36, 'BY', 'Belarus', 'BYR', 'BO', '112', '56.165806', '51.256416', '32.770805', '23.176889', 'Minsk', 'Europe', 'EU', 'be,ru', 'BLR', 630336),
(37, 'BZ', 'Belize', 'BZD', 'BH', '084', '18.496557', '15.8893', '-87.776985', '-89.224815', 'Belmopan', 'North America', 'NA', 'en-BZ,es', 'BLZ', 3582678),
(38, 'CA', 'Canada', 'CAD', 'CA', '124', '83.110626', '41.67598', '-52.636291', '-141', 'Ottawa', 'North America', 'NA', 'en-CA,fr-CA,iu', 'CAN', 6251999),
(39, 'CC', 'Cocos [Keeling] Islands', 'AUD', 'CK', '166', '-12.072459094', '-12.208725839', '96.929489344', '96.816941408', 'West Island', 'Asia', 'AS', 'ms-CC,en', 'CCK', 1547376),
(40, 'CD', 'Democratic Republic of the Congo', 'COD', 'CD', '180', '5.386098', '-13.455675', '31.305912', '12.204144', 'Kinshasa', 'Africa', 'AF', 'fr-CD,ln,kg', 'COD', 203312),
(41, 'CF', 'Central African Republic', 'XAF', 'CT', '140', '11.007569', '2.220514', '27.463421', '14.420097', 'Bangui', 'Africa', 'AF', 'fr-CF,sg,ln,kg', 'CAF', 239880),
(42, 'CG', 'Republic of the Congo', 'XAF', 'CF', '178', '3.703082', '-5.027223', '18.649839', '11.205009', 'Brazzaville', 'Africa', 'AF', 'fr-CG,kg,ln-CG', 'COG', 2260494),
(43, 'CH', 'Switzerland', 'CHF', 'SZ', '756', '47.805332', '45.825695', '10.491472', '5.957472', 'Berne', 'Europe', 'EU', 'de-CH,fr-CH,it-CH,rm', 'CHE', 2658434),
(44, 'CI', 'Ivory Coast', 'XOF', 'IV', '384', '10.736642', '4.357067', '-2.494897', '-8.599302', 'Yamoussoukro', 'Africa', 'AF', 'fr-CI', 'CIV', 2287781),
(45, 'CK', 'Cook Islands', 'NZD', 'CW', '184', '-10.023114', '-21.944164', '-157.312134', '-161.093658', 'Avarua', 'Oceania', 'OC', 'en-CK,mi', 'COK', 1899402),
(46, 'CL', 'Chile', 'CLP', 'CI', '152', '-17.507553', '-55.9256225109217', '-66.417557', '-80.785851', 'Santiago', 'South America', 'SA', 'es-CL', 'CHL', 3895114),
(47, 'CM', 'Cameroon', 'XAF', 'CM', '120', '13.078056', '1.652548', '16.192116', '8.494763', 'Yaoundé', 'Africa', 'AF', 'en-CM,fr-CM', 'CMR', 2233387),
(48, 'CN', 'China', 'CNY', 'CH', '156', '53.56086', '15.775416', '134.773911', '73.557693', 'Beijing', 'Asia', 'AS', 'zh-CN,yue,wuu,dta,ug,za', 'CHN', 1814991),
(49, 'CO', 'Colombia', 'COP', 'CO', '170', '13.380502', '-4.225869', '-66.869835', '-81.728111', 'Bogotá', 'South America', 'SA', 'es-CO', 'COL', 3686110),
(50, 'CR', 'Costa Rica', 'CRC', 'CS', '188', '11.216819', '8.032975', '-82.555992', '-85.950623', 'San José', 'North America', 'NA', 'es-CR,en', 'CRI', 3624060),
(51, 'CU', 'Cuba', 'CUP', 'CU', '192', '23.226042', '19.828083', '-74.131775', '-84.957428', 'Havana', 'North America', 'NA', 'es-CU', 'CUB', 3562981),
(52, 'CV', 'Cape Verde', 'CVE', 'CV', '132', '17.197178', '14.808022', '-22.669443', '-25.358747', 'Praia', 'Africa', 'AF', 'pt-CV', 'CPV', 3374766),
(53, 'CW', 'Curaçao', 'ANG', 'UC', '531', '12.385672', '12.032745', '-68.733948', '-69.157204', 'Willemstad', 'North America', 'NA', 'nl,pap', 'CUW', 7626836),
(54, 'CX', 'Christmas Island', 'AUD', 'KT', '162', '-10.412356007', '-10.5704829995', '105.712596992', '105.533276992', 'The Settlement', 'Asia', 'AS', 'en,zh,ms-CC', 'CXR', 2078138),
(55, 'CY', 'Cyprus', 'EUR', 'CY', '196', '35.701527', '34.6332846722908', '34.59791599999994', '32.27308300000004', 'Nicosia', 'Europe', 'EU', 'el-CY,tr-CY,en', 'CYP', 146669),
(56, 'CZ', 'Czech Republic', 'CZK', 'EZ', '203', '51.058887', '48.542915', '18.860111', '12.096194', 'Prague', 'Europe', 'EU', 'cs,sk', 'CZE', 3077311),
(57, 'DE', 'Germany', 'EUR', 'GM', '276', '55.055637', '47.275776', '15.039889', '5.865639', 'Berlin', 'Europe', 'EU', 'de', 'DEU', 2921044),
(58, 'DJ', 'Djibouti', 'DJF', 'DJ', '262', '12.706833', '10.909917', '43.416973', '41.773472', 'Djibouti', 'Africa', 'AF', 'fr-DJ,ar,so-DJ,aa', 'DJI', 223816),
(59, 'DK', 'Denmark', 'DKK', 'DA', '208', '57.748417', '54.562389', '15.158834', '8.075611', 'Copenhagen', 'Europe', 'EU', 'da-DK,en,fo,de-DK', 'DNK', 2623032),
(60, 'DM', 'Dominica', 'XCD', 'DO', '212', '15.631809', '15.20169', '-61.244152', '-61.484108', 'Roseau', 'North America', 'NA', 'en-DM', 'DMA', 3575830),
(61, 'DO', 'Dominican Republic', 'DOP', 'DR', '214', '19.929859', '17.543159', '-68.32', '-72.003487', 'Santo Domingo', 'North America', 'NA', 'es-DO', 'DOM', 3508796),
(62, 'DZ', 'Algeria', 'DZD', 'AG', '012', '37.093723', '18.960028', '11.979548', '-8.673868', 'Algiers', 'Africa', 'AF', 'ar-DZ', 'DZA', 2589581),
(63, 'EC', 'Ecuador', 'USD', 'EC', '218', '1.43902', '-4.998823', '-75.184586', '-81.078598', 'Quito', 'South America', 'SA', 'es-EC', 'ECU', 3658394),
(64, 'EE', 'Estonia', 'EUR', 'EN', '233', '59.676224', '57.516193', '28.209972', '21.837584', 'Tallinn', 'Europe', 'EU', 'et,ru', 'EST', 453733),
(65, 'EG', 'Egypt', 'EGP', 'EG', '818', '31.667334', '21.725389', '36.89833068847656', '24.698111', 'Cairo', 'Africa', 'AF', 'ar-EG,en,fr', 'EGY', 357994),
(66, 'EH', 'Western Sahara', 'MAD', 'WI', '732', '27.669674', '20.774158', '-8.670276', '-17.103182', 'El Aaiún', 'Africa', 'AF', 'ar,mey', 'ESH', 2461445),
(67, 'ER', 'Eritrea', 'ERN', 'ER', '232', '18.003084', '12.359555', '43.13464', '36.438778', 'Asmara', 'Africa', 'AF', 'aa-ER,ar,tig,kun,ti-ER', 'ERI', 338010),
(68, 'ES', 'Spain', 'EUR', 'SP', '724', '43.7913565913767', '36.0001044260548', '4.32778473043961', '-9.30151567231899', 'Madrid', 'Europe', 'EU', 'es-ES,ca,gl,eu,oc', 'ESP', 2510769),
(69, 'ET', 'Ethiopia', 'ETB', 'ET', '231', '14.89375', '3.402422', '47.986179', '32.999939', 'Addis Ababa', 'Africa', 'AF', 'am,en-ET,om-ET,ti-ET,so-ET,sid', 'ETH', 337996),
(70, 'FI', 'Finland', 'EUR', 'FI', '246', '70.096054', '59.808777', '31.580944', '20.556944', 'Helsinki', 'Europe', 'EU', 'fi-FI,sv-FI,smn', 'FIN', 660013),
(71, 'FJ', 'Fiji', 'FJD', 'FJ', '242', '-12.480111', '-20.67597', '-178.424438', '177.129334', 'Suva', 'Oceania', 'OC', 'en-FJ,fj', 'FJI', 2205218),
(72, 'FK', 'Falkland Islands', 'FKP', 'FK', '238', '-51.24065', '-52.360512', '-57.712486', '-61.345192', 'Stanley', 'South America', 'SA', 'en-FK', 'FLK', 3474414),
(73, 'FM', 'Micronesia', 'USD', 'FM', '583', '10.08904', '1.02629', '163.03717', '137.33648', 'Palikir', 'Oceania', 'OC', 'en-FM,chk,pon,yap,kos,uli,woe,nkr,kpg', 'FSM', 2081918),
(74, 'FO', 'Faroe Islands', 'DKK', 'FO', '234', '62.400749', '61.394943', '-6.399583', '-7.458', 'Tórshavn', 'Europe', 'EU', 'fo,da-FO', 'FRO', 2622320),
(75, 'FR', 'France', 'EUR', 'FR', '250', '51.092804', '41.371582', '9.561556', '-5.142222', 'Paris', 'Europe', 'EU', 'fr-FR,frp,br,co,ca,eu,oc', 'FRA', 3017382),
(76, 'GA', 'Gabon', 'XAF', 'GB', '266', '2.322612', '-3.978806', '14.502347', '8.695471', 'Libreville', 'Africa', 'AF', 'fr-GA', 'GAB', 2400553),
(77, 'GB', 'United Kingdom of Great Britain and Northern Ireland', 'GBP', 'UK', '826', '59.360249', '49.906193', '1.759', '-8.623555', 'London', 'Europe', 'EU', 'en-GB,cy-GB,gd', 'GBR', 2635167),
(78, 'GD', 'Grenada', 'XCD', 'GJ', '308', '12.318283928171299', '11.986893', '-61.57676970108031', '-61.802344', 'St. George\'s', 'North America', 'NA', 'en-GD', 'GRD', 3580239),
(79, 'GE', 'Georgia', 'GEL', 'GG', '268', '43.586498', '41.053196', '46.725971', '40.010139', 'Tbilisi', 'Asia', 'AS', 'ka,ru,hy,az', 'GEO', 614540),
(80, 'GF', 'French Guiana', 'EUR', 'FG', '254', '5.776496', '2.127094', '-51.613949', '-54.542511', 'Cayenne', 'South America', 'SA', 'fr-GF', 'GUF', 3381670),
(81, 'GG', 'Guernsey', 'GBP', 'GK', '831', '49.731727816705416', '49.40764156876899', '-2.1577152112246267', '-2.673194593476069', 'St Peter Port', 'Europe', 'EU', 'en,fr', 'GGY', 3042362),
(82, 'GH', 'Ghana', 'GHS', 'GH', '288', '11.173301', '4.736723', '1.191781', '-3.25542', 'Accra', 'Africa', 'AF', 'en-GH,ak,ee,tw', 'GHA', 2300660),
(83, 'GI', 'Gibraltar', 'GIP', 'GI', '292', '36.155439135670726', '36.10903070140248', '-5.338285164001491', '-5.36626149743654', 'Gibraltar', 'Europe', 'EU', 'en-GI,es,it,pt', 'GIB', 2411586),
(84, 'GL', 'Greenland', 'DKK', 'GL', '304', '83.627357', '59.777401', '-11.312319', '-73.04203', 'Nuuk', 'North America', 'NA', 'kl,da-GL,en', 'GRL', 3425505),
(85, 'GM', 'Gambia', 'GMD', 'GA', '270', '13.826571', '13.064252', '-13.797793', '-16.825079', 'Banjul', 'Africa', 'AF', 'en-GM,mnk,wof,wo,ff', 'GMB', 2413451),
(86, 'GN', 'Guinea', 'GNF', 'GV', '324', '12.67622', '7.193553', '-7.641071', '-14.926619', 'Conakry', 'Africa', 'AF', 'fr-GN', 'GIN', 2420477),
(87, 'GP', 'Guadeloupe', 'EUR', 'GP', '312', '16.516848', '15.867565', '-61', '-61.544765', 'Basse-Terre', 'North America', 'NA', 'fr-GP', 'GLP', 3579143),
(88, 'GQ', 'Equatorial Guinea', 'XAF', 'EK', '226', '2.346989', '0.92086', '11.335724', '9.346865', 'Malabo', 'Africa', 'AF', 'es-GQ,fr', 'GNQ', 2309096),
(89, 'GR', 'Greece', 'EUR', 'GR', '300', '41.7484999849641', '34.8020663391466', '28.2470831714347', '19.3736035624134', 'Athens', 'Europe', 'EU', 'el-GR,en,fr', 'GRC', 390903),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'GBP', 'SX', '239', '-53.970467', '-59.479259', '-26.229326', '-38.021175', 'Grytviken', 'Antarctica', 'AN', 'en', 'SGS', 3474415),
(91, 'GT', 'Guatemala', 'GTQ', 'GT', '320', '17.81522', '13.737302', '-88.223198', '-92.23629', 'Guatemala City', 'North America', 'NA', 'es-GT', 'GTM', 3595528),
(92, 'GU', 'Guam', 'USD', 'GQ', '316', '13.654402', '13.23376', '144.956894', '144.61806', 'Hagåtña', 'Oceania', 'OC', 'en-GU,ch-GU', 'GUM', 4043988),
(93, 'GW', 'Guinea-Bissau', 'XOF', 'PU', '624', '12.680789', '10.924265', '-13.636522', '-16.717535', 'Bissau', 'Africa', 'AF', 'pt-GW,pov', 'GNB', 2372248),
(94, 'GY', 'Guyana', 'GYD', 'GY', '328', '8.557567', '1.17508', '-56.480251', '-61.384762', 'Georgetown', 'South America', 'SA', 'en-GY', 'GUY', 3378535),
(95, 'HK', 'Hong Kong', 'HKD', 'HK', '344', '22.559778', '22.15325', '114.434753', '113.837753', 'Hong Kong', 'Asia', 'AS', 'zh-HK,yue,zh,en', 'HKG', 1819730),
(96, 'HM', 'Heard Island and McDonald Islands', 'AUD', 'HM', '334', '-52.909416', '-53.192001', '73.859146', '72.596535', '', 'Antarctica', 'AN', '', 'HMD', 1547314),
(97, 'HN', 'Honduras', 'HNL', 'HO', '340', '16.510256', '12.982411', '-83.155403', '-89.350792', 'Tegucigalpa', 'North America', 'NA', 'es-HN', 'HND', 3608932),
(98, 'HR', 'Croatia', 'HRK', 'HR', '191', '46.53875', '42.43589', '19.427389', '13.493222', 'Zagreb', 'Europe', 'EU', 'hr-HR,sr', 'HRV', 3202326),
(99, 'HT', 'Haiti', 'HTG', 'HA', '332', '20.08782', '18.021032', '-71.613358', '-74.478584', 'Port-au-Prince', 'North America', 'NA', 'ht,fr-HT', 'HTI', 3723988),
(100, 'HU', 'Hungary', 'HUF', 'HU', '348', '48.585667', '45.74361', '22.906', '16.111889', 'Budapest', 'Europe', 'EU', 'hu-HU', 'HUN', 719819),
(101, 'ID', 'Indonesia', 'IDR', 'ID', '360', '5.904417', '-10.941861', '141.021805', '95.009331', 'Jakarta', 'Asia', 'AS', 'id,en,nl,jv', 'IDN', 1643084),
(102, 'IE', 'Ireland', 'EUR', 'EI', '372', '55.387917', '51.451584', '-6.002389', '-10.478556', 'Dublin', 'Europe', 'EU', 'en-IE,ga-IE', 'IRL', 2963597),
(103, 'IL', 'Israel', 'ILS', 'IS', '376', '33.340137', '29.496639', '35.876804', '34.270278754419145', '', 'Asia', 'AS', 'he,ar-IL,en-IL,', 'ISR', 294640),
(104, 'IM', 'Isle of Man', 'GBP', 'IM', '833', '54.419724', '54.055916', '-4.3115', '-4.798722', 'Douglas', 'Europe', 'EU', 'en,gv', 'IMN', 3042225),
(105, 'IN', 'India', 'INR', 'IN', '356', '35.504223', '6.747139', '97.403305', '68.186691', 'New Delhi', 'Asia', 'AS', 'en-IN,hi,bn,te,mr,ta,ur,gu,kn,ml,or,pa,as,bh,sat,ks,ne,sd,kok,doi,mni,sit,sa,fr,lus,inc', 'IND', 1269750),
(106, 'IO', 'British Indian Ocean Territory', 'USD', 'IO', '086', '-5.268333', '-7.438028', '72.493164', '71.259972', '', 'Asia', 'AS', 'en-IO', 'IOT', 1282588),
(107, 'IQ', 'Iraq', 'IQD', 'IZ', '368', '37.378029', '29.069445', '48.575916', '38.795887', 'Baghdad', 'Asia', 'AS', 'ar-IQ,ku,hy', 'IRQ', 99237),
(108, 'IR', 'Iran', 'IRR', 'IR', '364', '39.777222', '25.064083', '63.317471', '44.047279', 'Tehran', 'Asia', 'AS', 'fa-IR,ku', 'IRN', 130758),
(109, 'IS', 'Iceland', 'ISK', 'IC', '352', '66.53463', '63.393253', '-13.495815', '-24.546524', 'Reykjavik', 'Europe', 'EU', 'is,en,de,da,sv,no', 'ISL', 2629691),
(110, 'IT', 'Italy', 'EUR', 'IT', '380', '47.095196', '36.652779', '18.513445', '6.614889', 'Rome', 'Europe', 'EU', 'it-IT,de-IT,fr-IT,sc,ca,co,sl', 'ITA', 3175395),
(111, 'JE', 'Jersey', 'GBP', 'JE', '832', '49.265057', '49.169834', '-2.022083', '-2.260028', 'Saint Helier', 'Europe', 'EU', 'en,pt', 'JEY', 3042142),
(112, 'JM', 'Jamaica', 'JMD', 'JM', '388', '18.526976', '17.703554', '-76.180321', '-78.366638', 'Kingston', 'North America', 'NA', 'en-JM', 'JAM', 3489940),
(113, 'JO', 'Jordan', 'JOD', 'JO', '400', '33.367668', '29.185888', '39.301167', '34.959999', 'Amman', 'Asia', 'AS', 'ar-JO,en', 'JOR', 248816),
(114, 'JP', 'Japan', 'JPY', 'JA', '392', '45.52314', '24.249472', '145.820892', '122.93853', 'Tokyo', 'Asia', 'AS', 'ja', 'JPN', 1861060),
(115, 'KE', 'Kenya', 'KES', 'KE', '404', '5.019938', '-4.678047', '41.899078', '33.908859', 'Nairobi', 'Africa', 'AF', 'en-KE,sw-KE', 'KEN', 192950),
(116, 'KG', 'Kyrgyzstan', 'KGS', 'KG', '417', '43.238224', '39.172832', '80.283165', '69.276611', 'Bishkek', 'Asia', 'AS', 'ky,uz,ru', 'KGZ', 1527747),
(117, 'KH', 'Cambodia', 'KHR', 'CB', '116', '14.686417', '10.409083', '107.627724', '102.339996', 'Phnom Penh', 'Asia', 'AS', 'km,fr,en', 'KHM', 1831722),
(118, 'KI', 'Kiribati', 'AUD', 'KR', '296', '4.71957', '-11.446881150186856', '-150.215347', '169.556137', 'Tarawa', 'Oceania', 'OC', 'en-KI,gil', 'KIR', 4030945),
(119, 'KM', 'Comoros', 'KMF', 'CN', '174', '-11.362381', '-12.387857', '44.538223', '43.21579', 'Moroni', 'Africa', 'AF', 'ar,fr-KM', 'COM', 921929),
(120, 'KN', 'Saint Kitts and Nevis', 'XCD', 'SC', '659', '17.420118', '17.095343', '-62.543266', '-62.86956', 'Basseterre', 'North America', 'NA', 'en-KN', 'KNA', 3575174),
(121, 'KP', 'North Korea', 'KPW', 'KN', '408', '43.006054', '37.673332', '130.674866', '124.315887', 'Pyongyang', 'Asia', 'AS', 'ko-KP', 'PRK', 1873107),
(122, 'KR', 'South Korea', 'KRW', 'KS', '410', '38.612446', '33.190945', '129.584671', '125.887108', 'Seoul', 'Asia', 'AS', 'ko-KR,en', 'KOR', 1835841),
(123, 'KW', 'Kuwait', 'KWD', 'KU', '414', '30.095945', '28.524611', '48.431473', '46.555557', 'Kuwait City', 'Asia', 'AS', 'ar-KW,en', 'KWT', 285570),
(124, 'KY', 'Cayman Islands', 'KYD', 'CJ', '136', '19.7617', '19.263029', '-79.727272', '-81.432777', 'George Town', 'North America', 'NA', 'en-KY', 'CYM', 3580718),
(125, 'KZ', 'Kazakhstan', 'KZT', 'KZ', '398', '55.451195', '40.936333', '87.312668', '46.491859', 'Astana', 'Asia', 'AS', 'kk,ru', 'KAZ', 1522867),
(126, 'LA', 'Laos', 'LAK', 'LA', '418', '22.500389', '13.910027', '107.697029', '100.093056', 'Vientiane', 'Asia', 'AS', 'lo,fr,en', 'LAO', 1655842),
(127, 'LB', 'Lebanon', 'LBP', 'LE', '422', '34.691418', '33.05386', '36.639194', '35.114277', 'Beirut', 'Asia', 'AS', 'ar-LB,fr-LB,en,hy', 'LBN', 272103),
(128, 'LC', 'Saint Lucia', 'XCD', 'ST', '662', '14.103245', '13.704778', '-60.874203', '-61.07415', 'Castries', 'North America', 'NA', 'en-LC', 'LCA', 3576468),
(129, 'LI', 'Liechtenstein', 'CHF', 'LS', '438', '47.2706251386959', '47.0484284123471', '9.63564281136796', '9.47167359782014', 'Vaduz', 'Europe', 'EU', 'de-LI', 'LIE', 3042058),
(130, 'LK', 'Sri Lanka', 'LKR', 'CE', '144', '9.831361', '5.916833', '81.881279', '79.652916', 'Colombo', 'Asia', 'AS', 'si,ta,en', 'LKA', 1227603),
(131, 'LR', 'Liberia', 'LRD', 'LI', '430', '8.551791', '4.353057', '-7.365113', '-11.492083', 'Monrovia', 'Africa', 'AF', 'en-LR', 'LBR', 2275384),
(132, 'LS', 'Lesotho', 'LSL', 'LT', '426', '-28.572058', '-30.668964', '29.465761', '27.029068', 'Maseru', 'Africa', 'AF', 'en-LS,st,zu,xh', 'LSO', 932692),
(133, 'LT', 'Lithuania', 'EUR', 'LH', '440', '56.446918', '53.901306', '26.871944', '20.941528', 'Vilnius', 'Europe', 'EU', 'lt,ru,pl', 'LTU', 597427),
(134, 'LU', 'Luxembourg', 'EUR', 'LU', '442', '50.184944', '49.446583', '6.528472', '5.734556', 'Luxembourg', 'Europe', 'EU', 'lb,de-LU,fr-LU', 'LUX', 2960313),
(135, 'LV', 'Latvia', 'EUR', 'LG', '428', '58.082306', '55.668861', '28.241167', '20.974277', 'Riga', 'Europe', 'EU', 'lv,ru,lt', 'LVA', 458258),
(136, 'LY', 'Libya', 'LYD', 'LY', '434', '33.168999', '19.508045', '25.150612', '9.38702', 'Tripoli', 'Africa', 'AF', 'ar-LY,it,en', 'LBY', 2215636),
(137, 'MA', 'Morocco', 'MAD', 'MO', '504', '35.9224966985384', '27.662115', '-0.991750000000025', '-13.168586', 'Rabat', 'Africa', 'AF', 'ar-MA,fr', 'MAR', 2542007),
(138, 'MC', 'Monaco', 'EUR', 'MN', '492', '43.75196717037228', '43.72472839869377', '7.439939260482788', '7.408962249755859', 'Monaco', 'Europe', 'EU', 'fr-MC,en,it', 'MCO', 2993457),
(139, 'MD', 'Moldova', 'MDL', 'MD', '498', '48.490166', '45.468887', '30.135445', '26.618944', 'Chişinău', 'Europe', 'EU', 'ro,ru,gag,tr', 'MDA', 617790),
(140, 'ME', 'Montenegro', 'EUR', 'MJ', '499', '43.570137', '41.850166', '20.358833', '18.461306', 'Podgorica', 'Europe', 'EU', 'sr,hu,bs,sq,hr,rom', 'MNE', 3194884),
(141, 'MF', 'Saint Martin', 'EUR', 'RN', '663', '18.130354', '18.052231', '-63.012993', '-63.152767', 'Marigot', 'North America', 'NA', 'fr', 'MAF', 3578421),
(142, 'MG', 'Madagascar', 'MGA', 'MA', '450', '-11.945433', '-25.608952', '50.48378', '43.224876', 'Antananarivo', 'Africa', 'AF', 'fr-MG,mg', 'MDG', 1062947),
(143, 'MH', 'Marshall Islands', 'USD', 'RM', '584', '14.62', '5.587639', '171.931808', '165.524918', 'Majuro', 'Oceania', 'OC', 'mh,en-MH', 'MHL', 2080185),
(144, 'MK', 'North Macedonia', 'MKD', 'MK', '807', '42.361805', '40.860195', '23.038139', '20.464695', 'Skopje', 'Europe', 'EU', 'mk,sq,tr,rmm,sr', 'MKD', 718075),
(145, 'ML', 'Mali', 'XOF', 'ML', '466', '25.000002', '10.159513', '4.244968', '-12.242614', 'Bamako', 'Africa', 'AF', 'fr-ML,bm', 'MLI', 2453866),
(146, 'MM', 'Myanmar [Burma]', 'MMK', 'BM', '104', '28.543249', '9.784583', '101.176781', '92.189278', 'Nay Pyi Taw', 'Asia', 'AS', 'my', 'MMR', 1327865),
(147, 'MN', 'Mongolia', 'MNT', 'MG', '496', '52.154251', '41.567638', '119.924309', '87.749664', 'Ulan Bator', 'Asia', 'AS', 'mn,ru', 'MNG', 2029969),
(148, 'MO', 'Macao', 'MOP', 'MC', '446', '22.222334', '22.180389', '113.565834', '113.528946', 'Macao', 'Asia', 'AS', 'zh,zh-MO,pt', 'MAC', 1821275),
(149, 'MP', 'Northern Mariana Islands', 'USD', 'CQ', '580', '20.55344', '14.11023', '146.06528', '144.88626', 'Saipan', 'Oceania', 'OC', 'fil,tl,zh,ch-MP,en-MP', 'MNP', 4041468),
(150, 'MQ', 'Martinique', 'EUR', 'MB', '474', '14.878819', '14.392262', '-60.81551', '-61.230118', 'Fort-de-France', 'North America', 'NA', 'fr-MQ', 'MTQ', 3570311),
(151, 'MR', 'Mauritania', 'MRO', 'MR', '478', '27.298073', '14.715547', '-4.827674', '-17.066521', 'Nouakchott', 'Africa', 'AF', 'ar-MR,fuc,snk,fr,mey,wo', 'MRT', 2378080),
(152, 'MS', 'Montserrat', 'XCD', 'MH', '500', '16.824060205313184', '16.674768935441556', '-62.144100129608205', '-62.24138237036129', 'Plymouth', 'North America', 'NA', 'en-MS', 'MSR', 3578097),
(153, 'MT', 'Malta', 'EUR', 'MT', '470', '36.0821530995456', '35.8061835000002', '14.5764915000002', '14.1834251000001', 'Valletta', 'Europe', 'EU', 'mt,en-MT', 'MLT', 2562770),
(154, 'MU', 'Mauritius', 'MUR', 'MP', '480', '-10.319255', '-20.525717', '63.500179', '56.512718', 'Port Louis', 'Africa', 'AF', 'en-MU,bho,fr', 'MUS', 934292),
(155, 'MV', 'Maldives', 'MVR', 'MV', '462', '7.091587495414767', '-0.692694', '73.637276', '72.693222', 'Malé', 'Asia', 'AS', 'dv,en', 'MDV', 1282028),
(156, 'MW', 'Malawi', 'MWK', 'MI', '454', '-9.367541', '-17.125', '35.916821', '32.67395', 'Lilongwe', 'Africa', 'AF', 'ny,yao,tum,swk', 'MWI', 927384),
(157, 'MX', 'Mexico', 'MXN', 'MX', '484', '32.716759', '14.532866', '-86.703392', '-118.453949', 'Mexico City', 'North America', 'NA', 'es-MX', 'MEX', 3996063),
(158, 'MY', 'Malaysia', 'MYR', 'MY', '458', '7.363417', '0.855222', '119.267502', '99.643448', 'Kuala Lumpur', 'Asia', 'AS', 'ms-MY,en,zh,ta,te,ml,pa,th', 'MYS', 1733045),
(159, 'MZ', 'Mozambique', 'MZN', 'MZ', '508', '-10.471883', '-26.868685', '40.842995', '30.217319', 'Maputo', 'Africa', 'AF', 'pt-MZ,vmw', 'MOZ', 1036973),
(160, 'NA', 'Namibia', 'NAD', 'WA', '516', '-16.959894', '-28.97143', '25.256701', '11.71563', 'Windhoek', 'Africa', 'AF', 'en-NA,af,de,hz,naq', 'NAM', 3355338),
(161, 'NC', 'New Caledonia', 'XPF', 'NC', '540', '-19.549778', '-22.698', '168.129135', '163.564667', 'Noumea', 'Oceania', 'OC', 'fr-NC', 'NCL', 2139685),
(162, 'NE', 'Niger', 'XOF', 'NG', '562', '23.525026', '11.696975', '15.995643', '0.16625', 'Niamey', 'Africa', 'AF', 'fr-NE,ha,kr,dje', 'NER', 2440476),
(163, 'NF', 'Norfolk Island', 'AUD', 'NF', '574', '-28.995170686948427', '-29.063076742954735', '167.99773740209957', '167.91543230151365', 'Kingston', 'Oceania', 'OC', 'en-NF', 'NFK', 2155115),
(164, 'NG', 'Nigeria', 'NGN', 'NI', '566', '13.892007', '4.277144', '14.680073', '2.668432', 'Abuja', 'Africa', 'AF', 'en-NG,ha,yo,ig,ff', 'NGA', 2328926),
(165, 'NI', 'Nicaragua', 'NIO', 'NU', '558', '15.025909', '10.707543', '-82.738289', '-87.690308', 'Managua', 'North America', 'NA', 'es-NI,en', 'NIC', 3617476),
(166, 'NL', 'Netherlands', 'EUR', 'NL', '528', '53.512196', '50.753918', '7.227944', '3.362556', 'Amsterdam', 'Europe', 'EU', 'nl-NL,fy-NL', 'NLD', 2750405),
(167, 'NO', 'Norway', 'NOK', 'NO', '578', '71.18811', '57.977917', '31.078052520751953', '4.650167', 'Oslo', 'Europe', 'EU', 'no,nb,nn,se,fi', 'NOR', 3144096),
(168, 'NP', 'Nepal', 'NPR', 'NP', '524', '30.43339', '26.356722', '88.199333', '80.056274', 'Kathmandu', 'Asia', 'AS', 'ne,en', 'NPL', 1282988),
(169, 'NR', 'Nauru', 'AUD', 'NR', '520', '-0.504306', '-0.552333', '166.945282', '166.899033', '', 'Oceania', 'OC', 'na,en-NR', 'NRU', 2110425),
(170, 'NU', 'Niue', 'NZD', 'NE', '570', '-18.951069', '-19.152193', '-169.775177', '-169.951004', 'Alofi', 'Oceania', 'OC', 'niu,en-NU', 'NIU', 4036232),
(171, 'NZ', 'New Zealand', 'NZD', 'NZ', '554', '-34.389668', '-47.286026', '-180', '166.7155', 'Wellington', 'Oceania', 'OC', 'en-NZ,mi', 'NZL', 2186224),
(172, 'OM', 'Oman', 'OMR', 'MU', '512', '26.387972', '16.64575', '59.836582', '51.882', 'Muscat', 'Asia', 'AS', 'ar-OM,en,bal,ur', 'OMN', 286963),
(173, 'PA', 'Panama', 'PAB', 'PM', '591', '9.637514', '7.197906', '-77.17411', '-83.051445', 'Panama City', 'North America', 'NA', 'es-PA,en', 'PAN', 3703430),
(174, 'PE', 'Peru', 'PEN', 'PE', '604', '-0.012977', '-18.349728', '-68.677986', '-81.326744', 'Lima', 'South America', 'SA', 'es-PE,qu,ay', 'PER', 3932488),
(175, 'PF', 'French Polynesia', 'XPF', 'FP', '258', '-7.903573', '-27.653572', '-134.929825', '-152.877167', 'Papeete', 'Oceania', 'OC', 'fr-PF,ty', 'PYF', 4030656),
(176, 'PG', 'Papua New Guinea', 'PGK', 'PP', '598', '-1.318639', '-11.657861', '155.96344', '140.842865', 'Port Moresby', 'Oceania', 'OC', 'en-PG,ho,meu,tpi', 'PNG', 2088628),
(177, 'PH', 'Philippines', 'PHP', 'RP', '608', '21.120611', '4.643306', '126.601524', '116.931557', 'Manila', 'Asia', 'AS', 'tl,en-PH,fil', 'PHL', 1694008),
(178, 'PK', 'Pakistan', 'PKR', 'PK', '586', '37.097', '23.786722', '77.840919', '60.878613', 'Islamabad', 'Asia', 'AS', 'ur-PK,en-PK,pa,sd,ps,brh', 'PAK', 1168579),
(179, 'PL', 'Poland', 'PLN', 'PL', '616', '54.839138', '49.006363', '24.150749', '14.123', 'Warsaw', 'Europe', 'EU', 'pl', 'POL', 798544),
(180, 'PM', 'Saint Pierre and Miquelon', 'EUR', 'SB', '666', '47.146286', '46.786041', '-56.252991', '-56.420658', 'Saint-Pierre', 'North America', 'NA', 'fr-PM', 'SPM', 3424932),
(181, 'PN', 'Pitcairn Islands', 'NZD', 'PC', '612', '-24.315865', '-24.672565', '-124.77285', '-128.346436', 'Adamstown', 'Oceania', 'OC', 'en-PN', 'PCN', 4030699),
(182, 'PR', 'Puerto Rico', 'USD', 'RQ', '630', '18.520166', '17.926405', '-65.242737', '-67.942726', 'San Juan', 'North America', 'NA', 'en-PR,es-PR', 'PRI', 4566966),
(183, 'PS', 'Palestine', 'ILS', 'WE', '275', '32.54638671875', '31.216541290283203', '35.5732955932617', '34.21665954589844', '', 'Asia', 'AS', 'ar-PS', 'PSE', 6254930),
(184, 'PT', 'Portugal', 'EUR', 'PO', '620', '42.154311127408', '36.96125', '-6.18915930748288', '-9.50052660716588', 'Lisbon', 'Europe', 'EU', 'pt-PT,mwl', 'PRT', 2264397),
(185, 'PW', 'Palau', 'USD', 'PS', '585', '8.46966', '2.8036', '134.72307', '131.11788', 'Melekeok - Palau State Capital', 'Oceania', 'OC', 'pau,sov,en-PW,tox,ja,fil,zh', 'PLW', 1559582),
(186, 'PY', 'Paraguay', 'PYG', 'PA', '600', '-19.294041', '-27.608738', '-54.259354', '-62.647076', 'Asunción', 'South America', 'SA', 'es-PY,gn', 'PRY', 3437598),
(187, 'QA', 'Qatar', 'QAR', 'QA', '634', '26.154722', '24.482944', '51.636639', '50.757221', 'Doha', 'Asia', 'AS', 'ar-QA,es', 'QAT', 289688),
(188, 'RE', 'Réunion', 'EUR', 'RE', '638', '-20.868391324576944', '-21.383747301469107', '55.838193901930026', '55.21219224792685', 'Saint-Denis', 'Africa', 'AF', 'fr-RE', 'REU', 935317),
(189, 'RO', 'Romania', 'RON', 'RO', '642', '48.266945', '43.627304', '29.691055', '20.269972', 'Bucharest', 'Europe', 'EU', 'ro,hu,rom', 'ROU', 798549),
(190, 'RS', 'Serbia', 'RSD', 'RI', '688', '46.18138885498047', '42.232215881347656', '23.00499725341797', '18.817020416259766', 'Belgrade', 'Europe', 'EU', 'sr,hu,bs,rom', 'SRB', 6290252),
(191, 'RU', 'Russia', 'RUB', 'RS', '643', '81.857361', '41.188862', '-169.05', '19.25', 'Moscow', 'Europe', 'EU', 'ru,tt,xal,cau,ady,kv,ce,tyv,cv,udm,tut,mns,bua,myv,mdf,chm,ba,inh,tut,kbd,krc,ava,sah,nog', 'RUS', 2017370),
(192, 'RW', 'Rwanda', 'RWF', 'RW', '646', '-1.053481', '-2.840679', '30.895958', '28.856794', 'Kigali', 'Africa', 'AF', 'rw,en-RW,fr-RW,sw', 'RWA', 49518),
(193, 'SA', 'Saudi Arabia', 'SAR', 'SA', '682', '32.158333', '15.61425', '55.666584', '34.495693', 'Riyadh', 'Asia', 'AS', 'ar-SA', 'SAU', 102358),
(194, 'SB', 'Solomon Islands', 'SBD', 'BP', '090', '-6.589611', '-11.850555', '166.980865', '155.508606', 'Honiara', 'Oceania', 'OC', 'en-SB,tpi', 'SLB', 2103350),
(195, 'SC', 'Seychelles', 'SCR', 'SE', '690', '-4.283717', '-9.753867', '56.29770287937299', '46.204769', 'Victoria', 'Africa', 'AF', 'en-SC,fr-SC', 'SYC', 241170),
(196, 'SD', 'Sudan', 'SDG', 'SU', '729', '22.232219696044922', '8.684720993041992', '38.60749816894531', '21.827774047851562', 'Khartoum', 'Africa', 'AF', 'ar-SD,en,fia', 'SDN', 366755),
(197, 'SE', 'Sweden', 'SEK', 'SW', '752', '69.0625', '55.337112', '24.1562924839185', '11.118694', 'Stockholm', 'Europe', 'EU', 'sv-SE,se,sma,fi-SE', 'SWE', 2661886),
(198, 'SG', 'Singapore', 'SGD', 'SN', '702', '1.471278', '1.258556', '104.007469', '103.638275', 'Singapore', 'Asia', 'AS', 'cmn,en-SG,ms-SG,ta-SG,zh-SG', 'SGP', 1880251),
(199, 'SH', 'Saint Helena', 'SHP', 'SH', '654', '-7.887815', '-16.019543', '-5.638753', '-14.42123', 'Jamestown', 'Africa', 'AF', 'en-SH', 'SHN', 3370751),
(200, 'SI', 'Slovenia', 'EUR', 'SI', '705', '46.8766275518195', '45.421812998164', '16.6106311807', '13.3753342064709', 'Ljubljana', 'Europe', 'EU', 'sl,sh', 'SVN', 3190538),
(201, 'SJ', 'Svalbard and Jan Mayen', 'NOK', 'SV', '744', '80.762085', '79.220306', '33.287334', '17.699389', 'Longyearbyen', 'Europe', 'EU', 'no,ru', 'SJM', 607072),
(202, 'SK', 'Slovakia', 'EUR', 'LO', '703', '49.603168', '47.728111', '22.570444', '16.84775', 'Bratislava', 'Europe', 'EU', 'sk,hu', 'SVK', 3057568),
(203, 'SL', 'Sierra Leone', 'SLL', 'SL', '694', '10', '6.929611', '-10.284238', '-13.307631', 'Freetown', 'Africa', 'AF', 'en-SL,men,tem', 'SLE', 2403846),
(204, 'SM', 'San Marino', 'EUR', 'SM', '674', '43.99223730851663', '43.8937092171425', '12.51653186779788', '12.403538978820734', 'San Marino', 'Europe', 'EU', 'it-SM', 'SMR', 3168068),
(205, 'SN', 'Senegal', 'XOF', 'SG', '686', '16.691633', '12.307275', '-11.355887', '-17.535236', 'Dakar', 'Africa', 'AF', 'fr-SN,wo,fuc,mnk', 'SEN', 2245662),
(206, 'SO', 'Somalia', 'SOS', 'SO', '706', '11.979166', '-1.674868', '51.412636', '40.986595', 'Mogadishu', 'Africa', 'AF', 'so-SO,ar-SO,it,en-SO', 'SOM', 51537),
(207, 'SR', 'Suriname', 'SRD', 'NS', '740', '6.004546', '1.831145', '-53.977493', '-58.086563', 'Paramaribo', 'South America', 'SA', 'nl-SR,en,srn,hns,jv', 'SUR', 3382998),
(208, 'SS', 'South Sudan', 'SSP', 'OD', '728', '12.219148635864258', '3.493394374847412', '35.9405517578125', '24.140274047851562', 'Juba', 'Africa', 'AF', 'en', 'SSD', 7909807),
(209, 'ST', 'São Tomé and Príncipe', 'STD', 'TP', '678', '1.701323', '0.024766', '7.466374', '6.47017', 'São Tomé', 'Africa', 'AF', 'pt-ST', 'STP', 2410758),
(210, 'SV', 'El Salvador', 'USD', 'ES', '222', '14.445067', '13.148679', '-87.692162', '-90.128662', 'San Salvador', 'North America', 'NA', 'es-SV', 'SLV', 3585968),
(211, 'SX', 'Sint Maarten', 'ANG', 'NN', '534', '18.070248', '18.011692', '-63.012993', '-63.144039', 'Philipsburg', 'North America', 'NA', 'nl,en', 'SXM', 7609695),
(212, 'SY', 'Syria', 'SYP', 'SY', '760', '37.319138', '32.310665', '42.385029', '35.727222', 'Damascus', 'Asia', 'AS', 'ar-SY,ku,hy,arc,fr,en', 'SYR', 163843),
(213, 'SZ', 'Swaziland', 'SZL', 'WZ', '748', '-25.719648', '-27.317101', '32.13726', '30.794107', 'Mbabane', 'Africa', 'AF', 'en-SZ,ss-SZ', 'SWZ', 934841),
(214, 'TC', 'Turks and Caicos Islands', 'USD', 'TK', '796', '21.961878', '21.422626', '-71.123642', '-72.483871', 'Cockburn Town', 'North America', 'NA', 'en-TC', 'TCA', 3576916),
(215, 'TD', 'Chad', 'XAF', 'CD', '148', '23.450369', '7.441068', '24.002661', '13.473475', 'N\'Djamena', 'Africa', 'AF', 'fr-TD,ar-TD,sre', 'TCD', 2434508),
(216, 'TF', 'French Southern Territories', 'EUR', 'FS', '260', '-37.790722', '-49.735184', '77.598808', '50.170258', 'Port-aux-Français', 'Antarctica', 'AN', 'fr', 'ATF', 1546748),
(217, 'TG', 'Togo', 'XOF', 'TO', '768', '11.138977', '6.104417', '1.806693', '-0.147324', 'Lomé', 'Africa', 'AF', 'fr-TG,ee,hna,kbp,dag,ha', 'TGO', 2363686),
(218, 'TH', 'Thailand', 'THB', 'TH', '764', '20.463194', '5.61', '105.639389', '97.345642', 'Bangkok', 'Asia', 'AS', 'th,en', 'THA', 1605651),
(219, 'TJ', 'Tajikistan', 'TJS', 'TI', '762', '41.042252', '36.674137', '75.137222', '67.387138', 'Dushanbe', 'Asia', 'AS', 'tg,ru', 'TJK', 1220409),
(220, 'TK', 'Tokelau', 'NZD', 'TL', '772', '-8.553613662719727', '-9.381111145019531', '-171.21142578125', '-172.50033569335938', '', 'Oceania', 'OC', 'tkl,en-TK', 'TKL', 4031074),
(221, 'TL', 'East Timor', 'USD', 'TT', '626', '-8.135833740234375', '-9.463626861572266', '127.30859375', '124.04609680175781', 'Dili', 'Oceania', 'OC', 'tet,pt-TL,id,en', 'TLS', 1966436),
(222, 'TM', 'Turkmenistan', 'TMT', 'TX', '795', '42.795555', '35.141083', '66.684303', '52.441444', 'Ashgabat', 'Asia', 'AS', 'tk,ru,uz', 'TKM', 1218197),
(223, 'TN', 'Tunisia', 'TND', 'TS', '788', '37.543915', '30.240417', '11.598278', '7.524833', 'Tunis', 'Africa', 'AF', 'ar-TN,fr', 'TUN', 2464461),
(224, 'TO', 'Tonga', 'TOP', 'TN', '776', '-15.562988', '-21.455057', '-173.907578', '-175.682266', 'Nuku\'alofa', 'Oceania', 'OC', 'to,en-TO', 'TON', 4032283),
(225, 'TR', 'Turkey', 'TRY', 'TU', '792', '42.107613', '35.815418', '44.834999', '25.668501', 'Ankara', 'Asia', 'AS', 'tr-TR,ku,diq,az,av', 'TUR', 298795),
(226, 'TT', 'Trinidad and Tobago', 'TTD', 'TD', '780', '11.338342', '10.036105', '-60.517933', '-61.923771', 'Port of Spain', 'North America', 'NA', 'en-TT,hns,fr,es,zh', 'TTO', 3573591),
(227, 'TV', 'Tuvalu', 'AUD', 'TV', '798', '-5.641972', '-10.801169', '179.863281', '176.064865', 'Funafuti', 'Oceania', 'OC', 'tvl,en,sm,gil', 'TUV', 2110297),
(228, 'TW', 'Taiwan', 'TWD', 'TW', '158', '25.3002899036181', '21.896606934717', '122.006739823315', '119.534691', 'Taipei', 'Asia', 'AS', 'zh-TW,zh,nan,hak', 'TWN', 1668284),
(229, 'TZ', 'Tanzania', 'TZS', 'TZ', '834', '-0.990736', '-11.745696', '40.443222', '29.327168', 'Dodoma', 'Africa', 'AF', 'sw-TZ,en,ar', 'TZA', 149590),
(230, 'UA', 'Ukraine', 'UAH', 'UP', '804', '52.369362', '44.390415', '40.20739', '22.128889', 'Kyiv', 'Europe', 'EU', 'uk,ru-UA,rom,pl,hu', 'UKR', 690791),
(231, 'UG', 'Uganda', 'UGX', 'UG', '800', '4.214427', '-1.48405', '35.036049', '29.573252', 'Kampala', 'Africa', 'AF', 'en-UG,lg,sw,ar', 'UGA', 226074),
(232, 'UM', 'U.S. Minor Outlying Islands', 'USD', '', '581', '28.219814', '-0.389006', '166.654526', '-177.392029', '', 'Oceania', 'OC', 'en-UM', 'UMI', 5854968),
(233, 'US', 'United States', 'USD', 'US', '840', '49.388611', '24.544245', '-66.954811', '-124.733253', 'Washington', 'North America', 'NA', 'en-US,es-US,haw,fr', 'USA', 6252001),
(234, 'UY', 'Uruguay', 'UYU', 'UY', '858', '-30.082224', '-34.980816', '-53.073933', '-58.442722', 'Montevideo', 'South America', 'SA', 'es-UY', 'URY', 3439705),
(235, 'UZ', 'Uzbekistan', 'UZS', 'UZ', '860', '45.575001', '37.184444', '73.132278', '55.996639', 'Tashkent', 'Asia', 'AS', 'uz,ru,tg', 'UZB', 1512440),
(236, 'VA', 'Vatican City', 'EUR', 'VT', '336', '41.90743830885576', '41.90027960306854', '12.45837546629481', '12.44570678169205', 'Vatican', 'Europe', 'EU', 'la,it,fr', 'VAT', 3164670),
(237, 'VC', 'Saint Vincent and the Grenadines', 'XCD', 'VC', '670', '13.377834', '12.583984810969037', '-61.11388', '-61.46090317727658', 'Kingstown', 'North America', 'NA', 'en-VC,fr', 'VCT', 3577815),
(238, 'VE', 'Venezuela', 'VEF', 'VE', '862', '12.201903', '0.626311', '-59.80378', '-73.354073', 'Caracas', 'South America', 'SA', 'es-VE', 'VEN', 3625428),
(239, 'VG', 'British Virgin Islands', 'USD', 'VI', '092', '18.757221', '18.383710898211305', '-64.268768', '-64.71312752730364', 'Road Town', 'North America', 'NA', 'en-VG', 'VGB', 3577718),
(240, 'VI', 'U.S. Virgin Islands', 'USD', 'VQ', '850', '18.415382', '17.673931', '-64.565193', '-65.101333', 'Charlotte Amalie', 'North America', 'NA', 'en-VI', 'VIR', 4796775),
(241, 'VN', 'Vietnam', 'VND', 'VM', '704', '23.388834', '8.559611', '109.464638', '102.148224', 'Hanoi', 'Asia', 'AS', 'vi,en,fr,zh,km', 'VNM', 1562822),
(242, 'VU', 'Vanuatu', 'VUV', 'NH', '548', '-13.073444', '-20.248945', '169.904785', '166.524979', 'Port Vila', 'Oceania', 'OC', 'bi,en-VU,fr-VU', 'VUT', 2134431),
(243, 'WF', 'Wallis and Futuna', 'XPF', 'WF', '876', '-13.216758181061444', '-14.314559989820843', '-176.16174317718253', '-178.1848112896414', 'Mata-Utu', 'Oceania', 'OC', 'wls,fud,fr-WF', 'WLF', 4034749),
(244, 'WS', 'Samoa', 'WST', 'WS', '882', '-13.432207', '-14.040939', '-171.415741', '-172.798599', 'Apia', 'Oceania', 'OC', 'sm,en-WS', 'WSM', 4034894),
(245, 'XK', 'Kosovo', 'EUR', 'KV', '0', '43.2682495807952', '41.856369601859925', '21.80335088694943', '19.977481504492914', 'Pristina', 'Europe', 'EU', 'sq,sr', 'XKX', 831053),
(246, 'YE', 'Yemen', 'YER', 'YM', '887', '18.9999989031009', '12.1110910264462', '54.5305388163283', '42.5325394314234', 'Sanaa', 'Asia', 'AS', 'ar-YE', 'YEM', 69543),
(247, 'YT', 'Mayotte', 'EUR', 'MF', '175', '-12.648891', '-13.000132', '45.29295', '45.03796', 'Mamoutzou', 'Africa', 'AF', 'fr-YT', 'MYT', 1024031),
(248, 'ZA', 'South Africa', 'ZAR', 'SF', '710', '-22.126612', '-34.839828', '32.895973', '16.458021', 'Pretoria', 'Africa', 'AF', 'zu,xh,af,nso,en-ZA,tn,st,ts,ss,ve,nr', 'ZAF', 953987),
(249, 'ZM', 'Zambia', 'ZMW', 'ZA', '894', '-8.22436', '-18.079473', '33.705704', '21.999371', 'Lusaka', 'Africa', 'AF', 'en-ZM,bem,loz,lun,lue,ny,toi', 'ZMB', 895949),
(250, 'ZW', 'Zimbabwe', 'ZWL', 'ZI', '716', '-15.608835', '-22.417738', '33.056305', '25.237028', 'Harare', 'Africa', 'AF', 'en-ZW,sn,nr,nd', 'ZWE', 878675);

-- --------------------------------------------------------

--
-- Table structure for table `disclaimer`
--

CREATE TABLE `disclaimer` (
  `idDisclaimer` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `shortName` varchar(300) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `legalVettingName` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disclaimer`
--

INSERT INTO `disclaimer` (`idDisclaimer`, `title`, `body`, `shortName`, `date`, `legalVettingName`) VALUES
(1, 'test', '<p>\n	dgsfdsfghjklhgf</p>\n', 'test', '2020-06-27', 'setse');

-- --------------------------------------------------------

--
-- Table structure for table `dosageunit`
--

CREATE TABLE `dosageunit` (
  `iddosageUnit` int(11) NOT NULL,
  `unitName` varchar(45) DEFAULT NULL,
  `unitShortName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosageunit`
--

INSERT INTO `dosageunit` (`iddosageUnit`, `unitName`, `unitShortName`) VALUES
(1, '1', '34534');

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `idduration` int(11) NOT NULL,
  `unit` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`idduration`, `unit`) VALUES
(1, 'fsdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `editor`
--

CREATE TABLE `editor` (
  `idEditor` int(11) NOT NULL,
  `firstName` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `profilePic` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `editor`
--

INSERT INTO `editor` (`idEditor`, `firstName`, `surname`, `title`, `bio`, `education`, `role`, `profilePic`, `username`, `password`, `email`) VALUES
(1, 'editor', 'e', 'test', '<p>\n	fdg</p>\n', '<p>\n	dfg</p>\n', '1', '95b6c-download.jpg', 'editor', 'c24d0a1968e339c3786751ab16411c2c24ce8a2e', 'editor@gmail.com'),
(2, 'reviewer', 'e', 'wer', '<p>\n	werwe</p>\n', '<p>\n	werw</p>\n', '2', '4c382-best-remedies-xd-0.jpg', 'reviwer', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'reviwer@gmail.com'),
(3, 'editor', 'sdfsd', 'sdfsd', '<p>\n	sdfsdf sfsdfsd</p>\n', '<p>\n	&nbsp;sfdfdsfsdf</p>\n', '1', NULL, 'editor', 'b9d41f5f3847c78f74cfcc418a58550f6c535f31', 'ramsai@hasdas.com');

-- --------------------------------------------------------

--
-- Table structure for table `featuredremedies`
--

CREATE TABLE `featuredremedies` (
  `article_idarticle` int(11) NOT NULL,
  `remedy_idremedy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `featuredremedies`
--

INSERT INTO `featuredremedies` (`article_idarticle`, `remedy_idremedy`) VALUES
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `featuredsicknesses`
--

CREATE TABLE `featuredsicknesses` (
  `article_idarticle` int(11) NOT NULL,
  `sickness_idsickness` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `featuredsicknesses`
--

INSERT INTO `featuredsicknesses` (`article_idarticle`, `sickness_idsickness`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE `homepage` (
  `idhomePage` int(11) NOT NULL,
  `mission` text DEFAULT NULL,
  `bannerText` varchar(400) DEFAULT NULL,
  `videoUrl` varchar(400) DEFAULT NULL,
  `qualityPromise` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`idhomePage`, `mission`, `bannerText`, `videoUrl`, `qualityPromise`) VALUES
(1, 'test home page', 'text banner', 'https://www.youtube.com/embed/n_Cn8eFo7u8', 'A cure is a substance or procedure that ends a medical condition, such as a medication, a surgical operation, a change in lifestyle or even a philosophical mindset that helps end a person\'s sufferings; or the state of being healed, or cured. The medical condition could be a disease, mental illness, disability, or simply a condition a person considers socially undesirable, such as baldness or lack of breast tissue.\r\n\r\nA disease is said to be incurable if there is always a chance of the patient relapsing, no matter how long the patient has been in remission. An incurable disease may or may not be a terminal illness; conversely, a curable illness can still result in the patient\'s death.\r\n\r\nThe proportion of people with a disease that are cured by a given treatment, called the cure fraction or cure rate, is determined by comparing disease-free survival of treated people against a matched control group that never had the disease.[1]');

-- --------------------------------------------------------

--
-- Table structure for table `metatags`
--

CREATE TABLE `metatags` (
  `idmetaTags` int(11) NOT NULL,
  `pageName` varchar(100) DEFAULT NULL,
  `title` varchar(60) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metatags`
--

INSERT INTO `metatags` (`idmetaTags`, `pageName`, `title`, `description`, `keywords`) VALUES
(1, 'ewrwer', 'werwer', '<p>\n	wrwerw</p>\n', '3453');

-- --------------------------------------------------------

--
-- Table structure for table `questioncategory`
--

CREATE TABLE `questioncategory` (
  `idquestionCategory` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questioncategory`
--

INSERT INTO `questioncategory` (`idquestionCategory`, `name`) VALUES
(1, 'how to reduce fever immediatly?'),
(2, 'Fever');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `idQuestion` int(11) NOT NULL,
  `questionCategory_idquestionCategory` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL,
  `details` text DEFAULT NULL,
  `dateTime` datetime DEFAULT NULL,
  `resolve` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`idQuestion`, `questionCategory_idquestionCategory`, `user_iduser`, `details`, `dateTime`, `resolve`) VALUES
(1, 2, 1, '<p>\n	test</p>\n', '2020-06-30 00:00:00', 'take hot water');

-- --------------------------------------------------------

--
-- Table structure for table `relieftype`
--

CREATE TABLE `relieftype` (
  `idrelief` int(11) NOT NULL,
  `type` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relieftype`
--

INSERT INTO `relieftype` (`idrelief`, `type`) VALUES
(1, 'test'),
(2, 'COMPLETE  AND PERMANENT RELIEF'),
(3, 'PARTIAL/TEMPORARY but made a real difference'),
(4, 'PARTIAL/TEMPORARY and made no significant difference'),
(5, 'COMPLETE but Temporary'),
(6, 'NO RELIEF AT ALL');

-- --------------------------------------------------------

--
-- Table structure for table `remedy`
--

CREATE TABLE `remedy` (
  `idremedy` int(11) NOT NULL,
  `type` varchar(60) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `shortName` varchar(60) DEFAULT NULL,
  `link` varchar(45) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `pictureAltText` varchar(200) DEFAULT NULL,
  `expertAdvice` text DEFAULT NULL,
  `sellerLink` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `remedy`
--

INSERT INTO `remedy` (`idremedy`, `type`, `name`, `shortName`, `link`, `picture`, `pictureAltText`, `expertAdvice`, `sellerLink`) VALUES
(2, NULL, 'NOT LISTED', NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 'Acorus calamus', NULL, 'acorus-calamus', NULL, NULL, NULL, NULL),
(4, NULL, 'Adrafinil', NULL, 'adrafinil', NULL, NULL, NULL, NULL),
(5, NULL, 'Aframomum melegueta', NULL, 'aframomum-melegueta', NULL, NULL, NULL, NULL),
(6, NULL, 'Agmatine', NULL, 'agmatine', NULL, NULL, NULL, NULL),
(7, NULL, 'Alanine', NULL, 'alanine', NULL, NULL, NULL, NULL),
(8, NULL, 'Alanylglutamine', NULL, 'alanylglutamine', NULL, NULL, NULL, NULL),
(9, NULL, 'Alcohol', NULL, 'alcohol', NULL, NULL, NULL, NULL),
(10, NULL, 'Aloe vera', NULL, 'aloe-vera', NULL, NULL, NULL, NULL),
(11, NULL, 'Alpha-GPC', NULL, 'alpha-gpc', NULL, NULL, NULL, NULL),
(12, NULL, 'Alpha-Lipoic Acid', NULL, 'alpha-lipoic-acid', NULL, NULL, NULL, NULL),
(13, NULL, 'Amaranth', NULL, 'amaranth', NULL, NULL, NULL, NULL),
(14, NULL, 'Anacyclus pyrethrum', NULL, 'anacyclus-pyrethrum', NULL, NULL, NULL, NULL),
(15, NULL, 'Anatabine', NULL, 'anatabine', NULL, NULL, NULL, NULL),
(16, NULL, 'Andrographis paniculata', NULL, 'andrographis-paniculata', NULL, NULL, NULL, NULL),
(17, NULL, 'Anethum graveolens', NULL, 'anethum-graveolens', NULL, NULL, NULL, NULL),
(18, NULL, 'Angelica gigas', NULL, 'angelica-gigas', NULL, NULL, NULL, NULL),
(19, NULL, 'Aniracetam', NULL, 'aniracetam', NULL, NULL, NULL, NULL),
(20, NULL, 'Apigenin', NULL, 'apigenin', NULL, NULL, NULL, NULL),
(21, NULL, 'Apocynum venetum', NULL, 'apocynum-venetum', NULL, NULL, NULL, NULL),
(22, NULL, 'Apple Cider Vinegar', NULL, 'acv', NULL, NULL, NULL, NULL),
(23, NULL, 'Arachidonic acid', NULL, 'arachidonic-acid', NULL, NULL, NULL, NULL),
(24, NULL, 'Arginine', NULL, 'arginine', NULL, NULL, NULL, NULL),
(25, NULL, 'Aromatherapy', NULL, 'aromatherapy', NULL, NULL, NULL, NULL),
(26, NULL, 'Aronia melanocarpa', NULL, 'aronia-melanocarpa', NULL, NULL, NULL, NULL),
(27, NULL, 'Artemisia iwayomogi', NULL, 'artemisia-iwayomogi', NULL, NULL, NULL, NULL),
(28, NULL, 'Artichoke Extract', NULL, 'artichoke-extract', NULL, NULL, NULL, NULL),
(29, NULL, 'Ascophyllum nodosum', NULL, 'ascophyllum-nodosum', NULL, NULL, NULL, NULL),
(30, NULL, 'Ashwagandha', NULL, 'ashwagandha', NULL, NULL, NULL, NULL),
(31, NULL, 'Asparagus racemosus', NULL, 'asparagus-racemosus', NULL, NULL, NULL, NULL),
(32, NULL, 'Astaxanthin', NULL, 'astaxanthin', NULL, NULL, NULL, NULL),
(33, NULL, 'Asteracantha longifolia', NULL, 'asteracantha-longifolia', NULL, NULL, NULL, NULL),
(34, NULL, 'Astragalus membranaceus', NULL, 'astragalus-membranaceus', NULL, NULL, NULL, NULL),
(35, NULL, 'Ayurveda', NULL, 'ayurveda', NULL, NULL, NULL, NULL),
(36, NULL, 'BPC-157', NULL, 'bpc-157', NULL, NULL, NULL, NULL),
(37, NULL, 'Bacopa monnieri', NULL, 'bacopa-monnieri', NULL, NULL, NULL, NULL),
(38, NULL, 'Banaba Leaf', NULL, 'banaba-leaf', NULL, NULL, NULL, NULL),
(39, NULL, 'Basella alba', NULL, 'basella-alba', NULL, NULL, NULL, NULL),
(40, NULL, 'Beetroot', NULL, 'beet-root', NULL, NULL, NULL, NULL),
(41, NULL, 'Benfotiamine', NULL, 'benfotiamine', NULL, NULL, NULL, NULL),
(42, NULL, 'Berberine', NULL, 'berberine', NULL, NULL, NULL, NULL),
(43, NULL, 'Beta-Alanine', NULL, 'beta-alanine', NULL, NULL, NULL, NULL),
(44, NULL, 'Betalains', NULL, 'betalains', NULL, NULL, NULL, NULL),
(45, NULL, 'Biotin', NULL, '<br><br> <a href=\"biotin', NULL, NULL, NULL, NULL),
(46, NULL, 'Black Cohosh', NULL, 'black-cohosh', NULL, NULL, NULL, NULL),
(47, NULL, 'Black Pepper', NULL, 'black-pepper', NULL, NULL, NULL, NULL),
(48, NULL, 'Bladderwrack', NULL, 'bladderwrack', NULL, NULL, NULL, NULL),
(49, NULL, 'Blueberry', NULL, 'blueberry', NULL, NULL, NULL, NULL),
(50, NULL, 'Boerhaavia diffusa', NULL, 'boerhaavia-diffusa', NULL, NULL, NULL, NULL),
(51, NULL, 'Boron', NULL, 'boron', NULL, NULL, NULL, NULL),
(52, NULL, 'Boswellia serrata', NULL, 'boswellia-serrata', NULL, NULL, NULL, NULL),
(53, NULL, 'Branched Chain Amino Acids', NULL, 'branched-chain-amino-acids', NULL, NULL, NULL, NULL),
(54, NULL, 'Brassaiopsis glomerulata', NULL, 'brassaiopsis-glomerulata', NULL, NULL, NULL, NULL),
(55, NULL, 'Brassica vegetables', NULL, 'brassica-vegetables', NULL, NULL, NULL, NULL),
(56, NULL, 'Brassinosteroids', NULL, 'brassinosteroids', NULL, NULL, NULL, NULL),
(57, NULL, 'Bromelain', NULL, 'bromelain', NULL, NULL, NULL, NULL),
(58, NULL, 'Bryonia laciniosa', NULL, 'bryonia-laciniosa', NULL, NULL, NULL, NULL),
(59, NULL, 'Bulbine natalensis', NULL, 'bulbine-natalensis', NULL, NULL, NULL, NULL),
(60, NULL, 'Butea monosperma', NULL, 'butea-monosperma', NULL, NULL, NULL, NULL),
(61, NULL, 'Butea superba', NULL, 'butea-superba', NULL, NULL, NULL, NULL),
(62, NULL, 'CBD', NULL, 'cbd', NULL, NULL, NULL, NULL),
(63, NULL, 'CDP-choline', NULL, 'cdp-choline', NULL, NULL, NULL, NULL),
(64, NULL, 'Caesalpinia benthamiana', NULL, 'caesalpinia-benthamiana', NULL, NULL, NULL, NULL),
(65, NULL, 'Caffeine', NULL, 'caffeine', NULL, NULL, NULL, NULL),
(66, NULL, 'Calcium', NULL, 'calcium', NULL, NULL, NULL, NULL),
(67, NULL, 'Calcium-D-Glucarate', NULL, 'calcium-d-glucarate', NULL, NULL, NULL, NULL),
(68, NULL, 'Capsaicin', NULL, 'capsaicin', NULL, NULL, NULL, NULL),
(69, NULL, 'Capsicum Carotenoids', NULL, 'capsicum-carotenoids', NULL, NULL, NULL, NULL),
(70, NULL, 'Caralluma fimbriata', NULL, 'caralluma-fimbriata', NULL, NULL, NULL, NULL),
(71, NULL, 'Casein', NULL, 'casein-protein', NULL, NULL, NULL, NULL),
(72, NULL, 'Celastrus paniculatus', NULL, 'celastrus-paniculatus', NULL, NULL, NULL, NULL),
(73, NULL, 'Celery seed extract', NULL, 'celery-seed-extract', NULL, NULL, NULL, NULL),
(74, NULL, 'Centella asiatica', NULL, 'centella-asiatica', NULL, NULL, NULL, NULL),
(75, NULL, 'Centrophenoxine', NULL, 'centrophenoxine', NULL, NULL, NULL, NULL),
(76, NULL, 'Chlorella', NULL, 'chlorella', NULL, NULL, NULL, NULL),
(77, NULL, 'Chlorogenic Acid', NULL, 'chlorogenic-acid', NULL, NULL, NULL, NULL),
(78, NULL, 'Chlorophytum borivilianum', NULL, 'chlorophytum-borivilianum', NULL, NULL, NULL, NULL),
(79, NULL, 'Choline', NULL, 'choline', NULL, NULL, NULL, NULL),
(80, NULL, 'Chondroitin', NULL, 'chondroitin', NULL, NULL, NULL, NULL),
(81, NULL, 'Chromium', NULL, 'chromium', NULL, NULL, NULL, NULL),
(82, NULL, 'Chrysin', NULL, '<br><br> <a href=\"chrysin', NULL, NULL, NULL, NULL),
(83, NULL, 'Cinnamon', NULL, 'cinnamon', NULL, NULL, NULL, NULL),
(84, NULL, 'Cissus quadrangularis', NULL, 'cissus-quadrangularis', NULL, NULL, NULL, NULL),
(85, NULL, 'Citric Acid', NULL, 'citric-acid', NULL, NULL, NULL, NULL),
(86, NULL, 'Citrulline', NULL, 'citrulline', NULL, NULL, NULL, NULL),
(87, NULL, 'Citrullus colocynthis', NULL, 'citrullus-colocynthis', NULL, NULL, NULL, NULL),
(88, NULL, 'Clenbuterol', NULL, 'clenbuterol', NULL, NULL, NULL, NULL),
(89, NULL, 'Clitoria ternatea', NULL, 'clitoria-ternatea', NULL, NULL, NULL, NULL),
(90, NULL, 'Clubmoss', NULL, 'clubmoss', NULL, NULL, NULL, NULL),
(91, NULL, 'Cnidium monnieri', NULL, 'cnidium-monnieri', NULL, NULL, NULL, NULL),
(92, NULL, 'Cocoa Extract', NULL, 'cocoa-extract', NULL, NULL, NULL, NULL),
(93, NULL, 'Coconut Oil', NULL, 'coconut-oil', NULL, NULL, NULL, NULL),
(94, NULL, 'Codonopsis pilosula', NULL, 'codonopsis-pilosula', NULL, NULL, NULL, NULL),
(95, NULL, 'Coenzyme Q10', NULL, 'coenzyme-q10', NULL, NULL, NULL, NULL),
(96, NULL, 'Coffee', NULL, 'coffee', NULL, NULL, NULL, NULL),
(97, NULL, 'Cold Exposure', NULL, 'cold-exposure', NULL, NULL, NULL, NULL),
(98, NULL, 'Coleus forskohlii', NULL, 'coleus-forskohlii', NULL, NULL, NULL, NULL),
(99, NULL, 'Colostrum', NULL, 'colostrum', NULL, NULL, NULL, NULL),
(100, NULL, 'Coluracetam', NULL, 'coluracetam', NULL, NULL, NULL, NULL),
(101, NULL, 'Conjugated Linoleic Acid', NULL, 'conjugated-linoleic-acid', NULL, NULL, NULL, NULL),
(102, NULL, 'Convolvulus pluricaulis', NULL, 'convolvulus-pluricaulis', NULL, NULL, NULL, NULL),
(103, NULL, 'Copper', NULL, '<br><br> <a href=\"copper', NULL, NULL, NULL, NULL),
(104, NULL, 'Cordyceps', NULL, 'cordyceps', NULL, NULL, NULL, NULL),
(105, NULL, 'Crataegus pinnatifida', NULL, 'crataegus-pinnatifida', NULL, NULL, NULL, NULL),
(106, NULL, 'Creatine', NULL, 'creatine', NULL, NULL, NULL, NULL),
(107, NULL, 'Creatinol O-Phosphate', NULL, 'creatinol-o-phosphate', NULL, NULL, NULL, NULL),
(108, NULL, 'Cucurbita pepo', NULL, 'cucurbita-pepo', NULL, NULL, NULL, NULL),
(109, NULL, 'Curcumin', NULL, 'curcumin', NULL, NULL, NULL, NULL),
(110, NULL, 'Cyanidin', NULL, 'cyanidin', NULL, NULL, NULL, NULL),
(111, NULL, 'D-Aspartic Acid', NULL, 'd-aspartic-acid', NULL, NULL, NULL, NULL),
(112, NULL, 'D-Ribose', NULL, 'd-ribose', NULL, NULL, NULL, NULL),
(113, NULL, 'D-Serine', NULL, 'd-serine', NULL, NULL, NULL, NULL),
(114, NULL, 'DMAE', NULL, 'dmae', NULL, NULL, NULL, NULL),
(115, NULL, 'Dactylorhiza hatagirea', NULL, 'dactylorhiza-hatagirea', NULL, NULL, NULL, NULL),
(116, NULL, 'Damiana Leaf', NULL, 'damiana-leaf', NULL, NULL, NULL, NULL),
(117, NULL, 'Dark Therapy', NULL, 'dark-therapy', NULL, NULL, NULL, NULL),
(118, NULL, 'Dehydroepiandrosterone', NULL, 'dehydroepiandrosterone', NULL, NULL, NULL, NULL),
(119, NULL, 'Dendrobium', NULL, 'dendrobium', NULL, NULL, NULL, NULL),
(120, NULL, 'Diindolylmethane', NULL, 'diindolylmethane', NULL, NULL, NULL, NULL),
(121, NULL, 'Dimocarpus longan', NULL, 'dimocarpus-longan', NULL, NULL, NULL, NULL),
(122, NULL, 'Dioscorea villosa', NULL, 'dioscorea-villosa', NULL, NULL, NULL, NULL),
(123, NULL, 'ECA', NULL, 'eca', NULL, NULL, NULL, NULL),
(124, NULL, 'Ecdysteroids', NULL, 'ecdysteroids', NULL, NULL, NULL, NULL),
(125, NULL, 'Echinacea', NULL, 'echinacea', NULL, NULL, NULL, NULL),
(126, NULL, 'Ecklonia cava', NULL, 'ecklonia-cava', NULL, NULL, NULL, NULL),
(127, NULL, 'Eclipta alba', NULL, 'eclipta-alba', NULL, NULL, NULL, NULL),
(128, NULL, 'Eggs', NULL, 'eggs', NULL, NULL, NULL, NULL),
(129, NULL, 'Eleutherococcus senticosus', NULL, 'eleutherococcus-senticosus', NULL, NULL, NULL, NULL),
(130, NULL, 'Emblica officinalis', NULL, 'emblica-officinalis', NULL, NULL, NULL, NULL),
(131, NULL, 'Energy Drinks', NULL, 'energy-drinks', NULL, NULL, NULL, NULL),
(132, NULL, 'Ephedrine', NULL, 'ephedrine', NULL, NULL, NULL, NULL),
(133, NULL, 'Eriobotrya japonica', NULL, 'eriobotrya-japonica', NULL, NULL, NULL, NULL),
(134, NULL, 'Eschscholzia californica', NULL, 'eschscholzia-californica', NULL, NULL, NULL, NULL),
(135, NULL, 'Eucommia ulmoides', NULL, 'eucommia-ulmoides', NULL, NULL, NULL, NULL),
(136, NULL, 'Euonymus alatus', NULL, 'euonymus-alatus', NULL, NULL, NULL, NULL),
(137, NULL, 'Eurycoma Longifolia Jack', NULL, 'eurycoma-longifolia-jack', NULL, NULL, NULL, NULL),
(138, NULL, 'Evodia rutaecarpa', NULL, 'evodia-rutaecarpa', NULL, NULL, NULL, NULL),
(139, NULL, 'Evolvulus alsinoides', NULL, 'evolvulus-alsinoides', NULL, NULL, NULL, NULL),
(140, NULL, 'Fadogia agrestis', NULL, 'fadogia-agrestis', NULL, NULL, NULL, NULL),
(141, NULL, 'Fennel Essential Oil', NULL, 'fennel-essential-oil', NULL, NULL, NULL, NULL),
(142, NULL, 'Fenugreek', NULL, 'fenugreek', NULL, NULL, NULL, NULL),
(143, NULL, 'Ferula asafoetida', NULL, 'ferula-asafoetida', NULL, NULL, NULL, NULL),
(144, NULL, 'Feverfew', NULL, 'feverfew', NULL, NULL, NULL, NULL),
(145, NULL, 'Fish Oil', NULL, 'fish-oil', NULL, NULL, NULL, NULL),
(146, NULL, 'Folic Acid', NULL, 'folic-acid', NULL, NULL, NULL, NULL),
(147, NULL, 'Fucoxanthin', NULL, 'fucoxanthin', NULL, NULL, NULL, NULL),
(148, NULL, 'GABA', NULL, 'gaba', NULL, NULL, NULL, NULL),
(149, NULL, 'Gamma Oryzanol', NULL, 'gamma-oryzanol', NULL, NULL, NULL, NULL),
(150, NULL, 'Ganoderma lucidum', NULL, 'ganoderma-lucidum', NULL, NULL, NULL, NULL),
(151, NULL, 'Garcinia cambogia', NULL, 'garcinia-cambogia', NULL, NULL, NULL, NULL),
(152, NULL, 'Garlic', NULL, 'garlic', NULL, NULL, NULL, NULL),
(153, NULL, 'Ginger', NULL, 'ginger', NULL, NULL, NULL, NULL),
(154, NULL, 'Ginkgo biloba', NULL, 'ginkgo-biloba', NULL, NULL, NULL, NULL),
(155, NULL, 'Glucosamine', NULL, 'glucosamine', NULL, NULL, NULL, NULL),
(156, NULL, 'Glucuronolactone', NULL, 'glucuronolactone', NULL, NULL, NULL, NULL),
(157, NULL, 'Glutamine', NULL, 'glutamine', NULL, NULL, NULL, NULL),
(158, NULL, 'Glutathione', NULL, 'glutathione', NULL, NULL, NULL, NULL),
(159, NULL, 'Gluten', NULL, 'gluten', NULL, NULL, NULL, NULL),
(160, NULL, 'Glycine', NULL, 'glycine', NULL, NULL, NULL, NULL),
(161, NULL, 'Grape Seed Extract', NULL, 'grape-seed-extract', NULL, NULL, NULL, NULL),
(162, NULL, 'Grape juice', NULL, 'grape-juice', NULL, NULL, NULL, NULL),
(163, NULL, 'Grapefruit', NULL, 'grapefruit', NULL, NULL, NULL, NULL),
(164, NULL, 'Green Coffee Extract', NULL, 'green-coffee-extract', NULL, NULL, NULL, NULL),
(165, NULL, 'Green Tea Catechins', NULL, 'green-tea-catechins', NULL, NULL, NULL, NULL),
(166, NULL, 'Griffonia simplicifolia', NULL, 'griffonia-simplicifolia', NULL, NULL, NULL, NULL),
(167, NULL, 'Guggul', NULL, 'guggul', NULL, NULL, NULL, NULL),
(168, NULL, 'Gynostemma pentaphyllum', NULL, 'gynostemma-pentaphyllum', NULL, NULL, NULL, NULL),
(169, NULL, 'HMB', NULL, 'hmb', NULL, NULL, NULL, NULL),
(170, NULL, 'Harpagophytum procumbens', NULL, 'harpagophytum-procumbens', NULL, NULL, NULL, NULL),
(171, NULL, 'Hederagenin', NULL, 'hederagenin', NULL, NULL, NULL, NULL),
(172, NULL, 'Hemp Protein', NULL, 'hemp-protein', NULL, NULL, NULL, NULL),
(173, NULL, 'Hesperidin', NULL, 'hesperidin', NULL, NULL, NULL, NULL),
(174, NULL, 'Hibiscus macranthus', NULL, 'hibiscus-macranthus', NULL, NULL, NULL, NULL),
(175, NULL, 'Hibiscus rosasinensis', NULL, 'hibiscus-rosasinensis', NULL, NULL, NULL, NULL),
(176, NULL, 'Hibiscus sabdariffa', NULL, 'hibiscus-sabdariffa', NULL, NULL, NULL, NULL),
(177, NULL, 'Higenamine', NULL, 'higenamine', NULL, NULL, NULL, NULL),
(178, NULL, 'Holy Basil', NULL, 'holy-basil', NULL, NULL, NULL, NULL),
(179, NULL, 'Hoodia gordonii', NULL, 'hoodia-gordonii', NULL, NULL, NULL, NULL),
(180, NULL, 'Hordenine', NULL, 'hordenine', NULL, NULL, NULL, NULL),
(181, NULL, 'Horny Goat Weed', NULL, 'horny-goat-weed', NULL, NULL, NULL, NULL),
(182, NULL, 'Horse Chestnut', NULL, 'horse-chestnut', NULL, NULL, NULL, NULL),
(183, NULL, 'Hovenia dulcis', NULL, 'hovenia-dulcis', NULL, NULL, NULL, NULL),
(184, NULL, 'Huperzine-A', NULL, 'huperzine-a', NULL, NULL, NULL, NULL),
(185, NULL, 'Hypericum perforatum', NULL, 'hypericum-perforatum', NULL, NULL, NULL, NULL),
(186, NULL, 'Idebenone', NULL, 'idebenone', NULL, NULL, NULL, NULL),
(187, NULL, 'Inositol', NULL, 'inositol', NULL, NULL, NULL, NULL),
(188, NULL, 'Iodine', NULL, 'iodine', NULL, NULL, NULL, NULL),
(189, NULL, 'Iron', NULL, 'iron', NULL, NULL, NULL, NULL),
(190, NULL, 'Irvingia gabonensis', NULL, 'irvingia-gabonensis', NULL, NULL, NULL, NULL),
(191, NULL, 'Isoleucine', NULL, 'isoleucine', NULL, NULL, NULL, NULL),
(192, NULL, 'Japanese Knotweed', NULL, 'japanese-knotweed', NULL, NULL, NULL, NULL),
(193, NULL, 'Juniperus chinensis', NULL, 'juniperus-chinensis', NULL, NULL, NULL, NULL),
(194, NULL, 'Kaempferia parviflora', NULL, 'kaempferia-parviflora', NULL, NULL, NULL, NULL),
(195, NULL, 'Kaempferol', NULL, 'kaempferol', NULL, NULL, NULL, NULL),
(196, NULL, 'Kava', NULL, 'kava', NULL, NULL, NULL, NULL),
(197, NULL, 'Ketogenic diet', NULL, 'keto', NULL, NULL, NULL, NULL),
(198, NULL, 'King Oyster', NULL, 'king-oyster', NULL, NULL, NULL, NULL),
(199, NULL, 'Kombucha', NULL, 'kombucha', NULL, NULL, NULL, NULL),
(200, NULL, 'Krill Oil', NULL, 'krill-oil', NULL, NULL, NULL, NULL),
(201, NULL, 'L-Carnitine', NULL, 'l-carnitine', NULL, NULL, NULL, NULL),
(202, NULL, 'L-DOPA', NULL, 'l-dopa', NULL, NULL, NULL, NULL),
(203, NULL, 'L-Threonate', NULL, 'l-threonate', NULL, NULL, NULL, NULL),
(204, NULL, 'L-Tyrosine', NULL, 'l-tyrosine', NULL, NULL, NULL, NULL),
(205, NULL, 'Lactase enzyme', NULL, 'lactase-enzyme', NULL, NULL, NULL, NULL),
(206, NULL, 'Lactobacillus casei', NULL, 'lactobacillus-casei', NULL, NULL, NULL, NULL),
(207, NULL, 'Lactobacillus reuteri', NULL, 'lactobacillus-reuteri', NULL, NULL, NULL, NULL),
(208, NULL, 'Lavender', NULL, 'lavender', NULL, NULL, NULL, NULL),
(209, NULL, 'Leucic Acid', NULL, 'leucic-acid', NULL, NULL, NULL, NULL),
(210, NULL, 'Leucine', NULL, 'leucine', NULL, NULL, NULL, NULL),
(211, NULL, 'Licorice', NULL, 'licorice', NULL, NULL, NULL, NULL),
(212, NULL, 'Light Therapy', NULL, 'light-therapy', NULL, NULL, NULL, NULL),
(213, NULL, 'Limonene', NULL, 'limonene', NULL, NULL, NULL, NULL),
(214, NULL, 'Lutein', NULL, 'lutein', NULL, NULL, NULL, NULL),
(215, NULL, 'Lysine', NULL, 'lysine', NULL, NULL, NULL, NULL),
(216, NULL, 'Maca', NULL, 'maca', NULL, NULL, NULL, NULL),
(217, NULL, 'Magnesium', NULL, 'magnesium', NULL, NULL, NULL, NULL),
(218, NULL, 'Magnolia officinalis', NULL, 'magnolia-officinalis', NULL, NULL, NULL, NULL),
(219, NULL, 'Manganese', NULL, 'manganese', NULL, NULL, NULL, NULL),
(220, NULL, 'Mangifera indica', NULL, 'mangifera-indica', NULL, NULL, NULL, NULL),
(221, NULL, 'Marijuana', NULL, 'marijuana', NULL, NULL, NULL, NULL),
(222, NULL, 'Massularia acuminata', NULL, 'massularia-acuminata', NULL, NULL, NULL, NULL),
(223, NULL, 'Meditation', NULL, 'meditation', NULL, NULL, NULL, NULL),
(224, NULL, 'Medium-chain triglycerides', NULL, 'mcts', NULL, NULL, NULL, NULL),
(225, NULL, 'Melatonin', NULL, 'melatonin', NULL, NULL, NULL, NULL),
(226, NULL, 'Melissa officinalis', NULL, 'melissa-officinalis', NULL, NULL, NULL, NULL),
(227, NULL, 'Methylsulfonylmethane', NULL, 'methylsulfonylmethane', NULL, NULL, NULL, NULL),
(228, NULL, 'Microlactin', NULL, 'microlactin', NULL, NULL, NULL, NULL),
(229, NULL, 'Milk Protein', NULL, 'milk-protein', NULL, NULL, NULL, NULL),
(230, NULL, 'Milk Thistle', NULL, 'milk-thistle', NULL, NULL, NULL, NULL),
(231, NULL, 'Minoxidil', NULL, 'minoxidil', NULL, NULL, NULL, NULL),
(232, NULL, 'MitoQ', NULL, 'mitoq', NULL, NULL, NULL, NULL),
(233, NULL, 'Modafinil', NULL, 'modafinil', NULL, NULL, NULL, NULL),
(234, NULL, 'Molybdenum', NULL, 'molybdenum', NULL, NULL, NULL, NULL),
(235, NULL, 'Moringa oleifera', NULL, 'moringa-oleifera', NULL, NULL, NULL, NULL),
(236, NULL, 'Morus alba', NULL, 'morus-alba', NULL, NULL, NULL, NULL),
(237, NULL, 'Mucuna pruriens', NULL, 'mucuna-pruriens', NULL, NULL, NULL, NULL),
(238, NULL, 'Muira puama', NULL, 'muira-puama', NULL, NULL, NULL, NULL),
(239, NULL, 'Music', NULL, 'music', NULL, NULL, NULL, NULL),
(240, NULL, 'Myricetin', NULL, 'myricetin', NULL, NULL, NULL, NULL),
(241, NULL, 'N-Acetylcysteine', NULL, 'n-acetylcysteine', NULL, NULL, NULL, NULL),
(242, NULL, 'Nardostachys jatamansi', NULL, 'nardostachys-jatamansi', NULL, NULL, NULL, NULL),
(243, NULL, 'Nattokinase', NULL, 'nattokinase', NULL, NULL, NULL, NULL),
(244, NULL, 'Nefiracetam', NULL, 'nefiracetam', NULL, NULL, NULL, NULL),
(245, NULL, 'Nelumbo nucifera', NULL, 'nelumbo-nucifera', NULL, NULL, NULL, NULL),
(246, NULL, 'Nicotine', NULL, 'nicotine', NULL, NULL, NULL, NULL),
(247, NULL, 'Nigella sativa', NULL, 'nigella-sativa', NULL, NULL, NULL, NULL),
(248, NULL, 'Nitrate', NULL, 'nitrate', NULL, NULL, NULL, NULL),
(249, NULL, 'Noopept', NULL, 'noopept', NULL, NULL, NULL, NULL),
(250, NULL, 'Nutmeg', NULL, 'nutmeg', NULL, NULL, NULL, NULL),
(251, NULL, 'Octopamine', NULL, 'octopamine', NULL, NULL, NULL, NULL),
(252, NULL, 'Oleamide', NULL, 'oleamide', NULL, NULL, NULL, NULL),
(253, NULL, 'Oleoylethanolamide', NULL, 'oleoylethanolamide', NULL, NULL, NULL, NULL),
(254, NULL, 'Olive Oil', NULL, 'olive-oil', NULL, NULL, NULL, NULL),
(255, NULL, 'Olive leaf extract', NULL, 'olive-leaf-extract', NULL, NULL, NULL, NULL),
(256, NULL, 'Ophiopogon japonicus', NULL, 'ophiopogon-japonicus', NULL, NULL, NULL, NULL),
(257, NULL, 'Origanum vulgare', NULL, 'origanum-vulgare', NULL, NULL, NULL, NULL),
(258, NULL, 'Ornithine', NULL, 'ornithine', NULL, NULL, NULL, NULL),
(259, NULL, 'Orthosiphon stamineus', NULL, '<br><br> <a href=\"orthosiphon-stamineus', NULL, NULL, NULL, NULL),
(260, NULL, 'Oxaloacetate', NULL, 'oxaloacetate', NULL, NULL, NULL, NULL),
(261, NULL, 'Oxiracetam', NULL, 'oxiracetam', NULL, NULL, NULL, NULL),
(262, NULL, 'Oxytropis falcate', NULL, 'oxytropis-falcate', NULL, NULL, NULL, NULL),
(263, NULL, 'PRL-8-53', NULL, 'prl-8-53', NULL, NULL, NULL, NULL),
(264, NULL, 'Paederia foetida', NULL, 'paederia-foetida', NULL, NULL, NULL, NULL),
(265, NULL, 'Palmatine', NULL, 'palmatine', NULL, NULL, NULL, NULL),
(266, NULL, 'Panax ginseng', NULL, 'panax-ginseng', NULL, NULL, NULL, NULL),
(267, NULL, 'Patchouli', NULL, 'patchouli', NULL, NULL, NULL, NULL),
(268, NULL, 'Paullinia cupana', NULL, 'paullinia-cupana', NULL, NULL, NULL, NULL),
(269, NULL, 'Pedalium murex', NULL, 'pedalium-murex', NULL, NULL, NULL, NULL),
(270, NULL, 'Pelargonidin', NULL, 'pelargonidin', NULL, NULL, NULL, NULL),
(271, NULL, 'Pelargonium sidoides', NULL, 'pelargonium-sidoides', NULL, NULL, NULL, NULL),
(272, NULL, 'Peppermint', NULL, 'peppermint', NULL, NULL, NULL, NULL),
(273, NULL, 'Perilla Oil', NULL, 'perilla-oil', NULL, NULL, NULL, NULL),
(274, NULL, 'Phellodendron amurense', NULL, 'phellodendron-amurense', NULL, NULL, NULL, NULL),
(275, NULL, 'Phenylethylamine', NULL, 'phenylethylamine', NULL, NULL, NULL, NULL),
(276, NULL, 'Phenylpiracetam', NULL, 'phenylpiracetam', NULL, NULL, NULL, NULL),
(277, NULL, 'Phosphatidylcholine', NULL, 'phosphatidylcholine', NULL, NULL, NULL, NULL),
(278, NULL, 'Phosphatidylserine', NULL, 'phosphatidylserine', NULL, NULL, NULL, NULL),
(279, NULL, 'Phosphorus', NULL, 'phosphorus', NULL, NULL, NULL, NULL),
(280, NULL, 'Piceatannol', NULL, 'piceatannol', NULL, NULL, NULL, NULL),
(281, NULL, 'Picrorhiza kurroa', NULL, 'picrorhiza-kurroa', NULL, NULL, NULL, NULL),
(282, NULL, 'Pine Pollen', NULL, 'pine-pollen', NULL, NULL, NULL, NULL),
(283, NULL, 'Piracetam', NULL, 'piracetam', NULL, NULL, NULL, NULL),
(284, NULL, 'Policosanol', NULL, 'policosanol', NULL, NULL, NULL, NULL),
(285, NULL, 'Polygala tenuifolia', NULL, 'polygala-tenuifolia', NULL, NULL, NULL, NULL),
(286, NULL, 'Polypodium leucotomos', NULL, 'polypodium-leucotomos', NULL, NULL, NULL, NULL),
(287, NULL, 'Pomegranate', NULL, 'pomegranate', NULL, NULL, NULL, NULL),
(288, NULL, 'Potassium', NULL, 'potassium', NULL, NULL, NULL, NULL),
(289, NULL, 'Pramiracetam', NULL, 'pramiracetam', NULL, NULL, NULL, NULL),
(290, NULL, 'Prickly Pear Fruit', NULL, 'prickly-pear-fruit', NULL, NULL, NULL, NULL),
(291, NULL, 'Psoralea corylifolia', NULL, 'psoralea-corylifolia', NULL, NULL, NULL, NULL),
(292, NULL, 'Psyllium', NULL, 'psyllium', NULL, NULL, NULL, NULL),
(293, NULL, 'Pterostilbene', NULL, 'pterostilbene', NULL, NULL, NULL, NULL),
(294, NULL, 'Pueraria lobata', NULL, 'pueraria-lobata', NULL, NULL, NULL, NULL),
(295, NULL, 'Pueraria mirifica', NULL, 'pueraria-mirifica', NULL, NULL, NULL, NULL),
(296, NULL, 'Punicalagins', NULL, 'punicalagins', NULL, NULL, NULL, NULL),
(297, NULL, 'Punicic Acid', NULL, 'punicic-acid', NULL, NULL, NULL, NULL),
(298, NULL, 'Pycnogenol', NULL, 'pycnogenol', NULL, NULL, NULL, NULL),
(299, NULL, 'Pygeum', NULL, 'pygeum', NULL, NULL, NULL, NULL),
(300, NULL, 'Pyritinol', NULL, 'pyritinol', NULL, NULL, NULL, NULL),
(301, NULL, 'Pyrroloquinoline quinone', NULL, 'pyrroloquinoline-quinone', NULL, NULL, NULL, NULL),
(302, NULL, 'Pyruvate', NULL, 'pyruvate', NULL, NULL, NULL, NULL),
(303, NULL, 'Quercetin', NULL, 'quercetin', NULL, NULL, NULL, NULL),
(304, NULL, 'Randomized controlled trial (RCTs)', NULL, 'randomized-controlled-trial', NULL, NULL, NULL, NULL),
(305, NULL, 'Raspberry Ketone', NULL, 'raspberry-ketone', NULL, NULL, NULL, NULL),
(306, NULL, 'Rauwolscine', NULL, 'rauwolscine', NULL, NULL, NULL, NULL),
(307, NULL, 'Red Clover Extract', NULL, 'red-clover-extract', NULL, NULL, NULL, NULL),
(308, NULL, 'Red Yeast Rice', NULL, 'red-yeast-rice', NULL, NULL, NULL, NULL),
(309, NULL, 'Resveratrol', NULL, 'resveratrol', NULL, NULL, NULL, NULL),
(310, NULL, 'Rhaponticum carthamoides', NULL, 'rhaponticum-carthamoides', NULL, NULL, NULL, NULL),
(311, NULL, 'Rhodiola Rosea', NULL, 'rhodiola-rosea', NULL, NULL, NULL, NULL),
(312, NULL, 'Rooibos', NULL, 'rooibos', NULL, NULL, NULL, NULL),
(313, NULL, 'Rose Essential Oil', NULL, 'rose-essential-oil', NULL, NULL, NULL, NULL),
(314, NULL, 'Rose Hip', NULL, 'rose-hip', NULL, NULL, NULL, NULL),
(315, NULL, 'Rosmarinic Acid', NULL, 'rosmarinic-acid', NULL, NULL, NULL, NULL),
(316, NULL, 'Royal Jelly', NULL, 'royal-jelly', NULL, NULL, NULL, NULL),
(317, NULL, 'Rubus coreanus', NULL, 'rubus-coreanus', NULL, NULL, NULL, NULL),
(318, NULL, 'Rubus suavissimus', NULL, 'rubus-suavissimus', NULL, NULL, NULL, NULL),
(319, NULL, 'Ruscus aculeatus', NULL, 'ruscus-aculeatus', NULL, NULL, NULL, NULL),
(320, NULL, 'S-Adenosyl Methionine', NULL, 's-adenosyl-methionine', NULL, NULL, NULL, NULL),
(321, NULL, 'Safflower Oil', NULL, 'safflower-oil', NULL, NULL, NULL, NULL),
(322, NULL, 'Saffron', NULL, 'saffron', NULL, NULL, NULL, NULL),
(323, NULL, 'Salacia reticulata', NULL, 'salacia-reticulata', NULL, NULL, NULL, NULL),
(324, NULL, 'Salvia hispanica', NULL, 'salvia-hispanica', NULL, NULL, NULL, NULL),
(325, NULL, 'Salvia miltiorrhiza', NULL, 'salvia-miltiorrhiza', NULL, NULL, NULL, NULL),
(326, NULL, 'Salvia sclarea', NULL, 'salvia-sclarea', NULL, NULL, NULL, NULL),
(327, NULL, 'Sarcosine', NULL, 'sarcosine', NULL, NULL, NULL, NULL),
(328, NULL, 'Saw Palmetto', NULL, 'saw-palmetto', NULL, NULL, NULL, NULL),
(329, NULL, 'Sceletium tortuosum', NULL, 'sceletium-tortuosum', NULL, NULL, NULL, NULL),
(330, NULL, 'Schisandra chinensis', NULL, 'schisandra-chinensis', NULL, NULL, NULL, NULL),
(331, NULL, 'Schizonepeta tenuifolia', NULL, 'schizonepeta-tenuifolia', NULL, NULL, NULL, NULL),
(332, NULL, 'Scutellaria baicalensis', NULL, 'scutellaria-baicalensis', NULL, NULL, NULL, NULL),
(333, NULL, 'Sea Buckthorn', NULL, 'sea-buckthorn', NULL, NULL, NULL, NULL),
(334, NULL, 'Selenium', NULL, 'selenium', NULL, NULL, NULL, NULL),
(335, NULL, 'Senna alexandrina', NULL, 'senna-alexandrina', NULL, NULL, NULL, NULL),
(336, NULL, 'Serrapeptase', NULL, 'serrapeptase', NULL, NULL, NULL, NULL),
(337, NULL, 'Sesamin', NULL, 'sesamin', NULL, NULL, NULL, NULL),
(338, NULL, 'Shilajit', NULL, 'shilajit', NULL, NULL, NULL, NULL),
(339, NULL, 'Silica', NULL, 'silica', NULL, NULL, NULL, NULL),
(340, NULL, 'Silk Amino Acids', NULL, 'silk-amino-acids', NULL, NULL, NULL, NULL),
(341, NULL, 'Simmondsia chinensis', NULL, 'simmondsia-chinensis', NULL, NULL, NULL, NULL),
(342, NULL, 'Sodium Bicarbonate', NULL, 'sodium-bicarbonate', NULL, NULL, NULL, NULL),
(343, NULL, 'Sophora flavescens', NULL, 'sophora-flavescens', NULL, NULL, NULL, NULL),
(344, NULL, 'Soy Isoflavones', NULL, 'soy-isoflavones', NULL, NULL, NULL, NULL),
(345, NULL, 'Soy lecithin', NULL, 'soy-lecithin', NULL, NULL, NULL, NULL),
(346, NULL, 'Sphaeranthus indicus', NULL, 'sphaeranthus-indicus', NULL, NULL, NULL, NULL),
(347, NULL, 'Spilanthes acmella', NULL, 'spilanthes-acmella', NULL, NULL, NULL, NULL),
(348, NULL, 'Spirulina', NULL, 'spirulina', NULL, NULL, NULL, NULL),
(349, NULL, 'Squalene', NULL, 'squalene', NULL, NULL, NULL, NULL),
(350, NULL, 'Stephania tetrandra', NULL, 'stephania-tetrandra', NULL, NULL, NULL, NULL),
(351, NULL, 'Stevia', NULL, 'stevia', NULL, NULL, NULL, NULL),
(352, NULL, 'Stinging Nettle', NULL, 'stinging-nettle', NULL, NULL, NULL, NULL),
(353, NULL, 'Sulbutiamine', NULL, 'sulbutiamine', NULL, NULL, NULL, NULL),
(354, NULL, 'Sulforaphane', NULL, 'sulforaphane', NULL, NULL, NULL, NULL),
(355, NULL, 'Sunifiram', NULL, 'sunifiram', NULL, NULL, NULL, NULL),
(356, NULL, 'Synephrine', NULL, 'synephrine', NULL, NULL, NULL, NULL),
(357, NULL, 'Syzygium aromaticum', NULL, 'syzygium-aromaticum', NULL, NULL, NULL, NULL),
(358, NULL, 'T3', NULL, 't3', NULL, NULL, NULL, NULL),
(359, NULL, 'Taraxacum officinale', NULL, 'taraxacum-officinale', NULL, NULL, NULL, NULL),
(360, NULL, 'Taurine', NULL, 'taurine', NULL, NULL, NULL, NULL),
(361, NULL, 'Tauroursodeoxycholic Acid', NULL, 'tauroursodeoxycholic-acid', NULL, NULL, NULL, NULL),
(362, NULL, 'Tea (Camellia Sinensis)', NULL, 'tea-camellia-sinensis', NULL, NULL, NULL, NULL),
(363, NULL, 'Terminalia arjuna', NULL, 'terminalia-arjuna', NULL, NULL, NULL, NULL),
(364, NULL, 'Tetradecyl Thioacetic Acid', NULL, 'tetradecyl-thioacetic-acid', NULL, NULL, NULL, NULL),
(365, NULL, 'Theacrine', NULL, 'theacrine', NULL, NULL, NULL, NULL),
(366, NULL, 'Theaflavins', NULL, '<br><br> <a href=\"theaflavins', NULL, NULL, NULL, NULL),
(367, NULL, 'Theanine', NULL, 'theanine', NULL, NULL, NULL, NULL),
(368, NULL, 'Tinospora cordifolia', NULL, 'tinospora-cordifolia', NULL, NULL, NULL, NULL),
(369, NULL, 'Traditional Chinese Medicine', NULL, 'traditional-chinese-medicine', NULL, NULL, NULL, NULL),
(370, NULL, 'Trametes versicolor', NULL, 'trametes-versicolor', NULL, NULL, NULL, NULL),
(371, NULL, 'Trehalose', NULL, 'trehalose', NULL, NULL, NULL, NULL),
(372, NULL, 'Tribulus terrestris', NULL, 'tribulus-terrestris', NULL, NULL, NULL, NULL),
(373, NULL, 'Trichopus zeylanicus', NULL, 'trichopus-zeylanicus', NULL, NULL, NULL, NULL),
(374, NULL, 'Trimethylglycine', NULL, 'trimethylglycine', NULL, NULL, NULL, NULL),
(375, NULL, 'Tripterygium wilfordii', NULL, 'tripterygium-wilfordii', NULL, NULL, NULL, NULL),
(376, NULL, 'Tulbaghia violacea', NULL, 'tulbaghia-violacea', NULL, NULL, NULL, NULL),
(377, NULL, 'Turmeric', NULL, 'turmeric', NULL, NULL, NULL, NULL),
(378, NULL, 'Type-II Collagen', NULL, 'type-ii-collagen', NULL, NULL, NULL, NULL),
(379, NULL, 'Uncaria rhynchophylla', NULL, 'uncaria-rhynchophylla', NULL, NULL, NULL, NULL),
(380, NULL, 'Uncaria tomentosa', NULL, 'uncaria-tomentosa', NULL, NULL, NULL, NULL),
(381, NULL, 'Uridine', NULL, 'uridine', NULL, NULL, NULL, NULL),
(382, NULL, 'Ursolic Acid', NULL, 'ursolic-acid', NULL, NULL, NULL, NULL),
(383, NULL, 'Uva ursi', NULL, 'uva-ursi', NULL, NULL, NULL, NULL),
(384, NULL, 'Valeriana officinalis', NULL, 'valeriana-officinalis', NULL, NULL, NULL, NULL),
(385, NULL, 'Valine', NULL, 'valine', NULL, NULL, NULL, NULL),
(386, NULL, 'Vanadium', NULL, 'vanadium', NULL, NULL, NULL, NULL),
(387, NULL, 'Vegan Diet', NULL, 'vegan', NULL, NULL, NULL, NULL),
(388, NULL, 'Velvet Antler', NULL, 'velvet-antler', NULL, NULL, NULL, NULL),
(389, NULL, 'Vinpocetine', NULL, 'vinpocetine', NULL, NULL, NULL, NULL),
(390, NULL, 'Vitamin A', NULL, 'vitamin-a', NULL, NULL, NULL, NULL),
(391, NULL, 'Vitamin B1', NULL, 'vitamin-b1', NULL, NULL, NULL, NULL),
(392, NULL, 'Vitamin B2', NULL, 'vitamin-b2', NULL, NULL, NULL, NULL),
(393, NULL, 'Vitamin B3 (Niacin)', NULL, 'vitamin-b3', NULL, NULL, NULL, NULL),
(394, NULL, 'Vitamin B5', NULL, 'vitamin-b5', NULL, NULL, NULL, NULL),
(395, NULL, 'Vitamin B₁₂', NULL, 'vitamin-b12', NULL, NULL, NULL, NULL),
(396, NULL, 'Vitamin B₆', NULL, 'vitamin-b6', NULL, NULL, NULL, NULL),
(397, NULL, 'Vitamin C', NULL, 'vitamin-c', NULL, NULL, NULL, NULL),
(398, NULL, 'Vitamin D', NULL, 'vitamin-d', NULL, NULL, NULL, NULL),
(399, NULL, 'Vitamin E', NULL, 'vitamin-e', NULL, NULL, NULL, NULL),
(400, NULL, 'Vitamin K', NULL, 'vitamin-k', NULL, NULL, NULL, NULL),
(401, NULL, 'Vitex agnus-castus', NULL, 'vitex-agnus-castus', NULL, NULL, NULL, NULL),
(402, NULL, 'Watercress', NULL, 'watercress', NULL, NULL, NULL, NULL),
(403, NULL, 'Whey Protein', NULL, 'whey-protein', NULL, NULL, NULL, NULL),
(404, NULL, 'White Kidney Bean Extract', NULL, 'white-kidney-bean-extract', NULL, NULL, NULL, NULL),
(405, NULL, 'Wine', NULL, 'wine', NULL, NULL, NULL, NULL),
(406, NULL, 'Yacon', NULL, 'yacon', NULL, NULL, NULL, NULL),
(407, NULL, 'Yamabushitake', NULL, 'yamabushitake', NULL, NULL, NULL, NULL),
(408, NULL, 'Yerba mate', NULL, 'yerba-mate', NULL, NULL, NULL, NULL),
(409, NULL, 'Yohimbine', NULL, 'yohimbine', NULL, NULL, NULL, NULL),
(410, NULL, 'ZMA', NULL, 'zma', NULL, NULL, NULL, NULL),
(411, NULL, 'Zeaxanthin', NULL, 'zeaxanthin', NULL, NULL, NULL, NULL),
(412, NULL, 'Zinc', NULL, 'zinc', NULL, NULL, NULL, NULL),
(413, NULL, 'Ziziphus jujuba', NULL, 'ziziphus-jujuba', NULL, NULL, NULL, NULL),
(414, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sickness`
--

CREATE TABLE `sickness` (
  `idsickness` int(11) NOT NULL,
  `commonName` varchar(300) DEFAULT NULL,
  `scientificName` varchar(300) DEFAULT NULL,
  `ThumnailImage` varchar(45) DEFAULT NULL,
  `searchCount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sickness`
--

INSERT INTO `sickness` (`idsickness`, `commonName`, `scientificName`, `ThumnailImage`, `searchCount`) VALUES
(3, 'Abdominal aortic aneurysm', 'Abdominal aortic aneurysm', NULL, NULL),
(4, 'Acne', 'Acne', NULL, NULL),
(5, 'Acute cholecystitis', 'Acute cholecystitis', NULL, NULL),
(6, 'Acute lymphoblastic leukaemia', 'Acute lymphoblastic leukaemia', NULL, NULL),
(7, 'Acute lymphoblastic leukaemia: Children', 'Acute lymphoblastic leukaemia: Children', NULL, NULL),
(8, 'Acute lymphoblastic leukaemia: Teenagers and young adults', 'Acute lymphoblastic leukaemia: Teenagers and young adults', NULL, NULL),
(9, 'Acute myeloid leukaemia', 'Acute myeloid leukaemia', NULL, NULL),
(10, 'Acute myeloid leukaemia: Children', 'Acute myeloid leukaemia: Children', NULL, NULL),
(11, 'Acute myeloid leukaemia: Teenagers and young adults', 'Acute myeloid leukaemia: Teenagers and young adults', NULL, NULL),
(12, 'Acute pancreatitis', 'Acute pancreatitis', NULL, NULL),
(13, 'Addison\'s disease', 'Addison\'s disease', NULL, NULL),
(14, 'Alcohol-related liver disease', 'Alcohol-related liver disease', NULL, NULL),
(15, 'Allergic rhinitis', 'Allergic rhinitis', NULL, NULL),
(16, 'Allergies', 'Allergies', NULL, NULL),
(17, 'Alzheimer\'s disease', 'Alzheimer\'s disease', NULL, NULL),
(18, 'Anal cancer', 'Anal cancer', NULL, NULL),
(19, 'Anaphylaxis', 'Anaphylaxis', NULL, NULL),
(20, 'Angioedema', 'Angioedema', NULL, NULL),
(21, 'Ankylosing spondylitis', 'Ankylosing spondylitis', NULL, NULL),
(22, 'Anorexia nervosa', 'Anorexia nervosa', NULL, NULL),
(23, 'Anxiety', 'Anxiety', NULL, NULL),
(24, 'Anxiety disorders in children', 'Anxiety disorders in children', NULL, NULL),
(25, 'Appendicitis', 'Appendicitis', NULL, NULL),
(26, 'Arthritis', 'Arthritis', NULL, NULL),
(27, 'Asbestosis', 'Asbestosis', NULL, NULL),
(28, 'Asthma', 'Asthma', NULL, NULL),
(29, 'Atopic eczema', 'Atopic eczema', NULL, NULL),
(30, 'Attention deficit hyperactivity disorder (ADHD)', 'Attention deficit hyperactivity disorder (ADHD)', NULL, NULL),
(31, 'Autistic spectrum disorder (ASD)', 'Autistic spectrum disorder (ASD)', NULL, NULL),
(32, 'Bacterial vaginosis', 'Bacterial vaginosis', NULL, NULL),
(33, 'Benign prostate enlargement', 'Benign prostate enlargement', NULL, NULL),
(34, 'Bile duct cancer (cholangiocarcinoma)', 'Bile duct cancer (cholangiocarcinoma)', NULL, NULL),
(35, 'Binge eating', 'Binge eating', NULL, NULL),
(36, 'Bipolar disorder', 'Bipolar disorder', NULL, NULL),
(37, 'Bladder cancer', 'Bladder cancer', NULL, NULL),
(38, 'Blood poisoning (sepsis)', 'Blood poisoning (sepsis)', NULL, NULL),
(39, 'Bone cancer', 'Bone cancer', NULL, NULL),
(40, 'Bone cancer: Teenagers and young adults', 'Bone cancer: Teenagers and young adults', NULL, NULL),
(41, 'Bowel cancer', 'Bowel cancer', NULL, NULL),
(42, 'Bowel incontinence', 'Bowel incontinence', NULL, NULL),
(43, 'Bowel polyps', 'Bowel polyps', NULL, NULL),
(44, 'Brain stem death', 'Brain stem death', NULL, NULL),
(45, 'Brain tumours', 'Brain tumours', NULL, NULL),
(46, 'Brain tumours: Children', 'Brain tumours: Children', NULL, NULL),
(47, 'Brain tumours: Teenagers and young adults', 'Brain tumours: Teenagers and young adults', NULL, NULL),
(48, 'Breast cancer (female)', 'Breast cancer (female)', NULL, NULL),
(49, 'Breast cancer (male)', 'Breast cancer (male)', NULL, NULL),
(50, 'Bronchiectasis', 'Bronchiectasis', NULL, NULL),
(51, 'Bronchitis', 'Bronchitis', NULL, NULL),
(52, 'Bulimia', 'Bulimia', NULL, NULL),
(53, 'Bunion', 'Bunion', NULL, NULL),
(54, 'Carcinoid syndrome and carcinoid tumours', 'Carcinoid syndrome and carcinoid tumours', NULL, NULL),
(55, 'Catarrh', 'Catarrh', NULL, NULL),
(56, 'Cellulitis', 'Cellulitis', NULL, NULL),
(57, 'Cervical cancer', 'Cervical cancer', NULL, NULL),
(58, 'Chest infection', 'Chest infection', NULL, NULL),
(59, 'Chest pain', 'Chest pain', NULL, NULL),
(60, 'Chickenpox', 'Chickenpox', NULL, NULL),
(61, 'Chilblains', 'Chilblains', NULL, NULL),
(62, 'Chronic fatigue syndrome', 'Chronic fatigue syndrome', NULL, NULL),
(63, 'Chronic kidney disease', 'Chronic kidney disease', NULL, NULL),
(64, 'Chronic lymphocytic leukaemia', 'Chronic lymphocytic leukaemia', NULL, NULL),
(65, 'Chronic myeloid leukaemia', 'Chronic myeloid leukaemia', NULL, NULL),
(66, 'Chronic obstructive pulmonary disease', 'Chronic obstructive pulmonary disease', NULL, NULL),
(67, 'Chronic pancreatitis', 'Chronic pancreatitis', NULL, NULL),
(68, 'Cirrhosis', 'Cirrhosis', NULL, NULL),
(69, 'Clostridium difficile', 'Clostridium difficile', NULL, NULL),
(70, 'Coeliac disease', 'Coeliac disease', NULL, NULL),
(71, 'Cold sore', 'Cold sore', NULL, NULL),
(72, 'Coma', 'Coma', NULL, NULL),
(73, 'Common cold', 'Common cold', NULL, NULL),
(74, 'Common heart conditions', 'Common heart conditions', NULL, NULL),
(75, 'Congenital heart disease', 'Congenital heart disease', NULL, NULL),
(76, 'Conjunctivitis', 'Conjunctivitis', NULL, NULL),
(77, 'Constipation', 'Constipation', NULL, NULL),
(78, 'Coronavirus (COVID-19)', 'Coronavirus (COVID-19)', NULL, NULL),
(79, 'Cough', 'Cough', NULL, NULL),
(80, 'Crohn\'s disease', 'Crohn\'s disease', NULL, NULL),
(81, 'Croup', 'Croup', NULL, NULL),
(82, 'Cystic fibrosis', 'Cystic fibrosis', NULL, NULL),
(83, 'Cystitis', 'Cystitis', NULL, NULL),
(84, 'Deafblindness', 'Deafblindness', NULL, NULL),
(85, 'Deep vein thrombosis', 'Deep vein thrombosis', NULL, NULL),
(86, 'Dehydration', 'Dehydration', NULL, NULL),
(87, 'Dementia', 'Dementia', NULL, NULL),
(88, 'Dementia with Lewy bodies', 'Dementia with Lewy bodies', NULL, NULL),
(89, 'Dental abscess', 'Dental abscess', NULL, NULL),
(90, 'Depression', 'Depression', NULL, NULL),
(91, 'Dermatitis herpetiformis', 'Dermatitis herpetiformis', NULL, NULL),
(92, 'Diabetes', 'Diabetes', NULL, NULL),
(93, 'Diarrhoea', 'Diarrhoea', NULL, NULL),
(94, 'Discoid eczema', 'Discoid eczema', NULL, NULL),
(95, 'Diverticular disease and diverticulitis', 'Diverticular disease and diverticulitis', NULL, NULL),
(96, 'Dizziness (Lightheadedness)', 'Dizziness (Lightheadedness)', NULL, NULL),
(97, 'Down\'s syndrome', 'Down\'s syndrome', NULL, NULL),
(98, 'Dry mouth', 'Dry mouth', NULL, NULL),
(99, 'Dysphagia (swallowing problems)', 'Dysphagia (swallowing problems)', NULL, NULL),
(100, 'Dystonia', 'Dystonia', NULL, NULL),
(101, 'Earache', 'Earache', NULL, NULL),
(102, 'Earwax build-up', 'Earwax build-up', NULL, NULL),
(103, 'Ebola virus disease', 'Ebola virus disease', NULL, NULL),
(104, 'Ectopic pregnancy', 'Ectopic pregnancy', NULL, NULL),
(105, 'Endometriosis', 'Endometriosis', NULL, NULL),
(106, 'Epilepsy', 'Epilepsy', NULL, NULL),
(107, 'Erectile dysfunction (impotence)', 'Erectile dysfunction (impotence)', NULL, NULL),
(108, 'Escherichia coli (E. coli) O157', 'Escherichia coli (E. coli) O157', NULL, NULL),
(109, 'Ewing sarcoma', 'Ewing sarcoma', NULL, NULL),
(110, 'Ewing sarcoma: Children', 'Ewing sarcoma: Children', NULL, NULL),
(111, 'Eye cancer', 'Eye cancer', NULL, NULL),
(112, 'Febrile seizures', 'Febrile seizures', NULL, NULL),
(113, 'Fever in children', 'Fever in children', NULL, NULL),
(114, 'Fibroids', 'Fibroids', NULL, NULL),
(115, 'Fibromyalgia', 'Fibromyalgia', NULL, NULL),
(116, 'Flatulence', 'Flatulence', NULL, NULL),
(117, 'Flu', 'Flu', NULL, NULL),
(118, 'Foetal alcohol syndrome', 'Foetal alcohol syndrome', NULL, NULL),
(119, 'Food poisoning', 'Food poisoning', NULL, NULL),
(120, 'Fungal nail infection', 'Fungal nail infection', NULL, NULL),
(121, 'Gallbladder cancer', 'Gallbladder cancer', NULL, NULL),
(122, 'Gallstones', 'Gallstones', NULL, NULL),
(123, 'Ganglion cyst', 'Ganglion cyst', NULL, NULL),
(124, 'Gastroenteritis', 'Gastroenteritis', NULL, NULL),
(125, 'Gastro-oesophageal reflux disease (GORD)', 'Gastro-oesophageal reflux disease (GORD)', NULL, NULL),
(126, 'Genital herpes', 'Genital herpes', NULL, NULL),
(127, 'Genital warts', 'Genital warts', NULL, NULL),
(128, 'Germ cell tumours', 'Germ cell tumours', NULL, NULL),
(129, 'Glandular fever', 'Glandular fever', NULL, NULL),
(130, 'Gout', 'Gout', NULL, NULL),
(131, 'Gum disease', 'Gum disease', NULL, NULL),
(132, 'Haemorrhoids (piles)', 'Haemorrhoids (piles)', NULL, NULL),
(133, 'Hairy cell leukaemia', 'Hairy cell leukaemia', NULL, NULL),
(134, 'Hand, foot and mouth disease', 'Hand, foot and mouth disease', NULL, NULL),
(135, 'Hay fever', 'Hay fever', NULL, NULL),
(136, 'Head and neck cancer', 'Head and neck cancer', NULL, NULL),
(137, 'Head lice and nits', 'Head lice and nits', NULL, NULL),
(138, 'Headaches', 'Headaches', NULL, NULL),
(139, 'Hearing loss', 'Hearing loss', NULL, NULL),
(140, 'Heart failure', 'Heart failure', NULL, NULL),
(141, 'Hepatitis A', 'Hepatitis A', NULL, NULL),
(142, 'Hepatitis B', 'Hepatitis B', NULL, NULL),
(143, 'Hepatitis C', 'Hepatitis C', NULL, NULL),
(144, 'Hiatus hernia', 'Hiatus hernia', NULL, NULL),
(145, 'High cholesterol', 'High cholesterol', NULL, NULL),
(146, 'HIV', 'HIV', NULL, NULL),
(147, 'Hodgkin lymphoma', 'Hodgkin lymphoma', NULL, NULL),
(148, 'Hodgkin lymphoma: Children', 'Hodgkin lymphoma: Children', NULL, NULL),
(149, 'Hodgkin lymphoma: Teenagers and young adults', 'Hodgkin lymphoma: Teenagers and young adults', NULL, NULL),
(150, 'Huntington\'s disease', 'Huntington\'s disease', NULL, NULL),
(151, 'Hyperglycaemia (high blood sugar)', 'Hyperglycaemia (high blood sugar)', NULL, NULL),
(152, 'Hyperhidrosis', 'Hyperhidrosis', NULL, NULL),
(153, 'Hypoglycaemia (low blood sugar)', 'Hypoglycaemia (low blood sugar)', NULL, NULL),
(154, 'Idiopathic pulmonary fibrosis', 'Idiopathic pulmonary fibrosis', NULL, NULL),
(155, 'Impetigo', 'Impetigo', NULL, NULL),
(156, 'Indigestion', 'Indigestion', NULL, NULL),
(157, 'Ingrown toenail', 'Ingrown toenail', NULL, NULL),
(158, 'Inherited heart conditions', 'Inherited heart conditions', NULL, NULL),
(159, 'Insomnia', 'Insomnia', NULL, NULL),
(160, 'Iron deficiency anaemia', 'Iron deficiency anaemia', NULL, NULL),
(161, 'Irritable bowel syndrome (IBS)', 'Irritable bowel syndrome (IBS)', NULL, NULL),
(162, 'Irritable hip', 'Irritable hip', NULL, NULL),
(163, 'Itching', 'Itching', NULL, NULL),
(164, 'Itchy bottom', 'Itchy bottom', NULL, NULL),
(165, 'Kaposi\'s sarcoma', 'Kaposi\'s sarcoma', NULL, NULL),
(166, 'Kidney cancer', 'Kidney cancer', NULL, NULL),
(167, 'Kidney infection', 'Kidney infection', NULL, NULL),
(168, 'Kidney stones', 'Kidney stones', NULL, NULL),
(169, 'Labyrinthitis', 'Labyrinthitis', NULL, NULL),
(170, 'Lactose intolerance', 'Lactose intolerance', NULL, NULL),
(171, 'Langerhans cell histiocytosis', 'Langerhans cell histiocytosis', NULL, NULL),
(172, 'Laryngeal (larynx) cancer', 'Laryngeal (larynx) cancer', NULL, NULL),
(173, 'Laryngitis', 'Laryngitis', NULL, NULL),
(174, 'Leg cramps', 'Leg cramps', NULL, NULL),
(175, 'Lichen planus', 'Lichen planus', NULL, NULL),
(176, 'Liver cancer', 'Liver cancer', NULL, NULL),
(177, 'Liver disease', 'Liver disease', NULL, NULL),
(178, 'Liver tumours', 'Liver tumours', NULL, NULL),
(179, 'Loss of libido', 'Loss of libido', NULL, NULL),
(180, 'Lung cancer', 'Lung cancer', NULL, NULL),
(181, 'Lupus', 'Lupus', NULL, NULL),
(182, 'Lyme disease', 'Lyme disease', NULL, NULL),
(183, 'Lymphoedema', 'Lymphoedema', NULL, NULL),
(184, 'Malaria', 'Malaria', NULL, NULL),
(185, 'Malignant brain tumour (cancerous)', 'Malignant brain tumour (cancerous)', NULL, NULL),
(186, 'Malnutrition', 'Malnutrition', NULL, NULL),
(187, 'Measles', 'Measles', NULL, NULL),
(188, 'Meningitis', 'Meningitis', NULL, NULL),
(189, 'Menopause', 'Menopause', NULL, NULL),
(190, 'Mesothelioma', 'Mesothelioma', NULL, NULL),
(191, 'Middle ear infection (otitis media)', 'Middle ear infection (otitis media)', NULL, NULL),
(192, 'Migraine', 'Migraine', NULL, NULL),
(193, 'Miscarriage', 'Miscarriage', NULL, NULL),
(194, 'Motor neurone disease (MND)', 'Motor neurone disease (MND)', NULL, NULL),
(195, 'Mouth cancer', 'Mouth cancer', NULL, NULL),
(196, 'Mouth ulcer', 'Mouth ulcer', NULL, NULL),
(197, 'Multiple myeloma', 'Multiple myeloma', NULL, NULL),
(198, 'Multiple sclerosis (MS)', 'Multiple sclerosis (MS)', NULL, NULL),
(199, 'Mumps', 'Mumps', NULL, NULL),
(200, 'Meniere\'s disease', 'Meniere\'s disease', NULL, NULL),
(201, 'Nasal and sinus cancer', 'Nasal and sinus cancer', NULL, NULL),
(202, 'Nasopharyngeal cancer', 'Nasopharyngeal cancer', NULL, NULL),
(203, 'Neuroblastoma', 'Neuroblastoma', NULL, NULL),
(204, 'Neuroblastoma: Children', 'Neuroblastoma: Children', NULL, NULL),
(205, 'Neuroendocrine tumours', 'Neuroendocrine tumours', NULL, NULL),
(206, 'Non-alcoholic fatty liver disease (NAFLD)', 'Non-alcoholic fatty liver disease (NAFLD)', NULL, NULL),
(207, 'Non-Hodgkin lymphoma', 'Non-Hodgkin lymphoma', NULL, NULL),
(208, 'Non-Hodgkin lymphoma: Children', 'Non-Hodgkin lymphoma: Children', NULL, NULL),
(209, 'Norovirus', 'Norovirus', NULL, NULL),
(210, 'Nosebleed', 'Nosebleed', NULL, NULL),
(211, 'Obesity', 'Obesity', NULL, NULL),
(212, 'Obsessive compulsive disorder (OCD)', 'Obsessive compulsive disorder (OCD)', NULL, NULL),
(213, 'Obstructive sleep apnoea', 'Obstructive sleep apnoea', NULL, NULL),
(214, 'Oesophageal cancer', 'Oesophageal cancer', NULL, NULL),
(215, 'Oral thrush in adults', 'Oral thrush in adults', NULL, NULL),
(216, 'Osteoarthritis', 'Osteoarthritis', NULL, NULL),
(217, 'Osteoporosis', 'Osteoporosis', NULL, NULL),
(218, 'Osteosarcoma', 'Osteosarcoma', NULL, NULL),
(219, 'Otitis externa', 'Otitis externa', NULL, NULL),
(220, 'Ovarian cancer', 'Ovarian cancer', NULL, NULL),
(221, 'Ovarian cancer: Teenagers and young adults', 'Ovarian cancer: Teenagers and young adults', NULL, NULL),
(222, 'Ovarian cyst', 'Ovarian cyst', NULL, NULL),
(223, 'Overactive thyroid', 'Overactive thyroid', NULL, NULL),
(224, 'Paget\'s disease of the nipple', 'Paget\'s disease of the nipple', NULL, NULL),
(225, 'Pancreatic cancer', 'Pancreatic cancer', NULL, NULL),
(226, 'Panic disorder', 'Panic disorder', NULL, NULL),
(227, 'Parkinson\'s disease', 'Parkinson\'s disease', NULL, NULL),
(228, 'Pelvic organ prolapse', 'Pelvic organ prolapse', NULL, NULL),
(229, 'Penile cancer', 'Penile cancer', NULL, NULL),
(230, 'Peripheral neuropathy', 'Peripheral neuropathy', NULL, NULL),
(231, 'Personality disorder', 'Personality disorder', NULL, NULL),
(232, 'Pleurisy', 'Pleurisy', NULL, NULL),
(233, 'Pneumonia', 'Pneumonia', NULL, NULL),
(234, 'Polymyalgia rheumatica', 'Polymyalgia rheumatica', NULL, NULL),
(235, 'Post-traumatic stress disorder (PTSD)', 'Post-traumatic stress disorder (PTSD)', NULL, NULL),
(236, 'Postnatal depression', 'Postnatal depression', NULL, NULL),
(237, 'Pregnancy and baby', 'Pregnancy and baby', NULL, NULL),
(238, 'Pressure ulcers', 'Pressure ulcers', NULL, NULL),
(239, 'Prostate cancer', 'Prostate cancer', NULL, NULL),
(240, 'Psoriasis', 'Psoriasis', NULL, NULL),
(241, 'Psoriatic arthritis', 'Psoriatic arthritis', NULL, NULL),
(242, 'Psychosis', 'Psychosis', NULL, NULL),
(243, 'Rare tumours', 'Rare tumours', NULL, NULL),
(244, 'Raynaud\'s phenomenon', 'Raynaud\'s phenomenon', NULL, NULL),
(245, 'Reactive arthritis', 'Reactive arthritis', NULL, NULL),
(246, 'Restless legs syndrome', 'Restless legs syndrome', NULL, NULL),
(247, 'Retinoblastoma', 'Retinoblastoma', NULL, NULL),
(248, 'Retinoblastoma: Children', 'Retinoblastoma: Children', NULL, NULL),
(249, 'Rhabdomyosarcoma', 'Rhabdomyosarcoma', NULL, NULL),
(250, 'Rheumatoid arthritis', 'Rheumatoid arthritis', NULL, NULL),
(251, 'Ringworm and other fungal infections', 'Ringworm and other fungal infections', NULL, NULL),
(252, 'Rosacea', 'Rosacea', NULL, NULL),
(253, 'Scabies', 'Scabies', NULL, NULL),
(254, 'Scarlet fever', 'Scarlet fever', NULL, NULL),
(255, 'Schizophrenia', 'Schizophrenia', NULL, NULL),
(256, 'Scoliosis', 'Scoliosis', NULL, NULL),
(257, 'Septic shock', 'Septic shock', NULL, NULL),
(258, 'Sexually transmitted infections (STIs)', 'Sexually transmitted infections (STIs)', NULL, NULL),
(259, 'Shingles', 'Shingles', NULL, NULL),
(260, 'Shortness of breath', 'Shortness of breath', NULL, NULL),
(261, 'Sickle cell disease', 'Sickle cell disease', NULL, NULL),
(262, 'Sinusitis', 'Sinusitis', NULL, NULL),
(263, 'Sjogren\'s syndrome', 'Sjogren\'s syndrome', NULL, NULL),
(264, 'Skin cancer (melanoma)', 'Skin cancer (melanoma)', NULL, NULL),
(265, 'Skin cancer (non-melanoma)', 'Skin cancer (non-melanoma)', NULL, NULL),
(266, 'Slapped cheek syndrome', 'Slapped cheek syndrome', NULL, NULL),
(267, 'Soft tissue sarcomas', 'Soft tissue sarcomas', NULL, NULL),
(268, 'Soft tissue sarcomas: Teenagers and young adults', 'Soft tissue sarcomas: Teenagers and young adults', NULL, NULL),
(269, 'Sore throat', 'Sore throat', NULL, NULL),
(270, 'Spleen problems and spleen removal', 'Spleen problems and spleen removal', NULL, NULL),
(271, 'Stillbirth', 'Stillbirth', NULL, NULL),
(272, 'Stomach ache and abdominal pain', 'Stomach ache and abdominal pain', NULL, NULL),
(273, 'Stomach cancer', 'Stomach cancer', NULL, NULL),
(274, 'Stomach ulcer', 'Stomach ulcer', NULL, NULL),
(275, 'Stress, anxiety and low mood', 'Stress, anxiety and low mood', NULL, NULL),
(276, 'Stroke', 'Stroke', NULL, NULL),
(277, 'Sudden infant death syndrome (SIDS)', 'Sudden infant death syndrome (SIDS)', NULL, NULL),
(278, 'Suicide', 'Suicide', NULL, NULL),
(279, 'Sunburn', 'Sunburn', NULL, NULL),
(280, 'Swollen glands', 'Swollen glands', NULL, NULL),
(281, 'Testicular cancer', 'Testicular cancer', NULL, NULL),
(282, 'Testicular cancer: Teenagers and young adults', 'Testicular cancer: Teenagers and young adults', NULL, NULL),
(283, 'Testicular lumps and swellings', 'Testicular lumps and swellings', NULL, NULL),
(284, 'Thirst', 'Thirst', NULL, NULL),
(285, 'Threadworms', 'Threadworms', NULL, NULL),
(286, 'Thrush in men', 'Thrush in men', NULL, NULL),
(287, 'Thyroid cancer', 'Thyroid cancer', NULL, NULL),
(288, 'Thyroid cancer: Teenagers and young adults', 'Thyroid cancer: Teenagers and young adults', NULL, NULL),
(289, 'Tinnitus', 'Tinnitus', NULL, NULL),
(290, 'Tonsillitis', 'Tonsillitis', NULL, NULL),
(291, 'Tooth decay', 'Tooth decay', NULL, NULL),
(292, 'Toothache', 'Toothache', NULL, NULL),
(293, 'Transient ischaemic attack (TIA)', 'Transient ischaemic attack (TIA)', NULL, NULL),
(294, 'Trigeminal neuralgia', 'Trigeminal neuralgia', NULL, NULL),
(295, 'Tuberculosis (TB)', 'Tuberculosis (TB)', NULL, NULL),
(296, 'Type 1 diabetes', 'Type 1 diabetes', NULL, NULL),
(297, 'Type 2 diabetes', 'Type 2 diabetes', NULL, NULL),
(298, 'Ulcerative colitis', 'Ulcerative colitis', NULL, NULL),
(299, 'Underactive thyroid', 'Underactive thyroid', NULL, NULL),
(300, 'Urinary incontinence', 'Urinary incontinence', NULL, NULL),
(301, 'Urinary tract infection (UTI)', 'Urinary tract infection (UTI)', NULL, NULL),
(302, 'Urinary tract infection (UTI) in children', 'Urinary tract infection (UTI) in children', NULL, NULL),
(303, 'Urticaria (hives)', 'Urticaria (hives)', NULL, NULL),
(304, 'Vaginal cancer', 'Vaginal cancer', NULL, NULL),
(305, 'Vaginal thrush', 'Vaginal thrush', NULL, NULL),
(306, 'Varicose eczema', 'Varicose eczema', NULL, NULL),
(307, 'Varicose veins', 'Varicose veins', NULL, NULL),
(308, 'Venous leg ulcer', 'Venous leg ulcer', NULL, NULL),
(309, 'Vertigo', 'Vertigo', NULL, NULL),
(310, 'Vitamin B12 or folate deficiency anaemia', 'Vitamin B12 or folate deficiency anaemia', NULL, NULL),
(311, 'Vomiting in adults', 'Vomiting in adults', NULL, NULL),
(312, 'Vulval cancer', 'Vulval cancer', NULL, NULL),
(313, 'Warts and verrucas', 'Warts and verrucas', NULL, NULL),
(314, 'Whooping cough', 'Whooping cough', NULL, NULL),
(315, 'Wilms’ tumour', 'Wilms’ tumour', NULL, NULL),
(316, 'Womb (uterus) cancer', 'Womb (uterus) cancer', NULL, NULL),
(317, 'Yellow fever', 'Yellow fever', NULL, NULL),
(318, 'COVID 19', 'SARS-CoV-2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE `testimony` (
  `idtestimony` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `user_iduser` int(11) NOT NULL,
  `sickness_idsickness` int(11) NOT NULL,
  `remedy_idremedy` int(11) NOT NULL,
  `relief_idrelief` int(11) NOT NULL,
  `story` text DEFAULT NULL,
  `dosage` varchar(45) DEFAULT NULL,
  `administeredTo` varchar(45) DEFAULT NULL,
  `administeredBy` varchar(45) DEFAULT NULL,
  `warnings` text DEFAULT NULL,
  `additionalInfo` tinytext DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `expertComment` text DEFAULT NULL,
  `overallExperience` varchar(100) DEFAULT NULL,
  `testimonyUrl` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimony`
--

INSERT INTO `testimony` (`idtestimony`, `date`, `user_iduser`, `sickness_idsickness`, `remedy_idremedy`, `relief_idrelief`, `story`, `dosage`, `administeredTo`, `administeredBy`, `warnings`, `additionalInfo`, `country`, `state`, `expertComment`, `overallExperience`, `testimonyUrl`) VALUES
(1, NULL, 1, 1, 1, 1, '<p>\n	rwerw</p>\n', '3', '2', '2', '<p>\n	dffgdf</p>\n', 'werwre', '251', 'werwer', '<p>\n	werwerwerwer</p>\n', '1', 'http://localhost/grocery_crud/index.php/BackEnd/testimony/add'),
(2, '2020-06-29', 3, 1, 1, 1, '<p>\r\n	xzvzxvz</p>\r\n', 'e', '1', '1', '<p>\r\n	vxcxc</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'testimonial/testimony_for_sickness/1'),
(3, '2020-06-29', 4, 3, 1, 1, '<p>\r\n	dfgdfg</p>\r\n', '4', '2', '2', '<p>\r\n	dfgdf</p>\r\n', NULL, NULL, NULL, NULL, NULL, 'testimonial/testimony_for_sickness/3');

-- --------------------------------------------------------

--
-- Table structure for table `topdiseases`
--

CREATE TABLE `topdiseases` (
  `idtopDiseases` int(11) NOT NULL,
  `topDiseasescol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `treatmentrecurrence`
--

CREATE TABLE `treatmentrecurrence` (
  `idtreatmentRecurrence` int(11) NOT NULL,
  `recurrence` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trendingsearches`
--

CREATE TABLE `trendingsearches` (
  `idtrendingSearches` int(11) NOT NULL,
  `homePage_idhomePage` int(11) NOT NULL,
  `trendTitle` varchar(45) DEFAULT NULL,
  `trendPic` varchar(45) DEFAULT NULL,
  `positiveTestimonies` int(11) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `sickness_idsickness` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trendingsearches`
--

INSERT INTO `trendingsearches` (`idtrendingSearches`, `homePage_idhomePage`, `trendTitle`, `trendPic`, `positiveTestimonies`, `url`, `sickness_idsickness`) VALUES
(1, 1, 'fever', NULL, 0, 'sickness-testimony/fever', 1),
(2, 1, 'Caugh', 'e1fcf-best-remedies-xd-0.jpg', 0, 'sickness-testimony/caugh', 3),
(3, 1, 'test', '42bfa-img_8077.png', 0, 'sickness-testimony/test', 4),
(4, 1, 'Allergies', NULL, 0, 'sickness-testimony/allergies', 16),
(5, 1, 'Allergic rhinitis', NULL, 0, 'sickness-testimony/allergic-rhinitis', 15),
(6, 1, 'Fever in children', NULL, 0, 'sickness-testimony/fever-in-children', 113),
(7, 1, 'Glandular fever', NULL, 0, 'sickness-testimony/glandular-fever', 129),
(8, 1, 'Acute lymphoblastic leukaemia: Teenagers and ', NULL, 0, 'sickness-testimony/acute-lymphoblastic-leukaemia-teenagers-and-young-adults', 8),
(9, 1, 'Acute lymphoblastic leukaemia', NULL, 0, 'sickness-testimony/acute-lymphoblastic-leukaemia', 6),
(10, 1, 'Acute myeloid leukaemia: Children', NULL, 0, 'sickness-testimony/acute-myeloid-leukaemia-children', 10),
(11, 1, 'Dysphagia (swallowing problems)', NULL, 0, 'sickness-testimony/dysphagia-swallowing-problems', 99);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `screenName` varchar(100) NOT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(225) NOT NULL,
  `mobileNo` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `dateReg` datetime DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `firstName`, `lastName`, `screenName`, `Address`, `City`, `Country`, `email`, `password`, `mobileNo`, `status`, `dateReg`, `dob`, `gender`) VALUES
(1, 'Kumar', 's', 'kumaran', 'xxxxx', 'yyyyyy', '251', 'text@gmail.com', '69c5fcebaa65b560eaf06c3fbeb481ae44b8d618', '3534534634', '1', '2020-06-23 00:00:00', '2020-06-15', '1'),
(2, 'test', 'tset', 'test', NULL, NULL, NULL, 'sakthichandren@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, NULL, NULL, ''),
(3, 'test', 'tset', 'test', NULL, NULL, NULL, 'sakthichandren@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, NULL, NULL, ''),
(4, 'rwerw', 'w', 'sdfsd', NULL, NULL, NULL, 'dasd@vdf.fhf', 'bfc896e1ecd35d326871e60c70649a1e99571ffa', NULL, NULL, NULL, NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`idaboutUs`);

--
-- Indexes for table `additionalremedy`
--
ALTER TABLE `additionalremedy`
  ADD KEY `fk_additionalRemedy_remedy1_idx` (`remedy_idremedy`),
  ADD KEY `fk_additionalRemedy_testimony1_idx` (`testimony_idtestimony`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idarticle`),
  ADD KEY `fk_article_editor1_idx` (`editor_idEditor`);

--
-- Indexes for table `articlepart`
--
ALTER TABLE `articlepart`
  ADD PRIMARY KEY (`idarticlePart`);

--
-- Indexes for table `articlesuccess`
--
ALTER TABLE `articlesuccess`
  ADD PRIMARY KEY (`idarticleSuccess`),
  ADD KEY `fk_articleSuccess_article1_idx` (`article_idarticle`),
  ADD KEY `fk_articleSuccess_user1_idx` (`user_iduser`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`idavailability`),
  ADD KEY `fk_availability_remedy1_idx` (`remedy_idremedy`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`idbrands`);

--
-- Indexes for table `citedbrands`
--
ALTER TABLE `citedbrands`
  ADD KEY `fk_citedBrands_testimony1_idx` (`testimony_idtestimony`),
  ADD KEY `fk_citedBrands_brands1_idx` (`brands_idbrands`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idcomment`),
  ADD KEY `fk_comment_user1_idx` (`user_iduser`),
  ADD KEY `fk_comment_testimony1_idx` (`testimony_idtestimony`),
  ADD KEY `fk_comment_comment1_idx` (`comment_idcomment`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disclaimer`
--
ALTER TABLE `disclaimer`
  ADD PRIMARY KEY (`idDisclaimer`);

--
-- Indexes for table `dosageunit`
--
ALTER TABLE `dosageunit`
  ADD PRIMARY KEY (`iddosageUnit`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`idduration`);

--
-- Indexes for table `editor`
--
ALTER TABLE `editor`
  ADD PRIMARY KEY (`idEditor`);

--
-- Indexes for table `featuredremedies`
--
ALTER TABLE `featuredremedies`
  ADD KEY `fk_featuredRemedies_article1_idx` (`article_idarticle`),
  ADD KEY `fk_featuredRemedies_remedy1_idx` (`remedy_idremedy`);

--
-- Indexes for table `featuredsicknesses`
--
ALTER TABLE `featuredsicknesses`
  ADD KEY `fk_featuredSicknesses_article1_idx` (`article_idarticle`),
  ADD KEY `fk_featuredSicknesses_sickness1_idx` (`sickness_idsickness`);

--
-- Indexes for table `homepage`
--
ALTER TABLE `homepage`
  ADD PRIMARY KEY (`idhomePage`);

--
-- Indexes for table `metatags`
--
ALTER TABLE `metatags`
  ADD PRIMARY KEY (`idmetaTags`);

--
-- Indexes for table `questioncategory`
--
ALTER TABLE `questioncategory`
  ADD PRIMARY KEY (`idquestionCategory`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idQuestion`),
  ADD KEY `fk_complaints_user1_idx` (`user_iduser`),
  ADD KEY `fk_questions_questionCategory1_idx` (`questionCategory_idquestionCategory`);

--
-- Indexes for table `relieftype`
--
ALTER TABLE `relieftype`
  ADD PRIMARY KEY (`idrelief`);

--
-- Indexes for table `remedy`
--
ALTER TABLE `remedy`
  ADD PRIMARY KEY (`idremedy`);

--
-- Indexes for table `sickness`
--
ALTER TABLE `sickness`
  ADD PRIMARY KEY (`idsickness`);

--
-- Indexes for table `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`idtestimony`),
  ADD KEY `fk_testimony_user_idx` (`user_iduser`),
  ADD KEY `fk_testimony_remedy1_idx` (`remedy_idremedy`),
  ADD KEY `fk_testimony_relief1_idx` (`relief_idrelief`),
  ADD KEY `fk_testimony_sickness1_idx` (`sickness_idsickness`);

--
-- Indexes for table `topdiseases`
--
ALTER TABLE `topdiseases`
  ADD PRIMARY KEY (`idtopDiseases`);

--
-- Indexes for table `treatmentrecurrence`
--
ALTER TABLE `treatmentrecurrence`
  ADD PRIMARY KEY (`idtreatmentRecurrence`);

--
-- Indexes for table `trendingsearches`
--
ALTER TABLE `trendingsearches`
  ADD PRIMARY KEY (`idtrendingSearches`),
  ADD KEY `fk_trendingSearches_homePage1_idx` (`homePage_idhomePage`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `articlepart`
--
ALTER TABLE `articlepart`
  MODIFY `idarticlePart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articlesuccess`
--
ALTER TABLE `articlesuccess`
  MODIFY `idarticleSuccess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `idavailability` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `idbrands` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=922;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `disclaimer`
--
ALTER TABLE `disclaimer`
  MODIFY `idDisclaimer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dosageunit`
--
ALTER TABLE `dosageunit`
  MODIFY `iddosageUnit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `idduration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `idEditor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `idhomePage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `metatags`
--
ALTER TABLE `metatags`
  MODIFY `idmetaTags` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questioncategory`
--
ALTER TABLE `questioncategory`
  MODIFY `idquestionCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `relieftype`
--
ALTER TABLE `relieftype`
  MODIFY `idrelief` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `remedy`
--
ALTER TABLE `remedy`
  MODIFY `idremedy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT for table `sickness`
--
ALTER TABLE `sickness`
  MODIFY `idsickness` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=319;

--
-- AUTO_INCREMENT for table `testimony`
--
ALTER TABLE `testimony`
  MODIFY `idtestimony` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `treatmentrecurrence`
--
ALTER TABLE `treatmentrecurrence`
  MODIFY `idtreatmentRecurrence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trendingsearches`
--
ALTER TABLE `trendingsearches`
  MODIFY `idtrendingSearches` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `additionalremedy`
--
ALTER TABLE `additionalremedy`
  ADD CONSTRAINT `fk_additionalRemedy_remedy1` FOREIGN KEY (`remedy_idremedy`) REFERENCES `remedy` (`idremedy`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_additionalRemedy_testimony1` FOREIGN KEY (`testimony_idtestimony`) REFERENCES `testimony` (`idtestimony`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_editor1` FOREIGN KEY (`editor_idEditor`) REFERENCES `editor` (`idEditor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `articlesuccess`
--
ALTER TABLE `articlesuccess`
  ADD CONSTRAINT `fk_articleSuccess_article1` FOREIGN KEY (`article_idarticle`) REFERENCES `article` (`idarticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_articleSuccess_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `fk_availability_remedy1` FOREIGN KEY (`remedy_idremedy`) REFERENCES `remedy` (`idremedy`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `citedbrands`
--
ALTER TABLE `citedbrands`
  ADD CONSTRAINT `fk_citedBrands_brands1` FOREIGN KEY (`brands_idbrands`) REFERENCES `brands` (`idbrands`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_citedBrands_testimony1` FOREIGN KEY (`testimony_idtestimony`) REFERENCES `testimony` (`idtestimony`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_comment1` FOREIGN KEY (`comment_idcomment`) REFERENCES `comment` (`idcomment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_testimony1` FOREIGN KEY (`testimony_idtestimony`) REFERENCES `testimony` (`idtestimony`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `featuredremedies`
--
ALTER TABLE `featuredremedies`
  ADD CONSTRAINT `fk_featuredRemedies_article1` FOREIGN KEY (`article_idarticle`) REFERENCES `article` (`idarticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_featuredRemedies_remedy1` FOREIGN KEY (`remedy_idremedy`) REFERENCES `remedy` (`idremedy`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `featuredsicknesses`
--
ALTER TABLE `featuredsicknesses`
  ADD CONSTRAINT `fk_featuredSicknesses_article1` FOREIGN KEY (`article_idarticle`) REFERENCES `article` (`idarticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_featuredSicknesses_sickness1` FOREIGN KEY (`sickness_idsickness`) REFERENCES `sickness` (`idsickness`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_complaints_user1` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questions_questionCategory1` FOREIGN KEY (`questionCategory_idquestionCategory`) REFERENCES `questioncategory` (`idquestionCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `testimony`
--
ALTER TABLE `testimony`
  ADD CONSTRAINT `fk_testimony_relief1` FOREIGN KEY (`relief_idrelief`) REFERENCES `relieftype` (`idrelief`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_testimony_remedy1` FOREIGN KEY (`remedy_idremedy`) REFERENCES `remedy` (`idremedy`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_testimony_sickness1` FOREIGN KEY (`sickness_idsickness`) REFERENCES `sickness` (`idsickness`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_testimony_user` FOREIGN KEY (`user_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `trendingsearches`
--
ALTER TABLE `trendingsearches`
  ADD CONSTRAINT `fk_trendingSearches_homePage1` FOREIGN KEY (`homePage_idhomePage`) REFERENCES `homepage` (`idhomePage`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
