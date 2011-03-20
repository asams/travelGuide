<?php
//	session_start();
//	$user_id = $_SESSION['user_id'];
 
//if( isset($_COOKIE['user_id'])){
//	$user_id = $_COOKIE['user_id'];
//}
//else{
//	setcookie('user_id', $_SESSION['user_id'], time()+60*60*24);
//}
	include('header_side.php');
	include('db_connect.php');
?>


<?php
//   include('db_connect.php');
?>

<?php
//   include('header_side.php');
?>

<html>
<body>

<div class="content">
<h1><center>Welcome to Our TravelGuide*!</center></h1>


<?php

$int = 0;
$query = "SELECT city_name FROM cities ORDER BY RAND() LIMIT 1";
$result = mysqli_query($db, $query)or die("Error Querying Database");
$row = mysqli_fetch_array($result);
$featured = $row['city_name'];


?>

<?php
	
	$query = "SELECT * FROM cities WHERE city_name = '$featured'";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	
	while($row = mysqli_fetch_array($result)){
		$cityId = $row['city_id'];
		$cityName = $row['city_name'];
		$countryId = $row['country_id'];
		$region = $row['city_region'];
		$population = $row['city_population'];
		$cityMap = $row['city_map'];
		$flag = $row['city_flag'];
		$coatOfArms = $row['city_coat_of_arms'];
		$cityPicture = $row['city_pic'];
		$website = $row['city_website'];
	}
	
	$query = "SELECT country_name FROM countries WHERE country_id=$countryId";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");
	$row = mysqli_fetch_array($result);
	$countryName = $row['country_name'];
	
	$query = "SELECT attraction_name, attraction_id FROM attractions WHERE city_id = $cityId ORDER BY attraction_name";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 3");
	$attractionLinks = "<ul>";
	
	while($row = mysqli_fetch_array($result)){
		$attractionName = $row['attraction_name'];
		$attractionID = $row['attraction_id'];
		
		$attractionLinks = $attractionLinks . "<li><a href = \"attraction.php?id=" . $attractionID . "\">" . $attractionName . "</a></li>";
	}
	
	$attractionLinks = $attractionLinks . "</ul>";

?>

<?php
	
	echo "<center><h1>Featured City: " . $cityName . ', ' . $countryName . "</h1></center>";
	echo "<table cellpadding = 15 valign = top><tr><td width = \"50%\">";
	echo ($cityPicture != 'N/A' ? "<img src = \"" . $cityPicture . "\" alt = \"flag\" width = \"100%\"  border=\"2\" />" : "");
	echo "</td><td><p><H2>Info: </H2></p>";
	echo "Name: " . $cityName . "<br/><br/><br/>";
	echo "Region: " . $region . "<br/><br/><br/>";
	echo "Attractions Featured on TravelGuide: " . $attractionLinks . "<br/><br/>";
	echo "Population: " . $population . " people <br/><br/><br/>";
	echo "Website: <a href = \"" . $website . "\">" . $website . "</a><br/><br/><br/><br/><br/><br/></right></td></tr>";
	echo "</table>";
	echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
	echo "<center>*If you have a suggestion for a better name than \"TravelGuide\", let us know on our ContactUs page!</center>";
//	echo "Session: " . $_SESSION['user_id'] . "   Cookie: " . $_COOKIE['user_id'];

?>

</div>

<?php
   include('footer.php');
?>

</body>
</html>
