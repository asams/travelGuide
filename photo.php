<?php
   //include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>


<div class="content">
<h1>Photographs we've received from our viewers:</h1>

<?php

$query = "SELECT * FROM city_photos;"; 
$result = mysqli_query($db, $query)or die("Error Querying Database");

$count = 0;
echo "<center><table width = \"90%\" cellpadding = 15>";
while($row = mysqli_fetch_array($result)) {
	$count ++;
	$subject = $row['subject'];
	$photo = $row['photo'];
	$date_submitted = $row['photo_date_submitted'];
						
	if($count % 5 == 1){
		echo "<tr valign = top>";
	}
	//What to echo in each cell
	echo "<td width = \"20%\" align = center>" . $subject . "<img src = \"" . $photo . "\" alt = \"flag\" width = \"100%\" />   ";
	//echo "<br/><a href=city.php?id=" . $cityID . ">" . $cityName . "</a><br/><br/></td>";
	if ($count % 5 == 0){
		echo "</tr>";
	}

}
echo "</table></center>";		
	
?>

<?php
   include('footer.php');
?>

</body>
</html>