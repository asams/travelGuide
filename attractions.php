<?php
   include('db_connect.php');
?>

<?php
   include('header_side.php');
?>

<html>
<body>


<div class="content">
<h1>Here's a list of attractions:</h1>
<?php
$query = "SELECT name, attraction_id FROM attractions ORDER BY name"; 
$result = mysqli_query($db, $query)or die("Error Querying Database");
while($row = mysqli_fetch_array($result)) {
	$attractionName = $row['name'];
	$attractionID = $row['attraction_id'];

	echo '<a href=attraction.php?id=' . $attractionID . '>' . $attractionName . '</a><br>';

}
						
?>
<hr />

</div>

<?php
   include('footer.php');
?>

</body>
</html>
