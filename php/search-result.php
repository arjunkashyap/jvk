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
		<h1 class="archive_heading">शोध परिणाम</h1>
		<ul class="archive_list">

<?php

include("connect.php");

$db = mysql_connect("localhost",$user,$password) or die("Not connected to database");
$rs = mysql_select_db($database,$db) or die("No Database");

$author=$_POST['author'];
$title=$_POST['title'];
$year1=$_POST['year1'];
$year2=$_POST['year2'];
$text=$_POST['text'];

$author = preg_replace("/[\t]+/", " ", $author);
$author = preg_replace("/[ ]+/", " ", $author);
$author = preg_replace("/^ /", "", $author);

$title = preg_replace("/[\t]+/", " ", $title);
$title = preg_replace("/[ ]+/", " ", $title);
$title = preg_replace("/^ /", "", $title);

$text2 = $text;
if($title=='')
{
	$title='[a-z]*';
}
if($author=='')
{
	$author='[a-z]*';
}
if($year1=='')
{
	$year1='1957';
}
if($year2=='')
{
	$year2=date('Y');
}

if($year2 < $year1)
{
	$tmp = $year1;
	$year1 = $year2;
	$year2 = $tmp;
}

if($text=='')
{
	$query="SELECT * FROM
				(SELECT * FROM
					(SELECT * FROM article WHERE authorname REGEXP '$author') AS tb1
				WHERE title REGEXP '$title') AS tb2
			WHERE year between $year1 and $year2 ORDER BY volume, issue, page";

}
elseif($text!='')
{
	$text = rtrim($text);
/*
	$tx1 = preg_split('/ /',$text);
	$text1 = '';
	$i1 = 1;

	$text3 = $tx1[0];
*/

/*
	foreach($tx1 as $val1)
	{
		if ($bl == "and")
		{
			$val1 = "+".$val1;
		}
		if($i1 > 1)
		{
			$text1 = $text1." ". $val1;
		}
		else
		{
			$text1 = $text1."". $val1;
		}
		$i1++;
	}
*/
/*
	$text=$text1;
*/

/*
	$query="SELECT * FROM
				(SELECT * FROM
					(SELECT * FROM
						(SELECT * FROM searchtable WHERE MATCH (text) AGAINST ('$text' IN BOOLEAN MODE))
					AS tb1 WHERE authorname REGEXP '$author')
				AS tb2 WHERE title REGEXP '$title')
			AS tb4 WHERE year between $year1 and $year2 ORDER BY volume, issue, cur_page";
*/
			
	$query="SELECT * FROM
				(SELECT * FROM
					(SELECT * FROM
						(SELECT * FROM searchtable WHERE text regexp '$text')
					AS tb1 WHERE authorname REGEXP '$author')
				AS tb2 WHERE title REGEXP '$title')
			AS tb3 WHERE year between $year1 and $year2 ORDER BY volume, issue, cur_page";
}

$result = mysql_query($query);

$num_results = mysql_num_rows($result);

if ($num_results > 0)
{
	echo "<li class=\"num_results\"><span class=\"authorspan\">".engtohin_issue($num_results)." परिणाम</span></li>";
}
$titleid[0]=0;
$count = 1;
$id = 0;
if($num_results > 0)
{
	for($i=1;$i<=$num_results;$i++)
	{
		$row1 = mysql_fetch_assoc($result);

		$title = $row1['title'];
		$authorname = $row1['authorname'];
		$authid = $row1['authid'];
		$volume = $row1['volume'];
		$issue = $row1['issue'];
		$year = $row1['year'];
		$month = $row1['month'];
		$titleid = $row1['titleid'];
		$page = $row1['page'];

		if($text != '')
		{
			$cur_page = $row1['cur_page'];
		}
		
		$title = preg_replace("/\&/", "&amp;", $title);
		
		$title1=addslashes($title);
	
		if ((strcmp($id, $titleid)) != 0)
		{
			if($id == "0")
			{
				echo "\n\n\n<li>";
			}
			else
			{
				echo "\n\n\n\n\n</li>\n<li>";
			}
			
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
					echo "<span class=\"space_left\">$oaut</span>";
				}
			
			}

			if($text != '')
			{
				echo "<br /><span class=\"titlespan\">उपस्थित पृष्ठ : </span>";
				echo "<span class=\"authorspan\"><a href=\"../Volumes/$volume/$issue/index.djvu?djvuopts&amp;page=$cur_page.djvu&amp;zoom=page&find=$text\" target=\"_blank\">".engtohin_issue(intval($cur_page))."</a> </span>";
			}
			$id = $titleid;
		}
		else
		{
			if($text != '')
			{
				echo "<span class=\"authorspan\"><a href=\"../Volumes/$volume/$issue/index.djvu?djvuopts&amp;page=$cur_page.djvu&amp;zoom=page&find=$text\" target=\"_blank\">".engtohin_issue(intval($cur_page))."</a> </span>";
			}
			$id = $titleid;
		}
	}
}
else
{
	echo"<li><span class=\"titlespan\">परिणाम नाही</span><br />";
	echo"<span class=\"authorspan\"><a href=\"search.php\">पुन्हा प्रयत्न करा</a></span></li>";
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
