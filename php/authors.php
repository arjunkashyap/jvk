<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jivan Vikas</title>
<link href="style/reset.css" media="screen" rel="stylesheet" type="text/css" />
<link href="style/indexstyle.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
</head>

<body>
<div class="page">
	<div id="headnav">
		<ul>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="help.php">Help</a></li>
			<li><a href="siteindex.php">Site Index</a></li>
		</ul>
	</div>
	<div class="header_top">
		<div class="logo"><img src="images/logo.png" alt="Sri Ramakrishna Math, Nagpur Logo" /></div>
		<div class="title_right"><span>Ramakrishna Math</span><br /><span class="subtitle_right">Nagpur</span></div>		
		<div class="title_left"><span>जीवन विकास</span><br /><span class="subtitle_left">आत्मनो मोक्षार्थं जगद्धिताय च</span></div>
	</div>
	<div class="navbar">
		<nav>
			<ul class="menu">
				<li><a href="../index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="editors.php">Editors</a></li>
				<li><a href="gallery.php">Gallery</a></li>
				<li><a class="active" href="volumes.php">Archive</a></li>
			</ul>
			<div class="clearfix"></div>
		</nav>
	</div>
	<div class="clearfix"></div>
	<div class="archive_menu sticky">
		<ul id="archive_nav">
			<li><a href="volumes.php">वर्ष, अंक</a></li>
			<li><a href="articles.php">लेख सूची</a></li>
			<li><a class="active" href="authors.php">लेखक सूची</a></li>
			<li><a href="search.php">शोध</a></li>
		</ul>
	</div>
	<div class="textbody">
		<h1 class="archive_heading">लेखक सूची</h1>
		<div class="alphabet">
			<span class="letter"><a href="authors.php?letter=अ">अ</a></span>
			<span class="letter"><a href="authors.php?letter=आ">आ</a></span>
			<span class="letter"><a href="authors.php?letter=इ">इ</a></span>
			<span class="letter"><a href="authors.php?letter=ई">ई</a></span>
			<span class="letter"><a href="authors.php?letter=उ">उ</a></span>
			<span class="letter"><a href="authors.php?letter=ऋ">ऋ</a></span>
			<span class="letter"><a href="authors.php?letter=ए">ए</a></span>
			<span class="letter"><a href="authors.php?letter=ओ">ओ</a></span>
			<span class="letter"><a href="authors.php?letter=क">क</a></span>
			<span class="letter"><a href="authors.php?letter=ख">ख</a></span>
			<span class="letter"><a href="authors.php?letter=ग">ग</a></span>
			<span class="letter"><a href="authors.php?letter=घ">घ</a></span>
			<span class="letter"><a href="authors.php?letter=च">च</a></span>
			<span class="letter"><a href="authors.php?letter=छ">छ</a></span>
			<span class="letter"><a href="authors.php?letter=ज">ज</a></span>
			<span class="letter"><a href="authors.php?letter=ज्ञ">ज्ञ</a></span>
			<span class="letter"><a href="authors.php?letter=झ">झ</a></span>
			<span class="letter"><a href="authors.php?letter=ट">ट</a></span>
			<span class="letter"><a href="authors.php?letter=ठ">ठ</a></span>
			<span class="letter"><a href="authors.php?letter=ड">ड</a></span>
			<span class="letter"><a href="authors.php?letter=ढ">ढ</a></span><br />
			<span class="letter"><a href="authors.php?letter=त">त</a></span>
			<span class="letter"><a href="authors.php?letter=थ">थ</a></span>
			<span class="letter"><a href="authors.php?letter=द">द</a></span>
			<span class="letter"><a href="authors.php?letter=ध">ध</a></span>
			<span class="letter"><a href="authors.php?letter=न">न</a></span>
			<span class="letter"><a href="authors.php?letter=प">प</a></span>
			<span class="letter"><a href="authors.php?letter=फ">फ</a></span>
			<span class="letter"><a href="authors.php?letter=ब">ब</a></span>
			<span class="letter"><a href="authors.php?letter=भ">भ</a></span>
			<span class="letter"><a href="authors.php?letter=म">म</a></span>
			<span class="letter"><a href="authors.php?letter=य">य</a></span>
			<span class="letter"><a href="authors.php?letter=र">र</a></span>
			<span class="letter"><a href="authors.php?letter=ल">ल</a></span>
			<span class="letter"><a href="authors.php?letter=व">व</a></span>
			<span class="letter"><a href="authors.php?letter=श">श</a></span>
			<span class="letter"><a href="authors.php?letter=श्री">श्री</a></span>
			<span class="letter"><a href="authors.php?letter=स">स</a></span>
			<span class="letter"><a href="authors.php?letter=ह">ह</a></span>
			<span class="letter"><a href="authors.php?letter=sp">#</a></span>
		</div>
		<ul class="archive_list">
<?php

include("connect.php");

$db = mysql_connect("localhost",$user,$password) or die("Not connected to database");
$rs = mysql_select_db($database,$db) or die("No Database");
mysql_query("set names utf8");

if(isset($_GET['letter']))
{
	$letter=$_GET['letter'];
}
else
{
	$letter = 'अ';
}

if($letter == 'श')
{
	$query_add = " and authorname not like 'श्री%'";
}
elseif($letter == 'ज')
{
	$query_add = " and authorname not like 'ज्ञ%'";
}
else
{
	$query_add = "";
}

if($letter == 'sp')
{
	$query = "select * from author where authorname not regexp '^अ|^आ|^इ|^ई|^उ|^ऊ|^ऋ|^ए|^ऐ|^ओ|^औ|^क|^ख|^ग|^घ|^च|^छ|^ज|^झ|^ट|^ठ|^ड|^ढ|^त|^थ|^द|^ध|^न|^प|^फ|^ब|^भ|^म|^य|^र|^ल|^व|^श|^ष|^स|^ह'  order by authorname";
}
else
{
	$query = "select * from author where authorname like '$letter%'".$query_add." order by authorname";
}

$result = mysql_query($query);

$num_rows = mysql_num_rows($result);

if($num_rows)
{
	for($i=1;$i<=$num_rows;$i++)
	{
		$row=mysql_fetch_assoc($result);

		$authid=$row['authid'];
		$authorname=$row['authorname'];
		
		$authorname_link = $authorname;
		$authorname_link = preg_replace("/ /", "%20", $authorname_link);

		echo "<li><span class=\"authorspan\"><a href=\"auth.php?authid=$authid&amp;author=$authorname_link\">$authorname</a></span></li>\n";
	}
}

?>
				</ul>
	</div>
</div>
<div class="footer">
	॥श्री रामकृष्णार्पणमस्तु॥
</div>
<script type="text/javascript" src="js/sticky.js"></script>
</body>
</html>
