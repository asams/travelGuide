<?php
   include('db_connect.php');
?>

<?php
   include('header_side.php');
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

					
	$name = mysqli_real_escape_string($db, trim($nameSubmitted));
	$subject = mysqli_real_escape_string($db, trim($subjectSubmitted));
	$comment = mysqli_real_escape_string($db, trim($commentSubmitted));
	
	$query = "INSERT INTO comments (name, subject, comment_body, date_submitted) VALUES ('$name', '$subject', '$comment', '$timestamp')";
	
	$result = mysqli_query($db, $query) or die ("Error Querying Database");
	
	mysqli_close($db);
	
	
?>




<div class="content">

<h1>Thanks for your comment!</h1>

<h2>We're always glad to hear from you!  We'll review your comment and see what we can do! <br/><br/>

Want to see what other people have said?  View all the comments we've received <a href = "comments.php">here</a>.

<br/><br/><br/><br/><br/>
</h2>



<hr>

</div>

<?php
   include('footer.php');
?>


</body>
</html>
