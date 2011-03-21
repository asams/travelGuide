<?php
	header('Location: city.php?id=' . $_POST['city_id']);
	include('header_side.php');
	include('db_connect.php');

	$subjectSubmitted = $_POST['subject'];
	$commentSubmitted = $_POST['comment'];
	$date = getdate();
	$commentCity = $_POST['city_id'];
	
	$timestamp = $date[year] . "-" . $date[mon] . "-" . $date[mday] 
					. " " . $date[hours] . ":" . $date[minutes] . ":" . $date[seconds];

					
	
	$userID = $_COOKIE['user_id'];
	$subject = mysqli_real_escape_string($db, trim($subjectSubmitted));
	$comment = mysqli_real_escape_string($db, trim($commentSubmitted));
	
	if (($userID != "") AND ($subject != "") AND ($comment != "")){

		$query = "INSERT INTO city_comments (`city_id`, `user_id`, `comment_subject`, `comment_body`, `comment_date_submitted`) 
					VALUES ('$commentCity', '$userID', '$subject', '$comment', '$timestamp')";
	
		$result = mysqli_query($db, $query) or die ("Error Querying Database");
		mysqli_close($db);	
?>


<html>
<body>

<div class="content">

<h1><center>Thanks for your comment!</h1>

<h2>We're always glad to hear from you!  We'll review your comment and see what we can do! <br/><br/>

<?php
	} else {
?>
		<div class="content">
		
		<h2><center>Your comment was not sent. You did not fill in all of the fields. Please revisit <a href="city.php?id=<?php echo $cityID ?>">this page</a>. <br>
<?php
	}
?>

Want to see what other people have said?  View all the comments we've received <a href = "comments.php">here</a>.

<br/><br/><br/><br/><br/></center>
</h2>

</div>

<?php
   include('footer.php');
?>


</body>
</html>
