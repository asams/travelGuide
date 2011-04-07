<?php
	include('db_connect.php');

	$error = "none";

	if (!empty($_POST['visited'])){
		$userCitiesVisited = $_POST['visited'];
	}

   //redirect to register.php when cities have been added
 	header('Location: register.php?error=' . $error);

	if(($error == "none")){
   include('header_side.php');

	//add user's selected cities to the db
   if (!empty($_POST['visited'])){ 
   
   $query = "START TRANSACTION";
	$result = mysqli_query($db, $query) or die ("Error Querying Database");


      $listvals=$_POST['visited'];
      $n=count($listvals);
      echo "User chose $n items from the list.<br>\n";
      for($i=0; $i<$n ;$i++) {
          $cityId = $listvals[$i];
	  echo $cityId;
	  $query = "INSERT INTO userCities (user_id, city_id) VALUES ('$user_id', '$cityId')";

          echo $query; 
	  $result = mysqli_query($db, $query) or die ("Error Querying Database");
	  
      }
	  
	  $query = "COMMIT";
	$result = mysqli_query($db, $query) or die ("Error Querying Database");
   } 
  
//  		$_SESSION['user_id'] = $id;
		//$_SESSION['temp_id'] = $id;


 
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
