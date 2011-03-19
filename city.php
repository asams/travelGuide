<?php
   include('db_connect.php');
?>

<?php
   include('header_side.php');
?>

<html>
<body>
<div class="content">

<?php
	$cityID = $_GET['id'];
	
	$query = "SELECT ci.*, co.country_name, a.attraction_name, a.attraction_id FROM cities ci NATURAL JOIN countries co NATURAL JOIN attractions a WHERE city_id = $cityID";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	$attractionLinks = "<ul>";
	
	while($row = mysqli_fetch_array($result)){
		$cityName = $row['city_name'];
		$countryID = $row['country_id'];
		$region = $row['city_region'];
		$population = $row['city_population'];
		$cityMap = $row['city_map'];
		$flag = $row['city_flag'];
		$coatOfArms = $row['city_coat_of_arms'];
		$website = $row['city_website'];
		$country_name = $row['country_name'];
		$attractionName = $row['attraction_name'];
		$attractionID = $row['attraction_id'];
		
		$attractionLinks = $attractionLinks . "<li><a href = \"attraction.php?id=" . $attractionID . "\">" . $attractionName . "</a></li>";
	}
	
	/*$query = "SELECT attraction_name, attraction_id FROM attractions WHERE city_id = $cityID ORDER BY attraction_name";
	
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");
	
	$attractionLinks = "<ul>";
	
	while($row = mysqli_fetch_array($result)){
		$attractionName = $row['attraction_name'];
		$attractionID = $row['attraction_id'];
		
		$attractionLinks = $attractionLinks . "<li><a href = \"attraction.php?id=" . $attractionID . "\">" . $attractionName . "</a></li>";
	}
	*/
	$attractionLinks = $attractionLinks . "</ul>";

?>
<?php
	/*$query = "SELECT country_name FROM countries WHERE country_id = $countryID";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 3");

	$row = mysqli_fetch_array($result);
	$country_name = $row['country_name'];*/
	
	echo "<h1>" . $cityName . "</h1>";

	echo ($flag != 'N/A' ? "<img src = \"" . $flag . "\" alt = \"flag\" width = \"50%\" align = \"right\"/>" : "");

	echo "<p><H2>Info: </H2></p>";
	echo "Country: " . "<a href = \"country.php?id=" . $countryID . "\"> $country_name </a>" . "<br/><br/>";
	echo "Region: " . $region . "<br/><br/>";
	echo "Attractions Featured on TravelGuide: " . $attractionLinks . "<br/>";
	echo "Population: " . $population . " people <br/><br/>";
	echo "Website: " . ($website != 'N/A' ? "<a href = \" $website \"> $website </a>" : $website) . "<br/><br/><br/><br/><br/><br/>";
	echo "Map:<br/>";
	echo "<img src = \"" . $cityMap . "\" alt = \"map\" width = \"60%\" align = \"center\" /><br/><br/>";

?>

</div>

<?php
   include('footer.php');
?>


</html>
</body>