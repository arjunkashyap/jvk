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
<div id="loader"><img src="images/loading.gif" alt="Loader"/></div>
<div class="page" id="page">
	<div id="headnav">
		<ul>
			<li><a href="contact.html">Contact</a></li>
			<li><a href="help.html">Help</a></li>
			<li><a href="siteindex.html">Site Index</a></li>
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
				<li><a href="../index.html">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="editors.html">Editors</a></li>
				<li><a href="gallery.html">Gallery</a></li>
				<li><a class="active" href="volumes.html">Archive</a></li>
			</ul>
			<div class="clearfix"></div>
		</nav>
	</div>
	<div class="clearfix"></div>
	<div class="archive_menu sticky">
		<ul id="archive_nav">
			<li><a href="volumes.html">वर्ष, अंक</a></li>
			<li><a href="articles_01.html">लेख सूची</a></li>
			<li><a href="authors_01.html">लेखक सूची</a></li>
			<li><a href="search.php">शोध</a></li>
		</ul>
	</div>
	<div class="textbody">
		<h1 class="archive_heading">शोध परिणाम</h1>
		<ul class="archive_list" data-page="1" data="true" id="pageLazy">
<?php

$author=$_POST['author'];
$title=$_POST['title'];
$year1=$_POST['year1'];
$year2=$_POST['year2'];
$text=$_POST['text'];

echo "<iframe class=\"num_result\" src=\"get_count.php?author=$author&title=$title&year1=$year1&year2=$year2&text=$text\"></iframe>";

include("search-ajax.php");

?>
		</ul>
	</div>
</div>
<div class="footer">
	॥श्री रामकृष्णार्पणमस्तु॥
</div>
<script type="text/javascript" src="js/sticky.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var mul = $('#pageLazy').attr('data-page');
		var pagenum = mul.split(/;/)[0];
		var level = mul.split(/;/)[1];
		var goNow = true;
		$(window).scroll( function() {
			var go = $('#pageLazy');
			
			var postData = <?php echo !empty($_POST)?json_encode($_POST):'null';?>;
			if(go.attr('data') == "true" && goNow == true){
				if(($(this).scrollTop() + $(this).innerHeight()) > ($(document).height() - 3000)) {
					
					$('#loader').fadeIn(500);
					pagenum = parseInt(pagenum)+parseInt(1);

					goNow = false;
					if(level != 1){
					$.ajax({
						type: "POST",
						url: "search-ajax.php?page=" + pagenum,
						dataType: "html",
						data: postData,
						success: function(res){
							if(res.match(/परिणाम नाही/) == null) {
								goNow = true;
								$('#loader').fadeOut(500);
								go.append(res).fadeIn();
							} else {
								goNow = false;
								$('#loader').fadeOut(500);
							}
						},
						error: function(e){
							goNow = false;
							$('#loader').fadeOut(500);
						}
					});}
				}
			}
		});
	});
</script>
</body>
</html>
