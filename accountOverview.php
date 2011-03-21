<?php
// session_start();
 //$user_id = $_SESSION['user_id'];
 
// if(isset($_COOKIE['user_id'])){
//    $user_id = $_COOKIE['user_id'];
 //}
   include('header_side.php');
   include('db_connect.php');
?>

<html>
<body>
<div class="content">


<?php   
   $query = "SELECT * FROM users WHERE user_id = '$user_id'";
   echo $query;
   $result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
   while($row = mysqli_fetch_array($result)){
        $username = $row['username'];
		$firstName = $row['first_name'];
		$lastName = $row['last_name'];
		$email = $row['email'];
		$origin = $row['origin'];
		$homeCity = $row['homeCity'];
		$travelHistory = $row['travelHistory'];
	}
	
	echo "<h1>" . $username . "</h1>";

	echo "<p><H2>Info: </H2></p>";
	echo "Name: " . $firstName . " " . $lastName . "<br/><br/>";
	echo "Email: " . $email . "<br/><br/>";
	echo "Origin: " . $origin . "<br/><br/>";
	echo "Home City: " . $homeCity . "<br/><br/>";
	echo "Travel History: " . $travelHistory;
?>

</div>

<?php
   include('footer.php');
?>


</html>
</body>