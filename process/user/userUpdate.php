<?php
session_start();
header('Content-type: text/plain; charset=utf-8');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}


//รับค่า
$id=base64_decode($_REQUEST['id']);
$password=$_REQUEST['password'];
$confirm=$_REQUEST['confirm'];
//เชื่อต่อฐานข้อมูล
include('../../server/connect.php');

if(($password!=$confirm)){
	$arrf = array('status' =>1012, "msg" => "password ที่ท่านกรอกไม่ตรงกัน");
	echo  json_encode($arrf);
} else {

	$sql="UPDATE user SET password='$password', last_update=now() WHERE id=$id";
	mysql_query($sql)or die(mysql_error());

	$arrf = array('status' =>1011, "msg" => "ท่านทำการเปลี่ยน password ได้แล้ว");
	echo  json_encode($arrf);
}


?>
