DROP DATABASE IF EXISTS traveldb;

CREATE DATABASE IF NOT EXISTS traveldb;
GRANT ALL PRIVILEGES ON traveldb.* to 'traveluser'@'localhost' identified by 'travel';
--
-- 
--
USE traveldb;

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `traveldb`.`countries` (
  `country_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  
  PRIMARY KEY ('country_id')
);

--
-- Dumping data for table `countries`
--

INSERT INTO `traveldb`.`countries` (`name`, ) VALUES




-- --------------------------------------------------------


--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `traveldb`.`cities` (
  `city_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `country_id` smallint(6) NOT NULL,

  PRIMARY KEY (`city_id`)
); 

--
-- Dumping data for table `cities`
--

INSERT INTO `traveldb`.`cities` (`name`, `country_id`,  ) VALUES 



-- --------------------------------------------------------


--
-- Table structure for table `attractions`
--


CREATE TABLE IF NOT EXISTS `traveldb`.`attractions` (
  `attraction_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `city_id` smallint(6) NOT NULL AUTO_INCREMENT,

  PRIMARY KEY (`city_id`)
); 

--
-- Dumping data for table `attractions`
--

INSERT INTO `traveldb`.`attractions` (`name`, `city_id`,  ) VALUES 


