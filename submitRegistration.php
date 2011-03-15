<?php
	

	$userFirstName = trim($_POST['firstName']);
	$userLastName = trim($_POST['lastName']);
	$userUserName = trim($_POST['userName']);
	$userPassword = trim($_POST['password1']);
	$userPasswordAgain = trim($_POST['password2']);
	$userEmail = trim($_POST['email']);
	$userTravel = trim($_POST['travel']);
	$userOrigin = trim($_POST['origin']);
	$userHomeCity = trim($_POST['homeCity']);

	//$username = mysqli_real_escape_string($db,  $userUserName);
	//$query = "SELECT * FROM users WHERE (username = '$username')";
	//echo $query;
	//$result = mysqli_query($db, $query) or die("Error Querying Database");

	if (empty($userFirstName)|| empty($userLastName) || empty($userUserName) 
		|| empty($userPassword) || empty($userPasswordAgain) || empty($userEmail))  {
			header('Location: register.php?error=empty');
	//} else if ($row = mysqli_fetch_array($result)) {
	//	header('Location: register.php?error=username');
 
	} else  if ($userPassword != $userPasswordAgain){
		header('Location: register.php?error=pwd');
	} else if (strpos($userEmail, '@') == false) {
		header('Location: register.php?error=email');
	} else {
?> 

<?php
   include('db_connect.php');
   include('header_side.php');

   $userFirstName = mysqli_real_escape_string($db, $userFirstName);
   $userLastName = mysqli_real_escape_string($db, $userLastName);
   $userUserName = mysqli_real_escape_string($db, $userUserName);
   $userPassword = mysqli_real_escape_string($db, $userPassword);
   $userEmail = mysqli_real_escape_string($db, $userEmail);


   if (!empty($userTravel)){ 
      $userTravel = mysqli_real_escape_string($db, $userTravel);
   } else {
      $userTravel = "N/A";
   }

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
      
      
      	

      
   $query = "INSERT INTO users (first_name, last_name, username, password, email, travelHistory, origin, homeCity) VALUES ('$userFirstName', '$userLastName', '$userUserName', SHA('$userPassword'), '$userEmail', '$userTravel', '$userOrigin', '$userHomeCity')";
   //echo $query;    

   $result = mysqli_query($db, $query) or die ("Error Querying Database");
   mysqli_close($db);

   
?>

<html>
<body>


<div class="content">
<center><h1>Thanks for joining TravelGuide!</h1>
<h2>Your account has been created!  Please, log in on the left. </h2></center>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

</div>


<?php
   }
   include('footer.php');
?>


</body>
</html>
