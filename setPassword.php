<?php
   //$userID = $_GET['id'];
   
   session_start();
	$user_id = $_SESSION['user_id']; 
	
	if (!empty($user_id)) {
	
		include('header_side.php');
		include('db_connect.php');
?>


<html>
<body>


<div class="content">
<center><H2>Set your password: </H2></center>
<center>
<?php
	if (isset($_GET['error'])) {
		if($_GET['error'] == "empty") {
			echo "<center><h3><medium><font color=#FF0000 >You must complete all fields!  Try again!</font></medium></h3></center>";
		}
		
		if($_GET['error'] == "pswd") {
			echo "<center><h3><medium><font color=#FF0000 >Your old password was not correct!  Try again!</font></medium></h3></center>";
		}
		
		if($_GET['error'] == "mismatch") {
			echo "<center><h3><medium><font color=#FF0000 >Your new password did not match!  Try again!</font></medium></h3></center>";
		}
	
		if($_GET['error'] == "none") {
			echo "<center><h3><medium>Your new password has been submitted! </medium></h3></center>";
		}
	
	}
	


//edit password form:
?>

<table>
<form action="passwordSubmitted.php" method="POST">
<tr><td>Old Password:</td><td><input type="password" name="oldPassword" >*</td></tr>
<tr><td>New Password:</td><td><input type="password" name="newPassword" >*</td></tr>
<tr><td>Re-enter New Password:</td><td><input type="password" name="newPasswordAgain" >*</td></tr>
<tr><td><small>*These fields are <b><u>required</b></u>!</small></td></tr>
<tr><td><br></td></tr>
</table><table>
<tr colspan=2><center><input type="submit" value="Submit" class="formbutton"></center></tr>
</form> 
</table>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<?php
   include('footer.php');
   
   } else {
		header('Location:index.php');
   }
?>

</body>
</html>