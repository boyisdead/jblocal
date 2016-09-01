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
if(isset($_SESSION['ssUsername'])){$username=$_SESSION['ssUsername'];}
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='../../../';</script>";exit;}
?>
<!-- InstanceBeginEditable name="EditRegion" -->
<?php
if($_REQUEST['id']==""){echo"<script>history.back();</script>";exit;}
$id=base64_decode($_REQUEST['id']);

include("../../server/connect.php");

$sql="DELETE FROM Voting_IP WHERE mes_id_fk=$id";
mysql_query($sql)or die(mysql_error());
//ลบหัวข้อ
$sql="DELETE FROM webboard_post WHERE id=$id";
mysql_query($sql)or die(mysql_error());
//ลบตอบ
$sql="DELETE FROM webboard_reply WHERE post_id=$id";
mysql_query($sql)or die(mysql_error());



echo"<script>window.location='../../../Take_Over_Lease';</script>";
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>