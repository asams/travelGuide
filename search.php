<?php
   include('db_connect.php');
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>~Travel Guide~</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link href="1.css" type="text/css" rel="stylesheet" />


</head>
<body>
<div class="container">
<div id="banner"> 
<div class="logo-1">Travel</div>
<div class="logo-2">Guide</div>


</div>

<div id="left">
<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;font-color:#000;font-size:14px;font-weight:bold;padding-left:1px;"><a href="aboutUs.html">ABOUT US</a></span>
<br />
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold; font-style: italic;
 letter-spacing: 2px;
 padding-left:1px;">Who We Are</span>
</div></div>

<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;color:#153E7E;font-size:14px;font-weight:bold;padding-left:1px;"><a href="countries.php">COUNTRIES</a></span>
<br />
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold;  letter-spacing: 2px;
 padding-left:1px;">Total: 10</span>
</div></div>

<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;color:#153E7E;font-size:14px;font-weight:bold;padding-left:1px;"><a href="cities.php">CITIES</a></span>
<br />
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold;  letter-spacing: 2px;
 padding-left:1px;">Total: 10</span>
</div></div>
<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;color:#153E7E;font-size:14px;font-weight:bold;padding-left:1px;"><a href="attractions.php">ATTRACTIONS</a></span>
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold;  letter-spacing: 2px;
 padding-left:1px;">Total: 10</span>
</div></div>

<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;color:#153E7E;font-size:14px;font-weight:bold;padding-left:1px;"><a href="contactUs.html">CONTACT US</a></span>
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold;  letter-spacing: 2px;
 padding-left:1px;">Suggestions?</span>
</div></div>

</div>


<div align="right"><form action="search.php" method="post" class="searchform">

<select name="type">
	<option class="group" value="attraction">Attraction</option>
	<option class="group" value="city">City</option>
	<option class="group" value="country">Country</option>
</select>
<input type="text" id="searchq" name="searchedFor" />
<input type="submit" class="formbutton" value="Search" />
</form>
</div>

<div class="content">
<h1>Search Results:</h1>
<?php
	$termSearched = mysqli_real_escape_string($db, trim($_POST['searchedFor']));
	$type = $_POST['type'];
	//echo $type;

	//echo $termSearched;
	echo '<center>';

	if ($type == 'country') {
		$query = "SELECT name, country_id FROM countries WHERE (name LIKE '%$termSearched%') ORDER BY name";
		$result = mysqli_query($db, $query) or die("Error Querying Database");
		echo '<u><big>Countries</u></big><br>';
	
	
		while($row = mysqli_fetch_array($result)) {
			$country = $row['name'];
			$countryID = $row['country_id'];
			
			echo '<a href=country.php?id=' . $countryID . '>' . $country . '</a><br>';
		}
	} 

	elseif ($type == 'city') {
		$query = "SELECT name, city_id FROM cities WHERE (name LIKE '%$termSearched%') ORDER BY name";
		$result = mysqli_query($db, $query) or die("Error Querying Database");
	
		echo '<u><big>Cities</u></big><br>';
	

		while($row = mysqli_fetch_array($result)) {
			$city = $row['name'];
			$cityID = $row['city_id'];
		
		
			echo '<a href=city.php?id=' . $cityID . '>' . $city . '</a><br>';
							
		}
	} 


	elseif ($type == 'attraction') {
		$query = "SELECT name, attraction_id FROM attractions WHERE (name LIKE '%$termSearched%') ORDER BY name";
		$result = mysqli_query($db, $query) or die("Error Querying Database");
	
		echo '<u><big>Attractions</u></big><br>';
	
		while($row = mysqli_fetch_array($result)) {
			$attraction = $row['name'];
			$attractionID = $row['attraction_id'];
		
		
			echo '<a href=attraction.php?id=' . $attractionID . '>' . $attraction . '</a><br>';
		}
							
	}

	echo '</center>';					
?>
<hr />
<div align="center">
<div class="bottom"><a href="index.html"> HOME</a> | <a href="aboutUs.html">ABOUT </a>| <a href="contactUs.html"> Contact us</a>  
</div>
</div>
</div>
<br />
<div align="center">
<span style="font-family:geneva,arial;color:#000;font-size:14px;font-weight:bold;">CPSC 350 - Amy, Erin, Kelsie & Rebecca</span></div>
</body>
</html>
