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
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='index.php';</script>";exit;}
?>
<!-- InstanceBeginEditable name="EditRegion" -->
<?php
//รับค่า
$id=base64_decode($_REQUEST['id']);
//เชื่อมต่อฐานข้อมูล
include('connect.php');
//หาภาพหลัก
$sql="SELECT * FROM customer WHERE id=$id";
$result=mysql_query($sql)or die(mysql_error());
$row=mysql_fetch_assoc($result);
//ลบภาพสินค้าในโฟลเดอร์
unlink("../cusimage/".$row['image']);
//ลบข้อมูลสินค้า
$sql="DELETE FROM customer WHERE id=$id";
mysql_query($sql)or die(mysql_error());
//หาภาพประกอบ
$sql="SELECT * FROM cus_image WHERE product_id=$id";
$result=mysql_query($sql)or die(mysql_error());
$num=mysql_num_rows($result);
for($i=1;$i<=$num;$i++){
  $row=mysql_fetch_assoc($result);
  $image=$row['image'];
  //ลบในโฟลเดอร์
  unlink("../cusimage/".$row['image']);
  //ลบในฐานข้อมูล
  mysql_query("DELETE FROM cus_image WHERE image='$image'")or die(mysql_error());
}


$sqlA="SELECT * FROM insurance WHERE customer_id=$id";
$resultA=mysql_query($sqlA)or die(mysql_error());
$numA=mysql_num_rows($resultA);

for($i=1;$i<=$numA;$i++){
$sql="DELETE FROM insurance WHERE customer_id=$id";
$result=mysql_query($sql)or die(mysql_error());
}


$sql="DELETE FROM insurance_al WHERE customer_id=$id";
$result=mysql_query($sql)or die(mysql_error());

$sql="DELETE FROM mutual_fund WHERE customer_id=$id";
$result=mysql_query($sql)or die(mysql_error());

$sql="DELETE FROM private_fund WHERE customer_id=$id";
$result=mysql_query($sql)or die(mysql_error());

$sql="DELETE FROM product_aboard WHERE customer_id=$id";
$result=mysql_query($sql)or die(mysql_error());





//ลบแบบ

//กลับ
echo"<script>document.location=document.referrer;</script>";
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>