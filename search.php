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
</div>

<?php
   include('footer.php');
?>

</body>
</html>
