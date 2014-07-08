#!/bin/sh

host="localhost"
db="jvk"
usr="root"
pwd="mysql"

echo "drop database jvk; create database jvk;" | /usr/bin/mysql -uroot -pmysql
perl insert_author.pl $host $db $usr $pwd
perl insert_feat.pl $host $db $usr $pwd
perl insert_articles.pl $host $db $usr $pwd
perl ocr.pl $host $db $usr $pwd
perl searchtable.pl $host $db $usr $pwd

rm html/volume*.html
rm html/toc*.html
rm html/articles*.html
rm html/auth*.html

php gen_volumes.php
php gen_issues.php
php gen_toc.php
php gen_articles.php
php gen_authors.php
php gen_auth.php

echo "create fulltext index text_index on searchtable (text);" | /usr/bin/mysql -uroot -pmysql jvk
