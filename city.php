<?php
   include('header_side.php');
   include('db_connect.php');

?>

<html>
<body>
<div class="content">

<?php
	//get city ID from URL
	$cityID = $_GET['id'];
	
	//get city information from the cities table
	$query = "SELECT ci.*, co.country_name, a.attraction_name, a.attraction_id FROM cities ci NATURAL JOIN countries co NATURAL JOIN attractions a WHERE city_id = $cityID ORDER BY a.attraction_name";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	$attractionLinks = "<ul>";
	
	while($row = mysqli_fetch_array($result)){
		$cityID = $row['city_id'];
		$cityName = $row['city_name'];
		$countryID = $row['country_id'];
		$region = $row['city_region'];
		$population = $row['city_population'];
		$cityMap = $row['city_map'];
		$cityPic = $row['city_pic'];
		$flag = $row['city_flag'];
		$coatOfArms = $row['city_coat_of_arms'];
		$website = $row['city_website'];
		$country_name = $row['country_name'];
		$attractionName = $row['attraction_name'];
		$attractionID = $row['attraction_id'];
		
		$attractionLinks = $attractionLinks . "<li><a href = \"attraction.php?id=" . $attractionID . "\">" . $attractionName . "</a></li>";
	}
	
	$attractionLinks = $attractionLinks . "</ul>";

	
	//get the city comments
	$query = "SELECT cic.*, ci.city_name, u.user_id, u.first_name, u.last_name FROM cities ci NATURAL JOIN city_comments cic NATURAL JOIN users u WHERE ci.city_id = $cityID ORDER BY cic.comment_date_submitted DESC";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");

	$comments_table = "<table rules = rows width = \"90%\">";
	while($row = mysqli_fetch_array($result)){
		$cityName = $row['city_name'];
		$author_user_id = $row['user_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$comment_subject = $row['comment_subject'];
		$comment_body = $row['comment_body'];
		$comment_date = $row['comment_date_submitted'];
		
		$comments_table = $comments_table . "<tr><td><br/>Name: <a href = \"accountOverview.php?id=" . $author_user_id . "\">" . $first_name . " " . $last_name . "</a><br/><br/>Subject: " . $comment_subject . "<br/><br/>Comment: " . $comment_body . "<br/><br/>Date: " . $comment_date . "<br/><br/></td></tr>";
	}
	$comments_table = $comments_table . "</table>";
	

	//display the city info
	echo "<table><tr><td><h1>";
	echo ($flag != 'N/A' ? "<img src = \"" . $flag . "\" alt = \"flag\" width = 80 align = \"top\"/>" : "");
	echo "   " . $cityName . "</td><td align = \"right\">";
	
	//if a user is logged in, then display the "add to favorites" option
	//if (isset($_SESSION['user_id'])) {
//		$_SESSION['city_id'] = $cityID;
		//
		//$query = "SELECT * FROM favoriteCities WHERE user_id = " . $user_id . " AND city_id = " . $cityID;
		//$result = mysqli_query($db, $query) or die ("Error Querying Database - 3");
//		
	//	if($row = mysqli_fetch_array($result)){
		//	echo " ";
		//}
		//else{
//			echo "<a href=addFavCity.php?id=" . $cityID . "><img style = \"border:0px\"  src = \"addToFavStar.jpg\" alt = \"star\" width = \"50px\" /></a>";
		//}
	//}
	
	
	echo "</td></tr>";
	echo "<tr><td width = \"50%\" valign = \"top\"><table width = \"100%\" cellpadding = 5><tr><td colspan = 2><p><H2>Info: </H2></p></td></tr>";
	echo "<tr><td><b>Country: </b></td><td>" . "<a href = \"country.php?id=" . $countryID . "\"> $country_name </a>" . "</td></tr>";
	echo "<tr><td><b>Region: </b></td><td>" . $region . "</td></tr>";
	echo "<tr><td><b>Attractions Featured <br/>on TravelGuide: </b></td><td>" . $attractionLinks . "</td></tr>";
	echo "<tr><td><b>Population: </b></td><td>" . $population . " people </td></tr>";
	echo "<tr><td><b>Website: </b></td><td>" . ($website != 'N/A' ? "<a href = \" $website \"> $website </a>" : $website) . "</td></tr>";
	echo "</table></td><td>";
	echo "<img src = \"" . $cityPic . "\" alt = \"pic\" width = \"100%\" align = \"right\"/></td></tr></table>";
	


	//if a user is logged in, then display the "add to favorites" and rating portion
	if (isset($_SESSION['user_id'])) {
		$_SESSION['city_id'] = $cityID;
		include("starCityCode.php");
		
		$query = "SELECT * FROM favoriteCities WHERE user_id = " . $user_id . " AND city_id = " . $cityID;
		$result = mysqli_query($db, $query) or die ("Error Querying Database - 3");
		
		if($row = mysqli_fetch_array($result)){
			echo "<b>You've already added " . $cityName . " to your favorites!</b><br/><br/>";
		}
		
		else{
			echo "<b>Add to favorites: </b><a href=addFavCity.php?id=" . $cityID . "><img style = \"border:0px\"  src = \"addToFavStar.jpg\" alt = \"star\" width = \"50px\" /></a>";
		}
		
	//otherwise, display the average user rating for this attraction
	} else {

  		$qur1 = "select avg(rating) as xx from cityRatings where city_id='".$cityID."' group by city_id";
  		$result1 = mysqli_query($db,$qur1);
  		if($res1 = mysqli_fetch_array($result1))
  		{
			$rating = $res1['xx'];
	  	}

		$rating = round($rating, 1);
		if ($rating <= 0) {
			$rating = "No Ratings Yet";
		}

		echo "<br/><br>";
		echo "<b><i>Average User Rating: </b>$rating </i><br/><br/><br/><br/>";

	}

	
	echo "<center><br/>";
	echo "<img src = \"" . $cityMap . "\" alt = \"map\" width = \"55%\" align = \"center\" /><br/><br/></center>";
    	if ($comments_table <> "<table rules = rows width = \"90%\"></table>"){
		echo "<H2>Comments from users:</H2>";
		echo $comments_table;
	}
	

	//if a user is logged in, then allow them to comment on the city
	if( isset($_COOKIE['user_id'])){
?>

<H2>Share your thoughts about <?php echo $cityName ?>:</H2>
<form action="cityCommentSubmitted.php" method="post" class="form">
<center>
<table>

<tr><th>Subject:</th><td><input type="text" id="subject" name="subject" size = 75 /></td></tr>
<tr><th>Comment:</th><td><textarea name="comment" id="comment" rows = "4" cols = "60"></textarea>
<input type="hidden" name="city_id" value=<?php echo $cityID ?>></td></tr>

<tr><td colspan = 2><center><input type="submit" class="formbutton" value="Submit" /></center></td></tr>
</form>
</table>

</center>
</br></br>
<H2>Share your pictures of <?php echo $cityName ?>: </H2>
<center>
<table>
<form enctype="multipart/form-data" action="cityPhotoSubmitted.php" method="POST">
<tr><th align=left>Subject:</th><td><input type="text" id="subject" name="subject" size = 75 /></td></tr>
<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
<input type="hidden" name="city_id" value=<?php echo $cityID ?> >
<tr><th>Choose a file to upload: </th><td><input name="photo" type="file" /><br/></td></tr>
<tr><th align=center colspan = 2><input type="submit" value="Upload File" /></th></tr>
</form> 
</table>

</center>
<br/><br/></br></br>

<!--<H2>Photographs we've received from our viewers:</H2> -->

<?php
//table of uploaded photos

$query = "SELECT cp.* FROM city_photos cp NATURAL JOIN cities ci WHERE cp.city_id = '$cityID' ORDER BY cp.photo_date_submitted"; 
$result = mysqli_query($db, $query)or die("Error Querying Database");

$count = 0;

while($row = mysqli_fetch_array($result)) {
	if($count == 0){
	?>
	<H2>Photographs we've received from our viewers:</H2>
	<?php
	echo "<center><table width = \"90%\" cellpadding = 15>";
	}

	$count ++;
	$subject = $row['subject'];
	$photo = $row['photo'];
	$date_submitted = $row['photo_date_submitted'];
	$photoID = $row['photo_id'];
						
	if($count % 5 == 1){
		echo "<tr valign = top>";
	}
	//What to echo in each cell
	echo "<td width = \"20%\" align = center><a href=cityPhoto.php?id=" . $photoID . ">"  . "<img src = \"" . $photo . "\" alt = \"flag\" width = \"200\" />   ";
	echo "<br/><a href=cityPhoto.php?id=" . $photoID . ">" . $subject . "</a><br/><br/></td>";
	if ($count % 5 == 0){
		echo "</tr>";
	}

}
echo "</table></center>";		

//otherwise, direct them to log in
} else {
?>
	<H2>Want to share your thoughts about <?php echo $cityName ?>?</H2>
	<H3>Create a personal account on TravelGuide in order to comment on countries, cities, and attractions, and enjoy all the other perks of being a TravelGuide member!  
	<br/><br/>If you already have an account, just log in!	
	<br/>
	<br/>
	Click <a href = "login.php">here</a> to login, or <a href = "register.php">here</a> to create an account!</H3>

<?php
}
?>

</div>

<?php
   include('footer.php');
?>


</html>
</body>