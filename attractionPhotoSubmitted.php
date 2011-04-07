<?php
	header('Location: attraction.php?id=' . $_POST['attraction_id']);
	//echo $_POST['attraction_id'];
	include('header_side.php');
	include('db_connect.php');
	//session_start();
	// Where the file is going to be placed
	$target_path = "uploads/";

	//Add the original filename to target path
	//Result is "uploads/filename.extension"
	$target_path = $target_path . basename($_FILES['photo']['name']);

	$subjectSubmitted = mysqli_real_escape_string($db, strip_tags(trim($_POST['subject'])));
	$photoSubmitted = mysqli_real_escape_string($db, trim($_POST['photo']));
	$date = getdate();
	$photoAttraction = $_POST['attraction_id'];
	$timestamp = $date[year] . "-" . $date[mon] . "-" . $date[mday]
			. " " . $date[hours] . ":" . $date[minutes] . ":" . $date[seconds];

	
	$userID = $_COOKIE['user_id'];
	$subject = $subjectSubmitted;
	$photo = $photoSubmitted;

	
	//if (($userID != "") AND ($subject != "") AND ($photo != "")){
	if((!empty($subjectSubmitted)) AND (!empty($userID)) AND (!empty($_FILES['photo']['name']))){
	$query = "INSERT INTO attraction_photos (`attraction_id`, `user_id`, `subject`, `photo`, `photo_date_submitted`)
	VALUES ('$photoAttraction', '$userID', '$subject', '$target_path', '$timestamp')";
	echo $query;
	$result = mysqli_query($db, $query) or die ("Error Querying Database");
	mysqli_close($db);
	}
?>


<html>
<body>

<div class="content">
<?php
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {
	echo "The file ". basename( $_FILES['photo']['name']).
		" has been uploaded";


	} else{
	echo "There was an error uploading the file, please try again!";
	echo "Please revisit" ?> <a href="attraction.php?id=<?php echo $attractionID ?>">this page</a>. <br>
<?php
	//echo "Want to see what other people have uploaded? View all the photos we've received" ?><a href = "attractionPhoto.php">here</a>.
<?php
	}
?>

<br/><br/><br/><br/><br/></center>
</h2>

</div>

<?php
   include('footer.php');
?>

