<?php
session_start();
require_once '../include/mysql.inc.php';

$arr = array('status' => true);
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");


$meid=$_REQUEST['meid'];
$cusID=$_REQUEST['cusID'];
$userID=$_REQUEST['userID'];

if (isset($meid, $cusID, $userID)) {
	$mysql->query("INSERT INTO eventshared (member_id, sharedtoid, customerid, insert_date, last_update) VALUES ($meid, $userID, $cusID, now(), now())");

	$A1 = array("status"=>1001, "msg"=>"Insert Data successful.");


if ($_GET['callback'] != null) {
	echo  $_GET['callback']."(".json_encode($A1).")";
} else {
	echo  json_encode($A1);
}


} else {
	
	$A2 = array("status"=>1002, "msg"=>"Error Insert Date.");


if ($_GET['callback'] != null) {
	echo  $_GET['callback']."(".json_encode($A2).")";
} else {
	echo  json_encode($A2);
}

}



$mysql->close();
?>