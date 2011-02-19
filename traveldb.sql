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
('England', 'London', 'constitutional monarchy', 'pound sterling',  51446000, 130395, 'English', 'Christianity', 'england_map.jpg', 'england_flag.bmp', 'england_coa.bmp', 'http://enjoyengland.com/'),
('Mexico', 'Mexico City', 'federal presidential constitutional republic', 'peso',  112322757, 1972550, 'Spanish', 'Roman Catholicism', 'mexico_map.bmp', 'mexico_flag.bmp', 'mexico_coa.bmp', 'http://www.visitmexico.com/'),
('Germany', 'Berlin', 'Federal Parliamentary Republic', 'euro', 81757600, 357021, 'German', 'Christianity', 'germany_map.jpg', 'germany_flag.jpg', 'germany_coa.jpg', 'http://www.germany-tourism.de/'),
('People''s Republic of China',	'Beijing', 'single party-led state', 'Chinese yuan', 1338612968, 9640821, 'Putonghua', 'Buddhism, Taoism', 'china_map.png', 'china_flag.png', 'china_emblem.png', 'n/a'),
('Spain', 'Madrid', 'Parliamentary democracy and Constitutional monarchy', 'euro', 46030109, 504030, 'Spanish', 'Catholicism', 'spain_map.jpg', 'spain_flag.jpg', 'spain_coa.jpg', 'http://www.spain.info/'),
('Turkey', 'Ankara', 'Parliamentary Republic', 'Turkish lira', 73722988, 783562, 'Turkish', 'Islam', 'turkey_map.jpg', 'turkey_flag.jpg', 'No coat of arms', 'http://www.tourismturkey.org/'),
('United States of America', 'Washington, D.C.', 'federal presidential constitutional republic', 'United States dollar', 308745538, 9826675, 'English',	'Christianity', 'usa_map.png', 'usa_flag.svg', 'usa_seal.png', 'n/a')

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
('London', 1, 'London', 7556900, 'london_map.jpg', 'n/a', 'n/a', 'http://www.cityoflondon.gov.uk/' ),
('Bath', 1, 'South West', 83992, 'bath_map.jpg', 'n/a', 'n/a', 'http://www.cityofbath.co.uk/' ),
('Mexico City', 2, 'Federal District', 8846752, 'mexicoCity_map.bmp', 'mexicoCity_flag.png', 'mexicoCity_coa.png', 'http://www.df.gob.mx/index.jsp' ),
('Cancun', 2, 'Quintana Roo', 562973, 'cancun2_map.jpg', 'n/a', 'cancun_coa.png', 'http://www.cancun.com/' ),
('Berlin', 3, 'Berlin', 3440441, 'berlin_pic.jpg', 'berlin_flag.jpg', 'berlin_coa.jpg', 'http://www.visitberlin.de/en'),
('Munich', 3, 'Bavaria', 1330440, 'munich_pic.jpg', 'munich_flag.jpg', 'munich_coa.jpg', 'http://www.muenchen.de/home/60093/Homepage.html'),
('Beijing', 4, 'northern china', 22000000, 'beijing_map.jpg',	'n/a',	'n/a', 'www.beijing.gov.cn'),
('Shanghai', 4, 'eastern China', 19210000, 'shanghai_map.png', 'n/a',	'n/a', 'www.shanghai.gov.cn'),
('Madrid', 5, 'Community of Madrid', 3255950, 'madrid_pic.jpg', 'madrid_flag.jpg', 'madrid_coa.jpg', 'http://www.aboutmadrid.com/'),
('Barcelona', 5, 'Catalonia', 1621537, 'barcelona_pic.jpg', 'barcelona_flag.jpg', 'barcelona_coa.jpg', 'http://www.aboutbarcelona.com/'),
('Ankara', 6, 'Central Anatolia', 4306105, 'ankara_pic.jpg', 'none', 'ankara_coa.jpg', 'http://ankara.com/'),
('Istanbul', 6, 'Marmara', 13120596, 'istanbul_pic.jpg', 'none', 'istanbul_coa.jpg', 'http://english.istanbul.com/'),
('District of Columbia', 7,	'Washington, D.C.; between Virginia and Maryland', 601723, 'dc_map.jpg', 'dc_flag.svg', 'dc_seal.png', 'www.dc.gov'),
('New York', 7, 'New York', 8391881, 'ny_map.png', 'ny_flag.svg', 'ny_seal.png', 'www.nyc.gov')

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
Closed Christmas Day', 'Y', 'http://www.londoneye.com',  'LondonEye1.jpg'),
('British Museum',  1, 'museum', 'Founded in 1753 by Act of Parliament, from the collections of Sir Hans Sloane, the British Museum is one of the great museums of the world, showing the works of man from prehistoric to modern times with collections drawn from the whole world. Famous objects include the Rosetta Stone, sculptures from the Parthenon, the Sutton Hoo and Mildenhall treasures and the Portland Vase. There is also a program of special exhibitions and daily gallery tours, talks and guided tours.',  'Great Russel Street, London WC1B 3DG', 'Open daily 10.00 - 17.30. Selected galleries are open late on Thursdays and Fridays until 20.30.', 'N', 'http://www.britishmuseum.org', 'britishMuseum.jpg'),
('Roman Baths', 2, 'other', 'The Roman Baths complex is a site of historical interest in the English city of Bath. The house is a well-preserved Roman site for public bathing.  The Roman Baths themselves are below the modern street level. There are four main features: the Sacred Spring, the Roman Temple, the Roman Bath House and the Museum holding finds from Roman Bath. ',  'The Roman Baths, Abbey Church Yard Bath, BA1 1LZ' , 'The Roman Baths is open daily apart from 25 and 26 December, at the following times. January - February 0930 - 1630, exit 1730 March - June 0900 - 1700 - exit 1800 July - August 0900 - 2100 - exit 2200 September - October 0900 - 1700 - exit 1800 November - December 0930 - 1630 - exit 1730', 
 'Y', 'http://www.romanbaths.co.uk/', 'romanBath.jpg'),
