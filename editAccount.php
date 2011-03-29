<?php
   include('header_side.php');
   include('db_connect.php');
?>

<html>
<body>
<div class="content">

<?php   
   $query = "SELECT u.*, uc.*, co.country_name, co.country_flag FROM users u NATURAL JOIN userCountries uc NATURAL JOIN countries co WHERE user_id = '$user_id' ORDER BY co.country_name";
   $result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
   $count = 0;
   while($row = mysqli_fetch_array($result)){
		$count ++;
        $username = $row['username'];
		$firstName = $row['first_name'];
		$lastName = $row['last_name'];
		$email = $row['email'];
		$origin = $row['origin'];
		$homeCity = $row['homeCity'];
	}
?>
<table width=55% >
<?php
   $error=$_GET['error'];
   if($error == "none"){
		echo 'Account information has been updated!';

   } else if ($error=="empty") {
?>
<left><b><h3><medium><font color="#FF0000">All required fields <u>MUST</u> be completed!</font></medium></h3></b></left>
<?php
   } else if ($error=="email") {
?>
       <left><b><h3><medium><font color="#FF0000">You must enter an accurate email address!</font></medium></h3></b></left>
<?php
   }
?>

<h2><center>Edit Account Information</center></h2>
<form action=editAccountSubmit.php method="POST" >
<tr><td>First Name:</td><td><input type="text" name="firstName" value="<?php echo $firstName;?>"/>*</td></tr>
<tr><td>Last Name:</td><td><input type="text" name="lastName" value="<?php echo $lastName;?>"/>*</td></tr>
<tr><td>Email Address: </td><td><input type="text" name="email" value="<?php echo $email;?>"/>*</td></tr>
<tr><td>Where have you travelled before?</td>

<td>
<?php
	$query = "SELECT country_name, country_id FROM countries ORDER BY country_name"; 
	$result = mysqli_query($db, $query)or die("Error Querying Database");
	while($row = mysqli_fetch_array($result)) {
		$countryName = $row['country_name'];
		$countryID = $row['country_id'];
						
		echo '<input type="checkbox" name="visited[]" value='. $countryID . ' > ' . $countryName . '<br>';
	}

?>


</td></tr>
<tr><td>Home Country: </td><td><input type="text" name="origin" value="<?php echo $origin;?>"/></td></tr>
<tr><td>Home City: </td><td><input type="text" name="homeCity" value="<?php echo $homeCity;?>"/></td></tr>
</table>
<table>
<tr><td><small>*These fields are <b><u>required</b></u>!</small></td></tr>
<tr><td><br></td></tr>
<tr><td><input type="submit" value="Submit" class="formbutton"></td></tr>



</table>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>


<?php
   include('footer.php');
?>


</body>
</html>