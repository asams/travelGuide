<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>


<div class="content">
<H1>User uploaded photo about: </H1>

<?php

//get city ID from URL
$photoID = $_GET['id'];

$query = "SELECT * FROM city_photos WHERE photo_id = '$photoID'"; 
$result = mysqli_query($db, $query)or die("Error Querying Database");

$count = 0;
echo "<center><table width = \"90%\" cellpadding = 15>";
while($row = mysqli_fetch_array($result)) {
	$count ++;
	$subject = $row['subject'];
	$photo = $row['photo'];
	$date_submitted = $row['photo_date_submitted'];
	$photoID = $row['photo_id'];
						
	if($count % 5 == 1){
		echo "<tr valign = top>";
	}
	
?>
	<H1><?php echo $subject ?></H1>
<?php
	//What to echo in each cell
	echo "<td width = \"20%\" align = center><img src = \"" . $photo . "\" alt = \"flag\" width = \"500\" />   ";
	if ($count % 5 == 0){
		echo "</tr>";
	}
}

//get the city photo comments
	$query = "SELECT cip.*, cp.photo_id, u.user_id, u.first_name, u.last_name FROM city_photos cp NATURAL JOIN city_photo_comments cip NATURAL JOIN users u WHERE cp.photo_id = $photoID ORDER BY cip.comment_date_submitted DESC";
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");

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
		echo "<H2></br></br></br>Comments from users:</H2>";
		echo $comments_table;
	}
?>
</br></br></br>
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