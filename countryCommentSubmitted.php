<?php
	header('Location: country.php?id=' . $_POST['country_id']);
	include('header_side.php');
	include('db_connect.php');



	//$userIDSubmitted = $_POST['user_id'];
	$subjectSubmitted = $_POST['subject'];
	$commentSubmitted = $_POST['comment'];
	$date = getdate();
	$commentCountry = $_POST['country_id'];
	
	$timestamp = $date[year] . "-" . $date[mon] . "-" . $date[mday] 
					. " " . $date[hours] . ":" . $date[minutes] . ":" . $date[seconds];

					
	//$userID = mysqli_real_escape_string($db, trim($userIDSubmitted));
	
	$userID = $_COOKIE['user_id'];
	$subject = mysqli_real_escape_string($db, strip_tags(trim($subjectSubmitted)));
	$comment = mysqli_real_escape_string($db, strip_tags(trim($commentSubmitted)));
	

	
	//if all the fields are completed, then insert the new comment into the countries' comments table
	if (($userID != "") AND ($subject != "") AND ($comment != "")){

		$query = "INSERT INTO country_comments (`country_id`, `user_id`, `comment_subject`, `comment_body`, `comment_date_submitted`) 
					VALUES ('$commentCountry', '$userID', '$subject', '$comment', '$timestamp')";
	
		$result = mysqli_query($db, $query) or die ("Error Querying Database");
		mysqli_close($db);
	
	}
	
	
?>

