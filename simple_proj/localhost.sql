-- 
-- Host: localhost
-- Generation Time: Jan 15, 2014 at 01:45 PM
-- 
-- PHP Version: 5.4.12


--
-- Database: `colors_votes`
--
CREATE DATABASE IF NOT EXISTS `colors_votes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `colors_votes`;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `idColors` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `color_name` text,
  PRIMARY KEY (`idColors`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`idColors`, `color_name`) VALUES
(16, 'Red'),
(17, 'Red'),
(18, 'Orange'),
(19, 'Yellow'),
(20, 'Green'),
(21, 'Blue'),
(22, 'Indigo'),
(23, 'Violet');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `idVotes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `City` text,
  `Votes` int(10) unsigned DEFAULT NULL,
  `Color` text,
  PRIMARY KEY (`idVotes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`idVotes`, `City`, `Votes`, `Color`) VALUES
(1, 'Anchorage', 10000, 'Blue'),
(2, 'Anchorage', 10000, 'Blue'),
(3, 'Anchorage', 15000, 'Yellow'),
(4, 'Brooklyn', 100000, 'Red');

