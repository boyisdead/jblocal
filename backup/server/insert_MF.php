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


$product_mf=$_REQUEST['product_mf'];
if($product_mf==""){$product_mf="ไม่ระบุ";}


$LoginPhill=$_REQUEST['LoginPhill'];
if($LoginPhill==""){$LoginPhill="ไม่ระบุ";}


$PwdPhill=$_REQUEST['PwdPhill'];
if($PwdPhill==""){$PwdPhill="ไม่ระบุ";}

$goalLTF=$_REQUEST['goalLTF'];
if($goalLTF==""){$goalLTF=0;}

$doneLTF=$_REQUEST['doneLTF'];
if($doneLTF==""){$doneLTF=0;}

$goalRMF=$_REQUEST['goalRMF'];
if($goalRMF==""){$goalRMF=0;}

$doneRMF=$_REQUEST['doneRMF'];
if($doneRMF==""){$doneRMF=0;}

////////////////////////////////////////////////////////////////////////////////

$saving=$_REQUEST['saving'];
if($saving==""){$saving=0;}

$detail=$_REQUEST['detail'];
if($detail==""){$detail="ไม่ระบุ";}

$openSignature=$_REQUEST['openSignature'];
if($openSignature==""){$openSignature="ไม่ระบุ";}


$bankcus=$_REQUEST['bankcus'];
if($bankcus==""){$bankcus="ไม่ระบุ";}

$remark=$_REQUEST['remark'];
if($remark==""){$remark="ไม่ระบุ";}

$Bagged=$_REQUEST['Bagged'];
if($Bagged==""){$Bagged=0;}



//////////////////////////////////////////////////////////////////













//เชื่อมต่อฐานข้อมูล
include('connect.php');

//ถ้าไม่แก้ไขรูปภาพ

  //อัพเดทข้อมูล


  $sql="INSERT INTO mutual_fund(name, phillip_login, phillip_pwd, mf_goal_ltf, mf_goal_rmf, mf_done_ltf, mf_done_rmf, mf_saving_plan, mf_saving_plan_detail, mf_open_signature, bankcus, mf_money_bagged, remark, customer_id, member_id, insert_date, last_update) 
  VALUES(\"$product_mf\", \"$LoginPhill\", \"$PwdPhill\", $goalLTF, $goalRMF, $doneLTF, $doneRMF, $saving, \"$detail\", \"$openSignature\", \"$bankcus\", $Bagged, \"$remark\", $id, $meid, now(), now())";
mysql_query($sql)or die(mysql_error());
//
$product_id=mysql_insert_id();





  
  echo"<script>window.location='../cus_mutual_fund-$id-$product_id-$product_id';</script>";exit;
















?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>