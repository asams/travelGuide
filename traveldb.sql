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
  `capital` varchar(50) NOT NULL default ' ',
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
('United States of America', 'Washington, D.C.', 'federal presidential constitutional republic', 'United States dollar', 308745538, 9826675, 'English',	'Christianity', 'usa_map.png', 'usa_flag.svg', 'usa_seal.png', 'n/a'),
('France', 'Paris', 'Unitary Semi-Presidential Republic', 'Euro', 65821885, 674843, 'French', 'Secular', 'france_map.gif', 'france_flag.jpg', 'france_coa.png', 'http://us.franceguide.com/'),
('Italy', 'Rome', 'Unitary Parliamentary Republic', 'Euro', 60418711, 301338, 'Italian', 'Catholic', 'italy_map.jpg', 'italy_flag.gif', 'italy_coa.jpg', 'http://www.italia.it/en/home.html'),
('Malaysia', 'Kuala Lumpur', 'Federal Constitutional Elective Monarchy and Federal Parliamentary Democracy', 'Ringgit', 27565821, 329847, 'Bahasa Malaysia', 'Islam', 'malaysia_map.jpg', 'malaysia_flag.png', 'malaysia_coa.jpg', 'http://www.tourism.gov.my/corporate/')
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
('New York', 7, 'New York', 8391881, 'ny_map.png', 'ny_flag.svg', 'ny_seal.png', 'www.nyc.gov'),
('Paris', 8, 'Ile-de-France', 2193031, 'paris_map.gif', 'paris_flag.gif', 'paris_coa.png', 'http://www.paris.fr/portail/english/Portal.lut?page_id=8118'),
('Marseille', 8, 'Provence-Alpes-Cote d''Azur', 852395, 'marseille_map.gif', 'marseille_flag.png', 'marseille_coa.jpg', 'http://www.marseille.fr'),
('Rome', 9, 'Lazio', 2754440, 'rome_map.gif', 'rome_flag.png', 'rome_coa.png', 'http://www.comune.roma.it/was/wps/portal/pcr'),
('Milan', 9, 'Lombardy', 1314745, 'milan_map.jpg', 'milan_flag.gif', 'milan_coa.png', 'http://www.comune.milano.it/'),
('Kuala Lumpur', 10, 'Federal Territory', 1627172, 'kuala_lumpur_map.jpg', 'kuala_lumpur_flag.png', 'N/A', 'http://www.dbkl.gov.my/index.php?lang=en'),
('George Town', 10, 'Penang', 157743, 'george_town_map.jpg', 'N/A', 'george_town_coa.jpg', 'http://www.tourismpenang.net.my/')
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
('American Museum of Natural History', 8, 'museum', 'This museum located in Manhattan is one of the largest in the world, consisting of twenty-five interconnected buildings with fourty-six permanent exhibition halls, collections containing over 32 million specimens, research laboratories, and its library.', 'American Museum of Natural History, Central Park West at 79th Street, New York, NY 10024-5192', 'daily, 10:00 a.m.—5:45 p.m.; The Museum is closed Thanksgiving and Christmas.', 'Y',	'http://www.amnh.org/', 'amer_muse_of_nat_hist.jpg'),
('Frauenkirche', 6, 'religious building', 'The Frauenkirche''s full name is Der Dom zu unserer lieben Frau - the Cathedral of Our Dear Lady.  It serves as the cathedral of the Archdiocese of Munich and Freising and is a symbol of Munich, the Bavarian capital city.  The church towers over surrounding buildings, and visitors may climb the winding stairs of the south tower to view the city of Munich and the nearby Alps.', 'Frauenplatz 1, 80331 Munich', 'No entrance during service', 'N', 'http://www.muenchen.de/Rathaus/tourist_office/sehenswuerdigkeiten/Kirchen/129352/Frauenkirche.html', 'frauenkirche_pic.jpg'),
('Nymphenburg Palace', 6, 'palace or castle', 'The Nymphenburg Palace (Schloss Nymphenburg) is a baroque palace in Munich, Bavaria.  The palace was the main summer residence of the rulers of Bavaria.', 'Schloss Nyphenburg 1, 80638 Munich', 'April to 15 October: 9am - 6pm, 16 October to March: 10am - 4pm, open daily', 'Y', 'http://www.schloss-nymphenburg.de/englisch/palace/index.html', 'nymphenburg_pic.jpg'),
('BMW Museum', 6, 'museum', 'The BMW Tower is a Munich landmark, which serves as the world headquarters for the Bavarian automaker.  The building is shaped like a BMW four-cylinder, and was declared historical in 1999.  The nearby BMW Museum, also near the Munich Olympiapark, showcases the history of BMW.', 'BMW Museum Am Olympiapark 2, 80809 Munich', 'Tuesday to Sunday 10am - 6pm, closed Mondays', 'Y', 'http://www.bmw-museum.com/2/webmill.php', 'bmw_museum_pic.jpg'),
('Englischer Garten', 6, 'garden or park', 'German for English Garden, the Englisher Garten is a large public park in the center of Munich, created in 1789.  It features wide open parks and lakes, beer gardens, restaurants, and even nude sunbathers...', 'Englischer Garten, 80538 Munich', 'Always open', 'N', 'http://www.muenchen.de/Tourismus/Sightseeing/Attractions/308378/englishgarden.html', 'english_gardens_pic.jpg'),
('Olympiapark', 6, 'other', 'The Olympiapark in Munich is an Olympic Park constructed for the 1972 Summer Olympics.  The Park serves now as a venue for cultural, social, and religious events, including the 2006 World Cup, which was hosted in Munich, as well as public viewings of the 2010 World Cup.', 'Spiridon-Louis-Ring 21, 80809 Munich', 'Depends on destination within the Olympiapark', 'N', 'http://www.olympiapark.de/en/home/', 'olympiapark_pic.jpg'),
('Brandenburg Gate', 5, 'monument', 'The Brandenburg Gate is a former city gate and one of the main symbols of Berlin and Germany.  It is located west of the city center and is the only remaining gate through which Berlin was once entered.  It is the monumental entry to Unter den Linden, the renowned boulevard of linden trees which formerly led to the city palace of the Prussian monarchs.  The gate suffered considerable damage in World War II and was restored fully from 2000 to 2002.  It is regarded as one of Europe’s most famous landmarks.', 'Brandenburger Tor, Pariser Platz, 10117 Berlin, Germany', 'Always open', 'N', 'http://www.berlin.de/orte/sehenswuerdigkeiten/brandenburger-tor/index.en.php', 'brandenburg_gate_pic.jpg'),
('East Side Gallery', 5, 'monument', 'The East Side Gallery is an international memorial for freedom.  It is a 1.3 km long section of the Berlin Wall, located near the center of Berlin.  The Gallery consists of about 100 paintings by artists from around the world, painted in 1990 on the east side of the Berlin Wall.  The paintings document the time of change after the fall of the Berlin Wall and express the euphoria and great hopes for a better world and a free future for all the people of the world.', 'Muehlenstrasse, Berlin', 'Always open', 'N', 'http://www.eastsidegallery.com/index.htm', 'east_side_gallery_pic.jpg'),
('Reichstag Building', 5, 'other', 'The Reichstag Building was originally constructed to hold the parliament of the German Empire in 1894.  It was severely damaged during World War II but was completely reconstructed by 1999.  The dome on top of the building is a large glass dome that provides visitors with a 360-degree view of the surrounding Berlin cityscape.', 'Reichstag, Platz der Republik 1, 10557 Berlin', 'Daily 8am - 12am', 'N', 'http://www.berlin.de/orte/sehenswuerdigkeiten/reichstag/index.en.php', 'reichstag_pic.jpg'),
('Berlin Zoological Garden', 5, 'park or garden', 'The Berlin Zoo is the oldest and best known zoo in Germany.  Opened in 1844, it is located in Berlin’s Tiergarten (animal park).  The zoo contains the most comprehensive collection of species in the world and is considered the most visited zoo in Europe.  The zoo is home to Knut, the world famous polar bear, born in December 2006.', 'Hardenbergplatz 8, 10787 Berlin', 'April to September daily: 9am - 7pm, October: 9am - 6pm, November to March: 9am - 5pm', 'Y', 'http://www.zoo-berlin.de/', 'berlin_zoo_pic.jpg'),
('Museum Island', 5, 'museum', 'Museum Island (Museumsindel in German) is the northern half of an island in the Spree river in the middle of Berlin.  It holds five internationally renowned museums:  the Altes Museum, the Neues Museum, the Alte Nationalgalerie, the Bode Museum, and the Pergamon Museum.', 'Museumsinsel, 10178 Berlin', 'Depends on the museum', 'Y', 'http://www.smb.museum/smb/standorte/index.php?lang=en&p=2&objID=3313&n=2', 'museum_island_pic.jpg'),
('Eiffel Tower', 15, 'monument', 'The Eiffel Tower is the tallest building in Paris and the most-visited paid monument in the  world. It was built as the entrance arch to the 1889 World''s Fair. It is 324 meters tall and is the most prominent symbol of both Paris and France.', 
'Tour Eiffel, Champ de Mars, 75007 Paris, France', 'January 1st to June 14th 9:30a.m.-11:00p.m, June 15th to September 1st 9:00a.m.-12:00a.m., September 2nd to December 31st 9:30a.m.-11:00p.m.', 
'Y', 'http://www.tour-eiffel.com', 'EiffelTower.jpg'),
('Notre Dame de Paris', 15, 'religious building', 'Notre Dame de Paris is widely considered one of the finest examples of French Gothic architecture in France and in Europe. It was among the first buildings in the world to use the flying buttress. Its treasury houses a reliquary with the purported Crown of Thorns.', 
'6 Parvis Notre-Dame, Place Jean-Paul II, 75004 Paris, France', 'Open every day of the year from 8:00a.m. to 6:45p.m. (7:15p.m. on Saturdays and Sundays)', 
'N', 'http://www.notredamedeparis.fr', 'NotreDameDeParis.jpg'),
('Arc de Triomphe', 15, 'monument', 'The Arc de Triomph honours those who fought and died for France in the French Revolutionary and Napoleonic Wards. The names of all French victories and generals are inscribed on its inner and outer surfaces. Beneath its vault lies the Tomb of the Unknown Soldier from World War I.', 
'Arc de Triomphe, Place du Charles-de-Gaulle, 75008 Paris, France', 'April 1 to September 30 from 10a.m.-11p.m. and October 1 to March 31 from 10a.m.-10:30p.m.', 
'Y', 'N/A', 'ArcDeTriomphe.jpg'),
('Old Port of Marseille', 16, 'other', 'The Old Port of Marseille (Vieux-Port) has been the natural harbour of Marseille since antiquity. It was once a major landmark comparable to the Eiffel tower in Paris before it was destroyed in the Battle of Marseille. It is home to St. Vivtor''s Abby and was the setting of "The Count of Monte Cristo" by Alexandre Dumas.', 
'Old Port of Marseille, quai du port, 13001 Marseille, France', 'N/A', 
'N', 'N/A', 'OldPortMarseille.jpg'),
('Notre-Dame de la Garde', 16, 'religious building', 'Notre-Dame de la Garde is a Neo-Byzantine church that sits on a 532 foot limestone outcrop on the south side of the Old Port. It is the site of a poplular annual pilgimage every Assumption Day (August 15). Its 42 foot belfry supports a 27 foot tall statue of the "Madonna and Child" made out of copper gilded with gold leaf.', 
'Rue Fort-du-Sanctuaire, 13281 Marseille, France', 'Open daily from 7a.m. to 7p.m.', 
'N', 'N/A', 'NotreDameDeLaGarde.jpg'),
('Colosseum', 17, 'other', 'The collosseum is an ancient elliptical ampitheater inn the center of Rome. It is was capable of seating 50,000spectators and was used for gladiator contests and public spectacles such as executions and dramas based on Classical mythology. It is one of Romes most popular tourist attractions.', 
'Colosseum, Piazza del Colosseo, l-00186 Rome, Italy', 'March 1 to October 31 from 9a.m. - 6:30p.m., November 1 to February 28 from 9:00a.m. - 3:00p.m.', 
'Y', 'N/A', 'Colosseum.jpg'),
('Trevi Fountain', 17, 'monument', 'The Trevi Fountain is one of the most famous fountains in the world. A trditional legend of the fountain is that if a visitor throws a coin into the fountain, they are ensured a return to Rome. Another is that tossing two coins into the fountain will lead to a romance and three will will ensure either a marriege or a devorce. An estimated 3,000 euros are thrown into the fountain each day.', 
'Piazza di Trevi, 00187 Rome, Italy', 'N/A', 
'N', 'http://www.trevifountain.net/', 'TreviFountain.jpg'),
('Pantheon', 17, 'religious building', 'The Pantheon is a building in Rome comissioned by Marcus Agrippa as a temple to all the gods of Ancient Rome. It is one of the best preserved Roman buildings and has been in continuous use throughout history. Since the 7th century it has been used as a Roman Catholic church and contains examples of both ancient roman and roman catholic artistry.', 
'Pantheon, Piaza della Rontonda, l-00186 Rome, Italy', 'Open every day from 8:30a.m. to 7:30p.m. (6:30p.m. on sundays)', 
'N', 'N/A', 'Pantheon.jpg'),
('Milan Cathedral', 18, 'religious building', 'The Cathedral of Milan is the seat of the Archbishop of Milan. The Gothic cathedral took five centuries to complete and is the largest Gothic cathedral (second largest Catholic cathedral) in the world. The cathedral contains the sarcophogi of several archbishops and a famous statue of the St. Bartholomew by Marco D''Argate.', 
'Piaza del Duomo, Milan, Italy 20123', 'Open every day from 6:50a.m. to 7:00p.m.', 
'N', 'N/A', 'MilanCathedral.jpg'),
('La Scala', 18, 'other', 'La Scala is a world renowned opera house in Milan. Most of Italy''s greatest operatic artists and many of the finest singers from other nations, too, have appeared at La Scala during the past 200 years. It is still one of the leading opera and ballet theaters of the world and is home to the La Scala Theater Chorus, La Scala Theatre Ballet and La Scala Theatre Orchestra.', 
'Via Filodrammatici, 20121 Milan, Italy', 'Performance times vary.', 
'Y', 'http://www.teatroallascala.org/en/index.html', 'LaScala.jpg'),
('Kuala Lumpur Tower', 19, 'other', 'Kuala Lumpur Tower (also known as Menara Kuala Lumpur or KL Tower) is a communications tower that is 1,381 feet tall, making it the second tallest freestanding tower in the world. The trunk of the tower contains a stairwell and high-speed elevator that leads to a revolving restaurant at the top, providing visitors a panoramic view of the city. Races are organized yearly where participants race up the stairs to the top.', 
'Jalan Punchak, Kuala Lumpur, 50250 Malaysia', 'Open daily from 9:00a.m. to 10:00p.m.', 
'Y', 'http://www.menarakl.com.my/', 'KualaLumpurTower.jpg'),
('Petronas Towers', 19, 'other', 'The Petronas Towers (also called the Petronas Twin Towers or KLCC) were the tallest buildings in the world before 2004 when they were surpassed by Taipei 101, but remain the tallest twin buildings. Although the towers are used as company office buildings, the buildings also contain an upmarket retail podium, a park, one of the largest shopping malls in Malaysia and the highest two storey bridge in the world whih crosses the two towers.', 
'Petronas Twin Towers, Kuala Lumpur City Centre, 50088 Kuala Lumpur, Malaysia', 'Open daily from 9:00a.m. to 7:00p.m. (on Mondays it closes for prayer at 1-2:30p.m.)', 
'N', 'http://www.petronastwintowers.com.my', 'PetronasTowers.jpg'),
('Batu Caves', 19, 'religious building', 'The Batu Caves is a limestone hill which leads to a series of caves and cave temples. It is one of the most popular Hindu shrines outside of india. In 2006 a 140 foot high statue of Lord Muruga was unveiled at the bottom of the 272 step staircase. The caves are around 400 million years old and were used as shelter by the indigenous Temuan people.', 
'Batu Caves, Sri Subramaniam Temple, Kuala Lumpur, 68100 Malaysia', 'Open daily from 7:00a.m. to 6:00p.m.', 
'N', 'N/A', 'BatuCaves.jpg')
;

