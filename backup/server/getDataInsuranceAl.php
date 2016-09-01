<?php
session_start();
require_once '../include/mysql.inc.php';

$data = array();
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");

if ($_GET['id'] != null) {
	$select = $mysql->queryResult("SELECT insurance_al.id as inalID, inal_nameCompany, inal_anotherRec, inal_no, inal_type, inal_nameType, inal_contact, inal_startDate, inal_deal, inal_moneyPay, inal_howPay, inal_status, inal_whoRec, inal_rematk, customer_id, cus_perface, cus_name, cus_lastname FROM insurance_al JOIN customer ON insurance_al.customer_id = customer.id WHERE insurance_al.customer_id = '".$_GET['id']."'");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}
} elseif ($_GET['cudid'] != null) {
	$select = $mysql->queryResult("SELECT insurance_al.id as inalID, inal_nameCompany, inal_anotherRec, inal_no, inal_type, inal_nameType, inal_contact, inal_startDate, inal_deal, inal_moneyPay, inal_howPay, inal_status, inal_whoRec, inal_rematk, customer_id, cus_perface, cus_name, cus_lastname FROM insurance_al JOIN customer ON insurance_al.customer_id = customer.id WHERE insurance_al.id = '".$_GET['id']."'");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}
} else {
	$select = $mysql->queryResult("SELECT insurance_al.id as inalID, inal_nameCompany, inal_anotherRec, inal_no, inal_type, inal_nameType, inal_contact, inal_startDate, inal_deal, inal_moneyPay, inal_howPay, inal_status, inal_whoRec, inal_rematk, customer_id, cus_perface, cus_name, cus_lastname FROM insurance_al JOIN customer ON insurance_al.customer_id = customer.id");
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