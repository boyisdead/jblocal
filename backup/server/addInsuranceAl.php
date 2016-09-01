<?php
session_start();
require_once '../include/mysql.inc.php';

$arr = array('status' => true);
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");

if ($_GET['id'] == null) {
	$mysql->query("INSERT INTO insurance_al(inal_nameCompany, inal_anotherRec, inal_no, inal_type, inal_nameType, inal_contact, inal_startDate, inal_deal, inal_moneyPay, inal_howPay, inal_status, inal_whoRec, inal_rematk, customer_id) VALUES (%n, %s, %s, %n, %s, %s, %s, %s, %s, %n, %n, %s, %s, %n)",
		array(
			$_GET['companyName'],
			$_GET['username'],
			$_GET['No'],
			$_GET['type'],
			$_GET['nameType'],
			$_GET['more'],
			$_GET['startDate'],
			$_GET['dealDate'],
			$_GET['moneyPay'],
			$_GET['howPay'],
			$_GET['whoRec'],
			$_GET['status'],
			$_GET['remark'],
			1,
		)
	);
} else {
	$mysql->query("UPDATE insurance_al SET inal_nameCompany = %n, inal_anotherRec = %s, inal_no = %s, inal_type = %n, inal_nameType = %s, inal_contact = %s, inal_startDate = %s, inal_deal = %s, inal_moneyPay = %s, ,inal_howPay = %n, inal_status = %n, inal_whoRec = %s, inal_rematk = %s, customer_id = %n WHERE id = %n",
		array(
			$_GET['companyName'],
			$_GET['username'],
			$_GET['No'],
			$_GET['type'],
			$_GET['nameType'],
			$_GET['more'],
			$_GET['startDate'],
			$_GET['dealDate'],
			$_GET['moneyPay'],
			$_GET['howPay'],
			$_GET['whoRec'],
			$_GET['status'],
			$_GET['remark'],
			1,
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