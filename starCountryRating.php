<?php
session_start();

$country_id = $_GET['country_id'];
if (!isset($country_id) || !is_numeric($country_id)) {
	echo("Invalid ID");
	exit;
}
   
   $ser=$_SERVER['HTTP_HOST'];
   $ref=$_SERVER['HTTP_REFERER'];
   $host= parse_url($ref);
    $rateval = $_POST['rating'];
   $url = $ref;
   $ipadd = $_SERVER['REMOTE_ADDR']; 
   $dat = date('y-m-d');

  $link = mysql_connect('localhost', 'traveluser', 'travel') or die(mysql_error());
  if($link)
  {
	$dbcon = mysql_select_db('traveldb');
  }

   $res  = mysql_query("select country_id from countryRatings where user_id='".$_SESSION['user_id']."' && country_id='$country_id'");
   $dd = mysql_fetch_array($res,MYSQL_BOTH);
   $val = $dd[0];

   //echo "<table align=center width=60% cellspacing=0 cellpadding=0 style=\"padding: 50px; background-color:#eefffe; border: 1px solid #90aaaa;\"><tr><td>";

   if(!$val && $ser == $host[host])
    {
//	echo"You rating has been accepted and added into the database.<br>Thanks for participating.";
	$result = mysql_query("insert into countryRatings (user_id, country_id, rating) values ('".$_SESSION['user_id']."', '$country_id', '$rateval')",$link);
    }
   else
    {
//	echo "Your Rating for this page is already present in the database. Thanks for your effort.";
    }
   
//   echo "</td></tr></table>";

    header('Location: country.php?id=' . $country_id );

?>
