<?php
session_start();
header('Content-type: text/html; charset=utf-8');
require_once 'connect.php';



$countries = array();

$sql5="SELECT AMPHUR_NAME_ENG FROM amphures";
	$result5=mysql_query($sql5)or die(mysql_error());
	for($i5=0;$row5=mysql_fetch_assoc($result5);$i5++){


					



     $countries[] = $row5['AMPHUR_NAME_ENG'];









	}

$data = array("location"=>$countries);

	echo  json_encode($data);


?>


