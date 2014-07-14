<?php

require_once("html/connect.php");
$db = mysql_connect("localhost",$user,$password) or die("Not connected to database");
$rs = mysql_select_db($database,$db) or die("No Database");
mysql_query("set names utf8");

$query1 = "select distinct volume from article order by volume";
$result1 = mysql_query($query1);
$num_rows1 = mysql_num_rows($result1);
for($i1=1;$i1<=$num_rows1;$i1++)
{
	$row1=mysql_fetch_assoc($result1);
	$volume=$row1['volume'];

	$query2 = "select distinct issue from article where volume='$volume' order by issue";
	$result2 = mysql_query($query2);
	$num_rows2 = mysql_num_rows($result2);
	for($i2=1;$i2<=$num_rows2;$i2++)
	{
		$row2=mysql_fetch_assoc($result2);
		$issue=$row2['issue'];

		$filename = "html/toc_" . $volume . "_" .  $issue . ".html";

		$str = '';
		$str .= "<!DOCTYPE html>
		<html xmlns=\"http://www.w3.org/1999/xhtml\">

		<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
		<title>Jivan Vikas</title>
		<link href=\"style/reset.css\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />
		<link href=\"style/indexstyle.css\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />

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
					<li><a href=\"volumes.html\">वर्ष, अंक</a></li>
					<li><a href=\"articles_01.html\">लेख सूची</a></li>
					<li><a href=\"authors_01.html\">लेखक सूची</a></li>
					<li><a href=\"search.php\">शोध</a></li>
				</ul>
			</div>
			<div class=\"textbody\">";

		$query_aux = "select distinct year,month from article where volume='$volume' and issue='$issue'";
		$result_aux = mysql_query($query_aux);
		$row_aux=mysql_fetch_assoc($result_aux);
		$year=$row_aux['year'];
		$month=$row_aux['month'];

		$str .= "<h1 class=\"archive_heading\">".engtohin_month($month)."&nbsp;".engtohin_issue($year)."&nbsp;&nbsp;|&nbsp;&nbsp;वर्ष&nbsp;".engtohin_issue(intval($volume)).", अंक&nbsp;".engtohin_issue(intval($issue))."</h1>";
		$str .= "<ul class=\"archive_list\">";

		$query = "select * from article where volume='$volume' and issue='$issue' order by page, page_end";
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
								
				$title1=addslashes($title);
				
				$str .= "<li>";
				$str .= "<span class=\"titlespan\"><a target=\"_blank\" href=\"../Volumes/$volume/$issue/index.djvu?djvuopts&amp;page=$page.djvu&amp;zoom=page\">$title</a></span>&nbsp;";
				
				if($authid != 0)
				{
					$str .= "<br />";
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
							$str .= "<span class=\"space_left authorspan\">मूळ लेखक :  </span>$oaut<br />";
						}
						$str .= "<span class=\"space_left authorspan\">अनुवादक :  </span>$taut";
					}
					else
					{
						$str .= "<span class=\"space_left\">$oaut</span><br />";
					}
					
				}
				$str .= "</li>\n";
			}
		}
		$str .= "</ul>
			</div>
		</div>
		<div class=\"footer\">
			॥श्री रामकृष्णार्पणमस्तु॥
		</div>
		<script type=\"text/javascript\" src=\"js/sticky.js\"></script>
		</body>
		</html>";

		file_put_contents($filename, $str);
	}
}
?>
