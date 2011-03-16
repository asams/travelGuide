<?php
	
	$userUserName = $_POST['userName'];
	$userPassword = $_POST['password'];


	//$username = mysqli_real_escape_string($db,  $userUserName);
	//$query = "SELECT * FROM users WHERE (username = '$username')";
	//echo $query;
	//$result = mysqli_query($db, $query) or die("Error Querying Database");

	if (empty($userUserName) || empty($userPassword))  {
			header('Location: login.php?error=empty');
	//} else if ($row = mysqli_fetch_array($result)) {
	//	header('Location: register.php?error=username');
 
//	} else  if ($userPassword != $userPasswordAgain){
	//	header('Location: login.php?error=pwd');
	//} else if (strpos($userEmail, '@') == false) {
//		header('Location: login.php?error=email');
	} else {
?> 



<?php
   include('db_connect.php');
   include('header_side.php');
?>

<div class="content">
<?php



   $userUserName = mysqli_real_escape_string($db, $userUserName);
   $userPassword = mysqli_real_escape_string($db, $userPassword);
   
   $query = "SELECT * FROM users WHERE username = '$userUserName' AND password = SHA('$userPassword')";

//   echo $query;    

   $result = mysqli_query($db, $query) or die ("Error Querying Database");
   
   if ($row = mysqli_fetch_array($result))
   {
   		$_SESSION['username'] = $row['username'];
		$_COOKIE['username'] = $row['username'];
		
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$user_id = $row['user_id'];
		
		$_SESSION ['user_id'] = $user_id;
		
   		echo "<center><h2>Thanks for logging in, $first_name!</h2>\n";
   		echo "<h3>Click <a href= \"index.php\">here</a> to continue, or use the menu on the left.</h3></center>";
		echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";
   }
   else
    {
   		echo "<div class=\"content\"><h2><center>Login to your account!</center></h2>
				<h3><center>Don't have an account yet?  Click <a href = \"register.php\">here</a> to register!</center></h3>";
		echo "<br/><table width=50% ><b><h3><medium><font color=\"#FF0000\">Incorrect username or password!</font></medium></h3></b>";
   		echo "<form action=submitLogin.php method=\"POST\" >
				<tr><td>Username: </td><td><input type=\"text\" name=\"userName\" />*</td></tr>
				<tr><td>Password: </td><td><input type=\"password\" name=\"password\"  />*</td></tr>
				</table>
				<table>
				<tr><td><small>*These fields are <b><u>required</b></u>!</small></td></tr>
				<tr><td><br></td></tr>
				<tr><td><input type=\"submit\" value=\"Submit\" class=\"formbutton\"></td></tr>
				</table>
				</center>";
		echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>";

    }
	
	mysqli_close($db);
   
   
   
?>
</div>

<html>
<body>


<?php
	}
   include('footer.php');
?>


</body>
</html>