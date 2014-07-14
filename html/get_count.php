<?php

include("connect.php");

$db = mysql_connect("localhost",$user,$password) or die("Not connected to database");
$rs = mysql_select_db($database,$db) or die("No Database");
mysql_query("set names utf8");

$author=$_GET['author'];
$title=$_GET['title'];
$year1=$_GET['year1'];
$year2=$_GET['year2'];
$text=$_GET['text'];

$author = preg_replace("/[,\-]+/", " ", $author);
$author = preg_replace("/[\t]+/", " ", $author);
$author = preg_replace("/[ ]+/", " ", $author);
$author = preg_replace("/^ +/", "", $author);
$author = preg_replace("/ +$/", "", $author);
$author = preg_replace("/  /", " ", $author);
$author = preg_replace("/  /", " ", $author);

$title = preg_replace("/[,\-]+/", " ", $title);
$title = preg_replace("/[\t]+/", " ", $title);
$title = preg_replace("/[ ]+/", " ", $title);
$title = preg_replace("/^ +/", "", $title);
$title = preg_replace("/ +$/", "", $title);
$title = preg_replace("/  /", " ", $title);
$title = preg_replace("/  /", " ", $title);

$text = preg_replace("/[,\-]+/", " ", $text);
$text = preg_replace("/[\t]+/", " ", $text);
$text = preg_replace("/[ ]+/", " ", $text);
$text = preg_replace("/^ +/", "", $text);
$text = preg_replace("/ +$/", "", $text);
$text = preg_replace("/  /", " ", $text);
$text = preg_replace("/  /", " ", $text);


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

$authorFilter = '';
$titleFilter = '';
$textFilter = '';
$textSearchBox = '';

$authors = preg_split("/ /", $author);
$titles = preg_split("/ /", $title);
$texts = preg_split("/ /", $text);

for($ic=0;$ic<sizeof($authors);$ic++)
{
	$authorFilter .= "and authorname REGEXP '" . $authors[$ic] . "' ";
}
for($ic=0;$ic<sizeof($titles);$ic++)
{
	$titleFilter .= "and title REGEXP '" . $titles[$ic] . "' ";
}
for($ic=0;$ic<sizeof($texts);$ic++)
{
	$textFilter .= "+" . $texts[$ic] . " ";
	$textSearchBox .= "|" . $texts[$ic];
}

$authorFilter = preg_replace("/^and /", "", $authorFilter);
$titleFilter = preg_replace("/^and /", "", $titleFilter);
$textSearchBox = preg_replace("/^\|/", "", $textSearchBox);

if($text=='')
{
	$query="SELECT count(*) FROM
				(SELECT * FROM
					(SELECT * FROM article WHERE $authorFilter) AS tb1
				WHERE $titleFilter) AS tb2
			WHERE year between $year1 and $year2 ORDER BY volume, issue, page";

}
elseif($text!='')
{
	$text = rtrim($text);
	
	$query="SELECT count(*) FROM
				(SELECT * FROM
					(SELECT * FROM
						(SELECT * FROM searchtable WHERE MATCH (text) AGAINST ('$textFilter' IN BOOLEAN MODE))
					AS tb1 WHERE $authorFilter)
				AS tb2 WHERE $titleFilter)
			AS tb4 WHERE year between $year1 and $year2 ORDER BY volume, issue, cur_page";
}

$result = mysql_query($query);
$row = mysql_fetch_assoc($result);
$num_results = $row['count(*)'];

if ($num_results > 0)
{
	echo "<!DOCTYPE html>
	<html xmlns=\"http://www.w3.org/1999/xhtml\">

	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
	<title>Jivan Vikas</title>
	<link href=\"style/font.css\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
	</head>

	<body>
	<div class=\"page\">
	<span class=\"authorspan fmar\">" . engtohin_issue($num_results) . " परिणाम</span>
	</page>
	</body>
	</html>";
}

?>
