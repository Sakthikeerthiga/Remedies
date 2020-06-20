-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 04:42 PM
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
(1, '10 PRO TIPS TO BECOME PRO-ACTIVE', 'A fever is a body temperature that is higher than normal. A normal temperature can vary from person to person, but it is usually around 98.6 F. A fever is not a', 'fever', 'ht-1.jpg', 'fever', 'A fever is a body temperature that is higher than normal. A normal temperature can vary from person to person, but it is usually around 98.6 F. A fever is not a disease. It is usually a sign that your body is trying to fight an illness or infection. Infections cause most fevers', 1, 1, 1, '1', 'article-detail/1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Caugh', 'A fever is a body temperature that is higher than normal. A normal temperature can vary from person to person, but it is usually around 98.6 F. A fever is not a', 'caugh', 'ht-2.jpg', 'caugh', 'tesgt', 1, 1, 1, '1', 'article-detail/3', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Headache', 'A headache can be a sign of stress or emotional distress, or it can result from a medical disorder, such as migraine or high blood pressure, anxiety, or depress', 'head ache', 'ht-3.jpg', 'test', 'test', 1, 1, 1, '1', 'article-detail/4', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Anemia', 'A deficiency of iron or vitamins can lead to headaches related to low oxygen levels in the brain. IDA has also been shown to play a role in migraine, especially', 'anemia', 'ht-4.jpg', 'headache', 'source', 1, 1, 1, '1', 'article-detail/5', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Body pain', 'Body aches are a common symptom of many conditions. The flu is one of the most well-known conditions that can cause body aches. Aches can also be caused by your', 'pain', 'ht-5.jpg', 'pain', 'sorce', 1, 1, 1, 'work', 'article-detail/6', 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `idbrands` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `citedbrands`
--

CREATE TABLE `citedbrands` (
  `testimony_idtestimony` int(11) NOT NULL,
  `brands_idbrands` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `comment_idcomment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(5) NOT NULL,
  `countryCode` varchar(2) NOT NULL DEFAULT '',
  `countryName` varchar(100) NOT NULL DEFAULT '',
  `currencyCode` varchar(3) DEFAULT NULL,
  `fipsCode` varchar(2) DEFAULT NULL,
  `isoNumeric` varchar(4) DEFAULT NULL,
  `north` varchar(30) DEFAULT NULL,
  `south` varchar(30) DEFAULT NULL,
  `east` varchar(30) DEFAULT NULL,
  `west` varchar(30) DEFAULT NULL,
  `capital` varchar(30) DEFAULT NULL,
  `continentName` varchar(100) DEFAULT NULL,
  `continent` varchar(2) DEFAULT NULL,
  `languages` varchar(100) DEFAULT NULL,
  `isoAlpha3` varchar(3) DEFAULT NULL,
  `geonameId` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `dosageunit`
--

CREATE TABLE `dosageunit` (
  `iddosageUnit` int(11) NOT NULL,
  `unitName` varchar(45) DEFAULT NULL,
  `unitShortName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `idduration` int(11) NOT NULL,
  `unit` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Editor', 'editor', 'writter', 'to check bio editor tables', 'D.pharm', 'writter', 'ht-2.jpg', 'editor', 'editor', 'editor@gmail.com');

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
(5, 1),
(1, 1);

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
(1, 1),
(4, 1),
(5, 1),
(3, 2);

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

-- --------------------------------------------------------

--
-- Table structure for table `questioncategory`
--

CREATE TABLE `questioncategory` (
  `idquestionCategory` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `remedy`
--

INSERT INTO `remedy` (`idremedy`, `type`, `name`, `shortName`, `link`, `picture`, `pictureAltText`, `expertAdvice`, `sellerLink`) VALUES
(1, '1', 'remedy', 'remedy', 'redey.pjp', 'ht-3.jpg', 'remedy', 'advice', 'teste');

-- --------------------------------------------------------

--
-- Table structure for table `sickness`
--

CREATE TABLE `sickness` (
  `idsickness` int(11) NOT NULL,
  `commonName` varchar(300) DEFAULT NULL,
  `scientificName` varchar(300) DEFAULT NULL,
  `searchCount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sickness`
--

INSERT INTO `sickness` (`idsickness`, `commonName`, `scientificName`, `searchCount`) VALUES
(1, 'fever', 'Fever', 1),
(2, 'cough', 'Cough', 2),
(3, 'Abdominal aortic aneurysm', 'Abdominal aortic aneurysm', 0),
(4, 'Acne', 'Acne', NULL),
(5, 'Bacterial vaginosis', 'Bacterial vaginosis', NULL),
(6, 'Genital herpes', 'Genital herpes', NULL);

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
(1, '2020-06-16', 1, 1, 1, 1, 'feverDeWitt Daughtry Family Department of Surgery, University of Miami Miller School of Medicine, Miami, FL, USA\r\n\r\nCorrespondence to: Carl I. Schulman, MD, PhD, MSPH, FACS. Professor of Surgery, Eunice Bernhard Endowed Chair in Burns Director—William Lehman Injury Research Center, Associate Director—Surgical Residency Program, DeWitt Daughtry Family Department of Surgery, University of Miami Miller School of Medicine, Miami, FL, USA. Email: CSchulman@med.miami.edu.', '2.5mg', 'take rest', '1', 'keep rest', 'nothing', 'xxxx', 'yyyyy', 'test comment', 'good', 'testimony/1');

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
(1, 1, 'Fever', 'ht-1.jpg', 2, 'testimony/1', 1),
(2, 1, 'ASTHMA', 'ht-2.jpg', 3, 'testimony/1', 1),
(3, 1, 'DIABETES', 'ht-3.jpg', 1, 'testimony/1', 2),
(4, 1, 'ALLERGIES', 'ht-4.jpg', 2, 'testimony/1', 1),
(5, 1, 'ACNE', 'ht-5.jpg', 1, 'testimony/1', 1),
(6, 1, 'HAIR LOSS', 'ht-6.jpg', 2, 'testimony/1', 1),
(7, 1, 'WEIGHT LOSS', 'ht-7.jpg', 1, 'testimony/1', 1),
(8, 1, 'HAY FEVER', 'ht-8.jpg', 5, 'testimony/1', 1);

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
  `mobileNo` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `dateReg` datetime DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `firstName`, `lastName`, `screenName`, `Address`, `City`, `Country`, `email`, `mobileNo`, `status`, `dateReg`, `dob`, `gender`) VALUES
(1, 'user', 's', 'user', 'xyz', 'yyy', 'zzz', 'xyz@gmail.com', '9080706050', '1', NULL, '2000-02-09', 'male');

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
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `articlepart`
--
ALTER TABLE `articlepart`
  MODIFY `idarticlePart` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articlesuccess`
--
ALTER TABLE `articlesuccess`
  MODIFY `idarticleSuccess` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `idavailability` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `idbrands` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `disclaimer`
--
ALTER TABLE `disclaimer`
  MODIFY `idDisclaimer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dosageunit`
--
ALTER TABLE `dosageunit`
  MODIFY `iddosageUnit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `idduration` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `editor`
--
ALTER TABLE `editor`
  MODIFY `idEditor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `idhomePage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `metatags`
--
ALTER TABLE `metatags`
  MODIFY `idmetaTags` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questioncategory`
--
ALTER TABLE `questioncategory`
  MODIFY `idquestionCategory` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `relieftype`
--
ALTER TABLE `relieftype`
  MODIFY `idrelief` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `remedy`
--
ALTER TABLE `remedy`
  MODIFY `idremedy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sickness`
--
ALTER TABLE `sickness`
  MODIFY `idsickness` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimony`
--
ALTER TABLE `testimony`
  MODIFY `idtestimony` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `treatmentrecurrence`
--
ALTER TABLE `treatmentrecurrence`
  MODIFY `idtreatmentRecurrence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trendingsearches`
--
ALTER TABLE `trendingsearches`
  MODIFY `idtrendingSearches` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
