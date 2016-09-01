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
<?php
//รับค่า
$id=$_REQUEST['cusID'];

$meid=$_REQUEST['meid'];



$companyName=$_REQUEST['companyName'];
if($companyName==""){$companyName="ไม่ระบุ";}


$No=$_REQUEST['No'];
if($No==""){$No="ไม่ระบุ";}

$type=$_REQUEST['type'];
if($type==""){$type="ไม่ระบุ";}

$username=$_REQUEST['username'];
if($username==""){$username="ไม่ระบุ";}

$password=$_REQUEST['password'];
if($password==""){$password="ไม่ระบุ";}

$nameType=$_REQUEST['nameType'];
if($nameType==""){$nameType="ไม่ระบุ";}


$more=$_REQUEST['more'];
if($more==""){$more="ไม่ระบุ";}

//0000-00-00

$startDate=$_REQUEST['startDate'];
if($startDate==""){$startDate="0000-00-00";}


$startDate=$_REQUEST['startDate'];
if($startDate==""){$startDate="0000-00-00";}

$endltDate=$_REQUEST['endltDate'];
if($endltDate==""){$endltDate="0000-00-00";}


$startDate1=$_REQUEST['startDate1'];
if($startDate1==""){$startDate1="0000-00-00";}


$startMoney=$_REQUEST['startMoney'];
if($startMoney==""){$startMoney=0;}

$startMoney2=$_REQUEST['startMoney2'];
if($startMoney2==""){$startMoney2=0;}

$moneyPay=$_REQUEST['moneyPay'];
if($moneyPay==""){$moneyPay=0;}

$typePay=$_REQUEST['typePay'];
if($typePay==""){$typePay=0;}




$howPay=$_REQUEST['howPay'];
if($howPay==""){$howPay=0;}




$confirmPay=$_REQUEST['confirmPay'];
if($confirmPay==""){$confirmPay="0000-00-00";}
////////////////
$whoRec=$_REQUEST['whoRec'];
if($whoRec==""){$whoRec="ไม่ระบุ";}

$status=$_REQUEST['status'];
if($status==""){$status="ไม่ระบุ";}

$ownerCode=$_REQUEST['ownerCode'];
if($ownerCode==""){$ownerCode="ไม่ระบุ";}





$detailMoney=$_REQUEST['detailMoney'];
if($detailMoney==""){$detailMoney="ไม่ระบุ";}

$receiveMoney=$_REQUEST['receiveMoney'];
if($receiveMoney==""){$receiveMoney="ไม่ระบุ";}

$remark=$_REQUEST['remark'];
if($remark==""){$remark="ไม่ระบุ";}


///////////////////////////////////////////////////////////////////////////////         endltDate
//เชื่อมต่อฐานข้อมูล
include('connect.php');

//ถ้าไม่แก้ไขรูปภาพ         

  //อัพเดทข้อมูล
  $sql="INSERT INTO insurance(ins_nameCompany, ins_no, ins_type, ins_login, ins_pwd, ins_nameType, ins_more, ins_startDate, endltDate, ins_deal, ins_startMoney, ins_startMoney2, ins_moneyPay, ins_typePay, ins_confirmPay, ins_whoRec, ins_status, ins_ownerCode, detailMoney, receiveMoney, remark, customer_id, member_id, insert_date, last_update) 
  VALUES(\"$companyName\", '$No', \"$type\", \"$username\", \"$password\", \"$nameType\", \"$more\", '$startDate', '$endltDate', '$startDate1', $startMoney, $startMoney2, $moneyPay, \"$typePay\", '$confirmPay',\"$whoRec\", \"$status\", \"$ownerCode\", \"$detailMoney\", \"$receiveMoney\", \"$remark\", $id, $meid, now(), now())";
mysql_query($sql)or die(mysql_error());
//คืนค่าไอดี
$product_id=mysql_insert_id();




  
  echo"<script>window.location='../cus_insurance-$id-$product_id';</script>";exit;
















?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>