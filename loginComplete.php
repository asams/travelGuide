<?php
   include('header_side.php');

	session_start();

   include('db_connect.php');
?>

<div class="content">
<?php

   $query = "SELECT * FROM users WHERE user_id = " . $_SESSION['user_id'];

   $result = mysqli_query($db, $query) or die ("Error Querying Database");
   
   if ($row = mysqli_fetch_array($result))
   {
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$user_id = $row['user_id'];
		
		$_SESSION['user_id'] = $user_id;
		
   		echo "<center><h2>Thanks for logging in, $first_name!</h2>\n";
		echo $_SESSION['user_id'];
   		echo "<h3>Click <a href= \"index.php\">here</a> to continue, or use the menu on the left.</h3></center>";
		echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
   }

	
	mysqli_close($db);
   
   
   
?>
</div>

<html>
<body>


<?php
	
   include('footer.php');
?>


</body>
</html>