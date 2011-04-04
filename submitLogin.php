<?php
	//get user input from post and escape mysql injection
	$userUserName = $_POST['userName'];
	$userPassword = $_POST['password'];
      include('db_connect.php');
	$userUserName = mysqli_real_escape_string($db, $userUserName);
   $userPassword = mysqli_real_escape_string($db, $userPassword);


   //select user from db with the given username and password
   $query = "SELECT * FROM users WHERE username = '$userUserName' AND password = SHA('$userPassword')";

//   echo $query;    

   $result = mysqli_query($db, $query) or die ("Error Querying Database");
   
   //send error messages to login.php
	if (empty($_POST['userName']) || empty($_POST['password']))  {
		$error = "empty";
	}

   else if ($row = mysqli_fetch_array($result)){
		$error = "none";
   }
   else{
		$error = "incorrect";
   }


   //redirect to login.php
	header('Location: login.php?error=' . $error);
   include('header_side.php');
	
	session_start();

	$userUserName = $_POST['userName'];
	$userPassword = $_POST['password'];


	if (empty($userUserName) || empty($userPassword))  {
		$error = "empty";
	
	} else {
		$error = "none";

?> 



<?php
   include('db_connect.php');
?>

<div class="content">
<?php


	//get user info from table using username and password
   $userUserName = mysqli_real_escape_string($db, $userUserName);
   $userPassword = mysqli_real_escape_string($db, $userPassword);
   
   $query = "SELECT * FROM users WHERE username = '$userUserName' AND password = SHA('$userPassword')";

   $result = mysqli_query($db, $query) or die ("Error Querying Database");
   
   if ($row = mysqli_fetch_array($result))
   {
		
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$user_id = $row['user_id'];

		//set user_id in session to log the user in
		$_SESSION['user_id'] = $user_id;


		
   		echo "<center><h2>Thanks for logging in, $first_name!</h2>\n";
		echo $_SESSION['user_id'];
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