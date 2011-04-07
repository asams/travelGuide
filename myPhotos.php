<?php
	session_start();
	$user_id = $_SESSION['user_id'];
	if(!isset($user_id)){
		header('Location: needAnAccount.php');
	}

   include('header_side.php');
   include('db_connect.php');
   
   $usersProfile = $_POST['usersProfile'];
   $sortBy = $_POST['sortBy'];
?>


<html>
<body>




<div class="content">

<table rules = rows>

<?php
	
	//get user information 
   	$query = "SELECT u.* FROM users u WHERE user_id = '$usersProfile'";
   	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
   	while($row = mysqli_fetch_array($result)){
		$firstName = $row['first_name'];
		$lastName = $row['last_name'];
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
	
	echo "<center><h1>" . $firstName . " " . $lastName . "'s Photos:</h1>";
	echo "<img src=" . $photo .  " align=center width=20% ></center><br/><br/>";
	//echo $query;
	

	
if($sortBy == "commentDate"){
	//get photos by user on all place types
	$query = "SELECT cp.*, ci.city_name place_name FROM cities ci NATURAL JOIN city_photos cp WHERE cp.user_id = $usersProfile ";
	$query = $query . "UNION SELECT ap.*, a.attraction_name place_name FROM attractions a NATURAL JOIN attraction_photos ap WHERE ap.user_id = $usersProfile ORDER BY photo_date_submitted DESC";
	
	//echo $query;
	
	$result = mysqli_query($db, $query) or die ("Error Querying Database - union");

	$photos_table = "<table rules = rows width = \"100%\">";
	$photos_table = $photos_table . "<tr><td>   </td></tr><tr><th>Photos submitted</th></tr>";
	$count = 0;
	while($row = mysqli_fetch_array($result)){
		$count++;
		$placeName = $row['place_name'];
		$photo_subject = $row['subject'];
		$photo = $row['photo'];
		$photo_date = $row['photo_date_submitted'];
		
		$photos_table = $photos_table . "<tr><td><br/>Place: " . $placeName . "<br/><br/>Subject: " . $photo_subject . "<br/><br/><center><img src = \"" . $photo . "\" alt = \"flag\" width = \"500\" /></center><br/><br/>Date Posted: " . $photo_date . "<br/><br/></td></tr>";
	}
	
	if($count == 0){
		$photos_table = $photos_table . "<tr><td><br/>No photos submitted<br/><br/></td></tr>";
	}
	
	
	echo "<form action=myPhotos.php method=\"POST\" >";
	echo "<input type=\"hidden\" name=\"usersProfile\" value=" . $usersProfile . ">";
	echo "<input type=\"hidden\" name=\"sortBy\" value=\"placeType\" />";
	echo "<center><input type=\"submit\" value=\"Sort Photos by Place Type\" class=\"formbutton\"/>";
	echo "</center></form><br/><br/>";
	
	echo $photos_table;
	
	
}
else{
	
		
	//get photos by user on cities
	$query = "SELECT cp.*, ci.city_name, u.user_id, u.first_name, u.last_name FROM cities ci NATURAL JOIN city_photos cp NATURAL JOIN users u WHERE cp.user_id = $usersProfile ORDER BY cp.photo_date_submitted DESC";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - city photos");

	//$photos_table = "<center><table rules = rows width = \"100%\" align = center>";
	$photos_table = "<table rules = rows width = \"100%\">";
	$photos_table = $photos_table . "<tr><td>    </td></tr><tr><th>Photos on Cities</th></tr>";
	$count = 0;
	while($row = mysqli_fetch_array($result)){
		$count++;
		$cityName = $row['city_name'];
		$city_id = $row['city_id'];
		$author_user_id = $row['user_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$photo_subject = $row['subject'];
		$photo = $row['photo'];
		$photo_date = $row['photo_date_submitted'];
		
		$photos_table = $photos_table . "<tr><td><br/>City: <a href = \"city.php?id=" . $city_id . "\">" . $cityName . "</a><br/><br/>Subject: " . $photo_subject . "<br/><br/><center><img src = \"" . $photo . "\" alt = \"flag\" width = \"500\" /></center><br/><br/>Date: " . $photo_date . "<br/><br/></td></tr>";
	
	}
	//$cities_table = $cities_table . "</table>";
	
	if($count == 0){
		$photos_table = $photos_table . "<tr><td><br/>No city photos submitted<br/><br/></td></tr>";
	}
	
	
	
	//get comments by user on attractions
	$query = "SELECT ap.*, a.attraction_name, u.user_id, u.first_name, u.last_name FROM attractions a NATURAL JOIN attraction_photos ap NATURAL JOIN users u WHERE ap.user_id = $usersProfile ORDER BY ap.photo_date_submitted DESC";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	
	//comments table
	$photos_table = $photos_table . "<tr><th>Photos on Attractions</th></tr>";
	$count = 0;
	
	while($row = mysqli_fetch_array($result)){
		$count++;
		$attraction_name = $row['attraction_name'];
		$attraction_id = $row['attraction_id'];
		$author_user_id = $row['user_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$photo_subject = $row['subject'];
		$photo = $row['photo'];
		$photo_date = $row['photo_date_submitted'];
		
		$photos_table = $photos_table . "<tr><td><br/>Attraction: <a href = \"attraction.php?id=" . $attraction_id . "\">" . $attraction_name . "</a><br/><br/>Subject: " . $photo_subject . "<br/><br/><center><img src = \"" . $photo . "\" alt = \"flag\" width = \"500\" /></center><br/><br/>Date: " . $photo_date . "<br/><br/></td></tr>";
	}
	
	if($count == 0){
		$photos_table = $photos_table . "<tr><td><br/>No attraction photos submitted<br/><br/></td></tr>";
	}
	
	$photos_table = $photos_table . "</table>";
	
	
	
	echo "<form action=myPhotos.php method=\"POST\" >";
	echo "<input type=\"hidden\" name=\"usersProfile\" value=" . $usersProfile . ">";
	echo "<input type=\"hidden\" name=\"sortBy\" value=\"commentDate\" />";
	echo "<center><input type=\"submit\" value=\"Sort Photos by Date\" class=\"formbutton\"/>";
	echo "</center></form><br/><br/>";
	
	echo $photos_table;
	
}
?>

</table>

<br/><br/><br/><br/><br/>
</h2>


</div>

<?php
   include('footer.php');
?>


</body>
</html>