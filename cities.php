<?php
   include('db_connect.php');
?>

<?php
   include('header_side.php');
?>

<html>
<body>


<div class="content">
<h1>Here's a list of cities:</h1>
<?php
$query = "SELECT countries.country_name, cities.city_name, cities.city_id FROM cities INNER JOIN countries ON countries.country_id=cities.country_id ORDER BY cities.city_name"; 
$result = mysqli_query($db, $query)or die("Error Querying Database");
while($row = mysqli_fetch_array($result)) {
	$cityName = $row['city_name'];
	$cityID = $row['city_id'];
	$countryName = $row['country_name'];
					
        echo '<a href=city.php?id=' . $cityID . '>' . $cityName . ', ' . $countryName . '</a><br>';

}
						
?>
</div>

<?php
   include('footer.php');
?>

</body>
</html>
