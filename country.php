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
  	$countryID = $_GET['id'];
	
	$query = "SELECT * FROM countries WHERE country_id = $countryID";

	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	
	while($row = mysqli_fetch_array($result)){
		$countryName = $row['name'];
		$countryID = $row['country_id'];
		$capital = $row['capital'];
		$government = $row['government'];
		$currency = $row['currency'];
		$population = $row['population'];
		$area = $row['area'];
		$language = $row['official_language'];
		$religion = $row['religion'];
		$map = $row['country_map'];
		$flag = $row['flag'];
		$coat_of_arms = $row['coat_of_arms'];
		$website = $row['website'];
	}
	
	$query = "SELECT name, city_id FROM cities WHERE country_id = $countryID";
	
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");
	
	$featuredCityLinks = "<ul>";
	
	while($row = mysqli_fetch_array($result)){
		$cityName = $row['name'];
		$cityID = $row['city_id'];
		
		$featuredCityLinks = $featuredCityLinks . "<li><a href = \"city.php?id=" . $cityID . "\">" . $cityName . "</a></li>";
	}
	
	$featuredCityLinks = $featuredCityLinks . "</ul>";
	

?>



<?php
	
	echo "<h1>" . $countryName . "</h1>";

	echo "<img src = \"" . $flag . "\" alt = \"flag\" width = \"50%\" align = \"right\"/>";

	echo "<p><H2>Info: </H2></p>";
	echo "Name: " . $countryName . "<br/><br/>";
	echo "Capital City: " . $capital . "<br/><br/>";
	echo "Cities Featured on TravelGuide: " . $featuredCityLinks . "<br/>";
	echo "Form of Government: " . $government . "<br/><br/>";
	echo "Currency: " . $currency . "<br/><br/>";
	echo "Population: " . $population . " people <br/><br/>";
	echo "Area: " . $area . " km<sup>2</sup>" . "<br/><br/>";
	echo "Official or National Language(s): " . $language . "<br/><br/>";
	echo "Official or Majority Religion(s): " . $religion . "<br/><br/>";
	echo "Website: <a href = \"" . $website . "\">" . $website . "</a><br/><br/><br/><br/><br/><br/>";
	
	echo "Map:<br/>";
	echo "<img src = \"" . $map . "\" alt = \"map\" width = \"60%\" align = \"center\" /><br/><br/>";
//	echo "<img src = \"" . $coat_of_arms . "\" alt = \"coat of arms\" width = \"20%\" align = \"center\" /><br/><br/>";
	

?>

</div>

<?php
   include('footer.php');
?>

</body>
</html>
