<?php

	//get the id of the attraction from the URL
	if(isset($_GET['id'])){
		$attractionId=$_GET['id'];
		header('Location: attraction.php?id=' . $attractionId);
	}
	else{
		header('attractions.php');
	}
	
	include('header_side.php');
	include('db_connect.php');
?>

<html>
<body>

<?php
	
	$user_id = $_SESSION['user_id'];
 
	if( isset($_COOKIE['user_id'])){
		$user_id = $_COOKIE['user_id'];

	}


	//insert record into favorite attractions table
	$query = "INSERT INTO favoriteAttractions (user_id, attraction_id) VALUES ('$user_id', '$attractionId')";

	$result = mysqli_query($db, $query)or die("Error Querying Database");
	
	

   include('footer.php');
?>


</body>
</html>
