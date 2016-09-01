<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/backProcess.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>
<body>
<?php
//เช็คล็อกอิน
if(isset($_SESSION['ssUsername2'])){$username=$_SESSION['ssUsername2'];}
else if(!isset($_SESSION['ssUsername2'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
?>
<!-- InstanceBeginEditable name="EditRegion" -->
<?php
//รับค่า
$id=base64_decode($_REQUEST['id']);
//เชื่อมต่อฐานข้อมูล
include('connect.php');
//หาภาพหลัก
$sql="SELECT * FROM candidate_profile WHERE id=$id";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
//ลบภาพสินค้าในโฟลเดอร์
unlink("../avatar/".$row['file_name']);

unlink("../cv/".$row['cv']);
//ลบข้อมูลสินค้า
$sql="DELETE FROM candidate_profile WHERE id=$id";
mysql_query($sql)or die(mysql_error());
//หาภาพประกอบ








//ลบแบบ

//กลับ
echo"<script>document.location=document.referrer;</script>";
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>