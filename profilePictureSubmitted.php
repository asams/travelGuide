<?php
header('Location: viewProfilePicture.php');

include('header_side.php');
include('db_connect.php');

// Where the file is going to be placed
$target_path = "profilePictures/";

//Add the original filename to target path
//Result is "uploads/filename.extension"
$target_path = $target_path . basename($_FILES['photo']['name']);


$userID = $_COOKIE['user_id'];

//if (($userID != "") AND ($subject != "") AND ($photo != "")){

if((!empty($userID)) AND (!empty($_FILES['photo']['name']))){
$query = "UPDATE profilePictures SET photo = '$target_path' WHERE user_id = '$userID'";

$result = mysqli_query($db, $query) or die ("Error Querying Database");
mysqli_close($db);
}
//}
?>


<html>
<body>

<div class="content">
<?php
if(move_uploaded_file($_FILES['photo']['tmp_name'], $target_path)) {
echo "The file ". basename( $_FILES['photo']['name']).
" has been uploaded";


} else{
echo "There was an error uploading the file, please try again!";
echo "Please revisit" ?> <a href="setProfilePicture.php">this page</a>. <br>
<?php
//echo "Want to see what other people have uploaded? View all the photos we've received" ?><a href = "viewProfilePicture.php">here</a>.
<?php
}
?>

<br/><br/><br/><br/><br/></center>
</h2>

</div>

<?php
   include('footer.php');
?>

