<?php
	session_start();
	$user_id = $_SESSION['user_id'];
 
if( isset($_COOKIE['user_id'])){
	$user_id = $_COOKIE['user_id'];
}
?>

<div class = "content" >
<div align="center">
<div class="bottom"><br><br><hr><a href="index.php"> HOME</a> |

<?php
if (isset($_COOKIE['user_id'])){
	echo " <a href=\"accountOverview.php\">ACCOUNT OVERVIEW </a>";
}
else{
	echo " <a href=\"register.php\">REGISTER </a> ";
}
?>
| <a href="aboutUs.php">ABOUT </a>| <a href="contactUs.php"> CONTACT US</a> 
</div>
</div>

<br />
<div align="center">
<span style="font-family:geneva,arial;color:#000;font-size:14px;font-weight:bold;">CPSC 350 - Amy, Erin, Kelsie & Rebecca</span></div>
</div>