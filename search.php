<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>

<div class="content">
<h1>Search Results:</h1>
<?php

	//get the term that the user entered
	$termSearched = mysqli_real_escape_string($db, strip_tags(trim(trim($_POST['searchedFor']))));
	$type = $_POST['type'];
	//echo $type;

	//echo $termSearched;
	echo '<center>';


	//if the type is of country, then look and see if the term searched is similar to any of the country names
	if ($type == 'country') {
		$query = "SELECT country_name, country_id FROM countries WHERE (country_name LIKE '%$termSearched%') ORDER BY country_name";
		$result = mysqli_query($db, $query) or die("Error Querying Database");
		echo '<u><big>Countries</u></big><br>';
	
		//display any countries with similar names
		while($row = mysqli_fetch_array($result)) {
			$country = $row['country_name'];
			$countryID = $row['country_id'];
			
			echo '<a href=country.php?id=' . $countryID . '>' . $country . '</a><br>';
		}
	} 
	// else if the type is of city, then look and see if the term searched is similar to any of the city names
	elseif ($type == 'city') {
		$query = "SELECT countries.country_name, cities.city_name, cities.city_id FROM cities INNER JOIN countries ON countries.country_id=cities.country_id WHERE (cities.city_name LIKE '%$termSearched%') ORDER BY cities.city_name";
		$result = mysqli_query($db, $query) or die("Error Querying Database");
	
		echo '<u><big>Cities</u></big><br>';
	
		//display any cities with similar names
		while($row = mysqli_fetch_array($result)) {
			$country = $row['country_name'];
			$city = $row['city_name'];
			$cityID = $row['city_id'];
			
		
			echo '<a href=city.php?id=' . $cityID . '>' . $city . ', ' . $country . '</a><br>';
			//echo $country;				
		}
	} 

	// else if the type is of attraction, then look and see if the term searched is similar to any of the attraction names
	elseif ($type == 'attraction') {
		$query = "SELECT attractions.attraction_name, attractions.attraction_id, cities.city_name, countries.country_name FROM attractions INNER JOIN cities ON cities.city_id=attractions.city_id INNER JOIN countries ON cities.country_id=countries.country_id  WHERE (attractions.attraction_name LIKE '%$termSearched%') ORDER BY cities.city_name, attractions.attraction_name";
		
		
		$result = mysqli_query($db, $query) or die("Error Querying Database");
	
		echo '<u><big>Attractions</u></big><br>';
		
		$headerCity = 'test';
	
		//display any attractions with similar names
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

	// else if the type is of attraction type, then look and see if the term searched is similar to any of the attraction types
	elseif ($type == 'type') {
		$query = "SELECT attractions.attraction_name, attractions.attraction_id, attractions.attraction_type, cities.city_name, countries.country_name FROM attractions INNER JOIN cities ON cities.city_id=attractions.city_id INNER JOIN countries ON cities.country_id=countries.country_id  WHERE (attractions.attraction_type LIKE '%$termSearched%') ORDER BY cities.city_name, attractions.attraction_type, attractions.attraction_name";
		
		
		$result = mysqli_query($db, $query) or die("Error Querying Database");
	
		echo '<u><big>Attractions</u></big><br>';
		
		$headerCity = 'test';
		$headerType = 'test';
	

		//display any attractions with similar types
		while($row = mysqli_fetch_array($result)) {
			$attraction = $row['attraction_name'];
			$attractionID = $row['attraction_id'];
			$countryName = $row['country_name'];
			//$attractionType = $row['attraction_type'];
			
			if ($headerCity <> $row['city_name']) {
				$headerCity = $row['city_name'];
				$cityName = $row['city_name'];
				echo '<br><b><u>' . $headerCity . ', ' . $countryName . '</b></u><br>';

				if ($headerType == $row['attraction_type']) {
					echo '<br><b><i>' . $headerType . '</b></i><br>';
				}
			} else {
				$cityName = $headerCity;
			}
			if ($headerType <> $row['attraction_type']) {
				$headerType = $row['attraction_type'];
				$attractionType = $row['attraction_type'];
				echo '<br><b><i>' . $headerType . '</b></i><br>';
			} else {
				$attractionType = $headerType;
			}

			echo '<a href=attraction.php?id=' . $attractionID . '>' . $attraction . '</a><br>';
		}
		
	// else if the type is of user, then look and see if the term searched is similar to any of the user's first/last name or username					
	} elseif ($type == 'user') {
		
		echo "<div id=userSearch>";

		$query = "SELECT * from users  WHERE (username LIKE '%$termSearched%' OR CONCAT(first_name, ' ', last_name) LIKE '%$termSearched%') ORDER BY username";
		$result = mysqli_query($db, $query) or die("Error Querying Database");
	
		echo '<u><big>Users</u></big>';

		echo "<br><br><br><br><table>";


		//display any users with similar names
		while($row = mysqli_fetch_array($result)) {
			$username = $row['username'];
			$userID = $row['user_id'];
			$firstName= $row['first_name'];
			$lastName = $row['last_name'];


			$query2 = "SELECT photo FROM profilePictures WHERE user_id = '$userID'";
   			$result2 = mysqli_query($db, $query2) or die ("Error Querying Database - 1");

	   		if($row2 = mysqli_fetch_array($result2)) {
				$photo = $row2['photo'];
   			} else {
				$photo = "profilePictures/defaultProfilePicture.jpg";
			}

			echo "<tr><td><a href=accountOverview.php?id=" . $userID . " ><img src=" . $photo .  " align=right width=25% ></a></td>";
			echo "<td><b>Username: </b>" . $username . "<br>";
			echo "<b>Name: </b>" . $firstName . " " . $lastName . "<br></td></tr>";

		}
		
		echo "</table></div>";

	}

						
?>
</div>

<?php
   
   echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";

   include('footer.php');
?>

</body>
</html>
