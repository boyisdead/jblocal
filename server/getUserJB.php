<?php
session_start();
header('Content-type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: http://128.199.113.225:8081");
require_once 'connect.php';

$id=$_REQUEST['id'];

$Hotels = array();

$sql5="SELECT * FROM user WHERE id = $id";
	$result5=mysql_query($sql5)or die(mysql_error());
	for($i5=0;$row5=mysql_fetch_assoc($result5);$i5++){


					



     $Hotels = array("id"=>$row5['id'],"name"=>$row5['username'],"avatar_urls"=>"http://www.jbmonster.com/admin/avatar/".$row5['Image']);









	}

$data = array($Hotels);

	echo  json_encode($Hotels);


?>


