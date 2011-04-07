<?php
   include('header_side.php');
   include('db_connect.php');

?>

<html>

<body>

<div class="content">
<h1>Submit Suggestions: </h1>

<h2>We'd love to know what you think!</h2><br/>

<big>Do you have a suggestion for a name for the site?  
A country, city, or attraction that you think should be added to our collection?  A comment just for the sake of commenting? <br/><br/>

Just let us know!

<br/><br/>
<form action="commentSubmitted.php" method="post" class="form">
<center>
<table>

<tr><th><big>Name:</th><td><input type="text" id="name" name="name" size =75 /></td></tr>
<tr><th><big>Subject:</th><td><input type="text" id="subject" name="subject" size =75px /></td></tr>
<tr><th><big>Comment:</th><td><textarea name="comment" id="comment" rows = "4" ></textarea></td></tr>

<tr><td colspan = 2><center><input type="submit" class="formbutton" value="Submit" /></center></td></tr>

</table>
</center>
</form>

<br/><br/>Want to see what other people have said?  View the comments we've received <a href = "comments.php">here</a>.

</big>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
</div>


<?php
   include('footer.php');
?>


</body>
</html>
