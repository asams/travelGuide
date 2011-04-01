<?php
   include('header_side.php');
   include('db_connect.php');

?>

<html>
<body>

<div class="content">
<?php
  	$attractionID = $_GET['id'];
	$query = "SELECT a.*, ci.city_name FROM attractions a NATURAL JOIN cities ci WHERE a.attraction_id = $attractionID";	
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	
	
	while($row = mysqli_fetch_array($result)){
		$attraction_id = $row['attraction_id'];
		$name = $row['attraction_name'];  
		$city_id = $row['city_id'];
		$attraction_type = $row['attraction_type'];
		$description = $row['attraction_description'];
		$address = $row['attraction_address'];
		$hours_of_operation = $row['attraction_hours_of_operation'];
		$entrance_price = $row['attraction_entrance_price'];
		$picture = $row['attraction_picture'];
		$website = $row['attraction_website'];
		$city_name = $row['city_name'];
	}
	
	$nextLink = "<td align=\"right\" width=\"15%\" >  </td>";
	$backLink = "<td align=\"left\" width=\"15%\" >  </td>";
	
	$query = "SELECT attraction_id, city_id FROM attractions a WHERE attraction_id = $attractionID+1 AND city_id=$city_id";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");


	$row=mysqli_fetch_array($result);
	$nextAttractionID = $row['attraction_id'];
	if (!empty($nextAttractionID)) {
		$nextLink = "<td align=\"right\" width=\"15%\" valign=\"top\" ><a href=\"attraction.php?id=" .  $nextAttractionID . "\"><h3><img src=\"next.png\" style=\"border:0px\"></h3></a></td>"; 
	}
	

	$query = "SELECT attraction_id, city_id FROM attractions a WHERE attraction_id = $attractionID-1 AND city_id=$city_id";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	$row=mysqli_fetch_array($result);
	$backAttractionID = $row['attraction_id'];
	if (!empty($backAttractionID)) {
		$backLink = "<td align=\"left\" width=\"15%\" ><a href=\"attraction.php?id=" .  $backAttractionID . "\"><h3> <img src=\"back.png\" style=\"border:0px\"></h3></a></td>"; 
	}
	



	
	echo "<table width=\"100%\" ><tr>". $backLink . "<td align=\"center\" width=\"70%\" ><h1>" . $name . 
		"</td>" . $nextLink . "</h1></tr></table>";
	
	echo "<img src = \"" . $picture . "\" alt = \"flag\" width = \"50%\"  align = \"right\"/>";
	echo "<p><H2>Info: </H2></p>";
	echo "City: " . "<a href = \"city.php?id=" . $city_id . "\"> $city_name </a>" . "<br/><br/>";
	echo "Attraction Type: " . $attraction_type . "<br/><br/>";
	echo "Description: " . $description . "<br/></br>";
	echo "Address: " . $address . "<br/><br/>";
	echo "Hours of Operation: " . $hours_of_operation . "<br/><br/>";
	echo "Entrance Price: " . ($entrance_price == 'Y' ? 'Yes' : 'No') . "<br/><br/>";
	echo "Website: " . ($website != 'N/A' ? "<a href = \" $website \"> $website </a>" : $website) . "<br/><br/><br/>";

	if (isset($_SESSION['user_id'])) {
		$_SESSION['attraction_id'] = $attraction_id;
		include("starAttractionCode.php");
		
		$query = "SELECT * FROM favoriteAttractions WHERE user_id = " . $user_id . " AND attraction_id = " . $attractionID;
		$result = mysqli_query($db, $query) or die ("Error Querying Database - 3");
		
		if($row = mysqli_fetch_array($result)){
			echo "You've already added " . $name . " to your favorites!";
		}
		
		else{
			echo "Add to favorites: <a href=addFavAttraction.php?id=" . $attractionID . "><img style = \"border:0px\"  src = \"addToFavStar.jpg\" alt = \"star\" width = \"50px\" /></a>";
		}
		
	} else {

  		$qur1 = "select avg(rating) as xx from attractionRatings where attraction_id='".$attraction_id."' group by attraction_id";
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
		echo "<b><i>Average User Rating: $rating </b></i><br/><br/>";

	}





        $URLaddress = urlencode($address);
	echo '<br><br><br><center><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=' . $URLaddress . '&amp;aq=&amp;sspn=0.002535,0.010568&amp;ie=UTF8&amp;hq=&amp;hnear=' . $URLaddress . '&amp;spn=0.001267,0.005284&amp;t=h&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=' . $URLaddress . ';aq=&amp;sspn=0.002535,0.010568&amp;ie=UTF8&amp;hq=&amp;hnear=' . $URLaddress . '&amp;spn=0.001267,0.005284&amp;t=h&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>' ;
	echo '</center>';
	
	$query = "SELECT ac.*, a.attraction_name, u.first_name, u.last_name FROM attractions a NATURAL JOIN attraction_comments ac NATURAL JOIN users u WHERE a.attraction_id = $attractionID ORDER BY ac.comment_date_submitted DESC";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	
	//comments table
	$comments_table = "<table rules = rows width = \"90%\">";
	
	while($row = mysqli_fetch_array($result)){
		$attraction_name = $row['attraction_name'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$comment_subject = $row['comment_subject'];
		$comment_body = $row['comment_body'];
		$comment_date = $row['comment_date_submitted'];
		
		$comments_table = $comments_table . "<tr><td><br/>Name: " . $first_name . " " . $last_name . "<br/><br/>Subject: " . $comment_subject . "<br/><br/>Comment: " . $comment_body . "<br/><br/>Date: " . $comment_date . "<br/><br/></td></tr>";
	}
	
	$comments_table = $comments_table . "</table>";
	
	if ($comments_table <> "<table rules = rows width = \"90%\"></table>"){
		echo "<br/><br/><br/><br/><H2>Comments from users:</H2>";
		echo "<br/>";
		echo $comments_table;
	}

if( isset($_COOKIE['user_id'])){
?>

<H2>Share your thoughts about <?php echo $name ?>:</H2>
<form action="attractionCommentSubmitted.php" method="post" class="form">
<center>
<table>

<tr><th>Subject:</th><td><input type="text" id="subject" name="subject" size = 75 /></td></tr>
<tr><th>Comment:</th><td><textarea name="comment" id="comment" rows = "4" cols = "60"></textarea>
<input type="hidden" name="attraction_id" value=<?php echo $attractionID ?>></td></tr>

<tr><td colspan = 2><center><input type="submit" class="formbutton" value="Submit" /></center></td></tr>

</table>

<?php
}
else{
?>
<H2>Want to share your thoughts about <?php echo $name ?>?</H2>
<H3>Create a personal account on TravelGuide in order to comment on countries, cities, and attractions, and enjoy all the other perks of being a TravelGuide member!  
<br/><br/>If you already have an account, just log in!
<br/>
<br/>
Click <a href = "login.php">here</a> to login, or <a href = "register.php">here</a> to create an account!</H3>


<?php
}
?>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

<?php
   include('footer.php');
?>

</body>
</html>