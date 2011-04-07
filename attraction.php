<?php
   include('header_side.php');
   include('db_connect.php');

?>

<html>
<body>

<div class="content">
<?php
	//get attraction ID from URL
  	$attractionID = $_GET['id'];

	//get attraction information from the attractions table
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
	
	//used for the next/back buttons
	$nextLink = "<td align=\"right\" width=\"15%\" >  </td>";
	$backLink = "<td align=\"left\" width=\"15%\" >  </td>";
	
	//get attraction information for the next attraction
	$query = "SELECT attraction_id, city_id FROM attractions a WHERE attraction_id = $attractionID+1 AND city_id=$city_id";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");


	$row=mysqli_fetch_array($result);
	$nextAttractionID = $row['attraction_id'];

	//if a next attraction exists, then store it in the next link
	if (!empty($nextAttractionID)) {
		$nextLink = "<td align=\"right\" width=\"15%\" valign=\"top\" ><a href=\"attraction.php?id=" .  $nextAttractionID . "\"><h3><img src=\"next.png\" style=\"border:0px\"></h3></a></td>"; 
	}
	

	//get attraction information for the previous attraction
	$query = "SELECT attraction_id, city_id FROM attractions a WHERE attraction_id = $attractionID-1 AND city_id=$city_id";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	$row=mysqli_fetch_array($result);
	$backAttractionID = $row['attraction_id'];
	//if a previous attraction exists, then store it in the back link
	if (!empty($backAttractionID)) {
		$backLink = "<td align=\"left\" width=\"15%\" ><a href=\"attraction.php?id=" .  $backAttractionID . "\"><h3> <img src=\"back.png\" style=\"border:0px\"></h3></a></td>"; 
	}
	


	
	//display the information
	echo "<table width=\"100%\" ><tr>". $backLink . "<td align=\"center\" width=\"70%\" ><h1>" . $name . 
		"</td>" . $nextLink . "</h1></tr></table>";
	
	echo "<table width = \"100%\" >";
	echo "<tr><td width = \"50%\" valign = \"top\"><table width = \"100%\" cellpadding = 5>";
	echo "<tr><td colspan = 2><p><H2>Info: </H2></p></td></tr>";
	echo "<tr><td><b>City: </b></td><td>" . "<a href = \"city.php?id=" . $city_id . "\"> $city_name </a>" . "</td></tr>";
	echo "<tr><td><b>Attraction Type: </b></td><td>" . $attraction_type . "</td></tr>";
	echo "<tr><td><b>Description: </b></td><td>" . $description . "</td></tr>";
	echo "<tr><td><b>Address: </b></td><td>" . $address . "</td></tr>";
	echo "<tr><td><b>Hours of Operation: </b></td><td>" . $hours_of_operation . "</td></tr>";
	echo "<tr><td><b>Entrance Price: </b></td><td>" . ($entrance_price == 'Y' ? 'Yes' : 'No') . "</td></tr>";
	echo "<tr><td><b>Website: </b></td><td>" . ($website != 'N/A' ? "<a href = \" $website \"> $website </a>" : $website) . "</td></tr>";
	echo "</table></td><td>";
	echo "<img src = \"" . $picture . "\" alt = \"flag\" width = \"100%\"  align = \"right\"/>";
	echo "</td></tr></table>";

	//if a user is logged in, then display the "add to favorites" portion
	if (isset($_SESSION['user_id'])) {
		$_SESSION['attraction_id'] = $attraction_id;
		include("starAttractionCode.php");
		
		$query = "SELECT * FROM favoriteAttractions WHERE user_id = " . $user_id . " AND attraction_id = " . $attractionID;
		$result = mysqli_query($db, $query) or die ("Error Querying Database - 3");
		
		//if the user has already favorited the attraction, then display a message, otherwise, display a link for the user to click
		if($row = mysqli_fetch_array($result)){
			echo "<b>You've already added " . $name . " to your favorites!</b><br/><br/>";
		}
		
		else{
			echo "<b>Add to favorites: </b><a href=addFavAttraction.php?id=" . $attractionID . "><img style = \"border:0px\"  src = \"addToFavStar.jpg\" alt = \"star\" width = \"50px\" /></a>";
		}
		

	//otherwise, display the average user rating for this attraction
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
		echo "<b><i>Average User Rating:</b> $rating </i><br/><br/>";

	}


	//google maps
        $URLaddress = urlencode($address);
	//echo '<br><br><br><center><iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=' . $URLaddress . '&amp;aq=&amp;sspn=0.002535,0.010568&amp;ie=UTF8&amp;hq=&amp;hnear=' . $URLaddress . '&amp;spn=0.001267,0.005284&amp;t=h&amp;z=14&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=' . $URLaddress . ';aq=&amp;sspn=0.002535,0.010568&amp;ie=UTF8&amp;hq=&amp;hnear=' . $URLaddress . '&amp;spn=0.001267,0.005284&amp;t=h&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>' ;
	//echo '</center>';

	echo '<center><table cellspacing="0" cellpadding="0" border="0"><tr><td><iframe src="http://www.map-generator.net/extmap.php?name=Attraction&amp;address=' . $URLaddress . '&amp;width=500&amp;height=400&amp;maptype=hybrid&amp;zoom=14&amp;hl=en&amp;t=1302040588" width="500" height="400" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"></iframe></td></tr><tr><td align="right"><a style="font:8px Arial;text-decoration:none;cursor:default;color:#5C5C5C;" href="http://www.map-generator.net">map-generator.net</a></td></tr></table></center>';

	

	//get the attraction comments
	$query = "SELECT ac.*, a.attraction_name, u.user_id, u.first_name, u.last_name FROM attractions a NATURAL JOIN attraction_comments ac NATURAL JOIN users u WHERE a.attraction_id = $attractionID ORDER BY ac.comment_date_submitted DESC";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	
	//comments table
	$comments_table = "<table rules = rows width = \"90%\">";
	
	while($row = mysqli_fetch_array($result)){
		$attraction_name = $row['attraction_name'];
		$author_user_id = $row['user_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$comment_subject = $row['comment_subject'];
		$comment_body = $row['comment_body'];
		$comment_date = $row['comment_date_submitted'];
		
		$comments_table = $comments_table . "<tr><td><br/>Name: <a href = \"accountOverview.php?id=" . $author_user_id . "\">" . $first_name . " " . $last_name . "</a><br/><br/>Subject: " . $comment_subject . "<br/><br/>Comment: " . $comment_body . "<br/><br/>Date: " . $comment_date . "<br/><br/></td></tr>";
	}
	
	$comments_table = $comments_table . "</table>";
	

	//display the comments
	if ($comments_table <> "<table rules = rows width = \"90%\"></table>"){
		echo "<br/><br/><br/><br/><H2>Comments from users:</H2>";
		echo "<br/>";
		echo $comments_table;
	}



	//if a user is logged in, then allow them to comment on the attraction
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

</center>
</form>
</br></br>
<H2>Share your pictures of <?php echo $name ?>: </H2>
<center>
<table>
<form enctype="multipart/form-data" action="attractionPhotoSubmitted.php" method="POST">
<tr><th align=left>Subject:</th><td><input type="text" id="subject" name="subject" size = 75 /></td></tr>
<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
<input type="hidden" name="attraction_id" value=<?php echo $attractionID ?> >
<tr><th>Choose a file to upload: </th><td><input name="photo" type="file" /><br/></td></tr>
<tr><th align=center colspan = 2><input type="submit" value="Upload File" /></th></tr>
</form> 
</table>

</center>
<br/><br/></br></br>

<!--<H2>Photographs we've received from our viewers:</H2> -->

<?php
//table of uploaded photos

$query = "SELECT ap.* FROM attraction_photos ap NATURAL JOIN attractions a WHERE ap.attraction_id = '$attractionID' ORDER BY ap.photo_date_submitted"; 
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
	echo "<td width = \"20%\" align = center><a href=attractionPhoto.php?id=" . $photoID . ">"  . "<img src = \"" . $photo . "\" alt = \"flag\" width = \"200\" />   ";
	echo "<br/><a href=attractionPhoto.php?id=" . $photoID . ">" . $subject . "</a><br/><br/></td>";
	if ($count % 5 == 0){
		echo "</tr>";
	}
		

}
echo "</table></center>";

	//otherwise, direct them to log in
	} else {
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

	</div>

<?php
   include('footer.php');
?>

</body>
</html>