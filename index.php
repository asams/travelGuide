<?php
   include('db_connect.php');
?>

<?php
   include('header_side.php');
?>

<html>
<body>

<div class="content">
<h1>Welcome to Travel_Guide_Site.</h1>
<p>
<big>F</big>eatured <big>C</big>ity of the day: </p> 

<?php

$int = 0;
$query = "SELECT name FROM cities ORDER BY RAND() LIMIT 1";
$result = mysqli_query($db, $query)or die("Error Querying Database");
$row = mysqli_fetch_array($result);
$featured = $row['name'];
echo $featured;

?>
<hr/>

</div>

<?php
   include('footer.php');
?>

</body>
</html>
