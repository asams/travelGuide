<?php
	//get the id of the city from the URL
	if(isset($_GET['id'])){
		$cityId=$_GET['id'];
		header('Location: city.php?id=' . $cityId);
	}
	else{
		header('cities.php');
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

	//insert record into favorite cities table
	$query = "INSERT INTO favoriteCities (user_id, city_id) VALUES ('$user_id', '$cityId')";

	$result = mysqli_query($db, $query)or die("Error Querying Database");
	

   include('footer.php');
?>


</body>
</html>
