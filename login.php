<?php
	if($_GET['error'] == "none"){
		header('Location: loginComplete.php');
	}
   include('header_side.php');
   include('db_connect.php');

   $error=$_GET['error'];
?>

<html>
<body>


<div class="content">
<h2><center>Login to your account!</center></h2>
<h3><center>Don't have an account yet?  Click <a href = "register.php">here</a> to register!</center></h3><br/>
<table width=50% >
<?php  
//print errors if something is wrong with the user's input username and password:
   if ($error=="empty") {
?>
<left><b><h3><medium><font color="#FF0000">Both your username and password must be entered!</font></medium></h3></b></left>
<?php
   } else if ($error=="pwd") {
?>
       <left><b><h3><medium><font color="#FF0000">Your password was incorrect!  Try again!</font></medium></h3></b></left>
<?php
   } else if ($error=="username") {
?>
       <left><b><h3><medium><font color="#FF0000">The username you entered does not exist!  Try again!</font></medium></h3></b></left>
<?php
   } else if ($error=="incorrect") {
?>
       <left><b><h3><medium><font color="#FF0000">Incorrect username or password! Try again!</font></medium></h3></b></left>
<?php
   }
?>


<?php
//login form:
?>
<center>
<form action=submitLogin.php method="POST" >
<tr><td>Username: </td><td><input type="text" name="userName" />*</td></tr>
<tr><td>Password: </td><td><input type="password" name="password"  />*</td></tr>
</table>
<table>
<tr><td><small>*These fields are <b><u>required</b></u>!</small></td></tr>
<tr><td><br></td></tr>
<tr><td><input type="submit" value="Submit" class="formbutton"></td></tr>
</table>
</center>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

</div>


<?php
   include('footer.php');
?>


</body>
</html>