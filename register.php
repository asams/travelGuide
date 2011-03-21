<?php
   $error=$_GET['error'];
   if($error == "none"){
		header('Location: registrationComplete.php');

   }

   include('header_side.php');
   include('db_connect.php');


?>

<html>
<body>


<div class="content">
<h2><center>Register for an account!</center></h2>
<table width=55% >
<?php
  
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

<form action=submitRegistration.php method="POST" >
<tr><td>First Name:</td><td><input type="text" name="firstName" />*</td></tr>
<tr><td>Last Name:</td><td><input type="text" name="lastName"  />*</td></tr>
<tr><td>Username: </td><td><input type="text" name="userName" />*</td></tr>
<tr><td>Password: </td><td><input type="password" name="password1"  />*</td></tr>
<tr><td>Password Again: </td><td><input type="password" name="password2" />*</td></tr>
<tr><td>Email Address: </td><td><input type="text" name="email" />*</td></tr>
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
<tr><td>Home Country: </td><td><input type="text" name="origin" /></td></tr>
<tr><td>Home City: </td><td><input type="text" name="homeCity" /></td></tr>
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
