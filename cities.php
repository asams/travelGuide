<?php
   include('header_side.php');
    include('db_connect.php');
?>

<html>
<body>


<div class="content">
<h1>Here's a list of cities:</h1>
<?php
	//get the information for each city
	$query = "SELECT countries.country_name, cities.city_name, cities.city_id, cities.city_pic FROM cities INNER JOIN countries ON countries.country_id=cities.country_id ORDER BY cities.city_name"; 
	$result = mysqli_query($db, $query)or die("Error Querying Database");

	$count = 0;
	echo "<center><table width = \"90%\" cellpadding = 15>";
	while($row = mysqli_fetch_array($result)) {
		$count ++;
		$cityName = $row['city_name'];
		$cityID = $row['city_id'];
		$countryName = $row['country_name'];
		$cityPic = $row['city_pic'];
	
		if($count % 5 == 1){
			echo "<tr valign = top>";
		}
		echo "<td width = \"20%\" align = center><a href=city.php?id=" . $cityID . "><img src = \"" . $cityPic . "\" alt = \"pic\" width = \"100%\" /></a>   ";
    		echo '<br/><a href=city.php?id=' . $cityID . '>' . $cityName . ', <br/>' . $countryName . '</a><br>';
		if ($count % 5 == 0){
			echo "</tr>";
		}
	}
	echo "</table></center>";					

?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

<?php
   include('footer.php');
?>

</body>
</html>
