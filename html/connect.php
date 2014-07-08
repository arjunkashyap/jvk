<?php
$user='root';
$password='mysql';
$database='jvk';

function engtohin_issue($eng)
{
	if(intval($eng) == 0)
	{
		return "";
	}
	$hin = $eng;

	$hin = preg_replace("/0/", "०", $hin);
	$hin = preg_replace("/1/", "१", $hin);
	$hin = preg_replace("/2/", "२", $hin);
	$hin = preg_replace("/3/", "३", $hin);
	$hin = preg_replace("/4/", "४", $hin);
	$hin = preg_replace("/5/", "५", $hin);
	$hin = preg_replace("/6/", "६", $hin);
	$hin = preg_replace("/7/", "७", $hin);
	$hin = preg_replace("/8/", "८", $hin);
	$hin = preg_replace("/9/", "९", $hin);
	
	$hin = preg_replace("/^०/", "", $hin);
	$hin = preg_replace("/^०/", "", $hin);
	$hin = preg_replace("/\-०/", "-", $hin);
	$hin = preg_replace("/\-०/", "-", $hin);
	
	return $hin;
}

function engtohin_month($eng)
{
	if(intval($eng) == 0)
	{
		return "";
	}
	
	$hin = $eng;
	
	$hin = preg_replace("/00/", "", $hin);
	$hin = preg_replace("/01/", "जानेवारी", $hin);
	$hin = preg_replace("/02/", "फेब्रुवारी", $hin);
	$hin = preg_replace("/03/", "मार्च", $hin);
	$hin = preg_replace("/04/", "एप्रिल", $hin);
	$hin = preg_replace("/05/", "मे", $hin);
	$hin = preg_replace("/06/", "जून", $hin);
	$hin = preg_replace("/07/", "जुलै", $hin);
	$hin = preg_replace("/08/", "ऑगस्ट", $hin);
	$hin = preg_replace("/09/", "सप्टेंबर", $hin);
	$hin = preg_replace("/10/", "ऑक्टोबर", $hin);
	$hin = preg_replace("/11/", "नोव्हेंबर", $hin);
	$hin = preg_replace("/12/", "डिसेंबर", $hin);
	
	$hin = preg_replace("/ \&amp; /", "-", $hin);
	
	return $hin;
}
function get_ymvi($volume, $issue, $year, $month)
{
	$ymvi = '';
	$ymvi = $ymvi . "वर्ष ".engtohin_issue($volume);
	$ymvi = $ymvi . " अंक ".engtohin_issue($issue);
	
	if(($month != "00") || ($year != "00"))
	{
		$ymvi = $ymvi . ", ".engtohin_month($month)." ".engtohin_issue($year);
	}
	$ymvi = preg_replace("/  /", " ", $ymvi);
	return $ymvi;
}

?>
