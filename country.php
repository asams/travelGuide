<?php
   include('db_connect.php');
?>

<?php
   include('header_side.php');
?>

<html>
<body>

<div class="content">
<?php
  	$countryID = $_GET['id'];
	
	//$query = "SELECT * FROM countries WHERE country_id = $countryID";
	$query = "SELECT co.*, ci.city_name, ci.city_id FROM countries co NATURAL JOIN cities ci WHERE co.country_id = $countryID ORDER BY ci.city_name";

	$result = mysqli_query($db, $query) or die ("Error Querying Database - 1");
	$featuredCityLinks = "<ul>";
	
	while($row = mysqli_fetch_array($result)){
		$countryName = $row['country_name'];
		$countryID = $row['country_id'];
		$capital = $row['country_capital'];
		$government = $row['country_government'];
		$currency = $row['country_currency'];
		$population = $row['country_population'];
		$area = $row['country_area'];
		$language = $row['country_official_language'];
		$religion = $row['country_religion'];
		$map = $row['country_map'];
		$flag = $row['country_flag'];
		$coat_of_arms = $row['country_coat_of_arms'];
		$website = $row['country_website'];
		
		$cityName = $row['city_name'];
		$cityID = $row['city_id'];
		
		$featuredCityLinks = $featuredCityLinks . "<li><a href = \"city.php?id=" . $cityID . "\">" . $cityName . "</a></li>";
	}
	
	$featuredCityLinks = $featuredCityLinks . "</ul>";
	
	//$query = "SELECT city_name, city_id FROM cities WHERE country_id = $countryID ORDER BY city_name";
	//$query = "SELECT city_name, city_id FROM countries NATURAL JOIN cities ORDER BY city_name WHERE ";
	
	$query = "SELECT cc.*, co.country_name, u.first_name, u.last_name FROM countries co NATURAL JOIN country_comments cc NATURAL JOIN users u WHERE co.country_id = $countryID ORDER BY cc.comment_date_submitted DESC";
	
	$result = mysqli_query($db, $query) or die ("Error Querying Database - 2");

	$comments_table = "<table rules = rows>";
	while($row = mysqli_fetch_array($result)){
		$countryName = $row['country_name'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$comment_subject = $row['comment_subject'];
		$comment_body = $row['comment_body'];
		$comment_date = $row['comment_date_submitted'];
		
		$comments_table = $comments_table . "<tr><td><br/>Name: " . $first_name . " " . $last_name . "<br/><br/>Subject: " . $comment_subject . "<br/><br/>Comment: " . $comment_body . "<br/><br/>Date: " . $comment_date . "<br/><br/></td></tr>";
	}
	$comments_table = $comments_table . "</table>";
	

	echo "<h1>" . $countryName . "</h1>";

	echo "<img src = \"" . $flag . "\" alt = \"flag\" width = \"50%\" align = \"right\"/>";

	echo "<p><H2>Info: </H2></p>";
	echo "Capital City: " . $capital . "<br/><br/>";
	echo "Cities Featured on TravelGuide: " . $featuredCityLinks . "<br/>";
	echo "Form of Government: " . $government . "<br/><br/>";
	echo "Currency: " . $currency . "<br/><br/>";
	echo "Population: " . $population . " people <br/><br/>";
	echo "Area: " . $area . " km<sup>2</sup>" . "<br/><br/>";
	echo "Official or National Language(s): " . $language . "<br/><br/>";
	echo "Official or Majority Religion(s): " . $religion . "<br/><br/>";
	echo "Website: " . ($website != 'N/A' ? "<a href = \" $website \"> $website </a>" : $website) . "<br/><br/><br/><br/><br/><br/>";
	
	echo "Map:<br/>";
	echo "<img src = \"" . $map . "\" alt = \"map\" width = \"60%\" align = \"center\" /><br/><br/>";
	echo "<H2>Comments from users:</H2>";
	echo $comments_table;
//	echo "<img src = \"" . $coat_of_arms . "\" alt = \"coat of arms\" width = \"20%\" align = \"center\" /><br/><br/>";
	

?>

<H2>Share your thoughts about <?php echo $countryName ?>:</H2>
<form action="countryCommentSubmitted.php" method="post" class="form">
<center>
<table>

<tr><th>Name (user_id):</th><td><input type="text" id="user_id" name="user_id" size = 75 /></td></tr>
<tr><th>Subject:</th><td><input type="text" id="subject" name="subject" size = 75 /></td></tr>
<tr><th>Comment:</th><td><textarea name="comment" id="comment" rows = "4" cols = "60"></textarea>
<input type="hidden" name="country_id" value=<?php echo $countryID ?>></td></tr>

<tr><td colspan = 2><center><input type="submit" class="formbutton" value="Submit" /></center></td></tr>

</table>

</div>

<?php
   include('footer.php');
?>

</body>
</html>