('Jane Austen Centre', 2, 'museum', 'The Jane Austen Centre offers a snapshot of life during Regency times and explores how living in this magnificent city affected Jane Austen''s life and writing. Live Guides, costume, film, superb giftshop and an authentic period atmosphere await you at this premier attraction.', '40 Gay Street',  'April to October: 9:45am - 5.30pm everyday. Late opening July and August - Thursday to Saturday until 7pm November to March: Sun - Fri 11am - 4.30pm Sat 9:45am - 5.30pm Closed Christmas and New Year.', 'Y', 'http://visitbath.co.uk/site/things-to-do/attractions/the-jane-austen-centre-p26121', 'JaneAustenCentre.jpg'),
('Teotihuacan', 3, 'other', 'Teotihuacan is an enormous archaeological site in the Basin of Mexico, containing some of the largest pyramidal structures built in the pre-Columbian Americas.  The city was thought to have been established around 200 BCE, lasting until its fall sometime between the 7th and 8th centuries CE.', 'n/a','n/a', 'N', 'n/a', 'teotihuacan.jpg'),
('National Anthropological Museum', 3, 'museum', 'The museum contains significant archaeological and anthropological artifacts from the pre-Columbian heritage of Mexico, such as the Piedra del Sol and the 16th-century Aztec statue of Xochipilli.', 'Av. Paseo de la Reforma y calzada Gandhi s/n Col. Chapultepec Polanco, Delegacion Miguel Hidalgo C.P. 11560. Mexico, D.F.', 'From Tuesday to Sunday from 9:00 to 19:00 hrs. Closed Mondays. ', 'Y', 'http://www.gobiernodigital.inah.gob.mx/mener/index.php?id=33', 'anthroMuseum.jpg'),
('Chichen Itza', 4, 'other', 'Founded in 495 AD, Chichen Itza has columned structures and warrior images, is reminiscent of ancient Rome.', 'n/a', 'n/a', 'N', 'http://allaboutcancun.com/activities/side-trips/chichen-itza/', 'chichenitza.jpg'),
('Dolphin Discovery', 4, 'other', 'It''s  the best place to swim with dolphins in Cancun.  In Dolphin Discovery, people of all ages and concerned dolphin lovers are provided the opportunity to make their dreams come true.', 'Camino Sac Bajo Lote 26 (antes 96 al 102) Fraccionamiento Para�so Laguna Mar Isla Mujeres-Quintana Roo. C.P. 77400', 'Open every day from 9:00 am to 5:00 pm', 'Y', 'http://www.dolphindiscovery.com/', 'dolphinDiscovery.jpg'),
('Great Wall of China', 4, 'other', 'The Great Wall of China is a combination of stone and earthen fortifications located in northern China that was originally built to protect the Chinese Empire''s northern borders from invasion.', 'Common tourist sites in Beijing, but it stretches from Shanhaiguan in the east, to Lop Nur in the west', 'varies by wall section', 'Y', 'n/a', 'great_wall.jpg'),
('American Museum of Natural History', 8, 'museum', 'This museum located in Manhattan is one of the largest in the world, consisting of twenty-five interconnected buildings with fourty-six permanent exhibition halls, collections containing over 32 million specimens, research laboratories, and its library.', 'American Museum of Natural History, Central Park West at 79th Street, New York, NY 10024-5192', 'daily, 10:00 a.m.—5:45 p.m.; The Museum is closed Thanksgiving and Christmas.', 'Y',	'http://www.amnh.org/', 'amer_muse_of_nat_hist.jpg')


;

