<?php
	include('db_connect.php');

	$error = "none";
	
	//get user input from post
	$userFirstName = strip_tags(trim($_POST['firstName']));
	$userLastName = strip_tags(trim($_POST['lastName']));
	$userUserName = strip_tags(trim($_POST['userName']));
	$userPassword = strip_tags(trim($_POST['password1']));
	$userPasswordAgain = strip_tags(trim($_POST['password2']));
	$userEmail = strip_tags(trim($_POST['email']));
	$userTravel = trim($_POST['travel']);
	$userOrigin = strip_tags(trim($_POST['origin']));
	$userHomeCity = strip_tags(trim($_POST['homeCity']));
	if (!empty($_POST['visited'])){
		$userCountriesVisited = $_POST['visited'];
		$error = "pickCities";
	}

	//check if user's username is already in db or not
	$username = mysqli_real_escape_string($db,  $userUserName);
	$query = "SELECT * FROM users WHERE (username = '$username')";
	//echo $query;
	$result = mysqli_query($db, $query) or die("Error Querying Database");


	//test for any errors
	if (empty($userFirstName)|| empty($userLastName) || empty($userUserName) 
		|| empty($userPassword) || empty($userPasswordAgain) || empty($userEmail))  {
			$error = "empty";
	} else if ($row = mysqli_fetch_array($result)) {
		$error = "username";
 	} else  if ($userPassword != $userPasswordAgain){
		$error = "pwd";
	} else if (strpos($userEmail, '@') == false) {
		$error = "email";
	}

   //include('db_connect.php');
 	header('Location: register.php?error=' . $error);

	if(($error == "none") || ($error == "pickCities")){
   include('header_side.php');

   //prevent mysql injection
   $userFirstName = mysqli_real_escape_string($db, $userFirstName);
   $userLastName = mysqli_real_escape_string($db, $userLastName);
   $userUserName = mysqli_real_escape_string($db, $userUserName);
   $userPassword = mysqli_real_escape_string($db, $userPassword);
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
	  
     //if there are no errors, add user to db
   $query = "INSERT INTO users (first_name, last_name, username, password, email, origin, homeCity) VALUES ('$userFirstName', '$userLastName', '$userUserName', SHA('$userPassword'), '$userEmail', '$userOrigin', '$userHomeCity')";
   
   $result = mysqli_query($db, $query) or die ("Error Querying Database");
   
   //get user's user_id
   $query = "SELECT user_id FROM users WHERE username='$userUserName'";
   echo $query;    

   $result = mysqli_query($db, $query) or die ("Error Querying Database");
   $row = mysqli_fetch_array($result);
   $id = $row['user_id'];
  
	$query = "INSERT INTO profilePictures (user_id, photo) VALUES ('$id', 'profilePictures/defaultProfilePicture.jpg')";
	$result = mysqli_query($db, $query) or die ("Error Querying Database");
  

	//go through user's selected countries and insert them into the db
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
   
   $query = "COMMIT";
	$result = mysqli_query($db, $query) or die ("Error Querying Database");
  
		//set session to user's user_id to log them in
  		$_SESSION['user_id'] = $id;
		$_SESSION['temp_id'] = $id;


 
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
   mysqli_close($db);
   include('footer.php');
?>


</body>
</html>
