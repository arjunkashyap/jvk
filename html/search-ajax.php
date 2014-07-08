<?php

require_once("connect.php");

$db = mysql_connect("localhost",$user,$password) or die("Not connected to database");
$rs = mysql_select_db($database,$db) or die("No Database");
mysql_query("set names utf8");

$author=$_POST['author'];
$title=$_POST['title'];
$year1=$_POST['year1'];
$year2=$_POST['year2'];
$text=$_POST['text'];

$author = preg_replace("/[[:punct:]]+/", " ", $author);
$author = preg_replace("/[\t]+/", " ", $author);
$author = preg_replace("/[ ]+/", " ", $author);
$author = preg_replace("/^ +/", "", $author);
$author = preg_replace("/ +$/", "", $author);
$author = preg_replace("/  /", " ", $author);
$author = preg_replace("/  /", " ", $author);

$title = preg_replace("/[[:punct:]]+/", " ", $title);
$title = preg_replace("/[\t]+/", " ", $title);
$title = preg_replace("/[ ]+/", " ", $title);
$title = preg_replace("/^ +/", "", $title);
$title = preg_replace("/ +$/", "", $title);
$title = preg_replace("/  /", " ", $title);
$title = preg_replace("/  /", " ", $title);

$text = preg_replace("/[[:punct:]]+/", " ", $text);
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
	$query="SELECT * FROM
				(SELECT * FROM
					(SELECT * FROM article WHERE $authorFilter) AS tb1
				WHERE $titleFilter) AS tb2
			WHERE year between $year1 and $year2 ORDER BY volume, issue, page";

}
elseif($text!='')
{
	$text = rtrim($text);
	
	$query="SELECT * FROM
				(SELECT * FROM
					(SELECT * FROM
						(SELECT * FROM searchtable WHERE MATCH (text) AGAINST ('$textFilter' IN BOOLEAN MODE))
					AS tb1 WHERE $authorFilter)
				AS tb2 WHERE $titleFilter)
			AS tb4 WHERE year between $year1 and $year2 ORDER BY volume, issue, cur_page";
}

if(isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page']))
{
	$query .= " LIMIT ".(($_GET['page'] - 1)*20).",20";
}
else
{
	$query .= " LIMIT 20";
}

$result = mysql_query($query);
$num_results = mysql_num_rows($result);

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
			echo "<span class=\"yearspan\"><a href=\"toc_" . $volume . "_" . $issue . ".html\">(".engtohin_month($month)."&nbsp;".engtohin_issue($year).")</a></span>";
		
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
						$oaut = $oaut . "<span class=\"titlespan\">;&nbsp;</span><span class=\"authorspan\"><a href=\"auth_" . $aut[$a] . ".html\">".$anames[$a]."</a></span>";
					}
					elseif(preg_match("/2/", $anames[$a]))
					{
						$anames[$a] = preg_replace("/\|2/", "", $anames[$a]);
						$taut = $taut . "<span class=\"titlespan\">;&nbsp;</span><span class=\"authorspan\"><a href=\"auth_" . $aut[$a] . ".html\">".$anames[$a]."</a></span>";
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
				echo "<span class=\"authorspan\"><a href=\"../Volumes/$volume/$issue/index.djvu?djvuopts&amp;page=$cur_page.djvu&amp;zoom=page&amp;find=$textSearchBox/r\" target=\"_blank\">".engtohin_issue(intval($cur_page))."</a> </span>";
			}
			$id = $titleid;
		}
		else
		{
			if($text != '')
			{
				echo "<span class=\"authorspan\"><a href=\"../Volumes/$volume/$issue/index.djvu?djvuopts&amp;page=$cur_page.djvu&amp;zoom=page&amp;find=$textSearchBox/r\" target=\"_blank\">".engtohin_issue(intval($cur_page))."</a> </span>";
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
