<?php
session_start();
require_once '../include/mysql.inc.php';

$arr = array('status' => true);
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");

if ($_GET['id'] == null) {
	$mysql->query("INSERT INTO mutual_fund (phillip_login, phillip_pwd, mf_goal_ltf, mf_goal_rmf, mf_done_ltf, mf_done_rmf, mf_saving_plan, mf_saving_plan_detail, mf_open_signature, mf_money_bagged, mf_status, customer_id) VALUES (%s, %s, %s, %s, %s, %s, %n, %s, %s, %s, %n,%n)",
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
	$mysql->query("UPDATE mutual_fund SET phillip_login = %s, phillip_pwd = %s, mf_goal_ltf = %s, mf_goal_rmf = %s, mf_done_ltf = %s, mf_done_rmf = %s, mf_saving_plan = %n, mf_saving_plan_detail = %s, mf_open_signature = %s, mf_money_bagged = %s, mf_status = %n, customer_id = %n WHERE id = %n",
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