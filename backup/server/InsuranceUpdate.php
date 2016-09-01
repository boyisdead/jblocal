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
else if(!isset($_SESSION['ssUsername'])){echo"<script>alert('ยังไม่เข้าสู่ระบบ');window.location='../index.php';</script>";exit;}
?>
<?php
//รับค่า
                  $customer_id = $_REQUEST['cus_id'];

                  $id = $_REQUEST['id'];

                  $numid = $_REQUEST['num'];






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

$startDate1=$_REQUEST['startDate1'];
if($startDate1==""){$startDate1="0000-00-00";}


$startMoney=$_REQUEST['startMoney'];
if($startMoney==""){$startMoney=0;}

$moneyPay=$_REQUEST['moneyPay'];
if($moneyPay==""){$moneyPay=0;}

$typePay=$_REQUEST['typePay'];
if($typePay==""){$typePay=0;}


$endltDate=$_REQUEST['endltDate'];
if($endltDate==""){$endltDate="0000-00-00";}




$howPay=$_REQUEST['howPay'];
if($howPay==""){$howPay=0;}




$confirmPay=$_REQUEST['ins_confirmPay'];
if($confirmPay==""){$confirmPay="0000-00-00";}
////////////////
$whoRec=$_REQUEST['whoRec'];
if($whoRec==""){$whoRec="ไม่ระบุ";}

$status=$_REQUEST['status'];
if($status==""){$status="ไม่ระบุ";}

$ownerCode=$_REQUEST['ownerCode'];
if($ownerCode==""){$ownerCode="ไม่ระบุ";}

$startMoney2=$_REQUEST['startMoney2'];
if($startMoney2==""){$startMoney2=0;}





$detailMoney=$_REQUEST['detailMoney'];
if($detailMoney==""){$detailMoney="ไม่ระบุ";}

$receiveMoney=$_REQUEST['receiveMoney'];
if($receiveMoney==""){$receiveMoney="ไม่ระบุ";}

$remark=$_REQUEST['remark'];
if($remark==""){$remark="ไม่ระบุ";}





//เชื่อมต่อฐานข้อมูล
include('connect.php');

//ถ้าไม่แก้ไขรูปภาพ

  //อัพเดทข้อมูล
  $sql="UPDATE insurance SET ins_nameCompany=\"$companyName\", ins_no='$No', ins_type=\"$type\", ins_login='$username', ins_pwd='$password', ins_nameType=\"$nameType\", ins_more=\"$more\", ins_startDate='$startDate', endltDate='$endltDate', ins_deal='$startDate1', ins_startMoney=$startMoney, ins_startMoney2=$startMoney2, ins_moneyPay=$moneyPay, ins_typePay=\"$typePay\", ins_confirmPay='$confirmPay', ins_whoRec=\"$whoRec\", ins_status=\"$status\", ins_ownerCode=\"$ownerCode\", detailMoney=\"$detailMoney\", receiveMoney=\"$receiveMoney\", remark=\"$remark\", last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  







  
  echo"<script>window.location='../cus_insurance-$customer_id-$id';</script>";exit;





?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>