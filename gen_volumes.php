<?php

require_once("html/connect.php");
$db = mysql_connect("localhost",$user,$password) or die("Not connected to database");
$rs = mysql_select_db($database,$db) or die("No Database");
mysql_query("set names utf8");

$filename = "html/volumes.html";

$str = '';
$str .= "<!DOCTYPE html>
<html xmlns=\"http://www.w3.org/1999/xhtml\">

<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<title>Jivan Vikas</title>
<link href=\"style/reset.css\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"style/indexstyle.css\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
<link rel=\"shortcut icon\" type=\"image/ico\" href=\"images/favicon.ico\" />

<script type=\"text/javascript\" src=\"js/jquery-1.9.1.js\"></script>
<script type=\"text/javascript\" src=\"js/jquery-ui.js\"></script>
</head>

<body>
<div class=\"page\">
	<div id=\"headnav\">
		<ul>
			<li><a href=\"contact.html\">Contact</a></li>
			<li><a href=\"help.html\">Help</a></li>
			<li><a href=\"siteindex.html\">Site Index</a></li>
		</ul>
	</div>
	<div class=\"header_top\">
		<div class=\"logo\"><img src=\"images/logo.png\" alt=\"Sri Ramakrishna Math, Nagpur Logo\" /></div>
		<div class=\"title_right\"><span>Ramakrishna Math</span><br /><span class=\"subtitle_right\">Nagpur</span></div>		
		<div class=\"title_left\"><span>जीवन विकास</span><br /><span class=\"subtitle_left\">आत्मनो मोक्षार्थं जगद्धिताय च</span></div>
	</div>
	<div class=\"navbar\">
		<nav>
			<ul class=\"menu\">
				<li><a href=\"../index.html\">Home</a></li>
				<li><a href=\"about.html\">About</a></li>
				<li><a href=\"editors.html\">Editors</a></li>
				<li><a href=\"gallery.html\">Gallery</a></li>
				<li><a class=\"active\" href=\"volumes.html\">Archive</a></li>
			</ul>
			<div class=\"clearfix\"></div>
		</nav>
	</div>
	<div class=\"clearfix\"></div>
	<div class=\"archive_menu sticky\">
		<ul id=\"archive_nav\">
			<li><a class=\"active\" href=\"volumes.html\">वर्ष, अंक</a></li>
			<li><a href=\"articles_01.html\">लेख सूची</a></li>
			<li><a href=\"authors_01.html\">लेखक सूची</a></li>
			<li><a href=\"search.php\">शोध</a></li>
		</ul>
	</div>
	<div class=\"textbody\">
		<h1 class=\"archive_heading\">सन, वर्ष</h1>
		<div class=\"archive_volume\">
			<div class=\"col1\"><ul>";

$row_count = 15;

$query = "select distinct volume from article order by volume";
$result = mysql_query($query);

$num_rows = mysql_num_rows($result);

$count = 0;
$col = 1;

if($num_rows)
{
	for($i=1;$i<=$num_rows;$i++)
	{
		$row=mysql_fetch_assoc($result);
		$volume=$row['volume'];

		$query1 = "select distinct year from article where volume='$volume'";
		$result1 = mysql_query($query1);
		$num_rows1 = mysql_num_rows($result1);
		if($num_rows1)
		{
			for($i1=1;$i1<=$num_rows1;$i1++)
			{
				$row1=mysql_fetch_assoc($result1);

				if($i1==1)
				{
					$year=$row1['year'];
				}
				else if($i1==2)
				{
					$year2 = $row1['year'];
					$year21 = preg_split('//',$year2);
					$year=$year."-".$year21[3].$year21[4];
				}
			}
			$count++;
			if($count > $row_count)
			{
				$col++;
				$str .= "</ul></div>\n
				<div class=\"col$col\"><ul>";
				$count = 1;
			}
			$str .= "<li class=\"gap_above_below\"><span class=\"issuespan\"><a href=\"volume_$volume.html\">".engtohin_issue($year)." <span class=\"authorspan\">(वर्ष ".engtohin_issue(intval($volume)).")</span></a></span></li>";
		}
	}
}

$str .= "</ul>
			</div>
		</div>
	</div>
</div>
<div class=\"footer\">
	॥श्री रामकृष्णार्पणमस्तु॥
</div>
<script type=\"text/javascript\" src=\"js/sticky.js\"></script>
</body>
</html>";

file_put_contents($filename, $str);
?>
