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
  `name` varchar(50) NOT NULL default '',
  `capital` varchar(50) NOT NULL default '',
  `government` varchar(50) NOT NULL default '',
  `currency` varchar(50) NOT NULL default '',
  `population` int(11) NOT NULL default '0',
  `area` int(11) NOT NULL default '0',
  `official_language` varchar(50) NOT NULL default '',
  `religion` varchar (50) NOT NULL default '',
  `country_map` varchar(50) NOT NULL default 'default_map.jpg',
  `flag` varchar(50) NOT NULL default 'default_flag.jpg',
  `coat_of_arms` varchar(50) NOT NULL default 'default_coa.jpg',
  `website` varchar(100) NOT NULL default '',
  PRIMARY KEY (`country_id`)
);

--
-- Dumping data for table `countries`
--

INSERT INTO `traveldb`.`countries` (`name`, `capital`, `government`, `currency`,  `population`, `area`, `official_language`, `religion`, `country_map`, `flag`, `coat_of_arms`, `website`) VALUES
('England', 'London', 'constitutional monarchy', 'pound sterling',  51446000, 130395, 'English', 'Christianity', 'england_map.jpg', 'england_flag.bmp', 'england_coa.bmp', 'http://enjoyengland.com'),
('Mexico', 'Mexico City', 'constitutional republic', 'peso',  112322757, 1972550, 'Spanish', 'Roman Catholicism', 'mexico_map.bmp', 'mexico_flag.bmp', 'mexico_coa.bmp', 'n/a')



;



-- --------------------------------------------------------


--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `traveldb`.`cities` (
  `city_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL default '',
  `country_id` smallint(6) NOT NULL default '0',
  `region` varchar(50) NOT NULL default '',
  `population` int(11) NOT NULL default '0',
  `city_map` varchar(50) NOT NULL default 'default_city_map.jpg',
  `flag` varchar(50) NOT NULL default 'default_city_flag.jpg',
  `coat_of_arms` varchar(50) NOT NULL default 'default_city_coa.jpg',
  `website` varchar(100) NOT NULL default '',
  PRIMARY KEY (`city_id`)
); 

--
-- Dumping data for table `cities`
--

INSERT INTO `traveldb`.`cities` (`name`, `country_id`, `region`, `population`, `city_map`, `flag`, `coat_of_arms`,  `website` ) VALUES 
('London', 1, 'London', 7556900, 'london_map.jpg', 'n/a', 'n/a', 'http://www.cityoflondon.gov.uk' )

;

-- --------------------------------------------------------


--
-- Table structure for table `attractions`
--


CREATE TABLE IF NOT EXISTS `traveldb`.`attractions` (
  `attraction_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL default '',
  `city_id` smallint(6) NOT NULL default '0',
  `attraction_type` enum('museum', 'monument', 'natural landmark', 'religious building', 'palace or castle', 'garden or park', 'other') NOT NULL default 'other',
  `description` blob NOT NULL default '',
  `address` varchar(100) NOT NULL default '',
  `hours_of_operation` blob NOT NULL default '',
  `entrance_price` enum('Y', 'N') NOT NULL default 'Y',
  `website` varchar(100) NOT NULL default '',
  `picture` varchar(50) NOT NULL default 'default_attraction_pic.jpg',
  PRIMARY KEY (`attraction_id`)
); 

--
-- Dumping data for table `attractions`
--

INSERT INTO `traveldb`.`attractions` (`name`, `city_id`, `attraction_type`, `description`, `address`, `hours_of_operation`, `entrance_price`, `website`, `picture`) VALUES 
('London Eye', 1, 'other', 'It is a giant 135-metre (443 ft) tall Ferris wheel situated on the banks of the River Thames in the British capital.  It is the tallest Ferris wheel in Europe and the most popular paid tourist attraction in the United Kingdom.', 'Riverside Building, County Hall, Westminster Bridge Road, London SE1 7PB', 'Winter Oct-May: 10.00am - 8.00pm Daily. Summer: June - September 10.00am - 9.00pm Daily.
Closed Christmas Day', 'Y', 'http://www.londoneye.com',  'LondonEye1.jpg')

;

