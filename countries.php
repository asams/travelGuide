<?php
   include('db_connect.php');
?>

<?php
   include('header_side.php');
?>

<html>
<body>


<div class="content">
<h1>Here's a list of countries:</h1>
<?php
$query = "SELECT name, country_id FROM countries ORDER BY name"; 
$result = mysqli_query($db, $query)or die("Error Querying Database");
while($row = mysqli_fetch_array($result)) {
	$countryName = $row['name'];
	$countryID = $row['country_id'];
						


        //echo "<li><i><a href=\"country.php?id=$countryID\"> 

	echo '<a href=country.php?id=' . $countryID . '>' . $countryName . '</a><br>';

}
						
?>

</div>

<?php
   include('footer.php');
?>


</body>
</html>
