<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>

<?php
	$nameSubmitted = $_POST['name'];
	$subjectSubmitted = $_POST['subject'];
	$commentSubmitted = $_POST['comment'];
	$date = getdate();
	
	$timestamp = $date[year] . "-" . $date[mon] . "-" . $date[mday] 
					. " " . $date[hours] . ":" . $date[minutes] . ":" . $date[seconds];

	
	//get the submitted values				
	$name = mysqli_real_escape_string($db, trim($nameSubmitted));
	$subject = mysqli_real_escape_string($db, strip_tags(trim($subjectSubmitted)));
	$comment = mysqli_real_escape_string($db, strip_tags(trim($commentSubmitted)));
	

	//if all fields are completed, then insert the comment into the table
	if (($name!="") AND ($subject!="") AND ($comment!="")){

		$query = "INSERT INTO comments (comment_name, comment_subject, comment_body, comment_date_submitted) VALUES ('$name', '$subject', '$comment', '$timestamp')";
	
		$result = mysqli_query($db, $query) or die ("Error Querying Database");
		mysqli_close($db);
	
	
	
	
	
?>




<div class="content">

<h1><center>Thanks for your comment!</h1>

<h2>We're always glad to hear from you!  We'll review your comment and see what we can do! <br/><br/>

<?php
	//one of the fields must have been empty, therefore, an error message is displayed
	} else {
?>
		<div class="content">
		
		<h2><center>Your comment was not sent. You did not fill in all of the fields. Please revisit <a href="contactUs.php">this page</a>. <br>
<?php
	}
?>

Want to see what other people have said?  View all the comments we've received <a href = "comments.php">here</a>.

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></center>
</h2>

</div>

<?php
   include('footer.php');
?>


</body>
</html>
