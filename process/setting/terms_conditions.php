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



$terms_conditions = mysql_escape_string($_POST['terms_conditions']);
if($terms_conditions==""){$terms_conditions="ไม่ระบุ";}




//เชื่อต่อฐานข้อมูล
include("../../server/connect.php");
//อัพเดทข้อมูล
$sql="UPDATE setting SET terms_conditions='$terms_conditions', last_update=now() ";
mysql_query($sql)or die(mysql_error());


echo"<script>document.location=document.referrer;</script>";


?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>