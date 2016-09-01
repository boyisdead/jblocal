<?php
session_start();
ob_start();
require_once '../include/mysql.inc.php';


$super = array("status"=>1011, "msg"=>"SuperUser Sign in successful.");
$arrt = array("status"=>1001, "msg"=>"Sign in successful.");
$arrf = array('status' =>1002, "msg" => "Invalid Email address or Password");



$username=$_REQUEST['username'];
$password=$_REQUEST['pwd'];

$rememberme=$_REQUEST['rememberme'];



if (!empty($username) and !empty($password)) {
	$mysql = new MySQL_Connection();
    $mysql->query("SET NAMES utf8");



	$query = $mysql->queryResult("SELECT id, First_Name, username, password, status FROM user WHERE username = %s AND password = %s",
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
		$_SESSION['sspwd'] = $r['password'];
		$_SESSION['ssFirst_Name'] = $r['First_Name'];
		$_SESSION['ssPosition'] = $r['status'];
		session_write_close();

		if($rememberme == 'Yes'){
        setcookie('username11014', $_SESSION['ssUsername'], time()+120, '/');
		setcookie('password11014', $_SESSION['sspwd'], time()+120, '/');
        }
     


		if($_SESSION['ssPosition'] == 'superuser'){


		if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($super).")";
		} else {
			echo  json_encode($super);
		}

		} else {

		if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($arrt).")";
		} else {
			echo  json_encode($arrt);
		}


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
	if (session_id() == exst($_SESSION['ssId'])) {
		if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($arrt).")";
		} else {
			echo  json_encode($arrt);
		}
	} else {
		if ($_GET['callback'] != null) {
			echo  $_GET['callback']."(".json_encode($arrf).")";
		} else {
			echo  json_encode($arrf);
		}
	}
}
?>