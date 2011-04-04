<?php
	//get the id of the country from the URL
	if(isset($_GET['id'])){
		$countryId=$_GET['id'];
		header('Location: country.php?id=' . $countryId);
	}
	else{
		header('countries.php');
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
	$query = "INSERT INTO favoriteCountries (user_id, country_id) VALUES ('$user_id', '$countryId')";

	$result = mysqli_query($db, $query)or die("Error Querying Database");
	

   include('footer.php');
?>


</body>
</html>
