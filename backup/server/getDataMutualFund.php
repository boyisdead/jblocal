<?php
session_start();
require_once '../include/mysql.inc.php';

$data = array();
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");

if ($_GET['cusid'] != null) {
	$select = $mysql->queryResult("SELECT id, phillip_login, phillip_pwd, mf_goal_ltf, mf_goal_rmf, mf_done_ltf, mf_done_rmf, mf_saving_plan, mf_saving_plan_detail, mf_open_signature, mf_money_bagged, mf_status, customer_id FROM mutual_fund WHERE customer_id = '".$_GET['cusid']."'");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}
} elseif ($_GET['id'] != null) {
	$select = $mysql->queryResult("SELECT mutual_fund.id as MutualID, phillip_login, phillip_pwd, mf_goal_ltf, mf_goal_rmf, mf_done_ltf, mf_done_rmf, mf_saving_plan, mf_saving_plan_detail, mf_open_signature, mf_money_bagged, mf_status, customer_id, cus_perface, cus_name, cus_lastname FROM mutual_fund JOIN customer ON mutual_fund.customer_id = customer.id WHERE mutual_fund.customer_id = '".$_GET['id']."'");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}
} else {
	$select = $mysql->queryResult("SELECT mutual_fund.id as MutualID, phillip_login, phillip_pwd, mf_goal_ltf, mf_goal_rmf, mf_done_ltf, mf_done_rmf, mf_saving_plan, mf_saving_plan_detail, mf_open_signature, mf_money_bagged, mf_status, customer_id, cus_perface, cus_name, cus_lastname FROM mutual_fund JOIN customer ON mutual_fund.customer_id = customer.id");
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