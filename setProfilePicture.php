<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>


<div class="content">
<center>
<?php
//edit profile picture form:
?>
<H2>Set your profile picture: </H2>
<table>
<form enctype="multipart/form-data" action="profilePictureSubmitted.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
<tr><th>Choose a file to upload: </th><td><input name="photo" type="file" /><br/></td></tr>
<tr><th align=center colspan = 2><input type="submit" value="Upload File" /></tr>
</form> 
</table>

<br/><br/>


<?php
//display current profile picture:
?>
<H2>Your current profile picture: </H2>
<?php
$user_id = $_COOKIE['user_id'];

//get profile picture for logged in user from db
$query = "SELECT * FROM profilePictures WHERE user_id = '$user_id';"; 
$result = mysqli_query($db, $query)or die("Error Querying Database");

$count = 0;
echo "<center><table width = \"90%\" cellpadding = 15>";
while($row = mysqli_fetch_array($result)) {
	$count ++;
	$photo = $row['photo'];
	
	//display current profile picture
	echo "<tr><td width = \"100%\" align = center><img src = \"" . $photo . "\" alt = \"pic\" width = \"100%\" /></td></tr>   ";

}
echo "</table></center>";		
	
?>

<?php
   include('footer.php');
?>

</body>
</html>