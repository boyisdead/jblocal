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

$Bagged=$_REQUEST['Bagged'];
if($Bagged==""){$Bagged=0;}

$remark=$_REQUEST['remark'];
if($remark==""){$remark="ไม่ระบุ";}

$bankcus=$_REQUEST['bankcus'];
if($bankcus==""){$bankcus="ไม่ระบุ";}









//เชื่อมต่อฐานข้อมูล
include('connect.php');

//ถ้าไม่แก้ไขรูปภาพ

  //อัพเดทข้อมูล
  $sql="UPDATE mutual_fund SET name=\"$product_mf\", phillip_login=\"$LoginPhill\", phillip_pwd=\"$PwdPhill\", mf_goal_ltf=$goalLTF, mf_goal_rmf=$goalRMF, mf_done_ltf=$doneLTF, mf_done_rmf=$doneRMF, mf_saving_plan=$saving, mf_saving_plan_detail=\"$detail\", mf_open_signature='$openSignature', bankcus=\"$bankcus\", mf_money_bagged=$Bagged, remark=\"$remark\", customer_id=$customer_id, last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  




  
  echo"<script>window.location='../cus_mutual_fund-$customer_id-$id-$numid';</script>";exit;





?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>