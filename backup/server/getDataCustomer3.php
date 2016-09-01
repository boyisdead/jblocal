<?php
session_start();
require_once '../include/mysql.inc.php';

$data = array();
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");

$meid=$_REQUEST['meid'];


	$nowshow=date("y-m-1");    // where EmployeeId = 1 and Date between '2011/02/25' and '2011/02/27'
	$nowshow2=date("y-m-30");
//	$select = $mysql->queryResult("SELECT toda AS title, date(insert_date) AS start FROM actionplan WHERE member_id = $meid");
	$select = $mysql->queryResult("SELECT toda AS title, CONCAT(date(startday), char(32), time(timer)) AS start, date(endday) AS end, color AS className FROM actionplan WHERE member_id = $meid");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}


if (exst($_GET['callback']) != null) {
	echo  $_GET['callback']."(".json_encode($data).")";
	} else {
	echo  json_encode($data);
}

$mysql->close();
?>


