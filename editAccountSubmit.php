<?php
	include('db_connect.php');
	//include('header_side.php');

	$userFirstName = trim($_POST['firstName']);
	$userLastName = trim($_POST['lastName']);
	$userEmail = trim($_POST['email']);
	$userTravel = trim($_POST['travel']);
	$userOrigin = trim($_POST['origin']);
	$userHomeCity = trim($_POST['homeCity']);
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
       
   $query = "UPDATE users SET first_name = '$userFirstName', last_name = '$userLastName', email = '$userEmail', origin = '$userOrigin', homeCity = '$userHomeCity' WHERE user_id = '$user_id'";
   echo $query;    

   $result = mysqli_query($db, $query) or die ("Error Querying Database");
   
   /*$query = "SELECT user_id FROM users WHERE username='$userUserName'";
   echo $query;    

   $result = mysqli_query($db, $query) or die ("Error Querying Database");
   $row = mysqli_fetch_array($result);
   $id = $row['user_id'];
  

   if (!empty($_POST['visited'])){ 
      $listvals=$_POST['visited'];
      $n=count($listvals);
      echo "User chose $n items from the list.<br>\n";
      for($i=0;$i<$n;$i++) {
          $countryId = $listvals[$i];
	  echo $countryId;
	  $query = "INSERT INTO userCountries (user_id, country_id) VALUES ('$id', '$countryId')";

          echo $query; 
	  $result = mysqli_query($db, $query) or die ("Error Querying Database");
      }
   } 
  
  		$_SESSION['user_id'] = $id;
*/

 
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