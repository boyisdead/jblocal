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


/////////ชื่อลูกค้า = cusID int


///////บริษัทประกัน = companyName cha
$companyName=$_REQUEST['companyName'];
if($companyName==""){$companyName="ไม่ระบุ";}

/////////เลขที่กรมธรรม์ = No cha
$No=$_REQUEST['No'];
if($No==""){$No="ไม่ระบุ";}

///////ชื่อผุ้เอาประกัน = username cha
$username=$_REQUEST['username'];
if($username==""){$username="ไม่ระบุ";}

////////ประเภทของประกัน = type cha
$type=$_REQUEST['type'];
if($type==""){$type="ไม่ระบุ";}

/////////ชื่อชนิดประกัน = nameType cha
$nameType=$_REQUEST['nameType'];
if($nameType==""){$nameType="ไม่ระบุ";}

/////////Broker = more cha
$more=$_REQUEST['more'];
if($more==""){$more="ไม่ระบุ";}


$toon_money=$_REQUEST['toon_money'];
if($toon_money==""){$toon_money=0;}


////////วันที่เริ่มทำสัญญา = startDate
$startDate=$_REQUEST['startDate'];
if($startDate==""){$startDate="0000-00-00";}


////////วันที่ครบสัญญา = endDate
$endDate=$_REQUEST['endDate'];
if($endDate==""){$endDate="0000-00-00";}


/////////วันที่ดิวเบี้ย = startDate1
$startDate1=$_REQUEST['startDate1'];
if($startDate1==""){$startDate1="0000-00-00";}


////////////////////////จำนวนเบี้ยเริ่มต้น = first_money int
$first_money=$_REQUEST['first_money'];
if($first_money==""){$first_money=0;}


///////////////จำนวนเบี้ยที่จ่ายล่าสุด = moneyPay int
$moneyPay=$_REQUEST['moneyPay'];
if($moneyPay==""){$moneyPay=0;}


//////////////วันที่จ่ายเบี้ยครั้งล่าสุด = confirmPay
$confirmPay=$_REQUEST['confirmPay'];
if($confirmPay==""){$confirmPay="0000-00-00";}


/////////////////Status = status int
$status=$_REQUEST['status'];
if($status==""){$status="ไม่ระบุ";}



///////////////////รายละเอียดการจ่ายเบี้ย = detailMoney cha
$detailMoney=$_REQUEST['detailMoney'];
if($detailMoney==""){$detailMoney="ไม่ระบุ";}  



////////////////รายละเอียดการรับเงิน = receiveMoney cha
$receiveMoney=$_REQUEST['receiveMoney'];
if($receiveMoney==""){$receiveMoney="ไม่ระบุ";}  



////////////////////ผู้รับผลประโยชน์ = whoRec cha
$whoRec=$_REQUEST['whoRec'];
if($whoRec==""){$whoRec="ไม่ระบุ";}   


///////////////////////หมายเหตุ = remark
$remark=$_REQUEST['remark'];
if($remark==""){$remark="ไม่ระบุ";}













//เชื่อมต่อฐานข้อมูล
include('connect.php');

//ถ้าไม่แก้ไขรูปภาพ

  //อัพเดทข้อมูล
  $sql="UPDATE insurance_al SET toon_money=$toon_money, first_money=$first_money, confirmPay='$confirmPay', detailMoney=\"$detailMoney\", receiveMoney=\"$receiveMoney\", inal_nameCompany=\"$companyName\", inal_anotherRec='$username', inal_no=\"$No\", inal_type=\"$type\", inal_nameType=\"$nameType\", inal_contact=\"$more\", inal_startDate='$startDate', inal_deal='$startDate1', endDate='$endDate', inal_moneyPay=$moneyPay, inal_howPay=\"$howPay\", inal_status=\"$status\", inal_whoRec=\"$whoRec\", inal_rematk=\"$remark\", last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  




  echo"<script>window.location='../cus_insurance_al-$customer_id-$id';</script>";exit;





?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>