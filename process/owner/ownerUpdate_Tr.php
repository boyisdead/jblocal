<?php
session_start();
include('../../server/connect.php');
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

$id=base64_decode($_REQUEST['id']);

$idowner=base64_decode($_REQUEST['idowner']);

//รับค่า

if($_REQUEST['jobid']==0){echo"<script>alert('Please insert Job ID');history.back();</script>";exit;}

 




$jobid=$_REQUEST['jobid'];

$jb_approve=$_REQUEST['jb_approve'];
$company_approve=$_REQUEST['company_approve'];
$offer_made=$_REQUEST['offer_made'];
$company_hire=$_REQUEST['company_hire'];

//เปลี่ยนชื่อภาพ

//เชื่อมต่อฐานข้อมูล
include("../../server/connect.php");







  $sql="UPDATE job_owner SET jobid=$jobid, jb_approve=\"$jb_approve\", company_approve=\"$company_approve\", offer_made=\"$offer_made\", company_hire=\"$company_hire\", last_update=now() WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  



  $idowner=base64_encode($idowner);
  echo"<script>window.location='../../owner_Tracker.php?id=$idowner';</script>";exit;














?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>