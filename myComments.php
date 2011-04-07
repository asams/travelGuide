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
	
	echo "<center><h1>" . $firstName . " " . $lastName . "'s Comments:</h1>";
	echo "<img src=" . $photo .  " align=center width=20% ></center><br/><br/>";
	

	
if($sortBy == "commentDate"){
	//get comments by user on all place types
	$query = "SELECT cc.*, co.country_name place_name FROM countries co NATURAL JOIN country_comments cc WHERE cc.user_id = $usersProfile ";
	$query = $query . "UNION SELECT cic.*, ci.city_name place_name FROM cities ci NATURAL JOIN city_comments cic WHERE cic.user_id = $usersProfile ";
	$query = $query . "UNION SELECT ac.*, a.attraction_name place_name FROM attractions a NATURAL JOIN attraction_comments ac WHERE ac.user_id = $usersProfile ORDER BY comment_date_submitted DESC";
	
	//echo $query;
	
	$result = mysqli_query($db, $query) or die ("Error Querying Database - union");

	$comments_table = "<table rules = rows width = \"100%\">";
	$comments_table = $comments_table . "<tr><td>   </td></tr><tr><th>Comments submitted</th></tr>";
	$count = 0;
	while($row = mysqli_fetch_array($result)){
		$count++;
		$placeName = $row['place_name'];
		$comment_subject = $row['comment_subject'];
		$comment_body = $row['comment_body'];
		$comment_date = $row['comment_date_submitted'];
		
		$comments_table = $comments_table . "<tr><td><br/>Place: " . $placeName . "<br/><br/>Subject: " . $comment_subject . "<br/><br/>Comment: " . $comment_body . "<br/><br/>Date: " . $comment_date . "<br/><br/></td></tr>";
	}
	
	if($count == 0){
		$comments_table = $comments_table . "<tr><td><br/>No comments submitted<br/><br/></td></tr>";
	}
	
	
	echo "<form action=myComments.php method=\"POST\" >";
	echo "<input type=\"hidden\" name=\"usersProfile\" value=" . $usersProfile . ">";
	echo "<input type=\"hidden\" name=\"sortBy\" value=\"placeType\" />";
	echo "<center><input type=\"submit\" value=\"Sort Comments by Place Type\" class=\"formbutton\"/>";
	echo "</center></form><br/><br/>";
	
	echo $comments_table;
	
	
}
else{
	
	//get comments by user on countries
	$query = "SELECT cc.*, co.country_name, u.user_id, u.first_name, u.last_name FROM countries co NATURAL JOIN country_comments cc NATURAL JOIN users u WHERE cc.user_id = $usersProfile ORDER BY cc.comment_date_submitted DESC";
		
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");

	$comments_table = "<table rules = rows width = \"100%\">";
	$comments_table = $comments_table . "<tr><td>   </td></tr><tr><th>Comments on Countries</th></tr>";
	$count = 0;
	while($row = mysqli_fetch_array($result)){
		$count++;
		$countryName = $row['country_name'];
		$countryID = $row['country_id'];
		$author_user_id = $row['user_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$comment_subject = $row['comment_subject'];
		$comment_body = $row['comment_body'];
		$comment_date = $row['comment_date_submitted'];
		
		$comments_table = $comments_table . "<tr><td><br/>Country: <a href = \"country.php?id=" . $countryID . "\">" . $countryName . "</a><br/><br/>Subject: " . $comment_subject . "<br/><br/>Comment: " . $comment_body . "<br/><br/>Date: " . $comment_date . "<br/><br/></td></tr>";
	}
	
	if($count == 0){
		$comments_table = $comments_table . "<tr><td><br/>No country comments submitted<br/><br/></td></tr>";
	}
	
	
		
	//get comments by user on cities
	$query = "SELECT cic.*, ci.city_name, u.user_id, u.first_name, u.last_name FROM cities ci NATURAL JOIN city_comments cic NATURAL JOIN users u WHERE cic.user_id = $usersProfile ORDER BY cic.comment_date_submitted DESC";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");

	$comments_table = $comments_table . "<tr><th>Comments on Cities</th></tr>";
	$count = 0;
	while($row = mysqli_fetch_array($result)){
		$count++;
		$cityName = $row['city_name'];
		$city_id = $row['city_id'];
		$author_user_id = $row['user_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$comment_subject = $row['comment_subject'];
		$comment_body = $row['comment_body'];
		$comment_date = $row['comment_date_submitted'];
		
		$comments_table = $comments_table . "<tr><td><br/>City: <a href = \"city.php?id=" . $city_id . "\">" . $cityName . "</a><br/><br/>Subject: " . $comment_subject . "<br/><br/>Comment: " . $comment_body . "<br/><br/>Date: " . $comment_date . "<br/><br/></td></tr>";
	}
	//$cities_table = $cities_table . "</table>";
	
	if($count == 0){
		$comments_table = $comments_table . "<tr><td><br/>No city comments submitted<br/><br/></td></tr>";
	}
	
	
	
	//get comments by user on attractions
	$query = "SELECT ac.*, a.attraction_name, u.user_id, u.first_name, u.last_name FROM attractions a NATURAL JOIN attraction_comments ac NATURAL JOIN users u WHERE ac.user_id = $usersProfile ORDER BY ac.comment_date_submitted DESC";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	
	//comments table
	$comments_table = $comments_table . "<tr><th>Comments on Attractions</th></tr>";
	$count = 0;
	
	while($row = mysqli_fetch_array($result)){
		$count++;
		$attraction_name = $row['attraction_name'];
		$attraction_id = $row['attraction_id'];
		$author_user_id = $row['user_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$comment_subject = $row['comment_subject'];
		$comment_body = $row['comment_body'];
		$comment_date = $row['comment_date_submitted'];
		
		$comments_table = $comments_table . "<tr><td><br/>Attraction: <a href = \"attraction.php?id=" . $attraction_id . "\">" . $attraction_name . "</a><br/><br/>Subject: " . $comment_subject . "<br/><br/>Comment: " . $comment_body . "<br/><br/>Date: " . $comment_date . "<br/><br/></td></tr>";
	}
	
	if($count == 0){
		$comments_table = $comments_table . "<tr><td><br/>No attraction comments submitted<br/><br/></td></tr>";
	}
	
	$comments_table = $comments_table . "</table>";
	
	
	
	echo "<form action=myComments.php method=\"POST\" >";
	echo "<input type=\"hidden\" name=\"usersProfile\" value=" . $usersProfile . ">";
	echo "<input type=\"hidden\" name=\"sortBy\" value=\"commentDate\" />";
	echo "<center><input type=\"submit\" value=\"Sort Comments by Date\" class=\"formbutton\"/>";
	echo "</center></form><br/><br/>";
	
	echo $comments_table;
	
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