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
	
	$query = "SELECT * FROM attractions WHERE attraction_id = $attractionID";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	
	while($row = mysqli_fetch_array($result)){
		$attraction_id = $row['attraction_id'];
		$name = $row['name'];
		$city_id = $row['city_id'];
		$attraction_type = $row['attraction_type'];
		$description = $row['description'];
		$address = $row['address'];
		$hours_of_operation = $row['hours_of_operation'];
		$entrance_price = $row['entrance_price'];
		$picture = $row['picture'];
		$website = $row['website'];
	}
	
?>


<?php
	
	$query = "SELECT name FROM cities WHERE city_id = $city_id";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");

	$row = mysqli_fetch_array($result);
	$city_name = $row['name'];
	
	echo $city_name;
	
	echo "<h1>" . $name . "</h1>";
	
	echo "<img src = \"" . $picture . "\" alt = \"flag\" width = \"50%\" align = \"right\"/>";
	echo "<p><H2>Info: </H2></p>";
	echo "Name: " . $name . "<br/><br/>";
	echo "City: " . $city_name . "<br/><br/>";
	echo "Attraction Type: " . $attraction_type . "<br/><br/>";
	echo "Description: " . $description . "<br/></br>";
	echo "Address: " . $address . "<br/><br/>";
	echo "Hours of Operation: " . $hours_of_operation . "<br/><br/>";
	echo "Entrance Price: " . ($entrance_price == 'Y' ? 'Yes' : 'No') . "<br/><br/>";
	echo "Website: " . ($website != 'n/a' ? "<a href = \" $website \"> $website </a>" : $website) . "<br/><br/><br/><br/><br/><br/>";

?>



<hr />
</div>

<?php
   include('footer.php');
?>

</body>
</html>