<?php
   include('db_connect.php');
?>

<?php
   include('header_side.php');
?>

<html>
<body>




<div class="content">
<h1>Comments we've received from our viewers:</h1>

<table rules = rows>

<?php
	
	$query = "SELECT * FROM comments ORDER BY date_submitted DESC";

	$result = mysqli_query($db, $query) or die ("Error Querying Database");
	
	while($row = mysqli_fetch_array($result)){
		$name = $row['name'];
		$subject = $row['subject'];
		$comment = $row['comment'];
		$date_submitted = $row['date_submitted'];
		
		echo "<tr><td><br/>Name: " . $name . "<br/><br/>Subject: " . $subject . "<br/><br/>Comment: " . $comment . "<br/><br/>Date: " . $date_submitted . "<br/><br/></td></tr>";
	}
	
?>

</table>

<br/><br/><br/><br/><br/>
</h2>



<hr>

</div>

<?php
   include('footer.php');
?>


</body>
</html>