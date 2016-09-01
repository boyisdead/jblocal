<?php
session_start();
header('Content-type: text/plain; charset=utf-8');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}




//รับค่า
include('../../server/connect.php');
$id=base64_decode($_REQUEST['id']);
//ลบ
//หาภาพหลัก
$sql="SELECT * FROM rockstar_upload WHERE id=$id";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
//ลบภาพสินค้าในโฟลเดอร์

unlink("../../upload/".$row['file']);


//ลบข้อมูลสินค้า
$sql="DELETE FROM rockstar_upload WHERE id=$id";
mysql_query($sql)or die(mysql_error());
//หาภาพประกอบ


	$arrf = array('status' =>1051, "msg" => "ท่านได้ทำการลบร้านค้านี้แล้ว");
	echo  json_encode($arrf);
?>
