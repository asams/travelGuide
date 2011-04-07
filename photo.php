<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>


<div class="content">
<H1>User uploaded photo about: </H1>

<?php

	//get photo ID from URL
	$photoID = $_GET['id'];

	$query = "SELECT city_photos.*, users.first_name, users.last_name FROM users NATURAL JOIN city_photos WHERE photo_id = '$photoID'"; 
	$result = mysqli_query($db, $query)or die("Error Querying Database");

	$count = 0;
	echo "<center><table width = \"90%\" cellpadding = 15>";
	

	if($row = mysqli_fetch_array($result)) {
		$count ++;
		$subject = $row['subject'];
		$photo = $row['photo'];
		$date_submitted = $row['photo_date_submitted'];
		$photoID = $row['photo_id'];
		$userID = $row['user_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$cityID = $row['city_id'];
						
		//if($count % 5 == 1){
		//	echo "<tr valign = top>";
		//}
	

	
	//if ($count % 5 == 0){
	//	echo "</tr>";
	//}
}
	//get user name that submitted the photo
	//$query = "SELECT * FROM users NATURAL JOIN city_photos"; 
	//$result = mysqli_query($db, $query)or die("Error Querying Database");
	//if($row = mysqli_fetch_array($result)) {
//		$username = $row['username'];
	//}
	
//used for the next/back buttons
	$nextLink = "<td align=\"right\" width=\"10%\" >  </td>";
	$backLink = "<td align=\"left\" width=\"10%\" >  </td>";


	//get photo information for the next photo
	$tryThis = $photoID + 1; 
	$query = "SELECT * FROM city_photos WHERE photo_id = '$tryThis' AND city_id='$cityID'";
	//echo $query;
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");

 
	$row=mysqli_fetch_array($result);
	$nextPhotoID = $row['photo_id'];

	//if a next photo exists, then store it in the next link
	if (!empty($nextPhotoID)) {
		$nextLink = "<td align=\"right\" width=\"10%\" valign=\"top\" ><a href=\"photo.php?id=" .  $nextPhotoID . "\"><h3><img src=\"next.png\" style=\"border:0px\"></h3></a></td>"; 
	}
	

	//get photo information for the previous photo
	$tryThis = $photoID - 1; //echo $tryThis;
	$query = "SELECT * FROM city_photos WHERE photo_id='$tryThis' AND city_id='$cityID'";
	//echo $query;
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");


	$row=mysqli_fetch_array($result);
	$previousPhotoID = $row['photo_id'];

	//if a previous photo exists, then store it in the back link
	if (!empty($previousPhotoID)) {
		$backLink = "<td align=\"left\" width=\"10%\" valign=\"top\" ><a href=\"photo.php?id=" .  $previousPhotoID . "\"><h3><img src=\"back.png\" style=\"border:0px\"></h3></a></td>"; 
	}


	echo "<table ><tr>". $backLink . "<td align=\"center\" width=\"80%\" ><H1>" . $subject . "</H1></td>" . $nextLink . "</tr>";
	//What to echo in each cell
	echo "</table><table><tr><td width = \"20%\" align = center><img src = \"" . $photo . "\" alt = \"flag\" width = \"500\" />  </tr></table><br><br> ";
	echo "<H2>Shared by: <a href = \"accountOverview.php?id=" . $userID . "\">" . $first_name . " " . $last_name . "</a></H2>";
	
//get the city photo comments
	//$query = "SELECT cip.*, cp.photo_id, u.user_id, u.first_name, u.last_name FROM city_photos cp NATURAL JOIN city_photo_comments cip NATURAL JOIN users u WHERE cp.photo_id = $photoID ORDER BY cip.comment_date_submitted DESC";
	$query = "SELECT cip.*, u.user_id, u.first_name, u.last_name FROM city_photo_comments cip NATURAL JOIN users u WHERE cip.photo_id = $photoID ORDER BY cip.comment_date_submitted DESC";

	$result = mysqli_query($db, $query) or die ("Error Querying Database - 3");

	$comments_table = "<table rules = rows width = \"90%\">";
	while($row = mysqli_fetch_array($result)){
		$author_user_id = $row['user_id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$comment_subject = $row['comment_subject'];
		$comment_body = $row['comment_body'];
		$comment_date = $row['comment_date_submitted'];
		
		$comments_table = $comments_table . "<tr><td><br/>Name: <a href = \"accountOverview.php?id=" . $author_user_id . "\">" . $first_name . " " . $last_name . "</a><br/><br/>Subject: " . $comment_subject . "<br/><br/>Comment: " . $comment_body . "<br/><br/>Date: " . $comment_date . "<br/><br/></td></tr>";
	}
	$comments_table = $comments_table . "</table>";
	
	if ($comments_table <> "<table rules = rows width = \"90%\"></table>"){
		echo "<tr><H2></br></br></br><hr>Comments from users:</H2></tr>";
		echo $comments_table . "<hr>";
	}
?>
</br><br><br><br>
<H2>Share your thoughts about <?php echo $subject ?>:</H2>
<form action="cityPhotoCommentSubmitted.php" method="post" class="form">
<center>
<table>

<tr><th>Subject:</th><td><input type="text" id="subject" name="subject" size = 75 /></td></tr>
<tr><th>Comment:</th><td><textarea name="comment" id="comment" rows = "4" cols = "60"></textarea>
<input type="hidden" name="photo_id" value=<?php echo $photoID ?>></td></tr>

<tr><td colspan = 2><center><input type="submit" class="formbutton" value="Submit" /></center></td></tr>
</form>
</table>

</center>
</br></br>

<?php
echo "</table></center>";		
include('footer.php');
?>

</body>
</html>