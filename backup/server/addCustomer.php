<?php
session_start();
require_once '../include/mysql.inc.php';

$arr = array('status' => true);
$mysql = new MySQL_Connection();
$mysql->query("SET NAMES utf8");

if ($_GET['id'] == null) {
	$mysql->query("INSERT INTO customer (cus_perface, cus_name, cus_lastname, cus_nameOld, cus_nickname, cus_idcard, cus_status, cus_sex, cus_birthday, cus_address, cus_addressOri, cus_tel, cus_email, cus_disease, cus_type, cus_bankNo, cus_size, cus_remark, cus_tex, cus_texCount, cus_RDlogin, cus_RDpwd, cus_TSDlogin, cus_TSDpwd, cus_texRemark, cus_child, cus_carrier, cus_origin, member_id) VALUES (%n, %s, %s, %s, %s, %n, %n, %n, %s, %s, %s, %s, %s, %s, %n, %s, %s, %s, %n, %n, %s, %s, %s, %s, %s, %n, %n, %s, %s, %n)",
		array(
			$_GET['perface'],
			$_GET['name'],
			$_GET['lastname'],
			$_GET['nameOld'],
			$_GET['nickname'],
			$_GET['idcard'],
			$_GET['status'],
			$_GET['sex'],
			$_GET['birthday'],
			$_GET['address'],
			$_GET['addressOriginal'],
			$_GET['phone'],
			$_GET['email'],
			$_GET['disease'],
			$_GET['type'],
			$_GET['banknumber'],
			$_GET['size'],
			$_GET['remark'],
			$_GET['tex'],
			$_GET['texcount'],
			$_GET['RDlogin'],
			$_GET['RDpassword'],
			$_GET['TSDlogin'],
			$_GET['TSDpassword'],
			$_GET['texRemark'],
			$_GET['child'],
			$_GET['carrier'],
			$_GET['origin'],
			1,
		)
	);
} else {
	$mysql->query("UPDATE customer SET cus_perface = %n, cus_name = %s, cus_lastname = %s, cus_nameOld = %s, cus_nickname = %s, cus_idcard = %n, cus_status = %n, cus_sex = %n, cus_birthday = %s, cus_address = %s, cus_addressOri = %s, cus_tel = %s, cus_email = %s, cus_disease = %s, cus_type = %n, cus_bankNo = %s, cus_size = %s, cus_remark = %s, cus_tex = %n, cus_texCount = %n, cus_RDlogin = %s, cus_RDpwd = %s, cus_TSDlogin = %s, cus_TSDpwd = %s, cus_texRemark = %s, cus_child = %n, cus_carrier = %s, cus_origin = %s where id = %n",
		array(
			$_GET['perface'],
			$_GET['name'],
			$_GET['lastname'],
			$_GET['nameOld'],
			$_GET['nickname'],
			$_GET['idcard'],
			$_GET['status'],
			$_GET['sex'],
			$_GET['birthday'],
			$_GET['address'],
			$_GET['addressOriginal'],
			$_GET['phone'],
			$_GET['email'],
			$_GET['disease'],
			$_GET['type'],
			$_GET['banknumber'],
			$_GET['size'],
			$_GET['remark'],
			$_GET['tex'],
			$_GET['texcount'],
			$_GET['RDlogin'],
			$_GET['RDpassword'],
			$_GET['TSDlogin'],
			$_GET['TSDpassword'],
			$_GET['texRemark'],
			$_GET['child'],
			$_GET['carrier'],
			$_GET['origin'],
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