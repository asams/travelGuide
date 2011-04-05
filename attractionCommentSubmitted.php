<?php
	header('Location: attraction.php?id=' . $_POST['attraction_id']);
	include('header_side.php');
	include('db_connect.php');



	//$userIDSubmitted = $_POST['user_id'];
	$subjectSubmitted = $_POST['subject'];
	$commentSubmitted = $_POST['comment'];
	$date = getdate();
	$commentAttraction = $_POST['attraction_id'];
	
	$timestamp = $date[year] . "-" . $date[mon] . "-" . $date[mday] 
					. " " . $date[hours] . ":" . $date[minutes] . ":" . $date[seconds];

					
	//$userID = mysqli_real_escape_string($db, trim($userIDSubmitted));
	
	$userID = $_COOKIE['user_id'];
	$subject = mysqli_real_escape_string($db, strip_tags(trim($subjectSubmitted)));
	$comment = mysqli_real_escape_string($db, strip_tags(trim($commentSubmitted)));
	

	//if all the fields are completed, then insert the new comment into the attractions' comments table
	if (($userID != "") AND ($subject != "") AND ($comment != "")){

		$query = "INSERT INTO attraction_comments (`attraction_id`, `user_id`, `comment_subject`, `comment_body`, `comment_date_submitted`) 
					VALUES ('$commentAttraction', '$userID', '$subject', '$comment', '$timestamp')";
	
		$result = mysqli_query($db, $query) or die ("Error Querying Database");
		mysqli_close($db);
	
	}
	
	
?>


