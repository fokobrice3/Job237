-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 22, 2019 at 01:21 PM
-- Server version: 10.3.10-MariaDB-log
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job237`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `niveau` enum('SuperAdmin','Admin','Modo','') NOT NULL DEFAULT 'Admin',
  `createur` int(11) DEFAULT NULL,
  `login` varchar(25) NOT NULL,
  `pass` varchar(512) NOT NULL,
  `lastCnx` datetime NOT NULL DEFAULT current_timestamp(),
  `dateCreation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `niveau`, `createur`, `login`, `pass`, `lastCnx`, `dateCreation`) VALUES
(1, 'Admin', NULL, 'ADMIN', '$2y$12$uFH4oDg6aN7jWuYrds184eI/wgZp6dsgEVU9GiDIPcY3l/heUs53.', '2019-08-06 20:05:01', '2019-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `candidat`
--

CREATE TABLE `candidat` (
  `idCandidat` int(11) NOT NULL,
  `CV` varchar(100) DEFAULT NULL,
  `listCompetences` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(512) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `sexe` enum('F','H') DEFAULT 'F',
  `idNationalite` int(11) DEFAULT NULL,
  `pays` int(11) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `ville` int(11) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `photo` varchar(512) NOT NULL DEFAULT 'nobody.png',
  `langue` enum('french','english') NOT NULL DEFAULT 'french',
  `dateCreation` datetime DEFAULT NULL,
  `lastConnexion` datetime DEFAULT current_timestamp(),
  `profilOk` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidat`
--

INSERT INTO `candidat` (`idCandidat`, `CV`, `listCompetences`, `email`, `pass`, `nom`, `prenom`, `sexe`, `idNationalite`, `pays`, `region`, `ville`, `telephone`, `dateNaissance`, `photo`, `langue`, `dateCreation`, `lastConnexion`, `profilOk`) VALUES
(5, '5-190206110940.jpg', '4,1,3,2,16,5,6,8,12,11,10,15,9,14,7,13', 'fokobrice3@gmail.com', '$2y$12$p1RJqp1ycyR7xaI27/QC9.4NELFzKVedSDsxS.cD7U8wZyrXFyukG', 'foko brice', 'Alain', 'H', 1, 1, 1, 3, '696460458', '1997-05-08', 'nobody.png', 'french', '2019-01-28 22:47:49', '2019-03-12 16:24:51', 1),
(6, NULL, NULL, 'test2@mail.com', '$2y$12$UR9bo/I7Q76Lv6LofHCMi.8ShifbJB8.ASE8Ymc8HhpvdLlUS8TEq', 'Mbabou Alain', NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, 'nobody.png', 'french', '2019-03-03 11:34:23', '2019-03-12 16:36:34', 0),
(7, NULL, NULL, 'fokoalbin@yahoo.fr', '$2y$12$GudzevhYqR/NRQToK9SiBO8IIxBb35BrPM3WX3crsTGbUs5rSv4Ru', 'FOKO', NULL, 'H', 1, 1, 4, 17, '696460458', NULL, 'nobody.png', 'french', '2019-03-11 20:27:28', '2019-03-11 21:27:28', 1),
(8, NULL, NULL, 'fokoalbin2@yahoo.fr', '$2y$12$MG7k.CnKVkFXasOunShefeoiehwdK9b3l4lY3jvs7UGbcSaJzhEFG', 'FOKO', 'alain', 'F', 1, 1, 4, 55, '696460458', '1993-03-25', 'nobody.png', 'french', '2019-03-11 21:12:39', '2019-03-11 21:15:47', 1),
(9, '9-190722151142.png', NULL, 'cand01@test.fr', '$2y$12$MujN5NoalBxox1KWXhdGa.EN5If/oEqBQX5H39CB9NxurN6RP3RFW', 'candidate01', 'brice', 'H', 1, 1, 1, 16, '699778855', '1993-03-16', '9C190722151020.jpg', 'french', '2019-07-22 15:01:19', '2019-07-22 17:01:19', 1),
(10, NULL, NULL, 'candidate01@test.fr', '$2y$12$OjwV6XlrmVCSejQemgeUl.RSgBR7Jr3FMJXciFYrgxgYmq0DbqeTC', 'cand01', NULL, 'F', NULL, NULL, NULL, NULL, NULL, NULL, 'nobody.png', 'french', '2019-08-06 19:59:56', '2019-08-06 21:59:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categori_formation`
--

CREATE TABLE `categori_formation` (
  `idCategory` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categori_formation`
--

INSERT INTO `categori_formation` (`idCategory`, `nom`, `name`) VALUES
(1, 'Digital', 'Digital'),
(1, 'Electronique', 'Electronic'),
(3, 'Banque', 'Bank');

-- --------------------------------------------------------

--
-- Table structure for table `competence`
--

CREATE TABLE `competence` (
  `idCompetence` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `competence`
--

INSERT INTO `competence` (`idCompetence`, `name`, `nom`) VALUES
(1, 'Adobe Illustrator', 'Adobe Illustrator'),
(2, 'Adobe Photoshop', 'Adobe Photoshop'),
(3, 'Adobe Indesign', 'Adobe Indesign'),
(4, 'Adobe Flash/Animate', 'Adobe Flash/Animate'),
(5, 'Communication', 'Communication'),
(6, 'English fluency', 'Maîtrise de l\'anglais'),
(7, 'Web programing', 'developpement Web'),
(8, 'Marketing', 'Marketing'),
(9, 'Sql Data Base', 'Base de données SQL'),
(10, 'MS office', 'MS office'),
(11, 'MS Excell', 'MS Excell'),
(12, 'MS Access', 'MS Access'),
(13, 'Wordpress', 'Wordpress'),
(14, 'Symphony', 'Symphony'),
(15, 'Sales', 'Ventes'),
(16, 'Cold calling', 'Cold calling');

-- --------------------------------------------------------

--
-- Table structure for table `demande`
--

CREATE TABLE `demande` (
  `idDemande` int(11) NOT NULL,
  `idCandidat` int(11) NOT NULL,
  `idOffre` int(11) NOT NULL,
  `dateDemande` date NOT NULL,
  `accord` enum('accordée','rejetée','en cours','') NOT NULL DEFAULT 'en cours',
  `motif` text DEFAULT NULL,
  `vue` int(11) NOT NULL DEFAULT 0,
  `motivationLetter` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `demande`
--

INSERT INTO `demande` (`idDemande`, `idCandidat`, `idOffre`, `dateDemande`, `accord`, `motif`, `vue`, `motivationLetter`) VALUES
(5, 5, 4, '2019-02-28', 'en cours', NULL, 0, NULL),
(6, 5, 1, '2019-02-28', 'en cours', NULL, 0, NULL),
(7, 6, 7, '2019-03-03', 'en cours', NULL, 0, NULL),
(11, 9, 13, '2019-07-22', 'en cours', NULL, 0, '9-190722162836.png');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `idEducation` int(11) NOT NULL,
  `idCandidat` int(11) NOT NULL,
  `idNiveauEtude` int(11) NOT NULL,
  `idTypeEducation` int(11) DEFAULT NULL,
  `titre` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `institution` varchar(50) DEFAULT NULL,
  `mention` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`idEducation`, `idCandidat`, `idNiveauEtude`, `idTypeEducation`, `titre`, `date`, `institution`, `mention`) VALUES
(1, 5, 12, 5, 'ERP solution', '2016-01-27', 'new base', 'A'),
(2, 5, 16, 11, 'Development application et du blablablablalba', '2013-02-01', 'lycee bilingue de yaounde a paris', 'A++'),
(3, 7, 12, 5, 'ERP solution', '2016-01-27', 'new base', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `employeur`
--

CREATE TABLE `employeur` (
  `idEmployeur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(512) NOT NULL,
  `sexe` enum('F','H') DEFAULT 'H',
  `photo` varchar(512) DEFAULT 'nobody.png',
  `dateCreation` datetime NOT NULL,
  `lastConnexion` datetime NOT NULL DEFAULT current_timestamp(),
  `pays` int(11) DEFAULT NULL,
  `adresse` varchar(110) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `langue` enum('french','english') NOT NULL DEFAULT 'french',
  `profilOk` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeur`
--

INSERT INTO `employeur` (`idEmployeur`, `nom`, `email`, `pass`, `sexe`, `photo`, `dateCreation`, `lastConnexion`, `pays`, `adresse`, `telephone`, `active`, `langue`, `profilOk`) VALUES
(1, 'Alain Serge Pouokam', 'test@yahoo.fr', '$2y$12$VYSKkSmWn22yrjoYWX9wuexhWD2dMEAYYLoSTBAA5X6Ay2ykwT7SC', 'F', '1-190201211647.jpg', '2019-01-23 03:15:00', '2019-07-22 10:54:16', 1, 'Derrière elise bar sis quartier nglonckack', '696460458', 1, 'french', 1),
(7, 'empl', 'empleur@yahoo.fr', '$2y$12$mfENEF4NabXn9JN3jq6SKe5aZKO8jkRcTh..bAhl1qg2IUooWr15K', 'H', 'nobody.png', '2019-01-28 23:17:02', '2019-01-29 00:17:02', NULL, NULL, NULL, 0, 'french', 0),
(19, 'Brice FOKO', 'fokoalbin@yahoo.fr', '$2y$12$7FKuZQ5V2X70nv6m0eN8a.LmiGkOYymiqHlhRc7OPvUFr84tiATFm', 'F', 'nobody.png', '2019-03-11 19:26:57', '2019-03-11 20:26:57', 1, 'Derrière elise bar sis quartier nglonckack', '696460458', 0, 'french', 1),
(20, 'employeur 01', 'emp01@test.fr', '$2y$12$gDeghjJNJjBtj8JU789zDeF6k0BEGqCfU6M7hAMwc.cghIukstJzS', 'H', 'nobody.png', '2019-07-22 10:58:26', '2019-08-06 19:58:29', 1, 'Derrière elise bar sis quartier nglonckack', '696460458', 1, 'french', 1);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `idExperience` int(11) NOT NULL,
  `idCandidat` int(11) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `company` varchar(25) NOT NULL,
  `nbAnnee` tinyint(4) NOT NULL,
  `idMetier` int(11) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`idExperience`, `idCandidat`, `poste`, `company`, `nbAnnee`, `idMetier`, `description`) VALUES
(1, 5, 'Integrateur', 'New base', 38, 5, '<p>J&#39;ai une petit experience &agrave; la new base technologie &agrave; paris</p>'),
(3, 5, 'Test', 'Test', 6, 4, '<p>ceci est une exp&eacute;rience test</p>'),
(4, 6, 'Test', 'Test', 6, 4, '<p>ceci est une exp&eacute;rience test</p>'),
(5, 8, 'Test', 'Test', 6, 10, '<p>ceci est une exp&eacute;rience test</p>');

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `idFormation` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `image` varchar(220) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `Description` varchar(540) NOT NULL,
  `description_eng` varchar(540) DEFAULT NULL,
  `Contenu` text NOT NULL,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `dateCreation` datetime NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`idFormation`, `idCategory`, `image`, `nom`, `name`, `Description`, `description_eng`, `Contenu`, `dateDebut`, `dateFin`, `idAdmin`, `dateCreation`, `price`) VALUES
(1, 1, 'd38a0-img-20180903-wa0039.jpg', 'Python Programming For Beginners', 'Python Programming For Beginners2', 'Understand the basics of domain investing.', 'Understand the basics of domain investing.2', '<h3 a=\"\" an=\"\" and=\"\" any=\"\" basics=\"\" buying=\"\" computer=\"\" course=\"\" cover=\"\" domain=\"\" domains=\"\" domains.=\"\" everything=\"\" exactly=\"\" experience=\"\" find=\"\" for=\"\" get=\"\" great=\"\" h3=\"\" have=\"\" helvetica=\"\" how=\"\" internet=\"\" investing=\"\" know=\"\" learn=\"\" li=\"\" making=\"\" money=\"\" need=\"\" of=\"\" online.=\"\" open=\"\" sans-serif=\"\" sell=\"\" selling=\"\" should=\"\" started=\"\" students=\"\" style=\"box-sizing: border-box; margin: 0px 0px 10px; font-weight: 500; line-height: 1.2; font-size: 1.375rem; color: rgb(41, 48, 59); font-family: \" t=\"\" take=\"\" the=\"\" them=\"\" this=\"\" to=\"\" ul=\"\" understand=\"\" will=\"\" willingness=\"\" with=\"\" work=\"\" you=\"\">\r\n	What You Will Learn?</h3>\r\n<ul open=\"\" style=\"box-sizing: border-box; margin-bottom: 1rem; margin-top: 0px; position: relative; color: rgb(33, 37, 41); font-family: \">\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Understand the basics of domain investing.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Buy domain names and sell them for profit (Step by step).</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Know how to evaluate a domain price.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Which domain names are worth more.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Find great domain names for a low price.</li>\r\n</ul>\r\n', '2013-03-05', '2019-03-15', 1, '2019-03-16 00:00:00', 2000),
(3, 1, 'd9e88-dscn3560.jpg', 'dsqdsqdsq', 'dsqdd', 'qsdsqd', 'sqdsq', '<p>\r\n	dsqdsq sqd sqdsqdsq dsdsdsqdsqds d sqdsdsqd sqdsqdsqdsqdsq dsqd sqdqs sqdsq</p>\r\n', '2019-03-01', '2019-03-31', 1, '2019-03-12 20:29:37', 30000),
(4, 1, 'intro-bg.jpg', 'dsqdsqdsq', 'ddsd', 'dsqds', 'dsqdsq', '<p>\r\n	dsqdsdsqdsqdsqdsqds</p>\r\n', '2019-03-13', '0000-00-00', 1, '2019-03-12 20:57:20', 100000),
(5, 1, '336da-form5.jpg', 'Certificat professionnel en science', 'Certificate pro in Science', 'Booster votre carrière en Data Science avec un Master et l\'apprentissage du Python', 'Kickstart your Career in Data Science & ML. Master data science, learn Python & SQL, analyze & visualize data, build machine learning models', '<span class=\"H2_1pmnvep-o_O-weightNormal_s9jwp5-o_O-fontHeadline_1uu0gyz m-r-1\" data-reactid=\"229\" style=\"box-sizing: border-box; font-size: 33.93px; line-height: 41.92px; margin-right: 16px; vertical-align: middle;\">&Agrave; propos de ce Certificat Professionnel</span>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nData Science has been ranked as one of the hottest professions and the demand for data practitioners is booming. This Professional Certificate from IBM is intended for anyone interested in developing skills and experience to pursue a <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">career in Data Science</span> or Machine Learning.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nThis program consists of 9 courses providing you with <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">latest job-ready skills</span> and techniques covering a wide array of data science topics including: open source tools and libraries, methodologies, Python, databases, SQL, data visualization, data analysis, and machine learning. You will practice hands-on in the IBM Cloud using real data science tools and real-world data sets.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nIt is a myth that to become a data scientist you need a Ph.D. This Professional Certificate is suitable for anyone who has some computer skills and a passion for self-learning. No prior computer science or programming knowledge is necessary. We start small, re-enforce applied learning, and build up to more complex topics.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nUpon successfully completing these courses you will have done several <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">hands-on assignments</span> and built a portfolio of data science projects to provide you with the confidence to plunge into an exciting profession in Data Science. In addition to earning a Professional Certificate from Coursera, you will also receive a <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">digital Badge from IBM</span> recognizing your proficiency in Data Science.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px; max-width: 935.9px; min-height: 20px;\">\r\nLIMITED TIME OFFER: Subscription is only $39 USD per month for access to graded materials and a certificate.</p>  \r\n<h2 style=\"box-sizing: border-box; font-size: 33.93px; font-weight: 400; line-height: 41.92px; margin: 0px 0px 24px; max-width: 696px; padding: 0px;\">								Suivez les cours</h2>\r\n<p style=\"box-sizing: border-box; font-size: 13.93px; line-height: 24px; margin: 0px 0px 16px; max-width: 696px;\">\r\nUn Programme de Certificat Professionnel est une s&eacute;rie de cours en ligne qui vous pr&eacute;pare &agrave; un m&eacute;tier. Certains Certificats Professionnels vous pr&eacute;parent &agrave; vous lancer dans une carri&egrave;re dans un domaine sp&eacute;cifique comme l&#39;assistance informatique, tandis que d&#39;autres vous aident &agrave; obtenir une certification professionnelle. Pour commencer, inscrivez-vous au programme ou choisissez un cours individuel par lequel vous souhaitez commencer. Lorsque vous vous abonnerez &agrave; un cours faisant partie d&#39;un Programme de Certificat Professionnel, vous serez automatiquement inscrit au programme complet. Il est possible de terminer seulement un cours&nbsp;: vous pouvez suspendre votre formation ou r&eacute;silier votre abonnement &agrave; tout moment. Acc&eacute;dez &agrave; votre tableau de bord de l&#39;&eacute;tudiant pour g&eacute;rer vos inscriptions aux cours et suivre vos progr&egrave;s.</p>\r\n<h2 style=\"box-sizing: border-box; font-size: 33.93px; font-weight: 400; line-height: 41.92px; margin: 0px 0px 24px; max-width: 696px; padding: 0px;\">\r\nObtenez le Certificat</h2>\r\n<p style=\"box-sizing: border-box; font-size: 13.93px; line-height: 24px; margin: 0px 0px 16px; max-width: 696px;\">\r\nLorsque vous aurez fini tous vos cours, vous recevrez un Certificat &eacute;lectronique partageable que vous pourrez ajouter &agrave; votre CV et &agrave; votre profil LinkedIn.</p>\r\n								\r\n', '2019-03-31', '2019-03-30', 1, '2019-03-12 22:47:26', 100000),
(6, 1, 'form2.jpg', 'Python Programming For Beginners', 'Python Programming For Beginners2', 'Understand the basics of domain investing.', 'Understand the basics of domain investing.2', '<h3 a=\"\" an=\"\" and=\"\" any=\"\" basics=\"\" buying=\"\" computer=\"\" course=\"\" cover=\"\" domain=\"\" domains=\"\" domains.=\"\" everything=\"\" exactly=\"\" experience=\"\" find=\"\" for=\"\" get=\"\" great=\"\" h3=\"\" have=\"\" helvetica=\"\" how=\"\" internet=\"\" investing=\"\" know=\"\" learn=\"\" li=\"\" making=\"\" money=\"\" need=\"\" of=\"\" online.=\"\" open=\"\" sans-serif=\"\" sell=\"\" selling=\"\" should=\"\" started=\"\" students=\"\" style=\"box-sizing: border-box; margin: 0px 0px 10px; font-weight: 500; line-height: 1.2; font-size: 1.375rem; color: rgb(41, 48, 59); font-family: \" t=\"\" take=\"\" the=\"\" them=\"\" this=\"\" to=\"\" ul=\"\" understand=\"\" will=\"\" willingness=\"\" with=\"\" work=\"\" you=\"\">\r\n	What You Will Learn?</h3>\r\n<ul open=\"\" style=\"box-sizing: border-box; margin-bottom: 1rem; margin-top: 0px; position: relative; color: rgb(33, 37, 41); font-family: \">\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Understand the basics of domain investing.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Buy domain names and sell them for profit (Step by step).</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Know how to evaluate a domain price.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Which domain names are worth more.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Find great domain names for a low price.</li>\r\n</ul>\r\n', '2013-03-05', '2019-03-15', 1, '2019-03-16 00:00:00', 2000),
(7, 1, 'form3.jpg', 'dsqdsqdsq', 'dsqdd', 'qsdsqd', 'sqdsq', '<p>\r\n	dsqdsq sqd sqdsqdsq dsdsdsqdsqds d sqdsdsqd sqdsqdsqdsqdsq dsqd sqdqs sqdsq</p>\r\n', '2019-03-01', '2019-03-31', 1, '2019-03-12 20:29:37', 30000),
(8, 1, 'manage.jpg', 'dsqdsqdsq', 'ddsd', 'dsqds', 'dsqdsq', '<p>\r\n	dsqdsdsqdsqdsqdsqds</p>\r\n', '2019-03-13', '0000-00-00', 1, '2019-03-12 20:57:20', 100000),
(9, 1, 'mini_magick20180109-4-nsdktu.jpg', 'Certificat professionnel en science', 'Certificate pro in Science', 'Booster votre carrière en Data Science avec un Master et l\'apprentissage du Python', 'Kickstart your Career in Data Science & ML. Master data science, learn Python & SQL, analyze & visualize data, build machine learning models', '<span class=\"H2_1pmnvep-o_O-weightNormal_s9jwp5-o_O-fontHeadline_1uu0gyz m-r-1\" data-reactid=\"229\" style=\"box-sizing: border-box; font-size: 33.93px; line-height: 41.92px; margin-right: 16px; vertical-align: middle;\">&Agrave; propos de ce Certificat Professionnel</span>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nData Science has been ranked as one of the hottest professions and the demand for data practitioners is booming. This Professional Certificate from IBM is intended for anyone interested in developing skills and experience to pursue a <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">career in Data Science</span> or Machine Learning.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nThis program consists of 9 courses providing you with <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">latest job-ready skills</span> and techniques covering a wide array of data science topics including: open source tools and libraries, methodologies, Python, databases, SQL, data visualization, data analysis, and machine learning. You will practice hands-on in the IBM Cloud using real data science tools and real-world data sets.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nIt is a myth that to become a data scientist you need a Ph.D. This Professional Certificate is suitable for anyone who has some computer skills and a passion for self-learning. No prior computer science or programming knowledge is necessary. We start small, re-enforce applied learning, and build up to more complex topics.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nUpon successfully completing these courses you will have done several <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">hands-on assignments</span> and built a portfolio of data science projects to provide you with the confidence to plunge into an exciting profession in Data Science. In addition to earning a Professional Certificate from Coursera, you will also receive a <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">digital Badge from IBM</span> recognizing your proficiency in Data Science.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px; max-width: 935.9px; min-height: 20px;\">\r\nLIMITED TIME OFFER: Subscription is only $39 USD per month for access to graded materials and a certificate.</p>  \r\n<h2 style=\"box-sizing: border-box; font-size: 33.93px; font-weight: 400; line-height: 41.92px; margin: 0px 0px 24px; max-width: 696px; padding: 0px;\">								Suivez les cours</h2>\r\n<p style=\"box-sizing: border-box; font-size: 13.93px; line-height: 24px; margin: 0px 0px 16px; max-width: 696px;\">\r\nUn Programme de Certificat Professionnel est une s&eacute;rie de cours en ligne qui vous pr&eacute;pare &agrave; un m&eacute;tier. Certains Certificats Professionnels vous pr&eacute;parent &agrave; vous lancer dans une carri&egrave;re dans un domaine sp&eacute;cifique comme l&#39;assistance informatique, tandis que d&#39;autres vous aident &agrave; obtenir une certification professionnelle. Pour commencer, inscrivez-vous au programme ou choisissez un cours individuel par lequel vous souhaitez commencer. Lorsque vous vous abonnerez &agrave; un cours faisant partie d&#39;un Programme de Certificat Professionnel, vous serez automatiquement inscrit au programme complet. Il est possible de terminer seulement un cours&nbsp;: vous pouvez suspendre votre formation ou r&eacute;silier votre abonnement &agrave; tout moment. Acc&eacute;dez &agrave; votre tableau de bord de l&#39;&eacute;tudiant pour g&eacute;rer vos inscriptions aux cours et suivre vos progr&egrave;s.</p>\r\n<h2 style=\"box-sizing: border-box; font-size: 33.93px; font-weight: 400; line-height: 41.92px; margin: 0px 0px 24px; max-width: 696px; padding: 0px;\">\r\nObtenez le Certificat</h2>\r\n<p style=\"box-sizing: border-box; font-size: 13.93px; line-height: 24px; margin: 0px 0px 16px; max-width: 696px;\">\r\nLorsque vous aurez fini tous vos cours, vous recevrez un Certificat &eacute;lectronique partageable que vous pourrez ajouter &agrave; votre CV et &agrave; votre profil LinkedIn.</p>\r\n								\r\n', '2019-03-31', '2019-03-30', 1, '2019-03-12 22:47:26', 100000),
(18, 1, 'alarm-clock.jpg', 'Python Programming For Beginners', 'Python Programming For Beginners2', 'Understand the basics of domain investing.', 'Understand the basics of domain investing.2', '<h3 a=\"\" an=\"\" and=\"\" any=\"\" basics=\"\" buying=\"\" computer=\"\" course=\"\" cover=\"\" domain=\"\" domains=\"\" domains.=\"\" everything=\"\" exactly=\"\" experience=\"\" find=\"\" for=\"\" get=\"\" great=\"\" h3=\"\" have=\"\" helvetica=\"\" how=\"\" internet=\"\" investing=\"\" know=\"\" learn=\"\" li=\"\" making=\"\" money=\"\" need=\"\" of=\"\" online.=\"\" open=\"\" sans-serif=\"\" sell=\"\" selling=\"\" should=\"\" started=\"\" students=\"\" style=\"box-sizing: border-box; margin: 0px 0px 10px; font-weight: 500; line-height: 1.2; font-size: 1.375rem; color: rgb(41, 48, 59); font-family: \" t=\"\" take=\"\" the=\"\" them=\"\" this=\"\" to=\"\" ul=\"\" understand=\"\" will=\"\" willingness=\"\" with=\"\" work=\"\" you=\"\">\r\n	What You Will Learn?</h3>\r\n<ul open=\"\" style=\"box-sizing: border-box; margin-bottom: 1rem; margin-top: 0px; position: relative; color: rgb(33, 37, 41); font-family: \">\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Understand the basics of domain investing.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Buy domain names and sell them for profit (Step by step).</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Know how to evaluate a domain price.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Which domain names are worth more.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Find great domain names for a low price.</li>\r\n</ul>\r\n', '2013-03-05', '2019-03-15', 1, '2019-03-16 00:00:00', 2000),
(19, 1, 'apple-clean-containers-205316.jpg', 'dsqdsqdsq', 'ddsd', 'dsqds', 'dsqdsq', '<p>dsqdsdsqdsqdsqdsqds</p>\r\n', '2019-03-13', '0000-00-00', 1, '2019-03-12 20:57:20', 100000),
(20, 1, 'serveur.jpg', 'administrateur système', 'System administration', 'Understand the basics of domain investing.', 'Understand the basics of domain investing.2', '<h3 a=\"\" an=\"\" and=\"\" any=\"\" basics=\"\" buying=\"\" computer=\"\" course=\"\" cover=\"\" domain=\"\" domains=\"\" domains.=\"\" everything=\"\" exactly=\"\" experience=\"\" find=\"\" for=\"\" get=\"\" great=\"\" h3=\"\" have=\"\" helvetica=\"\" how=\"\" internet=\"\" investing=\"\" know=\"\" learn=\"\" li=\"\" making=\"\" money=\"\" need=\"\" of=\"\" online.=\"\" open=\"\" sans-serif=\"\" sell=\"\" selling=\"\" should=\"\" started=\"\" students=\"\" style=\"box-sizing: border-box; margin: 0px 0px 10px; font-weight: 500; line-height: 1.2; font-size: 1.375rem; color: rgb(41, 48, 59); font-family: \" t=\"\" take=\"\" the=\"\" them=\"\" this=\"\" to=\"\" ul=\"\" understand=\"\" will=\"\" willingness=\"\" with=\"\" work=\"\" you=\"\">\r\n	What You Will Learn?</h3>\r\n<ul open=\"\" style=\"box-sizing: border-box; margin-bottom: 1rem; margin-top: 0px; position: relative; color: rgb(33, 37, 41); font-family: \">\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Understand the basics of domain investing.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Buy domain names and sell them for profit (Step by step).</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Know how to evaluate a domain price.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Which domain names are worth more.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Find great domain names for a low price.</li>\r\n</ul>\r\n', '2013-03-05', '2019-03-15', 1, '2019-03-16 00:00:00', 2000),
(21, 1, 'iStock-869155894-696x437.jpg', 'Certificat professionnel en science', 'Certificate pro in Science', 'Booster votre carrière en Data Science avec un Master et l\'apprentissage du Python', 'Kickstart your Career in Data Science & ML. Master data science, learn Python & SQL, analyze & visualize data, build machine learning models', '<span class=\"H2_1pmnvep-o_O-weightNormal_s9jwp5-o_O-fontHeadline_1uu0gyz m-r-1\" data-reactid=\"229\" style=\"box-sizing: border-box; font-size: 33.93px; line-height: 41.92px; margin-right: 16px; vertical-align: middle;\">&Agrave; propos de ce Certificat Professionnel</span>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nData Science has been ranked as one of the hottest professions and the demand for data practitioners is booming. This Professional Certificate from IBM is intended for anyone interested in developing skills and experience to pursue a <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">career in Data Science</span> or Machine Learning.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nThis program consists of 9 courses providing you with <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">latest job-ready skills</span> and techniques covering a wide array of data science topics including: open source tools and libraries, methodologies, Python, databases, SQL, data visualization, data analysis, and machine learning. You will practice hands-on in the IBM Cloud using real data science tools and real-world data sets.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nIt is a myth that to become a data scientist you need a Ph.D. This Professional Certificate is suitable for anyone who has some computer skills and a passion for self-learning. No prior computer science or programming knowledge is necessary. We start small, re-enforce applied learning, and build up to more complex topics.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px 0px 20px; max-width: 935.9px; min-height: 20px;\">\r\nUpon successfully completing these courses you will have done several <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">hands-on assignments</span> and built a portfolio of data science projects to provide you with the confidence to plunge into an exciting profession in Data Science. In addition to earning a Professional Certificate from Coursera, you will also receive a <span style=\"box-sizing: border-box; font-family: OpenSans-Bold,Arial,sans-serif; font-weight: 700;\">digital Badge from IBM</span> recognizing your proficiency in Data Science.</p>\r\n<p style=\"box-sizing: border-box; font-family: OpenSans, Arial, sans-serif; font-size: 14px; line-height: 21px; margin: 0px; max-width: 935.9px; min-height: 20px;\">\r\nLIMITED TIME OFFER: Subscription is only $39 USD per month for access to graded materials and a certificate.</p>  \r\n<h2 style=\"box-sizing: border-box; font-size: 33.93px; font-weight: 400; line-height: 41.92px; margin: 0px 0px 24px; max-width: 696px; padding: 0px;\">								Suivez les cours</h2>\r\n<p style=\"box-sizing: border-box; font-size: 13.93px; line-height: 24px; margin: 0px 0px 16px; max-width: 696px;\">\r\nUn Programme de Certificat Professionnel est une s&eacute;rie de cours en ligne qui vous pr&eacute;pare &agrave; un m&eacute;tier. Certains Certificats Professionnels vous pr&eacute;parent &agrave; vous lancer dans une carri&egrave;re dans un domaine sp&eacute;cifique comme l&#39;assistance informatique, tandis que d&#39;autres vous aident &agrave; obtenir une certification professionnelle. Pour commencer, inscrivez-vous au programme ou choisissez un cours individuel par lequel vous souhaitez commencer. Lorsque vous vous abonnerez &agrave; un cours faisant partie d&#39;un Programme de Certificat Professionnel, vous serez automatiquement inscrit au programme complet. Il est possible de terminer seulement un cours&nbsp;: vous pouvez suspendre votre formation ou r&eacute;silier votre abonnement &agrave; tout moment. Acc&eacute;dez &agrave; votre tableau de bord de l&#39;&eacute;tudiant pour g&eacute;rer vos inscriptions aux cours et suivre vos progr&egrave;s.</p>\r\n<h2 style=\"box-sizing: border-box; font-size: 33.93px; font-weight: 400; line-height: 41.92px; margin: 0px 0px 24px; max-width: 696px; padding: 0px;\">\r\nObtenez le Certificat</h2>\r\n<p style=\"box-sizing: border-box; font-size: 13.93px; line-height: 24px; margin: 0px 0px 16px; max-width: 696px;\">\r\nLorsque vous aurez fini tous vos cours, vous recevrez un Certificat &eacute;lectronique partageable que vous pourrez ajouter &agrave; votre CV et &agrave; votre profil LinkedIn.</p>\r\n								\r\n', '2019-03-31', '2019-03-30', 1, '2019-03-12 22:47:26', 100000),
(22, 1, 'pexels-photo-1153213.jpeg', 'Python Programming For Beginners', 'Python Programming For Beginners2', 'Understand the basics of domain investing.', 'Understand the basics of domain investing.2', '<h3 a=\"\" an=\"\" and=\"\" any=\"\" basics=\"\" buying=\"\" computer=\"\" course=\"\" cover=\"\" domain=\"\" domains=\"\" domains.=\"\" everything=\"\" exactly=\"\" experience=\"\" find=\"\" for=\"\" get=\"\" great=\"\" h3=\"\" have=\"\" helvetica=\"\" how=\"\" internet=\"\" investing=\"\" know=\"\" learn=\"\" li=\"\" making=\"\" money=\"\" need=\"\" of=\"\" online.=\"\" open=\"\" sans-serif=\"\" sell=\"\" selling=\"\" should=\"\" started=\"\" students=\"\" style=\"box-sizing: border-box; margin: 0px 0px 10px; font-weight: 500; line-height: 1.2; font-size: 1.375rem; color: rgb(41, 48, 59); font-family: \" t=\"\" take=\"\" the=\"\" them=\"\" this=\"\" to=\"\" ul=\"\" understand=\"\" will=\"\" willingness=\"\" with=\"\" work=\"\" you=\"\">\r\n	What You Will Learn?</h3>\r\n<ul open=\"\" style=\"box-sizing: border-box; margin-bottom: 1rem; margin-top: 0px; position: relative; color: rgb(33, 37, 41); font-family: \">\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Understand the basics of domain investing.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Buy domain names and sell them for profit (Step by step).</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Know how to evaluate a domain price.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Which domain names are worth more.</li>\r\n	<li helvetica=\"\" open=\"\" style=\"box-sizing: border-box; font-size: 0.9375rem; line-height: 1.43rem; color: rgb(41, 48, 59); margin-top: 0px; font-family: \">\r\n		Find great domain names for a low price.</li>\r\n</ul>\r\n', '2013-03-05', '2019-03-15', 1, '2019-03-16 00:00:00', 2000),
(23, 1, 'application-1.png', 'dsqdsqdsq', 'dsqdd', 'qsdsqd', 'sqdsq', '<p>\r\n	dsqdsq sqd sqdsqdsq dsdsdsqdsqds d sqdsdsqd sqdsqdsqdsqdsq dsqd sqdqs sqdsq</p>\r\n', '2019-03-01', '2019-03-31', 1, '2019-03-12 20:29:37', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `idLanguage` int(11) NOT NULL,
  `idCandidat` int(11) NOT NULL,
  `langue` varchar(25) NOT NULL,
  `parle` varchar(25) NOT NULL,
  `ecris` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`idLanguage`, `idCandidat`, `langue`, `parle`, `ecris`) VALUES
(3, 5, 'Français', 'Excellent', 'Excellent'),
(6, 5, 'Allemand', 'Bien', 'Non'),
(7, 5, 'Chinois', 'Passable', 'Passable');

-- --------------------------------------------------------

--
-- Table structure for table `metier`
--

CREATE TABLE `metier` (
  `idMetier` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metier`
--

INSERT INTO `metier` (`idMetier`, `code`, `nom`, `name`) VALUES
(1, 'ADM', 'Administration et gestion des entreprises', 'Administration and management of companies'),
(2, 'AUD', 'Audit', 'Audit'),
(3, 'CHA', 'Chaudronnerie', 'Boilerwork'),
(4, 'CHF', 'Chauffeur', 'Driver'),
(5, 'CIAL', 'Commercial/Marketing', ' Sales / Marketing'),
(6, 'CTA', 'Comptabilité/Administration/Finance', 'Accounting / Administration / Finance'),
(7, 'CNS', 'Consultat', 'consulate'),
(8, 'DIG', 'Digital', 'Digital'),
(9, 'ELT', 'Électronique', 'Electronic'),
(10, 'ENC', 'Encadrement', 'Framing'),
(11, 'ENS', 'Enseignement', 'Education'),
(12, '/', 'Autre', 'Another');

-- --------------------------------------------------------

--
-- Table structure for table `niveau_etude`
--

CREATE TABLE `niveau_etude` (
  `idNiveauEtude` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `niveau_etude`
--

INSERT INTO `niveau_etude` (`idNiveauEtude`, `nom`) VALUES
(1, 'BEPC'),
(2, 'Probatoire'),
(3, 'CAP'),
(4, 'BACC'),
(5, 'LICENCE'),
(6, 'MASTER'),
(7, 'PHD'),
(8, 'BTS'),
(9, 'BACC +2'),
(10, 'BACC +3'),
(11, 'BACC +4'),
(12, 'BACC +5'),
(13, 'Certification'),
(14, 'GCE O-LEVEL'),
(15, 'GCE A-LEVEL'),
(16, 'Diploma');

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

CREATE TABLE `offre` (
  `idOffre` int(11) NOT NULL,
  `idMetier` int(11) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `pays` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `ville` int(11) NOT NULL,
  `contrat` varchar(5) NOT NULL DEFAULT 'CDI',
  `poste` varchar(110) NOT NULL,
  `duree` tinyint(4) DEFAULT NULL,
  `nbPoste` int(11) NOT NULL,
  `nbPosteAttribue` int(11) NOT NULL DEFAULT 0,
  `datePublication` date NOT NULL,
  `dateDepot` date NOT NULL,
  `descriptionOffre` text DEFAULT NULL,
  `idNiveauEtude` int(11) DEFAULT NULL,
  `idTypeEducation` int(11) DEFAULT NULL,
  `experience` tinyint(4) DEFAULT NULL,
  `idSecteurActivite` int(11) DEFAULT NULL,
  `Freelance` tinyint(4) NOT NULL DEFAULT 1,
  `listCompetences` varchar(100) DEFAULT NULL,
  `descriptionProfil` text DEFAULT NULL,
  `idEmployeur` int(11) NOT NULL,
  `idSociete` int(11) NOT NULL,
  `motivationLetter` tinyint(1) NOT NULL DEFAULT 0,
  `dateCreation` date NOT NULL DEFAULT current_timestamp(),
  `valide` tinyint(4) NOT NULL DEFAULT 1,
  `finish` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offre`
--

INSERT INTO `offre` (`idOffre`, `idMetier`, `reference`, `pays`, `region`, `ville`, `contrat`, `poste`, `duree`, `nbPoste`, `nbPosteAttribue`, `datePublication`, `dateDepot`, `descriptionOffre`, `idNiveauEtude`, `idTypeEducation`, `experience`, `idSecteurActivite`, `Freelance`, `listCompetences`, `descriptionProfil`, `idEmployeur`, `idSociete`, `motivationLetter`, `dateCreation`, `valide`, `finish`) VALUES
(1, 5, 'CIAL/0001/190131', 1, 1, 2, 'CDD', 'jhkhjhkh', 5, 1, 0, '2019-01-01', '2019-01-21', '<p>sdfdsfs</p>', NULL, NULL, NULL, NULL, 1, '9,3', '<p>efddsf</p>', 1, 1, 0, '2019-01-31', 1, 0),
(2, 7, 'CNS/0005/190210', 1, 1, 2, 'CDD', 'Efficiance consulting', 51, 1, 0, '2019-01-30', '2019-03-22', '<p>T&acirc;ches &agrave; &eacute;ffectuer</p>', 10, 1, 6, 5, 0, '3', '<p>&nbsp;savoir &ecirc;tre,</p>', 1, 1, 0, '2019-01-31', 1, 0),
(3, 3, 'CHA/0003/190201', 1, 1, 2, 'CDI', 'brice FOKO', 0, 23, 0, '2018-10-02', '2019-02-28', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq... &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq.. <em><span style=\"color: rgb(243, 121, 52);\">.<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq&hellip;</strong> </span></em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq&hellip;</p>', 10, NULL, 4, 5, 1, '4,2,8', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq... &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq... &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq... &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq... </p>', 1, 1, 0, '2019-02-01', 1, 0),
(4, 3, 'CHA/0003/190201', 1, 1, 2, 'CDI', 'brice FOKO', 0, 23, 2, '2018-10-02', '2019-02-28', '<p><strong><span style=\"font-size: 30px;\">Tittre</span></strong></p><hr><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq... &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq.. <em><span style=\"color: rgb(243, 121, 52);\">.<strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq&hellip;</strong> </span></em>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq&hellip;</p>', 10, 3, 4, 5, 1, '4,2,8', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq... &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq... &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq... &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq...Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pretium nunc non justo placerat pulvinar. Vestibulum ac ullamcorper sapien, nec scelerisq... </p>', 1, 1, 0, '2019-02-01', 1, 0),
(5, 8, 'DIG/0008/190312', 1, 1, 7, 'CDI', 'Developpeur', 0, 19, 0, '2019-03-03', '2019-06-29', '<p>Finalement! Nous sommes la premi&egrave;re soci&eacute;t&eacute; d&#39;h&eacute;bergement Web gratuit qui vous donne acc&egrave;s &agrave; l&rsquo;installateur automatique. L&rsquo;installateur automatique est un syst&egrave;me con&ccedil;u pour rendre l&#39;installation de scripts populaires facile. Vous voulez am&eacute;liorer votre site web avec un forum ou une galerie en ligne? Maintenant vous pouvez! En quelques clics, votre site sera transform&eacute; en une ressource fantastique. Vous pouvez installer plus de 50 scripts populaires tels que WordPress, Drupal, Joomla, OS Commerce, Galerie de photos et d&#39;autres.</p>', 10, 12, 2, 5, 0, '', '<p>pas de profil &agrave; priori</p>', 1, 1, 0, '2019-03-03', 1, 0),
(6, 10, 'ENC/0006/190303', 1, 1, 3, 'CDD', 'Musicien', 30, 34, 0, '2019-01-02', '2019-08-31', '<p>Recherche d&#39;un Musicien pour mon &eacute;cole de Music &agrave; Paris</p>', 16, 4, 6, 0, 0, '5', '<p>Besoin d&#39;un Musicien qui a de l&#39;exp&eacute;rience et qui a d&eacute;j&agrave; fait ses preuves sur le plan professionel. Nous recherchons une personne de confiance avec de l&#39;exp&eacute;rience</p>', 1, 1, 0, '2019-03-03', 1, 0),
(7, 11, 'ENS/0007/190303', 1, 1, 1, 'CDI', 'musique', 0, 19, 0, '2018-10-09', '2019-11-22', '<p>Offre d&#39;emploi pour l&#39;enseignement de l&#39;art de la musique. Salaire n&eacute;gociable selon vos comp&eacute;tences. Dur&eacute;e ind&eacute;termin&eacute;r</p>', 5, 2, 7, 0, 0, '5,6', '<p>Nous recherchons des personnes qui ont de l&#39;exp&eacute;rience et qui ont fait des &eacute;tudes dans l&#39;art avec une ma&icirc;trise de l&#39;anglais</p>', 1, 1, 0, '2019-03-03', 1, 0),
(8, 1, '', 1, 4, 17, 'CDD', 'Fermier ', 45, 20, 0, '2010-03-10', '2019-03-16', '<p>\r\n	je recherche des personnes ayant de l&#39;exp&eacute;rience pour la pratique de l&#39;agriculture du mais et de l&#39;haricot</p>\r\n', 12, 12, NULL, NULL, 1, NULL, '<p>\r\n	pas de profil pr&eacute;cis exig&eacute;. juste connaitre les bases de l&#39;agriculture</p>\r\n', 19, 13, 0, '0000-00-00', 1, 0),
(9, 4, 'CHF/0002/190311', 1, 1, 17, 'CDD', 'Chauffeur', 2, 2, 0, '2019-03-01', '2019-03-31', '<p>\r\n	pas grand chose &agrave; dire</p>\r\n', 4, 4, NULL, NULL, 0, NULL, '<p>\r\n	&nbsp;</p>\r\n<p style=\"background-color: transparent; color: rgb(34, 34, 34); font-family: Arial,Verdana,sans-serif; font-size: 12px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px;\">\r\n	pas grand chose &agrave; dire</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 19, 13, 0, '2019-03-11', 1, 0),
(12, 8, 'DIG/0008/190312', 1, 1, 14, 'CDD', 'Front End developer', 58, 16, 0, '2014-07-01', '2019-03-31', '<p>besoin d&#39;un developpeur front-end&nbsp;</p>', 2, 5, 1, 5, 1, '5', '<p>pas de criteres tr&egrave;s pr&eacute;cis</p>', 1, 1, 0, '2019-03-12', 1, 0),
(13, 8, 'DIG/0002/190722', 1, 8, 27, 'CDI', 'Developpeur Laravel', 0, 22, 0, '2009-01-17', '2019-07-22', '<p>developpeur laravel&nbsp;</p><p>emplois pay&eacute; &agrave; 7000/hr</p><p>personnel qualifi&eacute;&nbsp;</p><p>emboche apr&egrave;s test</p>', 10, 5, 2, 11, 1, '7,9', '<p>Une personne motiv&eacute;, disponible et capable de s&#39;adapter sur des travaux d&eacute;j&agrave; en cours</p>', 20, 14, 1, '2019-07-22', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `passwordforget`
--

CREATE TABLE `passwordforget` (
  `id` int(11) NOT NULL,
  `key` varchar(512) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

CREATE TABLE `pays` (
  `idPays` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `nationalite` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `codeTel` int(5) NOT NULL,
  `nomCour` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pays`
--

INSERT INTO `pays` (`idPays`, `nom`, `nationalite`, `name`, `nationality`, `codeTel`, `nomCour`) VALUES
(1, 'Cameroun', 'Camerounaise', 'Cameroon', 'Camerounian', 237, 'CRM'),
(2, 'Nigéria', 'Nigérien', 'Nigeria', 'Nigerian', 233, 'NIG');

-- --------------------------------------------------------

--
-- Table structure for table `propriete`
--

CREATE TABLE `propriete` (
  `idPropriete` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propriete`
--

INSERT INTO `propriete` (`idPropriete`, `nom`, `name`) VALUES
(1, 'Entreprise individuelle', 'Sole Proprietorship'),
(2, 'Publique', 'Public'),
(3, 'Privée', 'Private'),
(4, 'Gouvernementale', 'Governmental'),
(5, 'Organisation non gouvernementale', 'Non Governmental Organization');

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `idRegion` int(11) NOT NULL,
  `idPays` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`idRegion`, `idPays`, `nom`, `name`) VALUES
(1, 1, 'Centre', 'Center'),
(2, 1, 'Ouest', 'West'),
(3, 1, 'Sud', 'South'),
(4, 1, 'Adamaoua', 'Adamawa'),
(5, 1, 'Nord Ouest', 'North West'),
(6, 1, 'Sud Ouest', 'South West'),
(7, 1, 'Est', 'East'),
(8, 1, 'Nord', 'North'),
(9, 1, 'Extrême Nord', 'Far North'),
(10, 1, 'Littoral', 'Littoral');

-- --------------------------------------------------------

--
-- Table structure for table `secteur_activite`
--

CREATE TABLE `secteur_activite` (
  `idSecteur` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `name` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secteur_activite`
--

INSERT INTO `secteur_activite` (`idSecteur`, `libelle`, `name`) VALUES
(1, 'Electronique', 'Electronics'),
(2, 'Santé et fitness', 'Health & Fitness'),
(3, 'Mode', 'Fashion'),
(4, 'Diffusion Télé/Radio', 'Broadcasting'),
(5, 'Banque/Services Financiers', 'Banking/Financial Services'),
(6, 'Consultants', 'Consultants'),
(7, 'Entroposage', 'Warehousing'),
(8, 'Emballage', 'Packaging'),
(9, 'Télécommunication/FAI', 'Telecommunication/ISP'),
(10, 'Fabrication', 'Manufacturing'),
(11, 'Assurance', 'Insurance'),
(12, 'Informatique', 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `societe`
--

CREATE TABLE `societe` (
  `idSociete` int(11) NOT NULL,
  `idEmployeur` int(11) NOT NULL,
  `idTaille` int(11) DEFAULT NULL,
  `idPropriete` int(11) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `logo` varchar(100) NOT NULL DEFAULT 'logo.png',
  `description` text DEFAULT NULL,
  `dateCreation` date DEFAULT current_timestamp(),
  `mail` varchar(100) DEFAULT NULL,
  `pays` int(11) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `ville` int(11) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `idSecteurActivite` int(11) DEFAULT NULL,
  `complete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `societe`
--

INSERT INTO `societe` (`idSociete`, `idEmployeur`, `idTaille`, `idPropriete`, `nom`, `logo`, `description`, `dateCreation`, `mail`, `pays`, `region`, `ville`, `adresse`, `telephone`, `idSecteurActivite`, `complete`) VALUES
(1, 1, 2, 2, 'My Company', '1-190201203509.jpg', '<p><strong><span style=\"font-family: Bariol-Bold,sans-serif;\">Description de notre soci&eacute;t&eacute; par ici</span></strong></p>', '2019-01-23', 'compagny@infos.com', 1, 1, 2, 'Derrière elise bar sis quartier nglonckack', '696460458', 5, 1),
(4, 7, 4, 4, 'GENI-LOC', 'logo.png', NULL, '2019-01-28', 'mail@yahoo.fr', 1, 1, 16, NULL, '696460458', 5, 1),
(13, 19, NULL, NULL, 'societe Test', 'logo.png', NULL, '2019-03-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, 20, 1, 1, 'societe01', 'logo.png', '<p>test employeur</p>', '2019-07-22', 'sc01@test.fr', 1, 10, 27, 'Derrière elise bar sis quartier nglonckack', '696460458', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `taille`
--

CREATE TABLE `taille` (
  `idTaille` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `taille`
--

INSERT INTO `taille` (`idTaille`, `nom`, `name`) VALUES
(1, 'PME', 'PME'),
(2, 'GE', 'GE'),
(3, 'TPE ', 'TPE '),
(4, 'ETI', 'ETI');

-- --------------------------------------------------------

--
-- Table structure for table `type_education`
--

CREATE TABLE `type_education` (
  `idTypeEducation` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_education`
--

INSERT INTO `type_education` (`idTypeEducation`, `nom`, `name`) VALUES
(1, 'SCIENCE', 'SCIENCE'),
(2, 'LETTRE', 'LETTER'),
(3, 'ECONOMIE', 'ECONOMY'),
(4, 'ART', 'ART'),
(5, 'INFORMATIQUE', 'SCIENCE COMPUTER'),
(6, 'MATHEMATIQUE', 'MATHEMATIC'),
(7, 'PHYSIQUE', 'PHYSIC'),
(8, 'CHIMIE', 'CHEMISTRY'),
(9, 'LANGUE', 'LANGUAGE'),
(10, 'RESEAUX', 'NETWORKS'),
(11, 'CLOUD COMPUTING', 'CLOUD COMPUTING'),
(12, 'ELECTRICITE', 'ELECTRICITY'),
(13, 'MENUSERIE', 'CARPENTRY'),
(14, 'MAÇONNERIE', 'MASONRY'),
(15, 'GÉNIE LOGICIEL', 'SOFTWARE ENGINEERING'),
(16, 'SECURITE', 'SECURITY'),
(17, 'FINANCE', 'FINANCE'),
(18, 'EDUCATION', 'EDUCATION'),
(19, 'PHILOSOPHIE', 'PHILOSOPHY'),
(20, 'PSYCHOLOGIE', 'PSYCHOLOGY');

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `idVille` int(11) NOT NULL,
  `idRegion` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`idVille`, `idRegion`, `nom`) VALUES
(1, 4, 'Banyo'),
(2, 4, 'Meiganga'),
(3, 4, 'Ngaoundere'),
(4, 4, 'Tibati'),
(5, 4, 'Tignere'),
(6, 1, 'Akonolinga'),
(7, 1, 'Bafia'),
(8, 1, 'Eseka'),
(9, 1, 'Mbalmayo'),
(10, 1, 'Mfou'),
(11, 1, 'Monatele'),
(12, 1, 'Nanga Eboko'),
(13, 1, 'Obala'),
(14, 1, 'Ombesa'),
(15, 1, 'Saa'),
(16, 1, 'Yaounde'),
(17, 7, 'Abong Mbang'),
(18, 7, 'Batouri'),
(19, 7, 'Bertoua'),
(20, 7, 'Betare Oya'),
(21, 7, 'Djoum'),
(22, 7, 'Doume'),
(23, 7, 'Lomie'),
(24, 7, 'Yokadouma'),
(25, 10, 'Bonaberi'),
(26, 10, 'Dibombari'),
(27, 10, 'Douala'),
(28, 10, 'Edea'),
(29, 10, 'Loum'),
(30, 10, 'Manjo'),
(31, 10, 'Mbanga'),
(32, 10, 'Nkongsamba'),
(33, 10, 'Yabassi'),
(34, 8, 'Figuif'),
(35, 8, 'Garoua'),
(36, 8, 'Guider'),
(37, 8, 'Lagdo'),
(38, 8, 'Poli'),
(39, 8, 'Rey Bouba'),
(40, 8, 'Tchollire'),
(41, 9, 'Figuif'),
(42, 9, 'Garoua'),
(43, 9, 'Guider'),
(44, 9, 'Lagdo'),
(45, 9, 'Poli'),
(46, 9, 'Rey Bouba'),
(47, 9, 'Tchollire'),
(48, 5, 'Bamenda'),
(49, 5, 'Kumbo'),
(50, 5, 'Mbengwi'),
(51, 5, 'Mme'),
(52, 5, 'Njinikom'),
(53, 5, 'Nkambe'),
(54, 5, 'Wum'),
(55, 2, 'Bafang'),
(56, 2, 'Bafoussam'),
(57, 2, 'Bafut'),
(58, 2, 'Bali'),
(59, 2, 'Bana'),
(60, 2, 'Bangangte'),
(61, 2, 'Djang'),
(62, 2, 'Fontem'),
(63, 2, 'Foumban'),
(64, 2, 'Foumbot'),
(65, 2, 'Mbouda'),
(66, 3, 'Akom'),
(67, 3, 'Ambam'),
(68, 3, 'Ebolowa'),
(69, 3, 'Kribi'),
(70, 3, 'Lolodorf'),
(71, 3, 'Moloundou'),
(72, 3, 'Mvangue'),
(73, 3, 'Sangmelima'),
(74, 6, 'Buea'),
(75, 6, 'Idenao'),
(76, 6, 'Kumba'),
(77, 6, 'Limbe'),
(78, 6, 'Mamfe'),
(79, 6, 'Muyuka'),
(80, 6, 'Tiko');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `candidat`
--
ALTER TABLE `candidat`
  ADD PRIMARY KEY (`idCandidat`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`idCompetence`);

--
-- Indexes for table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`idDemande`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`idEducation`);

--
-- Indexes for table `employeur`
--
ALTER TABLE `employeur`
  ADD PRIMARY KEY (`idEmployeur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`idExperience`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idFormation`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`idLanguage`);

--
-- Indexes for table `metier`
--
ALTER TABLE `metier`
  ADD PRIMARY KEY (`idMetier`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `niveau_etude`
--
ALTER TABLE `niveau_etude`
  ADD PRIMARY KEY (`idNiveauEtude`);

--
-- Indexes for table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`idOffre`);

--
-- Indexes for table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`idPays`);

--
-- Indexes for table `propriete`
--
ALTER TABLE `propriete`
  ADD PRIMARY KEY (`idPropriete`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`idRegion`),
  ADD KEY `idPays` (`idPays`);

--
-- Indexes for table `secteur_activite`
--
ALTER TABLE `secteur_activite`
  ADD PRIMARY KEY (`idSecteur`);

--
-- Indexes for table `societe`
--
ALTER TABLE `societe`
  ADD PRIMARY KEY (`idSociete`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD KEY `secteurActivite` (`idSecteurActivite`);

--
-- Indexes for table `taille`
--
ALTER TABLE `taille`
  ADD PRIMARY KEY (`idTaille`);

--
-- Indexes for table `type_education`
--
ALTER TABLE `type_education`
  ADD PRIMARY KEY (`idTypeEducation`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`idVille`),
  ADD KEY `idRegion` (`idRegion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidat`
--
ALTER TABLE `candidat`
  MODIFY `idCandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `competence`
--
ALTER TABLE `competence`
  MODIFY `idCompetence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `demande`
--
ALTER TABLE `demande`
  MODIFY `idDemande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `idEducation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employeur`
--
ALTER TABLE `employeur`
  MODIFY `idEmployeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `idExperience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFormation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `idLanguage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metier`
--
ALTER TABLE `metier`
  MODIFY `idMetier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `niveau_etude`
--
ALTER TABLE `niveau_etude`
  MODIFY `idNiveauEtude` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `offre`
--
ALTER TABLE `offre`
  MODIFY `idOffre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pays`
--
ALTER TABLE `pays`
  MODIFY `idPays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `propriete`
--
ALTER TABLE `propriete`
  MODIFY `idPropriete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `idRegion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `secteur_activite`
--
ALTER TABLE `secteur_activite`
  MODIFY `idSecteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `societe`
--
ALTER TABLE `societe`
  MODIFY `idSociete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `taille`
--
ALTER TABLE `taille`
  MODIFY `idTaille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type_education`
--
ALTER TABLE `type_education`
  MODIFY `idTypeEducation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ville`
--
ALTER TABLE `ville`
  MODIFY `idVille` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`idPays`) REFERENCES `pays` (`idPays`);

--
-- Constraints for table `societe`
--
ALTER TABLE `societe`
  ADD CONSTRAINT `societe_ibfk_1` FOREIGN KEY (`idSecteurActivite`) REFERENCES `secteur_activite` (`idSecteur`);

--
-- Constraints for table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`idRegion`) REFERENCES `region` (`idRegion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
