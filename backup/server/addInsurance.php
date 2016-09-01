<?php
session_start();
require_once '../include/mysql.inc.php';

$arr = array('status' => true);
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");

if ($_GET['id'] == null) {
	$mysql->query("INSERT INTO insurance(ins_nameCompany, ins_no, ins_type, ins_login, ins_pwd, ins_nameType, ins_more, ins_startDate, ins_deal, ins_startMoney, ins_moneyPay, ins_typePay, ins_howPay, ins_confirmPay, ins_whoRec, ins_status, ins_ownerCode, customer_id) VALUES (%n, %s, %n, %s, %s, %s, %s, %s, %s, %s, %n, %n, %n, %n, %s, %n, %s, %n)",
		array(
			$_GET['companyName'],
			$_GET['No'],
			$_GET['type'],
			$_GET['username'],
			$_GET['password'],
			$_GET['nameType'],
			$_GET['more'],
			$_GET['startDate'],
			$_GET['dealDate'],
			$_GET['startMoney'],
			$_GET['moneyPay'],
			$_GET['typePay'],
			$_GET['howPay'],
			$_GET['confirmPay'],
			$_GET['whoRec'],
			$_GET['status'],
			$_GET['ownerCode'],
			1,
		)
	);
} else {
	$mysql->query("UPDATE insurance SET ins_nameCompany = %n, ins_no = %s, ins_type = %n, ins_login = %s, ins_pwd = %s, ins_nameType = %s, ins_more = %s, ,ins_startDate = %s, ,ins_deal = %s, ,ins_startMoney = %s, ins_moneyPay = %n, ins_typePay = %n, ins_howPay = %n, ins_confirmPay = %n, ins_whoRec = %s, ins_status = %n, ins_ownerCode = %s, customer_id = %n WHERE id = %n",
		array(
			$_GET['companyName'],
			$_GET['No'],
			$_GET['type'],
			$_GET['username'],
			$_GET['password'],
			$_GET['nameType'],
			$_GET['more'],
			$_GET['startDate'],
			$_GET['dealDate'],
			$_GET['startMoney'],
			$_GET['moneyPay'],
			$_GET['typePay'],
			$_GET['howPay'],
			$_GET['confirmPay'],
			$_GET['whoRec'],
			$_GET['status'],
			$_GET['ownerCode'],
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