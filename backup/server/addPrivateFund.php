<?php
session_start();
require_once '../include/mysql.inc.php';

$arr = array('status' => true);
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");

if ($_GET['id'] == null) {
	$mysql->query("INSERT INTO private_fund(private_broker, private_no, start_date, start_money, private_style, private_remark, customer_id) VALUES (%n, %s, %s, %s, %s, %s, %n)",
		array(
			$_GET['broker'],
			$_GET['no'],
			$_GET['startDate'],
			$_GET['startMoney'],
			$_GET['style'],
			$_GET['remark'],
			$_GET['cusID'],
		)
	);
} else {
	$mysql->query("UPDATE private_fund SET private_broker = %n, private_no = %s, start_date = %s, start_money = %s, private_style = %s, private_remark = %s WHERE id = %n",
		array(
			$_GET['broker'],
			$_GET['no'],
			$_GET['startDate'],
			$_GET['startMoney'],
			$_GET['style'],
			$_GET['remark'],
			$_GET['id'],
		)
	);
}

if ($_GET['callback'] != null) {
	echo  $_GET['callback']."(".json_encode($arr).")";
} else {
	echo  json_encode($arr);
}

$mysql->close();
?>