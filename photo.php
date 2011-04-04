<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>


<div class="content">
<H1>User uploaded photo about: </H1>

<?php

//get city ID from URL
$photoID = $_GET['id'];

$query = "SELECT * FROM city_photos WHERE photo_id = '$photoID'"; 
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
	
?>
	<H1><?php echo $subject ?></H1>
<?php
	//What to echo in each cell
	echo "<td width = \"20%\" align = center><img src = \"" . $photo . "\" alt = \"flag\" width = \"500\" />   ";
	if ($count % 5 == 0){
		echo "</tr>";
	}
}

?>
<!-- </br></br></br>
<H2>Share your thoughts about <?php echo $subject ?>:</H2>
<form action="cityPhotoCommentSubmitted.php" method="post" class="form">
<center>
<table>

<tr><th>Subject:</th><td><input type="text" id="subject" name="subject" size = 75 /></td></tr>
<tr><th>Comment:</th><td><textarea name="comment" id="comment" rows = "4" cols = "60"></textarea>
<input type="hidden" name="city_id" value=<?php echo $cityID ?>></td></tr>

<tr><td colspan = 2><center><input type="submit" class="formbutton" value="Submit" /></center></td></tr>
</form>
</table>

</center>
</br></br>
-->
<?php
echo "</table></center>";		
include('footer.php');
?>

</body>
</html>