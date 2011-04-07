<?php
header('Location: setPassword.php');

//include('header_side.php');
include('db_connect.php');

$userID = $_COOKIE['user_id'];

$oldPwd = $_POST['oldPassword'];
$newPwd = $_POST['newPassword'];
$newPwd2 = $_POST['newPasswordAgain'];

$oldPwd = mysqli_real_escape_string($db, strip_tags(trim($oldPwd)));
$newPwd = mysqli_real_escape_string($db, strip_tags(trim($newPwd)));
$newPwd2 = mysqli_real_escape_string($db, strip_tags(trim($newPwd2)));

if (!empty($oldPwd) && !empty($newPwd) && !empty($newPwd2)) {
	
	$query = "SELECT password FROM users WHERE user_id = '$userID' and password=SHA('$oldPwd')";
	//echo $query;
	$result = mysqli_query($db, $query) or die ("Error Querying Database");
	
	
	if ($row = mysqli_fetch_array($result)) {
		$actualPwd = $row['password'];
		
		if ($newPwd == $newPwd2) {
		
			$query = "UPDATE users SET password=SHA('$newPwd') WHERE user_id = '$userID'";
			$result = mysqli_query($db, $query) or die ("Error Querying Database");
			header('Location: setPassword.php?error=none');
			
		} else {
			header('Location: setPassword.php?error=mismatch');
		}
		
		
	} else {
		header('Location: setPassword.php?error=pswd');
	}
	

} else {
	header('Location: setPassword.php?error=empty');
}
