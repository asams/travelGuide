<?php
   include('header_side.php');
   include('db_connect.php');

?>

<html>
<body>


<div class="content">
<h1>Here's a list of countries:</h1>
<h3>
<?php

//get each of the country's information from the table
$query = "SELECT country_name, country_id, country_flag FROM countries ORDER BY country_name"; 
$result = mysqli_query($db, $query)or die("Error Querying Database");

$count = 0;
echo "<center><table width = \"90%\" cellpadding = 15>";
while($row = mysqli_fetch_array($result)) {
	$count ++;
	$countryName = $row['country_name'];
	$countryID = $row['country_id'];
	$countryFlag = $row['country_flag'];
	
					
	if($count % 5 == 1){
		echo "<tr valign = top>";
	}

	//display the info
	echo "<td width = \"20%\" align = center><a href=country.php?id=" . $countryID . "><img src = \"" . $countryFlag . "\" alt = \"flag\" width = \"100%\" /></a>   ";
	echo "<br/><a href=country.php?id=" . $countryID . ">" . $countryName . "</a><br/><br/></td>";
	if ($count % 5 == 0){
		echo "</tr>";
	}

}
echo "</table></center>";					
?>
</h3>
<br/><br/><br/>
</div>

<?php
   include('footer.php');
?>


</body>
</html>
