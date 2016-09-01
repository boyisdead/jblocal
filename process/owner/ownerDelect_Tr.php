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



if($_REQUEST['jobid']=='' OR $_REQUEST['id']=='' OR $_REQUEST['owner']=='' OR $_REQUEST['id_can']==''){echo"<script>alert('Can not delect this Job!');history.back();</script>";exit;}

include("../../server/connect.php");


$id=base64_decode($_REQUEST['id']);

$jobid=base64_decode($_REQUEST['jobid']);

$id_can=base64_decode($_REQUEST['id_can']);
$owner=$_REQUEST['owner'];




$sql="DELETE FROM job_owner WHERE id=$id AND jobid=$jobid AND user_id=$id_can AND ad_id=$owner";
mysql_query($sql)or die(mysql_error());



  $id_can=base64_encode($id_can);
  echo"<script>window.location='../../owner_Tracker.php?id=$id_can';</script>";exit;



?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>