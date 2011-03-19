<?php
   include('db_connect.php');
?>

<?php
   include('header_side.php');
?>

<html>
<body>


<div class="content">
<h1>Here's a list of attractions by city:</h1>
<?php
$query = "SELECT attractions.attraction_name, attractions.attraction_id, cities.city_name, cities.city_id, cities.city_pic, countries.country_name FROM attractions INNER JOIN cities ON cities.city_id=attractions.city_id INNER JOIN countries ON cities.country_id=countries.country_id ORDER BY cities.city_name, attractions.attraction_name";
$result = mysqli_query($db, $query)or die("Error Querying Database");

$headerCity = 'test';

echo "<table cellpadding = 15>";
while($row = mysqli_fetch_array($result)) {
	$attractionName = $row['attraction_name'];
	$attractionID = $row['attraction_id'];
	$countryName = $row['country_name'];

 	
	if ($headerCity <> $row['city_name']) {
		$headerCity = $row['city_name'];
		$cityName = $row['city_name'];
		$cityID = $row['city_id'];
		$cityPic = $row['city_pic'];
		echo "<tr valign = top><td align = center><a href=city.php?id=" . $cityID . "><img src = \"" . $cityPic . "\" alt = \"pic\" width = \"200\" /></a>   ";
		echo "</td><td>";
		//echo "<br/><a href=city.php?id=" . $cityID . ">" . $headerCity . ',<br/> ' . $countryName . "</a><br/><br/></td><td>";
		echo "<u>" . $headerCity . ', ' . $countryName . "</u><br/><br/>";
	} else {
		$cityName = $headerCity;
	}
	

	echo '<a href=attraction.php?id=' . $attractionID . '>' . $attractionName . '</a><br>';

}
echo "</td></tr></table>";
						
?>

</div>

<?php
   include('footer.php');
?>

</body>
</html>
