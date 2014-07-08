#!/usr/bin/perl

$host = $ARGV[0];
$db = $ARGV[1];
$usr = $ARGV[2];
$pwd = $ARGV[3];

use DBI();

my $dbh=DBI->connect("DBI:mysql:database=$db;host=$host","$usr","$pwd");

$sth_enc=$dbh->prepare("set names utf8");
$sth_enc->execute();
$sth_enc->finish();

$sth11=$dbh->prepare("CREATE TABLE searchtable(title varchar(500),
authid varchar(200),
authorname varchar(1000),
featid varchar(200),
text varchar(5000),
page varchar(5),
cur_page varchar(5),
volume varchar(3),
issue varchar(5),
year int(4),
month varchar(20),
titleid varchar(30)) character set utf8 collate utf8_general_ci");
$sth11->execute();
$sth11->finish();

$sth1=$dbh->prepare("select * from article order by titleid");
$sth1->execute();

while($ref=$sth1->fetchrow_hashref())
{
	$titleid = $ref->{'titleid'};
	$page = $ref->{'page'};
	$page_end = $ref->{'page_end'};
	$volume = $ref->{'volume'};
	$issue = $ref->{'issue'};
	$title = $ref->{'title'};
	$authid = $ref->{'authid'};
	$authorname = $ref->{'authorname'};
	$year = $ref->{'year'};
	$month = $ref->{'month'};
	$featid = $ref->{'featid'};
	
	$title =~ s/'/\\'/g;
	$featid =~ s/'/\\'/g;
	$authorname =~ s/'/\\'/g;
		
	print $volume."\n";
	
	$sth2=$dbh->prepare("select * from testocr where volume='$volume' and issue='$issue' and cur_page between '$page' and '$page_end'");
	$sth2->execute();
	
	while($ref2=$sth2->fetchrow_hashref())
	{
		$text = $ref2->{'text'};
		$text =~ s/'/\\'/g;
		
		$cur_page = $ref2->{'cur_page'};
		
		$sth4=$dbh->prepare("insert into searchtable values('$title','$authid','$authorname','$featid','$text','$page','$cur_page',
			'$volume','$issue','$year','$month','$titleid')");
		$text = '';
		$sth4->execute();
		$sth4->finish();
	}
	$sth2->finish();
}

$sth1->finish();
$dbh->disconnect();
