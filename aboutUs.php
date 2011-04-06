<?php
   include('header_side.php');
   include('db_connect.php');
   
?>

<html>
<body>


<div class="content" style="margin: 5% 10% 5% 20%">
<h1>About Us:</h1>
<!--About the website-->
<p>We are currently accepting submissions for our name, until then, we are TravelGuide.</p>
<p>This is a project hosted by Amy, Kelsie, Erin, and myself(Rebecca) for our CPSC 350:Databases course at the University of Mary Washington.</p>
<p>Some of us are traveled; some of us are not, but we are working to implement this site as a user-friendly way to access information and pictures
of popular tourist destinations around the world.</p>
<p>This site is currently under construction, but as things are implemented feel free to create an account and browse what we've got thus far
concerning countries, cities, and attractions.  With an account, you will eventually be able to upload pictures, comment on attractions and pictures,
and save a location as a favorite.  Don't see a country, city, or attraction you want to see here?  As a registered user you will be able to request
it to be added to our database, and then I'm sure granted no unforeseen circumstances one of us would be happy to oblige you!</p>
<p>Most of our data was collected through common knowledge, wikipedia.org, and miscellaneous travel sites.  Thank you to all of our unknown contributors.</p>
</br></br>

<!--About the team-->
<h1>The Team:</h1>
<table cellpadding = 15>
<tr><td width = "30%"><img src="AboutUsImages/amy.jpg" width = "100%" /></td><td><h2>Amy</h2><p>Amy is currently a senior at Mary Wash.
	She is double majoring in Business Administration and Computer Science  (Computer Information Systems).  She doesn't know
	what is in store for her future, but hopes that whatever job she gets is one that she loves (but more importantly...hopes
	that she actually gets one).  She's never traveled outside of VA, unless W. VA counts....which it really doesn't.  On a side
	note, she absolutely hates Kelsey (yes, it's spelled wrong but she doesn't care)...this project was torture for her*!</p></td></tr>
<tr><td width = "30%"><img src="AboutUsImages/erin.jpg" width = "100%" /></td><td><h2>Erin</h2><p>Erin Wuepper is a Computer Science major set to graduate in the fall. Her father is in the military, so Erin
	has had a lot of experience with travel. She lived in Germany for three years when she was in middle school and she went to high
	school in Naples, Italy. She doesn't speak any foreign languages however, because she is a lazy bum. She would like to move to
	somewhere tropical for once, but right now she is just trying to get through university.</p></td></tr>
<tr><td width = "30%"><img src="AboutUsImages/kelsie.jpg" width = "100%" /></td><td><h2>Kelsie</h2><p>Kelsie is currently a senior at the
	University of Mary Washington, double majoring in Math and German, and minoring in Computer Science.  Kelsie loves to travel,
	and spent a semester studying in Munich, Germany.  She was able to finish her German major while there, but more importantly,
	she traveled as much as possible and enjoyed every minute of it.  After graduation, Kelsie is hoping to get a job in the Math
	or Computer Science fields, but hopes to travel as much as possible and visit Germany again as soon as possible.  (The real
	reason Kelsie wants to leave is to get as far away from this Amy person as possible...but that's another story...*)</p></td></tr>
<tr><td width = "30%"><img src="AboutUsImages/rebecca.jpg" width = "100%" /></td><td><h2>Rebecca</h2><p>Ello.  I am a double major in Computer
	Science and English with a concentration in creative writing.  My dream job would be to work for Pixar doing computer animation.
	So, I love having trees around and that's what I marvel at when I travel.  For instance, my family went to Newport, Rhode Island
	once a few summers ago to tour the mansions, which were gorgeous, but the best part for me was seeing all the trees, like the
	Weeping European Beech.  They were amazing.  As a side note, or rather end note, I would advise you to disregard any previous
	statements of hatred towards team members.</p></td></tr>
</table>

<!--echo "</td><td><img src = \"" . $map . "\" alt = \"map\" width = \"100%\" align = \"right\"/></td></tr></table>";
echo "<img src="aboutUsImages\amy.png">";
//<tr><td colspan = 2><table cellpadding = 5 width = \"100%\"></td></tr>
	//echo "<tr><td>Capital City: </td><td>" . $capital . "</td></tr>";
	//echo "<tr><td>Cities Featured on TravelGuide: </td><td>" . $featuredCityLinks . "</td></tr>"; -->
</div>

<?php
   include('footer.php');
?>


</body>
</html>
