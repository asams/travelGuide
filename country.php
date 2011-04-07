<?php
//	session_start();
//	$user_id = $_SESSION['user_id'];
 
//if( isset($_COOKIE['user_id'])){
//	$user_id = $_COOKIE['user_id'];
//}
//else{
//	setcookie(user_id, $_SESSION['user_id'], time()+60*60*24);
//}
//
	include('db_connect.php');
	include('header_side.php');
?>

<html>
<body>

<div class="content">
<?php
	//get country id from URL 
  	$countryID = $_GET['id'];
	
	//$query = "SELECT * FROM countries WHERE country_id = $countryID";

	//get the country's information from the country table
	$query = "SELECT co.*, ci.city_name, ci.city_id FROM countries co NATURAL JOIN cities ci WHERE co.country_id = $countryID ORDER BY ci.city_name";

	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	$featuredCityLinks = "<ul>";
	
	while($row = mysqli_fetch_array($result)){
		$countryName = $row['country_name'];
		$countryID = $row['country_id'];
		$capital = $row['country_capital'];
		$government = $row['country_government'];
		$currency = $row['country_currency'];
		$population = $row['country_population'];
		$area = $row['country_area'];
		$language = $row['country_official_language'];
		$religion = $row['country_religion'];
		$map = $row['country_map'];
		$flag = $row['country_flag'];
		$coat_of_arms = $row['country_coat_of_arms'];
		$website = $row['country_website'];
		$anthem = $row['country_anthem'];
		
		
		$cityName = $row['city_name'];
		$cityID = $row['city_id'];
		
		$featuredCityLinks = $featuredCityLinks . "<li><a href = \"city.php?id=" . $cityID . "\">" . $cityName . "</a></li>";
	}

	
	$featuredCityLinks = $featuredCityLinks . "</ul>";
	
	//$query = "SELECT city_name, city_id FROM cities WHERE country_id = $countryID ORDER BY city_name";
	//$query = "SELECT city_name, city_id FROM countries NATURAL JOIN cities ORDER BY city_name WHERE ";
	

	//get the comments for this country
	$query = "SELECT cc.*, co.country_name, u.user_id, u.first_name, u.last_name FROM countries co NATURAL JOIN country_comments cc NATURAL JOIN users u WHERE co.country_id = $countryID ORDER BY cc.comment_date_submitted DESC";
	
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");

	$comments_table = "<table rules = rows width = \"90%\">";
	while($row = mysqli_fetch_array($result)){
		$countryName = $row['country_name'];
		$author_user_id = $row['user_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$comment_subject = $row['comment_subject'];
		$comment_body = $row['comment_body'];
		$comment_date = $row['comment_date_submitted'];
		
		$comments_table = $comments_table . "<tr><td><br/>Name: <a href = \"accountOverview.php?id=" . $author_user_id . "\">" . $first_name . " " . $last_name . "</a><br/><br/>Subject: " . $comment_subject . "<br/><br/>Comment: " . $comment_body . "<br/><br/>Date: " . $comment_date . "<br/><br/></td></tr>";
	}
	
	$comments_table = $comments_table . "</table>";

	echo "<table><tr><td colspan = 2><h1>";
	echo ($flag != 'N/A' ? "<img src = \"" . $flag . "\" alt = \"flag\" width = 80 align = \"top\"/>" : "");
	echo "   " . $countryName . "</h1></td></tr>";
	echo "<tr><td width = \"50%\" valign = \"top\">";
	
	//display the flag
	//echo "<img src = \"" . $flag . "\" alt = \"flag\" width = \"50%\" align = \"right\"/>";
	
	//display the information
	echo "<table cellpadding = 5 width = \"100%\"><tr><td colspan = 2><p><H2>Info: </H2></p></td></tr>";
	echo "<tr><td><b>Capital City: </b></td><td>" . $capital . "</td></tr>";
	echo "<tr><td><b>Cities Featured <br/>on TravelGuide: </b></td><td>" . $featuredCityLinks . "</td></tr>";
	echo "<tr><td><b>Form of Government: </b></td><td>" . $government . "</td></tr>";
	echo "<tr><td><b>Currency: </b></td><td>" . $currency . "</td></tr>";
	echo "<tr><td><b>Population: </b></td><td>" . $population . " people </td></tr>";
	echo "<tr><td><b>Area: </b></td><td>" . $area . " km<sup>2</sup>" . "</td></tr>";
	echo "<tr><td><b>Official or National <br/>Language(s): </b></td><td>" . $language . "</td></tr>";
	echo "<tr><td><b>Official or Majority <br/>Religion(s): </b></td><td>" . $religion . "</td></tr>";
	echo "<tr><td><b>Website: </b></td><td>" . ($website != 'N/A' ? "<a href = \" $website \"> $website </a>" : $website) . "</td></tr>";
	
	echo "<tr><td><b>Anthem: </b></td><td><embed src=" . $anthem .  " width=300 height=60 autostart=true></embed></td></tr>";
	echo "<tr><td><b><small></b></small></td><td><small><b>Please Note:</b> The mp3 player only works in Chrome, the new Firefox, and Internet Explorer. Sorry old Firefox users!</td></tr>";
	echo "</table>";
	echo "</td><td><img src = \"" . $map . "\" alt = \"map\" width = \"100%\" align = \"right\"/></td></tr></table>";
	

	//if a user is logged in, then display the "add to favorites" and rating portion
	if (isset($_SESSION['user_id'])) {
		$_SESSION['country_id'] = $countryID;
		include("starCountryCode.php");
		
		$query = "SELECT * FROM favoriteCountries WHERE user_id = " . $user_id . " AND country_id = " . $countryID;
		$result = mysqli_query($db, $query) or die ("Error Querying Database - 3");
		
		if($row = mysqli_fetch_array($result)){
			echo "<b>You've already added " . $countryName . " to your favorites! </b><br/><br/>";
		}
		
		else{
			echo "<b>Add to favorites: </b><a href=addFavCountry.php?id=" . $countryID . "><img style = \"border:0px\"  src = \"addToFavStar.jpg\" alt = \"star\" width = \"50px\" /></a>";
		}
		
		echo "<br><br>";

	//otherwise, display the average user rating for this attraction
	} else {

  		$qur1 = "select avg(rating) as xx from countryRatings where country_id='".$countryID."' group by country_id";
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
		echo "<b><i>Average User Rating: </b> $rating </i><br/><br/><br/><br/>";

	}

	//echo "<center>Map:<br/>";
	//echo "<center>";
	//echo "<img src = \"" . $map . "\" alt = \"map\" width = \"55%\" align = \"center\" /><br/><br/></center>";
	

	//display the comments
	if ($comments_table <> "<table rules = rows width = \"90%\"></table>"){
		echo "<H2>Comments from users:</H2>";
		echo $comments_table;
	}
//	echo "<img src = \"" . $coat_of_arms . "\" alt = \"coat of arms\" width = \"20%\" align = \"center\" /><br/><br/>";


	//if a user is logged in, then allow them to comment on the country
	if( isset($_COOKIE['user_id'])){
?>


		<H2>Share your thoughts about <?php echo $countryName ?>:</H2>
		<form action="countryCommentSubmitted.php" method="post" class="form">
		<center>
		<table>

		<tr><th>Subject:</th><td><input type="text" id="subject" name="subject" size = 75 /></td></tr>
		<tr><th>Comment:</th><td><textarea name="comment" id="comment" rows = "4" cols = "60"></textarea>
		<input type="hidden" name="country_id" value=<?php echo $countryID ?>></td></tr>

		<tr><td colspan = 2><center><input type="submit" class="formbutton" value="Submit" /></center></td></tr>

		</table>

<?php
	//otherwise, direct them to log in
	} else {
?>
		<H2>Want to share your thoughts about <?php echo $countryName ?>?</H2>
		<H3>Create a personal account on TravelGuide in order to comment on countries, cities, and attractions, and enjoy all the other perks of being a TravelGuide member!  
		<br/><br/>If you already have an account, just log in!
		<br/>
		<br/>
		Click <a href = "login.php">here</a> to login, or <a href = "register.php">here</a> to create an account!</H3>


<?php
	}

	//if the country is USA, then display the ThemeParks advertisement
	if ($countryID == 7) {
		echo "<center><br><br><a href=\"https://github.com/rroyste2/themeparkdb\"<img src=\"advertisement.png\" style=\"border:0px\" align = \"center\"/></a></center>";
	}

?>



</div>

<?php
   include('footer.php');
?>

</body>
</html>
