<?php
   include('header_side.php');
   include('db_connect.php');

?>

<html>
<body>
<div class="content">

<?php
	$cityID = $_GET['id'];
	
	$query = "SELECT ci.*, co.country_name, a.attraction_name, a.attraction_id FROM cities ci NATURAL JOIN countries co NATURAL JOIN attractions a WHERE city_id = $cityID";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	$attractionLinks = "<ul>";
	
	while($row = mysqli_fetch_array($result)){
		$cityID = $row['city_id'];
		$cityName = $row['city_name'];
		$countryID = $row['country_id'];
		$region = $row['city_region'];
		$population = $row['city_population'];
		$cityMap = $row['city_map'];
		$flag = $row['city_flag'];
		$coatOfArms = $row['city_coat_of_arms'];
		$website = $row['city_website'];
		$country_name = $row['country_name'];
		$attractionName = $row['attraction_name'];
		$attractionID = $row['attraction_id'];
		
		$attractionLinks = $attractionLinks . "<li><a href = \"attraction.php?id=" . $attractionID . "\">" . $attractionName . "</a></li>";
	}
	
	$attractionLinks = $attractionLinks . "</ul>";

	

	$query = "SELECT cic.*, ci.city_name, u.first_name, u.last_name FROM cities ci NATURAL JOIN city_comments cic NATURAL JOIN users u WHERE ci.city_id = $cityID ORDER BY cic.comment_date_submitted DESC";
	
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");

	$comments_table = "<table rules = rows width = \"90%\">";
	while($row = mysqli_fetch_array($result)){
		$cityName = $row['city_name'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$comment_subject = $row['comment_subject'];
		$comment_body = $row['comment_body'];
		$comment_date = $row['comment_date_submitted'];
		
		$comments_table = $comments_table . "<tr><td><br/>Name: " . $first_name . " " . $last_name . "<br/><br/>Subject: " . $comment_subject . "<br/><br/>Comment: " . $comment_body . "<br/><br/>Date: " . $comment_date . "<br/><br/></td></tr>";
	}
	$comments_table = $comments_table . "</table>";
	
	echo "<h1>" . $cityName . "</h1>";
	echo ($flag != 'N/A' ? "<img src = \"" . $flag . "\" alt = \"flag\" width = \"50%\" align = \"right\"/>" : "");
	echo "<p><H2>Info: </H2></p>";
	echo "Country: " . "<a href = \"country.php?id=" . $countryID . "\"> $country_name </a>" . "<br/><br/>";
	echo "Region: " . $region . "<br/><br/>";
	echo "Attractions Featured on TravelGuide: " . $attractionLinks . "<br/>";
	echo "Population: " . $population . " people <br/><br/>";
	echo "Website: " . ($website != 'N/A' ? "<a href = \" $website \"> $website </a>" : $website) . "<br/>";


	if (isset($_SESSION['user_id'])) {
		$_SESSION['city_id'] = $cityID;
		include("starCityCode.php");
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
		echo "<b><i>Average User Rating: $rating </b></i><br/><br/><br/><br/>";

	}

	//echo "<center>Map:<br/>";
	echo "<center><br/>";
	echo "<img src = \"" . $cityMap . "\" alt = \"map\" width = \"55%\" align = \"center\" /><br/><br/></center>";
    if ($comments_table <> "<table rules = rows width = \"90%\"></table>"){
		echo "<H2>Comments from users:</H2>";
		echo $comments_table;
	}
	
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

</table>

<?php
}
else{
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