<?php
setcookie('user_id', '', time()-60*60*24);
session_start();
session_destroy();
header("Location: index.php");
?>