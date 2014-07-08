<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jivan Vikas</title>
<link href="style/reset.css" media="screen" rel="stylesheet" type="text/css" />
<link href="style/indexstyle.css" media="screen" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/devanagari_kbd.js" charset="UTF-8"></script>
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
			<li><a class="active" href="search.php">शोध</a></li>
		</ul>
	</div>
	<div class="textbody">
		<h1 class="archive_heading">सन, वर्ष</h1>
<?php include("keyboard.php"); ?>
		<div class="archive_search">
			<form method="post" action="search-result.php">
			<table>
				<tr>
					<td class="left"><span class="titlespan">लेखक</span></td>
					<td class="right"><input name="author" type="text" class="titlespan wide_input" id="textfield1" onfocus="SetId('textfield1')"/></td>
				</tr>
				<tr>
					<td class="left"><span class="titlespan">लेख</span></td>
					<td class="right"><input name="title" type="text" class="titlespan wide_input" id="textfield2" onfocus="SetId('textfield2')"/></td>
				</tr>
				<tr>
					<td class="left"><span class="titlespan">शब्द</span></td>
					<td class="right"><input name="text" type="text" class="titlespan wide_input" id="textfield3" onfocus="SetId('textfield3')"/></td>
				</tr>   
				<tr>
					<td class="left"><span class="titlespan">वर्ष</span></td>
					<td class="right"><select name="year1" class="titlespan">
							<option value="">&nbsp;</option>
<?php

include("connect.php");

$db = mysql_connect("localhost",$user,$password) or die("Not connected to database");
$rs = mysql_select_db($database,$db) or die("No Database");
mysql_query("set names utf8");

$query = "select distinct year from article order by year";
$result = mysql_query($query);

$num_rows = mysql_num_rows($result);

if($num_rows)
{
for($i=1;$i<=$num_rows;$i++)
{
	$row=mysql_fetch_assoc($result);

	$year=$row['year'];
	echo "<option value=\"$year\">".engtohin_issue($year)."</option>";
}
}

?>
						</select>
						<span class="titlespan" >&nbsp;ला&nbsp;</span>
						<select name="year2" class="titlespan">
							<option value="">&nbsp;</option>

<?php
$result = mysql_query($query);

$num_rows = mysql_num_rows($result);

if($num_rows)
{
for($i=1;$i<=$num_rows;$i++)
{
	$row=mysql_fetch_assoc($result);

	$year=$row['year'];
	echo "<option value=\"$year\">".engtohin_issue($year)."</option>";
}
}

?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="left">&nbsp;</td>
					<td class="right">
						<input name="button1" type="submit" class="titlespan" id="button" value="शोध"/>
						<input name="button2" type="reset" class="titlespan" id="button_reset" value="रीसेट"/>
					</td>
				</tr>
			</table>
			</form>
		</div>
	</div>
</div>
<div class="footer">
	॥श्री रामकृष्णार्पणमस्तु॥
</div>
<script type="text/javascript" src="js/sticky.js"></script>
</body>
</html>
