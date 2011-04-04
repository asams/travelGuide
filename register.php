<?php
   $error=$_GET['error'];
   if($error == "none"){
		//$error == "none" means the registration was successful and no cities need to be selected because the user did not select any countries
		header('Location: registrationComplete.php');

   }
   else if($error == "pickCities"){
		//$error == "pickCities" means the registration was successful but the user needs to select the cities they have visited
		header('Location: registrationComplete.php?stillNeed=cities');
   }

   include('header_side.php');
   session_start();
   include('db_connect.php');


?>

<html>
<body>


<div class="content">
<h2><center>Register for an account!</center></h2>
<table width=90% >
<?php
	//print errors if something is wrong with the user's input information:
   if ($error=="empty") {
?>
<left><b><h3><medium><font color="#FF0000">All required fields <u>MUST</u> be completed!</font></medium></h3></b></left>
<?php
   } else if ($error=="pwd") {
?>
       <left><b><h3><medium><font color="#FF0000">Your passwords did <u>NOT</u> match!</font></medium></h3></b></left>
<?php
   } else if ($error=="email") {
?>
       <left><b><h3><medium><font color="#FF0000">You must enter an accurate email address!</font></medium></h3></b></left>
<?php
   } else if ($error=="username") {
?>
       <left><b><h3><medium><font color="#FF0000">There is already a user with that username!  Please try again!</font></medium></h3></b></left>
<?php
   }
?>


<?php
//registration form:
?>
<form action=submitRegistration.php method="POST" >
<tr><td width = 30%>First Name:</td><td><input type="text" name="firstName" />*</td></tr>
<tr><td width = 30%>Last Name:</td><td><input type="text" name="lastName"  />*</td></tr>
<tr><td width = 30%>Username: </td><td><input type="text" name="userName" />*</td></tr>
<tr><td width = 30%>Password: </td><td><input type="password" name="password1"  />*</td></tr>
<tr><td width = 30%>Password Again: </td><td><input type="password" name="password2" />*</td></tr>
<tr><td width = 30%>Email Address: </td><td><input type="text" name="email" />*</td></tr>
<tr><td width = 30%>Home Country: </td><td><input type="text" name="origin" /></td></tr>
<tr><td width = 30%>Home City: </td><td><input type="text" name="homeCity" /></td></tr>
<tr><td width = 30%>Where have you travelled before?</td>

<td>
<?php
	//get country names, ids, and flags
	$query = "SELECT country_name, country_id, country_flag FROM countries ORDER BY country_name"; 
	$result = mysqli_query($db, $query)or die("Error Querying Database");
	echo "<table width = \"90%\" cellpadding = 15>";
	$count = 0;
	while($row = mysqli_fetch_array($result)) {
		$count ++;
		$countryName = $row['country_name'];
		$countryID = $row['country_id'];
		$countryFlag = $row['country_flag'];
						

	//output country names and flags as checkbox options for which countries the user has visited	
	if($count % 5 == 1){
		echo "<tr valign = top>";
	}
	echo "<td width = \"20%\" align = center><img src = \"" . $countryFlag . "\" alt = \"flag\" width = \"100%\" />   ";
    echo "<br/><input type=\"checkbox\" name=\"visited[]\" value=". $countryID . " > ". $countryName . "<br>";
	if ($count % 5 == 0){
		echo "</tr>";
	}
		
		
	}
echo "</table>";
?>


</td></tr>

<?php
//end of registration form:
?>
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
