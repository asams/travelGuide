<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>


<div class="content">
<center>
<H2>Set your profile picture: </H2>
<table>
<form enctype="multipart/form-data" action="profilePictureSubmitted.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
<tr><th>Choose a file to upload: </th><td><input name="photo" type="file" /><br/></td></tr>
<tr><th align=center colspan = 2><input type="submit" value="Upload File" /></tr>
</form> 
</table>

<br/><br/>

<H2>Your current profile picture: </H2>
<?php
$user_id = $_COOKIE['user_id'];

$query = "SELECT * FROM profilePictures WHERE user_id = '$user_id';"; 
$result = mysqli_query($db, $query)or die("Error Querying Database");

$count = 0;
echo "<center><table width = \"90%\" cellpadding = 15>";
while($row = mysqli_fetch_array($result)) {
	$count ++;
	$photo = $row['photo'];
						
	if($count % 5 == 1){
		echo "<tr valign = top>";
	}
	//What to echo in each cell
	echo "<td width = \"20%\" align = center><img src = \"" . $photo . "\" alt = \"pic\" width = \"100%\" />   ";
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