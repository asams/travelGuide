<?php
if(isset($_POST['create']))
{
$root = $_POST['root'];
$pw = $_POST['pw'];
$db = mysqli_connect('localhost',$root,$pw);
if(!$db)
die('Connect Error, did you enter the right information?');
mysqli_query($db,"DROP DATABASE IF EXISTS traveldb;");
mysqli_query($db,"CREATE DATABASE IF NOT EXISTS traveldb;");

mysqli_query($db,"CREATE USER 'travel'@'localhost' IDENTIFIED BY 'travelpass'");
mysqli_query($db,"GRANT ALL PRIVILEGES ON traveldb.* to 'traveluser'@'localhost' identified by 'travel';");
mysqli_query($db,"USE traveldb;");

//--
//-- 
//--


//--
//-- Table structure for table `countries`
//--


mysqli_query($db, "CREATE TABLE IF NOT EXISTS `traveldb`.`countries` (
  `country_id` smallint(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `country_name` varchar(50) NOT NULL default '',
  `country_capital` varchar(50) NOT NULL default ' ',
  `country_government` varchar(50) NOT NULL default '',
  `country_currency` varchar(50) NOT NULL default '',
  `country_population` int(11) NOT NULL default '0',
  `country_area` int(11) NOT NULL default '0',
  `country_official_language` varchar(50) NOT NULL default '',
  `country_religion` varchar (50) NOT NULL default '',
  `country_map` varchar(50) NOT NULL default 'default_map.jpg',
  `country_flag` varchar(50) NOT NULL default 'default_flag.jpg',
  `country_coat_of_arms` varchar(50) NOT NULL default 'default_coa.jpg',
  `country_website` varchar(100) NOT NULL default '',
  `country_anthem` varchar(100) NOT NULL default '',

  INDEX( `country_name`)
)");

//--
//-- Dumping data for table `countries`
//--

mysqli_query($db, "INSERT INTO `traveldb`.`countries` (`country_name`, `country_capital`, `country_government`, `country_currency`,  `country_population`, `country_area`, `country_official_language`, `country_religion`, `country_map`, `country_flag`, `country_coat_of_arms`, `country_website`, `country_anthem`) VALUES
('England', 'London', 'constitutional monarchy', 'pound sterling',  51446000, 130395, 'English', 'Christianity', 'englandImages/england_map.jpg', 'englandImages/england_flag.gif', 'englandImages/england_coa.bmp', 'http://enjoyengland.com/', 'anthems/england.mp3'),
('Mexico', 'Mexico City', 'federal presidential constitutional republic', 'peso',  112322757, 1972550, 'Spanish', 'Roman Catholicism', 'mexicoImages/mexico_map.bmp', 'mexicoImages/mexico_flag.bmp', 'mexicoImages/mexico_coa.bmp', 'http://www.visitmexico.com/', 'anthems/mexico.mp3'),
('Germany', 'Berlin', 'Federal Parliamentary Republic', 'euro', 81757600, 357021, 'German', 'Christianity', 'germanyImages/germany_map.jpg', 'germanyImages/germany_flag.jpg', 'germanyImages/germany_coa.jpg', 'http://www.germany-tourism.de/', 'anthems/germany.mp3'),
('People''s Republic of China',	'Beijing', 'single party-led state', 'Chinese yuan', 1338612968, 9640821, 'Putonghua', 'Buddhism, Taoism', 'chinaImages/china_map.png', 'chinaImages/china_flag.png', 'chinaImages/china_emblem.png', 'N/A', 'anthems/china.mp3'),
('Spain', 'Madrid', 'Parliamentary democracy and Constitutional monarchy', 'euro', 46030109, 504030, 'Spanish', 'Catholicism', 'spainImages/spain_map.jpg', 'spainImages/spain_flag.jpg', 'spainImages/spain_coa.jpg', 'http://www.spain.info/', 'anthems/spain.mp3'),
('Turkey', 'Ankara', 'Parliamentary Republic', 'Turkish lira', 73722988, 783562, 'Turkish', 'Islam', 'turkeyImages/turkey_map.jpg', 'turkeyImages/turkey_flag.jpg', 'N/A', 'http://www.tourismturkey.org/', 'anthems/turkey.mp3'),
('United States of America', 'Washington, D.C.', 'federal presidential constitutional republic', 'United States dollar', 308745538, 9826675, 'English',	'Christianity', 'usaImages/usa_map.png', 'usaImages/usa_flag.jpg', 'usaImages/usa_seal.png', 'N/A', 'anthems/usa.mp3'),
('France', 'Paris', 'Unitary Semi-Presidential Republic', 'Euro', 65821885, 674843, 'French', 'Secular', 'franceImages/france_map.gif', 'franceImages/france_flag.jpg', 'franceImages/france_coa.png', 'http://us.franceguide.com/', 'anthems/france.mp3'),
('Italy', 'Rome', 'Unitary Parliamentary Republic', 'Euro', 60418711, 301338, 'Italian', 'Catholic', 'italyImages/italy_map.jpg', 'italyImages/italy_flag.gif', 'italyImages/italy_coa.jpg', 'http://www.italia.it/en/home.html', 'anthems/italy.mp3'),
('Malaysia', 'Kuala Lumpur', 'Federal Constitutional Elective Monarchy and Federal Parliamentary Democracy', 'Ringgit', 27565821, 329847, 'Bahasa Malaysia', 'Islam', 'malaysiaImages/malaysia_map.jpg', 'malaysiaImages/malaysia_flag.png', 'malaysiaImages/malaysia_coa.jpg', 'http://www.tourism.gov.my/corporate/', 'anthems/malaysia.mp3'),
('Australia', 'Canberra', 'Federal parliamentary democracy and constitutional monarchy', 'Australian dollar', 22572995, 7617930, 'none', 'Christianity', 'australiaImages/australia_map.jpg', 'australiaImages/australia_flag.png', 'australiaImages/australia_coa.png', 'http://www.australia.com', 'anthems/australia.mp3'),
('Japan', 'Tokyo', 'Unitary parliamentary democracy and constitutional monarchy', 'Yen', 127360000, 377944, 'Japanese', 'Buddhism, Shintoism', 'japanImages/japan_map.gif', 'japanImages/japan_flag.gif', 'japanImages/japan_coa.jpg', 'http://www.jnto.go.jp/eng/', 'anthems/japan.mp3'),
('Scotland', 'Edinburgh', 'Devolved Government within a Constitutional monarchy', 'Pound sterling', 5194000, 78772, 'English', 'Christianity', 'scotlandImages/scotland_map.jpg', 'scotlandImages/scotland_flag.jpg', 'scotlandImages/scotland_coa.jpg', 'http://www.visitscotland.com/', 'anthems/scotland.mp3'),
('New Zealand', 'Wellington', 'Parliamentary democracy and Constitutional monarchy', 'New Zealand dollar (NZD)', 4393500, 268021, 'English', 'Christianity', 'newZealandImages/new_zealand_map.jpg', 'newZealandImages/new_zealand_flag.png', 'newZealandImages/new_zealand_coat_of_arms.png',	'http://newzealand.govt.nz/', 'anthems/newZealand.mp3'),
('Austria', 'Vienna', 'Federal Parliamentary Republic', 'Euro', 8356707, 83855, 'German', 'Roman Catholic', 'austriaImages/austria_map.jpg', 'austriaImages/austria_flag.jpg', 'austriaImages/austria_coa.jpg', 'http://www.austria.info/us', 'anthems/austria.mp3')
");




//-- --------------------------------------------------------


//--
//-- Table structure for table `cities`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS `traveldb`.`cities` (
  `city_id` smallint(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `city_name` varchar(50) NOT NULL default '',
  `country_id` smallint(6) NOT NULL default '0',
  `city_region` varchar(50) NOT NULL default '',
  `city_population` int(11) NOT NULL default '0',
  `city_map` varchar(50) NOT NULL default 'default_city_map.jpg',
  `city_flag` varchar(50) NOT NULL default 'default_city_flag.jpg',
  `city_coat_of_arms` varchar(50) NOT NULL default 'default_city_coa.jpg',
  `city_pic` varchar(50) NOT NULL default 'default_city_pic.jpg',
  `city_website` varchar(100) NOT NULL default '',
  INDEX( `city_name`),
  FOREIGN KEY (`country_id`)
  REFERENCES countries (`country_id`)
)"); 

//--
//-- Dumping data for table `cities`
//--

mysqli_query($db, "INSERT INTO `traveldb`.`cities` (`city_name`, `country_id`, `city_region`, `city_population`, `city_map`, `city_flag`, `city_coat_of_arms`, `city_pic`,  `city_website` ) VALUES 
('London', 1, 'London', 7556900, 'englandImages/london_map.jpg', 'N/A', 'N/A', 'englandImages/london_pic.jpg', 'http://www.cityoflondon.gov.uk/' ),
('Bath', 1, 'South West', 83992, 'englandImages/bath_map.jpg', 'N/A', 'N/A', 'englandImages/bath_pic.jpg', 'http://www.cityofbath.co.uk/' ),

('Mexico City', 2, 'Federal District', 8846752, 'mexicoImages/mexicoCity_map.bmp', 'mexicoImages/mexicoCity_flag.png', 'mexicoImages/mexicoCity_coa.png', 'mexicoImages/mexico_city_pic.jpg', 'http://www.df.gob.mx/index.jsp' ),
('Cancun', 2, 'Quintana Roo', 562973, 'mexicoImages/cancun2_map.jpg', 'N/A', 'mexicoImages/cancun_coa.png', 'mexicoImages/cancun_pic.jpg', 'http://www.cancun.com/' ),

('Berlin', 3, 'Berlin', 3440441, 'germanyImages/berlin_map.jpg', 'germanyImages/berlin_flag.jpg', 'germanyImages/berlin_coa.jpg', 'germanyImages/berlin_pic.jpg', 'http://www.visitberlin.de/en'),
('Munich', 3, 'Bavaria', 1330440, 'germanyImages/munich_map.gif', 'germanyImages/munich_flag.jpg', 'germanyImages/munich_coa.jpg', 'germanyImages/munich_pic.jpg', 'http://www.muenchen.de/home/60093/Homepage.html'),

('Beijing', 4, 'northern China', 22000000, 'chinaImages/beijing_map.jpg',	'N/A',	'N/A', 'chinaImages/beijing_pic.jpg', 'http://www.beijing.gov.cn'),
('Shanghai', 4, 'eastern China', 19210000, 'chinaImages/shanghai_map.png', 'N/A',	'N/A', 'chinaImages/shanghai_pic.jpg', 'http://www.shanghai.gov.cn'),

('Madrid', 5, 'Community of Madrid', 3255950, 'spainImages/madrid_map.jpg', 'spainImages/madrid_flag.jpg', 'spainImages/madrid_coa.jpg', 'spainImages/madrid_pic.jpg', 'http://www.aboutmadrid.com/'),
('Barcelona', 5, 'Catalonia', 1621537, 'spainImages/barcelona_map.jpg', 'spainImages/barcelona_flag.jpg', 'spainImages/barcelona_coa.jpg', 'spainImages/barcelona_pic.jpg', 'http://www.aboutbarcelona.com/'),

('Ankara', 6, 'Central Anatolia', 4306105, 'turkeyImages/ankara_map.jpg', 'N/A', 'turkeyImages/ankara_coa.jpg', 'turkeyImages/ankara_pic.jpg', 'http://ankara.com/'),
('Istanbul', 6, 'Marmara', 13120596, 'turkeyImages/istanbul_map.jpg', 'N/A', 'turkeyImages/istanbul_coa.jpg', 'turkeyImages/istanbul_pic.jpg', 'http://english.istanbul.com/'),

('District of Columbia', 7,	'Washington, D.C.; between Virginia and Maryland', 601723, 'usaImages/dc_map.jpg', 'usaImages/dc_flag.png', 'usaImages/dc_seal.png', 'usaImages/dc_pic.jpg', 'http://www.dc.gov'),
('New York', 7, 'New York', 8391881, 'usaImages/ny_map.png', 'usaImages/ny_flag.png', 'usaImages/ny_seal.png', 'usaImages/new_york_city_pic.jpg', 'http://www.nyc.gov'),

('Paris', 8, 'Ile-de-France', 2193031, 'franceImages/paris_map.gif', 'franceImages/paris_flag2.gif', 'franceImages/paris_coa.png', 'franceImages/paris_pic.jpg', 'http://www.paris.fr/portail/english/Portal.lut?page_id=8118'),
('Marseille', 8, 'Provence-Alpes-Cote d''Azur', 852395, 'franceImages/marseille_map.gif', 'franceImages/marseille_flag.png', 'franceImages/marseille_coa.jpg', 'franceImages/marseille_pic.jpg', 'http://www.marseille.fr'),

('Rome', 9, 'Lazio', 2754440, 'italyImages/rome_map.gif', 'italyImages/rome_flag.png', 'italyImages/rome_coa.png', 'italyImages/rome_pic.jpg', 'http://www.comune.roma.it/was/wps/portal/pcr'),
('Milan', 9, 'Lombardy', 1314745, 'italyImages/milan_map.jpg', 'italyImages/milan_flag.gif', 'italyImages/milan_coa.png', 'italyImages/milan_pic.jpg', 'http://www.comune.milano.it/'),

('Kuala Lumpur', 10, 'Federal Territory', 1627172, 'malaysiaImages/kuala_lumpur_map.jpg', 'malaysiaImages/kuala_lumpur_flag.png', 'N/A', 'malaysiaImages/kuala_lumpur_pic.jpg', 'http://www.dbkl.gov.my/index.php?lang=en'),
('George Town', 10, 'Penang', 157743, 'malaysiaImages/george_town_map.jpg', 'N/A', 'malaysiaImages/george_town_coa.jpg', 'malaysiaImages/george_town_pic.jpg', 'http://www.tourismpenang.net.my/'),

('Sydney', 11, 'Cumberland', 4504469, 'australiaImages/sydney_map.jpg', 'N/A', 'australiaImages/sydney_coa.gif', 'australiaImages/sydney_pic.jpg', 'http://www.cityofsydney.nsw.gov.au/'),
('Brisbane', 11, 'Queensland', 2004262, 'australiaImages/brisbane_map.jpg', 'australiaImages/brisbane_flag.png', 'australiaImages/brisbane_coa.png', 'australiaImages/brisbane_pic.jpg', 'N/A'),

('Tokyo', 12, 'Kanto', 13010279, 'japanImages/tokyo_map.gif', 'japanImages/tokyo_flag.gif', 'japanImages/tokyo_coa.png', 'japanImages/tokyo_pic.jpg', 'http://www.metro.tokyo.jp/ENGLISH/'),
('Kyoto', 12, 'Kansai', 1465917, 'japanImages/kyoto_map.jpg', 'japanImages/kyoto_flag.png', 'japanImages/kyoto_coa.png', 'japanImages/kyoto_pic.jpg', 'http://www.kyoto.travel/'),

('Edinburgh', 13, 'City of Edinburgh', 477660, 'scotlandImages/edinburgh_map.jpg', 'N/A', 'N/A', 'scotlandImages/edinburgh_pic.jpg', 'http://www.edinburgh.org/'),
('Glasgow', 13, 'Glasgow', 580690, 'scotlandImages/glasgow_map.jpg', 'N/A', 'N/A', 'scotlandImages/glasgow_pic.jpg', 'http://www.seeglasgow.com/'),

('Queenstown', 14, 'Otago', 22956, 'newZealandImages/queenstown_map.jpg', 'N/A', 'N/A', 'newZealandImages/queenstown_pic.jpg', 'http://www.queenstown-nz.co.nz/'),
('Auckland', 14, 'Auckland', 1354900, 'newZealandImages/auckland_map.jpg', 'newZealandImages/auckland_flag.png', 'newZealandImages/auckland_coa.gif', 'newZealandImages/auckland_pic.jpg', 'http://www.AucklandNZ.com' ),

('Salzburg', 15, 'Salzburg', 147571, 'austriaImages/salzburg_map.jpg', 'N/A', 'austriaImages/salzburg_coa.jpg', 'austriaImages/salzburg_pic.jpg', 'http://www.salzburg.info/en/'),
('Vienna', 15, 'Wien (Vienna)', 1712903, 'austriaImages/vienna_map.jpg', 'austriaImages/vienna_flag.jpg', 'austriaImages/vienna_coa.jpg', 'austriaImages/vienna_pic.jpg', 'http://www.wien.info/en')
");

//-- --------------------------------------------------------


//--
//-- Table structure for table `attractions`
//--


mysqli_query($db, "CREATE TABLE IF NOT EXISTS `traveldb`.`attractions` (
  `attraction_id` smallint(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `attraction_name` varchar(50) NOT NULL default '',
  `city_id` smallint(6) NOT NULL default '0',
  `attraction_type` enum('museum', 'monument', 'theatre', 'bath or spa', 'harbour', 'district or market', 'sporting center or stadium', 'tower', 'bridge', 'government building', 'natural landmark', 'religious building', 'palace or castle', 'garden or park', 'aquarium', 'other', 'archaeological site') NOT NULL default 'other',
  `attraction_description` blob NOT NULL default '',
  `attraction_address` varchar(100) NOT NULL default '',
  `attraction_hours_of_operation` blob NOT NULL default '',
  `attraction_entrance_price` enum('Y', 'N') NOT NULL default 'Y',
  `attraction_website` varchar(100) NOT NULL default '',
  `attraction_picture` varchar(50) NOT NULL default 'default_attraction_pic.jpg',
  INDEX( `attraction_name`),
  FOREIGN KEY (`city_id`)
  REFERENCES cities (city_id)
)"); 

//--
//-- Dumping data for table `attractions`
//--

mysqli_query($db, "INSERT INTO `traveldb`.`attractions` (`attraction_name`, `city_id`, `attraction_type`, `attraction_description`, `attraction_address`, `attraction_hours_of_operation`, `attraction_entrance_price`, `attraction_website`, `attraction_picture`) VALUES 
('British Museum',  1, 'museum', 'Founded in 1753 by Act of Parliament, from the collections of Sir Hans Sloane, the British Museum is one of the great museums of the world, showing the works of man from prehistoric to modern times with collections drawn from the whole world. Famous objects include the Rosetta Stone, sculptures from the Parthenon, the Sutton Hoo and Mildenhall treasures and the Portland Vase. There is also a program of special exhibitions and daily gallery tours, talks and guided tours.',  'The British Museum, 96 Euston Road, London NW1 2DB, United Kingdom', 'Open daily 10.00 - 17.30. Selected galleries are open late on Thursdays and Fridays until 20.30.', 'N', 'http://www.britishmuseum.org', 'englandImages/britishMuseum.jpg'),
('Buckingham Palace', 1, 'palace or castle', 'Buckingham Palace serves as both the office and London residence of Her Majesty The Queen. It is one of the few working royal palaces remaining in the world today. During the summer, visitors can tour the nineteen State Rooms, which form the heart of the Palace. These magnificent rooms are decorated with some of the greatest treasures from the Royal Collection, including paintings by Rembrandt, Rubens and Canaletto and sculpture by Canova.', 'Buckingham Palace, 13 Buckingham Palace Rd, Westminster, London SW1W 0, United Kingdom', 'Summer 2011: 1 August - 25 September 9:45 - 18:30 (Last admission 15:45). Entry is by timed ticket.', 'Y', 'http://www.royalcollection.org.uk', 'englandImages/buckingham_palace.jpg'),
('London Eye', 1, 'other', 'It is a giant 135-metre (443 ft) tall Ferris wheel situated on the banks of the River Thames in the British capital.  It is the tallest Ferris wheel in Europe and the most popular paid tourist attraction in the United Kingdom.', 'The London Eye, London, UK', 'Winter Oct-May: 10.00am - 8.00pm Daily. Summer: June - September 10.00am - 9.00pm Daily. Closed Christmas Day', 'Y', 'http://www.londoneye.com',  'englandImages/LondonEye1.jpg'),
('Sea Life London Aquarium', 1, 'aquarium', 'The new SEA LIFE London Aquarium is home to one of Europe''s largest collections of global marine life and the jewel in the crown of the 28 SEA LIFE attractions in the UK and Europe. Situated in the heart of London, the experience takes visitors on an immersive and interactive journey along the Great Oceanic Conveyor. Along the journey, a stunning glass tunnel walkway offers guests an unforgettable experience by strolling underneath a Tropical Ocean. There is plenty of interaction along the way, from feeding the stingrays and watching diving displays to touch pools and discovery zones. Other stars of the show include seahorses, octopus, zebra sharks and the ever popular clown fish.', 'London Sea Life Aquarium, Westminster Bridge Road, SE1 7PB, United Kingdom', '7 days a week: 10.00-18.00. Last admission: 17.00. Late summer opening times: 22 Jul-3rd Sept:10.00-19.00. Last admission: 18.00', 'Y', 'http://www.londonaquarium.co.uk/', 'englandImages/SeaLifeLondonAquarium.jpg'),
('Wimbledon Lawn Tennis Museum', 1, 'museum', 'Wimbledon Lawn Tennis Museum provides a remarkable multi-dimensional tour of the traditions, triumphs, sights and sounds that have made Wimbledon the most coveted title in tennis.  Visitors explore the game''s evolution from a garden party pastime to a multi-million dollar professional sport played world-wide: with interactives, touch screens, and audio guides (available in English, French, German, Spanish, Italian, Russian, Japanese and Mandarin), people of all ages can experience the artistry and athleticism of modern tennis.',  'Wimbledon Lawn Tennis Museum, William Road, Merton, United Kingdom',  'Open: Throughout the year, daily: 10.30am to 5pm. Last admission is 4.30pm Closed: The middle Sunday of The Championships, the Monday immediately after The Championships, 24th, 25th, 26th December and 1st January.', 'Y', 'http://www.wimbledon.org/museum', 'englandImages/Wimbledon_Lawn_Tennis_Museum.jpg'), 

('Jane Austen Centre', 2, 'museum', 'The Jane Austen Centre offers a snapshot of life during Regency times and explores how living in this magnificent city affected Jane Austen''s life and writing. Live Guides, costume, film, superb giftshop and an authentic period atmosphere await you at this premier attraction.', 'The Jane Austen Centre, 40 Gay Street, Bath BA1 2NT, United Kingdom',  'April to October: 9:45am - 5.30pm everyday. Late opening July and August - Thursday to Saturday until 7pm November to March: Sun - Fri 11am - 4.30pm Sat 9:45am - 5.30pm Closed Christmas and New Year.', 'Y', 'http://visitbath.co.uk/site/things-to-do/attractions/the-jane-austen-centre-p26121', 'englandImages/JaneAustenCentre.jpg'),
('Prior Park Landscape Garden', 2, 'garden or park', 'Beautiful and intimate 18th century landscape garden created by Bath entrepreneur Ralph Allen with advice from poet Alexander Pope and Lancelot ''Capability'' Brown. Sweeping valley with magnificent views over the city of Bath. Walk across the famous Palladian Bridge, one of four in the world. Explore the woodland paths. Discover what wildlife lives in the beautiful haven. Or just relax and admire the view. A wonderful walk and an ideal picnic spot.', 'Prior Park Landscape Garden, Ralph Allen Drive, Bath, United Kingdom', '12 Feb to 30 Oct, every day, 11am to 5.30pm 5 Nov to 31 Jan, Sat & Sun only, 11am to Dusk', 'Y', 'http://www.nationaltrust.org.uk/priorpark/', 'englandImages/PriorParkLandscapeGarden.jpg'),
('Roman Baths', 2, 'bath or spa', 'The Roman Baths complex is a site of historical interest in the English city of Bath. The house is a well-preserved Roman site for public bathing.  The Roman Baths themselves are below the modern street level. There are four main features: the Sacred Spring, the Roman Temple, the Roman Bath House and the Museum holding finds from Roman Bath. ',  'The Roman Baths, Stall Street, Bath, BA1 1LZ, United Kingdom' , 'The Roman Baths is open daily apart from 25 and 26 December, at the following times. January - February 0930 - 1630, exit 1730 March - June 0900 - 1700 - exit 1800 July - August 0900 - 2100 - exit 2200 September - October 0900 - 1700 - exit 1800 November - December 0930 - 1630 - exit 1730', 'Y', 'http://www.romanbaths.co.uk/', 'englandImages/romanBath.jpg'),
('Thermae Bath Spa', 2, 'bath or spa', 'Using the warm, mineral-rich waters which the Celts and Romans enjoyed over 2000 years ago, Thermae Bath Spa is Britain''s original and only natural thermal Spa. Thermae is a remarkable combination of ''old and new'' where historic spa buildings blend with the contemporary design of the New Royal Bath. Choose a 2-hour or 4-hour spa session which includes full access to the warm waters and flowing curves of the Minerva Bath, a series of aromatic steam rooms and the open-air rooftop pool with spectacular views across the skyline of Bath.', 'Thermae Bath Spa, 6-8 Hot Bath Street, City Centre, Bath, BA1 1UP, United Kingdom', 'Closed Christmas Day, Boxing Day 1st to 7th January 2011, re-opening Saturday 8th January 2011. New Royal Bath open from 9.00-22.00. Last entry for a 2-hour spa session is 19.30. Cross Bath at Thermae Bath Spa open from 10.00-20.00. Last entry 18.30. Springs Cafe & Restaurant open from 9.30. Last serving at 20.15.', 'Y', 'http://www.thermaebathspa.com/', 'englandImages/thermaebath.gif'),  
('Theatre Royal Bath', 2, 'theatre', 'Built in 1805, the Georgian Theatre Royal was beautifully refurbished in 2010. The Main House offers a year-round programme of top-quality drama, including many West End productions, opera, comedy, dance and frequent Sunday concerts. The Theatre Royal also houses the Egg theatre for children, young people and their families and the egg Cafe (open throughout the day); the Ustinov Studio for cutting edge drama, comedy and music in an intimate setting; the Vaults Restaurant (for pre-show dining); and the historic Garricks Head Pub. The Theatre Royal''s many regular events include the Family Theatre Festival, Peter Hall Company Season, Shakespeare Unplugged Festival and a traditional family pantomime at Christmas.', 'Theatre Royal Bath, Saw Close, Bath, BA1 1ET, United Kingdom', '10am to 6pm Monday-Saturday', 'Y', 'http://www.theatreroyal.org.uk/', 'englandImages/Theatre_Royal_Bath.jpg'),

('Metropolitan Cathedral', 3, 'religious building', 'The Metropolitan Cathedral of the Assumption of Mary of Mexico City is the largest and oldest cathedral in the Americas and seat of the Roman Catholic Archdiocese of Mexico.  It is situated atop the former Aztec sacred precinct near the Major Temple on the northern side of the Constitution Plaza in downtown Mexico City. The cathedral was built in sections from 1573 to 1813 around the original church that was constructed soon after the Spanish conquest of Tenochtitlan, eventually replacing it entirely. Spanish architect Claudio de Arciniega planned the construction, drawing inspiration from Gothic cathedrals in Spain.  The cathedral has four facades which contain portals flanked with columns and statues. The two bell towers contain a total of 25 bells. The tabernacle, adjacent to the cathedral, contains the baptistery and serves to register the parishioners. There are two large, ornate altars, a sacristy, and a choir in the cathedral. Fourteen of the cathedral''s sixteen chapels are open to the public. Each chapel is dedicated to a different saint or saints, and each was sponsored by a religious guild.', 'Mexico City Metropolitan Cathedral, Plaza de la Constitucion, Colonia Centro, Mexico City 06010, Mexico', 'Daily 7am-7pm', 'N', 'N/A', 'mexicoImages/MetroCatedral.jpg'),
('National Anthropological Museum', 3, 'museum', 'The museum contains significant archaeological and anthropological artifacts from the pre-Columbian heritage of Mexico, such as the Piedra del Sol and the 16th-century Aztec statue of Xochipilli.', 'National Museum of Anthropology, Grutas, Bosque de Chapultepec I, Miguel Hidalgo, Distrito Federal, Mexico', 'From Tuesday to Sunday from 9:00 to 19:00 hrs. Closed Mondays. ', 'Y', 'http://www.gobiernodigital.inah.gob.mx/mener/index.php?id=33', 'mexicoImages/anthroMuseum.jpg'),
('National Palace', 3, 'government building', 'The National Palace was the seat of the federal executive in Mexico. It is located on Mexico City''s main square, the Plaza de la Constitution. This site has been a palace for the ruling class of Mexico since the Aztec empire, and much of the current palace''s building materials are from the original one that belonged to Moctezuma II.  This historic building was once occupied by Hernan Cortes, the Spanish explorer who conquered the Aztecs, and includes a famous panoramic mural of Mexican history by Diego Rivera.', 'Palacio Nacional, Moneda, Centro, Cuauhtemoc, Mexico D.F., México', 'Always open', 'N', 'N/A', 'mexicoImages/nationalpalace.jpg'),
('Teotihuacan', 3, 'archaeological site', 'Teotihuacan is an enormous archaeological site in the Basin of Mexico, containing some of the largest pyramidal structures built in the pre-Columbian Americas.  The city was thought to have been established around 200 BCE, lasting until its fall sometime between the 7th and 8th centuries CE.', 'Teotihuacan, Mexico','Always open', 'N', 'N/A', 'mexicoImages/teotihuacan.jpg'),
('Xochimilco', 3, 'garden or park', 'The floating gardens of Xochimilco are another of Mexico City''s attractions. The ancient floating gardens have been around for about 700 years and still operate basically the same as they did in Aztec times. Here you can rent brightly painted boats, called trajineras. You cruise the ancient canals at a leisurely pace and once you are out of the dock area you will more than likely be approached by boats with mariachi or marimba bands, photographers and vendors of food, drinks and handicrafts. This is a favorite Mexico City attraction with visitors and locals alike and one you surely will not want to miss.', 'Xochimilco, Mexico', 'Always open', 'N', 'N/A', 'mexicoImages/Xochimilco.jpg'), 

('Chichen Itza', 4, 'archaeological site', 'Founded in 495 AD, Chichen Itza has columned structures and warrior images, is reminiscent of ancient Rome.', 'Chitzen Itza, Piste, Yucatán, Mexico', 'Always open', 'N', 'http://allaboutcancun.com/activities/side-trips/chichen-itza/', 'mexicoImages/chichenitza.jpg'),
('Dolphin Discovery', 4, 'other', 'It''s  the best place to swim with dolphins in Cancun.  In Dolphin Discovery, people of all ages and concerned dolphin lovers are provided the opportunity to make their dreams come true.', 'Dolphin Discovery, Camino Sac Bajo Lote 26, 77400 Isla Mujeres, Mexico', 'Open every day from 9:00 am to 5:00 pm', 'Y', 'http://www.dolphindiscovery.com/', 'mexicoImages/dolphinDiscovery.jpg'),
('Underwater Museum', 4, 'museum', 'Submerge yourself in one of the most beautiful and clear waters of the world; The Mexican Caribbean. In the near future these crystal clear waters will be home to one of the largest underwater museums on the planet, located in Cancun, Quintana Roo, Mexico. Forming this museum will be a series of underwater sculptural installations all sited within the protected National Marine Park, of the Yucatan Peninsula, Mexico. Divers and snorkellers will have the opportunity to admire more than 400 original sculptures in depths ranging from 9 to 20 feet. The artist behind the project Jason deCaires Taylor offers a contemporary and cultural view of how the Mayan people have evolved through out the years in''The Silent Evolution''. This monumental installation consists of more than 400 life size figurative sculptures. Also located in the museum, near the island of Isla Mujeres, a sculpture entitled ''The Dream Collector'' will be submerged, along with many other unique master pieces.', 'Underwater museum, Quintana Roo, Cancun, Mexico', 'Always open', 'N', 'http://cancun.travel/en/things-to-do/water-sports/cancuns-underwater-museum/', 'mexicoImages/underwater-museum.jpg'),
('Xcaret', 4, 'other', 'Xcaret, 50 miles south of Cancun, is an all day family adventure located around natural grottos, fresh and saltwater pools and underground rivers that run to the sea. A tropical island-like ecological amusement park with snorkeling sites, an exotic tropical rainforest where endangered species are protected, and a few archeological sites thrown in for good measure.  You can walk around on the bottom of a Caribbean lagoon with a dive helmet or glide down a jungle river, both above and below ground. There are turtles, monkeys, dolphin encounters, snack bars and palapa restaurants with roving regional musical groups. A spectacular evening Mexican themed light and sound show starts at dusk with a demonstration of the pre-Hispanic Ball Game.', 'Xcaret, Cancun, Mexico', 'open all year, from 8:30 AM to 9:30 PM', 'Y', 'http://www.xcaret.com/', 'mexicoImages/xcaret.jpg'),  
('Xel-Ha', 4, 'garden or park', 'At last, the dreams of stepping through the aquarium glass, of drifting into an astonishing world of underwater magic are about to come true.
Xel-Ha is nature as no one has ever felt it before, a place to share in celebrating the biological parade of the Riviera Maya.
The Natural Wonder and its open-sea aquarium offer a myriad of land and water activities, ecological attractions, world-class restaurants, and countless more unimaginable experiences.
Dazzle your senses. Feel the thrills of adventure and caresses of paradise. Xel-Ha...the Natural Wonder awaits.', 'Xel-Ha, Cancun, Mexico', 'open 365 days a year from 8:30 AM to 6:00 PM', 'Y', 'http://www.xelha.com/', 'mexicoImages/xelha.jpg'),

('Berlin Zoological Garden', 5, 'garden or park', 'The Berlin Zoo is the oldest and best known zoo in Germany.  Opened in 1844, it is located in Berlin''s Tiergarten (animal park).  The zoo contains the most comprehensive collection of species in the world and is considered the most visited zoo in Europe.  The zoo is home to Knut, the world famous polar bear, born in December 2006.', 'Zoologischer Garten, Berlin, Deutschland', 'April to September daily: 9am - 7pm, October: 9am - 6pm, November to March: 9am - 5pm', 'Y', 'http://www.zoo-berlin.de/', 'germanyImages/berlin_zoo_pic.jpg'),
('Brandenburg Gate', 5, 'monument', 'The Brandenburg Gate is a former city gate and one of the main symbols of Berlin and Germany.  It is located west of the city center and is the only remaining gate through which Berlin was once entered.  It is the monumental entry to Unter den Linden, the renowned boulevard of linden trees which formerly led to the city palace of the Prussian monarchs.  The gate suffered considerable damage in World War II and was restored fully from 2000 to 2002.  It is regarded as one of Europe''s most famous landmarks.', 'Brandenburger Tor, Pariser Platz, 10117 Berlin, Germany', 'Always open', 'N', 'http://www.berlin.de/orte/sehenswuerdigkeiten/brandenburger-tor/index.en.php', 'germanyImages/brandenburg_gate_pic.jpg'),
('East Side Gallery', 5, 'monument', 'The East Side Gallery is an international memorial for freedom.  It is a 1.3 km long section of the Berlin Wall, located near the center of Berlin.  The Gallery consists of about 100 paintings by artists from around the world, painted in 1990 on the east side of the Berlin Wall.  The paintings document the time of change after the fall of the Berlin Wall and express the euphoria and great hopes for a better world and a free future for all the people of the world.', 'East-Side-Gallery, Muehlenstrasse, Deutschland', 'Always open', 'N', 'http://www.eastsidegallery.com/index.htm', 'germanyImages/east_side_gallery_pic.jpg'),
('Museum Island', 5, 'museum', 'Museum Island (Museumsindel in German) is the northern half of an island in the Spree river in the middle of Berlin.  It holds five internationally renowned museums:  the Altes Museum, the Neues Museum, the Alte Nationalgalerie, the Bode Museum, and the Pergamon Museum.', 'Museumsinsel, 10178 Berlin', 'Depends on the museum', 'Y', 'http://www.smb.museum/smb/standorte/index.php?lang=en&p=2&objID=3313&n=2', 'germanyImages/museum_island_pic.jpg'),
('Reichstag Building', 5, 'government building', 'The Reichstag Building was originally constructed to hold the parliament of the German Empire in 1894.  It was severely damaged during World War II but was completely reconstructed by 1999.  The dome on top of the building is a large glass dome that provides visitors with a 360-degree view of the surrounding Berlin cityscape.', 'Reichstag, Scheidemannstrasse, Berlin, Deutschland', 'Daily 8am - 12am', 'N', 'http://www.berlin.de/orte/sehenswuerdigkeiten/reichstag/index.en.php', 'germanyImages/reichstag_pic.jpg'),

('BMW Museum', 6, 'museum', 'The BMW Tower is a Munich landmark, which serves as the world headquarters for the Bavarian automaker.  The building is shaped like a BMW four-cylinder, and was declared historical in 1999.  The nearby BMW Museum, also near the Munich Olympiapark, showcases the history of BMW.', 'BMW Museum Am Olympiapark 2, 80809 Munich', 'Tuesday to Sunday 10am - 6pm, closed Mondays', 'Y', 'http://www.bmw-museum.com/2/webmill.php', 'germanyImages/bmw_museum_pic.jpg'),
('Englischer Garten', 6, 'garden or park', 'German for English Garden, the Englisher Garten is a large public park in the center of Munich, created in 1789.  It features wide open parks and lakes, beer gardens, restaurants, and even nude sunbathers...', 'Englischer Garten, 80538 Munich', 'Always open', 'N', 'http://www.muenchen.de/Tourismus/Sightseeing/Attractions/308378/englishgarden.html', 'germanyImages/english_gardens_pic.jpg'),
('Frauenkirche', 6, 'religious building', 'The Frauenkirche''s full name is Der Dom zu unserer lieben Frau - the Cathedral of Our Dear Lady.  It serves as the cathedral of the Archdiocese of Munich and Freising and is a symbol of Munich, the Bavarian capital city.  The church towers over surrounding buildings, and visitors may climb the winding stairs of the south tower to view the city of Munich and the nearby Alps.', 'Frauenplatz 1, 80331 Munich', 'No entrance during service', 'N', 'http://www.muenchen.de/Rathaus/tourist_office/sehenswuerdigkeiten/Kirchen/129352/Frauenkirche.html', 'germanyImages/frauenkirche_pic.jpg'),
('Nymphenburg Palace', 6, 'palace or castle', 'The Nymphenburg Palace (Schloss Nymphenburg) is a baroque palace in Munich, Bavaria.  The palace was the main summer residence of the rulers of Bavaria.', 'Schloss Nyphenburg 1, 80638 Munich', 'April to 15 October: 9am - 6pm, 16 October to March: 10am - 4pm, open daily', 'Y', 'http://www.schloss-nymphenburg.de/englisch/palace/index.htm', 'germanyImages/nymphenburg_pic.jpg'),
('Olympiapark', 6, 'sporting center or stadium', 'The Olympiapark in Munich is an Olympic Park constructed for the 1972 Summer Olympics.  The Park serves now as a venue for cultural, social, and religious events, including the 2006 World Cup, which was hosted in Munich, as well as public viewings of the 2010 World Cup.', 'Olympiapark, Spiridon-Louis-Ring, Munich, Germany', 'Depends on destination within the Olympiapark', 'N', 'http://www.olympiapark.de/en/home/', 'germanyImages/olympiapark_pic.jpg'),

('Beijing National Stadium', 7, 'sporting center or stadium', 'The National Stadium or Bird''s Nest, as it is colloquially known, was built and designed for the 2008 Summer Olympics and Paralympics.  The building began on December 8, 2003 and opened on June 28, 2008.  There are pipes located under the playing surface which gather heat in the winter to warm the stadium and coldness in the summer to cool the stadium.',	'National Stadium, South Road, Beijing, China', '9:00 to 18:00 weekdays; 9:00 to 21:30 on weekends and public holidays',	'Y', 'http://en.beijing2008.cn/cptvenues/venues/nst/n214078095.shtml', 'chinaImages/national_stadium.jpg'),
('Forbidden City', 7, 'palace or castle', 'The Forbidden City was China''s imperial palace from the Ming Dynasty through the Qing Dynasty.  For nearly 500 years, it served as the emperors'' palace.  The city, built from 1402 to 1420, is comprised of 980 buildings and extends over 7, 800, 000 sq ft.  UNESCO lists it as the largest preserved collection of ancient wooden structures in the world.  It is a sub-city of the Imperial City.', 'Forbidden City, Dongcheng, Beijing, China', '8:30am to 5pm (April 16-October 15), tickets not available after 16:00; 8:30am to 4:30pm (October 16-Apr.15), tickets not available after 15:30', 'Y', 'http://www.dpm.org.cn/index1024768.html', 'chinaImages/forbidden_city.jpg'),
('Great Wall of China', 7, 'other', 'The Great Wall of China is a combination of stone and earthen fortifications located in northern China that was originally built to protect the Chinese Empire''s northern borders from invasion.', 'Great Wall of China, Beijing, China', 'varies by wall section', 'Y', 'N/A', 'chinaImages/great_wall.jpg'),
('National Aquatics Center', 7,	'sporting center or stadium', 'The National Aquatics Center, also known as the Water Cube, is an aquatic center that was built in the Olympic Green alongside of the National Stadium for the swimming competitions of the 2008 Summer Olympics.  Despite the nickname, the building is not an actual cube, but a rectanuglar box.  Building began on December 24, 2003 and it was completed for use on January 28, 2008.  Half of its interior was turned into a water park after the Olympics, and it re-opened on August 8, 2010.', 'Beijing National Aquatics Center, Bei Sha Tan Road, Olympic Green, Beijing, China', '9:00 to 17:00', 'Y', 'http://www.water-cube.com', 'chinaImages/national_aquatics_center.jpg'),
('National Center for the Performing Arts',	7,	'theatre', 'The National Center for the Performing Arts, or The Egg, is an opera house, stucturally built as a dome of titanium and glass surrounded by an artificial lake designed by Paul Andreu, a French architect.  Building began in December of 2001 and was completed for the opening concert in December of 2007.   It is comprised of the Opera Hall, Music Hall, and Theater Hall.', 'National Center for the Performing Arts, Xi Chang An Jie, Pekin, Chine', 'Box office open daily: 9:30 a.m. to 7:30 p.m; show times vary',	'Y', 'http://www.chncpa.org/n16/welcome.html', 'chinaImages/national_center_perf_arts.jpg'),
('Yonghe Temple', 7, 'religious building', 'The Youghe Temple, also known as Palace of Peace and Harmony Lama Temple or just Lama Temple, is a temple and monastery of the Geluk School of Tibetan Buddhism, one of the most important and largest in the world.', 'Yonghe Temple, Dongsi, Beijing, China', '9:00 to 17:00', 'Y',	'http://www.beijingtrip.com/attractions/lamatemple.htm', 'chinaImages/yonghe_temple.png'),

('Nanjing Road', 8,	'district or market', 'Nanjing Road is the main shopping street of Shanghai.  It is also one of the world''s busiest shopping streets, comprised of two sections, Nanjing Road East and Nanjing Road West.',	'Nanjing Road, Shanghai', 'N/A', 'N', 'http://www.asiarooms.com/en/travel-guide/china/shanghai/things-to-do-in-shanghai/shopping-in-shanghai/nanjing-road-shopping-mall-shanghai.html',	'chinaImages/nanjing_road.gif'),
('Shanghai Ocean Aquarium',	8, 'aquarium',	'The Ocean Aquarium is home to Bruce, an Oranda goldfish, named after Bruce Lee, measuring 17.129 in.  It is also home to the longest underwater tunnel in the world.', 'Shanghai Ocean Aquarium, Lujiazui Ring Road, Pudong Xinqu, Shanghai, China, 200120', 'Open daily: 9:00 to 18:00;  Hours are adjusted during the summer holidays.',	'Y', 'http://www.sh-soa.com/en/html/index.html', 'chinaImages/ocean_aquarium.jpg'),
('The Bund', 8, 'district or market', 'The Bund is an area comprised of a section of Zhongshan Road that runs along the western back of the Huangpu River.  It contains buildings and wharves and is one of the most famous tourist destinations in Shanghai.', 'The Bund, Shanghai, China',	'N/A',	'N',	'http://hua.umf.maine.edu/China/images/Bund_Key_to_Buildings/Bund_Key.html', 'chinaImages/the_bund.jpg'),
('Xintiandi', 8, 'district or market', 'Xintiandi is a car-free shopping, eating, and entertainment district of shikumen (stone gate) houses which are now bookstores, cafes, and restaurants, and shopping malls.  Its name means New Heaven and Earth.',	'Xintiandi, Huang Pi Nan Lu, Shangai, China', 'N/A', 'N', 'http://www.xintiandi.com/chinese/landing.asp', 'chinaImages/xintiandi.jpg'),
('Yuyuan Garden', 8, 'garden or park', 'The Yuyuan, or Yu Garden is considered to be one of the most ornate and finest Chinese gardens.  The garden was first established in 1559 by Pan Yunduan as a private garden for his father, a high-ranking official during the Ming Dynasty.  It took him nearly 20 years to build it.', 'Yuyuan Garden, Xin Road, Shanghai, China', '8:30-17:00',	'Y', 'http://www.meet-in-shanghai.net/landmarks_puxi1.php',	'chinaImages/yuyuan_garden.jpg'),

('Buen Retiro Park', 9, 'garden or park', 'The Buen Retiro Park, which literally means Park of the Pleasant Retreat, is the main park of the city of Madrid.  The park is located in the center of the city, and is filled with beautiful sculptures and monuments.', 'Parque del Buen Retiro, Alfonso XII 28014 Madrid, Spain', 'Always open', 'N', 'http://www.aboutmadrid.com/madrid/parks.asp', 'spainImages/retiro_park_pic.jpg'),
('Museo del Prado', 9, 'museum', 'The Museo del Prado is a museum and art gallery in Madrid, featuring one of the world''s finest collections of European art, from the 12th century to the early 19th century.  El Prado is one of the most visited sites in the world and is considered to be among the greatest museums of art.', 'Museo del Prado, Madrid, Spain', 'Tuesday to Sunday: 9am - 8pm, Mondays: closed', 'Y', 'http://www.museodelprado.es/en/', 'spainImages/prado_museum_pic.jpg'),
('Palacio Real de Madrid', 9, 'palace or castle', 'The Palacio Real de Madrid (the Royal Palace of Madrid), also known as the Palacio de Oriente (The Orient Palace, or the Far East Palace), is the official residence of the King of Spain in the city of Madrid, but is only used for state ceremonies.  The palace is partially open to the public, except when it is being used for official business.  Several royal collections of great historical importance are kept at the palace, including the Royal Armoury and weapons dating back to the 13th century, as well as collections of tapestry, porcelain, furniture, and other objects of great historical importance.', 'Palacio Real de Madrid, 4, 28005 Madrid, Spain', 'October to March: 9:30am - 5pm; April to September 9am - 6pm', 'Y', 'http://www.madrid-tourist-guide.com/en/attractions/royal-palace-madrid.html', 'spainImages/palacio_real_pic.jpg'),
('Puerta del Sol', 9, 'other', 'Spanish for Gate of the Sun, the Puerta del Sol is one of the best known and busiest places in Madrid.  It is the center of the radial network of Spanish roads, and also contains the famous clock whose bells mark the traditional eating of the Twelve Grapes and the beginning of a new year.  The New Year''s celebration has been broadcast live on TV from the Puerta del Sol since 31 December 1962.', 'Plaza Puerta Del Sol 14, 28013 Madrid', 'Always open', 'N', 'http://www.gomadrid.com/sights/puerta-del-sol.html', 'spainImages/puerta_del_sol_pic.jpg'),
('Teatro Real', 9, 'theatre', 'The Teatro Real (literally the Royal Theater) is a major opera house in Madrid, Spain, opened in 1850.  Currently, the theatre stages around seventeen opera titles per year, as well as two or three major ballets and several recitals.  The orchestra of the Teatro Real is the Orquesta Sinfonica de Madrid.', 'Teatro Real de Madrid, PLAZA ISABEL II, 7, 28013 Madrid, Spain', 'Depends on the show', 'Y', 'http://www.teatro-real.com/en/', 'spainImages/teatro_real_pic.jpg'),

('La Barceloneta', 10, 'natural landmark', 'La Barceloneta is a neighborhood on the Mediterranean Sea in the Ciutat Vella district of Barcelona.  Barceloneta was rated as the best urban beach in the world, and the overall third best beach in the world in the Discovery Channel''s 2005 documentary World''s Best Beaches.  Barceloneta is best known for its sandy beaches, and many restaurants and nightclubs on the boardwalk.', 'La Barceloneta, Barcelona', 'Always open', 'N', 'http://www.aboutbarcelona.com/barcelona/beaches.asp', 'spainImages/la_barceloneta_pic.jpg'),
('L''Aquarium de Barcelona', 10, 'aquarium', 'L''Aquarium de Barcelona is the most important marine leisure and education center in the world concerning the Mediterranean, and contains a series of 35 tanks, 11,000 animals, and 450 different species.', 'L''Aquarium de Barcelona, Moll d''Espanya del Port Vell, 08039 Barcelona, Spain', 'Monday to Friday: 9:30am - 9pm, Weekends: 9:30am - 9:30pm', 'Y', 'http://www.aquariumbcn.com/AQUARIUM/index.php?wlang=en', 'spainImages/barcelona_aquarium_pic.jpg'),
('Park Guell', 10, 'garden or park', 'Park Guell is a garden complex in Barcelona with architectural elements situated on the hill of el Carmel in the Gracia district of Barcelona.  It was designed by the Catalan architect Antoni Gaudi and built between 1900 and 1914.  It is part of the UNESCO World Heritage Site Works of Antoni Gaudi.', 'Park Guell, Carrer d''Olot, Barcelona, Spain', 'Daily 10am - 7pm', 'N', 'http://www.barcelona-tourist-guide.com/en/gaudi/park-guell.html', 'spainImages/park_guell_pic.jpg'),
('Picasso Museum', 10, 'museum', 'The Picasso Museum in Barcelona contains one of the most extensive collections of artwork by the 20th century Spanish artist Pablo Picasso.', 'Picasso Museo, Barcelona, Spain', 'Tuesday to Sunday: 10am - 8pm, Monday: closed', 'Y', 'http://www.museupicasso.bcn.cat/en/', 'spainImages/picasso_museum_pic.jpg'),
('Sagrada Familia', 10, 'religious building', 'The Sagrada Familia is a large Roman Catholic church designed by Catalan architect Antoni Gaudi.  Although incomplete, the church is a UNESCO World Heritage Sight.  The building has been under construction since 1882 and it is estimated that, depending on resources and funding, another 30 to 80 years will be required to complete the church.', 'Sagrada Familia, Barcelona, Spain', 'October to March: 9am - 6pm, April to September: 9am - 8pm', 'Y', 'http://www.sagradafamilia.cat/sf-eng/index.php', 'spainImages/sagrada_familia_pic.jpg'),

('Anitkabir, Ataturk''s Mausoleum', 11, 'monument', 'Located on an imposing hill, Anitkabir, a mausoleum of Mustafa Kemal Ataturk (founder of the Rupublic of Turkey), is in the Anittepe quarter of the city.  Completed in 1953, it is an impressive mixture of ancient and modern architectural styles.  An adjacent museum houses a wax statue of Ataturk, his writings, letters and personal items, as well as an exhibition of photographs recording important moments in his life and during the establishment of the Republic.', 'Anitkabir, Anittepe, Ankara', 'Tuesday to Sunday: 9am - 5pm', 'N', 'http://www.tsk.tr/eng/Anitkabir/index.html', 'turkeyImages/ataturk_mausoleum_pic.jpg'),
('Ankara Citadel', 11, 'palace or castle', 'The citadel is an archeological site in Ankara, Turkey.  The foundations of the citadel or castle were laid by the Galatians on a prominent lava outcrop, and the rest was completed by the Romans.  The Byzantines and Seljuks made further restorations and additions.  The area around and inside the citadel, the oldest part of the city of Ankara, contains many fine examples of traditional architecture.  Many traditional houses inside the citadel have found new life as restaurants, serving local cuisine.', 'Ankara Citadel, Ulus, Ankara', 'Always open', 'N', 'http://www.turkeytravelplanner.com/go/CentralAnatolia/Ankara/sights/hisar.html', 'turkeyImages/ankara_citadel_pic.jpg'),
('Ankara Roman Baths', 11, 'bath or spa', 'Situated on Cankiri Caddesi, just north of Ulus Meydani, the Roman Baths are an archeological site in Ankara, Turkey.  They date back to the 3rd century AD and are well maintained.  The baths have all the typical features of a classical Roman bath: a frigidarium (cold room), tepidarium (warm room) and caldarium (hot room).', 'Cankiri Avenue, Ulus, Ankara', 'Daily 8:30am - 12pm, 1pm - 3:30pm', 'Y', 'http://www.turkeytravelplanner.com/go/CentralAnatolia/Ankara/sights/roman.html', 'turkeyImages/roman_baths_pic.jpg'),
('Kocatepe Mosque', 11, 'religious building', 'The Kocatepe Mosque is the largest mosque in Ankara, the capital city of Turkey.  Built between 1967 and 1987 in the Kocatepe quarter in Kizilay, its size and prominent situation have made it a landmark that can be seen from almost anywhere in central Ankara.', 'Kocatepe Cami, Kultur Mh., Ankara, Turkey', 'Open daily', 'N', 'http://www.lonelyplanet.com/turkey/central-anatolia/ankara/sights/religious-spiritual/kocatepe-camii', 'turkeyImages/kocatepe_mosque_pic.jpg'),
('Museum of Anatolian Civilizations', 11, 'museum', 'The Museum of Anatolian Civilizations consists of the old Ottoman Mahmut Pasa bazaar storage building.  Within this Ottoman building, the museum has a number of exhibits of Anatolian archeology. They start with the Paleolithic era, and continue chronologically through the Neolithic, Early Bronze, Assyrian trading colonies, Hittite, Phrygian, Urartian, Greek, Hellenistic, Roman, Byzantine, Seljuk and Ottoman periods.', 'Museum of Anatolian Civilizations, Necatibey Mh., 06250 Ankara', 'Daily 9am - 5pm', 'Y', 'http://www.anadolumedeniyetlerimuzesi.gov.tr/ana-sayfa/1-54417/20110221.html', 'turkeyImages/museum_anatolian_civilisations.jpg'),

('Bosphorus', 12, 'natural landmark', 'This body of water that passes along the shores of Istanbul is 20 miles in length and is the physical divider between the continents of Europe and Asia.  Istanbul itself extends on both the European and the Asian sides of the Bosphorus, and is thereby the only metropolis in the world that is situated on two continents.  Visitors can enjoy a ferry over the waters while taking in the view of the Old City.', 'The Boshporus', 'Always open', 'N', 'http://www.turkeytravelplanner.com/go/Istanbul/Sights/Bosphorus/', 'turkeyImages/bosphorus_pic.jpg'),
('Grand Bazaar', 12, 'district or market', 'The Grand Bazaar in Istanbul is one of the largest and oldest covered markets in the world, with more than 58 covered streets and over 4,000 shops which attract between 250,000 and a half million visitors daily.  The grand bazaar began construction in 1455 and opened in 1461.  It is well known for its jewelry, pottery, spice, and carpet shops.  Today, the grand bazaar houses two mosques, two hamams, four fountains, and multiple restaurants and cafes.', 'Grand Bazaar, Bayzait Mh., Kalpakcilar Cd, 34000 Istanbul', 'Monday to Saturday: 9am - 7pm, Closed Sundays', 'N', 'http://www.grandbazaaristanbul.org/Grand_Bazaar_Istanbul.html', 'turkeyImages/grand_bazaar_pic.jpg'),
('Hagia Sophia', 12, 'museum', 'The Hagia Sophia is a former Orthodox patriarchal basilica, later a mosque, and now a museum in Istanbul, Turkey.  From the date of its dedication in 360 until 1453, it served as the cathedral of Constantinople, and was a mosque between 1453 and 1931.  Finally, in 1935, it was opened as a museum.  Famous in particular for its massive dome, it is considered the epitome of Byzantine architecture and is said to have changed the history of architecture.', 'Hagia Sophia, Yerebatan Caddesi, Istanbul, Turkey', 'Tuesday to Sunday: 9am - 4:30pm', 'Y', 'http://www.sacred-destinations.com/turkey/istanbul-hagia-sophia', 'turkeyImages/hagia_sophia_pic.jpg'),
('Sultan Ahmed Mosque (Blue Mosque)', 12, 'religious building', 'The Sultan Ahmen Mosque, a historical mosque in Istanbul, is popularly known as the Blue Mosque for the blue tiles adorning the walls of its interior.  Built between 1609 and 1616 during the rule of Ahmed I, it comprises the mosque, a tomb of its founder, a madrasah, and a hospice.  While still used as a mosque, it has also become a popular tourist attraction.', 'Sultan Ahmed Mosque, Torun Sokak, Istanbul, Turkey', 'Daily 9am - 6pm except during prayer times', 'N', 'http://www.sacred-destinations.com/turkey/istanbul-blue-mosque', 'turkeyImages/sultan_ahmed_mosque_pic.jpg'),
('Topkapi Palace', 12, 'palace or castle', 'The Topkapi Palace in Istanbul was the official and primary residence in the city of the Ottoman Sultans for approximately 400 years (1465-1856) of their 624 year reign.  The palace was a setting for state occasions and royal entertainments and is a major tourist attraction today, containing the most holy relics of the Muslim world such as the Prophet Muhammed''s cloak and sword.', 'Topkapi Palace, Cankurtaran Mh., 34122 Istanbul/Istanbul Province, Turkey', 'Everyday except Tuesdays: 9am - 5pm', 'Y', 'http://www.topkapisarayi.gov.tr/', 'turkeyImages/topkapi_palace_pic.jpg'),

('American Museum of Natural History', 13, 'museum', 'This museum located in Manhattan is one of the largest in the world, consisting of twenty-five interconnected buildings with fourty-six permanent exhibition halls, collections containing over 32 million specimens, research laboratories, and its library.', 'American Museum of Natural History, New York, NY', 'daily, 10:00 a.m. to 5:45 p.m.; The Museum is closed Thanksgiving and Christmas.', 'Y',	'http://www.amnh.org/', 'usaImages/amer_muse_of_nat_hist.jpg'),
('Georgetown', 13, 'district or market',	'Georgetown is a neighborhood along the Potomac River waterfront.  Many enjoy walking around for its commercial corridors, containing shops, bars, and restaurants, and for its historical landmarks.', 'Georgetown, Washington, D.C.', 'N/A', 'N', 'http://www.georgetowndc.com/', 'usaImages/george_town_dc.jpg'),
('Lincoln Memorial', 13, 'monument', 'The Lincoln Memorial was built to honor the 16th U.S. president, Abraham Lincoln.   The building contains a large seated statue of Lincoln and inscriptions of two of his speeches, The Gettysburg Address and his Second Inaugural Address.', 'Lincoln Memorial, National Mall and Memorial Parks, 1900 Ohio Drive SW, Washington, DC 20024', '24 hours a day; Rangers are on duty to answer questions from 9:30 A.M. to 11:30 P.M. daily', 'N', 'http://www.nps.gov/linc/index.htm', 'usaImages/lincoln_memorial.jpg'),
('Smithsonian Institution',	13, 'museum', 'The Smithsonian Institution is a research and educational institute and associated museum.  It contains 19 museums, a zoo, and 9 research centers that are located in Washington, D.C. and other sites including New York City, Virginia, and Panama.  It has over 136 million items in its collections.', 'Smithsonian Institution, 7th Street Southwest, Washington D.C., DC', 'varies by museum', 'N', 'http://www.si.edu/', 'usaImages/smithsonian_institution.jpg'),
('Washington Monument', 13, 'monument',	'The Washington Monument is an obelisk built to commemorate the first U.S. president, George Washington.   It is made of marble, granite, and sandstone, and is the world''s tallest stone structure.  Note: If you start really close to it, and then walk backwards looking up, it appears as if it is falling on you.', 'Washington Monument, National Mall and Memorial Parks, 1900 Ohio Drive SW, Washington, DC 20024', 'Open daily - Summer Hours: 9 a.m. to 10 p.m. (May 31 -September 6, 2010) with the last tour beginning before 9:45 p.m.; Rest of Year: 9 a.m. - 5 p.m. with the last tour beginning before 4:45 p.m.  Closed July 4 and December 25.',
 'N', 'http://www.nps.gov/wamo/index.htm', 'usaImages/washington_monument.jpg'),

('Central Park', 14, 'garden or park', 'Central Park is a public park in Manhattan that was designated a National Historic Landmark in 1963.   It is the most visited urban park in the U.S., receiving about twenty-five million visitors annually.  Some of it''s places and attractions include the Loeb Boathouse, the Ramble (a wooded section known for bird-watching), carriage horses, rock climbing, ice skating, the carousel, and playgrounds.', 'Central Park S and 7th Avenue, New York, NY 10019', 'N/A', 'N', 'http://www.centralpark.com/', 'usaImages/central_park.jpg'),
('Ellis Island', 14, 'other', 'Ellis Island was the gateway to the United States of America for millions of immigrants as the nation''s busiest immigrant inspection station from 1892 to 1954.  Since 1990, it now hosts a museum of immigration.', 'Ellis Island, New York, NY', 'The first ferries will leave the mainland for Ellis Island at 9:00 am. The last ferries will depart Ellis Island at 5:15 pm.  Closed Decmeber 25th.', 'Y', 'http://www.nps.gov/elis/index.htm', 'usaImages/ellis_island.jpg'),
('Empire State Building', 14, 'tower', 'The Empire State Building is a 102-story Art Deco skyscraper that is 1, 250 ft tall.  It is the tallest building in New York City and has been named one of the Seven Wonders of the Modern World by the American Civil Engineers.', 'The Empire State Building, 350 Fifth Avenue, Suite 300, New York, NY 10118',	'Open daily 365 days of the year; 8:00 am to 2:00 am, last elevators go up at 1:15 am.  Note: Holiday hours may vary.',	'Y', 'http://www.esbnyc.com/', 'usaImages/empire_state_building.jpg'),
('The Statue of Liberty', 14, 'monument', 'The Statue of Liberty is a colossal neoclassical sculpture designed by the French sculptor, Frederic Bartholdi, and was given to the U.S. by the people of France.  It is located on Liberty Island in New York Harbor.  The statue represents Libertas, the Roman goddess of freedom.',	'Statue of Liberty, Liberty Is, NY', 'First boat departs for Liberty Island at 9:30 am.  The last boat off of Liberty Island is at 5:00 pm.  Closed December 25th.', 'Y', 'http://www.nps.gov/stli/index.htm', 'usaImages/statue_of_liberty.jpg'),
('Times Square', 14, 'district or market', 'Times Square is a major commercial intersection and site of the annual ball drop on New Year''s Eve at One Times Square, The New York Times headquarters.', 'Times Square, New York, NY', 'N/A', 'N', 'http://www.timessquarenyc.org/', 'usaImages/times_square.jpg'),

('Arc de Triomphe', 15, 'monument', 'The Arc de Triomph honours those who fought and died for France in the French Revolutionary and Napoleonic Wards. The names of all French victories and generals are inscribed on its inner and outer surfaces. Beneath its vault lies the Tomb of the Unknown Soldier from World War I.', 
'Arc de Triomphe, 150 Avenue des Champs-Elysees, 75008 Paris, France', 'April 1 to September 30 from 10a.m.-11p.m. and October 1 to March 31 from 10a.m.-10:30p.m.', 
'Y', 'N/A', 'franceImages/ArcDeTriomphe.jpg'),
('Basilique du Sacre-Coeur', 15, 'religious building', 'The Basilica of the Sacret Heart of Jesus is located at the summit of the butte Montmartre, the highest point in the city. It was built in the decades following the French Revolution. The mosaic its apse, entitled Christ in Majesty is among the largest in the world. The top of the dome is open to tourists and provides a panoramic view of Paris.', 
'Basilique du Sacre-Coeur, 35 Rue du Chevalier de La Barre, 75018 Paris, France', 'Open daily from 6:00a.m. to 11:00p.m.', 
'N', 'http://www.sacre-coeur-montmartre.com/', 'franceImages/BasiliqueDuSacreCoeur.jpg'),
('Eiffel Tower', 15, 'tower', 'The Eiffel Tower is the tallest building in Paris and the most-visited paid monument in the  world. It was built as the entrance arch to the 1889 World''s Fair. It is 324 meters tall and is the most prominent symbol of both Paris and France.', 
'Eiffel Tower, Champ de Mars, 75007 Paris, France', 'January 1st to June 14th 9:30a.m.-11:00p.m, June 15th to September 1st 9:00a.m.-12:00a.m., September 2nd to December 31st 9:30a.m.-11:00p.m.', 
'Y', 'http://www.tour-eiffel.com', 'franceImages/EiffelTower.jpg'),
('Notre Dame de Paris', 15, 'religious building', 'Notre Dame de Paris is widely considered one of the finest examples of French Gothic architecture in France and in Europe. It was among the first buildings in the world to use the flying buttress. Its treasury houses a reliquary with the purported Crown of Thorns.', 
'Cathedrale Notre Dame de Paris, 2 Bis Rue Cloitre Notre Dame, 75004 Paris, France', 'Open every day of the year from 8:00a.m. to 6:45p.m. (7:15p.m. on Saturdays and Sundays)', 
'N', 'http://www.notredamedeparis.fr', 'franceImages/NotreDameDeParis.jpg'),
('The Louvre', 15, 'museum', 'The Louvre is one of the world''s largest museums and the most visited art museum in the world. The museum contains more than 380,000 objects and displays 35,000 works of art in eight curatorial departments including Egyptian, Near Eastern, Greek, Etruscan and Roman antiquities. Its most popular attraction however, is the Mona Lisa.', 
'Musee Du Louvre, Mo Palais-Royal / musee du Louvre, 75001 Paris, France', 'Open Mondays, Thursdays, Saturdays and Sundays from 9a.m. to 6p.m. Open Wednesdays and Friday from 9a.m. to 10p.m. Closed Tuesdays.', 
'Y', 'http://www.louvre.fr/llv/commun/home.jsp?bmLocale=en', 'franceImages/TheLouvre.jpg'),

('Chateau d''If', 16, 'other', 'The Chateau d''If is a small fortress located on the island of If about a mile offshore in the Bay of Marseille. It is famous for being one of the settings of Alexandre Dumas'' The Count of Monte Cristo. It was once an escape-proof prison similar to Alcatraz in California. Mark Twain visited the Chateau in 1867 and wrote about it in The Innocents Abroad.', 
'Chateau d''If, Marseille, France', 'Open daily from 9:30a.m. to 5:30p.m.', 
'Y', 'N/A', 'franceImages/ChateauDIf.jpg'),
('La Vieille Charite', 16, 'museum', 'La vielle charite is a former almshouse now functioning as a museum and cultural center. It is a small Baroque style building designed by the famous french sculptor, painter and architect Pierre Puget. It contains the Museum of Mediterranean Archeology, the Museum of Art of Africa, a research library specialising in archological documents, a school of advanced studies in the social sciences and offices of the Centre National de la Recherche Scientifique.', 
'Centre de la Vieille Charite, 2 Rue de la Charite, 13002 Marseilles, France', 'Open from 10:00a.m. to 5:00p.m. from October 1 to May 31 and from 11:00a.m. to 6:00p.m. from June 1 to September 30.', 
'N', 'http://www.vieille-charite-marseille.org/', 'franceImages/VieilleCharite.jpg'),
('Notre-Dame de la Garde', 16, 'religious building', 'Notre-Dame de la Garde is a Neo-Byzantine church that sits on a 532 foot limestone outcrop on the south side of the Old Port. It is the site of a poplular annual pilgimage every Assumption Day (August 15). Its 42 foot belfry supports a 27 foot tall statue of the Madonna and Child made out of copper gilded with gold leaf.', 
'Notre-Dame de la Garde, Marseille, France', 'Open daily from 7a.m. to 7p.m.', 
'N', 'N/A', 'franceImages/NotreDameDeLaGarde.jpg'),
('Old Port of Marseille', 16, 'harbour', 'The Old Port of Marseille (Vieux-Port) has been the natural harbour of Marseille since antiquity. It was once a major landmark comparable to the Eiffel tower in Paris before it was destroyed in the Battle of Marseille. It is home to St. Vivtor''s Abby and was the setting of The Count of Monte Cristo by Alexandre Dumas.', 
'Old Port of Marseille, Marseilles, France', 'N/A', 
'N', 'N/A', 'franceImages/OldPortMarseille.jpg'),
('Parc Longchamp', 16, 'garden or park', 'The Parc Longchamp is a municipal park surrounding the Palais Longchamp which houses the city''s museum of fine arts and natural history museum. The park is listed by the French Ministry as one of the Notable Gardens of France. The parck contains a large, ornate fountain and a classic garden a la francaise known as the Jardin du plateau.', 
'Parc Longchamp, Boulevard Claude Charles Guillaume Philippon, Marseille, France', 'N/A', 
'N', 'N/A', 'franceImages/ParcLongchamp.jpg'),

('Arch of Constantine', 17, 'other', 'The Arch of Constantine was erected to commemorate Constantine I''s victory over Maxentius at the Battle of Milvian Bridge in 312. The main archway is decorated with reliefs depicting victory figures with trophies and smaller archways show river gods. The column bases and spandrel reliefs are from the times of Constantine. An inscription praises Constantine and dedicates the arch to him.', 
'Arch of Constantine, Via di San Gregorio, Rome, Italy', 'N/A', 
'N', 'N/A', 'italyImages/ArchOfConstantine.jpg'),
('Colosseum', 17, 'theatre', 'The collosseum is an ancient elliptical ampitheater inn the center of Rome. It is was capable of seating 50,000spectators and was used for gladiator contests and public spectacles such as executions and dramas based on Classical mythology. It is one of Romes most popular tourist attractions.', 
'Colosseo, Piazza del Colosseo, Roma, Italia', 'March 1 to October 31 from 9a.m. - 6:30p.m., November 1 to February 28 from 9:00a.m. - 3:00p.m.', 
'Y', 'N/A', 'italyImages/Colosseum.jpg'),
('Pantheon', 17, 'religious building', 'The Pantheon is a building in Rome comissioned by Marcus Agrippa as a temple to all the gods of Ancient Rome. It is one of the best preserved Roman buildings and has been in continuous use throughout history. Since the 7th century it has been used as a Roman Catholic church and contains examples of both ancient roman and roman catholic artistry.', 
'Pantheon, Piaza della Rontonda, l-00186 Rome, Italy', 'Open every day from 8:30a.m. to 7:30p.m. (6:30p.m. on sundays)', 
'N', 'N/A', 'italyImages/Pantheon.jpg'),
('Piazza del Popolo', 17, 'district or market', 'Piazza del Popolo was once the beginning of the Via Flaminia of ancient rome, the most important rout to the north. The layout of the piazza was designed in neoclassical style between 1811 and 1822 by Giuseppe Valadier. An Egyptian obelisk of Ramesses II stands in the center of the plazza. The piazza is decorated with fountains and churches displaying a mixture of ancient Roman and Egyptian imagry.', 
'Piazza del Popolo, Rome, 00186 Italy', 'N/A', 
'N', 'N/A', 'italyImages/PiazzaDelPopolo.jpg'),
('Trevi Fountain', 17, 'monument', 'The Trevi Fountain is one of the most famous fountains in the world. A trditional legend of the fountain is that if a visitor throws a coin into the fountain, they are ensured a return to Rome. Another is that tossing two coins into the fountain will lead to a romance and three will will ensure either a marriege or a devorce. An estimated 3,000 euros are thrown into the fountain each day.', 
'Piazza di Trevi, 00187 Rome, Italy', 'N/A', 
'N', 'http://www.trevifountain.net/', 'italyImages/TreviFountain.jpg'),

('Castello Sforzesco', 18, 'palace or castle', 'Castello Sforzesco is a castle that used to be the seat and residence of the Duchy of Milan and is one of the biggest citadels in Europe. It now houses several of the city''s museums and art art collections. The Pinacoteca del Castello Sforzesco holds an art collection that includdes Michelangelo''s last sculpture, the Rondanini Pieta, Andrea Mantegna''s Trivulzio Madonna and Leonardo da Vinci''s Codex Trivulzianus manuscript.', 
'Castello Sforzesco, Piazza Castello, 20121 Milan, Italy', 'Open daily from 7:00a.m. to 6:00p.m. in the winter and from 7:00a.m. to 7:00p.m. in the summer', 
'N', 'http://www.milanocastello.it/ing/home.html', 'italyImages/CastelloSforzesco.jpg'),
('Galleria Vittorio Emanuele II', 18, 'other', 'The Galleria Vittorio Emanuele II is a covered double arcade formed of two glass-vaulted arcades at right angles intersection in an octagon. The central space is topped with a glass dome. It was an important step in the evolution of the modern glazed and enclosed shopping mall and inspired the Eiffel Tower in Paris. It conects La Scala and Milan Cathedral and contains a variety of ultra-luxury shops, restaurants and hotels.', 
'Galleria Vittorio Emanuele II, 20121 Milano, Italy', 'Open 24/7, but shop and hotel opening hours vary.', 
'N', 'N/A', 'italyImages/GalleriaVittorioEmanueleII.jpg'),
('La Scala', 18, 'theatre', 'La Scala is a world renowned opera house in Milan. Most of Italy''s greatest operatic artists and many of the finest singers from other nations, too, have appeared at La Scala during the past 200 years. It is still one of the leading opera and ballet theaters of the world and is home to the La Scala Theater Chorus, La Scala Theatre Ballet and La Scala Theatre Orchestra.', 
'La Scala, Via Filodrammatici, 2, 20121 Milano, Italy', 'Performance times vary.', 
'Y', 'http://www.teatroallascala.org/en/index.html', 'italyImages/LaScala.jpg'),
('Milan Cathedral', 18, 'religious building', 'The Cathedral of Milan is the seat of the Archbishop of Milan. The Gothic cathedral took five centuries to complete and is the largest Gothic cathedral (second largest Catholic cathedral) in the world. The cathedral contains the sarcophogi of several archbishops and a famous statue of the St. Bartholomew by Marco D''Argate.', 
'Duomo di Milano, Piazza del Duomo, 20121 Milano, Italy', 'Open every day from 6:50a.m. to 7:00p.m.', 
'N', 'N/A', 'italyImages/MilanCathedral.jpg'),
('Via Monte Napoleone', 18, 'district or market', 'Via Monte Napoleone is an elegant an expensive street in Milan, Italy. It is the most important street of the Milan Fashion District where many well-known fashion designers have their high-end boutiques and stores from Italian designers to all the world famous brands. The most exclusive Italian shoemakers maintain boutiques on this street. Via Monte Napoleone is reguarded as the most important street of fashion.', 
'Via Monte Napoleone, 20121 Milan, Italy', 'Open 24/7, but shop opening hours vary.', 
'N', 'http://www.viamontenapoleone.org/eng/home.php', 'italyImages/ViaMonteNapoleone.jpg'),

('Batu Caves', 19, 'religious building', 'The Batu Caves is a limestone hill which leads to a series of caves and cave temples. It is one of the most popular Hindu shrines outside of india. In 2006 a 140 foot high statue of Lord Muruga was unveiled at the bottom of the 272 step staircase. The caves are around 400 million years old and were used as shelter by the indigenous Temuan people.', 
'Batu Caves, Selangor, Malaysia', 'Open daily from 7:00a.m. to 6:00p.m.', 
'N', 'N/A', 'malaysiaImages/BatuCaves.jpg'),
('Kuala Lumpur Tower', 19, 'tower', 'Kuala Lumpur Tower (also known as Menara Kuala Lumpur or KL Tower) is a communications tower that is 1,381 feet tall, making it the second tallest freestanding tower in the world. The trunk of the tower contains a stairwell and high-speed elevator that leads to a revolving restaurant at the top, providing visitors a panoramic view of the city. Races are organized yearly where participants race up the stairs to the top.', 
'KL Tower, Kuala Lumpur, Malaysia', 'Open daily from 9:00a.m. to 10:00p.m.', 
'Y', 'http://www.menarakl.com.my/', 'malaysiaImages/KualaLumpurTower.jpg'),
('Masjid Negara', 19, 'religious building', 'Masjid Negara is the national mosque of Malaysia and one of the largest mosques in Asia. It has a capacity of 15,000 people and is situated among 13 acres of beautiful gardens. Its key features are a 73-meter-high minaret and an 18-pointed star concrete main roof. Reflecting pools and fountains spread throughout the compound.', 
'National Mosque (Masjid Negara), Kuala Lumpur, Malaysia', 'Open daily from 9:00a.m. to 6:00p.m. except during Friday prayers 2:45p.m. to 6p.m.', 
'N', 'http://www.masjidnegara.gov.my/portal/', 'malaysiaImages/MasjidNegara.jpg'),
('National Museum of Malaysia', 19, 'museum', 'The National Museum of Malaysia is a museum dedicated to the local history, culture, traditions, arts, economic activities, flora, fauna, weapons and currency of Malaysia. It also includes the National Sports Gallery and the Natural History Gallery. Among its attractions is an original-size old Terengganu timber palace known as Istana Satu.', 
'Muzium Negara, Jalan Damansara, Kuala Lumpur, 50566 Malaysia', 'Open daily from 9:00a.m. to 6:00p.m.', 
'Y', 'http://www.muziumnegara.gov.my/', 'malaysiaImages/NationalMuseumOfMalaysia.jpg'),
('Petronas Towers', 19, 'tower', 'The Petronas Towers (also called the Petronas Twin Towers or KLCC) were the tallest buildings in the world before 2004 when they were surpassed by Taipei 101, but remain the tallest twin buildings. Although the towers are used as company office buildings, the buildings also contain an upmarket retail podium, a park, one of the largest shopping malls in Malaysia and the highest two storey bridge in the world whih crosses the two towers.', 
'Petronas Twin Towers, Kuala Lumpur City Centre, 50088 Kuala Lumpur, Malaysia', 'Open daily from 9:00a.m. to 7:00p.m. (on Mondays it closes for prayer at 1-2:30p.m.)', 
'N', 'http://www.petronastwintowers.com.my', 'malaysiaImages/PetronasTowers.jpg'),

('Cheong Fatt Tze Mansion', 20, 'palace or castle', 'The Cheong Fatt Tze Mansion was built by the merchant Cheong Fatt Tze at the end of the 19th century. It is a distinct indigo-blue in color, has 38 rooms, 5 granite-paved courtyards, 7 staircases and 220 vernacular timber louvre windows. The architecture of the mansion originates from the Su Chow Dynesty Period in China. It was built with careful attention to the principles of Feng Shui. The mansion has appeared in several films and won awards for conservation.', 
'Cheong Fatt Tze Mansion Lebuh Leith Georgetown, Pulau Pinang Malaysia', 'Now functions as hotel, where one can book a room if they please.', 
'Y', 'http://www.cheongfatttzemansion.com/', 'malaysiaImages/CheongFattTzeMansion.jpg'),
('Fort Cornwallis', 20, 'other', 'Fort Cornwallis is an old star-shaped fort located on the northeastern coast of Penang. It is the largest standing fort in Malaysia. Captain Sir Francis Light took possession of the island from the Sultan of Kedah in 1786 and built the original fort. Old cannons decorate the fort. Today, it has become one of Penang''s prime tourist attractions.', 
'Fort Cornwallis, Georgetown, Penang, Malaysia', 'Open daily from 8:30a.m. to 7:00p.m.', 
'Y', 'N/A', 'malaysiaImages/FortCornwallis.jpg'),
('Khoo Kongsi', 20, 'religious building', 'The Khoo Kongsi is a large Chinese clanhouse with elaborate and highly ornamented architecture. The famous Khoo Kongsi is the grandest clan temple in the country. It is also one of the city''s major historic attractions. The clan temple has retained its authentic historic setting, which includes an association building, a traditional theatre and the late 19th century rowhouses for clan members, all clustered around the granite-paved square.', 
'Khoo Kongsi, 18 Cannon Square, 10200 Penang, Malaysia, Pulau Pinang, 10200, Malaysia', 'Open daily from 9:00a.m. to 5:00p.m.', 
'Y', 'http://www.khookongsi.com.my/', 'malaysiaImages/KhooKongsi.jpg'),
('Penang Botanic Gardens', 20, 'garden or park', 'The Penang Botanic Gardens are also known as the Waterfall Gardens because of the cascading waterfall nearby. The gardens occupy a valley described as an amphitheatre of hills covered with lush tropical rain-forests. It is Penang''s unique natural heritage, being the only garden of its kind in Malaysia and a popular tourist destination.', 
'Botanical Garden, Jalan Upper Circular, George Town, Penang, Malaysia', 'Open daily from 5:00a.m. to 8:00p.m.', 
'N', 'http://www.penangbotanicgardens.gov.my/', 'malaysiaImages/PenangBotanicGardens.jpg'),
('Penang Hill Railway', 20, 'other', 'The Penang Hill Railway was a two section funicular railway which climbed Penang Hill. The total journey took about hal and hour, with passengers changing cars at the mid-point station. The construction of the railway took place between 1906 to 1923 at the cost of 1.5 million Straits dollars. The railway has been closed while being upgraded, but the new train service will begin early this year.', 
'Penang Hill Railway Station, Pulau, Pinang, Malaysia', 'Train service will resume by the end of March.', 
'Y', 'N/A', 'malaysiaImages/PenangHillRailway.jpg'),


('Chinese Garden of Friendship', 21, 'garden or park', 'The Chinese Garden of Friendship was designed by Sydney''s Chinese sister city, Guangzhou in China. Sydney''s Chinatown complements the area''s already rich Chinese heritage and culture. The gardens were officially opened in 1988 as part of Sydney''s bicentennial celebrations and they were named the Garden of Friendship symbolizing the bond established between China and Australia.  The whole garden cannot be seen from any point within the garden. The garden has a number of features including the Dragon Wall sybolizing the bond between New South Wales and Guangzhou, the Water Pavilion of Lotus Fragrance, the Twin Pavilion and The Tea House that offers traditional Chinese tea and other refreshments.', 'Chinese Garden of Friendship, Murray Street, Sydney, New South Wales, Australia', 'Open daily from 9.30am to 5.30pm excluding Good Friday and Christmas Day', 'Y', 'http://www.chinesegarden.com.au', 'australiaImages/chineseFriendshipGarden.jpg' ),
('Royal Botanic Gardens', 21, 'garden or park', 'The Royal Botanic Gardens is a place of natural beauty, where people come for peace, relaxation, education, and to learn more about plants and horticulture. The surrounding parkland of the Domain is a place for sport, entertainment and recreation. The National Herbarium of NSW - centre for plant conservation & research - is located within the Royal Botanic Gardens.  The Royal Botanic Gardens are also home to a colony of over 22,000 Grey-headed Flying Foxes, a large species of fruitbat.', 'Royal Botanic Gardens, Mrs Macquaries Road, Sydney, New South Wales, Australia', 'Open Monday to Sunday daylight hours', 'N', 'http://www.rbgsyd.nsw.gov.au/welcome_to_bgt/royal_botanic_garden', 'australiaImages/royalBotanicGardens.jpg' ),
('Sydney Harbour Bridge', 21, 'bridge', 'The Sydney Harbour Bridge is a steel through arch bridge across Sydney Harbour that carries rail, vehicular, bicycle and pedestrian traffic between the Sydney central business district (CBD) and the North Shore. The bridge is locally nicknamed The Coat Hanger because of its arch-based design.  Under the directions of Dr J.J.C. Bradfield of the NSW Department of Public Works, the bridge was designed and built by English firm Dorman Long and Co Ltd of Middlesbrough, and opened in 1932.   According to the Guinness World Records, it is the world''s widest long-span bridge.  It is also the fifth longest spanning-arch bridge in the world, and it is the tallest steel arch bridge, measuring 134 metres (440 ft) from top to water level.   The Sydney Harbour Bridge has become a major adventure with the opening in 1998 of Bridge Climb Sydney, a company which conducts tours over the arch. Clad in overalls and clipped to a safety line, you can walk and climb 1500 metres over the arch.  A challenge for the faint-hearted, the traverse attracted thousands of people in its first year. The climb is open to anyone over 12 who is fit enough to handle some steep climbs on metal ladders and can cope with heights.', 'Sydney Harbour Bridge Pylon Lookout, Sydney Harbour Bridge, Sydney Australia 2000, Australia', 'Always open', 'N',  'http://www.cityofsydney.nsw.gov.au/aboutsydney/historyandarchives/sydneyhistory/historicbuildings/sydneyharbourbridge.asp', 'australiaImages/sydneyharbourbridge.png'),
('Sydney Opera House', 21, 'theatre', 'Contrary to its name, the building houses multiple performance venues. As one of the busiest performing arts centres in the world, hosting over 1,500 performances each year attended by some 1.2 million people, the Sydney Opera House provides a venue for many performing arts companies including the four key resident companies Opera Australia, The Australian Ballet, the Sydney Theatre Company and the Sydney Symphony Orchestra, and presents a wide range of productions on its own account. It is also one of the most popular visitor attractions in Australia, with more than seven million people visiting the site each year, 300,000 of whom take a guided tour.', 'Sydney Opera House, Sydney Harbour Tunnel, Sydney, New South Wales, Australia', 'The Main Box Office is open Monday to Saturday from 9am to 8.30pm, on Sunday it is open 2 hours prior to performances.  Closed Christmas Day and Good Friday.', 'Y', 'http://www.sydneyoperahouse.com/',  'australiaImages/sydneyoperahouse.jpg'),
('Sydney Tower', 21, 'tower', 'Sydney Tower (also known as the AMP Tower, AMP Centrepoint Tower, Centrepoint Tower or just Centrepoint) is Sydney''s tallest free-standing structure, and the second tallest in Australia. It is also the second tallest observation tower in the Southern Hemisphere.  The Sydney Tower is a member of the World Federation of Great Towers.  The golden turret has a capacity of 960 persons and contains two levels of restaurants, a coffee lounge, an Observation Deck, two telecommunication transmission levels and three plant levels.  Sydney Tower is the first to see the Sydney dawn, and the last to see its final dusk.  Ranked as one of the safest buildings in the world, the design has made the tower capable of withstanding earthquakes and extreme wind conditions.', 'Sydney Tower Restaurant, Market Street, Sydney, New South Wales, Australia', 'Open 7 days a week 364 days a year from 9:00am to 10:30pm. Closed on Christmas Day.', 'Y', 'http://sydneytower.myfun.com.au/', 'australiaImages/sydneyTower.jpg'),

('Great Barrier Reef', 22, 'natural landmark', 'The Great Barrier Reef is the world''s largest reef system composed of over 2,900 individual reefs and 900 islands stretching for over 1,600 mi. over an area of approximately 133,000 sq mi.   The Great Barrier Reef can be seen from outer space and is the world''s biggest single structure made by living organisms.  This reef structure is composed of and built by billions of tiny organisms, known as coral polyps. This reef supports a wide diversity of life, and was selected as a World Heritage Site in 1981.   CNN labeled it one of the seven natural wonders of the world.  A large part of the reef is protected by the Great Barrier Reef Marine Park, which helps to limit the impact of human use, such as fishing and tourism. A variety of boat tours and cruises are offered, from single day trips, to longer voyages. Boat sizes range from dinghies to superyachts.   Glass-bottomed boats and underwater observatories are also popular, as are helicopter flights.   By far, the most popular tourist activities on the Great Barrier Reef are snorkelling and diving, for which pontoons are often used, and the area is often enclosed by nets. The outer part of the Great Barrier Reef is favoured for such activities, due to water quality.', 'Great Barrier Reef Airport, Hamilton Island, Queensland, Australia', 'Always open', 'N', 'http://www.greatbarrierreef.org/', 'australiaImages/Great_Barrier_Reef.jpg'),
('Lone Pine Koala Sanctuary', 22, 'other', 'Founded in 1927, it is the world''s oldest and largest Koala Sanctuary.  Rated one of the ''Top 10 Zoos in the World'' by AOL, Lone Pine Koala Sanctuary in Brisbane, Australia, is the world''s first and largest koala sanctuary, with over 130 koalas. Cuddle a koala anytime, handfeed kangaroos and encounter a large variety of Aussie wildlife, all in beautiful, natural settings. Don''t forget to feed the lorikeets and meet our platypus too.', 'Lone Pine Koala Sanctuary, Jesmond Road, Fig Tree Pocket, Queensland, Australia', 'Open daily from 8:30am to 5:00pm everyday except 1:30pm to 5:00pm Anzac Day, (April 25) and 8:30am to 4:00pm Christmas Day', 'Y', 'http://www.koala.net/index.php', 'australiaImages/lonepinekoala.png'),
('Queensland Art Gallery', 22, 'other', 'The Gallery''s philosophy is to connect art and people. It is a symbol of the State''s artistic and cultural development and has human qualities and unique attractions which encourage people to visit the collections.  The primary orientation element of the Gallery''s design is the Watermall that separates the tranquil environment of the exhibition galleries from the proactive environments of the administration, education and library areas.  As well as having a permanent display of fine paintings and sculptures, the Queensland Art Gallery also holds many art exhibitions, by both international and national artists.', 'Queensland Art Gallery, Stanley Street, South Brisbane, Queensland, Australia', 'Open Monday to Friday 10.00am - 5.00pm, Saturday and Sunday 9.00am - 5.00pm, Closed Christmas Day and Good Friday, Open Anzac Day 12 noon - 5.00pm, All other public holidays 9.00am - 5.00pm', 'N', 'http://qag.qld.gov.au/', 'australiaImages/Queensland_Art_Gallery.jpg'),  
('Roma Street Parkland', 22, 'garden or park', 'Roma Street Parkland is a popular gathering place for the people of Brisbane, and has established its self as a highlight destination for interstate and overseas visitors to Brisbane.  Roma Street Parkland is an oasis in the heart of Brisbane''s CBD offering spectacular surrounds for leisure, recreation and events. The Parkland is set over 16 hectares of green space and is the largest urban subtropical garden in the world.  Explore the Parkland''s changing landscapes set in five individually designed precincts.  The Queensland Government''s Department of Public Works manages and operates the Parkland.  Its vision is to establish the Parkland as ''a unique public open space which is a preferred destination for the leisure and recreation of all people. It will feature significant horticultural displays, events and activities.''', 'Roma Street Parkland, Parkland Blvd, Brisbane, Queensland, Australia', 'Always open', 'N', 'http://www.romastreetparkland.com', 'australiaImages/RomaStreetParkland.jpg'),
('Sciencentre', 22, 'museum', 'The Sciencentre aims to reveal the science and technology behind our everyday lives.  The Sciencentre is good for those who prefer to prod and dismantle exhibits rather than peer at them through a protective glass case. It''s great for children, with favourites including the ''perception tunnel'', which gives the impression of rotating although you remain stock still, and the ''Thongophone'', a set of giant pan pipes played by whacking the top with a flip-flop – all good rainy-day material.', 'Queensland Museum, Cultural Centre Tunnel, Brisbane, Queensland, Australia', 'Open 9:30am to 5:00pm daily, Anzac Day from 1:30pm - 5:00pm, Closed Christmas Day, Boxing Day, Good Friday', 'Y', 'http://www.southbank.qm.qld.gov.au/sciencentre/', 'australiaImages/Sciencentre.jpg'),

('Rainbow Bridge', '23', 'bridge', 'The Rainbow Bridge is a suspension bridge crossing northern Tokyo Bay between Shibaura Pier and the Odaiba waterfront development in Minato, Tokyo, Japan. The bridge is 798 metres (2,618 ft) long with a main span of 580 metres (1,903 ft). The towers supporting the bridge are white in color, designed to harmonize with the skyline of central Tokyo seen from Odaiba. There are lamps placed on the wires supporting the bridge, which are illuminated into three different colors, red, white and green every night using solar energy obtained during the day. The bridge has two separate walkways on the north and south sides of the lower deck; the north side offers views of the inner Tokyo harbour and Tokyo Tower, while the south side offers views of Tokyo Bay and occasionally Mount Fuji.', 'Rainbow Bridge, Japan', 'The walkways are open from 9:00am to 9:00pm in the summer and from 10:00am to 6:00pm in the winter.', 'N', 'N/A', 'japanImages/rainbow_bridge_pic.jpg'),
('Senso-ji', 23, 'religious building', 'Senso-ji is an ancient Buddhist temple located in Asakusa, Taito, Tokyo. It is Tokyo''s oldest temple and one of its most significant. It sits adjacent to the Asakusa Shinto Shrine. The temple is dedicatd to the bodhisattva Kannon, also known as Guan Yin or the Goddess of Mercy. This temple is the focus of Tokyo''s largest and most popular Shinto festivals, Sanja Matsuri, which takes place over 3-4 days in late spring. The Kaminarimon or Thunder Gate dominates the entrance to the temple.', 'Sensoji Temple, 2-3-1 Asakusa, Taitou-ku, Tokyo 111-0032', 'Open daily from 6:00am to 5:00pm.', 'N', 'http://www.senso-ji.jp/', 'japanImages/sensoji_pic.jpg'),
('Tokyo Imperial Palace', 23, 'palace or castle', 'Tokyo Imperial Palace is the main residence of the Emperor of Japan. It is a large park-like area and contains several buildings including the main palace, the private residences of the imperial family, an archives, museum and administrative offices. It is built on the site of the old Edo castle. The total area including the gardens is 7.41 square kilometres (2.86 sq mi). Located on the grounds of the Imperial Palace is a music hall, the Ninomaru Garden, a teahouse and Kitanomaru Park.', 'Tokyo Imperial Palace, 1-1 Chiyoda, Chiyoda-ku, Tokyo, Japan 100-8111', 'Open Tuesday through Thursday from 9:00am to 4:00pm', 'N', 'http://www.kunaicho.go.jp/eindex.html', 'japanImages/tokyo_imperial_palace_pic.jpg'),  
('Tokyo National Museum', 23, 'museum', 'Established 1872, the Tokyo National Museum is the oldest and largest museum in Japan. The museum collects, houses, and preserves a comprehensive collection of art works and archaeological objects of Asia, focusing on Japan. The museum holds over 110,000 objects, which includes 87 Japanese National Treasure holdings and 610 Important Cultural Property holdings. The museum also conducts research and organizes educational events related to its collection. The museum''s collections focus on ancient Japanese art and Asian art along the Silk Road. There is also a large collection of Greco-Buddhist art.', 'Tokyo National Museum, Japan', 'Open from 9:30am to 5:00pm. Closed on Mondays and year-end holidays (December 28 - January 1).', 'Y', 'http://www.tnm.go.jp/en/', 'japanImages/tokyo_national_museum_pic.jpg'),
('Tokyo Tower', 23, 'monument', 'Tokyo Tower is a communications and observation tower that stands 332.5 meters, making it the second tallest artificial structure in Japan. It is an Eiffel Tower-inspired lattice tower that is painted white and international orange to comply with air safety regulations. Over 150 million people have visited the tower since its opening. FootTown, a 4-story building located directly under the tower, houses museums, restaurants and shops. Guests can visit two observation decks. The 2-story Main Observatory is located at 492ft while the smaller Special Observatory reaches a height of 820ft. The 166 floodlights that illuminate the tower change color seasonally and occasionally for special events. Since 2000, the tower has been illuminated pink on October 1 in order to highlight the beginning of National Breast Cancer Awareness Month.', 'Tokyo Tower, 4-2-8 Minato, Tokyo 105-0011, Japan', 'Open daily from 9:00am to 10:00pm.', 'Y', 'http://www.tokyotower.co.jp/english/', 'japanImages/tokyo_tower_pic.jpg'),

('Fushimi Inari Taisha', 25, 'religious building', 'Fushimi Inari Taisha is the head shrine of Inari, located in Fushimi-ku, Kyoto, Japan. The shrine sits at the base of a mountain also named Inari, and includes trails up the mountain to many smaller shrines. Since in early Japan Inari was seen as the patron of business, each of the Torii is donated by a Japanese business. First and foremost though, Inari is the god of rice. Merchants and manufacturers worship Inari for wealth. Donated torii lining footpaths are part of the scenic view. Unlike most Shinto shrines, Fushimi Inari Taisha, in keeping with typical Inari shrines, has an open view of the main idol object (a mirror).', 'Fushimi Inari taisha, Kyoto, Japan', 'Always open.', 'N', 'http://inari.jp/', 'japanImages/fushimi_inari_taisha_pic.jpg'),
('Gion', 25, 'other', 'Gion is a district of Kyoto, Japan, originally developed in the Middle Ages, in front of Yasaka Shrine. The district was built to accommodate the needs of travelers and visitors to the shrine. It eventually evolved to become one of the most exclusive and well-known geisha districts in all of Japan. Gion remains dotted with old-style Japanese houses called machiya, which roughly translated means townhouse, some of which are ochaya or tea houses. These are traditional establishments where the patrons of Gion—from the samurai of old to modern-day businessmen—have been entertained by geiko and geisha in an exclusive manner for centuries. To this day, geiko and maiko (geisha in training) in full regalia can still be seen in the evenings as they move about through the streets of Gion to and from their various engagements at the ochaya. They dance and sing and they entertain for everyone.', 'Gion, Kyoto Prefecture, Japan', 'At the Gion Corner, from March to November, there are two shows daily at 7:00pm and 8:00pm. From December to February, there is one show at 7:00pm on selected days only', 'Y', 'N/A', 'japanImages/gion_pic.jpg'),
('Iwatayama Monkey Park', 25, 'garden or park', 'Iwatayama Monkey Park is a commercial park located in Arashiyama in Kyoto, Japan.  It is inhabited by a troop of over 170 Japanese macaque monkeys. The animals are wild but can be fed food purchased at the site. Once you reach the park on Mt Arashiyama, the attendants show you into a hut with wire fence covering the windows, here you can buy drinks for yourself, and food to give to the monkeys.', 'Iwatayama Monkey Park, Kyoto, Kyoto Prefecture, Japan', 'Open daily from 9:00am to 5:00pm, unless there is heavy rain or snow.', 'Y', 'http://www.kmpi.co.jp/English/english.htm', 'japanImages/iwatayama_monkey_park_pic.jpg'),
('Kinkakuji', 25, 'religious building', 'Kinkaku-ji is a Zen Buddhist temple in Kyoto, Japan. The garden complex is an excellent example of Muromachi period garden design. It is designated as a National Special Historic Site and a National Special Landscape, and it is one of 17 World Cultural Heritage sites in Kyoto. It is also one of the most popular buildings in Japan, attracting a large number of visitors annually. The top two stories of the pavilion are covered with pure gold leaf. The pavilion functions as a shariden, housing relics of the Buddha (Buddha''s Ashes).', 'Kinkaku-ji, 1 Kinkaku-ji-cho Kita-ku, Kyoto, Kyoto Prefecture 603-8361, Japan', 'Open daily from 9:00am to 4:00pm', 'Y', 'http://www.shokoku-ji.or.jp/english/e_kinkakuji/index.html', 'japanImages/kinkakuji_pic.jpg'),  
('Nijo Castle', 25, 'palace or castle', 'Nijo Castle is a flatland castle located in Kyoto, Japan. The castle consists of two concentric rings of fortifications, the Ninomaru Palace, the ruins of the Honmaru Palace, various support buildings and several gardens. The decoration of the castle includes lavish quantities of gold leaf and elaborate wood carvings, intended to impress visitors with the power and wealth of the shoguns. The sliding doors and walls of each room are decorated with wall paintings by artists of the Kano school.', 'Nijo Castle, Kyoto, Kyoto Prefecture, Japan', 'Open from 8:45am to 5:00pm. Closed on Tuesdays in January, July, Augest and September. Closed from December 26 to January 4.', 'Y', 'N/A', 'japanImages/nijo_castle_pic.jpg'),

('City Chambers', 24, 'government building', 'In the very heart of Glasgow stands one of the city''s most important and prestigious buildings – the City Chambers.  A grand and imposing edifice overlooking George Square, the City Chambers is an impressive symbol of Glasgow''s political strength and historical wealth. Completed in 1888, the City Chambers has for over a hundred years been the headquarters of successive councils serving the City of Glasgow.', 'City Chambers, Edinburgh, Scotland, United Kingdom', 'Public tours are conducted twice per day at 10.30am and 2.30pm. Closed on public holidays and weekends.', 'N', 'http://www.glasgow.gov.uk/en/YourCouncil/CityChambers/', 'scotlandImages/glasgow_city_chambers.jpg'),
('Glasgow Science Centre', 24, 'museum', 'Glasgow Science Centre is one of Scotland''s must-see visitor attractions - presenting concepts of science and technology in unique and inspiring ways. Glasgow Science Centre is an independent Scottish Charity the aims of which are: to create interactive experiences that inspire, challenge and engage to increase awareness of science for all in Scotland, to enhance the quality of science and technology learning, to communicate the role of leading edge science and technology in shaping Scotland''s future, to build partnerships to develop our national role in science communication and education, and to promote Scotland''s science, education and innovation capability.', 'Glasgow Science Centre, 50 Pacific Quay, Glasgow, Strathclyde G51 1EA, United Kingdom', 'From Monday 1st of November 2010 the Science Mall''s opening hours are:Monday & Tuesday - closed, Wednesday to Friday - 10am until 3pm, Saturday & Sunday - 10am until 5pm From the 1st of April, the Science Mall''s opening hours are: Monday to Sunday- 10am until 5pm.', 'Y'	, 'http://www.gsc.org.uk/ ', 'scotlandImages/glasgow_science_centre.jpg'),
('Glengoyne Distillery', 24, 'other', 'Within easy reach from Glasgow, Loch Lomond and Edinburgh, Glengoyne scotch whisky distillery is open all year round offering the most in-depth range of visits in the industry.  Glengoyne is proud to offer entertaining and in-depth distillery visits including the Master Blender tour where guests create their very own blended whisky. Please see below for our full programme of tours. The Glengoyne, Wee Tasting and Tasting tours run on the hour and no prior booking is required for groups of 10 or less.', 'Glengoyne Distillery, Glasgow G63 9LB, United Kingdom', 'March - November  First Tour: 10am - Last Tour: 4pm  Shop: 10am - 5pm December - February First Tour: 10am - Last Tour: 3pm  Shop: 10am - 4.30pm  Open 7 days. Tours run on the hour.', 'Y', 'http://www.glengoyne.com/scotch_whisky_distillery/', 'scotlandImages/Glengoyne-Distillery.jpg'),
('Kelvingrove Art Museum', 24, 'museum', 'Kelvingrove has 22 themed, state-of-the-art galleries displaying an astonishing 8000 objects.  The collections are extensive, wide-ranging and internationally-significant. They include:  natural history, arms and armour, art from many art movements and periods of history, and much more. We even have a real Spitfire!  Kelvingrove welcomes families with children, and its displays have been designed with children in mind. There are lots of interactives throughout the museum that will appeal to younger audiences.  Visitors to Kelvingrove can enjoy its cafes and shops, and make use of its Study Centre and Library to find out more about Glasgow Museums'' collections and carry out research online.', 'Kelvingrove Art Museum, Argyle Street, Glasgow G3 8AG', 'Monday to Thursday and Saturday 10am to 5pm,Friday and Sunday 11am to 5pm', 'N', 'http://www.glasgowlife.org.uk/museums/our-museums/kelvingrove/about-Kelvingrove/Pages/home.aspx', 'scotlandImages/Kelvingrove_Art_Museum.png'),
('Lighthouse', 24, 'other', 'The Lighthouse is: the national centre for architecture and design, an architecture and design centre with a difference, a hub for Scotland''s creative industries.  The Lighthouse, Scotland''s first, dedicated, national centre for architecture and design, was opened by HM Queen Elizabeth in July 1999. The centre''s vision is to develop the links between art, design and architecture, seeing these as interconnected social, educational, economic and cultural issues of concern to everyone. There is also a conference centre, shop and two cafes.', 'The Lighthouse, 11 Mitchell Lane  Glasgow G1 3LX', 'Monday, Wednesday, Thursday, Friday & Saturday 10:30 am - 5:00pm Tuesday 11:00 am - 5:00pm Sunday 12:00 pm - 5:00pm', 'N', 'http://www.glasgow.gov.uk/en/Visitors/TheLighthouse/', 'scotlandImages/lighthouse.jpg'),

('Camera Obscura and World of Illusions', 26, 'other', 'The Camera Obscura show is a fascinating and highly amusing way to see the city and learn about its history. This unique experience has delighted and intrigued people for over 150 years. It is a ''must'' on any visit to Edinburgh.  From inside this mysterious Victorian rooftop chamber, you see live moving images of Edinburgh projected onto a viewing table through a giant periscope. Pick people up on your hands, squash them to a pulp and even make the traffic climb over paper bridges.  Our friendly guide will entertain you while telling stories of Edinburgh, past and present, in an engaging and informative way. Our visitors are truly amazed at how, in this age of high technology, a simple array of mirror, lenses and daylight can produce this incredible panorama. Experiencing the Camera Obscura is like stepping back in time!', 'Camera Obscura & World of Illusions, 549 Castlehill, Edinburgh EH1 2ND, United Kingdom', 'July & August: Every day 09:30 - 19:30,   September & October: Every day 09:30 - 18:00, November - March:  Every day 10:00 - 17:00 Except Christmas Day, April - June: Every day 09:30 - 18:00', 'Y', 'http://www.camera-obscura.co.uk/index.asp', 'scotlandImages/camera-obscura.jpg'),
('Edinburgh Castle', 26, 'palace or castle', 'Edinburgh Castle is a castle fortress which dominates the skyline of the city of Edinburgh, Scotland, from its position atop the volcanic Castle Rock. Human habitation of the site is dated back as far as the 9th century BC, although the nature of early settlement is unclear. There has been a royal castle here since at least the reign of David I in the 12th century, and the site continued to be a royal residence until the Union of the Crowns in 1603. As one of the most important fortresses in the Kingdom of Scotland, Edinburgh Castle has been involved in many historical conflicts, from the Wars of Scottish Independence in the 14th century, up to the Jacobite Rising of 1745, and has been besieged, both successfully and unsuccessfully, on several occasions. From the later 17th century, the castle became a military base, with a large garrison. Its importance as a historic monument was recognised from the 19th century, and various restoration programmes have been carried out since.', 'Edinburgh Castle, Castlehill, Edinburgh EH1 2NG, United Kingdom', '1 Apr - 30 Sep: 9:30am - 6pm, 1 Oct - 31 Mar: 9:30am - 5pm  Closed 25 and 26 December. On 1st January, the castle is open from 11am to 5pm.', 'Y', 'http://www.edinburghcastle.gov.uk', 'scotlandImages/Edinburgh_Castle.jpg'),
('Edinburgh Dungeon', 26, 'other', '500 years of Edinburgh''s darkest and most gory history, 11 actor led shows and 2 scary rides make the Edinburgh Dungeon an educationally chilling experience and a great day out for the whole family.', 'The Edinburgh Dungeon, Edinburgh, United Kingdom', 'The Edinburgh Dungeon is open 7 days a week, excluding Christmas day. Generally, on weekdays and weekends, it is open from 10:00am to 5:00pm.  See the site for more details (http://www.the-dungeons.co.uk/edinburgh/en/plan-your-visit/opening-times.htm).', 'Y', 'http://www.the-dungeons.co.uk/edinburgh/en/index.htm', 'scotlandImages/edinburgh-dungeon.jpg'),
('Royal Yacht Britannia', 26, 'other', 'Now in Edinburgh you are welcome on board to discover the heart and soul of this most special of royal residences.    The Royal Yacht Britannia is one of the world''s most famous ships. Launched at John Brown''s Shipyard in Clydebank in 1953, the Royal Yacht proudly served Queen and country for 44 years. During that time Britannia carried The Queen and the Royal Family on 968 official voyages, from the remotest regions of the South Seas to the deepest divides of Antarctica.  As 83rd in a long line of Royal Yachts that stretches back to 1660 and the reign of Charles II, Britannia holds a proud place in British maritime history. On 16 April 1953, Her Majesty''s Yacht Britannia rolled down the slipway at John Brown''s Clydebank Shipyard, on the start of her long and illustrious career. Commissioned for service in January 1954, Britannia sailed the oceans for 43 years and 334 days. She travelled a total of 1,087,623 nautical miles, calling at over 600 ports in 135 countries.  In June 1994, the Government announced that Her Majesty''s Yacht Britannia would be taken out of service. At the beginning of January 1997, Britannia set sail from Portsmouth to Hong Kong on her last and longest voyage. On 11 December 1997 Britannia was decommissioned at Portsmouth Naval Base in the presence of The Queen, The Duke of Edinburgh and 12 senior members of the Royal Family. Some 2,200 Royal Yacht Officers and Yachtsmen, together with their families, came to witness the ceremony.', 'The Royal Yacht Britannia, Ocean Terminal Leith Edinburgh EH6 6JJ Scotland', 'Britannia is open every day, except Christmas Day and New Year''s Day.  January, February, March, November, December: 10:00am to 3:30pm; April, May, June, October: 10:00am to 4:00pm; July, August, September: 9:30am to 4:30pm', 'Y', 'http://www.royalyachtbritannia.co.uk/', 'scotlandImages/royalYachtBrittannia.jpg'),
('St. Giles Cathedral', 26, 'religious building', 'There is record of a parish church in Edinburgh by the year 854, served by a vicar from a monastic house, probably in England. It is possible that the first church, a modest affair, was in use for several centuries before it was formally dedicated by the bishop of St Andrews on 6 October 1243. The parish church of Edinburgh was subsequently reconsecrated and named in honour of the patron saint of the town, St Giles, whose feast day is celebrated on 1 September. That St Giles, a 7th century hermit (and, later, abbot) who lived in France, became the patron of both town and church was probably due to the ancient ties between Scotland and France.  According to legend, Giles was accidentally wounded by a huntsman in pursuit of a hind and, after his death in the early 8th century, there were dedicated to him hospitals and safe houses for cripples, beggars and lepers were established throughout England and Scotland within easy reach of the impoverished and the infirm. St Giles is usually depicted protecting a hind from an arrow, which had pierced his own body, a fine relief of which rests in the tympanum over the west (main) doors of the Cathedral.', 'St. Giles Cathedral, Parliament Square, Edinburgh, Midlothian EH1 1RE, United Kingdom', 'Open to visitors all year except 25th after 11.30am service and 26th December and 1st and 2nd January.  Our opening hours are:  Summer (May-September):  Monday - Friday 09.00-19.00, Saturday 09.00-17.00, Sunday 13.00-17.00 and for services, Winter (October-April): Monday - Saturday 09.00-17.00, Sunday 13.00-17.00 and for services', 'N', 'http://www.stgilescathedral.org.uk/', 'scotlandImages/StGilesCathedral.jpg'),

('Franz Josef Glacier', 27, 'natural landmark',	'Franz Josef Glacier is a 12 km long glacier in Westland National Park, on the West Coast of the South Island of New Zealand.  The glacier was named after the Emperor Franz Joseph I of Austria by the German explorer, Julius von Haast in 1865.  It is one of the most accessible glaciers in the world.', 'Franz Josef Glacier, Westland National Park, West Coast, New Zealand', 'N/A', 'N/A', 'http://www.glaciercountry.co.nz/pages/6/franz-about-glacier-country.htm', 'newZealandImages/franz_josef_glacier.jpg'),
('Fox Glacier', 27, 'natural landmark', 'Fox Glacier is a 13 km long glacier in Westland National Park, on the West Coast of the South Island of New Zealand.  In 1872 it was named after the Prime Minister of New Zealand, Sir William Fox.  It is one of the most accessible glaciers in the world.', 'Fox Glacier, West Coast, New Zealand', 'N/A', 'N/A', 'http://www.glaciercountry.co.nz/pages/6/fox-about-glacier-country.htm', 'newZealandImages/fox_glacier.jpg'),
('Nzone Skydive', 27, 'other', 'It takes a certain kind of person to jump out an aircraft from 15,000ft. It takes courage. Harnessed to an experienced jumpmaster, expect sensory overload as you reach terminal velocity/200kph. The personal challenge is immense! Located amidst the most breathtaking scenery in the world, your flight to altitude takes you high above the alpine resort, over crystal clear lakes and snow-capped mountains. Freefall photographs/video packages available to capture your once in a lifetime experience.', 'Nzone Skydive Queenstown, Shotover Street, Queenstown, New Zealand', 'Open everyday except Christmas from 8:30am to 3:30pm', 'Y', 'http://www.nzone.biz/', 'newZealandImages/nzoneSkydive.jpg'),
('Onsen Hot Pools', 27, 'bath or spa', 'The Onsen Hot Pools experience is all about unwinding and soaking-up Queenstown''s spectacular scenery.  Immerse yourself in the views, the pure waters, and the fresh mountain air, as your mind and body surrenders to the deep penetrating warmth and gentle massage of our private pools. Housed in cedar-lined bathing rooms, complete with shower, changing area, breathtaking mountain views, and unique picture-windows that retract into the roof at the touch of a button. At night dim the lights and watch the southern constellations wheel past overhead!', 'Onsen Hot Pools, PO Box 209, Arrowtown, 160 Arthurs Point Road, Queenstown, New Zealand', 'Open 7 Days, 11am to 11pm ', 'Y', 'http://www.onsen.co.nz/home', 'newZealandImages/onsenHotPools.jpg'),
('Shotover Jet', 27, 'other', 'World famous as the ultimate jet boating experience, Shotover Jet has thrilled over 2.5 million people since 1970, and now it''s your turn! Take a unique breathtaking ride through dramatic and narrow Canyons, and hold on tight for Queenstown''s only exhilarating full 360 degrees spins. ''Can you handle the canyons? '' with award winning Shotover Jet, ''The World''s Most Exciting Jet Boating Ride'' and the only company permitted to operate in the spectacular Shotover River Canyons.  People from all over New Zealand and from all around the world visit Queenstown for two main reasons, scenery and adventure; Shotover Jet combines both of these in a unique, exhilarating and unforgettable way and is for many visitors the highlight of their Queenstown and New Zealand holiday.', 'Shotover Jet/Queenstown, Queenstown, New Zealand', 'Open everyday except Christmas from 9am to 4:30pm', 'Y', 'http://www.shotoverjet.com/', 'newZealandImages/shotoverJet.jpg'),

('Auckland Zoo', 28, 'other', 'Auckland Zoo has New Zealand''s largest collection of animals and is recognized as one of the most progressive zoos in the world. A winner of national and international environmental-related awards, it is home to 117 different species and over 700 animals. There is lots to see and do all year, including events, animal encounters, Zoom (behind the scenes) tours and more! ' , 'Auckland Zoo, Motions Road, Western Springs, Auckland, New Zealand', 'During summer (1 September to 30 April), Auckland Zoo is open every day from 9.30am to 5.30pm (except Christmas Day), with last admissions into the Zoo at 4.15pm.  During winter (1 May to 31 August), our hours are 9.30am - 5pm, with last admissions into the Zoo at 4.15pm.', 'Y', 'http://www.aucklandzoo.co.nz/', 'newZealandImages/aucklandZoo.jpg'),
('Eden Garden', 28, 'garden or park', 'Discover this wonderfully peaceful sanctuary in the heart of Auckland.  Wander through our 5.5 acre award-winning garden on the side of Mt Eden. Take a day or an hour to explore our many plant collections including perennials, vireyas, camellias, bromeliads and native New Zealand plants. There''s always something in bloom. Enjoy the waterfalls, rock formations, resident native birds and fabulous city and harbour views.', 'Eden Garden, Omana Avenue, Auckland, New Zealand', 'Open from 9 am to 4:30 pm during the Summer (1st September through 30th April) and 9 am to 4 pm during the Winter (1st May through 31st August). Closed on Christmas Day but open every other day of the year.', 'Y', 'http://www.edengarden.co.nz/', 'newZealandImages/edenGarden.jpg' ),
('Kelly Tarlton''s Antarctic Encounter and Underwater World', 28, 'other', 'A wonderland of snow, ice and amazing underwater sights. Travel through the Antarctic Encounter where you''ll discover, up close colonies of penguins playing in real ice and snow, swimming and plunging beneath the ice cap. Then follow on deep beneath the ocean in a glass tunnel and come face to face with sharks and other amazing creatures of the sea. For the brave-hearted, experience the interactive Stingray Bay by swimming with stingrays; or get in the shark tank and swim with real-life sharks!', 'Kelly Tarltons, Tamaki Drive, Orakei, Auckland, New Zealand', 'Open every day from 9am to 6pm', 'Y', 'http://www.kellytarltons.co.nz/', 'newZealandImages/kellyTarlton.jpg'),
('Sky Tower', 28, 'tower', 'A truly captivating experience awaits visitors to Auckland''s Sky Tower. At 328 metres, it is the tallest man-made structure in New Zealand and offers breathtaking views for up to 80 kilometres in every direction.  Travel up in the glass-fronted lifts to one of the three spectacular viewing platforms, or for more thrills and excitement, SkyWalk round the pergola at 192 metres up or SkyJump off the Tower!  Relax with a coffee and light refreshments at Sky Lounge, enjoy a seafood feast at The Observatory Restaurant or dine at Orbit - Auckland''s only 360-degree revolving restaurant.  Sky Tower is one of New Zealand''s most exhilarating and spectacular tourist attractions, you will be amazed at what you can see and do under one roof!', 'Sky Tower, Auckland, New Zealand', 'Sunday - Thursday 8.30am - 10.30pm, Friday & Saturday 8.30am - 11.30pm', 'Y', 'http://www.skycityauckland.co.nz/Attractions/Skytower.html', 'newZealandImages/skyTower.jpg'), 
('Snowplanet', 28, 'other', 'SNOWPLANET is New Zealand''s first and only all-year indoor snow resort where snow guests can experience the thrill of snow sports and the atmosphere of a snow village only 20 minutes north of Auckland.  Our goal is to be Auckland''s favourite leisure destination and we want to share awesome snow experiences with you year-round. Sharing is one of our key values and we think this includes not just Snowplanet sharing with you but also our guests sharing the experience with each other.  We set the highest standards for ourselves, from consistent snow to our delicious menu, and from our friendly welcome to the quality of our equipment. Come and visit us and you will see the values that we build our work into every day.', 'Snowplanet, Small Road, Silverdale, Auckland, New Zealand', 'Open 365 days a year.  Sunday - Saturday 10am to 10pm', 'Y', 'http://www.snowplanet.co.nz/', 'newZealandImages/snowPlanet.jpg'),

('Festung Hohensalzburg', 29, 'palace or castle', 'Also known as Hohensalzburg Castle, Festung Hohensalzburg (which literally means High Fortress of Salzburg) sits atop the Festungsberg and is one of the largest medieval castles in Europe.  Visitors can walk or take the cable railway to the top, where they have a fabulous panoramic view of the city.  Visitors can visit the fortress courtyards, towers, state rooms, and several museums, including the Fortress Museum and the Marionette Museum.  The fortress also hosts numerous concerts throughout the year.', 'Festung Hohensalzburg, Moenchsberg 34 5020 Salzburg', 'January-April and October-December: 9:30 am-5 pm;  May-September: 9 am-7 pm', 'Y', 'http://www.salzburg.info/en/sights/top10/hohensalzburg_fortress.htm/', 'austriaImages/festung_hohensalzburg_pic.jpg'),
('Hellbrunn Palace and Trick Fountains', 29, 'palace or castle', 'Hellbrunn, named for the clear spring that supplies it with water, was built in 1613-19 by Markus Sittikus von Hohenems, Prince-Archbishop of Salzburg.  The palace is famous for the watergames in the grounds, which are a popular tourist attraction in the summer months. These games were conceived by Markus Sittikus, a man with a keen sense of humour, as a series of practical jokes to be performed on guests. Notable features include stone seats around a stone dining table through which a water conduit sprays water into the seat of the guests when the mechanism is activated.', 'Hellbrunn, 5020 Salzburg, Austria', 'April, October, November 1: 9:00am-4:30pm; May, June, September: 9:00am-5:30pm; July, August: 9:00am-6:00pm; July, August: evening tours trick fountains: 7:00pm, 8:00pm, 9:00pm', 'Y', 'http://www.salzburg.info/en/sights/top10/hellbrunn_palace_trick_fountains.htm/', 'austriaImages/hellbrunn_pic.jpg'),
('Salzburg Cathedral', 29, 'religious building', 'Salzburg''s Cathedral is probably the city''s most significant piece of church architecture and its ecclesiastical center.  With its magnificent facade and mighty dome it represents the most impressive early Baroque edifice north of the Alps.  Among the precious objects to be found in Salzburg''s Cathedral are the baptismal font in which Wolfgang Amadeus Mozart was baptised, the majestic main organ, surrounded by angels playing instruments and crowned by Rupert and Virgil, as well as the magnificent Cathedral portals made by Scheider-Manzell, Matare and Manzu. In his capacity as the court organist and concert master, Wolfgang Amadeus Mozart composed numerous undying works of sacred music for Salzburg.', 'Domplatz 5020 Salzburg', '8:30am-5:30pm; October: 8:30am-5pm; December: 9am-4pm', 'N', 'http://www.salzburg.info/en/sights/churches_cemeteries/salzburger_dom.htm', 'austriaImages/salzburg_cathedral_pic.jpg'),
('St. Peter''s Archabbey', 29, 'religious building', 'Also known as St Peter''s Abbey, or Stift Sankt Peter in German, St Peter''s Archabbey is a Benedictine monastery.  It is considered one of the oldest monasteries in the German speaking area, if not in fact the oldest.  Two of the most famous aspects of St. Peter''s abbey are the Cemetery and Catacombs.  The cemetery is one of the most beautiful cemeteries in the world, while the catacombs are hewn out of the Moenchsberg rock.', 'St. Peter Bezirk 1, 5010 Salzburg', 'Summer 6:30am - 7:00pm; Winter 6:30am - 5:30pm', 'Y', 'http://www.salzburg.info/en/sights/churches_cemeteries/erzabtei_st_peter_friedhof.htm', 'austriaImages/st_peters_pic.jpg'),
('Untersbergbahn', 29, 'natural landmark', 'Visitors take a cable car ride up Untersberg, a mountain just outside Salzburg, and experience magnificent views of the Rositten Valley and the surrounding mountains.  From the cable car station at the top of the mountain, visitors can see the mountain climbers memorial or walk to the Salzburg Hochthron mountain, or simply enjoy a panoramic view of the city of Salzburg.', 'Untersbergbahn, Groedig, Oesterreich', 'January, February: 9am-4pm; March - June: 8:30am-5pm; July - September: 8:30am-5:30pm; October: 8:30am-5pm; December: 9am-4pm', 'Y', 'http://www.salzburg.info/en/sights/excursions/cable_car_untersberg.htm', 'austriaImages/untersbergbahn_pic.jpg'),

('Riesenrad', 30, 'other', 'The Wiener Riesenrad (German for Viennese giant wheel) is a giant Ferris wheel at the entrance of the Prater amusement park in Leopoldstadt.  It is one of the most popular tourist attractions in Vienna, and symbolises the city for many people.  One of the earliest Ferris wheels, the Riesenrad was build in 1897 to celebrate Emperor Franz Josef''s golden Jubilee.  The cars around the wheel are large gondolas, and from the top visitors can see the entire city.', 'Wiener Riesenrad, Wurstelprater 90, 1020 Vienna, Austria', 'Varies by season; open at least 10:00am-7:45pm', 'Y', 'http://www.wienerriesenrad.com/index.php??menu=&source=index&lang=en', 'austriaImages/riesenrad_pic.jpg'),
('Schoenbrunn Palace', 30, 'palace or castle', 'Schloss (Palace) Schoenbrunn is a former imperial 1400-room Rococo summer residence of Empress Sisi of the Habsburgs.  The palace and gardens illustrate the tastes, interests, and aspirations of successive of successive Habsburg monarchs.', 'Schloss Schoenbrunn, 1130 Wien, Oesterreich', 'April - June, September - October: 8:30am-5:00pm; July - August: 8:30am-6:00pm; November - March: 8:30am-4:30pm', 'Y', 'http://www.wien.info/en/sightseeing/sights/imperial/schoenbrunn-palace', 'austriaImages/schoenbrunn_pic.jpg'),
('Spanish Riding School', 30, 'sporting center or stadium', 'The Spanish Riding School (Spanische Hofreitschule in German) is a traditional riding school for Lipizzan horses, which perform in the Winter Riding School in the Hofburg.  The Riding School is built on four centuries of experience and tradition in classical dressage, and the headquarters in Vienna offers public performances as well as public viewings of some training sessions.', 'Spanische Hofreitschule, Michaelerplatz 1, 1010 Vienna, Austria', 'Visitor’s Center: Tuesday - Sunday, 09:00am-4:00pm; Shows available depending on the season', 'Y', 'http://www.srs.at/en', 'austriaImages/spanish_riding_school_pic.jpg'),
('Stephansplatz', 30, 'district or market', 'The Stephansplatz is a square in the geographical center of Vienna, named after its most prominent building, the Stephansdom cathedral.  Today, the Stephansplatz is a large shopping area, with an interesting mix of the medieval architecture of the cathedral and the glass and steel buildings of the surrounding shops.', 'Stephansplatz 1, 1010 Wien, Austria', 'N/A', 'N', 'N/A', 'austriaImages/stephansplatz_pic.jpg'),
('St. Stephen''s Cathedral', 30, 'religious building', 'St. Stephen''s Cathedral (Stephansdom in German) is Austria''s most eminent Gothic church.  Guided tours of the church are available, and visitors can climb the 343 steps to the tower-keeper''s room to enjoy a breathtaking view of the city.', 'Stephansdom, Stephansplatz 1, 1010 Wien, Oesterreich', 'Monday-Saturday: 6am-10pm; Sunday and holidays: 7am-10pm', 'Y', 'http://www.wien.info/en/sightseeing/sights/st-stephens-cathedral', 'austriaImages/stephansdom_pic.jpg')

");



//-- --------------------------------------------------------


//--
//-- Table structure for table `comments`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS comments (
  `comment_id` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `comment_name` varchar(50) NOT NULL default '',
  `comment_subject` varchar(50) NOT NULL default '',
  `comment_body` blob NOT NULL default '',
  `comment_date_submitted` timestamp NOT NULL default '2011-01-01 00:00:00'
)"); 


mysqli_query($db, "INSERT INTO `traveldb`.`comments` (`comment_name`, `comment_subject`, `comment_body`, `comment_date_submitted`) VALUES
 
 ('Kelsie', 'We need a better name!', 'Hey guys, so I was thinking...we need a new  name for our site!  I mean, TravelGuide is cool and all...but not very exciting.  So, what if we did something with out initials?  Or if we want to do something in a foreign language, we could use Los Geht''s, which means Let''s Go in German, so we could use that and other similar phrases from other languages.  Or, we could just wait and see if anybody else has any ideas...', '2011-02-22 10:45:00'),
 ('Amy', 'Name Suggestion', 'Hey there!! I agree with Kelsie. The name ''TravelGuide'' is pretty boring.  We could say ''Travel with K.A.R.E.'' or something like ''on the go''.  hmmm....I''m out of ideas at the moment.  I''ll try to think of more :) ', '2011-02-22 12:35:08'),
 ('Rebecca', 'Where''s a muse when you need one?', 'Okay, let''s see if a muse hits me on the head: ZABLE''S Home Travel Browser', '2011-02-22 23:06:06 '),
 ('Erin', 'Name stuff', 'I don''t really see what''s wrong with TravelGuide, but I guess I am kind of a boring person. How about something like Travellog 350 for our course name or CompuTour :P', '2011-02-23 21:22:04'),
 ('Kelsie', 'TravelGuide it is!', 'So...I guess we''re sticking with TravelGuide!', '2011-06-22 23:45:36')
");


//-- --------------------------------------------------------


//--
//-- Table structure for table `users`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS users (
  `user_id` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first_name` varchar(50) NOT NULL default '',
  `last_name` varchar(50) NOT NULL default '',
  `username` varchar(50) NOT NULL default '',
  `password` varchar(50) NOT NULL default '',
  `email` varchar(50) NOT NULL default '',
  
  `origin` varchar(50) NOT NULL default 'N/A',
  `homeCity` varchar(50) NOT NULL default 'N/A'

)"); 

mysqli_query($db, "INSERT INTO `traveldb`.`users` (`first_name`, `last_name`, `username`, `password`, `email`, `origin`, `homeCity`) VALUES
 
('Kelsie', 'Snyder', 'kelsie', '6cf37614036ededd1018fc3db8e809c3c1932850', 'kelsie.snyder@gmail.com', 'United States of America', 'Springfield, VA'),
('Rebecca', 'Zeitz', 'raz', SHA('raz'), 'rebecca.zeitz@gmail.com', 'United States of America', 'Fredericksburg, VA'),
('Amy', 'Sams', 'asams', SHA('pass'), 'asams@mail.umw.edu', 'United States of America', 'Stafford, VA')
");


//-- --------------------------------------------------------

//--
//-- Table structure for table `userCountries`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS userCountries (
  `user_id` int(6) NOT NULL ,
  `country_id` int(6) NOT NULL ,
  FOREIGN KEY (`country_id`)
  REFERENCES countries (country_id),
  FOREIGN KEY (`user_id`)
  REFERENCES users (user_id)

)"); 

mysqli_query($db, "INSERT INTO `traveldb`.`userCountries` (`user_id`, `country_id`) VALUES

(1, 1), 
(1, 3),
(1, 5),
(1, 7),
(1, 9),
(1, 15),
(2, 7)
");
//-- --------------------------------------------------------
//
//--
//-- Table structure for table `userCities`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS userCities (
  `user_id` int(6) NOT NULL ,
  `city_id` int(6) NOT NULL ,
  FOREIGN KEY (`city_id`)
  REFERENCES cities (city_id),
  FOREIGN KEY (`user_id`)
  REFERENCES users (user_id)

)"); 

mysqli_query($db, "INSERT INTO `traveldb`.`userCities` (`user_id`, `city_id`) VALUES
 
(1, 1),
(1, 5),
(1, 6),
(1, 9),
(1, 13),
(1, 14),
(1, 29),
(1, 30)
");
//-- --------------------------------------------------------


//--
//-- Table structure for table `favoriteCountries`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS favoriteCountries (
  `user_id` int(6) NOT NULL ,
  `country_id` int(6) NOT NULL ,
  FOREIGN KEY (`country_id`)
  REFERENCES countries (country_id),
  FOREIGN KEY (`user_id`)
  REFERENCES users (user_id)

)"); 

mysqli_query($db, "INSERT INTO `traveldb`.`favoriteCountries` (`user_id`, `country_id`) VALUES
 
(1, 3),
(1, 15)
");
//-- --------------------------------------------------------

//--
//-- Table structure for table `favoriteCities`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS favoriteCities (
  `user_id` int(6) NOT NULL ,
  `city_id` int(6) NOT NULL ,
  FOREIGN KEY (`city_id`)
  REFERENCES cities (city_id),
  FOREIGN KEY (`user_id`)
  REFERENCES users (user_id)

)"); 

mysqli_query($db, "INSERT INTO `traveldb`.`favoriteCities` (`user_id`, `city_id`) VALUES
 
(1, 1),
(1, 5),
(1, 6),
(1, 13),
(1, 14),
(1, 29)
");
//-- --------------------------------------------------------



//--
//-- Table structure for table `favoriteAttractions`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS favoriteAttractions (
  `user_id` int(6) NOT NULL ,
  `attraction_id` int(6) NOT NULL ,
  FOREIGN KEY (`attraction_id`)
  REFERENCES attractions (attraction_id),
  FOREIGN KEY (`user_id`)
  REFERENCES users (user_id)

)"); 

mysqli_query($db, "INSERT INTO `traveldb`.`favoriteAttractions` (`user_id`, `attraction_id`) VALUES
 
(1, 27),
(1, 28),
(1, 29),
(1, 22),
(1, 23),
(1, 25)
");
//-- --------------------------------------------------------


//--
//-- Table structure for table `country_comments`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS country_comments (
  `comment_id` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `country_id` int(6) NOT NULL default '0',
  `user_id` int(6) NOT NULL default '0',
  `comment_subject` varchar(50) NOT NULL default '',
  `comment_body` blob NOT NULL default '',
  `comment_date_submitted` timestamp NOT NULL default '2011-01-01 00:00:00',
  CONSTRAINT country_comments_country_id_fk
  FOREIGN KEY(country_id) REFERENCES countries(country_id),
  CONSTRAINT country_comments_user_id_fk
  FOREIGN KEY(user_id) REFERENCES users(user_id)
)"); 

mysqli_query($db, "INSERT INTO `traveldb`.`country_comments` (`country_id`, `user_id`, `comment_subject`, `comment_body`, `comment_date_submitted`) VALUES
 
(3, 1, 'I LOVE GERMANY!', 'GERMANY IS THE BEST PLACE EVER!  I WANT TO GO BACK!', '2011-03-14 21:46:24'), 
(3, 1, 'I LOVE GERMANY TOO!', 'LOVE IT LOVE IT LOVE IT', '2011-03-19 22:01:36') 
");

//-- --------------------------------------------------------



//--
//-- Table structure for table `city_comments`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS city_comments (
  `comment_id` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `city_id` int(6) NOT NULL default '0',
  `user_id` int(6) NOT NULL default '0',
  `comment_subject` varchar(50) NOT NULL default '',
  `comment_body` blob NOT NULL default '',
  `comment_date_submitted` timestamp NOT NULL default '2011-01-01 00:00:00',
  CONSTRAINT city_comments_country_id_fk
  FOREIGN KEY(city_id) REFERENCES cities(city_id),
  CONSTRAINT city_comments_user_id_fk
  FOREIGN KEY(user_id) REFERENCES users(user_id)
)"); 


mysqli_query($db, "INSERT INTO `traveldb`.`city_comments` (`city_id`, `user_id`, `comment_subject`, `comment_body`, `comment_date_submitted`) VALUES
 
(1, 2, 'London', 'I can''t wait to visit London and see the changing of the guard!  That, or just try to make one of them laugh.', '2011-03-14 21:46:24'), 
(3, 2, 'Hola!', 'Como se dice Let''s party!?! en espanol?  Fiesta?', '2011-03-19 22:01:36') 
");
//-- --------------------------------------------------------



//--
//-- Table structure for table `attraction_comments`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS attraction_comments (
  `comment_id` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `attraction_id` int(6) NOT NULL default '0',
  `user_id` int(6) NOT NULL default '0',
  `comment_subject` varchar(50) NOT NULL default '',
  `comment_body` blob NOT NULL default '',
  `comment_date_submitted` timestamp NOT NULL default '2011-01-01 00:00:00',
  CONSTRAINT attraction_comments_attraction_id_fk
  FOREIGN KEY(attraction_id) REFERENCES attractions(attraction_id),
  CONSTRAINT attraction_comments_user_id_fk
  FOREIGN KEY(user_id) REFERENCES users(user_id)
)"); 

mysqli_query($db, "INSERT INTO `traveldb`.`attraction_comments` (`attraction_id`, `user_id`, `comment_subject`, `comment_body`, `comment_date_submitted`) VALUES
 
(37, 2, 'Nanjing Road picture', 'Nice alternating picture!', '2011-03-21 15:28:13'),
(6, 1, 'Jane Austen', 'Love the novels!  I want to go there sometime.', '2011-03-21 16:28:13')
");

//-- --------------------------------------------------------


//--
//-- Table structure for table `city_photos`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS city_photos (
  `photo_id` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `city_id` int(6) NOT NULL default '0',
  `user_id` int(6) NOT NULL default '0',
  `subject` varchar(50) NOT NULL default '',
  `photo` blob NOT NULL default '',
  `photo_date_submitted` timestamp NOT NULL default '2011-01-01 00:00:00',
  CONSTRAINT city_photos_city_id_fk
  FOREIGN KEY(city_id) REFERENCES cities(city_id),
  CONSTRAINT city_photos_user_id_fk
  FOREIGN KEY(user_id) REFERENCES users(user_id)
)"); 

mysqli_query($db, "INSERT INTO `traveldb`.`city_photos` (`city_id`, `user_id`, `subject`, `photo`, `photo_date_submitted`) VALUES

(13, 2, 'DC Metro', 'uploads/dcmetro.jpg', '2011-03-29 11:11:11'),
(13, 2, 'Spiral Staircase in U.S. Treasury Building', 'uploads/USTreasuryBuilding.jpg', '2011-04-04 15:48:08'),
(4, 3, 'Cool Cancun Map', 'uploads/cancun_map.jpg', '2011-04-04 23:08:08'),
(4, 3, 'Cancun at Twilight', 'uploads/Cancun_At_Twilight.jpg', '2011-04-04 23:10:10'),
(24, 3, 'Kyoto', 'uploads/Kyoto_Japan.jpg', '2011-04-04 23:24:25'),
(24, 3, 'Kyoto', 'uploads/KibuneShrineKyotoJapan.jpg',  '2011-04-04 23:24:52'),
(1, 3, 'Big Ben At Dusk', 'uploads/big_ben_at_dusk_london_england2.jpg', '2011-04-04 23:28:42'),
(1, 3, 'Over Tower Bridge', 'uploads/crossing-over-tower-bridge_london_england.jpg', '2011-04-04 23:31:22'),
(1, 3, 'Fireworks Over Tower Bridge', 'uploads/tower_bridge_fireworks.jpg', '2011-04-04 23:34:28'),
(21, 3, 'Sydney Harbor',  'uploads/Australia_Sydney_Harbor.jpg', '2011-04-04 23:40:18'),
(15, 3, 'Fireworks Over the Eiffel Tower',  'uploads/eiffel-tower.jpg', '2011-04-05 14:14:14'),
(6, 1, 'A view of old town Marienplatz from St. Peters Tower', 'uploads/IMG_8543-1.JPG', '2011-04-07 01:55:42')
");

//-- --------------------------------------------------------


//--
//-- Table structure for table `attraction_photos`
//--
mysqli_query($db, "CREATE TABLE IF NOT EXISTS attraction_photos (
  `photo_id` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `attraction_id` int(6) NOT NULL default '0',
  `user_id` int(6) NOT NULL default '0',
  `subject` varchar(50) NOT NULL default '',
  `photo` blob NOT NULL default '',
  `photo_date_submitted` timestamp NOT NULL default '2011-01-01 00:00:00',
  CONSTRAINT attraction_photos_attraction_id_fk
  FOREIGN KEY(attraction_id) REFERENCES attractions(attraction_id),
  CONSTRAINT attraction_photos_user_id_fk
  FOREIGN KEY(user_id) REFERENCES users(user_id)
)"); 

mysqli_query($db, "INSERT INTO `traveldb`.`attraction_photos` (`attraction_id`, `user_id`, `subject`, `photo`, `photo_date_submitted`) VALUES

(137, 3, 'Silly Lion', 'uploads/auckland-zoo.jpg', '2011-04-07 01:13:13'),
(28, 1, 'A view from St. Peters Tower', 'uploads/IMG_8512-1.JPG', '2011-04-07 01:53:39')
");


//-- --------------------------------------------------------


//--
//-- Table structure for table `city_photo_comments`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS city_photo_comments (
  `comment_id` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `photo_id` int(6) NOT NULL default '0',
  `user_id` int(6) NOT NULL default '0',
  `comment_subject` varchar(50) NOT NULL default '',
  `comment_body` blob NOT NULL default '',
  `comment_date_submitted` timestamp NOT NULL default '2011-01-01 00:00:00',
  CONSTRAINT city_photo_comments_photo_id_fk
  FOREIGN KEY(photo_id) REFERENCES city_photos(photo_id),
  CONSTRAINT city_photo_comments_user_id_fk
  FOREIGN KEY(user_id) REFERENCES users(user_id)
)"); 

mysqli_query($db, "INSERT INTO `traveldb`.`city_photo_comments` (`photo_id`, `user_id`, `comment_subject`, `comment_body`, `comment_date_submitted`) VALUES

(2, 2, 'That''s a lot of stairs', 'I would love to climb all of these!', '2011-04-04 16:55:01')
");

//-- --------------------------------------------------------


//--
//-- Table structure for table `attraction_photo_comments`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS attraction_photo_comments (
  `comment_id` int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `photo_id` int(6) NOT NULL default '0',
  `user_id` int(6) NOT NULL default '0',
  `comment_subject` varchar(50) NOT NULL default '',
  `comment_body` blob NOT NULL default '',
  `comment_date_submitted` timestamp NOT NULL default '2011-01-01 00:00:00',
  CONSTRAINT attraction_photo_comments_photo_id_fk
  FOREIGN KEY(photo_id) REFERENCES attraction_photos(photo_id),
  CONSTRAINT attraction_photo_comments_user_id_fk
  FOREIGN KEY(user_id) REFERENCES users(user_id)
)"); 

//--
//-- Table structure for table `attractionRatings`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS `traveldb`.`attractionRatings` (
  `user_id` int(6) NOT NULL,
  `attraction_id` int(6) NOT NULL,
  `rating` INT NOT NULL
)");

//--
//-- Table structure for table `cityRatings`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS `traveldb`.`cityRatings` (
  `user_id` int(6) NOT NULL,
  `city_id` int(6) NOT NULL,
  `rating` INT NOT NULL
)");

//--
//-- Table structure for table `countryRatings`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS `traveldb`.`countryRatings` (
  `user_id` int(6) NOT NULL,
  `country_id` int(6) NOT NULL,
  `rating` INT NOT NULL
)");


//--
//-- Table structure for table `profilePictures`
//--

mysqli_query($db, "CREATE TABLE IF NOT EXISTS `traveldb`.`profilePictures` (
  `user_id` int(6) NOT NULL,
  `photo` blob NOT NULL default '',
  CONSTRAINT prof_pic_user_id_fk
  FOREIGN KEY(user_id) REFERENCES users(user_id)
)");

mysqli_query($db, "INSERT INTO `traveldb`.`profilePictures` (`user_id`, `photo`) VALUES

(1, 'profilePictures/defaultProfilePicture.jpg'),
(2, 'profilePictures/defaultProfilePicture.jpg'),
(3, 'profilePictures/defaultProfilePicture.jpg')

");
//-- --------------------------------------------------------




	rename("sourceTravelGuideDB.php","sourceTravelGuideDBComplete.php");
	//rename("real_index.php", "index.php");
	header("Location: index.php");
	exit;
}
else
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>~Travel Guide Set Up~</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link href="1.css" type="text/css" rel="stylesheet" />


</head>
<body>
<div class="container">
<div id="banner"> 
<div class="logo-1">Travel</div>
<div class="logo-2">Guide</div>


</div>


<body>
<div class = "content">
<form method="post" action="index.php">
<center>
<h1>Set up your TravelGuide Database!</h1>
<H3>Enter the information for your mysql database server.
<br/><br/>This information will not be stored or used for anything <br/>other than setting up the TravelGuide Database
<br/><br/>You may need to change the permissions in the file where this is stored so that filenames can be changed.</H3>
<br>
Enter Root Name: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="root">
<br>
Enter Root Password:  &nbsp <input type="password" name="pw">
<br>
<input type="submit" name="create" value="Create DB">
</center>
</form>
</div>
</body>
</html>
<?php
}
?>