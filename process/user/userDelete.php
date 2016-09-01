<?php
session_start();
header('Content-type: text/plain; charset=utf-8');
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
//รับค่า
$id=base64_decode($_REQUEST['id']);
$password=$_REQUEST['password'];
//เชื่อมต่อฐานข้อมูล
include('../../server/connect.php');
//เช็คข้อมูล ต้องมีอย่างน้อย 1 เรคคอร์ด
$sql="SELECT COUNT(*) FROM user";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_array($result);
if($row['COUNT(*)']==1){
	
	$arrf = array('status' =>1023, "msg" => "ไม่สามารถลบได้ ต้องมีอย่างน้อย 1 รายการ");
	echo  json_encode($arrf);
} else if($password != "0811007753"){

	$arrf = array('status' =>1022, "msg" => "รหัสผ่านในการใช้ลบข้อมูลไม่ถูกต้อง");
	echo  json_encode($arrf);

} else {

$sql="DELETE FROM user WHERE id=$id";
mysql_query($sql)or die(mysql_error());

$arrf = array('status' =>1021, "msg" => "ได้ทำการลบเรียบร้อยแล้ว");
	echo  json_encode($arrf);

}
//ลบ

//echo"<script>document.location=document.referrer;</script>";
?>
