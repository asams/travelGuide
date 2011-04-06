<!-- Welcome to the scripts database of HIOX INDIA      -->
<!-- This tool is developed and a copyright             -->
<!-- product of HIOX INDIA.			        -->
<!-- For more information visit http://www.hscripts.com -->

<br>
<script type="text/javascript">
	var name = new Array();
	name[0]= "star2.gif";
	if(document.images)
	{
		var ss = new Image();
		ss.src = name[0];		
	}			
</script>
<?php

$country_id = $_SESSION['country_id'];
if (!isset($country_id) || !is_numeric($country_id)) {
	echo("Invalid ID");
	exit;
}

  $start = $_GET['begin'];
  if($start == "")
	$start = 0;
  $url = $_SERVER['SCRIPT_NAME'];
  $host = $_SERVER['SERVER_NAME'];
  $ser = "http://$host";	
  $url1 = $_SERVER['argv'];
  $sss = count($url1);
  $serpath = $ser.$url;

if($sss >= 1)
  {
     $argas = $url1[0];
     $url="$url?$argas";
  }
  $url= $ser.$url;

  $link = mysql_connect('localhost', 'traveluser', 'travel') or die(mysql_error());
  if($link)
  {
	$dbcon = mysql_select_db('traveldb');
  }

//averaging rating 

  $qur1 = "select count(*) as dd, avg(rating) as xx from countryRatings where country_id='$country_id' group by country_id";
  $result1 = mysql_query($qur1,$link) or die(mysql_error());
  if($line = @mysql_fetch_array($result1, MYSQL_ASSOC))
  {
	$count = $line['dd'];
	$rating = $line['xx'];
  }

?>

<table cellpadding=0 cellspacing=0 border=0 style="font-size: 13px;">
   <tr align=left>
      <td>
        <form name=rate method=post action="starCountryRating.php?country_id=<?php echo($country_id); ?>">
             <b>This country is currently rated as: </b>
             <?php for($i=1;$i<=5;$i++)
                     {
                   	if($rating>=1)
                	{
		           echo "<img style=\"border:0px\" src=\"star2.gif\">";
                           $rating=$rating-1;
	                }
	                else if($rating>=0.5)
	                {
 		           echo "<img style=\"border:0px\" src=\"star3.gif\">";
		           $rating=$rating-1;
	                }
 	                else if ($rating<0.5 && $rating>0)
	                {
		           echo "<img style=\"border:0px\" src=\"star1.gif\">";
		           $rating=$rating-1;
	                }
	                else if($rating<=0)
	                {
		           echo "<img style=\"border:0px\" src=\"star1.gif\">";
	                }
                    }	
           ?>
     </td>
   </tr>
     <style>
       .star{cursor:pointer; }

     </style>
     <Script language=javascript>
      function selstar(val)
      {
	for(var x=1;x<=val;x++)
	{
		document['i'+x].src="star2.gif";
	}
	
      }
      function remstar(val)
      {
	for(var x=1;x<=val;x++)
	{
		document['i'+x].src="star1.gif";
	}
      }

      function setrate(val)
      {
	document.rate.rating.value=val;
	document.rate.submit();
      }
     </script>

   <tr>
      <td align=left>
<?php

$checkexist = mysql_result(mysql_query("Select count(*) from countryRatings where user_id='".$_SESSION['user_id']."' && country_id='$country_id'"), 0);

if ($checkexist == 0) {

            echo("<b>Rate this country:</b> 
            <img name=i1 class=star onmouseover=\"selstar(1)\" onmouseout=\"remstar(1)\" onclick=\"setrate(1)\" style=\"border:0px\" src=\"star1.gif\">
            <img name=i2 class=star onmouseover=\"selstar(2)\" onmouseout=\"remstar(2)\" onclick=\"setrate(2)\" style=\"border:0px\" src=\"star1.gif\">
            <img name=i3 class=star onmouseover=\"selstar(3)\" onmouseout=\"remstar(3)\" onclick=\"setrate(3)\" style=\"border:0px\" src=\"star1.gif\">
            <img name=i4 class=star onmouseover=\"selstar(4)\" onmouseout=\"remstar(4)\" onclick=\"setrate(4)\" style=\"border:0px\" src=\"star1.gif\">
            <img name=i5 class=star onmouseover=\"selstar(5)\" onmouseout=\"remstar(5)\" onclick=\"setrate(5)\" style=\"border:0px\" src=\"star1.gif\">
            <input type=hidden name=\"rating\">");

} else {
            echo("<b>You already rated this country.</b>");
}

?>
            </form>&nbsp;&nbsp;
        <font color='000066' >
	<?php 
	 echo "[&nbsp;$count&nbsp; <span style='font-size: 12px; '>votes</span>]<br><br>";
	?>
	</font>
      </td>
    </tr>

   
</table>
<script type="text/javascript">
document.onload = ctck();

</script>

