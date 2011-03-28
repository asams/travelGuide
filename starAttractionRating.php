<?php
session_start();

$attraction_id = $_GET['attraction_id'];
if (!isset($attraction_id) || !is_numeric($attraction_id)) {
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

   $res  = mysql_query("select attraction_id from attractionRatings where user_id='".$_SESSION['user_id']."' && attraction_id='$attraction_id'");
   $dd = mysql_fetch_array($res,MYSQL_BOTH);
   $val = $dd[0];

   //echo "<table align=center width=60% cellspacing=0 cellpadding=0 style=\"padding: 50px; background-color:#eefffe; border: 1px solid #90aaaa;\"><tr><td>";

   if(!$val && $ser == $host[host])
    {
//	echo"You rating has been accepted and added into the database.<br>Thanks for participating.";
	$result = mysql_query("insert into attractionRatings (user_id, attraction_id, rating) values ('".$_SESSION['user_id']."', '$attraction_id', '$rateval')",$link);
    }
   else
    {
//	echo "Your Rating for this page is already present in the database. Thanks for your effort.";
    }
   
//   echo "</td></tr></table>";

    header('Location: attraction.php?id=' . $attraction_id );

?>
