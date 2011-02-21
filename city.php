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
	
	$query = "SELECT * FROM cities WHERE city_id = $cityID";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	
	while($row = mysqli_fetch_array($result)){
		$cityName = $row['name'];
		$countryId = $row['countryId'];
		$region = $row['region'];
		$population = $row['population'];
		$cityMap = $row['city_map'];
		$flag = $row['flag'];
		$coatOfArms = $row['coat_of_arms'];
		$website = $row['website'];
	}
	
	$query = "SELECT name, attraction_id FROM attractions WHERE city_id = $cityID";
	
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");
	
	$featuredCityLinks = "<ul>";
	
	while($row = mysqli_fetch_array($result)){
		$attractionName = $row['name'];
		$attractionID = $row['attraction_id'];
		
		$attractionLinks = $attractionLinks . "<li><a href = \"attraction.php?id=" . $attractionID . "\">" . $attractionName . "</a></li>";
	}
	
	$attractionLinks = $attractionLinks . "</ul>";

?>
<?php
	
	echo "<h1>" . $cityName . "</h1>";

	echo ($flag != 'N/A' ? "<img src = \"" . $flag . "\" alt = \"flag\" width = \"50%\" align = \"right\"/>" : "");

	echo "<p><H2>Info: </H2></p>";
	echo "Name: " . $cityName . "<br/><br/>";
	echo "Region: " . $region . "<br/><br/>";
	echo "Attractions Featured on TravelGuide: " . $attractionLinks . "<br/>";
	echo "Population: " . $population . " people <br/><br/>";
	echo "Website: <a href = \"" . $website . "\">" . $website . "</a><br/><br/><br/><br/><br/><br/>";	
	echo "Map:<br/>";
	echo "<img src = \"" . $cityMap . "\" alt = \"map\" width = \"80%\" align = \"center\" /><br/><br/>";

?>

</div>

<?php
   include('footer.php');
?>


</html>
</body>