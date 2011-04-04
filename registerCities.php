<?php
   $error=$_GET['error'];
   if($error == "none"){
		//$error == "none" means the registration was successful and the cities that the user has visited have been added to the db
		header('Location: registrationComplete.php');

   }

   include('header_side.php');
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

	//get user info, city names, city ids, and city pics
	$query = "SELECT u.first_name, u.last_name, uc.*, co.country_name, ci.city_id, ci.city_name, ci.city_pic FROM users u NATURAL JOIN userCountries uc NATURAL JOIN countries co NATURAL JOIN cities ci WHERE user_id = '$user_id' ORDER BY co.country_name, ci.city_name";

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
		
		
		//output city names and pics as checkbox options for which cities the user has visited
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


<?php
//end of city registration form:
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
