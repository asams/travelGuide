<?php
   include('header_side.php');
   include('db_connect.php');
?>


<html>
<body>


<div class="content">
<H2>Set your profile picture: </H2>
<center>
<table>
<form enctype="multipart/form-data" action="profilePictureSubmitted.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
<tr><th>Choose a file to upload: </th><td><input name="photo" type="file" /><br/></td></tr>
<tr><th align=center colspan = 2><input type="submit" value="Upload File" /></tr>
</form> 
</table>

<?php
   include('footer.php');
?>

</body>
</html>