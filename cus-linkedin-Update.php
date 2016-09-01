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
<?php
//รับค่า
$id=$_REQUEST['id'];

$fname=$_REQUEST['fname'];
if($fname==""){$fname="-";}

$lname=$_REQUEST['lname'];
if($lname==""){$lname="-";}

$email=$_REQUEST['email'];
if($email==""){$email="-";}

$company=$_REQUEST['company'];
if($company==""){$company="-";}

$country=$_REQUEST['country'];
if($country==""){$country="-";}

$job_title=$_REQUEST['job_title'];
if($job_title==""){$job_title="-";}

$Industry=$_REQUEST['industry'];
if($Industry==""){$Industry="-";}

$Department=$_REQUEST['Department'];
if($Department==""){$Department=0;}

////////////////////////////////////////////////////////////////////////////////












//เชื่อมต่อฐานข้อมูล
include('connect.php');



  //อัพเดทข้อมูล
  $sql="UPDATE user_linkedin SET first_name=\"$fname\", last_name=\"$lname\", email=\"$email\", company=\"$company\", job_title=\"$job_title\", country=\"$country\",  Industry=\"$Industry\", Department=$Department WHERE id=$id";
  mysql_query($sql)or die(mysql_error());  



  















echo"<script>window.location='../linkedin-profile.php?cus_id=$id';</script>";exit;
?>
<!-- InstanceEndEditable -->
</body>
<!-- InstanceEnd --></html>