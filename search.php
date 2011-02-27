<?php
   include('db_connect.php');
?>

<?php
   include('header_side.php');
?>

<html>
<body>

<div class="content">
<h1>Search Results:</h1>
<?php
	$termSearched = mysqli_real_escape_string($db, trim($_POST['searchedFor']));
	$type = $_POST['type'];
	//echo $type;

	//echo $termSearched;
	echo '<center>';

	if ($type == 'country') {
		$query = "SELECT country_name, country_id FROM countries WHERE (country_name LIKE '%$termSearched%') ORDER BY country_name";
		$result = mysqli_query($db, $query) or die("Error Querying Database");
		echo '<u><big>Countries</u></big><br>';
	
	
		while($row = mysqli_fetch_array($result)) {
			$country = $row['country_name'];
			$countryID = $row['country_id'];
			
			echo '<a href=country.php?id=' . $countryID . '>' . $country . '</a><br>';
		}
	} 

	elseif ($type == 'city') {
		$query = "SELECT countries.country_name, cities.city_name, cities.city_id FROM cities INNER JOIN countries ON countries.country_id=cities.country_id WHERE (cities.city_name LIKE '%$termSearched%') ORDER BY cities.city_name";
		$result = mysqli_query($db, $query) or die("Error Querying Database");
	
		echo '<u><big>Cities</u></big><br>';
	

		while($row = mysqli_fetch_array($result)) {
			$country = $row['country_name'];
			$city = $row['city_name'];
			$cityID = $row['city_id'];
			
		
			echo '<a href=city.php?id=' . $cityID . '>' . $city . ', ' . $country . '</a><br>';
			//echo $country;				
		}
	} 


	elseif ($type == 'attraction') {
		$query = "SELECT attractions.attraction_name, attractions.attraction_id, cities.city_name, countries.country_name FROM attractions INNER JOIN cities ON cities.city_id=attractions.city_id INNER JOIN countries ON cities.country_id=countries.country_id  WHERE (attractions.attraction_name LIKE '%$termSearched%') ORDER BY cities.city_name, attractions.attraction_name";
		
		
		$result = mysqli_query($db, $query) or die("Error Querying Database");
	
		echo '<u><big>Attractions</u></big><br>';
		
		$headerCity = 'test';
	
		while($row = mysqli_fetch_array($result)) {
			$attraction = $row['attraction_name'];
			$attractionID = $row['attraction_id'];
			$countryName = $row['country_name'];
			
			if ($headerCity <> $row['city_name']) {
				$headerCity = $row['city_name'];
				$cityName = $row['city_name'];
				echo '<br><b><u>' . $headerCity . ', ' . $countryName . '</b></u><br>';
			} else {
				$cityName = $headerCity;
			}
		

			echo '<a href=attraction.php?id=' . $attractionID . '>' . $attraction . '</a><br>';
		}
							
	}

	echo '</center>';					
?>
</div>

<?php
   include('footer.php');
?>

</body>
</html>
