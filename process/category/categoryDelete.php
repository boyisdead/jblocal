<?php
session_start();
header('Content-type: text/plain; charset=utf-8');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}




//รับค่า
include('../../server/connect.php');
$id=base64_decode($_REQUEST['id']);
//ลบ


$sql="DELETE FROM category WHERE id=$id";
mysql_query($sql)or die(mysql_error());
//อัพเดทหมวดหมู่ของสินค้า
$sql="UPDATE job_post SET department=0 WHERE department=$id";
mysql_query($sql)or die(mysql_error());

	$arrf = array('status' =>1051, "msg" => "ท่านได้ทำการลบหมวดหมู่นี้แล้ว");
	echo  json_encode($arrf);

?>
