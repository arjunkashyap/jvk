#!/bin/sh

host="localhost"
db="jvk"
usr="root"
pwd="mysql"

echo "drop database jvk; create database jvk;" | /usr/bin/mysql -uroot -pmysql
perl insert_author.pl $host $db $usr $pwd
#~ perl insert_articles.pl $host $db $usr $pwd
