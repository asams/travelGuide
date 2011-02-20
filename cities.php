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
$query = "SELECT name, city_id FROM cities ORDER BY name"; 
$result = mysqli_query($db, $query)or die("Error Querying Database");
while($row = mysqli_fetch_array($result)) {
	$cityName = $row['name'];
	$cityID = $row['city_id'];
					
        echo '<a href=city.php?id=' . $cityID . '>' . $cityName . '</a><br>';

}
						
?>
<hr />
</div>

<?php
   include('footer.php');
?>

</body>
</html>
