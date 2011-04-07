<?php
	session_start();
	$user_id = $_SESSION['user_id'];
	if(!isset($user_id)){
		header('Location: needAnAccount.php');
	}

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

	//get user information 
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

	//get user's profile picture
   	$query = "SELECT photo FROM profilePictures WHERE user_id = '$usersProfile'";
   	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");

	//if a picture doesn't exist, then use the default profile picture
   	if($row = mysqli_fetch_array($result)) {
		$photo = $row['photo'];
   	} else {
	$photo = "profilePictures/defaultProfilePicture.jpg";
   	}

   
	//get user's country travel information
   	$query = "SELECT u.*, uc.*, co.country_name, co.country_flag FROM users u NATURAL JOIN userCountries uc NATURAL JOIN countries co WHERE user_id = '$usersProfile' ORDER BY co.country_name";
   	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");
   

   	$travelHistory = "<table width = \"90%\" cellpadding = 15>";
   	$count = 0; //used to count the number of countries
   	while($row = mysqli_fetch_array($result)){
		$count ++;
		
		$countryID = $row['country_id'];
		$countryName = $row['country_name'];
		$countryFlag = $row['country_flag'];
		

		//store the countries' flags and names in travelHistory...only 5 flags per row
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
	$query = "SELECT ci.city_id, ci.city_name, ci.city_pic FROM userCities uc NATURAL JOIN cities ci NATURAL JOIN countries co WHERE uc.user_id = '$usersProfile' ORDER BY ci.city_name";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");
	$travelCities = "<table width = \"90%\" cellpadding = 15>";
	$count = 0;
	while($row = mysqli_fetch_array($result)){
		$count ++;
		
		$cityID = $row['city_id'];
		$cityName = $row['city_name'];
		$cityPic = $row['city_pic'];
		

		//store the cities' pictures and names in travelCities....only 5 pictures per row
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
		
		
		//store the favorited countries' flags and names in favCountries...only 5 pictures per row
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
		
		//store the favorited cities' pictures and names in favCities...only 5 pictures per row
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
		
		//store the favorited attractions' pictures and names in favAttractions...only 5 pictures per row
		if($count % 5 == 1){
			$favAttractions = $favAttractions . "<tr valign = top>";
		}
		$favAttractions = $favAttractions . "<td width = \"20%\" align = center><a href=attraction.php?id=" . $attractionID . "><img src = \"" . $attractionPic . "\" alt = \"pic\" width = \"100\" /></a><br/><a href = \"attraction.php?id=" . $attractionID . "\">" . $attractionName . "</a></td>";
		if ($count % 5 == 0){
			$favAttractions = $favAttractions . "</tr>";
		}
	
	}
	$favAttractions = $favAttractions . "</table>";
	

	//get user rating information for attractions
	$query = "SELECT ar.attraction_id, ar.rating, a.attraction_type, a.attraction_name, ci.city_id, co.country_id FROM countries co NATURAL JOIN cities ci NATURAL JOIN attractions a NATURAL JOIN attractionRatings ar NATURAL JOIN users WHERE ar.user_id = '$usersProfile' ORDER BY a.attraction_name";
	//echo $query;
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 5");
	$ratedAttractions = "<ul>";
	$numOfRatings = 0;
	$addToQuery = "( ";
	$addToQuery3 = "( ";
	$addToQuery4 = "( ";
	
	$rating =0;
	while($row = mysqli_fetch_array($result)){
		$rating++;
		$attractionCity = $row['city_id'];
		$attractionID = $row['attraction_id'];
		$attractionType = $row['attraction_type'];
		$attractionName = $row['attraction_name'];
		$attractionRating = $row['rating'];
		$attractionCountry = $row['country_id'];
		
		//$addToQuery2 = "( ";
		
		//echo $attractionRating;
		if ($attractionRating >= 3) {
			$attractionTypes[numOfRatings] = $attractionType;
			$addToQuery = $addToQuery . " attraction_type='" . $attractionType . "' OR ";
			//echo $addToQuery;
			$attractionCities[numOfRatings] = $attractionCity;
			//echo $attractionCities[numOfRatings];
			$addToQuery2 = $addToQuery2 . " a.city_id=" . $attractionCity . " OR ";
			//echo $attractionIDs[numOfRatings];
			
			$addToQuery3 = $addToQuery3 . " co.country_id=" . $attractionCountry . " OR ";
			
			$addToQuery4 = $addToQuery4 . " a.attraction_id!='" . $attractionID . "' AND ";
		}
		
		$ratedAttractions = $ratedAttractions . "<li><a href=attraction.php?id=" . $attractionID . ">" . $attractionName . "</a> (" . $attractionRating . ") </li><br/>";
	    $numOfRatings ++;
	}
	$addToQuery = substr($addToQuery,0,-3);
	$addToQuery = $addToQuery . ") AND (";
	
	$addToQuery2 = substr($addToQuery2,0,-3);
	$addToQuery2 = $addToQuery2 . " ) AND ";
	
	$addToQuery3 = substr($addToQuery3,0,-3);
	$addToQuery3 = $addToQuery3 . " ) AND ";
	
	$addToQuery4 = substr($addToQuery4,0,-4);
	$addToQuery4 = $addToQuery4 . " ) ";
	
	$ratedAttractions = $ratedAttractions . "</ul>";
	

	$recommendedAttractions = "<ul>";
	
	if($rating != 0) {
	//for ( $j=0; $j<sizeof($attractionTypes); $j++) {
	
		//for ( $k=0; $k<sizeof($attractionCities); $k++) {
			//echo $attractionTypes[$k];
			$query = "SELECT a.attraction_id, a.attraction_type, a.attraction_name FROM attractions a NATURAL JOIN cities ci NATURAL JOIN countries co WHERE " . $addToQuery . $addToQuery2 . $addToQuery3 . $addToQuery4 . ""; 
			//echo $query;
			$result = mysqli_query($db, $query) or die ("Error Querying Database - 6");
			
			while($row = mysqli_fetch_array($result)) {
				$attractionID = $row['attraction_id'];
				//$attractionType = $row['attraction_type'];
				$attractionName = $row['attraction_name'];
				$attractionRating = $row['rating'];
		
				$recommendedAttractions = $recommendedAttractions . "<li><a href=attraction.php?id=" . $attractionID . ">" . $attractionName . "</a></li><br/>";
	
			}
		//}
	
	//}
	}
	$recommendedAttractions = $recommendedAttractions . "</ul>";
	
	
	
	
	//display everything:
	echo "<center><h1>" . $firstName . " " . $lastName . "</h1>";
	echo "<img src=" . $photo .  " align=center width=20% ></center><br/><br/>";
	
	echo "<H2>Info: </H2>";
	
//	echo "<table cellpadding = 8 ><tr><td width = \"20%\">";
//	echo "<img src=" . $photo .  " align=left width=100% >";
	//echo "</td><td><b>Name: </b>" . $firstName . " " . $lastName . "<br/><br/>";
//	echo "</td><td><b>Email: </b>" . $email . "<br/><br/>";
//	echo "<b>Origin: </b>" . $origin . "<br/><br/>";
//	echo "<b>Home City: </b>" . $homeCity . "";
	
	echo "<b>Email: </b>" . $email . "<br/><br/>";
	echo "<b>Origin: </b>" . $origin . "<br/><br/>";
	echo "<b>Home City: </b>" . $homeCity . "";
	
//	echo "</td></table><br/><br/><br/>";

	echo "<form action=myComments.php method=\"POST\" >";
	echo "<input type=\"hidden\" name=\"usersProfile\" value=" . $usersProfile . ">";
	echo "<input type=\"hidden\" name=\"sortBy\" value=\"placeType\" />";
	echo "<center><input type=\"submit\" value=\"See my comments!\" class=\"formbutton\"/>";
	echo "</center></form><br/><br/>";
	
	echo "<form action=myPhotos.php method=\"POST\" >";
	echo "<input type=\"hidden\" name=\"usersProfile\" value=" . $usersProfile . ">";
	echo "<input type=\"hidden\" name=\"sortBy\" value=\"placeType\" />";
	echo "<center><input type=\"submit\" value=\"See my photos!\" class=\"formbutton\"/>";
	echo "</center></form>";

	echo "<br/><H2>Travel History: </H2><b>Countries: </b>" . $travelHistory;
	echo "<b>Cities: </b>" . $travelCities;

	echo "<H2>Favorites: </H2>";
	echo "<b>Countries: </b>" . $favCountries;
	echo "<b>Cities: </b>" . $favCities;
	echo "<b>Attractions: </b>" . $favAttractions;


	//if the user viewing the profile is the owner of the profile,
	//then display the edit button
	if ($usersProfile == $user_id) {
	
		if($rating != 0) {
			echo "<H2>Recommendations:</h2>"; 
			echo "<H3>Attractions You've Rated: </H3>";
			echo $ratedAttractions;
			echo "<H3>Attractions We Recommend Based on Your Ratings: </H3>";
			echo $recommendedAttractions;
		}
	
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