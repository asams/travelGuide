<?php
   //include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>


<div class="content">
<H2>Photographs we've received from our viewers:</H2>

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
	$photoID = $row['photo_id'];
						
	if($count % 5 == 1){
		echo "<tr valign = top>";
	}
	//What to echo in each cell
	echo "<td width = \"20%\" align = center><img src = \"" . $photo . "\" alt = \"flag\" width = \"200\" />   ";
	echo "<br/> " . $subject . "<br/><br/>";
	if ($count % 5 == 0){
		echo "</tr>";
	}

}
echo "</table></center>";		
	
?>

</body>
</html>