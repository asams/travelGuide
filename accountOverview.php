<?php
   include('header_side.php');
   include('db_connect.php');

   $usersProfile = $_GET['id'];

   if (!isset($usersProfile)) {
	$usersProfile = $user_id;
   }
?>

<html>
<body>
<div class="content">


<?php   

	//get user information and country travel information
   
   $query = "SELECT u.* FROM users u WHERE user_id = '$usersProfile'";
   $result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
   while($row = mysqli_fetch_array($result)){
		$count ++;
        	$username = $row['username'];
		$firstName = $row['first_name'];
		$lastName = $row['last_name'];
		$email = $row['email'];
		$origin = $row['origin'];
		$homeCity = $row['homeCity'];
   }

   $query = "SELECT photo FROM profilePictures WHERE user_id = '$usersProfile'";
   $result = mysqli_query($db, $query) or die ("Error Querying Database - 1");

   if($row = mysqli_fetch_array($result)) {
	$photo = $row['photo'];
   } else {
	$photo = "profilePictures/defaultProfilePicture.jpg";
   }

   


   $query = "SELECT u.*, uc.*, co.country_name, co.country_flag FROM users u NATURAL JOIN userCountries uc NATURAL JOIN countries co WHERE user_id = '$usersProfile' ORDER BY co.country_name";
   $result = mysqli_query($db, $query) or die ("Error Querying Database - 2");
   

   $travelHistory = "<table width = \"90%\" cellpadding = 15>";
   $count = 0;
   while($row = mysqli_fetch_array($result)){
		$count ++;
        	//$username = $row['username'];
		//$firstName = $row['first_name'];
		//$lastName = $row['last_name'];
		//$email = $row['email'];
		//$origin = $row['origin'];
		//$homeCity = $row['homeCity'];
		
		$countryID = $row['country_id'];
		$countryName = $row['country_name'];
		$countryFlag = $row['country_flag'];
		
	if($count % 5 == 1){
		$travelHistory = $travelHistory . "<tr valign = top>";
	}
	$travelHistory = $travelHistory . "<td width = \"20%\" align = center><a href=country.php?id=" . $countryID . "><img src = \"" . $countryFlag . "\" alt = \"flag\" width = \"100\" /></a><br/><a href = \"country.php?id=" . $countryID . "\">" . $countryName . "</a></td>";
	if ($count % 5 == 0){
		$travelHistory = $travelHistory . "</tr>";
	}
	
   }

	$travelHistory = $travelHistory . "</table>";
	
	//get city travel information
	$query = "SELECT ci.city_id, ci.city_name, ci.city_pic FROM userCities uc NATURAL JOIN cities ci NATURAL JOIN countries co WHERE uc.user_id = '$usersProfile' ORDER BY co.country_name, ci.city_name";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");
	$travelCities = "<table width = \"90%\" cellpadding = 15>";
	$count = 0;
	while($row = mysqli_fetch_array($result)){
		$count ++;
		
		$cityID = $row['city_id'];
		$cityName = $row['city_name'];
		$cityPic = $row['city_pic'];
		
	if($count % 5 == 1){
		$travelCities = $travelCities . "<tr valign = top>";
	}
	$travelCities = $travelCities . "<td width = \"20%\" align = center><a href=city.php?id=" . $cityID . "><img src = \"" . $cityPic . "\" alt = \"flag\" width = \"100\" /></a><br/><a href = \"city.php?id=" . $cityID . "\">" . $cityName . "</a></td>";
	if ($count % 5 == 0){
		$travelCities = $travelCities . "</tr>";
	}
	
	}
	$travelCities = $travelCities . "</table>";
	
	//get user favorite information for countries
	$query = "SELECT co.country_id, co.country_name, co.country_flag FROM users u NATURAL JOIN favoriteCountries fc NATURAL JOIN countries co WHERE fc.user_id = '$usersProfile' ORDER BY co.country_name";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");
	$favCountries = "<table width = \"90%\" cellpadding = 15>";
	$count = 0;
	while($row = mysqli_fetch_array($result)){
		$count ++;
		
		$countryID = $row['country_id'];
		$countryName = $row['country_name'];
		$countryFlag = $row['country_flag'];
		
	if($count % 5 == 1){
		$favCountries = $favCountries . "<tr valign = top>";
	}
	$favCountries = $favCountries . "<td width = \"20%\" align = center><a href=country.php?id=" . $countryID . "><img src = \"" . $countryFlag . "\" alt = \"flag\" width = \"100\" /></a><br/><a href = \"country.php?id=" . $countryID . "\">" . $countryName . "</a></td>";
	if ($count % 5 == 0){
		$favCountries = $favCountries . "</tr>";
	}
	
	}
	$favCountries = $favCountries . "</table>";
	
	
	//get user favorite information for cities
	$query = "SELECT ci.city_id, ci.city_name, ci.city_pic FROM users u NATURAL JOIN favoriteCities fc NATURAL JOIN cities ci WHERE fc.user_id = '$usersProfile' ORDER BY ci.city_name";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 3");
	$favCities = "<table width = \"90%\" cellpadding = 15>";
	$count = 0;
	while($row = mysqli_fetch_array($result)){
		$count ++;
		
		$cityID = $row['city_id'];
		$cityName = $row['city_name'];
		$cityPic = $row['city_pic'];
		
	if($count % 5 == 1){
		$favCities = $favCities . "<tr valign = top>";
	}
	$favCities = $favCities . "<td width = \"20%\" align = center><a href=city.php?id=" . $cityID . "><img src = \"" . $cityPic . "\" alt = \"pic\" width = \"100\" /></a><br/><a href = \"city.php?id=" . $cityID . "\">" . $cityName . "</a></td>";
	if ($count % 5 == 0){
		$favCities = $favCities . "</tr>";
	}
	
	}
	$favCities = $favCities . "</table>";
	
	
	//get user favorite information for attractions
	$query = "SELECT a.attraction_id, a.attraction_name, a.attraction_picture FROM users u NATURAL JOIN favoriteAttractions fa NATURAL JOIN attractions a WHERE fa.user_id = '$usersProfile' ORDER BY a.attraction_name";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 4");
	$favAttractions = "<table width = \"90%\" cellpadding = 15>";
	$count = 0;
	while($row = mysqli_fetch_array($result)){
		$count ++;
		
		$attractionID = $row['attraction_id'];
		$attractionName = $row['attraction_name'];
		$attractionPic = $row['attraction_picture'];
		
	if($count % 5 == 1){
		$favAttractions = $favAttractions . "<tr valign = top>";
	}
	$favAttractions = $favAttractions . "<td width = \"20%\" align = center><a href=attraction.php?id=" . $attractionID . "><img src = \"" . $attractionPic . "\" alt = \"pic\" width = \"100\" /></a><br/><a href = \"attraction.php?id=" . $attractionID . "\">" . $attractionName . "</a></td>";
	if ($count % 5 == 0){
		$favAttractions = $favAttractions . "</tr>";
	}
	
	}
	$favAttractions = $favAttractions . "</table>";
	

	
	//display everything:
	echo "<h1>" . $username . "</h1>";

	echo "<H2>Info: </H2>";
	
	echo "<table cellpadding = 8 ><tr><td width = \"20%\">";
	echo "<img src=" . $photo .  " align=left width=100% >";
	echo "</td><td>Name: " . $firstName . " " . $lastName . "<br/><br/>";
	echo "Email: " . $email . "<br/><br/>";
	echo "Origin: " . $origin . "<br/><br/>";
	echo "Home City: " . $homeCity . "";
	
	echo "</td></table><br/><br/><br/>";


	echo "<br/><H2>Travel History: </H2>Countries:" . $travelHistory;
	echo "Cities: " . $travelCities;

	echo "<H2>Favorites: </H2>";
	echo "Countries: " . $favCountries;
	echo "Cities: " . $favCities;
	echo "Attractions: " . $favAttractions;


	if ($usersProfile == $user_id) {
	
	
?>
<br/><br/>


<form action=editAccount.php method="POST" >
   <center><input type="submit" value="Edit Account Information!" class="formbutton"/></center>
</form>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

<?php
}
   include('footer.php');
?>


</html>
</body>