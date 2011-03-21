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
   $query = "SELECT u.*, uc.*, co.country_name, co.country_flag FROM users u NATURAL JOIN userCountries uc NATURAL JOIN countries co WHERE user_id = '$user_id' ORDER BY co.country_name";
   $result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
   $travelHistory = "<table width = \"90%\" cellpadding = 15>";
   $count = 0;
   while($row = mysqli_fetch_array($result)){
		$count ++;
        $username = $row['username'];
		$firstName = $row['first_name'];
		$lastName = $row['last_name'];
		$email = $row['email'];
		$origin = $row['origin'];
		$homeCity = $row['homeCity'];
		
		$countryID = $row['country_id'];
		$countryName = $row['country_name'];
		$countryFlag = $row['country_flag'];
		
	if($count % 5 == 1){
		$travelHistory = $travelHistory . "<tr valign = top>";
	}
	$travelHistory = $travelHistory . "<td width = \"20%\" align = center><a href=country.php?id=" . $countryID . "><img src = \"" . $countryFlag . "\" alt = \"flag\" width = \"100\" /></a><br/><a href = \"country.php?id=" . $countryID . "\">" . $countryName . "</a></td>";
	if ($count % 5 == 0){
		echo "</tr>";
	}
	
	}
	$travelHistory = $travelHistory . "</table>";
	
	echo "<h1>" . $username . "</h1>";

	echo "<p><H2>Info: </H2></p>";
	echo "Name: " . $firstName . " " . $lastName . "<br/><br/>";
	echo "Email: " . $email . "<br/><br/>";
	echo "Origin: " . $origin . "<br/><br/>";
	echo "Home City: " . $homeCity . "<br/><br/>";
	echo "Travel History: " . $travelHistory;
?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>

<?php
   include('footer.php');
?>


</html>
</body>