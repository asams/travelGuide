<?php
   include('db_connect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>~Travel Guide~</title>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<link href="1.css" type="text/css" rel="stylesheet" />


</head>
<body>
<div class="container">
<div id="banner"> 
<div class="logo-1">Travel</div>
<div class="logo-2">Guide</div>


</div>

<div id="left">
<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;font-color:#000;font-size:14px;font-weight:bold;padding-left:1px;"><a href="#">ABOUT US</a></span>
<br />
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold; font-style: italic;
 letter-spacing: 2px;
 padding-left:1px;">Who We Are</span>
</div></div>

<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;color:#153E7E;font-size:14px;font-weight:bold;padding-left:1px;"><a href="#">COUNTRIES</a></span>
<br />
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold;  letter-spacing: 2px;
 padding-left:1px;">Total: 10</span>
</div></div>

<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;color:#153E7E;font-size:14px;font-weight:bold;padding-left:1px;"><a href="#">CITIES</a></span>
<br />
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold;  letter-spacing: 2px;
 padding-left:1px;">Total: 10</span>
</div></div>
<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;color:#153E7E;font-size:14px;font-weight:bold;padding-left:1px;"><a href="#">ATTRACTIONS</a></span>
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold;  letter-spacing: 2px;
 padding-left:1px;">Total: 10</span>
</div></div>

<div class="nav-box">
<div class="s1">
</div>
<div class="s2">
</div>
<div class="nav-box-text">
<span style="font-family:geneva,arial;color:#153E7E;font-size:14px;font-weight:bold;padding-left:1px;"><a href="#">CONTACT US</a></span>
<span style="font-family:geneva,arial;color:#6CA2BE;font-size:10px;font-weight:bold;  letter-spacing: 2px;
 padding-left:1px;">Suggestions?</span>
</div></div>

</div>

<div align="right"><form action="search.php" method="post" class="searchform">
<input type="text" id="searchq" name="searchedFor" />
<input type="submit" class="formbutton" value="Search" />
</form>
</div>


<div class="content">
<?php
  	$countryID = $_GET['id'];
	
	$query = "SELECT * FROM countries WHERE country_id = $countryID";

	$result = mysqli_query($db, $query) or die ("Error Querying Database Here");
	
	while($row = mysqli_fetch_array($result)){
		$countryName = $row['name'];
		$countryID = $row['country_id'];
		$capital = $row['capital'];
		$government = $row['government'];
		$currency = $row['currency'];
		$population = $row['population'];
		$area = $row['area'];
		$language = $row['official_language'];
		$religion = $row['religion'];
		$map = $row['country_map'];
		$flag = $row['flag'];
		$coat_of_arms = $row['coat_of_arms'];
		$website = $row['website'];
	}

?>



<?php
	echo "<h1>" . $countryName . "</h1>";
	echo "<p><H2>Info: </H2></p>";
	echo "Name: " . $countryName . "<br/><br/>";
	echo "Capital City: " . $capital . "<br/><br/>";
	echo "Form of Government: " . $government . "<br/><br/>";
	echo "Currency: " . $currency . "<br/><br/>";
	echo "Population: " . $population . " people <br/><br/>";
	echo "Area: " . $area . " km<sup>2</sup>" . "<br/><br/>";
	echo "Official or National Language(s): " . $language . "<br/><br/>";
	echo "Official or Majority Religion(s): " . $religion . "<br/><br/>";
	echo "Website: <a href = \"" . $website . "\">" . $website . "</a><br/><br/>";

?>



<hr />
<div class="bottom"><a href="#"> HOME</a> | <a href="#">ABOUT </a>| <a href="#">SERVICES</a> | <a href="#">PRODUCTS</a> |<a href="#"> Contact us</a> 
</div>
</div>
</div>
<br />
<div align="center">
<span style="font-family:geneva,arial;color:#000;font-size:14px;font-weight:bold;">CPSC 350 - Amy, Erin, Kelsie & Rebecca</span></div>
</body>
</html>
