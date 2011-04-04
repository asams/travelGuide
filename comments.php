<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>




<div class="content">
<h1>Comments we've received from our viewers:</h1>

<table rules = rows>

<?php


	//get the general comments that we've received from users	
	$query = "SELECT * FROM comments ORDER BY comment_date_submitted DESC";

	$result = mysqli_query($db, $query) or die ("Error Querying Database");
	
	while($row = mysqli_fetch_array($result)){
		$name = $row['comment_name'];
		$subject = $row['comment_subject'];
		$comment = $row['comment_body'];
		$date_submitted = $row['comment_date_submitted'];
		
		//display the comment
		echo "<tr><td><br/>Name: " . $name . "<br/><br/>Subject: " . $subject . "<br/><br/>Comment: " . $comment . "<br/><br/>Date: " . $date_submitted . "<br/><br/></td></tr>";
	}
	
?>

</table>

<br/><br/><br/><br/><br/>
</h2>


</div>

<?php
   include('footer.php');
?>


</body>
</html>