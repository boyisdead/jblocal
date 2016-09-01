<?php
session_start();
require_once '../include/mysql.inc.php';

$data = array();
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");

if (exst($_GET['id']) != null) {
	$select = $mysql->queryResult("select id, cus_perface, image, cus_name, cus_lastname, cus_nameOld, cus_nickname, cus_idcard, cus_status, cus_sex, cus_birthday, cus_address, cus_addressOri, cus_tel, cus_email, cus_disease, cus_type, cus_bankNo, cus_size, cus_remark, cus_tex, cus_texCount, cus_RDlogin, cus_RDpwd, cus_TSDlogin, cus_TSDpwd, cus_texRemark, member_id, cus_child, cus_carrier, cus_origin from customer where id = '".$_GET['id']."'");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}
} else {
	$select = $mysql->queryResult("select id, cus_perface, image, cus_name, cus_lastname, cus_nameOld, cus_nickname, cus_idcard, cus_status, cus_sex, cus_birthday, cus_address, cus_addressOri, cus_tel, cus_email, cus_disease, cus_type, cus_bankNo, cus_size, cus_remark, cus_tex, cus_texCount, cus_RDlogin, cus_RDpwd, cus_TSDlogin, cus_TSDpwd, cus_texRemark, member_id, cus_child, cus_carrier, cus_origin from customer");
	while ($res = $select->fetch()) {
		$data[] = $res;
	}
}

if (exst($_GET['callback']) != null) {
	echo  $_GET['callback']."(".json_encode($data).")";
	} else {
	echo  json_encode($data);
}

$mysql->close();
?>