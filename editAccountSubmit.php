<?php
	include('db_connect.php');

	//get user submitted info from post, check for sql injection, and check for any errors
	$userFirstName = strip_tags(trim($_POST['firstName']));
	$userLastName = strip_tags(trim($_POST['lastName']));
	$userEmail = strip_tags(trim($_POST['email']));
	$userTravel = trim($_POST['travel']);
	$userOrigin = strip_tags(trim($_POST['origin']));
	$userHomeCity = strip_tags(trim($_POST['homeCity']));
	$user_id = $_cookie['user_id'];

	$username = mysqli_real_escape_string($db,  $userUserName);
	$query = "SELECT * FROM users WHERE (user_id = '$user_id')";
	$result = mysqli_query($db, $query) or die("Error Querying Database");

	$error = "none";
	if (empty($userFirstName) || empty($userLastName) || empty($userEmail))  {
			$error = "empty";
	} else if (strpos($userEmail, '@') == false) {
		$error = "email";
	}

 	header('Location: editAccount.php?error=' . $error);

	if($error == "none"){
    include('header_side.php');

   $userFirstName = mysqli_real_escape_string($db, $userFirstName);
   $userLastName = mysqli_real_escape_string($db, $userLastName);
   $userEmail = mysqli_real_escape_string($db, $userEmail);


   if (!empty($userOrigin)) {
      $userOrigin = mysqli_real_escape_string($db, $userOrigin);
   } else {
      $userOrigin = "N/A";
   }

   if (!empty($userHomeCity)){
      $userHomeCity = mysqli_real_escape_string($db, $userHomeCity);
   } else {
      $userHomeCity = "N/A";
   }
       

	$query = "START TRANSACTION";
	$result = mysqli_query($db, $query) or die ("Error Querying Database");

	   //edit user info in db
   $query = "UPDATE users SET first_name = '$userFirstName', last_name = '$userLastName', email = '$userEmail', origin = '$userOrigin', homeCity = '$userHomeCity' WHERE user_id = '$user_id'";
   echo $query;    

   $result = mysqli_query($db, $query) or die ("Error Querying Database");
  

   if (!empty($_POST['visited'])){ 
      $listvals=$_POST['visited'];
      $n=count($listvals);
      echo "User chose $n items from the list.<br>\n";
      for($i=0;$i<$n;$i++) {
          $countryId = $listvals[$i];
	  echo $countryId;
	  $query = "INSERT INTO userCountries VALUES ('$user_id', '$countryId')";
	  
	  $result = mysqli_query($db, $query) or die ("Error Querying Database");
      }
   } 
  
	$query = "COMMIT";
	$result = mysqli_query($db, $query) or die ("Error Querying Database");
  		$_SESSION['user_id'] = $id;

 
?>

<html>
<body>


<div class="content">
<center><h1>Account Information has been updated!</h1></center>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

</div>


<?php
   }
   mysqli_close($db);
   include('footer.php');
?>


</body>
</html>