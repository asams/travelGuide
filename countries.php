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
<h3>
<?php
$query = "SELECT country_name, country_id, country_flag FROM countries ORDER BY country_name"; 
$result = mysqli_query($db, $query)or die("Error Querying Database");
while($row = mysqli_fetch_array($result)) {
	$countryName = $row['country_name'];
	$countryID = $row['country_id'];
	$countryFlag = $row['country_flag'];
						
	
	echo "<img src = \"" . $countryFlag . "\" alt = \"flag\" width = \"100\" />   ";
	echo "<a href=country.php?id=" . $countryID . ">" . $countryName . "</a><br/><br/>";

}
						
?>
</h3>
<br/><br/><br/>
</div>

<?php
   include('footer.php');
?>


</body>
</html>
