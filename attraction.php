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
  	$attractionID = $_GET['id'];
	$query = "SELECT a.*, ci.city_name FROM attractions a NATURAL JOIN cities ci WHERE a.attraction_id = $attractionID";	
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	echo $query;
	
	while($row = mysqli_fetch_array($result)){
		$attraction_id = $row['attraction_id'];
		$name = $row['attraction_name'];  
		$city_id = $row['city_id'];
		$attraction_type = $row['attraction_type'];
		$description = $row['attraction_description'];
		$address = $row['attraction_address'];
		$hours_of_operation = $row['attraction_hours_of_operation'];
		$entrance_price = $row['attraction_entrance_price'];
		$picture = $row['attraction_picture'];
		$website = $row['attraction_website'];
		$city_name = $row['city_name'];
	}
	
	echo "<h1>" . $name . "</h1>";
	
	echo "<img src = \"" . $picture . "\" alt = \"flag\" width = \"50%\"  align = \"right\"/>";
	echo "<p><H2>Info: </H2></p>";
	echo "City: " . "<a href = \"city.php?id=" . $city_id . "\"> $city_name </a>" . "<br/><br/>";
	echo "Attraction Type: " . $attraction_type . "<br/><br/>";
	echo "Description: " . $description . "<br/></br>";
	echo "Address: " . $address . "<br/><br/>";
	echo "Hours of Operation: " . $hours_of_operation . "<br/><br/>";
	echo "Entrance Price: " . ($entrance_price == 'Y' ? 'Yes' : 'No') . "<br/><br/>";
	echo "Website: " . ($website != 'N/A' ? "<a href = \" $website \"> $website </a>" : $website) . "<br/><br/><br/><br/><br/><br/>";

?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

<?php
   include('footer.php');
?>

</body>
</html>