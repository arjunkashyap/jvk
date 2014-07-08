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
			<li><a class="active" href="articles.php">लेख सूची</a></li>
			<li><a href="authors.php">लेखक सूची</a></li>
			<li><a href="search.php">शोध</a></li>
		</ul>
	</div>
	<div class="textbody">
		<h1 class="archive_heading">लेख सूची</h1>
		<div class="alphabet">
			<span class="letter"><a href="articles.php?letter=अ">अ</a></span>
			<span class="letter"><a href="articles.php?letter=आ">आ</a></span>
			<span class="letter"><a href="articles.php?letter=इ">इ</a></span>
			<span class="letter"><a href="articles.php?letter=ई">ई</a></span>
			<span class="letter"><a href="articles.php?letter=उ">उ</a></span>
			<span class="letter"><a href="articles.php?letter=ऊ">ऊ</a></span>
			<span class="letter"><a href="articles.php?letter=ऋ">ऋ</a></span>
			<span class="letter"><a href="articles.php?letter=ए">ए</a></span>
			<span class="letter"><a href="articles.php?letter=ऐ">ऐ</a></span>
			<span class="letter"><a href="articles.php?letter=ओ">ओ</a></span>
			<span class="letter"><a href="articles.php?letter=औ">औ</a></span>
			<span class="letter"><a href="articles.php?letter=क">क</a></span>
			<span class="letter"><a href="articles.php?letter=ख">ख</a></span>
			<span class="letter"><a href="articles.php?letter=ग">ग</a></span>
			<span class="letter"><a href="articles.php?letter=घ">घ</a></span>
			<span class="letter"><a href="articles.php?letter=च">च</a></span>
			<span class="letter"><a href="articles.php?letter=छ">छ</a></span>
			<span class="letter"><a href="articles.php?letter=ज">ज</a></span>
			<span class="letter"><a href="articles.php?letter=ज्ञ">ज्ञ</a></span>
			<span class="letter"><a href="articles.php?letter=झ">झ</a></span>
			<span class="letter"><a href="articles.php?letter=ट">ट</a></span>
			<span class="letter"><a href="articles.php?letter=ठ">ठ</a></span>
			<span class="letter"><a href="articles.php?letter=ड">ड</a></span>
			<span class="letter"><a href="articles.php?letter=ढ">ढ</a></span><br />
			<span class="letter"><a href="articles.php?letter=त">त</a></span>
			<span class="letter"><a href="articles.php?letter=थ">थ</a></span>
			<span class="letter"><a href="articles.php?letter=द">द</a></span>
			<span class="letter"><a href="articles.php?letter=ध">ध</a></span>
			<span class="letter"><a href="articles.php?letter=न">न</a></span>
			<span class="letter"><a href="articles.php?letter=प">प</a></span>
			<span class="letter"><a href="articles.php?letter=फ">फ</a></span>
			<span class="letter"><a href="articles.php?letter=ब">ब</a></span>
			<span class="letter"><a href="articles.php?letter=भ">भ</a></span>
			<span class="letter"><a href="articles.php?letter=म">म</a></span>
			<span class="letter"><a href="articles.php?letter=य">य</a></span>
			<span class="letter"><a href="articles.php?letter=र">र</a></span>
			<span class="letter"><a href="articles.php?letter=ल">ल</a></span>
			<span class="letter"><a href="articles.php?letter=व">व</a></span>
			<span class="letter"><a href="articles.php?letter=श">श</a></span>
			<span class="letter"><a href="articles.php?letter=श्री">श्री</a></span>
			<span class="letter"><a href="articles.php?letter=ष">ष</a></span>
			<span class="letter"><a href="articles.php?letter=स">स</a></span>
			<span class="letter"><a href="articles.php?letter=ह">ह</a></span>
			<span class="letter"><a href="articles.php?letter=sp">#</a></span>
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
	$query_add = " and title not like 'श्री%'";
}
elseif($letter == 'ज')
{
	$query_add = " and title not like 'ज्ञ%'";
}
else
{
	$query_add = "";
}

if($letter == 'sp')
{
	$query = "select * from article where title not regexp '^अ|^आ|^इ|^ई|^उ|^ऊ|^ऋ|^ए|^ऐ|^ओ|^औ|^क|^ख|^ग|^घ|^च|^छ|^ज|^झ|^ट|^ठ|^ड|^ढ|^त|^थ|^द|^ध|^न|^प|^फ|^ब|^भ|^म|^य|^र|^ल|^व|^श|^ष|^स|^ह' order by title, volume, issue, page";
}
else
{
	$query = "select * from article where title like '$letter%'".$query_add." order by title, volume, issue, page";
}

$result = mysql_query($query);

$num_rows = mysql_num_rows($result);

if($num_rows)
{
	for($i=1;$i<=$num_rows;$i++)
	{
		$row=mysql_fetch_assoc($result);

		$titleid=$row['titleid'];
		$title=$row['title'];
		$featid=$row['featid'];
		$page=$row['page'];
		$authid=$row['authid'];
		$authorname=$row['authorname'];
		$volume=$row['volume'];
		$issue=$row['issue'];
		$year=$row['year'];
		$month=$row['month'];
		
		$title = preg_replace("/\&/", "&amp;", $title);
		
		$title1=addslashes($title);
		
		echo "<li>";
		echo "<span class=\"titlespan\"><a target=\"_blank\" href=\"../Volumes/$volume/$issue/index.djvu?djvuopts&amp;page=$page.djvu&amp;zoom=page\">$title</a></span>&nbsp;";
		echo "<span class=\"yearspan\"><a href=\"toc.php?vol=$volume&amp;issue=$issue\">(".engtohin_month($month)."&nbsp;".engtohin_issue($year).")</a></span>";
		
		if($authid != 0)
		{
			echo "<br />";
			$aut = preg_split('/;/',$authid);
			$anames = preg_split('/;/',$authorname);
			
			$oaut = '';
			$taut = '';
			
			for($a=0;$a<sizeof($anames);$a++)
			{
				if(preg_match("/1/", $anames[$a]))
				{
					$anames[$a] = preg_replace("/\|1/", "", $anames[$a]);
					$oaut = $oaut . "<span class=\"titlespan\">;&nbsp;</span><span class=\"authorspan\"><a href=\"auth.php?authid=".$aut[$a]."&amp;author=".urlencode($anames[$a])."\">".$anames[$a]."</a></span>";
				}
				elseif(preg_match("/2/", $anames[$a]))
				{
					$anames[$a] = preg_replace("/\|2/", "", $anames[$a]);
					$taut = $taut . "<span class=\"titlespan\">;&nbsp;</span><span class=\"authorspan\"><a href=\"auth.php?authid=".$aut[$a]."&amp;author=".urlencode($anames[$a])."\">".$anames[$a]."</a></span>";
				}
			}
			$oaut = preg_replace("/^\<span class\=\\\"titlespan\\\"\>\;\&nbsp\;\<\/span\>/", "", $oaut);
			$taut = preg_replace("/^\<span class\=\\\"titlespan\\\"\>\;\&nbsp\;\<\/span\>/", "", $taut);
			
			if($taut != '')
			{
				if($oaut != '')
				{
					echo "<span class=\"space_left authorspan\">मूळ लेखक :  </span>$oaut<br />";
				}
				echo "<span class=\"space_left authorspan\">अनुवादक :  </span>$taut";
			}
			else
			{
				echo "<span class=\"space_left\">$oaut</span><br />";
			}
			
		}
		echo "</li>\n";
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
