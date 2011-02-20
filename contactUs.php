<?php
   include('db_connect.php');
?>

<?php
   include('header_side.php');
?>

<html>
<body>

<div class="content">
<h1>Submit Suggestions: </h1>

<h2>We'd love to know what you think!<br/><br/>

Do you have a suggestion for a name for the site?  
A country, city, or attraction that you think should be added to our collection?  A comment just for the sake of commenting? <br/><br/>

Just let us know!

<br/><br/>
<form action="commentSubmitted.php" method="post" class="form">
<center>
<table>

<tr><th>Name:</th><td><input type="text" id="name" name="name" size = 75 /></td></tr>
<tr><th>Subject:</th><td><input type="text" id="subject" name="subject" size = 75 /></td></tr>
<tr><th>Comment:</th><td><textarea name="comment" id="comment" rows = "4" cols = "72"></textarea></td></tr>

<tr><td colspan = 2><center><input type="submit" class="formbutton" value="Submit" /></center></td></tr>

</table>
</center>
</form>

<br/><br/>Want to see what other people have said?  View all the comments we've received <a href = "comments.php">here</a>.

</h2>
<hr>

</div>

<?php
   include('footer.php');
?>


</body>
</html>
