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



$broker=$_REQUEST['broker'];
if($broker==""){$broker="ไม่ระบุ";}


$no=$_REQUEST['no'];
if($no==""){$no=0;}

$startDate=$_REQUEST['startDate'];
if($startDate==""){$startDate="0000-00-00";}

$startMoney=$_REQUEST['startMoney'];
if($startMoney==""){$startMoney=0;}

$style=$_REQUEST['style'];
if($style==""){$style="ไม่ระบุ";}

$banklink=$_REQUEST['banklink'];
if($banklink==""){$banklink="ไม่ระบุ";}

$remark=$_REQUEST['remark'];
if($remark==""){$remark="ไม่ระบุ";}













//เชื่อมต่อฐานข้อมูล
include('connect.php');

//ถ้าไม่แก้ไขรูปภาพ

  //อัพเดทข้อมูล
  $sql="UPDATE private_fund SET private_broker=\"$broker\", private_no='$no', start_date='$startDate', start_money=$startMoney, banklink=\"banklink\", private_style=\"$style\", private_remark=\"$remark\" WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  


  
  echo"<script>window.location='../cus_private_fund-$customer_id-$id';</script>";exit;





?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>