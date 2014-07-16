<?php

$alphabet = array("01"=>"अ","02"=>"आ","03"=>"इ","04"=>"ई","05"=>"उ","06"=>"ऊ","07"=>"ऋ","08"=>"ए","09"=>"ऐ","10"=>"ओ","11"=>"औ","12"=>"क","13"=>"ख","14"=>"ग","15"=>"घ","16"=>"च","17"=>"छ","18"=>"ज","19"=>"ज्ञ","20"=>"झ","21"=>"ट","22"=>"ठ","23"=>"ड","24"=>"ढ","25"=>"त","26"=>"थ","27"=>"द","28"=>"ध","29"=>"न","30"=>"प","31"=>"फ","32"=>"ब","33"=>"भ","34"=>"म","35"=>"य","36"=>"र","37"=>"ल","38"=>"व","39"=>"श","40"=>"श्री","41"=>"ष","42"=>"स","43"=>"ह","44"=>"sp");
$rev_alphabet = array("अ"=>"01","आ"=>"02","इ"=>"03","ई"=>"04","उ"=>"05","ऊ"=>"06","ऋ"=>"07","ए"=>"08","ऐ"=>"09","ओ"=>"10","औ"=>"11","क"=>"12","ख"=>"13","ग"=>"14","घ"=>"15","च"=>"16","छ"=>"17","ज"=>"18","ज्ञ"=>"19","झ"=>"20","ट"=>"21","ठ"=>"22","ड"=>"23","ढ"=>"24","त"=>"25","थ"=>"26","द"=>"27","ध"=>"28","न"=>"29","प"=>"30","फ"=>"31","ब"=>"32","भ"=>"33","म"=>"34","य"=>"35","र"=>"36","ल"=>"37","व"=>"38","श"=>"39","श्री"=>"40","ष"=>"41","स"=>"42","ह"=>"43","sp"=>"44");

for($ia=1;$ia<=sizeof($alphabet);$ia++)
{
	$letter = $alphabet{str_pad($ia, 2, "0", STR_PAD_LEFT)};
	
	$filename = "html/articles_" . str_pad($ia, 2, "0", STR_PAD_LEFT) . ".html";

	require_once("html/connect.php");

	$db = mysql_connect("localhost",$user,$password) or die("Not connected to database");
	$rs = mysql_select_db($database,$db) or die("No Database");
	mysql_query("set names utf8");

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
				<li><a href=\"volumes.html\">वर्ष, अंक</a></li>
				<li><a class=\"active\" href=\"articles_01.html\">लेख सूची</a></li>
				<li><a href=\"authors_01.html\">लेखक सूची</a></li>
				<li><a href=\"search.php\">शोध</a></li>
			</ul>
		</div>
		<div class=\"textbody\">
			<h1 class=\"archive_heading\">लेख सूची</h1>
			<div class=\"alphabet\">
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'अ'} . ".html\">अ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'आ'} . ".html\">आ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'इ'} . ".html\">इ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ई'} . ".html\">ई</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'उ'} . ".html\">उ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ऊ'} . ".html\">ऊ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ऋ'} . ".html\">ऋ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ए'} . ".html\">ए</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ऐ'} . ".html\">ऐ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ओ'} . ".html\">ओ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'औ'} . ".html\">औ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'क'} . ".html\">क</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ख'} . ".html\">ख</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ग'} . ".html\">ग</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'घ'} . ".html\">घ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'च'} . ".html\">च</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'छ'} . ".html\">छ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ज'} . ".html\">ज</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ज्ञ'} . ".html\">ज्ञ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'झ'} . ".html\">झ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ट'} . ".html\">ट</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ठ'} . ".html\">ठ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ड'} . ".html\">ड</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ढ'} . ".html\">ढ</a></span><br />
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'त'} . ".html\">त</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'थ'} . ".html\">थ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'द'} . ".html\">द</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ध'} . ".html\">ध</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'न'} . ".html\">न</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'प'} . ".html\">प</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'फ'} . ".html\">फ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ब'} . ".html\">ब</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'भ'} . ".html\">भ</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'म'} . ".html\">म</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'य'} . ".html\">य</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'र'} . ".html\">र</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ल'} . ".html\">ल</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'व'} . ".html\">व</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'श'} . ".html\">श</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'श्री'} . ".html\">श्री</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ष'} . ".html\">ष</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'स'} . ".html\">स</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'ह'} . ".html\">ह</a></span>
				<span class=\"letter\"><a href=\"articles_" . $rev_alphabet{'sp'} . ".html\">#</a></span>
			</div>
			<ul class=\"archive_list\">";

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
						
			$title1=addslashes($title);
			
			$str .= "<li>";
			$str .= "<span class=\"titlespan\"><a target=\"_blank\" href=\"../Volumes/$volume/$issue/index.djvu?djvuopts&amp;page=$page.djvu&amp;zoom=page\">$title</a></span>&nbsp;";
			$str .= "<span class=\"yearspan\"><a href=\"toc_" . $volume . "_" . $issue . ".html\">(".engtohin_month($month)."&nbsp;".engtohin_issue($year).")</a></span>";
			
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

?>
