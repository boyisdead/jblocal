<?php
$host="localhost"; 
$user="youthgen_mon";
$pass="6yJP0DTZ3";
$dbname="youthgen_mon";
$conn=@mysql_connect($host,$user,$pass)or die("Cannot select DB");
$db=mysql_select_db($dbname)or die("Cannot select DB");
mysql_query("SET NAMES utf8");
?>