<?php
session_start();
require_once '../include/mysql.inc.php';

$arrt = array("status"=>2001, "msg"=>"Unlock successful.");
$arrf = array('status' =>2002, "msg" => "Invalid Password!!");


$username=$_REQUEST['username'];
$password=$_REQUEST['pwd'];



if (!empty($username) and !empty($password)) {
	$mysql = new MySQL_Connection();
    $mysql->query("SET NAMES utf8");



	$query = $mysql->queryResult("SELECT id, First_Name, username FROM user WHERE username = %s AND password = %s",
			array(
		        $username, // แทนที่ %s ตัวที่ 1
		        $password,    // แทนที่ %s ตัวที่ 2
	    	)
    	);
	if ($query->numRows > 0) {
		$r = $query->fetch();
		$_SESSION['ssId'] = session_id();
		$_SESSION['ssUserId'] = $r['id'];
		$_SESSION['ssUsername'] = $r['username'];
		$_SESSION['ssFirst_Name'] = $r['First_Name'];
		session_write_close();
		if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($arrt).")";
		} else {
			echo  json_encode($arrt);
		}
	}
	else {
		if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($arrf).")";
		} else {
			echo  json_encode($arrf);
		}
	}
	$mysql->close();
} else {
	
		if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($arrf).")";
		} else {
			echo  json_encode($arrf);
		}
	
}
?>