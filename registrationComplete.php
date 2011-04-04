<?php
   $stillNeed = $_GET['stillNeed'];
	if($stillNeed == "cities"){
		//if the user has not yet registered which cities they have visited, forward to registerCities.php
		header('Location: registerCities.php');
	}

   include('header_side.php');
   include('db_connect.php');
?>

<div class="content">
<?php

	//gets user information based on cookie set in submitRegistration.php
   $query = "SELECT * FROM users WHERE user_id = " . $_COOKIE['user_id'];

   $result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
   
   if ($row = mysqli_fetch_array($result))
   {
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$user_id = $row['user_id'];
		
		//sets session so that user is logged in using both session and cookies
		$_SESSION['user_id'] = $user_id;
		
   		echo "<center><h2>Thanks for registering, $first_name!</h2>\n";
   		echo "<h3>You have automatically been logged in! <br/><br/> Click <a href= \"index.php\">here</a> to continue, or use the menu on the left.</h3></center>";
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