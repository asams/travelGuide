<?php
   include('header_side.php');
   include('db_connect.php');
?>

<html>
<body>
<div class="content">

<?php   
	//get user info, and country info for the countries the user has travelled to
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
	//display errors or confirmation messages for when the user edits their info
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


<?php
	//edit account form:
?>
<h2><center>Edit Account Information</center></h2>
<br/>

<?php
	//button to change profile picture
?>
<form action=setProfilePicture.php method="POST" >
   <center><input type="submit" value="Set Profile Picture!" class="formbutton"/></center>
</form>
<br/><br/>

<form action=editAccountSubmit.php method="POST" >
<tr><td>First Name:</td><td><input type="text" name="firstName" value="<?php echo $firstName;?>"/>*</td></tr>
<tr><td>Last Name:</td><td><input type="text" name="lastName" value="<?php echo $lastName;?>"/>*</td></tr>
<tr><td>Email Address: </td><td><input type="text" name="email" value="<?php echo $email;?>"/>*</td></tr>
<tr><td>Home Country: </td><td><input type="text" name="origin" value="<?php echo $origin;?>"/></td></tr>
<tr><td>Home City: </td><td><input type="text" name="homeCity" value="<?php echo $homeCity;?>"/></td></tr>
<tr><td>Where have you travelled before?</td>

<td>
<?php
	//display options with previously selected countries already selected
	$query = "SELECT country_name, country_id FROM countries ORDER BY country_name";
	$query2 = "SELECT country_id FROM userCountries WHERE user_id = '$user_id'";
	$result = mysqli_query($db, $query)or die("Error Querying Database");
	$result2 = mysqli_query($db, $query2)or die("Error Querying Database2");
	
	$i = 0;
	while($row2 = mysqli_fetch_array($result2)) {
		$countryID = $row2['country_id'];
		$array[$i] = $countryID;
		$i = $i + 1;
	}
	while($row = mysqli_fetch_array($result)) {
		$countryName = $row['country_name'];
		$countryID = $row['country_id'];
		if(in_array($countryID, $array)) {
			echo '<input type="checkbox" name="visited[]" value='. $countryID . ' checked disabled> ' . $countryName . '<br>';
		} else {
			echo '<input type="checkbox" name="visited[]" value='. $countryID . ' > ' . $countryName . '<br>';
		}
	}
?>
</br>

<?php
	//button to edit which cities you have visited
?>
</tr><tr><td> <a href = "registerCities.php"> What cities have you visited? </a></td><td>

</td></tr>

</table>
<table>
<?php
	//end of edit account form:
?>
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