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
//เช็คค่า
if($_REQUEST['password']!=$_REQUEST['confirm']){echo"<script>alert('ยืนยันรหัสผ่านไม่ตรงกัน');history.back();</script>";exit();}
//รับค่า
$id=$_REQUEST['id'];
$password=$_REQUEST['password'];
$confirm=$_REQUEST['confirm'];

$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
//เชื่อมต่อฐานข้อมูล
require_once 'connect.php';
//อัพเดท
$sql="UPDATE user SET password='$password', last_update=now() WHERE id=$id";
mysql_query($sql)or die(mysql_error());

$posttext = " Change Password";

$sql="INSERT INTO post(posttext, userpost, userpostto, insert_date, last_update) 
VALUES(\"$posttext\", \"$id\", \"$id\", now(), now())";
mysql_query($sql)or die(mysql_error());

echo"<script>document.location=document.referrer;</script>";
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>