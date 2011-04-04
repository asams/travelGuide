<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>


<div class="content">
<h1>Your Profile Picture:</h1>

<?php
$user_id = $_COOKIE['user_id'];

//get profile picture for logged in user
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
	//What to echo in each cell - display profile picture
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