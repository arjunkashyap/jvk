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
			<li><a href="authors.php">लेखक सूची</a></li>
			<li><a href="search.php">शोध</a></li>
		</ul>
	</div>
	<div class="textbody">

<?php

include("connect.php");

$db = mysql_connect("localhost",$user,$password) or die("Not connected to database");
$rs = mysql_select_db($database,$db) or die("No Database");
mysql_query("set names utf8");

$volume=$_GET['vol'];
$year=$_GET['year'];

$query_aux = "select distinct year from article where volume='$volume'";
$result_aux = mysql_query($query_aux);
$num_rows_aux = mysql_num_rows($result_aux);

for($i1=1;$i1<=$num_rows_aux;$i1++)
{
	$row_aux=mysql_fetch_assoc($result_aux);

	if($i1==1)
	{
		$year=$row_aux['year'];
	}
	else if($i1==2)
	{
		$year2 = $row_aux['year'];
		$year21 = preg_split('//',$year2);
		$year=$year."-".$year21[3].$year21[4];
	}
}

echo "<h1 class=\"archive_heading\">".engtohin_issue($year)."&nbsp;(वर्ष&nbsp;".engtohin_issue(intval($volume)).")</h1>";
echo "<div class=\"archive_volume\">";
echo "<div class=\"col1\"><ul>";

$row_count = 3;

$query = "select distinct year, month, issue from article where volume='$volume'";
$result = mysql_query($query);

$num_rows = mysql_num_rows($result);

$count = 0;
$col = 1;

if($num_rows)
{
	for($i=1;$i<=$num_rows;$i++)
	{
		$row=mysql_fetch_assoc($result);
		$year=$row['year'];
		$month=$row['month'];
		$issue=$row['issue'];

		$count++;
		if($count > $row_count)
		{
			$col++;
			echo "</ul></div>\n
			<div class=\"col$col\"><ul>";
			$count = 1;
		}
		echo "<li class=\"gap_above_below_large\"><span class=\"issuespan\"><a class=\"ilb\" href=\"toc.php?vol=$volume&amp;issue=$issue\">".engtohin_month($month)."&nbsp;".engtohin_issue($year)."<br /><span class=\"authorspan\">(अंक&nbsp;".engtohin_issue($issue).")</span></a></span></li>";
	}
}

?>				</ul>
			</div>
		</div>
	</div>
</div>
<div class="footer">
	॥श्री रामकृष्णार्पणमस्तु॥
</div>
<script type="text/javascript" src="js/sticky.js"></script>
</body>
</html>
