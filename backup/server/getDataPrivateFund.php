<?php
session_start();
require_once '../include/mysql.inc.php';

$data = array();
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");

if ($_GET['cusid'] != null) {
	$select = $mysql->queryResult("SELECT id, private_broker, private_no, start_date, start_money, private_style, private_remark, customer_id FROM private_fund WHERE customer_id = '".$_GET['cusid']."'");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}
} elseif ($_GET['id'] != null) {
	$select = $mysql->queryResult("SELECT private_fund.id as PrivateID, private_broker, private_no, start_date, start_money, private_style, private_remark, customer_id, cus_perface, cus_name, cus_lastname FROM private_fund JOIN customer ON private_fund.customer_id = customer.id WHERE private_fund.id = '".$_GET['id']."'");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}
} else {
	$select = $mysql->queryResult("SELECT private_fund.id as PrivateID, private_broker, private_no, start_date, start_money, private_style, private_remark, customer_id, cus_perface, cus_name, cus_lastname FROM private_fund JOIN customer ON private_fund.customer_id = customer.id");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}
}

if ($_GET['callback'] != null) {
	echo  $_GET['callback']."(".json_encode($data).")";
	} else {
	echo  json_encode($data);
}

$mysql->close();
?>