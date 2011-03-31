<?php
   $error=$_GET['error'];
   if($error == "none"){
		header('Location: registrationComplete.php');

   }
//   else if($error == "pickCities"){
//		header('Location: registerCities.php');
//   }

   include('header_side.php');
//   session_start();
   include('db_connect.php');


?>

<html>
<body>


<div class="content">
<h2><center>You've visited these countries...did you visit any of these cities?</h2>

<form action=submitRegistrationCities.php method="POST" >
<?php
	
	$user_id = $_SESSION['user_id'];
 
	if( isset($_COOKIE['user_id'])){
		$user_id = $_COOKIE['user_id'];
	}
//	echo 'user id: ' . $user_id; 
	$query = "SELECT u.first_name, u.last_name, uc.*, co.country_name, ci.city_id, ci.city_name, ci.city_pic FROM users u NATURAL JOIN userCountries uc NATURAL JOIN countries co NATURAL JOIN cities ci WHERE user_id = '$user_id' ORDER BY co.country_name, ci.city_name";



//	$query = "SELECT country_name, country_id, country_flag FROM countries ORDER BY country_name"; 
	$result = mysqli_query($db, $query)or die("Error Querying Database");
	$possibleCities = "<table width = \"100%\" cellpadding = 15>";
	$countryName = "test";
    $count = 0;
	while($row = mysqli_fetch_array($result)) {
		$count ++;

		$firstName = $row['first_name'];
		$lastName = $row['last_name'];
		
		$cityID = $row['city_id'];
		$cityName = $row['city_name'];
		$cityPic = $row['city_pic'];
		
		if ($countryName <> $row['country_name']) {
			$countryName = $row['country_name'];
			$possibleCities = $possibleCities . "<tr><th colspan = 2><br/><br/><h3><u><b>" . $countryName . "</h3></b></u></th></td></tr><tr>";
		}
	
		
		$possibleCities = $possibleCities . "<td width = \"50%\" align = center valign = bottom><img src = \"" . $cityPic . "\" alt = \"pic\" width = \"90%\" /><br/><input type=\"checkbox\" name=\"visited[]\" value=" . $cityID . " > ". $cityName . "<br></td>";
	
		if ($count % 2 == 0){
			$possibleCities = $possibleCities . "</tr>";
		}
	
	}
	$possibleCities = $possibleCities . "</table>";
	
	echo $possibleCities;
	
	
	

?>


<table align = center>
<tr><td><br></td></tr>
<tr><td><input type="submit" value="Submit" class="formbutton"></td></tr>
</table>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>


<?php
   include('footer.php');
?>


</body>
</html>
