<?php
session_start();
require_once '../include/mysql.inc.php';

$data = array();
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");

if ($_GET['id'] != null) {
	$select = $mysql->queryResult("SELECT insurance.id as insID, ins_nameCompany, ins_no, ins_type, ins_login, ins_pwd, ins_nameType, ins_more, ins_startDate, ins_deal, ins_startMoney, ins_moneyPay, ins_typePay, ins_howPay, ins_confirmPay, ins_whoRec, ins_status, ins_ownerCode, customer_id, cus_perface, cus_name, cus_lastname FROM insurance JOIN customer ON insurance.customer_id = customer.id WHERE insurance.id = '".$_GET['id']."'");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}
} elseif ($_GET['cudid'] != null) {
	$select = $mysql->queryResult("SELECT insurance.id as insID, ins_nameCompany, ins_no, ins_type, ins_login, ins_pwd, ins_nameType, ins_more, ins_startDate, ins_deal, ins_startMoney, ins_moneyPay, ins_typePay, ins_howPay, ins_confirmPay, ins_whoRec, ins_status, ins_ownerCode, customer_id, cus_perface, cus_name, cus_lastname FROM insurance JOIN customer ON insurance.customer_id = customer.id WHERE insurance.customer_id = '".$_GET['id']."'");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}
} else {
	$select = $mysql->queryResult("SELECT insurance.id as insID, ins_nameCompany, ins_no, ins_type, ins_login, ins_pwd, ins_nameType, ins_more, ins_startDate, ins_deal, ins_startMoney, ins_moneyPay, ins_typePay, ins_howPay, ins_confirmPay, ins_whoRec, ins_status, ins_ownerCode, customer_id, cus_perface, cus_name, cus_lastname FROM insurance JOIN customer ON insurance.customer_id = customer.id");
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