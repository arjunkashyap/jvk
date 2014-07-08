<?php

$alphabet = array("01"=>"अ","02"=>"आ","03"=>"इ","04"=>"ई","05"=>"उ","06"=>"ऋ","07"=>"ए","08"=>"ओ","09"=>"क","10"=>"ख","11"=>"ग","12"=>"घ","13"=>"च","14"=>"छ","15"=>"ज","16"=>"ज्ञ","17"=>"झ","18"=>"ट","19"=>"ठ","20"=>"ड","21"=>"ढ","22"=>"त","23"=>"थ","24"=>"द","25"=>"ध","26"=>"न","27"=>"प","28"=>"फ","29"=>"ब","30"=>"भ","31"=>"म","32"=>"य","33"=>"र","34"=>"ल","35"=>"व","36"=>"श","37"=>"श्री","38"=>"स","39"=>"ह","40"=>"sp");
$rev_alphabet = array("अ"=>"01","आ"=>"02","इ"=>"03","ई"=>"04","उ"=>"05","ऋ"=>"06","ए"=>"07","ओ"=>"08","क"=>"09","ख"=>"10","ग"=>"11","घ"=>"12","च"=>"13","छ"=>"14","ज"=>"15","ज्ञ"=>"16","झ"=>"17","ट"=>"18","ठ"=>"19","ड"=>"20","ढ"=>"21","त"=>"22","थ"=>"23","द"=>"24","ध"=>"25","न"=>"26","प"=>"27","फ"=>"28","ब"=>"29","भ"=>"30","म"=>"31","य"=>"32","र"=>"33","ल"=>"34","व"=>"35","श"=>"36","श्री"=>"37","स"=>"38","ह"=>"39","sp"=>"40");

for($ia=1;$ia<=sizeof($alphabet);$ia++)
{
	$letter = $alphabet{str_pad($ia, 2, "0", STR_PAD_LEFT)};
	
	$filename = "html/authors_" . str_pad($ia, 2, "0", STR_PAD_LEFT) . ".html";

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
			<li><a class=\"active\" href=\"authors_01.html\">लेखक सूची</a></li>
			<li><a href=\"search.php\">शोध</a></li>
		</ul>
	</div>
	<div class=\"textbody\">
		<h1 class=\"archive_heading\">लेखक सूची</h1>
		<div class=\"alphabet\">
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'अ'} . ".html\">अ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'आ'} . ".html\">आ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'इ'} . ".html\">इ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ई'} . ".html\">ई</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'उ'} . ".html\">उ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ऋ'} . ".html\">ऋ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ए'} . ".html\">ए</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ओ'} . ".html\">ओ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'क'} . ".html\">क</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ख'} . ".html\">ख</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ग'} . ".html\">ग</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'घ'} . ".html\">घ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'च'} . ".html\">च</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'छ'} . ".html\">छ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ज'} . ".html\">ज</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ज्ञ'} . ".html\">ज्ञ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'झ'} . ".html\">झ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ट'} . ".html\">ट</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ठ'} . ".html\">ठ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ड'} . ".html\">ड</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ढ'} . ".html\">ढ</a></span><br />
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'त'} . ".html\">त</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'थ'} . ".html\">थ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'द'} . ".html\">द</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ध'} . ".html\">ध</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'न'} . ".html\">न</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'प'} . ".html\">प</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'फ'} . ".html\">फ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ब'} . ".html\">ब</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'भ'} . ".html\">भ</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'म'} . ".html\">म</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'य'} . ".html\">य</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'र'} . ".html\">र</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ल'} . ".html\">ल</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'व'} . ".html\">व</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'श'} . ".html\">श</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'श्री'} . ".html\">श्री</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'स'} . ".html\">स</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'ह'} . ".html\">ह</a></span>
			<span class=\"letter\"><a href=\"authors_" . $rev_alphabet{'sp'} . ".html\">#</a></span>
		</div>
		<ul class=\"archive_list\">";

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

			$str .= "<li><span class=\"authorspan\"><a href=\"auth_" . $authid . ".html\">$authorname</a></span></li>\n";
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
