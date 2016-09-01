<?php
$host="localhost"; 
$user="root";
$pass="Passw0rd!";
$dbname="jbmonsdb";
$conn=@mysql_connect($host,$user,$pass)or die("Cannot select DB");
$db=mysql_select_db($dbname)or die("Cannot select DB");
mysql_query("SET NAMES utf8");
?>