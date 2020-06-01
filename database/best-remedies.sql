-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 06:22 PM
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
  `clicks` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `featuredremedies`
--

CREATE TABLE `featuredremedies` (
  `article_idarticle` int(11) NOT NULL,
  `remedy_idremedy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `featuredsicknesses`
--

CREATE TABLE `featuredsicknesses` (
  `article_idarticle` int(11) NOT NULL,
  `sickness_idsickness` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `url` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idEditor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homepage`
--
ALTER TABLE `homepage`
  MODIFY `idhomePage` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `idrelief` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `remedy`
--
ALTER TABLE `remedy`
  MODIFY `idremedy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sickness`
--
ALTER TABLE `sickness`
  MODIFY `idsickness` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimony`
--
ALTER TABLE `testimony`
  MODIFY `idtestimony` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatmentrecurrence`
--
ALTER TABLE `treatmentrecurrence`
  MODIFY `idtreatmentRecurrence` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trendingsearches`
--
ALTER TABLE `trendingsearches`
  MODIFY `idtrendingSearches` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT;

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
